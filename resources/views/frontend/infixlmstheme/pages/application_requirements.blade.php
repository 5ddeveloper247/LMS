@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Application Requirements') }}
@endsection

{{-- @section('css') --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
{{-- for aos-animation --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* slider timeline */
    /* .fw-medium {
        font-weight: 500;
    }

    .carrot-orange-clr {
        color: var(--system_primery_color);
    }

    .slider-bg {
        background-color: #b2dfcc;
    }

    .brdr-btm-of-txt {
        border-bottom: 1px solid #9fcdb9;
    }

    .padding-top-of-first-part {
        padding-top: 80px;
    }

    .side-bar-for-process-section {
        height: auto;
        min-width: 10px;
        background-color: #996699;
        position: relative;
        border-radius: 10px 10px 0 0;
    }

    .dot-point-side-bar-of-process-section {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        min-width: 30px;
        height: 30px;
        background-color: #996699;
    }

    .top-of-2 {
        top: 84px;
    }

    .top-1 {
        top: -1px;
    }

    .margin-left-minus-10 {
        margin-left: -10px;
    }

    .inner-end-point-of-bar {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        background-color: var(--system_primery_color);
    }

    .inner-white-point-of-bar {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        background-color: white;
    }

    .padding-btm-last-part {
        padding-bottom: 30px;
    }

    .mr_our_process {
        margin-right: 90px;
    }

    .ml_our_process {
        margin-left: 90px;
    } */

    /* slider timeline-end */
    .footer .row p {
        font-weight: normal !important;
    }

    .footerbox h4 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox {
        padding: 25px;
        margin-left: 0%;
    }

    .small_btn2 {
        white-space: nowrap;
    }

    .app_require {
        height: fit-content;
        overflow: hidden;
    }

    .cont1doimgdo {
        height: 100%;
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
        color: var(--system_primery_color);
    }

    /* .footerbox1 p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white;
            cursor: pointer;
            transition: .5s;
        }

        .footerbox1 p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: var(--system_primery_color);
            text-decoration: underline;
        }

        .footercolor {
            background: #252525;
        }
        .icons i {
        font-size: 12px;
        padding: 3px;
        cursor: pointer;
    }

    .icons i:hover {
        color: var(--system_primery_color);

        font-size: 12px;
        padding: 3px;
    } */


    /* .mainbanner {
                    height: 530px;
                    background-size: cover;
                    color: white;
                } */

    .cont1doimgdo1 {
        /* background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}"); */
        background-size: cover;
        height: 405px;
        background: red;
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

    .slider_img1 {
        height: 35rem;
    }

    td {
        height: 9rem;
        text-align: end;
    }

    .custom_p {
        color: #eee;
        font-size: 1.8rem;
        text-shadow: 0.5rem 0.5rem 0.5rem rgba(17, 17, 17, 0.2);
    }

    .custom_h1 {
        font-size: 4.5rem;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        text-shadow: 0.5rem 0.5rem 0.5rem rgba(17, 17, 17, 0.3);
        font-family: "source sans", Helvetica, Arial, sans-serif;
        font-weight: 700;
    }

    .content {
        /* max-width: 64rem; */
        color: #fff;
        margin: 0 auto;
    }

    .site_btn.round {
        border-radius: 5rem;
    }

    #apply {
        position: relative;
        /* padding: 35px 70px; */
    }

    .contain,
    .contain-fluid {
        position: relative;
        max-width: 120rem;
        padding: 0 1.5rem;
        margin: 0 auto;
        min-height: 0.1rem;
    }

    h1.heading {
        position: relative;
        margin-bottom: 2.5rem;
    }

    .back-color {
        background: #996699;
    }

    .faq_lst>.faq_blk {
        position: relative;
        background: #fff;
        padding: 2rem;
        border-radius: 1rem;
        -webkit-box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        margin-bottom: 2rem;
        -webkit-transition: all ease 0.5s;
        transition: all ease 0.5s;
    }

    .faq_lst>.faq_blk.active h5:after {
        background: #996699;
        -webkit-clip-path: polygon(0 40%, 0 60%, 100% 60%, 100% 40%);
        clip-path: polygon(0 40%, 0 60%, 100% 60%, 100% 40%);
    }

    .faq_lst>.faq_blk h5:after {
        content: "";
        position: absolute;
        top: 0.2rem;
        right: 0;
        width: 1.2rem;
        height: 1.2rem;
        background: #111;
        -webkit-clip-path: polygon(0 40%, 0 60%, 40% 60%, 40% 100%, 60% 100%, 60% 60%, 100% 60%, 100% 40%, 60% 40%, 60% 0, 40% 0, 40% 40%);
        clip-path: polygon(0 40%, 0 60%, 40% 60%, 40% 100%, 60% 100%, 60% 60%, 100% 60%, 100% 40%, 60% 40%, 60% 0, 40% 0, 40% 40%);
        -webkit-transition: all ease 0.5s;
        transition: all ease 0.5s;
    }

    /* .containerwidth {
                    width: 100%;
                } */

    .wrapper {
        background-color: #ffffff;
        padding: 10px 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        -webkit-box-shadow: 0 15px 25px rgba(0, 0, 50, 0.2);
        box-shadow: 0 15px 25px rgba(0, 0, 50, 0.2);
    }

    .toggle,
    .content {
        font-family: "Poppins", sans-serif;
    }

    .toggle {
        width: 100%;
        background-color: transparent;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-size: 19px;
        color: #111130;
        font-weight: 600;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 0;
        gap: 10px;
        text-align: left;
    }

    .content {
        position: relative;
        font-size: 14px;
        text-align: justify;
        line-height: 30px;
        height: 0;
        overflow: hidden;
        -webkit-transition: all 1s;
        -o-transition: all 1s;
        transition: all 1s;
    }

    #choose {
        background: #eee;
    }

    .contain,
    .contain-fluid {
        position: relative;
        max-width: 120rem;
        padding: 0 1.5rem;
        margin: 0 auto;
        min-height: 0.1rem;
    }

    #choose .flex_row {
        width: calc(100% + -5rem);
        margin: 2.5rem;
        display: flex;
    }

    #choose .flex_row>.col {
        width: 25%;
        padding: 2.5rem;

    }

    #choose .inner {
        position: relative;
        background: #fff;
        padding: 2.5rem;
        border-radius: 1rem;
        -webkit-box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
    }

    .flex_row>.col {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
    }

    #choose .inner>.icon {
        width: 8rem;
        min-width: 8rem;
        height: 4rem;
        margin: 0 auto 2rem;
    }

    .flex_blk {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        min-height: 100vh;
        padding: 8rem 0;
        padding-top: 17rem;
    }

    .contain,
    .contain-fluid {
        position: relative;
        max-width: 120rem;
        padding: 0 1.5rem;
        margin: 0 auto;
        min-height: 0.1rem;
    }

    .custom_h1 {
        font-size: calc(3.4rem + 1vmin) !important;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        text-shadow: 0.5rem 0.5rem 0.5rem rgba(17, 17, 17, 0.3);
        color: #fff;
    }

    .custom_P {
        color: #eee;
        font-size: 1.8rem;
        text-shadow: 0.5rem 0.5rem 0.5rem rgba(17, 17, 17, 0.2);
    }

    #banner {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 0;
        margin-top: -8rem;
    }

    #banner .flex_blk {
        display: -webkit-box;
        display: -ms-flexbox;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        min-height: 100vh;
        padding: 8rem 0;
        padding-top: 16rem;
    }

    #banner .content {
        max-width: 64rem;
        color: #fff;
        margin: 0 auto;
    }

    .cont1doimgdo {
        /* background: url("http://mchnursing.com/lms/public/frontend/infixlmstheme/img/images/courses-4.jpg"); */
        background-size: cover;
        /* height: 405px; */
        background: #996699;
    }

    .custom_fs_a {
        font-size: 30px;
        /* position: relative; */
        top: 50%;
        right: 0;
        font-family: "Poppins", sans-serif;
        color: #996699;


    }

    .apply_btn {
        position: relative;
        top: 50px;
        left: 52px;
        padding: 16px 39px;
    }

    .custom_card_body {
        height: 24rem;
    }

    .custom_border {
        border-radius: 1rem;
    }

    .custom-heading {
        font-size: 60px;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .hidden-left {
        opacity: 0;
        transition: all 1s;
        filter: blur(1px);
        transform: scale(0.5);
    }

    .text-show {
        opacity: 1;
        filter: blur(0);
        transform: scale(1);
        transition: all 2s ease;
    }

    .cont1domgdo_para {
            max-height: 400px;
            overflow: auto;
            scrollbar-width: none;
        }
    .small_screen_carousel2 img{
        object-fit: cover;
    }
    @media (max-width: 576px) {
        .fw-light {
            margin-top: 10px;
        }

        .small_gap {
            gap: .2rem;
            position: relative;
        }

        .carrot-orange-clr,
        .brdr-btm-of-txt {
            display: flex;
            justify-content: center;
            margin: auto;
            text-align: center;
        }

        .inner-white-point-of-bar {
            height: 14px !important;
            width: 14px !important;
        }

        .dot-point-side-bar-of-process-section {
            min-width: 24px !important;
            height: 24px !important;
        }

        .inner-end-point-of-bar {
            height: 14px !important;
            width: 14px !important;
        }

        .gap-5 {
            gap: .4rem !important;
        }

        .custom_h1 {
            font-size: calc(1.6rem + 1vmin) !important;
        }

        .slider_paragraph {
            font-size: 17px !important;
            height: 178px;
            overflow: auto;
        }

        .custom_P {
            font-size: 1.2rem;
        }

        .custom_fs_a {
            font-size: 20px !important;
            right: 0px;
        }

        .apply_btn {
            padding: 10px 25px !important;
            left: 0px;
        }

        .avail-ser {
            font-size: 35px !important;
        }

        .app_require {
            position: relative;
            height: auto !important;
        }

        .small_screen_carousel {
            position: absolute !important;
            bottom: 0;
            top: 50%;
            z-index: 2;
            max-height: 330px;
            min-height: 330px;
        }

        .small_screen_carousel2 {
            position: absolute !important;
            top: 0;
            z-index: 1;
            bottom: 30%;
            min-height: 330px !important;
            max-height: 330px !important;
        }

        .cont1domgdo_para {
            max-height: 250px;
            overflow: auto;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        /* .mr_our_process {
            margin-right: 0px !important;
            margin-left: 10px !important;
        }

        .ml_our_process {
            margin-left: 10px !important;
        } */
    }

    @media (max-width: 768px) {
        .carrot-orange-clr{
            text-align: center;
        }
        .brdr-btm-of-txt {
            font-size: 16px !important;
            text-align: center;
        }

        .toggle {
            font-size: 16px;
        }
        .wrapper {
        padding: 10px 15px !important;
    }
        .custom_h1 {
            font-size: calc(2.4rem + 1vmin) !important;
        }

        .custom_P {
            font-size: 1.5rem;
        }

    }


    #loom-companion-mv3 #shadow-host-companion {
        padding: 0 !important;
    }
    .small_screen_carousel {
           
            max-height: 440px;
            min-height: 440px;
        }

        .small_screen_carousel2 {
       
            min-height: 440px !important;
            max-height: 440px !important;
        }
@media only screen and (min-width: 1350px){
    .small_screen_carousel {
           
           max-height: 540px;
           min-height: 540px;
       }

       .small_screen_carousel2 {
      
           min-height: 540px !important;
           max-height: 540px !important;
       }
}
    @media only screen and (min-width: 1650px) {
        .small_screen_carousel {
           
           max-height: 740px;
           min-height: 740px;
       }

       .small_screen_carousel2 {
      
           min-height: 740px !important;
           max-height: 740px !important;
       }
      
    }

    @media only screen and (min-width: 1800px) {
        .cont1domgdo_para {
            padding: 0px 30px !important;
        }

        .our_require_section {
            padding: 0px 45px !important;
        }

    }
</style>
{{-- @endsection --}}
@section('mainContent')
    <div class="row">
        <div class="col-md-12 px-0">
            @php
             $btn_title = auth()->check() ? '' : 'Apply Now';   
            @endphp
            <x-breadcrumb :title="'Apply Your Program and Courses Today'" :btnclass="'theme_btn small_btn2'" :btntitle="$btn_title" />
        </div>

    </div>

    <section id="apply" class="p-lg-5 p-3 pt-4">
        <div class="container-fluid">
            <div class="row justify-content-center text-center px-xl-4 px-md-3 hidden-left">
                <div class="col-md-12 our_require_section">
                    <h2 class="custom_small_heading heading mb-3 font-weight-bold">Welcome to Merkaii Xcellence Prep
                        Admissions</h2>
                    <p>At Merkaii Xcellence Prep, we are dedicated to nurturing the intellectual and
                        personal growth of our students. Our academic review courses, live lectures, and supportive
                        community are designed to help students reach their full potential.
                        Whether you're a passionate learner, an aspiring leader, or a creative thinker, we
                        invite you to join our vibrant and dynamic educational environment.
                    </p>
                       <br>
                    <p>
                    This page outlines the application requirements for prospective students. Please
                        carefully review the requirements listed below to ensure that you provide all the
                        necessary information and documentation.
                    </p>
                      <br>
                    <p>
                        Thank you for considering Merkaii Xcellence Prep as the community to help You
                        achieve licensure success in your healthcare educational journey.
                    </p>
                    
                </div>
                @guest
                <div class="col-md-12  text-center contact_btn mt-4">
                    <a href="{{ route('preRegistration') }}" class="theme_btn small_btn2 p-2">Apply Now</a>
                </div>
                @endguest
            </div>
        </div>
    </section>
    {{-- slider timeline --}}
    <div class="our-process-section-container slider-bg mt-3">
        <div class="our-process-section-wrapper px-sm-3 px-2 py-lg-5 py-3">
            <h2 class="custom_small_heading heading mb-3 font-weight-bold text-center">Embark on your healthcare education journey</h2>
            <div class="w-100 d-flex justify-content-start">
                <div class="our-process-section-part d-flex gap-5 w-50" data-aos="fade-right" data-aos-duration="1000">
                    <div class="padding-top-of-first-part ml_our_process">
                        {{-- <h5 class="custom_small_heading carrot-orange-clr text-center text-md-end mb-5 mb-md-0">Step 1</h5> --}}
                        <h5 class="w-100 text-md-end brdr-btm-of-txt fw-medium pb-3 mb-5 mb-md-0">Create an account</h5>
                        <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                            <p class="fw-light text-md-end mt-2 mt-md-0">Sign up for a free Merkaii Xcellence Prep account to explore
                                the vast course catalog and personalize your learning experience.</p>
                                <img src="{{ asset('public/assets/create-account.png') }}">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24">
                                <path fill="none" stroke="var(--system_primery_color)" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="m20 20l-4.05-4.05m0 0a7 7 0 1 0-9.9-9.9a7 7 0 0 0 9.9 9.9" />
                            </svg> --}}
                        </div>
                    </div>
                    <div class="side-bar-for-process-section">
                        <div class="dot-point-side-bar-of-process-section top-0">
                            <div class="inner-end-point-of-bar"></div>
                        </div>
                        <div class="dot-point-side-bar-of-process-section top-of-2">
                            <div class="inner-white-point-of-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="our-process-section-part d-flex flex-row-reverse gap-5 w-50" data-aos="fade-left"
                    data-aos-duration="1000">
                    <div class="d-flex flex-column align-items-start mr_our_process">
                        {{-- <h5 class="custom_small_heading carrot-orange-clr mb-5 mb-md-0">Step 2</h5> --}}
                        <h5 class="w-100 brdr-btm-of-txt fw-medium pb-3 mb-5 mb-md-0">Complete a quick application</h5>
                        <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                            <img src="{{ asset('public/assets/application.png') }}">
                          
                            <p class="fw-light mt-2 mt-sm-0">Navigate to the application page and fill out 
                                the required information, the process is simple and helps us understand your 
                                background and goals.</p>
                        </div>
                    </div>
                    <div class="side-bar-for-process-section margin-left-minus-10">
                        <div class="dot-point-side-bar-of-process-section top-1">
                            <div class="inner-white-point-of-bar"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="">
                <div class="our-process-section-part d-flex gap-5 w-50" data-aos="fade-right" data-aos-duration="1000">
                    <div class="d-flex flex-column align-items-end ml_our_process">
                        {{-- <h5 class="custom_small_heading carrot-orange-clr mb-5 mb-md-0">Step 3</h5> --}}
                        <h5 class="w-100 text-md-end brdr-btm-of-txt fw-medium pb-3 mb-5 mb-md-0">Find your Perfect Course</h5>
                        <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                            <p class="fw-light text-md-end mt-2 mt-md-0">After submitting your application, browse our 
                                comprehensive course library and purchase your chosen course or program that 
                                aligns with your aspirations using our secure payment gateway.</p>
                                <img src="{{ asset('public/assets/perfect-course.png') }}">
                            
                        </div>
                    </div>
                    <div class="side-bar-for-process-section">
                        <div class="dot-point-side-bar-of-process-section top-1">
                            <div class="inner-white-point-of-bar"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="our-process-section-part d-flex flex-row-reverse gap-5 w-50" data-aos="fade-left"
                    data-aos-duration="1000">
                    <div class="d-flex flex-column padding-btm-last-part mr_our_process">
                        {{-- <h2 class="custom_small_heading carrot-orange-clr mb-5 mb-md-0">Step 4</h2> --}}
                        <h5 class="w-100 brdr-btm-of-txt fw-medium pb-3 mb-5 mb-md-0">Enroll and get started</h5>
                        <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                            <img src="{{ asset('public/assets/enroll.png') }}">
                           
                            <p class="fw-light mt-2 mt-md-0">Once purchase is complete, you have immediate 
                                access to all the learning materials. Get ready to gain valuable knowledge and 
                                advance your healthcare career. Welcome aboard!</p>
                        </div>
                    </div>
                    <div class="side-bar-for-process-section margin-left-minus-10">
                        <div class="dot-point-side-bar-of-process-section top-1">
                            <div class="inner-white-point-of-bar"></div>
                        </div>
                        <div class="dot-point-side-bar-of-process-section bottom-0">
                            <div class="inner-end-point-of-bar"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <section id="choose">
        <div class="container text-center">
            <h2 class="heading font-weight-bold">Application Timeline</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 p-3 d-flex">
                    <div class="card custom_border rounded-card d-flex">
                        <div class="card-body  d-flex flex-column">


                            <div class="icon-1">
                                <img src="https://merakinursing.education/public/frontend/homenew/images/icon-hardware.svg"
                                    width="75px" alt="">
                            </div>
                            <div class="txt">
                                <h4 class="my-3">Application Period:</h4>

                            </div>
                            <div class="para mt-auto">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas blanditiis quia
                                    veritatis
                                    nihil excepturi iure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-3 d-flex">
                    <div class="card custom_border rounded-card d-flex">
                        <div class="card-body  d-flex flex-column">


                            <div class="icon-1">
                                <img src="https://merakinursing.education/public/frontend/homenew/images/icon-innovation.svg"
                                    width="75px" alt="">
                            </div>
                            <div class="txt">
                                <h4 class="my-3">Review and Evaluation Period:</h4>


                            </div>
                            <div class="para mt-auto">
                                <p>Accusantium veritatis delectus aliquam itaque illum odit similique numquam dolorem
                                    doloremque
                                    impedit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-3 d-flex">
                    <div class="card custom_border rounded-card">
                        <div class="card-body  d-flex flex-column">


                            <div class="icon-1">
                                <img src="{{ asset('public/assets/icon-reliable.svg') }}" width="75px" alt="">
                            </div>
                            <div class="txt">
                                <h4 class="my-3">Notification of Decision:</h4>

                            </div>
                            <div class="para mt-auto">
                                <p>Optio reiciendis minima sunt debitis ea reprehenderit, ipsa et dolores nihil animi maxime
                                    rem
                                    labore, debitis modi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 p-3 d-flex">
                    <div class="card custom_border rounded-card">
                        <div class="card-body  d-flex flex-column">


                            <div class="icon-1">
                                <img src="https://merakinursing.education/public/frontend/homenew/images/icon-secure.svg"
                                    width="75px" alt="">
                            </div>
                            <div class="txt">
                                <h4 class="my-3"> Registration Period:</h4>

                            </div>
                            <div class="para mt-auto">
                                <p>Facere similique quisquam tempora soluta, molestias quis dolorum tempore eum quidem ipsa
                                    ratione at commodi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section> --}}
    <div class="featured-carousel owl-carousel m-md-0 app_require mb-3">
        {{-- <div class="col-md-12 col-12 cont1doimgdo p-0"> --}}
        @foreach ($slider as $slide)
        <div class="d-flex h-100">
            <div class="col-sm-6 py-3 small_screen_carousel" style="background-color:{{$slide->color}}">
                <div class="pt-sm-4 mx-md-5 mx-3 cont1domgdo_para">
                    <h5 class="slider_heading_h1 font-weight-bold px-0 px-lg-5 px-sm-3 text-white">
                        {{ $slide->title }}
                    </h5>
                    <p class="px-0 px-lg-5 px-sm-3 slider_paragraph text-white">
                        {{ $slide->text }}
                    </p>
                    
                    {{-- <a href="" class="px-0 px-lg-5 px-sm-3 mt-2"><button class="theme_btn">{{ $slide->button}}</button></a> --}}
                </div>
            </div>
            <div class="col-sm-6 d-flex justify-content-center align-items-center p-0 small_screen_carousel2">
                <img src="{{ asset($slide->image) }}" class="d-block img-fluid slider_img1 h-100 w-100">
            </div>
        </div>
        @endforeach
        {{-- </div> --}}
    </div>

    <div class="row justify-content-center pt-lg-5 pt-4">
        <div class="col-12 col-md-7 text-center text-lg-left">
            <h2 class="custom_small_heading heading font-weight-bold text-capitalize text-center mb-0 px-4 px-md-0">Required Application Documents for FL Approved Remedial Program</h2>
        </div>
        <div class="col-md-7 col-10 mt-3">
            <div class="boxaccordion mt-2">
                <div class="containerwidth">
                    <div class="wrapper">
                        <button class="toggle">Complete Main Application<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>hduahdu</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Signed Enrollment Acknowledgement Declaration form<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>The 10-panel drug test screens for the five of the most frequently misused prescription
                                drugs
                                in the United States.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Letter from Board of Nursing<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Copy of Driver’s License / SS# Card<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p> Professionally - Who You are and why Nursing.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Current Physical Exam (less than 1-Year)<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Proof of Vaccinations – MMR (Titer), Tetanus, Tdap, Varicella<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Proof of Hepatitis B or Decline Waiver Form<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">10 Panel Drug Test<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">Current PPD Results<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper">
                        <button class="toggle">BLS or CPR Card<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="wrapper mb-lg-5 mb-3">
                        <button class="toggle">Proof of Health Insurance for Clinical<i class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>Professional Trade License for Entrance in BSN program.</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h2 class="custom_small_heading heading text-center font-weight-bold mb-0">Most
                            Asked Questions
                        </h2>
                    </div>
                    @foreach ($faqs as $thisfaq)
                    <div class="wrapper">
                        <button class="toggle">{{$thisfaq->question}}<i
                                class="fas fa-plus icon"></i></button>
                        <div class="content">
                            <p>{!! strip_tags($thisfaq->answer) !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
<div class="container-fluid p-0 mt-md-4 mt-2" style="background-color: #eee;">
        <div class="row mb-md-5 mb-4 justify-content-center px-4 px-sm-5 px-md-0">
            <div class="col-md-9 py-lg-5 px-lg-5 py-3">
                <div class="custom_fs_a d-flex justify-content-center align-items-start mx-lg-0 px-sm-4 px-md-0" style="gap: 10px;">
                    <h2 class="custom_small_heading text-center font-weight-bold avail-ser mb-0">FOCUSED LEARNING + DISCIPLINE + CONSISTENCY <br> = GOALS ACHIEVED
                    </h2>
                    <div class="contact_btn text-center">
                        <a href="{{ route('register') }}"class="theme_btn small_btn2 p-2">Apply Now </a>
                    </div>
            </div>
        </div>
    </div>
</div>


    @include(theme('partials._custom_footer'))
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  {{-- first section --}}
  <script>
         const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                console.log(entry)
                if (entry.isIntersecting) {
                    entry.target.classList.add('text-show');

                } else {
                    entry.target.classList.remove('text-show');
                }
            });
        });
        const hiddenElements = document.querySelectorAll('.hidden-left');
        hiddenElements.forEach((el) => observer.observe(el));
        document.addEventListener('DOMContentLoaded', function() {
            const options = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            };})
    </script>

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
                    autoplayTimeout: 8000,
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


        //<![CDATA[
        let toggles = document.getElementsByClassName("toggle");
        let contentDiv = document.getElementsByClassName("content");
        let icons = document.getElementsByClassName("icon");

        for (let i = 0; i < toggles.length; i++) {
            toggles[i].addEventListener("click", () => {

                if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                    contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                    toggles[i].style.color = "#996699";
                    icons[i].classList.remove("fa-plus");
                    console.log(icons[i]);
                    icons[i].classList.add("fa-minus");
                } else {
                    contentDiv[i].style.height = "0px";
                    toggles[i].style.color = "#111130";
                    icons[i].classList.remove("fa-minus");
                    icons[i].classList.add("fa-plus");
                }

                for (let j = 0; j < contentDiv.length; j++) {
                    if (j !== i) {
                        contentDiv[j].style.height = 0;
                        toggles[j].style.color = "#111130";
                        icons[j].classList.remove("fa-minus");
                        icons[j].classList.add("fa-plus");
                    }
                }
            });
        }
        //]]>
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
