<?php

namespace App\Http\Controllers;

use App\Events\OneToOneConnection;
use App\Jobs\SendGeneralEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Modules\CourseSetting\Entities\Course;
use Modules\SystemSetting\Entities\PackagePricing;
use Modules\SystemSetting\Entities\PackagePurchasing;
use Modules\CourseSetting\Entities\Lesson;
use Modules\CourseSetting\Entities\SubCategory;
use Modules\Payment\Entities\Cart;
use Modules\Quiz\Entities\OnlineQuiz;


class AjaxController extends Controller
{


    public function topbarEnableDisable(Request $request)
    {
        try {
            $id = $request->id;
            $table = $request->table;
            $status = $request->status;
            $result = DB::table($table)->where('id', $id)->update(['topbar' => $status]);
            if ($result) {
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(['error' => 'Something went wrong!'], 400);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function footerEnableDisable(Request $request)
    {

        try {
            $id = $request->id;
            $table = $request->table;
            $status = $request->status;
            $result = DB::table($table)->where('id', $id)->update(['footer' => $status]);
            if ($result) {
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(['error' => 'Something went wrong!'], 400);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function statusEnableDisable(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Permission Denied'], 403);
        }
        if (Auth::user()->role_id == 3) {
            return response()->json(['error' => 'Permission Denied'], 403);
        }
        if($request->table == 'package_pricing' && $request->status == 1){
            
            $active = PackagePricing::where('status',1)->count();
            if($active>=3){
                return response()->json(['error' => 'Maximum Packages limit have been reached.']);
            }
        }
        if($request->table == 'courses' && $request->status == 1){
            $course = Course::find($request->id);
            if($course){
                if($course->type == '9'){
                    
                    $total_courses = Course::where('user_id',$course->user->id)->where('status',1)->count();
                    $current_package = PackagePurchasing::where('user_id',$course->user->id)->latest()->first();
                    // dd(($total_courses>=$current_package->course_limit) ? );
                    if($current_package && $current_package->expiry_date < Carbon::today()){
                        return response()->json(['error' => 'User Package has been expired. Please upgrade the package to enable this course.']);
                    }

                    if($current_package && $total_courses >= (int)$current_package->course_limit){
                        $allow_user_status_change = User::where('id',$request->user_id)->update(['can_change_status' => 0]);
                        return response()->json(['error' => 'The current package does not allow more courses. Please delete or disable some course to enable this course.']);
                    }
                }
            }
        }

        try {
            $id = $request->id;
            $table = $request->table;
            $status = $request->status;
            $result = DB::table($table)->where('id', $id)->update(['status' => $status]);


            //========= End For Chat Module ========

            if ($table == "courses") {
                DB::table($table)->where('parent_id', $id)->update(['status' => $status]);
                $course = Course::find($id);
                

            // if($course){
            //     // dd($course->user);
            //     if($course->type == 9){
            //         $total_courses = Course::where('user_id',$course->user->id)->where('status',1)->count();
            //         $current_package = PackagePurchasing::where('user_id',$course->user->id)->latest()->first();
            //         if($total_courses > $current_package->course_limit){
            //             return response()->json(['error' => 'The current package does not allow more courses. Please delete or disable some course to enable this course.']);
            //         }
            //     }
            // }

                $course->updated_at = now();
                $course->save();

                // ======= For Chat Module ========
                if (isModuleActive('Chat')) {
                    if ($course && $course->status) {
                        $instructor = User::find($course->user_id);
                        event(new OneToOneConnection($instructor, null, $course));
                    }
                }

                if ($status == 1) {

                    if (UserMobileNotificationSetup('Course_Publish_Successfully', $course->user) && !empty($course->user->device_token)) {
                        send_mobile_notification($course->user, 'Course_Publish_Successfully', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title,
                        ]);
                    }

                    if (UserEmailNotificationSetup('Course_Publish_Successfully', $course->user)) {
                        SendGeneralEmail::dispatch($course->user, 'Course_Publish_Successfully', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title,
                        ]);
                    }
                    if (UserBrowserNotificationSetup('Course_Publish_Successfully', $course->user)) {

                        send_browser_notification(
                            $course->user,
                            $type = 'Course_Publish_Successfully',
                            $shortcodes = [
                                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                            ],
                            trans('common.View'), //actionText
                            courseDetailsUrl(@$course->id, @$course->type, @$course->slug), //actionUrl
                        );
                    }
                } else {

                    if (UserMobileNotificationSetup('Course_Unpublished', $course->user) && !empty($course->user->device_token)) {
                        send_mobile_notification($course->user, 'Course_Unpublished', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title,
                        ]);
                    }

                    if (UserEmailNotificationSetup('Course_Unpublished', $course->user)) {
                        SendGeneralEmail::dispatch($course->user, 'Course_Unpublished', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title,
                        ]);
                    }
                    if (UserBrowserNotificationSetup('Course_Unpublished', $course->user)) {

                        send_browser_notification(
                            $course->user,
                            $type = 'Course_Unpublished',
                            $shortcodes = [
                                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                            ],
                            trans('common.View'), //actionText
                            courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                        );
                    }
                }
            } elseif ($table == "categories") {
                Cache::forget('categories_' . app()->getLocale() . SaasDomain());
            } elseif ($table == "country_wish_taxes") {
                Cache::forget('countryWishTaxList_' . SaasDomain());
            } elseif ($table == "sponsors") {
                Cache::forget('SponsorList_' . app()->getLocale() . SaasDomain());
            } elseif ($table == "course_levels") {
                Cache::forget('CourseLevel_' . app()->getLocale() . SaasDomain());
            } elseif ($table == "social_links") {
                Cache::forget('social_links_' . SaasDomain());
            }

            if ($result) {
                return response()->json(['success' => trans('common.Status has been changed')]);
            } else {
                return response()->json(['error' => trans('common.Something went wrong') . '!'], 400);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function publishEnableDisable(Request $request)
    {
        try {
            $id = $request->id;
            $table = $request->table;
            $status = $request->status;
            $result = DB::table($table)->where('id', $id)->update(['publish' => $status]);
            if ($result) {
                return response()->json(['message' => 'success']);
            } else {
                return response()->json(['error' => 'Something went wrong!'], 400);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();
            Log::error($errorMessage);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function ajaxGetSubCategoryList(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->id)->get();
        return response()->json([$subcategories]);
    }


    public function ajaxGetCourseList(Request $request)
    {
        try {
            $category_id = $request->category_id;
            $subcategory_id = $request->subcategory_id;
            if (Auth::user()->role_id == 1) {
                $query = Course::select('id', 'title');
                if ($category_id) {
                    $query->where('category_id', $category_id);
                }
                if ($subcategory_id) {
                    $query->where('subcategory_id', $subcategory_id);
                }
                $subcategories = $query->get();
            } else {
                $subcategories = Course::select('id', 'title')->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->where('user_id', Auth::user()->id)->get();
            }
            $courses = [];
            foreach ($subcategories as $key => $subcategory) {
                $title = $subcategory->title;
                $courses[$key] = $subcategory;
                $courses[$key]->title2 = $title;
            }

            return response()->json([$courses]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function ajaxGetQuizList(Request $request)
    {
        try {

            $quiz_list = OnlineQuiz::query();
            if ($request->category_id != "") {
                $quiz_list->where('category_id', $request->category_id);
            }
            if ($request->subcategory_id != "") {
                $quiz_list->where('sub_category_id', $request->subcategory_id);
            }
            if ($request->course_id != "") {
                $quiz_list->where('course_id', $request->course_id);
            }


            $quiz_list = $quiz_list->with('category', 'subCategory', 'course')->get();

            return response()->json([$quiz_list]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function updateActivity()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->last_activity_at = now();
            $user->save();
        }
        return true;
    }

    public function get_preview_modal($id)
    {
        if (Settings('frontend_active_theme') == 'edume') {
            $lesson = Lesson::find($id);
            $course = $lesson->course;
            return View::make('frontend.edume.partials._course_preview_modal', [
                'lesson' => $lesson,
                'course' => $course
            ]);
        } else {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }

    public function get_cart_price()
    {
        $price = 0;
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();

            foreach ($carts as $cart) {
                $price += $cart->price;
            }
        } else {
            $carts = session()->get('cart');
            if (isset($carts)) {
                foreach ($carts as $cart) {
                    $price = $price + $cart['price'];
                }
            }
        }
        return response()->json($price);
    }

    public function isUnique(Request $request)
    {
        $errors = [];
        foreach ($request->columns as $column){
           $query = DB::table($column[0]);
           if(isset($column[3])){
               $query = $query->where('id','!=', $column[3]);
           }
           if($query->where(function ($q) use ($column){
               $q->where($column[1], $column[2])
                  ->orWhere($column[1], 'LIKE', '%\"' . $column[2] . '\"%');
           })->exists()){
                array_push($errors,ucfirst(str_replace(['_','-','.'],' ',$column[0])).' '. ucfirst(str_replace(['_','-','.'],' ',$column[1])) .' Must be Unique');
           }
        }
        return response()->json(['errors' => $errors], 200);
    }
}
