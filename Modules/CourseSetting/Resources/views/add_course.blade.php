@extends('backend.master')
@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            width: 100%;
            height: 46px;
            line-height: 46px;
            font-size: 13px;
            padding: 3px 20px;
            padding-left: 20px;
            font-weight: 300;
            border-radius: 30px;
            color: var(--base_color);
            border: 1px solid #ECEEF4
        }

        .ck-editor__editable ul li{
            list-style: disc;
        }
        .ck-editor__editable ol li{
            list-style: decimal;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 46px;
            position: absolute;
            top: 1px;
            right: 20px;
            width: 20px;
            color: var(--text-color);
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #ECEEF4;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            width: 100%;
            background: var(--bg_white);
            overflow: auto !important;
            border-radius: 0px 0px 10px 10px;
            margin-top: 1px;
            z-index: 9999 !important;
            border: 0;
            box-shadow: 0px 10px 20px rgb(108 39 255 / 30%);
            z-index: 1051;
            min-width: 200px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid rgba(130, 139, 178, 0.3) !important;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 0px 8px;
            width: 100% !important;
            height: 46px;
            line-height: 46px;
            outline: 0 !important;
        }

        .select2-container {
            width: 100% !important;
            min-width: 90px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 40px;
        }


        .makeResize.responsiveResize.col-xl-6 {
            margin-top: 30px;
        }

        @media (max-width: 1199px) {
            .responsiveResize2 {
                margin-top: 30px;
            }
        }

        .image-editor-preview-img-1,
        .image-editor-preview-img-2,
        .image-editor-preview-img-3,
        .image-editor-preview-img-4 {
            width: 90px !important;
            height: 120px !important;
            object-fit: contain !important;
            margin-bottom: 5px;
        }
    </style>
@endpush
@php
    $table_name = 'courses';
@endphp
@section('table')
    {{ $table_name }}
