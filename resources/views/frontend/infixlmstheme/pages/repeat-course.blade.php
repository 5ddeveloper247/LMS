@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Repeat Course') }}
@endsection



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<style>
    ::-webkit-scrollbar {
    display: none;
}
    .footer .row p {
        font-weight: normal !important;
    }

    .footerbox h5 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox {
        padding: 25px;
        margin-left: 0%;
    }

    .expore h5 {
        font-weight: 700;
        color: white;
        font-size: 24px;
    }

    .expore p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer !important;
        transition: 1s;
    }

    .expore p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: rgb(255, 0, 0);
        text-decoration: underline;
    }

    .footerbox1 h5 {
        font-weight: 700;
        color: white;
        font-size: 24px;
    }

    .footerbox h5 {
        font-weight: 400;
    }

    .footerbox p {
        line-height: 30px !important;
        font-size: 16px !important;
        color: white;
        cursor: pointer !important;

    }

    .footerbox p:hover {
        line-height: 30px !important;
        font-size: 16px !important;
        color: rgb(248, 0, 0);
    }

    .footerbox1 p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer;
        transition: 1s;
    }

    .footerbox1 p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: rgb(255, 0, 0);
        text-decoration: underline;
    }

    .footercolor {
        /* background: #252525; */
    }

    .mainbanner {
        height: 530px;
        background-size: cover;
        color: white;
    }

    .cont1doimgdo {
        /* background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}"); */
        background-size: cover;
        /* height: 530px; */
        background: #6a0dad;
    }

    .custom_shadow {
        border: 1px solid rgb(255, 255, 255);
        box-shadow: 0 3px 20px rgb(0 0 0 / 5%);
    }

    .owl-next,
    .owl-prev {
        display: none !important;
    }

    .card_img {
        width: 50px !important;
        border-radius: 50% !important;
    }

    .slider_heading_h2 {
        font-weight: 700;
        /* font-size: 30px !important; */
    }

    .slider_paragraph {
        /* font-size: 18px !important; */
    }
    .slider_paragraph1{
        height: 73px;
        overflow: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .slider_paragraph1::-webkit-scrollbar {
        display: none;
    }
    .slider_img {
        /* width: 744px !important; */
        height: 35rem;

    }

    td {
        /* height: 9rem; */
        padding: 2rem !important;
        text-align: center;
        border: 1px solid #404040 !important;
    }

    tr {
        text-align: center;
        border: 1px solid #404040 !important;
    }

    .table thead th {
        border-bottom: 2px solid #404040 !important;
        border: 2px solid #404040;
    }

    .p1 {
        padding: 1rem !important
    }

    #choose {
        background: #eee;
    }

    .custom_border {
        border-radius: 1rem;
        min-height: 300px;
        max-height: 370px;
    }

    .contain,
    .contain-fluid {
        position: relative;
        max-width: 120rem;
        padding: 0 1.5rem;
        margin: 0 auto;
        min-height: 0.1rem;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    @keyframes fade {
        from {
            opacity: 0.4;
        }

        to {
            opacity: 1;
        }
    }

    body {
        background: #eeee;
    }

    #slider {
        margin: 0 auto;
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .slides {
        overflow: hidden;
        animation-name: fade;
        animation-duration: 1s;
        display: none;
    }

    img {
        width: 100%;
    }

    #dot {
        margin: 0 auto;
        text-align: center;
    }

    .dot {
        display: inline-block;
        border-radius: 50%;
        background: #d3d3d3;
        padding: 8px;
        margin: 10px 5px;
    }

    .activee {
        background: black;
    }

    #heading {
        display: block;
        text-align: center;
        font-size: 2em;
        margin: 10px 0px;

    }

    .slider-text {
        width: 75%;
        position: absolute;
        top: 50%;
        left: 50%;
        color: black;
        font-size: 24px;
        text-align: center;
        transform: translate(-50%, -50%);
    }

    .slider_text_heading {
        /* font-size: 40px; */
        font-weight: 700;
        line-height: 76px;
        color: white;
    }

    .slider-image {
        width: 100%;
        height: 530px;
        /* Adjust this value as needed */
        object-fit: cover;
        opacity: 0.8;
    }

    .slider_para {
        /* font-size: 17px; */
        /* line-height: 24px; */
        color: white
    }

    .cont1doimgdo {
        background-size: cover;
        /* height: 100%; */
        background: #6a0dad;
    }

    .rounded-card {
        border-radius: 25px !important;
    }

    .section-margin-y {
        margin: 60px auto !important;
    }
    .p-tag{
        height:37vh;
        overflow: auto;
    }
    .calendar-col{
        height:20vh;
        overflow: auto;
    }
    .slider-container {
    position: relative;
}

.slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.72); 
    /* z-index: 1; */
}

    @media (max-width: 576px) {
        #slider {
            width: 100%;

        }

        .slider_text_heading {
            font-size: 19px;
        }

        .slider_heading_h2 {
            font-size: 27px !important;
        }

        .slider_paragraph {
            font-size: 17px !important;
        }
    }

    @media (max-width: 767.98px) {
        .slider-image {
            height: 300px;
        }

        .slider_text_heading {
            font-size: 30px;
        }
    }
    @media (min-width: 1560px) {
        .slider_paragraph1{
        height: auto !important;
    }
    .slider-image{
        height: auto !important;
    }
    }

    /* @media (width > 1650px) {
        .breadcrumb_area .breadcam_wrap h5 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }

        p {
            font-size: 22px !important
        }

        h2.slider_text_heading.text-white {
            font-size: 60px !important;
        }

        .slider_para {
            font-size: 26px;
            line-height: 30px;
        }

        .slider-image {
            width: 100%;
            height: 760px;
            object-fit: cover;
        }

        .cont1doimgdo {
            background-size: cover;
            height: 613px;
            background: #6a0dad;
        }

    } */
</style>

@section('mainContent')
    <div id="content-area">
        <div class="row">
            <div class="col-md-12 ui-resizable" data-type="container-content">
                <div data-type="component-text">
                    <div class="breadcrumb_area bradcam_bg_1 position-relative mainbanner">
                        <div class="breadcrumb_img w-100 h-100 position-absolute bottom-0 left-0"><img alt=""
                                class="w-100 h-100 img-cover"
                                src="http://mchnursing.com/lms/public/frontend/infixlmstheme/img/banner/bradcam_bg_1.jpg">
                        </div>
                        {{-- <div class="container"> --}}
                        {{-- <div class="row"> --}}
                        <div class="col-lg-9 offset-lg-1">
                            <div class="breadcam_wrap learnmoredo">&nbsp;
                                <p class="text-light">Repeat Course Details</p>
                                <h5 class="custom-heading">{{ !empty($course) ? $course->parent->title : 'No Course Availabe !' }}</h5>
                            </div>
                        </div>
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (!empty($course))
        <section id="choose">
            <div class="container py-5 px-md-5 text-center">
                <div class="row mx-md-5">
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="card rounded-card" data-aos="fade-up" data-aos-delay="500">
                            <div class="card-body">
                                <h5 class="py-1">{{ $course->course_sale_data->card_1_heading ?? '' }}</h5>
                                <h5>{{ $course->course_sale_data->card_1_subheading ?? '' }}</h5>
                                <p>{{ $course->course_sale_data->card_1_text ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="card rounded-card" data-aos="fade-up" data-aos-delay="700">
                            <div class="card-body">
                                <h5 class="py-1">{{ $course->course_sale_data->card_2_heading ?? '' }}</h5>
                                <h5>{{ $course->course_sale_data->card_2_subheading ?? '' }}</h5>
                                <p>{{ $course->course_sale_data->card_2_text ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="card rounded-card" data-aos="fade-up" data-aos-delay="900">
                            <div class="card-body">
                                <h5 class="py-1">{{ $course->course_sale_data->card_3_heading ?? '' }}</h5>
                                <h5>{{ $course->course_sale_data->card_3_subheading ?? '' }}</h5>
                                <p>{{ $course->course_sale_data->card_3_text ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 p-2">
                        <div class="card rounded-card" data-aos="fade-up" data-aos-delay="1100">
                            <div class="card-body">
                                <h5 class="py-1">{{ $course->course_sale_data->card_4_heading ?? '' }}</h5>
                                <h5>{{ $course->course_sale_data->card_4_subheading ?? '' }}</h5>
                                <p>{{ $course->course_sale_data->card_4_text ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="calendar">
            <div class="container px-md-5 text-center">
                <div class="row mx-md-5 py-5">
                    <div class="col-md-12 ui-resizable text-center" data-type="container-content">
                        <h2 data-type="component-text" class="font-weight-bold pb-4">Our Calender</h2>

                        {{-- <div class="m-2" id="calendar"></div> --}}
                        <div class="">
                            <div class="table-responsive">
    <table id="lms_table" class="table-bordered table" style="background: #f3f3f3; overflow:hidden; text-align: center;">
        <thead>
            <tr>
                <th scope="col" style="width: 135px;">{{ __('Weeks') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Monday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Tuesday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Wednesday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Thursday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Friday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Saturday') }}</th>
                <th scope="col" style="width: 135px;">{{ __('Sunday') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($time_tables as $time_table)
                <tr>
                    <td style="vertical-align: middle;">Week {{ $time_table->week }}</td>
                    @foreach ($time_table->weekWiseDays as $WeekWiseDay)
                        <td class="p1" style="vertical-align: middle;">

                            <div id="block_{{ $time_table->week }}_{{ $WeekWiseDay->week }}" class="">
                                @if (!empty($WeekWiseDay->date))
                                    <p>({{ Carbon\Carbon::parse($WeekWiseDay->date)->format('Y M d') }})</p>

                                    @if (!empty($WeekWiseDay->Instructor_id))
                                        <p><strong>{{ !empty($WeekWiseDay->Instructor_id) ? (!empty($WeekWiseDay->instructor) ? $WeekWiseDay->instructor->name : 'Deleted User') : '' }}</strong></p>
                                    @endif

                                    @if (!empty($WeekWiseDay->content))
                                        <p class="mt-1">
                                            @php
                                                $all_contents = json_decode($WeekWiseDay->content);
                                                $contents = implode(', ', $all_contents);
                                            @endphp
                                            <strong>{{ $contents }}</strong>
                                        </p>
                                        <div>{!! $WeekWiseDay->comment !!}</div>
                                    @endif
                                @else
                                    <h2>-</h2>
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
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (!empty($course))
        <section class="slider_section">
            <div id="slider">
                <div class="slides">
                    <img src="{{ getCourseImage($course->course_sale_data->slider_1_image) ?? '' }}" width="100%"
                        class="slider-image" />
                        <div class="slider-overlay"></div>
                    <div class="slider-text">
                        <h2 class="slider_text_heading" >
                            {{ $course->course_sale_data->slider_1_heading ?? '' }}
                        </h2>
                        <p class="slider_para">
                            {{ $course->course_sale_data->slider_1_text ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="slides">
                    <img src="{{ getCourseImage($course->course_sale_data->slider_2_image) ?? '' }}" width="100%"
                        class="slider-image" />
                        <div class="slider-overlay"></div>
                    <div class="slider-text">
                        <h2 class="slider_text_heading">
                            {{ $course->course_sale_data->slider_2_heading ?? '' }}
                        </h2>
                        <p class="slider_para">
                            {{ $course->course_sale_data->slider_2_text ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="slides">
                    <img src="{{ getCourseImage($course->course_sale_data->slider_3_image) ?? '' }}" width="100%"
                        class="slider-image" />
                        <div class="slider-overlay"></div>
                    <div class="slider-text">
                        <h2 class="slider_text_heading" style="line-height: 48px;">
                            {{ $course->course_sale_data->slider_3_heading ?? '' }}
                        </h2>
                        <p class="slider_para">
                            {{ $course->course_sale_data->slider_3_text ?? '' }}
                        </p>
                    </div>
                </div>
                <div id="dot" class="d-none"><span class="dot"></span><span class="dot"></span><span
                        class="dot"></span></div>
            </div>
        </section>
        <section class="container d-none">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                  @if (count($Classes))
                    <div class="course_tabs">
                        <ul class="d-flex flex-column flex-md-row flex-sm-row lms_tabmenu nav w-200 my-5 text-center"
                            id="myTab" role="tablist">
                            @if ($course->type == 8)
                                <li class="nav-item">
                                    <a class="nav-link active" id="Classes-tab" data-toggle="tab" href="#Classes"
                                        role="tab" aria-controls="Classes"
                                        aria-selected="false">{{ __('Classes') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                  @endif
                    <div class="tab-content lms_tab_content" id="myTabContent">
                        @if (count($Classes))
                            <div class="tab-pane fade show active" id="Classes" role="tabpanel"
                                aria-labelledby="Curriculum-tab">
                                <!-- content  -->
                                <h5 class="font_22 f_w_$program_plan700 mb_20">{{ __('Classes') }}</h5>
                                <div class="theme_according mb_30" id="accordion1">
                                    <div class="row">
                                        @if (count($Classes))
                                            @foreach ($Classes as $Class)
                                                {{-- @dd($Class) --}}
                                                @if (in_array(8, json_decode($Class->course_types)))
                                                    <div class="col-lg-4 col-xl-4">
                                                        <div class="couse_wizged">
                                                            <a
                                                                href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?courseType=' . 8 . '&course_id=' . $course->parent->id }}">
                                                                <div class="thumb">
                                                                    <div class="thumb_inner lazy"
                                                                        style="background-image: url({{ getCourseImage($Class->thumbnail) }});">
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="course_content">
                                                                <a
                                                                    href="{{ courseDetailsUrl(@$Class->id, @$Class->type, @$Class->slug) . '?courseType=' . $course->type . '&course_id=' . $course->parent->id }}">

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
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="carousel_section mt-3">
            <div class="row py-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 cont1doimgdo px-md-4 py-xl-5 py-md-4 py-3">
                    <div class="mx-3 mx-xl-5">
                        <h2 class="px-lg-5 px-md-3 px-sm-5 slider_heading_h2 px-0 text-white">
                            {{ $course->parent->title ?? '' }}
                        </h2>
                        <h5 class="font_2 font-italic px-lg-5 px-md-3 px-sm-5 px-0 pt-2 text-white">
                            This Course is Available From {{ $course->start_date->format('F d, Y') }} to
                            {{ $course->end_date->format('F d, Y') }}
                        </h5>
                        <p class="slider_paragraph px-lg-5 px-md-3 px-sm-5 px-0 text-white">
                            <i class="fa fa-check"></i> This course includes
                            {{ $course->course_chapters_check->count() ?? '' }} Chapters
                        </p>
                        <p class="slider_paragraph px-lg-5 px-md-3 px-sm-5 px-0 text-white">
                            <i class="fa fa-check"></i> This course includes
                            {{ $course->course_lesson_check->count() ?? '' }} Lessons
                        </p>
                        <p class="slider_paragraph px-lg-5 px-md-3 px-sm-5 px-0 text-white">
                            <i class="fa fa-check"></i> This course includes
                            {{ $course->course_file_check->count() ?? '' }} Files
                        </p>
                        <h5 class="font_2 font-italic px-lg-5 px-md-3 px-sm-5 mt-4 px-0 text-white">
                            Course Description
                        </h5>
                        <p class="slider_paragraph px-lg-5 px-md-3 px-sm-5 px-0 text-white slider_paragraph1">
                            {{ $course->course_sale_data->description }}
                        </p>
                    </div>
                    <div class="col-md-12 mx-xl-5 mx-3 mt-4 px-5">
                        @if ($isEnrolled > 0 || isAdmin())
                            <a href="javascript:void(0)" class="theme_btn small_btn2 p-2">{{ __('Enrolled') }}</a>
                        @elseif(isStudent() || !auth()->check())
                            <a href=" {{ route('addToCartQuiz', [$course->parent->id]) . '?courseType=' . $course->type }}"
                                class="theme_btn small_btn2 p-2">{{ __('common.Add To Cart') }}</a>
                        @endif
                        {{-- <a href="{{ route('buyRepeatCourse', ['id' => $course->parent->id, 'type' => $course->parent->type]) }}"
                                    class="theme_btn small_btn2">Buy Now
                                </a> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-0">
                    <img src="{{ getCourseImage($course->image) ?? '' }}"
                        class="d-md-block d-none img-fluid slider_img h-100">
                </div>
            </div>

            {{-- <div class="col-md-12 col-12 cont1doimgdo p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0">
                        <div class="pt-4">
                            <h2 class="slider_heading_h2 ml-5 px-5 pt-5 text-white">
                                Second Slider
                            </h2>
                            <p class="pt-lg-3 slider_paragraph ml-5 px-5 text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus quis vel rem
                                reiciendis deleniti totam, consequuntur recusandae perspiciatis ex optio blanditiis
                                molestiae distinctio alias repudiandae sit! Corrupti, doloremque numquam. Earum?
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-0">
                        <img src="{{ asset('public/assets/c3.jpg') }}" class="d-md-block d-none img-fluid slider_img">
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-12 col-12 cont1doimgdo p-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0">
                        <div class="pt-4">
                            <h2 class="slider_heading_h2 ml-5 px-5 pt-5 text-white">
                                Third Slider
                            </h2>
                            <p class="pt-lg-3 slider_paragraph ml-5 px-5 text-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus quis vel rem
                                reiciendis deleniti totam, consequuntur recusandae perspiciatis ex optio blanditiis
                                molestiae distinctio alias repudiandae sit! Corrupti, doloremque numquam. Earum?
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center p-0">
                        <img src="{{ asset('public/assets/c1.jpg') }}" class="d-md-block d-none img-fluid slider_img">
                    </div>
                </div>
            </div> --}}


        </section>


        {{-- <div class="row my-2">

        </div> --}}
    @endif
    @include(theme('partials._custom_footer'))
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        (function($) {
            "use strict";

            var fullHeight = function() {
                $(".js-fullheight").css("height", $(window).height());
                $(window).resize(function() {
                    $(".js-fullheight").css("height", $(window).height());
                });
            };
            fullHeight();

            var carousel = function() {

                $(".owl-carousel").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    // navigation : true,

                    margin: 30,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    nav: true,
                    dots: false,
                    items: 1,
                    // navText: [
                    //   "<p><small>Prev</small><span class='ion-ios-arrow-round-back'></span></p>",
                    //   "<p><small>Next</small><span class='ion-ios-arrow-round-forward'></span></p>",
                    // ],

                    // responsive: {
                    //   0: {
                    //     items: 1,
                    //   },
                    //   600: {
                    //     items: 1,
                    //   },
                    //   1000: {
                    //     items: 1,
                    //   },
                    // },
                });
            };
            carousel();
        })(jQuery);
        jQuery(document).ready(function($) {
            // $('.owl-carousel').find('.owl-nav').removeClass('disabled');
            //     $('.owl-carousel').on('changed.owl.carousel', function(event) {
            //         $(this).find('.owl-nav').removeClass('disabled');
            //     });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    right: 'prev,next',
                    // center: 'title',
                    // right: 'month,agendaWeek,agendaDay'
                },
                events: '/full-calender',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url: "/full-calender/action",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Created Successfully");
                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },

                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        var id = event.id;
                        $.ajax({
                            url: "/full-calender/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Deleted Successfully");
                            }
                        })
                    }
                }
            });
            $(".fc-button-group").children().removeClass('fc-state-default').addClass('theme_btn mx-1');

        });
    </script>
    <script>
        AOS.init();

        // You can also pass an optional settings object
        // below listed default settings
        AOS.init({
            duration: 1000,
            // Global settings:
            // disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            // startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            // initClassName: 'aos-init', // class applied after initialization
            // animatedClassName: 'aos-animate', // class applied on animation
            // useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            // disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            // debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            // throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            // offset: 120, // offset (in px) from the original trigger point
            // delay: 0, // values from 0 to 3000, with step 50ms
            // // values from 0 to 3000, with step 50ms
            // easing: 'ease', // default easing for AOS animations
            // once: false, // whether animation should happen only once - while scrolling down
            // mirror: false, // whether elements should animate out while scrolling past them
            // anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>
    <script>
        var index = 0;
        var slides = document.querySelectorAll(".slides");
        var dot = document.querySelectorAll(".dot");
        var theInterval;

        function startSlide() {
            theInterval = setInterval(changeSlide, 3000);
        }

        function stopSlide() {
            clearInterval(theInterval);
        }

        $(function() {
            startSlide();
            $('.slides').hover(function() {
                stopSlide();
            }, function() {
                startSlide();
            })
        });


        function changeSlide() {

            if (index < 0) {
                index = slides.length - 1;
            }

            if (index > slides.length - 1) {
                index = 0;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dot[i].classList.remove("activee");
            }

            slides[index].style.display = "block";
            dot[index].classList.add("activee");

            index++;

            // setTimeout(changeSlide, 5000);

        }

        changeSlide();
    </script>
@endsection
