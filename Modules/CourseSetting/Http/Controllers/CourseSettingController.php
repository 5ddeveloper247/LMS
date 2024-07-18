<?php

namespace Modules\CourseSetting\Http\Controllers;

use App\User;
use Exception;
use Carbon\Carbon;
use App\Traits\Filepond;
use App\Traits\ImageStore;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Modules\Payment\Entities\Cart;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Org\Entities\OrgMaterial;
use Modules\Quiz\Entities\OnlineQuiz;
use Illuminate\Support\Facades\Session;
use Modules\Quiz\Entities\QuestionBank;
use Modules\Quiz\Entities\QuestionGroup;
use Modules\Quiz\Entities\QuestionLevel;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\Lesson;
use Modules\Payment\Entities\PaymentPlans;
use Modules\CourseSetting\Entities\Chapter;
use Modules\Localization\Entities\Language;
use Modules\CourseSetting\Entities\Category;
use Modules\Certificate\Entities\Certificate;
use Modules\CourseSetting\Entities\TimeTable;
use Modules\CourseSetting\Entities\CourseSale;
use Modules\CourseSetting\Entities\CourseLevel;
use Modules\CourseSetting\Entities\SchoolSubject;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\CourseSetting\Entities\CourseExercise;
use Modules\CourseSetting\Entities\CourseSaleData;
use Modules\Quiz\Entities\OnlineExamQuestionAssign;
use Modules\BundleSubscription\Entities\BundleCourse;
use Modules\SystemSetting\Entities\PackagePurchasing;
use Modules\Newsletter\Http\Controllers\AcelleController;
use Modules\OrgInstructorPolicy\Entities\OrgPolicyCategory;
use Modules\Newsletter\Http\Controllers\MailchimpController;
use Modules\Newsletter\Http\Controllers\GetResponseController;
use Modules\Membership\Repositories\Interfaces\MembershipCourseRepositoryInterface;
use Modules\CourseSetting\Entities\CourseReveiw;


class CourseSettingController extends Controller
{
    use Filepond, ImageStore;

    public function getSubscriptionList()
    {
        $list = [];

        try {
            $user = Auth::user();
            if ($user->subscription_method == "Mailchimp" && $user->subscription_api_status == 1) {
                $mailchimp = new MailchimpController();
                $mailchimp->mailchimp($user->subscription_api_key);
                $getlists = $mailchimp->mailchimpLists();
                foreach ($getlists as $key => $l) {
                    $list[$key]['name'] = $l['name'];
                    $list[$key]['id'] = $l['id'];
                }
            } elseif ($user->subscription_method == "GetResponse" && $user->subscription_api_status == 1) {
                $getResponse = new GetResponseController();
                $getResponse->getResponseApi($user->subscription_api_key);
                $getlists = $getResponse->getResponseLists();
                foreach ($getlists as $key => $l) {
                    $list[$key]['name'] = $l->name;
                    $list[$key]['id'] = $l->campaignId;
                }
            } elseif ($user->subscription_method == "Acelle" && $user->subscription_api_status == 1) {
                $acelleController = new AcelleController();

                $acelleController->getAcelleApiResponse();
                $getlists = $acelleController->getAcelleList();
                foreach ($getlists as $key => $l) {
                    $list[$key]['name'] = $l['name'];
                    $list[$key]['id'] = $l['uid'];
                }
            }
        } catch (\Exception $exception) {
        }
        return $list;
    }


    public function ajaxGetCourseSubCategory(Request $request)
    {
        try {

            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $sub_categories = $query->where('parent_id', '=', $request->id)->get();
            return response()->json([$sub_categories]);
        } catch (Exception $e) {
            return response()->json("", 404);
        }
    }

    public function courseSortByCat($id)
    {
        try {
            if (!empty($id))
                $courses = Course::whereHas('enrolls')
                    ->where('category_id', $id)->with('user', 'category', 'subCategory', 'enrolls', 'comments', 'reviews', 'lessons')->paginate(15);
            else
                $courses = Course::whereHas('enrolls')->with('user', 'category', 'subCategory', 'enrolls', 'comments', 'reviews', 'lessons')->paginate(15);

            return response()->json([
                'courses' => $courses
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => trans("lang.Oops, Something Went Wrong")]);
        }
    }


