<div>
    @php
        function secondsToTime($seconds)
        {
            $dtF = new \DateTime('@0');
            $dtT = new \DateTime("@$seconds");
            return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
        }

        function secondsToHour($seconds)
        {
            $dtF = new \DateTime('@0');
            $dtT = new \DateTime("@$seconds");
            return $dtF->diff($dtT)->format('%h : %i Hour(s)');
        }

        if (Auth::check() && $isEnrolled) {
            $allow = true;
        } else {
            $allow = false;
        }
    @endphp
    {{-- @dd($isEnrolled) --}}
    <input type="hidden" name="start_time" class="class_start_time"
        value="{{ isset($course->nextMeeting->start_time) ? $course->nextMeeting->start_time : '' }}">
    <!-- course_details::start  -->
    <div class="course__details py-md-5 py-4">
        <div class="container">
            <div class="row px-md-5 px-1">
                <div class="col-xl-12">
                    <div class="course__details_title class_details">
                        <div class="single__details">
                            <div class="thumb"
                                style="background-image: url('{{ getInstructorImage(@$course->user->image) }}')">
                            </div>
                            <div class="details_content">
                                <span>{{ __('frontend.Instructor Name') }}</span>
                                <a href="{{ route('instructorDetails', [$course->user->id, $course->user->name]) }}">
                                    <h5 class="custom_small_heading f_w_700">{{ @$course->user->name }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="single__details">
                            <div class="details_content">
                                <span>{{ __('frontend.Category') }}</span>
                                <h5 class="f_w_700">{{ @$course->class->category->name }}</h5>
                            </div>
                        </div>
                        <div class="single__details">
                            <div class="details_content">
                                <span>{{ __('frontend.Reviews') }}</span>


                                <div class="rating_star">
                                    <div class="stars">
                                        @php
                                            $main_stars = @$course->user->totalRating()['rating'];

                                            $stars = intval(@$course->user->totalRating()['rating']);

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
                                    <p>{{ @$course->user->totalRating()['rating'] }}
                                        ({{ @$course->user->totalRating()['total'] }} {{ __('frontend.rating') }})</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-md-5 mb-4">
                        <div class="video_play text-center">

                            @if (Auth::check())
                                {{--                                @if (!$isEnrolled) --}}

                                {{--                                @if (@$course->class->host == 'Zoom') --}}
                                {{--                                    @if (@$course->nextMeeting->currentStatus == 'started') --}}
                                {{--                                        <a target="_blank" --}}
                                {{--                                           href="{{route('classStart', [$course->slug,'Zoom',$course->nextMeeting->id])}}" --}}
                                {{--                                           class="theme_btn d-block text-center height_50 mb_10"> --}}
                                {{--                                            {{__('common.Watch Now')}} --}}
                                {{--                                        </a> --}}
                                {{--                                    @elseif (@$course->nextMeeting->currentStatus== 'waiting') --}}
                                {{--                                        <span --}}
                                {{--                                            class="theme_btn d-block text-center height_50 mb_10"> --}}
                                {{--                                                {{__('frontend.Waiting')}} --}}
                                {{--                                           </span> --}}
                                {{--                                    @else --}}
                                {{--                                        @if ($isWaiting) --}}
                                {{--                                            <span --}}
                                {{--                                                class="theme_line_btn d-block text-center height_50 mb_10"> --}}
                                {{--                                                    {{__('frontend.Waiting')}} --}}
                                {{--                                                </span> --}}
                                {{--                                        @else --}}
                                {{--                                            @if ($certificateCanDownload) --}}
                                {{--                                                <a href="{{route('getCertificate',[$course->id,$course->title])}}" --}}
                                {{--                                                   class="theme_btn certificate_btn mt-5"> --}}
                                {{--                                                    {{__('frontend.Get Certificate')}} --}}
                                {{--                                                </a> --}}
                                {{--                                            @else --}}
                                {{--                                                <span --}}
                                {{--                                                    class="theme_line_btn d-block text-center height_50 mb_10"> --}}
                                {{--                                                {{__('frontend.Closed')}} --}}
                                {{--                                            </span> --}}
                                {{--                                            @endif --}}
                                {{--                                        @endif --}}

                                {{--                                    @endif --}}
                                {{--                                @endif --}}

                                @if (@$course->class->host == 'BBB')
                                    @php
                                        $hasClass = false;
                                    @endphp
                                    @foreach ($course->class->bbbMeetings as $key => $meeting)
                                    @dd($meeting)
                                        @if (!$hasClass)
                                            @if (@$meeting->isRunning())
                                                <a target="_blank"
                                                    href="{{ route('classStart', [$course->slug, 'BBB', $meeting->id]) }}"
                                                    class="theme_btn d-block height_50 mb_10 text-center">
                                                    {{ __('common.Watch Now') }}
                                                </a>
                                                @php
                                                    $hasClass = true;
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if (!$hasClass)
                                        @if ($isWaiting)
                                            <span class="theme_line_btn d-block height_50 mb_10 text-center">
                                                {{ __('frontend.Waiting') }}
                                            </span>
                                        @else
                                            <span class="theme_line_btn d-block height_50 mb_10 text-center">
                                                {{ __('frontend.Closed') }}
                                            </span>
                                        @endif
                                    @endif
                                @endif
                                @if (@$course->class->host == 'Jitsi')
                                    @if ($course->nextMeeting)
                                        @php
                                            $start = \Illuminate\Support\Carbon::parse($course->nextMeeting->date . ' ' . $course->nextMeeting->time);
                                            $nowDate = \Illuminate\Support\Carbon::now();
                                            $not_start = $start->gt($nowDate);

                                            $end = $start->addMinutes($course->nextMeeting->duration);
                                            $not_end = $end->gt($nowDate);
                                        @endphp
                                        @if (!$not_start && $not_end)

                                            <a target="_blank"
                                                href="{{ route('classStart', [$course->slug, 'Jitsi', $course->nextMeeting->id]) }}"
                                                class="theme_btn d-block height_50 mb_10 text-center">
                                                {{ __('common.Watch Now') }}
                                            </a>
                                        @else
                                            @if ($isWaiting)
                                                <span class="theme_line_btn d-block height_50 mb_10 text-center">
                                                    {{ __('frontend.Waiting') }}
                                                </span>
                                            @else
                                                <span class="theme_line_btn d-block height_50 mb_10 text-center">
                                                    {{ __('frontend.Closed') }}
                                                </span>
                                            @endif
                                        @endif
                                    @endif
                                @endif

                                {{--                                @else --}}
                                {{--                                    @if (!onlySubscription()) --}}
                                {{--                                        @if ($isFree) --}}
                                {{--                                            @if ($is_cart == 1) --}}
                                {{--                                                <a href="javascript:void(0)" --}}
                                {{--                                                   class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a> --}}
                                {{--                                            @else --}}
                                {{--                                                <a href="{{route('addToCart',[@$course->id])}}" --}}
                                {{--                                                   class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a> --}}
                                {{--                                            @endif --}}
                                {{--                                        @else --}}
                                {{--                                            <a href=" {{route('addToCart',[@$course->id])}} " --}}
                                {{--                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a> --}}
                                {{--                                            <a href="{{route('buyNow',[@$course->id])}}" --}}
                                {{--                                               class="theme_line_btn d-block text-center height_50 mb_20">{{__('common.Buy Now')}}</a> --}}
                                {{--                                        @endif --}}
                                {{--                                    @endif --}}
                                {{--                                @endif --}}
                            @else
                                @if (!onlySubscription())
                                    @if ($isFree)
                                        <a href=" {{ route('addToCart', [@$course->id]) }} "
                                            class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                    @else
                                        <a href=" {{ route('addToCart', [@$course->id]) }} "
                                            class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                        <a href="{{ route('buyNow', [@$course->id]) }}"
                                            class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                    @endif
                                @endif
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        <div class="{{ onlySubscription() ? 'col-xl-12 col-lg-12' : 'col-xl-8 col-lg-8' }}">
                            <div class="course_tabs w-100 text-center mb-md-5 mb-3">
                                <div class="events_wrapper">
                                    <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="left" class="fa-solid fa-angle-left"></i>
                                    </div>
                                <ul class="d-flex w-100 nav lms_tabmenu text-center" id="myTab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                            role="tab" aria-controls="Overview"
                                            aria-selected="true">{{ __('frontend.Overview') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Curriculum-tab" data-toggle="tab" href="#Curriculum"
                                            role="tab" aria-controls="Curriculum"
                                            aria-selected="false">{{ __('Class Schedule') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Instructor-tab" data-toggle="tab" href="#Instructor"
                                            role="tab" aria-controls="Instructor"
                                            aria-selected="false">{{ __('frontend.Instructor') }}</a>
                                    </li>
                                    @if (Settings('hide_review_section') != '1')
                                        <li class="nav-item">
                                            <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews"
                                                role="tab" aria-controls="Instructor"
                                                aria-selected="false">{{ __('frontend.Reviews') }}</a>
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
                                <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="right" class="fa-solid fa-angle-right"></i></div>
                            </div>
                            </div>

                            <div class="tab-content lms_tab_content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                    aria-labelledby="Overview-tab">
                                    <!-- content  -->
                                    <div class="course_overview_description">
                                        <div class="row mb_40">
                                            <div class="col-12">
                                                <div class="description_grid">

                                                    @if ($course->class->type == '0')
                                                        <div class="single_description_grid">
                                                            <h5> {{ __('common.Start Date & Time') }}</h5>
                                                            <p>
                                                                {{ showDate($course->class->start_date) }}
                                                                {{ __('common.At') }}
                                                                {{ date('h:i A', strtotime($course->class->time)) }}
                                                            </p>
                                                        </div>
                                                        <div class="single_description_grid">
                                                            <h5> {{ __('common.End Date & Time') }}</h5>
                                                            <p>{{ showDate($course->class->end_date) }}
                                                                {{ __('common.At') }}
                                                                @php
                                                                    $duration = $course->class->duration ?? 0;

                                                                @endphp
                                                                {{ date('h:i A', strtotime('+' . $duration . ' minutes', strtotime($course->class->time))) }}
                                                            </p>
                                                        </div>
                                                    @else

                                                    <?php

                                                        $givenDate = strtotime($course->class->start_date);
                                                        $targetDayOfWeek = date('N', strtotime($course->class->class_day)); // Convert day to numeric representation (1 = Monday, 2 = Tuesday, etc.)

                                                        while (date('N', $givenDate) != $targetDayOfWeek) {
                                                            $givenDate = strtotime('+1 day', $givenDate);
                                                        }

                                                        $formatedDate = new DateTime(date('Y-m-d', $givenDate));
                                                        $nextformattedDate = $formatedDate->format('jS D, Y');

                                                        ?>



                                                        <div class="single_description_grid">
                                                            <h5> {{ __('common.Start Date') }}</h5>
                                                            <p>
                                                                {{-- date('dS D, Y', $nextDateFormatted) --}}
                                                                {{-- $nextDateFormatted->format('jS D, Y') --}}
                                                                {{ $nextformattedDate }}

                                                            </p>
                                                        </div>
                                                        <div class="single_description_grid">
                                                            <h5> {{ __('Start Time & End Time') }}</h5>
                                                            <p>
                                                                {{-- date('dS D, Y', $date) --}}
                                                                {{ date('h:i A', strtotime($course->class->time)) }}
                                                                {{ __('To') }}
                                                                @php
                                                                    $duration = $course->class->duration ?? 0;

                                                                @endphp
                                                                {{ date('h:i A', strtotime('+' . $duration . ' minutes', strtotime($course->class->time))) }}
                                                            </p>
                                                        </div>
                                                        @endif
                                                    <div class="single_description_grid">
                                                        <h5> {{ __('common.Duration') }}</h5>
                                                        @php
                                                            $days = 1;
                                                            if ($course->class->host == 'Zoom') {
                                                                $days = count($course->class->zoomMeetings);
                                                            } elseif ($course->class->host == 'BBB') {
                                                                $days = count($course->class->bbbMeetings);
                                                            } elseif ($course->class->host == 'Jitsi') {
                                                                $days = count($course->class->jitsiMeetings);
                                                            } elseif ($course->class->host == 'Team') {
                                                                $days = count($course->class->teamMeetings);
                                                            }

                                                            $str = ($course->class->duration ?? 0) * $days;
                                                            $duration = preg_replace('/[^0-9]/', '', $str);

                                                        @endphp
                                                        <p class="nowrap">{{ MinuteFormat($duration) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_overview">
                                            <h5 class="font_22 f_w_700 mb_20">{{ __('Class Description') }}
                                            </h5>
                                            <div class="theme_border"></div>
                                            <div class="">
                                                {!! $course->about !!}
                                            </div>
                                            <p class="mb_20">

                                            </p>
                                            @if (!Settings('hide_social_share_btn') == '1')
                                                <div class="social_btns">
                                                    <a target="_blank"
                                                        href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                                                        class="social_btn fb_bg"> <i class="fab fa-facebook-f"></i>
                                                        {{ __('frontend.Facebook') }}</a>
                                                    <a target="_blank"
                                                        href="https://twitter.com/intent/tweet?text={{ $course->title }}&amp;url={{ URL::current() }}"
                                                        class="social_btn Twitter_bg"> <i class="fab fa-twitter"></i>
                                                        {{ __('frontend.Twitter') }}</a>
                                                    <a target="_blank"
                                                        href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&amp;description={{ $course->title }}"
                                                        class="social_btn Pinterest_bg"> <i
                                                            class="fab fa-pinterest-p"></i>
                                                        {{ __('frontend.Pinterest') }}
                                                    </a>
                                                    <a target="_blank"
                                                        href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::current() }}&amp;title={{ $course->title }}&amp;summary={{ $course->title }}"
                                                        class="social_btn Linkedin_bg"> <i
                                                            class="fab fa-linkedin-in"></i>
                                                        {{ __('frontend.Linkedin') }}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--/ content  -->
                                </div>
                                <div class="tab-pane fade" id="Curriculum" role="tabpanel"
                                    aria-labelledby="Curriculum-tab">
                                    <!-- content  -->
                                    <h5 class="font_22 f_w_700 mb_20">{{ __('Class Schedule') }}</h5>

                                    <div class="single_description">

                                        {{-- @dd('kamran') --}}
                                        @if ($course->class->host == 'BBB')
                                            @dd('first')
                                            @foreach ($course->class->bbbMeetings as $key => $meeting)
                                                <div class="row justify-content-between m-2 p-3 text-center"
                                                    style="border:1px solid #E1E2E6">
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="border-right: 1px solid #E1E2E6;">
                                                        <span>
                                                            {{ __('common.Start Date') }}
                                                        </span>

                                                        <h6 class="mb-0">{{ date('d M Y', $meeting->datetime) }}
                                                        </h6>
                                                    </div>
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="border-right: 1px solid #E1E2E6;">
                                                        <span>
                                                            {{ __('common.Time') }} <br>
                                                            ({{ __('common.Start') }} - {{ __('common.End') }})
                                                            breadcrumb_area bradcam_bg_2                  </span>
                                                        <h6 class="mb-0">{{ date('g:i A', $meeting->datetime) }}
                                                            - @if ($meeting->duration == 0)
                                                                N/A
                                                            @else
                                                                {{ date('g:i A', $meeting->datetime + $meeting->duration * 60) }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="{{ !$allow ? 'border-right: 1px solid #E1E2E6;' : '' }}">
                                                        <span>
                                                            {{ __('common.Duration') }}
                                                        </span>
                                                        @php

                                                            $str = $meeting->duration ?? 0;
                                                            $duration = preg_replace('/[^0-9]/', '', $str);

                                                        @endphp
                                                        <h6 class="nowrap mb-0">{{ MinuteFormat($duration) }}</h6>
                                                    </div>


                                                    @if (!(Auth::check() && $isEnrolled))
                                                        <div class="col-sm-3 margin_auto">

                                                            @if (@$meeting->isRunning())
                                                                <a target="_blank"
                                                                    href="{{ route('classStart', [$course->slug, 'BBB', $meeting->id]) }}"
                                                                    class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                    {{ __('common.Watch Now') }}
                                                                </a>
                                                            @else
                                                                @php
                                                                    $last_time = Illuminate\Support\Carbon::parse($meeting->date . ' ' . $meeting->time);
                                                                    $nowDate = Illuminate\Support\Carbon::now();
                                                                    $isWaiting = $last_time->gt($nowDate);

                                                                @endphp
                                                                @if ($isWaiting)
                                                                    <span
                                                                        class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                        {{ __('frontend.Waiting') }}
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                        {{ __('frontend.Closed') }}
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endif


                                                </div>
                                            @endforeach
                                        @elseif($course->class->host == 'Jitsi')
                                            @dd('second')

                                            @foreach ($course->class->jitsiMeetings as $key => $meeting)
                                                <div class="row justify-content-between m-2 p-3 text-center"
                                                    style="border:1px solid #E1E2E6">
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="border-right: 1px solid #E1E2E6;">
                                                        <span>
                                                            {{ __('common.Start Date') }}
                                                        </span>

                                                        <h6 class="mb-0">{{ date('d M Y', $meeting->datetime) }}
                                                        </h6>
                                                    </div>
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="border-right: 1px solid #E1E2E6;">
                                                        <span>
                                                            {{ __('common.Time') }} <br>
                                                            ({{ __('common.Start') }} - {{ __('common.End') }})
                                                        </span>
                                                        <h6 class="mb-0">{{ date('g:i A', $meeting->datetime) }}
                                                            - @if ($meeting->duration == 0)
                                                                N/A
                                                            @else
                                                                {{ date('g:i A', $meeting->datetime + $meeting->duration * 60) }}
                                                            @endif
                                                        </h6>

                                                    </div>
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="{{ !$allow ? 'border-right: 1px solid #E1E2E6;' : '' }}">
                                                        <span>
                                                            {{ __('common.Duration') }}
                                                        </span>
                                                        @php
                                                            $str = $meeting->duration ?? 0;
                                                            $duration = preg_replace('/[^0-9]/', '', $str);

                                                        @endphp
                                                        <h6 class="nowrap mb-0">{{ MinuteFormat($duration) }}</h6>
                                                    </div>


                                                    @if (Auth::check() && !$isEnrolled)
                                                        <div class="col-sm-3 margin_auto">
                                                            @php
                                                                $start = \Illuminate\Support\Carbon::parse($meeting->date . ' ' . $meeting->time);
                                                                $nowDate = \Illuminate\Support\Carbon::now();
                                                                $not_start = $start->gt($nowDate);
                                                                $end = $start->addMinutes($meeting->duration);
                                                                $not_end = $end->gt($nowDate);
                                                            @endphp
                                                            @if (!$not_start && $not_end)
                                                                )

                                                                <a target="_blank"
                                                                    href="{{ route('classStart', [$course->slug, 'Jitsi', $meeting->id]) }}"
                                                                    class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                    {{ __('common.Watch Now') }}
                                                                </a>
                                                            @else
                                                                @php
                                                                    $last_time = Illuminate\Support\Carbon::parse($meeting->date . ' ' . $meeting->time);
                                                                    $nowDate = Illuminate\Support\Carbon::now();
                                                                    $isWaiting = $last_time->gt($nowDate);

                                                                @endphp
                                                                @if ($isWaiting)
                                                                    <span
                                                                        class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                        {{ __('frontend.Waiting') }}
                                                                    </span>
                                                                @else
                                                                    <span
                                                                        class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                        {{ __('frontend.Closed') }}
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endif


                                                </div>
                                            @endforeach
                                        @elseif($course->class->host == 'Zoom')
                                            {{-- @dd('third') --}}

                                            @foreach ($course->class->zoomMeetings as $key => $meeting)
                                                <div class="row justify-content-between m-2 p-3 text-center"
                                                    style="border:1px solid #E1E2E6">
                                                    @if ($course->class->type == '0')
                                                        <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                            style="border-right: 1px solid #E1E2E6;">
                                                            <span>
                                                                {{ __('common.Start Date') }}
                                                            </span>

                                                            <h6 class="mb-0">
                                                                {{ date('d M Y', strtotime($meeting->start_time)) }}
                                                            </h6>
                                                        </div>
                                                    @else
                                                        <?php

                                                        $date = strtotime('next ' . strtolower(date('l', strtotime($course->classStartDate))));

                                                        $givenDate = strtotime($course->class->start_date);
                                                        $targetDayOfWeek = date('N', strtotime($course->class->class_day));

                                                        while (date('N', $givenDate) != $targetDayOfWeek) {
                                                            $givenDate = strtotime('+1 day', $givenDate);
                                                        }

                                                        $nextformattedDate = date('d M Y', $givenDate);
                                                        $nextWeekDate = date('Y-m-d', $givenDate);
                                                        ?>
                                                        <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                            style="border-right: 1px solid #E1E2E6;">
                                                            <span>
                                                                {{ __('common.Start Date') }}
                                                            </span>
                                                            <h6 class="mb-0">
                                                                {{-- date('d M Y', $date) --}}
                                                                {{ date('d M Y', strtotime($meeting->start_time)) }}
                                                                {{-- {{ $nextformattedDate }} --}}
                                                            </h6>
                                                        </div>
                                                    @endif
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="border-right: 1px solid #E1E2E6;">
                                                        <span>
                                                            {{ __('common.Time') }} <br>
                                                            ({{ __('common.Start') }} - {{ __('common.End') }})
                                                        </span>
                                                        <h6 class="mb-0">
                                                            {{ date('g:i A', strtotime($meeting->start_time)) }}
                                                            -{{ date('g:i A', strtotime($meeting->end_time)) }}</h6>
                                                    </div>
                                                    <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                        style="{{ !$allow ? 'border-right: 1px solid #E1E2E6;' : '' }}">
                                                        <span>
                                                            {{ __('common.Duration') }}
                                                        </span>
                                                        @php
                                                            $str = $meeting->meeting_duration ?? 0;
                                                            $duration = preg_replace('/[^0-9]/', '', $str);
                                                        @endphp
                                                        <h6 class="nowrap mb-0">{{ MinuteFormat($duration) }}</h6>
                                                    </div>

                                                    <div class="col-sm-3 margin_auto">
                                                        {{-- @dd($course->classStartDate, $nextWeekDate) --}}
                                                        @php
                                                        if(Carbon\Carbon::now() < Carbon\Carbon::parse($meeting->start_time)){
                                                          $currClassStatus = 'waiting';
                                                        }elseif (Carbon\Carbon::now() >= Carbon\Carbon::parse($meeting->start_time) && Carbon\Carbon::now() <= Carbon\Carbon::parse($meeting->end_time)) {
                                                          $currClassStatus = 'started';
                                                        }elseif(Carbon\Carbon::now() > Carbon\Carbon::parse($meeting->end_time)){
                                                          $currClassStatus = 'closed';
                                                        }
                                                            $start_time = date('H:i:s', strtotime($meeting->start_time));
                                                            $end_time = date('H:i:s', strtotime($meeting->end_time));
                                                            // if ($course->classStartDate > date('Y-m-d')) {
                                                            //     $meeting->start_time = $course->classStartDate . ' ' . $start_time;
                                                            //     $meeting->end_time = $course->classStartDate . ' ' . $end_time;
                                                            // } else {
                                                            //     $meeting->start_time = $nextWeekDate . ' ' . $start_time;
                                                            //     $meeting->end_time = $nextWeekDate . ' ' . $end_time;
                                                            // }

                                                        @endphp
                                                        {{-- @dd($meeting->currentStatus) --}}

                                                        @if ($currClassStatus == 'started')
                                                            <a target="_blank"
                                                                href="{{ route('classStart', [$course->slug, 'Zoom', $meeting->id]) }}"
                                                                class="theme_btn small_btn2 height_50 text-center">
                                                                {{ __('common.Watch Now') }}
                                                            </a>
                                                        @elseif ($currClassStatus == 'waiting')
                                                            <span
                                                                class="theme_line_btn small_btn2 height_50 text-center">
                                                                {{ __('frontend.Waiting') }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="theme_line_btn small_btn2 height_50 text-center">
                                                                {{ __('frontend.Closed') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    {{--                                                    @endif --}}
                                                </div>
                                            @endforeach
                                          @elseif($course->class->host == 'Team')
                                              {{-- @dd('third') --}}

                                              @foreach ($course->class->teamMeetings as $key => $meeting)
                                                  <div class="row justify-content-between m-2 p-3 text-center"
                                                      style="border:1px solid #E1E2E6">
                                                      @if ($course->class->type == '0')
                                                          <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                              style="border-right: 1px solid #E1E2E6;">
                                                              <span>
                                                                  {{ __('common.Start Date') }}
                                                              </span>

                                                              <h6 class="mb-0">
                                                                  {{ date('d M Y', strtotime($meeting->start_time)) }}
                                                              </h6>
                                                          </div>
                                                      @else
                                                          <?php

                                                          $date = strtotime('next ' . strtolower(date('l', strtotime($course->classStartDate))));

                                                          $givenDate = strtotime($course->class->start_date);
                                                          $targetDayOfWeek = date('N', strtotime($course->class->class_day));

                                                          while (date('N', $givenDate) != $targetDayOfWeek) {
                                                              $givenDate = strtotime('+1 day', $givenDate);
                                                          }

                                                          $nextformattedDate = date('d M Y', $givenDate);
                                                          $nextWeekDate = date('Y-m-d', $givenDate);
                                                          ?>
                                                          <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                              style="border-right: 1px solid #E1E2E6;">
                                                              <span>
                                                                  {{ __('common.Start Date') }}
                                                              </span>
                                                              <h6 class="mb-0">
                                                                  {{ date('d M Y', strtotime($meeting->start_time)) }}
                                                              </h6>
                                                          </div>
                                                      @endif
                                                      <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                          style="border-right: 1px solid #E1E2E6;">
                                                          <span>
                                                              {{ __('common.Time') }} <br>
                                                              ({{ __('common.Start') }} - {{ __('common.End') }})
                                                          </span>
                                                          <h6 class="mb-0">
                                                              {{ date('g:i A', strtotime($meeting->start_time)) }}
                                                              -{{ date('g:i A', strtotime($meeting->end_time)) }}</h6>
                                                      </div>
                                                      <div class="{{ !$allow ? 'col-sm-3' : 'col-sm-4' }} margin_auto"
                                                          style="{{ !$allow ? 'border-right: 1px solid #E1E2E6;' : '' }}">
                                                          <span>
                                                              {{ __('common.Duration') }}
                                                          </span>
                                                          @php
                                                              $str = $meeting->meeting_duration ?? 0;
                                                              $duration = preg_replace('/[^0-9]/', '', $str);
                                                          @endphp
                                                          <h6 class="nowrap mb-0">{{ MinuteFormat($duration) }}</h6>
                                                      </div>

                                                      <div class="col-sm-3 margin_auto">
                                                          {{-- @dd($course->classStartDate, $nextWeekDate) --}}
                                                          @php
                                                          if(Carbon\Carbon::now() < Carbon\Carbon::parse($meeting->start_time)){
                                                            $currClassStatus = 'waiting';
                                                          }elseif (Carbon\Carbon::now() >= Carbon\Carbon::parse($meeting->start_time) && Carbon\Carbon::now() <= Carbon\Carbon::parse($meeting->end_time)) {
                                                            $currClassStatus = 'started';
                                                          }elseif(Carbon\Carbon::now() > Carbon\Carbon::parse($meeting->end_time)){
                                                            $currClassStatus = 'closed';
                                                          }
                                                              $start_time = date('H:i:s', strtotime($meeting->start_time));
                                                              $end_time = date('H:i:s', strtotime($meeting->end_time));

                                                          @endphp
                                                          @if ($currClassStatus == 'started')
                                                              <a target="_blank"
                                                                  href="{{ route('classStart', [$course->slug, 'Team', $meeting->id]) }}"
                                                                  class="theme_btn small_btn2 height_50 p-3 text-center">
                                                                  {{ __('common.Watch Now') }}
                                                              </a>
                                                          @elseif ($currClassStatus == 'waiting')
                                                              <span
                                                                  class="theme_line_btn small_btn2 height_50 text-center">
                                                                  {{ __('frontend.Waiting') }}
                                                              </span>
                                                          @else
                                                              <span
                                                                  class="theme_line_btn small_btn2 height_50 text-center">
                                                                  {{ __('frontend.Closed') }}
                                                              </span>
                                                          @endif
                                                      </div>
                                                      {{--                                                    @endif --}}
                                                  </div>
                                              @endforeach
                                        @endif
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="Instructor" role="tabpanel"
                                    aria-labelledby="Instructor-tab">
                                    <div class="instractor_details_wrapper">
                                        <div class="instractor_title">
                                            <h5 class="font_22 f_w_700">{{ __('frontend.Instructor') }}</h5>
                                            <p class="font_16 f_w_400">{{ @$course->user->headline }}</p>
                                        </div>
                                        <div class="instractor_details_inner">
                                            <div class="thumb">
                                                <img class="h-100 w-100 rounded-card-img"
                                                    src="{{ getInstructorImage(@$course->user->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="instractor_details_info">
                                                <a
                                                    href="{{ route('instructorDetails', [$course->user->id, $course->user->name]) }}">
                                                    <h5 class="font_22 f_w_700">{{ @$course->user->name }}</h5>
                                                </a>
                                                <h5> {{ @$course->user->headline }}</h5>
                                                <div class="ins_details">
                                                    <p>{!! @$course->user->short_details !!}</p>
                                                </div>
                                                <div class="intractor_qualification">
                                                    <div class="single_qualification">
                                                        <i class="ti-star"></i>
                                                        {{ @$course->user->totalRating()['rating'] }}
                                                        {{ __('frontend.Rating') }}
                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-comments"></i>
                                                        {{ @$course->user->totalRating()['total'] }}
                                                        {{ __('frontend.Reviews') }}
                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-user"></i> {{ @$course->user->totalEnrolled() }}
                                                        {{ __('frontend.Students') }}
                                                    </div>
                                                    <div class="single_qualification">
                                                        <i class="ti-layout-media-center-alt"></i>
                                                        {{ @$course->user->totalCourses() }}
                                                        {{ __('Classs') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            {!! @$course->user->about !!} </p>
                                    </div>
                                    {{--                                    <div class="author_courses"> --}}
                                    {{--                                        <div class="section__title mb_80"> --}}
                                    {{--                                            <h5>{{__('More Quizzes by Author')}}</h5> --}}
                                    {{--                                        </div> --}}
                                    {{--                                        <div class="row"> --}}
                                    {{--                                            @foreach (@$course->user->courses->take(2) as $c) --}}
                                    {{--                                                <div class="col-xl-6"> --}}
                                    {{--                                                    <div class="couse_wizged mb_30"> --}}
                                    {{--                                                        <div class="thumb"> --}}
                                    {{--                                                            <a href="{{courseDetailsUrl(@$c->id,@$c->type,@$c->slug)}}"> --}}
                                    {{--                                                                <img class="w-100" --}}
                                    {{--                                                                     src="{{ file_exists($c->thumbnail) ? asset($c->thumbnail) : asset('public/\uploads/course_sample.png') }}" --}}
                                    {{--                                                                     alt=""> --}}

                                    {{--                                                                <x-price-tag :price="$course->price" --}}
                                    {{--                                                                             :discount="$course->discount_price"/> --}}

                                    {{--                                                            </a> --}}
                                    {{--                                                        </div> --}}
                                    {{--                                                        <div class="course_content"> --}}
                                    {{--                                                            <a href="{{courseDetailsUrl(@$c->id,@$c->type,@$c->slug)}}"> --}}
                                    {{--                                                                <h5>{{@$c->title}}</h5> --}}
                                    {{--                                                            </a> --}}
                                    {{--                                                            <div class="rating_cart"> --}}
                                    {{--                                                                <div class="rateing"> --}}
                                    {{--                                                                    <span>{{$c->totalReview}}/5</span> --}}
                                    {{--                                                                    <i class="fas fa-star"></i> --}}
                                    {{--                                                                </div> --}}
                                    {{--                                                                @auth() --}}
                                    {{--                                                                    @if (!$c->isLoginUserEnrolled && !$c->isLoginUserCart) --}}
                                    {{--                                                                        <a href="#" class="cart_store" --}}
                                    {{--                                                                           data-id="{{$c->id}}"> --}}
                                    {{--                                                                            <i class="fas fa-shopping-cart"></i> --}}
                                    {{--                                                                        </a> --}}
                                    {{--                                                                    @endif --}}
                                    {{--                                                                @endauth --}}
                                    {{--                                                                @guest() --}}
                                    {{--                                                                    @if (!$c->isGuestUserCart) --}}
                                    {{--                                                                        <a href="#" class="cart_store" --}}
                                    {{--                                                                           data-id="{{$c->id}}"> --}}
                                    {{--                                                                            <i class="fas fa-shopping-cart"></i> --}}
                                    {{--                                                                        </a> --}}
                                    {{--                                                                    @endif --}}
                                    {{--                                                                @endguest --}}
                                    {{--                                                            </div> --}}
                                    {{--                                                            <div class="course_less_students"> --}}
                                    {{--                                                                <a href="#"> <i --}}
                                    {{--                                                                        class="ti-agenda"></i> {{count($c->lessons)}} --}}
                                    {{--                                                                    {{__('frontend.Lessons')}}</a> --}}
                                    {{--                                                                <a href="#"> <i --}}
                                    {{--                                                                        class="ti-user"></i> {{$c->total_enrolled}} --}}
                                    {{--                                                                    {{__('frontend.Students')}} </a> --}}
                                    {{--                                                            </div> --}}
                                    {{--                                                        </div> --}}
                                    {{--                                                    </div> --}}
                                    {{--                                                </div> --}}
                                    {{--                                            @endforeach --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel"
                                    aria-labelledby="Reviews-tab">
                                    <!-- content  -->
                                    <div class="course_review_wrapper">
                                        <div class="details_title">
                                            <h5 class="font_22 f_w_700">{{ __('frontend.Student Feedback') }}</h5>
                                            <p class="font_16 f_w_400">{{ $course->title }}</p>
                                        </div>
                                        <div class="course_feedback">
                                            <div class="course_feedback_left">
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
                                                <span>{{ __('Class Rating') }}</span>
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
                                                            @if (!(Auth::check() && $isEnrolled))
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
                                                    <div class="rating_star text-right">

                                                        @php
                                                            $PickId = $course->id;
                                                        @endphp

                                                        @if (Auth::check() && Auth::user()->role_id == 3)
                                                            @if (!in_array(Auth::user()->id, $reviewer_user_ids))
                                                                <div
                                                                    class="star_icon d-flex align-items-center justify-content-end">
                                                                    <a class="rating">
                                                                        <input type="radio" id="star5"
                                                                            name="rating" value="5"
                                                                            class="rating" /><label class="full"
                                                                            for="star5" id="star5"
                                                                            title="Awesome - 5 stars"
                                                                            onclick="Rates(5, {{ @$PickId }})"></label>

                                                                        <input type="radio" id="star4"
                                                                            name="rating" value="4"
                                                                            class="rating" /><label class="full"
                                                                            for="star4"
                                                                            title="Pretty good - 4 stars"
                                                                            onclick="Rates(4, {{ @$PickId }})"></label>

                                                                        <input type="radio" id="star3"
                                                                            name="rating" value="3"
                                                                            class="rating" /><label class="full"
                                                                            for="star3" title="Meh - 3 stars"
                                                                            onclick="Rates(3, {{ @$PickId }})"></label>

                                                                        <input type="radio" id="star2"
                                                                            name="rating" value="2"
                                                                            class="rating" /><label class="full"
                                                                            for="star2" title="Kinda bad - 2 stars"
                                                                            onclick="Rates(2, {{ @$PickId }})"></label>

                                                                        <input type="radio" id="star1"
                                                                            name="rating" value="1"
                                                                            class="rating" /><label class="full"
                                                                            for="star1" title="Bad  - 1 star"
                                                                            onclick="Rates(1,{{ @$PickId }})"></label>

                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <p class="font_14 f_w_400 mt-0"><a
                                                                    href="{{ url('login') }}"
                                                                    class="theme_color2">Sign
                                                                    In</a>
                                                                or <a class="theme_color2"
                                                                    href="{{ url('register') }}">Sign
                                                                    Up</a>
                                                                as student to post a review</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="course_cutomer_reviews">
                                            <div class="details_title">
                                                <h5 class="font_22 f_w_700">{{ __('frontend.Reviews') }}</h5>

                                            </div>
                                            <div class="customers_reviews" id="customers_reviews">


                                            </div>
                                        </div>

                                        {{-- <div class="author_courses">
                                                                                   <div class="section__title mb_80">
                                                                                       <h5>{{__('Class you might like')}}</h5>
                                                                                   </div>
                                                                                   <div class="row">
                                                                                       @foreach (@$related as $r)
                                                                                           <div class="col-xl-6">
                                                                                               <div class="couse_wizged mb_30">
                                                                                                   <div class="thumb">
                                                                                                       <a href="{{courseDetailsUrl(@$r->id,@$r->type,@$r->slug)}}">
                                                                                                           <img class="w-100"
                                                                                                                src="{{ file_exists($r->thumbnail) ? asset($r->thumbnail) : asset('public/\uploads/course_sample.png') }}"
                                                                                                                alt="">
                                                                                                           <x-price-tag :price="$course->price"
                                                                                                                        :discount="$course->discount_price"/>
                                                                                                       </a>
                                                                                                   </div>
                                                                                                   <div class="course_content">
                                                                                                       <a href="{{courseDetailsUrl(@$r->id,@$r->type,@$r->slug)}}">
                                                                                                           <h5>{{@$r->title}}</h5>
                                                                                                       </a>
                                                                                                       <div class="rating_cart">
                                                                                                           <div class="rateing">
                                                                                                               <span>{{$r->totalReview}}/5</span>
                                                                                                               <i class="fas fa-star"></i>
                                                                                                           </div>
                                                                                                           @auth()
                                                                                                               @if (!$r->isLoginUserEnrolled && !$r->isLoginUserCart)
                                                                                                                   <a href="#" class="cart_store"
                                                                                                                      data-id="{{$r->id}}">
                                                                                                                       <i class="fas fa-shopping-cart"></i>
                                                                                                                   </a>
                                                                                                               @endif
                                                                                                           @endauth
                                                                                                           @guest()
                                                                                                               @if (!$r->isGuestUserCart)
                                                                                                                   <a href="#" class="cart_store"
                                                                                                                      data-id="{{$r->id}}">
                                                                                                                       <i class="fas fa-shopping-cart"></i>
                                                                                                                   </a>
                                                                                                               @endif
                                                                                                           @endguest
                                                                                                       </div>
                                                                                                       <div class="course_less_students">
                                                                                                           <a href="#"> <i
                                                                                                                   class="ti-agenda"></i> {{count($r->lessons)}}
                                                                                                               {{__('frontend.Lessons')}}</a>
                                                                                                           <a href="#"> <i
                                                                                                                   class="ti-user"></i> {{$r->total_enrolled}}
                                                                                                               {{__('frontend.Students')}} </a>
                                                                                                       </div>
                                                                                                   </div>
                                                                                               </div>
                                                                                           </div>
                                                                                       @endforeach
                                                                                   </div>
                                                                               </div> --}}
                                    </div>
                                    <!-- content  -->
                                </div>

                                <div class="tab-pane fade" id="QASection" role="tabpanel" aria-labelledby="QA-tab">
                                    <!-- content  -->

                                    <div class="conversition_box">
                                        <div id="conversition_box"></div>
                                        <div class="row">
                                            @if (!$isEnrolled)
                                                <div class="col-lg-12" id="mainComment">
                                                    <form action="{{ route('saveComment') }}" method="post"
                                                        class="">
                                                        @csrf
                                                        <input type="hidden" name="course_id"
                                                            value="{{ @$course->id }}">
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

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <!-- <div class="sidebar__widget mb_30">
                                <div class="sidebar__title">
                                    <h5>
                                        {{--                                        @if (@$course->discount_price != null) --}}

                                        {{--                                            {{getPriceFormat($course->discount_price)}} --}}
                                        {{--                                        @else --}}
                                        {{--                                            {{getPriceFormat($course->price)}} --}}
                                        {{--                                        @endif --}}
                                    </h5>
                                    <p>
                                        @if (Auth::check() && $isBookmarked)
                                            <i class="fas fa-heart"></i>
                                            <a href="{{ route('bookmarkSave', [$course->id]) }}"
                                                class="theme_button mr_10 sm_mb_10">{{ __('frontend.Already Bookmarked') }}
                                            </a>
                                        @elseif (Auth::check() && !$isBookmarked)
                                            <a href="{{ route('bookmarkSave', [$course->id]) }}" class="">
                                                <i class="far fa-heart"></i>
                                                {{ __('frontend.Add To Bookmark') }} </a>
                                        @endif

                                </div>
                                @if (!onlySubscription())
                                    @if (Auth::check())
                                        {{--                                        @if (!$isEnrolled) --}}
                                        {{--                                            <a href="#" --}}
                                        {{--                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Already Enrolled')}}</a> --}}

                                        {{--                                        @if ($certificateCanDownload) --}}
                                        {{--                                            <a href="{{route('getCertificate',[$course->id,$course->title])}}" --}}
                                        {{--                                               class="theme_line_btn d-block text-center height_50 mb_10"> --}}
                                        {{--                                                {{__('frontend.Get Certificate')}} --}}
                                        {{--                                            </a> --}}
                                        {{--                                        @endif --}}
                                        {{--                                        @else --}}
                                        {{--                                            @if ($isFree) --}}
                                        {{--                                                @if ($is_cart == 1) --}}
                                        {{--                                                    <a href="javascript:void(0)" --}}
                                        {{--                                                       class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a> --}}
                                        {{--                                                @else --}}
                                        {{--                                                    <a href="{{route('addToCart',[@$course->id])}}" --}}
                                        {{--                                                       class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a> --}}
                                        {{--                                                @endif --}}
                                        {{--                                            @else --}}
                                        {{--                                                @if ($is_cart == 1) --}}
                                        {{--                                                    <a href="javascript:void(0)" --}}
                                        {{--                                                       class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a> --}}
                                        {{--                                                @else --}}
                                        {{--                                                    <a href=" {{route('addToCart',[@$course->id])}} " --}}
                                        {{--                                                       class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a> --}}
                                        {{--                                                    <a href="{{route('buyNow',[@$course->id])}}" --}}
                                        {{--                                                       class="theme_line_btn d-block text-center height_50 mb_20">{{__('common.Buy Now')}}</a> --}}
                                        {{--                                                @endif --}}
                                        {{--                                            @endif --}}
                                        {{--                                        @endif --}}
                                    @else
                                        @if ($isFree)
                                            @if ($is_cart == 1)
                                                <a href="javascript:void(0)"
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a>
                                            @else
                                                <a href=" {{ route('addToCart', [@$course->id]) }} "
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                            @endif
                                        @else
                                            @if ($is_cart == 1)
                                                <a href="javascript:void(0)"
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a>
                                            @else
                                                <a href=" {{ route('addToCart', [@$course->id]) }} "
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                                <a href="{{ route('buyNow', [@$course->id]) }}"
                                                    class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                        <div class="d-flex justify-content-between mt-40">
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