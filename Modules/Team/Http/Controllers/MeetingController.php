<?php

namespace Modules\Team\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\Team\Entities\TeamMeeting;
use Modules\Team\Entities\TeamMeetingUser;
use Modules\Team\Entities\TeamSetting;
use Team;

class MeetingController extends Controller
{
    public function __construct()
    {
        Artisan::call('config:clear');
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|RedirectResponse|View
     */
    public function about()
    {
        $module = 'Team';

        return $module;
    }

    public function index()
    {

        $data = $this->defaultPageData();
        $data['user'] = Auth::user();
        $data['instructors'] = User::select('id', 'name')->whereIn('role_id', [1, 2])->get();
        $data['classes'] = VirtualClass::select('id', 'title')->where('host', 'Team')->latest()->get();
        $data['teamSetting'] = TeamSetting::first();
        return view('team::meeting.meeting', $data);
    }

    private function defaultPageData()
    {
        $user = Auth::user();
        $data['default_settings'] = TeamSetting::firstOrCreate([
            'user_id' => $user->id
        ], [
            '$user->id' => $user->id,
        ]);


        if (Auth::user()->role_id == 1) {
            $data['meetings'] = TeamMeeting::orderBy('id', 'DESC')->get();
        } else {
            $data['meetings'] = TeamMeeting::orderBy('id', 'DESC')->whereHas('participates', function ($query) {
                return $query->where('user_id', Auth::user()->id);
            })
                ->where('status', 1)
                ->get();
        }
        return $data;
    }

    public function meetingStart($id)
    {


        try {
            $meeting = TeamMeeting::where('meeting_id', $id)->first();

            if (!$meeting->currentStatus == 'started') {
                Toastr::error('Class not yet start, try later', 'Failed');
                return redirect()->back();
            }
            if (!$meeting->currentStatus == 'closed') {
                Toastr::error('Class are closed', 'Failed');
                return redirect()->back();
            }

            return redirect($meeting->teamUrl);
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $instructor_id = $request->get('instructor_id');
        } else {
            $instructor_id = Auth::user()->id;
        }

        $class_id = $request->get('class_id');

        $rules = [

            'class_id' => 'required',
            'topic' => 'required',
            'description' => 'nullable',
            'password' => 'required',
            'attached_file' => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx',
            'time' => 'required',
            'durration' => 'required',
            'join_before_host' => 'required',
            'host_video' => 'required',
            'participant_video' => 'required',
            'mute_upon_entry' => 'required',
            'waiting_room' => 'required',
            'audio' => 'required',
            'auto_recording' => 'nullable',
            'approval_type' => 'required',
            'is_recurring' => 'required',
            'recurring_type' => 'required_if:is_recurring,1',
            'recurring_repect_day' => 'required_if:is_recurring,1',
            'recurring_end_date' => 'required_if:is_recurring,1',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            //Available time check for classs
            if ($this->isTimeAvailableForMeeting($request, $id = 0)) {
                Toastr::error('Virtual class time is not available for teacher and student!', 'Failed');
                return redirect()->back();
            }

            //Chekc the number of api request by today max limit 100 request
            if (TeamMeeting::whereDate('created_at', Carbon::now())->count('id') >= 100) {
                Toastr::error('You can not create more than 100 meeting within 24 hour!', 'Failed');
                return redirect()->back();
            }


            $users = Team::user()->where('status', 'active')->setPaginate(false)->setPerPage(300)->get()->toArray();

            $profile = $users['data'][0];
            $start_date = Carbon::parse($request['date'])->format('Y-m-d') . ' ' . date("H:i:s", strtotime($request['time']));
            $meeting = Team::meeting()->make([
                "topic" => $request['topic'],
                "type" => $request['is_recurring'] == 1 ? 8 : 2,
                "duration" => $request['durration'],
                "timezone" => Settings('active_time_zone'),
                "password" => $request['password'],
                "start_time" => new Carbon($start_date),
            ]);

            $meeting->settings()->make([
                'join_before_host' => $this->setTrueFalseStatus($request['join_before_host']),
                'host_video' => $this->setTrueFalseStatus($request['host_video']),
                'participant_video' => $this->setTrueFalseStatus($request['participant_video']),
                'mute_upon_entry' => $this->setTrueFalseStatus($request['mute_upon_entry']),
                'waiting_room' => $this->setTrueFalseStatus($request['waiting_room']),
                'audio' => $request['audio'],
                'auto_recording' => $request->has('auto_recording') ? $request['auto_recording'] : 'none',
                'approval_type' => $request['approval_type'],
            ]);

            if ($request['is_recurring'] == 1) {
                $end_date = Carbon::parse($request['recurring_end_date'])->endOfDay();
                $meeting->recurrence()->make([
                    'type' => $request['recurring_type'],
                    'repeat_interval' => $request['recurring_repect_day'],
                    'end_date_time' => $end_date
                ]);
            }
            $meeting_details = Team::user()->find($profile['id'])->meetings()->save($meeting);

            DB::beginTransaction();
            $fileName = "";
            if ($request->file('attached_file') != "") {
                $file = $request->file('attached_file');
                $ignore = strtolower($file->getClientOriginalExtension());
                if ($ignore != 'php') {
                    $fileName = $request['topic'] . time() . "." . $file->getClientOriginalExtension();
                    $file->move('public/uploads/team-meeting/', $fileName);
                    $fileName = 'public/uploads/team-meeting/' . $fileName;
                }
            }
            $system_meeting = TeamMeeting::create([
                'topic' => $request['topic'],
                'instructor_id' => $instructor_id,
                'class_id' => $class_id,
                'description' => $request['description'],
                'date_of_meeting' => $request['date'],
                'time_of_meeting' => $request['time'],
                'meeting_duration' => $request['durration'],

                'host_video' => $request['host_video'],
                'participant_video' => $request['participant_video'],
                'join_before_host' => $request['join_before_host'],
                'mute_upon_entry' => $request['mute_upon_entry'],
                'waiting_room' => $request['waiting_room'],
                'audio' => $request['audio'],
                'auto_recording' => $request->has('auto_recording') ? $request['auto_recording'] : 'none',
                'approval_type' => $request['approval_type'],

                'is_recurring' => $request['is_recurring'],
                'recurring_type' => $request['is_recurring'] == 1 ? $request['recurring_type'] : null,
                'recurring_repect_day' => $request['is_recurring'] == 1 ? $request['recurring_repect_day'] : null,
                'recurring_end_date' => $request['is_recurring'] == 1 ? $request['recurring_end_date'] : null,
                'meeting_id' => $meeting_details->id,
                'password' => $meeting_details->password,
                'start_time' => Carbon::parse($start_date)->toDateTimeString(),
                'end_time' => Carbon::parse($start_date)->addMinute($request['durration'])->toDateTimeString(),
                'attached_file' => $fileName,
                'created_by' => Auth::user()->id,
            ]);


            $user = new TeamMeetingUser();
            $user->meeting_id = $system_meeting->id;
            $user->user_id = $instructor_id;
            $user->host = 1;
            $user->save();

            DB::commit();

            if ($system_meeting) {
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
                return redirect()->back();
            } else {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }
        } catch (Exception $e) {

            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function createUserEmail($email){
        // First, retrieve the user's Azure AD object ID
        $userEmail = $email;
        $userId = null;
        $teamauthobj = new TeamAuthController();
            $tokenData = $teamauthobj->refreshAccessToken();
            // $tokenData = $this->refreshAccessToken();
            if(array_key_exists("error",$tokenData)){
                $msg = (Auth::user()->role_id == 1) ? 'Teams API credentials have expired. Either Generate Token from API Settings or check the Client ID and Secret.' : 'Error creating Teams meeting link. The API credentials may have expired.';
                Toastr::error($msg);
                return array('status' => 0,'data' => $msg);
            }

                $access_token = $tokenData['access_token'];
        $curl = curl_init();
        
        $jsonData = '{
            "accountEnabled": true,
            "displayName": "Adele Vance",
            "mailNickname": "AdeleV",
            "userPrincipalName": "'.$email.'",
            "passwordProfile" : {
                "forceChangePasswordNextSignIn": true,
                "password": "xWwvJ]6NMw+bWH-d"
            }
            }';
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users',
            // CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users?$filter=userPrincipalName=' . $userEmail,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $access_token,
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $userData = json_decode($response, true);
        return array('status' => 1, 'data' => $userData);
    }
    public function getTeamUserIdFromEmail($email,$access_token){
        // First, retrieve the user's Azure AD object ID
        $userEmail = $email;
        $userId = null;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users?$filter=userPrincipalName%20eq%20\'' . urlencode($userEmail) . '\'',
            // CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users?$filter=userPrincipalName=' . $userEmail,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $access_token,
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $userData = json_decode($response, true);
        if (isset($userData['value'][0]['id'])) {
            $userId = $userData['value'][0]['id'];
        }
        return $userId;
    }


    public function classStore($data)
    {

       

        try {
            $start_date = Carbon::parse($data['date'])->format('Y-m-d') . ' ' . date("H:i:s", strtotime($data['time']));
            
            $minutesToAdd = $data['duration'];
            // dd($minutesToAdd);
            $start_time = $start_date;
            $endTime = date('Y-m-d H:i:s', strtotime($start_date . ' + ' . $minutesToAdd . ' minutes'));
            $teamauthobj = new TeamAuthController();
            $tokenData = $teamauthobj->refreshAccessToken();
            // $tokenData = $this->refreshAccessToken();
            if(array_key_exists("error",$tokenData)){
                $msg = (Auth::user()->role_id == 1) ? 'Teams API credentials have expired. Either Generate Token from API Settings or check the Client ID and Secret.' : 'Error creating Teams meeting link. The API credentials may have expired.';
                Toastr::error($msg);
                return redirect()->back();
            }else{

                $access_token = $tokenData['access_token'];
                $startDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $start_time)->format('Y-m-d\TH:i:s\Z');
                
                $endDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $endTime)->format('Y-m-d\TH:i:s\Z');
                // $attendeeId = $this->getTeamUserIdFromEmail('lmstest@merakinursing.com',$access_token);
                // dd($attendeeId);
                $curl = curl_init();
                $jsonData = '{"startDateTime":"'.$startDateTime.'", 
                "endDateTime":"'.$endDateTime.'", 
                "subject": "'.$data['description'].'",
                "allowMeetingChat": "enabled",
                "allowAttendeeToEnableCamera": true,
                "allowAttendeeToEnableMic": true,
                "isCopyToClipboardEnabled": true,
                "allowRecording": true,
                "allowTranscription": true,
                "isLobbyEnabled": true,
                "whoCanPresent": "organization",
                "allowedPresenters": "organization",
                "lobbyBypassSettings":{
                    "scope":"everyone",
                    "isDialInBypassEnabled":true
                }
                }';
                
                //dd($jsonData);
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('Meeting_Url'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $jsonData,
                    CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $access_token,
                    ),
                ));

