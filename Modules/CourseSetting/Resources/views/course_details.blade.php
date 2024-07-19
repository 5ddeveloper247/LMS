@extends('backend.master')

@push('styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('') }}"> --}}
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
        .custom_text{
            width: auto;
            text-overflow: ellipsis;
            overflow: hidden;
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

        .course_review_wrapper .course_cutomer_reviews .single_reviews {
            display: flex;
            /* border-bottom: 1px solid #e9e7f7; */
            padding-bottom: 30px;
            padding-top: 30px;
        }

        /* .course_review_wrapper .course_cutomer_reviews .single_reviews:last-child {
            padding-bottom: 37px;
            border: 0;
        } */

        @media (max-width: 767.98px) {
            .course_review_wrapper .course_cutomer_reviews .single_reviews {
                padding-bottom: 40px;
                margin-bottom: 40px;
            }

            .add-item-forms--inline-menu--1OTdc .curriculumn-btn {
                font-size: 13px !important;
            }
            .add-item-forms--inline-menu--1OTdc{
                padding: 8px 10px !important;
                height: auto !important;
            }
            .add-item-forms--inline-menu--1OTdc button{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
            }
        }

        @media (max-width: 575.98px) {
            .course_review_wrapper .course_cutomer_reviews .single_reviews {
                flex-direction: column;
            }
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {
            font-size: 20px;
            font-weight: 700;
            font-family: Source Sans Pro, sans-serif;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--system_primery_color);
            flex: 80px 0 0;
            margin-right: 40px;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            line-height: 80px;
            margin-bottom: 20px;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content h4 {
            margin-bottom: 0;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer {
            display: flex;
            align-items: center;
            margin: 7px 0 21px;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer .feedmak_stars {
            display: flex;
            align-items: center;
            margin: 0 15px 0 0;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer .feedmak_stars i {
            color: #ffc107;
            font-size: 15px;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer .feedmak_stars i:not(:last-child) {
            margin-right: 5px;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer span {
            font-size: 14px;
            font-weight: 500;
            color: #373737;
        }
    </style>
@endpush
@section('table')course_reveiws @stop
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
    @php
        $LanguageList = getLanguageList();
    @endphp
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area student-details">
        <div class="container-fluid p-0">
            <div class="row">
                @if ($course->type == 1)
                    <div class="col-lg-12">

                    </div>
                @endif
                <div class="col-md-12">
                    <div class="main-title">
                        <h3 class="">
                            {{ __('courses.Course') }} | {{ $course->title }}
                        </h3>
                    </div>

                    @if (Session::has('type'))
                        @php
                            $type = Session::get('type');
                        @endphp
                    @elseif (request()->get('type'))
                        @php
                            $type = request()->get('type');
                        @endphp
                    @else
                        @php
                            if ($course->type == 1) {
                                $type = 'courses';
                            } else {
                                $type = 'courseDetails';
                            }
                        @endphp
                    @endif

                    <div class="row pt-0">
                        <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                            @if ($course->type == 1 || $course->type == 9)
                                <li class="nav-item">
                                    <a class="nav-link @if ($type == 'courses') active @endif"
                                        href="#course_cirriculum" role="tab"
                                        data-toggle="tab">{{ __('courses.Course') }}
                                        {{ __('courses.Curriculum') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link @if ($type == 'courseDetails') active @endif"
                                        href="#course_details" role="tab" data-toggle="tab">{{ __('courses.Course') }}
                                        {{ __('common.Details') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link @if ($type == 'files') active @endif"
                                        href="#course_exercise" role="tab"
                                        data-toggle="tab">{{ __('courses.Exercise') }}
                                        {{ __('common.Files') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#course_reviews" role="tab"
                                        data-toggle="tab">{{ __('courses.Course') }}
                                        {{ __('Reviews') }}</a>
                                </li>
                                <li class="nav-item d-none">
                                    <a class="nav-link @if ($type == 'certificate') active @endif" href="#certificate"
                                        role="tab" data-toggle="tab">{{ __('certificate.Certificate') }}</a>
                                </li>
                                @if ($course->drip == 1)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($type == 'drip') active @endif" href="#drip"
                                            role="tab" data-toggle="tab"> {{ __('common.Drip Content') }}</a>
                                    </li>
                                @endif
                            @endif

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
                                        class="tab-pane fade @if ($type == 'courses') show active @endif"
                                        id="course_cirriculum">

                                        <div class="QA_section QA_section_heading_custom check_box_table">
                                            <div class="QA_table">
                                                <!-- table-responsive -->

                                                @if (count($chapters) == 0)
                                                    <div class="text-center">
                                                        {{ __('courses.No Data Found') }}
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">

                                                            {{-- Start Udemy Design --}}
                                                            <style>
                                                                .add-item-forms--inline-menu--1OTdc {
                                                                    margin-bottom: -25px;
                                                                    padding: 10px;
                                                                    border: 1px solid #9b34ef;
                                                                    background: #fff;
                                                                    height: 55px;
                                                                    display: flex;
                                                                    border-radius: 50px;
                                                                }

                                                                .section_content {
                                                                    margin-bottom: 0px;
                                                                    padding: 10px;
                                                                    border: 1px solid #9b34ef;
                                                                    background: #fff;
                                                                    border-radius: 50px;
                                                                }

                                                                .col-lg-10.section_content {
                                                                    margin-top: 50px;
                                                                }

                                                                .lms_option_box {
                                                                    box-sizing: border-box;
                                                                }

                                                                .lms_option_list {
                                                                    width: 650px;
                                                                }

                                                                .lms_option_list_inside {
                                                                    width: 650px;
                                                                }

                                                                .btn-block+.btn-block {
                                                                    margin-top: 0;
                                                                }

                                                                .section-white-box {
                                                                    background: #ffffff;
                                                                    padding: 40px 30px;
                                                                    border-radius: 50px;
                                                                    box-shadow: 0px 10px 15px rgb(236 208 244 / 30%);
                                                                    border-radius: 50px;
                                                                }
                                                                
                                                            </style>
                                                            <hr>
                                                            <div class="row d-flex">
                                                                <div class="col-lg-2">
                                                                    <button
                                                                        class="primary-btn icon-only fix-gr-bg align-items-center justify-content-center mr-10 p-0"
                                                                        id="add_option_box" style="display: flex"><i
                                                                            class="ti-plus m-0"></i></button>
                                                                    <button class="primary-btn icon-only fix-gr-bg mr-10"
                                                                        id="minus_option_box" style="display: none">X
                                                                    </button>
                                                                </div>
                                                                <div class="col-lg-10">
                                                                    <div class="lms_option_box d-flex">
                                                                        <div class="lms_option_list pb-30 w-100 pt-20"
                                                                            style="display: none">
                                                                            <div class="add-item-forms--inline-menu--1OTdc">
                                                                                <button data-purpose="add-chapter-btn"
                                                                                    aria-label="Add Chapter" type="button"
                                                                                    id="show_chapter_section"
                                                                                    class="ellipsis btn btn-tertiary btn-block curriculumn-btn">
                                                                                    <i class="ti-plus"></i>
                                                                                    {{ __('courses.Chapter') }}
                                                                                </button>
                                                                                <button data-purpose="add-lesson-btn"
                                                                                    aria-label="Add Lesson" type="button"
                                                                                    id="show_lesson_section"
                                                                                    class="ellipsis btn btn-tertiary btn-block curriculumn-btn">
                                                                                    <i class="ti-plus"></i>
                                                                                    {{ __('courses.Lesson') }}
                                                                                </button>
                                                                                <button data-purpose="add-quiz-btn"
                                                                                    aria-label="Add Quiz" type="button"
                                                                                    id="show_quiz_section"
                                                                                    class="ellipsis btn btn-tertiary btn-block curriculumn-btn">
                                                                                    <i class="ti-plus"></i>
                                                                                    {{ __('Add Exam') }}
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="chapter_section" style="display: none">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-10 section_content">
                                                                    @include('coursesetting::parts_of_course_details.chapter_section_add')
                                                                </div>
                                                                <div class="col-lg-1"></div>

                                                            </div>
                                                            <div class="row" id="lesson_section" style="display: none">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-10 section_content">
                                                                    @include('coursesetting::parts_of_course_details.lesson_section')
                                                                </div>
                                                                <div class="col-lg-1"></div>

                                                            </div>
                                                            <div class="row" id="quiz_section" style="display: none">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-10 section_content">
                                                                    @include('coursesetting::parts_of_course_details.quiz_section')
                                                                </div>
                                                                <div class="col-lg-1"></div>

                                                            </div>
                                                            <div class="row" style="display: none">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-10 section_content">

                                                                </div>
                                                                <div class="col-lg-1"></div>

                                                            </div>

                                                            {{-- START CHAPTER --}}

                                                            @include('coursesetting::parts_of_course_details.chapter_list')

                                                            {{-- END CHAPTER --}}
                                                            {{-- End Udemy Design --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                @push('js')
                                                    <script>
                                                        var lms_option_list = $('.lms_option_list');
                                                        var minus_option_box = $('#minus_option_box');
                                                        var add_option_box = $('#add_option_box');
                                                        var chapter_section = $('#chapter_section');
                                                        var lesson_section = $('#lesson_section');
                                                        var quiz_section = $('#quiz_section');
                                                        $(document).ready(function() {
                                                            let lms_option_list = $('#lms_option_list').hide();
                                                        })
                                                        $('#add_option_box').click(function() {
                                                            lms_option_list.show();
                                                            minus_option_box.show();
                                                            add_option_box.hide();
                                                        })
                                                        $('#minus_option_box').click(function() {
                                                            lms_option_list.hide();
                                                            minus_option_box.hide();
                                                            lesson_section.hide();
                                                            quiz_section.hide();
                                                            chapter_section.hide();
                                                            add_option_box.show();
                                                        })
                                                        $('#show_chapter_section').click(function() {
                                                            lms_option_list.hide();
                                                            lesson_section.hide();
                                                            quiz_section.hide();
                                                            chapter_section.show();
                                                        })
                                                        $('#show_lesson_section').click(function() {
                                                            lms_option_list.hide();
                                                            lesson_section.show();
                                                            quiz_section.hide();
                                                            chapter_section.hide();
                                                        })
                                                        $('#show_quiz_section').click(function() {
                                                            lms_option_list.hide();
                                                            lesson_section.hide();
                                                            quiz_section.show();
                                                            chapter_section.hide();
                                                        })
                                                    </script>
                                                @endpush
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel"
                                        class="tab-pane fade @if ($type == 'courseDetails') show active @endif"
                                        id="course_details">
                                        <div class="white_box_30px pl-0 pr-0 pt-0">
                                            <form action="{{ route('AdminUpdateCourse') }}" method="POST"
                                                enctype="multipart/form-data" id="course_form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="primary_input">
                                                            <div class="row toggle_course_testPrep">
                                                                <div class="col-md-12">
                                                                    <label class="primary_input_label" for="">
                                                                        {{ __('courses.Type') }} </label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                        onclick="removecol()">
                                                                        <input type="radio" class="addType"
                                                                            id="type{{ @$course->id }}1" name="type"
                                                                            value="{{ Auth::user()->role_id == 9 ? 9 : 1 }}"
                                                                            {{ @$course->type == 1 || @$course->type == 9 ? 'checked' : '' }}>
                                                                        <span
                                                                            class="checkmark mr-2"></span>{{ __('courses.Course') }}
                                                                    </label>
                                                                </div>

                                                                <div class="col-md-4 col-sm-4 mb-25 {{ $d_none }}">
                                                                    <label class="primary_checkbox d-flex nowrap mr-12"
                                                                        onclick="timecol()">
                                                                        <input type="radio" id="type2"
                                                                            class="type2 addType" name="type"
                                                                            value="7"
                                                                            {{ @$course->type == 7 ? 'checked' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('Time Table') }}</label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 mb-25 {{ $d_none }}">
                                                                    <label class="primary_checkbox d-flex nowrap mr-12"
                                                                        onclick="addcol()">
                                                                        <input type="radio" class="type2 addType"
                                                                            id="type{{ @$course->id }}2" name="type"
                                                                            value="2"
                                                                            {{ @$course->type == 2 ? 'checked' : '' }}
                                                                            {{ auth()->user()->role_id == 2 ? 'disabled' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('Big Quiz') }}
                                                                    </label>
                                                                </div>

                                                                <script>
                                                                    function addcol() {
                                                                        if ($('.type2').is(':checked')) {
                                                                            $('.change_state').prop('checked', false);
                                                                        }
                                                                        $('.courseBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.testPrepBox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.timetableBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.quizBox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.pricetextbox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.addnewdo').addClass('col-xl-12');
                                                                        $('.addnewdo').removeClass('col-xl-6');
                                                                        $('.cna_prep_type, .test_prep_type, .test_prep_graded_type').addClass('d-none');
                                                                    }

                                                                    function removecol() {
                                                                        $('.addnewdo').addClass('col-xl-6');
                                                                        $('.addnewdo').removeClass('col-xl-12');
                                                                        $('.pricetextbox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.timetableBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.testPrepBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.courseBox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.quizBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                    }

                                                                    function timecol() {
                                                                        if ($('.type2').is(':checked')) {
                                                                            $('.change_state').prop('checked', false);
                                                                        }
                                                                        $('.courseBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.testPrepBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.timetableBox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.pricetextbox').removeClass('d-none').addClass('d-block').css('display', 'block');
                                                                        $('.quizBox').addClass('d-none').removeClass('d-block').css('display', 'none');
                                                                        $('.addnewdo').addClass('col-xl-12');
                                                                        $('.addnewdo').removeClass('col-xl-6');
                                                                        $('.cna_prep_type, .test_prep_type, .test_prep_graded_type').addClass('d-none');
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @php
                                                        $cna_prep_price = \Modules\CourseSetting\Entities\Course::where(
                                                            'type',
                                                            4,
                                                        )
                                                            ->where('parent_id', $course->id)
                                                            ->first();
                                                    @endphp
                                                    @php
                                                        $test_prep_price = \Modules\CourseSetting\Entities\Course::where(
                                                            'type',
                                                            5,
                                                        )
                                                            ->where('parent_id', $course->id)
                                                            ->first();
                                                    @endphp
                                                    @php
                                                        $test_prep_graded_price = \Modules\CourseSetting\Entities\Course::where(
                                                            'type',
                                                            6,
                                                        )
                                                            ->where('parent_id', $course->id)
                                                            ->first();
                                                    @endphp

                                                    <div class="col-xl-6 courseBox">
                                                        <div class="primary_input {{ $d_none }}">
                                                            <div class="row toggle_course_testPrep">
                                                                <div class="col-md-12">
                                                                    <label class="primary_input_label" for="">
                                                                        {{ __('PREP-COURSE') }}</label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 mb-25">
                                                                    <label class="primary_checkbox d-flex nowrap mr-12">
                                                                        <input type="checkbox" name="cna_prep_type"
                                                                            id="cna_prep_type_check" value="1"
                                                                            onchange="showCnaPrepPrice()"
                                                                            class="change_state"
                                                                            {{ isset($cna_prep_price->thumbnail) ? 'checked' : '' }}>
                                                                        <span
                                                                            class="checkmark mr-2"></span>{{ __('Full Course') }}
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 mb-25">
                                                                    <label class="primary_checkbox d-flex nowrap mr-12">
                                                                        <input type="checkbox" name="test_prep_type"
                                                                            id="test_prep_type_check"
                                                                            onchange="showPrepDemandPrice()"
                                                                            value="1" class="change_state"
                                                                            {{ isset($test_prep_price->price) && $test_prep_price->price != '0.00' ? 'checked' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('Prep-Course') }} <br>
                                                                        {{ __('(on-demand)') }}
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 mb-25">
                                                                    <label class="primary_checkbox d-flex nowrap mr-12">
                                                                        <input type="checkbox"
                                                                            name="test_prep_graded_type"
                                                                            id="test_prep_graded_type_check"
                                                                            onchange="showPrepGradedPrice()"
                                                                            value="1" class="change_state"
                                                                            {{ isset($test_prep_graded_price->thumbnail) ? 'checked' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('Prep-Course ') }} <br> {{ __('(live)') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                    {{-- Prep Course --}}
                                                    {{-- <div id="cna_prep_type"
                                                        class="col-xl-4 {{ isset($cna_prep_price->price) && $cna_prep_price->price != '0.00' ? '' : 'd-none' }}">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Full Course Price') }}</label>
                                                            <input class="primary_input_field" name="cna_prep_price"
                                                                placeholder="-" type="text" accept="/^1[1-9]{9}$/"
                                                                value="{{ isset($cna_prep_price->price) && @$cna_prep_price->price != '0.00' ? @$cna_prep_price->price : null }}">
                                                        </div>
                                                    </div> --}}
                                                    {{-- @dd('working') --}}
                                                    {{-- <div
                                                        class="col-xl-3 {{ isset($cna_prep_price->featured) ? '' : 'd-none' }} cna_prep_type">
                                                        <label>Featured</label>
                                                        <label class="primary_checkbox d-flex nowrap mr-12" for="featuredYes">
                                                        <input type="radio" id="featuredYes"
                                                            name="featured"
                                                            value="1"
                                                            {{ @$cna_prep_price->featured == 1 ? 'checked' : '' }}>
                                                        <span class="checkmark mr-2"></span>
                                                        {{ __('Yes') }}</label>
                                                        <label class="primary_checkbox d-flex nowrap mr-12" for="featuredNo">
                                                        <input type="radio" id="featuredNo"
                                                            name="featured"
                                                            value="0"
                                                            {{ @$cna_prep_price->featured == 0 ? 'checked' : '' }}>
                                                        <span class="checkmark mr-2"></span>
                                                        {{ __('No') }}</label>
                                                    </div> --}}
                                                <div class="row align-items-center">
                                                    <div
                                                        class="col-xl-2 {{ isset($cna_prep_price->thumbnail) ? '' : 'd-none' }} full_course_image cna_prep_type text-center">
                                                            <div class="primary_input">
                                                            <p class="primary_input_label">Featured</p>
                                                            <label class="switch_toggle" for="cna_prep_price_checkbox">
                                                                <input type="checkbox" class="" id="cna_prep_price_checkbox" name="cna_prep_featured" @if($cna_prep_price && $cna_prep_price->featured == 1) checked @endif value="1">
                                                                <i class="slider round"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                        <div
                                                        class="col-xl-8 {{ isset($cna_prep_price->thumbnail) ? '' : 'd-none' }} full_course_image cna_prep_type">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                                            <div class="primary_file_uploader" id="image_file-2">

                                                                <input class="primary-input filePlaceholder"
                                                                    type="text" id="input-2"
                                                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                                                    placeholder="{{ __('courses.Browse Image file') }}"
                                                                    readonly=""
                                                                    data-imgtitle="{{ isset($cna_prep_price->thumbnail) ? showPicName($cna_prep_price->thumbnail) : '' }}"
                                                                    value="{{ isset($cna_prep_price->thumbnail) ? showPicName($cna_prep_price->thumbnail) : '' }}">
                                                                <button onclick="destroyCropper2()" class=""
                                                                    type="button">
                                                                    <label class="primary-btn small fix-gr-bg"
                                                                        id="avatar"
                                                                        for="document_file_thumb-2">{{ __('common.Browse') }}</label>
                                                                    <input type="file"
                                                                        class="d-none fileUpload upload-editor-2"
                                                                        name="full_course_main_image"
                                                                        accept=".jpg, .jpeg, .png, .gif"
                                                                        id="document_file_thumb-2">
                                                                    <input type="hidden"
                                                                        name="full_course_thumbnail_image"
                                                                        id="cropper_img"
                                                                        class="upload-editor-hidden-file-2">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-xl-2 {{ isset($cna_prep_price->thumbnail) ? '' : 'd-none' }} full_course_image cna_prep_type text-xl-center text-right">
                                                        <img src="{{ !empty($cna_prep_price->thumbnail) ? getCourseImage(@$cna_prep_price->thumbnail) : asset('public/assets/course/image-375x500.png') }}"
                                                            class="preview image-editor-preview-img-2"
                                                            id="image_preview-2" />
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    {{-- Prep Course (on-demand) --}}
                                                    <div id="test_prep_type"
                                                        class="col-xl-2 {{ isset($test_prep_price->price) && $test_prep_price->price != '0.00' ? '' : 'd-none' }} test_prep_type text-center">
                                                        <div class="primary_input">
                                                            <p class="primary_input_label">Featured</p>
                                                            <label class="switch_toggle" for="test_prep_price_checkbox">
                                                                <input type="checkbox" class="" id="test_prep_price_checkbox" name="test_prep_featured" @if($test_prep_price && $test_prep_price->featured == 1) checked @endif value="1">
                                                                <i class="slider round"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                        <div id="test_prep_type"
                                                        class="col-xl-3 {{ isset($test_prep_price->price) && $test_prep_price->price != '0.00' ? '' : 'd-none' }} test_prep_type">
                                                        <div class="primary_input mb-25 mb-md-0">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Prep-Course Price(on-demand)') }}</label>
                                                            <input class="primary_input_field" name="test_prep_price"
                                                                id="test_prep_price1" placeholder="-" type="text"
                                                                accept="/^1[1-9]{9}$/"
                                                                value="{{ isset($test_prep_price->price) && @$test_prep_price->price != '0.00' ? @$test_prep_price->price : null }}">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-5 prep_course_demand_image {{ isset($test_prep_price->price) && $test_prep_price->price != '0.00' ? '' : 'd-none' }} test_prep_type">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                                            <div class="primary_file_uploader" id="image_file-3">
                                                                <input class="primary-input filePlaceholder"
                                                                    type="text" id="input-3"
                                                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                                                    placeholder="{{ __('courses.Browse Image file') }}"
                                                                    readonly=""
                                                                    data-imgtitle="{{ showPicName(@$test_prep_price->thumbnail) }}"
                                                                    value="{{ showPicName(@$test_prep_price->thumbnail) }}">
                                                                <button onclick="destroyCropper3()" class=""
                                                                    type="button">
                                                                    <label class="primary-btn small fix-gr-bg"
                                                                        id="avatar"
                                                                        for="document_file_thumb-3">{{ __('common.Browse') }}</label>
                                                                    <input type="file"
                                                                        class="d-none fileUpload upload-editor-3"
                                                                        name="demand_course_main_image"
                                                                        accept=".jpg, .jpeg, .png, .gif"
                                                                        id="document_file_thumb-3">
                                                                    <input type="hidden"
                                                                        name="demand_course_thumbnail_image"
                                                                        id="cropper_img"
                                                                        class="upload-editor-hidden-file-3">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-xl-2 prep_course_demand_image {{ isset($test_prep_price->price) && $test_prep_price->price != '0.00' ? '' : 'd-none' }} test_prep_type text-xl-center text-right">
                                                        <img src="{{ isset($test_prep_price->thumbnail) ? getCourseImage(@$test_prep_price->thumbnail) : asset('public/assets/course/image-375x500.png') }}"
                                                            class="preview image-editor-preview-img-3"
                                                            id="image_preview-3" />
                                                    </div>
                                                </div>
                                                    {{-- Prep Course (Live) --}}
                                                    {{-- <div id="test_prep_graded_type"
                                                        class="col-xl-4 {{ isset($test_prep_graded_price->price) && $test_prep_graded_price->price != '0.00' ? '' : 'd-none' }}">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Prep-Course Price(Live)') }}</label>
                                                            <input class="primary_input_field"
                                                                name="test_prep_graded_price" placeholder="-"
                                                                type="text" accept="/^1[1-9]{9}$/"
                                                                value="{{ isset($test_prep_graded_price->price) && @$test_prep_graded_price->price != '0.00' ? @$test_prep_graded_price->price : null }}">
                                                        </div>
                                                    </div> --}}
                                                <div class="row align-items-center">
                                                    <div
                                                        class="col-xl-2 prep_course_live_image {{ isset($test_prep_graded_price->thumbnail) ? '' : 'd-none' }} test_prep_graded_type text-center">
                                                        <div class="primary_input">
                                                            <p class="primary_input_label">Featured</p>
                                                            <label class="switch_toggle" for="test_prep_graded_checkbox">
                                                                <input type="checkbox" class="" id="test_prep_graded_checkbox" name="test_prep_graded_featured" @if($test_prep_graded_price && $test_prep_graded_price->featured == 1) checked @endif value="1">
                                                                <i class="slider round"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-8 prep_course_live_image {{ isset($test_prep_graded_price->thumbnail) ? '' : 'd-none' }} test_prep_graded_type">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for="">{{ __('Image (RECOMMENDED DIMENSIONS: 1170X600)') }}</label>
                                                            <div class="primary_file_uploader" id="image_file-4">
                                                                <input class="primary-input filePlaceholder"
                                                                    type="text" id="input-4"
                                                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                                                    placeholder="{{ __('courses.Browse Image file') }}"
                                                                    readonly=""
                                                                    data-imgtitle="{{ isset($test_prep_graded_price->thumbnail) ? showPicName(@$test_prep_graded_price->thumbnail) : '' }}"
                                                                    value="{{ isset($test_prep_graded_price->thumbnail) ? showPicName(@$test_prep_graded_price->thumbnail) : '' }}">
                                                                <button onclick="destroyCropper4()" class=""
                                                                    type="button">
                                                                    <label class="primary-btn small fix-gr-bg"
                                                                        id="avatar"
                                                                        for="document_file_thumb-4">{{ __('common.Browse') }}</label>
                                                                    <input type="file"
                                                                        class="d-none fileUpload upload-editor-4"
                                                                        name="live_course_main_image"
                                                                        accept=".jpg, .jpeg, .png, .gif"
                                                                        id="document_file_thumb-4">
                                                                    <input type="hidden"
                                                                        name="live_course_thumbnail_image"
                                                                        id="cropper_img"
                                                                        class="upload-editor-hidden-file-4">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-xl-2 prep_course_live_image {{ isset($test_prep_graded_price->thumbnail) ? '' : 'd-none' }} test_prep_graded_type text-xl-center text-right">
                                                        <img src="{{ isset($test_prep_graded_price->thumbnail) ? getCourseImage(@$test_prep_graded_price->thumbnail) : asset('public/assets/course/image-375x500.png') }}"
                                                            class="preview image-editor-preview-img-4"
                                                            id="image_preview-4" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12" id="element_course">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label mt-1"
                                                                        for="">{{ __('Title') }}
                                                                        <small>(Max size
                                                                            30 Characters)</small> *</label>
                                                                    </label>
                                                                    <input class="primary_input_field" name="title"
                                                                        id="addTitle" value="{{ $course->title }}"
                                                                        placeholder="-" type="text" maxlength="30">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-xl-6 courseBox {{ $d_none }} {{ $course->type == 7 ? 'd-none' : '' }}">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="course_code">{{ __('Course Code') }}
                                                            </label>
                                                            <input type="text" name="course_code" id="course_code"
                                                                placeholder="-"
                                                                class="primary_input_field active mb-15 e1"
                                                                value="{{ $course->course_code ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-6 courseBox {{ $d_none }} {{ $course->type == 7 ? 'd-none' : '' }}">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="assistant_instructors">{{ __('Total Classes') }} *
                                                            </label>
                                                            <input type="number" name="total_courses" id="total_courses"
                                                                placeholder="-"
                                                                class="primary_input_field active mb-15 e1"
                                                                value="{{ $course->total_classes }}">
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
                                                                            {{ __('courses.Required Type') }}
                                                                            * </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6 mb-25">
                                                                        <label class="primary_checkbox d-flex mr-12">
                                                                            <input type="radio" id=""
                                                                                name="required_type" value="1"
                                                                                {{ $course->required_type == 1 ? 'checked' : '' }}>
                                                                            <span
                                                                                class="checkmark mr-2"></span>{{ __('courses.Compulsory') }}
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6 mb-25">
                                                                        <label class="primary_checkbox d-flex mr-12">
                                                                            <input type="radio" name="required_type"
                                                                                value="0"
                                                                                {{ $course->required_type == 0 ? 'checked' : '' }}>
                                                                            <span class="checkmark mr-2"></span>
                                                                            {{ __('courses.Open') }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="dripCheck"
                                                        @if ($course->type != 1) style="display: none" @endif>
                                                        <div class="primary_input mb-25 d-none">
                                                            <label class="primary_input_label mt-1" for="">
                                                                {{ __('common.Drip Content') }}</label>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                        for="drip{{ @$course->id }}0">
                                                                        <input type="radio" class="common-radio drip0"
                                                                            id="drip{{ @$course->id }}0" name="drip"
                                                                            value="0"
                                                                            {{ @$course->drip == 0 ? 'checked' : '' }}>

                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('common.No') }}
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                        for="drip{{ @$course->id }}1">
                                                                        <input type="radio" class="drip1"
                                                                            id="drip{{ @$course->id }}1" name="drip"
                                                                            value="1"
                                                                            {{ @$course->drip == 1 ? 'checked' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('common.Yes') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{--                                                        <div class="col-xl-12"> --}}
                                                        {{--                                                            <div class="primary_input mb-25"> --}}
                                                        {{--                                                                <label class="primary_input_label" --}}
                                                        {{--                                                                    for="assistant_instructors">{{ __('Total Classes') }} --}}
                                                        {{--                                                                </label> --}}
                                                        {{--                                                                <input type="number" name="total_courses" --}}
                                                        {{--                                                                    id="total_courses" placeholder="" --}}
                                                        {{--                                                                    value="{{ $course->total_classes }}" --}}
                                                        {{--                                                                    class="primary_input_field active mb-15 e1" multiple> --}}
                                                        {{--                                                            </div> --}}

                                                        {{--                                                        </div> --}}

                                                    </div>

                                                    @if (\Illuminate\Support\Facades\Auth::user()->role_id != 2 && \Illuminate\Support\Facades\Auth::user()->role_id != 9)
                                                        <div class="col-xl-6">{{-- $d_none --}} {{-- $course->type == 7 ? 'd-none' : '' --}}
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label"
                                                                    for="assign_instructor">{{ __('courses.Assign Instructor') }}
                                                                    *
                                                                </label>
                                                                <select class="primary_select category_id"
                                                                    name="assign_instructor" id="assign_instructor"
                                                                    {{ $errors->has('assign_instructor') ? 'autofocus' : '' }}>
                                                                    <option
                                                                        data-display="{{ __('common.Select') }} {{ __('courses.Instructor') }}"
                                                                        value="">{{ __('common.Select') }}
                                                                        {{ __('courses.Instructor') }} </option>
                                                                    @foreach ($instructors as $instructor)
                                                                        <option value="{{ $instructor->id }}"
                                                                            {{ $instructor->id == $course->user_id ? 'selected' : '' }}>
                                                                            {{ @$instructor->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="col-xl-6">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="review">{{ __('SELECT REVIEW') }}
                                                            </label>
                                                            <select class="primary_select" name="review" id="review">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('Review') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('Review') }} </option>
                                                                @foreach ($reviews as $review)
                                                                    @if (empty(\App\Models\User::find($review->user_id)))
                                                                        @continue
                                                                    @endif
                                                                    @if (empty(\Modules\CourseSetting\Entities\Course::find($review->course_id)))
                                                                        @continue
                                                                    @endif
                                                                    <option value="{{ $review->id }}"
                                                                        {{ $review->id == $course->review_id ? 'selected' : '' }}>
                                                                        {{ !empty($review->course()) ? $review->course()->title : '' }}
                                                                        {{ \Illuminate\Support\Str::limit($review->comment, 15) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">{{-- $d_none --}}
                                                        {{-- $course->type == 7 ? 'd-none' : '' --}}
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                for="assistant_instructors">{{ __('courses.Assistant Instructor') }}
                                                            </label>
                                                            <select name="assistant_instructors[]"
                                                                id="assistant_instructors"
                                                                class="multypol_check_select active mb-15 e1" multiple>
                                                                @foreach ($instructors as $instructor)
                                                                    <option value="{{ $instructor->id }}"
                                                                        {{ !empty($course->assistantInstructorsIds) && in_array($instructor->id, $course->assistantInstructorsIds) ? 'selected' : '' }}>
                                                                        {{ @$instructor->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-xl-6">
                                                        <label>Featured</label>
                                                        <div class="d-flex py-3">
                                                            <label class="primary_checkbox d-flex nowrap mr-5"
                                                                for="featuredYes">
                                                                <input type="radio" id="featuredYes" name="featured"
                                                                    value="1"
                                                                    {{ @$course->featured == 1 ? 'checked' : '' }}>
                                                                <span class="checkmark mr-2"></span>
                                                                {{ __('Yes') }}</label>
                                                            <label class="primary_checkbox d-flex nowrap mr-5"
                                                                for="featuredNo">
                                                                <input type="radio" id="featuredNo" name="featured"
                                                                    value="0"
                                                                    {{ @$course->featured == 0 ? 'checked' : '' }}>
                                                                <span class="checkmark mr-2"></span>
                                                                {{ __('No') }}</label>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <input type="hidden" name="id" class="course_id"
                                                    value="{{ @$course->id }}">
                                                <div class="col-xl-12 p-0">
                                                    <div class="row pt-0">
                                                        @if (isModuleActive('FrontendMultiLang'))
                                                            <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3"
                                                                role="tablist">
                                                                @foreach ($LanguageList as $key => $language)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link @if (auth()->user()->language_code == $language->code) active @endif"
                                                                            href="#element_course{{ $language->code }}"
                                                                            role="tab"
                                                                            data-toggle="tab">{{ $language->native }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>

                                                    <div class="tab-content">
                                                        @foreach ($LanguageList as $key => $language)
                                                            <div role="tabpanel"
                                                                class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif"
                                                                id="element_course{{ $language->code }}">
                                                                <div class="row">

                                                                    <!-- <div class="col-xl-12">
                                                                                                                                                                                                                                        <div class="primary_input mb-25">
                                                                                                                                                                                                                                            <label class="primary_input_label mt-1"
                                                                                                                                                                                                                                                   for="">{{ __('courses.Course Title') }}
                                                                                                                                                                                                                                    <small>(Max size
                                                                                                                                                                                                                                        30 Characters)</small> *</label>
                                                                                                                                                                                                                                </label>
                                                                                                                                                                                                                                <input class="primary_input_field"
                                                                                                                                                                                                                                       name="{{ $language->code == 'en' ? 'title' : '' }}"
                                                                                                                                                                                                                                                   value="{{ $course->getTranslation('title', $language->code) }}"
                                                                                                                                                                                                                                                   placeholder="-" type="text"
                                                                                                                                                                                                                                                   maxlength="30">
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                    </div> -->
                                                                    {{-- @dd($language->code, $LanguageList, $course) --}}
                                                                    <div class="col-xl-12">
                                                                        <div class="primary_input mb-35">
                                                                            <label class="primary_input_label mt-1"
                                                                                for="addAbout-en">
                                                                                {{ __('Description') }} *
                                                                            </label>
                                                                            <textarea class="custom_summernote" name="about[{{ $language->code }}]" id="addAbout-{{ $language->code }}"
                                                                                cols="30" rows="10">{!! @$course->getTranslation('about', $language->code) !!}</textarea>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <div class="primary_input mb-35">
                                                                            <label class="primary_input_label"
                                                                                for="addOutcomes-en">
                                                                                {{ __('Outcomes') }} *
                                                                            </label>
                                                                            <textarea class="custom_summernote" name="outcomes[{{ $language->code }}]" id="addOutcomes-{{ $language->code }}"
                                                                                cols="30" rows="10">{!! $course->outcomes !!}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-12">
                                                                        <div class="primary_input mb-35">
                                                                            <label class="primary_input_label"
                                                                                for="addRequirements-en">
                                                                                {{ __('Requirements') }} *
                                                                            </label>
                                                                            <textarea class="custom_summernote" name="requirements[{{ $language->code }}]"
                                                                                id="addRequirements-{{ $language->code }}" cols="30" rows="10">{!! @$course->getTranslation('requirements', $language->code) !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="row">
                                                        @php
                                                            if (
                                                                courseSetting()->show_mode_of_delivery == 1 ||
                                                                isModuleActive('Org')
                                                            ) {
                                                                $col_size = 4;
                                                            } elseif (currentTheme() == 'tvt') {
                                                                $col_size = 3;
                                                            } else {
                                                                $col_size = 6;
                                                            }
                                                        @endphp

                                                        @if (currentTheme() == 'tvt')
                                                            <div
                                                                class="col-xl-{{ $col_size }} mb_30 {{ $d_none }}">
                                                                <select class="primary_select school_subject_id"
                                                                    name="school_subject_id" id="school_subject_id"
                                                                    {{ $errors->has('school_subject_id') ? 'autofocus' : '' }}>
                                                                    <option
                                                                        data-display="{{ __('common.Select') }} {{ __('courses.School Subject') }} *"
                                                                        value="">{{ __('common.Select') }}
                                                                        {{ __('courses.School Subject') }} </option>
                                                                    @if (isset($subjects))
                                                                        @foreach ($subjects as $subject)
                                                                            <option
                                                                                {{ $course->school_subject_id == $subject->id ? 'selected' : '' }}
                                                                                value="{{ $subject->id }}">
                                                                                {{ $subject->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        @endif

                                                        <div class="col-xl-6 courseBox mb-25">
                                                            <select class="primary_select" name="category"
                                                                id="course_cat_id">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('quiz.Category') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('quiz.Category') }} </option>
                                                                @php
                                                                    request()->replace([
                                                                        'category' => $course->category_id,
                                                                    ]);
                                                                @endphp
                                                                @foreach ($categories as $category)
                                                                    @if ($category->parent_id == 0)
                                                                        @include(
                                                                            'backend.categories._single_select_option',
                                                                            [
                                                                                'category' => $category,
                                                                                'level' => 1,
                                                                            ]
                                                                        )
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-xl-6 courseBox mb-25" id="subCatDiv">
                                                            <select class="primary_select" name="sub_category"
                                                                id="subcat_id">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('courses.Sub Category') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('courses.Sub Category') }}
                                                                </option>
                                                                <option value="{{ @$course->subcategory_id }}" selected>
                                                                    {{ @$course->subCategory->name }}</option>
                                                                @if (isset($course->category->subcategories))
                                                                    @foreach ($course->category->subcategories as $sub)
                                                                        @if ($course->subcategory_id != $sub->id)
                                                                            <option value="{{ @$sub->id }}">
                                                                                {{ @$sub->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if (courseSetting()->show_mode_of_delivery == 1 || isModuleActive('Org'))
                                                            <div class="d-none col-xl-{{ $col_size }} mb-25">
                                                                <select class="primary_select mode_of_delivery"
                                                                    name="mode_of_delivery">
                                                                    <option
                                                                        data-display="{{ __('common.Select') }} {{ __('courses.Mode of Delivery') }}*"
                                                                        value="">{{ __('common.Select') }}
                                                                        {{ __('courses.Mode of Delivery') }}
                                                                        *
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $course->mode_of_delivery == 1 ? 'selected' : '' }}>
                                                                        {{ __('courses.Online') }}</option>

                                                                    @if (!isModuleActive('Org'))
                                                                        <option value="2"
                                                                            {{ $course->mode_of_delivery == 2 ? 'selected' : '' }}>
                                                                            {{ __('courses.Distance Learning') }}</option>
                                                                        <option value="3"
                                                                            {{ $course->mode_of_delivery == 3 ? 'selected' : '' }}>
                                                                            {{ __('courses.Face-to-Face') }}</option>
                                                                    @else
                                                                        <option value="3"
                                                                            {{ $course->mode_of_delivery == 3 ? 'selected' : '' }}>
                                                                            {{ __('courses.Offline') }}</option>
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        @endif
                                                        <div class="col-xl-12 pricetextbox {{ $course->type == 2 || $course->type == 7 || $course->type == 9 ? '' : 'd-none' }}"
                                                            id="edit_price_div">
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label mt-1"
                                                                    for="">{{ __('courses.Price') }}</label>
                                                                <input accept="/^1[1-9]{9}$/" class="primary_input_field"
                                                                    name="price" id="addPrice" placeholder="-"
                                                                    value="{{ @$course->price }}" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 quizBox mb-25" style=" display: none">
                                                            <select class="primary_select" name="quiz" id="quiz_id">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('Quiz') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('Quiz') }} </option>
                                                                @foreach ($quizzes as $quiz)
                                                                    <option value="{{ $quiz->id }}"
                                                                        @if ($quiz->id == $course->quiz_id) selected @endif>
                                                                        {{ @$quiz->title }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{-- @dd($data, $editLesson, $levels, $video_list, $vdocipher_list, $course, $chapters, $categories, $instructors, $languages, $course_exercises, $quizzes, $certificates) --}}
                                                        <div
                                                            class="col-xl-6 timetableBox mt-30 {{ $course->type == 7 ? '' : 'd-none' }}">
                                                            <select class="primary_select" name="timetable"
                                                                id="timetableId"
                                                                {{ $errors->has('timetable') ? 'autofocus' : '' }}>
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('Time Table') }} *"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('Time Table') }} </option>
                                                                @foreach ($timetables as $timetable)
                                                                    <option
                                                                        @if ($timetable->id == $course->time_table_id) selected @endif
                                                                        value="{{ $timetable->id }}">
                                                                        {{ @$timetable->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col-xl-4 responsiveResize2 makeResize d-none">
                                                            <select class="primary_select" name="level">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('courses.Level') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('courses.Level') }}</option>
                                                                @foreach ($levels as $level)
                                                                    <option value="{{ $level->id }}"
                                                                        @if (@$course->level == $level->id) selected @endif>
                                                                        {{ $level->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        {{-- <div class="col-xl-4 makeResize responsiveResize d-none" id="">
                                                            <select class="primary_select" name="language"
                                                                id="">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('courses.Language') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('courses.Language') }}</option>
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}"
                                                                        @if ($language->id == $course->lang_id) selected @endif>
                                                                        {{ $language->native }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        <input type="hidden" name="language" value="19">
                                                        <div class="d-none col-xl-4 makeResize responsiveResize mb-25">
                                                            <div class="primary_input">
                                                                <input class="primary_input_field" name="duration"
                                                                    placeholder="{{ __('common.Duration') }}   ({{ __('common.In Minute') }})"
                                                                    min="0" step="any" type="number"
                                                                    value="{{ @$course->duration }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 mb-25 d-none"><!-- courseBox -->
                                                        <div class="primary_input">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="primary_input_label mt-1"
                                                                        for="">
                                                                        {{ __('common.Complete course sequence') }}</label>
                                                                </div>
                                                                <div class="col-md-3 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                        for="complete_order0">
                                                                        <input type="radio"
                                                                            class="common-radio complete_order0"
                                                                            id="complete_order0" name="complete_order"
                                                                            value="0"
                                                                            {{ @$course->complete_order == 0 ? 'checked' : '' }}>
                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('common.No') }}
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-3 mb-25">

                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                        for="complete_order1">
                                                                        <input type="radio"
                                                                            class="common-radio complete_order1"
                                                                            id="complete_order1" name="complete_order"
                                                                            value="1"
                                                                            {{ @$course->complete_order == 1 ? 'checked' : '' }}>


                                                                        <span class="checkmark mr-2"></span>
                                                                        {{ __('common.Yes') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-none">
                                                        <div class="col-lg-6">
                                                            <div class="checkbox_wrap d-flex align-items-center">
                                                                <label for="course_1" class="switch_toggle mr-2">
                                                                    <input type="checkbox" name="isFree" value="1"
                                                                        id="edit_course_1">
                                                                    <i class="slider round"></i>
                                                                </label>
                                                                <label
                                                                    class="mb-0">{{ __('courses.This course is a top course') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (showEcommerce())
                                                        <div class="row mt-20">
                                                            <div class="col-lg-6 d-none">
                                                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                                                    <label for="edit_course_2{{ $course->id }}"
                                                                        class="switch_toggle mr-2">
                                                                        <input type="checkbox" class="edit_course_2"
                                                                            id="edit_course_2{{ $course->id }}"
                                                                            name="is_free"
                                                                            @if ($course->price == 0) checked @endif
                                                                            value="1">
                                                                        {{-- <input type="checkbox" class="edit_course_2" id="edit_course_2" name="is_free" @if ($course->price == 0) checked @endif value="1"> --}}
                                                                        <i class="slider round"></i>
                                                                    </label>
                                                                    <label
                                                                        class="mb-0">{{ __('courses.This course is a free course') }}</label>
                                                                </div>
                                                            </div>
                                                            {{-- @php
                                                                dd($course->type);
                                                            @endphp --}}

                                                        </div>
                                                        <div class="row editDiscountDiv d-none mt-20">
                                                            <div class="col-lg-6">
                                                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                                                    <label for="edit_course_3" class="switch_toggle mr-2">
                                                                        <input type="checkbox" class="edit_course_3"
                                                                            name="is_discount"
                                                                            @if ($course->discount_price > 0) checked @endif
                                                                            id="edit_course_3" value="1">
                                                                        <i class="slider round"></i>
                                                                    </label>
                                                                    <label
                                                                        class="mb-0">{{ __('courses.This course has discounted price') }}</label>
                                                                </div>
                                                            </div>
                                                            @php
                                                                if ($course->discount_price > 0) {
                                                                    $d_price = 'block';
                                                                } else {
                                                                    $d_price = 'none';
                                                                }
                                                            @endphp
                                                            <div class="col-xl-6" id="edit_discount_price_div"
                                                                style="display: {{ $d_price }}">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label mt-1"
                                                                        for="">{{ __('courses.Discount') }}
                                                                        {{ __('courses.Price') }}</label>
                                                                    <input class="primary_input_field editDiscount"
                                                                        name="discount_price" accept="/^1[1-9]{9}$/"
                                                                        value="{{ @$course->discount_price }}"
                                                                        placeholder="-" type="text">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row d-none mt-20">
                                                            <div class="col-lg-6 mb-25">
                                                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                                                    <label for="iap" class="switch_toggle mr-2">
                                                                        <input type="checkbox" id="iap"
                                                                            value="1" name="iap"
                                                                            {{ !empty($course->iap_product_id) ? 'checked' : '' }}>
                                                                        <i class="slider round"></i>
                                                                    </label>
                                                                    <label
                                                                        class="mb-0">{{ __('courses.This course is a In App purchase course') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 {{ !empty($course->iap_product_id) ? '' : 'd-none' }}"
                                                                id="iap_div">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label"
                                                                        for="">{{ __('courses.In App purchase product ID') }}</label>
                                                                    <input class="primary_input_field"
                                                                        name="iap_product_id" placeholder="-"
                                                                        id="" type="text"
                                                                        value="{{ old('iap_product_id', $course->iap_product_id) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="videoOption d-none">{{-- $d_none --}}
                                                        <div class="row mb-10 mt-20">
                                                            <div class="col-lg-6 d-none">
                                                                <div class="checkbox_wrap d-flex align-items-center mt-40">
                                                                    <label for="show_overview_media"
                                                                        class="switch_toggle mr-2">
                                                                        <input type="checkbox" id="show_overview_media"
                                                                            value="1"
                                                                            {{ $course->show_overview_media == 1 ? 'checked' : '' }}
                                                                            name="show_overview_media">
                                                                        <i class="slider round"></i>
                                                                    </label>
                                                                    <label
                                                                        class="mb-0">{{ __('courses.Show Overview Video') }}</label>
                                                                </div>
                                                            </div>
                                                            {{-- </div> --}}
                                                            @push('js')
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
                                                            @endpush
                                                            {{-- <div class="row mt-20" id="overview_host_section"
                                                            style="display: {{ $course->type == 2 || $course->show_overview_media == 0 ? 'none' : '' }}"> --}}

                                                            <div class="col-xl-6 mb-25" id="overview_host_section"
                                                                style="display: {{ $course->type == 2 || $course->show_overview_media == 0 ? 'none' : '' }}">

                                                                <select class="primary_select category_id" data-key="12"
                                                                    name="host" id="category_id12">
                                                                    <option value=""
                                                                        data-display="{{ __('common.Select') }} {{ __('courses.Host') }}">
                                                                        {{ __('common.Select') }}
                                                                        {{ __('courses.Host') }}</option>

                                                                    <option
                                                                        data-display="{{ __('courses.Image Preview') }}"
                                                                        value="ImagePreview"
                                                                        {{ @$course->host == 'ImagePreview' ? 'selected' : '' }}>
                                                                        {{ __('courses.Image Preview') }}
                                                                    </option>

                                                                    <option value="Youtube"
                                                                        @if (@$course->host == 'Youtube') Selected @endif
                                                                        @if (empty(@$course) && @$course->host == 'Youtube') selected @endif>
                                                                        Youtube
                                                                    </option>
                                                                    <option value="Vimeo"
                                                                        @if (@$course->host == 'Vimeo') Selected @endif
                                                                        @if (empty(@$course) && @$course->host == 'Vimeo') selected @endif>
                                                                        Vimeo
                                                                    </option>
                                                                    <option value="VdoCipher"
                                                                        @if (@$course->host == 'VdoCipher') Selected @endif
                                                                        @if (empty(@$course) && @$course->host == 'VdoCipher') selected @endif>
                                                                        VdoCipher
                                                                    </option>
                                                                    <option value="Self"
                                                                        @if (@$course->host == 'Self') Selected @endif
                                                                        @if (empty(@$course) && @$course->host == 'Self') selected @endif>
                                                                        Self
                                                                    </option>


                                                                    @if (isModuleActive('AmazonS3'))
                                                                        <option value="AmazonS3"
                                                                            @if (@$course->host == 'AmazonS3') Selected @endif
                                                                            @if (empty(@$course) && @$course->host == 'AmazonS3') selected @endif>
                                                                            Amazon S3
                                                                        </option>
                                                                    @endif
                                                                    @if (isModuleActive('SCORM'))
                                                                        <option value="SCORM"
                                                                            @if (empty(@$course) && @$course->host == 'SCORM') selected @endif>
                                                                            SCORM Self
                                                                        </option>
                                                                    @endif

                                                                    @if (isModuleActive('AmazonS3') && isModuleActive('SCORM'))
                                                                        <option value="SCORM-AwsS3"
                                                                            @if (empty(@$course) && @$course->host == 'SCORM-AwsS3') selected @endif>
                                                                            SCORM AWS S3
                                                                        </option>
                                                                    @endif

                                                                    @if (isModuleActive('XAPI'))
                                                                        <option value="XAPI"
                                                                            @if (empty(@$editLesson) == 'XAPI') selected @endif>
                                                                            XAPI Self
                                                                        </option>
                                                                    @endif

                                                                    @if (isModuleActive('AmazonS3') && isModuleActive('XAPI'))
                                                                        <option value="XAPI-AwsS3"
                                                                            @if (empty(@$editLesson) == 'XAPI-AwsS3') selected @endif>
                                                                            XAPI AWS S3
                                                                        </option>
                                                                    @endif
                                                                </select>

                                                            </div>
                                                            @push('js')
                                                                <script>
                                                                    $('.category_id').change(function() {
                                                                        var key = $(this).data('key');
                                                                        let category_id = $('#category_id' + key).find(":selected").val();

                                                                        if (category_id === 'Youtube' || category_id === 'URL') {
                                                                            $("#iframeBox" + key).hide();
                                                                            $("#videoUrl" + key).show();
                                                                            $("#vimeoUrl" + key).hide();
                                                                            $("#VdoCipherUrl" + key).hide();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#fileupload" + key).hide();

                                                                        } else if ((category_id === 'Self') || (category_id === 'Zip') || (category_id === 'GoogleDrive') || (
                                                                                category_id === 'PowerPoint') || (category_id === 'Excel') || (category_id === 'Text') || (
                                                                                category_id === 'Word') || (category_id === 'PDF') || (category_id === 'Image') || (
                                                                                category_id === 'AmazonS3') || (category_id === 'SCORM') || (category_id === 'SCORM-AwsS3') || (
                                                                                category_id === 'XAPI') || (category_id === 'XAPI-AwsS3')) {

                                                                            $("#iframeBox" + key).hide();
                                                                            $("#fileupload" + key).show();
                                                                            $("#videoUrl" + key).hide();
                                                                            $("#vimeoUrl" + key).hide();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#VdoCipherUrl" + key).hide();

                                                                        } else if (category_id === 'Vimeo') {
                                                                            $("#iframeBox" + key).hide();
                                                                            $("#videoUrl" + key).hide();
                                                                            $("#vimeoUrl" + key).show();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#fileupload" + key).hide();
                                                                            $("#VdoCipherUrl" + key).hide();
                                                                        } else if (category_id === 'VdoCipher') {
                                                                            $("#iframeBox" + key).hide();
                                                                            $("#videoUrl" + key).hide();
                                                                            $("#vimeoUrl" + key).hide();
                                                                            $("#VdoCipherUrl" + key).show();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#fileupload" + key).hide();
                                                                        } else if (category_id === 'Iframe') {
                                                                            $("#iframeBox" + key).show();
                                                                            $("#videoUrl" + key).hide();
                                                                            $("#vimeoUrl" + key).hide();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#fileupload" + key).hide();
                                                                            $("#VdoCipherUrl" + key).hide();
                                                                        } else {
                                                                            $("#iframeBox" + key).hide();
                                                                            $("#videoUrl" + key).hide();
                                                                            $("#vimeoUrl" + key).hide();
                                                                            $("#vimeoVideo" + key).val('');
                                                                            $("#youtubeVideo" + key).val('');
                                                                            $("#fileupload" + key).hide();
                                                                            $("#VdoCipherUrl" + key).hide();
                                                                        }

                                                                    });
                                                                </script>
                                                            @endpush
                                                            <div class="col-xl-6">


                                                                <div class="input-effect" id="videoUrl12"
                                                                    style="display:@if ((isset($course) && $course->host != 'Youtube') || !isset($course)) none @endif">

                                                                    <input class="primary_input_field" name="trailer_link"
                                                                        id="youtubeVideo1"
                                                                        placeholder="{{ __('courses.Video URL') }} *"
                                                                        value="@if (isset($course) && $course->host == 'Youtube') {{ $course->trailer_link }} @endif"
                                                                        type="text">

                                                                    <span class="focus-border"></span>
                                                                    @if ($errors->has('video_url'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('video_url') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                <div class="input-effect" id="vimeoUrl12"
                                                                    style="display: @if ((isset($course) && $course->host != 'Vimeo') || !isset($course)) none @endif">
                                                                    <div class="" id="">

                                                                        @if (config('vimeo.connections.main.upload_type') == 'Direct')
                                                                            <div class="primary_file_uploader">
                                                                                <input
                                                                                    class="primary-input filePlaceholder"
                                                                                    type="text" id=""
                                                                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                                                                    placeholder="{{ __('courses.Browse Video file') }}"
                                                                                    readonly="">
                                                                                <!-- <button class="" type="button">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                class="primary-btn small fix-gr-bg"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                for="document_file_thumb_vimeo_add">{{ __('common.Browse') }}</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input type="file"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   class="d-none fileUpload"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   name="vimeo"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   id="document_file_thumb_vimeo_add">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button> -->
                                                                            </div>
                                                                        @else
                                                                            <select
                                                                                class="select2 vimeoList vimeoListForCourse"
                                                                                name="vimeo" id="vimeoVideo1">
                                                                                <option
                                                                                    data-display="{{ __('common.Select') }} {{ __('courses.Video') }}"
                                                                                    value="">
                                                                                    {{ __('common.Select') }}
                                                                                    {{ __('courses.Video') }}
                                                                                </option>

                                                                                <option
                                                                                    value="{{ $course->trailer_link }}"
                                                                                    selected></option>

                                                                            </select>
                                                                        @endif
                                                                        @if ($errors->has('vimeo'))
                                                                            <span class="invalid-feedback invalid-select"
                                                                                role="alert">
                                                                                <strong>{{ $errors->first('vimeo') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="input-effect" id="VdoCipherUrl12"
                                                                    style="display: @if ((isset($editLesson) && $editLesson->host != 'VdoCipher') || !isset($editLesson)) none @endif">
                                                                    <div class="" id="">

                                                                        <select
                                                                            class="select2 vdocipherList vdocipherListForCourse"
                                                                            name="vdocipher" id=" ">
                                                                            <option
                                                                                data-display="{{ __('common.Select') }} {{ __('courses.Video') }}"
                                                                                value="">{{ __('common.Select') }}
                                                                                {{ __('courses.Video') }}
                                                                            </option>
                                                                            <option value="{{ $course->trailer_link }}"
                                                                                selected></option>
                                                                        </select>
                                                                        @if ($errors->has('vdocipher'))
                                                                            <span class="invalid-feedback invalid-select"
                                                                                role="alert">
                                                                                <strong>{{ $errors->first('vdocipher') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="input-effect" id="fileupload12"
                                                                    style="display: @if ((isset($course) && ($course->host == 'Vimeo' || $course->host == 'Youtube')) || !isset($course)) none @endif">


                                                                    <div class="primary_input">

                                                                        <div class="primary_file_uploader">

                                                                            <input type="file" class="filepond"
                                                                                name="file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row d-none">
                                                        <div class="col-xl-4 mt-20">
                                                            <label>{{ __('courses.View Scope') }} </label>
                                                            <select class="primary_select" name="scope" id="">
                                                                <option value="1"
                                                                    {{ @$course->scope == '1' ? 'selected' : '' }}>
                                                                    {{ __('courses.Public') }}
                                                                </option>

                                                                <option {{ @$course->scope == '0' ? 'selected' : '' }}
                                                                    value="0">
                                                                    {{ __('courses.Private') }}
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-20">
                                                        <div class="col-xl-5">
                                                            <label class="primary_input_label">
                                                                Thumbnail (Max Image Size 1MB, Recommended
                                                                Dimensions: 1170X600)

                                                            </label>
                                                        </div>
                                                        <div class="col-xl-5">
                                                            <div class="primary_input mb-35">
                                                                <div class="primary_file_uploader" id="image_file-1">
                                                                    <input class="primary-input filePlaceholder"
                                                                        type="text" id="input-1"
                                                                        placeholder="{{ __('courses.Browse Image file') }}"
                                                                        readonly=""
                                                                        data-imgTitle="{{ showPicName(@$course->thumbnail) }}"
                                                                        value="{{ showPicName(@$course->thumbnail) }}">
                                                                    <button onclick="destroyCropper1()" class=""
                                                                        type="button">
                                                                        <label class="primary-btn small fix-gr-bg"
                                                                            id="avatar"
                                                                            for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                                                        <input type="file"
                                                                            class="d-none fileUpload upload-editor-1"
                                                                            name="parent_course_image"
                                                                            accept=".jpg, .jpeg, .png, .gif"
                                                                            id="document_file_thumb-1">
                                                                        <input type="hidden"
                                                                            name="parent_course_thumbnail_image"
                                                                            id="cropper_img"
                                                                            class="upload-editor-hidden-file-1">
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 text-center">
                                                            <img src="{{ getCourseImage(@$course->thumbnail) }}"
                                                                class="image-editor-preview-img-1 mt-n4 preview"
                                                                id="image_preview-1" />
                                                        </div>

                                                        <div class="col-xl-12 d-none">
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label mt-1"
                                                                    for="">{{ __('courses.Meta keywords') }}</label>
                                                                <input class="primary_input_field" name="meta_keywords"
                                                                    value="{{ @$course->meta_keywords }}"
                                                                    placeholder="-" type="text">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    @if (Settings('frontend_active_theme') == 'edume')
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label"
                                                                        for="">{{ __('courses.Key Point') }}
                                                                        (1)</label>
                                                                    <input class="primary_input_field" name="what_learn1"
                                                                        placeholder="-" type="text"
                                                                        value="{{ old('what_learn1', @$course->what_learn1) }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label"
                                                                        for="">{{ __('courses.Key Point') }}
                                                                        (2) </label>
                                                                    <input class="primary_input_field" name="what_learn2"
                                                                        placeholder="-" type="text"
                                                                        value="{{ old('what_learn2', @$course->what_learn2) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row d-none">
                                                        <div class="col-xl-12">
                                                            <div class="primary_input mb-25">
                                                                <label class="primary_input_label mt-1"
                                                                    for="">{{ __('courses.Meta description') }}</label>
                                                                <textarea id="my-textarea" class="primary_input_field" name="meta_description" style="height: 200px"
                                                                    rows="3">{!! @$course->meta_description !!}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 pt_15 text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <a class="primary-btn semi_large2 fix-gr-bg"
                                                                href="javascript:void(0)"
                                                                onclick="course_update_form()"><i class="ti-check"></i>
                                                                {{ __('common.Update') }}
                                                                {{-- __('courses.Course') --}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                    <!-- End Individual Tab -->
                                    <div role="tabpanel"
                                        class="tab-pane fade @if ($type == 'files') show active @endif"
                                        id="course_exercise">

                                        <div class="">
                                            <div class="row mb_20 mt-20">
                                                <div class="col-lg-2">

                                                    <ul class="d-flex">
                                                        <li style="list-style: none;"><a data-toggle="modal" data-target="#addFile"
                                                                class="primary-btn radius_30px fix-gr-bg"
                                                                href="#"><i
                                                                    class="ti-plus"></i>{{ __('common.Add') }}
                                                                {{ __('common.File') }}
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="modal fade admin-query" id="addFile">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">{{ __('common.Add') }}
                                                                {{ __('courses.Exercise') }} {{ __('common.File') }}
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"><i
                                                                    class="ti-close"></i></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ route('saveFile') }}" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ @$course->id }}">


                                                                <div class="primary_file_uploader">

                                                                    <input type="file" class="filepond" name="file"
                                                                        id="">
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-xl-12 mt-20">
                                                                        <div class="primary_input">
                                                                            {{-- <label class="primary_input_label mt-1" for=""> {{__('common.Name')}} </label> --}}
                                                                            <input class="primary_input_field"
                                                                                name="fileName" value="" required
                                                                                placeholder="{{ __('common.File') }} {{ __('common.Name') }} *"
                                                                                type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <select class="primary_select mt-20"
                                                                            name="status" id="">
                                                                            <option
                                                                                data-display="{{ __('common.Select') }} {{ __('common.Status') }}"
                                                                                value="">{{ __('common.Select') }}
                                                                                {{ __('common.Status') }} </option>
                                                                            <option value="1" selected>
                                                                                {{ __('courses.Active') }}</option>
                                                                            <option value="0">
                                                                                {{ __('courses.Pending') }}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 mt-3">
                                                                        <select class="primary_select" name="lock"
                                                                            id="">
                                                                            <option
                                                                                data-display="{{ __('common.Select') }} {{ __('courses.Privacy') }}"
                                                                                value="">{{ __('common.Select') }}
                                                                                {{ __('courses.Privacy') }} </option>
                                                                            <option value="0">
                                                                                {{ __('courses.Unlock') }}</option>
                                                                            <option value="1" selected>
                                                                                {{ __('courses.Locked') }}</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="d-flex justify-content-between mt-40">
                                                                            <button type="button"
                                                                                class="primary-btn tr-bg"
                                                                                data-dismiss="modal">
                                                                                {{ __('common.Cancel') }} </button>
                                                                            <button class="primary-btn fix-gr-bg"
                                                                                type="submit">{{ __('common.Add') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="QA_section QA_section_heading_custom check_box_table hide_btn_tab">
                                                <div class="QA_table">
                                                    <!-- table-responsive -->
                                                    <div class="">
                                                        <table id="lms_table" class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                                    <th scope="col">{{ __('common.Name') }}</th>
                                                                    <th scope="col">{{ __('common.Download') }}</th>
                                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($course_exercises) == 0)
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">
                                                                            {{ __('courses.No Data Found') }}</td>
                                                                    </tr>
                                                                @endif
                                                                @foreach ($course_exercises as $key => $exercise_file)
                                                                    <tr>
                                                                        <th>{{ $key + 1 }}</th>

                                                                        <td>{{ @$exercise_file->fileName }}</td>
                                                                        <td>

                                                                            @if (file_exists($exercise_file->file))
                                                                                <a style="font-weight: 460"
                                                                                    href="{{ route('download_course_file', [$exercise_file->id]) }}">{{ __('common.Click To Download') }}</a>
                                                                            @else
                                                                                {{ __('common.File Not Found') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <!-- shortby  -->
                                                                            <div class="dropdown CRM_dropdown">
                                                                                <button
                                                                                    class="btn btn-secondary dropdown-toggle"
                                                                                    type="button" id="dropdownMenu2"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    {{ __('common.Select') }}
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                                    aria-labelledby="dropdownMenu2">
                                                                                    <a class="dropdown-item fileEditFrom"
                                                                                        data-toggle="modal"
                                                                                        data-item="{{ $exercise_file }}"
                                                                                        data-target="#editFile"
                                                                                        href="#">{{ __('common.Edit') }}</a>
                                                                                    <a class="dropdown-item"
                                                                                        data-toggle="modal"
                                                                                        data-target="#deleteQuestionGroupModal{{ $exercise_file->id }}"
                                                                                        href="#">{{ __('common.Delete') }}</a>
                                                                                </div>
                                                                            </div>
                                                                            <!-- shortby  -->
                                                                        </td>
                                                                    </tr>


                                                                    <div class="modal fade admin-query"
                                                                        id="deleteQuestionGroupModal{{ $exercise_file->id }}">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">
                                                                                        {{ __('common.Delete') }}
                                                                                        {{ __('courses.Exercise') }}
                                                                                        {{ __('common.File') }}</h4>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"><i
                                                                                            class="ti-close"></i></button>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <div class="text-center">
                                                                                        <h4> {{ __('common.Are you sure to delete ?') }}
                                                                                        </h4>
                                                                                    </div>

                                                                                    <div
                                                                                        class="d-flex justify-content-between mt-40">
                                                                                        <button type="button"
                                                                                            class="primary-btn tr-bg"
                                                                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                                                                        {{ Form::open(['route' => 'deleteFile', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                                                                        <input type="hidden"
                                                                                            name="id"
                                                                                            value="{{ $exercise_file->id }}">
                                                                                        <button
                                                                                            class="primary-btn fix-gr-bg"
                                                                                            type="submit">{{ __('common.Delete') }}</button>
                                                                                        {{ Form::close() }}
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="course_reviews">
                                        @if (count($course_reviews) > 0)
                                            <div class="erp_role_permission_area mt 30">
                                                <!-- single_permission  -->
                                                <div class="mesonary_role_header nastable" id="reviews_sortable">
                                                    @foreach ($course_reviews as $thisreview)
                                                        @php
                                                            $checked = $thisreview->status == 1 ? 'checked' : '';
                                                            $status_enable_eisable = 'review_enable_disable';
                                                        @endphp
                                                        <div class="single_role_blocks parent"
                                                            data-id="{{ $thisreview->id }}">
                                                            <div class="single_permission"
                                                                id="review_id{{ $thisreview->id }}">
                                                                <div
                                                                    class="permission_header d-flex align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ti-move text-white"></i>
                                                                        <label for="Main_Module_1"
                                                                            class="pl-10">{{ $thisreview->comment }}</label>
                                                                    </div>
                                                                    <div class="mr-20 mt-1 text-white">
                                                                        <span>
                                                                            {{-- @for ($i = 0; $i < 5; $i++)
                                                            <i class="fas @if ($i <= floor($thisreview->star))text-warning @endif fa-star"></i>
                                                        @endfor --}}
                                                                            Show on Frontend
                                                                            {{-- <label class="switch_toggle" for="review_status{{ $thisreview->id }}">
                                                            <input type="checkbox" class="status_enable_disable" id="review_status{{$thisreview->id}}" value="{{$thisreview->id}}">
                                                            <i class="slider round"></i>
                                                        </label> --}}
                                                                            <label class="switch_toggle"
                                                                                for="review_checkbox{{ $thisreview->id }}">
                                                                                <input type="checkbox"
                                                                                    class="{{ $status_enable_eisable }}"
                                                                                    id="review_checkbox{{ $thisreview->id }}"
                                                                                    value="{{ $thisreview->id }}"
                                                                                    {{ $checked }}><i
                                                                                    class="slider round"></i></label>
                                                                        </span>
                                                                    </div>
                                                                    <div class="arrow" data-toggle="collapse"
                                                                        data-target="#review_content{{ $thisreview->id }}"
                                                                        aria-expanded="true">
                                                                    </div>
                                                                </div>
                                                                <div id="review_content{{ $thisreview->id }}"
                                                                    class="capter_body collapse">
                                                                    <div class="row py-2 px-3">
                                                                        <div class="col-md-12">
                                                                            <div class="course_review_wrapper">
                                                                                <div class="course_cutomer_reviews">
                                                                                    <div class="customers_reviews"
                                                                                        id="customers_reviews{{ $thisreview->id }}">

                                                                                        <div class="single_reviews"
                                                                                            id="12_single_reviews{{ $thisreview->id }}">
                                                                                            <div class="">
                                                                                                <div class="thumb link">
                                                                                                    {{ substr($thisreview->user->name, 0, 1) }}
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="review_content">
                                                                                                <h4 class="f_w_700">
                                                                                                    {{ $thisreview->user->name }}
                                                                                                </h4>
                                                                                                <div
                                                                                                    class="rated_customer d-flex align-items-center">
                                                                                                    <div
                                                                                                        class="feedmak_stars">
                                                                                                        @for ($i = 0; $i < 5; $i++)
                                                                                                            <i class="@if ($i <= floor($thisreview->star)) fas @else far @endif fa-star"
                                                                                                                aria-hidden="true"></i>
                                                                                                        @endfor


                                                                                                    </div>
                                                                                                </div>
                                                                                                <p>
                                                                                                    {{ $thisreview->comment }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <p>No Reviews Found</p>

                                        @endif
                                    </div>
                                    <div role="tabpanel"
                                        class="tab-pane fade @if ($type == 'certificate') show active @endif"
                                        id="certificate">

                                        <h2>{{ __('subscription.Assign') }} {{ __('certificate.Certificate') }}</h2>
                                        <div class="">

                                            <div class="white_box_30px">

                                                <form action="{{ route('AdminUpdateCourseCertificate') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ @$course->id }}">
                                                    <div class="row">
                                                        <div class="col-xl-6 courseBox">
                                                            <select class="primary_select edit_category_id"
                                                                data-course_id="{{ @$course->id }}" name="certificate"
                                                                id="course">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('certificate.Certificate') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('certificate.Certificate') }} </option>
                                                                @foreach ($certificates as $certificate)
                                                                    <option value="{{ $certificate->id }}"
                                                                        @if ($certificate->id == $course->certificate_id) selected @endif>
                                                                        {{ @$certificate->title }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 pt_15 text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <button class="primary-btn semi_large2 fix-gr-bg"
                                                                id="save_button_parent" type="submit">
                                                                <i class="ti-check"></i>{{ __('common.Save') }}
                                                                {{ __('certificate.Certificate') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>

                                    <div role="tabpanel"
                                        class="tab-pane fade @if ($type == 'drip') show active @endif"
                                        id="drip">

                                        <div class="QA_section QA_section_heading_custom check_box_table pt-20">
                                            <div class="QA_table">
                                                <form action="{{ route('setCourseDripContent') }}" method="post">
                                                    <input type="hidden" name="course_id"
                                                        value="{{ $course->id }}">
                                                    @csrf
                                                    <table class="table pt-0">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ __('common.Name') }}</th>
                                                                <th>{{ __('common.Specific Date') }}</th>
                                                                <th></th>
                                                                <th>{{ __('common.Days After Enrollment') }}</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if (count($chapters) == 0)
                                                                <tr>
                                                                    <td colspan="3" class="text-center">
                                                                        {{ __('courses.No Data Found') }}</td>
                                                                </tr>
                                                            @endif
                                                            @php
                                                                $i = 0;
                                                            @endphp
                                                            @foreach ($chapters as $key1 => $chapter)
                                                                @foreach ($chapter->lessons as $key => $lesson)
                                                                    <input type="hidden" name="lesson_id[]"
                                                                        value="{{ @$lesson->id }}">
                                                                    <tr>
                                                                        <td>
                                                                            @if ($lesson->is_quiz == 1)
                                                                                <span> <i class="ti-check-box"></i>
                                                                                    {{ $key + 1 }}.
                                                                                    {{ @$lesson['quiz'][0]['title'] }}
                                                                                </span>
                                                                            @else
                                                                                <span> <i class="ti-control-play"></i>
                                                                                    {{ $key + 1 }}.
                                                                                    {{ $lesson['name'] }}
                                                                                    [{{ MinuteFormat($lesson['duration']) }}]
                                                                                </span>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"
                                                                                class="primary_input_field primary-input date form-control"
                                                                                placeholder="{{ __('common.Select Date') }}"
                                                                                readonly name="lesson_date[]"
                                                                                value="{{ @$lesson->unlock_date != '' ? date('m/d/Y', strtotime($lesson->unlock_date)) : '' }}">
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">


                                                                                <div class="form-check p-1">
                                                                                    <input
                                                                                        class="form-check-input common-radio"
                                                                                        type="radio"
                                                                                        name="drip_type[{{ $i }}]"
                                                                                        id="select_drip_{{ $i }}1"
                                                                                        value="1"
                                                                                        @if (!empty($lesson->unlock_date)) checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="select_drip_{{ $i }}1">
                                                                                        {{ __('common.Date') }}
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check p-1">
                                                                                    <input
                                                                                        class="form-check-input common-radio"
                                                                                        type="radio"
                                                                                        name="drip_type[{{ $i }}]"
                                                                                        id="select_drip_{{ $i }}2"
                                                                                        @if (empty($lesson->unlock_date)) checked @endif
                                                                                        value="2">
                                                                                    <label class="form-check-label"
                                                                                        for="select_drip_{{ $i }}2">
                                                                                        {{ __('common.Days') }}
                                                                                    </label>
                                                                                </div>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" min="1"
                                                                                max="365" class="form-control"
                                                                                placeholder="{{ __('common.Days') }}"
                                                                                name="lesson_day[]"
                                                                                value="{{ @$lesson['unlock_days'] }}">
                                                                        </td>

                                                                    </tr>
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            @if (count($chapters) != 0)
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <button class="primary-btn fix-gr-bg"
                                                                            type="submit" data-toggle="tooltip">
                                                                            <span class="ti-check"></span>
                                                                            {{ __('common.Save') }}
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tfoot>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="editFile">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Edit') }} {{ __('courses.Exercise') }}
                        {{ __('common.File') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('updateFile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="" class="editFileId">

                        <p id="showFileName" class="custom_text" ></p>
                        <div class="">
                            <input type="file" class="filepond " name="file">


                        </div>

                        <div class="row">

                            <div class="col-xl-12 mt-20">
                                <div class="primary_input">
                                    <input class="primary_input_field editFileName" name="fileName" required
                                        value="" placeholder="{{ __('common.File') }} {{ __('common.Name') }}"
                                        type="text">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-12 mt-20">
                                <select class="primary_select editFilePrivacy" name="lock" id="">
                                    <option data-display="{{ __('common.Select') }} {{ __('courses.Privacy') }}"
                                        value="">{{ __('common.Select') }} {{ __('courses.Privacy') }} </option>
                                    <option value="0">{{ __('courses.Unlock') }}</option>
                                    <option value="1">{{ __('courses.Locked') }}</option>

                                </select>
                            </div>
                            <div class="col-12 mt-25">
                                <select class="primary_select editFileStatus" name="status" id="">
                                    <option data-display="{{ __('common.Select') }} {{ __('common.Status') }}"
                                        value="">{{ __('common.Select') }} {{ __('common.Status') }} </option>
                                    <option value="1">{{ __('courses.Active') }}</option>
                                    <option value="0">{{ __('courses.Pending') }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal">
                                {{ __('common.Cancel') }} </button>
                            <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Update') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
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

    @if (isModuleActive('Org'))
        <div class="modal fade admin-query" id="orgExistingFileSelect">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('org.Select Material') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data"
                            id="materialSourceInsertForm">
                            <input type="hidden" id="addCategory" name="category">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="input-effect mt-2 pt-1">
                                        <select class="primary_select AddSelectCateogry" name="category">
                                            <option data-display="{{ __('common.Select') }} {{ __('org.Category') }}"
                                                value="">{{ __('common.Select') }} {{ __('org.Category') }}
                                            </option>
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


                                    <div class="input-effect mt-2 pt-1">
                                        <select class="primary_select" name="file" id="AddSelectFile">
                                            <option data-display="{{ __('common.Select') }} {{ __('org.File') }}"
                                                value="">{{ __('common.Select') }} {{ __('org.File') }}
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pt_15 text-center">


                                <div class="d-flex justify-content-between mt-40">
                                    <button type="button" class="primary-btn tr-bg"
                                        data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="MaterialFileInsert"
                                        type="button"><i class="ti-check"></i> {{ __('common.Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="orgNewFileSelect">
            <div class="modal-dialog modal_700px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('org.Add New Material') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data"
                            id="materialSourceAddForm">

                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-25">
                                        <div class="col-md-12">
                                            <div class="primary_file_uploader">
                                                <input type="file" class="filepond" name="file"
                                                    id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('org.Category') }}
                                            <strong class="text-danger">*</strong></label>


                                        <select class="primary_select AddSelectCateogry AddNewSelectCateogry"
                                            name="category">
                                            <option data-display="{{ __('common.Select') }} {{ __('org.Category') }}"
                                                value="">{{ __('common.Select') }} {{ __('org.Category') }}
                                            </option>
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

                                </div>
                            </div>

                            <div class="col-lg-12 pt_15 text-center">


                                <div class="d-flex justify-content-between mt-40">
                                    <button type="button" class="primary-btn tr-bg"
                                        data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="MaterialFileSave"
                                        type="button"><i class="ti-check"></i> {{ __('common.Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                $(document).on('change click', '.fileType', function(e) {

                    var type = $(this).val();
                    if (type == 1) {
                        $('.AddSelectCateogry').trigger('change');
                        $('#orgExistingFileSelect').modal('show');
                        $('.selectOrgFile').show();
                        $('.defaultHost').addClass('d-none');
                    } else if (type == 2) {
                        $('.selectOrgFile').hide();
                        $('.defaultHost').removeClass('d-none');
                        $('.host_select').trigger('change');
                    } else {
                        $('.selectOrgFile').show();
                        $('#orgNewFileSelect').modal('show');
                        $('.defaultHost').addClass('d-none');
                    }
                });

                $(document).on('change click', '#MaterialFileInsert', function(e) {
                    // e.preventDefault();
                    var category = $('.AddSelectCateogry  option:selected').val();
                    var file = $('#AddSelectFile option:selected').val();
                    if (category == "") {
                        toastr.error('Please select category', 'Error');
                        return false;

                    }

                    if (file == "") {
                        toastr.error('Please select file', 'Error');
                        return false;

                    }
                    var formData = {
                        id: file,
                    };
                    $.ajax({
                        type: "GET",
                        url: "{{ route('org.ajaxMaterialSourceGet') }}",
                        data: formData,
                        success: function(data) {
                            console.log(data);
                            $('.FilePath').val(data.link);
                            $('.FileType').val(data.type);
                            $('.scorm_title').val(data.scorm_title);
                            $('.scorm_version').val(data.scorm_version);
                            $('.scorm_identifier').val(data.scorm_identifier);

                            $('#orgExistingFileSelect').modal('hide');
                        }
                    });
                });

                $(document).on('change click', '#MaterialFileSave', function(e) {
                    // e.preventDefault();
                    var category = $('.AddNewSelectCateogry  option:selected').val();

                    if (category == "") {
                        toastr.error('Please select category', 'Error');
                        return false;
                    }


                    $.ajax({
                        type: "POST",
                        url: "{{ route('org.ajaxMaterialSourceSave') }}",
                        data: $('#materialSourceAddForm').serialize(),
                        success: function(data) {

                            $('.FilePath').val(data.link);
                            $('.FileType').val(data.type);
                            $('.scorm_title').val(data.scorm_title);
                            $('.scorm_version').val(data.scorm_version);
                            $('.scorm_identifier').val(data.scorm_identifier);
                            $('#orgNewFileSelect').modal('hide');


                        }
                    });
                });



                $(document).on('change', '.AddSelectCateogry', function(e) {
                    var category = $(".AddSelectCateogry option:selected").val();


                    var url = "{{ route('org.getFilesByCategory') }}";

                    var formData = {
                        category: category,
                    };
                    // get section for student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url,
                        success: function(data) {
                            $('#AddSelectFile').empty();
                            $('#AddSelectFile').append($('<option>', {
                                value: '',
                                text: 'Select File',
                            }));
                            $.each(data, function(i, item) {
                                $('#AddSelectFile').append($('<option>', {
                                    value: item.id,
                                    text: item.title,
                                }));
                            });
                            $('#AddSelectFile').niceSelect('update');


                        },
                        error: function(data) {
                            console.log("Error:", data);
                            $('#AddSelectFile').niceSelect('update');
                        },
                    });

                });
            </script>
        @endpush
    @endif

    <input type="hidden" id="branchSelectType">
    <input type="hidden" id="branchName">
@endsection

@push('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
    {{-- <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/advance_search.js"></script> --}}

    {{-- <script src="{{ asset('public/backend/js/summernote-bs4.min.js') }}"></script> --}}
    {{--        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('.review_enable_disable').on('change', function() {
                var status = $(this).is(":checked") ? 1 : 0;
                var table = $('input[name="table_name"]').val();
                var id = $(this).val();
                //console.log(status,table,id);
                $.ajax({
                    // type: "POST",
                    method: 'GET',
                    url: '{{ route('statusEnableDisable') }}?id=' + id + '&status=' + status +
                        '&table=' + table,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success, 'Success');
                            //order = [];
                        }
                        if (response.error) {
                            toastr.error(response.error, 'Error');

                        }
                    }
                });
            });

            $('.note-editable').eq(6).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addAbout').val(text)
                console.log(text, $('#addAbout').val());
            });
            $('.note-editable').eq(7).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addOutcomes').val(text)
                console.log(text, $('#addOutcomes').val());
            });
            $('.note-editable').eq(8).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#addRequirements').val(text)
                console.log(text, $('#addRequirements').val());
            });

        });
    </script>

    <script>
        // Image Cropper Start
        $(document).ready(function() {

            var customFontFam = ['Arial', 'Helvetica', 'Cavolini', 'Jost', 'Impact', 'Tahoma', 'Verdana',
                'Garamond', 'Georgia', 'monospace', 'fantasy', 'Papyrus', 'Poppins'
            ];

            $('.custom_summernote').each(function() {
                var elId = $(this).attr('id');
                ClassicEditor
                    .create(document.getElementById(elId), {
                        ckfinder: {
                            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        },
                        mediaEmbed: {
                            previewsInData: true,
                            removeProviders: ['instagram', 'twitter', 'googleMaps', 'flickr',
                                'facebook'
                            ],
                        },
                        fontSize: {
                            options: [
                                9,
                                11,
                                13,
                                'default',
                                17,
                                19,
                                21
                            ]
                        },
                        fontFamily: {
                            options: customFontFam
                        },
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'blockQuote',
                                'fontFamily',
                                'fontSize',
                                'fontColor',
                                'alignment',
                                'outdent',
                                'indent',
                                '|',
                                'insertTable',
                                'imageInsert',
                                //	'imageUpload',
                                'mediaEmbed',
                                //	'CKFinder',
                                //	'codeBlock',
                                '|',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'en',
                        image: {
                            toolbar: [
                                'imageTextAlternative',
                                'toggleImageCaption',
                                'imageStyle:inline',
                                'imageStyle:block',
                                'imageStyle:side'
                            ],
                            insert: {
                                // This is the default configuration, you do not need to provide
                                // this configuration key if the list content and order reflects your needs.
                                integrations: ['upload', 'url']
                            }
                        },
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        }
                    })
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
                    .catch(error => {
                        console.error(error);
                    });
            });

            // Summer Note
            // $('.custom_summernote').summernote({
            //     pastePlain: true,
            //     fontNames: customFontFam,
            //     fontNamesIgnoreCheck: ['Cavolini', 'Jost'],
            //     fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
            //     codeviewFilter: true,
            //     codeviewIframeFilter: true,
            //     toolbar: [
            //         //['style', ['style']],
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
                                $('#document_file_thumb-1').val('');
                                $('#input-1').val($('#input-1').attr('data-imgtitle'));
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL1.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#document_file_thumb-1').val('');
                            $('#input-1').val($('#input-1').attr('data-imgtitle'));
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
                                $('#document_file_thumb-2').val('');
                                $('#input-2').val($('#input-2').attr('data-imgtitle'));
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL2.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#document_file_thumb-2').val('');
                            $('#input-2').val($('#input-2').attr('data-imgtitle'));
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
                                $('#document_file_thumb-3').val('');
                                $('#input-3').val($('#input-3').attr('data-imgtitle'));
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL3.createObjectURL(file);
                    } else {
                        $('#document_file_thumb-3').val('');
                        $('#input-3').val($('#input-3').attr('data-imgtitle'));
                        toastr.error(
                            'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                            'Error')
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
                                $('#document_file_thumb-4').val('');
                                $('#input-4').val($('#input-4').attr('data-imgtitle'));
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = _URL4.createObjectURL(file);
                    } else {
                        setTimeout(function() {
                            $('#document_file_thumb-4').val('');
                            $('#input-4').val($('#input-4').attr('data-imgtitle'));
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
    </script>
    <script>
        $('#course_cat_id').on('change', function() {
            var url = $("#url").val();
            console.log(url);

            var formData = {
                id: $(this).val(),
            };
            // get section for student
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "admin/course/ajaxGetCourseSubCategory",
                success: function(data) {
                    var a = "";
                    // $.loading.onAjax({img:'loading.gif'});
                    $.each(data, function(i, item) {
                        if (item.length) {
                            $("#subcat_id").find("option").not(":first").remove();
                            $("#subCatDiv ul").find("li").not(":first").remove();

                            $.each(item, function(i, section) {
                                $("#subcat_id").append(
                                    $("<option>", {
                                        value: section.id,
                                        text: section.name[lang],
                                    })
                                );

                                $("#subCatDiv ul").append(
                                    "<li data-value='" +
                                    section.id +
                                    "' class='option'>" +
                                    section.name[lang] +
                                    "</li>"
                                );
                            });
                            $("#subCatDiv .current").html("Select Sub Category");
                        } else {
                            $("#subCatDiv .current").html("Select Sub Category");
                            $("#subcat_id").find("option").not(":first").remove();
                            $("#subCatDiv ul").find("li").not(":first").remove();
                        }
                    });
                    // console.log(a);
                },
                error: function(data) {
                    console.log("Error:", data);
                },
            });
        });

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
        $('.nastable').sortable({
            cursor: "move",
            connectWith: [".nastable"],

            update: function(event, ui) {
                let ids = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });

                if (ids.length > 0) {
                    let data = {
                        '_token': '{{ csrf_token() }}',
                        'ids': ids,
                    }
                    $.get("{{ route('changeChapterPosition') }}", data, function(data) {

                    });
                }
            }
        });

        $('.nastable2').sortable({
            cursor: "move",
            connectWith: ".nastable2",
            update: function(event, ui) {
                let ids = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });
                console.log(ids);
                if (ids.length > 0) {
                    let data = {
                        '_token': '{{ csrf_token() }}',
                        'ids': ids,
                    }
                    $.post("{{ route('changeLessonPosition') }}", data, function(data) {

                    });
                }
                ordering();
            },
            receive: function(event, ui) {
                var chapter_id = event.target.attributes[1].value;
                var lesson = ui.item[0].attributes[1].value;


                let data = {
                    'chapter_id': chapter_id,
                    'lesson_id': lesson,
                    '_token': '{{ csrf_token() }}'
                }
                $.post("{{ route('changeLessonChapter') }}", data, function(data) {

                });
            }
        });

        function ordering() {
            var chepters = $('.nastable2');
            chepters.each(function() {
                var childs = $(this).find(".serial");
                childs.each(function(k, v) {
                    $(this).html(k + 1);
                });
            });
        }
    </script>



    <script>
        @if ($course->type == 2)
            $(".courseBox").addClass('d-none').removeClass('d-block'); //hide();
            $(".quizBox").addClass('d-block').removeClass('d-none'); //show();
            $(".makeResize").addClass("col-xl-6");
            $(".makeResize").removeClass("col-xl-4");
        @endif

        //         $(".type1").on("click", function () {
        //             if ($('.type1').is(':checked')) {
        //                 $(".courseBox").addClass('d-block').removeClass('d-none');//show();
        //                 $(".quizBox").addClass('d-none').removeClass('d-block');//hide();
        //                 $(".dripCheck").addClass('d-block').removeClass('d-none');//show();
        //                 $("#quiz_id").val('');
        //                 $(".makeResize").addClass("col-xl-4");
        //                 $(".makeResize").removeClass("col-xl-6");
        //             }
        //         });


        //         $(".type2").on("click", function () {
        //             if ($('.type2').is(':checked')) {
        //                 $(".courseBox").addClass('d-none').removeClass('d-block');//hide();
        //                 $(".quizBox").addClass('d-block').removeClass('d-none');//show();
        //                 $(".dripCheck").addClass('d-none').removeClass('d-block');//hide();

        //                 $(".makeResize").addClass("col-xl-6");
        //                 $(".makeResize").removeClass("col-xl-4");
        //             }
        //         });
        //
        // durationBox


        $(document).ready(function() {
            $('#select_input_type').change(function() {
                //                 console.log('selected');
                //                 if ($(this).val() === '1') {

                //                     $(".chapter_div").css("display", "block");
                //                     $(".lesson_div").css("display", "none");
                //                     $(".quiz_div").css("display", "none");

                //                 } else if ($(this).val() === '2') {

                //                     $(".chapter_div").css("display", "none");
                //                     $(".lesson_div").css("display", "none");
                //                     $(".quiz_div").css("display", "block");

                //                 } else {
                //                     $(".chapter_div").css("display", "none");
                //                     $(".lesson_div").css("display", "block");
                //                     $(".quiz_div").css("display", "none");
                //                 }
            });


            $('#category_id').change(function() {
                let category_id = $('#category_id').find(":selected").val();
                console.log("Host : " + category_id);
                if (category_id === 'Youtube' || category_id === 'URL') {
                    $("#iframeBox").hide();
                    $("#videoUrl").show();
                    $("#vimeoUrl").hide();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#fileupload").hide();
                    $("#VdoCipherUrl").hide();

                } else if ((category_id === 'Self') || (category_id === 'Zip') || (category_id ===
                        'GoogleDrive') || (category_id === 'PowerPoint') || (category_id === 'Excel') || (
                        category_id === 'Text') || (category_id === 'Word') || (category_id === 'PDF') || (
                        category_id === 'Image') || (category_id === 'AmazonS3') || (category_id ===
                        'SCORM') || (category_id === 'SCORM-AwsS3') || (category_id === 'XAPI') || (
                        category_id === 'XAPI-AwsS3')) {

                    $("#iframeBox").hide();
                    $("#fileupload").show();
                    $("#videoUrl").hide();
                    $("#vimeoUrl").hide();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#VdoCipherUrl").hide();

                } else if (category_id === 'Vimeo') {
                    $("#iframeBox").hide();
                    $("#videoUrl").hide();
                    $("#vimeoUrl").show();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#fileupload").hide();
                    $("#VdoCipherUrl").hide();
                } else if (category_id === 'VdoCipher') {
                    $("#iframeBox").hide();
                    $("#videoUrl").hide();
                    $("#vimeoUrl").hide();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#fileupload").hide();
                    $("#VdoCipherUrl").show();
                } else if (category_id === 'Iframe') {
                    $("#iframeBox").show();
                    $("#videoUrl").hide();
                    $("#vimeoUrl").hide();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#fileupload").hide();
                    $("#VdoCipherUrl").hide();
                } else {
                    $("#iframeBox").hide();
                    $("#videoUrl").hide();
                    $("#vimeoUrl").hide();
                    $("#vimeoVideo").val('');
                    $("#youtubeVideo").val('');
                    $("#fileupload").hide();
                    $("#VdoCipherUrl").hide();
                }

            });


            $('#category_id1').change(function() {

                let category_id1 = $('#category_id1').find(":selected").val();
                console.log("Host : " + category_id1);
                if (category_id1 === 'Youtube') {
                    $("#videoUrl1").show();
                    $("#vimeoUrl1").hide();
                    $("#vimeoVideo1").val('');
                    $("#youtubeVideo1").val('');
                    $("#fileupload1").hide();

                } else if ((category_id1 === 'Self') || (category_id === 'Document') || (category_id ===
                        'Image') || (category_id1 === 'AmazonS3') || (category_id1 === 'SCORM') || (
                        category_id1 === 'SCORM-AwsS3') || (category_id1 === 'XAPI') || (category_id1 ===
                        'XAPI-AwsS3')) {
                    $("#fileupload1").show();
                    $("#videoUrl1").hide();
                    $("#vimeoUrl1").hide();
                    $("#vimeoVideo1").val('');
                    $("#youtubeVideo1").val('');

                } else if (category_id1 === 'Vimeo') {
                    $("#videoUrl1").hide();
                    $("#vimeoUrl1").show();
                    $("#vimeoVideo1").val('');
                    $("#youtubeVideo1").val('');
                    $("#fileupload1").hide();
                } else {
                    $("#videoUrl1").hide();
                    $("#vimeoUrl1").hide();
                    $("#vimeoVideo1").val('');
                    $("#youtubeVideo1").val('');
                    $("#fileupload1").hide();
                }
            });


            @if (empty(@$editLesson))
                $('.category_id').trigger('change');
            @endif
            // $('#category_id1').trigger('change');

        });


        $(document).on('click', '.fileEditFrom', function() {

            let file = $(this).data('item');
            var IdElement = $('.editFileId');
            var NameFileElement = $('.editFileName');
            var showFileName = $('#showFileName');
            var PrivacyElement = $('.editFilePrivacy');
            var StatusElement = $('.editFileStatus');
            IdElement.val(file.id);
            NameFileElement.val(file.fileName);
            var filePath = file.file.split("/");
            // console.log(file, filePath, filePath[filePath.length - 1])
            showFileName.text('Existing File: ' + filePath[filePath.length - 1]);
            PrivacyElement.val(file.lock);
            StatusElement.val(file.status);

            PrivacyElement.niceSelect('update');
            StatusElement.niceSelect('update');


        })
    </script>



    <script>
        $('#category_id').on('change', function() {
            console.log('changed');
        });
        getVdoCipherList();
        getVdoCipherListForLesson();

        function getVdoCipherList() {
            $('.vdocipherList').select2({
                ajax: {
                    url: '{{ route('getAllVdocipherData') }}',
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
        }

        function getVdoCipherListForLesson() {
            $('.lessonVdocipher').select2({
                ajax: {
                    url: '{{ route('getAllVdocipherData') }}',
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
        }


        getVimeoList();
        getVimeoListForLesson();

        function getVimeoList() {
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
        }

        function getVimeoListForLesson() {
            $('.lessonVimeo').select2({
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
        }

        $(document).ready(function() {

            let host = $('#overview_host_section option:selected').val();

            if (host == 'Vimeo') {
                let uri = $(".vimeoListForCourse option:selected").val();
                if (uri != "") {
                    $.ajax({
                        url: "{{ url('admin/course/vimeo/video') }}?uri=" + uri,
                        success: function(data) {
                            $(".vimeoListForCourse option:selected").text(data.name)
                            getVimeoList();
                        },
                        error: function() {
                            console.log('failed')
                        }
                    });
                }
            } else if (host == 'VdoCipher') {
                let id = $(".vdocipherListForCourse option:selected").val();
                if (id != "") {
                    $.ajax({
                        url: "{{ url('admin/course/vdocipher/video') }}/" + id,
                        success: function(data) {
                            $(".vdocipherListForCourse option:selected").text(data.title)
                            getVdoCipherList();
                        },
                        error: function() {
                            console.log('failed')
                        }
                    });
                }
            }


            $('.VdoCipherVideoLesson').each(function(i, obj) {

                let host = $(this).closest('.lesson_div').find('.host_select option:selected').val();
                if (host == 'VdoCipher') {
                    let lessonId = $(this).find('option:selected').val();
                    if (lessonId != "") {
                        $.ajax({
                            url: "{{ url('admin/course/vdocipher/video') }}/" + lessonId,
                            success: function(data) {
                                $(".lessonVdocipher option:selected").text(data.title)
                                getVdoCipherListForLesson();
                            },
                            error: function() {
                                console.log('failed')
                            }
                        });
                    }
                }

            });


            $('.vimeoVideoLesson').each(function(i, obj) {
                let host = $(this).closest('.lesson_div').find('.host_select option:selected').val();
                if (host == 'Vimeo') {
                    var lessonUri = $(this).find('option:selected').val();
                    if (lessonUri != "") {
                        $.ajax({
                            url: "{{ url('admin/course/vimeo/video') }}?uri=" + lessonUri,
                            success: function(data) {
                                $(".lessonVimeo option:selected").text(data.name)
                                getVimeoListForLesson();
                            },
                            error: function() {
                                console.log('failed')
                            }
                        });
                    }
                }
            });


        });
        @if (isset($editLesson))
            var editLesson = $('#category_id_edit_{{ $editLesson->id }}');
            editLesson.trigger('change');

            //   $('.fileType').find()
            var type = $('.fileType:checked').val();
            if (type == 2) {
                $('.fileType:checked').trigger('click');
            }
        @endif


        $('.mode_of_delivery').change(function() {
            let option = $(".mode_of_delivery option:selected").val();

            if (option == 3) {
                $('.quizBox').hide();
            } else {
                if ($('.type2').is(':checked')) {
                    $('.quizBox').show();
                }
            }
        });
        $('.mode_of_delivery').trigger('change');


        $(document).on("click", ".questionSubmitBtn", function(e) {
            e.preventDefault();
            let div = $(this).closest('.questionBoxDiv');
            let count = div.closest('.questionBoxDiv').find('[type=checkbox]:checked').length;
            if (count < 1) {
                toastr.error('{{ __('common.At least one correct answer is required') }} ',
                    '{{ __('common.Error') }}');
            } else {
                $(this).closest('form').submit();
            }
        });
        $('#iap').change(function() {
            if ($('#iap').is(':checked')) {
                $('#iap_div').removeClass('d-none');
            } else {
                $('#iap_div').addClass('d-none');


            }
        });
        // $('.toggle_course_quiz').change(function () {
        //     if ($('#type2').is(':checked')) {
        //         $('#price_div').removeClass('d-none');
        //     } else {
        //         $('#price_div').addClass('d-none');
        //     }
        // });

        function course_update_form() {
            $('.preloader').show();
            var isAdmin = '{{ isAdmin() }}';
            var errors = [];

            isUnique({
                columns: [
                    ['courses', 'title', $('#addTitle').val(), '{{ @$course->id }}']
                ]
            }, function(res) {
                errors = [...res.errors]


                var type = $(".addType[name='type']:checked")
                    .val(); // 1 for course, 7 for timetable, 2 for big quiz

                if (isEmpty($('#addTitle').val())) {
                    errors.push('Course Title is required');
                }
                if (type == 1) {
                    if ($("#cna_prep_type_check:checked").val() == 1) {
                        if (isEmpty($('#input-2').val())) {
                            errors.push("Image is required");
                        }
                    }
                    if ($("#test_prep_type_check:checked").val() == 1) {

                        if (isEmpty($('#test_prep_price1').val())) {
                            errors.push("Prep-Course (on-demand) is required");
                        }
                        if (isEmpty($('#input-3').val())) {
                            errors.push("Image is required");
                        }
                    }
                    if ($("#test_prep_graded_type_check:checked").val() == 1) {
                        if (isEmpty($('#input-4').val())) {
                            errors.push("Image is required");
                        }
                    }
                    if (isEmpty($('#total_courses').val())) {
                        errors.push("Total Classes is required");
                    }

                }

                if (isAdmin == '1') {
                    if (isEmpty($('#assign_instructor').val())) {
                        errors.push("Instructor is required");
                    }
                }


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
                    if (isEmpty($('#course_cat_id').val())) {
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
                console.log($('#input-4').val());
                if (type == 7) {
                    if (isEmpty($('#timetableId').val())) {
                        errors.push("Timetable is required");
                    }
                    if (isEmpty($('#addPrice').val())) {
                        errors.push("Price is required");
                    }
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
        }
    </script>
@endpush
