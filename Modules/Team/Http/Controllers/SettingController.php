<?php

namespace Modules\Team\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Modules\Team\Entities\TeamSetting;

class SettingController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        $setting = TeamSetting::where('user_id', Auth::id())->first();
        // if ($setting) {
        //     $setting->team_api_key_of_user = $user->team_api_key_of_user ?? '';
        //     $setting->team_api_serect_of_user = $user->team_api_serect_of_user ?? '';
        // }


        return view('team::settings', compact('setting'));
    }

    public function updateSettings(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        $user = Auth::user();
        $rules = [
            // 'package_id' => 'required',
            // 'host_video' => 'required',
            // 'participant_video' => 'required',
            // 'join_before_host' => 'required',
            // 'audio' => 'required',
            // 'auto_recording' => 'required',
            // 'approval_type' => 'required',
            // 'mute_upon_entry' => 'required',
            // 'waiting_room' => 'required',
            // 'api_key' => 'required',
            // 'secret_key' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $setting = TeamSetting::first();
            if(!$setting){
                $setting = new TeamSetting();
            }
            $setting->client_id = $request->client_id;
            $setting->client_secret = $request->client_secret;
            $setting->save();
            // TeamSetting::updateOrCreate([
            //     'user_id' => $user->id,
            // ], [
            //     'user_id' => Auth::id() ?? 1,
            //     'package_id' => $request['package_id'],
            //     'host_video' => $request['host_video'],
            //     'participant_video' => $request['participant_video'],
            //     'join_before_host' => $request['join_before_host'],
            //     'audio' => $request['audio'],
            //     'auto_recording' => $request['auto_recording'],
            //     'approval_type' => $request['approval_type'],
            //     'mute_upon_entry' => $request['mute_upon_entry'],
            //     'waiting_room' => $request['waiting_room'],
            //     'team_api_key_of_user' => $request['api_key'],
            //     'team_api_serect_of_user' => $request['secret_key'],
            // ]);
            // $user->team_api_key_of_user = $request->get('api_key');
            // $user->team_api_serect_of_user = $request->get('secret_key');
            // $user->save();
            Artisan::call('config:clear');
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

}
