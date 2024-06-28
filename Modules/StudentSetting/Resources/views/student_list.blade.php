@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush
@php
    $table_name = 'users';
@endphp
@section('table')
    {{ $table_name }}
@endsection

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
          <div class="row pt-0">
            <div class="col-12">
                <div class="box_header common_table_header">
                    <div class="main-title d-md-flex w-100">
                        <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('student.Students List') }}</h3>

                        <ul class="d-flex ml-auto">
                            {{--                                @if (permissionCheck('student.store')) --}}
                            {{--                                    <li><a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal" --}}
                            {{--                                           id="add_student_btn" --}}
                            {{--                                           data-target="#add_student" href="#"><i --}}
                            {{--                                                class="ti-plus"></i>{{__('student.Add Student')}}</a> --}}
                            {{--                                    </li> --}}
                            {{--                                @endif --}}
                                <li><button class="primary-btn fix-gr-bg" onclick=uploadAgreementFormModal()>Agreement
                                    Form</button></li>
                        </ul>

                    </div>

                </div>
            </div>
            <div class="col-12">
              <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active filter-link enrolled" href="javascript:void(0)" data-type="enrolled" onclick="populateTable('enrolled')">{{ __('Enrolled') }}</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link filter-link non-enrolled" href="javascript:void(0)" data-type="non-enrolled" onclick="populateTable('non-enrolled')">{{ __('Non Enrolled') }}</a>
                  </li>
              </ul>
            </div>
          </div>
            <div class="row justify-content-center">

                <div class="col-lg-12 mt-40">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('common.Image') }}</th>
                                            <th scope="col">{{ __('common.Name') }}</th>
                                            <th scope="col">{{ __('common.Email') }}</th>
                                            <th scope="col">{{ __('student.Phone') }}</th>
                                            <th scope="col">{{ __('Courses') }}</th>
                                            <th scope="col">{{ __('Programs') }}</th>
                                            <th scope="col">{{ __('common.gender') }}</th>
                                            <th scope="col">{{ __('common.Date of Birth') }}</th>
                                            <th scope="col">{{ __('common.Country') }}</th>
                                            <th scope="col">{{ __('Enrolled') }}</th>
                                            <th scope="col" id="dateTitle">{{ __('Enrollment Date') }}</th>
                                            <th scope="col">{{ __('Registration Source') }}</th>
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
                @if (permissionCheck('student.store'))
                    <div class="modal fade admin-query" id="add_student">
                        <div class="modal-dialog modal_1000px modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('student.Add New Student') }}</h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('student.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Name') }}
                                                        <strong class="text-danger">*</strong></label>
                                                    <input class="primary_input_field" name="name" placeholder="-"
                                                        type="text" id="addName" value="{{ old('name') }}"
                                                        {{ $errors->first('name') ? 'autofocus' : '' }}>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-35">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.About') }}</label>
                                                    <textarea class="custom_summernote" name="about" id="addAbout" cols="30" rows="10">{{ old('about') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-15">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Date of Birth') }}
                                                    </label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input placeholder="Date"
                                                                        class="primary_input_field primary-input date form-control"
                                                                        id="startDate" type="text" name="dob"
                                                                        value="{{ old('dob') }}" autocomplete="off"
                                                                        {{ $errors->first('dob') ? 'autofocus' : '' }}>
                                                                </div>
                                                            </div>
                                                            <button class="" type="button">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Phone') }} <strong
                                                            class="text-danger">*</strong> </label>
                                                    <input class="primary_input_field" value="{{ old('phone') }}"
                                                        name="phone" id="addPhone" placeholder="-" type="text"
                                                        {{ $errors->first('phone') ? 'autofocus' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Email') }}
                                                        <strong class="text-danger">*</strong></label>
                                                    <input class="primary_input_field" name="email" placeholder="-"
                                                        value="{{ old('email') }}" id="addEmail"
                                                        {{ $errors->first('email') ? 'autofocus' : '' }} type="email">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="primary_input mb-35">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.gender') }}
                                                    </label>

                                                    <select class="primary_select" data-course_id="{{ @$course->id }}"
                                                        name="gender">
                                                        <option
                                                            data-display="{{ __('common.Select') }} {{ __('common.gender') }}"
                                                            value="">{{ __('common.Select') }}
                                                            {{ __('common.gender') }} </option>

                                                        <option value="male" {{ 'male' ==  old('gender') ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ 'female' ==  old('gender') ? 'selected' : '' }}>Female</option>
                                                        <option value="other" {{ 'other' ==  old('gender') ? 'selected' : '' }}>Other</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.company') }} </label>
                                                    <input class="primary_input_field" value="{{ old('company') }}"
                                                        name="company" id="addCompany" placeholder="-" type="text"
                                                        {{ $errors->first('company') ? 'autofocus' : '' }}>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="primary_input mb-35">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Image') }}
                                                        <small>{{ __('student.Recommended size') }}
                                                            (330x400)</small></label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input imgName" name="img_name" type="text"
                                                            id="placeholderFileOneName"
                                                            placeholder="{{ __('student.Browse Image file') }}"
                                                            readonly="" value="{{ old('img_name') }}">
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
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Password') }}
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
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Confirm Password') }} <strong
                                                            class="text-danger">*</strong></label>
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
                                                    {{--                                                    <input class="primary_input_field"  name="password_confirmation" placeholder="-" type="text"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Facebook URL') }}</label>
                                                    <input class="primary_input_field" name="facebook" placeholder="-"
                                                        id="addFacebook" type="text" value="{{ old('facebook') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Twitter URL') }}</label>
                                                    <input class="primary_input_field" name="twitter" placeholder="-"
                                                        id="addTwitter" type="text" value="{{ old('twitter') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.LinkedIn URL') }}</label>
                                                    <input class="primary_input_field" name="linkedin" placeholder="-"
                                                        id="addLinked" type="text" value="{{ old('linkedin') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Youtube URL') }}</label>
                                                    <input class="primary_input_field" name="youtube" placeholder="-"
                                                        id="addYoutube" type="text" value="{{ old('youtube') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt_15 text-center">
                                            <div class="d-flex justify-content-center">
                                                <button class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"
                                                    type="submit"><i class="ti-check"></i> {{ __('common.Save') }}
                                                    {{ __('student.Student') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="modal fade admin-query" id="editStudent">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('student.Update Student') }}</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="ti-close"></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('student.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ old('id') }}" id="studentId">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for="">{{ __('common.Name') }}
                                                    <strong class="text-danger">*</strong></label>
                                                <input class="primary_input_field" value="{{ old('name') }}"
                                                    name="name" placeholder="-" id="studentName" type="text"
                                                    {{ $errors->first('name') ? 'autofocus' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.About') }}</label>
                                                <textarea class="custom_summernote" name="about" id="studentAbout" cols="30" rows="10">{{ old('about') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Date of Birth') }} </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Date"
                                                                    class="primary_input_field primary-input date form-control"
                                                                    id="studentDob"
                                                                    {{ $errors->first('dob') ? 'autofocus' : '' }}
                                                                    type="text" name="dob"
                                                                    value="{{ old('dob') }}" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Phone') }} <strong
                                                        class="text-danger">*</strong> </label>
                                                <input class="primary_input_field" id="studentPhone"
                                                    {{ $errors->first('phone') ? 'autofocus' : '' }}
                                                    value="{{ old('phone') }}" name="phone" placeholder="-"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Email') }} <strong
                                                        class="text-danger">*</strong></label>
                                                <input class="primary_input_field"
                                                    {{ $errors->first('email') ? 'autofocus' : '' }}
                                                    value="{{ old('email') }}" name="email" id="studentEmail"
                                                    placeholder="-" type="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.gender') }}
                                                </label>
                                                <select class="primary_select" data-course_id="{{ @$course->id }}"
                                                    name="gender" id="studentGender">
                                                    <option
                                                        data-display="{{ __('common.Select') }} {{ __('common.gender') }}"
                                                        value="">{{ __('common.Select') }}
                                                        {{ __('common.gender') }} </option>

                                                    <option value="male" {{ 'male' ==  old('gender') ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ 'female' ==  old('gender') ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ 'other' ==  old('gender') ? 'selected' : '' }}>Other</option>

                                                </select>
                                            </div>
                                        </div>


                                        {{-- <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.company') }} </label>
                                                <input class="primary_input_field" value="{{ old('company') }}"
                                                    name="company" id="studentCompany" placeholder="-" type="text"
                                                    {{ $errors->first('company') ? 'autofocus' : '' }}>
                                            </div>
                                        </div> --}}

                                        <div class="col-xl-12">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Image') }}
                                                    <small>{{ __('student.Recommended size') }}
                                                        (350x500)</small></label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input imgName" name="img_name" type="text" id="studentImage"
                                                        placeholder="{{ trans('student.Browse Image file') }}"
                                                        readonly=""  value="{{ old('img_name') }}">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" id="Browseeeditstudent"
                                                            for="document_file_edit">{{ __('common.Browse') }}</label>
                                                        <input type="file"
                                                            {{ $errors->first('image') ? 'autofocus' : '' }}
                                                            class="d-none imgBrowse" name="image"
                                                            id="document_file_edit">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Password') }} </label>
                                                <div class="input-group mr-sm-2 mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="cursor:pointer;"
                                                                class="fas fa-eye-slash eye toggle-password"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password"
                                                        {{ $errors->first('password') ? 'autofocus' : '' }}
                                                        class="form-control primary_input_field" id="password"
                                                        name="password" value="{{ old('password') }}"
                                                        placeholder="{{ __('common.Minimum 8 characters') }}">
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
                                                        id="password"
                                                        {{ $errors->first('password_confirmation') ? 'autofocus' : '' }}
                                                        name="password_confirmation"
                                                        placeholder="{{ __('common.Minimum 8 characters') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Facebook URL') }}</label>
                                                <input class="primary_input_field" value='{{ old('facebook') }}'
                                                    id="studentFacebook" name="facebook" placeholder="-" type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.Twitter URL') }}</label>
                                                <input class="primary_input_field" id="studentTwitter"
                                                    value="{{ old('twitter') }}" name="twitter" placeholder="-"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="">{{ __('common.LinkedIn URL') }}</label>
                                                <input class="primary_input_field" id="studentLinkedin"
                                                    value="{{ old('linkedin') }}" name="linkedin" placeholder="-"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                    for="studentYoutube">{{ __('common.Youtube URL') }}</label>
                                                <input class="primary_input_field" value="{{ old('youtube') }}"
                                                    id="studentYoutube" name="youtube" placeholder="-" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt_15 text-center">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"
                                                type="submit"><i class="ti-check"></i>
                                                {{ __('student.Update Student') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="deleteStudent">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('common.Delete') }} {{ __('student.Student') }} </h4>
                                <button type="button" class="close" data-dismiss="modal"><i
                                        class="ti-close"></i></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('student.delete') }}" method="post">
                                    @csrf

                                    <div class="text-center">

                                        <h4>{{ __('common.Are you sure to delete ?') }} </h4>
                                    </div>
                                    <input type="hidden" name="id" value="" id="studentDeleteId">
                                    <div class="d-flex justify-content-between mt-40">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                        <button class="primary-btn fix-gr-bg" type="submit"><i class="ti-check"></i>
                                            {{ __('common.Delete') }}</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade admin-query" id="agreement_modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('Agreement Form') }} </h4>
                                <button type="button" class="close modal_close" data-dismiss="modal"><i
                                        class="ti-close"></i></button>
                            </div>

                            <div class="modal-body">
                                <form action="" id="agreement_form">
                                    @csrf

                                    <div class="text-center">
                                        <div class="primary_file_uploader">
                                            <input class="primary-input filePlaceholder placeholder_txt" type="text" id=""
                                                value="" placeholder=" {{ count(getAgreementForm()) ? getAgreementForm()[0]->getRelativePathname():'Browse Agreement File' }}" readonly="">
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="std_agreement_form">Browse</label>
                                                <input accept=".doc,.docx,.docs,.pdf" type="file" class="d-none fileUpload" name="agreement_form"
                                                    id="std_agreement_form">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-40">
                                        <button type="button" class="primary-btn tr-bg modal_close"
                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                        <button class="primary-btn semi_large2 fix-gr-bg" id="add_agreement_form"><i
                                                class="ti-check"></i> {{ __('Add') }}</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')

    @if ($errors->any())
        <script>
            @if (Session::has('type'))
                @if (Session::get('type') == 'store')
                    $('#add_student').modal('show');
                @else
                    $('#editStudent').modal('show');
                @endif
            @endif
        </script>
    @endif


    @php
        $url = route('student.getAllStudentData');
    @endphp
    <script>

            $(document).ready(function() {

            	var customFontFam = ['Arial','Helvetica','Cavolini','Jost','Impact','Tahoma','Verdana','Garamond','Georgia','monospace','fantasy','Papyrus','Poppins'];
                // Summer Note
                $('.custom_summernote').summernote({
                	fontNames: customFontFam,
                    fontNamesIgnoreCheck: ['Cavolini','Jost'],
                    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
                    codeviewFilter: true,
                    codeviewIframeFilter: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen']],
                    ],
                    height: 188,
                    tooltip: true
                });


                var old_file = $("#studentImage").val();

                $('#Browseeeditstudent').on('click', function() {
                    old_file = $("#studentImage").val();
                    console.log(old_file);
                });

                var _URL1 = window.URL || window.webkitURL;
                $("#document_file_edit").change(function(e) {

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = this.width;
                            var image_height = this.height;
                            if (image_width == 350 && image_height == 500) {

                            } else {
                                $('#document_file_edit').val('');
                                $('#studentImage').val(old_file);
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 350 X 500 !',
                                    'Error')
                            }
                        };
                        img.src = _URL1.createObjectURL(file);
                    }
                });

            });


    </script>
    <script>
        // $(document).ready(function() {
        function uploadAgreementFormModal() {
            jQuery('#agreement_modal').modal('show', {
                backdrop: 'static'
            });

            $('#add_agreement_form').on('click', function(e) {
                e.preventDefault();
                var add_btn = $(this);
                add_btn.attr('disabled', 'true');
                add_btn.find('i').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');

                var form = $('#agreement_form');
                var data = new FormData(form[0]);
                $.ajax({
                    type: "POST",
                    url: '{{ route('storeAgreementForm') }}',
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "showDuration": 300,
                            "timeOut": 3000,
                            "hideDuration": 1000,
                            "preventDuplicates": true,
                        }
                        if (response.status == 200) {
                            // form.trigger("reset");
                            add_btn.removeAttr('disabled');
                            add_btn.find('i').attr('class', '').addClass(
                                'ti-check');
                            jQuery('#agreement_modal').modal('hide');
                            toastr[response.state](response.message);
                        } else {
                            // form.trigger("reset");
                            add_btn.removeAttr('disabled');
                            add_btn.find('i').attr('class', '').addClass(
                                'ti-check');
                            toastr[response.state](response.message);

                        }
                    }
                });
            });

        }

        $('.modal_close').on('click', function() {
            $('#agreement_form').trigger('reset');

        });
      populateTable('enrolled');
      function populateTable(type){
        let headtitle = (type == 'enrolled') ? 'Enrollment Date' : 'Pre Register Date';
        $('#dateTitle').html(headtitle);
        $('.filter-link').removeClass('active');
        $('.filter-link.'+type).addClass('active');
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "bDestroy": true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $url !!}',
                data: {
                    type: type
                },
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: true
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
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'course_count',
                    name: 'course_count'
                },
                {
                    data: 'program_count',
                    name: 'program_count'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'dob',
                    name: 'dob'
                },
                {
                    data: 'country',
                    name: 'country'
                },
                {
                    data: 'enrolled',
                    name: 'enrolled'
                },
                {
                    data: (type == 'enrolled') ? 'enrolled_date' : 'preregister_date',
                    name: (type == 'enrolled') ? 'enrolled_date' : 'preregister_date'
                },
                {
                    data: 'reg_src',
                    name: 'reg_src'
                },
                {
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
                        columns: ':visible:not(:last-child):not(:nth-child(2)):not(:nth-child(6)):not(:nth-child(7)):not(:nth-child(11))',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        console.log(doc);
                        doc.content[1].table.widths = ['5%','30%','30%','30%','5%'];
                        // doc.content[1].table.widths =
                        //     Array(doc.content[1].table.body[0].length + 1).join('*').split('');
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
                    responsivePriority: 1,
                    targets: -1
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });
      }
        // let table = $('#allData').DataTable() ;
        // table.clearPipeline();
        // table.ajax.reload();
    </script>

    <script src="{{ asset('public/backend/js/student_list.js') }}"></script>

@endpush
