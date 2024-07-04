<?php

namespace App\Http\Middleware;

use App\Events\LastActivityEvent;
use App\Models\UserAuthorzIationAgreement;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserSetting;
use App\Models\UserDeclaration;

class StudentMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role_id == 3) {

            if(!session()->has('impersonated')){
                $user = UserAuthorzIationAgreement::where('user_id', $request->user()->id)->first();
                if(!empty($user)) {
                    if ($user->user_agreement_form == null || $user->status == null) {
                        Toastr::error('Please Upload Your Agreement Form', 'Error');
                    }

                    if ($user->status == 2) {
                        Toastr::error('Your Form was Not Correct, Please Upload Correct Form Again', 'Error');
                    }
                }
                if (
                    !$request->user() ||
                    ($request->user() instanceof MustVerifyEmail &&
                        !$request->user()->hasVerifiedEmail())
                ) {
                    return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::route('verification.notice');
                }
            }
            $user_setting_exists = UserSetting::where('user_id', Auth::user()->id)->exists();
            $user_agreement_exists = UserDeclaration::where('user_id', Auth::user()->id)->exists();

            if (!$user_setting_exists) {
                  Toastr::error('Please complete your Registration', 'Error');
                  return redirect()->to(route('register'));
              }

            if (!$user_agreement_exists) {
                  Toastr::error('Please complete your Registration !', 'Error');
                  return redirect()->to(route('register.declaration'));
              }
            return $next($request);
        } elseif (Auth::check() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)) {

            if (Auth::user()->role_id == 1) {
                return $next($request);
            } else {
                return redirect()->to(route('dashboard'));
            }
        } else {
            return redirect()->to('/login');
        }
    }
}
