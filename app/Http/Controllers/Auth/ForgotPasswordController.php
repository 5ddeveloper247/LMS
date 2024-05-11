<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\FrontendManage\Entities\LoginPage;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function showLinkRequestForm()
    {
        $page = LoginPage::getData();
        return view(theme('auth.passwords.email'), compact('page'));
    }

    public function SendPasswordResetLink()
    {
        $page = LoginPage::getData();
        return view(theme('auth.passwords.email'), compact('page'));
    }

    public function ResetPassword()
    {
        $page = LoginPage::getData();
        return view(theme('auth.passwords.reset'), compact('page'));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        Toastr::error('User Not Existed, Please Register First !', 'Error');
        return redirect()->to(route('register'));

//        return back()
//            ->withInput($request->only('email'))
//            ->withErrors(['email' => trans($response)]);
    }
}
