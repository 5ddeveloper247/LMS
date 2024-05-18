@extends('backend.master')
<link rel="stylesheet" href="{{ asset('Modules/CourseSetting/Resources/assets/css/style.css') }}">

@push('styles')
    <style>
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

        @media (max-width: 1199px) {
            .responsiveResize2 {
                margin-top: 30px;
            }
        }

        .permission_header {
            padding: 12px 10px;
            background-image: -moz-linear-gradient(0deg, ##0079a8 0%, #a235ec 70%, #996699 100%);
            background-image: -webkit-linear-gradient(0deg, ##0079a8 0%, #a235ec 70%, #996699 100%);
            background-image: -ms-linear-gradient(0deg, ##0079a8 0%, #a235ec 70%, #996699 100%);
        }

        .course_body {
            border: 1px solid #9f35ee;
        }

        /*.custom_input_field:focus-visible {*/
        /*    border: 1px solid #9f35ee !important;*/
        /*}*/
        .image-editor-preview-img-1 {
            width: 90px !important;
            height: 120px !important;
            object-fit: contain !important;
            margin-bottom: 5px;
        }

        .custom_checkmark {
            outline: 1px solid white !important;
        }
    </style>
@endpush
{{-- @php
    $table_name = 'courses';
@endphp
@section('table')
    {{ $table_name }}
@stop --}}

@section('mainContent')

    {{-- @php
        $required_type = false;
        if (isModuleActive('Org')) {
            $required_type = true;
        }
    @endphp --}}
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">

        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4> Add Repeat Course ({{ $parent->title ?? '' }})</h4>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('course.saveAddToSale') }}" method="POST" class="row" id="course_data"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id ?? null }}">
                    <input type="hidden" name="parent_id" value="{{ $parent->id ?? null }}">
                    <div class="col-md-12 mb-25">
                        <h5 class="">
                            {{ 'Chapter Name' }}
                        </h5>
                    </div>
                    {{-- @dd($parent->chapters) --}}
                    @forelse ($parent->chapters as $chapter)
                        <div class="col-md-6 mb-3">
                            <div id="accordion">
                                <div class="card single_role_blocks rounded-0">
                                    <div class="card-header rounded-0 permission_header" id="heading-{{ $chapter->id }}">
                                        <h5 class="d-flex mb-0">
                                            <label class="primary_checkbox d-flex nowrap mr-3 mt-1">
                                                <input type="checkbox" id="chapter_id" class="chapters" name="chapter_ids[]"
                                                    @if ($chapter->course_check->count()) checked @endif
                                                    value="{{ $chapter->id }}">
                                                <span class="checkmark custom_checkmark mr-2"></span>
                                            </label>
                                            <button class="btn p-0 text-white" type="button" data-toggle="collapse"
                                                data-target="#collapse-{{ $chapter->id }}" aria-expanded="true"
                                                aria-controls="collapse-{{ $chapter->id }}">
                                                {{ $chapter->name }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse-{{ $chapter->id }}" class="course_body collapse"
                                        aria-labelledby="heading-{{ $chapter->id }}" data-parent="#accordion">
                                        <div class="card-body row">
                                            @forelse ($chapter->lessons as $lesson)
                                                @if (!count($lesson->quiz))
                                                    <div class="col-md-6">
                                                        <label class="primary_checkbox d-flex nowrap mr-12">
                                                            <input type="checkbox" id="lesson_id" class="lessons"
                                                                name="lesson_ids[]"
                                                                @if ($lesson->course_check->count()) checked @endif
                                                                value="{{ $lesson->id }}">
                                                            <span class="checkmark mr-2"></span>{{ $lesson->name }}
                                                        </label>
                                                    </div>
                                                @else
                                                    @foreach ($lesson->quiz as $quiz)
                                                        {{-- @if ($lesson->quiz_id == $quiz->id) --}}
                                                        <div class="col-md-6">
                                                            <label class="primary_checkbox d-flex nowrap mr-12">
                                                                <input type="checkbox" id="lesson_id" class="lessons"
                                                                    name="lesson_ids[]" {{-- @if ($lesson->course_check->count()) checked @endif --}}
                                                                    value="{{ $quiz->id }}">
                                                                <span class="checkmark mr-2"></span>{{ $quiz->title }}
                                                            </label>
                                                        </div>
                                                        {{-- @break --}}
                                                        {{-- @endif --}}
                                                    @endforeach
                                                @endif
                                            @empty
                                                <div class="col-md-6 my-n1">
                                                    <label class="d-flex m-0 mr-12">
                                                        {{ 'No Lesson in This Chapter' }}
                                                    </label>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-3 col-sm-4 mb-25 my-n1">
                            <label class="d-flex m-0 mr-12">
                                {{ 'No Chapter in This Course' }}
                            </label>
                        </div>
                    @endforelse

                    <div class="col-md-12 my-3">
                        <h5 class="">
                            {{ 'Course File Name' }}
                        </h5>
                    </div>
                    @forelse ($parent->files as $file)
                        <div class="col-md-6 col-sm-6 mb-25">
                            <label class="primary_checkbox d-flex nowrap mr-12">
                                <input type="checkbox" id="course_file_id" name="course_file_ids[]"
                                    @if ($file->course_check->count()) checked @endif value="{{ $file->id }}">
                                <span class="checkmark mr-2"></span>
                                <span>{{ showPicName($file->file) }}</span>
                            </label>
                        </div>
                    @empty
                        <div class="col-md-12 mb-25 my-n1">
                            <label class="d-flex mr-12">
                                {{ 'No File in This Course' }}
                            </label>
                        </div>
                    @endforelse

                    <div class="col-md-12 my-2"></div>
                    @if (!empty($course->start_date) && !empty($course->start_date))
                        @php
                            $start_date = \Carbon\Carbon::parse($course->start_date)->format('m/d/Y');
                            $end_date = \Carbon\Carbon::parse($course->end_date)->format('m/d/Y');
                        @endphp
                    @endif

                    <div class="col-md-6">
                        {{-- <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Start Date <strong
                                    class="text-danger">*</strong></label>
                            <input type="date" name="start_date" id="start_date"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ $start_date ?? old('start_date') }}">
                        </div> --}}
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Start Date <strong
                                    class="text-danger">*</strong></label>
                            <input class="primary-input primary_input_field date form-control"
                                {{ $errors->first('start_date') ? 'autofocus' : '' }}
                                value="{{ $start_date ?? old('start_date') }}" name="start_date" placeholder="-"
                                type="text" id="start_date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{-- <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">End Date <strong
                                    class="text-danger">*</strong></label>
                            <input type="date" name="end_date" id="end_date"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ $end_date ?? old('end_date') }}">

                        </div> --}}
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">End Date <strong
                                    class="text-danger">*</strong></label>
                            <input class="primary-input primary_input_field date form-control"
                                {{ $errors->first('end_date') ? 'autofocus' : '' }}
                                value="{{ $end_date ?? old('end_date') }}" name="end_date" placeholder="-" type="text"
                                id="end_date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Price <strong
                                    class="text-danger">($)</strong></label>
                            <input type="number" name="price" id="price"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ $course->price ?? old('price') }}">
                        </div>
                    </div>

                    <div class="col-md-6 timetableBox mb-25">
                        <label class="primary_input_label" for="">Timetable <strong
                                class="text-danger">*</strong></label>
                        <select class="primary_select" name="timetable" id="timetable_id"
                            {{ $errors->has('timetable') ? 'autofocus' : '' }}>
                            <option data-display="{{ __('common.Select') }} {{ __('Time Table') }} *" value="">
                                {{ __('common.Select') }} {{ __('Time Table') }} </option>
                            @foreach ($timetables as $timetable)
                                @if (!empty($course->time_table_id))
                                    <option value="{{ $timetable->id }}"
                                        {{ $timetable->id == $course->time_table_id ? 'selected' : '' }}>
                                        {{ @$timetable->name }}
                                    </option>
                                @else
                                    <option value="{{ $timetable->id }}">
                                        {{ @$timetable->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 my-2">
                        <h5>Other Data</h5>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 1 Heading <small>Max size (60
                                    Characters)</small></label>
                            <input type="text" name="card_1_heading" id="card_1_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_1_heading : old('card_1_heading') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 1 Sub-Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_1_subheading" id="card_1_subheading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_1_subheading : old('card_1_subheading') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 1 Text <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="card_1_text" id="card_1_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_1_text : old('card_1_text') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 2 Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_2_heading" id="card_2_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_2_heading : old('card_2_heading') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 2 Sub-Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_2_subheading" id="card_2_subheading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_2_subheading : old('card_2_subheading') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 3 Text <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="card_2_text" id="card_2_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_2_text : old('card_2_text') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 3 Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_3_heading" id="card_3_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_3_heading : old('card_3_heading') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 3 Sub-Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_3_subheading" id="card_3_subheading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_3_subheading : old('card_3_subheading') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 3 Text <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="card_3_text" id="card_3_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_3_text : old('card_3_text') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 4 Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_4_heading" id="card_4_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_4_heading : old('card_4_heading') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 4 Sub-Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="card_4_subheading" id="card_4_subheading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_4_subheading : old('card_4_subheading') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Card 4 Text <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="card_4_text" id="card_4_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->card_4_text : old('card_4_subheading') }}">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 1 Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="slider_1_heading" id="slider_1_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_1_heading : old('slider_1_heading') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><small>Slider 1 Image</small></label>
                            <div class="primary_file_uploader">
                                <input class="primary-input filePlaceholder" type="text" id="slider_1_image"
                                    placeholder="Browse Image file" readonly=""
                                    value="{{ isset($course->course_sale_data) ? showPicName(@$course->course_sale_data->slider_1_image) : '' }}">
                                <button class="" type="button">
                                    <label class="primary-btn small fix-gr-bg" for="document_file_thumb_1">Browse</label>
                                    <input type="file" class="d-none fileUpload" name="slider_1_image"
                                        id="document_file_thumb_1">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 1 Paragraph <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="slider_1_text" id="slider_1_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_1_text : old('slider_1_text') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 2 Heading<small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="slider_2_heading" id="slider_2_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_2_heading : old('slider_2_heading') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 2 Image</label>
                            <div class="primary_file_uploader">
                                <input class="primary-input filePlaceholder" type="text" id="slider_2_image"
                                    placeholder="Browse Image file" readonly=""
                                    value="{{ isset($course->course_sale_data) ? showPicName(@$course->course_sale_data->slider_2_image) : '' }}">
                                <button class="" type="button">
                                    <label class="primary-btn small fix-gr-bg" for="document_file_thumb_2">Browse</label>
                                    <input type="file" class="d-none fileUpload" name="slider_2_image"
                                        id="document_file_thumb_2">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 2 Paragraph <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="slider_2_text" id="slider_2_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_2_text : old('slider_2_text') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 3 Heading <small>Max size
                                    (60 Characters)</small></label>
                            <input type="text" name="slider_3_heading" id="slider_3_heading" maxlength="60"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_3_heading : old('slider_3_heading') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 3 Image</label>
                            <div class="primary_file_uploader">
                                <input class="primary-input filePlaceholder" type="text" id="slider_3_image"
                                    placeholder="Browse Image file" readonly=""
                                    value="{{ isset($course->course_sale_data) ? showPicName(@$course->course_sale_data->slider_3_image) : '' }}">
                                <button class="" type="button">
                                    <label class="primary-btn small fix-gr-bg" for="document_file_thumb_3">Browse</label>
                                    <input type="file" class="d-none fileUpload" name="slider_3_image"
                                        id="document_file_thumb_3">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="">Slider 3 Paragraph <small>Max size
                                    (400 Characters)</small></label>
                            <input type="text" name="slider_3_text" id="slider_3_text" maxlength="400"
                                class="primary-input primary_input_field form-control custom_input_field"
                                value="{{ isset($course->course_sale_data) ? $course->course_sale_data->slider_3_text : old('slider_3_text') }}">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label class="primary_input_label">
                            Course Thumbnail (Max Image Size 1MB, Recommended Dimensions: 1600X600)
                        </label>
                    </div>
                    <div class="col-md-5">
                        <div class="primary_input mb-35">
                            <div class="primary_file_uploader" id="image_file-1">
                                <input class="primary-input filePlaceholder" type="text" id="input-1"
                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                    placeholder="{{ __('courses.Browse Image file') }}" readonly=""
                                    value="{{ isset($course->image) ? showPicName($course->image) : '' }}">
                                <button onclick="destroyCropper1()" class="" type="button">
                                    <label class="primary-btn small fix-gr-bg" id="avatar"
                                        for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                    <input type="file" class="d-none fileUpload upload-editor-1"
                                        name="parent_course_image" id="document_file_thumb-1">
                                    <input type="hidden" name="parent_course_thumbnail_image" id="cropper_img"
                                        class="upload-editor-hidden-file-1">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 text-center">
                        <img src="{{ isset($course->thumbnail) ? asset($course->thumbnail) : asset('public/assets/course/image-375x500.png') }}"
                            class="preview image-editor-preview-img-1" id="image_preview-1" />
                    </div>
                    <div class="col-md-12">
                        <div class="primary_input mb-35">
                            <label class="primary_input_label" for="description">Course Description</label>
                            <textarea class="primary_input_field" name="description" id="description" cols="30" rows="15"
                                maxlength="500" style="height: 200px">{{ isset($course->course_sale_data) ? $course->course_sale_data->description : old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 pt_15 text-center">
                        <div class="d-flex justify-content-center">
                            <button class="primary-btn semi_large2 fix-gr-bg" id="submit_btn"><i class="ti-check"></i>
                                {{ __('common.Add') }} {{ __('courses.Course') }}
                            </button>
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
                            <a id="image-editor-crop-1" class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
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
        // Image  Start
        $(document).ready(function() {
            // 1st image
            var old_file_1 = $("#slider_1_image").val();
            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb_1").change(function(e) {

                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 1600 && image_height == 600) {

                        } else {
                            $('#document_file_thumb_1').val('');
                            $("#slider_1_image").val(old_file_1);
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 1600 X 600 !',
                                'Error')
                        }
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });
            // 2nd image
            var old_file_2 = $("#slider_2_image").val();
            var _URL2 = window.URL || window.webkitURL;
            $("#document_file_thumb_2").change(function(e) {

                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 1600 && image_height == 600) {

                        } else {
                            $('#document_file_thumb_2').val('');
                            $("#slider_2_image").val(old_file_2);
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 1600 X 600 !',
                                'Error')
                        }
                    };
                    img.src = _URL2.createObjectURL(file);
                }
            });
            // 3rd image
            var old_file_3 = $("#slider_3_image").val();
            var _URL3 = window.URL || window.webkitURL;
            $("#document_file_thumb_3").change(function(e) {

                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 1600 && image_height == 600) {

                        } else {
                            $('#document_file_thumb_3').val('');
                            $("#slider_3_image").val(old_file_3);
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 1600 X 600 !',
                                'Error')
                        }
                    };
                    img.src = _URL3.createObjectURL(file);
                }
            });
        });
        // Image  End
    </script>
    <script>
        // 1st Cropper
        var old_file1 = $("#input-1").val();
        var _URL1 = window.URL || window.webkitURL;
        $("#document_file_thumb-1").change(function(e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    var image_width = this.width;
                    var image_height = this.height;
                    if (image_width == 1600 && image_height == 600) {
                        jQuery('#image-editor-modal-1').modal('show', {
                            backdrop: 'static'
                        });
                    } else {
                        $('#document_file_thumb-1').val('');
                        $("#input-1").val(old_file1);
                        toastr.error(
                            'Wrong Image Dimensions, Please Select Image of 1600 X 600 !',
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
    </script>
    <script>
        $(document).ready(function() {
            var form = $('#course_data');
            // var chapters = form.find('.chapters');
            var current = new Date().setHours(0, 0, 0, 0);

            function updateLessons(chapter) {
                var lessons = chapter.closest('.card').find('.lessons');
                if (chapter.is(':checked')) {
                    lessons.prop('disabled', false);
                } else {
                    lessons.prop('disabled', true).prop('checked', false);
                }
            }

            // Apply the function to each chapter initially
            var chapters = form.find('.chapters');
            chapters.each(function() {
                updateLessons($(this));
            });

            // Handle change event for chapters
            chapters.change(function() {
                var chapter = $(this);
                updateLessons(chapter);
            });

            $(form).submit(function(event) {

                $('.preloader').show();
                var errors = [];
                if (chapters.length > 0) {
                    var isChapterSelected = false;
                    // var is_return = true;
                    var isLessonSelected = false;

                    chapters.each(function() {
                        if ($(this).is(':checked')) {
                            isChapterSelected = true;
                            var lessons = $(this).closest('.card').find('.lessons');

                            lessons.each(function() {
                                if ($(this).is(':checked')) {
                                    isLessonSelected = true;
                                }
                            });
                        }
                    });

                    if (!isChapterSelected) {
                        errors.push('Please Select at least one Chapter');
                    }

                    if (!isLessonSelected) {
                        errors.push('Please Select at least one Lesson');
                    }
                }

                let start_date = form.find('#start_date').val();
                let end_date = form.find('#end_date').val();

                let selected_start_date = new Date(start_date).setHours(0, 0, 0, 0);
                let selected_end_date = new Date(end_date).setHours(0, 0, 0, 0);

                if (start_date == '') {
                    errors.push('Please Select Start Date!');
                }

                if (isEmpty($('#course_id').val()) && selected_start_date < current) {
                    errors.push("Selected Start Date must not be earlier than today's date!");
                }

                if (end_date == '') {
                    errors.push('Please Select End Date!');
                }

                if (isEmpty($('#course_id').val()) && selected_end_date < current) {
                    errors.push("Selected End Date must not be earlier than today's date!");
                }

                if (selected_start_date >= selected_end_date) {
                    errors.push("Selected Start Date must not be earlier or Equal to Selected End Date!");
                }

                if (isEmpty(form.find('#price').val())) {
                    errors.push('Please Enter Price!');
                }
                if (isEmpty(form.find('#timetable_id').val())) {
                    errors.push('Please Select Time Table!');
                }

                if (isEmpty(form.find('#card_1_heading').val())) {
                    errors.push('Please Enter First Card Heading!');
                }
                if (isEmpty(form.find('#card_1_subheading').val())) {
                    errors.push('Please Enter First Card Sub-Heading');
                }
                if (isEmpty(form.find('#card_1_text').val())) {
                    errors.push('Please Enter First Card Paragraph!');
                }

                if (isEmpty(form.find('#card_2_heading').val())) {
                    errors.push('Please Enter Second Card Heading!');
                }
                if (isEmpty(form.find('#card_2_subheading').val())) {
                    errors.push('Please Enter Second Card Sub-Heading');
                }
                if (isEmpty(form.find('#card_2_text').val())) {
                    errors.push('Please Enter Second Card Paragraph!');
                }

                if (isEmpty(form.find('#card_3_heading').val())) {
                    errors.push('Please Enter Third Card Heading!');
                }
                if (isEmpty(form.find('#card_3_subheading').val())) {
                    errors.push('Please Enter Third Card Sub-Heading');
                }
                if (isEmpty(form.find('#card_3_text').val())) {
                    errors.push('Please Enter Third Card Paragraph!');
                }

                if (isEmpty(form.find('#card_4_heading').val())) {
                    errors.push('Please Enter Fourth Card Heading!');
                }
                if (isEmpty(form.find('#card_4_subheading').val())) {
                    errors.push('Please Enter Fourth Card Sub-Heading');
                }
                if (isEmpty(form.find('#card_4_text').val())) {
                    errors.push('Please Enter Fourth Card Paragraph!');
                }
                if (isEmpty($('#course_id').val()) && isEmpty(form.find('#slider_1_heading').val())) {
                    errors.push('Please Enter First Slider Heading!');
                }
                if (isEmpty(form.find('#slider_1_image').val())) {
                    errors.push('Please Select First Slider Image!');
                }
                if (isEmpty(form.find('#slider_1_text').val())) {
                    errors.push('Please Select First Slider Paraghraph!');
                }

                if (isEmpty(form.find('#slider_2_heading').val())) {
                    errors.push('Please Enter Second Slider Heading!');
                }
                if (isEmpty($('#course_id').val()) && isEmpty(form.find('#slider_2_image').val())) {
                    errors.push('Please Enter First Slider Heading!');
                }
                if (isEmpty(form.find('#slider_2_text').val())) {
                    errors.push('Please Select Second Slider Paraghraph!');
                }

                if (isEmpty($('#course_id').val()) && isEmpty(form.find('#slider_3_heading').val())) {
                    errors.push('Please Enter Third Slider Heading!');
                }
                if (isEmpty(form.find('#slider_3_image').val())) {
                    errors.push('Please Select Third Slider Image!');
                }
                if (isEmpty(form.find('#slider_3_text').val())) {
                    errors.push('Please Select Third Slider Paraghraph!');
                }

                if (isEmpty(form.find('#description').val())) {
                    errors.push('Please Enter Course Description!');
                }

                if (isEmpty($('#course_id').val()) && isEmpty(form.find('#input-1').val())) {
                    errors.push('Please Enter Third Slider Heading!');
                }

                if (errors.length) {
                    console.log(errors);
                    setTimeout(function() {
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors, function(index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                    }, 3000)
                    return false;
                }
            });
        });

        // let show_overview_media = $('#show_overview_media');
        // let overview_host_section = $('#overview_host_section');
        // show_overview_media.change(function() {
        //     if (show_overview_media.is(':checked')) {
        //         overview_host_section.show();
        //     } else {
        //         overview_host_section.hide();
        //     }
        // });
    </script>
    <script>
        // $('.toggle_course_testPrep').change(function() {
        //     if ($('#type2').is(':checked')) {
        //         $('#price_div').removeClass('d-none');
        //     } else {
        //         $('#price_div').addClass('d-none');
        //     }
        // });

        // let show_mode_of_delivery = $('#show_mode_of_delivery');
        // let mode_of_delivery_options = $('#mode_of_delivery_options');
        // show_mode_of_delivery.change(function() {
        //     if (show_mode_of_delivery.is(':checked')) {
        //         mode_of_delivery_options.show();
        //     } else {
        //         mode_of_delivery_options.hide();
        //     }
        // });


        // $('.mode_of_delivery').change(function() {
        //     let option = $(".mode_of_delivery option:selected").val();
        //     if (option == 3) {
        //         $('.testPrepBox').hide();
        //     } else {
        //         if ($('#type2').is(':checked')) {
        //             $('.testPrepBox').show();
        //         }
        //     }
        // });

        // $('#iap').change(function() {
        //     if ($('#iap').is(':checked')) {
        //         $('#iap_div').removeClass('d-none');
        //     } else {
        //         $('#iap_div').addClass('d-none');
        //     }
        // });
    </script>
@endpush
@push('scripts')
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
@endpush
