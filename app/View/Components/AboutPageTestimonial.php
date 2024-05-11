<?php

namespace App\View\Components;

use App\Traits\Tenantable;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\SystemSetting\Entities\Testimonial;
use Modules\CourseSetting\Entities\CourseReveiw;

class AboutPageTestimonial extends Component
{
    use Tenantable;
    public $frontendContent;

    public function __construct($frontendContent)
    {
        $this->frontendContent = $frontendContent;
    }


    public function render()
    {
        $testimonials = Cache::rememberForever('TestimonialList_'. app()->getLocale().SaasDomain(), function () {
            return Testimonial::select('body', 'image', 'author', 'profession', 'star')
                ->where('status', '=', 1)
                ->get();
        });
        $latest_course_reveiws = CourseReveiw::where('status', 1)->with('user')->latest()->limit(8)->get();
        return view(theme('components.about-page-testimonial'), compact('testimonials','latest_course_reveiws'));
    }
}
