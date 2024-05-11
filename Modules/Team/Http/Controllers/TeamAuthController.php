<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\TeamSetting;
use Brian2694\Toastr\Facades\Toastr;
class TeamAuthController extends Controller
{
    public function authenticate()
    {
       
        $TeamsettingObj = new Teamsetting();
        $teamSettings = $TeamsettingObj->getData();
        // dd($teamSettings->redirect_url);
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        // $redirect_uri = 'http://localhost:8000/auth/team';
        // $redirect_uri = 'https://mchnursing.com/lms/auth/team';
        $redirect_uri = $teamSettings->redirect_url;
        // dd($redirect_uri);
        $scopes = 'openid profile email User.Read offline_access OnlineMeetings.ReadWrite Team.ReadBasic.All';
        // Include 'offline_access' scope
        $authorization_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
        // Step 3: Construct Authorization URL and Redirect User
        $authorization_params = array(
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'scope' => $scopes,
            'prompt' => 'consent',
        );
        $authorization_url = $authorization_url . '?' . http_build_query($authorization_params);
        // Redirect the user to the authorization URL
        // dd($authorization_url);
        return redirect($authorization_url);
    }


    // Step 2: Callback after Microsoft login - Obtain Access Token and Refresh Token
    public function callback(Request $request)
    {

        $TeamsettingObj = new Teamsetting();
       
        $teamSettings = $TeamsettingObj->getData();
        
        // dd($teamSettings->redirect_url);
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        // $redirect_uri = 'http://localhost:8000/auth/team';
        // $redirect_uri = 'https://mchnursing.com/lms/auth/team';
        $redirect_uri = $teamSettings->redirect_url;
        $authorization_code = $request->input('code');
        // dd($authorization_code);
        $token_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
        $token_params = array(
            'grant_type' => 'authorization_code',
            'code' => $authorization_code,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
        );
        // Use PHP's cURL functions to get tokens
        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $token_params);
        $token_response = curl_exec($ch);
        $token_data = json_decode($token_response, true);
        
        //   var_dump( $token_data);
        //   die;
        if (isset($token_data['error'])) {
            // print_r($token_data['error']);
        } else {
            $access_token = $token_data['access_token'];
            $refresh_token = $token_data['refresh_token'];
            if (isset($refresh_token)) {

                $record = TeamSetting::find($teamSettings->id);
                $record->access_token = $access_token;
                $record->refresh_token = $refresh_token;
                $record->save();
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
              return  redirect('team/settings');
            } else {
                Toastr::error('Token Generation Failed', 'Failed');
               return redirect('team/settings');
            }
        }
        // Use the access token as needed...
    }

    public function refreshAccessToken()
    {
        $TeamsettingObj = new Teamsetting();
        $teamSettings = TeamSetting::find(1);


        
        // dd();
        // dd($teamSettings->redirect_url);
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        $redirect_uri = $teamSettings->redirect_url;

        //Access the refresh token
        $refresh_token = $teamSettings->refresh_token; //refresh token url
        $token_url = $teamSettings->token_url;       // token auth url
        $token_params = array(
            'grant_type' => 'refresh_token',
            // 'refresh_token' => $this->refresh_token,
            'refresh_token' => $refresh_token,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => 'https://mchnursing.com/lms/auth/team',
        );

        // Use PHP's cURL functions
        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $token_params);
        $token_response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            // Handle the error appropriately
            return;
        }

        curl_close($ch);
        // Decode the token response
        $token_data = json_decode($token_response, true);
       
        // $this->storeTokens($token_data['refresh_token']);
        return $token_data;
    }
}
