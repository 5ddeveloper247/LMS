<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseLevel;
use Modules\Localization\Entities\Language;
use Carbon\Carbon;

class QuizPageSection extends Component
{
    public $request, $categories, $languages;

    public function __construct($request, $categories, $languages)
    {
        $this->request = $request;
        $this->categories = $categories;
        $this->languages = $languages;
    }


    public function render()
    {
        $query = Course::with('enrollUsers','userRoleId', 'cartUsers', 'quiz', 'quiz.assign', 'user', 'reviews', 'courseLevel', 'BookmarkUsers', 'parent.chapters', 'parent.classes', 'currentCoursePlan');
        // if(isset($this->request->tutor_courses)){
        //   $query->has('userRoleId');
        // }

        $type = $this->request->type;
        if (empty($type)) {
            $type = '';
        } else {
            $types = explode(',', $type);
            if (count($types) == 1) {
                foreach ($types as $t) {
                    if ($t == 'free') {
                        $query->where('price', 0);
                    } elseif ($t == 'paid') {
                        $query = $query->where('price', '>', 0);
                    }
                }
            }
        }

        $language = $this->request->language;
        if (empty($language)) {
            $language = '';
        } else {
            $row_languages = explode(',', $language);
            $languages = [];
            $LanguageList = Language::whereIn('code', $row_languages)->first();
            foreach ($row_languages as $l) {
                $lang = $LanguageList->where('code', $l)->first();
                if ($lang) {
                    $languages[] = $lang->id;
                }
            }
            $query->whereIn('lang_id', $languages);
        }


        $level = $this->request->level;
        if (empty($level)) {
            $level = '';
        } else {
            $levels = explode(',', $level);
            $query->whereIn('level', $levels);
        }
        if (isModuleActive('Org')) {
            $required_type_request = $this->request->required_type;
            if (!empty($required_type_request)) {
                $required_type = [];
                $types = explode(',', $required_type_request);
                foreach ($types as $type) {
                    if ($type == 'compulsory') {
                        $required_type[] = 1;
                    } elseif ($type == 'open') {
                        $required_type[] = 0;
                    }
                }
                $query->whereIn('required_type', $required_type);
            }
        }
        $mode = $this->request->mode;
        if (empty($mode)) {
            $mode = '';
        } else {
            $modes = explode(',', $mode);
            $query->whereIn('mode_of_delivery', $modes);
        }

        $category = $this->request->category;
        if (empty($category)) {
            $category = '';
        } else {
            $categories = explode(',', $category);

            $query->whereHas('quiz', function ($q) use ($categories) {
                $q->whereIn('category_id', $categories);
            });
        }
        $subCategory = $this->request->get('sub-category');
        if (!empty($subCategory)) {

            $query->whereHas('quiz', function ($q) use ($subCategory) {
                $q->where('sub_category_id', $subCategory);
            });
        }

        if (currentTheme() == 'tvt') {
            $subject = $this->request->get('subject');
            if (!empty($subject)) {
                $subjects = explode(',', $subject);
                $query->whereIn('school_subject_id', $subjects);
            }
        }
        // if(isset($this->request->tutor_courses)){
        //   $included_types = [9];
        // }else{
        //   $included_types = [2,  5, 7, 8];
        // }
        
        if(isset($this->request->tutor_courses)){
            $typeset = [9];
        }else{

            $typeset = $this->request->filter_by_course_type ?? [2,4,5,6,7,8];
        }
        // if(isset($this->request->filter_by_course_type)){
        //   $query->whereIn('type',$this->request->filter_by_course_type);
        // }
        // else{
        // $query->where(function ($q) {
        //   if(isset($this->request->tutor_courses)){
        //     $q->where('type',9)->where('price','<>','0.00');
        //   }else{
            
            $query->where(function ($q) use ($typeset) {
                $q->whereIn('type', $typeset)
                ->where(function($q){
                    $q->where('price', '!=', '0.00')
                    ->orHas('currentCoursePlan');
                });
              
            //   ->where('price', '!=', '0.00');
            // //  $q->whereIn('type', [2,  5, 7, 8])->where('price', '!=', '0.00');
            //   $q->orWhere(function($q){
            //     $q->where('type','=',8)
            //     ->where('price', '!=', '0.00')
            //     ->where('start_date','<=',Carbon::now()->format('Y-m-d'))
            //     ->where('end_date','>=',Carbon::now()->format('Y-m-d'));
            //   })
            //   ->orWhere(function ($q) {
            //     $q->whereIn('type',[4,6])
            //     ->has('currentCoursePlan');
            // });
            // });
        //   }
        });
    // }   
        $query->where('status', 1);
        $q1 = $query;
        $max_price = $q1->get()->max(function ($query) {
          if(!$query->price){
            return $query->currentCoursePlan[0]->amount;
          }else{
            return $query->price;
          }
        });
        $order = $this->request->order;

        if (currentTheme() == 'wetech') {
            if (empty($order)) {
                $query->latest();
            } else {
                if ($order == "title") {
                    $query->orderBy('title');
                } elseif ($order == "enroll") {
                    $query->orderBy('total_enrolled');
                } elseif ($order == "created_at") {
                    $query->orderBy('created_at');
                } elseif ($order == "end_date") {
                    $query->orderBy('required_type', 'desc');
                } elseif ($order == "most_popular") {
                    $query->orderBy('total_enrolled','desc');
                }
            }
        } else {
            if (empty($order)) {
                $query->latest();
            } else {
                if ($order == "price") {
                    $query->orderBy('price', 'desc');
                } elseif ($order == "most_popular") {
                  $query->orderBy('total_enrolled','desc');
                } else {
                    $query->latest();
                }
            }
        }
      //  $max_price = $query->max('price');
        // $max_price = $query->get()->max(function ($query) {
        //   if(!$query->price){
        //     return $query->currentCoursePlan[0]->amount;
        //   }else{
        //     return $query->price;
        //   }
        // });
        if(isset($this->request->filter_search_by) && !empty($this->request->filter_search_by)){
          $query->where('title','LIKE','%'.$this->request->filter_search_by.'%');
        }
        // if(isset($this->request->filter_by_course_type)){
        //   $query->whereIn('type',$this->request->filter_by_course_type);
        // }
        if(isset($this->request->filter_by_price_max) && isset($this->request->filter_by_price_min)){
          $filter_max_price = floatval($this->request->filter_by_price_max);
          $filter_min_price = floatval($this->request->filter_by_price_min);
          $query->where(function($query) use ($filter_min_price,$filter_max_price){
          $query->whereBetween('price',[$filter_min_price,$filter_max_price])->orWhere(function($query) use ($filter_min_price,$filter_max_price){
            $query->whereNull('price')
            ->whereHas('currentCoursePlan',function($query) use ($filter_min_price,$filter_max_price){
              $query->whereBetween('amount',[$filter_min_price,$filter_max_price]);
            });
          });
          });
        }
        // dd($query->toSql(),$query->getBindings());
        $courses = $query->paginate(8);
        $total = $courses->total();
        $levels = CourseLevel::select('id', 'title')->where('status', 1)->get();
        return view(theme('components.quiz-page-section'), compact('levels', 'order', 'category', 'level', 'order', 'language', 'type', 'total', 'courses', 'mode','max_price'));
    }
}
