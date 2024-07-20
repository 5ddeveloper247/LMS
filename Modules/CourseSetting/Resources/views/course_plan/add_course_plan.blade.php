@extends('backend.master')
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
    $table_name = 'payment_plans';
@endphp
@section('table')
    {{ $table_name }}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>{{ __('Add Course') }} {{ __('Plan') }} </h4>
            </div>
            <input type="hidden" id="url" value="{{ url('/') }}">
            <form action="{{ route('storeCoursePlan') }}" method="POST" enctype="multipart/form-data" id="course_plan_form">
                @csrf
                <div class="row">
                    <div class="col-xl-12 courseBox">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for="course_id">{{ __('Courses') }}<strong
                                class="text-danger">*</strong>
                            </label>
                            <select class="primary_select" name="course_id" id="course_id"
                                {{ $errors->has('courses') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }} {{ __('Course') }}" value="">
                                    {{ __('common.Select') }} {{ __('Course') }}
                                </option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4" id="child_course_section">


                </div>
                <div class="row mt-4" id="child_course_price">
                    <div class="col-xl-6">
                        <div class="primary_input mb-25 d-none" id="full_course_price_div">
                            <label class="primary_input_label" for="">{{ __('Full Course Price') }}</label>
                            <input class="primary_input_field" accept="/^1[1-9]{9}$/" name="full_course_price"
                                placeholder="-" type="number" value="{{ old('full_course_price') }}"
                                id="full_course_price">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="primary_input mb-25 d-none" id="prep_course_live_price_div">
                            <label class="primary_input_label" for="">{{ __('Prep-Course (Live) Price') }}</label>
                            <input class="primary_input_field" accept="/^1[1-9]{9}$/" name="prep_course_live_price"
                                placeholder="-" type="number" value="{{ old('prep_course_live_price') }}"
                                id="prep_course_live_price">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="primary_input_label" for="no_of_students">{{ __('No. of students') }}</label>
                        <input class="primary_input_field" name="no_of_students" placeholder="-" type="number"
                            id="no_of_students" value="0" required>
                    </div>
                    <div class="col-xl-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label" for="">{{ __('Start Date') }} <strong
                                    class="text-danger">*</strong> </label>
                            <div class="primary_datepicker_input">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="">
                                            <input placeholder="Date"
                                                class="primary_input_field primary-input date form-control"
                                                id="plan_start_date"
                                                {{ $errors->first('plan_start_date') ? 'autofocus' : '' }} type="text"
                                                name="plan_start_date" value="{{ old('plan_start_date') }}"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label" for="">{{ __('end Date') }} <strong
                                    class="text-danger">*</strong></label>
                            <div class="primary_datepicker_input">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="">
                                            <input placeholder="Date"
                                                class="primary_input_field primary-input date form-control"
                                                id="plan_end_date" {{ $errors->first('plan_end_date') ? 'autofocus' : '' }}
                                                type="text" name="plan_end_date" value="{{ old('plan_end_date') }}"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="primary_input mb-15">
                            <label class="primary_input_label" for="">{{ __('Class Date') }} <strong
                                    class="text-danger">*</strong></label>
                            <div class="primary_datepicker_input">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="">
                                            <input placeholder="Date"
                                                class="primary_input_field primary-input date form-control"
                                                id="class_start_date"
                                                {{ $errors->first('class_start_date') ? 'autofocus' : '' }} type="text"
                                                name="class_start_date" value="{{ old('class_start_date') }}"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pt_15 text-center">
                        <div class="d-flex justify-content-center">
                            <button class="primary-btn semi_large2 fix-gr-bg" id="submit_form">
                                <i class="ti-check"></i>{{ __('Add Course Plan') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('backend.partials.delete_modal')
@endsection
@push('js')
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#course_id").on("change", function() {
                var url = '{{ route('getChildCourses') }}';
                var price_div = $('#child_course_price');
                var formData = {
                    id: $(this).val(),
                };
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url,
                    success: function(data) {
                        // $.loading.onAjax({img:'loading.gif'});
                        let child_course = '';
                        $.each(data, function(i, item) {
                            if (item.type == 4) {
                                child_course += `<div class="col-xl-6"><label class="primary_checkbox d-flex nowrap mr-12">
                                <input type="checkbox" name="full_course" value="` + item.id +
                                    `" id="full_course" class="child_course">
                                <span class="checkmark mr-2"></span>{{ __('Full Course') }}</label></div>`;
                            } else if (item.type == 6) {
                                child_course += `<div class="col-xl-6"><label class="primary_checkbox d-flex nowrap mr-12">
                                <input type="checkbox" name="prep_course_live" value="` + item.id +
                                    `" id="prep_course_live" class="child_course">
                                <span class="checkmark mr-2"></span>{{ __('Prep-Course (Live)') }}</label></div>`;
                            }
                            $('#child_course_section').html(child_course);
                        });

                        $('.child_course').on('change', function() {
                            const courseId = $(this).attr('id');

                            if (courseId === 'full_course') {
                                price_div.find('#full_course_price_div').toggleClass(
                                    'd-none', !this.checked);
                            } else if (courseId === 'prep_course_live') {
                                price_div.find('#prep_course_live_price_div')
                                    .toggleClass('d-none', !this.checked);
                            }
                        });
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    },
                });
            });

            $('#submit_form').on('click', function(e) {
                e.preventDefault();
                var course_plan_form = $('#course_plan_form');
                var check_box = course_plan_form.find('.child_course');
                var check_box_checked = 0;
                check_box.each(function() {
                    if (check_box.is(':checked')) {
                        check_box_checked = 1;
                    } 
                });
                console.log(check_box_checked);
                if(check_box_checked == 0){

                    toastr.error('Please Select at least one Course', 'Error');
                }else{

                    course_plan_form.submit();
                }


            });
            // var child_course_price = $('#child_course_price').find('.child_course');

            // $('.child_course').on('click', function() {
            //     console.log($(this).attr('id'));
            // });

            // $('.child_course').click(function() {
            //     alert("checked!");
            // });

        });


        // function showPriceDiv(type) {
        //     var child_course_price = $('#child_course_price');
        //     if (type == 4) {
        //         child_course_price.find('#full_course_price_div').removeClass('d-none');
        //     } else if (type == 6) {
        //         child_course_price.find('#prep_course_live_price_div').removeClass('d-none');
        //     }
        // }
    </script>
@endpush
