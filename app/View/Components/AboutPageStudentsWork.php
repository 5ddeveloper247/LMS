<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\SystemSetting\Entities\Testimonial;

class AboutPageStudentsWork extends Component
{
    //public $frontendContent;

    public function __construct()
    {
        //$this->frontendContent = $frontendContent;
    }

    public function render()
    {
        $testimonials = Testimonial::where('status',1)->latest()->get();
        return view(theme('components.about-page-students-work',compact('testimonials')));
    }
}
