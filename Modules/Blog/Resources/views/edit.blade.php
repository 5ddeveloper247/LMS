@extends('backend.master')
@push('styles')
    <style>
        .image-editor-preview-img-1 {
            width: 180px;
            height: 90px;
            object-fit: contain;
        }
    </style>
@endpush
@section('mainContent')
    @php
        $LanguageList = getLanguageList();
    @endphp
    <link rel="stylesheet" href="{{ asset('Modules/Blog/Resources/views/assets/taginput/tagsinput.css') }}" />

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">


            <div class="white_box mb_30">
                <div class="white_box_tittle list_header">
                    <h4>{{ __('common.Edit') }} {{ __('blog.Blog') }}</h4>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="student-details header-menu">
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
                                <form action="{{ route('blogs.update', $blog->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" value="{{ $blog->id }}" name="id">
                                    @csrf

                                    <div class="tab-content">
                                        {{-- @foreach ($LanguageList as $key => $language) --}}
                                            <div role="tabpanel"
                                                class="tab-pane fade show active"
                                                id="elemen">

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label" for="">
                                                            {{ __('blog.Title') }}
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input
                                                            class="primary_input_field addTitle addTitleActive"
                                                            name="title" placeholder="-"
                                                            type="text"
                                                            value="{{ old('title', $blog->title) }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-35">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('blog.Blog') }}
                                                            {{ __('blog.Description') }}

                                                        </label>
                                                        <textarea class="custom_summernote" name="description" id="description" cols="30"
                                                            rows="10">{{ old('description', $blog->description) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- @endforeach --}}
                                    </div>

                                    <div class="row">


                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> {{ __('blog.Slug') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input class="primary_input_field addSlug" name="slug" placeholder="-"
                                                    type="text" value="{{ old('slug', $blog->slug) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 courseBox mb-25">
                                            <label class="primary_input_label" for=""> {{ __('quiz.Category') }}
                                                <strong class="text-danger">*</strong>
                                            </label>
                                            <select class="primary_select category_id" name="category" id="category_id"
                                                {{ $errors->has('category') ? 'autofocus' : '' }}>
                                                <option
                                                    data-display="{{ __('common.Select') }} {{ __('quiz.Category') }} *"
                                                    value="">{{ __('common.Select') }} {{ __('quiz.Category') }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ @$category->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-25">
                                            <div class="d-flex flex-column">
                                                <label class="primary_input_label">Featured</label>
                                                <div class="" style="display: grid; gap: 6px;">
                                                    <label class="primary_checkbox d-flex mr-12">
                                                        <input type="radio" id="featured_yes" name="featured" value="1" @if($blog->featured == 1) checked @endif>
                                                        <span class="checkmark mr-2"></span>Yes
                                                    </label>
                                                    <label class="primary_checkbox d-flex mr-12">
                                                        <input type="radio" id="featured_no" name="featured" value="0" @if($blog->featured == 0) checked @endif>
                                                        <span class="checkmark mr-2"></span>No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 courseBox mb-25" id="subCategoryDiv">


                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> {{ __('common.Tags') }}

                                                </label>
                                                <input type="text" data-role="tagsinput" name="tags"
                                                    value="{{ $blog->tags }}" class="primary_input_field">

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row mt-20">
                                        <div class="col-xl-5">
                                            <label class="primary_input_label">
                                                Course Thumbnail (Max Image Size 1MB, Recommended Dimensions: 1170X600)
                                            </label>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="primary_input mb-35">
                                                {{-- <div class="primary_file_uploader" id="image_file-1">
                                                    <input class="primary-input filePlaceholder" type="text"
                                                        id="input-1" {{ $errors->has('image') ? 'autofocus' : '' }}
                                                        placeholder="{{ __('courses.Browse Image file') }}" readonly=""
                                                        value="{{ showPicName($blog->image) }}">
                                                    <button onclick="destroyCropper1()" class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                                            for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                                        <input type="file" class="d-none fileUpload upload-editor-1"
                                                            name="image" id="document_file_thumb-1">
                                                        <input type="hidden" name="hidden_file" id="cropper_img"
                                                            class="upload-editor-hidden-file-1">
                                                    </button>
                                                </div> --}}
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder placeholder_txt" type="text"
                                                        id=""
                                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="document_file_thumb_2">{{ __('common.Browse') }}</label>
                                                        <input type="file" class="d-none fileUpload" name="image"
                                                            id="document_file_thumb_2" accept="image/*">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 text-center">
                                            <img src="{{ getCourseImage($blog->thumbnail) }}"
                                                class="preview image-editor-preview-img-1" id="image_preview-1" />
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for="">{{ __('blog.Publish Date') }}</label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Start Date"
                                                                    class="primary_input_field primary-input date form-control"
                                                                    id="start_date" type="text" name="publish_date"
                                                                    value="{{ getJsDateFormat($blog->authored_date) }}"
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

                                        <div class="col-xl-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for="">{{ __('blog.Publish Time') }}</label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="Start Time"
                                                                    class="primary_input_field primary-input time form-control"
                                                                    id="start_time" type="text" name="publish_time"
                                                                    value="{{ $blog->authored_time }}"
                                                                    autocomplete="off">

                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-time" id="start-time-icon"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @if (isModuleActive('OrgInstructorPolicy'))
                                            @include('blog::partials.org_audience')
                                            @include('blog::partials.position_audience')
                                        @endif
                                    </div>


                                    <div class="col-lg-12 pt_15 text-center">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"
                                                type="submit"><i class="ti-check"></i> {{ __('common.Update') }}
                                                {{ __('blog.Blog') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 1st Modal --}}
        <div class="modal fade admin-query" id="image-editor-modal-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crop Blog Image</h4>
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
    </section>
    <script src="{{ asset('public/backend/js/blog_list.js') }}"></script>

@endsection

@push('scripts')
    <script src="{{ asset('Modules/Blog/Resources/views/assets/taginput/tagsinput.js') }}"></script>
    <script>
        // Image Cropper Start
        $(document).ready(function() {

            var customFontFam = ['Arial','Helvetica','Cavolini','Jost','Impact','Tahoma','Verdana','Garamond','Georgia','monospace','fantasy','Papyrus','Poppins'];
            
            $('.custom_summernote').each(function (){
                var elId = $(this).attr('id');
                ClassicEditor
                .create( document.getElementById(elId),{
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload',['_token' => csrf_token()]) }}",
                    },
                mediaEmbed : {
                    previewsInData: true,
                    removeProviders: [ 'instagram', 'twitter', 'googleMaps', 'flickr', 'facebook' ],
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
				// 'imageTextAlternative',
				// 'toggleImageCaption',
				'imageStyle:inline',
				'imageStyle:block',
				'imageStyle:side'
			],
            insert: {
                // This is the default configuration, you do not need to provide
                // this configuration key if the list content and order reflects your needs.
                integrations: [ 'upload', 'url' ]
            }
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
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

            // 1st Cropper
            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb-1").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width == 1170 && image_height == 600) {
                            jQuery('#image-editor-modal-1').modal('show', {
                                backdrop: 'static'
                            });
                        } else {
                            $('#input-1').val('');
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                'Error')
                        }
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });

            $("#document_file_thumb_2").on('change',function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (file.type.startsWith('image/')) {
                        img = new Image();
                        img.onload = function() {
                            var image_width = img.width;
                            // var image_width = this.width;
                            var image_height = img.height;
                            // var image_height = this.height;
                            console.log(image_width,image_height);
                            if (image_width != 1170 || image_height != 600) {
                                $('#input-1').val('');
                                $('#document_file_thumb_2').val('');
                                // e.preventDefault();
                                toastr.error(
                                    'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                                    'Error')
                            }
                        };
                        img.src = URL.createObjectURL(file);
                    } else {
                            $('#document_file_thumb_2').val('');
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
        });
        // Image Cropper End

        $('#selectBranch').on('hidden.bs.modal', function() {
            let total = $('.changeOrgStatus:checked').length;
            if (total === 0) {
                $('#type1').prop('checked', true);
            }
        })
    </script>
@endpush
