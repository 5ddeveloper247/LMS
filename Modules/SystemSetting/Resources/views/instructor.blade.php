@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
    <style>
        .image-editor-preview-img-1 {
            width: 90px !important;
            height: 120px !important;
            object-fit: contain !important;
        }
    </style>
@endpush

@section('table')
    @php
        $table_name = 'users';
    @endphp
    {{ $table_name }}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#instructors" role="tab"
                            data-toggle="tab">{{ __('Instructors') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#individual_tutors" role="tab" data-toggle="tab"
                            id="tutors">{{ __('Individual Tutors') }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4">
                <input type="hidden" name="selectTab" id="selectTab">
                {{-- Instructors --}}
                <div role="tabpanel" class="tab-pane fade show active" id="instructors">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Instructors') }}
                                        {{ __('common.List') }}
                                    </h3>
                                    @if (permissionCheck('instructor.store'))
                                        <ul class="d-flex">
                                            <li>
                                                {{--                                        @if (isModuleActive('Appointment')) --}}
                                                {{--                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" --}}
                                                {{--                                               id="add_instructor_btn" --}}
                                                {{--                                               href="{{ route('appointment.instructor.create') }}"><i --}}
                                                {{--                                                    class="ti-plus"></i>{{__('instructor.Add Instructor')}}</a> --}}
                                                {{--                                        @else --}}
                                                {{--                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal" --}}
                                                {{--                                               id="add_instructor_btn" --}}
                                                {{--                                               data-target="#add_instructor" href="#"><i --}}
                                                {{--                                                    class="ti-plus"></i>{{__('instructor.Add Instructor')}}</a> --}}
                                                {{--                                        @endif --}}

                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <!-- table-responsive -->

                                    <div class="">
                                        <table id="lms_table" class="Crm_table_active3 table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('common.Image') }}</th>
                                                    <th scope="col">{{ __('common.Name') }}</th>
                                                    <th scope="col">{{ __('common.Email') }}</th>
                                                    @if (isModuleActive('OrgInstructorPolicy'))
                                                        <th scope="col">{{ __('policy.Group') }}
                                                            {{ __('policy.Policy') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('common.Status') }}</th>
                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Individual Tutor --}}
                <div role="tabpanel" class="tab-pane fade" id="individual_tutors">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Individual Tutors') }}
                                        {{ __('common.List') }}
                                    </h3>
                                    @if (permissionCheck('instructor.store'))
                                        <ul class="d-flex">
                                            <li>
                                                {{--                                        @if (isModuleActive('Appointment')) --}}
                                                {{--                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" --}}
                                                {{--                                               id="add_instructor_btn" --}}
                                                {{--                                               href="{{ route('appointment.instructor.create') }}"><i --}}
                                                {{--                                                    class="ti-plus"></i>{{__('instructor.Add Instructor')}}</a> --}}
                                                {{--                                        @else --}}
                                                {{--                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal" --}}
                                                {{--                                               id="add_instructor_btn" --}}
                                                {{--                                               data-target="#add_instructor" href="#"><i --}}
                                                {{--                                                    class="ti-plus"></i>{{__('instructor.Add Instructor')}}</a> --}}
                                                {{--                                        @endif --}}

                                            </li>
                                        </ul>
                                    @endif

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <!-- table-responsive -->

                                    <div class="">
                                        <table id="lms_table2" class="Crm_table_active3 table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('common.Image') }}</th>
                                                    <th scope="col">{{ __('common.Name') }}</th>
                                                    <th scope="col">{{ __('common.Email') }}</th>
                                                    @if (isModuleActive('OrgInstructorPolicy'))
                                                        <th scope="col">{{ __('policy.Group') }}
                                                            {{ __('policy.Policy') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('common.Status') }}</th>
                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade admin-query" id="add_instructor" data-backdrop="static" data-keyboard='false'>
            <div class="modal-dialog modal_1000px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('common.Add New') }} {{ __('quiz.Instructor') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Name') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field" name="name" placeholder="-" id="addName"
                                            type="text" value="{{ old('name') }}"
                                            {{ $errors->first('name') ? 'autofocus' : '' }}>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label"
                                            for="">{{ __('instructor.About') }}</label>
                                        <textarea class="lms_summernote" name="about" id="addAbout" cols="30" rows="10">{{ old('about') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label"
                                            for="">{{ __('common.Date of Birth') }}
                                        </label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="{{ __('common.Date') }}"
                                                            class="primary_input_field primary-input date form-control"
                                                            id="" type="text" name="dob"
                                                            value="{{ old('dob') }}"
                                                            {{ $errors->first('dob') ? 'autofocus' : '' }}
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label" for="">{{ __('common.gender') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="primary_select" name="gender" id="addGender">
                                            <option data-display="{{ __('common.Select') }} {{ __('common.gender') }}"
                                                value="" selected>{{ __('common.Select') }}
                                                {{ __('common.gender') }} </option>

                                            <option value="male" {{ 'male' == old('gender') ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ 'female' == old('gender') ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ 'other' == old('gender') ? 'selected' : '' }}>
                                                Other
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Phone') }}
                                        </label>
                                        <input class="primary_input_field" value="{{ old('phone') }}" name="phone"
                                            id="addPhone" placeholder="-"
                                            {{ $errors->first('phone') ? 'autofocus' : '' }} type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Email') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field" name="email" placeholder="-" id="addEmail"
                                            value="{{ old('email') }}" {{ $errors->first('email') ? 'autofocus' : '' }}
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label" for="">{{ __('common.Image') }}
                                            <small>{{ __('student.Recommended size') }} (350x500)</small></label>
                                        <div class="primary_file_uploader">
                                            <input class="primary-input imgName" name="img_name" type="text"
                                                id="placeholderFileOneName"
                                                placeholder="{{ __('student.Browse Image file') }}"
                                                value="{{ old('img_name') }}" readonly="">
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="document_file">{{ __('common.Browse') }}</label>
                                                <input type="file" class="d-none imgBrowse" name="image"
                                                    id="document_file">
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Password') }}
                                            <strong class="text-danger">*</strong></label>
                                        <div class="input-group mr-sm-2 mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="cursor:pointer;"
                                                        class="fas fa-eye-slash eye toggle-password"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control primary_input_field"
                                                id="addPassword" name="password"
                                                placeholder="{{ __('common.Minimum 8 characters') }}"
                                                {{ $errors->first('password') ? 'autofocus' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Confirm Password') }}
                                            <strong class="text-danger">*</strong></label>
                                        <div class="input-group mr-sm-2 mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="cursor:pointer;"
                                                        class="fas fa-eye-slash eye toggle-password"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control primary_input_field"
                                                {{ $errors->first('password_confirmation') ? 'autofocus' : '' }}
                                                id="addCpassword" name="password_confirmation"
                                                placeholder="{{ __('common.Minimum 8 characters') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Facebook URL') }}</label>
                                        <input class="primary_input_field" name="facebook" placeholder="-"
                                            id="addFacebook" type="text" value="{{ old('facebook') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Twitter URL') }}</label>
                                        <input class="primary_input_field" name="twitter" placeholder="-"
                                            id="addTwitter" type="text" value="{{ old('twitter') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.LinkedIn URL') }}</label>
                                        <input class="primary_input_field" name="linkedin" placeholder="-"
                                            id="addLinkedin" type="text" value="{{ old('linkedin') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Instagram URL') }}</label>
                                        <input class="primary_input_field" name="instagram" placeholder="-"
                                            id="addInstagram" type="text" value="{{ old('instagram') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pt_15 text-center">
                                <div class="d-flex justify-content-center">
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"
                                        type="submit"><i class="ti-check"></i> {{ __('common.Save') }}
                                        {{ __('courses.Instructor') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="editInstructor" data-backdrop="static" data-keyboard='false'>
            <div class="modal-dialog modal_1000px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('common.Update') }} {{ __('quiz.Instructor') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('instructor.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ old('id') }}" id="instructorId">
                            <input type="hidden" name="role_id" value="{{ old('role_id') }}" id="instructorRoleId">
                            <input type="hidden" name="image_preview-1-old" value="{{ old('image_preview-1-old') }}"
                                id="image_preview-1-old">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Name') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field" {{ $errors->first('name') ? 'autofocus' : '' }}
                                            value="{{ old('name') }}" name="name" id="instructorName"
                                            placeholder="-" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label"
                                            for="">{{ __('instructor.About') }}</label>
                                        <textarea class="lms_summernote" name="about" id="instructorAbout" cols="30" rows="10">{{ old('about') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label"
                                            for="">{{ __('instructor.Date of Birth') }}
                                        </label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Date"
                                                            class="primary_input_field primary-input date form-control"
                                                            id="instructorDob"
                                                            {{ $errors->first('dob') ? 'autofocus' : '' }} type="text"
                                                            name="dob" value="{{ old('dob') }}"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label" for="">{{ __('common.gender') }}
                                            <strong class="text-danger">*</strong>
                                        </label>
                                        <select class="primary_select" data-course_id="{{ @$course->id }}"
                                            name="gender" id="instructorGender" required>
                                            <option data-display="{{ __('common.Select') }} {{ __('common.gender') }}"
                                                value="" selected>{{ __('common.Select') }}
                                                {{ __('common.gender') }} </option>

                                            <option value="male" {{ 'male' == old('gender') ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ 'female' == old('gender') ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ 'other' == old('gender') ? 'selected' : '' }}>
                                                Other
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Phone') }}
                                        </label>
                                        <input class="primary_input_field" value="{{ old('phone') }}" name="phone"
                                            placeholder="-" id="instructorPhone" type="text"
                                            {{ $errors->first('phone') ? 'autofocus' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-5">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Email') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field" value="{{ old('email') }}" name="email"
                                            placeholder="-" id="instructorEmail" type="email"
                                            {{ $errors->first('email') ? 'autofocus' : '' }} required>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="primary_input mb-35">
                                        <label class="primary_input_label" for="">{{ __('common.Image') }}
                                            <small>{{ __('student.Recommended size') }}
                                                (350x500)</small></label>
                                        <div class="primary_file_uploader" id="image_file">
                                            <input class="primary-input filePlaceholder imgName" name="img_name"
                                                type="text" id="instructorImage"
                                                placeholder="{{ __('student.Browse Image file') }}" readonly=""
                                                value="{{ old('img_name') }}">
                                            <button onclick="destroyCropper1()" class="" type="button">
                                                <label class="primary-btn small fix-gr-bg" id="Browseeeditinstructor"
                                                    for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                                <input type="file" class="d-none fileUpload upload-editor-1"
                                                    name="image" id="document_file_thumb-1">
                                                <input type="hidden" name="hidden_file" id="cropper_img"
                                                    class="upload-editor-hidden-file-1">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <img src="{{ old('image_preview-1-old') ? old('image_preview-1-old') : asset('public/demo/user/admin.jpg') }}"
                                        class="preview image-editor-preview-img-1" id="image_preview-1" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Password') }}
                                        </label>

                                        <div class="input-group mr-sm-2 mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="cursor:pointer;"
                                                        class="fas fa-eye-slash eye toggle-password"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control primary_input_field"
                                                id="password" name="password"
                                                placeholder="{{ __('common.Minimum 8 characters') }}"
                                                {{ $errors->first('password') ? 'autofocus' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                            for="">{{ __('common.Confirm Password') }}
                                        </label>

                                        <div class="input-group mr-sm-2 mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="cursor:pointer;"
                                                        class="fas fa-eye-slash eye toggle-password"></i>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control primary_input_field"
                                                id="password_confirm" name="password_confirmation"
                                                placeholder="{{ __('common.Minimum 8 characters') }}"
                                                {{ $errors->first('password_confirmation') ? 'autofocus' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Facebook URL') }}</label>
                                        <input class="primary_input_field" value="{{ old('facebook') }}"
                                            name="facebook" placeholder="-" id="instructorFacebook" type="text">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Twitter URL') }}</label>
                                        <input class="primary_input_field" value="{{ old('twitter') }}" name="twitter"
                                            placeholder="-" id="instructorTwitter" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.LinkedIn URL') }}</label>
                                        <input class="primary_input_field" value="{{ old('linkedin') }}"
                                            name="linkedin" placeholder="-" id="instructorLinkedin" type="text">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">
                                            {{ __('common.Instagram URL') }}</label>
                                        <input class="primary_input_field" value="{{ old('instagram') }}"
                                            name="instagram" placeholder="-" id="instructorInstragram" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pt_15 text-center">
                                <div class="d-flex justify-content-center">
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"
                                        type="submit"><i class="ti-check"></i> {{ __('common.Update') }}
                                        {{ __('courses.Instructor') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="deleteInstructor">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('instructor.delete') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('common.Delete') }} {{ __('quiz.Instructor') }} </h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>

                        <div class="modal-body">
                            <div class="text-center">

                                <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" id="instructorDeleteId">

                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="setHoursInstructor">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('instructor.set.hours') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Set Hours') }} </h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ Session::get('hours_id') }}"
                                id="instructorSethoursId">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Type') }}
                                        </label>
                                        <div class="col-md-6 col-sm-6 mb-25">
                                            <label class="primary_checkbox d-flex nowrap mr-12" onclick="setprice(75)">
                                                <input type="radio" id="instructortypeNursing" name="type"
                                                    value="1" {{ old('type') == 1 ? 'checked' : '' }}>
                                                <span class="checkmark mr-2"></span> {{ __('Nursing') }}</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-25">
                                            <label class="primary_checkbox d-flex nowrap mr-12" onclick="setprice(35)">
                                                <input type="radio" id="instructortypeGened" name="type"
                                                    value="2" {{ old('type') == 2 ? 'checked' : '' }}>
                                                <span class="checkmark mr-2"></span> {{ __('Gen-ed') }}</label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Hours') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field"
                                            {{ $errors->first('hours') ? 'autofocus' : '' }}
                                            value="{{ old('hours') }}" name="hours" id="instructorhours"
                                            placeholder="-" type="number">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Price') }}
                                            <strong class="text-danger">*</strong></label>
                                        <input class="primary_input_field"
                                            {{ $errors->first('price') ? 'autofocus' : '' }}
                                            value="{{ old('price') }}" name="price" id="instructorprice"
                                            placeholder="-" type="number">
                                    </div>
                                </div>


                            </div>
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                <button class="primary-btn fix-gr-bg" type="button" onclick="formValidations(this);">{{ __('common.Save') }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- 1st Modal --}}
        <div class="modal fade admin-query" id="image-editor-modal-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crop Instructor Image</h4>
                        <button type="button" class="close image-editor-cancel-button-1" onclick="destroyCropper1()">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body mx-auto">
                        <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                        <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in
                            and
                            Zoom
                            out</small>
                        <img id="image-editor-image-1" class="image-editor-preview-container-1 img-fluid"
                            src="https://avatars0.githubusercontent.com/u/3456749">
                        <div class="preview image-editor-preview image-editor-preview-container-1 ml-5"></div>
                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-between mt-40">
                                <button onclick="destroyCropper1()" type="button"
                                    class="primary-btn tr-bg image-editor-cancel-button-1"
                                    id="">{{ __('common.Cancel') }}</button>
                                <a id="image-editor-save-button-1" onclick="saveCropImage1()"
                                    class="primary-btn semi_large2 fix-gr-bg">{{ __('Save') }}</a>
                                <a id="image-editor-crop-1"
                                    class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        // Image Cropper Start
        $(document).ready(function() {
            // 1st Cropper

            var old_file = $("#instructorImage").val();

            $('#Browseeeditinstructor').on('click', function() {
                old_file = $("#instructorImage").val();
                console.log(old_file);
            });


            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb-1").change(function(e) {

                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 350 && image_height == 500) {
                            jQuery('#image-editor-modal-1').modal('show', {
                                backdrop: 'static'
                            });
                        } else {
                            $('#document_file_thumb-1').val('');
                            $("#instructorImage").val(old_file);
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 350 X 500 !',
                                'Error')
                        }
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });
            $('.image-editor-cancel-button-1').on('click', function() {
                if ($('#image_preview-1').attr('src') != '' || $('#image_preview-1').attr('src') != null) {
                    $('#image_file-1').children().val('');
                }
                $('#image-editor-modal-1').trigger("reset");
                $('#image-editor-modal-1').modal('hide');
            });
        });
        // Image Cropper End
    </script>
    <script>
        $(document).ready(function() {
            @if (session()->has('type') && session()->get('type') == 'tutor')
                // setTimeout(() => {
                $('#tutors').click();
                @php
                    session()->forget('type');
                @endphp
                // }, 500);
            @else
                @php
                    session()->forget('type');
                @endphp
            @endif
        });
    </script>
    @if ($errors->any())
        @if (session()->has('type'))
            @if (session()->get('type') == 'tutor')
                <script>
                    $('#editInstructor').modal('show');
                </script>
            @else
                <script>
                    $('#editInstructor').modal('show');
                </script>
            @endif
        @endif
        @if (Session::has('hours_id'))
            <script>
                $('#setHoursInstructor').modal('show');
            </script>
        @endif
    @endif

    @php
        $instructor_url = route('getAllInstructorData');
        $individual_tutor_url = route('getAllIndividualTutorsData');
    @endphp
    <script>
        $(document).on('click', '.setHoursInstructor', function() {
            let instructor_id = $(this).data('item-id');
            $('#instructorSethoursId').val(instructor_id);
            let instructor_hours = $(this).data('item-hours');
            $('#instructorhours').val(instructor_hours);
            let instructor_price = $(this).data('item-price');
            $('#instructorprice').val(instructor_price);
            let instructor_type = $(this).data('item-type');
            if (instructor_type == 1) {
                $('#instructortypeNursing').attr('checked', true);
                $('#instructortypeGened').attr('checked', false);
            }
            if (instructor_type == 2) {
                $('#instructortypeGened').attr('checked', true);
                $('#instructortypeNursing').attr('checked', false);
            }
            $('#setHoursInstructor').modal('show');

        });

        function setprice(price) {
            $('#instructorprice').val(price);
        }
    </script>
    <script>
        // Instructor Table
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $instructor_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                @if (isModuleActive('OrgInstructorPolicy'))
                    {
                        data: 'group_policy',
                        name: 'group_policy'
                    },
                @endif {
                    data: 'status',
                    name: 'status',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __('common.Quick Search') }}',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });

        // Individual Tutor Table
        let table1 = $('#lms_table2').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $individual_tutor_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                @if (isModuleActive('OrgInstructorPolicy'))
                    {
                        data: 'group_policy',
                        name: 'group_policy'
                    },
                @endif {
                    data: 'status',
                    name: 'status',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __('common.Quick Search') }}',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });
    </script>
    <script>
    
    function formValidations(button){
		$('.preloader').show();
	    var errors = [];
	    
	    var form = $(button).closest("form");

	   	if (isEmpty(form.find("input[name='type']:checked").val())) {
	    	errors.push('Type is required.');
	    }

	   	if (isEmpty(form.find("input[name='hours']").val())) {
	    	errors.push('Hours is required.');
	    }
	    var hours = form.find("input[name='hours']").val();

	    if(hours != ''){
	    	if(hours < 0 || hours > 24){
	        	errors.push('Hours must be in between 1 to 24.');
			}
		}

	    if (isEmpty(form.find("input[name='price']").val())) {
	    	errors.push('Price is required.');
	    }

	    var price = form.find("input[name='price']").val();
	    
	    if(price != ''){
	    	if(price <= 0){
		    	errors.push('Price must be greater then 0.');
			}
		}
	    

	   	setTimeout(function(){
	   		if (errors.length) {
	       		console.log(errors);
	        	$('.preloader').hide();
	          	$('input[type="submit"]').attr('disabled', false);
	          	$.each(errors.reverse(), function (index, item) {
	        		toastr.error(item, 'Error', 1000);
	          	});
	       		return false;
	   		}
	      	form.submit();
		}, 3000);
    	
	}
    </script>
    <script src="{{ asset('public/backend/js/instructor_list.js') }}"></script>
@endpush
