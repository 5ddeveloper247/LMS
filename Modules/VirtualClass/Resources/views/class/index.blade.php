@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/class.css') }}" />
@endpush
@php
    $table_name = 'virtual_classes';

@endphp
<script>
    @if (isset($class))
        var selectedProgramId = @json($class->program_id);
    @else
        var selectedProgramId = '';

    @endif
</script>
@section('table')
    {{ $table_name }}
@stop

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            @if (isset($bank))
                @if (permissionCheck('virtual-class.store'))
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 col-md-12 mb-20 text-right">
                            <a href="{{ route('virtual-class') }}" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                {{ __('common.Add') }}
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            <div class="row">
                @if (auth()->user()->role_id == 1)
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h3 class="mb-20">
                                        @if (isset($class))
                                            {{ __('common.Edit') }}
                                        @else
                                            {{ __('common.Add') }}
                                        @endif
                                        {{ __('virtual-class.Class') }}
                                    </h3>
                                </div>

                                @if (isset($class))

                                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['virtual-class.update', $class->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'virtual_class_form']) }}
                                @else
                                    @if (permissionCheck('virtual-class.create'))

                                        {{ Form::open([
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'route' => 'virtual-class.store',
                                            'method' => 'POST',
                                            'enctype' => 'multipart/form-data',
                                            'id' => 'virtual_class_form',
                                        ]) }}

                                    @endif
                                @endif
                                <input type="hidden" name="classId" id="classId" value="{{isset($class) ? $class->id : ''}}">
                                <input type="hidden" name="url" id="url" value="{{ URL::to('/') }}">
                                <div class="white-box student-details header-menu">
                                    <div class="add-visitor">
                                        @php
                                            $LanguageList = getLanguageList();
                                        @endphp
                                        <div class="row pt-0">
                                            @if (isModuleActive('FrontendMultiLang'))
                                                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3"
                                                    role="tablist">
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
                                                    <div class="row mt-25">
                                                        <div class="col-lg-12">
                                                            <div class="input-effect">
                                                                <label> {{ __('virtual-class.Title') }} *</label>
                                                                <input type="text"
                                                                    placeholder="{{ __('virtual-class.Title') }}"
                                                                    class="primary_input_field name{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                                    name="{{ $language->code == 'en' ? 'title' : '' }}"
                                                                    {{ $errors->has('title') ? ' autofocus' : '' }}
                                                                    value="{{ isset($class) ? $class->title : (old('title') != '' ? old('title') : '') }}">
                                                                <span class="focus-border textarea"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-25">
                                                        <div class="col-lg-12">
                                                            <div class="primary_input">
                                                                <label class="primary_input_label"
                                                                    for="">{{ __('jitsi.Description') }}
                                                                </label>
                                                                <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                                    placeholder="{{ __('jitsi.Description') }}" name="{{ $language->code == 'en' ? 'description' : '' }}" id="address">{{ isset($class) ? $class->description : (old('description') != '' ? old('description') : '') }}</textarea><!--{{ isset($class) ? $class->course->getTranslation('about', $language->code) : '' }} description[{{ $language->code }}] -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                            <div class="row mt-25">
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                            for="assign_instructor">{{ __('courses.Assign Instructor') }} *
                                                        </label>
                                                        <select class="primary_select category_id" name="assign_instructor"
                                                            id="assign_instructor"
                                                            {{ $errors->has('assign_instructor') ? 'autofocus' : '' }}>
                                                            <option
                                                                data-display="{{ __('common.Select') }} {{ __('courses.Instructor') }}"
                                                                value="">{{ __('common.Select') }}
                                                                {{ __('courses.Instructor') }} </option>
                                                            @foreach ($instructors as $instructor)
                                                                <option value="{{ $instructor->id }}"
                                                                    {{ isset($class) ? ($instructor->id == $class->course->user_id ? 'selected' : (old('assign_instructor') == $instructor->id ? 'selected' : '')) : (old('assign_instructor') == $instructor->id ? 'selected' : '') }}>
                                                                    {{ @$instructor->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row mt-25 d-none">
                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="assistant_instructors">{{ __('courses.Assistant Instructor') }}
                                                    </label>
                                                    <select name="assistant_instructors[]" id="assistant_instructors"
                                                        class="multypol_check_select active mb-15 e1" multiple>
                                                        @foreach ($instructors as $instructor)
                                                            <option value="{{ $instructor->id }}"
                                                                {{ isset($class) && !empty($class->course->assistantInstructorsIds) && in_array($instructor->id, $class->course->assistantInstructorsIds) ? 'selected' : '' }}>
                                                                {{ @$instructor->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if (isModuleActive('Membership'))
                                            <div class="row">
                                                <div class="col-12 mt-35">
                                                    <div class="primary_input">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <label class="primary_checkbox d-flex w-100 mr-12 mt-10">
                                                                    <input type="checkbox" id="all_level_member"
                                                                        name="all_level_member" value="old('all_level_member') != '' ? old('all_level_member') : '1'">
                                                                    <span
                                                                        class="checkmark mr-2"></span>{{ __('membership.All Level Members') }}
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-25" id="membership_level_div">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="membership_level">{{ __('membership.Membership Level') }}
                                                        </label>
                                                        <select name="membership_level" id="membership_level"
                                                            class="primary_select">
                                                            <option data-display="{{ __('membership.Select Level') }}"
                                                                value="">{{ __('membership.Select Level') }}
                                                            </option>
                                                            @foreach ($membershipLevels as $membershipLevel)
                                                                <option value="{{ $membershipLevel->id }}">
                                                                    {{ @$membershipLevel->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-25" id="membership_level_member_div">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="membership_level_members">{{ __('membership.Members') }}
                                                        </label>
                                                        <select name="membership_level_members[]"
                                                            id="membership_level_members"
                                                            class="multypol_check_select active mb-15 e1" multiple>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row mt-25 d-none">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label"
                                                    for="">{{ __('quiz.Category') }}</label>
                                                <select {{ $errors->has('category') ? ' autofocus' : '' }}
                                                    class="primary_select {{ $errors->has('category') ? ' is-invalid' : '' }}"
                                                    id="category_id" name="category">
                                                    <option data-display=" {{ __('quiz.Category') }} *" value="">
                                                        {{ __('quiz.Category') }} *
                                                    </option>


                                                    @php
                                                        if (isset($class)) {
                                                            request()->replace(['category' => $class->category_id]);
                                                        }

                                                    @endphp
                                                    @foreach ($categories as $category)
                                                        @if ($category->parent_id == 0)
                                                            @include(
                                                                'backend.categories._single_select_option',
                                                                ['category' => $category, 'level' => 1]
                                                            )
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <!--<div class="row mt-25">-->
                                        <!--    <div class="col-lg-12 mt-30-md" id="subCategoryDiv">-->
                                        <!--        <label class="primary_input_label"-->
                                        <!--               for="">{{ __('quiz.Sub Category') }}</label>-->
                                        <!--        <select {{ $errors->has('sub_category') ? ' autofocus' : '' }}-->
                                        <!--                class="primary_select{{ $errors->has('sub_category') ? ' is-invalid' : '' }} select_section"-->
                                        <!--                id="subcategory_id" name="sub_category">-->
                                        <!--            <option-->
                                        <!--                data-display=" {{ __('common.Select') }} {{ __('quiz.Sub Category') }}"-->
                                        <!--                value="">{{ __('common.Select') }}-->
                                        <!--                {{ __('quiz.Sub Category') }}-->
                                        <!--            </option>-->

                                        <!--            @if (isset($class))-->
                                        <!--                <option value="{{ @$class->sub_category_id }}" selected>-->
                                        <!--                    {{ @$class->subCategory->name }}</option>-->
                                        <!--            @endif-->
                                        <!--        </select>-->

                                        <!--    </div>-->
                                        <!--</div>-->

                                        <div class="row mt-25">
                                            <div class="col-lg-12 mt-30-md">
                                                <label class="primary_input_label"
                                                    for="">{{ __('Courses') }} *</label>
                                                <select
                                                    class="primary_select select_section"
                                                    id="allcourses" name="courses">
                                                    <option value="" >Courses *</option>

                                                    @if (isset($courses))
                                                        @foreach ($courses as $course)
                                                            <option  value="{{ $course->id }}"
                                                                {{ isset($class) && (int)$class->course_id == $course->id ? 'selected': (old('courses') == $course->id ? 'selected' : '') }}>
                                                                {{ $course->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mt-25" id="course_type_row">
                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="courseTypeId">{{ __('Course Type') }}
                                                    </label>
                                                    {{-- <select name="courseType[]" id="courseTypeId" class="multypol_check_select active mb-15 e1" multiple><!-- assistant_instructors[] --> --}}
                                                    <select name="courseType[]" id="courseTypeId" class="primary_select select_section active mb-15 e1" ><!-- assistant_instructors[] -->

	                                                    <?php
	                                                    	$course_types = (isset($class->course_types) && $class->course_types) != null ? json_decode($class->course_types): [] ;
	                                                		$program_types = (isset($class->program_types) && $class->program_types == "true" )  ? 'program' : '' ;
														?>

                                                        @if (isset($courseTypes))
	                                                        @foreach ($courseTypes as $courseType)
	                                                        	@if($courseType == 4)
	                                                                	{{$typeSlug = 'Full Course'}}
		                                                        	@elseif($courseType == 6)
		                                                        		{{$typeSlug = 'Prep-Course(Live)'}}
		                                                        	@elseif($courseType == 8)
		                                                        		{{$typeSlug = 'Repeat'}}
		                                                        	@elseif($courseType == 'program')
		                                                        		{{$typeSlug = 'Program'}}
		                                                        	@endif
	                                                            <option  value="{{ $courseType }}"
	                                                            	{{ (in_array($courseType, $course_types) || $courseType == $program_types ) ? 'selected' : '' }}>
	                                                                	{{$typeSlug}}
		                                                        	</option>
	                                                        @endforeach
	                                                    @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <label> {{ __('virtual-class.Duration') }}
                                                        {{ __('virtual-class.Per Class') }}
                                                        ({{ __('virtual-class.in Minute') }}) *</label>
                                                    <input {{ $errors->has('duration') ? ' autofocus' : '' }}
                                                        class="primary_input_field name{{ $errors->has('duration') ? ' is-invalid' : '' }}"
                                                        type="number" name="duration" placeholder="30"
                                                        value="{{ isset($class) ? $class->duration : (old('duration') != '' ? old('duration') : '') }}">
                                                    <span class="focus-border"></span>

                                                </div>
                                            </div>
                                        </div>
                                        @if (showEcommerce())
                                            <div class="row mt-25 d-none">
                                                <div class="col-lg-12">
                                                    <div class="checkbox_wrap d-flex align-items-center">
                                                        <label for="edit_course" class="switch_toggle">
                                                            <input type="checkbox" name="free"
                                                                {{ isset($class) && $class->fees == 0 ? 'checked' : (old('free') != '' ? 'checked' : '') }}
                                                                class="free_class" id="edit_course" value="0">
                                                            <i class="slider round"></i>
                                                        </label>
                                                        <label>{{ __('virtual-class.This class is free') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-25 fees d-none"
                                                @if (isset($class) && $class->fees == 0) style="display:none;" @endif>
                                                <div class="col-lg-12">
                                                    <div class="input-effect">
                                                        <label> {{ __('virtual-class.Fees') }} *</label>
                                                        <input
                                                            class="primary_input_field name{{ $errors->has('fees') ? ' is-invalid' : '' }}"
                                                            type="number" name="fees"
                                                            value="{{ isset($class) ? $class->fees : (old('fees') != '' ? old('fees') : 0) }}">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mt-25">
                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('common.Image') }} <small>(size: 1170x600)</small>  </label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input filePlaceholder placeholder_txt" type="text"
                                                            placeholder="{{ isset($class) && $class->image ? showPicName($class->image) : __('virtual-class.Browse Image file') }}"
                                                            readonly=""
                                                            {{ $errors->has('image') ? ' autofocus' : '' }}>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg placeholder_txt"
                                                                for="document_file">{{ __('common.Browse') }}</label>
                                                            <input type="file" class="d-none fileUpload"
                                                                name="image" id="document_file" accept=".jpg, .jpeg, .png, .bmp">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-none">
                                            <div class="col-xl-12 mt-25">
                                                <label>{{ __('courses.View Scope') }} </label>
                                                <select class="primary_select" name="scope" id="">
                                                    <option value="1"
                                                        {{ @$class->course->scope == '1' ? 'selected' : '' }}>
                                                        {{ __('courses.Public') }}
                                                    </option>

                                                    <option {{ @$class->course->scope == '0' ? 'selected' : '' }}
                                                        value="0">
                                                        {{ __('courses.Private') }}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        @if (isModuleActive('Org'))

                                            <div class="row">
                                                <div class="col-xl-12 mt-25">
                                                    <label>{{ __('courses.Required Type') }} </label>
                                                    <select class="primary_select" name="required_type" id="">
                                                        <option value="1"
                                                            {{ @$class->course->required_type == '1' ? 'selected' : '' }}
                                                            {{ !isset($class) ? 'selected' : '' }}>
                                                            {{ __('courses.Compulsory') }}
                                                        </option>

                                                        <option
                                                            {{ @$class->course->required_type == '0' ? 'selected' : '' }}
                                                            value="0">
                                                            {{ __('courses.Open') }}
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label"
                                                    for="">{{ __('virtual-class.Language') }} *</label>
                                                <select class="primary_select" name="lang_id" id="">
                                                    <option
                                                        data-display="{{ __('common.Select') }} {{ __('common.Language') }}"
                                                        value="">{{ __('common.Select') }}
                                                        {{ __('common.Language') }}</option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}"
                                                            @if (!isset($class)) @if ($language->id == 19) selected @endif
                                                            @endif
                                                            {{ isset($class) && $class->lang_id == $language->id ? 'selected' : '' }}
                                                            >{{ $language->native }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-25 d-none @if (isset($class)) d-none @endif">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label"
                                                    for="">{{ __('virtual-class.Type') }}</label>
                                                <select class="primary_select type {{ $errors->has('type') ? ' is-invalid' : '' }}"
                                                    id="type" name="type">
                                                    <option value="0"
                                                        {{ isset($class) && $class->type == 0 ? 'selected' : old('type') }}>
                                                        {{ __('virtual-class.Single Class') }}</option>
                                                    <option value="1" selected
                                                        {{ isset($class) && $class->type == 1 ? 'selected' : old('type') }}>
                                                        {{ __('virtual-class.Continuous Class') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-25 continuous_class">
                                            <div class="col-xl-12 d-none">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('coupons.Start Date') }}</label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input placeholder="Start Date"
                                                                        class="primary_input_field primary-input date form-control {{ @$errors->has('start_date') ? ' is-invalid' : '' }}"
                                                                        id="start_date" type="text" name="start_date"
                                                                        value="{{ isset($class) ? date('m/d/Y', strtotime($class->start_date)) : getJsDateFormat(date('m/d/Y')) }}"
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
                                            <div class="col-xl-12 mt-25 d-none">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('virtual-class.End Date') }}</label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input placeholder="End Date"
                                                                        class="primary_input_field primary-input date form-control {{ @$errors->has('end_date') ? ' is-invalid' : '' }}"
                                                                        id="end_date" type="text" name="end_date"
                                                                        value="{{ isset($class) ? date('m/d/Y', strtotime($class->end_date)) : getJsDateFormat(date('m/d/Y')) }}"
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

                                            <div class="col-xl-12 mt-25">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('Class Day') }} *</label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">

                                                                    <select placeholder="Days"
                                                                        class="primary_input_field primary-input form-control {{ @$errors->has('days') ? ' is-invalid' : '' }}"
                                                                        id="days" type="text" name="days"
                                                                        autocomplete="off">
                                                                        <option value="" selected>Choose Class Day
                                                                        </option>
                                                                        <option value="Mon"
                                                                            {{ isset($class) ? ($class->class_day == 'Mon' ? 'selected' : '') : (old('days') == 'Mon' ? 'selected' : '') }}>
                                                                            Monday</option>
                                                                        <option value="Tue"
                                                                            {{ isset($class) ? ($class->class_day == 'Tue' ? 'selected' : '') : (old('days') == 'Tue' ? 'selected' : '') }}>
                                                                            Tuesday</option>
                                                                        <option value="Wed"
                                                                            {{ isset($class) ? ($class->class_day == 'Wed' ? 'selected' : '') : (old('days') == 'Wed' ? 'selected' : '') }}>
                                                                            Wednesday</option>
                                                                        <option value="Thu"
                                                                            {{ isset($class) ? ($class->class_day == 'Thu' ? 'selected' : '') : (old('days') == 'Thu' ? 'selected' : '') }}>
                                                                            Thursday</option>
                                                                        <option
                                                                            value="Fri"{{ isset($class) ? ($class->class_day == 'Fri' ? 'selected' : (old('days') == 'Fri' ? 'selected' : '')) : (old('days') == 'Fri' ? 'selected' : '') }}>
                                                                            Friday</option>
                                                                        <option value="Sat"
                                                                            {{ isset($class) ? ($class->class_day == 'Sat' ? 'selected' : (old('days') == 'Sat' ? 'selected' : '')) : (old('days') == 'Sat' ? 'selected' : '') }}>
                                                                            Saturday</option>
                                                                        <option value="Sun"
                                                                            {{ isset($class) ? ($class->class_day == 'Sun' ? 'selected' : (old('days') == 'Sun' ? 'selected' : '')) : (old('days') == 'Sun' ? 'selected' : '') }}>
                                                                            Sunday</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div @if (isset($class) && $class->type == 1) style="display: none" @endif
                                            class="row mt-25 single_class d-none">

                                            <div class="col-xl-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="">{{ __('virtual-class.Date') }}</label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">

                                                                    <input placeholder="Date" readonly
                                                                        class="primary_input_field primary-input date form-control {{ @$errors->has('date') ? ' is-invalid' : '' }}"
                                                                        id="start_date" type="text" name="date"
                                                                        value="{{ isset($class) && $class->type == 0 ? date('m/d/Y', strtotime($class->start_date)) : getJsDateFormat(date('m/d/Y')) }}"
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



                                        </div>
                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <label>{{ __('virtual-class.Time') }} <span>*</span></label>
                                                <div class="primary_input">
                                                    <input required
                                                        class="primary-input primary_input_field time form-control{{ @$errors->has('time') ? ' is-invalid' : '' }}"
                                                        type="text" name="time"
                                                        value="{{ isset($class) ? old('time', $class->time) : old('time') }}">

                                                </div>


                                            </div>
                                        </div>
                                        <div class="row @if (isset($class)) d-none @endif">
                                            <div class="col-md-12 mt-25">
                                                <label class="primary_input_label" for="">
                                                    {{ __('virtual-class.Host') }} </label>
                                            </div>

                                            <div class="col-md-6 mb-25">
                                                <label for="type1" class="primary_checkbox d-flex mr-12">
                                                    <input type="radio" class="common-checkbox" id="type1"
                                                        name="host" value="Team"
                                                        {{-- @if (isset($class)) @if ($class->host == 'Zoom') checked @endif --}}
                                                        @if (isset($class)) @if ($class->host == 'Zoom') checked @endif
                                                        @if (isset($class)) @if ($class->host == 'Team') checked @endif @endif
                                                    @else checked @endif>
                                                    <span
                                                        class="checkmark mr-2"></span>{{ __('virtual-class.Zoom') }}</label>
                                            </div>

                                            @if (isModuleActive('BBB'))
                                                <div class="col-md-6 mb-25">
                                                    <label for="type2" class="primary_checkbox d-flex mr-12">
                                                        <input type="radio" class="common-checkbox" id="type2"
                                                            name="host" value="BBB"
                                                            @if (isset($class)) @if ($class->host == 'BBB') checked @endif
                                                            @endif
                                                        >
                                                        <span class="checkmark mr-2"></span>
                                                        {{ __('virtual-class.BBB') }}
                                                    </label>
                                                </div>
                                            @endif

                                            @if (isModuleActive('Jitsi'))
                                                <div class="col-md-6 mb-25">
                                                    <label for="type3" class="primary_checkbox d-flex mr-12">
                                                        <input type="radio" class="common-checkbox" id="type3"
                                                            name="host" value="Jitsi"
                                                            @if (isset($class)) @if ($class->host == 'Jitsi') checked @endif
                                                            @endif
                                                        >
                                                        <span class="checkmark mr-2"></span>
                                                        {{ __('jitsi.Jitsi') }}</label>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="mt-25 single_class zoomSetting @if (isset($class)) d-none @endif"
                                            style="display: {{ isset($class) ? ($class->host == 'Zoom' ? 'block' : 'none') : 'block' }}">

                                            <div class="row d-none">
                                                <div class="col-xl-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="password">{{ __('zoom.Password') }} *</label>
                                                        <div class="primary_datepicker_input">
                                                            <div class="no-gutters input-right-icon">
                                                                <div class="col">
                                                                    <div class="">
                                                                        <input placeholder="Password"
                                                                            class="primary_input_field primary-input form-control"
                                                                            id="password" type="text" name="password"
                                                                            value="123456" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 mt-25" style="display: none;">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="password">{{ __('zoom.Recurring') }}</label>
                                                        <div class="primary_datepicker_input">
                                                            <div class="no-gutters input-right-icon">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-25">
                                                                        <div class="mr-30">
                                                                            <label class="primary_checkbox d-flex mr-12"
                                                                                for="recurring_options1">
                                                                                <input type="radio" name="is_recurring"
                                                                                    id="recurring_options1" value="1"
                                                                                    class="common-radio recurring-type">
                                                                                <span class="checkmark mr-2"></span>
                                                                                {{ __('zoom.Yes') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-25">
                                                                        <div class="mr-30">
                                                                            <label class="primary_checkbox d-flex mr-12"
                                                                                for="recurring_options2">
                                                                                <input type="radio" name="is_recurring"
                                                                                    id="recurring_options2" value="0"
                                                                                    checked
                                                                                    class="common-radio recurring-type">
                                                                                <span class="checkmark mr-2"></span>
                                                                                {{ __('zoom.No') }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="zoom-recurrence-section-hide">
                                                <div class="row">
                                                    <div class="col-xl-12 mt-25">
                                                        <select {{ $errors->has('recurring_type') ? ' autofocus' : '' }}
                                                            class="primary_select {{ $errors->has('recurring_type') ? ' is-invalid' : '' }}"
                                                            id="recurring_type" name="recurring_type">
                                                            <option data-display="{{ __('zoom.Recurrence type') }} *"
                                                                value="">{{ __('zoom.Student') }}
                                                                {{ __('zoom.Recurrence type') }} *
                                                            </option>
                                                            <option value="1"
                                                                {{ old('recurring_type') == 1 ? 'selected' : '' }}>
                                                                {{ __('zoom.Daily') }}
                                                            </option>
                                                            <option value="2"
                                                                {{ old('recurring_type') == 2 ? 'selected' : '' }}>
                                                                {{ __('zoom.Weekly') }}
                                                            </option>
                                                            <option value="3"
                                                                {{ old('recurring_type') == 3 ? 'selected' : '' }}>
                                                                {{ __('zoom.Monthly') }}
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-12 mt-25">
                                                        <select
                                                            {{ $errors->has('recurring_repect_day') ? ' autofocus' : '' }}
                                                            class="primary_select {{ $errors->has('recurring_repect_day') ? ' is-invalid' : '' }}"
                                                            id="recurring_repect_day" name="recurring_repect_day">
                                                            <option data-display=" Select *" value="">
                                                                {{ __('zoom.Zoom Recurring Repeat') }}*
                                                            </option>
                                                            @for ($i = 1; $i <= 15; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ old('recurring_repect_day') == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>

                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-xl-12 mt-25">
                                                        <div class="primary_input">
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input id="recurring_end_date"
                                                                                class="primary_input_field primary-input date form-control"
                                                                                placeholder="{{ __('zoom.Recurring End') }}"
                                                                                type="text" name="recurring_end_date"
                                                                                value="{{ isset($class) ? getJsDateFormat($class->start_date) : getJsDateFormat(date('m/d/Y')) }}"
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
                                                </div>
                                            </div>

                                            <div class="row mt-25">
                                                <div class="col-xl-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('zoom.Attached File') }}
                                                        </label>
                                                        <div class="primary_file_uploader">
                                                            <input class="primary-input filePlaceholder placeholder_txt" type="text"
                                                                placeholder="{{ isset($editdata->attached_file) && @$editdata->attached_file != '' ? getFilePath3(@$editdata->attached_file) : trans('zoom.Attached File') }}"
                                                                readonly=""
                                                                {{ $errors->has('attached_file') ? ' autofocus' : '' }}>
                                                            <button class="" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                    for="attached_file">{{ __('common.Browse') }}</label>
                                                                <input type="file" class="d-none fileUpload"
                                                                    name="attached_file" id="attached_file"
                                                                    accept=".jpeg, .png, .jpg, .doc, .docx, .pdf, .xls, .xlsx">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-25 single_class bbbSetting @if (isset($class)) d-none @endif"
                                            style="display: {{ isset($class) ? ($class->host == 'BBB' ? 'block' : 'none') : 'none' }}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('bbb.Attendee Password') }}
                                                        </label>
                                                        <input
                                                            class="primary_input_field form-control{{ $errors->has('attendee_password') ? ' is-invalid' : '' }}"
                                                            type="text" name="attendee_password" autocomplete="off"
                                                            placeholder="{{ __('bbb.Attendee Password') }}"
                                                            value="{{ isset($editdata) ? old('topic', $editdata->attendee_password) : old('attendee_password', '12345678') }}">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-25">
                                                <div class="col-lg-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('bbb.Moderator Password') }}
                                                        </label>
                                                        <input
                                                            class="primary_input_field form-control{{ $errors->has('moderator_password') ? ' is-invalid' : '' }}"
                                                            type="text" name="moderator_password"
                                                            placeholder="{{ __('bbb.Moderator Password') }}"
                                                            autocomplete="off"
                                                            value="{{ isset($editdata) ? old('topic', $editdata->moderator_password) : old('moderator_password', '123456') }}">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-25 single_class jitsiSetting @if (isset($class)) d-none @endif"
                                            style="display: {{ isset($class) ? ($class->host == 'Jitsi' ? 'block' : 'none') : 'none' }}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="primary_input">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('jitsi.Meeting ID/Room') }}
                                                        </label>
                                                        <input
                                                            class="primary_input_field form-control{{ $errors->has('jitsi_meeting_id') ? ' is-invalid' : '' }}"
                                                            type="text" name="jitsi_meeting_id" autocomplete="off"
                                                            placeholder="{{ __('jitsi.Meeting ID/Room') }}"
                                                            value="{{ date('ymdhmi') }}">

                                                        <span class="focus-border"></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (Settings('frontend_active_theme') == 'edume')
                                            <div class="row mt-25">
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('courses.Key Point') }} (1)</label>
                                                        <input class="primary_input_field" name="what_learn1"
                                                            placeholder="-" type="text"
                                                            value="{{ isset($class) ? old('what_learn1', $class->course->what_learn1 ?? '') : old('what_learn1') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                            for="">{{ __('courses.Key Point') }} (2) </label>
                                                        <input class="primary_input_field" name="what_learn2"
                                                            placeholder="-" type="text"
                                                            value="{{ isset($class) ? old('what_learn2', $class->course->what_learn2 ?? '') : old('what_learn2') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mt-25 d-none">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label"
                                                    for="certificate">{{ __('certificate.Certificate') }}</label>
                                                <div class="primary_input">
                                                    <select class="primary_select" name="certificate" id="certificate">
                                                        <option
                                                            data-display="{{ __('common.Select') }} {{ __('certificate.Certificate') }}"
                                                            value="">{{ __('common.Select') }}
                                                            {{ __('certificate.Certificate') }} </option>
                                                        @foreach ($certificates as $certificate)
                                                            <option value="{{ $certificate->id }}"
                                                                {{ isset($class) ? ($certificate->id == $class->course->certificate_id ? 'selected' : '') : '' }}>
                                                                {{ @$certificate->title }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-25">
                                            <div class="col-lg-12 text-center">
                                                <button type="button" class="primary-btn fix-gr-bg" onclick="formValidations(this);"
                                                    data-toggle="tooltip">
                                                    <span class="ti-check"></span>
                                                    @if (isset($class))
                                                        {{ __('common.Update') }}
                                                    @else
                                                        {{ __('common.Save') }}
                                                    @endif
                                                    {{ __('virtual-class.Class') }}
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->role_id == 1)
                    <div class="col-lg-8">
                @endif
                <div class="col-lg-12">

                    <div class="main-title">
                        <h3 class="mb-20">{{ __('virtual-class.Class List') }}</h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="Crm_table_active3 table">
                                    <thead>
                                        @if (session()->has('message-success-delete') != '' || session()->get('message-danger-delete') != '')
                                            <tr>
                                                <td colspan="5">
                                                    @if (session()->has('message-success-delete'))
                                                        <div class="alert alert-success">
                                                            {{ session()->get('message-success-delete') }}
                                                        </div>
                                                    @elseif(session()->has('message-danger-delete'))
                                                        <div class="alert alert-danger">
                                                            {{ session()->get('message-danger-delete') }}
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>{{ __('common.SL') }}</th>
                                            <th>{{ __('virtual-class.Title') }}</th>
                                            @if (isModuleActive('Org'))
                                                {{-- <th>{{ __('courses.Required Type') }}</th> --}}
                                            @endif
                                            <th>{{ __('virtual-class.Category') }}</th>
                                            <th>{{ __('virtual-class.Sub Category') }}</th>
                                            {{-- <th>{{ __('virtual-class.Language') }}</th> --}}
                                            <th>{{ __('virtual-class.Duration') }}</th>
                                            @if (showEcommerce())
                                                {{-- <th>{{ __('virtual-class.Fees') }}</th> --}}
                                            @endif
                                            {{-- <th>{{ __('virtual-class.Type') }}</th> --}}
                                            {{-- <th>{{ __('virtual-class.Start Date') }}</th> --}}
                                            <th>{{ __('Day') }}</th>
                                            <th>{{ __('virtual-class.Time') }}</th>
                                            <th>{{ __('virtual-class.Host') }}</th>
                                            {{-- <th>{{ __('courses.View Scope') }}</th> --}}
                                            <th>{{ __('common.Status') }}</th>
                                            <th>{{ __('common.Action') }}</th>
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
    </section>

    <div class="modal fade admin-query" id="deleteClass">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Delete') }} </h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('virtual-class.destroy') }}" method="post">
                        @csrf

                        <div class="text-center">

                            <h4>{{ __('common.Are you sure to delete ?') }} </h4>
                        </div>
                        <input type="hidden" name="id" value="" id="classDeleteId">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>

                            <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade admin-query" id="courseTypeConfirm">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Course Type') }} </h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="text-center">

                            <h4 id="courseTypConfirmMessage"></h4>
                        </div>

                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <button class="primary-btn fix-gr-bg" type="button" onclick="mergeCourseTypeExisting();">{{ __('Yes') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/') }}/Modules/Membership/Resources/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            let status = false;
            divHideSHow(status);

            $(document).on('click', '#all_level_member', function() {
                let status = $(this).is(':checked');

                divHideSHow(status);
            });

            function divHideSHow(status) {

                if (status == true) {
                    $('#membership_level_div').addClass('d-none');
                    $('#membership_level_member_div').addClass('d-none');
                } else {
                    $('#membership_level_div').removeClass('d-none');
                    $('#membership_level_member_div').removeClass('d-none');
                }
            }
        })
    </script>
    @php
        $url = route('getAllVirtualClassData');
    @endphp

    <script>

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
                url: '{!! $url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                @if (isModuleActive('Org'))
                    // {
                    //     data: 'required_type',
                    //     name: 'courses.required_type'
                    // },
                @endif {
                    data: 'category_name',
                    name: 'category.name'
                },
                {
                    data: 'subCategory',
                    name: 'subCategory.name',
                    orderable: false
                },
                // {
                //     data: 'language',
                //     name: 'language.name'
                // },
                {
                    data: 'duration',
                    name: 'duration'
                },
                {
                    data: 'class_day',
                    name: 'class_day'
                },
                @if (showEcommerce())
                    // {
                    //     data: 'fees',
                    //     name: 'fees'
                    // },
                @endif
                // {
                //     data: 'type',
                //     name: 'type'
                // },
                // {
                //     data: 'start_date',
                //     name: 'start_date'
                // },
                // {
                //     data: 'end_date',
                //     name: 'end_date'
                // },
                {
                    data: 'time',
                    name: 'time'
                },
                {
                    data: 'host',
                    name: 'host',
                    render: function(data, type, row) {

            if (type === 'display') {
                return 'Team';
            }
            return data;
        }
                },
                // {
                //     data: 'scope',
                //     name: 'scope'
                // },
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
                    targets: 1
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


        $(document).on('click', '.deleteClass', function() {
            let id = $(this).data('id');
            $('#classDeleteId').val(id);
            $("#deleteClass").modal('show');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#category_id').change(function() {

                $("#allcourses").siblings().find('ul').empty();
                $("#allcourses").siblings().find('span').empty();

                var id = $("#category_id option:selected").val();
                $.ajax({

                    type: 'get',
                    url: '{{ URL::to('virtualclass/getcourses') }}',
                    data: {
                        'id': id
                    },

                    success: function(data) {
                        $.each(data, function(i, item) {
                            $('#allcourses').append($('<option>', {
                                value: item.id,
                                text: item.slug
                            }));

                            $("#allcourses").siblings().find('ul').append(
                                '<li class="option" data-value="' + item.id + '">' +
                                item.slug + '</li>'
                          	);

                        });

                    },


                });
            });
        });
        $(document).ready(function() {
            checkProgramSelect();
            $('#assign_instructor').change(function() {

                $("#allcourses").siblings().find('ul').empty();
                $("#allcourses").siblings().find('span').empty();

                var id = $("#assign_instructor option:selected").val();

                $.ajax({

                    type: 'get',
                    url: '{{ URL::to('virtualclass/getinstructorcourses') }}',
                    data: {
                        'id': id
                    },

                    success: function(data) {
                        $.each(data, function(i, item) {
                            var type = item.type == '8' ? '(Repeat)' : '';
                            $('#allcourses').append($('<option>', {
                                value: item.id,
                                text: item.slug
                            }));

                            $("#allcourses").siblings().find('ul').append(
                                '<li class="option" data-value="' + item.id + '">' +
                                item.slug +' '+type+ '</li>'
                          	);
                        });
                    },
                });
            });
        });

        // $(document).ready(function() {
            $('#allcourses').change(function(e) {
                e.preventDefault();
            	$("#courseTypeId").empty();
               	$("#courseTypeId").siblings().find('ul').empty();
               	$("#courseTypeId").siblings().find('span').empty();

                var id = $("#allcourses option:selected").val();

                $.ajax({

                    type: 'get',
                    url: '{{ URL::to('virtualclass/getcoursetype') }}',
                    data: {
                        'id': id
                    },

                    success: function(data) {
                        $.each(data, function(i, item) {

                            var slug = '';
              							if(item == 4){
              								slug = 'Full Course';
              							}else if(item == 5){
              								slug = 'Prep-Course';
              							}else if(item == 6){
              								slug = 'Prep-Course Live';
              							}else if(item == 8){
              								slug = 'Repeat Course';
              							}else if(item == 'program'){
              								slug = 'Program';
              							}else{
              								slug = '';
              							}

                            $('#courseTypeId').append('<option value="' + item + '">' + slug + '</option>');

                            $("#courseTypeId").siblings().find('ul').append(
                                '<li data-value="'+ item +'" class="option focus">'+ slug +'</li>'
								// '<li data-search-term="'+slug+'" class=""><label for="ms-opt-'+slug+'"><span class="checkmark"></span><input type="checkbox" title="'+slug+'" id="ms-opt-'+slug+'" value="'+item+'">'+slug+'</label></li>'
                          	);
                        });
                    },
                });
            });
        // });
        $('#courseTypeId').change(function (e) {
            e.preventDefault();
            checkProgramSelect();


        });
        function checkProgramSelect(){
            var courseType = $("#courseTypeId").val();
            var courseId = $("#allcourses").val();
            console.log(courseType, courseId);
            var strToLower = courseType;
            var programHtml = '';

            $('#program_list_row').remove();
            if(strToLower == 'program'){



            $.ajax({

                type: 'get',
                url: '{{ URL::to('virtualclass/getprogram') }}',
                data: {
                    'id': courseId
                },

                success: function(data) {

                    programHtml +=`<div class="row mt-25" id="program_list_row">
                                    <div class="col-xl-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="courseTypeId">{{ __('Program List') }}
                                            </label>

                                            <select name="programList" id="programList" class="primary_select select_section active mb-15 e1" >
                                                <option>Select Program</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>`;

                                $('#course_type_row').after(programHtml);
                                $.each(data, function(i, item) {
                                    if(item.id == selectedProgramId){
                                        var select = 'selected'
                                    }else{
                                        var select = ''
                                    }

                                    $('#programList').append('<option value="' + item.id + '" '+select+'>' + item.programtitle + '</option>');

                                    $("#programList").siblings().find('ul').append(
                                        '<li data-value="'+ item.id +'" class="option focus">'+ item.programtitle +'</li>'
                                        );

                                });
                                $('#programList').niceSelect();


                }
            });

            }
        }

        function mergeCourseTypeExisting(){

        	$('.preloader').show();

        	var form = $("#virtual_class_form");

        	var id = form.find("input[name='classId']").val();
        	var title = form.find("input[name='title']").val();
        	var course = form.find("select[name='courses']").val();
        	var assign_instructor = form.find("select[name='assign_instructor']").val();
        	var time = form.find("input[name='time']").val();
        	var days = form.find("select[name='days']").val();
        	var duration = form.find("input[name='duration']").val();
        	var courseType = form.find("select[name='courseType[]']").val()

            $.ajax({
                type: 'post',
                url: '{{ URL::to('virtualclass/mergeCourseTypeExist') }}',
                data: {
                    'id': id,
                    'title': title,
                    'course': course,
                    'assign_instructor': assign_instructor,
                    'time': time,
                    'days': days,
                    'duration': duration,
                    'courseType':  courseType
                },
                success: function(data) {

                	if(data.done == true || data.done == 'true'){
                		$('.preloader').hide();
                		$("#courseTypConfirmMessage").text('');
						$("#courseTypeConfirm").modal('hide');
                		toastr.success(data.success, 'Success', 1000);

						setTimeout(function(){
							location.reload(true);
						}, 1500);
                    }
                },
                error: function(e){
                  console.log(e);
                }

            })

        }
        function formValidations(button){
    		$('.preloader').show();
    	    var errors = [];

    	    var form = $(button).closest("form");


    	   	if (isEmpty(form.find("input[name='title']").val())) {
    	    	errors.push('Title is required.');
    	    }
    	    if(form.find("input[name='title']").val() != ''){
    	    	if (form.find("input[name='title']").val().length > 80) {
        	    	errors.push('Title must be less then 80 characters.');
        	    }
        	}

    	  	if (isEmpty(form.find("select[name='assign_instructor']").val())) {
    	    	errors.push('Choose Instructor first.');
    	    }
    	  	if (isEmpty(form.find("select[name='courses']").val())) {
    	    	errors.push('Choose Course first.');
    	    }
    	    if(form.find("select[id='courseTypeId']").find("option").length !== 0){
    	    	if (isEmpty(form.find("select[name='courseType[]']").val())) {
        	    	errors.push('Choose Course Type first.');
        	    }
        	}

    	    if (isEmpty(form.find("input[name='duration']").val())) {
    	    	errors.push('Duration is required.');
    	    }
    	    if (isEmpty(form.find("select[name='lang_id']").val())) {
    	    	errors.push('Choose Language first.');
    	    }
    	    if (isEmpty(form.find("select[name='days']").val())) {
    	    	errors.push('Choose Class Day first.');
    	    }
    	    if (isEmpty(form.find("input[name='time']").val())) {
    	    	errors.push('Time is required.');
    	    }

    	    var id = form.find("input[name='classId']").val();
        	var title = form.find("input[name='title']").val();
        	var course = form.find("select[name='courses']").val();
        	var assign_instructor = form.find("select[name='assign_instructor']").val();
        	var time = form.find("input[name='time']").val();
        	var days = form.find("select[name='days']").val();
        	var duration = form.find("input[name='duration']").val();
        	// var courseType = form.find("select[name='courseType']").val();
        	var programList = form.find("select[name='programList']").val();
        	var courseType = form.find("select[name='courseType[]']").val()

            $.ajax({
                type: 'post',
                url: '{{ URL::to('virtualclass/validateClass') }}',
                data: {
                    'id': id,
                    'title': title,
                    'course': course,
                    'assign_instructor': assign_instructor,
                    'time': time,
                    'days': days,
                    'duration': duration,
                    'courseType':  courseType,
                    'programList':  programList
                },
                success: function(data) {

					if(data.done == 'merge'){
						$('.preloader').hide();
						$("#courseTypConfirmMessage").text(data.error);
						$("#courseTypeConfirm").modal('show');
						return;
					}
					if(data.done == false || data.done == 'false' || data.done == 'exist'){
                   		errors.push(data.error);
                 	}

                   	if (errors.length) {
//         	       		console.log(errors);
        	        	$('.preloader').hide();
        	          	$('input[type="submit"]').attr('disabled', false);
        	          	$.each(errors.reverse(), function (index, item) {
        	        		toastr.error(item, 'Error', 1000);
        	          	});
        	       		return false;
        	   		}
        	      	form.submit();

                },
                error: function(e){
                  console.log(e);
                }
            })
    	}
    </script>

    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
    <script src="{{ asset('public/backend/js/zoom.js') }}"></script>
    <script src="{{ asset('public/backend/js/team.js') }}"></script>
@endpush
