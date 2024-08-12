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
    $table_name = 'package_pricing';
@endphp
@section('table')
    {{ $table_name }}
@stop
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">

        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>{{ __('Edit New Package') }} </h4>

            </div>
            <form action="{{ route('updatePackage') }}" method="POST" enctype="multipart/form-data" id="package_form"
                class="row">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id ?? old('id') }}">
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="title">{{ __('Title') }}
                            <small>(Max Size 50 Characters)</small> *</label>
                        <input type="text" name="title" id="title" placeholder="-"
                            class="primary_input_field mb-15" maxlength="50" value="{{ $package->title ?? old('title') }}">
                    </div>
                </div>
                
                <div class="col-xl-4">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="price">{{ __('Price') }}
                        </label>
                        <input type="text" name="price" id="price" placeholder="-" @if($packagepurchases > 0) readonly @endif
                            class="primary_input_field @if($packagepurchases == 0) mb-15 @endif" maxlength="30" value="{{ $package->price ?? old('price') }}">
                        @if($packagepurchases > 0)
                        <small class="text-danger">Package has already been bought so this input can't be changed</small>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="allowed_courses">{{ __('Allowed Courses') }}
                        </label>
                        <input type="number" name="allowed_courses" id="allowed_courses" placeholder="-"
                            class="primary_input_field @if($packagepurchases == 0) mb-15 @endif"  @if($packagepurchases > 0) readonly @endif
                            value="{{ $package->allowed_courses ?? old('allowed_courses') }}">
                            @if($packagepurchases > 0)
                        <small class="text-danger">Package has already been bought so this input can't be changed</small>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="package_term">{{ __('Package Term') }}
                        </label>
                        <select name="package_term" id="package_term" placeholder="-"  @if($packagepurchases > 0) readonly @endif
                            class="primary_input_field @if($packagepurchases == 0) mb-15 @endif">
                            <option value="mo" @if($package->package_term == 'mo') selected
                                @else
                                @if($packagepurchases > 0) disabled @endif
                                @endif>per month</option>
                            <option value="annum" @if($package->package_term == 'annum') selected
                                @else
                                @if($packagepurchases > 0) disabled @endif
                                @endif>per annum</option>
                        </select>
                        @if($packagepurchases > 0)
                        <small class="text-danger">Package has already been bought so this input can't be changed</small>
                        @endif
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="option_1">{{ __('Option 1') }}
                            <small>(Max Size 100 Characters)</small> *</label>
                        <input type="text" name="option_1" id="option_1" placeholder="-"
                            class="primary_input_field mb-15" maxlength="100"
                            value="{{ $package->option_1 ?? old('option_1') }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="option_2">{{ __('Option 2') }}
                            <small>(Max Size 100 Characters)</small> *</label>
                        <input type="text" name="option_2" id="option_2" placeholder="-"
                            class="primary_input_field mb-15" maxlength="100"
                            value="{{ $package->option_2 ?? old('option_2') }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="option_3">{{ __('Option 3') }}
                            <small>(Max Size 100 Characters)</small> *</label>
                        <input type="text" name="option_3" id="option_3" placeholder="-"
                            class="primary_input_field mb-15" maxlength="100"
                            value="{{ $package->option_3 ?? old('option_3') }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="option_4">{{ __('Option 4') }}
                            <small>(Max Size 100 Characters)</small> *</label>
                        <input type="text" name="option_4" id="option_4" placeholder="-"
                            class="primary_input_field mb-15" maxlength="100"
                            value="{{ $package->option_4 ?? old('option_4') }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="option_5">{{ __('Option 5') }}
                            <small>(Max Size 100 Characters)</small> *</label>
                        <input type="text" name="option_5" id="option_5" placeholder="-"
                            class="primary_input_field mb-15" maxlength="100"
                            value="{{ $package->option_5 ?? old('option_5') }}">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-35">
                        <label class="primary_input_label" for="">{{ __('Description') }}
                            <small>(Max Size 200 Characters)</small> *</label>
                        <textarea class="primary_input_field" name="description" id="description" cols="30" rows="5"
                            maxlength="200">{{ $package->description ?? old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-lg-12 pt_15 text-center">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="primary-btn semi_large2 fix-gr-bg"><i
                                class="ti-check"></i>{{ __('Update Package') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('backend.partials.delete_modal')
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.note-editable').eq(6).keydown(function() { //Use appropriate listener
                var text = $(this).html();
                $('#description').val(text)
                console.log(text, $('#description').val());
            });
        });
    </script>
    <script>
        // Image Cropper Start
        $(document).ready(function() {

            // Summer Note
            $('.custom_summernote').summernote({
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
        });

        function isEmptySummernote(id) {
            if ($(id).summernote('isEmpty')) {
                return true;
            }
            return false;
        }
    </script>
@endpush
