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
use Modules\FrontendManage\Entities\ResourceTab;

class ResourceController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $sliders = ResourceTab::all();
            $data = [];
            return view('frontendmanage::resource.index', $data, compact('sliders'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function create(){
        return view('frontendmanage::resource.add');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $slider = new ResourceTab();
            $slider->name = $request->name;
            $slider->content = $request->content ?? '';
            $slider->status = 1;
            $slider->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.resource_center.index');
            // return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function edit($id)
    {
        try {
           // $sliders = ResourceTab::all();
            $tab = ResourceTab::findOrFail($id);
            $data = [];
            return view('frontendmanage::resource.add', $data, compact('tab'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function update(Request $request)
    {

        try {
            $slider = ResourceTab::find($request->id);
            $slider->name = $request->name;
            $slider->content = $request->content ?? '';
            $slider->save();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.resource_center.index');
            // return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroy($id)
    {
        try {
            ResourceTab::destroy($id);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function settingSubmit(Request $request)
    {
        // dd($request);
            if ($request->hasFile('sidebar_image')) {
                UpdateGeneralSetting('resource_center_sidebar_image', $this->saveImage($request->sidebar_image));
            }


        UpdateGeneralSetting('resource_center_image_heading', $request->image_heading ?? '');
        UpdateGeneralSetting('resource_center_image_text', $request->image_text ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function changeTabSequence()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'];

        foreach ($order as $item) {
            $id = $item['id'];
            $course_new_seq = ResourceTab::find($id);
            $course_new_seq->pos = $item['new_position'];
            $course_new_seq->save();

            ResourceTab::where('id', $id)->update(['pos' => $item['new_position']]);
        }

        return response()->json(200);
    }
}
