<?php

namespace App\Http\Middleware;

use App\Events\LastActivityEvent;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserSetting;
use App\Models\CloverPayment;
use App\Models\UserApplication;
use App\Models\UserDeclaration;
use App\Models\UserAuthorzIationAgreement;

class checkStudentisEnrolled
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role_id == 3) {
            $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
            $user_application_exists = UserApplication::where('user_id', Auth::user()->id)->exists();
            $user_declaration_exists = UserDeclaration::where('user_id', Auth::user()->id)->exists();
            $user_payment_exists = CloverPayment::where('user_id', Auth::user()->id)->exists();
            $user_agreement_exists = UserAuthorzIationAgreement::where('user_id', Auth::user()->id)->exists();
            session()->put('user', Auth::user());
            session()->put('userSetting', UserSetting::where('user_id', Auth::user()->id)->first());

            if (!$user_setting_exists) {
                  Toastr::error('Please Complete your Registration before buying this Course / Program', 'Error');
                  return redirect()->to(route('register'));
              }

              if (!$user_declaration_exists) {
                  Toastr::error('Please Complete your Registration before buying this Course / Program', 'Error');
                  return redirect()->to(route('register.3'));
              }

            if(!$request->query('courseType')){
            // if(!$request->query('courseType') || $request->query('courseType')!=9){

              

            //   session()->put('payment_details', UserApplication::where('user_id', Auth::user()->id)->first());

              if (!$user_agreement_exists) {
                  Toastr::error('To buy this program / course, you need to get enrolled to school by filling up the Enrolement Forms', 'Error');
                  // Toastr::error('Please Complete Your Registration Process !', 'Error');
                  return redirect()->to(route('register.3'));
              }

              

              if (!$user_payment_exists) {
                  Toastr::error('Please Make Your Payment First !', 'Error');
                  return redirect()->to(route('register.pay'));
              }
            }
        }
        return $next($request);
    }
}
