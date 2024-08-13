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
        $redirect_uri = $teamSettings->redirect_url;
        // dd($redirect_uri);
        $scopes = 'openid profile email User.Read User.ReadBasic.All User.Read.All User.ReadWrite.All offline_access OnlineMeetings.ReadWrite Team.ReadBasic.All';
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
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
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
        //$refresh_token = 'eyJ0eXAiOiJKV1QiLCJub25jZSI6IjZndHJvRWJNY0lxaGZlNnVQbjdvTHlhX2tDMzhDQnVFS2tNMk8zbzlFWG8iLCJhbGciOiJSUzI1NiIsIng1dCI6IkwxS2ZLRklfam5YYndXYzIyeFp4dzFzVUhIMCIsImtpZCI6IkwxS2ZLRklfam5YYndXYzIyeFp4dzFzVUhIMCJ9.eyJhdWQiOiIwMDAwMDAwMy0wMDAwLTAwMDAtYzAwMC0wMDAwMDAwMDAwMDAiLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC9lZDEwNDc2My02ZGEzLTQ5NTgtYTMzMi0yYjNjMzc3YThlOTAvIiwiaWF0IjoxNzE4MDQ3OTgwLCJuYmYiOjE3MTgwNDc5ODAsImV4cCI6MTcxODEzNDY4MCwiYWNjdCI6MCwiYWNyIjoiMSIsImFpbyI6IkFWUUFxLzhYQUFBQTFvSXQwSmRTTmVybkRDdytybVlLRnlEU3VPSUQ1TTRNYUFhL2N2WkVZRStSVGR3WThVTEZ6MUZHckdyU3pHemNmUG1lb3dleXZzNHdoQmlORlhKc1ptUWVqbFNEcmdSWmI2aEROMzJOd2ZFPSIsImFtciI6WyJwd2QiLCJtZmEiXSwiYXBwX2Rpc3BsYXluYW1lIjoiR3JhcGggRXhwbG9yZXIiLCJhcHBpZCI6ImRlOGJjOGI1LWQ5ZjktNDhiMS1hOGFkLWI3NDhkYTcyNTA2NCIsImFwcGlkYWNyIjoiMCIsImlkdHlwIjoidXNlciIsImlwYWRkciI6IjI0MDc6YWE4MDozMTQ6YjgyNjozNDozMWQzOjVlNzc6MmUyNiIsIm5hbWUiOiJNZXJha2lpIFZpcnR1YWwgQ2xhc3MiLCJvaWQiOiJmYTI4MzlmOC1mM2I4LTQ2M2EtYTI1OS04MWMwYTNhNDU4MjMiLCJwbGF0ZiI6IjMiLCJwdWlkIjoiMTAwMzIwMDFFN0ExNkExMiIsInJoIjoiMC5BWFlBWTBjUTdhTnRXRW1qTWlzOE4zcU9rQU1BQUFBQUFBQUF3QUFBQUFBQUFBQzBBUDAuIiwic2NwIjoiQ2FsZW5kYXJzLlJlYWRXcml0ZSBDaGF0LkNyZWF0ZSBDaGF0LlJlYWRXcml0ZSBEZXZpY2VNYW5hZ2VtZW50QXBwcy5SZWFkV3JpdGUuQWxsIERldmljZU1hbmFnZW1lbnRDb25maWd1cmF0aW9uLlJlYWRXcml0ZS5BbGwgRGV2aWNlTWFuYWdlbWVudE1hbmFnZWREZXZpY2VzLlJlYWRXcml0ZS5BbGwgRGV2aWNlTWFuYWdlbWVudFNlcnZpY2VDb25maWcuUmVhZFdyaXRlLkFsbCBEaXJlY3RvcnkuUmVhZFdyaXRlLkFsbCBHcm91cC5SZWFkV3JpdGUuQWxsIE9ubGluZU1lZXRpbmdzLlJlYWRXcml0ZSBvcGVuaWQgcHJvZmlsZSBUZWFtLkNyZWF0ZSBUZWFtU2V0dGluZ3MuUmVhZFdyaXRlLkFsbCBVc2VyLlJlYWQgVXNlci5SZWFkLkFsbCBVc2VyLlJlYWRXcml0ZS5BbGwgZW1haWwiLCJzdWIiOiJZZHdQeEtqbGJ1c240c0JodGNVNmRMT3NmNmF6aUdZUWY0ZEZfU3k2QmxnIiwidGVuYW50X3JlZ2lvbl9zY29wZSI6Ik5BIiwidGlkIjoiZWQxMDQ3NjMtNmRhMy00OTU4LWEzMzItMmIzYzM3N2E4ZTkwIiwidW5pcXVlX25hbWUiOiJtY29odmlydHVhbEBtZXJha2ludXJzaW5nLmNvbSIsInVwbiI6Im1jb2h2aXJ0dWFsQG1lcmFraW51cnNpbmcuY29tIiwidXRpIjoiVWozekFrMWRfRVN0YllENzJFVjFBQSIsInZlciI6IjEuMCIsIndpZHMiOlsiNjJlOTAzOTQtNjlmNS00MjM3LTkxOTAtMDEyMTc3MTQ1ZTEwIiwiYjc5ZmJmNGQtM2VmOS00Njg5LTgxNDMtNzZiMTk0ZTg1NTA5Il0sInhtc19jYyI6WyJDUDEiXSwieG1zX3NzbSI6IjEiLCJ4bXNfc3QiOnsic3ViIjoiVUtzMHAxQlhrWXdKR29hNmdsVnl6S3JrdEM2VUJRVUNxT25GbVZWRVJ4USJ9LCJ4bXNfdGNkdCI6MTY0NzM4MjQ1MX0.ALTy5g1Hj5BZG6izGk0omiexMxmlv4n2dxjhNa5NVHKReoeWtpzfI8UPI0S84S5-a6Tle6NvfEWnRBZq_qH2HDzOwF-O5ujcq7DTWVnYVASnOreR_Qs_8ljzeyajqV_RAjcw32mhJlgsWmlefCYLmsW4F-pNK3izU7KQyUX3T1H4BhqHFhCkprc5h3LV_eE4NSitG5sVEvAsYfs5fP40UgI6OcEFHEdgI-cP6QEdXrrQ0XE2ZmsOEnMqPO5dsKo5et_Ruszse5elzrOZhCITmTIT6wYyGXnf-URMKTIu_zylImypjP07ucCIXRNefqq6ftjW5NHKTPEBJkg1K2xi_A';
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
