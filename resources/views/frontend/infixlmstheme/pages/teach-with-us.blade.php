@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Teach With Us') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- slider-timeline --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }
    .modal.fade.show {
        background: rgba(3, 3, 3, 0.7) !important;
    }

    .custom_span_color {
        color: #ff7600;
    }

    .title_des {
        font-size: 22px;
        dmasnm
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    li {
        list-style-type: disclosure-closed !important;
    }

    .rounded-card {
        border-radius: 25px !important;
    }

    .rounded-card-header {
        border-radius: 25px !important;
    }

    .rounded-card-img {
        border-top-left-radius: 25px !important;
        border-top-right-radius: 25px !important;
    }

    .section-margin-y {
        margin: 60px auto !important;
    }

    .btn_responsive {
        font-size: 21px !important;
    }

    .btn_responsive:hover {
        background-color: var(--system_primery_color) !important;
        border-color: var(--system_primery_color) !important;
        transition: 0.3s ease !important;
    }

    .form_label span {
        color: red !important;
        display: inline !important;
    }

    .hit {
        font-size: 12.5px;
        border-radius: 16px;
        font-weight: 700;
        border: 2px solid #dee2e6;
    }

    .hit:hover {
        background-color: white !important;
        color: #000 !important;
        border-color: white !important;
    }

    .price-card__price--v2 {
        color: #1a0027;
        font-size: 40px;
        font-weight: 600;
        line-height: 40px;
        text-align: center;
    }

    .pricing__text--14 {
        color: #0d1216;
        text-align: center;
        font-size: 14px;
        line-height: 22px;
    }

    .button-tb.button-tb--cta.is--pricing {
        width: 80%;
        height: 50px;
        background-size: 2.1rem 2.1rem;
        display: flex;
    }


    .button-tb.button-tb--cta {
        color: #fff;
        text-transform: none;
        white-space: nowrap;
        background-color: #996699;
        background-image: url("{{ asset('public/frontend/infixlmstheme/img/images/6446624444e808612b7591de_jasper-button-arrow.svg') }}");
        background-position: 7px;
        background-repeat: no-repeat;
        background-size: 1.875rem 1.875rem;
        border-color: #996699;
        padding-left: 47px;
        font-weight: 500;
        overflow: visible;
        box-shadow: 0 7px 29px rgba(0, 0, 0, .2);
        transition: .4s ease-in-out;
    }

    .button-tb {
        width: auto;
        min-height: 43px;
        color: #000;
        text-align: center;
        cursor: pointer;
        background-color: transparent;
        border: 1px solid #996699;
        border-radius: 500px;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 12.5px 24px;
        font-family: Avantt, sans-serif;
        font-size: 18px;
        font-weight: 500;
        line-height: 1.05;
        transition: all .3s;
        display: block;
    }

    .price-card__small-text {
        color: rgba(13, 18, 22, .86);
        font-size: 14px;
        font-weight: 700;
        line-height: 22px;
    }

    .pricing__text--12 {
        color: #0d1216;
        border-bottom: 1px #d4dce5;
        margin-top: 0;
        margin-bottom: 0;
        padding-bottom: 0;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.5em;
    }

    .feature {
        width: 100%;
        height: 40px;
        color: #fff;
        text-align: left;
        align-items: center;
        padding-top: 12px;
        padding-bottom: 12px;
        font-size: 14px;
        display: flex;
        position: relative;
    }

    .feature-icon {
        width: 16px;
        height: 16px;
        margin-top: 4px;
        margin-bottom: 4px;
        margin-right: 16px;
    }

    .custom_card_plan {

        width: 100%;
        max-width: 352px;
        padding: 0px 10px;
        border-radius: 25px !important;

    }

    .button-tb.button-tb--cta:hover {
        background-position: top 50% right 7px;
    }

    .button-tb.button-tb--cta:hover {
        background-position: 97%;
        padding-left: 24px;
        padding-right: 47px;
    }

    .pricing-per-mo.top-align {
        align-self: flex-start;
    }

    .pricing-per-mo {
        color: #1a0027;
        align-self: flex-end;
        font-weight: 600;
    }

    .pricing-per-mo {
        color: #1a0027;
        align-self: flex-end;
        font-weight: 600;
    }

    .button-tb.button-tb--cta.button-tb--blue {
        background-color: #0079a8;
        border-color: #0079a8;
    }

    .button-tb--orange {
        background-color: var(--system_primery_color) !important;
        border-color: #ff7600 !important;
    }

    .custom_border_radius {
        border-radius: 40px !important;
    }

    .nav-pills .nav-link.active {
        background-color: var(--system_primery_color) !important;
        border-color: #ff7600 !important;
        color: #fff !important;
    }

    .heading_1_color {
        color: #996699 !important;
    }

    .heading_2_color {
        color: #0079a8 !important;
    }

    .heading_3_color {
        color: #ff7600 !important;
    }

    .btn_custom_border {
        border: 1px solid #ff7600 !important;
        color: #ff7600 !important;
    }

    .section_custom_border {
        border: 1px solid #ff7600 !important;
    }

    .gap-40 {
        grid-gap: 40px !important;
    }

    .custom_shadow {
        box-shadow: 0px 20px 13px -27px !important;
    }

    .custom_height_1 {
        height: 71vh !important;
        border-radius: 25px;
    }

    .custom_height_2 {
        height: 56vh !important;
    }
    .custom-heading {
        font-size: 60px;
    }

    .custom-padding {
        padding: 0 10px;
    }

    .custom-b-padd {
        padding: 0px 40px !important;
    }
    /* .custom-b-padd1 {
        padding: 0px 40px !important;
    } */
    .custom-img {
        object-fit: none;
    }

    .custom-padd {
        padding: 30px 0;
    }

    /* slider timeline */
    .fw-medium {
        font-weight: 500;
    }

    .carrot-orange-clr {
        color: var(--system_primery_color);
    }

    .bg {
        background-color: #b2dfcc;
    }

    .brdr-btm-of-txt {
        border-bottom: 1px solid#9fcdb9;
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
        margin-right: 50px;
    }

    .ml_our_process {
        margin-left: 50px;
    }

    /* slider timeline-end */
    .custom_height_1 {
        height: 71vh !important;
    }
  
@media only screen and (max-width: 576px){
    .mr_our_process {
            margin-right: 0px !important;
        }

        .ml_our_process {
            margin-left: 0px !important;
        }
        .small_gap {
            gap: .2rem;
        }

        .carrot-orange-clr,
        .brdr-btm-of-txt {
            display: flex;
            justify-content: center;
            margin: auto;
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
}
    @media only screen and (max-width: 767px) {
        .text_small{
            font-size: 13px;
        }
        .form_label{
            font-size: 14px !important;
        }
        .custom_height_2 {
            height: 44vh !important;
        }
        .custom_heading_1 {
            font-size: 20px;
        }

        .thumb {
            height: auto;
        }
        .small_gap{
            position: relative;
        }
        svg {
            min-width: 20px;
            min-height: 20px;
            max-width: 20px;
            position: absolute;
            top: -28px;
            left: 50%;
            transform: translateX(-50%);
        }

        .ml_our_process {
            margin-left: 50px;
        }

        .mr_our_process {
            margin-right: 50px;
        }
        .brdr-btm-of-txt{
            font-size: 16px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
        .button-tb {
            font-size: 15px !important;
            padding: 6.5px 15px;
        }
        .pricing__text--12 {
            font-size: 11px !important;
        }

        .button-tb.button-tb--cta.is--pricing {
            height: 45px;
        }

        /* .custom_height_2 {
            height: 35vh !important;
        } */
    }

    .pricing-para {
        min-height: 10vh;
    }

    @media only screen and (min-width: 1650px) {
        .hit {
            font-size: 18px !important;
            border-radius: 20px !important;
        }

        .our-process-section-container {
            display: flex !important;
            justify-content: center !important;
        }

        .pricing-para {
            min-height: 8vh;
        }

        .our-process-section-wrapper {
            width: 96% !important;
        }

    }


    @media only screen and (min-width: 1800px) {
        .custom-b-padd {
            padding: 0px 30px !important;
        }
        .custom-b-padd1 {
        padding: 0px 0px !important;
    }
        .modal_form {
            max-width: 1500px !important;
        }

        .our-process-section-container {
            display: flex;
            justify-content: center;
        }

        .our-process-section-wrapper {
            width: 90%;
        }

        p {
            font-size: 20px !important;
        }

        h5 {
            font-size: 25px !important;
        }

        .thumb-height {
            height: 400px;
        }

        .custom-img {
            object-fit: cover;
        }

        .pricing__text--12 {
            font-size: 16px;
        }
    }

</style>
@section('mainContent')
    {{-- @dd($courses) --}}
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12 px-0">
                {{-- <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 img-cover"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h2 class="text-white custom-heading">Teach With Us</h2>
                            @if (!auth()->check())
                                <button class="hit ml-1 bg-transparent px-2 px-md-4 py-2 text-white openModal">Sell
                                    With Us
                                </button>
                            @endif
                        </div>
                    </div>
                </div> --}}
                @php
                    $banner_title = 'Teach With Us';
                    $banner_image = 'public/frontend/infixlmstheme/img/images/courses-4.jpg';
                    $btn_title = auth()->check() ? '' : 'Sell With Us';
                @endphp
                <x-breadcrumb :banner="$banner_image" :title="$banner_title" :btntitle="$btn_title" :btnclass="'hit openModal'" />
            </div>
        </div>
        <div class="container px-lg-5">

            <div class="row py-md-5 px-xl-5 py-4">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_heading_1 mb-md-5 mb-3">What We Offer!</h2>
                </div>
                <div class="col-md-6 col-12 px-2" data-aos="fade-right">
                    <img src="{{ asset('public/assets/contact.jpg') }}" class="custom_height_1 w-100">
                </div>

                <div class="col-md-6 col-12 my-auto px-3 px-md-1" data-aos="fade-left"
                    data-aos-delay="500">
                    <div class="px-xl-3 pt-4 pt-md-0">
                        <h2 class="custom_small_heading font-weight-bold">
                            How to Sell as an Individual Tutors
                        </h2>
                        <p class="custom_height_2 overflow-auto text-justify hide-scrollbar">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat neque rem
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, consequuntur, voluptatem
                            sequi optio iste molestias nihil sed dicta dignissimos fugiat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <x-about-page-gallery :about="$about" /> -->
        {{-- custom component made by arsam --}}
        <div class="about_gallery_area px-md-5 pb-3 pb-md-5">
            <div class="container px-lg-5">
                <div class="row align-items-center gallery_area_row">
                    <div class="col-lg-5 col-md-7">
                        <div class="section__title">
                            <h2 class="custom_small_heading mb-4 font-weight-bold">Build your own library for your career and personal growth.
                            </h2>
                            <p class="mb-4">Our goal is to learn the next generation of creative professionals for a
                                future in any industry. We offer course in most demanded industries. Whether begin to your
                                journey on our courses website or choose the flexibility of video learning our courses are
                                designed to help you along your path.</p>
                            <div class="d-flex align-items-center my-lg-4"><img
                                    src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}">
                                <div class="d-flex flex-column px-md-2 px-xl-5">
                                    <h5>App-Based Learning</h5>
                                    <p class="pt-3">Our goal is to learn the next generation of creative professionals for
                                        a future in any industry.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center my-lg-4"><img
                                    src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}">
                                <div class="d-flex flex-column px-md-2 px-xl-5">
                                    <h5>App-Based Learning</h5>
                                    <p class="pt-3">Our goal is to learn the next generation of creative professionals for
                                        a future in any industry.</p>
                                </div>
                            </div>
                            {{-- <div class="d-flex pt-3"><button type="submit" class="btn small_btn4 theme_btn">More
                                    About</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-5 mt-3 mt-md-0">
                        <div class="about_gallery">
                            <div class="gallery_box">
                                <div class="thumb">
                                    <img class="w-100"
                                        src="https://www.mchnursing.com/lms/public/frontend/infixlmstheme/img/about/3.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="gallery_box">
                                <div class="thumb">
                                    <img class="w-100"
                                        src="https://www.mchnursing.com/lms/public/frontend/infixlmstheme/img/about/1.jpg"
                                        alt="">
                                </div>
                                <div class="thumb small_thumb">
                                    <img class="w-100"
                                        src="https://www.mchnursing.com/lms/public/frontend/infixlmstheme/img/about/2.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- custom component emd by arsam --}}
        <div class="container custom-b-padd d-none">
            <div class="row mx-md-4">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_heading_1 my-4">Why Choose Us!</h2>
                </div>
                <div class="col-md-3">
                    <div class="align-items-center d-flex flex-column">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}"
                            class="img-fluid" style="width: 100px;">
                        <h5 class="font-weight-bold text-center">Teach your way</h5>
                        <p class="text-center" style="max-width: 20rem;">Publish the course you want, in the way you
                            want, and always have control of your own content.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="align-items-center d-flex flex-column">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-get-rewarded-v3.jpg') }}"
                            class="img-fluid" style="width: 100px;">
                        <h5 class="font-weight-bold text-center">Inspire learners</h5>
                        <p class="text-center" style="max-width: 21rem;">Teach what you know and help learners explore
                            their interests, gain new skills, and advance their careers.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="align-items-center d-flex flex-column">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-inspire-v3.jpg') }}"
                            class="img-fluid" style="width: 100px;">
                        <h5 class="font-weight-bold text-center">Get rewarded</h5>
                        <p class="text-center" style="max-width: 21rem;">Expand your professional network, build your
                            expertise, and earn money on each paid enrollment.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="align-items-center d-flex flex-column">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}"
                            class="img-fluid" style="width: 100px;">
                        <h5 class="font-weight-bold text-center">Teach your way</h5>
                        <p class="text-center" style="max-width: 20rem;">Publish the course you want, in the way you
                            want, and always have control of your own content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom_section_backround_color d-none" style="padding: 40px 0">
            <div class="container">
                <div class="row justify-content-center mx-md-4 custom-padding">
                    <div class="col-12 ">
                        <div class="card custom_border_radius border-0 shadow p-5">
                            <div class="row justify-content-center py-4">
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex gap_10">
                                        <div class="my-auto">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}"
                                                class="img-fluid" style="width: 100px;">
                                        </div>
                                        <div class="my-auto">
                                            <h5 class="font-weight-bold">
                                                +100 Individual Tutors
                                            </h5>
                                            <p>Publish the course you want,
                                                and always have control of your own content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex gap_10">
                                        <div class="my-auto">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}"
                                                class="img-fluid" style="width: 100px;">
                                        </div>
                                        <div class="my-auto">
                                            <h5 class="font-weight-bold">
                                                +100 Individual Tutors
                                            </h5>
                                            <p>Publish the course you want,
                                                and always have control of your own content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-flex gap_10">
                                        <div class="my-auto">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/value-prop-teach-v3.jpg') }}"
                                                class="img-fluid" style="width: 100px;">
                                        </div>
                                        <div class="my-auto">
                                            <h5 class="font-weight-bold">
                                                +100 Individual Tutors
                                            </h5>
                                            <p>Publish the course you want,
                                                and always have control of your own content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container custom-padd">
                        <div class="row px-md-5 px-1">
                            <div class="col-md-12 text-center">
                                <h2 class="font-weight-bold custom_heading_1 my-4">How To Use</h2>
                            </div>
                            <div class="col-md-12">
                                <nav class="nav nav-pills nav-justified mx-4 gap-40">
                                    <button type="button" onclick="changeContent(1)" id="first_button"
                                        class="nav-item nav-link btn_custom_border active">First
                                        Step
                                    </button>
                                    <button type="button" onclick="changeContent(2)" id="second_button"
                                        class="nav-item nav-link btn_custom_border">Second Step
                                    </button>
                                    <button type="button" onclick="changeContent(3)" id="third_button"
                                        class="nav-item nav-link btn_custom_border">Third Step
                                    </button>
                                    <button type="button" onclick="changeContent(4)" id="fourth_button"
                                        class="nav-item nav-link btn_custom_border">Final Step
                                    </button>
                                </nav>
                            </div>
                            <div class="col-md-12 mb-n3 px-3 pt-3" id="tab_section">
                                <div class="custom_border_radius section_custom_border my-3 mb-3 p-3" id="first_tab">
                                    <h5 class="font-weight-bold custom_heading_1 mb-3 text-center">First Step</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                </div>

                                <div class="custom_border_radius section_custom_border d-none my-3 mb-3 p-3" id="second_tab">
                                    <h5 class="font-weight-bold custom_heading_1 mb-3 text-center">Second Step</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                </div>

                                <div class="custom_border_radius section_custom_border d-none my-3 mb-3 p-3" id="third_tab">
                                    <h5 class="font-weight-bold custom_heading_1 mb-3 text-center">Third Step</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                </div>

                                <div class="custom_border_radius section_custom_border d-none my-3 mb-3 p-3" id="fourth_tab">
                                    <h5 class="font-weight-bold custom_heading_1 mb-3 text-center">Final Step</h5>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In dignissimos, quod, vitae,
                                        consequatur dolores dolorum cum cumque ratione quaerat consequuntur non officia deleniti
                                        fugiat
                                        possimus at dolore quisquam velit ad officiis? Sequi?</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
        {{-- slider timeline --}}
        <div class="our-process-section-container bg mt-3">
            <div class="our-process-section-wrapper px-sm-3 px-2 py-lg-5 py-3">
                <div class="w-100 d-flex justify-content-start">
                    <div class="our-process-section-part d-flex gap-5 w-50" data-aos="fade-right" data-aos-duration="1000">
                        <div class="padding-top-of-first-part ml_our_process">
                            <h2 class="custom_small_heading carrot-orange-clr text-end ">Step 01</h2>
                            <h5 class="w-100 text-sm-end brdr-btm-of-txt fw-medium pb-3 mb-3 m-0">Search for your course </h5>
                            <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                                <p class="fw-light text-end m-0">Nemo enim ipsam voluptatem quia voluptas sit atur aut odit aut
                                    fugit, sed quia consequuntur magni res.</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24">
                                    <path fill="none" stroke="var(--system_primery_color)" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m20 20l-4.05-4.05m0 0a7 7 0 1 0-9.9-9.9a7 7 0 0 0 9.9 9.9" />
                                </svg>
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
                            <h2 class="custom_small_heading carrot-orange-clr">Step 02</h2>
                            <h5 class="w-100 brdr-btm-of-txt fw-medium pb-3 mb-3 m-0">Take a Simple Lesson </h5>
                            <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="var(--system_primery_color)" width="50px"
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
                                </svg>
                                <p class="fw-light m-0">Nemo enim ipsam voluptatem quia voluptas sit atur aut odit aut fugit,
                                    sed quia consequuntur magni res.</p>
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
                            <h2 class="custom_small_heading carrot-orange-clr">Step 03</h2>
                            <h5 class="w-100 text-sm-end brdr-btm-of-txt fw-medium pb-3 mb-3 m-0">Preview Of Syllabus</h5>
                            <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                                <p class="fw-light text-end m-0">Nemo enim ipsam voluptatem quia voluptas sit atur aut odit aut
                                    fugit, sed quia consequuntur magni res.</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="var(--system_primery_color)" width="50px"
                                    height="50px" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                    xml:space="preserve">
                                    <g>
                                        <path
                                            d="M21.5,0c-1.9,0-3.5,1.2-4.2,2.8h-5c-0.6,0-1.2,0.5-1.2,1.1v1.7H6.5C4.6,5.7,3,7.2,3,9.1v37.5C3,48.5,4.6,50,6.5,50h25.5  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H6.5c-0.7,0-1.2-0.5-1.2-1.1V9.1C5.3,8.4,5.8,8,6.5,8h4.6v1.7H8.2  c0,0-0.1,0-0.1,0c-0.6,0.1-1.1,0.5-1,1.1v34.1c0,0.6,0.5,1.1,1.2,1.1h26.6c0.6,0,1.2-0.5,1.2-1.1V38c0.2,0,0.4,0,0.6,0  c0.4,0,0.8,0,1.2-0.1v8.6c0,0.6-0.5,1.1-1.2,1.1c-0.6,0-1.2,0.5-1.2,1.1c0,0.6,0.5,1.1,1.1,1.2c0,0,0,0,0,0c1.9,0,3.5-1.5,3.5-3.4  v-9.1c0.1,0,0.3-0.1,0.4-0.1l4.4,7c0.3,0.5,1.1,0.7,1.6,0.4c0.5-0.3,0.7-1,0.4-1.6l0,0l-4.3-6.9c2.7-1.8,4.5-4.9,4.5-8.4  c0-4.4-2.9-8.2-6.9-9.6V9.1c0-1.9-1.6-3.4-3.5-3.4h-4.6V4c0-0.6-0.5-1.1-1.2-1.1h-5C25,1.2,23.4,0,21.5,0z M21.5,2.3  c1.2,0,2.1,0.8,2.3,1.9c0.1,0.5,0.6,0.9,1.1,0.9h4.7v4.5H13.4V5.1h4.7c0.6,0,1-0.4,1.1-0.9C19.4,3.1,20.4,2.3,21.5,2.3z M31.9,8  h4.6c0.7,0,1.2,0.5,1.2,1.1v8.6c-0.4,0-0.8-0.1-1.2-0.1c-0.2,0-0.4,0-0.6,0v-6.9c0-0.6-0.5-1.1-1.2-1.1h-2.9V8z M9.4,11.9h24.3V18  c-4.3,1.2-7.5,5.2-7.5,9.8s3.2,8.6,7.5,9.8v6.1H9.4V11.9z M12.7,17.6c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1h12.7  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H12.8C12.8,17.6,12.8,17.6,12.7,17.6z M36.6,19.9c4.5,0,8.1,3.5,8.1,8  s-3.6,8-8.1,8s-8.1-3.5-8.1-8S32.1,19.9,36.6,19.9z M12.7,23.3c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1c0,0,0,0,0,0h9.3  c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0h-9.3C12.8,23.3,12.8,23.3,12.7,23.3z M12.7,29c-0.6,0-1.1,0.6-1.1,1.2  c0,0.6,0.6,1.1,1.2,1.1h9.3c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0h-9.3C12.8,29,12.8,29,12.7,29z M12.7,34.7  c-0.6,0-1.1,0.6-1.1,1.2c0,0.6,0.6,1.1,1.2,1.1h12.7c0.6,0,1.2-0.5,1.2-1.1c0-0.6-0.5-1.1-1.1-1.2c0,0,0,0,0,0H12.8  C12.8,34.7,12.8,34.7,12.7,34.7z">
                                        </path>
                                    </g>
                                </svg>
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
                            <h2 class="custom_small_heading carrot-orange-clr">Step 04</h2>
                            <h5 class="w-100 brdr-btm-of-txt fw-medium pb-3 mb-3 m-0">Purchase the Course</h5>
                            <div class="d-flex align-items-center gap-sm-3 pb-3 small_gap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
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
                                </svg>
                                <p class="fw-light m-0">Nemo enim ipsam voluptatem quia voluptas sit atur aut odit aut fugit,
                                    sed quia consequuntur magni res.</p>
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
        {{-- slider-end --}}
        <div class="container custom-b-padd mb-4 mb-lg-5">
            <div class="row px-xl-5 px-1 pt-md-5 pt-4">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_heading_1 mb-md-4 mb-3">Courses From Individual Tutors</h2>
                </div>
                @if (isset($courses))
                    @foreach ($courses as $course)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4 d-flex justify-content-center">
                            <div class="quiz_wizged card rounded-card shadow w-100">
                                <a
                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) . '?courseType=' . $course->type }}">
                                    <div class="thumb rounded-card-img">
                                        <img src="{{ getCourseImage($course->thumbnail) }}" alt=""
                                            class="img-fluid w-100 h-100 custom-img" style="min-height: 50vh;">
                                        <x-price-tag :price="$course->price + @$course->tax" :discount="$course->discount_price" />
                                        <span class="quiz_tag">{{ __('Course') }}</span>
                                    </div>
                                </a>

                                <div class="card-body course_content">
                                    <a
                                        href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) . '?courseType=' . $course->type }}">
                                        <h5 class="noBrake" title=" {{ $course->title }}">
                                            {{ $course->title }}
                                        </h5>
                                    </a>
                                    <div class="rating_cart">
                                        <div class="rateing">
                                            <span>{{ $course->totalReview }}/5</span>
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
                                            {{ count($course->chapters) }}
                                            {{ __('Chapters') }}</small>

                                        <small class="small_tag_color">
                                            <i class="ti-user"></i> {{ count($course->enrolls) }}
                                            {{ __('frontend.Students') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 py-2 text-center">
                        <a href="{{ url('/prep-courses?tutor_courses=1') }}" class="small_btn2 theme_btn mt-2 p-2">View
                            More >></a>
                    </div>
                @endif
                @if (count($courses) == 0)
                    <div class="col-lg-12">
                        <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center mt-md-4 mt-3">
                            <div class="thumb">
                                <img style="width: 50px"
                                    src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                            </div>
                            <h2 class="custom_small_heading">
                                {{ __('No Course Found') }}
                            </h2> 
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (isTutor() || (!auth()->check() && !session()->has('pre-registered-user')))
            {{-- @dd(count($packages)) --}}
            @if (count($packages))
                <div class="container custom-b-padd1 mb-4 mb-md-5" id="package_prices">
                    <div class="row justify-content-center px-xl-5">
                        <div class="col-md-12 text-center">
                            <h2 class="font-weight-bold custom_heading_1 mb-4 mb-md-5">Check Out Our Pricings</h2>
                        </div>
                        @foreach ($packages as $package)
                            @php
                                if ($loop->iteration == 1) {
                                    $heading = 'heading_1_color';
                                    $button = '';
                                } elseif ($loop->iteration == 2) {
                                    $heading = 'heading_2_color';
                                    $button = 'button-tb--blue';
                                } elseif ($loop->iteration == 3) {
                                    $heading = 'heading_3_color';
                                    $button = 'button-tb--orange';
                                }
                            @endphp
                            <div class="col-sm-6 col-lg-4 d-flex justify-content-center justify-content-center d-flex mb-3">
                                <div class="card custom_card_plan shadow">
                                    <div class="card-body">
                                        <h5 class="price-card__plan--v2 {{ $heading }}">
                                            {{ $package->title ?? 'Coming Soon' }}</h5>
                                        <p class="mb-4 pricing-para">{{ $package->description ?? 'Coming Soon' }}</p>

                                        <div class="d-flex gap-2">
                                            <div class="pricing-per-mo top-align">$</div>
                                            <div annual-price="" monthly-price="" class="price-card__price--v2">
                                                {{ $package->price ?? 'Coming Soon' }}</div>
                                            <div class="pricing-per-mo">/{{ $package->package_term }}</div>
                                        </div>
                                        <div class="d-flex justify-content-center my-4">
                                            @if (Auth::check())
                                                @if (isset($current_package) && $current_package->package_id == $package->id)
                                                    <a href="javascript:void(0)"
                                                        class="button-tb button-tb--cta is--pricing w-100 {{ $button }}">Current
                                                        Package</a>
                                                @else
                                                    <a href="{{ route('packageBuy', ['id' => Crypt::encrypt($package->id)]) }}"
                                                        class="button-tb button-tb--cta is--pricing w-100 {{ $button }}">
                                                        {{ !empty($exist) || $exist > 0 ? 'Upgrade' : 'Buy Now' }}
                                                    </a>
                                                @endif
                                            @else
                                                <button
                                                    class="button-tb button-tb--cta is--pricing w-100 {{ $button }} hit"
                                                    onclick="addPackageId('{{ Crypt::encrypt($package->id) }}')">Buy
                                                    Now
                                                </button>
                                            @endif
                                        </div>
                                        <div class="price-card__small-text">This includes:</div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label class="pricing__text--12">
                                                {{ isset($package->allowed_courses) ? 'Can Upload ' . $package->allowed_courses . ' Courses' : 'Coming Soon' }}
                                            </label>
                                        </div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label
                                                class="pricing__text--12">{{ $package->option_1 ?? 'Coming Soon' }}</label>
                                        </div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label class="pricing__text--12">{{ $package->option_2 ?? 'Coming Soon' }}
                                                </labe;>
                                        </div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label
                                                class="pricing__text--12">{{ $package->option_3 ?? 'Coming Soon' }}</label>
                                        </div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label
                                                class="pricing__text--12">{{ $package->option_4 ?? 'Coming Soon' }}</label>
                                        </div>
                                        <div class="d-flex gap_10 feature">
                                            <img src="{{ asset('public/frontend/infixlmstheme/img/images/644747948ed80c4627bec09d_Check.svg') }}"
                                                alt="" class="feature-icon">
                                            <label
                                                class="pricing__text--12">{{ $package->option_5 ?? 'Coming Soon' }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
    <div class="modal fade sellWithUs-2" id="sellWithUs" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close-modal theme_btn small_btn4 px-3 py-2 closeModal" data-bs-dismiss="modal"
                    {{-- <button type="button" class="close-modal theme_btn small_btn4 px-3 py-2 closeModal" --}}
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                        id="tutor_reqister">
                        @csrf
                        <input name="type" value="Tutor" type="hidden">
                        <input name="role_id" value="9" type="hidden">
                        <input name="package_id" id="package_id" value="" type="hidden">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="custom_small_heading my-3 text-center">
                                        Become a Tutor
                                    </h2>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label class="mb-0 mt-2 form_label">What position are you applying?<span>*</span></label>
                                    <select name="instructor_position_id"
                                        class="text_small form-select form-control @if ($errors->first('instructor_position_id')) is-invalid @endif"
                                        aria-label="Default select example" required>
                                        <option value="" selected>--SELECT--</option>
                                        @foreach ($postions as $postion)
                                            <option value="{{ $postion->id }}"
                                                {{ (string) $postion->id == old('instructor_position_id') ? 'selected' : '' }}>
                                                {{ $postion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label class="mb-0 mt-2 form_label">How did you hear about us ?<span>*</span></label>
                                    <select name="instructor_hear_id"
                                        class="text_small form-select form-control @if ($errors->first('instructor_hear_id')) is-invalid @endif"
                                        aria-label="Default select example" required>
                                        <option value="" selected>--SELECT--</option>
                                        @foreach ($hears as $hear)
                                            <option value="{{ $hear->id }}"
                                                {{ (string) $hear->id == old('instructor_hear_id') ? 'selected' : '' }}>
                                                {{ $hear->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="mb-0 mt-2 form_label">Start Date</label>
                                    <input name="start_date" id="start_date"
                                        class="input--style-1 js-datepicker form-control @if ($errors->first('start_date')) is-invalid @endif"
                                        type="date" placeholder="" name="birthday" value="{{ old('start_date') }}">
                                </div>

                                <!-- personal information section  -->
                                <div class="col-md-12">
                                    <h2 class="custom_small_heading my-3 text-center">
                                        Personal Information
                                    </h2>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">First Name<span>*</span></label>
                                    <input class="form-control @if ($errors->first('first_name')) is-invalid @endif"
                                        type="text" placeholder="" name="first_name"
                                        value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Middle Name</label>
                                    <input class="form-control @if ($errors->first('middle_name')) is-invalid @endif"
                                        type="text" placeholder="" name="middle_name"
                                        value="{{ old('middle_name') }}">
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Last Name<span>*</span></label>
                                    <input class="form-control @if ($errors->first('last_name')) is-invalid @endif"
                                        type="text" placeholder="" name="last_name" value="{{ old('last_name') }}" required>
                                </div>

                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Gender<span>*</span></label>
                                    <select name="gender"
                                        class="text_small form-select form-control @if ($errors->first('gender')) is-invalid @endif"
                                        aria-label="Default select example" required>
                                        <option value="" selected>--SELECT--</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Date of Birth<span>*</span></label>
                                    <input id="datepicker"
                                        class="form-control @if ($errors->first('dob')) is-invalid @endif"
                                        type="date" placeholder="" name="dob" value="{{ old('dob') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Email<span>*</span></label>
                                    <input class="form-control @if ($errors->first('email')) is-invalid @endif"
                                        type="text" placeholder="" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Phone (Home)</label>
                                    <input class="form-control @if ($errors->first('phone')) is-invalid @endif"
                                        maxlength="14" type="text" placeholder="" name="phone"
                                        value="{{ old('phone') }}" onKeyPress="if(this.value.length==14) return false;">
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Cell<span>*</span></label>
                                    <input class="form-control @if ($errors->first('cell')) is-invalid @endif"
                                        maxlength="14" type="text" placeholder="" name="cell"
                                        value="{{ old('cell') }}" onKeyPress="if(this.value.length==14) return false;" required>
                                </div>
                                <div class="col-lg-3 col-sm-4 form_content">
                                    <label class="mb-0 mt-2 form_label">Work</label>
                                    <textarea name="work" class="form-control @if ($errors->first('work')) is-invalid @endif"
                                        >{{ old('work') }}</textarea>
                                </div>
                                <div class="col-lg-9 col-sm-8 form_content">
                                    <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                    <textarea name="address" class="form-control @if ($errors->first('address')) is-invalid @endif"
                                        >{{ old('address') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <h2 class="custom_small_heading my-3 text-center">
                                        School Information
                                    </h2>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">High School/GED<span>*</span></label>
                                    <input class="form-control @if ($errors->first('high_school')) is-invalid @endif"
                                        type="text" placeholder="" name="high_school"
                                        value="{{ old('high_school') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                    <input class="form-control @if ($errors->first('school_years_attended')) is-invalid @endif"
                                        type="date" placeholder="" name="school_years_attended"
                                        value="{{ old('school_years_attended') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                    <select name="school_year_graduate"
                                        class="text_small form-select form-control @if ($errors->first('school_year_graduate')) is-invalid @endif"
                                        aria-label="Default select example" required>
                                        <option value="" selected>--SELECT--</option>
                                        <option value="yes"
                                            {{ 'yes' == old('school_year_graduate') ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option value="no"
                                            {{ 'no' == old('school_year_graduate') ? 'selected' : '' }}>
                                            No
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Degree/Major<span>*</span></label>
                                    <input class="form-control @if ($errors->first('school_degree')) is-invalid @endif"
                                        type="text" placeholder="" name="school_degree"
                                        value="{{ old('school_degree') }}" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">College<span>*</span></label>
                                    <input class="form-control @if ($errors->first('college')) is-invalid @endif"
                                        type="text" placeholder="" name="college" value="{{ old('college') }}" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                    <input class="form-control @if ($errors->first('college_email')) is-invalid @endif"
                                        type="date" placeholder="" name="college_email"
                                        value="{{ old('college_email') }}" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                    <select name="college_graduate"
                                        class="text_small form-select form-control @if ($errors->first('college_graduate')) is-invalid @endif"
                                        aria-label="Default select example" value="{{ old('f_name') }}" required>
                                        <option value="" selected>--SELECT--</option>
                                        <option value="yes" {{ 'yes' == old('college_graduate') ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option value="no" {{ 'no' == old('college_graduate') ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Trade or Correspondence School<span>*</span></label>
                                    <input class="form-control @if ($errors->first('trade_school')) is-invalid @endif"
                                        type="text" placeholder="" name="trade_school"
                                        value="{{ old('trade_school') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Degree/Major<span>*</span></label>
                                    <input class="form-control @if ($errors->first('trade_degree')) is-invalid @endif"
                                        type="text" placeholder="" name="trade_degree"
                                        value="{{ old('trade_degree') }}" required>
                                </div>
                                <div class="col-lg-3 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Year Attended<span>*</span></label>
                                    <input class="form-control @if ($errors->first('trade_years_attended')) is-invalid @endif"
                                        type="date" placeholder="" name="trade_years_attended"
                                        value="{{ old('trade_years_attended') }}" required>
                                </div>

                                <div class="col-lg-3 form_content">
                                    <label class="mb-0 mt-2 form_label">Graduates<span>*</span></label>
                                    <select name="trade_year_graduate"
                                        class="text_small form-select form-control @if ($errors->first('trade_year_graduate')) is-invalid @endif"
                                        aria-label="Default select example" required>
                                        <option value="" selected>--SELECT--</option>
                                        <option value="yes"
                                            {{ 'yes' == old('trade_year_graduate') ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option value="no" {{ 'no' == old('trade_year_graduate') ? 'selected' : '' }}>
                                            No
                                        </option>
                                    </select>
                                </div>

                                <!-- Teaching Experience section  -->
                                <div class="col-md-12">
                                    <h2 class="custom_small_heading my-3 text-center">
                                        Teaching Experience
                                    </h2>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Current Position<span>*</span></label>
                                    <input class="form-control @if ($errors->first('current_position')) is-invalid @endif"
                                        type="text" placeholder="" name="current_position"
                                        value="{{ old('current_position') }}" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Employer's Phone Number<span>*</span></label>
                                    <input class="form-control @if ($errors->first('Teach_phone')) is-invalid @endif"
                                        type="text" placeholder="" name="Teach_phone" maxlength="14"
                                        value="{{ old('Teach_phone') }}"
                                        onKeyPress="if(this.value.length==14) return false;" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Employer Name<span>*</span></label>
                                    <input class="form-control @if ($errors->first('employee_name')) is-invalid @endif"
                                        type="text" placeholder="" name="employee_name"
                                        value="{{ old('employee_name') }}" required>
                                </div>
                                <div class="col-lg-5 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Position Start Date<span>*</span></label>
                                    <input class="form-control @if ($errors->first('date_employer_start')) is-invalid @endif"
                                        type="date" placeholder="" name="date_employer_start"
                                        value="{{ old('date_employer_start') }}" required>
                                </div>
                                <div class="col-lg-5 col-sm-7 form_content">
                                    <div id="end_date_div"
                                        style="{{ old('currently_employed') ? 'display:none;' : '' }}">
                                        <label class="mb-0 mt-2 form_label">Position End Date<span>*</span></label>
                                        <input class="form-control @if ($errors->first('date_employer_end')) is-invalid @endif"
                                            type="date" placeholder="" name="date_employer_end"
                                            value="{{ old('date_employer_end') }}">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-5 d-flex align-items-center justify-content-lg-center mt-3 gap-2">
                                    <input class="@if ($errors->first('currently_employed')) is-invalid @endif" type="checkbox"
                                        id="postion" name="currently_employed"
                                        {{ old('currently_employed') ? 'checked' : '' }}>
                                    <label class="mb-0 form_label" for="postion">Currently Employed?</label><br>
                                </div>
                                <div class="col-lg-4 form_content">
                                    <label class="mb-0 mt-2 form_label">Supervisor Name<span>*</span></label>
                                    <input class="form-control @if ($errors->first('supervisor_name')) is-invalid @endif"
                                        type="text" placeholder="" name="supervisor_name"
                                        value="{{ old('supervisor_name') }}" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Upload Resume<span>*</span></label>
                                    <input class="form-control @if ($errors->first('upload_resume')) is-invalid @endif"
                                        type="file" placeholder="" name="upload_resume" accept=".doc,.docx,.pdf" required>
                                </div>
                                <div class="col-lg-4 col-sm-6 form_content">
                                    <label class="mb-0 mt-2 form_label">Upload Coverletter<span>*</span></label>
                                    <input class="form-control @if ($errors->first('cover_letter')) is-invalid @endif"
                                        type="file" placeholder="" name="cover_letter" accept=".doc,.docx,.pdf" required>
                                </div>
                                <div class="col-md-12 form_content">
                                    <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                    <textarea name="employer_address" class="form-control @if ($errors->first('employer_address')) is-invalid @endif"
                                         required>{{ old('employer_address') }}</textarea>
                                </div>
                                <div class="col-md-auto ml-auto mt-3">
                                    <button type="button" class="close-modal btn btn-secondary closeModal" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn small_btn4 theme_btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include(theme('partials._custom_footer'))
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        function changeContent(id) {
            console.log(id);
            var tab_btn = $('.nav-pills');
            var tab_section = $('#tab_section');
            if (id == 1) {
                tab_btn.children('button').removeClass('active');
                tab_section.find('div').addClass('d-none');
                tab_btn.find('#first_button').addClass('active');
                tab_section.find('#first_tab').removeClass('d-none');
            }
            if (id == 2) {
                tab_btn.children('button').removeClass('active');
                tab_section.find('div').addClass('d-none');
                tab_btn.find('#second_button').addClass('active');
                tab_section.find('#second_tab').removeClass('d-none');

            }
            if (id == 3) {
                tab_btn.children('button').removeClass('active');
                tab_section.find('div').addClass('d-none');
                tab_btn.find('#third_button').addClass('active');
                tab_section.find('#third_tab').removeClass('d-none');
            }
            if (id == 4) {
                tab_btn.children('button').removeClass('active');
                tab_section.find('div').addClass('d-none');
                tab_btn.find('#fourth_button').addClass('active');
                tab_section.find('#fourth_tab').removeClass('d-none');

            }
        }

        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("datepicker").setAttribute('max', today);
            document.getElementById("start_date").setAttribute('min', today);

            $('#postion').change(function() {
                if ($(this).is(':checked')) {
                    $('#end_date_div').hide();
                } else {
                    $('#end_date_div').show();
                }
            });

            // $("#datepicker").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     maxDate:'0'
            // });
            // $("#start_date").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     minDate:'0'
            // });

        });

        function addPackageId(id) {
            var form = $('#tutor_reqister');
            form.find('#package_id').val(id);
        }
        $(".hit").click(function() {
            $('#sellWithUs').modal('show');
            // $('.popup').removeClass('d-none');

        });
        $('.close-modal').click(modalFormControl);

        if (window.location.hash) {
            let hash = window.location.hash;
            if($(hash).hasClass('modal')){

                $(hash).modal('show');
            }
        }

        function modalFormControl() {
            var form = $('#tutor_reqister');
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.is-invalid, .is-focused, .is-filled').removeClass(["is-invalid", "is-focused",
                "is-filled"
            ]);
            form.find('#category_id').val(null).trigger('change');
            form.find('.invalid-feedback').children().text('');
            form.trigger("reset");


            // $('.modal-backdrop').removeClass('show');
            // $('.modal-backdrop').removeClass('fade');
            // $('.modal-backdrop').removeClass('modal-backdrop');
            // form.parents('.modal').removeClass('show');
            // form.parents('.modal').removeClass('fade');
            // form.parents('.modal').attr('style', '');
            //form.parents('.modal').modal('hide');
            form.find('#package_id').val('');


        }
    </script>
    @if (count($errors))
        <script>
            $('#sellWithUs').modal('show');
        </script>
    @endif
    {{-- for-modal --}}
    <script>
        // var openModalButtons = document.getElementsByClassName('openModal');
        // for (var i = 0; i < openModalButtons.length; i++) {
        //     openModalButtons[i].addEventListener('click', function() {
        //         var instructors = document.getElementsByClassName('sellWithUs-2');
        //         for (var j = 0; j < instructors.length; j++) {
        //             instructors[j].style.display = 'block';
        //         }
        //         document.body.classList.add('modal-open');
        //         document.documentElement.style.overflow = 'hidden';
        //         document.body.style.overflow = 'hidden';
        //         document.getElementById('modalContent').addEventListener('scroll', function(event) {
        //             event.stopPropagation();
        //         });
        //     });
        // }
        $('.closeModal').on('click',function(){
            $(this).closest('.modal').modal('hide');
        });
        // var closeModalButtons = document.getElementsByClassName('closeModal');
        // for (var k = 0; k < closeModalButtons.length; k++) {
        //     closeModalButtons[k].addEventListener('click', function() {
        //         var instructors = document.getElementsByClassName('sellWithUs-2');
        //         for (var l = 0; l < instructors.length; l++) {
        //             instructors[l].style.display = 'none';
        //         }
        //         document.body.classList.remove('modal-open');
        //         document.documentElement.style.overflow = '';
        //         document.body.style.overflow = '';
        //     });
        // }
    </script>
    <!-- Optional JavaScript; select of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
