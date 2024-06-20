<style>
    .breadcam_wrap {
        max-width: unset !important;
    }

    .rounded-card {
        border-radius: 25px !important;
    }

    .rounded-card-header {
        border-radius: 25px !important;
    }

    .rounded-card-img {
        border-top-left-radius: 25px !important;
        border-top-right-radius: 25px !important;
    }

    .section-margin-y {
        margin: 60px auto !important;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .filter-tabs input[type="radio"],
    .filter-tabs input[type="checkbox"] {
        display:none;
    }
  
    /* @media (width > 1650px) {
        .breadcrumb_area .breadcam_wrap h3 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }

        p {
            font-size: 28px !important;
            line-height: 1.2 !important;
        }

        h4 {
            font-size: 31px !important;
            line-height: 25px;
        }

        span {
            font-size: 1.4rem !important;
            line-height: 25px !important;

        }

        small {
            font-size: 1.4rem !important;
            line-height: 25px !important;
        }

        h5 {
            font-size: 28px !important;
            line-height: 1.5 !important;
        }

        .theme_btn {
            font-size: 28px !important;
        }

    } */
    .nav-sub-links {
        border: 1px solid #D7D7D7 !important;
        border-radius: 20px !important;
    }

    .nav-sub-links.active,
    .filter-tabs input[type="radio"]:checked + label.nav-sub-links,
    .filter-tabs input[type="checkbox"]:checked + label.nav-sub-links
    {
        background-color: var(--system_primery_color) !important;
        color: #fff !important;
        border: 1px solid var(--process--text-color) !important;
    }

    .nav-sub-links:hover {
        color: #fff !important;
        background-color: var(--system_primery_color) !important;
        border: 1px solid var(--process--text-color) !important;
    }
</style>

<div>
    <div class="container py-3 py-md-5">
        <h2 class="custom_small_heading px-md-5 px-2">Please Choose Type</h2>
        <div class="filter-tabs">
        <div class="d-flex align-items-center px-md-5 px-2">
            <ul class="nav nav-pills d-flex flex-sm-nowrap align-items-center justify-content-between gap-0 gap-md-1 mt-3 tab-padding" id="pills-tab" role="tablist">
                <li id="filter-type" class="nav-item px-1 mb-2" role="presentation">
                    <button class="nav-sub-links user-pending nav-link text-nowrap px-2 px-md-3 py-1 m-0 d-flex flex-column align-items-center justify-content-center active" type="button" role="tab" aria-controls="pills-user-pending" aria-selected="true">
                        Type
                    </button>
                </li>
                <li id="filter-name" class="nav-item px-1 mb-2" role="presentation">
                    <button class="nav-sub-links user-list nav-link text-nowrap px-2 px-md-3 py-1 m-0 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-list" aria-selected="false" tabindex="-1">
                        Name
                    </button>
                </li>
                <li id="filter-prep-course-type" class="nav-item px-1 mb-2" role="presentation">
                    <button class="nav-sub-links create-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-list" aria-selected="false" tabindex="-1">
                        Prep-Courses Type
                    </button>
                </li>
                <li id="filter-prize" class="nav-item px-1 mb-2" role="presentation">
                    <button class="nav-sub-links transfer-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false" tabindex="-1">
                        Price
                    </button>
                </li>
                {{-- <li id="filter-duration" class="nav-item px-1" role="presentation">
                    <button class="nav-sub-links transfer-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false" tabindex="-1">
                        Duration
                    </button>
                </li> --}}
            </ul>

        </div>
        <!-- filter type  -->
        <div id="filter-type-content">
            <div class="d-flex align-items-center px-md-5 px-2">
                <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 mt-3 tab-padding" id="pills-tab" role="tablist">
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_type" id="typeProgram" value="program" @if($request->has('search_type') && $request->get('search_type') == 'program') checked @endif>
                        <label for="typeProgram" class="nav-sub-links user-pending nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-pending" aria-selected="true">
                            Programs
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_type" id="typeCourse" value="course" @if($request->has('search_type') && $request->get('search_type') == 'course') checked @endif>
                        <label for="typeCourse" class="nav-sub-links user-list nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-list" aria-selected="false" tabindex="-1">
                            Courses
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- filter title  -->
        <div id="filter-name-content" style="display: none">
            <div class="d-flex flex-column align-items-start px-md-5 px-2">
                <label for="program_title">Search Course / Program</label>
                {{-- <input type="text" name="program_title" class="form-control form-control-sm" id="program_title" value="{{ request()->has('filter') ? request()->input('program_title','') : '' }}" placeholder="Enter Program Name"> --}}
                <div class="align-items-center d-flex input-group bg-light w-75">
                    <input type="text" class="form-control bg-transparent" id="search_query" placeholder="Search for Courses / Programs" value="{{$request->has('query') ? $request->get('query') : ''}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search for Courses / Programs'">
                                            <div class="input-group-prepend">
                                                <button class="btn" type="button" id="search_button"><i class="ti-search"></i>
                                                </button>
                                            </div>

                                        </div>
                
                <div id="program_list" class="position-absolute"></div>
            </div>
        </div>
                <!-- filter prep course type  -->

        <div id="filter-prep-course-type-content" style="display: none;">
            <div class="d-flex flex-column align-items-start px-md-5 px-2">
            <div class="col-md-12 mt-3">
                        <h6>Course Type</h6>
                    </div>
                    <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 mt-3 mb-2 tab-padding" id="pills-tab" role="tablist">
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="big_quiz" id="search_big_quiz" @if($request->has('search_courseType') && $request->get('search_courseType') == 'big_quiz') checked @endif>
                        <label for="search_big_quiz" class="nav-sub-links user-pending nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-pending" aria-selected="true">
                            Big Quiz
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="full_course" id="search_full_course" @if($request->has('search_courseType') && $request->get('search_courseType') == 'full_course') checked @endif>
                        <label for="search_full_course" class="nav-sub-links user-list nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-list" aria-selected="false" tabindex="-1">
                            Full Course
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="prep_course_ondemand" id="search_prep_course_ondemand" @if($request->has('search_courseType') && $request->get('search_courseType') == 'prep_course_ondemand') checked @endif>
                        <label for="search_prep_course_ondemand" class="nav-sub-links create-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-user-list" aria-selected="false" tabindex="-1">
                            Prep-Course(On-Demand)
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="prep_course_live" id="search_prep_course_live" @if($request->has('search_courseType') && $request->get('search_courseType') == 'prep_course_live') checked @endif>
                        <label for="search_prep_course_live" class="nav-sub-links transfer-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false" tabindex="-1">
                        Prep-Course(Live)
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="time_table" id="search_time_table" @if($request->has('search_courseType') && $request->get('search_courseType') == 'time_table') checked @endif>
                        <label for="search_time_table" class="nav-sub-links transfer-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false" tabindex="-1">
                            Time Table
                        </label>
                    </li>
                    <li class="nav-item px-1 mb-2" role="presentation">
                        <input type="radio" name="search_courseType" value="repeat_course" id="search_repeat_course" @if($request->has('search_courseType') && $request->get('search_courseType') == 'repeat_course') checked @endif>
                        <label for="search_repeat_course" class="nav-sub-links transfer-user nav-link text-nowrap px-2 px-md-3 py-1 d-flex flex-column align-items-center justify-content-center" type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false" tabindex="-1">
                            Repeat Course
                        </label>
                    </li>
                </ul>
            </div>
        </div>
                <!-- filter prize  -->

        <div id="filter-prize-content" style="display: none;">
            <div class="d-flex flex-column align-content-start px-md-5 px-2">
                <div class="col-12 mt-3">
                    <small class="alert alert-info p-0">Min price must be less then max price</small>
                    <label for="program_price">Price (0 to {{programFilterMaxPrice()}})</label>
                    <div class="d-flex flex-column">
                        <h6 class="mb-0">Min</h6>
                        <div class="align-items-center d-flex flex-row-reverse gap-2">
                            <p id="price_range_min" class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}</p>
                            <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="1" name="program_price_min" class="form-control accent-color p-0" oninput="price_range_min.innerText = this.value" id="program_price_min" value="{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}">
                        </div>
                        <h6 class="mb-0">Max</h6>
                        <div class="align-items-center d-flex flex-row-reverse gap-2">
                            <p id="price_range_max" class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}</p>
                            <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="1" name="program_price_max" class="form-control accent-color p-0" oninput="price_range_max.innerText = this.value" id="program_price_max" value="{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}">
                        </div>
                        <p class="text-center mb-0 mt-4">
                            <a href="{{ route('programs') }}" class="theme_btn small_btn2 p-2">Clear</a>
                            <button type="submit" class="theme_btn small_btn2 p-2">Submit</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
                <!-- filter duration  -->

        <div id="filter-duration-content" style="display: none;">filter-duration</div>

    </div>

    </div>
    <div class="courses_area ">
        <div class="container">
            <div class="row px-1 px-md-5">
                <div class="col-12 mb-3 mb-md-4">
                    <h5 class="small_heading text-center">
                        @if ($request->has('query'))
                        {{ __('courses.Search result for') }}
                        <span class="font-weight-bold">"{{ $request->get('query') }}"</span>{{ ' out of ' . $total_programs . ' Program(s)' }}<br style="line-break: auto">
                        @if ($all_programs->count() == 0)
                        <span class="subtitle">
                            {{ __('0 Program(s) available') }}</span>
                        @else
                        <span class="subtitle">{{ $total ?? 0 }}
                            {{ __('Program(s) available') }}</span>
                        @endif
                        @endif
                    </h5>
                </div>
                @if (isset($all_programs))
                @foreach ($all_programs as $program)
                @php
                 switch ($program->type) {
                    case 'program':
                        $url_link = route('programs.detail', [$program->programName->id]);
                        $course_image = getCourseImage($program->programName->icon);
                        $course_title = $program->programName->programtitle;
                        $course_description = $program->programName->discription;
                        $classes = count(json_decode($program->programName->allcourses)).' Courses';
                        $course_type = 'Program';
                        
                        break;
                    case 'full_course':
                        $url_link = route('courseDetailsView', ['slug' => $program->courses->parent->slug, 'courseType' => 4]);
                        $course_image = getCourseImage($program->courses->thumbnail);
                        $course_title = $program->courses->parent->title;
                        $course_description = $program->courses->parent->about;
                        $classes = count($program->courses->parent->lessons).' Lessons';
                        $course_type = 'Full Course';
                        break;
                        case 'prep_course_live':
                        $url_link = route('courseDetailsView', ['slug' => $program->courses->parent->slug, 'courseType' => 6]);
                        $course_image = getCourseImage($program->courses->thumbnail);
                        $course_title = $program->courses->parent->title;
                        $course_description = $program->courses->parent->about;
                        $classes = count($program->courses->parent->lessons).' Lessons';
                        $course_type = 'Prep Course (Live)';
                        break;
                    
                    default:
                        # code...
                        break;
                 }
                 $subtitle = '';   
                @endphp
                <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mb-3">
                    <div class="quiz_wizged card rounded-card shadow">
                        <div class="thumb card-header rounded-card-header p-0">
                                    <a href="{{ $url_link }}"><img src="{{ $course_image }}" class="img-fluid img-cover w-100 rounded-card-img">
                                        <div class="prise_tag font-weight-bold col-auto p-0">
                                            <small class="font-weight-bold">
                                                ${{ $program->amount }}
                                                {{-- ${{ $program->currentProgramPlan[0]->amount }} --}}
                                            </small>
                                        </div>
                                    </a>
                                    {{-- <a href="{{ route('programs.detail', [$program->programName->id]) }}"><img src="{{ getCourseImage($program->programName->icon) }}" class="img-fluid img-cover w-100 rounded-card-img"></a> --}}
                                    
                        <span class="quiz_tag">
                            {{$course_type}}
                        </span>
                        </div>
                        <div class="card-body d-flex flex-column p-3">
                            <h5 class="font-weight-bold m-0">
                                <a href="{{ $url_link }}">

                                    {{ $course_title }}

                                </a>
                            </h5>
                            <h6 class="mt-auto mb-0">
                                @if (Str::length($subtitle) > 25)
                                {{ Str::limit($subtitle, 25, '...') }}
                                @else
                                {{ $program->subtitle }}
                                @endif
                            </h6>
                            <p class="paragraph_custom_height ml-auto ">
                                @php
                                $description = str_replace('&nbsp;', ' ', htmlspecialchars_decode(strip_tags($course_description)));
                                @endphp
                                @if (Str::length($description) > 119)
                                {{ Str::limit($description, 119, '...') }}
                                @else
                                {{ $description }}
                                @endif
                            </p>
                            <div class="row justify-content-between px-3 pt-3">
                                <div class="col-auto p-0">
                                    <small>
                                        <i class="fa fa-book-open"></i>
                                        {{ $classes }}
                                    </small>
                                </div>
                                <div class="col-auto p-0">
                                    <small>
                                        <i class="fas fa-clock"></i>
                                        {{ round((strtotime($program->edate) - strtotime($program->sdate)) / 604800, 1) }}
                                        {{-- {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }} --}}
                                        Weeks
                                    </small>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @if (count($all_programs) == 0)
                <div class="col-lg-12">
                    <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                        <h1>
                            <div class="thumb">
                                <img style="width: 50px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                                @if (!isset($search))
                                {{ __('frontend.No Course Found') }}
                                @else
                                {{ __('No results found') }} {{ $request->has('query') ? 'for '.$request->get('query') : '' }}
                                @endif
                            </div>
                        </h1>
                    </div>
                </div>
                @endif
                <div class="col-md-12 @if (count($all_programs) != 0) my-3 pb-3 @endif">
                    @if (count($all_programs) != 0)
                    {{ $all_programs->appends(Request::all())->links() }}
                    @endif
                </div>
                {{-- <div class="col-lg-4 col-xl-3"> --}}
                {{-- <x-class-page-section-sidebar :level="$level" :type="$type" :categories="$categories"
                        :category="$category" :languages="$languages" :language="$language" :mode="$mode" /> --}}
                {{-- <x-class-page-section-sidebar :level="$level" :type="$type" :categories="$categories"
                                                  :category="$category" :languages="$languages" :language="$language"
                                                  :mode="$mode"/> --}}
                {{-- </div> --}}

            </div>
        </div>
    </div>

    <input type="hidden" class="class_route" name="class_route" value="{{ url()->current() }}">

    <input type="hidden" class="search" value="{{ isset($search) ? $search : '' }}">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const buttons = document.querySelectorAll('.nav-sub-links');
    // buttons.forEach(button => {
    //     button.addEventListener('click', () => {
    //         buttons.forEach(btn => {
    //             btn.classList.remove('active');
    //         });
    //         button.classList.add('active');
    //     });
    // });
    $('input[name="search_type"]').on('change',function(){
        let value = $(this).val();
        let url = new URL(window.location.href);
        url.searchParams.set('search_type', value);
        window.location.href = url.toString();
    });
    $('input[name="search_courseType"]').on('change',function(){
        let value = $(this).val();
        let url = new URL(window.location.href);
        url.searchParams.set('search_courseType', value);
        window.location.href = url.toString();
    });
    $('#search_button').on('click',function(){
        let value = $('#search_query').val();
        let url = new URL(window.location.href);
        url.searchParams.set('query', value);
        window.location.href = url.toString();
    });
    $(document).on('click', '#filter-type', function() {
        $('#filter-type-content').show();
        $('#filter-name-content').hide();
        $('#filter-prep-course-type-content').hide();
        $('#filter-prize-content').hide();
        $('#filter-duration-content').hide();
    });
    $(document).on('click', '#filter-name', function() {
        $('#filter-type-content').hide();
        $('#filter-name-content').show();
        $('#filter-prep-course-type-content').hide();
        $('#filter-prize-content').hide();
        $('#filter-duration-content').hide();
    });
    $(document).on('click', '#filter-prep-course-type', function() {
        $('#filter-type-content').hide();
        $('#filter-name-content').hide();
        $('#filter-prep-course-type-content').show();
        $('#filter-prize-content').hide();
        $('#filter-duration-content').hide();
    });
    $(document).on('click', '#filter-prize', function() {
        $('#filter-type-content').hide();
        $('#filter-name-content').hide();
        $('#filter-prep-course-type-content').hide();
        $('#filter-prize-content').show();
        $('#filter-duration-content').hide();
    });
    $(document).on('click', '#filter-duration', function() {
        $('#filter-type-content').hide();
        $('#filter-name-content').hide();
        $('#filter-prep-course-type-content').hide();
        $('#filter-prize-content').hide();
        $('#filter-duration-content').show();
    });
</script>
@include(theme('partials._custom_footer'))