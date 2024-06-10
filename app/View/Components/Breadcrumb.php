<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Modules\FrontendManage\Entities\Slider;

class Breadcrumb extends Component
{
    public $banner, $title, $sub_title;

    public function __construct($banner = null, $title = null, $subTitle = null)
    {
        $this->banner = $banner;
        $this->title = $title;
        $this->sub_title = $subTitle;
    }


    public function render()
    {
        $route = Route::currentRouteName();
        $slider_info = Slider::where('route',$route)->first();
        return view(theme('components.breadcrumb'),compact('slider_info'));
    }
}
