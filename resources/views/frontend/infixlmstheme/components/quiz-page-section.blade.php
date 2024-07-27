<div>
    <input type="hidden" class="class_route" name="class_route" value="{{ route('quizzes') }}">
    {{-- @dd($courses) --}}
    <div class="py-lg-5 py-4 pt-md-5 pb-md-4">
        <div class="container px-lg-5">
            <div class="row px-lg-5 px-4 prep-course-padding">
                <!-- <div class="col-lg-12 col-xl-12">
                    <div class="row"> -->
                        <div class="col-12">
                            <div class="box_header d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex justify-content-between w-100 align-items-center mb-3 mb-md-5">
                                    <h5 class="custom_small_heading f_w_700 ">
                                        {{ $total > 1 ? $total . ' Prep-Course' : $total . ' Prep-Course' }}
                                        {{ __(' Found') }}</h5>
                                    <a class="font-weight-500 pull-bs-canvas-left filter_btn" id="filter_btn"
                                        style="cursor: pointer; text-align: center;">
                                        Show Filter
                                        <svg width="22" height="16" viewBox="0 0 22 16"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="icon-filter" fill-rule="nonzero" fill="none">
                                                <rect fill="#D8D8D8" y="2" width="22" height="2"
                                                    rx="1"></rect>
                                                <rect fill="#D8D8D8" y="12" width="22" height="2"
                                                    rx="1"></rect>
                                                <circle fill="#373737" cx="15.5" cy="13" r="2.5">
                                                </circle>
                                                <circle fill="#373737" cx="6.5" cy="3" r="2.5">
                                                </circle>
                                            </g>
                                        </svg>
                                    </a>
                                    {{-- <i class="fa fa-3x fa-filter ml-5 pull-bs-canvas-left mb_30" id="filter_btn" role="button" aria-hidden="true" ></i> --}}
                                </div>

                                <div class="box_header_right mb_30">
                                    <div class="short_select d-flex align-items-center">
                                        <div class="mobile_filter mr_10">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13"
                                                viewBox="0 0 19.5 13">
                                                <g transform="translate(28)">
                                                    <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5"
                                                        height="2" rx="1" transform="translate(-28)"
                                                        fill="var(--system_primery_color)" />
                                                    <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5"
                                                        height="2" rx="1" transform="translate(-26 5.5)"
                                                        fill="var(--system_primery_color)" />
                                                    <rect id="Rectangle_3" data-name="Rectangle 3" width="5"
                                                        height="2" rx="1" transform="translate(-20.75 11)"
                                                        fill="var(--system_primery_color)" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($courses))
                            @foreach ($courses as $course)
                                @if ($course->type == 2)
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center">
                                        <div class="quiz_wizged card rounded-card shadow mb-md-4 mb-3 w-100">
                                            <a
                                                href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug . '?courseType=' . $course->type) }}">
                                                <div class="thumb rounded-card-img">
                                                    <img src="{{ getCourseImage($course->thumbnail) }}" alt=""
                                                        class="img-fluid w-100 img-thumb course-page-img" >
                                                    <x-price-tag :price="$course->price + $course->tax" :discount="$course->discount_price" />
                                                    <span class="quiz_tag">{{ __('Big Quiz') }}</span>
                                                </div>
                                            </a>

                                            <div class="card-body course_content">
                                                <a
                                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug . '?courseType=' . $course->type) }}">
                                                    <h5 class="custom_small_heading noBrake font-weight-bold" title=" {{ $course->title }}">
                                                        {{ $course->title }}
                                                    </h5>
                                                </a>
                                                <div class="rating_cart">
                                                    <div class="rateing">
                                                        <span>{{ $course->totalReview }} | 5</span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    @if (!onlySubscription())
                                                        @auth()
                                                            @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                            @endif
                                                        @endauth
                                                        @guest()
                                                            @if (!$course->isGuestUserCart)
                                                            @endif
                                                        @endguest
                                                    @endif
                                                </div>
                                                <div class="course_less_students d-flex justify-content-between">
                                                    <small class="small_tag_color"> <i class="ti-agenda"></i>
                                                        {{ count($course->quiz->assign) }}
                                                        {{ __('frontend.Question') }}</small>
                                                    <small class="small_tag_color">
                                                        <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                        {{ __('frontend.Students') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @elseif ($course->type == 8)
                                    @php
                                        $today = \Carbon\Carbon::now()->format('Y-m-d');
                                        $start_date = \Carbon\Carbon::parse($course->start_date)->format('Y-m-d');
                                        $end_date = \Carbon\Carbon::parse($course->end_date)->format('Y-m-d');
                                    @endphp
                                    {{-- @if ($start_date <= $today && $end_date >= $today) --}}
                                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center">
                                            <div class="quiz_wizged card rounded-card shadow mb-md-4 mb-3 w-100">
                                                <a href="{{ route('repeat-course') . '?course_id=' . $course->id }}">
                                                    <div class="thumb rounded-card-img">

                                                        <img src="{{ getCourseImage($course->thumbnail) }}"
                                                            class="img-fluid w-100 rounded-card-img img-thumb course-page-img" alt="">

                                                        <x-price-tag :price="$course->price + $course->tax" :discount="$course->discount_price" />
                                                        <span class="quiz_tag">{{ __('Repeat Course') }}</span>
                                                    </div>
                                                </a>

                                                <div class="card-body course_content">
                                                    <a
                                                        href="{{ route('repeat-course') . '?course_id=' . $course->id }}">
                                                        <h5 class="noBrake font-weight-bold" title=" {{ $course->parent->title }}">
                                                            {{ $course->parent->title }}
                                                        </h5>
                                                    </a>
                                                    <div class="rating_cart">
                                                        <div class="rateing">
                                                            <span>{{ $course->totalReview }} | 5</span>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        @if (!onlySubscription())
                                                            @auth()
                                                                @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                                @endif
                                                            @endauth
                                                            @guest()
                                                                @if (!$course->isGuestUserCart)
                                                                @endif
                                                            @endguest
                                                        @endif
                                                    </div>
                                                    <div class="course_less_students d-flex justify-content-between">
                                                        <small class="small_tag_color"> <i class="ti-agenda"></i>
                                                            <?php $classcount = 0; ?>
                                                            @foreach ($course->parent->classes as $class)
                                                                @if ($class->course_types != null && in_array($course->type, json_decode($class->course_types)))
                                                                    <?php $classcount++; ?>
                                                                @endif
                                                            @endforeach

                                                            {{ $classcount }}
                                                            {{ __('Classes') }}
                                                        </small>
                                                        <small class="small_tag_color"> <i class="ti-agenda"></i>
                                                            {{ count($course->quiz->assign) }}
                                                            {{ __('frontend.Question') }}</small>
                                                        <small class="small_tag_color">
                                                            <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                            {{ __('frontend.Students') }}
                                                        </small>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- @endif --}}
                                @else
                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center">
                                        <div class="quiz_wizged card rounded-card shadow mb-md-4 mb-3 w-100">
                                            <a
                                                href="{{ !empty($course->parent_id) ? courseDetailsUrl(@$course->parent->id, @$course->type, @$course->parent->slug) . '?courseType=' . $course->type : courseDetailsUrl(@$course->id, @$course->type, @$course->slug . '?courseType=' . $course->type) }}">

                                                <div class="thumb rounded-card-img">
                                                    <img src="{{ getCourseImage($course->thumbnail) }}"
                                                        class="img-fluid w-100 rounded-card-img img-thumb course-page-img" alt="" >
                                                    @php
                                                      if (isset($course->currentCoursePlan[0])) {
                                                          $price = $course->currentCoursePlan[0]->amount;
                                                      } else {
                                                          $price = $course->price + $course->tax;
                                                      }
                                                    @endphp

                                                    <x-price-tag :price="$price" :discount="$course->discount_price" />
                                                    @if ($course->type == 4)
                                                        <span class="quiz_tag">{{ __('Full Course') }}</span>
                                                    @elseif($course->type == 5)
                                                        <span
                                                            class="quiz_tag">{{ __('Prep-Course') }}<small>(On-Demand)</small></span>
                                                    @elseif($course->type == 6)
                                                        <span
                                                            class="quiz_tag">{{ __('Prep-Course') }}<small>(Live)</small></span>
                                                    @elseif($course->type == 7)
                                                        <span class="quiz_tag">{{ __('Time Table') }}</span>
                                                    @endif
                                                </div>
                                            </a>


                                            <div class="card-body course_content">
                                                <a
                                                    href="{{ !empty($course->parent_id) ? courseDetailsUrl(@$course->id, @$course->type, @$course->parent->slug) . '?courseType=' . $course->type : courseDetailsUrl(@$course->id, @$course->type, @$course->slug . '?courseType=' . $course->type) }}">
                                                    <h5 class="noBrake font-weight-bold"
                                                        title=" {{ !empty($course->parent_id) ? $course->parent->title : $course->title }}">
                                                        {{ !empty($course->parent_id) ? $course->parent->title : $course->title }}
                                                    </h5>
                                                </a>
                                                <div class="rating_cart">
                                                    <div class="rateing">
                                                        <span>{{ !empty($course->parent_id) ? $course->parent->totalReview : $course->totalReview }}
                                                            | 5</span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    @if (!onlySubscription())
                                                        @auth()
                                                            @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                            @endif
                                                        @endauth
                                                        @guest()
                                                            @if (!$course->isGuestUserCart)
                                                            @endif
                                                        @endguest
                                                    @endif
                                                </div>
                                                <div class="course_less_students d-flex justify-content-between course-small" style="gap: 7px; text-align: center;">

                                                    @if ($course->type == 6)
                                                        <small class="small_tag_color"> <i class="ti-agenda"></i>
                                                            <?php $classcount = 0; ?>
                                                            @foreach ($course->parent->classes as $class)
                                                                @if ($class->course_types != null && in_array($course->type, json_decode($class->course_types)))
                                                                    <?php $classcount++; ?>
                                                                @endif
                                                            @endforeach

                                                            {{ $classcount }}
                                                            {{ __('Classes') }}
                                                        </small>
                                                    @else
                                                        @if ($course->type != 7 && $course->type != 9)
                                                            <small class="small_tag_color"> <i class="ti-agenda"></i>
                                                                {{ count($course->parent->chapters) }}
                                                                {{ __('Chapters') }}</small>
                                                        @endif
                                                    @endif
                                                    @if ($course->type == 2 || $course->type == 7)
                                                        <small class="small_tag_color">
                                                            <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                            {{ __('frontend.Students') }}
                                                        </small>
                                                    @elseif ($course->type == 4 || $course->type == 6)
                                                        <small class="small_tag_color">
                                                            <i class="ti-user"></i>
                                                            {{ $course->course_enrolled_count }}
                                                            {{ __('frontend.Students') }}
                                                        </small>
                                                        @if (isset($course->currentCoursePlan))
                                                            <small class="small_tag_color">
                                                                <i class="fas fa-clock"></i>
                                                                {{ round((strtotime($course->currentCoursePlan[0]->edate) - strtotime($course->currentCoursePlan[0]->sdate)) / 604800, 1) }}
                                                                Weeks
                                                            </small>
                                                        @endif
                                                    @else
                                                        <small class="small_tag_color">
                                                            <i class="ti-user"></i>
                                                            {{ $course->course_enrolled_count }}
                                                            {{ __('frontend.Students') }}
                                                        </small>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        @if (count($courses) == 0)
                            <div class="col-lg-12 mb-md-5 mb-4">

                                <div
                                    class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                    <div class="thumb">
                                        <img style="width: 50px"
                                            src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                            alt="">
                                    </div>
                                    <h1>
                                        {{ __('No Prep-Course Found') }}
                                    </h1>
                                </div>

                            </div>
                        @endif
                    </div>
                    <div class="">
                        {{ $courses->appends(Request::all())->links() }}
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
        <header class="border-bottom bs-canvas-header p-3">
            <h4 class="d-inline-block f_w_600 mb-0">Filter</h4>
            <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                    class="">&times;</span></button>
        </header>
        <div class="bs-canvas-content px-3 py-1">

            <form>

                @if($request->has('tutor_courses'))
                    <input type="hidden" name="tutor_courses" value="1">
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <h6>Course Name</h6>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-sm" name="filter_search_by" id=""
                            placeholder="Enter Course Name" value="{{ $request->filter_search_by ?? '' }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Course Type</h6>
                    </div>
                    <div class="col-md-12">
                        @if($request->has('tutor_courses'))
                            <input type="checkbox" name="filter_by_course_type[]" value="9" id="filter_course_type_9"
                            @if(isset($request->filter_by_course_type) && in_array(9,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_9">{{ __('Tutor Course') }}</label>

                        @else
                        
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="2" @if(isset($request->filter_by_course_type) && in_array(2,$request->filter_by_course_type)) checked @endif id="filter_course_type_2">
                            <label class="mb-0" for="filter_course_type_2">{{ __('Big Quiz') }}</label>
                        </div>
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="4" id="filter_course_type_4"
                            @if(isset($request->filter_by_course_type) && in_array(4,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_4">{{ __('Full Course') }}</label>
                        </div>
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="5" id="filter_course_type_5"
                            @if(isset($request->filter_by_course_type) && in_array(5,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_5">{{ __('Prep-Course') }}<small>(On-Demand)</small></label>
                        </div>
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="6" id="filter_course_type_6"
                            @if(isset($request->filter_by_course_type) && in_array(6,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_6">{{ __('Prep-Course') }}<small>(Live)</small></label>
                        </div>
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="7" id="filter_course_type_7"
                            @if(isset($request->filter_by_course_type) && in_array(7,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_7">{{ __('Time Table') }}</label>
                        </div>
                        <div class="input-group mb-1 gap-2">
                            <input type="checkbox" name="filter_by_course_type[]" value="9" id="filter_course_type_9"
                            @if(isset($request->filter_by_course_type) && in_array(9,$request->filter_by_course_type)) checked @endif>
                            <label class="mb-0" for="filter_course_type_9">{{ __('Repeat Course') }}</label>
                        </div>
                        @endif
                    </div>
                    {{-- <div class="col-md-12 mt-3">
                        <h6>Categories</h6>
                        <select id="categories" name="filter_by_categories" class="form-control form-control-sm mb-2">
                            <option value="" selected>Select Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                            <option value="4">Category 4</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h6>Sub Categories</h6>
                        <select id="sub_categories" name="filter_by_sub_categories" class="form-control form-control-sm mb-2">
                            <option value="" selected>Select Sub Category</option>
                            <option value="2">Sub Category 2</option>
                            <option value="1">Sub Category 1</option>
                            <option value="3">Sub Category 3</option>
                            <option value="4">Sub Category 4</option>
                        </select>
                    </div> --}}
                    <div class="col-md-12 mt-3">
                        <h6 class="mb-3">Price</h6>
                        <div class="d-flex flex-column">
                            <h6 class="mb-0">From</h6>
                            <div class="align-items-center d-flex flex-row-reverse gap-2">
                                <p id="price_range_min" class="font-weight-bold">{{ $request->filter_by_price_min ?? 0 }}</p>
                                <input type="range" min="0" max="{{ $max_price }}" step="1"
                                    name="filter_by_price_min" class="form-control accent-color p-0"
                                    oninput="price_range_min.innerText = this.value" id="program_price_min"
                                    value="{{ $request->filter_by_price_min ?? 0 }}">
                            </div>
                            <h6 class="mb-0">To</h6>
                            <div class="align-items-center d-flex flex-row-reverse gap-2">
                                <p id="price_range_max" class="font-weight-bold">{{ $request->filter_by_price_max ?? $max_price }}</p>
                                <input type="range" min="0" max="{{ $max_price }}" step="1"
                                    name="filter_by_price_max" class="form-control accent-color p-0"
                                    oninput="price_range_max.innerText = this.value" id="program_price_max"
                                    value="{{ $request->filter_by_price_max ?? $max_price }}">
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-0 mt-4 text-center">
                    <button type="submit" class="theme_btn small_btn2 p-2">Submit</button>
                </p>
            </form>
        </div>
    </div>
</div>