            $response = curl_exec($curl);
            curl_close($curl);
            
            $response = json_decode($response);
            
            
            
            // $r=$response['joinMeetingId'];
            $meeting_id = $response->id ?? null;
            $system_meeting = new TeamMeeting();
            $system_meeting->topic = $data['topic'];
            $system_meeting->instructor_id = $data['instructor_id'];
            $system_meeting->class_id = $data['class_id'];
            $system_meeting->description = $data['description'];
            $system_meeting->date_of_meeting = $data['date'];
            $system_meeting->time_of_meeting = $data['time'];
            $system_meeting->meeting_duration = $data['duration'];
            $system_meeting->host_video = $data['host_video'];
            $system_meeting->participant_video = $data['participant_video'];
            $system_meeting->join_before_host = $data['join_before_host'];
            $system_meeting->mute_upon_entry = $data['mute_upon_entry'];
            $system_meeting->waiting_room = $data['waiting_room'];
            $system_meeting->audio = $data['audio'];
            $system_meeting->auto_recording = $data['auto_recording'];
            $system_meeting->approval_type = $data['approval_type'];
            $system_meeting->is_recurring = $data['is_recurring'];
            $system_meeting->recurring_type = $data['is_recurring'] == 1 ? $data['recurring_type'] : null;
            $system_meeting->recurring_repect_day = $data['is_recurring'] == 1 ? $data['recurring_repect_day'] : null;
            $system_meeting->recurring_end_date = $data['is_recurring'] == 1 ? $data['recurring_end_date'] : null;
            $system_meeting->meeting_id = strval($meeting_id);
            $system_meeting->password = '';
            $system_meeting->url = $response->joinUrl; // join Url
            //  $system_meeting->start_url = $response->joinUrl; //meeting _url
            $system_meeting->start_url = $response->joinWebUrl; //meeting _url
            $system_meeting->start_time = Carbon::parse($start_date)->toDateTimeString();
            $system_meeting->end_time = Carbon::parse($start_date)->addMinute($data['duration'])->toDateTimeString();
            $system_meeting->attached_file = $data['attached_file'];
            $system_meeting->created_by = Auth::user()->id;
            $system_meeting->save();
            $user = new TeamMeetingUser();
            $user->meeting_id = $system_meeting->id;
            $user->user_id = Auth::user()->id;
            $user->host = 1;
            $user->save();
            
            
            if ($system_meeting) {
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
                return redirect()->back();
            } else {
                Toastr::error('Database Error', trans('common.Failed'));
                return redirect()->back();
            }
          }
        } catch (Exception $e) {

            Toastr::error($e->getMessage(), trans('common.Failed'));
            return redirect()->back();
        }
    }


    // Refresh access_token for Meeting Creation
    // public function refreshAccessToken()
    // {

    //     $client_id = env('Client_Id');
    //     $client_secret = env('Client_Secret');
    //     $redirect_uri = env('Redirect_Uri');
    //     //Access the refresh token
    //     $refresh_token = env('Microsoft_Team_Token'); //refresh token url
    //     $token_url = env('Token_Url');       // token auth url
    //     $token_params = array(
    //         'grant_type' => 'refresh_token',
    //         // 'refresh_token' => $this->refresh_token,
    //         'refresh_token' => $refresh_token,
    //         'client_id' => $client_id,
    //         'client_secret' => $client_secret,
    //         'redirect_uri' => $redirect_uri,
    //     );

    //     // Use PHP's cURL functions
    //     $ch = curl_init($token_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $token_params);
    //     $token_response = curl_exec($ch);
    //     // Check for cURL errors
    //     if (curl_errno($ch)) {
    //         echo 'cURL error: ' . curl_error($ch);
    //         // Handle the error appropriately
    //         return;
    //     }

    //     curl_close($ch);
    //     // Decode the token response
    //     $token_data = json_decode($token_response, true);
    //     //dd($token_data);
    //     // $this->storeTokens($token_data['refresh_token']);
    //     return $token_data;
    // }













    private function isTimeAvailableForMeeting($request, $id)
    {

        if (isset($request['participate_ids'])) {
            $teacherList = $request['participate_ids'];
        } else {
            $teacherList = [Auth::user()->id];
        }

        if ($id != 0) {
            $meetings = TeamMeeting::where('date_of_meeting', Carbon::parse($request['date'])->format("m/d/Y"))
                ->where('id', '!=', $id)
                ->whereHas('participates', function ($q) use ($teacherList) {
                    $q->whereIn('user_id', $teacherList);
                })
                ->get();
        } else {
            $meetings = TeamMeeting::where('date_of_meeting', Carbon::parse($request['date'])->format("m/d/Y"))
                ->whereHas('participates', function ($q) use ($teacherList) {
                    $q->whereIn('user_id', $teacherList);
                })
                ->get();
        }
        if ($meetings->count() == 0) {
            return false;
        }
        $checkList = [];

        foreach ($meetings as $key => $meeting) {
            $new_time = Carbon::parse($request['date'] . ' ' . date("H:i:s", strtotime($request['time'])));
            if ($new_time->between(Carbon::parse($meeting->start_time), Carbon::parse($meeting->end_time))) {
                array_push($checkList, $meeting->time_of_meeting);
            }
        }
        if (count($checkList) > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function setTrueFalseStatus($value)
    {
        if ($value == 1) {
            return true;
        }
        return false;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function show($id)
    {

        try {
            $localMeetingData = TeamMeeting::where('meeting_id', $id)->first();
            
        $data['teamSetting'] = TeamSetting::first();
            $results = Team::meeting()->find($id);
            if ($localMeetingData) {
                if ($results) {
                    $results = $results->toArray();
                }
                return view('team::meeting.meetingDetails', compact('localMeetingData', 'results','teamSetting'));
            } else {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit($id)
    {

        try {
            $data = $this->defaultPageData();
            $data['editdata'] = TeamMeeting::findOrFail($id);
            $classid = $data['editdata']->class_id;
            $data['user'] = Auth::user();
            $data['classes'] = VirtualClass::select('id', 'title')->where('host', 'Team')->latest()->get();
            $data['instructors'] = User::select('id', 'name')->whereIn('role_id', [1, 2])->get();
            $data['participate_ids'] = DB::table('team_meeting_users')->where('meeting_id', $id)->select('user_id')->pluck('user_id');
            
        $data['teamSetting'] = TeamSetting::first();
            $data['user_type'] = $data['editdata']->participates[0]['role_id'];
            $data['userList'] = User::where('role_id', $data['user_type'])
                ->whereIn('id', $data['participate_ids'])
                ->select('id', 'name', 'role_id')->get();
            if (Auth::user()->role_id != 1) {
                if (Auth::user()->id != $data['editdata']->class->course->user_id) {
                    Toastr::error('Class is created by other, you could not modify !', 'Failed');
                    return redirect()->back();
                }
            }
            return view('team::meeting.meeting', $data);
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role_id == 1) {
            $instructor_id = $request->get('instructor_id');
        } else {
            $instructor_id = Auth::user()->id;
        }

        $rules = [
            'class_id' => 'required',
            'topic' => 'required',
            'description' => 'nullable',
            'attached_file' => 'nullable|mimes:jpeg,png,jpg,doc,docx,pdf,xls,xlsx',
            'time' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));
        $teamauthobj = new TeamAuthController();
            $tokenData = $teamauthobj->refreshAccessToken();
           
            // $tokenData = $this->refreshAccessToken();
            if(array_key_exists("error",$tokenData)){
              Toastr::error('Error creating Teams meeting link');
              return redirect()->back();
            }
            $access_token = $tokenData['access_token'];
        try {
            $system_meeting = TeamMeeting::findOrFail($id);
            $teamMeeting = $system_meeting->first();
            $start_date = Carbon::parse($request['date'])->format('Y-m-d') . ' ' . date("H:i:s", strtotime($request['time']));

            DB::beginTransaction();

            $system_meeting->update([
                'instructor_id' => $instructor_id,
                'class_id' => $request['class_id'],
                'topic' => $request['topic'],
                'description' => $request['description'],
                'date_of_meeting' => Carbon::parse($request['date'])->format('m/d/Y'),
                'time_of_meeting' => $request['time'],

                'updated_by' => Auth::user()->id,
            ]);

            if ($request->file('attached_file') != "") {
                if (file_exists($system_meeting->attached_file)) {
                    unlink($system_meeting->attached_file);
                }
                $file = $request->file('attached_file');
                $ignore = strtolower($file->getClientOriginalExtension());
                if ($ignore != 'php') {
                    $fileName = $request['topic'] . time() . "." . $file->getClientOriginalExtension();
                    $file->move('public/uploads/team-meeting/', $fileName);
                    $fileName = 'public/uploads/team-meeting/' . $fileName;
                    $system_meeting->update([
                        'attached_file' => $fileName
                    ]);
                }
            }

            

            $startDateTime = $teamMeeting->start_time;
        // dd($startDateTime); "2023-12-19T11:48:00Z"
        // die;
        $endDateTime = $teamMeeting->end_time;
        $agenda = $request['topic'];
        $meetingId = $teamMeeting->meeting_id;
        // echo('start:'. $startDateTime);
        // echo('endtime'. $endDateTime);
        // dd('jkfjlaskjfdlkajsflkajs');

           $curl = curl_init();
           $jsonData = '{"startDateTime":"'.$startDateTime.'", "endDateTime":"'.$endDateTime.'", "subject": "'.$agenda.'"';

          //dd($jsonData);
           curl_setopt_array($curl, array(
               CURLOPT_URL => env('Meeting_Url').'/'.$meetingId,
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => '',
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 0,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => 'PATCH',
               CURLOPT_POSTFIELDS => $jsonData,
               CURLOPT_HTTPHEADER => array(
                   'Content-Type: application/json',
                   'Authorization: Bearer ' . $access_token,
               ),
           ));

           $response = curl_exec($curl);
           curl_close($curl);

           $response = json_decode($response);

            if (isset($request->instructor_id) && !empty($request->instructor_id)) {
                TeamMeetingUser::where('meeting_id', $id)->delete();
                $teamUser = new TeamMeetingUser();
                $teamUser->meeting_id = $id;
                $teamUser->user_id = $request->instructor_id;
                $teamUser->host = 1;
                $teamUser->save();
            }

            DB::commit();
            Toastr::success('Class updated successful', 'Success');
            return redirect()->route('team.meetings');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function cancel(Request $request){
        try {
            $id = $request->meeting_id;
            $meeting = TeamMeeting::where('id',$id);
            $update = $meeting->update(['cancelled' => 1]);
            if ($update) {
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
                return redirect()->back();
            } else {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $localMeeting = TeamMeeting::findOrFail($id);
            $class = VirtualClass::where('id', $localMeeting->class_id)->first();
            if (Auth::user()->role_id != 1) {
                if (Auth::user()->id != $localMeeting->created_by) {
                    Toastr::error('Class is created by other, you could not DELETE !', 'Failed');
                    return redirect()->back();
                }
            }

            $meeting = Team::meeting();
            $meeting->find($localMeeting->meeting_id);
            $meeting->delete(true);

            if (file_exists($localMeeting->attached_file)) {
                unlink($localMeeting->attached_file);
            }
            TeamMeetingUser::where('meeting_id', $id)->delete();
            $localMeeting->delete();
            $class->total_class = $class->total_class - 1;
            $class->save();

            Toastr::success('Class deleted successful', 'Success');
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function userWiseUserList(Request $request)
    {
        if ($request->has('user_type')) {
            $userList = User::where('role_id', $request['user_type'])
                ->select('id', 'name')->get();
            return response()->json([
                'users' => $userList
            ]);
        }
    }

    private function setNotificaiton($users, $role_id, $updateStatus)
    {
        $now = Carbon::now('utc')->toDateTimeString();
        $notification_datas = [];

        if ($updateStatus == 1) {
            foreach ($users as $key => $user) {
                array_push(
                    $notification_datas,
                    [
                        'user_id' => $user,
                        'role_id' => $role_id,
                        'date' => date('Y-m-d'),
                        'message' => 'Team meeting is updated by ' . Auth::user()->name . '',
                        'url' => route('team.meetings'),
                        'created_at' => $now,
                        'updated_at' => $now
                    ]
                );
            }
        } else {
            foreach ($users as $key => $user) {
                array_push(
                    $notification_datas,
                    [
                        'user_id' => $user,
                        'role_id' => $role_id,
                        'date' => date('Y-m-d'),
                        'message' => 'Team meeting is created by ' . Auth::user()->name . ' with you',
                        'url' => route('team.meetings'),
                        'created_at' => $now,
                        'updated_at' => $now
                    ]
                );
            }
        }
    }
}
