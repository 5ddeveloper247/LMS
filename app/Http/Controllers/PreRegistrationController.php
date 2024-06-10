<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PreRegistration;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class PreRegistrationController extends Controller{

  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
      $this->userRepository = $userRepository;
  }

  public function index(){
    $contactLogin = session()->has('contactLogin') ? session()->get('contactLogin') : null;
    session()->forget('contactLogin');
    return view(theme('authnew.pre-registration'),compact('contactLogin'));
  }

  public function preRegister(Request $request){

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:pre-registration,email|unique:users,email',
        'password' => 'required|confirmed',
    ]);

    // PreRegistration::create([
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'password' => Hash::make($request->password),
    // ]);
    $data = [
        'name' => $request->name ?? null,
        'phone' => $request->phone ?? null,
        'email' => $request->email ?? null,
        'zip' => null,
        'role_id' => 3,
        'dob' => null,
        'gender' => null,
        'student_type' => null,
        'job_title' => null,
        'identification_number' => null,
        'company' => null,
        'password' => Hash::make($request->password),
        'language_id' => Settings('language_id') ?? '19',
        'language_name' => Settings('language_name') ?? 'English',
        'language_code' => Settings('language_code') ?? 'en',
        'language_rtl' => Settings('language_rtl') ?? '0',
        'country' => Settings('country_id'),
        'enroll_date' => null,
        'preregister_date' => date('Y-m-d'),
        'username' => null,
        'address' =>  null,
        'status' => 1,
        'register_source' => 'Form',
        'enrolled' => 'No',
        'is_lms_signup' => null,
        'institute_name' => null,
        'domain' => null,
        'level' => '',
    ];

    $newuser = $this->userRepository->create($data);
    Auth::login($newuser);
    $codes = [
        'time' => Carbon::now()->format('d-M-Y, g:i A'),
        'name' => $request->name,
        'type' => 'student',
    ];
    send_email($newuser,'Pre_Register_Student',$codes);
    Toastr::success('Signup successfull', 'Success');
    return redirect('/');
  }


  public function logout()
  {
      session()->forget('pre-registered-user');
      Toastr::success('Logout successfull', 'Success');
      return redirect('/');
  }

public function redirectToGoogle(Request $request)
    {
        // $ip = $request->ip();
        // dd($ip);
        return redirect()->away('https://accounts.google.com/o/oauth2/auth?' . http_build_query([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URL'),
            'response_type' => 'code',
            'scope' => 'openid profile email https://www.googleapis.com/auth/user.birthday.read ',
            'access_type' => 'offline', // Use offline access to get refresh token
            'prompt' => 'consent',
        ]));
    }



    public function handleGoogleCallback(Request $request)
    {
        $code = $request->input('code');
        // Send a POST request to Google's token endpoint to exchange the code for tokens
        $response = Http::post('https://oauth2.googleapis.com/token', [
            'code' => $code,
            'client_id' => saasEnv('GOOGLE_CLIENT_ID'),
            'client_secret' => saasEnv('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URL'),
            'grant_type' => 'authorization_code',
        ]);

        $data = $response->json();

        $accessToken = $data['access_token'];
        // Make a request to Google's userinfo API to get the user's profile including birthday
        $profileResponse = Http::get('https://www.googleapis.com/oauth2/v2/userinfo', [
            'access_token' => $accessToken,
        ]);
        $profileData = $profileResponse->json();
        // dd($profileData['locale']);
        $data['name'] = $profileData['name'];
        $data['email'] = $profileData['email'];
        $data['password'] = $profileData['id'];
        $data['language'] = $profileData['locale'];

        $checkifRegistered = User::where('email',$data['email'])->first();

        if(!$checkifRegistered){
          $userData = [
              'name' => $data['name'] ?? null,
              'phone' => null,
              'email' => $data['email'] ?? null,
              'zip' => null,
              'role_id' => 3,
              'dob' => null,
              'gender' => null,
              'student_type' => null,
              'job_title' => null,
              'identification_number' => null,
              'company' => null,
              'password' => Hash::make($data['password']),
              'language_id' => Settings('language_id') ?? '19',
              'language_name' => Settings('language_name') ?? 'English',
              'language_code' => Settings('language_code') ?? 'en',
              'language_rtl' => Settings('language_rtl') ?? '0',
              'country' => Settings('country_id'),
              'username' => null,
              'address' =>  null,
              'status' => 1,
              'register_source' => 'Google',
              'enrolled' => 'No',
              'is_lms_signup' => null,
              'institute_name' => null,
              'domain' => null,
              'level' => '',
          ];
          $newuser = $this->userRepository->create($userData);
        }else{
          $newuser = $checkifRegistered;
        }
        Auth::login($newuser);
            Toastr::success('Login successfull', 'Success');
            return redirect('/');
    }




    // for facebook authentication

    public function loginWithFacebook()
    {
        $clientId = env('FACEBOOK_CLIENT_ID');
        $redirectUri = env('FACEBOOK_REDIRECT_URL');
        // $redirectUri = 'https://curator365.com/auth/facebook/callback';
        $scope = 'email user_birthday user_gender';
        $authUrl = "https://www.facebook.com/v10.0/dialog/oauth?" .
            "client_id={$clientId}" .
            "&redirect_uri={$redirectUri}" .
            "&scope={$scope}" .
            "&response_type=code";
        return redirect($authUrl);
    }
    public function handleFacebookCallback(Request $request)
    {
        $code = $request->input('code');
        $clientId = saasEnv('FACEBOOK_CLIENT_ID');
        $clientSecret = saasEnv('FACEBOOK_CLIENT_SECRET');
        $redirectUri = env('FACEBOOK_REDIRECT_URL');
        $client = new Client();
        $response = $client->get("https://graph.facebook.com/v10.0/oauth/access_token", [
            'query' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect_uri' => $redirectUri,
                'code' => $code,
            ],
        ]);
        $tokenData = json_decode($response->getBody());
        // Use $tokenData to access user information and perform sign-up/sign-in logic.
        // For example, you can fetch user data from Facebook using the access token.
        $accessToken = $tokenData->access_token;
        $response = $client->get("https://graph.facebook.com/v10.0/me?fields=id,name,email", [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);
        $profileData = json_decode($response->getBody());
        dd($profileData);
        // Implement your sign-up/sign-in logic here using $userData.
        return redirect('/dashboard');
    }

}
