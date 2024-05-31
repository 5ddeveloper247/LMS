@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Login') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>

@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        .reg_img {
            /* min-height: 83vh; */
            max-width: 100%;
            width: 100%;
            height: 100%;
            /* max-height: 83vh; */
        }

        .reg_img img {
            height: 90%;
        }

        .larger-checkbox .form-check-input {
            width: 25px;
            height: 25px;
        }

        .larger-checkbox .form-check-label {
            margin-top: 0;
            font-size: 12px;
            text-align: justify;
        }

        .heading-reg {
            line-height: 30px;
        }

        .label-reg {
            font-size: 14px;
            font-weight: bold;
        }

        .login-span {
            cursor: pointer;
        }

        input.outside,
        input[class=outside],
        [type=password].outside {
            color: #555;
            width: 100%;
            font-size: 1rem;
            line-height: normal;
            border: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            margin-bottom: -1px;
            padding: .375rem 45px;
            -webkit-appearance: none;
            -moz-appearance: none;
            position: relative;
            z-index: 1;
            height: calc(1.5em + .75rem + 2px);
        }

        input:focus,
        select:focus {
            outline: 0 !important;
            color: #555 !important;
            border-color: #9e9e9e;
            z-index: 2
        }

        input:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside {
            top: 15px;
            left: 40px;
            font-size: 15px;
            opacity: 1;
            font-weight: 400
        }

        input:focus~.floating-label-outside,
        input:valid~.floating-label-outside {
            top: -10px;
            opacity: 1;
            font-size: 15px;
            color: #727272;
            background: #fff;
            padding: 0px 5px;
        }

        input:focus~.floating-label-outside,
        input:not(:focus):valid~.floating-label-outside {
            left: 40px
        }

        .form-control:focus {
            box-shadow: none !important;
            border-color: #ced4da;
        }

        .floating-label-outside {
            position: absolute;
            pointer-events: none;
            left: 60px;
            top: 12px;
            transition: .2s ease all;
            color: #777;
            font-weight: 500;
            font-size: 10px;
            letter-spacing: .5px;
            z-index: 3;
            text-transform: uppercase
        }

        .custom-height {
            height: auto;
        }

        .content_btn {
            width: 100%;
            padding: 10px;
            height: 100px;
            background: #395799;
            color: #fff;
        }

        .content_btn:hover {
            background: var(--system_primery_color);
            color: #fff;
        }

        .heading-login {
            line-height: 30px;
            color: var(--system_secendory_color);
        }

        .hidden {
            display: none;
        }

        .form-control:focus {
            box-shadow: none !important;
            border-color: #ced4da;
        }

        .input-icon-outside {
            position: absolute;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            height: 100%;
            top: 0.5px;
            left: 0.5px;
            z-index: 3;
            color: #fff;
            background: linear-gradient(0deg, rgb(255, 118, 25) 0%,rgb(153, 102, 153) 75%);
            padding: .4rem .75rem;
            display: flex;
            align-items: center;
            border-right: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        .text_login {
            font-size: 30px !important;
            font-weight: 900;
            color: var(--system_secendory_color);
            line-height: 50px;
        }

        .btn_login {
            /* width: 135px;
        height: 38px; */
            font-size: 16px;
            background: var(--system_primery_color);
            border-radius: 16px;
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 700;
            border: 2px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            /* line-height: 1; */
            padding: 0.5rem 1.5rem;
        }

        .btn_login:hover,
        .btn_forget:hover {
            color: var(--system_primery_color);
            background: transparent;
            border-color: var(--system_primery_color);
        }

        .btn_forget {
            width: 135px;
            height: 38px;
            font-size: 16px;
            background: var(--system_primery_color);
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 600;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            line-height: 1;
        }

        .facebookLoginBtn {
            background: var(--system_secendory_color);
            border-radius: 0;
            color: #fff !important;
            white-space: nowrap;
            font-size: 12.5px;
            font-weight: 700;
            padding: 0.5rem 1.5rem;
        }

        .facebookLoginBtn:hover,
        .googleLoginBtn:hover {
            background: var(--system_primery_color) !important;
        }

        .googleLoginBtn {
            background: rgb(227, 65, 51);
            border-radius: 0;
            color: #fff !important;
            white-space: nowrap;
            font-size: 12.5px;
            font-weight: 700;
            padding: 0.5rem 1.5rem;
        }

        .socail_links {
            display: flex;
            /* display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px; */
        }

        @media only screen and (max-width: 768px) {

            .btn_login,
            .btn_forget {
                width: 92px;
                height: 38px;
                font-size: 12px;
                text-align: center;
            }

            .reg_img {
                max-height: 334px;
            }

            h6,
            span,
            .form-group {
                font-size: 13px;
            }
        }

        @media only screen and (min-width: 769px) and (max-width: 1024px) {

            h6,
            span,
            .form-group,
            .btn_forget,
            .btn_login {
                font-size: 14px;
            }

            .content_btn {
                font-size: 15px;
            }
        }

        @media only screen and (min-width: 1800px) {
            .btn_login {
                border-radius: 20px !important;
            }

            .googleLoginBtn, .facebookLoginBtn {
                font-size: 18px !important;

            }
        }

        .btn_back {
            display: inline-block;
            text-align: center;
            line-height: 100%;
            /* Ensures text is centered vertically */
            /* padding: 10px 20px; */
            background-color: rgb(253, 126, 20);
            color: white;
            border: 1px solid #ccc;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
            /* height: 100px;
        width: 217px; */
        }
    </style>
    @php
        session()->forget('user');
        session()->forget('userSetting');
        session()->forget('payment_details');
    @endphp

    <div class="container custom-bg px-lg-5 my-5">
        <div class="row pt-2 px-lg-5">
            <div class="col-md-7 ">
                <div id="accountType">
                    <div class=" text-center">
                        <h3 class="text-uppercase text_login">We are merakii </h3>
                        <h6 class="heading-login text-capitalize"> choose account type</h6>
                    </div>
                    <div class="text-center mt-5 mb-3">
                        <div class="row ">

                            <div class="col-md-4 mb-2 px-sm-1 px-md-2 d-flex justify-content-center align-items-center">
                                <a href="{{ url('pre-registration') }}" class="btn content_btn"
                                    style="    display: flex;
              justify-content: center;
              align-items: center;">MC
                                    Students</a>
                            </div>

                            <div class="col-md-4 mb-2 px-sm-1 px-md-2 d-flex justify-content-center align-items-center">
                                <a href="{{ url('instructors#becomeAnInstructor') }}" class="btn content_btn"
                                    style="    display: flex;
              justify-content: center;
              align-items: center;">MC
                                    Instructor & <br> Tutors</a>
                            </div>

                            <div class="col-md-4 mb-2 px-sm-1 px-md-2 d-flex justify-content-center align-items-center">
                                <a href="{{ url('teach-with-us#sellWithUs') }}" class="btn content_btn"style="    display: flex;
                  justify-content: center;
                  align-items: center;">Sell with <br>Us Instructors</a>
                            </div>

                        </div>
                    </div>

                    <a href="#" class="btn btn-sm btn_back" id="showAllPage">Go back</a>

                </div>



                <h6 class="text-center mb-4 text-capitalize heading-login hidemainContent">hello, welcome to merakii </h6>
                @if(saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true' || saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
                <div class="socail_links hidemainContent">
                    @if(saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true')
                    <a href="{{ route('social.oauth', 'facebook') }}" class="facebookLoginBtn text-center p-2">
                        <i class="fab fa-facebook-f"></i>
                        {{ __('frontend.Login with Facebook') }}</a>
                    @endif
                    @if(saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
                    <a href="{{ route('googleredirect') }}" class="googleLoginBtn text-center p-2 w-100">
                        <i class="fab fa-google"></i>
                        {{ __('frontend.Login with Google') }}</a>
                    @endif
                </div>
                <h6 class="hidemainContent text-center mt-4 mb-2 text-capitalize heading-login"> OR</h6>
                @endif
                <h6 class="hidemainContent text-center mb-4 text-capitalize heading-login"> please fill the form
                    below to get started</h6>
                <form action="{{ route('login') }}" method="POST" id="loginForm" class="hidemainContent">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4">
                                <input type="email" value="{{ old('email') }}"
                                    class="outside {{ $errors->has('email') ? ' border-danger' : '' }}" name="email"
                                    required />
                                <span class="floating-label-outside">Email</span>
                                <i class="fa fa-envelope-o input-icon-outside"></i>
                            </div>
                            @if ($errors->first('email'))
                                <span class="text-danger" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4 d-flex">
                                <input type="password" name="password" class="outside" required />
                                <span class="floating-label-outside">Password</span>
                                <i class="bi bi-unlock input-icon-outside"></i>

                                <div class="input-group-append">
                                    <a id="forgetPasswordBtn" href="{{ route('SendPasswordResetLink') }}"
                                        class=" btn_forget d-flex justify-content-center align-items-center">Forgot
                                        Password?</a>
                                    @if ($errors->first('password'))
                                        <span class="text-danger" role="alert">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                            </div>

                        </div>
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

                    <div class="form-group form-check my-2">

                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="1"
                            class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>

                        <a href="{{ url('contact') }}" class="float-right text-dark">Need Help?</a>


                    </div>
                    <span class="hidemainContent text-capitalize text-justify mt-3 ">By signing in you agree to merakii <a
                            href="{{ route('customer-help') }}" style="color: var(--system_primery_color);">college terms & conditions |
                            privacy policy</a></span>
                    {{-- @if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true' && saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
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
      @else --}}
                    {{-- <button type="submit" class="theme_btn w-100 text-center"> --}}
                    {{-- {{ __('common.Login') }}</button>
      @endif --}}

                    <div class="text-center my-4">

                        <button type="submit" class="btn btn_login">Login</button>
                    </div>

                </form>
                @if (Settings('student_reg') == 1 && saasPlanCheck('student') == false)
                    <div class="col-md-12 px-0 hidemainContent mb-5 mb-md-0">

                        <label class="">Don't have an Account Yet ? <a href="#" class="text-capitalize"
                                id="myButton" style="color: var(--system_primery_color);">Create an
                                account</a></label>

                    </div>
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
            <div class="hidemainContent col-md-5 d-none d-md-block pr-0">
                <div class="img-fluid reg_img mb-4">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class=" w-100" alt="Placeholder Image">

                    <!-- <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg" class="reg_img" alt="placeholder Image"> -->
                    <h6 class="hidemainContent text-capitalize my-md-3">student centered expert instructors learn anywhere
                        community</h6>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.getElementById("myButton").onclick = function(e) {
            e.preventDefault();
            $('#accountType').show();
            $('.hidemainContent').hide();

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        };
    </script>

    <script>
        $('#accountType').hide();

        $('#showAllPage').click(function() {
            $('#accountType').hide();
            $('.hidemainContent').show();
        });
    </script>

    @include(theme('partials._custom_footer'))

    {!! Toastr::message() !!}

@endsection
