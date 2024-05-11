@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Resgiter') }}
@endsection
@section('content')
    <style>
        input {
            background: transparent;
        }

        body {
            /* background-image: url('body-bg.jpg'); */
            height: 100vh;
        }

        .borderbottom {
            border-bottom: 1px solid black;
        }



        .text span {
            font-size: 16px;
            font-weight: bold;
        }

        input:focus-visible {
            outline: none !important;
        }

        .checkbox input {
            width: 40px;
            height: 40px;
        }

        .checkboxdata {
            width: 100%;
        }

        .checkboxdata input {
            width: 20%;
            float: left;
        }

        .checkboxdata h5 {
            width: 50%;
            float: left;

        }

        .page {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center
        }

        .borderbottom {
            border-bottom: 1px solid black;
        }


        .text span {
            font-size: 16px;
            font-weight: bold;
        }

        input:focus-visible {
            outline: none !important;


        }


        .checkbox input
        {
            width: 40px;
            height: 40px;
        }


        .nameda p {

            margin-top: 0;
            font-size: 16px;
            margin-bottom: 1rem;
            font-weight: bold;
            text-align: justify;
        }

        .borderbottom {
            border-bottom: 1px solid grey;
        }



        .text span {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        input:focus-visible {
            outline: none !important;


        }

        .checkbox-invalid input:before {
            font-family: "FontAwesome";
            content: "\f00c";
            font-size: 15px;
            color: transparent !important;
            background: transparent !important;
            display: block;
            width: 40px;
            height: 40px;
            border: 2px solid red;
            margin-right: 7px;
        }

        .checkbox input {
            width: 40px;
            height: 40px;
        }

        .checkboxdata {
            width: 100%;
        }

        .checkboxdata input {
            float: left;
        }

        .checkboxdata h5 {
            width: 50%;
            float: left;
            width: 50%;
            font-size: 12px;
            color: grey;
            float: left;

        }


        .nameda p {

            margin-top: 0;
            font-size: 16px;
            margin-bottom: 1rem;
            font-weight: bold;
            text-align: justify;
        }

        .nameda1 p {

            margin-top: 0;
            font-size: 17px;
            text-align: justify;
        }


        .row p {
            font-size: 16px;
            color: rgb(49, 48, 48);
            font-weight: bold;

        }

        .program h5 {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        .program p {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        .program {
            font-weight: bold;
            font-size: 18px;
            color: grey;
        }

        .logo img {
            width: 120px;
            height: 110px;
        }



        .thumb img {
            width: 90% !important;
        }



        .login_main_info h4 {
            font-size: 25px;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            padding: 12px 0px;
        }

        .shitch_text a {
            color: var(--system_primery_color);
        }

        .ff h4 {
            font-size: 31px;
            line-height: 30px;
            font-weight: bold;
        }

        .data h5 {
            text-align: center;
        }

        .is-invalid {
            border-bottom: 2px solid red !important;
        }

        .footer .row p {
            font-weight: normal !important;
        }

        .footerbox h4 {
            font-weight: 700;
            color: white;
            font-size: 35px;
        }


        .expore h4 {
            font-weight: 700;
            color: white !important;
            font-size: 24px;
        }

        .expore p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white !important;
            cursor: pointer !important;
            /* transition: 1s; */
        }

        .expore p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: #ff6700 !important;
            text-decoration: underline !important;
        }

        .footerbox1 h4 {
            font-weight: 700 !important;
            color: white !important;
            font-size: 24px !important;
        }

        .footerbox h5 {
            font-weight: 400;
        }

        .footerbox p {
            line-height: 30px !important;
            font-size: 16px !important;
            color: white;
            cursor: pointer !important;

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

        .icons i {
            font-size: 19px !important;
            /* padding: 11px !important; */
            cursor: pointer;
        }

        .icons i:hover {
            color: #ff6700 !important;

            font-size: 19px !important;
            /* padding: 11px !important; */
        }



        .thumb img {
            max-width: 634px;
            height: 57vh;
            object-fit: cover;
        }


        /* @media only screen and (max-width: 768px) {

                                                                                                                                                                                                                                                                                                                                                    } */
        @media (width < 1650px

        ) {

            .ff h4,
            .login_main_info h4 {
                font-size: 30px;
                font-weight: 900;
                color: var(--system_secendory_color);
                line-height: 50px;
            }

            span {
                font-size: 1rem !important;
                line-height: 25px !important;

            }

            h5,
            .program h5,
            .checkboxdata h5 {
                font-size: 15px
            }

            /* .login_main_info h4 {
                        font-size: 30px;
                        line-height: 31px;
                        font-weight: bold;
                        text-align: center;
                        padding: 12px 0px;
                    } */

        }

        @media (width >

        1650px

        ) {

            .login_main_info h4,
            .ff h4.app_admission {
                font-size: 40px !important;
                font-weight: 900;
                color: var(--system_secendory_color);
                line-height: 50px;
            }

            span {
                font-size: 1.4rem !important;
                line-height: 25px !important;

            }

            h5,
            .program h5,
            .checkboxdata h5 {
                font-size: 30px
            }

            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
                font-size: 23px;
            }

            /* .login_main_info h4 {
                    font-size: 30px;
                    line-height: 31px;
                    font-weight: bold;
                    text-align: center;
                    padding: 12px 0px;
                } */
            .theme_btn {
                font-size: 23px !important;
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

    <div class="container">
        {{-- <div class="logo mx-5 pt-5">
            <a href="{{ url('/') }}">
                <img style="width: 190px" src="{{ asset(Settings('logo')) }} " alt="">
            </a>
        </div> --}}

        <div class="login_wrapper_content">

            <form action="{{ route('register') }}" method="POST" id="regForm">
            @csrf
            <!-- widgetsform -->

                <input type="hidden" name="is_user_setting" value="1">
                <input type="hidden" name="id" value="{{ $user->id ?? '' }}">

                <div class="mainform row py-5">
                    <div class="col-lg-8 order-lg-0 reg1_custom_top_margin order-1">
                        <div class="ff">
                            <h4 class="app_admission text-center">Application for Admission</h4>
                            <div id="first" class="form mb-5">
                                @if (count($errors))
                                    {{-- @dd($errors) --}}
                                    <div
                                        class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        <strong>Required!</strong> Please Fill all Fields.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($errors->first('email') || $errors->first('password') || $errors->first('phone'))
                                    <div
                                        class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        <ul>
                                            @if ($errors->first('email'))
                                                <li>
                                                    {{ $errors->first('email') }}
                                                </li>
                                            @endif
                                            @if ($errors->first('phone'))
                                                <li>
                                                    {{ $errors->first('phone') }}
                                                </li>
                                            @endif
                                            @if ($errors->first('password'))
                                                <li>
                                                    {{ $errors->first('password') }}
                                                </li>
                                            @endif
                                        </ul>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif


                                <div class="col-md-12 program my-3">
                                    <h5 class="mt-5">$100 Fee Required</h5>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('f_name')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">

                                                    First Name: <input type="text" name="f_name" class="w-100 border-0"
                                                                       value="{{ (!empty($user) ? (isset(explode(' ', $user->name)[0]) ? explode(' ', $user->name)[0] : null) : null) ?? old('f_name') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('l_name')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">
                                                    Last Name:
                                                    <input type="text" name="l_name" class="w-100 border-0"
                                                           value="{{ (!empty($user) ? (isset(explode(' ', $user->name)[1]) ? explode(' ', $user->name)[1] : null) : null) ?? old('l_name') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('dob')) is-invalid @endif">
                                                <span class="d-flex">
                                                    DOB: <input id="dob" type="date" name="dob"
                                                                class="font-weight-normal w-100 border-0 h6 float-right mt-1"
                                                                value="{{ !empty($user) ? \Carbon\Carbon::parse($user->dob)->format('Y-m-d') : old('dob') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('SS')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    SS#: <input type="text" name="SS" class="w-100 border-0"
                                                                value="{{ $userSetting->SS ?? old('SS') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('city')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    City: <input type="text" name="city" class="w-100 border-0"
                                                                 value="{{ $userSetting->city ?? old('city') }}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('state')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    State: <input type="text" name="state" class="w-100 border-0"
                                                                  value="{{ $userSetting->state ?? old('state') }}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('zip')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    Zip: <input type="text" name="zip" class="w-100 border-0"
                                                                value="{{ $user->zip ?? old('zip') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('email')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    Email: <input type="text" name="email" class="w-100 border-0"
                                                                  value="{{ $user->email ?? old('email') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('phone')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">
                                                    Cell No: <input type="text" name="phone" class="w-100 border-0"
                                                                    style="border: none;"
                                                                    value="{{ $user->phone ?? old('phone') }}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('password')) is-invalid @endif my-2">
                                                <span class="d-flex">
                                                    Password: <input type="password" name="password"
                                                                     class="w-100 border-0"
                                                                     value="{{ old('password') }}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('password_confirmation')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">
                                                    Password Confirm: <input type="password"
                                                                             name="password_confirmation"
                                                                             class="w-100 border-0"
                                                                             style="
                                                border: none;"
                                                                             value="{{ old('password_confirmation') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('mailing_address')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">
                                                    Mailing address: <input type="text" name="mailing_address"
                                                                            class="w-100 border-0" style="border: none;"
                                                                            value="{{ $userSetting->mailing_address ?? old('mailing_address') }}">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 program">
                                            <h5 class="borderbotom">PROGRAM REVIEW: NCLEX REMEDIAL or RN COURSE
                                                REVIEW: </h5>
                                        </div>

                                        @php
                                            if(old('program_review') && !empty(old('program_review'))):
                                                $programReview = old('program_review');
                                            elseif(!empty($userSetting->program_review)):
                                                $programReview = json_decode($userSetting->program_review);
                                            else:
                                                $programReview = [];
                                            endif;
                                        @endphp
                                        <div class="col-md-12 mb-3">
                                            <div class="row m-0 mt-2">
                                                <div class="col-lg-3 col-sm-3 col-6 checkbox  @if ($errors->first('program_review')) checkbox-invalid @endif ">
                                                    <div class="checkboxdata mt-2">
                                                        <input type="checkbox"  name="program_review[]" class="increae"
                                                               value="Transition"
                                                            {{ in_array('Transition',array_values($programReview)) ? 'checked' : '' }}>

                                                        <h5 class="mt-md-0 mx-2 mt-3">
                                                            Transition
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-6 checkbox @if ($errors->first('program_review')) checkbox-invalid @endif">
                                                    <div class="checkboxdata mt-2">
                                                        <input type="checkbox"  name="program_review[]" class="increae"
                                                               value="Remedial"
                                                            {{ in_array('Remedial',array_values($programReview)) ? 'checked' : '' }}>

                                                        <h5 class="mt-md-0 mx-2 mt-3">
                                                            Remedial
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-6 checkbox @if ($errors->first('program_review')) checkbox-invalid @endif">
                                                    <div class="checkboxdata mt-2">
                                                        <input type="checkbox"  name="program_review[]" class="increae"
                                                               value="Review"
                                                            {{ in_array('Review',array_values($programReview))  ? 'checked' : '' }}>
                                                        <h5 class="mt-md-0 mx-2 mt-3">
                                                            Review
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-6 checkbox @if ($errors->first('program_review')) checkbox-invalid @endif">
                                                    <div class="checkboxdata mt-2">
                                                        <input type="checkbox"   name="program_review[]" class="increae"
                                                               value="CNA Prep"
                                                            {{ in_array('CNA Prep',array_values($programReview))  ? 'checked' : '' }}>

                                                        <h5 class="mt-md-0 mx-2 mt-3 nowrap">
                                                            CNA Prep
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('student_signature')) is-invalid @endif my-2">
                                                <span class="d-flex nowrap">
                                                    Student Signature: <input type="text" name="student_signature"
                                                                              class="w-100 border-0"
                                                                              style="border: none;"
                                                                              value="{{ $userSetting->student_signature ?? old('student_signature') }}">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text mb-3">
                                            <div
                                                class="box borderbottom @if ($errors->first('student_signature_date')) is-invalid @endif">
                                                <span class="d-flex">
                                                    Date: <input type="date" name="student_signature_date" id="student_signature_date"
                                                                 class="font-weight-normal w-100 border-0 h6  float-right mt-1"
                                                                 value="{{ $userSetting->student_signature_date ?? old('student_signature_date') }}">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-12 my-4">
                                    <div class="row">

                                    </div>
                                </div>

                                <div class="col-md-12 my-4">
                                    <div class="row">


                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <div class="row">

                                    </div>
                                </div>

                                <div class="col-md-12 my-4">
                                    <div class="row">


                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <div class="row">



                                    </div>
                                </div> --}}
                            {{--
                                <div class="row m-0">

                                </div> --}}

                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 text">
                                        <div
                                            class="box borderbottom @if ($errors->first('student_signature_date')) is-invalid @endif my-2">
                                            <span>
                                                <input type="date" name="student_signature_date" class="formbord"
                                                    value="{{ old('student_signature_date') }}">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text">
                                        <div class="box">
                                            <span>
                                                Date:
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="page">
                                <button type="submit" class="theme_btn small_btn2"> Next
                                    Page
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 responsive-order mb-3">
                        <div classs="data py-5" style="background: #fbfff2;">

                            @include(theme('auth.login_wrapper_right'))
                        </div>
                        <h5 class="shitch_text mt-3 text-center">
                            {{ __('common.You have already an account?') }} <a href="{{ route('login') }}">
                                {{ __('common.Login') }}</a>

                        </h5>
                        <hr class="d-lg-none">
                    </div>
                </div>


                <div class="row">
                    @if ($custom_field->show_job_title)
                        <div class="col-12 mt_20">
                            <div class="input-group custom_group_field">
                                <input type="text" class="form-control pl-0"
                                       placeholder="{{ __('common.Enter Job Title') }} {{ $custom_field->required_job_title ? '*' : '' }}"
                                       {{ $custom_field->required_job_title ? 'required' : '' }} aria-label="email"
                                       name="job_title" value="{{ old('job_title') }}">
                            </div>
                            <span class="text-danger" role="alert">{{ $errors->first('job_title') }}</span>
                        </div>
                    @endif

                    @if ($custom_field->show_gender)
                        <div class="col-xl-12">
                            <div class="short_select mt-3">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <h5 class="mr_10 font_16 f_w_500 mb-0">{{ __('common.choose_gender') }}
                                            {{ $custom_field->required_gender ? '*' : '' }}</h5>
                                    </div>
                                    <div class="col-xl-7">
                                        <select class="small_select w-100" name="gender"
                                            {{ $custom_field->required_gender ? 'selected' : '' }}>
                                            <option value="" data-display="Choose">{{ __('common.Choose') }}
                                            </option>
                                            <option value="male">{{ __('common.Male') }}</option>
                                            <option value="female">{{ __('common.Female') }}</option>
                                            <option value="other">{{ __('common.Other') }}</option>
                                        </select>

                                    </div>
                                </div>
                                <span class="text-danger" role="alert">{{ $errors->first('gender') }}</span>

                            </div>
                        </div>
                    @endif

                    @if ($custom_field->show_student_type)
                        <div class="col-xl-12">
                            <div class="short_select mt-3">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <h5 class="mr_10 font_16 f_w_500 mb-0">{{ __('common.choose_student_type') }}
                                            {{ $custom_field->required_student_type ? '*' : '' }}</h5>
                                    </div>
                                    <div class="col-xl-7">
                                        <select class="small_select w-100" name="student_type"
                                            {{ $custom_field->required_student_type ? 'selected' : '' }}>
                                            <option value="personal">{{ __('common.Personal') }}</option>
                                            <option value="corporate">{{ __('common.Corporate') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="text-danger" role="alert">{{ $errors->first('student_type') }}</span>

                            </div>
                        </div>
                    @endif


                    <div class="col-12 mt_20">
                        @if (saasEnv('NOCAPTCHA_FOR_REG') == 'true')
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
                        @if (saasEnv('NOCAPTCHA_FOR_REG') == 'true' && saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
                            <button type="button" class="g-recaptcha theme_btn w-100 text-center"
                                    data-sitekey="{{ saasEnv('NOCAPTCHA_SITEKEY') }}" data-size="invisible"
                                    data-callback="onSubmit" class="theme_btn w-100 text-center">
                                {{ __('common.Register') }}</button>
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <script>
                                function onSubmit(token) {
                                    document.getElementById("regForm").submit();
                                }
                            </script>
                        @endif

                    </div>
                </div>
            </form>
        </div>
    </div>
    @include(theme('partials._custom_footer'))

    {{-- <div class="login_wrapper"> --}}
    {{-- <div class="login_wrapper_left"> --}}



    {{-- </div> --}}



    {{-- </div> --}}
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <script>
        $(function () {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("dob").setAttribute('max', today);
            document.getElementById("student_signature_date").setAttribute('min', today);

            $('#checkbox').click(function () {

                if ($(this).is(':checked')) {
                    $('#submitBtn').removeClass('disable_btn');
                    $('#submitBtn').removeAttr('disabled');

                } else {
                    $('#submitBtn').addClass('disable_btn');
                    $('#submitBtn').attr('disabled', 'disabled');

                }
            });
        });
    </script>


@endsection
