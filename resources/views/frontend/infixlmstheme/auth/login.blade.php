@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Login') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
@section('content')
    <style>
        .footer .row p {
            font-weight: normal !important;
        }

        .footer .row p {
            font-weight: normal !important;
        }

        .footerbox1 h4 {
            font-weight: 700;
            color: white;
            font-size: 24px;
        }

        .footerbox h5 {
            font-weight: 400;
        }

        .footerbox p {
            line-height: 30px !important;
            font-size: 16px !important;
            color: white;
            cursor: pointer !important;
            font-weight: normal !important;
        }

        .footerbox p:hover {
            line-height: 30px !important;
            font-size: 16px !important;
            color: rgb(248, 0, 0);
        }

        .footerbox1 p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white !important;
            cursor: pointer;
            /* transition: 1s; */
        }

        .footerbox1 p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: #ff6700 !important;
            text-decoration: underline !important;
        }

        .footercolor {
            background: #252525;
        }

        .footerbox h4 {
            font-weight: 700;
            color: white;
            font-size: 35px;
        }

        .footerbox {
            padding: 25px;
            margin-left: 0%;
        }

        .expore h4 {
            font-weight: 700;
            color: white;
            font-size: 24px;
        }

        .expore p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white;
            cursor: pointer !important;
            /* transition: 1s; */
            font-weight: normal !important;
        }

        .expore p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: #ff6700 !important;
            text-decoration: underline !important;
        }

        .icons i {
            font-size: 22px !important;
            /* padding: 11px !important; */
            cursor: pointer;
        }

        .icons i:hover {
            color: #ff6700 !important;

            font-size: 22px !important;
            /* padding: 11px !important; */
        }

        .container-sub {
            max-width: 1140px;

            margin-right: auto;
            margin-left: auto;
            position: relative;
        }

        .background-overlay {
            background-image: url('public/frontend/infixlmstheme/img/images/newsletter_bg.png');
            background-position: center center;
            background-size: cover;
            transition: background .3s, border-radius .3s, opacity .3s;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
        }

        .login_wrapper .login_wrapper_left {
            padding: 20px 56px 53px 0px;
        }

        .login_wrapper .login_wrapper_right .thumb img {
            max-width: 634px;
            height: 57vh;
            object-fit: cover;
        }

        .login_wrapper {
            align-items: baseline;
        }


        .login_wrapper .login_wrapper_left .login_wrapper_content h4 {
            font-size: 30px;
            font-weight: 900;
            line-height: 50px;
            margin-bottom: 25px;
        }

        .login_wrapper .login_wrapper_right h4 {
            font-size: 30px !important;
            font-weight: 900;
            color: var(--system_secendory_color);
            line-height: 50px;
        }

        .mt-custom {
            margin-top: 5rem;
        }


        @media (width > 1650px) {
            .login_wrapper .login_wrapper_right h4 {
                font-size: 40px !important;
                font-weight: 900;
                color: var(--system_secendory_color);
                line-height: 50px;
            }

            .login_wrapper .login_wrapper_left .login_wrapper_content h4 {
                font-size: 40px !important;
                font-weight: 900;
                line-height: 50px;
                margin-bottom: 25px;
            }

            .mt-custom {
                margin-top: 8rem;
            }

            h4 {
                font-size: 42px !important;
                line-height: 25px;
            }

            span {
                font-size: 1.4rem !important;
                line-height: 25px !important;

            }

            .login_wrapper {
                display: grid;
                grid-template-columns: 904px auto;
                justify-content: center;
            }

            .login_wrapper .login_wrapper_left .shitch_text,
            .login_wrapper .login_wrapper_left .login_wrapper_content .remember_forgot_pass .forgot_pass {
                font-size: 22px;
                font-weight: 500;
                color: #373737;
                text-align: center;
            }

            .custom_group_field input {
                border: 0;
                font-size: 30px;
                font-weight: 500;
                font-family: Jost, sans-serif;
                box-shadow: none !important;
                padding-bottom: 19px;
                padding-left: 10px;
            }

            input,
            input::placeholder {
                font: 1.25rem/3 sans-serif;
            }

            .expore p {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .expore p:hover {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .footerbox1 p {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .footerbox1 p:hover {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .fs-responsive {
                font-size: 22px !important;
                line-height: 38px !important;
            }

            .icons i {
                font-size: 25px !important;
            }

            .icons i:hover {
                font-size: 25px !important;
            }

            .expore h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }

            .footerbox1 h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }
        }
    </style>
    @php
        session()->forget('user');
        session()->forget('userSetting');
        session()->forget('payment_details');
    @endphp
    <div class="container">
        <div class="login_wrapper">
            <div class="login_wrapper_left">
                <div class="login_wrapper_content">
                    <h4 class="text-center">Welcome back!<br /> Please Login
                        To Your Account</h4>
                    <div class="socail_links">

                            <a href="{{ route('social.oauth', 'facebook') }}"
                                class="theme_btn small_btn2 facebookLoginBtn text-center">
                                <i class="fab fa-facebook-f"></i>
                                {{ __('frontend.Login with Facebook') }}</a>


                            <a href="{{ route('social.oauth', 'google') }}"
                                class="theme_btn small_btn2 googleLoginBtn text-center">
                                <i class="fab fa-google"></i>
                                {{ __('frontend.Login with Google') }}</a>

                    </div>

                        <p class="login_text">{{ __('frontend.Or') }} {{ __('frontend.login with Email Address') }}</p>

                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="row mt-custom">
                            <div class="col-12">
                                <div class="input-group custom_group_field">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">
                                            <!-- svg -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.328" height="10.662"
                                                viewBox="0 0 13.328 10.662">
                                                <path id="Path_44" data-name="Path 44"
                                                    d="M13.995,4H3.333A1.331,1.331,0,0,0,2.007,5.333l-.007,8a1.337,1.337,0,0,0,1.333,1.333H13.995a1.337,1.337,0,0,0,1.333-1.333v-8A1.337,1.337,0,0,0,13.995,4Zm0,9.329H3.333V6.666L8.664,10l5.331-3.332ZM8.664,8.665,3.333,5.333H13.995Z"
                                                    transform="translate(-2 -4)" fill="#687083" />
                                            </svg>
                                            <!-- svg -->
                                        </span>
                                    </div>
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('common.Enter Email') }}" name="email" aria-label="Username"
                                        aria-describedby="basic-addon3">
                                </div>
                                @if ($errors->first('email'))
                                    <span class="text-danger" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="col-12 mt_20">
                                <div class="input-group custom_group_field">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">
                                            <!-- svg -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.697" height="14.039"
                                                viewBox="0 0 10.697 14.039">
                                                <path id="Path_46" data-name="Path 46"
                                                    d="M9.348,11.7A1.337,1.337,0,1,0,8.011,10.36,1.341,1.341,0,0,0,9.348,11.7ZM13.36,5.68h-.669V4.343a3.343,3.343,0,0,0-6.685,0h1.27a2.072,2.072,0,0,1,4.145,0V5.68H5.337A1.341,1.341,0,0,0,4,7.017V13.7a1.341,1.341,0,0,0,1.337,1.337H13.36A1.341,1.341,0,0,0,14.7,13.7V7.017A1.341,1.341,0,0,0,13.36,5.68Zm0,8.022H5.337V7.017H13.36Z"
                                                    transform="translate(-4 -1)" fill="#687083" />
                                            </svg>
                                            <!-- svg -->
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="{{ __('common.Enter Password') }}" aria-label="password"
                                        aria-describedby="basic-addon4">
                                </div>
                                @if ($errors->first('password'))
                                    <span class="text-danger" role="alert">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="col-12 mt_20">
                                @if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true')
                                    @if (saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
                                        {!! NoCaptcha::display(['data-size' => 'invisible']) !!}
                                    @else
                                        {!! NoCaptcha::display() !!}
                                    @endif

                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger"
                                            role="alert">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                @endif
                            </div>
                            <div class="col-12 mt_20">
                                <div class="remember_forgot_pass d-flex justify-content-between">
                                    <label class="primary_checkbox d-flex">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                            value="1">
                                        <span class="checkmark mr_15"></span>
                                        <span class="label_name">{{ __('common.Remember Me') }}</span>
                                    </label>
                                    <a href="{{ route('SendPasswordResetLink') }}"
                                        class="forgot_pass">{{ __('common.Forgot Password ?') }}</a>
                                </div>
                            </div>
                            <div class="col-12">

                                @if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true' && saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
                                    <button type="button" class="g-recaptcha theme_btn w-100 text-center"
                                        data-sitekey="{{ saasEnv('NOCAPTCHA_SITEKEY') }}" data-size="invisible"
                                        data-callback="onSubmit" class="theme_btn w-100 text-center">
                                        {{ __('common.Login') }}</button>
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    <script>
                                        function onSubmit(token) {
                                            document.getElementById("loginForm").submit();
                                        }
                                    </script>
                                @else
                                    <button type="submit" class="theme_btn w-100 text-center">
                                        {{ __('common.Login') }}</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                @if (Settings('student_reg') == 1 && saasPlanCheck('student') == false)
                    <h5 class="shitch_text">{{ __('frontend.Don’t have an account') }}? <a href="{{ route('register') }}">
                            {{ __('common.Register') }}
                        </a></h5>
                @endif
                @if (appMode())
                    <div class="row mt-4">
                        <div class="col-md-4 mb_10">
                            <a class="theme_btn small_btn2 w-100 text-center"
                                href="{{ route('auto.login', 'admin') }}">Admin</a>
                        </div>
                        <div class="col-md-4 mb_10">
                            <a class="theme_btn small_btn2 w-100 text-center"
                                href="{{ route('auto.login', 'teacher') }}">Instructor</a>
                        </div>
                        <div class="col-md-4 mb_10">
                            <a class="theme_btn small_btn2 w-100 text-center"
                                href="{{ route('auto.login', 'student') }}">Student</a>

                        </div>
                    </div>
                @endif
            </div>
            @include('frontend.infixlmstheme.auth.login_wrapper_right')
        </div>
    </div>

    @include(theme('partials._custom_footer'))

    {!! Toastr::message() !!}

@endsection
