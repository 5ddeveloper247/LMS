<div>
    <div class="quiz__details">
        <div class="container-fluid">
            <div class="row px-md-5 px-1">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="quiz_test_wrapper">
                                <div class="quiz_test_header">
                                    @if ($course->type == 1)
                                        <p>{{ $course_type = 'Course' }}</p>
                                    @elseif ($course->type == 2)
                                        <p>{{ $course_type = 'Big Quiz' }}</p>
                                    @else
                                        <p>{{ $course_type = 'Prep-Course' }}</p>
                                    @endif
                                    <h4 class="font-weight-bold"> {{ $course->quiz->title }}</h4>
                                </div>
                                <div class="quiz_test_body">
                                    <div class="row">
                                    <div class="col-md-8">
                                        <div class="image_responsive px-md-2">
                                            <img src="{{ getCourseImage($course->image) }}" class="img-fluid w-100 img_round course_image"
                                                style="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="quiz_test_info">
                                            @if (count($preResult) != 0)
                                                <h5 class="font-weight-bold mb-5">
                                                    {{ __('student.Congratulations! You’ve completed') }}
                                                    {{ $course->quiz->title }}</h5>
                                            @endif
                                            @php
                                                $duration = 0;
                                                $type = $course->quiz->question_time_type;
                                                if ($type == 0) {
                                                    $duration = $course->quiz->question_time * count($course->quiz->assign);
                                                } else {
                                                    $duration = $course->quiz->question_time;
                                                }
                                            @endphp
                                            <li>
                                                <span>{{ __('frontend.Questions') }}
                                                    <span>:</span></span><span>{{ count($course->quiz->assign) }}
                                                    {{ __('frontend.Question') }}.</span>
                                            </li>
                                            <li class="nowrap">
                                                <span>{{ __('frontend.Duration') }} <span>:</span></span>
                                                {{ MinuteFormat($duration) }}
                                            </li>
                                        </ul>
                                        @if (!isInstructor() && !isTutor())
                                            @if (Auth::check() && $isEnrolled)

                                                @if ($alreadyJoin == 0 || $course->quiz->multiple_attend == 1)
                                                    <a href="{{ route('quizStart', [$course->id, $course->quiz->id, $course->title]) . '?courseType=' . $request->courseType }}"
                                                        class="theme_btn mr_15 mt-4 text-center p-2">{{ __('Start Prep-Course') }}</a>
                                                @endif

                                                @if (count($preResult) != 0)
                                                    <button type="button"
                                                        class="theme_line_btn mr_15 showHistory mt-4 text-center">{{ __('frontend.View History') }}</button>
                                                @endif

                                                @if ($alreadyJoin == 1 && $certificate)
                                                    @if ($isPass == 1)
                                                        <a href="{{ $isPass == 1 ? route('getCertificate', [$course->id, $course->title]) : '#' }}"
                                                            class="theme_line_btn mr_15 mt-4 text-center">
                                                            {{ __('frontend.Get Certificate') }}
                                                        </a>
                                                    @endif
                                                @endif
                                            @else
                                                @if (!onlySubscription())
                                                    @if ($isFree)
                                                        {{--                                                @if ($is_cart == 1) --}}
                                                        {{--                                                    <a href="{{ route('addToCartQuiz', [@$course->id]) }}" --}}
                                                        {{--                                                        class="theme_btn height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a> --}}
                                                        {{--                                                @else --}}
                                                        {{--                                                    <a href="{{ route('addToCartQuiz', [@$course->id]) }}" --}}
                                                        {{--                                                        class="theme_btn height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a> --}}
                                                        {{--                                                @endif --}}
                                                    @else
                                                        @if (Auth::check())
                                                            <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                                class="theme_btn mr_15 m-auto mt-4 text-center p-2">{{ __('frontend.Buy Now') }}</a>
                                                        @else
                                                            <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                                class="theme_btn mr_15 m-auto mt-4 text-center p-2">{{ __('frontend.Buy Now') }}</a>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                    @if (count($preResult) != 0)
                                        <div id="historyDiv" class="pt-5" style="display:none;">
                                            <table class="table-bordered table">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Mark</th>
                                                    <th>Percentage</th>
                                                    <th>Rating</th>
                                                    <th>Details</th>
                                                </tr>
                                                @foreach ($preResult as $pre)
                                                    <tr>
                                                        <td>{{ $pre['date'] }}</td>
                                                        <td>{{ $pre['publish'] == 1 ? $pre['score'] : '--' }}
                                                            /{{ $pre['totalScore'] }}</td>
                                                        <td>
                                                            {{ $pre['publish'] == 1 ? $pre['mark'] : '--' }} %
                                                        </td>
                                                        @if ($pre['publish'] == 1)
                                                            <td class="{{ $pre['text_color'] }}">{{ $pre['status'] }}
                                                            </td>
                                                        @else
                                                            <td class="">{{ __('quiz.Pending') }}</td>
                                                        @endif

                                                        <td>
                                                            <a href="{{ $course->quiz->show_ans_sheet == 1 ? route('quizResultPreview', $pre['quiz_test_id']) : '#' }}"
                                                                data-quiz_test_id="{{ $pre['quiz_test_id'] }}"
                                                                title="{{ $course->quiz->show_ans_sheet != 1 ? __('quiz.Answer Sheet is currently locked by Teacher') : '' }}"
                                                                class="font_1 font_16 f_w_600 theme_text3 submit_q_btn">{{ __('student.See Answer Sheet') }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                            @if ($course->quiz->show_ans_with_explanation == 1)
                                                <x-quiz-details-question-list :quiz="$course->quiz" />
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-md-5">
                        <div class="col-xl-8 col-lg-8">
                            <div class="course_tabs">
                                <ul class="w-100 nav lms_tabmenu mb_55" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                            role="tab" aria-controls="Overview"
                                            aria-selected="true">{{ __('frontend.Overview') }}</a>
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
                            </div>
                            <div class="tab-content lms_tab_content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                                    aria-labelledby="Overview-tab">
                                    <!-- content  -->
                                    <div class="course_overview_description">
                                        <div class="single_overview">
                                            <h4 class="font_22 f_w_700 mb_20">{{ __('frontend.Instructions') }}</h4>
                                            <div class="theme_border"></div>
                                            <p class="mb_25"> {{ $course->quiz->instruction }} </p>
                                            @if (!empty($course->requirements))
                                                <h4 class="font_22 f_w_700 mb_20">
                                                    {{ __("$course_type Requirements") }}</h4>
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
                                                    {{ __("$course_type Description") }}</h4>
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
                                                <h4 class="font_22 f_w_700 mb_20">{{ __("$course_type Outcomes") }}
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
                                        </div>
                                    </div>
                                    <!--/ content  -->
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <!-- content  -->
                                    <div class="course_review_wrapper">
                                        <div class="details_title">
                                            <h4 class="font_22 f_w_700">{{ __('frontend.Student Feedback') }}</h4>
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
                                                <p>{{ __("$course_type Rating") }}</p>
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
                                                        <span
                                                            class="rating_font">{{ getPercentageRating($course->starWiseReview, 5) }}%</span>
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
                                                        <span
                                                            class="rating_font">{{ getPercentageRating($course->starWiseReview, 4) }}%</span>
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
                                                        <span
                                                            class="rating_font">{{ getPercentageRating($course->starWiseReview, 3) }}%</span>
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
                                                        <span
                                                            class="rating_font">{{ getPercentageRating($course->starWiseReview, 2) }}%</span>
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
                                                        <span
                                                            class="rating_font">{{ getPercentageRating($course->starWiseReview, 1) }}%</span>
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
                                                    <div class="rating_star text-right">
                                                        @php
                                                            $PickId = $course->id;
                                                        @endphp
                                                        @if (Auth::check() && Auth::user()->role_id == 3)
                                                            @if (!in_array(Auth::user()->id, $reviewer_user_ids) && $isEnrolled)
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
                                                                    class="theme_color2">{{ __('frontend.Sign In') }}</a>
                                                                {{ __('frontend.or') }} <a class="theme_color2"
                                                                    href="{{ url('register') }}">{{ __('frontend.Sign Up') }}</a>
                                                                {{ __('frontend.as student to post a review') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="course_cutomer_reviews">
                                            <div class="details_title mt-2">
                                                <h4 class="font_22 f_w_700">{{ __('frontend.Reviews') }}</h4>
                                            </div>
                                            <div class="customers_reviews" id="customers_reviews">
                                            </div>
                                        </div>

                                        {{-- <div class="author_courses">
                                                <div class="section__title mb_80">
                                                    <h3>{{ __("$course_type you might like") }}</h3>
                                                </div>
                                                <div class="row">
                                                    @foreach (@$related as $r)
                                                        <div class="col-xl-6">
                                                            <div class="couse_wizged mb_30">
                                                                <div class="thumb">
                                                                    <a
                                                                        href="{{ courseDetailsUrl(@$r->id, @$r->type, @$r->slug) }}">
                                                                        <img class="w-100"
                                                                            src="{{ file_exists($r->thumbnail) ? asset($r->thumbnail) : asset('public/\uploads/course_sample.png') }}"
                                                                            alt="">


                                                                        <x-price-tag :price="$r->price" :discount="$r->discount_price" />
                                                                    </a>
                                                                </div>
                                                                <div class="course_content">
                                                                    <a
                                                                        href="{{ courseDetailsUrl(@$r->id, @$r->type, @$r->slug) }}">
                                                                        <h4>{{ @$r->title }}</h4>
                                                                    </a>
                                                                    <div class="rating_cart">
                                                                        <div class="rateing">
                                                                            <span>{{ $r->totalReview }}/5</span>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                        @auth()
                                                                            @if (!$r->isLoginUserEnrolled && !$r->isLoginUserCart)
                                                                                <a href="#" class="cart_store"
                                                                                    data-id="{{ $r->id }}">
                                                                                    <i class="fas fa-shopping-cart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @endauth
                                                                        @guest()
                                                                            @if (!$r->isGuestUserCart)
                                                                                <a href="#" class="cart_store"
                                                                                    data-id="{{ $r->id }}">
                                                                                    <i class="fas fa-shopping-cart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @endguest
                                                                    </div>
                                                                    <div class="course_less_students">
                                                                        <a href="#"> <i class="ti-agenda"></i>
                                                                            {{ count($r->lessons) }}
                                                                            {{ __('frontend.Lessons') }}</a>
                                                                        <a href="#"> <i class="ti-user"></i>
                                                                            {{ $r->total_enrolled }}
                                                                            {{ __('frontend.Students') }} </a>
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
                                            @if ($isEnrolled)
                                                <div class="col-lg-12" id="mainComment">
                                                    <form action="{{ route('saveComment') }}" method="post"
                                                        class="">
                                                        @csrf
                                                        <input type="hidden" name="course_id"
                                                            value="{{ @$course->id }}">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="section_title3 mb_20">
                                                                    <h3>{{ __('frontend.Leave a question/comment') }}
                                                                    </h3>
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
                            <div class="sidebar__widget mb_30">
                                <div class="sidebar__title">
                                    <h3>
                                        @if (@$course->discount_price != null)
                                            {{ getPriceFormat($course->discount_price) }}
                                        @else
                                            {{ getPriceFormat($course->price) }}
                                        @endif
                                    </h3>
                                    <p>
                                        @if (!isTutor() && !isInstructor())
                                            @if (Auth::check() && $isBookmarked)
                                                <i class="fas fa-heart"></i>
                                                <a href="{{ route('bookmarkSave', [$course->id]) }}"
                                                    class="mr_10 sm_mb_10">{{ __('frontend.Already Bookmarked') }}
                                                </a>
                                            @elseif (Auth::check() && !$isBookmarked)
                                                <a href="{{ route('bookmarkSave', [$course->id]) }}" class="">
                                                    <i class="far fa-heart"></i>
                                                    {{ __('frontend.Add To Bookmark') }} </a>
                                            @endif
                                        @endif
                                </div>
                                @if (!onlySubscription())
                                    @if (Auth::check())
                                        @if ($isEnrolled)
                                            <a href="#"
                                                class="theme_btn d-block height_50 mb_10 text-center p-2">{{ __('common.Already Enrolled') }}</a>
                                        @elseif(isStudent())
                                            @if ($isFree)
                                                {{--                                                @if ($is_cart == 1) --}}
                                                {{--                                                    <a href="{{ route('addToCartQuiz', [@$course->id]) }}" --}}
                                                {{--                                                        class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a> --}}
                                                {{--                                                @else --}}
                                                {{--                                                    <a href="{{ route('addToCartQuiz', [@$course->id]) }}" --}}
                                                {{--                                                        class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a> --}}
                                                {{--                                                @endif --}}
                                            @else
                                                @if ($is_cart == 1)
                                                    <a href="{{ route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                        class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a>
                                                @else
                                                    <a href=" {{ route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType }} "
                                                        class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                                    @if (Auth::check())
                                                        <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                            class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                                    @else
                                                        <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                            class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @else
                                        @if ($isFree)
                                            {{--                                            @if ($is_cart == 1) --}}
                                            {{--                                                <a href="{{ route('addToCartQuiz', [@$course->id]) }}" --}}
                                            {{--                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a> --}}
                                            {{--                                            @else --}}
                                            {{--                                                <a href=" {{ route('addToCartQuiz', [@$course->id]) }} " --}}
                                            {{--                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a> --}}
                                            {{--                                            @endif --}}
                                        @else
                                            @if ($is_cart == 1)
                                                <a href="{{ route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Added To Cart') }}</a>
                                            @else
                                                <a href=" {{ route('addToCartQuiz', [@$course->id]) . '?courseType=' . $request->courseType }} "
                                                    class="theme_btn d-block height_50 mb_10 text-center">{{ __('common.Add To Cart') }}</a>
                                                @if (Auth::check())
                                                    <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                        class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                                @else
                                                    <a href="{{ route('buyNowQuiz', [@$course->id]) . '?courseType=' . $request->courseType }}"
                                                        class="theme_line_btn d-block height_50 mb_20 text-center">{{ __('common.Buy Now') }}</a>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                <h4 class="f_w_700 mb_10">{{ __('frontend.This course includes') }}:</h4>
                                <ul class="course_includes">
                                    <li><i class="ti-thumb-up"></i>
                                        <p>{{ __('frontend.Skill Level') }}
                                            @foreach ($levels as $level)
                                                @if (@$course->level == $level->id)
                                                    {{ $level->title }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </li>
                                    <li><i class="ti-agenda"></i>
                                        <p>{{ __('frontend.Questions') }} {{ count($course->quiz->assign) }} </p>
                                    </li>
                                    <li><i class="ti-user"></i>
                                        <p>{{ __('frontend.Enrolled') }} {{ $course->total_enrolled }}
                                            {{ __('frontend.students') }}</p>
                                    </li>
                                    <li><i class="ti-user"></i>
                                        <p>{{ __('frontend.Certificate of Completion') }}</p>
                                    </li>
                                    <li><i class="ti-blackboard"></i>
                                        <p>{{ __('frontend.Full lifetime access') }}</p>
                                    </li>
                                </ul>
                            </div>
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
                            <textarea class="lms_summernote" name="review" id=""
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
    <form>
        <div class="row pop1 d-none m-0">
            <h2 class="text-center">Form Test Preparation Registeration!</h2>
            <div class="float-end dismisspop px-5">
                <span style="float:right;"> X</span>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Middle Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Last Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Phone</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Email</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Social Security</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>DOB</label>
                            <input type="date" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Day/Month/Year</label>
                            <input type="date" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Gender</label>
                            <select name="gender" class="form-select form-control"
                                aria-label="Default select example">
                                <option value="" selected="">--SELECT--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Address</label>
                            <input type="text" name="name" class="form-control" placeholder="Street">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>City</label>
                            <input type="text" name="name" class="form-control">

                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>State</label>
                            <input type="text" name="name" class="form-control" placeholder="">

                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Zipcode</label>
                            <input type="text" name="name" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>How do you prefer to be contacted</label>

                            <select name="gender" class="form-select form-control"
                                aria-label="Default select example">
                                <option value="" selected="">--SELECT--</option>
                                <option value="Male">Phone</option>
                                <option value="Female">Email</option>
                                <option value="Female">Text</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="formdata m-4">
                            <label>Timings:</label>

                            <select name="gender" class="form-select form-control"
                                aria-label="Default select example">
                                <option value="" selected="">--SELECT--</option>
                                <option value="Male">Morning</option>
                                <option value="Female">Afternoon</option>
                                <option value="Female">Evening</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="formdata m-4">
                            <label>Select Choose:</label>

                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="formdata mx-4">
                            <label>RN Prep Courses </label>
                            <input type="checkbox" name="checkbox" class="form-check-input">

                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="formdata mx-4">
                            <label>PN Prep Courses </label>
                            <input type="checkbox" name="checkbox" class="form-check-input">

                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="formdata mx-4">
                            <label>NC/EX-RN Exam Prep </label>
                            <input type="checkbox" name="checkbox" class="form-check-input">

                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="formdata mx-4">
                            <label>NC/EX-PN Exam Prep </label>
                            <input type="checkbox" name="checkbox" class="form-check-input">

                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="formdata m-4">
                            <label>Write something about yourself </label>
                            <textarea class="form-control" style="height:110px;">
                 </textarea>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="formdata m-4">
                            <label>Upload recent professional photo</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="formdata m-4">
                            <label>Any additional informations/comments: </label>
                            <textarea class="form-control" style="height:110px;">
             </textarea>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="formdata m-4">
                            <label>PN & RN prep courses </label>

                            <select name="gender" class="form-select form-control"
                                aria-label="Default select example">
                                <option value="" selected="">--SELECT--</option>
                                <option value="">Pharamacology body system diseases</option>
                                <option value="">Fundamentals</option>
                                <option value="">Medical surgical->
                                    Cardiac|Endocrine|Nevero|Renal|Musculaskeleton
                                </option>
                                <option value="">Materinty & Network</option>
                                <option value="">Peniritrics -Growth & Development</option>
                                <option value="">KGs</option>
                                <option value="">Prioritizations</option>
                                <option value="">Mental Health</option>
                            </select>
                        </div>

                        <a class="btn btn-success float-end mx-4 my-5 px-5">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include(theme('partials._delete_model'))
</div>
