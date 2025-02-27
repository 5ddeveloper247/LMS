<?php

namespace Modules\FooterSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\FooterSetting\Http\Requests\FooterWidgetRequest;
use Modules\FooterSetting\Services\FooterSettingService;
use Modules\FooterSetting\Services\FooterWidgetService;
use Modules\FooterSetting\Entities\FooterWidget;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\Setting\Model\GeneralSetting;

class FooterSettingController extends Controller
{
    protected $footerService;
//    protected $staticPageService;
    protected $widgetService;

    public function __construct(FooterSettingService $footerService, FooterWidgetService $widgetService)
    {
        $this->footerService = $footerService;
//        $this->staticPageService = $staticPageService;
        $this->widgetService = $widgetService;
    }

    public function index()
    {
        try {
            $staticPageList = FrontPage::where('status', 1)->get();
            $SectionOnePages = $this->widgetService->getAllCompany();
            $SectionTwoPages = $this->widgetService->getAllAccount();
            $SectionThreePages = $this->widgetService->getAllService();
            $SectionFourPages = $this->widgetService->getAllAbout();
            $setting = $this->footerService->getAll();
            return view('footersetting::footer.index', compact('staticPageList', 'SectionOnePages', 'SectionTwoPages', 'SectionThreePages', 'SectionFourPages', 'setting'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function widgetStore(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        $code = auth()->user()->language_code;

        $rules = [
            'name.' . $code => 'required|max:255',
            'category' => 'required',
            'page' => 'nullable',
        ];

        $this->validate($request, $rules, validationMessage($rules));
        try {
            if ($request->page) {
                $page = FrontPage::where('slug', $request->page)->first();

            } else {
                $page = null;
            }
            if ($page) {
                $request->merge(['slug' => $page->slug ?? '#']);
                $request->merge(['page_id' => $page->id] ?? 0);
                $request->merge(['is_static' => $page->is_static ?? 0]);
                $request->merge(['description' => $page->details ?? '']);
            } else {
                $request->merge(['slug' => '#']);
                $request->merge(['page_id' => 0]);
                $request->merge(['is_static' => 0]);
                $request->merge(['description' => '']);
            }
          //  dd($request,$page);
            $this->widgetService->save($request->except('_token'));


            $notification = array(
                'messege' => 'Page Created Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function widgetStatus(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $data = [
                'status' => $request->status == 1 ? 0 : 1
            ];
            return $this->widgetService->statusUpdate($data, $request->id);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function widgetUpdate(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $code = auth()->user()->language_code;

        $rules = [
            'name.' . $code => 'required|max:255',
            'category' => 'required',
            'page' => 'nullable',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            if ($request->page) {
                $page = FrontPage::where('slug', $request->page)->first();

            } else {
                $page = null;
            }
            if ($page) {
                $request->merge(['slug' => $page->slug ?? '#']);
                $request->merge(['page_id' => $page->id] ?? 0);
                $request->merge(['is_static' => $page->is_static ?? 0]);
                $request->merge(['description' => $page->details ?? '']);
            } else {
                $request->merge(['slug' => '#']);
                $request->merge(['page_id' => 0]);
                $request->merge(['is_static' => 0]);
                $request->merge(['description' => '']);
            }


            $request->merge(['user_id' => Auth::user()->id]);


            $this->widgetService->update($request->except('_token'), $request->id ?? 0);


            $notification = array(
                'messege' => 'Page Updated Successfully.',
                'alert-type' => 'success'
            );
            Toastr::success('Saved Successfully');
            return redirect()->back()->with($notification);
        } catch (Exception $e) {

            return $e->getMessage();
        }
    }

    public function contentUpdate(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $result = $this->footerService->update($request->except('_token'), $request->id);
            GenerateGeneralSetting(SaasDomain());
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $this->widgetService->delete($id);


            $notification = array(
                'messege' => 'Page Deleted Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function tabSelect($id)
    {
        Session::put('footer_tab', $id);
        return 'done';
    }

    public function changeFooterWidgetOrder()
    {

        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'];

        foreach ($order as $item) {
            $id = $item['id'];
            $chapter = FooterWidget::find($id);
            if ($chapter) {
                $chapter->pos = $item['new_position'];
                $chapter->save();
            }

        }

        return response()->json(200);

    }
}