@stop
@section('mainContent')
    @php
        $required_type = false;
        if (isModuleActive('Org')) {
            $required_type = true;
        }
        if (Auth::user()->role_id == 9) {
            $d_none = 'd-none';
        } else {
            $d_none = 'd-block';
        }
    @endphp
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>{{ __('common.Add New') }} {{ __('Prep Course') }} </h4>

            </div> 
            <div class="col-lg-12">
                <input type="hidden" id="url" value="{{ url('/') }}">
                <form action="{{ route('AdminSaveCourse') }}" method="POST" enctype="multipart/form-data" id="course_form">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="primary_input">
                                <div class="row toggle_course_testPrep">
                                    <div class="col-md-12"> 
                                        <label class="primary_input_label" for=""> {{ __('courses.Type') }} </label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25">
                                        <label class="primary_checkbox d-flex mr-12" onclick="removecol()">
                                            <input type="radio" id="type1" name="type" class="addType"
                                                value="{{ Auth::user()->role_id == 9 ? 9 : 1 }}"
                                                @if (empty(old('type'))) checked @else
                                                {{ old('type') == 1 ? 'checked' : '' }} @endif>
                                            <span class="checkmark mr-2"></span>{{ __('Course') }}
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25 {{ $d_none }}">
                                        <label class="primary_checkbox d-flex nowrap mr-12" onclick="timecol()">
                                            <input type="radio" id="type2" name="type" value="7"
                                                class="type2 addType" {{ old('type') == 7 ? 'checked' : '' }}>
                                            <span class="checkmark mr-2"></span> {{ __('Time Table') }}</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25 {{ $d_none }}">
                                        <label class="primary_checkbox d-flex nowrap mr-12" onclick="addcol()">
                                            <input type="radio" id="type2" name="type" value="2"
                                                class="type2 addType" {{ old('type') == 2 ? 'checked' : '' }}
                                                {{ auth()->user()->role_id == 2 ? 'disabled' : '' }}>
                                            <span class="checkmark mr-2"></span> {{ __('Big Quiz') }}</label>
                                    </div>
                                    <script>
                                        $('input[name="type"]').on('change',function(){
                                            var val = $(this).val();
                                            if(val == 7){
                                                $('.instructorBox').addClass('d-none').removeClass('d-block');
                                            }else{
                                                $('.instructorBox').removeClass('d-none');

                                            }
                                        });
                                        function addcol() {
                                            if ($('.type2').is(':checked')) {
                                                $('.change_state').prop('checked', false);
                                            }
                                            $('.courseBox').addClass('d-none').removeClass('d-block');
                                            $('.testPrepBox').removeClass('d-none');
                                            $('.timetableBox').addClass('d-none');
                                            $('.pricetextbox').removeClass('d-none');
                                            $('.addnewdo').addClass('col-xl-12');
                                            $('.addnewdo').removeClass('col-xl-6');
                                            $('.cna_prep_type, .test_prep_type, .test_prep_graded_type').addClass('d-none');
                                        }

                                        function removecol() {
                                            $('.addnewdo').addClass('col-xl-6');
                                            $('.addnewdo').removeClass('col-xl-12');
                                            $('.pricetextbox').addClass('d-none');
                                            $('.timetableBox').addClass('d-none');
                                            $('.testPrepBox').addClass('d-none');
                                            $('.courseBox').removeClass('d-none');
                                        }

                                        function timecol() {
                                            if ($('.type2').is(':checked')) {
                                                $('.change_state').prop('checked', false);
                                            }
                                            $('.courseBox').addClass('d-none');
                                            $('.testPrepBox').addClass('d-none');
                                            $('.timetableBox').removeClass('d-none');
                                            $('.pricetextbox').removeClass('d-none');
                                            $('.addnewdo').addClass('col-xl-12');
                                            $('.addnewdo').removeClass('col-xl-6');
                                            $('.cna_prep_type, .test_prep_type, .test_prep_graded_type').addClass('d-none');
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 courseBox">
                            <div class="primary_input {{ $d_none }}">
                                <div class="row toggle_course_testPrep">
                                    <div class="col-md-12">
                                        <label class="primary_input_label" for=""> {{ __('PREP-COURSE') }}</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25">
                                        <label class="primary_checkbox d-flex nowrap mr-12">
                                            <input type="checkbox" name="cna_prep_type" id="cna_prep_type_check"
                                                value="1" onchange="showCnaPrepPrice();" class="change_state">
                                            <span class="checkmark mr-2"></span>{{ __('Full Course') }}</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25">
                                        <label class="primary_checkbox d-flex nowrap mr-12">
                                            <input type="checkbox" name="test_prep_type" id="test_prep_type_check"
                                                value="1" onchange="showPrepDemandPrice()" class="change_state">
                                            <span class="checkmark mr-2"></span>
                                            {{ __('Prep-Course') }} <br> {{ __('(on-demand)') }}
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-25">
                                        <label class="primary_checkbox d-flex nowrap mr-12">
                                            <input type="checkbox" name="test_prep_graded_type"
                                                id="test_prep_graded_type_check" value="1"
                                                onchange="showPrepGradedPrice()" class="change_state">
                                            <span class="checkmark mr-2"></span>
                                            {{ __('Prep-Course ') }} <br> {{ __('(live)') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Prep Course --}}
                        {{-- <div class="col-xl-4 d-none cna_prep_type">
                            <div class="primary_input mb-25"> 
                                <label class="primary_input_label" for="">{{ __('Full Course Price') }}</label>
                                <input class="primary_input_field" accept="/^1[1-9]{9}$/" name="cna_prep_price"
                                    placeholder="-" type="text" value="{{ old('cna_prep_price') }}" id="cna_prep_price">
                            </div>
                        </div> --}}
                        <div class="col-xl-10 d-none cna_prep_type">
                            <div class="primary_input">
                                <label class="primary_input_label"
                                    for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                <div class="primary_file_uploader" id="image_file-2">
                                    <input class="primary-input filePlaceholder" type="text" id="input-2"
                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                    <button onclick="destroyCropper2()" class="" type="button">
                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                            for="document_file_thumb-2">{{ __('common.Browse') }}</label>
                                        <input type="file" class="d-none fileUpload upload-editor-2"
                                            name="full_course_main_image" id="document_file_thumb-2"
                                            accept=".jpg, .jpeg, .png, .gif">
                                        <input type="hidden" name="full_course_thumbnail_image" id="cropper_img_2"
                                            class="upload-editor-hidden-file-2">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 d-none cna_prep_type text-center">
                            <img src="" class="preview image-editor-preview-img-2" id="image_preview-2" />
                        </div>

                        {{-- Prep Course (on-demand) --}}
                        <div class="col-xl-4 d-none test_prep_type">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                    for="">{{ __('Prep-Course Price(On-Demand)') }}</label>
                                <input  min="1" step="1" class="primary_input_field" accept="/^1[1-9]{9}$/" name="test_prep_price"
                                    placeholder="-" type="text" value="{{ old('test_prep_price') }}"
                                    id="test_prep_price">
                            </div>
                        </div>
                        <div class="col-xl-6 test_prep_type d-none">
                            <div class="primary_input">
                                <label class="primary_input_label"
                                    for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                <div class="primary_file_uploader" id="image_file-3">

                                    <input class="primary-input filePlaceholder" type="text" id="input-3"
                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                    <button onclick="destroyCropper3()" class="" type="button">
                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                            for="document_file_thumb-3">{{ __('common.Browse') }}</label>
                                        <input type="file" class="d-none fileUpload upload-editor-3"
                                            name="demand_course_main_image" id="document_file_thumb-3"
                                            accept=".jpg, .jpeg, .png, .gif">
                                        <input type="hidden" name="demand_course_thumbnail_image" id="cropper_img_3"
                                            class="upload-editor-hidden-file-3">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 test_prep_type d-none text-center">
                            <img src="" class="preview image-editor-preview-img-3" id="image_preview-3" />
                        </div>
 
                        {{-- Prep Course (Live) --}}
                        {{-- <div class="col-xl-4 d-none test_prep_graded_type">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                    for="">{{ __('Prep-Course Price(Live)') }}</label>
                                <input class="primary_input_field" name="test_prep_graded_price" placeholder="-"
                                    type="text" accept="/^1[1-9]{9}$/" value="{{ old('test_prep_graded_price') }}"
                                    id="test_prep_graded_price">
                            </div>
                        </div> --}}
                        <div class="col-xl-10 test_prep_graded_type d-none">
                            <div class="primary_input">
                                <label class="primary_input_label"
                                    for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                <div class="primary_file_uploader" id="image_file-4">
                                    <input class="primary-input filePlaceholder" type="text" id="input-4"
                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                    <button onclick="destroyCropper4()" class="" type="button">
                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                            for="document_file_thumb-4">{{ __('common.Browse') }}</label>
                                        <input type="file" class="d-none fileUpload upload-editor-4"
                                            name="live_course_main_image" id="document_file_thumb-4"
                                            accept=".jpg, .jpeg, .png, .gif">
                                        <input type="hidden" name="live_course_thumbnail_image" id="cropper_img_4"
                                            class="upload-editor-hidden-file-4">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 test_prep_graded_type d-none text-center">
                            <img src="{{ asset('public/assets/course/image-375x500.png') }}"
                                class="preview image-editor-preview-img-4" id="image_preview-4" />
                       </div>

                        @php
                            $LanguageList = getLanguageList();
                        @endphp


                        <div class="col-xl-12" id="element">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('Title') }} <small>(Max
                                                size
                                                100 Characters)</small> *</label>
                                        <input class="primary_input_field" name="title" placeholder="-" id="addTitle"
                                            type="text" {{ $errors->has('title') ? 'autofocus' : '' }} value=""
                                            maxlength="100" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 courseBox instructorBox {{ $d_none }}">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="course_code">{{ __('Course Code') }}
                                    *
                                </label>
                                <input type="text" name="course_code" id="course_code" placeholder="-" class="primary_input_field active mb-15 e1">

                            </div>
                        </div>
                        <div class="col-xl-6 courseBox instructorBox {{ $d_none }}">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="total_courses">{{ __('Total Classes') }}
                                    *
                                </label>
                                <input min="1" type="number" name="total_courses" id="total_courses" placeholder="-" class="primary_input_field active mb-15 e1">

                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @if ($required_type)
                            <div class="{{ $required_type ? 'col-xl-4' : 'col-xl-6' }}">
                                <div class="primary_input">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="primary_input_label" for="">
                                                {{ __('courses.Required Type') }} * </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-25">
                                            <label class="primary_checkbox d-flex mr-12">
                                                <input type="radio" id="" name="required_type" value="1"
                                                    checked>
                                                <span class="checkmark mr-2"></span>{{ __('courses.Compulsory') }}
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-25">
                                            <label class="primary_checkbox d-flex mr-12">
                                                <input type="radio" name="required_type" value="0">
                                                <span class="checkmark mr-2"></span> {{ __('courses.Open') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{--                        <div class=" {{$required_type?'col-xl-4':'col-xl-6'}} " id="dripCheck"> --}}
                        {{--                            <div class="primary_input mb-25 d-none"> --}}
                        {{--                                <label class="primary_input_label mt-1" --}}
                        {{--                                       for=""> {{__('common.Drip Content')}}</label> --}}
                        {{--                                <div class="row"> --}}
                        {{--                                    <div class="col-md-4 col-sm-6 mb-25"> --}}
                        {{--                                        <label class="primary_checkbox d-flex mr-12"> --}}
                        {{--                                            <input type="radio" class="drip0" --}}
                        {{--                                                   id="drip0" name="drip" --}}
                        {{--                                                   value="0" checked> --}}
                        {{--                                            <span class="checkmark mr-2"></span> {{__('common.No')}} --}}
                        {{--                                        </label> --}}
                        {{--                                    </div> --}}
                        {{--                                    <div class="col-md-4 col-sm-6 mb-25"> --}}
                        {{--                                        <label class="primary_checkbox d-flex mr-12"> --}}
                        {{--                                            <input type="radio" class=" drip1" --}}
                        {{--                                                   id="drip1" name="drip" --}}
                        {{--                                                   value="1"> --}}
                        {{--                                            <span class="checkmark mr-2"></span> {{__('common.Yes')}}</label> --}}
                        {{--                                    </div> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}


                        {{--                        </div> --}}

                        @if (Auth::user()->role_id != 2 && Auth::user()->role_id != 9)
                            <div class="col-xl-6 instructorBox">{{-- courseBox testPrepBox --}}
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label"
                                        for="assign_instructor">{{ __('courses.Assign Instructor') }} *</label>
                                    <select class="primary_select category_id" name="assign_instructor"
                                        id="assign_instructor" {{ $errors->has('assign_instructor') ? 'autofocus' : '' }}>
                                        <option data-display="{{ __('common.Select') }} {{ __('courses.Instructor') }}"
                                            value="">{{ __('common.Select') }} {{ __('courses.Instructor') }}
                                        </option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ @$instructor->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-xl-6">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="assign_instructor">{{ __('SELECT REVIEW') }}
                                </label>
                                <select class="primary_select" name="review" id="review">
                                    <option data-display="{{ __('common.Select') }} {{ __('Review') }}" value="">
                                        {{ __('common.Select') }}
                                        {{ __('Review') }} </option>
                                    @foreach ($reviews as $review)
                                        @if (empty(\App\Models\User::find($review->user_id)))
                                            @continue
                                        @endif
                                        @if (empty(\Modules\CourseSetting\Entities\Course::find($review->course_id)))
                                            @continue
                                        @endif
                                        <option value="{{ $review->id }}">
                                            {{ !empty($review->course()) ? $review->course()->title : '' }}
                                            {{ \Illuminate\Support\Str::limit($review->comment, 15) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 {{ $d_none }}">{{-- courseBox testPrepBox  $d_none --}}
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                    for="assistant_instructors">{{ __('courses.Assistant Instructor') }} </label>
                                <select name="assistant_instructors[]" id="assistant_instructors"
                                    class="multypol_check_select active mb-15 e1" multiple>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ @$instructor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 {{ $d_none }}">
                            <label>Featured</label>
                            <div class="d-flex py-3">
                                <label class="primary_checkbox d-flex nowrap mr-5" for="featuredYes">
                                <input type="radio" id="featuredYes"
                                    name="featured"
                                    value="1">
                                <span class="checkmark mr-2"></span>
                                {{ __('Yes') }}</label>
                                <label class="primary_checkbox d-flex nowrap mr-5" for="featuredNo">
                                <input type="radio" id="featuredNo"
                                    name="featured"
                                    value="0">
                                <span class="checkmark mr-2"></span>
                                {{ __('No') }}</label>
                            </div>
                        </div>
                    </div>


                    <div class="row pt-0">
                        @if (isModuleActive('FrontendMultiLang'))
                            <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                                @foreach ($LanguageList as $key => $language)
                                    <li class="nav-item">
                                        <a class="nav-link @if (auth()->user()->language_code == $language->code) active @endif"
                                            href="#element{{ $language->code }}" role="tab"
                                            data-toggle="tab">{{ $language->native }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="tab-content">
                        @foreach ($LanguageList as $key => $language)
                            <div role="tabpanel"
                                class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif"
                                id="element{{ $language->code }}">
                                <!-- <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('courses.Course Title') }} <small>(Max size
                                                                    30 Characters)</small> *</label>
                                                            <input class="primary_input_field"
                                                                name="{{ $language->code == 'en' ? 'title' : '' }}" placeholder="-"
                                                                id="addTitle" type="text"
                                                                {{ $errors->has('title') ? 'autofocus' : '' }} value=""
                                                                maxlength="30">
                                                        </div>
                                                    </div>
                                                </div> -->

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-35">
                                            <label class="primary_input_label" for="addAbout-en">
                                                {{ __('Description') }} *
                                            </label>
                                            <textarea class="custom_summernote" name="about[{{ $language->code }}]" id="addAbout-{{ $language->code }}"
                                                cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-35">
                                            <label class="primary_input_label" for="addOutcomes-en">
                                                {{ __('Outcomes') }} *
                                            </label>
                                            <textarea class="custom_summernote" name="outcomes[{{ $language->code }}]" id="addOutcomes-{{ $language->code }}"
                                                cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-35">
                                            <label class="primary_input_label" for="addRequirements-en">
                                                {{ __('Requirements') }} *
                                            </label>
                                            <textarea class="custom_summernote" name="requirements[{{ $language->code }}]"
                                                id="addRequirements-{{ $language->code }}" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @php
                        if (courseSetting()->show_mode_of_delivery == 1 || isModuleActive('Org')) {
                            $col_size = 4;
                        } elseif (currentTheme() == 'tvt') {
                            $col_size = 3;
                        } else {
                            $col_size = 6;
                        }
                    @endphp
                    <div class="row">

                        @if (currentTheme() == 'tvt')
                            <!-- {{ $col_size }}  -->
                            <div class="col-xl-6 mb_30">
                                <select class="primary_select school_subject_id" name="school_subject_id"
                                    id="school_subject_id" {{ $errors->has('category') ? 'autofocus' : '' }}>
                                    <option data-display="{{ __('common.Select') }} {{ __('courses.School Subject') }} *"
                                        value="">{{ __('common.Select') }} {{ __('courses.School Subject') }}
                                    </option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-xl-12 pricetextbox {{ Auth::user()->role_id == 9 ? 'd-block' : 'd-none' }}"
                            id="price_div">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('courses.Price') }}</label>
                                <input min="1" step="1" class="primary_input_field" name="price" placeholder="-" id="addPrice"
                                    type="number" accept="/^1[1-9]{9}$/" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="col-xl-6 courseBox mb_30">
                            <select class="primary_select category_id" name="category" id="category_id"
                                {{ $errors->has('category') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('quiz.Category') }} *"
                                    value="">{{ __('common.Select') }} {{ __('quiz.Category') }} </option>
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == 0)
                                        @include('backend.categories._single_select_option', [
                                            'category' => $category,
                                            'level' => 1,
                                        ])
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 courseBox mb_30" id="subCategoryDiv">
                            <select class="primary_select" name="sub_category" id="subcategory_id"
                                {{ $errors->has('sub_category') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('courses.Sub Category') }}  "
                                    value="">{{ __('common.Select') }} {{ __('courses.Sub Category') }}
                                </option>
                            </select>
                        </div>
                        @if (courseSetting()->show_mode_of_delivery == 1 || isModuleActive('Org'))
                            <div class="d-none col-xl-6 mt_60">
                                <select class="primary_select mode_of_delivery" name="mode_of_delivery" required>
                                    <option
                                        data-display="{{ __('common.Select') }} {{ __('courses.Mode of Delivery') }}*"
                                        value="">{{ __('common.Select') }} {{ __('courses.Mode of Delivery') }}*
                                    </option>
                                    <option value="1" selected>{{ __('courses.Online') }}</option>
                                    @if (!isModuleActive('Org'))
                                        <option value="2">{{ __('courses.Distance Learning') }}</option>
                                        <option value="3">{{ __('courses.Face-to-Face') }}</option>
                                    @else
                                        <option value="3">{{ __('courses.Offline') }}</option>
                                    @endif

                                </select>
                            </div>
                        @endif
                        <div class="col-xl-6 testPrepBox mt-30 d-none">
                            <select class="primary_select" name="quiz" id="quiz_id"
                                {{ $errors->has('quiz') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('Quiz') }} *" value="">
                                    {{ __('common.Select') }} {{ __('Quiz') }} </option>
                                @foreach ($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}">{{ @$quiz->title }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 timetableBox mt-30 d-none">
                            <select class="primary_select" name="timetable" id="timetableId"
                                {{ $errors->has('timetable') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('Time Table') }} *"
                                    value="">{{ __('common.Select') }} {{ __('Time Table') }} </option>
                                @foreach ($timetables as $timetable)
                                    <option value="{{ $timetable->id }}">{{ @$timetable->name }} </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- <div class="col-xl-6 mt-30 d-none">
                            <select class="primary_select" name="level">
                                <option data-display="{{ __('common.Select') }} {{ __('courses.Level') }} *"
                                    value="">{{ __('common.Select') }} {{ __('courses.Level') }}
                                </option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}"
                                        {{ old('level') == $level->id ? 'selected' : '' }}>
                                        {{ $level->title }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="col-xl-6 mt-30 d-none" id="">
                            <select class="primary_select mb-25" name="language" id=""
                                {{ $errors->has('language') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('common.Language') }} *"
                                    value="">{{ __('common.Select') }} {{ __('common.Language') }}</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}"
                                        {{ old('language') == $language->id ? 'selected' : '' }}
                                        {{ auth()->user()->language_id == $language->id ? 'selected' : '' }}>
                                        {{ $language->native }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <input type="hidden" name="language" value="19">
                        <div class="d-none col-xl-6" id="durationBox">
                            <div class="primary_input mb-25">

                                <input class="primary_input_field" name="duration"
                                    placeholder="{{ __('common.Duration') }} ({{ __('common.In Minute') }})"
                                    id="addDuration" min="0" step="any" type="number"
                                    value="{{ old('duration') }}" {{ $errors->has('duration') ? 'autofocus' : '' }}>
                            </div>
                        </div>
                        <div class="col-xl-6 d-none">
                            <div class="primary_input mb-25">

                                <div class="row pt-2">
                                    <div class="col-md-6 mb-25">
                                        <label class="primary_input_label mt-1" for="">
                                            {{ __('common.Complete course sequence') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-25">
                                        <label class="primary_checkbox d-flex mr-12">
                                            <input type="radio" class="complete_order0" id="complete_order0"
                                                name="complete_order" value="0" checked>
                                            <span class="checkmark mr-2"></span> {{ __('common.No') }}</label>
                                    </div>
                                    <div class="col-md-3 mb-25">
                                        <label class="primary_checkbox d-flex mr-12">
                                            <input type="radio" class="complete_order1" id="complete_order1"
                                                name="complete_order" value="1">
                                            <span class="checkmark mr-2"></span>{{ __('common.Yes') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-lg-6">
                            <div class="checkbox_wrap d-flex align-items-center">
                                <label for="course_1" class="switch_toggle mr-2">
                                    <input type="checkbox" id="course_1">
                                    <i class="slider round"></i>
                                </label>
                                <label class="mb-0">{{ __('courses.This course is a top course') }}</label>
                            </div>
                        </div>
                    </div>
                    @if (showEcommerce())
                        <div class="row">
                            <div class="col-lg-6 mb-25 d-none">
                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                    <label for="course_2" class="switch_toggle mr-2">
                                        <input type="checkbox" id="course_2" value="1" name="is_free">
                                        <i class="slider round"></i>
                                    </label>
                                    <label class="mb-0">{{ __('courses.This course is a free course') }}</label>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 d-none pricetextbox" id="price_div">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ __('courses.Price') }}</label>
                                    <input class="primary_input_field" name="price" placeholder="-" id="addPrice"
                                        type="text" accept="/^1[1-9]{9}$/" value="{{ old('price') }}">
                                </div>
                            </div> --}}
                        </div>
                        <div class="row d-none mt-20" id="discountDiv">
                            <div class="col-lg-6">
                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                    <label for="course_3" class="switch_toggle mr-2">
                                        <input type="checkbox" id="course_3" value="1" name="is_discount">
                                        <i class="slider round"></i>
                                    </label>
                                    <label class="mb-0">{{ __('courses.This course has discounted price') }}</label>
                                </div>
                            </div>
                            <div class="col-xl-4" id="discount_price_div" style="display: none">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ __('courses.Discount') }}
                                        {{ __('courses.Price') }}</label>
                                    <input min="1" step="1" class="primary_input_field" name="discount_price" placeholder="-"
                                        accept="/^1[1-9]{9}$/" id="addDiscount" type="text"
                                        value="{{ old('discount_price') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row d-none mt-20">
                            <div class="col-lg-6 mb-25">
                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                    <label for="iap" class="switch_toggle mr-2">
                                        <input type="checkbox" id="iap" value="1" name="iap">
                                        <i class="slider round"></i>
                                    </label>
                                    <label
                                        class="mb-0">{{ __('courses.This course is a In App purchase course') }}</label>
                                </div>
                            </div>
                            <div class="col-xl-6 d-none" id="iap_div">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label"
                                        for="">{{ __('courses.In App purchase product ID') }}</label>
                                    <input class="primary_input_field" name="iap_product_id" placeholder="-"
                                        id="" type="text" value="{{ old('iap_product_id') }}">
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--vvvvvvvvvvvvvvvvvvvvvv -->
                    <div class="row videoOption d-none mb-10 mt-20">
                        <div class="col-lg-6 d-none">
                            <div class="checkbox_wrap d-flex align-items-center mt-40">
                                <label for="show_overview_media" class="switch_toggle mr-2">
                                    <input type="checkbox" id="show_overview_media" value="1"
                                        name="show_overview_media">
                                    <i class="slider round"></i>
                                </label>
                                <label class="mb-0">{{ __('courses.Show Overview Video') }}</label>
                            </div>
                        </div>
                        <div class="col-xl-6 mt-25">
                            <select class="primary_select category_id" name="host" id="">
                                <option data-display="{{ __('courses.Course overview host') }} *" value="">
                                    {{ __('courses.Course overview host') }}
                                </option>
                                <option data-display="{{ __('courses.Image Preview') }}" value="ImagePreview"
                                    {{ @$course->host == 'ImagePreview' ? 'selected' : '' }}>
                                    {{ __('courses.Image Preview') }}
                                </option>

                                <option {{ @$course->host == 'Youtube' ? 'selected' : '' }} value="Youtube">
                                    {{ __('courses.Youtube') }}
                                </option>
                                <option value="VdoCipher" {{ @$course->host == 'VdoCipher' ? 'selected' : '' }}>
                                    VdoCipher
                                </option>

                                <option value="Vimeo" {{ @$course->host == 'Vimeo' ? 'selected' : '' }}>
                                    {{ __('courses.Vimeo') }}
                                </option>
                                @if (isModuleActive('AmazonS3'))
                                    <option value="AmazonS3" {{ @$course->host == 'AmazonS3' ? 'selected' : '' }}>
                                        {{ __('courses.Amazon S3') }}
                                    </option>
                                @endif

                                <option value="Self" {{ @$course->host == 'Self' ? 'selected' : '' }}>
                                    {{ __('courses.Self') }}
                                </option>


                            </select>
                        </div>
                    </div>

                    <div class="row videoOption mt-20" id="overview_host_section" style="display: none">

                        <div class="col-xl-8">
                            <div class="input-effect videoUrl"
                                style="display:@if ((isset($course) && @$course->host != 'Youtube') || !isset($course)) none @endif">
                                <label>{{ __('courses.Video URL') }}
                                    <span>*</span></label>
                                <input id=""
                                    class="primary_input_field youtubeVideo name{{ $errors->has('trailer_link') ? ' is-invalid' : '' }}"
                                    type="text" name="trailer_link" placeholder="{{ __('courses.Video URL') }}"
                                    autocomplete="off" value=""
                                    {{ $errors->has('trailer_link') ? 'autofocus' : '' }}>
                                <span class="focus-border"></span>
                                @if ($errors->has('trailer_link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trailer_link') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row vimeoUrl" id=""
                                style="display: @if ((isset($course) && @$course->host != 'Vimeo') || !isset($course)) none @endif">
                                <div class="col-lg-12" id="">
                                    <label class="primary_input_label"
                                        for="">{{ __('courses.Vimeo Video') }}</label>

                                    @if (config('vimeo.connections.main.upload_type') == 'Direct')
                                        <div class="primary_file_uploader">
                                            <input class="primary-input filePlaceholder" type="text" id=""
                                                class="upload-editor" {{ $errors->has('image') ? 'autofocus' : '' }}
                                                placeholder="{{ __('courses.Browse Video file') }}" readonly="">
                                            <input type="hidden" name="hidden_file" class="upload-editor-hidden-file">
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="document_file_thumb_vimeo_add">{{ __('common.Browse') }}</label>
                                                <input type="file" class="d-none fileUpload" name="vimeo"
                                                    id="document_file_thumb_vimeo_add">

                                            </button>

                                        </div>
                                    @else
                                        <select class="select2 vimeoVideo vimeoList" name="vimeo" id="">
                                            <option data-display="{{ __('common.Select') }} {{ __('courses.Video') }}"
                                                value="">{{ __('common.Select') }} {{ __('courses.Video') }}
                                            </option>
                                        </select>
                                    @endif
                                    @if ($errors->has('vimeo'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('vimeo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row VdoCipherUrl" style="display: @if ((isset($course) && $course->trailer_link != 'VdoCipher') || !isset($editLesson)) none @endif">
                                <div class="input-effect" id="">
                                    <div class="" id="">
                                        <label class="primary_input_label"
                                            for="">{{ __('courses.VdoCipher Video') }}</label>
                                        <select class="select2 vdocipherList" name="vdocipher" id="VdoCipherVideo">
                                            <option data-display="{{ __('common.Select') }} video " value="">
                                                {{ __('common.Select') }} video
                                            </option>
                                            @foreach ($vdocipher_list as $vdo)
                                                @if (isset($editLesson))
                                                    <option value="{{ @$vdo->id }}"
                                                        {{ $vdo->id == $editLesson->video_url ? 'selected' : '' }}>
                                                        {{ @$vdo->title }}</option>
                                                @else
                                                    <option value="{{ @$vdo->id }}">{{ @$vdo->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('vdocipher'))
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong>{{ $errors->first('vdocipher') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row videofileupload" id=""
                                style="display: @if ((isset($course) && (@$course->host == 'Vimeo' || @$course->host == 'Youtube')) || !isset($course)) none @endif">

                                <div class="col-xl-12">
                                    <div class="primary_input">
                                        <label class="primary_input_label"
                                            for="">{{ __('courses.Video File') }}</label>
                                        <div class="primary_file_uploader">
                                            <input type="file" class="filepond" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-none">
                        <div class="col-xl-4 mt-25">
                            <label>{{ __('courses.View Scope') }} </label>
                            <select class="primary_select" name="scope" id="">
                                <option value="1" {{ @$course->scope == '1' ? 'selected' : '' }}>
                                    {{ __('courses.Public') }}
                                </option>

                                <option {{ @$course->scope == '0' ? 'selected' : '' }} value="0">
                                    {{ __('courses.Private') }}
                                </option>

                            </select>

                        </div>
                    </div>
                    <div class="row mt-20">
                        <!-- ppppp -->
                        <div class="col-xl-5">
                            <label class="primary_input_label">
                                Thumbnail (Max Image Size 1MB, Recommended Dimensions: 1170X600)
                            </label>
                        </div>
                        <div class="col-xl-5">
                            <div class="primary_input mb-35">
                                <div class="primary_file_uploader" id="image_file-1">
                                    <input class="primary-input filePlaceholder" type="text" id="input-1"
                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="" required>
                                    <button onclick="destroyCropper1()" class="" type="button">
                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                            for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                        <input type="file" class="d-none fileUpload upload-editor-1"
                                            name="parent_course_image" id="document_file_thumb-1"
                                            accept=".jpg, .jpeg, .png, .gif">
                                        <input type="hidden" name="parent_course_thumbnail_image" id="cropper_img"
                                            class="upload-editor-hidden-file-1">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 text-center">
                            <img src="{{ asset('public/assets/course/image-375x500.png') }}"
                                class="preview image-editor-preview-img-1" id="image_preview-1" />
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::user()->subscription_api_status == 1)
                            <div class="col-xl-6">
                                <label class="primary_input_label"
                                    for="">{{ __('newsletter.Subscription List') }}
                                </label>
                                <select class="primary_select" name="subscription_list"
                                    {{ $errors->has('subscription_list') ? 'autofocus' : '' }}>
                                    <option
                                        data-display="{{ __('common.Select') }} {{ __('newsletter.Subscription List') }}"
                                        value="">{{ __('common.Select') }}
                                        {{ __('newsletter.Subscription List') }}

                                    </option>
                                    @foreach ($sub_lists as $list)
                                        <option value="{{ $list['id'] }}">
                                            {{ $list['name'] }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        @endif
                    </div>

                    @if (Settings('frontend_active_theme') == 'edume')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ __('courses.Key Point') }}
                                        (1)</label>
                                    <input class="primary_input_field" name="what_learn1" placeholder="-" type="text"
                                        value="{{ old('what_learn1') }}">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ __('courses.Key Point') }} (2)
                                    </label>
                                    <input class="primary_input_field" name="what_learn2" placeholder="-" type="text"
                                        value="{{ old('what_learn2') }}">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row d-none">
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                    for="">{{ __('courses.Meta keywords') }}</label>
                                <input class="primary_input_field" name="meta_keywords" placeholder="-" id="addMeta"
                                    type="text" value="{{ old('meta_keywords') }}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label"
                                    for="">{{ __('courses.Meta description') }}</label>
                                <textarea id="my-textarea" class="primary_input_field" id name="meta_description" style="height: 200px"
                                    rows="3">{{ old('meta_keywords') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pt_15 text-center">
                        <div class="d-flex justify-content-center">
                            {{-- <a class="primary-btn semi_large2 fix-gr-bg" href="javascript:void(0)"
                                onclick="course_add_form()" id="save_button_parent">
                                <i class="ti-check"></i>
                                {{ __('common.Add') }}
                            </a> --}}
                            <a class="primary-btn semi_large2 fix-gr-bg" href="javascript:void(0)"
                                onclick="course_add_form()"><i class="ti-check"></i> {{ __('common.Add') }}
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
    {{-- 1st Modal --}}
    <div class="modal fade admin-query" id="image-editor-modal-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop Course Image</h4>
                    <button type="button" class="close image-editor-cancel-button-1" onclick="destroyCropper1()">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                    <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in and
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

    {{-- 2nd Modal --}}

    <div class="modal fade admin-query" id="image-editor-modal-2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop Full Course Image</h4>
                    <button type="button" class="close image-editor-cancel-button-2" onclick="destroyCropper2()">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                    <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in and
                        Zoom
                        out</small>
                    <img id="image-editor-image-2" class="image-editor-preview-container-2 img-fluid"
                        src="https://avatars0.githubusercontent.com/u/3456749">
                    <div class="preview image-editor-preview image-editor-preview-container-2 ml-5"></div>
                    <div class="col-lg-22 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button onclick="destroyCropper2()" type="button"
                                class="primary-btn tr-bg image-editor-cancel-button-2"
                                id="">{{ __('common.Cancel') }}</button>
                            <a id="image-editor-save-button-2" onclick="saveCropImage2()"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('Save') }}</a>
                            <a id="image-editor-crop-2"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 3rd Modal --}}

    <div class="modal fade admin-query" id="image-editor-modal-3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop Prep-Course <small>(On-Demand)</small> Image</h4>
                    <button type="button" class="close image-editor-cancel-button-3" onclick="destroyCropper3()">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                    <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in and
                        Zoom
                        out</small>
                    <img id="image-editor-image-3" class="image-editor-preview-container-3 img-fluid"
                        src="https://avatars0.githubusercontent.com/u/3456749">
                    <div class="preview image-editor-preview image-editor-preview-container-3 ml-5"></div>
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button onclick="destroyCropper3()" type="button"
                                class="primary-btn tr-bg image-editor-cancel-button-3"
                                id="">{{ __('common.Cancel') }}</button>
                            <a id="image-editor-save-button-3" onclick="saveCropImage3()"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('Save') }}</a>
                            <a id="image-editor-crop-3"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4th Modal --}}

    <div class="modal fade admin-query" id="image-editor-modal-4">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop Prep-Course <small>(Live)</small> Image</h4>
                    <button type="button" class="close image-editor-cancel-button-4" onclick="destroyCropper4()">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                    <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in and
                        Zoom
                        out</small>
                    <img id="image-editor-image-4" class="image-editor-preview-container-4 img-fluid"
                        src="https://avatars0.githubusercontent.com/u/3456749">
                    <div class="preview image-editor-preview image-editor-preview-container-4 ml-5"></div>
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button onclick="destroyCropper4()" type="button"
                                class="primary-btn tr-bg image-editor-cancel-button-4"
                                id="">{{ __('common.Cancel') }}</button>
                            <a id="image-editor-save-button-4" onclick="saveCropImage4()"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('Save') }}</a>
                            <a id="image-editor-crop-4"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.partials.delete_modal')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.note-editable').eq(6).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addAbout-en').val(text)
                console.log(text, $('#addAbout-en').val());
            });
            $('.note-editable').eq(7).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addOutcomes-en').val(text)
                console.log(text, $('#addOutcomes-en').val());
            });
            $('.note-editable').eq(8).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addRequirements-en').val(text)
                console.log(text, $('#addRequirements-en').val());
            });
        });
    </script>
    <script>
        // Image Cropper Start
        $(document).ready(function() {
            var customFontFam = ['Arial', 'Helvetica', 'Cavolini', 'Jost', 'Impact', 'Tahoma', 'Verdana',
                'Garamond', 'Georgia', 'monospace', 'fantasy', 'Papyrus', 'Poppins'
            ];
            // Summer Note
            //CKEDITOR.replaceAll("custom_summernote");
            $('.custom_summernote').each(function (){
                var elId = $(this).attr('id');
                ClassicEditor
                .create( document.getElementById(elId),{
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload',['_token' => csrf_token()]) }}",
                    },
                    //extraPlugins: ['font'],
                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },
                    fontSize: {
                    options: [
                        'tiny',
                        'small',
                        'default',
                        'big',
                        'huge'
                    ]
                },
                fontColor: {
                    columns: 5,
                    documentColors: 10
                },
                fontBackgroundColor: {
                    columns: 5,
                    documentColors: 10
                },
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'heading',
                            '|', 'fontFamily', 'fontSize', 'fontColor', 'fontBackgroundColor',
                            '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                            '|', 'link', 'uploadImage', 'blockQuote', 'codeBlock',
                            '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
                        ],
                        shouldNotGroupWhenFull: false
                    }
                } )
                .then(editor => {
                    // Save the editor instance to use it later
                    window.editor = editor;

                    // Listen to the change:data event
                    editor.model.document.on('change:data', () => {
                        // Get the editor content
                        const editorData = editor.getData();
                        // Update the textarea with the editor content
                        // document.querySelector('#editor').value = editorData;
                        $(this).val(editorData);
                    });
                })
                .catch( error => {
                    console.error( error );
                });
            });
            

            // $('.custom_summernote').summernote({
            //     pastePlain: true,
            //     fontNames: customFontFam,
            //     fontNamesIgnoreCheck: ['Cavolini', 'Jost'],
            //     fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
            //     codeviewFilter: true,
            //     codeviewIframeFilter: true,
            //     toolbar: [
            //        // ['style', ['style']],
                    
            //         ['font', ['bold', 'underline', 'clear']],
            //         ['fontname', ['fontname']],
            //         ['fontsize', ['fontsize']],
            //         ['color', ['color']],
            //         ['para', ['style','ul', 'ol']],
            //         ['table', ['table']],
            //         ['insert', ['link', 'picture', 'video']],
            //         ['view', ['fullscreen','codeview']],
                    
            //     ],
            //     styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5'],
            //     callbacks: {
            //         onPaste: function (e) {
            //             var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            //             e.preventDefault();
            //             document.execCommand('insertText', false, bufferText);
            //         }
            //     },
            //     height: 188,
            //     tooltip: true
            // });

            // 1st Cropper
            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb-1").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (file.type.startsWith('image/')) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = this.width;
                            var image_height = this.height;
                            if (image_width == 1170 && image_height == 600) {
                                jQuery('#image-editor-modal-1').modal('show', {
                                    backdrop: 'static'
                                });
                            } else {
                                $('#input-1, #document_file_thumb-1').val('');
                                $("#image_preview-1").attr("src",
                                    "{{ asset('public/assets/course/image-375x500.png') }}");
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL1.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#input-1, #document_file_thumb-1').val('');
                            $("#image_preview-1").attr("src",
                                "{{ asset('public/assets/course/image-375x500.png') }}");
                        }, 500);
                        toastr.error('Please select a valid image file!', 'Error')
                    }
                }
            });
            $('.image-editor-cancel-button-1').on('click', function() {
                if ($('#image_preview-1').attr('src') != '' || $('#image_preview-1').attr('src') != null) {
                    $('#image_file-1').children().val('');
                }
                $('#image-editor-modal-1').trigger("reset");
                $('#image-editor-modal-1').modal('hide');
            });


            // 2nd Cropper

            var _URL2 = window.URL || window.webkitURL;
            $("#document_file_thumb-2").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (file.type.startsWith('image/')) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = this.width;
                            var image_height = this.height;
                            if (image_width == 1170 && image_height == 600) {
                                jQuery('#image-editor-modal-2').modal('show', {
                                    backdrop: 'static'
                                });
                            } else {
                                $('#input-2, #document_file_thumb-2').val('');
                                $("#image_preview-2").attr("src",
                                    "{{ asset('public/assets/course/image-375x500.png') }}");
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL2.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#input-2, #document_file_thumb-2').val('');
                            $("#image_preview-2").attr("src",
                                "{{ asset('public/assets/course/image-375x500.png') }}");
                        }, 500);
                        toastr.error('Please select a valid image file!', 'Error')
                    }
                }
            });
            $('.image-editor-cancel-button-2').on('click', function() {
                if ($('#image_preview-2').attr('src') != '' || $('#image_preview-2').attr('src') != null) {
                    $('#image_file-2').children().val('');
                }
                $('#image-editor-modal-2').trigger("reset");
                $('#image-editor-modal-2').modal('hide');
            });

            // 3rd Cropper
            var _URL3 = window.URL || window.webkitURL;
            $("#document_file_thumb-3").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (file.type.startsWith('image/')) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = this.width;
                            var image_height = this.height;
                            if (image_width == 1170 && image_height == 600) {
                                jQuery('#image-editor-modal-3').modal('show', {
                                    backdrop: 'static'
                                });
                            } else {
                                $('#input-3, #document_file_thumb-3').val('');
                                $("#image_preview-3").attr("src",
                                    "{{ asset('public/assets/course/image-375x500.png') }}");
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL3.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#input-3, #document_file_thumb-3').val('');
                            $("#image_preview-3").attr("src",
                                "{{ asset('public/assets/course/image-375x500.png') }}");
                        }, 500);
                        toastr.error('Please select a valid image file!', 'Error')
                    }
                }
            });
            $('.image-editor-cancel-button-3').on('click', function() {
                if ($('#image_preview-3').attr('src') != '' || $('#image_preview-3').attr('src') != null) {
                    $('#image_file-3').children().val('');
                }
                $('#image-editor-modal-3').trigger("reset");
                $('#image-editor-modal-3').modal('hide');
            });

            // 4th Cropper
            var _URL4 = window.URL || window.webkitURL;
            $("#document_file_thumb-4").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (file.type.startsWith('image/')) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = this.width;
                            var image_height = this.height;
                            if (image_width == 1170 && image_height == 600) {
                                jQuery('#image-editor-modal-4').modal('show', {
                                    backdrop: 'static'
                                });
                            } else {
                                $('#input-4, #document_file_thumb-4').val('');
                                $("#image_preview-4").attr("src",
                                    "{{ asset('public/assets/course/image-375x500.png') }}");
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL4.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#input-4, #document_file_thumb-4').val('');
                            $("#image_preview-4").attr("src",
                                "{{ asset('public/assets/course/image-375x500.png') }}");
                        }, 500);
                        toastr.error('Please select a valid image file!', 'Error')
                    }
                }
            });
            $('.image-editor-cancel-button-4').on('click', function() {
                if ($('#image_preview-4').attr('src') != '' || $('#image_preview-4').attr('src') != null) {
                    $('#image_file-4').children().val('');
                }
                $('#image-editor-modal-4').trigger("reset");
                $('#image-editor-modal-4').modal('hide');
            });


        });

        // Image Cropper End
        function course_add_form() {
            var form = document.getElementById('course_form');
            if (form.checkValidity()) {
                
            $('.preloader').show();
            var isAdmin = '{{ isAdmin() }}';
            var errors = [];
            isUnique({
                columns: [
                    ['courses', 'title', $('#addTitle').val()]
                ]
            }, function(res) {
                errors = [...res.errors]
                var type = $(".addType[name='type']:checked")
                    .val(); // 1 for course, 7 for timetable, 2 for big quiz

                if (isEmpty($('#addTitle').val())) {
                    errors.push('Course Title is required');
                }
                if (type == 1) {
                    if (isEmpty($('#total_courses').val())) {
                        errors.push("Total Classes is required");
                    }
                    if ($("#cna_prep_type_check:checked").val() == 1) {
                        if (isEmpty($('#document_file_thumb-2').val())) {
                            errors.push('Full Course Image is required!');
                        }
                    }
                    if ($("#test_prep_type_check:checked").val() == 1) {
                        if (isEmpty($('#test_prep_price').val())) {
                            errors.push("Prep-Course (on-demand) Price is required");
                        }
                        if (isEmpty($('#document_file_thumb-3').val())) {
                            errors.push("Prep-Course (on-demand) Image is required!");
                        }
                    }
                    if ($("#test_prep_graded_type_check:checked").val() == 1) {
                        if (isEmpty($('#document_file_thumb-4').val())) {
                            errors.push("Prep-Course (live) Image is required!");
                        }
                    }
                }

                // if (isAdmin == '1') {
                //     if (isEmpty($('#assign_instructor').val())) {
                //         errors.push("Instructor is required");
                //     }
                // }

                if (isEmptySummernote('#addAbout-en')) {
                    errors.push("Description is required");
                }
                if (isEmptySummernote('#addOutcomes-en')) {
                    errors.push("Outcomes is required");
                }
                if (isEmptySummernote('#addRequirements-en')) {
                    errors.push("Requirement is required");
                }

                if (type == 1) {
                    if (isEmpty($('#category_id').val())) {
                        errors.push("Category is required");
                    }
                }
                if (type == 2) {
                    if (isEmpty($('#quiz_id').val())) {
                        errors.push("Quiz is required");
                    }
                    if (isEmpty($('#addPrice').val())) {
                        errors.push("Price is required");
                    }
                }
                if (type == 7) {
                    if (isEmpty($('#timetableId').val())) {
                        errors.push("Timetable is required");
                    }
                    if (isEmpty($('#addPrice').val())) {
                        errors.push("Price is required");
                    }
                }
                if (isEmpty($('#document_file_thumb-1').val())) {
                    errors.push("Prep-Course Image is required");
                }

                if (errors.length) {
                    console.log(errors);
                    $('.preloader').hide();
                    $('input[type="submit"]').attr('disabled', false);
                    $.each(errors.reverse(), function(index, item) {
                        toastr.error(item, 'Error', 1000);
                    });
                    return false;
                }

                $('#course_form').submit();
            });
        }else{
            form.reportValidity();
        }

        }


        function showCnaPrepPrice() {
            if ($('.type2').is(':checked')) {
                $('#price_div').removeClass('d-none');
            } else {
                $('#price_div').addClass('d-none');
            }
            $('.cna_prep_type').toggleClass('d-none');
            let preview_2 = `{{ asset('public/assets/course/image-375x500.png') }}`;
            $('#image_preview-2').attr('src', preview_2);
            $('#cna_prep_price').val('');
            $('#document_file_thumb-2').val('');
            $('#input-2').val('');
            $('#cropper_img_2').val('');
        }

        function showPrepDemandPrice() {
            $('.test_prep_type').toggleClass('d-none');
            let preview_3 = `{{ asset('public/assets/course/image-375x500.png') }}`;
            $('#image_preview-3').attr('src', preview_3);
            $('#test_prep_price').val('');
            $('#document_file_thumb-3').val('');
            $('#input-3').val('');
            $('#cropper_img_3').val('');
        }

        function showPrepGradedPrice() {
            $('.test_prep_graded_type').toggleClass('d-none');
            let preview_4 = `{{ asset('public/assets/course/image-375x500.png') }}`;
            $('#image_preview-4').attr('src', preview_4);
            $('#test_prep_graded_price').val('');
            $('#document_file_thumb-4').val('');
            $('#input-4').val('');
            $('#cropper_img_4').val('');
        }
    </script>

    <script>
        let show_overview_media = $('#show_overview_media');
        let overview_host_section = $('#overview_host_section');
        show_overview_media.change(function() {
            if (show_overview_media.is(':checked')) {
                overview_host_section.show();
            } else {
                overview_host_section.hide();
            }
        });
    </script>
    <script>
        $('.toggle_course_testPrep').change(function() {
            if ($('.type2').is(':checked')) {
                $('#price_div').removeClass('d-none');
            } else {
                $('#price_div').addClass('d-none');
            }
        });

        let show_mode_of_delivery = $('#show_mode_of_delivery');
        let mode_of_delivery_options = $('#mode_of_delivery_options');
        show_mode_of_delivery.change(function() {
            if (show_mode_of_delivery.is(':checked')) {
                mode_of_delivery_options.show();
            } else {
                mode_of_delivery_options.hide();
            }
        });


        $('.mode_of_delivery').change(function() {
            let option = $(".mode_of_delivery option:selected").val();
            if (option == 3) {
                $('.testPrepBox').hide();
            } else {
                if ($('#type2').is(':checked')) {
                    $('.testPrepBox').show();
                }
            }
        });

        $('#iap').change(function() {
            if ($('#iap').is(':checked')) {
                $('#iap_div').removeClass('d-none');
            } else {
                $('#iap_div').addClass('d-none');
            }
        });
    </script>
@endpush
@push('scripts')
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>

    

    <script>
        let vdocipherList = $('.vdocipherList');

        vdocipherList.select2({
            ajax: {
                url: '{{ route('getAllVdocipherData') }}',
                type: "GET",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1,
                        // id: $('#country').find(':selected').val(),
                    }
                    return query;
                },
                cache: false
            }
        });

        $('.vimeoList').select2({
            ajax: {
                url: '{{ route('getAllVimeoData') }}',
                type: "GET",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        page: params.page || 1,
                    }
                },
                cache: false
            }
        });
    </script>
@endpush
