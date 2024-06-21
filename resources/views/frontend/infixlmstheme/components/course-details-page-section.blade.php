<div>

    <input type="hidden" value="{{ asset('/') }}" id="baseUrl">
    <!-- course_details::start  -->
    <div class="course__details p-md-5 p-3">
        <div class="container px-lg-0">
            @php
                if (!empty($request->courseType) && count($course->children)) {
                    foreach ($course->children as $child) {
                        if ($request->courseType == $child->type) {
                            $course_image = getCourseImage($child->image);
                            break;
                        } else {
                            $course_image = getCourseImage($course->image);
                        }
                    }
                } else {
                    $course_image = getCourseImage($course->image);
                }
            @endphp
            {{-- @dd($course->outcomes) --}}
            <!-- firststart -->
            <div class="row px-lg-5 small_screen course_padding">
                <div class="col-lg-9 col-md-8 col-sm-7 d-flex justify-content-between px-2">
                    <div class="course__details_title w-100 mb-md-0">

                        <div class="col-lg-6 col-md-8 details_content d-flex flex-column justify-content-start">
                            <h5 class="small_heading course-span f_w_700">{{ __('frontend.Category') }}</h5>
                            <p class="course-span">{{ @$course->category->name }}</p>
                            <div class="details_content">
                                <h5 class="small_heading course-span f_w_700" style="color: #1770B5;">{{ __('frontend.Reviews') }}
                                </h5>
                                <div class="rating_star d-flex align-items-md-center flex-column flex-md-row">
                                    <div class="stars course-span d-flex">
                                        @php
                                            $main_stars = @$courseRating['rating'];
                                            $stars = intval($courseRating['rating']);
                                        @endphp
                                        @for ($i = 0; $i < $stars; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($main_stars > $stars)
                                            <i class="fas fa-star-half"></i>
                                        @endif
                                        @if ($main_stars == 0)
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        @endif
                                    </div>
                                    <p class="course-span px-md-3">{{ @$courseRating['rating'] }}
                                        ({{ @$courseRating['total'] }} {{ __('frontend.Rating') }})</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4 d-flex align-items-end justify-content-end">

                            <div class="sidebar__title">
                                <h2 class="custom_small_heading font-weight-bold custom_heading_1 mb-0" style="color: #ff6700;">
                                    @php
                                        $course_plan = \Modules\CourseSetting\Entities\Course::where(
                                            'type',
                                            request()->get('courseType'),
                                        )
                                            ->where('parent_id', $course->id)
                                            ->with('currentCoursePlan')
                                            ->first();
                                    @endphp
                                    @if (!empty($course_plan->currentCoursePlan[0]))
                                        {{ getPriceFormat($course_plan->currentCoursePlan[0]->amount) }}
                                    @else
                                        @if (request()->has('courseType') && request()->courseType != 9)
                                            @if (request()->courseType == 2 || request()->courseType == 7)
                                                {{ getPriceFormat(\Modules\CourseSetting\Entities\Course::where('type', request()->get('courseType'))->where('id', $course->id)->first(['price'])->price) }}
                                            @else
                                                {{ getPriceFormat(\Modules\CourseSetting\Entities\Course::where('type', request()->get('courseType'))->where('parent_id', $course->id)->first(['price'])->price) }}
                                            @endif
                                        @else
                                            @if (@$course->discount_price != null)
                                                {{ getPriceFormat($course->discount_price) }}
                                            @elseif ($course->price != null && $course->price != '0.00')
                                                {{ getPriceFormat($course->price + $course->tax) }}
                                            @endif
                                        @endif
                                    @endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 py-3 py-sm-0">
                    {{-- new card_1 starts --}}
                    {{-- this one needs t be fixed --}}
                    <div class="custom_section_color img_round course_tab px-2 pt-2"style="background-color: #eee;">
                        <div class="custom_section_color rounded_section p-2 img_round" style="height: auto;">
                            <h5 class="font-weight-bold custom_heading_1 small_heading">This Course includes:
                            </h5>
                            @if($course->type != 9)
                            <span class="program-span"><i class="fa-clock-o fas"></i>&nbsp;&nbsp; Duration |
                                @if ($course->duration <= 1)
                                    1 Week
                                @else
                                    {{ round($course->duration) . ' Weeks' }}
                                @endif
                            </span>
                            @endif
                            @if($course->type != '7')
                            @if(request()->has('courseType') && in_array(request()->get('courseType'),[4,6]))
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Enrolled |
                                {{ $course->total_enrolled }}
                                Students
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Remaining Enrolled |
                                @if (empty($course->totalseats->no_of_students))
                                    0
                                @else
                                    {{-- {{ $course->totalseats - $course->total_enrolled }} --}}
                                    @if ($course->totalseats->no_of_students - $course->total_enrolled <= 0)
                                        {{ '0' }}
                                    @else
                                        {{ $course->totalseats->no_of_students - $course->total_enrolled }}
                                    @endif

                                @endif

                            </span>
                            <br class= "mt-2">
                            @else
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-bars-staggered"></i>&nbsp;&nbsp; Chapters |
                                {{ count($course->chapters) }}
                                
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-bars-staggered"></i>&nbsp;&nbsp; Lessons |
                                {{ count($course->lessons) }}
                                
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-bars-staggered"></i>&nbsp;&nbsp; Quiz |
                                {{ count($course->lessons->where('is_quiz',1)) }}
                                
                            </span>
                            @endif
                            @endif
                        </div>
                        {{-- new card_1 ends --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- firstend -->
        <!-- 2ndstart -->
        <div class="container px-lg-0">
            <div class="row my-sm-4 my-2 px-lg-5 small_screen course_padding">

                <div class="col-lg-9 col-md-8 col-sm-7 mb-2 mb-sm-0">
                    @if ($course->image == '')

                        <div class="video_screen @if ($course->host != 'ImagePreview' && $course->host != '') theme__overlay @endif mb-4">
                            @if ($course->host != 'ImagePreview' && $course->host != '')
                                <div class="video_play text-center">
                                    @if ($course->host == 'Self' || $course->host == 'AmazonS3')
                                        <div id="vidBox">
                                            <div id="videCont">
                                                <video id="videoPlayer" loop controls controlsList="nodownload">
                                                    <source src="{{ asset($course->trailer_link) }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                        <a href="{{ youtubeVideo($course->trailer_link) }}" id="SelfVideoPlayer"></a>
                                    @endif
                                    <a id="playTrailer"
                                        @if ($course->host == 'Vimeo') video-url="https://vimeo.com/{{ getVideoId(showPicName(@$course->trailer_link)) }}?autoplay=1"

                                   @else
                                   video-url="{{ $course->trailer_link }}" @endif
                                        data-host="{{ $course->host }}" class="play_button">
                                        <i class="ti-control-play"></i>
                                    </a>
                                    <p>{{ __('frontend.Preview this course') }}</p>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="course_detail_image image_responsive px-md-2">
                            <img src="{{ $course_image }}" class="img-fluid w-100 img_round course_image"
                                style="">
                        </div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 py-sm-0 py-3">
                    <div class="custom_section_color img_round course_tab px-2 pt-2" style="background-color: #eee;">
                        <h5 class="font-weight-bold mt-1 course-span custom_heading_1 small_heading">You May also Like</h5>
                        <div class="row mx-0">
                            @if (isset($recent_courses))
                                @forelse($recent_courses as  $recent_course)
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-4 mb-3 pl-0 pr-2">
                                        <a
                                            href="{{ !empty($recent_course->parent_id) ? courseDetailsUrl(@$recent_course->parent->id, @$recent_course->type, @$recent_course->parent->slug) . '?courseType=' . $recent_course->type : courseDetailsUrl(@$recent_course->id, @$recent_course->type, @$recent_course->slug) }}">
                                            <img style="" src="{{ getCourseImage($recent_course->thumbnail) }}"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-8 p-clamp0 p-0">
                                        <p class="p-clamp ">
                                            <a class="text-dark course-span"
                                                href="{{ !empty($recent_course->parent_id) ? courseDetailsUrl(@$recent_course->parent->id, @$recent_course->type, @$recent_course->parent->slug) . '?courseType=' . $recent_course->type : courseDetailsUrl(@$recent_course->id, @$recent_course->type, @$recent_course->slug) }}">
                                                {{ !empty($recent_course->parent_id) ? $recent_course->parent->title : $recent_course->title }}</a>
                                        </p>
                                        <p class="course-span" style="color: #ff6700;">
                                            {{ getPriceFormat($recent_course->price + $recent_course->tax) }}</p>

                                        @if ($recent_course->type == 2)
                                            <p class="color course-span">{{ __('Big Quiz') }}</p>
                                        @elseif($recent_course->type == 4)
                                            <p class="color course-span">{{ __('Full Course') }}</p>
                                        @elseif($recent_course->type == 5)
                                            <p class="color course-span">
                                                {{ __('Prep-Course') }}<small>(on-demand)</small>
                                            </p>
                                        @elseif($recent_course->type == 6)
                                            <p class="color course-span">{{ __('Prep-Course') }}<small>(Live)</small>
                                            </p>
                                        @elseif($recent_course->type == 7)
                                            <p class="color course-span">{{ __('Time Table') }}</p>
                                        @elseif($recent_course->type == 8)
                                            <p class="color course-span">{{ __('Repeat Course') }}</p>
                                        @elseif($recent_course->type == 9)
                                            <p class="color course-span">{{ __('Individual Course') }}</p>
                                        @else
                                            <p class="color course-span">{{ __('Course') }}</p>
                                        @endif
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <div
                                            class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                            <div class="thumb">
                                                <img style="width: 20px"
                                                    src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                    alt="">
                                            </div>
                                            <h6>
                                                {{ __('No Program Found') }}
                                            </h6>
                                        </div>
                                    </div>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2ndend -->
        <!-- 3rdstart -->

        <!-- <div class="col-12"> -->
        <div class="container px-lg-0">
            <div class="row px-lg-5 small_screen course_padding">
                <div class="col-lg-9 col-md-8 col-12">
                    
                    <div class="course_tabs w-100 mb-3">
                        <div class="events_wrapper">
                            <div class="eventsIcon d-xl-none"><i id="left" class="fa-solid fa-angle-left"></i>
                            </div>
                        <ul class="d-flex lms_tabmenu nav w-100 text-center"
                            id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                    role="tab" aria-controls="Overview"
                                    aria-selected="true">{{ __('frontend.Overview') }}</a>
                            </li>
                            @if ($course->type != 7)
                                @if (request()->courseType != 6)
                                    <li class="nav-item">
                                        <a class="nav-link" id="Curriculum-tab" data-toggle="tab" href="#Curriculum"
                                            role="tab" aria-controls="Curriculum"
                                            aria-selected="false">{{ __('frontend.Curriculum') }}</a>
                                    </li>
                                @endif
                                @if (isset(request()->courseType) && in_array(request()->courseType,[4,6]))
                                    <li class="nav-item">
                                        <a class="nav-link" id="Classes-tab" data-toggle="tab" href="#Classes"
                                            role="tab" aria-controls="Classes"
                                            aria-selected="false">{{ __('Classes') }}</a>
                                    </li>
                                @elseif($request->has('program_id'))
                                    <li class="nav-item">
                                        <a class="nav-link" id="Classes-tab" data-toggle="tab" href="#Classes"
                                            role="tab" aria-controls="Classes"
                                            aria-selected="false">{{ __('Classes') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" id="timetable-tab" data-toggle="tab" href="#Timetable"
                                        role="tab" aria-controls="Timetable"
                                        aria-selected="false">{{ __('Time Table') }}</a>
                                </li>
                            @endif
                            @if (Settings('hide_review_section') != '1')
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews"
                                        role="tab" aria-controls="Instructor"
                                        aria-selected="false">{{ __('frontend.Reviews') }}</a>
                                </li>
                            @endif
                            @if ($course->type != 7)
                            <li class="nav-item">
                                <a class="nav-link" id="instructor-tab" data-toggle="tab" href="#Instructor"
                                    role="tab" aria-controls="Instructor" aria-selected="false">Instructors</a>
                            </li>
                            @endif
                            @if (Settings('hide_qa_section') != '1')
                                <li class="nav-item">
                                    <a class="nav-link" id="QA-tab" data-toggle="tab" href="#QASection"
                                        role="tab" aria-controls="Instructor"
                                        aria-selected="false">{{ __('frontend.QA') }}</a>
                                </li>
                            @endif

                        </ul>
                        <div class="eventsIcon d-xl-none"><i id="right" class="fa-solid fa-angle-right"></i></div>
                    </div>
                    </div>

                    <div class="tab-content lms_tab_content px-sm-2 mb-2 mb-md-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                            aria-labelledby="Overview-tab">
                            <!-- content  -->
                            <div class="course_overview_description">

                                <div class="">
                                    @if (!empty($course->about))
                                        <h5 class="font-weight-bold custom_heading_1 small_heading mt-1">
                                            {{ __('frontend.Course Description') }}</h5>
                                        <div class="theme_border"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive ckdtext">
                                                    {{-- <iframe id="iframeAbout" style="border:unset;"></iframe> --}}
                                                    {!! $course->about !!}
                                                </div>
                                            </div>
                                        </div>
                                      
                                    @endif
                                    @if (!empty($course->outcomes))
                                        <h5 class="font-weight-bold custom_heading_1 small_heading">
                                            {{ __('frontend.Course Outcomes') }}
                                        </h5>
                                        <div class="theme_border"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive ckdtext">
                                                    {{-- <iframe id="iframeOutcome" style="border:unset;"></iframe> --}}
                                                    {!! $course->outcomes !!}

                                                </div>
                                            </div>
                                        </div>
                                       
                                    @endif
                                    @if (!empty($course->requirements))
                                        <h5 class="font-weight-bold custom_heading_1 small_heading">
                                            {{ __('frontend.Course Requirements') }}</h5>
                                        <div class="theme_border"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive ckdtext">
                                                    {{-- <iframe id="iframeRequirements"
                                                                style="border:unset;"></iframe> --}}
                                                    {!! $course->requirements !!}
                                                </div>
                                            </div>

                                        </div>
                                       
                                    @endif
                                    @if (!Settings('hide_social_share_btn') == '1')
                                        <div class="social_btns">
                                            <a target="_blank" href="https://www.facebook.com/merakiicollege"
                                                class="fb_bg social_btn theme_btn"> <i class="fab fa-facebook-f"></i>
                                                {{ __('frontend.Facebook') }} </a>
                                            <a target="_blank" href="https://www.tiktok.com/@merakiinursing"
                                                class="Twitter_bg social_btn theme_btn"><i
                                                    class="fa-brands fa-tiktok"></i>
                                                TikTok</a>
                                            <a target="_blank"
                                                href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&amp;description={{ $course->title }}"
                                                class="Pinterest_bg social_btn theme_btn"> <i
                                                    class="fa-brands fa-youtube" style="color: #f3eceb;"></i>
                                                Youtube
                                            </a>
                                            <a target="_blank" href="https://www.instagram.com/merakiinursing/"
                                                class="Linkedin_bg social_btn theme_btn">
                                                <i class="fa-brands fa-instagram"></i>
                                                Instagram
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Curriculum" role="tabpanel" aria-labelledby="Curriculum-tab">
                            <!-- content  -->
                            <h5 class="font-weight-bold custom_heading_1 small_heading mb-3">{{ __('frontend.Course Curriculum') }}</h5>
                            {{-- <h5 class="font-weight-bold custom_heading_1 small_heading ">{{ __('frontend.Course Curriculum') }}</h5> --}}
                            <div class="card mb-4 p-2">
                                <div class="theme_according" id="accordion1">
                                    @if (isset($course->chapters))
                                        @foreach ($course->chapters as $chapter)
                                            <div class="card">

                                                <div class="card-header pink_bg" id="heading{{ $chapter->id }}">
                                                    <h5 class="mb-0">
                                                        <button class="btn theme_btn btn-link text_white collapsed"
                                                            data-toggle="collapse"
                                                            data-target="#collapse{{ $chapter->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $chapter->id }}">
                                                            {{ $chapter->name }}
                                                            <span class="course_length">
                                                                {{ count($chapter->lessons) }}
                                                                {{ __('frontend.Lectures') }}</span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div class="course_collapse collapse" id="collapse{{ $chapter->id }}"
                                                    aria-labelledby="heading{{ $chapter->id }}"
                                                    data-parent="#accordion1">
                                                    <div class="card-body mt-3">
                                                        <div class="curriculam_list">
                                                            <!-- curriculam_single  -->
                                                            @foreach ($chapter->lessons as $key => $lesson)
                                                                <div class="curriculam_single">
                                                                    <div>
                                                                        @if ($lesson->is_lock == 1)
                                                                            @if (Auth::check())
                                                                                @if ($isEnrolled)
                                                                                    @if ($lesson->is_quiz == 1)
                                                                                        @foreach ($lesson->quiz as $quiz)
                                                                                            <span
                                                                                                onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                                                                class="quizLink active">
                                                                                                <i
                                                                                                    class="ti-check-box"></i>
                                                                                                <span
                                                                                                    class="quiz_name">{{ @$key + 1 }}
                                                                                                    {{ @$quiz->title }}</span>
                                                                                            </span>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <i class="ti-control-play"></i>
                                                                                        <span
                                                                                            onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})">{{ @$key + 1 }}
                                                                                            {{ @$lesson->name }}</span>
                                                                                    @endif
                                                                                @else
                                                                                    <i class="ti-lock"></i>
                                                                                    @if ($lesson->is_quiz == 1)
                                                                                        @foreach ($lesson->quiz as $quiz)
                                                                                            <span
                                                                                                style="font-weight: 500;"
                                                                                                class="quiz_name">{{ @$key + 1 }}
                                                                                                {{ @$quiz->title }}
                                                                                                [Quiz]</span>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <span
                                                                                            data-host="{{ $lesson->host }}"
                                                                                            data-url="{{ youtubeVideo($lesson->video_url) }}">{{ @$key + 1 }}
                                                                                            {{ @$lesson->name }}</span>
                                                                                    @endif
                                                                                @endif
                                                                            @else
                                                                                <i class="ti-lock"></i>
                                                                                @if ($lesson->is_quiz == 1)
                                                                                    @foreach ($lesson->quiz as $quiz)
                                                                                        <span style="font-weight: 500;"
                                                                                            class="quiz_name">{{ @$key + 1 }}
                                                                                            {{ @$quiz->title }}
                                                                                            [Quiz]</span>
                                                                                    @endforeach
                                                                                @else
                                                                                    <span
                                                                                        data-host="{{ $lesson->host }}"
                                                                                        data-url="{{ youtubeVideo($lesson->video_url) }}">{{ @$key + 1 }}
                                                                                        {{ @$lesson->name }}</span>
                                                                                @endif
                                                                            @endif
                                                                        @else
                                                                            @if ($lesson->is_quiz == 1)
                                                                                @foreach ($lesson->quiz as $quiz)
                                                                                    @if (Auth::check() && $isEnrolled)
                                                                                        <span
                                                                                            onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                                                            class="quizLink active">
                                                                                            <i
                                                                                                class="ti-check-box"></i>
                                                                                            <span
                                                                                                class="quiz_name">{{ @$key + 1 }}
                                                                                                {{ @$quiz->title }}
                                                                                                [Quiz]</span>
                                                                                        </span>
                                                                                    @else
                                                                                        <i class="ti-check-box"></i>
                                                                                        <span
                                                                                            class="quiz_name">{{ @$key + 1 }}
                                                                                            {{ @$quiz->title }}
                                                                                            [Quiz]</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                @if ($lesson->host == 'Youtube')
                                                                                    <i class="ti-control-play"></i>
                                                                                    <span class="lesson_name"
                                                                                        style="font-weight: 500;"
                                                                                        data-host="{{ $lesson->host }}"
                                                                                        data-url="{{ youtubeVideo($lesson->video_url) }}">{{ @$key + 1 }}
                                                                                        {{ @$lesson->name }}</span>
                                                                                @elseif($lesson->host == 'Self' || $lesson->host == 'AmazonS3')
                                                                                    <i class="ti-control-play"></i>

                                                                                    <span
                                                                                        class="lesson_name"style="font-weight: 500;"
                                                                                        data-host="{{ $lesson->host }}"
                                                                                        data-url="{{ asset($lesson->video_url) }}">{{ @$key + 1 }}
                                                                                        {{ @$lesson->name }}</span>
                                                                                @else
                                                                                    <i class="ti-control-play"></i>
                                                                                    <span
                                                                                        class="lesson_name"style="font-weight: 500;"
                                                                                        data-host="{{ $lesson->host }}"
                                                                                        data-url="{{ $lesson->video_url }}">{{ @$key + 1 }}
                                                                                        {{ @$lesson->name }}</span>
                                                                                @endif
                                                                            @endif
                                                                        @endif

                                                                    </div>
                                                                    <div class="curriculam_right">
                                                                        @if ($lesson->is_lock == 0)
                                                                            @if ($lesson->is_quiz == 0)
                                                                                <a href="#" target="_blank"
                                                                                    data-course="{{ $course->id }}"
                                                                                    data-lesson="{{ $lesson->id }}"
                                                                                    @if (request()->has('program_id')) data-program_id="{{ $request->program_id }}" @endif
                                                                                    @if (request()->has('courseType')) data-courseType="{{ $request->courseType }}" @endif
                                                                                    class="theme_btn_lite goFullScreen"
                                                                                    onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})">{{ __('frontend.Preview') }}</a>
                                                                            @else
                                                                                <a href="#"
                                                                                    class="theme_btn_lite quizLink"
                                                                                    onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})">{{ __('frontend.Start') }}</a>
                                                                            @endif
                                                                        @else
                                                                            @if (Auth::check() && $isEnrolled)
                                                                                @if ($lesson->is_quiz == 0)
                                                                                    <a href="javascript:void(0)"
                                                                                        {{-- data-course="{{ $course->id }}" --}}
                                                                                        {{-- data-lesson="{{ $lesson->id }}" --}}
                                                                                        {{-- @if (request()->has('program_id')) data-program_id="{{ $request->program_id }}" @endif --}}
                                                                                        {{-- @if (request()->has('courseType')) data-courseType="{{ $request->courseType }}" @endif --}}
                                                                                        onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                                                        class="theme_btn_lite">{{ __('common.View') }}</a>
                                                                                @else
                                                                                    <a href="#"
                                                                                        onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                                                        class="theme_btn_lite quizLink">{{ __('frontend.Start') }}</a>
                                                                                @endif
                                                                            @endif
                                                                        @endif

                                                                        @php
                                                                            $duration = 0;
                                                                            if (
                                                                                $lesson->is_quiz == 0 ||
                                                                                count($lesson->quiz) == 0
                                                                            ) {
                                                                                $duration = $lesson->duration;
                                                                            } else {
                                                                                $quiz = $lesson->quiz[0];
                                                                                $type = $quiz->question_time_type;
                                                                                if ($type == 0) {
                                                                                    $duration =
                                                                                        $quiz->question_time *
                                                                                        count($quiz->assign);
                                                                                } else {
                                                                                    $duration = $quiz->question_time;
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        <span
                                                                            class="nowrap">{{ MinuteFormat($duration) }}</span>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    {{ $lesson->description }}
                                                                </p>
                                                                <hr>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            @if (isset($course_exercises))
                                @if (count($course_exercises) != 0)
                                    <div class="card p-2">
                                        <div class="theme_according" id="accordion0">

                                            <div class="card">

                                                <div class="card-header pink_bg" id="heading">
                                                    <h5 class="mb-0">
                                                        <button class="btn theme_btn btn-link text_white"
                                                            data-toggle="collapse" data-target="#collapse"
                                                            aria-expanded="false" aria-controls="collapse">
                                                            {{ __('courses.Exercise') }}
                                                            {{ __('common.Files') }}

                                                        </button>
                                                    </h5>
                                                </div>
                                                <div class="course_collapse show collapse" id="collapse" aria-labelledby="heading"
                                                    data-parent="#accordion1">
                                                    <div class="card-body mt-3">
                                                        <div class="curriculam_list">

                                                            <!-- curriculam_single  -->
                                                            @if (isset($course_exercises))
                                                                @foreach ($course_exercises as $key2 => $file)
                                                                    <div class="curriculam_single">
                                                                        <div>
                                                                            @if ($file->lock == 0)
                                                                                <i class="ti-unlock"></i>
                                                                            @else
                                                                                @if (Auth::check() && $isEnrolled)
                                                                                    <i class="ti-unlock"></i>
                                                                                @else
                                                                                    <i class="ti-lock"></i>
                                                                                @endif
                                                                            @endif

                                                                            <span
                                                                                style="font-weight: 500;">{{ @$key2 + 1 }}.
                                                                                {{ @$file->fileName }}</span>
                                                                        </div>

                                                                        <div class="curriculam_right">

                                                                            @if ($file->lock == 0)
                                                                                <a href="{{ asset($file->file) }}"
                                                                                    class="theme_btn_lite mr-0"
                                                                                    download>Download</a>
                                                                            @else
                                                                                @if (Auth::check() && $isEnrolled)
                                                                                    <a href="{{ asset($file->file) }}"
                                                                                        class="theme_btn_lite mr-0"
                                                                                        download>Download</a>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                        </div>
                        {{-- @if (count($Classes))

                                @endif --}}
                        @if ((isset(request()->courseType) && in_array(request()->courseType,[4,6])) || $request->has('program_id'))
                        <div class="tab-pane fade" id="Classes" role="tabpanel" aria-labelledby="Curriculum-tab">
                            <!-- content  -->
                            <h5 class="small_heading font_22 f_w_$program_plan700">{{ __('Classes') }}</h5>
                            <div class="theme_according" id="accordion1">
                                <div class="row">
                                    @if ($request->has('program_id'))
                                        @if (count($Classes))
                                            @foreach ($Classes as $Class)
                                                @if (isset($Class->program_types) && $Class->program_types == 'true')
                                                    <div class="col-lg-6 col-xl-4">
                                                        <div class="couse_wizged card">
                                                            <a
                                                                href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?program_id=' . $request->program_id }}">
                                                                <div class="thumb" style="height: 100px;">

                                                                    <div class="thumb_inner lazy"
                                                                        style="background-image: url({{ getCourseImage($course->thumbnail) }});">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="course_content">
                                                                <a
                                                                    href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?program_id=' . $request->program_id }}">

                                                                    <h5 class="noBrake" title="{{ $Class->title }}">
                                                                        {{ $Class->title }}
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <div class="rating_cart">
                                                                <div class="rateing">
                                                                    <span>{{ $Class->totalReview }}/5</span>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        @if (count($Classes))
                                            @foreach ($Classes as $Class)
                                                @if ($request->has('courseType') && in_array($request->courseType, json_decode($Class->course_types)))
                                                    <div class="col-lg-6 col-xl-4" style="">
                                                        <div class="couse_wizged my-2">
                                                            <a
                                                                href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?courseType=' . $request->courseType . '&course_id=' . $course->id }}">
                                                                <div class="thumb">

                                                                    <div class="thumb_inner lazy"
                                                                        style="background-image: url({{ getCourseImage($course->thumbnail) }});">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="course_content">
                                                                <a
                                                                    href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?courseType=' . $request->courseType . '&course_id=' . $course->id }}">

                                                                    <h5 class="noBrake" title="{{ $Class->title }}">
                                                                        {{ $Class->title }}
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <div class="rating_cart">
                                                                <div class="rateing">
                                                                    <span>{{ $Class->totalReview }}/5</span>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="tab-pane fade" id="Timetable" role="tabpanel" aria-labelledby="Curriculum-tab">
                            <!-- content  -->
                            <h5 class="font_22 f_w_$program_plan700 mb_20">{{ __('Time Table') }}</h5>
                            <div class="theme_according" id="accordion1">
                                <div class="row p-2" id="invoice_print">
                                    <div class="">
                                        <table id="lms_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Weeks') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Monday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Tuesday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Wednesday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Thursday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Friday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Saturday') }}</th>
                                                    <th scope="col" style="width: 135px;">
                                                        {{ __('Sunday') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($time_tables as $time_table)
                                                    <tr>
                                                        <td>Week {{ $time_table->week }}</td>
                                                        @foreach ($time_table->weekWiseDays as $WeekWiseDay)
                                                            <td class="p-1">

                                                                <div
                                                                    id="block_{{ $time_table->week }}_{{ $WeekWiseDay->week }}">
                                                                    @if (!empty($WeekWiseDay->date))
                                                                        <p>({{ Carbon\Carbon::parse($WeekWiseDay->date)->format('d M Y') }})
                                                                        </p>
                                                                        @if (!empty($WeekWiseDay->Instructor_id))
                                                                            <p><strong>{{ !empty($WeekWiseDay->Instructor_id) ? (!empty($WeekWiseDay->instructor) ? $WeekWiseDay->instructor->name : 'Deleted User') : '' }}</strong>
                                                                            </p>
                                                                        @endif
                                                                        {{-- @if (!empty($WeekWiseDay->image))
                                                                                <div style="width: 100%;">
                                                                                     <img src="{{ getCourseImage($WeekWiseDay->image) }}"
                                                                                     class="preview image-editor-preview-img-1" id="image_preview-1" style="width:65px;height:80px;"/>
                                                                                   </div>
                                                                                @endif --}}
                                                                    @else
                                                                        <h1>-</h1>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if (auth()->check())
                                    @if ($isEnrolled || isAdmin())
                                        <div class="table_btn_wrap">
                                            <ul>
                                                <li>
                                                    <s
                                                        class="theme_btn d-block printBtn my-2 text-center">{{ __('student.Print') }}</s>
                                                    <a class="theme_line_btn d-block downloadBtn text-center"
                                                        style="cursor:pointer;">{{ __('student.Download') }}</a>


                                                </li>
                                            </ul>
                                        </div>
                                    {{-- @elseif(isStudent())
                                        <div class="table_btn_wrap">
                                            <ul>
                                                <li>
                                                    <a href="{{ !empty($course->parent_id) ? route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('buyNowQuiz', [@$course->id]) }}"
                                                        class="theme_line_btn d-block text-center">{{ __('student.Download') }}</a>


                                                </li>
                                            </ul>
                                        </div> --}}
                                    @endif
                                @else
                                    {{-- <div class="table_btn_wrap">
                                        <ul>
                                            <li>
                                                <a href="{{ !empty($course->parent_id) ? route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('buyNowQuiz', [@$course->id]) }}"
                                                    class="theme_line_btn d-block text-center">{{ __('student.Download') }}</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                @endif
                            </div>
                        </div>
                        @if ($course->type != 7)
                        <div class="tab-pane fade" id="Instructor" role="tabpanel" aria-labelledby="">
                            <div class="instractor_details_wrapper">
                                <div class="instractor_title">
                                    <h5 class="font_22 f_w_700">{{ __('frontend.Instructor') }}</h5>
                                    <p class="font_16 f_w_400">{{ @$course->user->headline }}</p>
                                </div>
                                <div class="instractor_details_inner">
                                    <div class="thumb">
                                        <img class="w-100" style="border-radius:25px;"
                                            src="{{ getInstructorImage(@$course->user->image) }}" alt="">
                                    </div>
                                    <div class="instractor_details_info">
                                        <a
                                            href="{{ route('instructorDetails', [$course->user->id, $course->user->name]) }}">
                                            <h5 class="font_22 f_w_700">{{ @$course->user->name }}</h5>
                                        </a>
                                        <h5> {{ @$course->user->headline }}</h5>
                                        <div class="ins_details">
                                            <p> {{ @$course->user->short_details }}</p>
                                        </div>
                                        <div class="intractor_qualification">
                                            <div class="single_qualification">
                                                <i class="ti-star"></i> {{ @$userRating['rating'] }}
                                                {{ __('frontend.Rating') }}
                                            </div>
                                            <div class="single_qualification">
                                                <i class="ti-comments"></i> {{ @$userRating['total'] }}
                                                {{ __('frontend.Reviews') }}
                                            </div>
                                            <div class="single_qualification">
                                                <i class="ti-user"></i> {{ @$course->user->totalEnrolled() }}
                                                {{ __('frontend.Students') }}
                                            </div>
                                            <div class="single_qualification">
                                                <i class="ti-layout-media-center-alt"></i>
                                                {{ @$course->user->totalCourses() }}
                                                {{ __('frontend.Courses') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    {!! @$course->user->about !!}
                                </p>
                            </div>

                            <div class="author_courses">
                                <div class="section__title mb-4">
                                    <h5 class="font-weight-bold custom_heading_1 small_heading">
                                        {{ __('frontend.More Courses by Author') }}
                                    </h5>
                                </div>
                                <div class="row">
                                    @foreach (@$course->user->courses->whereIn('type', [2, 4, 5, 6, 8])->where('price', '!=', '0.00')->where('id','<>',$course_plan->id)->take(2) as $c)
                                    @php
                                        if(count($c->currentCoursePlan)){
                                            $price = $c->currentCoursePlan[0]->amount;
                                        }else{
                                            $price = $c->price + $c->tax;
                                        }
                                        $c_slug = ($c->parent) ? $c->parent->slug : $c->slug;
                                    @endphp
                                        <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
                                            <div class="card quiz_wizged rounded-card shadow">
                                                <div class="rounded-card-img thumb">

                                                    <a href="{{ route('courseDetailsView',['slug' => $c_slug, 'courseType' => $c->type]) }}">
                                                        <img src="{{ getCourseImage($c->thumbnail) }}"
                                                            alt="" class="img-fluid w-100 img_circle">
                                                        <x-price-tag :price="$price" :discount="$c->discount_price" />
                                                        <span class="quiz_tag">{{ $c->type }}</span>
                                                        @switch($c->type)
                                                            @case(2)
                                                                <span class="quiz_tag">{{ __('Big Quiz') }}</span>
                                                            @break

                                                            @case(3)
                                                                <span class="quiz_tag">{{ __('Full Course') }}</span>
                                                            @break

                                                            @case(4)
                                                                <span class="quiz_tag">{{ __('Full Course') }}</span>
                                                            @break

                                                            @case(5)
                                                                <span
                                                                    class="quiz_tag">{{ __('Prep-Course') }}<small>(On-Demand)</small></span>
                                                            @break

                                                            @case(6)
                                                                <span
                                                                    class="quiz_tag">{{ __('Prep-Course') }}<small>(Live)</small></span>
                                                            @break

                                                            @case(7)
                                                                <span class="quiz_tag">{{ __('Time Table') }}</span>
                                                            @break

                                                            @case(8)
                                                                <span class="quiz_tag">{{ __('Repeat Course') }}</span>
                                                            @break

                                                            @default
                                                            @break
                                                        @endswitch
                                                    </a>
                                                </div>
                                                <div class="card-body course_content">
                                                    <a href="{{ route('courseDetailsView',['slug' => $c_slug, 'courseType' => $c->type]) }}">
                                                        <h5 class="nobrake">{{ @$c->parent->title }}</h5>
                                                    </a>
                                                    <div
                                                        class="align-items-baseline d-flex justify-content-between rating_cart">
                                                        <div class="rateing px-0">
                                                            <span>{{ $c->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        @auth()
                                                            @if (!$c->isLoginUserEnrolled && !$c->isLoginUserCart)
                                                                <a href="#" class="cart_store"
                                                                    data-id="{{ $c->id }}">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </a>
                                                            @endif
                                                        @endauth
                                                        @guest()
                                                            @if (!$c->isGuestUserCart)
                                                                <a href="#" class="cart_store"
                                                                    data-id="{{ $c->id }}">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                </a>
                                                            @endif
                                                        @endguest
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between ">
                                                        <a href="#"> <i class="ti-agenda course-span"></i>
                                                            {{ count($c->parent->lessons) }}
                                                            {{ __('frontend.Lessons') }}</a>
                                                        <a href="#"> <i class="ti-user"></i>
                                                            {{ $c->total_enrolled }}
                                                            {{ __('frontend.Students') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            <!-- content  -->
                            <div class="course_review_wrapper">
                                <div class="details_title">
                                    <h5 class="font_22 f_w_700">{{ __('frontend.Student Feedback') }}</h5>
                                    <p class="font_16 f_w_400">{{ $course->title }}</p>
                                </div>
                                <div class="course_feedback">
                                    <div class="course_feedback_left mr-3">
                                        <h2>{{ $course->totalReview }}</h2>
                                        <div class="feedmak_stars">
                                            @php
                                                $main_stars = $course->totalReview;
                                                $stars = intval($course->totalReview);
                                            @endphp
                                            @for ($i = 0; $i < $stars; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @if ($main_stars > $stars)
                                                <i class="fas fa-star-half"></i>
                                            @endif
                                            @if ($main_stars == 0)
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif
                                        </div>
                                        <span>{{ __('frontend.Course Rating') }}</span>
                                    </div>
                                    <div class="feedbark_progressbar">
                                        <div class="single_progrssbar">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ getPercentageRating($course->starWiseReview, 5) }}%"
                                                    aria-valuenow="{{ getPercentageRating($course->starWiseReview, 5) }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="rating_percent d-flex align-items-center">
                                                <div class="feedmak_stars d-flex align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span>{{ getPercentageRating($course->starWiseReview, 5) }}%</span>
                                            </div>
                                        </div>
                                        <div class="single_progrssbar">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ getPercentageRating($course->starWiseReview, 4) }}%"
                                                    aria-valuenow="{{ getPercentageRating($course->starWiseReview, 4) }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="rating_percent d-flex align-items-center">
                                                <div class="feedmak_stars d-flex align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>{{ getPercentageRating($course->starWiseReview, 4) }}%</span>
                                            </div>
                                        </div>
                                        <div class="single_progrssbar">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ getPercentageRating($course->starWiseReview, 3) }}%"
                                                    aria-valuenow="{{ getPercentageRating($course->starWiseReview, 3) }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="rating_percent d-flex align-items-center">
                                                <div class="feedmak_stars d-flex align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>

                                                </div>
                                                <span>{{ getPercentageRating($course->starWiseReview, 3) }}%</span>
                                            </div>
                                        </div>
                                        <div class="single_progrssbar">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ getPercentageRating($course->starWiseReview, 2) }}%"
                                                    aria-valuenow="{{ getPercentageRating($course->starWiseReview, 2) }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="rating_percent d-flex align-items-center">
                                                <div class="feedmak_stars d-flex align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>{{ getPercentageRating($course->starWiseReview, 2) }}%</span>
                                            </div>
                                        </div>
                                        <div class="single_progrssbar">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ getPercentageRating($course->starWiseReview, 1) }}%"
                                                    aria-valuenow="{{ getPercentageRating($course->starWiseReview, 1) }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="rating_percent d-flex align-items-center">
                                                <div class="feedmak_stars d-flex align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <span>{{ getPercentageRating($course->starWiseReview, 1) }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="course_review_header mb_20">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="review_poients">
                                                @if ($course->reviews->count() < 1)
                                                    @if (Auth::check() && $isEnrolled)
                                                        <p class="theme_color font_16 mb-0">
                                                            {{ __('frontend.Be the first reviewer') }}</p>
                                                    @else
                                                        <p class="theme_color font_16 mb-0">
                                                            {{ __('frontend.No Review found') }}</p>
                                                    @endif
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating_star text-lg-right text-md-right">

                                                @php
                                                    $PickId = $course->id;
                                                @endphp
                                                @if (Auth::check() && Auth::user()->role_id == 3)
                                                    @if (!in_array(Auth::user()->id, $reviewer_user_ids) && $isEnrolled)
                                                        <div
                                                            class="star_icon d-flex align-items-center justify-content-end">
                                                            <a class="rating">
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5" class="rating" /><label
                                                                    class="full" for="star5" id="star5"
                                                                    title="Awesome - 5 stars"
                                                                    onclick="Rates(5, {{ @$PickId }})"></label>

                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4" class="rating" /><label
                                                                    class="full" for="star4"
                                                                    title="Pretty good - 4 stars"
                                                                    onclick="Rates(4, {{ @$PickId }})"></label>

                                                                <input type="radio" id="star3" name="rating"
                                                                    value="3" class="rating" /><label
                                                                    class="full" for="star3"
                                                                    title="Meh - 3 stars"
                                                                    onclick="Rates(3, {{ @$PickId }})"></label>

                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2" class="rating" /><label
                                                                    class="full" for="star2"
                                                                    title="Kinda bad - 2 stars"
                                                                    onclick="Rates(2, {{ @$PickId }})"></label>

                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1" class="rating" /><label
                                                                    class="full" for="star1"
                                                                    title="Bad  - 1 star"
                                                                    onclick="Rates(1,{{ @$PickId }})"></label>

                                                            </a>
                                                        </div>
                                                    @endif
                                                @else
                                                    <p class="font_14 f_w_400 mt-0"><a href="{{ url('login') }}"
                                                            class="theme_color2">{{ __('frontend.Sign In') }}</a>
                                                        {{ __('frontend.or') }} <a class="theme_color2"
                                                            href="{{ url('register') }}">{{ __('frontend.Sign Up') }}</a>
                                                        {{ __('frontend.as student to post a review') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="course_cutomer_reviews pt-2">
                                    <div class="details_title">
                                        <h5 class="font_22 f_w_700">{{ __('frontend.Reviews') }}</h5>

                                    </div>
                                    <div class="customers_reviews" id="customers_reviews">


                                    </div>
                                </div>

                            </div>
                            <!-- content  -->
                        </div>

                        <div class="tab-pane fade" id="instructortab" role="tabpanel" aria-labelledby="QA-tab">
                            <!-- content  -->
                            <div class="conversition_box">
                                <div id="conversition_box"></div>
                                <div class="row">
                                    @if ($isEnrolled)
                                        <div class="col-lg-12" id="mainComment">
                                            <form action="{{ route('saveComment') }}" method="post"
                                                class="">
                                                @csrf
                                                <input type="hidden" name="course_id" value="{{ @$course->id }}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="section_title3 mb_20">
                                                            <h5>{{ __('frontend.Leave a question/comment') }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="single_input mb_25">
                                                            <textarea placeholder="{{ __('frontend.Leave a question/comment') }}" name="comment"
                                                                class="primary_textarea gray_input"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb_30">

                                                        <button type="submit" class="theme_btn height_50">
                                                            <i class="fas fa-comments"></i>
                                                            {{ __('frontend.Question') }}/
                                                            {{ __('frontend.comment') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="QA-tab">

                        </div>

                    </div>
                </div>

                <!-- 3rdmid -->


                {{-- new card_2 starts  --}}
                {{-- this one needs to be fixed  --}}
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 pb- py-sm-0">
                     @if($course->type != '7')
                     @if(request()->has('courseType') && in_array(request()->get('courseType'),[4,6]))
                    <div class="custom_section_color rounded_section p-2 img_round " style="background-color: #eee; ">
                        <h5 class="font-weight-bold custom_heading_1 small_heading">Start Your Application:</h5>
                        <p class="my-1 program-span"><i class="fa fa-calendar-days"></i>&nbsp;&nbsp; Current Cohort
                            End :

                            {{-- <br class="mt-2"> --}}
                            <span class="font-weight-bold">
                                @if ($course->totalseats)
                                    {{ \Carbon\Carbon::parse($course->totalseats->edate)->format('d M Y') }}
                            </span>
                        @else
                            <span class="font-weight-bold">Not Given</span>
                            @endif


                        </p>
                        <p class="my-1 program-span"><i class="fa fa-calendar-days"></i>&nbsp;&nbsp; Next Cohort Start
                            :

                            {{-- <br class="mt-2"> --}}


                            <span class="font-weight-bold">
                                {{-- @if ($course->totalseats->edate)
                                   {{ \Carbon\Carbon::parse($course->totalseats->edate)->format('d M Y') }}</span>

                                   @else --}}
                                <span class="font-weight-bold">Not Given</span>
                                {{-- @endif --}}

                        </p>


                    </div>
                    @endif
                    @endif    
                    {{-- new card_2 ends  --}}



                    <div class="">
                        <div class="sidebar__widget p-2 p-sm-0">

                            @if (!onlySubscription())
                                @if (Auth::check())
                                    @if ($isEnrolled || isAdmin())
                                        @if (request()->has('program_id'))
                                            <a href="{{ route('continueCourse', [$course->slug]) . '?program_id=' . $request->program_id }}"
                                                class="d-block mb_10 small_btn theme_btn text-center mt-2">{{ __('common.Continue Watch') }}</a>
                                        @endif
                                        @if (request()->has('courseType') && in_array(request()->courseType, [4, 5, 9]))
                                            <a href="{{ route('continueCourse', [$course->slug]) . '?courseType=' . $request->courseType }}"
                                                class="d-block mb_10 small_btn theme_btn text-center mt-2">{{ __('common.Continue Watch') }}</a>
                                        @endif
                                    @elseif(isStudent())
                                        @if ($is_cart == 1)
                                            <a href="javascript:void(0)"
                                                class="d-block mb_10 small_btn theme_btn text-center mt-2 mt-sm-0">{{ __('common.Added To Cart') }}</a>
                                        @else
                                            <a href=" {{ request()->has('courseType') ? route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('addToCartQuiz', [@$course->id]) }}"
                                                class="d-block mb_10 small_btn theme_btn text-center mt-2 mt-sm-0">{{ __('common.Add To Cart') }}</a>
                                        @endif
                                        <a href="{{ request()->has('courseType') ? route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('buyNowQuiz', [@$course->id]) }}"
                                            class="d-block mb_10 small_btn theme_btn text-center">{{ __('common.Buy Now') }}</a>
                                    @endif
                                @else
                                    @if ($is_cart == 1)
                                        <a href="javascript:void(0)"
                                            class="d-block mb_10 small_btn theme_btn text-center mt-2">{{ __('common.Added To Cart') }}</a>
                                    @else
                                        <a href=" {{ request()->has('courseType') ? route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('addToCartQuiz', [@$course->id]) }} "
                                            class="d-block mb_10 small_btn theme_btn text-center mt-2 mt-sm-0">{{ __('common.Add To Cart') }}</a>
                                        <a href="{{ request()->has('courseType') ? route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType : route('buyNowQuiz', [@$course->id]) }}"
                                            class="d-block mb_10 small_btn theme_btn text-center ">{{ __('common.Buy Now') }}</a>
                                    @endif
                                @endif
                            @endif
                            @if(request()->has('courseType') && in_array(request()->get('courseType'),[4,6]))
                            <p class="font_14 f_w_500 mb_30 text-center"></p>
                            <h5 class="small_heading f_w_700 mb_10 course-span">{{ __('frontend.This course includes') }}:</h5>
                            <ul class="course_includes">
                                @if(request()->has('courseType') && request()->courseType !=9)
                                <li><i class="ti-alarm-clock"></i>
                                    <p class="nowrap course-span"> {{ __('frontend.Duration') }}



                                        @if ($course->duration <= 1)
                                            1 Week
                                        @else
                                            {{ $course->duration . ' Weeks' }}
                                        @endif

                                    </p>
                                </li>
                                @endif
                                <!--<li><i class="ti-thumb-up"></i>-->
                                <!--    <p>{{ __('frontend.Skill Level') }}-->
                                <!--        @foreach ($levels as $level)
-->
                                <!--            @if (@$course->level == $level->id)
-->
                                <!--                {{ $level->title }}-->
                                <!--
@endif-->
                                <!--
@endforeach-->
                                <!--    </p></li>-->
                                <li><i class="ti-agenda"></i>
                                    <p>{{ __('Classes') }}: {{ @$course->total_classes }}
                                        {{ __('classes') }}</p>
                                </li>
                                {{-- <li><i class="ti-agenda"></i>
                                    <p>{{ __('frontend.Lectures') }} {{ count($course->lessons) }}
                                        {{ __('frontend.lessons') }}</p>
                                </li> --}}
                                {{--                                    <li><i class="ti-user"></i> --}}
                                {{--                                        <p>{{__('frontend.EnrolledEnrolled')}} {{$course->total_enrolled}} {{__('frontend.students')}}</p> --}}
                                {{--                                    </li> --}}
                                {{--                                    <li><i class="ti-user"></i> --}}
                                {{--                                        <p>{{__('frontend.Certificate of Completion')}}</p></li> --}}
                                <!--<li><i class="ti-blackboard"></i>-->
                                <!--    <p>{{ __('frontend.Full lifetime access') }}</p></li>-->
                                {{--                                    <li><i class="ti-blackboard"></i> --}}
                                {{--                                        <p>120 days access </p></li> --}}
                            </ul>
                            @endif
                        </div>

                        @if ($course->review_id != '0' && !empty($course->review()))
                            @if (!empty($course->review()->first()))

                                <div class="prog_blk mt-3"
                                    style="background-image: url({{ !empty($course->review()->first()->user()) ? asset($course->review()->first()->user()->first()->image) : asset('public/assets/c1.jpg') }})">
                                    <div class="txt">

                                        <h6>
                                            <div class="rating_star">
                                                <div class="stars">
                                                    @php
                                                        $main_stars = $course->review()->first()->star;
                                                        $stars = intval($course->review()->first()->star);
                                                    @endphp
                                                    @for ($i = 0; $i < $stars; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @if ($main_stars > $stars)
                                                        <i class="fas fa-star-half"></i>
                                                    @endif
                                                    @if ($main_stars == 0)
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="far fa-star"></i>
                                                        @endfor
                                                    @endif
                                                </div>
                                            </div>
                                        </h6>
                                        <h5 class="text-white">
                                            {{ $course->review()->first()->user()->first()->name }} </h5>

                                        <h5 class="text-white">
                                            {{ !empty($course->review()->first()->course()) ? $course->review()->first()->course()->first()->title : '' }}
                                        </h5>
                                        <p class="paragraph_custom_height text-white">
                                            {{ $course->review()->first()->comment }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
<!-- 3rdend -->
<div class="modal cs_modal fade admin-query" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('frontend.Review') }}</h5>
                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
            </div>

            <form action="{{ route('submitReview') }}" method="Post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="course_id" id="rating_course_id" value="">
                    <input type="hidden" name="rating" id="rating_value" value="">

                    <div class="text-center">
                        <textarea class="lms_summernote" name="review" name="" id=""
                            placeholder="{{ __('frontend.Write your review') }}" cols="30" rows="10">{{ old('review') }}</textarea>
                        <span class="text-danger" role="alert">{{ $errors->first('review') }}</span>
                    </div>


                </div>
                <div class="modal-footer justify-content-center">
                    <div class="mt-40">
                        <button type="button" class="theme_line_btn mr-2"
                            data-dismiss="modal">{{ __('common.Cancel') }}
                        </button>
                        <button class="theme_btn" type="submit">{{ __('common.Submit') }}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@include(theme('partials._delete_model'))


</div>
@include(theme('partials._custom_footer'))
<script src="{{ asset('public/frontend/infixlmstheme') }}/js/html2pdf.bundle.js"></script>
<script src="{{ asset('public/frontend/infixlmstheme/js/my_invoice.js') }}"></script>


<script>
    $(document).ready(function() {

        // set About iframe
        var iframeAbout = document.getElementById("iframeAbout");
        var iframeDocAbout = iframeAbout.contentDocument || iframeAbout.contentWindow.document;
        var dynamicDivAbout = document.createElement("div");

        dynamicDivAbout.innerHTML = '{!! $course->about !!}';

        iframeDocAbout.body.appendChild(dynamicDivAbout);

        var bodyHeight2 = iframeDocAbout.body.querySelector("div").scrollHeight + 25;
        $("#iframeAbout").css('height', bodyHeight2);

        // set outcome iframe
        var iframe = document.getElementById("iframeOutcome");
        var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        var dynamicDiv = document.createElement("div");

        dynamicDiv.innerHTML = '{!! $course->outcomes !!}';

        iframeDoc.body.appendChild(dynamicDiv);

        var bodyHeight = iframeDoc.body.querySelector("div").scrollHeight + 25;
        $("#iframeOutcome").css('height', bodyHeight);

        // set requirement iframe
        var iframeReq = document.getElementById("iframeRequirements");
        var iframeDocReq = iframeReq.contentDocument || iframeReq.contentWindow.document;
        var dynamicDivReq = document.createElement("div");

        dynamicDivReq.innerHTML = '{!! $course->requirements !!}';

        iframeDocReq.body.appendChild(dynamicDivReq);

        var bodyHeight1 = iframeDocReq.body.querySelector("div").scrollHeight + 25;
        $("#iframeRequirements").css('height', bodyHeight1);



    });
</script>
<script>
        $(document).ready(function() {
    const $tabsBox = $(".lms_tabmenu"),
        $allTabs = $tabsBox.find(".nav-item"),
        $arrowEventsIcons = $(".eventsIcon i");

    const handleEventsIcons = () => {
        let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
        if (maxScrollableWidth <= 0) {
            // Hide both arrows if there's no overflow
            $arrowEventsIcons.parent().css("display", "none");
        } else {
            // Handle visibility based on scroll position
            $arrowEventsIcons.eq(0).parent().css("display", $tabsBox.scrollLeft() <= 0 ? "none" : "flex");
            $arrowEventsIcons.eq(1).parent().css("display", maxScrollableWidth - $tabsBox.scrollLeft() <= 1 ? "none" : "flex");
        }
    };

    // Initial check
    handleEventsIcons();

    $arrowEventsIcons.on("click", function() {
        if ($(this).attr("id") === "left") {
            $tabsBox.animate({
                scrollLeft: "-=340"
            }, 400);
        } else {
            $tabsBox.animate({
                scrollLeft: "+=340"
            }, 400);
        }
    });

    $allTabs.on("click", function() {
        $tabsBox.find(".active").removeClass("active");
        $(this).addClass("active");
    });

    $tabsBox.on("scroll", handleEventsIcons);
    $(window).on("resize", handleEventsIcons); // Check on resize as well
});

</script>
