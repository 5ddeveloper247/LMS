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

    /* .small_gap img{
        height: 35px;
        width: 35px;
    } */
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

        /* .small_gap {
            position: relative;
        }

        .small_gap img {
            width: 20px !important;
            height: 20px !important;
            position: absolute;
            top: -28px;
            left: 50%;
            transform: translateX(-50%);
        } */

        /* .ml_our_process {
            margin-left: 20px;
        }

        .mr_our_process {
            margin-right: 20px;
        } */
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
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="var(--system_primery_color)" width="50px"
                                height="50px" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M47.1,2H2.9C1.3,2,0,3.3,0,4.9V35C0,36.7,1.3,38,2.9,38h16.6l-0.8,4.2h-3.4c-1,0-1.9,0.8-1.9,1.9v2.1c0,1,0.8,1.9,1.9,1.9  h19.6c1,0,1.9-0.8,1.9-1.9V44c0-1-0.8-1.9-1.9-1.9h-3.4L30.5,38h16.6c1.6,0,2.9-1.3,2.9-2.9V4.9C50,3.3,48.7,2,47.1,2z M2.9,3.7  h44.2c0.7,0,1.3,0.6,1.3,1.3v26.3H1.7V4.9C1.7,4.2,2.2,3.7,2.9,3.7z M35,44v2.1c0,0.1-0.1,0.2-0.2,0.2H15.2c-0.1,0-0.2-0.1-0.2-0.2  V44c0-0.1,0.1-0.2,0.2-0.2h19.6C34.9,43.8,35,43.9,35,44z M29.7,42.1h-9.3l0.8-4.2h7.6L29.7,42.1z M47.1,36.3H2.9  c-0.7,0-1.3-0.6-1.3-1.3v-2.1h46.7V35C48.3,35.7,47.8,36.3,47.1,36.3z">
                                    </path>
                                    <path
                                        d="M8.3,26.3h10.4c1.3,2,3.6,3.3,6.2,3.3s4.9-1.3,6.2-3.3h10.4c0.5,0,0.8-0.4,0.8-0.8V6.2c0-0.5-0.4-0.8-0.8-0.8H27.5  c-1,0-1.9,0.4-2.5,1.1c-0.6-0.7-1.5-1.1-2.5-1.1H8.3c-0.5,0-0.8,0.4-0.8,0.8v19.2C7.5,25.9,7.9,26.3,8.3,26.3z M25,27.9  c-3.2,0-5.8-2.6-5.8-5.9s2.6-5.9,5.8-5.9s5.8,2.6,5.8,5.9S28.2,27.9,25,27.9z M27.5,7h13.3v17.6h-8.8c0.3-0.8,0.4-1.6,0.4-2.5  c0-3.9-2.9-7.1-6.7-7.5V8.7C25.8,7.8,26.6,7,27.5,7z M9.2,7h13.3c0.9,0,1.7,0.8,1.7,1.7v5.9c-3.7,0.4-6.7,3.6-6.7,7.5  c0,0.9,0.2,1.7,0.4,2.5H9.2V7z">
                                    </path>
                                    <path
                                        d="M30,9.5h8.3c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8H30c-0.5,0-0.8,0.4-0.8,0.8S29.5,9.5,30,9.5z">
                                    </path>
                                    <path
                                        d="M28.3,12h10c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8h-10c-0.5,0-0.8,0.4-0.8,0.8S27.9,12,28.3,12z">
                                    </path>
                                    <path
                                        d="M28.3,14.5h10c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8h-10c-0.5,0-0.8,0.4-0.8,0.8S27.9,14.5,28.3,14.5z">
                                    </path>
                                    <path
                                        d="M38.3,15.4h-5.8c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h5.8c0.5,0,0.8-0.4,0.8-0.8S38.8,15.4,38.3,15.4z">
                                    </path>
                                    <path
                                        d="M38.3,17.9h-4.2c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h4.2c0.5,0,0.8-0.4,0.8-0.8S38.8,17.9,38.3,17.9z">
                                    </path>
                                    <path
                                        d="M38.3,20.4h-4.2c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h4.2c0.5,0,0.8-0.4,0.8-0.8S38.8,20.4,38.3,20.4z">
                                    </path>
                                    <path
                                        d="M11.7,9.5H20c0.5,0,0.8-0.4,0.8-0.8S20.5,7.9,20,7.9h-8.3c-0.5,0-0.8,0.4-0.8,0.8S11.2,9.5,11.7,9.5z">
                                    </path>
                                    <path
                                        d="M11.7,12h10c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8h-10c-0.5,0-0.8,0.4-0.8,0.8S11.2,12,11.7,12z">
                                    </path>
                                    <path
                                        d="M11.7,14.5h10c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8h-10c-0.5,0-0.8,0.4-0.8,0.8S11.2,14.5,11.7,14.5z">
                                    </path>
                                    <path
                                        d="M11.7,17.1h5.8c0.5,0,0.8-0.4,0.8-0.8s-0.4-0.8-0.8-0.8h-5.8c-0.5,0-0.8,0.4-0.8,0.8S11.2,17.1,11.7,17.1z">
                                    </path>
                                    <path
                                        d="M15.8,17.9h-4.2c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h4.2c0.5,0,0.8-0.4,0.8-0.8S16.3,17.9,15.8,17.9z">
                                    </path>
                                    <path
                                        d="M15.8,20.4h-4.2c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h4.2c0.5,0,0.8-0.4,0.8-0.8S16.3,20.4,15.8,20.4z">
                                    </path>
                                    <path
                                        d="M28.7,21.3L22.9,18c-0.3-0.1-0.6-0.1-0.8,0c-0.3,0.1-0.4,0.4-0.4,0.7v6.7c0,0.3,0.2,0.6,0.4,0.7c0.1,0.1,0.3,0.1,0.4,0.1  c0.1,0,0.3,0,0.4-0.1l5.8-3.3c0.3-0.1,0.4-0.4,0.4-0.7S29,21.5,28.7,21.3z M23.3,24v-3.8l3.3,1.9L23.3,24z">
                                    </path>
                                    <path
                                        d="M30,33.8H20c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8h10c0.5,0,0.8-0.4,0.8-0.8C30.8,34.2,30.5,33.8,30,33.8z">
                                    </path>
                                    <path
                                        d="M39.2,33.8h-5c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8h5c0.5,0,0.8-0.4,0.8-0.8C40,34.2,39.6,33.8,39.2,33.8z">
                                    </path>
                                    <path
                                        d="M15.8,33.8h-5c-0.5,0-0.8,0.4-0.8,0.8c0,0.5,0.4,0.8,0.8,0.8h5c0.5,0,0.8-0.4,0.8-0.8C16.7,34.2,16.3,33.8,15.8,33.8z">
                                    </path>
                                </g>
                            </svg> --}}
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
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="var(--system_primery_color)" width="50px"
                                height="50px" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                xml:space="preserve">
                                <g>
                                    <path
                                        d="M21.5,0c-1.9,0-3.5,1.2-4.2,2.8h-5c-0.6,0-1.2,0.5-1.2,1.1v1.7H6.5C4.6,5.7,3,7.2,3,9.1v37.5C3,48.5,4.6,50,6.5,50h25.5  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H6.5c-0.7,0-1.2-0.5-1.2-1.1V9.1C5.3,8.4,5.8,8,6.5,8h4.6v1.7H8.2  c0,0-0.1,0-0.1,0c-0.6,0.1-1.1,0.5-1,1.1v34.1c0,0.6,0.5,1.1,1.2,1.1h26.6c0.6,0,1.2-0.5,1.2-1.1V38c0.2,0,0.4,0,0.6,0  c0.4,0,0.8,0,1.2-0.1v8.6c0,0.6-0.5,1.1-1.2,1.1c-0.6,0-1.2,0.5-1.2,1.1c0,0.6,0.5,1.1,1.1,1.2c0,0,0,0,0,0c1.9,0,3.5-1.5,3.5-3.4  v-9.1c0.1,0,0.3-0.1,0.4-0.1l4.4,7c0.3,0.5,1.1,0.7,1.6,0.4c0.5-0.3,0.7-1,0.4-1.6l0,0l-4.3-6.9c2.7-1.8,4.5-4.9,4.5-8.4  c0-4.4-2.9-8.2-6.9-9.6V9.1c0-1.9-1.6-3.4-3.5-3.4h-4.6V4c0-0.6-0.5-1.1-1.2-1.1h-5C25,1.2,23.4,0,21.5,0z M21.5,2.3  c1.2,0,2.1,0.8,2.3,1.9c0.1,0.5,0.6,0.9,1.1,0.9h4.7v4.5H13.4V5.1h4.7c0.6,0,1-0.4,1.1-0.9C19.4,3.1,20.4,2.3,21.5,2.3z M31.9,8  h4.6c0.7,0,1.2,0.5,1.2,1.1v8.6c-0.4,0-0.8-0.1-1.2-0.1c-0.2,0-0.4,0-0.6,0v-6.9c0-0.6-0.5-1.1-1.2-1.1h-2.9V8z M9.4,11.9h24.3V18  c-4.3,1.2-7.5,5.2-7.5,9.8s3.2,8.6,7.5,9.8v6.1H9.4V11.9z M12.7,17.6c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1h12.7  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H12.8C12.8,17.6,12.8,17.6,12.7,17.6z M36.6,19.9c4.5,0,8.1,3.5,8.1,8  s-3.6,8-8.1,8s-8.1-3.5-8.1-8S32.1,19.9,36.6,19.9z M12.7,23.3c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1c0,0,0,0,0,0h9.3  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0h-9.3C12.8,23.3,12.8,23.3,12.7,23.3z M12.7,29c-0.6,0-1.1,0.6-1.1,1.2  c0,0.6,0.6,1.1,1.2,1.1h9.3c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0h-9.3C12.8,29,12.8,29,12.7,29z M12.7,34.7  c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1h12.7c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H12.8  C12.8,34.7,12.8,34.7,12.7,34.7z">
                                    </path>
                                </g>
                            </svg> --}}
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
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                fill="var(--system_primery_color)" x="0px" y="0px" viewBox="0 0 50 48"
                                style="enable-background:new 0 0 50 48;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M37.7,0.2c-0.3-0.3-0.8-0.3-1.1,0c0,0,0,0,0,0L20,16.9h2.2l14.9-15l2.4,2.4L27,16.9h2.2L40.7,5.4l7.5,7.5l-4,4h2.2l3.4-3.4  c0.3-0.3,0.3-0.8,0-1.1c0,0,0,0,0,0L37.7,0.2z">
                                    </path>
                                    <path
                                        d="M48.7,18.8c-0.1-0.2-0.4-0.3-0.6-0.3H13.7c-0.4,0-0.8,0.4-0.8,0.8c0,0.1,0,0.1,0,0.2l4.6,18.9c0.1,0.4,0.4,0.6,0.8,0.6  h25.1c0.4,0,0.7-0.2,0.8-0.6l4.6-18.9C48.9,19.2,48.8,19,48.7,18.8z M22.7,25.6h16.4c0.4,0,0.8,0.4,0.8,0.8s-0.3,0.8-0.8,0.8H22.7  c-0.4,0-0.8-0.4-0.8-0.8S22.2,25.6,22.7,25.6z M41.2,31.1H20.5c-0.4,0-0.8-0.4-0.8-0.8c0-0.4,0.3-0.8,0.8-0.8h20.7  c0.4,0,0.8,0.4,0.8,0.8C42,30.7,41.7,31.1,41.2,31.1z">
                                    </path>
                                    <path
                                        d="M41.9,41.3c0-0.4-0.3-0.8-0.8-0.8H16.2L9.3,13C8.7,10.5,6.1,9,3.6,9.6C1.5,10.1,0,12,0,14.2V15c0,0.4,0.3,0.8,0.8,0.8  s0.8-0.4,0.8-0.8v-0.8C1.6,12.4,3,11,4.7,11c1.5,0,2.7,1,3.1,2.4l7,28.1c0.1,0.3,0.4,0.6,0.7,0.6h25.5  C41.5,42.1,41.9,41.7,41.9,41.3L41.9,41.3z">
                                    </path>
                                    <path
                                        d="M20.3,48c1.3,0,2.3-1.1,2.3-2.4c0-1.3-1-2.4-2.3-2.4S18,44.3,18,45.6C18,46.9,19,48,20.3,48z M20.3,44.9  c0.4,0,0.8,0.4,0.8,0.8s-0.3,0.8-0.8,0.8s-0.8-0.4-0.8-0.8S19.9,44.9,20.3,44.9z">
                                    </path>
                                    <path
                                        d="M35.9,43.3c-1.3,0-2.3,1.1-2.3,2.4c0,1.3,1,2.4,2.3,2.4s2.3-1.1,2.3-2.4C38.3,44.3,37.2,43.3,35.9,43.3z M35.9,46.4  c-0.4,0-0.8-0.4-0.8-0.8s0.3-0.8,0.8-0.8s0.8,0.4,0.8,0.8S36.4,46.4,35.9,46.4z">
                                    </path>
                                </g>
                            </svg> --}}
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
                    <h5 class="slider_heading_h1 font-weight-bold pt-sm-5 px-0 px-lg-5 px-sm-3 text-white">
                        {{ $slide->title }}
                    </h5>
                    <p class=" px-0 px-lg-5 px-sm-3 slider_paragraph text-white">
                        {{ $slide->text }}
                    </p>
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
            <h2 class="custom_small_heading heading font-weight-bold text-capitalize text-center mb-0 px-4 px-md-0">required application documents for remedial</h2>
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
            <div class="col-md-7 py-lg-5 px-lg-0 py-3">
                <div class="custom_fs_a d-flex justify-content-between align-items-start mx-lg-0 px-sm-4 px-md-0" style="gap: 10px;">
                    <h2 class="custom_small_heading text-center font-weight-bold avail-ser mb-0">FOCUSED LEARNING + DISCIPLINE - GOALS ACHIEVED
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
