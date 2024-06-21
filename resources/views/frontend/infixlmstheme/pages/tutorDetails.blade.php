@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $tutor->name }}
@endsection
{{-- @section('css') --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<link href="{{ asset('public/frontend/infixlmstheme/css/class_details.css') }}" rel="stylesheet" />
<style>
    .d-inine {
        cursor: pointer;
    }

    /* .btn-for-book{
        width: 6rem;
        text-align: center;
    } */
    .thumb-link {
        padding: 10px 18px;
        font-size: 32px;
        font-weight: 700;
        font-family: Source Sans Pro, sans-serif;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--system_primery_color);
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        line-height: 80px;

    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews:last-child {
        padding-bottom: 0px !important;
        border: 0;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews {
        margin-bottom: 10px !important
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {
        font-size: 20px;
        font-weight: 700;
        font-family: Source Sans Pro, sans-serif;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--system_primery_color);
        flex: 80px 0 0;
        margin-left: 40px;
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        line-height: 80px;
        margin-bottom: 14px !important;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer {
        display: flex;
        align-items: center;
        margin: 7px 0 0px !important;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer .feedmak_stars {
        display: flex;
        align-items: center;
        margin: unset !important
    }

    #review_comment {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        max-height: 151px;
        overflow: auto;
    }

    .single_reviews {
        background: #eee;
    }

    /* .course_review_wrapper .course_feedback .course_feedback_left {
        padding-right: 55px;
        margin-bottom: 15px !important;
    } */
    .tutor_detail_image {
        height: 60vh;
    }

    .review_username {
        width: 150px;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    body::-webkit-scrollbar-thumb {
        background: #d5d5d5;
    }

    /* Handle on hover */
    body::-webkit-scrollbar-thumb:hover {
        background: #909090;
    }

    /* Left Sidebar Section  style*/
    .left {
        position: fixed;
        width: 23%;
        height: 100vh;
        float: left;
    }

    /* Right Sidebar Section  style */
    .right {
        background-repeat: no-repeat;
        height: auto;
        width: 100%;
    }

    /* Main Banner Section style */
    .vansena {
        background-image: url("{{ asset('/public/assets/tutor/backimg.png') }}");
        height: 630px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* Main banner Heading Section style  */
    .vansena h2 {
        text-align: right;
        z-index: 5;
        font-family: Poppins;
        height: auto;
        width: auto;
        color: rgb(255, 255, 255);
        text-decoration: none;
        white-space: nowrap;
        min-height: 0px;
        min-width: 0px;
        max-height: none;
        max-width: none;
        line-height: 100px;
        letter-spacing: 0px;
        font-weight: 700;
        font-size: 80px;
        transform-origin: 50% 50%;
        opacity: 1;
        transform: translate(0px, 0px);
        visibility: visible;

    }

    .vansena p {
        font-weight: 300;
        font-size: 22px;
        text-align: right;
    }

    /* What we do Section Style  */
    .whatWedo h5 {
        cursor: pointer;
    }

    .whatWedo {

        border-bottom: 2px dotted #e1e1e1;
    }

    .whatWedo i {
        color: #ff7600;
        margin-right: 1rem;
        font-weight: bold;
    }

    .whatWedo h5 i:hover {
        color: #ff7600;
        margin-right: 1rem;
        font-weight: bold;
        opacity: 1;
    }

    /* .select h2 {
        font-weight: bold;
        font-size: calc(2vw + 0.7rem);
    }

    .select p {
        font-size: 23px;
        font-weight: 300;
    } */

    /* .markdone p {
        font-size: 14px;
        color: #252525;
        font-family: Poppins, sans-serif;
    } */

    .markdone {
        max-height: 55vh;
        overflow-y: auto;
        scrollbar-width: none;

    }

    .markdone p i {
        font-size: 20px;
        color: #ff7600;
        font-weight: 800;
    }


    .controlSize2 {
        height: 350px;
        overflow: auto;
        scrollbar-width: none;
    }

    .newknowledge {
        background-color: #996699;
    }

    /* .heading h2 {
        font-size: calc(2.7vw + 0.7rem);
        color: white;
        font-weight: bold;
    } */

    /* .heading p {
        font-size: 18px;
        color: white;
        font-weight: bold;
        text-decoration: underline;
    } */

    /* .lead h2 {
        font-size: calc(2.7vw + 0.7rem);
        font-weight: bold;
    } */

    /* .lead p {
        font-size: 18px;
        font-weight: bold;
        text-decoration: underline;
    } */

    .newknowledgeImg {
        background-image: url('images/banner.jpg');
        background-size: cover;
    }

    .datatext {
        width: 600px;
    }

    .slick-dots {
        position: absolute;
        bottom: 80px !important;
        display: block;
        width: 100%;
        padding: 0;
        margin: 0;
        list-style: none;
        text-align: center;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .theme_color2 {
        color: var(--system_primery_color);
    }
@media only screen and (max-width: 540px){
    .controlSize2 {
            height: 350px !important;
        }
}

    @media only screen and (max-width: 768px) {
        .controlSize2 {
            height: auto;
        }

        /* Left Sidebar Section  style*/
        .left {
            position: relative;
            width: 100%;
            height: 50vh;
            float: left;
        }

        /* Right Sidebar Section  style */
        .right {
            margin-left: 0%;
            background-repeat: no-repeat;
            height: auto;
            width: 100%;
            float: right;
        }

        /* Main Banner Section style */
        .vansena {
            background-image: url('images/backimg.png');
            height: 630px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Main banner Heading Section style  */
        .vansena h2 {
            text-align: right;
            z-index: 5;
            font-family: Poppins;
            height: auto;
            width: auto;
            color: rgb(255, 255, 255);
            text-decoration: none;
            white-space: nowrap;
            min-height: 0px;
            min-width: 0px;
            max-height: none;
            max-width: none;
            line-height: 100px;
            letter-spacing: 0px;
            font-weight: 700;
            font-size: 40px;
            transform-origin: 50% 50%;
            opacity: 1;
            transform: translate(0px, 0px);
            visibility: visible;

        }

        .datatext {
            width: auto;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {

            margin-right: 38px;
            margin-left: 129px !important;
        }

        .d-flex.gap-3 {
            flex-direction: column;
        }

        .review_username {
            width: unset;
        }

        .for-column {
            display: flex;
            flex-direction: column;
        }

        .h-font {
            font-size: 20px;
        }
    }


    /* @media (width >

    1650px

    ) {
        .breadcrumb_area .breadcam_wrap h5 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }


    } */

    .section-margin-y {
        margin: 60px auto !important;
    }
    @media only screen and (min-width: 1800px) {
        .lead {
            padding: 0px 45px !important;
        }
    }
</style>
{{-- @endsection --}}
@section('js')
    <script>
        function shoot(id) {
            if (id == 1) {
                $('.registermain').addClass('d-none');
                $('.whatmain').removeClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            }
            if (id == 2) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').removeClass('d-none');
            } else if (id == 3) {
                $('.registermain').removeClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 4) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').removeClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 5) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').removeClass('d-none');
                $('.coursemain').addClass('d-none');
            }

        }

        $(document).on('click', '.tab_spy', function() {
            $(".tab_spy").find('i').addClass('d-none');
            $(this).find('i').removeClass('d-none');

        });
    </script>
@endsection

@section('mainContent')

    {{-- <div class="row m-0">
            <div class="col-md-12 p-0"> --}}
    {{-- <div class="row change m-0">
                    <div class="col-md-12 vansena"></div>
                </div> --}}
    <div class="col-md-12 px-0">
        <div class="breadcrumb_area position-relative">
            <div class="w-100 h-100 position-absolute bottom-0 left-0">
                <img alt="Banner Image" class="w-100 h-100 img-cover"
                    src="{{ asset('public\frontend\infixlmstheme\img\images\instructors.jpg') }}">
            </div>

            <div class="col-lg-9 offset-1">
                <div class="breadcam_wrap">&nbsp;
                    <h5 class="text-white custom-heading">Instructor Details</h5>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="row m-0 mt-5">
                    <div class="col-md-12"> --}}
    {{-- <div class="container-fluid"> --}}
    <div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">
        <div class="row px-3 px-md-5">
            <div class="col-lg-3 col-md-3 d-md-block justify-content-between for-column px-0 px-lg-2">
                <div class="whatWedo what tab_spy mb-3">
                    <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(1)">
                        About Tutor
                        <i class="fa-solid fa-arrow-right "></i>
                    </h5>
                </div>
                <div class="whatWedo course tab_spy mb-3">
                    <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(2)">
                        Courses
                        <i class="fa-solid fa-arrow-right d-none"></i>
                    </h5>
                </div>
                @if (auth()->check())
                    @if (isStudent() || isAdmin())
                        <div class="whatWedo register tab_spy mb-3">
                            <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(3)">
                                Book Now
                                <i class="fa-solid fa-arrow-right d-none"></i>
                            </h5>
                        </div>
                    @endif
                @else
                    <div class="whatWedo register tab_spy mb-3">
                        <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(3)">
                            Book Now
                            <i class="fa-solid fa-arrow-right d-none"></i>
                        </h5>
                    </div>
                @endif

                {{-- <div class="whatWedo how mx-3 my-3">
                                    <h5 class="d-inine" onclick="shoot(4)">
                                        <i class="bi bi-arrow-right"></i>How we do it
                                    </h5>
                                </div>
                                <div class="whatWedo program mx-3 my-3">
                                    <h5 class="d-inine" onclick="shoot(5)">
                                        <i class="bi bi-arrow-right"></i>Our Program
                                    </h5>
                                </div> --}}
            </div>
            <div class="col-6 select whatmain hide-scrollbar px-2" style="">
                <h5 class="custom_small_heading h-font font-weight-bold">{{ $tutor->name }}</h5>
                <div class="markdone">
                    <p style="text-align: justify;">{!! $tutor->about !!}</p>
                    {{-- <p> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p> --}}
                </div>
            </div>
            <div class="col-6 coursemain d-none select px-0 px-md-2">
                <h5 class="h-font font-weight-bold">Course</h5>
                <div class="markdone">
                    <ul>
                        @forelse ($courses as $course)
                            <li>
                                <p><i class="ti ti-check"></i> {{ $course->title }}</p>
                            </li>
                        @empty
                            <li>
                                <p>No Course of This Tutor</p>
                            </li>
                            <h5></h5>
                        @endforelse
                    </ul>
                    {{-- <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p> --}}
                </div>
            </div>
            <div class="col-6 d-none registermain select px-0 px-md-2">
                <h5 class="h-font font-weight-bold">Book Now</h5>
                <p>If you want to hire the Tutor, Please Click the Below Button</p>

                <a href="{{ route('tutorBooking', $tutor->id) }}"
                    class="theme_btn small_btn2 btn-for-book mt-4 p-2">Book</a>


                {{-- <div class="markdone">
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                </div> --}}
            </div>
            {{-- <div class="col-md-4 select howmain d-none">
                                <h2>How we do it</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                <div class="markdone">
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                </div>
                            </div>
                            <div class="col-md-4 select programmain d-none">
                                <h2>Our Program</h2>
                                <p> consectetur adipiscing elit, Lorem ipsum dolor sit amet</p>
                                <div class="markdone">
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                </div>
                            </div> --}}
            <div class="col-6 col-md-3 p-0">
                <div class="tutor_detail_image">
                    <img src="{{ !empty($tutor->image) ? asset($tutor->image) : asset('public/demo/user/admin.jpg') }}"
                        class="img-fluid w-100 h-100" style="object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 row">
        <div class="col-md-6 p-0">
            <img src="{{ asset('/public/assets/tutor/instructor.jpg') }}" class="img-fluid w-100 h-100">
        </div>
        <div class="col-md-6 p-0 d-flex align-items-center px-xl-5" style="background-color: #996699">
            <div class="controlSize px-4 py-4 px-sm-5 hide-scrollbar">
                <div class="lead">
                    <div class="controlSize2">
                        <h2 class="custom_small_heading font-weight-bold text-white">New knowledge is important</h2>
                        <p class=" text-justify text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                            consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor.</p>
                    </div>
                    <p class="font-weight-bold mt-3 text-white"><a href="{{ route('instructors') }}"
                            style="color:inherit;">
                            <u>All
                                Tutors</u></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 newknowledgeImg order-1 order-lg-0 order-md-0 px-1 px-xl-5 d-flex align-items-center"
            style="
            background: #eee; ">
            <div class="controlSize px-4 py-4 px-sm-5 hide-scrollbar">
                <div class="lead">
                    <div class="controlSize2">
                        <h2 class="custom_small_heading font-weight-bold">New knowledge is important</h2>
                        <p class=" text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                            consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor.</p>
                    </div>
                    <p class="font-weight-bold mt-3"><a href="{{ route('instructors') }}" style="color:inherit;">
                            <u>All
                                Tutors</u></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <img src="{{ asset('/public/assets/tutor/instructor.jpg') }}" class="img-fluid h-100 w-100">
        </div>
    </div>
    {{-- </div> --}}
    </div>
    <div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">


        <div class="course_review_wrapper w-100">
            <div class="row px-3 px-md-5">
                <!-- content  -->


                <div class="col-6 col-sm-4 col-lg-3 px-sm-0 px-lg-2">
                    <div class="details_title">
                        <h5 class="f_w_700">Tutor Rating</h5>

                    </div>
                    <div class="course_feedback p-3" style="background:#eee; min-height:24vh; align-items:center;">
                        <div class="course_feedback_left">
                            <label class="f_w_400">{{ $tutor->name }}</label>
                            <h5 class="h-font">{{ $tutor->total_tutor_rating }}</h5>
                            <div class="feedmak_stars">

                                @php

                                    $main_stars = $tutor->total_tutor_rating;

                                    $stars = intval($tutor->total_tutor_rating);

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
                        {{--                    <div class="feedbark_progressbar"> --}}
                        {{--                        <div class="single_progrssbar"> --}}
                        {{--                            <div class="progress"> --}}
                        {{--                                <div class="progress-bar" role="progressbar" --}}
                        {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,5)}}%" --}}
                        {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,5)}}" --}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}
                        {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                        {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                </div> --}}
                        {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,5)}}%</span> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="single_progrssbar"> --}}
                        {{--                            <div class="progress"> --}}
                        {{--                                <div class="progress-bar" role="progressbar" --}}
                        {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,4)}}%" --}}
                        {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,4)}}" --}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}
                        {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                        {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                </div> --}}
                        {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,4)}}%</span> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="single_progrssbar"> --}}
                        {{--                            <div class="progress"> --}}
                        {{--                                <div class="progress-bar" role="progressbar" --}}
                        {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,3)}}%" --}}
                        {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,3)}}" --}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}
                        {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                        {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}

                        {{--                                </div> --}}
                        {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,3)}}%</span> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="single_progrssbar"> --}}
                        {{--                            <div class="progress"> --}}
                        {{--                                <div class="progress-bar" role="progressbar" --}}
                        {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,2)}}%" --}}
                        {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,2)}}" --}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}
                        {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                        {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                </div> --}}
                        {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,2)}}%</span> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="single_progrssbar"> --}}
                        {{--                            <div class="progress"> --}}
                        {{--                                <div class="progress-bar" role="progressbar" --}}
                        {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,1)}}%" --}}
                        {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,1)}}" --}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                        {{--                                </div> --}}
                        {{--                            </div> --}}
                        {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                        {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                        {{--                                    <i class="fas fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                    <i class="far fa-star"></i> --}}
                        {{--                                </div> --}}
                        {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,1)}}%</span> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}
                        {{--                    </div> --}}
                    </div>
                </div>
                <div class="col-6 col-sm-8">
                    @php
                        $PickId = $tutor->id;
                        $user_tutor_hiring_count = \Modules\SystemSetting\Entities\TutorHiring::where(
                            'user_id',
                            \Illuminate\Support\Facades\Auth::id(),
                        )
                            ->where('instructor_id', $PickId)
                            ->count();
                    @endphp

                    <div class="course_cutomer_reviews border-0">
                        <div class="details_title">
                            <h5 class="f_w_700">{{ __('frontend.Reviews') }}</h5>

                        </div>
                        <div class="slick-slider customers_reviews" id="customers_reviews">

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="course_review_header">
                        <div class="row align-items-center">
                            <div class="col-md-6 px-sm-0 px-lg-2">
                                <div class="review_poients">
                                    @if (isAdmin() || isStudent())
                                        @if ($user_tutor_hiring_count > 0)
                                            @if ($tutor->tutorReviews->count() < 1)
                                                @if (Auth::check() && $tutor->userTutorReviews->count() == 0)
                                                    <p class="theme_color font_16 mb-0">
                                                        {{ __('frontend.Be the first reviewer') }}
                                                    </p>
                                                @else
                                                    <p class="theme_color font_16 mb-0">
                                                        {{ __('frontend.No Review found') }}
                                                    </p>
                                                @endif
                                            @endif
                                        @else
                                            <p class="theme_color font_16 mb-0">{{ __('First you buy then review') }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 px-sm-0 px-lg-2">
                                <div class="rating_star text-lg-right text-md-right">


                                    @if (Auth::check())
                                        @if (isAdmin() || isStudent())
                                            @if ($tutor->userTutorReviews->count() == 0 && $user_tutor_hiring_count > 0)
                                                <div class="star_icon d-flex align-items-center justify-content-end">
                                                    <a class="rating">
                                                        <input type="radio" id="star5" name="rating"
                                                            value="5" class="rating" /><label class="full"
                                                            for="star5" id="star5" title="Awesome - 5 stars"
                                                            onclick="Rates(5, {{ @$PickId }})"></label>

                                                        <input type="radio" id="star4" name="rating"
                                                            value="4" class="rating" /><label class="full"
                                                            for="star4" title="Pretty good - 4 stars"
                                                            onclick="Rates(4, {{ @$PickId }})"></label>

                                                        <input type="radio" id="star3" name="rating"
                                                            value="3" class="rating" /><label class="full"
                                                            for="star3" title="Meh - 3 stars"
                                                            onclick="Rates(3, {{ @$PickId }})"></label>

                                                        <input type="radio" id="star2" name="rating"
                                                            value="2" class="rating" /><label class="full"
                                                            for="star2" title="Kinda bad - 2 stars"
                                                            onclick="Rates(2, {{ @$PickId }})"></label>

                                                        <input type="radio" id="star1" name="rating"
                                                            value="1" class="rating" /><label class="full"
                                                            for="star1" title="Bad  - 1 star"
                                                            onclick="Rates(1,{{ @$PickId }})"></label>

                                                    </a>
                                                </div>
                                            @endif
                                        @endif
                                    @else
                                        <p class=" f_w_400 mt-0"><a href="{{ url('login') }}"
                                                class="theme_color2">{{ __('frontend.Sign In') }}</a>
                                            {{ __('frontend.or') }} <a class="theme_color2"
                                                href="{{ url('register') }}">{{ __('frontend.Sign Up') }}</a>
                                            {{ __('frontend.as student to post a review') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close "></i></button>
                </div>

                <form action="{{ route('submitTutorReview') }}" method="Post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="tutor_id" id="rating_tutor_id" value="">
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
                            <button class="theme_btn " type="submit">{{ __('common.Submit') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @include(theme('partials._delete_model'))
    @include(theme('partials._custom_footer'))
    <script>
        function Rates(val, id) {
            document.getElementById('rating_tutor_id').value = id;
            document.getElementById('rating_value').value = val;
            $("#myModal").modal();
        }
    </script>


    <script>
        function deleteCommnet(item, element) {
            let form = $('#deleteCommentForm')
            form.attr('action', item);
            form.attr('data-element', element);
        }
    </script>


    <script>
        var SITEURL = "{{ route('tutorDetails', [$tutor->id, Str::slug($tutor->name, '-')]) }}";
        var page = 1;

        load_more_review(page);


        // $(window).scroll(function () { //detect page scroll
        //     if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
        //         page++;
        //         load_more_review(page);
        //     }


        // });

        function load_more_review(page) {
            $.ajax({
                    url: SITEURL + "?page=" + page,
                    type: "get",
                    datatype: "html",
                    data: {
                        'type': 'review',
                    },
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {

                        //notify user if nothing to load
                        $('.ajax-loading').html("");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#customers_reviews").append(data); //append data into #results element

                    if ($('.slick-slider').hasClass('slick-initialized')) {
                        $('.slick-slider').slick('destroy');
                    }
                    setTimeout(function() {
                        $('.slick-slider').slick({
                            slidesToShow: 1,
                            autoplaySpeed: 1500,
                            "infinite": true,
                            "autoplay": true,
                            "dots": true,
                            "arrows": false,
                            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-arrow-left' aria-hidden='true'></i></button>",
                            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-arrow-right' aria-hidden='true'></i></button>",
                            "responsive": [

                                {
                                    "breakpoint": 1400,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                },

                                {
                                    "breakpoint": 1366,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                },

                                {
                                    "breakpoint": 1200,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                },

                                {
                                    "breakpoint": 992,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                },

                                {
                                    "breakpoint": 768,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                },

                                {
                                    "breakpoint": 576,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                }
                            ]

                        });
                    }, 500);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('No response from server');
                });

        }
    </script>
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

@endsection