    public function getAllCourse()
    {
        try {
              $user = Auth::user();

              $video_list = [];
              $vdocipher_list = [];

              $courses = [];
              $query = Category::orderBy('position_order', 'ASC');
              if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                  $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                  $query->whereIn('id', $assign);
              }
              $categories = $query->with('parent')->get();
              if ($user->role_id == 2) {
                  $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
              } else {
                  $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
              }

              $instructor_query = User::select('name', 'id');
              if (isModuleActive('UserType')) {
                  $instructor_query->whereHas('userRoles', function ($q) {
                      $q->whereIn('role_id', [1, 2]);
                  });
              } else {
                  $instructor_query->whereIn('role_id', [1, 2]);
              }
              $instructors = $instructor_query->get();
              $languages = Language::select('id', 'native', 'code')
                  ->where('status', '=', 1)
                  ->get();
              $levels = CourseLevel::where('status', 1)->get();
              $title = trans('courses.All');

              $sub_lists = $this->getSubscriptionList();

              if (Auth::user()->role_id == 9) {
                  $my_courses = Course::where('user_id', Auth::id())->count();
                  $package_purchasing = PackagePurchasing::where('user_id', Auth::id())->latest()->first();
                  $allowed_courses = isset($package_purchasing) ? intval($package_purchasing->course_limit) : $package_purchasing;
              }

              return view('coursesetting::courses', get_defined_vars());
          } catch (Exception $e) {
              GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
          }
    }

    public function courseSortBy(Request $request)
    {

        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $user = Auth::user();

            $video_list = [];
            $vdocipher_list = [];

            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->get();
            $instructor_query = User::select('name', 'id');
            if (isModuleActive('UserType')) {
                $instructor_query->whereHas('userRoles', function ($q) {
                    $q->whereIn('role_id', [1, 2]);
                });
            } else {
                $instructor_query->whereIn('role_id', [1, 2]);
            }
            $instructors = $instructor_query->get();

            if ($user->role_id == 2) {
                $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
            } else {
                $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
            }
            $languages = Language::select('id', 'native', 'code')
                ->where('status', '=', 1)
                ->get();


            $courses = Course::query();
            // $courses->where('active_status', 1);
            if ($request->category != "") {
                $courses->where('category_id', $request->category);
            }
            if ($request->type != "") {
                $courses->where('type', $request->type);
            } else {
                $courses->whereIn('type', [1, 2]);
            }
            if ($request->instructor != "") {
                $courses->where('user_id', $request->instructor);
            }
            if ($request->status != "") {
                $courses->where('status', $request->status);
            }
            if ($request->search_required_type != "") {
                $courses->where('required_type', $request->search_required_type);
            }
            if ($request->search_delivery_mode != "") {
                $courses->where('mode_of_delivery', $request->search_delivery_mode);
            }
            if (Route::current()->getName() == 'getActiveCourse') {
                $courses->where('status', 1);
            }
            if (Route::current()->getName() == 'getPendingCourse') {
                $courses->where('status', 0);
            }

            if ($request->category) {
                $category_search = $request->category;
            } else {
                $category_search = '';
            }

            if ($request->type) {
                $category_type = $request->type;
            } else {
                $category_type = '';
            }

            if ($request->instructor) {
                $category_instructor = $request->instructor;
            } else {
                $category_instructor = '';
            }

            if ($request->search_required_type) {
                $search_required_type = $request->search_required_type;
            } else {
                $search_required_type = '';
            }

            if ($request->search_delivery_mode) {
                $search_delivery_mode = $request->search_delivery_mode;
            } else {
                $search_delivery_mode = '';
            }

            if ($request->search_status) {
                $category_status = $request->search_status;
            } else {
                $category_status = '';
            }

            $courses = [];
            //            $courses = $courses->with('user', 'category', 'subCategory', 'enrolls', 'lessons')->orderBy('id', 'desc')->get();

            $levels = CourseLevel::where('status', 1)->get();
            $sub_lists = $this->getSubscriptionList();
            return view('coursesetting::courses', compact('search_delivery_mode', 'search_required_type', 'sub_lists', 'levels', 'category_search', 'vdocipher_list', 'category_instructor', 'category_type', 'category_status', 'video_list', 'quizzes', 'courses', 'categories', 'languages', 'instructors'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function saveCourse(Request $request)
    {
        Session::flash('type', 'store');

        if (demoCheck()) {
            return redirect()->back();
        }
        //dd($request);
        $code = auth()->user()->language_code;
        $rules = [
            'type' => 'required',
            'language' => 'nullable',
            'duration' => 'nullable',
            'course_code' => 'unique:courses,course_code',
            'full_course_main_image' => 'required_if:cna_prep_type_check,==,1',
            //'assign_instructor' => 'required_unless:type,7',
            'test_prep_price' => 'required_if:test_prep_type,==,1',
            'demand_course_main_image' => 'required_if:test_prep_type,==,1',

            // 'test_prep_graded_price' => 'required_if:test_prep_graded_type,==,1',
            'live_course_main_image' => 'required_if:test_prep_graded_type,==,1',
            // 'image' => 'nullable|mimes:jpeg,bmp,png,jpg|max:4096',
            // 'hidden_file' => 'nullable|mimes:jpeg,bmp,png,jpg|max:4096',
            //         	'parent_course_thumbnail_image' => 'required|mimes:jpeg,bmp,png,jpg|max:4096',
        ];
        $this->validate($request, $rules, validationMessage($rules));
        if ($request->type == 1) {
            $rules = [
                'level' => 'nullable',
                'category' => 'required',
                'total_courses' => 'required',
                // 'host' => 'required',
            ];
            $this->validate($request, $rules, validationMessage($rules));

            if (isset($request->show_overview_media)) {

                $rules = [
                    'host' => 'required',
                ];
                $this->validate($request, $rules, validationMessage($rules));

                if ($request->get('host') == "Vimeo") {
                    $rules = [
                        'vimeo' => 'required',
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                } elseif ($request->get('host') == "VdoCipher") {
                    $rules = [
                        'vdocipher' => 'required',
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                } elseif ($request->get('host') == "Youtube") {
                    $rules = [
                        'trailer_link' => 'required'
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                }
            }
        }


        try {

            $course = new Course();
            if ($request->file('parent_course_image') != "") {
                $course->thumbnail = $this->saveCroppedImage($request->parent_course_thumbnail_image);
                $course->image = $this->saveImage($request->parent_course_image);
            }

            if (isModuleActive('Membership')) {
                if ($request->filled('is_membership')) {
                    $course->is_membership = 1;
                }
                if ($request->filled('all_level_member')) {
                    $course->all_level_member = $request->all_level_member;
                }
            }

            $course->user_id = Auth::id();
            if ($request->type == 1) {
                $course->quiz_id = null;
                $course->category_id = $request->category;
                $course->total_classes = $request->total_courses;
                $course->subcategory_id = $request->sub_category;
            } elseif ($request->type == 2) {
                $course->quiz_id = $request->quiz;
                $course->category_id = null;
                $course->total_classes = null;
                $course->subcategory_id = null;
            } elseif ($request->type == 9) {
                $course->quiz_id = null;
                $course->type = $request->type;
                $course->category_id = $request->category;
                $course->subcategory_id = $request->sub_category;
                $course->total_classes = null;
            }


            $course->lang_id = $request->language;
            $course->scope = $request->scope;
            $course->title = $request->title;
            $course->course_code = $request->course_code ?? null;
            $course->featured = $request->featured ?? 0;
            $course->review_id = $request->review;
            //            foreach ($request->title as $key => $title) {
            //                $course->setTranslation('title', $key, $title);
            //            }


            $about = str_replace("'", "`", $request->about['en']);
            $course->about = $about;
            $requirements = str_replace("'", "`", $request->requirements['en']);
            $course->requirements = $requirements;
            $outcomes = str_replace("'", "`", $request->outcomes['en']);
            $course->outcomes = $outcomes;
            
            // foreach ($request->about as $key => $about) {
            //     $about = str_replace("'", "`", $about);
            //     $course->setTranslation('about', $key, $about);
            // }

            // foreach ($request->requirements as $key => $requirements) {
            //     $requirements = str_replace("'", "`", $requirements);
            //     $course->setTranslation('requirements', $key, $requirements);
            // }

            // foreach ($request->outcomes as $key => $outcomes) {
            //     $outcomes = str_replace("'", "`", $outcomes);
            //     $course->setTranslation('outcomes', $key, $outcomes);
            // }

            $course->slug = null;
            $course->duration = $request->duration;
            $course->duration = $request->duration;

            if (showEcommerce()) {
                if ($request->is_discount == 1) {
                    $course->discount_price = $request->discount_price;
                } else {
                    $course->discount_price = null;
                }
                if ($request->is_free == 1) {
                    $course->price = 0;
                    $course->discount_price = null;
                } else {
                    $course->price = $request->price;
                    // $course->price = ($request->type == 9) ? applyProductTax($request->price) : $request->price;
                }
            } else {
                if ($request->price == 9) {
                    $course->price =$request->price;
                    // $course->price = applyProductTax($request->price);
                    $course->discount_price = null;
                } else {
                    $course->price = 0;
                    $course->discount_price = null;
                }
            }
            if (isModuleActive('Org')) {
                $course->required_type = $request->required_type;
            } else {
                $course->required_type = 0;
            }

            $course->tax = ($request->type == 9) ? calcProductTax($request->price) : 0;

            $course->publish = 1;
            $course->status = 0;
            $course->level = $request->level;
            $course->school_subject_id = $request->get('school_subject_id', 0);
            if ($request->iap) {
                $course->iap_product_id = $request->iap_product_id;
            } else {
                $course->iap_product_id = null;
            }

            $course->mode_of_delivery = $request->mode_of_delivery;

            $course->show_overview_media = $request->show_overview_media ? 1 : 0;
            $course->host = $request->host;
            $course->subscription_list = $request->subscription_list;

            if (!empty($request->assign_instructor)) {
                $course->user_id = $request->assign_instructor ?? 0;
           }

            if ($request->get('host') == "Vimeo") {
                if (config('vimeo.connections.main.upload_type') == "Direct") {
                    $vimeoController = new VimeoController();
                    $course->trailer_link = $vimeoController->uploadFileIntoVimeo(md5(time()), $request->vimeo);
                } else {
                    $course->trailer_link = $request->vimeo;
                }
            } elseif ($request->get('host') == "VdoCipher") {
                $course->trailer_link = $request->vdocipher;
            } elseif ($request->get('host') == "Youtube") {
                $course->trailer_link = $request->trailer_link;
            } elseif ($request->get('host') == "Self") {
                $course->trailer_link = $this->getPublicPathFromServerId($request->get('file'), 'local');
            } elseif ($request->get('host') == "AmazonS3") {

                $course->trailer_link = $this->getPublicPathFromServerId($request->get('file'), 's3');
            } else {
                $course->trailer_link = null;
            }


            if (!empty($request->assign_instructor)) {
                $course->user_id = $request->assign_instructor ?? 0;
            }


            if (!empty($request->assistant_instructors)) {
                $assistants = $request->assistant_instructors;
                if (($key = array_search($course->user_id, $assistants)) !== false) {
                    unset($assistants[$key]);
                }
                if (!empty($assistants)) {
                    $course->assistant_instructors = json_encode(array_values($assistants));
                }
            }

            $course->meta_keywords = $request->meta_keywords;
            $course->meta_description = $request->meta_description;

            $course->type = $request->type;
            $course->drip = $request->drip;
            $course->complete_order = $request->complete_order;
            if (Settings('frontend_active_theme') == "edume") {
                $course->what_learn1 = $request->what_learn1;
                $course->what_learn2 = $request->what_learn2;
            }
            $course->status = 1;
            if ($request->type == 7) {
                $course->time_table_id = $request->timetable;
            }
            $child_course = $course;
            $last_max_seq = Course::whereIn('type', [1, 2, 7, 9])->max('seq_no');
            $course->seq_no = intval($last_max_seq) + 1;

            $course->save();

            if ($request->type != 9) {
                $child_course->course_code = null;
                $child_course->featured = 0;
                $child_course->type = 4;
                if ($request->has('cna_prep_type') && $request->cna_prep_type == 1) {
                    $child_course->price = '';
                    $child_course->thumbnail = $this->saveCroppedImage($request->full_course_thumbnail_image);
                    $child_course->image = $this->saveImage($request->full_course_main_image);

                    $child_course->parent_id = $course->id;
                    $art = $child_course->getAttributes();
                    if (array_key_exists('id', $art)) {
                        unset($art['id']);
                    }
                    if (array_key_exists('updated_at', $art)) {
                        unset($art['updated_at']);
                    }
                    if (array_key_exists('created_at', $art)) {
                        unset($art['created_at']);
                    }
                    Course::create($art);
                }

                $child_course->type = 5;
                if ($request->has('test_prep_type') && $request->test_prep_type == 1) {
                    $child_course->price = $request->test_prep_price;
                    $child_course->thumbnail = $this->saveCroppedImage($request->demand_course_thumbnail_image);
                    $child_course->image = $this->saveImage($request->demand_course_main_image);

                    $child_course->parent_id = $course->id;
                    $art = $child_course->getAttributes();
                    if (array_key_exists('id', $art)) {
                        unset($art['id']);
                    }
                    if (array_key_exists('updated_at', $art)) {
                        unset($art['updated_at']);
                    }
                    if (array_key_exists('created_at', $art)) {
                        unset($art['created_at']);
                    }
                    Course::create($art);
                }

                $child_course->type = 6;
                if ($request->has('test_prep_graded_type') && $request->test_prep_graded_type == 1) {
                    $child_course->price = '';
                    $child_course->thumbnail = $this->saveCroppedImage($request->live_course_thumbnail_image);
                    $child_course->image = $this->saveImage($request->live_course_main_image);

                    $child_course->parent_id = $course->id;
                    $art = $child_course->getAttributes();
                    if (array_key_exists('id', $art)) {
                        unset($art['id']);
                    }
                    if (array_key_exists('updated_at', $art)) {
                        unset($art['updated_at']);
                    }
                    if (array_key_exists('created_at', $art)) {
                        unset($art['created_at']);
                    }
                    Course::create($art);
                }

                checkGamification('each_course', 'courses');
                if (isModuleActive('Membership')) {
                    $membershipInterface = App::make(MembershipCourseRepositoryInterface::class);
                }

                if (!empty($request->assign_instructor)) {
                    send_email(
                        User::find($request->assign_instructor),
                        'Course_Assigned_Instructor',
                        [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title
                        ]
                    );
                }
            } elseif (isTutor()) {
                $shortCodes = [
                    'time' => \Illuminate\Support\Carbon::now()->format('d-M-Y ,H:i A'),
                    'title' => $course->title,
                    'price' => $request->price,
                    'instructor' => Auth::user()->name,
                    'type' => 'course',
                ];
                send_email(Auth::user(), 'New_Course_Added', $shortCodes);
            }
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->to(route('getAllCourse'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function AdminUpdateCourse(Request $request)
    {
        Session::flash('type', 'update');
        Session::flash('id', $request->id);

        if (demoCheck()) {
            return redirect()->back();
        }
        Session::flash('type', 'courseDetails');

        $code = auth()->user()->language_code;

        $check_title = Course::where('title', 'LIKE', '%\"' . $request->title . '\"%')->where('id', '!=', $request->id)->get();
        if (count($check_title) > 0) {
            Toastr::error(trans('Course Title Must be Unique'), trans('Error'));
            return redirect()->back();
        }

        $rules = [
            'title' => 'required|max:255',
            'type' => 'required',
            'language' => 'nullable',
            'about.en' => [
                'required',
                //                function ($attribute, $value, $fail) {
                //                    if ($value === '<p><br></p>' || empty($value)) {
                //                        $fail('The ' . $attribute . ' is required.');
                //                    }
                //                },
            ],
            'outcomes.en' => [
                'required',
                //                function ($attribute, $value, $fail) {
                //                    if ($value === '<p><br></p>' || empty($value)) {
                //                        $fail('The ' . $attribute . ' is required.');
                //                    }
                //                },
            ],
            'requirements.en' => [
                'required',
                //                function ($attribute, $value, $fail) {
                //                    if ($value === '<p><br></p>' || empty($value)) {
                //                        $fail('The ' . $attribute . ' is required.');
                //                    }
                //                },
            ],
            'course_code' => ['unique:courses,course_code,'.$request->id],
            //            'cna_prep_type' => 'required_if:type,==,2',
            //            'test_prep_type' => 'required_if:type,==,2',
            //            'test_prep_graded_type' => 'required_if:type,==,2',
            // 'cna_prep_price' => 'required_if:cna_prep_type,==,1',
            // 'full_course_main_image' => 'required_if:test_prep_graded_type,==,1',
            //'assign_instructor' => 'required_unless:type,7',
            'test_prep_price' => 'required_if:test_prep_type,==,1',
            // 'demand_course_main_image' => 'required_if:test_prep_graded_type,==,1',

            // 'test_prep_graded_price' => 'required_if:test_prep_graded_type,==,1',
            // 'live_course_main_image' => 'required_if:test_prep_graded_type,==,1',
            // 'image' => 'nullable|mimes:jpeg,bmp,png,jpg|max:4096',
            // 'hidden_file' => 'nullable|mimes:jpeg,bmp,png,jpg|max:4096',

        ];
        $this->validate($request, $rules, validationMessage($rules));

        if ($request->type == 1) {
            $rules = [
                'duration' => 'nullable',
                'level' => 'nullable',
                'category' => 'required',
            ];
            $this->validate($request, $rules, validationMessage($rules));

            if (isset($request->show_overview_media)) {

                if ($request->get('host') == "Vimeo") {
                    $rules = [
                        'vimeo' => 'required',
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                } elseif ($request->get('host') == "VdoCipher") {
                    $rules = [
                        'vdocipher' => 'required',
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                } elseif ($request->get('host') == "Youtube") {
                    $rules = [
                        'trailer_link' => 'required'
                    ];
                    $this->validate($request, $rules, validationMessage($rules));
                }
            }
        }


        try {
            $course = Course::find($request->id);
            $pre_instructor = $course->user_id;
            $course->scope = $request->scope;
            if ($request->file('parent_course_image') != "") {
                $course->thumbnail = $this->saveCroppedImage($request->parent_course_thumbnail_image);
                $course->image = $this->saveImage($request->parent_course_image);
            }


            //            $course->user_id = Auth::id();

            if (!empty($request->assign_instructor)) {
                $course->user_id = $request->assign_instructor ?? 0;
            }
            $course->drip = $request->drip;
            $course->course_code = $request->course_code ?? null;
            $course->featured = $request->featured ?? 0;
            $course->complete_order = $request->complete_order;
            $course->lang_id = $request->language;
            $course->title = $request->title;
            $course->review_id = $request->review;
            //            foreach ($request->title as $key => $title) {
            //                $course->setTranslation('title', $key, $title);
            //            }

            $about = str_replace("'", "`", $request->about['en']);
            // $about = str_replace("'", "`", $request->about['en']);
            $course->about = $about;
            $requirements = str_replace("'", "`", $request->requirements['en']);
            // $requirements = str_replace("'", "`", $requirements['en']);
            $course->requirements = $requirements;
            $outcomes = str_replace("'", "`", $request->outcomes['en']);
            // $outcomes = str_replace("'", "`", $outcomes['en']);
            $course->outcomes = $outcomes;

            // foreach ($request->about as $key => $about) {
            //     $about = str_replace("'", "`", $about);
            //     $course->setTranslation('about', $key, $about);
            // }

            // foreach ($request->requirements as $key => $requirements) {
            //     $requirements = str_replace("'", "`", $requirements);
            //     $course->setTranslation('requirements', $key, $requirements);
            // }
            // foreach ($request->outcomes as $key => $outcomes) {
            //     $outcomes = str_replace("'", "`", $outcomes);
            //     $course->setTranslation('outcomes', $key, $outcomes);
            // }
            $course->duration = $request->duration;
            $course->subscription_list = $request->subscription_list;

            if (showEcommerce()) {
                if ($request->is_discount == 1) {
                    $course->discount_price = $request->discount_price;
                } else {
                    $course->discount_price = null;
                }
                if ($request->is_free == 1) {
                    $course->price = 0;
                    $course->discount_price = null;
                } else {
                    $course->price = ($course->price == $request->price) ? $request->price : $request->price;
                }
            } else {
                if ($request->price == 9) {
                    $course->price = ($course->price == $request->price) ? $request->price : $request->price;
                    $course->discount_price = null;
                } else {
                    $course->price = 0;
                    $course->discount_price = null;
                }
            }


            $course->level = $request->level;
            $course->school_subject_id = $request->get('school_subject_id', 0);;

            if ($request->iap) {
                $course->iap_product_id = $request->iap_product_id;
            } else {
                $course->iap_product_id = null;
            }
            $course->mode_of_delivery = $request->mode_of_delivery;

            $course->show_overview_media = $request->show_overview_media ? 1 : 0;
            if ($request->get('host') == "Vimeo") {
                if (config('vimeo.connections.main.upload_type') == "Direct") {
                    $vimeoController = new VimeoController();
                    $course->trailer_link = $vimeoController->uploadFileIntoVimeo(md5(time()), $request->vimeo);
                } else {
                    $course->trailer_link = $request->vimeo;
                }
            } elseif ($request->get('host') == "VdoCipher") {
                $course->trailer_link = $request->vdocipher;
            } elseif ($request->get('host') == "Youtube") {
                $course->trailer_link = $request->trailer_link;
            } elseif ($request->get('host') == "Self") {
                if ($request->get('file')) {
                    $course->trailer_link = $this->getPublicPathFromServerId($request->get('file'), 'local');
                }
            } elseif ($request->get('host') == "AmazonS3") {
                if ($request->get('file')) {

                    $course->trailer_link = $this->getPublicPathFromServerId($request->get('file'), 's3');
                }
            } else {
                $course->trailer_link = null;
            }
            if (isModuleActive('Org')) {
                $course->required_type = $request->required_type;
            } else {
                $course->required_type = 0;
            }
            $course->host = $request->host;
            $course->meta_keywords = $request->meta_keywords;
            $course->meta_description = $request->meta_description;
            $course->type = $request->type;
            if ($request->type == 1) {
                $course->quiz_id = null;
                $course->category_id = $request->category;
                $course->subcategory_id = $request->sub_category;
                $course->total_classes = $request->total_courses;
            } elseif ($request->type == 2) {
                $course->quiz_id = $request->quiz;
                $course->category_id = null;
                $course->total_classes = null;
                $course->subcategory_id = null;
            } elseif ($request->type == 9) {
                $course->quiz_id = null;
                $course->type = $request->type;
                $course->category_id = $request->category;
                $course->subcategory_id = $request->sub_category;
                $course->total_classes = null;
            }

            if (Settings('frontend_active_theme') == "edume") {
                $course->what_learn1 = $request->what_learn1;
                $course->what_learn2 = $request->what_learn2;
            }
            if (!empty($request->assistant_instructors)) {
                $assistants = $request->assistant_instructors;
                if (($key = array_search($course->user_id, $assistants)) !== false) {
                    unset($assistants[$key]);
                }
                if (!empty($assistants)) {
                    $course->assistant_instructors = json_encode(array_values($assistants));
                }
            }
            if ($request->type == 7) {
                $course->time_table_id = $request->timetable;
            }
            $child_course = $course;
            $course->save();

            if ($request->type != 9) {

                $child_course1 = Course::where('type', 4)->where('parent_id', $request->id)->first();

                if (empty($child_course1)) {

                    $child_course->parent_id = $course->id;
                    $child_course->type = 4;
                    $child_course->price = null;
                    $child_course->course_code = null;
                    $child_course->featured = ($request->has('cna_prep_featured') && $request->cna_prep_featured == 1) ? 1 : 0;
                    
                    if ($request->has('cna_prep_type') && $request->cna_prep_type == 1) {

                        if ($request->file('full_course_main_image') != "") {

                            $child_course->thumbnail = $this->saveCroppedImage($request->full_course_thumbnail_image);
                            $child_course->image = $this->saveImage($request->full_course_main_image);
                        }

                        $art = $child_course->getAttributes();
                        if (array_key_exists('id', $art)) {
                            unset($art['id']);
                        }
                        if (array_key_exists('updated_at', $art)) {
                            unset($art['updated_at']);
                        }
                        if (array_key_exists('created_at', $art)) {
                            unset($art['created_at']);
                        }

                        Course::create($art);
                    }
                } else {
                    if ($request->has('cna_prep_type') && $request->cna_prep_type == 1) {

                        if ($request->file('full_course_main_image') != "") {
                            $child_course1->thumbnail = $this->saveCroppedImage($request->full_course_thumbnail_image);
                            $child_course1->image = $this->saveImage($request->full_course_main_image);
                        }
                        $child_course1->price = null;
                        $child_course1->featured = ($request->has('cna_prep_featured') && $request->cna_prep_featured == 1) ? 1 : 0;
                        $child_course1->save();
                    } else {

                        if (isset($child_course1->id)) {
                            $child_course1->delete();
                        }
                    }
                }


                $child_course2 = Course::where('type', 5)->where('parent_id', $request->id)->first();
                if (empty($child_course2)) {

                    $child_course->parent_id = $course->id;
                    $child_course->type = 5;
                    $child_course->course_code = null;
                    $child_course->featured = ($request->has('test_prep_featured') && $request->test_prep_featured == 1) ? 1 : 0;

                    if ($request->has('test_prep_type') && $request->test_prep_type == 1) {

                        $child_course->price = $request->test_prep_price;

                        if ($request->file('demand_course_main_image') != "") {
                            $child_course->thumbnail = $this->saveCroppedImage($request->demand_course_thumbnail_image);
                            $child_course->image = $this->saveImage($request->demand_course_main_image);
                        }
                        
                        $art = $child_course->getAttributes();
                        if (array_key_exists('id', $art)) {
                            unset($art['id']);
                        }
                        if (array_key_exists('updated_at', $art)) {
                            unset($art['updated_at']);
                        }
                        if (array_key_exists('created_at', $art)) {
                            unset($art['created_at']);
                        }

                        Course::create($art);
                    }
                } else {

                    if ($request->has('test_prep_type') && $request->test_prep_type == 1) {

                        $child_course2->price = $request->test_prep_price;

                        if ($request->file('demand_course_main_image') != "") {
                            $child_course2->thumbnail = $this->saveCroppedImage($request->demand_course_thumbnail_image);
                            $child_course2->image = $this->saveImage($request->demand_course_main_image);
                        }
                        $child_course2->featured = ($request->has('test_prep_featured') && $request->test_prep_featured == 1) ? 1 : 0;
                        $child_course2->save();
                    } else {

                        if (isset($child_course2->id)) {
                            $child_course2->delete();
                        }
                    }
                }



                $child_course3 = Course::where('type', 6)->where('parent_id', $request->id)->first();
                if (empty($child_course3)) {

                    $child_course->parent_id = $course->id;
                    $child_course->type = 6;
                    $child_course->price = null;
                    $child_course->course_code = null;
                    $child_course->featured = ($request->has('test_prep_graded_featured') && $request->test_prep_graded_featured == 1) ? 1 : 0;
                    if ($request->has('test_prep_graded_type') && $request->test_prep_graded_type == 1) {
                        if ($request->file('live_course_main_image') != "") {
                            $child_course->thumbnail = $this->saveCroppedImage($request->live_course_thumbnail_image);
                            $child_course->image = $this->saveImage($request->live_course_main_image);
                        }

                        $art = $child_course->getAttributes();
                        if (array_key_exists('id', $art)) {
                            unset($art['id']);
                        }
                        if (array_key_exists('updated_at', $art)) {
                            unset($art['updated_at']);
                        }
                        if (array_key_exists('created_at', $art)) {
                            unset($art['created_at']);
                        }
                        Course::create($art);
                    }
                } else {
                    if ($request->has('test_prep_graded_type') && $request->test_prep_graded_type == 1) {
                        if ($request->file('live_course_main_image') != "") {
                            $child_course3->thumbnail = $this->saveCroppedImage($request->live_course_thumbnail_image);
                            $child_course3->image = $this->saveImage($request->live_course_main_image);
                        }
                        
                        $child_course3->featured = ($request->has('test_prep_graded_featured') && $request->test_prep_graded_featured == 1) ? 1 : 0;
                        $child_course3->price = null;
                        $child_course3->save();
                    } else {
                        if (isset($child_course3->id)) {
                            $child_course3->delete();
                        }
                    }
                }
            }


            if (!empty($request->assign_instructor) && $pre_instructor != $request->assign_instructor) {
                send_email(
                    User::find($course->user_id),
                    'Course_Assigned_Instructor',
                    [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title
                    ]
                );
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('getAllCourse');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function AdminUpdateCourseCertificate(Request $request)
    {

        Session::flash('type', 'certificate');
        Session::flash('id', $request->course_id);

        if (demoCheck()) {
            return redirect()->back();
        }


        $rules = [
            'certificate' => 'required',

        ];
        $this->validate($request, $rules, validationMessage($rules));


        try {

            $course = Course::find($request->course_id);
            $course->certificate_id = $request->certificate;
            $course->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }


    public function CourseQuetionShow($question_id, $id, $chapter_id, $lesson_id)
    {
        try {
            $levels = QuestionLevel::get();
            $groups = QuestionGroup::get();
            $banks = [];
            $bank = QuestionBank::with('category', 'subCategory', 'questionGroup')->find($question_id);
            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->get();
            $data = [];
            $data['lesson_id'] = $lesson_id;
            $data['chapter_id'] = $chapter_id;
            $data['edit_chapter_id'] = $chapter_id;

            $user = Auth::user();
            $course = Course::findOrFail($id);
            if ($course->type == 1) {

                if ($user->role_id == 2) {
                    $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
                } else {
                    $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
                }
            } else {
                if ($user->role_id == 2) {

                    $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->where('status', 1)->latest()->get();
                } else {
                    $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
                }
            }

            $chapters = Chapter::where('course_id', $id)->orderBy('position', 'asc')->with('lessons')->get();

            // $course = Course::findOrFail($id);
            // if ($course->type == 1) {

            //     if (in_array(Auth::user()->role_id, [2, 9])) {
            //         $quizzes = OnlineQuiz::where('status', 1)->where('created_by', Auth::user()->id)->latest()->get();
            //     } else {
            //         $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
            //     }
            // } else {
            //     if (in_array(Auth::user()->role_id, [2, 9])) {

            //         $quizzes = OnlineQuiz::where('status', 1)->where('created_by', Auth::user()->id)->where('status', 1)->latest()->get();
            //     } else {
            //         $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
            //     }
            // }

            // $chapters = Chapter::where('course_id', $id);
            // if (isTutor()) {
            //     $chapters = $chapters->where('user_id', Auth::id());
            // }
            // $chapters = $chapters->orderBy('position', 'asc')->with('lessons')->get();



            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->get();
            $instructor_query = User::select('name', 'id');
            if (isModuleActive('UserType')) {
                $instructor_query->whereHas('userRoles', function ($q) {
                    $q->whereIn('role_id', [1, 2]);
                });
            } else {
                $instructor_query->whereIn('role_id', [1, 2]);
            }
            $instructors = $instructor_query->get();
            $languages = Language::select('id', 'native', 'code')
                ->where('status', '=', 1)
                ->get();
            $course_exercises = CourseExercise::where('course_id', $id)->get();


            $video_list = [];
            $vdocipher_list = [];
            $levels = CourseLevel::where('status', 1)->get();
            if (Auth::user()->role_id == 1) {
                $certificates = Certificate::latest()->get();
            } else {
                $certificates = Certificate::where('created_by', Auth::user()->id)->latest()->get();
            }

            $timetables = TimeTable::where('status', 1)->where('type','Individual')->latest()->get();
            $course_reviews = CourseReveiw::where('course_id',$id)->latest()->get();
            $reviews = CourseReveiw::where('course_id',$id)->latest()->get();
            return view('coursesetting::course_details', compact('data', 'bank', 'vdocipher_list', 'levels', 'video_list', 'course', 'chapters', 'categories', 'instructors', 'languages', 'course_exercises', 'quizzes', 'certificates', 'reviews', 'timetables','course_reviews'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function CourseLessonShow($id, $chapter_id, $lesson_id)
    {
        try {
            $data = [];
            $data['edit_lesson_id'] = $lesson_id;
            $data['chapter_id'] = $chapter_id;

            $user = Auth::user();
            $course = Course::findOrFail($id);
            if ($course->type == 1) {
                if ($user->role_id == 2) {
                    $quizzes = OnlineQuiz::where('created_by', $user->id)->latest()->get();
                } else {
                    $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
                }
            } else {
                if ($user->role_id == 2) {
                    $quizzes = OnlineQuiz::where('created_by', $user->id)->where('status', 1)->latest()->get();
                } else {
                    $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
                }
            }

            $chapters = Chapter::where('course_id', $id)->orderBy('position', 'asc')->with('lessons')->get();

            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->get();
            $instructor_query = User::select('name', 'id');
            if (isModuleActive('UserType')) {
                $instructor_query->whereHas('userRoles', function ($q) {
                    $q->whereIn('role_id', [1, 2]);
                });
            } else {
                $instructor_query->whereIn('role_id', [1, 2]);
            }
            $instructors = $instructor_query->get();
            $languages = Language::select('id', 'native', 'code')
                ->where('status', '=', 1)
                ->get();
            $course_exercises = CourseExercise::where('course_id', $id)->get();

            $video_list = [];
            $vdocipher_list = [];

            $levels = CourseLevel::where('status', 1)->get();
            if (Auth::user()->role_id == 1) {
                $certificates = Certificate::latest()->get();
            } else {
                $certificates = Certificate::where('created_by', Auth::user()->id)->latest()->get();
            }
            $editLesson = Lesson::where('id', $lesson_id)->first();


            $data['isDefault'] = false;
            if (isModuleActive('Org')) {
                $material = OrgMaterial::where('link', $editLesson->video_url)->first();
                if ($material) {
                    $data['isDefault'] = false;
                } else {
                    $data['isDefault'] = true;
                }
            }
            $timetables = TimeTable::where('status', 1)->where('type','Individual')->latest()->get();
            $course_reviews = CourseReveiw::where('course_id',$id)->latest()->get();
            $reviews = CourseReveiw::where('course_id',$id)->latest()->get();

            return view('coursesetting::course_details', $data, compact('data', 'editLesson', 'levels', 'video_list', 'vdocipher_list', 'course', 'chapters', 'categories', 'instructors', 'languages', 'course_exercises', 'quizzes', 'certificates', 'timetables', 'reviews','course_reviews'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function CourseChapterShow($id, $chapter_id)
    {
        try {
            $data = [];
            $data['chapter_id'] = $chapter_id;

            $user = Auth::user();
            $course = Course::findOrFail($id);
            if ($course->type == 1) {
                if ($user->role_id == 2) {
                    $quizzes = OnlineQuiz::where('created_by', $user->id)->latest()->get();
                } else {
                    $quizzes = OnlineQuiz::latest()->get();
                }
            } else {
                if ($user->role_id == 2) {
                    $quizzes = OnlineQuiz::where('created_by', $user->id)->where('active_status', 1)->get();
                } else {
                    $quizzes = OnlineQuiz::where('active_status', 1)->get();
                }
            }

            $chapters = Chapter::where('course_id', $id)->orderBy('position', 'asc')->with('lessons')->get();

            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->get();
            $instructor_query = User::select('name', 'id');
            if (isModuleActive('UserType')) {
                $instructor_query->whereHas('userRoles', function ($q) {
                    $q->whereIn('role_id', [1, 2]);
                });
            } else {
                $instructor_query->whereIn('role_id', [1, 2]);
            }
            $instructors = $instructor_query->get();
            $languages = Language::select('id', 'native', 'code')
                ->where('status', '=', 1)
                ->get();
            $course_exercises = CourseExercise::where('course_id', $id)->get();

            $video_list = [];
            $vdocipher_list = [];

            $levels = CourseLevel::where('status', 1)->get();
            if (Auth::user()->role_id == 1) {
                $certificates = Certificate::latest()->get();
            } else {
                $certificates = Certificate::where('created_by', Auth::user()->id)->latest()->get();
            }
            $editChapter = Chapter::where('id', $chapter_id)->first();
            $timetables = TimeTable::where('status', 1)->where('type','Individual')->latest()->get();
            $course_reviews = CourseReveiw::where('course_id',$id)->latest()->get();
            $reviews = CourseReveiw::where('course_id',$id)->latest()->get();

            return view('coursesetting::course_details', compact('data', 'editChapter', 'levels', 'video_list', 'vdocipher_list', 'course', 'chapters', 'categories', 'instructors', 'languages', 'course_exercises', 'quizzes', 'certificates', 'timetables', 'reviews','course_reviews'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }


    public function courseDetails($id, $data = null)
    {
        $user = Auth::user();

        $course = Course::findOrFail($id);

        if ($course->type == 1) {

            if ($user->role_id == 2 || $user->role_id == 9) {
                $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
            } else {
                $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
            }
        } else {
            if ($user->role_id == 2 || $user->role_id == 9) {

                $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->get();
            } else {
                $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
            }
        }

        $timetables = TimeTable::where('status', 1)->where('type','Individual')->latest()->get();

        $chapters = Chapter::where('course_id', $id)->orderBy('position', 'asc')->with('lessons')->get();

        $query = Category::orderBy('position_order', 'ASC');
        if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
            $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
            $query->whereIn('id', $assign);
        }
        $categories = $query->with('parent')->get();
        $instructor_query = User::select('name', 'id');
        if (isModuleActive('UserType')) {
            $instructor_query->whereHas('userRoles', function ($q) {
                $q->whereIn('role_id', [1, 2]);
            });
        } else {
            $instructor_query->whereIn('role_id', [1, 2]);
        }
        $instructors = $instructor_query->get();
        $languages = Language::select('id', 'native', 'code')
            ->where('status', '=', 1)
            ->get();
        $course_exercises = CourseExercise::where('course_id', $id)->get();

        $video_list = [];
        $vdocipher_list = [];


        $levels = CourseLevel::where('status', 1)->get();
        if (Auth::user()->role_id == 1) {
            $certificates = Certificate::latest()->get();
        } else {
            $certificates = Certificate::where('created_by', Auth::user()->id)->latest()->get();
        }
        $subjects = [];
        if (currentTheme() == 'tvt') {
            $subjects = SchoolSubject::where('status', 1)->orderBy('order', 'asc')->get();
        }
        $course_reviews = CourseReveiw::where('course_id',$id)->latest()->get();
        $reviews = CourseReveiw::get();
        // $reviews = CourseReveiw::where('course_id',$id)->latest()->get();
        // dd($course, $languages);
        return view('coursesetting::course_details', compact('timetables', 'subjects', 'data', 'vdocipher_list', 'levels', 'video_list', 'course', 'chapters', 'categories', 'instructors', 'languages', 'course_exercises', 'quizzes', 'certificates', 'reviews','course_reviews'));
    }

    public function setCourseDripContent(Request $request)
    {

        Session::flash('type', 'drip');

        $lesson_id = $request->get('lesson_id');
        $lesson_date = $request->get('lesson_date');
        $lesson_day = $request->get('lesson_day');
        $drip_type = $request->get('drip_type');


        if (!empty($lesson_id) && is_array($lesson_id)) {
            foreach ($lesson_id as $l_key => $l_id) {
                $lesson = Lesson::find($l_id);

                if ($lesson) {

                    $checkType = $drip_type[$l_key];

                    if ($checkType == 1) {
                        $lesson->unlock_days = null;

                        if (!empty($lesson_date[$l_key])) {
                            $lesson->unlock_date = date('Y-m-d', strtotime($lesson_date[$l_key]));
                        } else {
                            $lesson->unlock_date = null;
                        }
                    } else {
                        $lesson->unlock_date = null;
                        if (!empty($lesson_day[$l_key])) {
                            $lesson->unlock_days = $lesson_day[$l_key];
                        } else {
                            $lesson->unlock_days = null;
                        }
                    }


                    $lesson->save();
                }
            }
        }
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }


    public function changeChapterPosition(Request $request)
    {
        $ids = $request->get('ids');
        if (count($ids) != 0) {
            foreach ($ids as $key => $id) {

                $chapter = Chapter::find($id);
                if ($chapter) {
                    $chapter->position = $key + 1;
                    $chapter->save();
                }
            }
        }
        return true;
    }

    public function changeLessonPosition(Request $request)
    {
        $ids = $request->get('ids');
        if (count($ids) != 0) {
            foreach ($ids as $key => $id) {
                $lesson = Lesson::find($id);
                if ($lesson) {
                    $lesson->position = $key + 1;
                    $lesson->save();
                }
            }
        }
        return true;
    }


    public function courseDelete($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        //        $hasCourse = CourseEnrolled::where('course_id', $id)->count();
        //        if ($hasCourse != 0) {
        //            Toastr::error('Course Already Enrolled By ' . $hasCourse . ' Student', trans('common.Failed'));
        //            return redirect()->back();
        //        }


        $course = Course::findOrFail($id);

        $related_lessons = $course->lessons()->count();
        $related_enrolled_users = $course->enrollUsers()->count();
        $related_quiz = $course->quiz()->count();
        $related_class = $course->class()->count();
        $related_chapter = $course->chapters()->count();


        if (
            $related_lessons > 0 ||
            $related_enrolled_users > 0 ||
            $related_quiz > 0 ||
            $related_class > 0 ||
            $related_chapter > 0
        ) {
            Toastr::error('Course has ' . $this->checkRelations(
                $related_lessons,
                $related_enrolled_users,
                $related_quiz,
                $related_class,
                $related_chapter
            ) . ', Please Delete these First then Delete Course', 'Error');
            return redirect()->back();
        }

        if (count($course->classes) > 0) {
                Toastr::error('This course have some ongoing classes. Please remove them first', 'Failed');
                return back();
            }

        $cna_prep_price = CourseEnrolled::where('course_type', 4)->where('course_id', $id)->count();
        if ($cna_prep_price != 0) {
            Toastr::error('Course CNA prep Already Enrolled By ' . $cna_prep_price . ' Student', trans('common.Failed'));
            return redirect()->back();
        }
        $test_prep_price = CourseEnrolled::where('course_type', 5)->where('course_id', $id)->count();
        if ($test_prep_price != 0) {
            Toastr::error('Course CNA prep Already Enrolled By ' . $test_prep_price . ' Student', trans('common.Failed'));
            return redirect()->back();
        }
        $test_prep_graded_price = CourseEnrolled::where('course_type', 6)->where('course_id', $id)->count();
        if ($test_prep_graded_price != 0) {
            Toastr::error('Course CNA prep Already Enrolled By ' . $test_prep_graded_price . ' Student', trans('common.Failed'));
            return redirect()->back();
        }


        $carts = Cart::where('course_id', $id)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }


        if ($course->host == "Self") {
            if (file_exists($course->trailer_link)) {
                unlink($course->trailer_link);
            }
        }
        if (file_exists($course->image)) {
            unlink($course->image);
        }

        if (file_exists($course->thumbnail)) {
            unlink($course->thumbnail);
        }


        // $chapters = Chapter::where('course_id', $course->id)->get();
        // // $chapters->lessons()
        // foreach ($chapters as $chapter) {
        //     $lessons = Lesson::where('chapter_id', $chapter->id)->where('course_id', $course->id)->get();
        //     foreach ($lessons as $key => $lesson) {
        //         $complete_lessons = LessonComplete::where('lesson_id', $lesson->id)->get();
        //         foreach ($complete_lessons as $complete) {
        //             $complete->delete();
        //         }
        //         $lessonController = new LessonController();
        //         $lessonController->lessonFileDelete($lesson);
        //         $lesson->delete();
        //     }

        //     $chapter->delete();
        // }

        if (isModuleActive('BundleSubscription')) {
            $bundle = BundleCourse::where('course_id', $course->id)->get();
            foreach ($bundle as $b) {
                $b->delete();
            }
        }
        Course::where('parent_id', $course->id)->delete();
        $course->delete();

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function checkRelations(
        $related_lessons = '',
        $related_enrolled_users = '',
        $related_quiz = '',
        $related_class = '',
        $related_chapter = ''
    ) {
        return (!empty($related_lessons) ? 'Lesson' : '') .
            (!empty($related_enrolled_users) ? ', Enrolled User' : '') .
            (!empty($related_quiz) ? ', Quiz' : '') .
            (!empty($related_class) ? ', Class' : '') .
            (!empty($related_chapter) ? ' and Chapter' : '');
    }

    public function tutorCourseList(Request $request)
    {
        $course_sale = Course::where('type', 9)->orderBy('created_at', 'desc')->get();
        return view('coursesetting::tutor_courses', compact('course_sale','request'));
    }

    public function getTutorCourseData(Request $request){
    if($request->has('tutor_id')){

        $query = Course::where('type', 9)->where('user_id',$request->tutor_id)->orderBy('seq_no', 'desc')->get();
    }else{
      $query = Course::where('type', 9)->orderBy('seq_no', 'desc')->get();
    }
      return DataTables::of($query)
          ->addColumn('title', function (Course $course) {
              return $course->title;
          })
          ->addColumn('price', function (Course $course) {
              return $course->price;
          })
          ->addColumn('tax', function (Course $course) {
              return $course->tax;
          })
          ->addColumn('lessons', function (Course $course) {
              return $course->lessons->count();
          })
          ->addColumn('user', function (Course $course) {
            if(isAdmin()){

                return $course->user->name;
            }else {
                 return '';
            }

            
          })
          ->addColumn('status', function (Course $course) {
              return view('coursesetting::components._course_status_td', ['query' => $course]);
          })
          ->addColumn('action', function (Course $course) {
              $html = '';
              $html = '<div class="dropdown CRM_dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">Action</button>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                          <a href="'.route('courseDetails',[$course->id]).'" class="dropdown-item">Edit</a>
                          <a href="javascript:void(0);"  class="dropdown-item" onclick="confirm_modal(\''.route('Delete.TimeTable', [$course->id]).'\')">Delete</a>
                          </div>
                      </div>';
              return $html;
          })
          //             ->only(['title', 'start_date', 'end_date', 'price', 'action'])
          ->rawColumns(['action'])
          ->addIndexColumn()
          // ->make(true);
          ->toJson();
      return view('coursesetting::repeat_course_list', compact('course_sale_list'));
    }

    public function getAllCourseData(Request $request)
    {
      if(isTutor()){
        $whereIn = [1,2,7,9];
      }else{
        $whereIn = [1, 2, 7];
      }
        $query = Course::whereIn('type', $whereIn)->orderBy('seq_no', 'desc')->with('category', 'quiz', 'user', 'parent');

        if ($request->course_status != "") {
            if ($request->course_status == 1) {
                $query->where('courses.status', 1);
            } elseif ($request->course_status == 0) {
                $query->where('courses.status', 0);
            }
        }
        if ($request->category != "") {
            $query->where('category_id', $request->category);
        }
        if ($request->type != "") {
            $query->where('type', $request->type);
        }
        if ($request->instructor != "") {
            $query->where('user_id', $request->instructor);
        }
        if ($request->search_status != "") {
            $query->where('courses.status', $request->search_status);
        }
        if ($request->required_type != "") {
            $query->where('required_type', $request->required_type);
        }
        if ($request->mode_of_delivery != "") {
            $query->where('mode_of_delivery', $request->mode_of_delivery);
        }


        if (isInstructor()) {
            $query->where('user_id', '=', Auth::id());
            $query->orWhere('assistant_instructors', 'like', '%"{' . Auth::id() . '}"%');
        }
        if (isTutor()) {
            $query->where('user_id', '=', Auth::id());
        }
        if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
            $assigns = Auth::user()->policy->course_assigns;
            $ids = [];
            foreach ($assigns as $assign) {
                $ids[] = $assign->course_id;
            }
            $query->orWhereIn('id', $ids);
        }

        if (isModuleActive('Organization') && Auth::user()->isOrganization()) {
            $query->whereHas('user', function ($q) {
                $q->where('organization_id', Auth::id());
                $q->orWhere('user_id', Auth::id());
            });
        }

        $query->select('courses.*');

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('title', function ($query) {
                return $query->title;
            })
            ->editColumn('course_code', function ($query) {
                return $query->course_code ?? '';
            })
            ->editColumn('required_type', function ($query) {
                return $query->required_type == 1 ? trans('courses.Compulsory') : trans('courses.Open');
            })->editColumn('mode_of_delivery', function ($query) {
                if ($query->mode_of_delivery == 1) {
                    $title = trans('courses.Online');
                } elseif ($query->mode_of_delivery == 2) {
                    $title = trans('courses.Distance Learning');
                } else {
                    if (isModuleActive('Org')) {
                        $title = trans('courses.Offline');
                    } else {
                        $title = trans('courses.Face-to-Face');
                    }
                }
                return $title;
            })
            ->addColumn('type', function ($query) {
                if ($query->type == 1) {
                    return trans('courses.Course');
                } elseif ($query->type == 7) {
                    return trans('Time Table');
                } elseif ($query->type == 9) {
                    return trans('Tutor Course');
                } else {
                    return trans('Big Quiz');
                }
            })->addColumn('status', function ($query) {
                return view('coursesetting::components._course_status_td', ['query' => $query]);
            })->addColumn('lessons', function ($query) {
                return $query->lessons->count();
            })
            ->editColumn('category', function ($query) {
                if ($query->category && !isTutor()) {
                    return $query->category->name;
                } else {
                    return '';
                }
            })
            ->editColumn('test_prep_type', function ($query) {
                $test_prep_type = '';
                if ($query->type == 1 && !isTutor()) {
                    foreach ($query->children as $child) {
                        if ($query->has('children') && $child->type == 4) {
                            $test_prep_type .= '<i class="fa fa-arrow-right"></i> Full Course';
                        }
                        if ($query->has('children') && $child->type == 5) {
                            $test_prep_type .= '<br><i class="fa fa-arrow-right"></i>  Prep-Course(on-demand)';
                        }
                        if ($query->has('children') && $child->type == 6) {
                            $test_prep_type .= '<br><i class="fa fa-arrow-right"></i>  Prep-Course(live)';
                        }
                    }
                }

                return $test_prep_type;
            })
            ->editColumn('quiz', function ($query) {
                if ($query->quiz) {
                    return $query->quiz->title;
                } else {
                    return '';
                }
            })->editColumn('user', function ($query) {
                if ($query->user && isAdmin()) {
                    return $query->user->name;
                } else {
                    return '';
                }
            })->addColumn('enrolled_users', function ($query) {
                return $query->enrollUsers->where('teach_via', 1)->count() . "/" . $query->enrollUsers->where('teach_via', 2)->count();
            })
            ->editColumn('scope', function ($query) {
                if ($query->scope == 1) {
                    $scope = trans('courses.Public');
                } else {
                    $scope = trans('courses.Private');
                }
                return $scope;
            })->addColumn('price', function ($query) {
                return view('coursesetting::components._course_price_td', ['query' => $query]);
            })->addColumn('action', function ($query) {
                return view('coursesetting::components._course_action_td', ['query' => $query]);
            })->rawColumns(['status', 'price', 'action', 'enrolled_users', 'test_prep_type'])
            ->make(true);
    }

    public function addNewCourse()
    {

        if (saasPlanCheck('course')){
            Toastr::error('You have reached valid course limit', trans('common.Failed'));
            return redirect()->back();
        }

        $user = Auth::user();
        $video_list = [];
        $vdocipher_list = [];
        $query = Category::orderBy('position_order', 'ASC');

       // dd(isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1);
        if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
            $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
            $query->whereIn('id', $assign);
        }
        $categories = $query->with('parent')->get();
      //  dd($categories);
        if ($user->role_id == 2) {
            $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
        } else {
            $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
        }
        $timetables = TimeTable::where('status', 1)->where('type','Individual')->latest()->get();

        $instructor_query = User::select('name', 'id');
        if (isModuleActive('UserType')) {
            $instructor_query->whereHas('userRoles', function ($q) {
                $q->whereIn('role_id', [1, 2]);
            });
        } else {
            $instructor_query->whereIn('role_id', [1, 2]);
        }
        $instructors = $instructor_query->get();
        $languages = Language::select('id', 'native', 'code')
            ->where('status', '=', 1)
            ->get();
        $levels = CourseLevel::where('status', 1)->get();
        $title = trans('courses.All');

       $sub_lists = $this->getSubscriptionList();
        $subjects = [];
        if (currentTheme() == 'tvt') {
            $subjects = SchoolSubject::where('status', 1)->orderBy('order', 'asc')->get();
        }

        $reviews = CourseReveiw::get();
        // dd($reviews);

        return view('coursesetting::add_course', compact('timetables', 'subjects', 'sub_lists', 'levels', 'video_list', 'vdocipher_list', 'title', 'quizzes', 'categories', 'languages', 'instructors', 'vdocipher_list', 'reviews'));
    }



     // public function addNewCourse()
    // {


    //     if (saasPlanCheck('course')) {
    //         Toastr::error('You have reached valid course limit', trans('common.Failed'));
    //         return redirect()->back();
    //     }
    //     $user = Auth::user();

    //     $video_list = [];
    //     $vdocipher_list = [];


    //     $query = Category::orderBy('position_order', 'ASC');
    //     //dd(isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1);
    //     if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
    //         $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
    //         $query->whereIn('id', $assign);
    //     }
    //     $categories = $query->with('parent')->get();
    //     if ($user->role_id == 2) {
    //         $quizzes = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
    //     } else {
    //         $quizzes = OnlineQuiz::where('status', 1)->latest()->get();
    //     }
    //     $timetables = TimeTable::where('status', 1)->latest()->get();

    //     $instructor_query = User::select('name', 'id');
    //     if (isModuleActive('UserType')) {
    //         $instructor_query->whereHas('userRoles', function ($q) {
    //             $q->whereIn('role_id', [1, 2]);
    //         });
    //     } else {
    //         $instructor_query->whereIn('role_id', [1, 2]);
    //     }
    //     $instructors = $instructor_query->get();

    //     $languages = Language::select('id', 'native', 'code')
    //         ->where('status', '=', 1)
    //         ->get();
    //     $levels = CourseLevel::where('status', 1)->get();
    //     $title = trans('courses.All');

    //     $sub_lists = $this->getSubscriptionList();

    //     $subjects = [];
    //     if (currentTheme() == 'tvt') {
    //         $subjects = SchoolSubject::where('status', 1)->orderBy('order', 'asc')->get();
    //     }

    //     $reviews = CourseReveiw::get();

    //     return view('coursesetting::add_course', compact('timetables', 'subjects', 'sub_lists', 'levels', 'video_list', 'vdocipher_list', 'title', 'quizzes', 'categories', 'languages', 'instructors', 'vdocipher_list', 'reviews'));
    // }










    public function changeLessonChapter(Request $request)
    {
        $chapter_id = $request->chapter_id;
        $lesson_id = $request->lesson_id;

        $lesson = Lesson::findOrFail($lesson_id);
        $lesson->chapter_id = $chapter_id;
        $lesson->save();
        return true;
    }

    public function courseMakeAsFeature($id, $type)
    {
        try {
            if ($type == "make") {
                $items = Course::all();
                foreach ($items as $item) {
                    if ($id == $item->id) {
                        $featureStatus = 1;
                    } else {
                        $featureStatus = 0;
                    }
                    $item->feature = $featureStatus;
                    $item->save();
                }
            } else {
                $course = Course::find($id);
                $course->feature = 0;
                $course->save();
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->to(route('getAllCourse'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function CourseQuestionDelete($quiz_id, $question_id)
    {
        $assign = OnlineExamQuestionAssign::where('online_exam_id', $quiz_id)->where('question_bank_id', $question_id)->first();
        if ($assign) {
            $assign->delete();
        }

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }


    public function lessonFlies($id)
    {
        $lesson = Lesson::findOrFail($id);
        $files = $lesson->files;
        return view('coursesetting::version', compact('lesson', 'files'));
    }

    public function setting()
    {
        return view('coursesetting::setting');
    }

    public function settingSubmit(Request $request)
    {
        foreach ($request->except(['_token']) as $key => $value) {
            UpdateGeneralSetting($key, $value);
        }

        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function addNewCourseData()
    {
        if (saasPlanCheck('course')) {
            Toastr::error('You have reached valid course limit', trans('common.Failed'));
            return redirect()->back();
        }
        $user = Auth::user();

        $video_list = [];
        $vdocipher_list = [];


        $query = Category::orderBy('position_order', 'ASC');
        if (isModuleActive('OrgInstructorPolicy')) {
            $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
            $query->whereIn('id', $assign);
        }
        $data['categories'] = $query->with('parent')->get();
        if ($user->role_id == 2) {
            $data['quizzes'] = OnlineQuiz::where('status', 1)->where('created_by', $user->id)->latest()->get();
        } else {
            $data['quizzes'] = OnlineQuiz::where('status', 1)->latest()->get();
        }

        $data['instructors'] = User::whereIn('role_id', [1, 2])->select('name', 'id')->get();
        $data['languages'] = Language::select('id', 'native', 'code')
            ->where('status', '=', 1)
            ->get();
        $data['levels'] = CourseLevel::where('status', 1)->get();
        $data['title'] = trans('courses.All');

        $data['sub_lists'] = $this->getSubscriptionList();
        return $data;
    }

    public function addToSale($id)
    {
        $course = Course::where('parent_id', $id)->where('type', 8)->with('course_sale_data')->first();

        $parent = Course::where('id', $id);
        if ($course == null) {
            $parent = $parent->with(['chapters.lessons' => function ($q) {
                $q->select(['id', 'name', 'chapter_id', 'quiz_id']);
            }, 'files', 'chapters.lessons.quiz']);
        } else {
            $parent = $parent->with(['chapters.course_check' => function ($q) use ($course) {
                $q->where('course_id', $course->id);
            }, 'chapters.lessons.course_check' => function ($q) use ($course) {
                $q->where('course_id', $course->id);
            }, 'chapters.lessons' => function ($q) {
                $q->select(['id', 'name', 'chapter_id', 'quiz_id']);
            }, 'files.course_check' => function ($q) use ($course) {
                $q->where('course_id', $course->id);
            }]);
        }
        $parent = $parent->first();
        $timetables = TimeTable::where('status', 1)->where('type','Repeat')->latest()->get();

        return view('coursesetting::repeat_course', compact('parent', 'course', 'timetables'));
    }

    public function saveAddToSale(Request $request)
    {
        $today = Carbon::now()->format('m/d/Y');
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if ($start_date > $end_date) {
            Toastr::error('Start Date Should Not Greater then End Date !', 'Error');
            return redirect()->back();
        }

        if ($today > $start_date) {
            Toastr::error('Start Date Should Not Less then Today !', 'Error');
            return redirect()->back();
        }

        // $date_exist = Course::where(function ($check) use ($start_date, $end_date) {
        //     $check->whereBetween('start_date', [$start_date, $end_date])
        //         ->orWhereBetween('end_date', [$start_date, $end_date])
        //         ->orWhere('start_date', $end_date)
        //         ->orWhere('end_date', $start_date)
        //         ->orWhere(function ($check) use ($start_date, $end_date) {
        //             $check->where('start_date', '<=', $start_date)
        //                 ->where('end_date', '>=', $end_date);
        //         });
        // })->exists();

        // if ($date_exist == true) {
        //     Toastr::error('The selected Dates have another Course on Sale, Please Change Dates !', 'Error');
        //     return redirect()->back();
        // }

        $request->validate(
            [
                'start_date' => 'required',
                'end_date' => 'required',
                'price' => 'required',
                'timetable' => 'required',

                'card_1_heading' => 'nullable|max:60',
                'card_1_subheading' => 'nullable|max:60',
                'card_1_text' => 'nullable|max:400',

                'card_2_heading' => 'nullable|max:60',
                'card_2_subheading' => 'nullable|max:60',
                'card_2_text' => 'nullable|max:400',

                'card_3_heading' => 'nullable|max:60',
                'card_3_subheading' => 'nullable|max:60',
                'card_3_text' => 'nullable|max:400',

                'card_4_heading' => 'nullable|max:60',
                'card_4_subheading' => 'nullable|max:60',
                'card_4_text' => 'nullable|max:400',

                'slider_1_heading' => 'nullable|max:60',
                'slider_1_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
                'slider_1_text' => 'nullable|max:400',

                'slider_2_heading' => 'nullable|max:60',
                'slider_2_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
                'slider_2_text' => 'nullable|max:400',

                'slider_3_heading' => 'nullable|max:60',
                'slider_3_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
                'slider_3_text' => 'nullable|max:400',

                'description' => 'required|max:500'
            ],
            [
                'start_date.required' => 'Please Select Start Date !',
                'end_date.required' => 'Please Select End Date !',
                'price.required' => 'Please Enter Price !',
                'description.required' => 'Please Enter Course Description !',
            ]
        );

        if (!empty($request->course_id)) {
            $course = Course::find($request->course_id);
            $course->price = $request->price;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->end_date = $request->end_date;
            $course->time_table_id = $request->timetable;
            if ($request->hasFile('parent_course_image')) {
                $course->thumbnail = $this->saveCroppedImage($request->parent_course_thumbnail_image);
                $course->image = $this->saveImage($request->parent_course_image);
            }
            $course->update();
        } else {

            $parent_course = Course::find($request->parent_id);
            $parent_course->type = 8;
            $parent_course->price = $request->price;
            $parent_course->parent_id = $request->parent_id;
            $parent_course->start_date = $request->start_date;
            $parent_course->end_date = $request->end_date;
            $parent_course->time_table_id = $request->timetable;
            $last_max_seq = Course::where('type', 8)->max('seq_no');
            $parent_course->seq_no = intval($last_max_seq) + 1;
            if ($request->hasFile('parent_course_image')) {
                $parent_course->thumbnail = $this->saveCroppedImage($request->parent_course_thumbnail_image);
                $parent_course->image = $this->saveImage($request->parent_course_image);
            }

            $course = $parent_course->getAttributes();
            if (array_key_exists('id', $course)) {
                unset($course['id']);
            }
            if (array_key_exists('updated_at', $course)) {
                unset($course['updated_at']);
            }
            if (array_key_exists('created_at', $course)) {
                unset($course['created_at']);
            }

            $course = Course::create($course);
        }

        CourseSale::where('course_id', $course->id)->delete();

        if (isset($request->chapter_ids) && count($request->chapter_ids)) {
            foreach ($request->chapter_ids as $chapter_id) {
                $course_check = new CourseSale();
                $course_check->course_id = $course->id;
                $course_check->content_type = 'chapter';
                $course_check->content_id = $chapter_id;
                $course_check->save();
            }
        }

        if (isset($request->chapter_ids) && count($request->lesson_ids)) {
            foreach ($request->lesson_ids as $lesson_id) {
                $course_check = new CourseSale();
                $course_check->course_id = $course->id;
                $course_check->content_type = 'lesson';
                $course_check->content_id = $lesson_id;
                $course_check->save();
            }
        }

        if (isset($request->chapter_ids) && count($request->course_file_ids)) {
            foreach ($request->course_file_ids as $course_file_id) {
                $course_check = new CourseSale();
                $course_check->course_id = $course->id;
                $course_check->content_type = 'course_file';
                $course_check->content_id = $course_file_id;
                $course_check->save();
            }
        }
        $course_sale_data = CourseSaleData::where('course_id', $course->id)->first();
        if (empty($course_sale_data)) {
            $course_sale_data = new CourseSaleData();
        }

        $course_sale_data->card_1_heading = $request->card_1_heading;
        $course_sale_data->card_1_subheading = $request->card_1_subheading;
        $course_sale_data->card_1_text = $request->card_1_text;

        $course_sale_data->card_2_heading = $request->card_2_heading;
        $course_sale_data->card_2_subheading = $request->card_2_subheading;
        $course_sale_data->card_2_text = $request->card_2_text;

        $course_sale_data->card_3_heading = $request->card_3_heading;
        $course_sale_data->card_3_subheading = $request->card_3_subheading;
        $course_sale_data->card_3_text = $request->card_3_text;

        $course_sale_data->card_4_heading = $request->card_4_heading;
        $course_sale_data->card_4_subheading = $request->card_4_subheading;
        $course_sale_data->card_4_text = $request->card_4_text;

        $course_sale_data->slider_1_heading = $request->slider_1_heading;
        if ($request->has('slider_1_image')) {
            $course_sale_data->slider_1_image = $this->saveImage($request->slider_1_image);
        }
        $course_sale_data->slider_1_text = $request->slider_1_text;

        $course_sale_data->slider_2_heading = $request->slider_2_heading;
        if ($request->has('slider_2_image')) {
            $course_sale_data->slider_2_image = $this->saveImage($request->slider_2_image);
        }
        $course_sale_data->slider_2_text = $request->slider_2_text;

        $course_sale_data->slider_3_heading = $request->slider_3_heading;
        if ($request->has('slider_3_image')) {
            $course_sale_data->slider_3_image = $this->saveImage($request->slider_3_image);
        }
        $course_sale_data->slider_3_text = $request->slider_3_text;

        $course_sale_data->description = $request->description;

        $course_sale_data->course_id = $course->id;

        $course_sale_data->save();

        Toastr::success('Course Successfully Added To Sale !', 'Success');
        return redirect()->route('course.viewSaleList');
    }

    public function viewSaleList()
    {
        $course_sale = Course::where('type', 8)->orderBy('created_at', 'desc')->get();
        return view('coursesetting::repeat_course_list', compact('course_sale'));
    }

    public function viewSaleListData()
    {
        $query = Course::where('type', 8)->orderBy('seq_no', 'desc')->get();
        return DataTables::of($query)
            ->addColumn('title', function (Course $course_sale) {
                return $course_sale->parent->title;
            })
            ->addColumn('start_date', function (Course $course_sale) {
                return $course_sale->start_date->format('Y-m-d');
            })
            ->addColumn('end_date', function (Course $course_sale) {
                return $course_sale->end_date->format('Y-m-d');
            })
            ->addColumn('price', function (Course $course_sale) {
                return $course_sale->price;
            })
            // ->addColumn('created_at', function (Course $course_sale) {
            //     return $course_sale->created_at->format('d-M-y, g:i A');
            // })
            // ->addColumn('updated_at', function (Course $course_sale) {
            //     return $course_sale->updated_at->format('d-M-y, g:i A');
            // })
            ->addColumn('action', function ($course_sale) {
                $html = '';
                $html = '<div class="dropdown CRM_dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Action</button>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                            <a href=\'' . route('course.addToSale', [$course_sale->parent_id]) . '\' class="dropdown-item">Edit</a>
                            <a href="javascript:void(0);"  class="dropdown-item" onclick="confirm_modal(\'' . route('deleteRepeatCourse', [$course_sale->id]) . '\')">Delete</a>
                            </div>
                        </div>';
                return $html;
            })
            //             ->only(['title', 'start_date', 'end_date', 'price', 'action'])
            ->rawColumns(['action'])
            ->addIndexColumn()
            // ->make(true);
            ->toJson();
        return view('coursesetting::repeat_course_list', compact('course_sale_list'));
    }

    public function deleteRepeatCourse($id)
    {
        // Retrieve the repeat course with its related data
        $repeat_course = Course::where('id', $id)->with([
            'course_sale_data',
            'course_chapters_check',
            'course_lesson_check',
            'course_file_check'
        ])->first();

        // Check if the repeat course exists
        if ($repeat_course) {

            // Delete the associated course sale data and unlink the slider images
            if ($repeat_course->course_sale_data !== null) {
                unlink($repeat_course->course_sale_data->slider_1_image);
                unlink($repeat_course->course_sale_data->slider_2_image);
                unlink($repeat_course->course_sale_data->slider_3_image);
                $repeat_course->course_sale_data->delete();
            }

            // Delete the associated course chapters
            $repeat_course->course_chapters_check()->delete();
            $repeat_course->course_lesson_check()->delete();
            $repeat_course->course_file_check()->delete();

            // Delete the repeat course
            $repeat_course->delete();

            Toastr::success('Repeat Course Successfully Deleted!', 'Success');
        } else {
            Toastr::warning('Course not found!', 'Warning');
        }

        return redirect()->back();
    }


    public function changeCourseSequence()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'];

        foreach ($order as $item) {
            $id = $item['id'];
            $course_new_seq = Course::find($id);
            $course_new_seq->seq_no = $item['new_position'];
            $course_new_seq->save();

            Course::where('parent_id', $id)->update(['seq_no' => $item['new_position']]);
        }

        return response()->json(200);
    }

    public function changeCourseCategorySequence()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'];

        foreach ($order as $item) {
            $id = $item['id'];

            Category::where('id', $id)->update(['seq_no' => $item['new_position']]);
        }

        return response()->json(200);
    }
}
