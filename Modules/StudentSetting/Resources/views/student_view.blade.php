@extends('backend.master')
@push('styles')
    <style>
        input {
            background: transparent;
        }

        .borderbottom {
            border-bottom: 1px solid black;
        }

        .formbord {
            border: none;
            /*width: 70%;*/
        }

        .formbord:focus {
            border: none;
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

        .bordertop {
            border-top: 1px solid black;
        }

        .page {
            width: 200px;
            height: 30px;
            float: right;

        }

        .borderbottom {
            border-bottom: 1px solid black;
        }

        .formbord {
            border: none;
            width: 70%;
        }

        .formbord:focus {
            border: none;
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

        .bordertop {
            border-top: 1px solid black;
        }

        .page {
            width: 200px;
            height: 30px;
            float: right;

        }

        .nameformbord {
            border: none;
            width: 100%;
        }

        .nameformbord:focus {
            border: none;
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

        .formbord {
            border: none;
            width: 70%;
        }

        .formbord:focus {
            border: none;
        }

        .text span {
            font-weight: bold;
            font-size: 12px;
            color: grey;
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
            width: 50%;
            font-size: 12px;
            color: grey;
            float: left;

        }

        .bordertop {
            border-top: 1px solid grey;
            border-top: 1px solid rgb(22, 68, 100);
        }

        .page {
            width: 200px;
            height: 30px;
            float: right;

        }

        .nameformbord {
            border: none;
            width: 100%;
        }

        .nameformbord:focus {
            border: none;
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

        .containerer {
            width: 100%;
            /* margin:auto; */
        }

        .mdka {
            width: 0%;
            height: 100%;
            float: left;
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

        .other_links {
            text-align: center;
            padding: 12px 0px;
        }

        .data {
            background: rgb(190, 190, 190);
        }

        .thumb img {
            width: 90% !important;
        }

        .thumb {
            text-align: center;
        }

        .login_main_info h4 {
            font-size: 25px;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            padding: 12px 0px;
        }

        .shitch_text a {
            color: blue;
        }

        .ff h4 {
            font-size: 31px;
            line-height: 30px;
            font-weight: bold;
        }

        .data h5 {
            text-align: center;
        }
    </style>
@endpush
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-md-12">
                    <div class="main-title">
                        <h3 class="">

                            {{ __('Student') }} | {{ $student->name ?? null }}
                        </h3>
                    </div>

                    <div class="row pt-0">
                        <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link @if (!session()->get('type')) active @endif" href="#group_email_sms"
                                   role="tab" data-toggle="tab">{{ __('User Detail') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if (session()->get('type') == 2) active @endif"
                                   href="#indivitual_email_sms" role="tab"
                                   data-toggle="tab">{{ __('User Application') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="#use_enrollment_declaration" role="tab"
                                   data-toggle="tab">{{ __('User Enrollment Declaration') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link @if (session()->get('type') == 3) active @endif" href="#file_list"
                                   role="tab" data-toggle="tab">{{ __('User Authentication Agreement') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#payment_detail" role="tab"
                                   data-toggle="tab">{{ __('User Payment Details') }}</a>
                            </li>

                        </ul>
                    </div>
                    <div class="white_box_30px">
                        <div class="row mt_0_sm">

                            <!-- Start Sms Details -->
                            <div class="col-lg-12">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" name="selectTab" id="selectTab">
                                    <div role="tabpanel"
                                         class="tab-pane fade @if (!session()->get('type')) show active @endif"
                                         id="group_email_sms">
                                        <div class="white_box_30px pl-0 pr-0 pt-0">
                                            <form action="{{ route('student.student.detail') }}" method="POST"
                                                  id="regForm">
                                            @csrf
                                            <!-- widgetsform -->
                                                <input type="hidden" name="is_user_setting" value="">
                                                <input name="user_id" type="hidden"
                                                       value="{{ $student->id ?? null }}">
                                                <div class="mainform row m-0 p-5">
                                                    <div class="col-md-12">

                                                        <div id="first" class="form mb-5">

                                                            <div class="ff">
                                                                <h4 class="text-center">Application for Admission</h4>
                                                                <div class="col-md-12 program my-3">
                                                                    <h5 class="mt-5">$100 Fee Required</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                    First Name
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="f_name"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->f_name ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                    Last Name
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="l_name"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->l_name ?? null }}">
                                                                                </span>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 my-4">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom d-flex">
                                                                                <span>
                                                                                    DOB:
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="date" name="dob"
                                                                                           class="formbord w-100"
                                                                                           value="{{ !empty($student) ? \Carbon\Carbon::parse($student->dob)->format('Y-m-d') : null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom  d-flex">
                                                                                <span>
                                                                                    SS#:
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="SS"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->SS ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 my-4">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    CITY:
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="city"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->city ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    State:
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="state"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->state ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Zip:
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="Zip"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $student->zip ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 my-4">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Email
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="email"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $student->email ?? null }}"
                                                                                           readonly>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                    Cell No
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text" name="phone"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $student->phone ?? null }}"
                                                                                           readonly>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 my-4">
                                                                    <div class="row">

                                                                        <div class="col-md-12 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                    Mailing address
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="text"
                                                                                           name="mailing_address"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->mailing_address ?? null }}">
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                {{-- <div class="row m-0">
                                                                    <div class="col-md-7 program">
                                                                        <h5 class="borderbotom">PROGRAM REVIEW: NCLEX
                                                                            REMEDIAL or RN COURSE
                                                                            REVIEW </h5>
                                                                    </div>
                                                                </div>

                                                                @php
                                                                    if(!empty($studentsetting->program_review)):
                                                                       $program_review = json_decode($studentsetting->program_review);
                                                                   else:
                                                                       $program_review = [];
                                                                   endif;

                                                                @endphp

                                                                <div class="row m-0 mt-2">
                                                                    <div class="col-md-3 checkbox">
                                                                        <div class="checkboxdata mt-2">
                                                                            <input type="checkbox"
                                                                                   name="program_review[]"
                                                                                   class="increae" value="Transition"
                                                                                {{ in_array('Transition',array_values($program_review)) ? 'checked' : '' }}>
                                                                            <h5 class="mx-2 mt-3">
                                                                                Transition
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 checkbox">
                                                                        <div class="checkboxdata mt-2">
                                                                            <input type="checkbox"
                                                                                   name="program_review[]"
                                                                                   class="increae" value="Remedial"
                                                                                {{ in_array('Remedial',array_values($program_review)) ? 'checked' : '' }}>
                                                                            <h5 class="mx-2 mt-3">
                                                                                Remedial
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 checkbox">
                                                                        <div class="checkboxdata mt-2">
                                                                            <input type="checkbox"
                                                                                   name="program_review[]"
                                                                                   class="increae" value="Review"
                                                                                {{ in_array('Review',array_values($program_review))  ? 'checked' : '' }}>
                                                                            <h5 class="mx-2 mt-3">
                                                                                Review
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 checkbox">
                                                                        <div class="checkboxdata mt-2">
                                                                            <input type="checkbox"
                                                                                   name="program_review[]"
                                                                                   class="increae" value="CNA Prep"
                                                                                {{ in_array('CNA Prep',array_values($program_review))  ? 'checked' : '' }}>
                                                                            <h5 class="mx-2 mt-3">
                                                                                CNA Prep
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                <div class="row align-items-end">
                                                                    <div class="col-md-8">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12 text">
                                                                                    <div
                                                                                        class="box borderbottom my-2 d-flex">
                                                                                         <span class="nowrap">
                                                                                                Student Signature:
                                                                                            </span>
                                                                                        <span class="w-100">
                                                                                            @if(isset($studentsetting->student_signature) && file_exists($studentsetting->student_signature))
                                                                                            <img src="{{asset($studentsetting->student_signature)}}" width="600" height="75" class="img-fluid" alt="Signature">
                                                                                            @else
                                                                                            <p>Signature not found</p>
                                                                                            @endif
                                                                                            {{-- <input type="text"
                                                                                                   name="student_signature"
                                                                                                   class="formbord w-100"
                                                                                                   value="{{ $studentsetting->student_signature ?? null }}"> --}}
                                                                                        </span>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="col-md-12 text">
                                                                            <div class="box borderbottom my-2 d-flex">
                                                                                 <span>
                                                                                    Date
                                                                                </span>
                                                                                <span class="w-100">
                                                                                    <input type="date"
                                                                                           name="student_signature_date"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentsetting->student_signature_date ?? null }}" readonly>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="page w-100 text-center">
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit">{{ __('common.Update') }}</button>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>


                                            </form>
                                        </div>

                                    </div>

                                    <div role="tabpanel"
                                         class="tab-pane fade @if (session()->get('type') == 2) show active @endif"
                                         id="indivitual_email_sms">
                                        <div class="white_box_30px pl-0 pr-0 pt-0">
                                            @if(!empty($studentapplication))
                                                <form action="{{ route('student.student.application') }}" method="POST"
                                                      id="regForm">
                                                @csrf
                                                <!-- widgetsform -->
                                                    <input type="hidden" name="user_id"
                                                           value="{{ $student->id ?? null }}">
                                                    <div class="mainform row m-0 p-5">
                                                        <div class="col-md-12">


                                                            <div id="second" class="form">
                                                                <div class="c">
                                                                    <h5 class="text-center">BANK CARD AUTHORIZATION
                                                                        AGREEMENT
                                                                    </h5>
                                                                    <div class="col-md-12 program my-5">
                                                                        <h5>*Initials Required*
                                                                        </h5>
                                                                    </div>
                                                                    <div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-md-12">
                                                                                <div
                                                                                    class="mainbox borderbottom  d-flex mb">
                                                                                    <p class="font_size_12px text-secondary">
                                                                                        I</p>
                                                                                    <input type="text"
                                                                                           name="term_one_text"
                                                                                           class="nameformbord w-100"
                                                                                           value="{{ $studentapplication->term_one_text ?? null }}">
                                                                                           <p class="font_size_12px text-secondary">
                                                                                               S/O</p>
                                                                                           <input type="text"
                                                                                                  name="term1_father_name"
                                                                                                  class="nameformbord w-100"
                                                                                                  value="{{ $studentapplication->term1_father_name ?? null }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 nameda program">
                                                                                <p>
                                                                                    hereby authorize Merkaii Xcellence College Of
                                                                                    Health
                                                                                    to charge my Credit
                                                                                    or
                                                                                    Debit Card for payment of Education
                                                                                    services
                                                                                    rendered as
                                                                                    described
                                                                                    on
                                                                                    <span
                                                                                    class="mainbox borderbottom">
                                                                                    <span class="font_size_12px text-secondary">
                                                                                        Dated</span>
                                                                                    <input type="date"
                                                                                           name="declaration_date"
                                                                                           class="border-0"
                                                                                           value="{{ $studentapplication->declaration_date ?? null }}" readonly>
                                                                                </span>
                                                                                </p>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div>
                                                                        {{-- <div class="row mb-2">
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="mainbox borderbottom  d-flex">
                                                                                    <p class="font_size_12px text-secondary">
                                                                                        Dated</p>
                                                                                    <input type="date"
                                                                                           name="declaration_date"
                                                                                           class="nameformbord w-100"
                                                                                           value="{{ $studentapplication->declaration_date ?? null }}" readonly>
                                                                                </div>
                                                                            </div>
                                                                          </div> --}}
                                                                          <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div
                                                                                    class="mainbox borderbottom  d-flex">
                                                                                    <p class="font_size_12px text-secondary">
                                                                                        I</p>
                                                                                    <input type="text"
                                                                                           name="term_two_text"
                                                                                           class="nameformbord w-100"
                                                                                           value="{{ $studentapplication->term_two_text ?? null }}">
                                                                                           <p class="font_size_12px text-secondary">
                                                                                               S/O</p>
                                                                                           <input type="text"
                                                                                                  name="term2_father_name"
                                                                                                  class="nameformbord w-100"
                                                                                                  value="{{ $studentapplication->term2_father_name ?? null }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 nameda program">
                                                                                <p>
                                                                                    agree, in all cases, to pay the
                                                                                    Credit or Debit Card amount for the
                                                                                    full payment of Education services
                                                                                    rendered as described below
                                                                                </p>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row nameda program m-0">
                                                                            <p class="">
                                                                                I HAVE READ AND FULLY UNDERSTAND AND
                                                                                AGREE
                                                                                WITH
                                                                                ALL OF THE ABOVE
                                                                                TERMS.
                                                                            </p>
                                                                        </div>


                                                                    <!-- mujtaba -->
                                                                        <div class="row">
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Name:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="name"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->name ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Phone:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="phone"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->phone ?? null }}">
                                                                                </span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 text">

                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Address:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="address"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->address ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                    <span> Fax: </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="fax"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->fax ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                    <span> City: </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="city"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->city ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4 text">

                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    State:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="state"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->state ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Zip:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text" name="Zip"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->Zip ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Country:
                                                                                </span>

                                                                                    <span class="w-100">
                                                                                    <input type="text" name="country"
                                                                                           class="formbord w-100"
                                                                                           value="{{ $studentapplication->country ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row program">
                                                                            <div class="col-md-3 text">
                                                                                <div class="box my-2">
                                                                               <span>
                                                                                    <input type="radio"
                                                                                           value="CREDIT CARD"
                                                                                           name="payment_type"
                                                                                        {{ $studentapplication->payment_type  == 'CREDIT CARD' ? 'checked' : '' }}></span>
                                                                                    <span>CREDIT CARD</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 text">
                                                                                <div class="box my-2">
                                                                                <span>
                                                                                    <input type="radio" value="VISA"
                                                                                           name="payment_type"
                                                                                        {{ $studentapplication->payment_type  == 'VISA' ? 'checked' : '' }}></span>
                                                                                    <span>VISA</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 text">
                                                                                <div class="box my-2">
                                                                               <span>
                                                                                    <input
                                                                                        type="radio" value="MASTERCARD"
                                                                                        name="payment_type"
                                                                                        {{ $studentapplication->payment_type  == 'MASTERCARD' ? 'checked' : '' }}></span>
                                                                                    <span>MASTERCARD</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 text">
                                                                                <div class="box my-2">
                                                                                <span>
                                                                                    <input type="radio" value="DiSCOVER"
                                                                                           name="payment_type"
                                                                                        {{ $studentapplication->payment_type  == 'DiSCOVER' ? 'checked' : '' }}>
                                                                                </span>
                                                                                    <span>DISCOVER </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 text">
                                                                                <div class="box my-2">

                                                                                <span>
                                                                                    <input type="radio" value="AMEX"
                                                                                           name="payment_type"
                                                                                        {{ $studentapplication->payment_type  == 'AMEX' ? 'checked' : '' }}>
                                                                                </span>
                                                                                    <span>AMEX </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 text">

                                                                                <div class="box borderbottom"
                                                                                     name="payment_type">
                                                                                <span>
                                                                                    Card No:
                                                                                </span>
                                                                                    <span>
                                                                                    <input type="text" class="formbord"
                                                                                           id="credit_card_no"
                                                                                           name="credit_card_no"
                                                                                           value="{{ $studentapplication->credit_card_no ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div class="box borderbottom">
                                                                                <span>
                                                                                    Expire Date:
                                                                                </span>
                                                                                    <span>
                                                                                    <input type="text" class="formbord"
                                                                                           id="expire_date"
                                                                                           name="exp_date"
                                                                                           value="{{ date('m/Y',strtotime($studentapplication->exp_date)) }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 text">

                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                   Print Name as it appears on The Card:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text"
                                                                                           class="formbord w-100"
                                                                                           name="card_appears_name"
                                                                                           value="{{ $studentapplication->card_appears_name ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 text">

                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                   Digit # On Back:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text"
                                                                                           class="formbord w-100"
                                                                                           id="digit_on_back"
                                                                                           name="digit_on_back"
                                                                                           value="{{ $studentapplication->digit_on_back ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                   Amount (USD):
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text"
                                                                                           class="formbord w-100"
                                                                                           name="dollar_amount"
                                                                                           value="{{ $studentapplication->dollar_amount ?? null }}"
                                                                                           readonly>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="row">
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Signature:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text"
                                                                                           class="formbord w-100"
                                                                                           name="stgnature"
                                                                                           value="{{ $studentapplication->stgnature ?? null }}">
                                                                                </span>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span>
                                                                                    Date:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="date"
                                                                                           class="formbord w-100"
                                                                                           name="paid_bill_date"
                                                                                           value="{{ $studentapplication->paid_bill_date ?? null }}" readonly>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        <div class="row">
                                                                            {{-- <div class="col-md-6 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                <span class="nowrap">
                                                                                    Paid bill:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="text"
                                                                                           class="formbord w-100"
                                                                                           name="paid_bill"
                                                                                           value="{{ $studentapplication->paid_bill ?? null }}">
                                                                                </span>
                                                                                </div>

                                                                            </div> --}}
                                                                            
                                                                        </div>
                                                                        <div class="row align-items-end">
                                                                            <div class="col-md-8 text">

                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                    <span class="nowrap">
                                                                                               Student Signature:
                                                                                            </span>
                                                                                    <span class="w-100">
                                                                                        @if(isset($studentapplication->student_signature) && file_exists($studentapplication->student_signature))
                                                                                        <img src="{{ asset($studentapplication->student_signature) }}" class="img-fluid" width="600" height="75">
                                                                                        @else
                                                                                        <p>Signature not found</p>
                                                                                        @endif
                                                                                            {{-- <input type="text"
                                                                                                   class="formbord w-100"
                                                                                                   name="student_signature"
                                                                                                   value="{{ $studentapplication->student_signature ?? null }}"> --}}
                                                                                        </span>

                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-4 text">
                                                                                <div
                                                                                    class="box borderbottom my-2 d-flex">
                                                                                 <span>
                                                                                    Date:
                                                                                </span>
                                                                                    <span class="w-100">
                                                                                    <input type="date"
                                                                                           class="formbord w-100"
                                                                                           name="student_signature_date"
                                                                                           value="{{ $studentapplication->student_signature_date ?? null }}">
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="page w-100 text-center py-2">
                                                                    <button class="primary-btn fix-gr-bg"
                                                                            type="submit"
                                                                            id="submit_btn">{{ __('common.Update') }}</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <h2>No data found</h2>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Individual Tab -->
                                    <div role="tabpanel"
                                         class="tab-pane fade"
                                         id="use_enrollment_declaration">
                                         <div class="white_box_30px pl-0 pr-0 pt-0">
                                           @if(!empty($studentdeclaration))
                                           <form action="{{ route('student.student.declaration') }}" method="POST"
                                                 id="regForm">
                                           @csrf
                                           <!-- widgetsform -->
                                               <input type="hidden" name="user_id"
                                                      value="{{ $student->id ?? null }}">
                                                  <div class="mainform row m-0 p-5">
                                                      <div class="col-md-12">


                                                        <div id="second" class="form">
                                                            <div class="c">
                                                                <h5 class="text-center">Enrollment Acknowledgment Declaration
                                                                </h5>
                                                                <div class="pt-4">
                                                                    <div class="row m-0">
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              I, the undersigned, solemnly declare that the information provided above is
                                                                              accurate, acknowledging the potential consequences, such as perjury, for
                                                                              providing false information. After carefully examining the Remediation Course
                                                                              Participant Handbook, I accept its contents and agree to the terms mentioned
                                                                              below.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              To meet the standards set by the Florida Board of Nursing (BON), I understand
                                                                              that I must complete a total of 96 clinical hours, which will include both Med-
                                                                              Surg and Ambulatory care. These hours can be fulfilled either in a real hospital
                                                                              setting or through simulated experiences. It is important to note that the
                                                                              duration of the clinical simulation should not exceed 48 hours. If I want to
                                                                              obtain a license from the Florida Board of Nursing while living outside of
                                                                              Florida, I understand that I must fulfill the requirement of completing hours in
                                                                              person in Florida.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              Recognizing the extensive scope of this obligation, I acknowledge that fulfilling
                                                                              the BON prerequisites entails not only completing clinical hours but also
                                                                              successfully finishing 80 didactic hours, consistently submitting homework
                                                                              assignments, achieving passing grades in all mandatory exams, and paying all
                                                                              specified fees. I will only be eligible to get the Completion Letter for the Board
                                                                              of Nursing once these components are successfully completed.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              It is important to understand that being able to participate in the RN
                                                                              Remediation Course depends on individual merit and does not automatically
                                                                              ensure success on the NCLEX-RN examination. After carefully examining the
                                                                              handbook and requesting clarification for any questions, I confirm that I have
                                                                              taken proactive measures to guarantee my comprehension before signing this
                                                                              agreement.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              I am aware that the enrollment and registration fee for the course becomes
                                                                              non-refundable after three (3) days from the date of payment. To protect my
                                                                              interests, I have kept a duplicate of this signed enrollment acknowledgment
                                                                              for my personal documentation.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 nameda program">
                                                                            <p>
                                                                              Ultimately, I pledge to adhere to the specified criteria and prerequisites stated
                                                                              in this document, fully comprehending the significance of this commitment
                                                                              and the obligations it includes for achieving effective course fulfillment.
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-12 my-4">
                                                                            <div class="row">
                                                                                <div class="col-md-12 text">

                                                                                    <div
                                                                                        class="box borderbottom my-2 d-flex">
                                                                                    <span class="nowrap">
                                                                                       Student Name
                                                                                    </span>
                                                                                        <span class="w-100">
                                                                                        
                                                                                        <input type="text"
                                                                                               class="formbord w-100"
                                                                                               name="student_name"
                                                                                               value="{{ $studentdeclaration->student_name ?? '' }}">
                                                                                    </span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 my-4">
                                                                            <div class="row align-items-end">
                                                                                <div class="col-md-8 text">
                                                                                    <div
                                                                                        class="box borderbottom my-2 d-flex">
                                                                                    <span>
                                                                                        Signature:
                                                                                    </span>
                                                                                        <span class="w-100">
                                                                                            @if(isset($studentdeclaration->student_signature) && file_exists($studentdeclaration->student_signature))
                                                                                        <img src="{{ asset($studentdeclaration->student_signature) }}" class="img-fluid" width="600" height="75">
                                                                                        @else
                                                                                        <p>Signature not found</p>
                                                                                        @endif
                                                                                    </span>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-4 text">
                                                                                    <div
                                                                                        class="box borderbottom my-2 d-flex">
                                                                                    <span>
                                                                                        Date:
                                                                                    </span>
                                                                                        <span class="w-100">
                                                                                        <input type="date"
                                                                                               class="formbord w-100"
                                                                                               name="declare_date"
                                                                                               value="{{ $studentdeclaration->declare_date }}" readonly>
                                                                                    </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>

                                                            </div>
                                                            <div class="page w-100 text-center">
                                                                <button class="primary-btn fix-gr-bg"
                                                                        type="submit"
                                                                        id="submit_btn_declaration">{{ __('common.Update') }}</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                          </form>
                                        @else
                                            <h2>No data found</h2>
                                        @endif
                                         </div>
                                    </div>
                                    <div role="tabpanel"
                                         class="tab-pane fade @if (session()->get('type') == 3) show active @endif"
                                         id="file_list">
                                        <div class="white_box_30px pl-0 pr-0 pt-0">
                                            {{-- <form action="{{ route('student.student.authentication.agreement') }}"
                                                method="POST" id="regForm">
                                                @csrf
                                                <!-- widgetsform -->
                                                <input type="hidden" name="user_id"
                                                    value="{{ $student->id ?? null }}"> --}}
                                            <div class="mainform row m-0 p-5">
                                                <div class="col-md-12">

                                                    <div id="third" class="form pt-3">
                                                        <div class="con">
                                                            <div class="containerer program">
                                                                {{-- <div class="row">
                                                                        <div class="col-md-9 my-3">

                                                                            <div class="box">
                                                                                <b style="font-size:14px;">Complete forms
                                                                                    must be mailed
                                                                                    to:  </b><br>
                                                                                <b
                                                                                    style="color:rgb(13, 103, 168);font-size:13px;">Board <span
                                                                                        style="color:grey;font-style:italic;">of</span> Nursing </b>
                                                                                <p class="m-0"
                                                                                    style="font-size:15px;font-weight:500;color:rgb(13, 103, 168)"
                                                                                    class="">
                                                                                    4052 Bald Cypress Way Bin C‐02 </p>

                                                                                <p style="font-size:15px;font-weight:500;color:rgb(13, 103, 168)"
                                                                                    class="">
                                                                                    Tallahassee, FL 32399‐3252 </p>
                                                                                <b class="h6"
                                                                                    style="color:rgb(13, 103, 168)">Board <span
                                                                                        style="color:grey;font-style:italic;font-weight: bold;">of</span> Nursing
                                                                                    Third Party Authorization </b>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <div class="logo pt-4">
                                                                                <!-- <img src="logo.jpg"> -->
                                                                                <img src="{{ url('public/assets/logo.jpg') }}"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <p
                                                                            style="font-weight:bold;font-size:15px;text-align:justify;">
                                                                            Applicants who intend to have an entity other
                                                                            than themselves act as
                                                                            a
                                                                            representative in the licensure process for this
                                                                            application must
                                                                            complete this form and have their signature
                                                                            notarized. Discard this
                                                                            form
                                                                            if you are submitting this application and do
                                                                            not authorize another
                                                                            person to act on your behalf.
                                                                        </p>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="row m-0">
                                                                            <div class="col-md-1 mdka">
                                                                                <span style="font-size:12px;"><b>I,
                                                                                    </b></span>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="mainbox">
                                                                                    <div class="mini borderbottom">
                                                                                        <input type="text"
                                                                                            name="applican_name"
                                                                                            class="nameformbord"
                                                                                            value="{{ $studentauthorziationagreement->applican_name ?? null }}">
                                                                                    </div>
                                                                                    <p class="text-center">
                                                                                        ( applican name )
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7 nameda1">
                                                                                <p>
                                                                                    the undersigned, do hereby authorize
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row m-0">
                                                                            <div class="col-md-4">
                                                                                <div class="mainbox">
                                                                                    <div class="mini borderbottom">
                                                                                        <input type="text"
                                                                                            name="authorized_representative"
                                                                                            class="nameformbord"
                                                                                            value="{{ $studentauthorziationagreement->authorized_representative ?? null }}">
                                                                                    </div>
                                                                                    <p class="text-center">
                                                                                        (authorized representative)
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7 nameda1">
                                                                                <p>
                                                                                    whose address is
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row m-0">
                                                                            <div class="col-md-8">
                                                                                <div class="mainbox">
                                                                                    <div class="mini borderbottom">
                                                                                        <input type="text"
                                                                                            name="address"
                                                                                            class="nameformbord"
                                                                                            value="{{ $studentauthorziationagreement->address ?? null }}">
                                                                                    </div>
                                                                                    <p class="text-center">
                                                                                        (authorized representatives address)

                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 nameda1">
                                                                                <p>
                                                                                    , their agents, or
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 program my-4">
                                                                            <p>
                                                                                employees, to act for me and in my name with
                                                                                respect to my
                                                                                application for licensure with the Florida
                                                                                Board of Nursing,
                                                                                with
                                                                                the exception of withdrawing my application
                                                                                or requesting a
                                                                                refund.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <p>
                                                                                Applicant Signature:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text"
                                                                                    name="applicant_signature"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->applicant_signature ?? null }}">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <p>
                                                                                Date:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mini borderbottom">
                                                                                <input type="text" name="date"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->date ?? null }}">
                                                                            </div>
                                                                            <p class="text-center">
                                                                                (MM/DD/YYYY)
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- break -->
                                                                    <div class="row my-4">
                                                                        <div class="col-md-2">
                                                                            <p>
                                                                                State of:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="state"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->state ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <p>
                                                                                County of:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="country"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->country ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <p>
                                                                                Sworn to and/or subscribed before me this
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="day"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->day ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 mt-3">
                                                                            <p>
                                                                                day of:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-3 mt-3">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="age"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->age ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2 mt-3">
                                                                            <p>
                                                                                20:
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4 mt-3">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="name"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->name ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-md-2">
                                                                            <p>
                                                                                By
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="by"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->by ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8 mt-3">
                                                                            <p>
                                                                                whose identity is known to me by
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text"
                                                                                    name="whose_identity"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->whose_identity ?? null }}">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row mt-4 mb-5">
                                                                        <div class="col-md-5">
                                                                            <p>
                                                                                Notary Signature
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text"
                                                                                    name="notary_signature"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->notary_signature ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <p>
                                                                                Printed Name of Notary
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="mainbox1 borderbottom">
                                                                                <input type="text" name="printed_name"
                                                                                    class="nameformbord"
                                                                                    value="{{ $studentauthorziationagreement->printed_name ?? null }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mt-4">
                                                                            <p
                                                                                style="text-align:center;color:rgb(49, 48, 48);font-size:17px;font-style:italic;font-weight: normal;">
                                                                                These signature fields cannot be typed. You
                                                                                must print out the
                                                                                form
                                                                                and sign it before a notary public. </p>
                                                                        </div>
                                                                        <div class="col-md-12 mt-5">
                                                                            <p>
                                                                                SEAL
                                                                            </p>
                                                                            <p style="line-height:0px;">
                                                                                (Notary Public)
                                                                            </p>
                                                                            <p class="mt-5">
                                                                                To withdraw your authorization of a third
                                                                                party representing
                                                                                you,
                                                                                submit a written request to the board office
                                                                                at the address
                                                                                above.
                                                                            </p>
                                                                        </div>
                                                                    </div> --}}
                                                                <div class="row">

                                                                    <table class="table-bordered table text-center">
                                                                        <thead>
                                                                        <tr>
                                                                            <th class="h5">Student Name</th>
                                                                            <th class="h5">Agreement File</th>
                                                                            <th class="h5">Status</th>
                                                                            @if (isset($studentauthorziationagreement->status) && $studentauthorziationagreement->status == 0)
                                                                                <th class="h5 Approve-col">Mark as</th>
                                                                            @endif
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                {{ $student->name }}
                                                                            </td>
                                                                            <td>
                                                                                @if(!empty($studentauthorziationagreement))
                                                                                    @if (isset($studentauthorziationagreement->user_agreement_form) && $studentauthorziationagreement->user_agreement_form != null)
                                                                                        <a href="{{ asset($studentauthorziationagreement->user_agreement_form) }}"
                                                                                           class="primary-btn fix-gr-bg"
                                                                                           download="agreement_of_student_{{ $studentauthorziationagreement->user_id }}">Download</a>
                                                                                    @else
                                                                                        <p style="text-align:center; color:red; font-size:17px; font-style:italic; font-weight: bold;">
                                                                                            Form is yet to be uploaded
                                                                                        </p>
                                                                                    @endif
                                                                                @else
                                                                                    <p style="text-align:center; color:red; font-size:17px; font-style:italic; font-weight: bold;">
                                                                                        Form is yet to be downloaded
                                                                                    </p>
                                                                                @endif
                                                                            </td>
                                                                            <td id="status-col">
                                                                                @if(isset($studentauthorziationagreement->status))
                                                                                    @switch($studentauthorziationagreement->status)
                                                                                        @case(null)
                                                                                        <h4 class="text-secondary">Not
                                                                                            Available</h4>
                                                                                        @break

                                                                                        @case(0)
                                                                                        <h4 class="text-warning">
                                                                                            Pending</h4>
                                                                                        @break

                                                                                        @case(1)
                                                                                        <h4 class="text-success">
                                                                                            Approved</h4>
                                                                                        @break

                                                                                        @case(2)
                                                                                        <h4 class="text-danger">
                                                                                            Disapproved
                                                                                        </h4>
                                                                                        @break

                                                                                        @default
                                                                                    @endswitch
                                                                                @endif
                                                                            </td>

                                                                            @if(isset($studentauthorziationagreement->status))
                                                                                @switch($studentauthorziationagreement->status)
                                                                                    @case(null)
                                                                                    <td class="Approve-col">
                                                                                        <h4 class="text-secondary">Not
                                                                                            Available</h4>
                                                                                    </td>
                                                                                    @break

                                                                                    @case(0)
                                                                                    <td class="Approve-col">
                                                                                        <button
                                                                                            class="primary-btn fix-gr-bg btn-sm"
                                                                                            onclick="changeStudentStatus({{ $studentauthorziationagreement->user_id }}, 1)">
                                                                                            Approve
                                                                                        </button>
                                                                                        <button
                                                                                            class="primary-btn fix-gr-bg btn-sm"
                                                                                            onclick="changeStudentStatus({{ $studentauthorziationagreement->user_id }}, 2)">
                                                                                            Disapprove
                                                                                        </button>
                                                                                    </td>
                                                                                    @break

                                                                                    @default
                                                                                @endswitch
                                                                            @endif
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="page">

                                                                    {{-- <button class="primary-btn fix-gr-bg"
                                                                            type="submit">{{ __('common.Update') }}</button> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                            {{-- </form> --}}
                                        </div>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade @" id="payment_detail">
                                        <div class="white_box_30px pl-0 pr-0 pt-0">
                                        @if (!empty($payment_detail))
                                            <!-- widgetsform -->
                                                <div class="mainform row m-0 p-5">
                                                    <div class="col-md-12">

                                                        <div id="first" class="form mb-5">

                                                            <div class="ff">
                                                                <h4 class="text-center">Payment Detail</h4>

                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Payment ID:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $payment_detail->id }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Invoice #:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            INV-{{ $invoice->id }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    $response = !empty($payment_detail) ? json_decode($payment_detail->response) : '';
                                                                @endphp
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Currency:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $response->currency  ?? ''}}
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Amount:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                           $ {{ $response->amount ?? 0 }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Refunded:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $response->amount_refunded ?? '' }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Card Type:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ isset($response->source) ? $response->source->brand : '' }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Payment Method:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $invoice->payment_method ?? '' }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Status:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $response->status ?? '' }}
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text">
                                                                            <strong>Date:</strong>
                                                                        </div>
                                                                        <div class="col-md-6 text">
                                                                            {{ $payment_detail->created_at }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="page w-100 text-center"> 
                                                                <a 
                                                                    class="primary-btn fix-gr-bg" 
                                                                    href="{{ route('invoice',['id' => $invoice->id]) }}">View Invoice</a> 
                                                            </div> 
                                                        </div>


                                                    </div>

                                                </div>
                                            @else
                                                <h2>Payment is yet to be made</h2>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade admin-query" id="change_status">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                        <button type="button" class="close modal_close" data-dismiss="modal"><i
                                class="ti-close"></i></button>
                    </div>

                    <div class="modal-body">
                        <h3 class="text-center">Are you Sure ?</h3>
                        <form action="" id="change_status_form">
                            @csrf
                            <input type="hidden" name="student_id" id="student_id">
                            <input type="hidden" name="status" id="status">
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg modal_close"
                                        data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                <button class="primary-btn semi_large2 fix-gr-bg" id="confirm_status"><i
                                        class="ti-check"></i> {{ __('Confirm') }}</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
            integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#credit_card_no').mask('9999-9999-9999-9999');
        $('#expire_date').mask('99/9999');
        $('#digit_on_back').mask('999');

        $(document).ready(function () {
            // check if user entered correct month and year
            $('#submit_btn').on('click', function () {
                var selected_expiry_date = $('#expire_date').val();
                var current = new Date();

                var selectedMonth = parseInt(selected_expiry_date.substr(0, 2));
                var selectedYear = parseInt(selected_expiry_date.substr(3, 4));

                var currentMonth = current.getMonth() + 1;
                var currentYear = current.getFullYear();

                if (selectedYear < currentYear || (selectedYear === currentYear && selectedMonth <=
                    currentMonth)) {
                    toastr.error('Expiry Month & Year Must be Greater than Current Month');
                    return false;
                }
            });

            $('#expire_date').on('keyup', function () {
                var value = $(this).val();
                var month = value.substr(0, 2);
                // month = month.replace(/^0+/, '');

                if (month === '00' || parseInt(month) > 12) {
                    $(this).val('');
                }
            });
        });


        $(function () {
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
    <script>
        function changeStudentStatus(student_id, status) {
            jQuery('#change_status').modal('show', {
                backdrop: 'static'
            });
            if (status == 1) {
                $('#modal_title').html('Approve Student');
            } else {
                $('#modal_title').html('Disapprove Student');
            }
            $('#student_id').val(student_id);
            $('#status').val(status);

            $('#confirm_status').on('click', function (e) {
                e.preventDefault();
                var add_btn = $(this);
                add_btn.attr('disabled', 'true');
                add_btn.find('i').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');

                var form = $('#change_status_form');
                var data = new FormData(form[0]);
                console.log(form);
                $.ajax({
                    type: "POST",
                    url: '{{ route('changeStudentFormStatus') }}',
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "showDuration": 300,
                            "timeOut": 3000,
                            "hideDuration": 1000,
                            "preventDuplicates": true,
                        }
                        if (response.status == 200) {
                            form.trigger("reset");
                            add_btn.removeAttr('disabled');
                            add_btn.find('i').attr('class', '').addClass(
                                'ti-check');
                            jQuery('#change_status').modal('hide');
                            toastr[response.state](response.message);
                            $('.Approve-col').remove();
                            if (status == 1) {
                                $('#status-col').html(`<h4 class="text-success">Approved</h4>`);
                            } else {
                                $('#status-col').html(`<h4 class="text-danger">Disapproved</h4>`);
                            }
                        } else {
                            toastr[response.state](response.message);
                            form.trigger("reset");
                        }
                    }
                });
            });

        }
    </script>
    <script>
        var lms_option_list = $('.lms_option_list');
        var minus_option_box = $('#minus_option_box');
        var add_option_box = $('#add_option_box');
        var chapter_section = $('#chapter_section');
        var lesson_section = $('#lesson_section');
        var quiz_section = $('#quiz_section');
        $(document).ready(function () {
            let lms_option_list = $('#lms_option_list').hide();
        })
        $('#add_option_box').click(function () {
            lms_option_list.show();
            minus_option_box.show();
            add_option_box.hide();
        })
        $('#minus_option_box').click(function () {
            lms_option_list.hide();
            minus_option_box.hide();
            lesson_section.hide();
            quiz_section.hide();
            chapter_section.hide();
            add_option_box.show();
        })
        $('#show_chapter_section').click(function () {
            lms_option_list.hide();
            lesson_section.hide();
            quiz_section.hide();
            chapter_section.show();
        })
        $('#show_lesson_section').click(function () {
            lms_option_list.hide();
            lesson_section.show();
            quiz_section.hide();
            chapter_section.hide();
        })
        $('#show_quiz_section').click(function () {
            lms_option_list.hide();
            lesson_section.hide();
            quiz_section.show();
            chapter_section.hide();
        })
    </script>
@endpush
