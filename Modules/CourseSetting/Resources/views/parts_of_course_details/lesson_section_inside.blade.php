@if (routeIs('CourseChapterShow'))
    {{ Form::open([
        'class' => 'form-horizontal',
        'id' => 'addLessonInside_form',
        'files' => true,
        'route' => 'saveChapter',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ]) }}
@else
    @if (isset($editChapter) || isset($editLesson))
        {{ Form::open(['class' => 'form-horizontal', 'id' => 'addLessonInside_form', 'files' => true, 'route' => 'updateChapter', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
    @else
        {{ Form::open([
            'class' => 'form-horizontal',
            'id' => 'addLessonInside_form',
            'files' => true,
            'route' => 'saveChapter',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
        ]) }}
    @endif
@endif


@php
    $key = $key + 100;
@endphp
<input type="hidden" id="url" value="{{ url('/') }}">
<input type="hidden" name="course_id" value="{{ @$course->id }}">
<input type="hidden" name="chapter_id" value="{{ @$chapter->id }}">
<div class="section-white-box">
    <div class="add-visitor">

        <div class="row">
            <div class="col-lg-12">
                <input type="hidden" name="input_type" value="0" id="">
                <div class="lesson_div">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="input-effect mt-2 pt-1">
                                <label>{{ __('courses.Lesson') }} {{ __('common.Name') }}
                                    <span>*</span><small>(Max: 150 characters)</small></label>
                                <input
                                    class="primary_input_field name{{ $errors->has('chapter_name') ? ' is-invalid' : '' }}"
                                    type="text" name="name" id="insideLesson_name"
                                    placeholder="{{ __('courses.Lesson') }} {{ __('common.Name') }}" autocomplete="off"
                                    value="{{ isset($editLesson) ? $editLesson->name : '' }}" maxlength="150">
                                <input type="hidden" name="lesson_id"
                                    value="{{ isset($editLesson) ? $editLesson->id : '' }}">
                                <span class="focus-border"></span>
                                @if ($errors->has('chapter_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chapter_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">

                            {{-- <div class="input-effect mt-2 pt-1">
                                <label>{{ __('common.Duration') }} ({{ __('common.In Minute') }}) </label>
                                <input
                                    class="primary_input_field name{{ $errors->has('chapter_name') ? ' is-invalid' : '' }}"
                                    min="0" step="any" type="number" name="duration"
                                    placeholder="{{ __('courses.Duration') }}" autocomplete="off"
                                    value="{{ isset($editLesson) ? $editLesson->duration : '' }}">

                                <span class="focus-border"></span>
                                @if ($errors->has('chapter_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('chapter_name') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            @if (isModuleActive('Org'))
                                @include('coursesetting::parts_of_course_details._org_host_select')
                            @endif


                            <div class="defaultHost {{ isModuleActive('Org') ? 'd-none' : '' }}">
                                <div class="input-effect mt-2 pt-1">
                                    <label class="primary_input_label mt-1" for=""> {{ __('courses.Host') }}
                                        <span>*</span></label>


                                    <select class="primary_select category_id host_select" onchange="getval(this);"
                                        name="host"
                                        data-key="{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                        id="category_id{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}">
                                        <option data-display="{{ __('common.Select') }} {{ __('courses.Host') }}"
                                            value="">{{ __('common.Select') }} {{ __('courses.Host') }}
                                        </option>

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option class="" value="Youtube"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Youtube' ? 'selected' : '') : '' }}>
                                                Youtube
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Self"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Self' ? 'selected' : '') : '' }}>
                                                Self
                                            </option>
                                        @endif

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="URL"
                                                {{ isset($editLesson) ? ($editLesson->host == 'URL' ? 'selected' : '') : '' }}>
                                                Video URL
                                            </option>
                                        @endif --}}

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Image"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Image' ? 'selected' : '') : '' }}>
                                                Image
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="PDF"
                                                {{ isset($editLesson) ? ($editLesson->host == 'PDF' ? 'selected' : '') : '' }}>
                                                PDF File
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Word"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Word' ? 'selected' : '') : '' }}>
                                                Word File
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Excel"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Excel' ? 'selected' : '') : '' }}>
                                                Excel File
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Text"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Text' ? 'selected' : '') : '' }}>
                                                Text File
                                            </option>
                                        @endif

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="Zip"
                                                {{ isset($editLesson) ? ($editLesson->host == 'Zip' ? 'selected' : '') : '' }}>
                                                Zip File
                                            </option>
                                        @endif

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="GoogleDrive"
                                                @if (@$editLesson->host == 'GoogleDrive') Selected @endif
                                                @if (empty(@$editLesson) && @$editLesson->host == 'GoogleDrive') selected @endif>
                                                Google Drive
                                            </option>
                                        @endif --}}

                                        @if (isTutor() || isAdmin() || isInstructor())
                                            <option value="PowerPoint"
                                                {{ isset($editLesson) ? ($editLesson->host == 'PowerPoint' ? 'selected' : '') : '' }}>
                                                Power Point File
                                            </option>
                                        @endif

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            @if (isModuleActive('AmazonS3'))
                                                <option value="AmazonS3"
                                                    {{ isset($editLesson) ? ($editLesson->host == 'AmazonS3' ? 'selected' : '') : '' }}>
                                                    Amazon S3
                                                </option>
                                            @endif
                                        @endif --}}

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            @if (isModuleActive('SCORM'))
                                                <option value="SCORM"
                                                    {{ isset($editLesson) ? ($editLesson->host == 'SCORM' ? 'selected' : '') : '' }}>
                                                    SCORM Self
                                                </option>
                                            @endif
                                        @endif --}}

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            @if (isModuleActive('AmazonS3') && isModuleActive('SCORM'))
                                                <option value="SCORM-AwsS3"
                                                    {{ isset($editLesson) ? ($editLesson->host == 'SCORM-AwsS3' ? 'selected' : '') : '' }}>
                                                    SCORM AWS S3
                                                </option>
                                            @endif
                                        @endif --}}

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            @if (isModuleActive('XAPI'))
                                                <option value="XAPI"
                                                    @if (empty(@$editLesson) == 'XAPI') selected @endif>
                                                    XAPI Self
                                                </option>
                                            @endif
                                        @endif --}}

                                        {{-- @if (isTutor() || isAdmin() || isInstructor())
                                            @if (isModuleActive('AmazonS3') && isModuleActive('XAPI'))
                                                <option value="XAPI-AwsS3"
                                                    @if (empty(@$editLesson) == 'XAPI-AwsS3') selected @endif>
                                                    XAPI AWS S3
                                                </option>
                                            @endif
                                        @endif --}}

                                        @if (isTutor() || isAdmin() || isInstructor())
                                    </select>
                                    @if ($errors->has('host'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('host') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                @endif

                                <div class="input-effect mt-2 pt-1"
                                    id="videoUrl{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                    style="display:@if ((isset($editLesson) && ($editLesson->host != 'Youtube' && $editLesson->host != 'URL')) || !isset($editLesson)) none @endif">
                                    <label>{{ __('courses.Video URL') }}
                                        <span>*</span></label>
                                    <input id="youtubeVideo"
                                        class="primary_input_field name{{ $errors->has('video_url') ? ' is-invalid' : '' }}"
                                        type="text" name="video_url" placeholder="{{ __('courses.Video URL') }}"
                                        autocomplete="off"
                                        value="@if (isset($editLesson)) @if ($editLesson->host == 'Youtube' || $editLesson->host == 'URL'){{ $editLesson->video_url }} @endif @endif">
                                    <span class="focus-border"></span>
                                    @if ($errors->has('video_url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('video_url') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-effect mt-2 pt-1"
                                    id="iframeBox{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                    style="display: @if ((isset($editLesson) && $editLesson->host != 'Iframe') || !isset($editLesson)) none @endif">
                                    <div class="" id="">

                                        <label>{{ __('courses.Iframe URL') }}
                                            <span>*</span></label>
                                        <input
                                            class="primary_input_field name{{ $errors->has('iframe_url') ? ' is-invalid' : '' }}"
                                            type="text" name="iframe_url"
                                            placeholder="{{ __('courses.Iframe (Provide the source only)') }}"
                                            autocomplete="off"
                                            value="@if (isset($editLesson)) @if ($editLesson->host == 'Iframe'){{ $editLesson->video_url }} @endif @endif">
                                        <span class="focus-border"></span>
                                        @if ($errors->has('video_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('video_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="input-effect mt-2 pt-1"
                                    id="vimeoUrl{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                    style="display: @if ((isset($editLesson) && $editLesson->host != 'Vimeo') || !isset($editLesson)) none @endif">
                                    <div class="" id="">
                                        @if (config('vimeo.connections.main.upload_type') == 'Direct')
                                            <div class="primary_file_uploader">
                                                <input class="primary-input filePlaceholder" type="text"
                                                    id="" {{ $errors->has('image') ? 'autofocus' : '' }}
                                                    placeholder="{{ __('courses.Browse Video file') }}"
                                                    readonly="">
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_thumb_vimeo_lesson_section_insider{{ $key }}">{{ __('common.Browse') }}</label>
                                                    <input type="file" class="d-none fileUpload" name="vimeo"
                                                        id="document_file_thumb_vimeo_lesson_section_insider{{ $key }}">
                                                </button>
                                            </div>
                                        @else
                                            <select class="select2 lessonVimeo vimeoVideoLesson" name="vimeo">
                                                <option
                                                    data-display="{{ __('common.Select') }} {{ __('courses.Video') }}"
                                                    value="">{{ __('common.Select') }}
                                                    {{ __('courses.Video') }}
                                                </option>
                                                @if (isset($editLesson))
                                                    <option value="{{ $editLesson->video_url }}" selected>
                                                    </option>
                                                @endif
                                            </select>
                                        @endif
                                        @if ($errors->has('vimeo'))
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong>{{ $errors->first('vimeo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-effect mt-2 pt-1"
                                    id="VdoCipherUrl{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                    style="display: @if ((isset($editLesson) && $editLesson->host != 'VdoCipher') || !isset($editLesson)) none @endif">
                                    <div class="" id="">

                                        <select class="lessonVdocipher VdoCipherVideoLesson" name="vdocipher"
                                            id="VdoCipherVideo">
                                            <option
                                                data-display="{{ __('common.Select') }} {{ __('courses.Video') }}"
                                                value="">{{ __('common.Select') }} {{ __('courses.Video') }}
                                            </option>
                                            @if (isset($editLesson))
                                                <option value="{{ $editLesson->video_url }}" selected>
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('vdocipher'))
                                            <span class="invalid-feedback invalid-select" role="alert">
                                                <strong>{{ $errors->first('vdocipher') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="input-effect mt-2 pt-1"
                                    id="fileupload{{ isset($editSection) ? '_edit_' : '' }}{{ isset($editLesson) ? $editLesson->id : $key }}"
                                    style="display: @if (
                                        (isset($editLesson) &&
                                            ($editLesson->host == 'Vimeo' ||
                                                $editLesson->host == 'Youtube' ||
                                                $editLesson->host == 'VdoCipher' ||
                                                $editLesson->host == 'Iframe' ||
                                                $editLesson->host == 'URL')) ||
                                            !isset($editLesson)) none @endif">
                                    <input type="file" class="filepond" name="file" id="hostFile{{ @$chapter->id }}">
                                </div>

                            </div>


                            <div class="input-effect mt-2 pt-1">
                                <div class="" id="">
                                    <label class="primary_input_label mt-1"
                                        for="">{{ __('courses.Privacy') }}
                                        <span>*</span> </label>
                                    <select class="primary_select" name="is_lock" id="is_lock">
                                        <option data-display="{{ __('common.Select') }} {{ __('courses.Privacy') }} "
                                            value="">{{ __('common.Select') }} {{ __('courses.Privacy') }}
                                        </option>
                                        @if (isset($editLesson))
                                            <option value="0" @if (@$editLesson->is_lock == 0) selected @endif>
                                                {{ __('courses.Unlock') }}</option>
                                            <option value="1" @if (@$editLesson->is_lock == 1) selected @endif>
                                                {{ __('courses.Locked') }}</option>
                                        @else
                                            <option value="0">{{ __('courses.Unlock') }}</option>
                                            <option value="1" selected>{{ __('courses.Locked') }}</option>
                                        @endif


                                    </select>
                                    @if ($errors->has('is_lock'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('is_lock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="input-effect mt-2 pt-1">
                                <label>{{ __('common.Description') }}
                                </label>

                                <textarea class="primary_textarea height_128" name="description" id="description" cols="30" rows="10">{{ isset($editLesson) ? $editLesson->description : '' }}</textarea>


                                <span class="focus-border"></span>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button type="button" class="primary-btn fix-gr-bg" onclick="lesson_inside_form(this);"
                    data-toggle="tooltip">
                    <span class="ti-check"></span>
                    {{ __('common.Save') }}
                </button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@push('scripts')
    <script>
        function getval(sel) {
            var value = sel.value;
            if (value.toLowerCase() === 'self') {
                $('.filepond--browser').attr('accept', 'video/*');
            } else if (value.toLowerCase() === 'image') {
                $('.filepond--browser').attr('accept', 'image/*');
            } else if (value.toLowerCase() === 'pdf') {
                $('.filepond--browser').attr('accept', '.pdf');
            } else if (value.toLowerCase() === 'doc' || value.toLowerCase() === 'docx' || value.toLowerCase() === 'word') {
                $('.filepond--browser').attr('accept', '.doc,.docx');
            } else if (value.toLowerCase() === 'excel') {
                $('.filepond--browser').attr('accept', '.xlsx,.xls');
            } else if (value.toLowerCase() === 'text') {
                $('.filepond--browser').attr('accept', '.txt,.csv,.log');
            } else if (value.toLowerCase() === 'zip') {
                $('.filepond--browser').attr('accept', '.zip');
            } else if (value.toLowerCase() === 'powerpoint') {
                $('.filepond--browser').attr('accept', '.ppt,.pptx');
            } else {
                $('.filepond--browser').attr('accept', '');
            }

            $('.filepond--browser').val('');
        }
    </script>
@endpush
