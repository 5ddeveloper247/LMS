<?php

namespace Modules\NotificationSetup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Modules\RolePermission\Entities\Role;
use Illuminate\Contracts\Support\Renderable;
use Modules\SystemSetting\Entities\EmailTemplate;
use Modules\NotificationSetup\Entities\RoleEmailTemplate;
use Modules\NotificationSetup\Entities\UserNotificationSetup;

class NotificationSetupController extends Controller
{
    public function index()
    {
        $templates = RoleEmailTemplate::where('role_id', Auth::user()->role_id)->where('status', 1)->with('template')->get();
        $user_notification_setup = UserNotificationSetup::where('user_id', Auth::user()->id)->first();

        if ($user_notification_setup) {
            $email_ids = explode(',', $user_notification_setup->email_ids);
            $browser_ids = explode(',', $user_notification_setup->browser_ids);
            $mobile_ids = explode(',', $user_notification_setup->mobile_ids);
        } else {
            $email_ids = [];
            $browser_ids = [];
            $mobile_ids = [];
        }

        return view('notificationsetup::index', compact('templates', 'user_notification_setup', 'email_ids', 'browser_ids', 'mobile_ids'));
    }

    public function UserNotificationControll()
    {
        $allTemplate = RoleEmailTemplate::with('template')->groupBy('template_act', 'role_id')->get();
        $templatesId = array_column($allTemplate->toArray(), 'id');
        RoleEmailTemplate::whereNotIn('id', $templatesId)->delete();

        $instructor_temps = $allTemplate->where('role_id', 2);
        $students_temps = $allTemplate->where('role_id', 3);
        $staffs_temps = $allTemplate->where('role_id', 4);
        $roles = Role::get();

        return view('notificationsetup::users_setup', compact('instructor_temps', 'students_temps', 'staffs_temps', 'roles'));
    }

    public function UpdateUserNotificationControll(Request $request)
    {

        try {
            $temp_setup = RoleEmailTemplate::where('role_id', $request->role_id)->update(['status' => 0]);
            if ($request->status != null) {
                $temp_setup = RoleEmailTemplate::whereIn('id', array_keys($request->status))->update(['status' => 1]);
            }
            Toastr::success('Setup Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }

    }


    public function setup(Request $request)
    {
        // return gettype(array_keys($request->email));
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            if ($request->email == null) {
                $email_ids = [];
            } else {
                $email_ids = array_keys($request->email);
            }
            if ($request->browser == null) {
                $browser_ids = [];
            } else {
                $browser_ids = array_keys($request->browser);
            }
            if ($request->mobile == null) {
                $mobile_ids = [];
            } else {
                $mobile_ids = array_keys($request->mobile);
            }


            $user_notification_setup = UserNotificationSetup::where('user_id', Auth::user()->id)->first();
            if (!$user_notification_setup) {
                $user_notification_setup = new UserNotificationSetup();
                $user_notification_setup->user_id = Auth::user()->id;
            }
            $user_notification_setup->email_ids = implode(',', $email_ids);
            $user_notification_setup->browser_ids = implode(',', $browser_ids);
            $user_notification_setup->mobile_ids = implode(',', $mobile_ids);
            $user_notification_setup->save();


            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }


    public function MyNotification()
    {
        try {
            return view('notificationsetup::notification_list');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function UpdateBrowserMsg(Request $request)
    {
        $request->validate([
            'id' => "required",
            'browser_message' => "required"
        ]);
        try {

            $template = EmailTemplate::find($request->id);
            $template->browser_message = $request->browser_message;
            $template->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();

        }
    }

}
