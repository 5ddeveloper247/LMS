<?php

namespace Modules\FrontendManage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\Slider;
use Modules\FrontendManage\Entities\RequirementSlider;

class RequirementsSliderController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $sliders = RequirementSlider::all();
            $data = [];
            return view('frontendmanage::requirements_slider.index', $data, compact('sliders'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function store(Request $request)
    {

        if (demoCheck()) {
            return redirect()->back();
        }
        $rules = [
            'title' => 'required',
            'image' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $slider = new RequirementSlider();
            $slider->title = $request->title;
            $slider->subtitle = $request->sub_title ?? '';
            $slider->text = $request->text ?? '';
            $slider->color = '#996699';
            $slider->btn_title = $request->btn_title1 ?? '';
            $slider->btn_link = $request->btn_link1 ?? '';
            $slider->btn_class = '';
            $slider->status = 1;
            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
            $slider->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function edit($id)
    {
        try {
            $sliders = RequirementSlider::all();
            $slider = RequirementSlider::findOrFail($id);
            $data = [];
            return view('frontendmanage::requirements_slider.index', $data, compact('sliders', 'slider'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function update(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }


        try {
            $slider = RequirementSlider::find($request->id);
            $slider->title = $request->title;
            $slider->subtitle = $request->sub_title ?? '';
            $slider->text = $request->text ?? '';
            $slider->btn_title = $request->btn_title1 ?? '';
            $slider->btn_link = $request->btn_link1 ?? '';

            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
            $slider->save();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            RequirementSlider::destroy($id);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function setting()
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $home_content = app('getHomeContent');
            return view('frontendmanage::requirements_slider.settings', compact('home_content'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function settingSubmit(Request $request)
    {
        if (hasDynamicPage()) {
            if ($request->slider_banner != null) {
                UpdateHomeContent('slider_banner', $this->saveImage($request->slider_banner));
            }

            UpdateHomeContent('show_menu_search_box', $request->show_menu_search_box == 1 ? 1 : 0);
            UpdateHomeContent('show_banner_search_box', $request->show_banner_search_box == 1 ? 1 : 0);

        }

        UpdateGeneralSetting('slider_transition_time', $request->slider_transition_time ?? 5);
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }
}
