@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}"/>
    <style>
        .image-editor-preview-img-1 {
            width: 180px;
            height: 90px;
            object-fit: contain;
        }
    </style>
@endpush


@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-title">
                        <h3>{{ __('Program') }}</h3>
                    </div>
                </div>
            </div>


            <form action="{{ route('updateprogram') }}" method="POST" enctype="multipart/form-data"
                  id="program_update_form">
                @csrf
                <div class="row">
                    <div class="col-lg-12">


                        <div class="white-box">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="main-title">

                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-30 mb-40">

                                    <input type="hidden" name="id" value="{{ $progaram->id }}">

                                    <div class="col-xl-6">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program Title <small>(Max size
                                                    30 Characters)</small> *</label>
                                            <input class="primary_input_field" name="ProgramTitle" placeholder="-"
                                                   id="addTitle" maxlength="30" type="text"

                                                   value="{{ $progaram->programtitle }}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program
                                                subtitle/greetings <small>(Max size
                                                    30 Characters)</small> *</label>
                                            <input class="primary_input_field" name="subtitle" placeholder="-"
                                                   id="subtitle" maxlength="30" type="text"

                                                   value="{{ $progaram->subtitle }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-5">
                                        <label class="primary_input_label">
                                            Course Thumbnail (Max Image Size 1MB, Recommended Dimensions: 1170X600)
                                        </label>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="primary_input mb-35">
                                            <div class="primary_file_uploader" id="image_file-1">
                                                <input class="primary-input filePlaceholder placeholder_txt" type="text" id="input-1"
                                                       {{ $errors->has('image') ? 'autofocus' : '' }}
                                                       placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                                <button onclick="destroyCropper1()" class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" id="avatar"
                                                           for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                                    <input type="file" class="d-none fileUpload upload-editor-1"
                                                           name="image" id="document_file_thumb-1"
                                                           accept=".png,.jpg,.jpeg">
                                                    <input type="hidden" name="hidden_file" id="cropper_img"
                                                           class="upload-editor-hidden-file-1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 text-center">
                                        <img src="{{ getCourseImage($progaram->icon) }}"
                                             class="preview image-editor-preview-img-1" id="image_preview-1"/>
                                    </div>

                                    <?php
                                    $allfaqs = ($progaram->faqs == "null" || $progaram->faqs == null) ? [] : json_decode($progaram->faqs);
                                    ?>

                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="faqs">Select Faqs *</label>
                                            <select name="faqs[]" id="faqs"
                                                    class="multypol_check_select active mb-15 e1" multiple>


                                                @foreach ($faqs as $faq)
                                                    <option value="{{ $faq->id }}"
                                                        {{ in_array($faq->id, $allfaqs) == $faq->id ? 'selected' : '' }}>
                                                        {{ $faq->question }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label>Featured</label>
                                        <div class="d-flex py-3">
                                            <label class="primary_checkbox d-flex nowrap mr-5" for="featuredYes">
                                            <input type="radio" id="featuredYes"
                                                name="featured" @if($progaram->featured == 1) checked @endif
                                                value="1">
                                            <span class="checkmark mr-2"></span>
                                            {{ __('Yes') }}</label>
                                            <label class="primary_checkbox d-flex nowrap mr-5" for="featuredNo">
                                            <input type="radio" id="featuredNo"
                                                name="featured" @if($progaram->featured == 0) checked @endif
                                                value="0">
                                            <span class="checkmark mr-2"></span>
                                            {{ __('No') }}</label>
                                        </div>
                                     </div>
                                </div>

                                {{--                                <div class="row mt-30 d-none mb-40">--}}

                                {{--                                    <div class="col-xl-6">--}}

                                {{--                                        <div class="primary_input mb-25">--}}
                                {{--                                            <label class="primary_input_label" for="">Program duration in--}}
                                {{--                                                weeks *</label>--}}
                                {{--                                            <input class="primary_input_field" name="duration" placeholder="-weeks"--}}
                                {{--                                                   id="addTitle" type="number"--}}
                                {{--                                                 --}}
                                {{--                                                   value="{{ $progaram->duration }}">--}}
                                {{--                                        </div>--}}
                                {{--                                       --}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-xl-6">--}}
                                {{--                                        <div class="primary_input mb-25">--}}
                                {{--                                            <label class="primary_input_label" for=""> Program total cost *</label>--}}
                                {{--                                            <input class="primary_input_field" name="totalcost" placeholder="-"--}}
                                {{--                                                   id="addTitle" type="text"--}}
                                {{--                                                --}}
                                {{--                                                   value="{{ $progaram->totalcost }}">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}


                                <div class="row mt-30 mb-40">

                                    <div class="col-xl-12">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program description</label>
                                            <textarea class="custom_summernote" name="description" id="description"
                                                      cols="30" rows="10">{!! $progaram->discription !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-30 mb-40">


                                    <div class="col-xl-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for=""> Program outcome *</label>
                                            <textarea class="custom_summernote" name="outcome" id="outcome" cols="30"
                                                      rows="10">{!! $progaram->outcome !!}</textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for=""> Program
                                                requirements *</label>
                                            <textarea class="custom_summernote" name="requirements" id="requirements"
                                                      cols="30"
                                                      rows="10">{!! $progaram->requirement !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-30 mb-40">
                                    {{--                                          <div class="col-xl-6"> --}}

                                    {{--                                <div class="primary_input mb-25"> --}}
                                    {{--                                            <label class="primary_input_label" --}}
                                    {{--                                                   for="">Number of courses </label> --}}
                                    {{--                                            <input class="primary_input_field" name="numberofcourses" --}}
                                    {{--                                                   placeholder="-" --}}
                                    {{--                                                   id="addTitle" --}}
                                    {{--                                                   type="number" {{$errors->has('title') ? 'autofocus' : ''}} --}}
                                    {{--                                                   value="{{$progaram->numberofcourses}}" > --}}
                                    {{--                                        </div> --}}
                                    {{--                                      </div> --}}

                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="assistant_instructors">Select
                                                Courses *</label>
                                            <select name="allcourses[]" id="allcourses"
                                                    class="multypol_check_select active mb-15 e1" multiple>

                                                <?php
                                                $allcourses = json_decode($progaram->allcourses);

                                                ?>
                                                @foreach ($courses as $courses1)
                                                    <option value="{{ $courses1->id }}"
                                                        {{ in_array($courses1->id, $allcourses) ? 'selected' : '' }}>
                                                        {{ $courses1->slug }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="assign_instructor">{{ __('SELECT REVIEW') }}
                                            </label>
                                            <select class="primary_select " name="review"
                                                    id="review"
                                            >
                                                <option
                                                    data-display="{{ __('common.Select') }} {{ __('Review') }}"
                                                    value="">{{ __('common.Select') }}
                                                    {{ __('Review') }} </option>
                                                @foreach ($reviews as $review)
                                                    @if(empty(\App\Models\User::find($review->user_id)))
                                                        @continue
                                                    @endif
                                                    @if(empty(\Modules\CourseSetting\Entities\Course::find($review->course_id)))
                                                        @continue
                                                    @endif
                                                    <option value="{{ $review->id }}"
                                                        {{ $review->id == $progaram->review_id ? 'selected' : '' }}>
                                                        {{ !empty($review->course()) ? $review->course()->title : '' }} {{ \Illuminate\Support\Str::limit($review->comment,15) }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program Costing Details *</label>
                                            <textarea class="custom_summernote" name="Payment_plan" id="Payment_plan"
                                                      cols="30" rows="10">{!! $progaram->payment_plan !!}</textarea>
                                        </div>
                                    </div>
                                </div>


                                {{--                            @if ($progaram->status == '1') --}}
                                {{--                            <div class="custom-control custom-switch"> --}}
                                {{--                              <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1"  > --}}
                                {{--                              <label class="custom-control-label" for="customSwitch1">Status</label> --}}
                                {{--                            </div> --}}
                                {{--                            @else --}}

                                {{--                               <div class="custom-control custom-switch"> --}}
                                {{--                              <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1" > --}}
                                {{--                              <label class="custom-control-label" for="customSwitch1">Status</label> --}}
                                {{--                            </div> --}}

                                {{--                            @endif --}}


                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <a class="primary-btn fix-gr-bg" href="javascript:void(0)"
                                           onclick="program_update_form()">
                                            <span class="ti-check"></span>
                                            {{ __('update') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- 1st Modal --}}
        <div class="modal fade admin-query" id="image-editor-modal-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crop Program Image</h4>
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
    <script>
        function program_update_form() {
            $('.preloader').show();
            var errors = [];
            isUnique(
                {
                    columns: [
                        ['courses', 'title', $('#addTitle').val()]
                    ]
                }
                , function (res) {
                    errors = [...res.errors]
                    var type = $(".addType[name='type']:checked").val(); // 1 for course, 7 for timetable, 2 for big quiz

                    if (isEmpty($('#addTitle').val())) {
                        errors.push('Program Title is required');
                    }
                    if (isEmpty($('#subtitle').val())) {
                        errors.push('Program subtitle is required');
                    }

                    if (isEmpty($('#faqs').val())) {
                        errors.push("FAQS is required");
                    }

                    if (isEmptySummernote('#description')) {
                        errors.push("Description is required");
                    }
                    if (isEmptySummernote('#outcome')) {
                        errors.push("Outcome is required");
                    }
                    if (isEmptySummernote('#requirements')) {
                        errors.push("Requirement is required");
                    }

                    if (isEmpty($('#allcourses').val())) {
                        errors.push("Courses is required");
                    }

                    if (isEmptySummernote('#Payment_plan')) {
                        errors.push("Program Costing Details is required");
                    }

                    if (errors.length) {
                        console.log(errors);
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function (index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                        return false;
                    }

                    $('#program_update_form').submit();
                });

        }

        // Image Cropper Start
        $(document).ready(function () {
            // 1st Cropper
            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb-1").change(function (e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 1170 && image_height == 600) {
                            jQuery('#image-editor-modal-1').modal('show', {
                                backdrop: 'static'
                            });
                        } else {
                            $('#input-1, #document_file_thumb-1').val('');
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                'Error')
                        }
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });
            $('.image-editor-cancel-button-1').on('click', function () {
                if ($('#image_preview-1').attr('src') != '' || $('#image_preview-1').attr('src') != null) {
                    $('#image_file-1').children().val('');
                }
                $('#image-editor-modal-1').trigger("reset");
                $('#image-editor-modal-1').modal('hide');
            });

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
                    ['view', ['fullscreen','codeview']],
                ],
                height: 188,
                tooltip: true
            });
//             $('.lms_summernote').summernote({
//                 fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
//                 codeviewFilter: true,
//                 codeviewIframeFilter: true,
//                 toolbar: [
//                     ['style', ['style']],
//                     ['font', ['bold', 'underline', 'clear']],
//                     ['fontname', ['fontname']],
//                     ['fontsize', ['fontsize']],
//                     ['color', ['color']],
//                     ['para', ['ul', 'ol', 'paragraph']],
//                     ['table', ['table']],
//                     ['insert', ['link', 'picture', 'video']],
//                     ['view', ['fullscreen']],
//                 ],
//                 height: 188,
//                 tooltip: true
//             });
        });
        // Image Cropper End

        $(".imgBrowse").change(function (e) {

            e.preventDefault();

            var file = $(this).closest('.primary_file_uploader').find('.imgName');

            var filename = $(this).val().split('\\').pop();

            file.val(filename);

        });
        $("#save_button_parent").click(function () {
            $(this).attr('disabled');
            $(this).find('span').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');
        });
    </script>
@endsection
