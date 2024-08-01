<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Modules\FrontendManage\Entities\LoginPage;
use App\Jobs\SendGeneralEmail;
use Carbon\Carbon;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm($token = null)
    {
        $page = LoginPage::getData();
        return view(theme('auth.passwords.reset'),compact('page'))->with('token', $token,);
    }

    public function reset(Request $request){
        $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
                SendGeneralEmail::dispatch($user, 'PASS_UPDATE', [
                'time' => Carbon::now()->format('d-M-Y, g:i A')
            ]);
            }
        );
        if($status === Password::PASSWORD_RESET){
           Toastr::success("Password Reset Successful. Please login to you account with new Password.", 'Success');
           return redirect()->route('login');
        }else{
            Toastr::error($status, 'Error');
            return redirect()->back();
        }
    }
}
