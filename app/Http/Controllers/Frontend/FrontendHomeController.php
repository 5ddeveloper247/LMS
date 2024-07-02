<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Route;
use Modules\Blog\Entities\Blog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\HeaderMenu;
use Modules\StudentSetting\Entities\Program;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\CourseSetting\Entities\CourseReveiw;
use Modules\FrontendManage\Entities\ResourceTab;
use Modules\FrontendManage\Entities\HomePageFaq;
use Modules\SystemSetting\Entities\Testimonial;


class FrontendHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {

        try {

            if (!\auth()->check()) {
                if (Settings('start_site') == 'loginpage') {

                    return redirect()->route('login');
                }
            }
            $check = FrontPage::select('slug', 'is_static')->where('homepage', 1)->first();
            if ($check && $check->slug != '/') {

                if ($check->is_static == 1) {
                    return redirect()->to($check->slug);
                } else {
                    return redirect()->route('frontPage', [$check->slug]);
                }
            }
            if (function_exists('SaasDomain')) {
                $domain = SaasDomain();
            } else {
                $domain = 'main';
            }
            $blocks = Cache::rememberForever('homepage_block_positions' . $domain, function () {
                return DB::table('homepage_block_positions')->select(['id', 'block_name', 'order'])->orderBy('order', 'asc')->get();
            });
            $latest_programs = Program::where('status', 1)->where('featured',1)->has('currentProgramPlan')->with('currentProgramPlan')->latest()->take(6)->get();
            $latest_courses = Course::where('featured',1)
            ->has('parent')
            // ->where(function($query){
            //     $query->whereHas('parent', function ($q) {
            //         $q->where('featured', 1);
            //     })->orWhere('featured',1);
            // })
            ->with('parent','currentCoursePlan')->latest()->take(3)->get();
            $allPrograms = Program::where('status',1)->latest()->get();
            $allCourses = Course::whereNull('parent_id')->latest()->get();
            //dd($latest_courses);
            $latest_blogs = Blog::where('status', 1)->with('user')->latest()->limit(10)->get();
            $featured_blogs = Blog::where('status',1)->where('featured',1)->with('user')->latest()->limit(3)->get();
            $latest_course_reveiws = CourseReveiw::where('status', 1)->with('user')->latest()->limit(4)->get();
            $testimonials = Testimonial::where('status',1)->latest()->get();

            $random_program = Program::where('status', 1)
                ->has('currentProgramPlan')
                ->with('currentProgramPlan')
                ->inRandomOrder()
                ->select(['id', 'programtitle', 'totalcost', 'icon', 'subtitle', 'discription'])
                ->first();
            $faqs = HomePageFaq::where('status', 1)->orderBy('order','desc')->take(10)->get();

            return view(theme('pages.index'), compact('random_program', 'blocks', 'latest_programs', 'latest_blogs', 'featured_blogs' , 'latest_course_reveiws', 'random_program', 'latest_courses','faqs','allPrograms','allCourses','testimonials'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function fetchBlogsByTag(HttpRequest $request){
       $rules = [
            'tag' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));
        switch ($request->tag) {
            case 'latest':
                # code...
                $tag = '%';
                break;
            
            default:
                # code...
                $tag = '%'.$request->tag.'%';
                break;
        }
        $blogs = Blog::where('status', 1)->with('user')
            ->where('tags','like',$tag)->latest()->limit(10)->get();
        return response()->json(['success' => true, 'data' => $blogs]);
    }

    public function getRandomProgram()
    {
        $random_program = Program::where('status', 1)
            ->has('currentProgramPlan')
            ->with('currentProgramPlan')
            ->inRandomOrder()
            ->select(['id', 'programtitle', 'totalcost', 'icon', 'subtitle', 'discription'])
            ->first();

        // $rand_program = Course::where('status', 1)
        // $rand_program = Program::where('status', 1)
        //     ->inRandomOrder()
        //     ->latest()->limit(4)->get();
        // ->toArray();
        // $rand_program = DB::table('programs')
        //     // ->orderBy('created_at', 'desc')
        //     ->inRandomOrder()
        //     ->limit(10)
        //     ->get()
        //     ->toArray();
        // dd($random_program);
        if($random_program){
        $program_desc = strip_tags($random_program->discription);
            return response()->json(
                [
                    'status' => true,
                    'program' =>

                    [
                        'id' => $random_program->id,
                        'programtitle' => $random_program->programtitle,
                        'totalcost' => $random_program->currentProgramPlan[0]->amount,
                        'icon' => $random_program->icon,
                        'subtitle' => $random_program->subtitle,
                        'discription' =>  strlen($program_desc) > 145 ? substr($program_desc, 0, 145) . "..." : $program_desc
                    ]
                ],
                200
            );
        }else{
            return response()->json(['status' => false, 'msg'=>'No Program Found']);
        }
        // dd($random_program);
        // return response()->json([
        //     'id' => $random_program->id,
        //     'programtitle' => $random_program->programtitle,
        //     'totalcost' => $random_program->totalcost,
        //     'icon' => $random_program->icon
        // ]);
    }
    public function resource()
    {
        $program_detail = Program::where('id', 1)->with(['programPlans.programPalnDetail', 'currentPlan', 'nextPlans', 'currentProgramPlan' => function ($q) {
            $q->with(['initialProgramPalnDetail', 'programPalnDetail']);
        }])->first();
        $tabs = ResourceTab::where('status',1)->oldest()->get();
        // $next_plan = Program::where('id', $id)->with('programPlans')->first();
        //        program enroll check
        $is_allow = false;
        //        $course_count = 2;
        $isEnrolled = false;
        // if (isset($program_detail->currentProgramPlan[0])) {
        //     if (Auth::check() && $program_detail->isLoginUserEnrolled) {
        //         $is_allow = true;
        //         //                $course_count = 6;
        //         $isEnrolled = true;
        //     }
        // }


        //        program faqs
        $faqs = HomePageFaq::whereIn('id', json_decode($program_detail->faqs) ?? [])->orderBy('order', 'desc')->where('status', 1)->get();

        //        program course
        $courses = Course::whereIn('id', json_decode($program_detail->allcourses) ?? [])->with('enrollUsers', 'user', 'user.courses', 'user.courses.enrollUsers', 'user.courses.lessons', 'chapters.lessons', 'enrolls', 'lessons', 'reviews', 'chapters', 'activeReviews')->orderBy('created_at', 'DESC')->get();
        //      resent progrm
        $recent_program = Program::where('status', 1)->has('currentProgramPlan')->with('currentProgramPlan')->inRandomOrder()->take(3)->get();
        return view(theme('pages.resource'),get_defined_vars());
    }
    
}

