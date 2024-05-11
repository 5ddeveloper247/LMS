<div>
    <input type="hidden" value="{{ asset('/') }}" id="baseUrl">
    <div class="details_content">
        <span>{{ __('frontend.Category') }}</span>
        <h4 class="f_w_700">{{ @$course->category->name }}</h4>
    </div>
    <div class="single__details">
        <div class="details_content">
            <span>{{ __('frontend.Reviews') }}</span>
            <div class="rating_star">
                <div class="stars">
                    @if (!empty(@$userRating['rating']))
                        @php
                            $main_stars = @$userRating['rating'];
                            $stars = intval($userRating['rating']);
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
                <p>{{ @$userRating['rating'] }}
                    ({{ @$userRating['total'] }} {{ __('frontend.Rating') }})</p>
                @endif
            </div>
        </div>
    </div>

    <div class="video_screen @if ($course->host != 'ImagePreview' && $course->host != '') theme__overlay @endif mb_60">
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

    <div class="course_tabs text-center">
        <ul class="w-200 nav lms_tabmenu justify-content-between mb_55" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview" role="tab"
                    aria-controls="Overview" aria-selected="true">{{ __('frontend.Overview') }}</a>
            </li>
            @if ($course->type != 7)
                @if (request()->courseType != 6)
                    <li class="nav-item">
                        <a class="nav-link" id="Curriculum-tab" data-toggle="tab" href="#Curriculum" role="tab"
                            aria-controls="Curriculum" aria-selected="false">{{ __('frontend.Curriculum') }}</a>
                    </li>
                @endif
                @if (request()->courseType != 5)
                    <li class="nav-item">
                        <a class="nav-link" id="Classes-tab" data-toggle="tab" href="#Classes" role="tab"
                            aria-controls="Classes" aria-selected="false">{{ __('Classes') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" id="timetable-tab" data-toggle="tab" href="#Timetable" role="tab"
                        aria-controls="Timetable" aria-selected="false">{{ __('Time Table') }}</a>
                </li>
            @endif
            @if (Settings('hide_review_section') != '1')
                <li class="nav-item">
                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                        aria-controls="Instructor" aria-selected="false">{{ __('frontend.Reviews') }}</a>
                </li>
            @endif

            @if (Settings('hide_qa_section') != '1')
                <li class="nav-item">
                    <a class="nav-link" id="QA-tab" data-toggle="tab" href="#QASection" role="tab"
                        aria-controls="Instructor" aria-selected="false">{{ __('frontend.QA') }}</a>
                </li>
            @endif
        </ul>
    </div>

    <div class="single_overview">

        @if (!empty($course->requirements))
            <h4 class="font_22 f_w_700 mb_20">
                {{ __('frontend.Course Requirements') }}</h4>
            <div class="theme_border"></div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        {!! $course->requirements !!}
                    </div>
                </div>
            </div>
            <p class="mb_20">
            </p>
        @endif

        @if (!empty($course->about))
            <h4 class="font_22 f_w_700 mb_20">
                {{ __('frontend.Course Description') }}</h4>
            <div class="theme_border"></div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        {!! $course->about !!}
                    </div>
                </div>
            </div>
            <p class="mb_20">
            </p>
        @endif


        @if (!empty($course->outcomes))
            <h4 class="font_22 f_w_700 mb_20">{{ __('frontend.Course Outcomes') }}
            </h4>
            <div class="theme_border"></div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        {!! $course->outcomes !!}
                    </div>
                </div>
            </div>
            <p class="mb_20">
            </p>
        @endif
        @if (!Settings('hide_social_share_btn') == '1')
            <div class="social_btns">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                    class="social_btn fb_bg"> <i class="fab fa-facebook-f"></i>
                    {{ __('frontend.Facebook') }} </a>
                <a target="_blank"
                    href="https://twitter.com/intent/tweet?text={{ $course->title }}&amp;url={{ URL::current() }}"
                    class="social_btn Twitter_bg"> <i class="fab fa-twitter"></i>
                    {{ __('frontend.Twitter') }}</a>
                <a target="_blank"
                    href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&amp;description={{ $course->title }}"
                    class="social_btn Pinterest_bg"> <i class="fab fa-pinterest-p"></i>
                    {{ __('frontend.Pinterest') }}
                </a>
                <a target="_blank"
                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::current() }}&amp;title={{ $course->title }}&amp;summary={{ $course->title }}"
                    class="social_btn Linkedin_bg"> <i class="fab fa-linkedin-in"></i>
                    {{ __('frontend.Linkedin') }}
                </a>
            </div>
        @endif
    </div>
    <div class="theme_according mb_30" id="accordion1">
        @if (!empty($course->chapters))
            @foreach ($course->chapters as $chapter)
                <div class="card">

                    {{-- <div class="card-header pink_bg" id="heading{{ $chapter->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link text_white collapsed" data-toggle="collapse"
                                data-target="#collapse{{ $chapter->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $chapter->id }}">
                                {{ $chapter->name }}
                                <span class="course_length">
                                    @if (count($chapter->lessons))
                                        {{ count($chapter->lessons) }}
                                    @else
                                        <p>No Lesson Found</p>
                                    @endif

                                    {{ __('frontend.Lectures') }}
                                </span>
                            </button>
                        </h5>
                    </div> --}}
                    <div class="collapse" id="collapse{{ $chapter->id }}"
                        aria-labelledby="heading{{ $chapter->id }}" data-parent="#accordion1">
                        <div class="card-body">
                            <div class="curriculam_list">
                                <!-- curriculam_single  -->
                                @foreach ($chapter->lessons as $key => $lesson)
                                    <div class="curriculam_single">
                                        <div class="curriculam_left">
                                            @if ($lesson->is_lock == 1)
                                                @if (Auth::check())
                                                    @if ($isEnrolled)
                                                        @if ($lesson->is_quiz == 1)
                                                            @foreach ($lesson->quiz as $quiz)
                                                                <span
                                                                    onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                                    class="quizLink active">
                                                                    <i class="ti-check-box"></i>
                                                                    <span class="quiz_name">{{ @$key + 1 }}
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
                                                                <span class="quiz_name">{{ @$key + 1 }}
                                                                    {{ @$quiz->title }}
                                                                    [Quiz]</span>
                                                            @endforeach
                                                        @else
                                                            <span data-host="{{ $lesson->host }}"
                                                                data-url="{{ youtubeVideo($lesson->video_url) }}">{{ @$key + 1 }}
                                                                {{ @$lesson->name }}</span>
                                                        @endif
                                                    @endif
                                                @else
                                                    <i class="ti-lock"></i>
                                                    @if ($lesson->is_quiz == 1)
                                                        @foreach ($lesson->quiz as $quiz)
                                                            <span class="quiz_name">{{ @$key + 1 }}
                                                                {{ @$quiz->title }}
                                                                [Quiz]</span>
                                                        @endforeach
                                                    @else
                                                        <span data-host="{{ $lesson->host }}"
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
                                                                <i class="ti-check-box"></i>
                                                                <span class="quiz_name">{{ @$key + 1 }}
                                                                    {{ @$quiz->title }}
                                                                    [Quiz]</span>
                                                            </span>
                                                        @else
                                                            <i class="ti-check-box"></i>
                                                            <span class="quiz_name">{{ @$key + 1 }}
                                                                {{ @$quiz->title }}
                                                                [Quiz]</span>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @if ($lesson->host == 'Youtube')
                                                        <i class="ti-control-play"></i>
                                                        <span class="lesson_name" data-host="{{ $lesson->host }}"
                                                            data-url="{{ youtubeVideo($lesson->video_url) }}">{{ @$key + 1 }}
                                                            {{ @$lesson->name }}</span>
                                                    @elseif($lesson->host == 'Self' || $lesson->host == 'AmazonS3')
                                                        <i class="ti-control-play"></i>
                                                        <span class="lesson_name" data-host="{{ $lesson->host }}"
                                                            data-url="{{ asset($lesson->video_url) }}">{{ @$key + 1 }}
                                                            {{ @$lesson->name }}</span>
                                                    @else
                                                        <i class="ti-control-play"></i>
                                                        <span class="lesson_name" data-host="{{ $lesson->host }}"
                                                            data-url="{{ $lesson->video_url }}">{{ @$key + 1 }}
                                                            {{ @$lesson->name }}</span>
                                                    @endif
                                                @endif
                                            @endif

                                        </div>
                                        <div class="curriculam_right">
                                            @if ($lesson->is_lock == 0)
                                                @if ($lesson->is_quiz == 0)
                                                    <a href="#" data-course="{{ $course->id }}"
                                                        data-lesson="{{ $lesson->id }}"
                                                        @if (request()->has('program_id')) data-program_id="{{ $request->program_id ?? 0 }}" @endif
                                                        @if (request()->has('courseType')) data-courseType="{{ $request->courseType }}" @endif
                                                        class="theme_btn_lite goFullScreen">{{ __('frontend.Preview') }}</a>
                                                @else
                                                    <a href="#" class="theme_btn_lite quizLink"
                                                        onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})">{{ __('frontend.Start') }}</a>
                                                @endif
                                            @else
                                                @if (Auth::check() && $isEnrolled)
                                                    @if ($lesson->is_quiz == 0)
                                                        <a href="#" data-course="{{ $course->id }}"
                                                            data-lesson="{{ $lesson->id }}"
                                                            @if (request()->has('program_id')) data-program_id="{{ $request->program_id ?? 0 }}" @endif
                                                            @if (request()->has('courseType')) data-courseType="{{ $request->courseType }}" @endif
                                                            class="theme_btn_lite goFullScreen">{{ __('common.View') }}</a>
                                                    @else
                                                        <a href="#"
                                                            onclick="goFullScreen({{ $course->id }},{{ $lesson->id }},{{ $request->program_id ?? 0 }},{{ $request->courseType ?? 0 }})"
                                                            class="theme_btn_lite quizLink">{{ __('frontend.Start') }}</a>
                                                    @endif
                                                @endif
                                            @endif

                                            @php
                                                $duration = 0;
                                                if ($lesson->is_quiz == 0 || count($lesson->quiz) == 0) {
                                                    $duration = $lesson->duration;
                                                } else {
                                                    $quiz = $lesson->quiz[0];
                                                    $type = $quiz->question_time_type;
                                                    if ($type == 0) {
                                                        $duration = $quiz->question_time * count($quiz->assign);
                                                    } else {
                                                        $duration = $quiz->question_time;
                                                    }
                                                }
                                            @endphp
                                            <span class="nowrap">{{ MinuteFormat($duration) }}</span>
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
