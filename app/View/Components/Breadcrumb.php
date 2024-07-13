<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Modules\FrontendManage\Entities\Slider;

class Breadcrumb extends Component
{
    public $banner, $title, $sub_title, $btntitle, $btnlink ,$btnclass;

    public function __construct($banner = null, $title = null, $subTitle = null, $btntitle = '', $btnclass= '' , $btnlink='#')
    {
        $this->banner = $banner;
        $this->title = $title;
        $this->sub_title = $subTitle;
        $this->btntitle = $btntitle;
        $this->btnlink = $btnlink;
        $this->btnclass = $btnclass;
    }


    public function render()
    {
        // dd(request()->path());
        $route = Route::currentRouteName();
        $slider_info = Slider::whereHas('page',function($q){
            $url = request()->path();
            $q->where('slug',$url)
            ->orWhere('slug','/'.$url);
        })->first();
       //$slider_info = Slider::where('route',$route)->first();
        return view(theme('components.breadcrumb'),compact('slider_info'));
    }
}
