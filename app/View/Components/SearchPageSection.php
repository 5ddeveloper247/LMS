<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Quiz\Entities\OnlineQuiz;
use Modules\CourseSetting\Entities\Course;
use Modules\Localization\Entities\Language;
use Modules\CourseSetting\Entities\Category;
use Modules\StudentSetting\Entities\Program;
use Modules\CourseSetting\Entities\CourseLevel;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\Payment\Entities\PaymentPlans;

class SearchPageSection extends Component
{
    public $request, $categories, $languages, $category_search;

    public function __construct($request, $categories, $languages, $categorySearch)
    {
        $this->request = $request;
        $this->categories = $categories;
        $this->languages = $languages;
        $this->category_search = $categorySearch;
    }


    public function render()
    {
        try {
        $search = $this->request->has('query') ? '%'.$this->request->get('query').'%' : '%'; 
        $courses = Course::where('title','LIKE',$search)
                ->orderBy('total_enrolled', 'desc')->where(function($q){
                    $q->where('price', '!=', '0.00')
                    ->orHas('currentCoursePlan');
                })
            ->with('user', 'parent','currentCoursePlan','enrolls', 'comments', 'reviews', 'lessons', 'activeReviews', 'enrollUsers', 'class', 'cartUsers', 'quiz', 'quiz.assign', 'courseLevel');
        $program = Program::where('programtitle','LIKE',$search)->orderBy('seq_no', 'asc')->where('status', 1)->has('currentProgramPlan')->with('user','currentProgramPlan');
        
        if($this->request->has('search_type') && $this->request->get('search_type') != 'course'){
            $courses = $courses->take(0);
        }

        if($this->request->has('search_type') && $this->request->get('search_type') != 'program'){
            $program = $program->take(0);
        }

        if($this->request->has('search_courseType')){
            $program=$program->take(0);
            switch ($this->request->get('search_courseType')) {
                case 'big_quiz':
                    $type = 2;
                    break;
                case 'full_course':
                    $type = 4;
                    break;
                case 'prep_course_ondemand':
                    $type = 5;
                    break;
                case 'prep_course_live':
                    $type = 6;
                    break;
                case 'repeat_course':
                    $type = 7;
                    break;
                
                default:
                    $type = 0;
                    break;
            }
            $courses = $courses->where('type',$type);
        }

       // $query = $courses->merge($program);
        // $courses->push($program);
        $coursesArray = $courses->get()->toArray();
        $programArray = $program->get()->toArray();

        $mergedArray = array_merge($coursesArray, $programArray);

        // Optionally, convert back to a collection if needed
        // $mergedCollection = collect($mergedArray)->orderBy('created_at','DESC');
        $mergedCollection = collect($mergedArray)->map(function ($item) {
            return collect($item);
        })->sortByDesc('created_at')->values();

        $query = $mergedCollection;
    //     if($this->request->has('search_type')){
    //         switch ($this->request->get('search_type')) {
    //             case 'program':
    //                 $search_type = '%program%';
    //                 $wildcard = 'like';
    //                 break;
    //             case 'course':
    //                 $search_type = $this->request->has('search_courseType') ? $this->request->get('search_courseType') : 'program';
    //                 $wildcard = $this->request->has('search_courseType') ? 'like' : 'not like';
    //                 break;
    //         }
    //     }else{
    //         $search_type = $this->request->has('search_courseType') ? $this->request->get('search_courseType') : '%';
    //             //    $wildcard = $this->request->has('search_courseType') ? 'like' : 'not like';
    //         $wildcard = 'like';
    //     }
    //    // dd($search_type,$wildcard);
    //     $search = $this->request->has('query') ? '%'.$this->request->get('query').'%' : '%'; 
    //     $query = PaymentPlans::where('sdate', '<=', date('Y-m-d'))->where('edate', '>=', date('Y-m-d'))
    //         ->where(function($q) use ($search){
    //                    $q->whereHas('courses', function ($query) use ($search) {
    //                         $query->where('title', 'like', $search);
    //                     })
    //                     ->orWhereHas('programName', function ($query) use ($search) {
    //                         $query->where('programtitle', 'like', $search);
    //                     });
    //             })
    //                     ->where('type',$wildcard,$search_type)
    //                     ->with('courses','programName')
    //                     ->where('status', 1)->latest();
    //                     //dd($query->toSql());
    //     $total_programs = count($query->get());
    //     $request = $this->request;
    //     // $total_programs = Program::orderBy('seq_no', 'asc')->where('status', 1)->has('currentProgramPlan')->with('currentProgramPlan')->count();
    //     // if ($this->category_search != 0) {
    //     //     $quiz_id = OnlineQuiz::where('category_id', $this->category_search)->orWhere('sub_category_id', $this->category_search)->get()->pluck('id')->toArray();
    //     //     $course_id = Course::where('category_id', $this->category_search)->orWhere('subcategory_id', $this->category_search)->get()->pluck('id')->toArray();
    //     //     $class_id = VirtualClass::where('category_id', $this->category_search)->orWhere('sub_category_id', $this->category_search)->get()->pluck('id')->toArray();


    //     //     $query->where(function ($q) use ($quiz_id, $course_id, $class_id) {
    //     //         $q->whereIn('quiz_id', $quiz_id)
    //     //             ->orWhereIn('id', $course_id)
    //     //             ->orWhereIn('class_id', $class_id);
    //     //     });
    //     // }


    //     // $type = $this->request->type;
    //     // if (empty($type)) {
    //     //     $type = '';
    //     // } else {
    //     //     $types = explode(',', $type);
    //     //     if (count($types) == 1) {
    //     //         foreach ($types as $t) {
    //     //             if ($t == 'free') {
    //     //                 $query->where('price', 0);
    //     //             } elseif ($t == 'paid') {
    //     //                 $query = $query->where('price', '>', 0);
    //     //             }
    //     //         }
    //     //     }
    //     // }

    //     // $language = $this->request->language;
    //     // if (empty($language)) {
    //     //     $language = '';
    //     // } else {
    //     //     $row_languages = explode(',', $language);
    //     //     $languages = [];
    //     //     $LanguageList = Language::whereIn('code', $row_languages)->first();
    //     //     foreach ($row_languages as $l) {
    //     //         $lang = $LanguageList->where('code', $l)->first();
    //     //         if ($lang) {
    //     //             $languages[] = $lang->id;
    //     //         }
    //     //     }
    //     //     $query->whereIn('lang_id', $languages);
    //     // }


    //     // $level = $this->request->level;
    //     // if (empty($level)) {
    //     //     $level = '';
    //     // } else {
    //     //     $levels = explode(',', $level);
    //     //     $query->whereIn('level', $levels);
    //     // }

    //     // $mode = $this->request->mode;
    //     // if (empty($mode)) {
    //     //     $mode = '';
    //     // } else {
    //     //     $modes = explode(',', $mode);
    //     //     $query->whereIn('mode_of_delivery', $modes);
    //     // }

    //     // $category = $this->request->category;
    //     // if (empty($category)) {
    //     //     $category = '';
    //     // } else {
    //     //     $categories = explode(',', $category);

    //     //     $quiz_id = OnlineQuiz::whereIn('category_id', $categories)->get()->pluck('id')->toArray();
    //     //     $course_id = Course::whereIn('category_id', $categories)->get()->pluck('id')->toArray();
    //     //     $class_id = VirtualClass::whereIn('category_id', $categories)->get()->pluck('id')->toArray();


    //     //     $query->where(function ($q) use ($quiz_id, $course_id, $class_id) {
    //     //         $q->whereIn('quiz_id', $quiz_id)
    //     //             ->orWhereIn('id', $course_id)
    //     //             ->orWhereIn('class_id', $class_id);
    //     //     });


    //     // }

    //     // $subCategory = $this->request->get('sub-category');
    //     // if (!empty($subCategory)) {
    //     //     $query->where('subcategory_id', $subCategory);
    //     // }

    //     // $query->where('status', 1);


    //     // if ($this->request->get('query')) {
    //     //     $search = $this->request->get('query');
    //     //     $query->where('programtitle', 'LIKE', "%{$search}%");
    //     // } else {
    //     //     $search = '';
    //     // }

    //     // $order = $this->request->order;
    //     // if (empty($order)) {
    //     //     $order = '';
    //     // } else {
    //     //     if ($order == "price") {
    //     //         $query->orderBy('price', 'asc');
    //     //     } else {
    //     //         $query->latest();
    //     //     }
    //     // }
        $all_programs = $query;
        // $all_programs = $query->paginate(9);
        // $total = $all_programs->total();


    //     // dd($query, $search, $all_programs, $total);
    //     // $levels = CourseLevel::select('id', 'title')->where('status', 1)->get();
    //     // $cat = Category::find($this->category_search);

        return view(theme('components.search-page-section'), get_defined_vars());
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
