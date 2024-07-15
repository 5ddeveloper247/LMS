@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Pre Register') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>

@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");


        .reg_img {
            width: 100%;
            height: 450px;
        }

        .reg_img img {
            height: 100%;
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
            background: linear-gradient(0deg, var(--system_primery_color) 0%, var(--footer_background_color) 75%);
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
            background: #1877F2;
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
            background: #EA4335;
            border-radius: 0;
            color: #fff !important;
            white-space: nowrap;
            font-size: 12.5px;
            font-weight: 700;
            padding: 0.5rem 1.5rem;
        }

        .socail_links {
            display: flex;
        }

        @media only screen and (max-width: 768px) {

            .btn_login,
            .btn_forget {
                width: 92px;
                height: 38px;
                font-size: 12px;
                text-align: center;
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

        @media only screen and (min-width: 1350px) {
            .reg_img {
                height: 550px !important;
            }
           
        }

        @media only screen and (min-width: 1800px) {
            .reg_img {
                height: 640px !important;
            }

            .btn_login {
                border-radius: 20px !important;
            }

            .googleLoginBtn,
            .facebookLoginBtn {
                font-size: 18px !important;

            }

        }
    </style>
    @php
        session()->forget('user');
        session()->forget('userSetting');
        session()->forget('payment_details');
    @endphp

    <div class="container custom-bg px-xl-5 my-md-5 my-3">
        <div class="row px-xl-5 px-md-2">
            <div class="col-md-7 mb-2 mb-md-0">
                <div class="collapse show" id="optionsCollapse">
                    <div class=" text-center">
                        <h3 class="text-uppercase text_login">We are Merkaii Xcellence </h3>
                        <h6 class="heading-login text-capitalize"> choose account type</h6>
                    </div>
                    <div class="text-center mt-mb-5 mt-4 mb-3">
                        <div class="row ">

                            <div class="col-md-4 mb-2 px-sm-1 px-md-2 d-flex justify-content-center align-items-center">
                                <a href="javascript:void(0)" class="btn content_btn" id="showMainContent"
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
                </div>
                <div class="collapse" id="mainContentCollapse">

                    <h6 class="text-center mb-4 text-capitalize heading-login">hello, welcome to Merkaii Xcellence </h6>
                    @if (saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true' || saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
                        <div class="socail_links">
                            @if (saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true')
                                <a href="{{ route('facebookredirect') }}" class="facebookLoginBtn text-center p-2">
                                    <i class="fab fa-facebook-f"></i>
                                    Register with Facebook</a>
                            @endif
                            @if (saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
                                <a href="{{ route('googleredirect') }}" class="googleLoginBtn text-center p-2 w-100">
                                    <i class="fab fa-google"></i>
                                    Register with Google</a>
                            @endif
                        </div>
                        <h6 class="text-center mt-4 mb-2 text-capitalize heading-login"> OR</h6>
                    @endif

                    <h6 class="text-center mb-4 text-capitalize heading-login"> please fill the form
                        below to get started</h6>
                    <form action="{{ route('preRegister') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="position-relative mt-4">
                                    <input type="text" value="{{ old('name') }}"
                                        class="outside {{ $errors->has('name') ? ' border-danger' : '' }}" name="name"
                                        required />
                                    <span class="floating-label-outside">Name</span>
                                    <i class="fa fa-id-card-o input-icon-outside"></i>
                                </div>
                                @if ($errors->first('name'))
                                    <span class="text-danger" role="alert">Name is required</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <div class="position-relative mt-4 d-flex">
                                    <input type="email" name="email" class="outside" required
                                        value="{{ $contactLogin ? $contactLogin['email'] : old('email') }}" />
                                    <br>
                                    <span class="floating-label-outside">Email</span>
                                    <i class="fa fa-envelope input-icon-outside"></i>


                                </div>
                                <div class="input-group-append">

                                    @if ($errors->first('email'))
                                        <span class="text-danger" role="alert">Email must be unique</span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <div class="position-relative mt-4 d-flex">
                                    <input type="password" name="password" class="outside" required minlength="8"
                                        value="{{ $contactLogin ? $contactLogin['password'] : old('password') }}" />
                                    <br>
                                    <span class="floating-label-outside">Password</span>
                                    <i id="icon1" class="bi bi-unlock input-icon-outside"></i>


                                </div>
                                <div class="input-group-append">

                                    @if ($errors->first('password'))
                                        <span class="text-danger" role="alert">Password and confirm password donot
                                            match</span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <div class="position-relative mt-4 d-flex">
                                    <input type="password" name="password_confirmation" class="outside" required
                                        minlength="8" />
                                    <br>
                                    <span class="floating-label-outside">Confirm Password</span>
                                    <i id="icon2" class="bi bi-unlock input-icon-outside"></i>


                                </div>
                                <div class="input-group-append">

                                    @if ($errors->first('password'))
                                        <span class="text-danger" role="alert">Password and confirm password donot
                                            match</span>
                                    @endif

                                </div>

                            </div>

                        </div>

                        <div class="text-center mt-4 mb-4 mb-md-0">

                            <button type="submit" class="btn btn_login">Register</button>
                        </div>

                    </form>
                    <div class="col-md-12 px-0 mb-md-0">

                        <label class="">Already have an Account? <a href="{{ route('login') }}"
                                class="text-capitalize" id="myButton"
                                style="color: var(--system_primery_color);">Login</a></label>

                    </div>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-block pr-0">
                <div class="img-fluid reg_img mb-4">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class=" w-100" alt="Placeholder Image">

                    <!-- <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg" class="reg_img" alt="placeholder Image"> -->
                 
                </div>
                <h6 class="text-capitalize mb-0">student centered expert instructors learn anywhere community</h6>
            </div>
        </div>
    </div>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#showMainContent').on('click', function() {
            $('#optionsCollapse').collapse('hide');
            $('#mainContentCollapse').collapse('show');
        });
    </script>

    @include(theme('partials._custom_footer'))

    {!! Toastr::message() !!}
@endsection
