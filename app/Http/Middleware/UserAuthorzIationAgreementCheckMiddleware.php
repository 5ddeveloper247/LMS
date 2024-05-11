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

class UserAuthorzIationAgreementCheckMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role_id == 3) {

            if(!session()->has('impersonated')){
                $user = UserAuthorzIationAgreement::where('user_id', $request->user()->id)->first();

                if(!empty($user)){
                    if ($user->user_agreement_form == null || $user->status == null) {
                        Toastr::error('Please Upload Your Agreement Form', 'Error');
                        return redirect()->to(route('myProfile'));
                    }
                }
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
