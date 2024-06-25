<div>
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card h-auto">
            <div class="container-fluid no-gutters">
                <div class="my_courses_wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__title3 margin-50">
                                <h3>
                                    @if (routeIs('myClasses'))
                                        {{ __('courses.Live Class') }}
                                    @elseif(routeIs('myQuizzes'))
                                        {{ __('My Prep-Course') }}
                                    @else
                                        {{ __('My Programs') }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                        @if (isset($courses))
                            @php
                                if (routeIs('myClasses')) {
                                    $search_text = trans('frontend.Search My Classes');
                                    $search_route = '';
                                } elseif (routeIs('myQuizzes')) {
                                    $search_text = trans('frontend.Search My Quizzes');
                                    $search_route = '';
                                } else {
                                    $search_text = trans('Search My Programs');
                                    $search_route = '';
                                }
                            @endphp
                        @endif
                    </div>
                    <div class="row">
                        @if (isset($programs))
                            @foreach ($programs as $SinglePrograms)
                                @php
                                    $program = $SinglePrograms->program;
                                @endphp
                                <div class="col-xl-4 col-sm-6 col-12 my-2">
                                    <div class="couse_wizged border">
                                        <div class="thumb" >
                                            <div class="thumb_inner lazy h-100 mYprogram_cards"
                                                data-src="{{ getCourseImage($program->icon) }}">
                                            </div>
                                        </div>
                                        <div class="course_content py-3 px-2">
                                            <div class="d-flex justify-content-between my-2">
                                                <a href="{{ route('programs.detail', [$program->id]) }}"
                                                    style="width: 65%;">
                                                    <h4 class="noBrake"
                                                        title="{{ $program->programtitle }} {{ isset($SinglePrograms->plan->plan_order) ? '(Plan' . ' ' . $SinglePrograms->plan->plan_order . ')' : '' }}">
                                                        <!-- noBrake -->
                                                        {{ $program->programtitle }}
                                                        @if (isset($SinglePrograms->plan->plan_order))
                                                            ({{ 'Plan' . ' ' . $SinglePrograms->plan->plan_order }})
                                                        @endif
                                                    </h4>
                                                </a>

                                                <div class="d-flex align-items-center gap_15">
                                                    <div class="rating_cart">
                                                    </div>

                                                    <div class="progress_percent flex-fill text-right">
                                                        <a href="{{ route('my.program.payment.plan', [$program->id, 'plan_id' => isset($SinglePrograms->plan_id) ? $SinglePrograms->plan_id : '']) }}"
                                                            class="link_value theme_btn small_btn4 custom_student_btn">View
                                                            Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course_less_students d-flex justify-content-between">
                                                <a class="float-left">
                                                    <i class="ti-agenda"></i>
                                                    @if (isset($SinglePrograms->plan_id) && isset($SinglePrograms->plan->sdate))
                                                        {{ round((strtotime($SinglePrograms->plan->edate) - strtotime($SinglePrograms->plan->sdate)) / 604800, 1) }}
                                                    @endif

                                                    {{ __('Weeks') }}
                                                </a>
                                                <a class="float-right">
                                                    <i class="ti-user"></i>@php

                                                    @endphp
                                                    {{ isset($SinglePrograms->plan->programPlanViseEnrollCount) ? $SinglePrograms->plan->programPlanViseEnrollCount : '' }}
                                                    {{ __('student.Students') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="mt-4">
                                {{ $programs->links() }}
                            </div>

                        @endif
                        @if ($type == 3)
                            @if (isset($totalClasses))
                              {{-- @if(count($totalClasses) == 0) There are no Classes to show. @endif --}}
                                @foreach ($totalClasses as $Class)
                                    <div class="col-xl-4 col-sm-6 col-12 mx-1 my-2">
                                        <div class="quiz_wizged shadow rounded p-3">
                                            <div class="thumb">
                                                <a
                                                    href="{{ courseDetailsUrl($Class->id, $Class->type, $Class->slug) . '?program_id=' . $Class->program_id }}">
                                                    <div class="thumb" >
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ getCourseImage($Class->thumbnail) }}" style="height:200px">


                                                        </div>
                                                        <span class="live_tag">{{ __('student.Live') }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="course_content py-3 px-2">
                                                <a
                                                    href="{{ courseDetailsUrl($Class->id, $Class->type, $Class->slug) . '?program_id=' . $Class->program_id }}">
                                                    <h4 class="noBrake" title="{{ $Class->title }}">
                                                        {{ $Class->title }}
                                                    </h4>
                                                </a>
                                                <div class="rating_cart">
                                                    <div class="rateing">
                                                        <span>{{ $Class->totalReview }}/5</span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                    <div class="course_less_students d-flex justify-content-between course-small">
                                                        <small class="small_tag_color d-flex align-items-center gap-2">
                                                            <i class="ti-calendar"></i>
                                                            <span>
                                                            Start Date:<br>
                                                            {{ $Class->class->start_date }}
                                                            </span>
                                                        </small>
                                                        <small class="small_tag_color d-flex align-items-center gap-2">
                                                            <i class="ti-calendar"></i>
                                                            <span>
                                                                End Date:<br>
                                                            {{ $Class->class->end_date }}
                                                            </span>
                                                        </small>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @endif
                        @else
                            @if (isset($courses))
                                @foreach ($courses as $SingleCourse)
                                    @php
                                        $course = $SingleCourse->course;
                                        if (isset($course->parent)) {
                                            $course_title = $course->parent->title;
                                        } else {
                                            $course_title = $course->title;
                                        }
                                        $childCourse = Modules\CourseSetting\Entities\Course::where('type', $SingleCourse->course_type)->where('parent_id',$course->id)->first();
                                        $courseCompletion = round($course->userTotalPercentage($SingleCourse->user->id, $course->id));
                                        $quizPass = true;
                                            $hasQuiz = Modules\Quiz\Entities\QuizTest::where('course_id', $course->id)->where('user_id', $SingleCourse->user_id)->groupBy('quiz_id')->get();
                                            $hasPassQuiz = Modules\Quiz\Entities\QuizTest::where('course_id', $course->id)->where('user_id', $SingleCourse->user_id)->where('pass', 1)->groupBy('quiz_id')->get();

                                            if (count($hasQuiz) != count($hasPassQuiz)) {
                                                $quizPass = false;
                                            }
                                    @endphp
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        @if ($course->type == 1)
                                            <div class="quiz_wizged border w-100">
                                                <a
                                                    href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $SingleCourse->course_type }}">
                                                    <div class="thumb course_student-thumb" >
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ getCourseImage($course->thumbnail) }}">
                                                        </div>
                                                        @if ($SingleCourse->course_type == 4)
                                                            <span class="quiz_tag">{{ __('Full Course') }}</span>
                                                        @elseif($SingleCourse->course_type == 5)
                                                            <span
                                                                class="quiz_tag">{{ __('Prep-Course') }}<small>(on-demand)</small></span>
                                                        @elseif($SingleCourse->course_type == 6)
                                                            <span
                                                                class="quiz_tag">{{ __('Prep-Course') }}<small>(Live)</small></span>
                                                        @elseif($SingleCourse->course_type == 8)
                                                            <span class="quiz_tag">{{ __('Repeat Course') }}</span>
                                                        @elseif ($SingleCourse->course_type == 9)
                                                            <span class="quiz_tag">{{ __('Individual Course') }}</span>
                                                        @endif
                                                    </div>
                                                </a>
                                                <div class="course_content pb-2 px-2">
                                                    <div class="d-flex justify-content-between align-items-center">

                                                        <a
                                                                href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $SingleCourse->course_type }}">
                                                            <h4 class="noBrake" title="{{ $course->title }}">
                                                                {{ $course->title }}
                                                            </h4>
                                                        </a>
                                                        
                                                    </div>
                                                    <div class="rating_cart justify-content-between align-items-center">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        @if($courseCompletion >= 100 && $quizPass)
                                                        <small class="d-flex flex-column">
                                                            @if($SingleCourse->certificate_access > 0)
                                                            <a href="{{ route('getCertificate', [$course->id, $course->title]) }}"
                                                                class="theme_btn w-100 text-center">
                                                                {{ __('frontend.Get Certificate') }}
                                                            </a>
                                                            @else
                                                            <span class="w-50 ml-auto text-right">
                                                                Your certificate will be available soon.
                                                            </span>
                                                            @endif
                                                            </small>
                                                        @endif
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        @if ($course->type == 6)
                                                            <a> <i class="ti-agenda"></i>
                                                                {{ count($course->parent->classes) }}
                                                                {{ __('Classes') }}</a>
                                                        @else
                                                            <a>
                                                                <i class="ti-agenda"></i> {{ count($course->lessons) }}
                                                                {{ __('student.Lessons') }}
                                                            </a>
                                                        @endif
                                                        @if ($course->type == 2)
                                                            <a>
                                                                <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @else
                                                            <a>
                                                                <i class="ti-user"></i>
                                                                {{ $SingleCourse->course_enrolled_count }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @endif
                                                        @if (isModuleActive('CPD'))
                                                            @if (count($cpds) > 0)
                                                                <a class="cpd cpdvalue" data-toggle="modal"
                                                                    data-course_id={{ $course->id }}
                                                                    data-target="#exampleModal">
                                                                    <i class="ti-bolt"></i>
                                                                    {{ __('cpd.CPD') }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($course->type == 2)
                                            <div class="quiz_wizged border w-100">
                                                <a
                                                    href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                    <div class="thumb course_student-thumb" >
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ getCourseImage($course->thumbnail) }}">
                                                        </div>
                                                        <span class="quiz_tag">{{ __('Big Quiz') }}</span>
                                                    </div>
                                                </a>
                                                <div class="course_content pb-2 px-2">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <h4 class="noBrake" title="{{ $course->title }}">
                                                            {{ $course->title }}
                                                        </h4>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">

                                                        <a> <i class="ti-agenda"></i>{{ count($course->quiz->assign) }}
                                                            {{ __('student.Question') }}</a>
                                                        <a>
                                                            <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                            {{ __('student.Students') }}
                                                        </a>
                                                        @if (isModuleActive('CPD'))
                                                            @if (count($cpds) > 0)
                                                                <a class="cpd cpdvalue" data-toggle="modal"
                                                                    data-course_id={{ $course->id }}
                                                                    data-target="#exampleModal">
                                                                    <i class="ti-bolt"></i>
                                                                    {{ __('cpd.CPD') }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($course->type == 3)
                                            <div class="quiz_wizged border w-100">
                                                <div class="thumb">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <div class="thumb" >
                                                            <div class="thumb_inner lazy"
                                                                data-src="{{ getCourseImage($course->thumbnail) }}">
                                                            </div>
                                                            <span class="live_tag">{{ __('student.Live') }}</span>
                                                        </div>
                                                    </a>


                                                </div>
                                                <div class="course_content pb-2 px-2">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <h4 class="noBrake" title="{{ $course->title }}">
                                                            {{ $course->title }}
                                                        </h4>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        <a> <i class="ti-agenda"></i>
                                                            {{ $course->class->total_class }}
                                                            {{ __('student.Classes') }}</a>
                                                        <a>
                                                            <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                            {{ __('student.Students') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($course->type == 7)
                                            <div class="quiz_wizged border w-100">
                                                <div class="thumb">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <div class="thumb" >
                                                            <div class="thumb_inner lazy"
                                                                data-src="{{ getCourseImage($course->thumbnail) }}">
                                                            </div>
                                                            <span class="live_tag">{{ __('Time Table') }}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="course_content pb-2 px-2">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <h4 class="noBrake" title="{{ $course->title }}">
                                                            {{ $course->title }}
                                                        </h4>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                        {{ __('student.Students') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($course->type == 8)
                                            @php
                                                $today = \Carbon\Carbon::now()->format('Y-m-d');
                                                $start_date = \Carbon\Carbon::parse($course->start_date)->format('Y-m-d');
                                                $end_date = \Carbon\Carbon::parse($course->end_date)->format('Y-m-d');
                                            @endphp
                                            @if ($start_date <= $today && $end_date >= $today)
                                                <div class="quiz_wizged border w-100">
                                                    <div class="thumb">
                                                        <a
                                                            href="{{ route('repeat-course') . '?course_id=' . $course->id }}">
                                                            <div class="thumb " >
                                                                <div class="thumb_inner lazy"
                                                                    data-src="{{ getCourseImage($course->thumbnail) }}">
                                                                </div>
                                                                <span
                                                                    class="live_tag">{{ __('Repeat Course') }}</span>
                                                            </div>
                                                        </a>


                                                    </div>
                                                    <div class="course_content pb-2 px-2">
                                                        <a
                                                            href="{{ route('repeat-course') . '?course_id=' . $course->id }}">
                                                            <h4 class="noBrake" title="{{ $course->title }}">
                                                                {{ $course->title }}
                                                            </h4>
                                                        </a>
                                                        <div class="rating_cart">
                                                            <div class="rateing">
                                                                <span>{{ $course->totalReview }}/5</span>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="course_less_students d-flex justify-content-between">
                                                            <a>
                                                                <i class="ti-agenda"></i>
                                                                {{ count($course->quiz->assign) }}
                                                                {{ __('frontend.Question') }}</a>
                                                            <a>
                                                                <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                {{ __('student.Students') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($course->type == 9)
                                            <div class="quiz_wizged border w-100">
                                                <a
                                                    href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                    <div class="thumb course_student-thumb" >
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ getCourseImage($course->thumbnail) }}">
                                                        </div>
                                                        <span class="quiz_tag">{{ __('Individual Course') }}</span>
                                                    </div>
                                                </a>
                                                <div class="course_content pb-2 px-2">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->slug) . '?courseType=' . $course->type }}">
                                                        <h4 class="noBrake" title="{{ $course->title }}">
                                                            {{ $course->title }}
                                                        </h4>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        @if ($course->type == 6)
                                                            <a> <i class="ti-agenda"></i>
                                                                {{ count($course->parent->classes) }}
                                                                {{ __('Classes') }}</a>
                                                        @else
                                                            <a>
                                                                <i class="ti-agenda"></i>
                                                                {{ count($course->lessons) }}
                                                                {{ __('student.Lessons') }}
                                                            </a>
                                                        @endif
                                                        @if ($course->type == 2)
                                                            <a>
                                                                <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @else
                                                            <a>
                                                                <i class="ti-user"></i>
                                                                {{ $SingleCourse->course_enrolled_count }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @endif
                                                        @if (isModuleActive('CPD'))
                                                            @if (count($cpds) > 0)
                                                                <a class="cpd cpdvalue" data-toggle="modal"
                                                                    data-course_id={{ $course->id }}
                                                                    data-target="#exampleModal">
                                                                    <i class="ti-bolt"></i>
                                                                    {{ __('cpd.CPD') }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($course->type == 4 || $course->type == 5 || $course->type == 6)
                                            <div class="quiz_wizged border w-100">
                                                <a
                                                    href="{{ courseDetailsUrl($course->id, $course->type, $course->parent->slug) }}">
                                                    <div class="thumb course_student-thumb" >
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ getCourseImage($course->thumbnail) }}">
                                                        </div>
                                                        <span class="quiz_tag">
                                                            @if ($course->type == 4)
                                                                {{ __('Full Course') }}
                                                            @elseif ($course->type == 5)
                                                                {{ __('Prep-Course (On-Demand)') }}
                                                            @elseif ($course->type == 6)
                                                                {{ __('Prep-Course (Live)') }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="course_content pb-2 px-2">
                                                    <a
                                                        href="{{ courseDetailsUrl($course->id, $course->type, $course->parent->slug) }}">
                                                        <h4 class="noBrake" title="{{ $course_title }}">
                                                            {{ $course_title }}
                                                        </h4>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }}/5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        @if ($course->type == 6)
                                                            <a> <i class="ti-agenda"></i>
                                                                {{ count($course->parent->classes) }}
                                                                {{ __('Classes') }}</a>
                                                        @else
                                                            <a>
                                                                <i class="ti-agenda"></i>
                                                                {{ count($course->lessons) }}
                                                                {{ __('student.Lessons') }}
                                                            </a>
                                                        @endif
                                                        @if ($course->type == 2)
                                                            <a>
                                                                <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @else
                                                            <a>
                                                                <i class="ti-user"></i>
                                                                {{ $SingleCourse->course_enrolled_count }}
                                                                {{ __('frontend.Students') }}
                                                            </a>
                                                        @endif
                                                        @if (isModuleActive('CPD'))
                                                            @if (count($cpds) > 0)
                                                                <a class="cpd cpdvalue" data-toggle="modal"
                                                                    data-course_id={{ $course->id }}
                                                                    data-target="#exampleModal">
                                                                    <i class="ti-bolt"></i>
                                                                    {{ __('cpd.CPD') }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                <div class="mt-4">
                                    {{ $courses->links() }}
                                </div>
                            @endif
                        @endif
                        @if ((isset($programs) && count($programs) == 0) || (isset($courses) && count($courses) == 0))
                            <div class="col-12">
                                <div class="section__title3 margin_50">
                                    @if (routeIs('myClasses'))
                                        <p class="text-center">{{ __('student.No Class Purchased Yet') }}!</p>
                                    @elseif(routeIs('myQuizzes'))
                                        <p class="text-center">{{ __('No Course Purchased Yet') }}!</p>
                                    @else
                                        <p class="text-center">{{ __('No Program Purchased Yet') }}!</p>
                                    @endif

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isModuleActive('CPD'))
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('cpd.CPD') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>

                {!! Form::open(['route' => 'cpd.course_to_cpd', 'method' => 'POST']) !!}
                <input type="hidden" name="course_id" id="cpd_course_id" value="">

                <div class="modal-body">
                    <div class="input-control">
                        <label for="#">{{ __('cpd.CPD') }}</label>
                        <select name="" id="" class="theme_select">
                            <option value="">{{ __('cpd.Select CPD') }}</option>
                            @foreach ($cpds as $cpd)
                                <option value="{{ $cpd->id }}">{{ $cpd->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer mntop">
                    <button type="button" class="theme_btn small_btn bg-transparent"
                        data-dismiss="modal">{{ __('common.Cancel') }}</button>
                    <button type="button" class="theme_btn small_btn">{{ __('common.Submit') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif
