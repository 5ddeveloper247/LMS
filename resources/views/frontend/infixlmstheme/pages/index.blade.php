@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontendmanage.Home') }}
@endsection


<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>


<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />

<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/owl.theme.default.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


{{-- for scroll our partner --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- events and news tabs-content --}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
{{-- animation gsap --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<style>
    /* faqs about section */
    @import url("https:://fonts.googleleapis.com/css2?family=Poppins&display=swap");
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

    .tab-about {
        width: 100%;
        position: relative;
        border-bottom: #eee;
        color: #eee;
    }

    .tab-about input {
        position: absolute;
        opacity: 0;
        z-index: -1;
    }

    .tab-about .tab-about-content {
        max-height: 0;
        overflow: hidden;
    }

    .tab-about input:checked~.tab-about-content {
        max-height: max-content;
        color: #eee;
    }

    .accordion {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border: none;
        border-radius: 1rem;
        max-height: 430px;
        overflow: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .accordion::-webkit-scrollbar {
        display: none;
    }

    .section-header {
        width: 100%;
        color: #eee;
    }

    .tab-about-wrapper {
        width: 100%;
        height: 100%;
        padding: 0.5rem 0.5rem;
        border: 1px solid;
        border-radius: 0.5rem 0.5rem 0 0;
        transition: background-color 0.25s ease-in;
    }

    .tab-about-wrapper:hover {
        background-color: transparent;
        color: #eee;
    }

    .tab-about label {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        font-size: 16px;
        margin: 0px;
    }

    .tab-about_label::after {
        content: "\276F";
        width: 1em;
        height: 1em;
        text-align: center;
        transform: rotate(90deg);
        transition: all 0.5s;
    }

    .tab-about_label.rotate::after {
        transform: rotate(270deg);
    }

    .tab-about_content.closed+.tab-about_label::after {
        transform: rotate(0deg);
    }

    /* faqs aboutend */
    /* animation */
    section .animate {
        opacity: 0;
        transition: 2s;
    }

    section.show-animate .animate {
        opacity: 1;
    }

    .sec-4.show-animate .animate {
        animation: fadeInAnimation ease 3s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .sec-8 .animate {
        transform: scale(.5);
    }

    .sec-8.show-animate .animate {
        transform: scale(1);
    }

    /* events and news new section */


    /* newevents */
    .rts-section-title {
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .mb--25 {
        margin-bottom: 25px !important;
    }

    .events-content .rts-counter {
        counter-reset: rt-counter;
    }

    .events-content .single-event {
        margin: 0;
        padding: 45px 40px;
        background: #F5F5FF;
        display: flex;
        gap: 20px;
        align-items: center;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .events-content .single-event:hover {
        background: var(--system_secendory_color);
        transition: all 1s ease;
    }
    /* .events-content {
    display: flex;
    flex-wrap: wrap;
} */
    .single-event {
    flex: 1 1 300px; 
    margin: 0 10px; 
    position: relative; 
}

.single-event::before {
    position: absolute; 
    content: "";
    left: calc(25% - 0.5px); 
    height: 100%;
    width: 1px;
    background: #eee;
    transition: all 0.4s ease;
}

    .events-content .single-event-counter {
        padding-right: 20px;
        position: relative;
    }

    .events-content .single-event>* {
        position: relative;
        z-index: 10;
    }

    .events-content .single-event-counter .count-number {
        font-size: 80px;
        position: relative;
        transition: all 0.4s ease;

        font-weight: 600;
    }

    .rt-clip-text {
        -webkit-text-fill-color: transparent;
        -webkit-text-stroke-color: #DEDEDE;
        -webkit-text-stroke: 1px;
    }

    .events-content .single-event-counter .count-number {
        font-size: 80px;
        position: relative;
        transition: all 0.4s ease;
        font-weight: 600;
    }

    .events-content .single-event-content .single-event-content-meta {
        display: flex;
        gap: 25px;
        align-items: center;
        color: #110c2d;
        transition: all 0.4s ease;
    }

    .events-content .single-event:hover .single-event-content-meta {
        color: #eee !important;
    }

    .events-content .single-event:hover .event-title {
        color: #eee !important;
    }

    .events-content .single-event:hover .count-number {
        color: #eee !important;
    }

    .events-content .single-event-counter .count-number::before {
        content: counter(rt-counter, decimal-leading-zero);
        counter-increment: rt-counter;
    }

    .events-content .single-event-content {
        padding-left: 20px;
    }

    .events-content .single-event-content .single-event-content-meta .event-date,
    .events-content .single-event-content .single-event-content-meta .event-time,
    .events-content .single-event-content .single-event-content-meta .event-place {
        display: flex;
        gap: 5px;
        align-items: center;
    }

    .events-content .single-event:nth-child(2n):hover::after {
        opacity: 1;
        top: 0;
    }

    .events-content .single-event:nth-child(2n) .single-event-counter .count-number {
        color: #eee;
    }

    .events-content .single-event:nth-child(2n) .single-event-content-meta {
        color: #eee;
    }

    .events-content .single-event:nth-child(2n) .event-title {
        color: #eee;
    }

    .events-content .single-event::after {
        position: absolute;
        height: 100%;
        width: 100%;
        content: "";
        left: 0;
        top: 0;
        top: -50%;
        left: 0;
        background: var(--system_secendory_color);
        z-index: -1;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .events-content .single-event:after .event-title {
        color: #eee !important;
    }

    .events-content .single-event:after .count-number {
        color: #eee !important;
    }

    .events-content .single-event:nth-child(2n):not(:hover)::after {
        opacity: 1;
        top: 0;
    }

    /*  */
    .ml_span {
        margin-left: -170px;
    }

    /* col-md-5 */
    .news-events-tabs-section {
        padding-left: 75px;
    }

    .rt-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .rts-border-bottom-2 {
        border-bottom: 2px solid #ddd8f9;
    }

    .pb--25 {
        padding-bottom: 25px !important;
    }

    .rts-section-title {
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .rts-arrow {
        color: var(--rt-primary);
        font-weight: 600;
        display: inline-block;
    }

    .rts-arrow span {
        margin-left: 5px;
    }

    .news-events-tabs-section .news-events-tab .nav {
        margin: 0;
        display: flex;
        gap: 10px;
    }

    .pb--30 {
        padding-bottom: 30px !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item {
        margin: 30px 0 0 0;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link.active {
        background: var(--system_secendory_color);
        color: #fff !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link:hover {
        background: var(--system_secendory_color);
        color: #fff !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link {
        padding: 7px 15px;
        border: 1px solid #ddd8f9;
        border-radius: 0;
        color: #110c2d;
        font-size: 14px;
        /* transition: all 0.4s ease; */
        font-weight: 500;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        -ms-overflow-style: none;
        scrollbar-width: thin;
        scrollbar-color: var(--system_secendory_color) #F1F1FF;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        scrollbar-color: var(--system_secendory_color) #F1F1FF;
        scrollbar-width: medium;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        height: auto;
        overscroll-behavior: smooth;
        overflow-y: scroll;
    }

    .news-events-tabs-section .news-events-tab .notice-content-box {
        position: relative;
    }

    .news-events-tabs-section .news-events-tab .single-notice:first-child {
        border-top: 1px solid #ddd8f9;
    }

    .news-events-tabs-section .news-events-tab .single-notice {
        border-bottom: 1px solid #ddd8f9;
        padding: 25px 0;
        margin-right: 40px;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-date {
        font-size: 24px;
        font-weight: 600;
        color: #66c09a;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-date span {
        font-size: 16px;
        font-weight: 500;
        color: #737477;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-content p a {
        color: #737477;
        transition: all 0.4s ease;
    }

    /*  stayintouch new-form*/

    .outside,
    select.outside,
    [type=password].outside {
        color: #555;
        width: 100%;
        font-size: 1rem;
        line-height: normal;
        border: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        box-sizing: border-box;
        /* margin-bottom: -1px; */
        padding: .375rem 45px;
        position: relative;
        z-index: 1;
        height: calc(1.5em + .75rem + 2px);
    }

    :focus,
    select:focus {
        outline: 0 !important;
        color: #555 !important;
        border-color: #9e9e9e;
        z-index: 2
    }

    :focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside,
    :focus~.floating-label-outside select:not(:focus):valid~.floating-label-outside,
    select:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside,
    select:focus~.floating-label-outside select:not(:focus):valid~.floating-label-outside {
        top: 15px;
        left: 40px;
        font-size: 15px;
        opacity: 1;
        font-weight: 400
    }

    :focus~.floating-label-outside,
    select:focus~.floating-label-outside,
    :valid~.floating-label-outside,
    select:valid~.floating-label-outside {
        top: -10px;
        opacity: 1;
        font-size: 15px;
        color: #727272;
        background-color: #eee;
        padding: 0px 5px;
    }

    :focus~.floating-label-outside,
    :valid~.floating-label-outside,
    select:focus~.floating-label-outside,
    select:valid~.floating-label-outside {
        left: 40px;
    }

    .form-control:focus {
        box-shadow: none !important;
        border-color: #ced4da !important;
    }

    .shadow_msg {
        height: 100px !important;
        max-width: 100%;
        word-wrap: break-word;
        color: #555;
        width: 100%;
        font-size: 12px;
        line-height: normal;
        border: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        box-sizing: border-box;
        position: relative;
        z-index: 1;
    }

    :focus~.floating-label-msg input:not(:focus):valid~.floating-label-msg,
    :focus~.floating-label-msg select:not(:focus):valid~.floating-label-msg,
    select:focus~.floating-label-msg input:not(:focus):valid~.floating-label-msg,
    select:focus~.floating-label-msg select:not(:focus):valid~.floating-label-msg {
        top: 15px;
        left: 40px;
        font-size: 15px;
        opacity: 1;
        font-weight: 400;
    }

    :focus~.floating-label-msg,
    select:focus~.floating-label-msg,
    :valid~.floating-label-msg,
    select:valid~.floating-label-msg {
        top: -10px;
        opacity: 1;
        font-size: 15px;
        color: #727272;
        background: #fff;
        padding: 0px 5px;
    }

    :focus~.floating-label-msg,
    :valid~.floating-label-msg,
    select:focus~.floating-label-msg,
    select:valid~.floating-label-msg {
        left: 20px;
    }

    .floating-label-msg {
        position: absolute;
        pointer-events: none;
        left: 12px;
        top: 12px;
        transition: .2s ease all;
        color: #777;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: .5px;
        z-index: 3;
        text-transform: uppercase
    }

    .floating-label-outside {
        position: absolute;
        pointer-events: none;
        left: 60px;
        top: 12px;
        transition: .2s ease all;
        color: #777;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: .5px;
        z-index: 3;
        text-transform: uppercase;
    }

    .input-icon-outside {
        position: absolute;
        font-size: 1rem !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
        top: 0.5px;
        left: 0.5px;
        z-index: 3;
        color: #fff;
        background: linear-gradient(0deg, var(--system_primery_color) 0%, var(--footer_background_color) 75%);
        padding: .4rem .75rem;
        display: flex !important;
        align-items: center;
        border-right: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    html {
        overflow-x: hidden;
        font-size: 16px;
    }

    .single-box-parent {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .single-box-child {
        width: 100%;
        max-width: 500px;
        min-width: 500px;
        background-color: #373737;
    }

    .work-wrap .text {
        background: #ffffff;
        height: 350px;
    }


    .owl-nav {
        margin-top: -100px !important;
    }

    .owl-carousel .owl-nav .owl-next {
        left: 12%;
        margin-top: -125px;
        margin-left: 400px;
        position: relative;
        font-size: 60px !important;
        color: #eee !important;
    }

    .owl-carousel .owl-nav button.owl-prev {
        z-index: 12 !important;
        position: relative;
        display: block;

        font-size: 60px;
        left: 63%;
        font-size: 60px !important;
        top: -37px;
        color: #eee;
    }

    .owl-carousel .owl-nav .owl-prev span:before,
    .owl-carousel .owl-nav .owl-next span:before {
        font-size: 60px;
        font-weight: bold;
        color: #eee;
    }

    .second_section {

        border: 1px solid rgb(255, 255, 255);
        box-shadow: 0 3px 20px rgb(0 0 0 / 5%);
    }

    .second_section:hover {

        border: 1px solid rgb(255, 255, 255);
    }

    .second_section i {
        background: #fff0f0;
        border-radius: 50%;
        color: var(--system_primery_color);
    }

    .learn_more {
        font-size: 16px;
        border-bottom: 2px solid #373737;
        color: #373737;
    }

    .learn_more:hover {
        color: var(--system_primery_color);
        border-bottom: 2px solid var(--system_primery_color);
    }

    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .blog {
        background-color: #252525
    }

    .blog img {
        /* height: 16.875rem;
        width: 100%; */
        transition: 500ms ease-in-out
    }

    .blog img:hover {
        opacity: 0.5;
    }

    .lms_section_color {
        color: var(--system_secondary_color);
    }

    .lms_container_color {
        background-color: #eee;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 37px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 36px !important;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .btn_glo {
        border-radius: 16px;
        font-size: 12.5px;
        font-weight: 700;
        background-color: transparent;
        border: 2px solid #eee !important;
        position: relative;
    }

    .btn_glo:hover {
        background-color: var(--system_primery_color) !important;
        border: 2px solid var(--system_primery_color) !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }

    .vidicons {
        width: 66px;
        position: relative;
        height: 66px;
        background: #eee;
        text-align: center;
        border-radius: 50%;
        top: 283px;
        cursor: pointer;
        transition: .5s;
    }

    .vidicons i {
        color: red;
        padding: 28px;
        font-size: 17px;
    }

    .about_us {
        max-height: auto;
        /* padding: 0px 3rem; */
    }

    .about_us_height {
        height: auto;
        overflow: hidden;
    }

    .about_us_p {
        height: auto;

    }

    .about_us_p::-webkit-scrollbar {
        display: none;
    }

    .shadow_row {
        height: auto;
        justify-content: center;
    }

    .shadow_ist {
        height: auto;
        border-radius: 20px;
        justify-content: space-between;
    }

    .Faq-btn {
        font-size: 12.5px;
        background: transparent;
        color: #eee;
        font-weight: 700;
        margin: 0px 0px 13px 0px;
        border: 2px solid #eee;
        border-radius: 16px;
    }

    .Faq-btn:hover {
        background: #eee;
        color: black;
        border: 2px solid black;
    }

    .vidicons:hover {
        box-shadow: 0px 1px 15px 7px red;
    }

    .video-container {
        position: relative;
        width: 100%;
        height: auto;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
    }

    .overlay-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 1;
        transition: opacity 0.5s ease;
        border-radius: 20px;
    }

    .top-center {
        top: 16%;
        left: 50%;
    transform: translate(-50%, 0%) !important;
    white-space: nowrap;
    }

    .bottom-center {
        bottom: 16%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text-video-overlay {
        position: absolute;
        color: #eee;
        opacity: 1;
        transition: opacity 0.3s ease;
        text-align: center;
    }
.text-video-overlay h2{
    font-size: 1.8rem;
}
    .video-controls {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #eee;
        padding: 25px;
        border-radius: 12px;
        opacity: 1;
        transition: opacity 0.5s linear;
    }

    #playPauseBtn {
        color: var(--system_primery_color);
    }

    .video-container:hover .overlay-video {
        opacity: 1;
    }

    /* .video-container:hover .text-video-overlay {
        opacity: 0;
    } */

    .video-container:hover .video-controls {
        opacity: 1;
    }

    .video-container.video-playing .text-video-overlay,
    .video-container.video-playing .video-controls,
    .video-container.video-playing .overlay-video {
        opacity: 1;
    }


    /* end of video css */

    .owl-nav {
        display: none !important;
    }

    .imgdata {
        /* background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}"); */
        background: url("{{ asset('public/frontend/infixlmstheme/img/images/demo_img.png') }}");
        background-size: cover;
        /* height: 402px; */
    }

    .owl-carousel .owl-dots {
        display: none !important;
    }

    .small_section_bg_color {
        background-color: #996699 !important;
    }

    .small_section_bg_color>h2 {
        font-size: calc(2vw + 0.7rem);
    }

    .small_section_bg_color>h4 {
        font-size: calc(1.5vw + 0.6rem);
    }

    .main_bannar {
        background-image: url("{{ asset('public/assets/PN-Accelerated-fotor-2023070923837.jpg') }}");
        background-size: cover;
        height: 100%;
        position: relative;
        padding-left: 30px;
    }

    .main_bannar::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: #00000050;
    }

    .main_bannar .main_banner-section>h1 {
        font-weight: bold;
        color: #eee;
        position: relative;
    }

    .main_bannar .main_banner-section>p {
        color: #eee;
        position: relative;
    }

    .main_bannar>a {
        position: relative;
        border: 3px solid #eee;
    }

    .custom_section_color {
        background-color: #eee !important;
    }

    .random_program_data_2 {
        overflow: hidden;
    }

    .modal-lg,
    .modal-xl {
        max-width: 600px !important;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .select2-container .select2-selection--single {
        height: 32px !important;

    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 35px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 35px !important;

    }

    .theme_btn.small_btn {
        margin-bottom: 11px;
    }

    .card-shadow {
        min-height: 94vh;
    }

    /* shift from contact */
    .mintban {
        background-image: url("{{ asset('public/assets/bgpicture.jpg') }}");
        height: auto;
        background-size: cover;
    }

    .flowdiv {
        width: 100% !important;
        padding: 5rem 0px;
        margin: auto;
        gap: 10px;
        justify-content: center;
    }

    .dataflow {
        height: 100%;
        background-color: var(--system_secendory_color);
        position: relative;
        border-radius: 20px;
    }

    .custom_form {
        border-radius: 20px;
    }

    .ankar_eltdf {
        height: 100%;
        border-radius: 20px;
        display: flex;
        justify-content: center;
    }

    .imgcls {
        min-width: 100%
    }

    .formdokana .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-date,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-number,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-quiz,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-select,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-text,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-textarea {
        border: 0;
        border-bottom: 1px solid #e1e1e1;
        margin: 7px 0 20px;
        padding: 7px 10px;
        font-size: 15px;
    }

    .cta_service_info h2 {
        font-weight: 700;
        margin: 29px 0 29px;
        color: white;
    }

    .cta_service_info.txt h2 {
        color: white;
    }

    .cta_service_info.txt p {
        color: white;
    }

    .theme_btn {
        background: var(--system_primery_color);
        border-radius: 16px;
        font-family: Source Sans Pro, sans-serif;
        font-size: 16px;
        color: #fff;
        font-weight: 700;
        border: 2px solid transparent;
        text-transform: capitalize;
        display: inline-block;
        padding: 0.5rem 1.5rem;
    }

    .lia {
        top: 50%;
        transform: translateY(-50%);
    }

    /* new_section_hover */
    .main_row {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .for-left {
        display: none;
        visibility: hidden;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(122 104 104 / 30%);
    }

    .prep_card {
        height: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        background-color: #FDFCFC;
        padding: 7px !important;
        /* transition: all 0.3s ease; */
        cursor: pointer;
        border-radius: 6px;
        border: 1px solid gainsboro;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        word-wrap: break-word;
    }

    .card-paddingx {
        padding: 30 80px 0;
    }

    .prep_card-text {
        margin: 0px !important;
        text-wrap: nowrap;
        overflow: hidden;
    }

    .prep_card-image {
        position: relative;
        object-fit: cover;
        width: 100%;
        height: 11rem;
    }

    .prep_card-title {
        margin-top: 20px;
    }

    .widget-49-meeting-info {
        position: absolute;
        right: 0;
    }

    .widget-49-pro-title {
        background-color: var(--system_primery_color);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 9px;
        display: flex;
        width: auto;
        height: auto;
        align-items: center;
        justify-content: center;
    }

    .image_card {
        overflow: hidden !important;
        border: 1px solid #E1DED9;
        border-radius: .25rem;
        /* transform: translateX(-245%); */
        transition: all .5s ease-in;
    }

    .left-top-content {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
    }

    .left-bottom-content {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .left-content {
        color: #fff;
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 1;
        width: 30rem;
    }

    #left-pro-title {
        display: none;
    }

    .left-card-text {
        font-size: 20px;
        color: #fff;
        font-weight: 500;
    }

    .learn-more,
    .prep-paragraph {
        color: #fff;
    }

    /* section2 */

    .for-label {
        display: block;
        width: 50%;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 6px;
        text-align: left;
        border-left: 3px solid;
        position: relative;
        z-index: 2;
        text-decoration: none;
        color: #365e88;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .for-label:hover {
        border-bottom: 0px;
        color: #fff;
        border-left: 3px solid #365e88;
    }

    .learn-more:hover {
        color: #fff
    }

    .for-label::after {
        content: "";
        height: 100%;
        left: 0;
        top: 0;
        width: 0px;
        position: absolute;
        transition: all 0.3s ease 0s;
        -webkit-transition: all 0.3s ease 0s;
        z-index: -1;
    }

    .for-label:hover:after {
        width: 100%;
    }

    .for-label:after {
        background: #D3D3D3;
    }

    .for-main {
        display: flex;
        flex-direction: column;
        gap: 4rem;
    }

    .for-border {
        min-height: 190px;
        border: 0px;
        border-left: 1px solid #D3D3D3;
        padding-left: 20px;
        min-width: 82%;
    }

    .icons-style {
        font-size: 2rem;
        margin-right: 2rem;
        color: cadetblue;
    }

    .icon-img {
        height: 40px !important;
        max-width: 13% !important;
        width: 100%;
    }

    .section-margin-y {
        margin: 60px auto;
    }

    .main_banner-section {
        width: 29rem;

    }

    /* .hero-section-main-heading {
        font-size: 33px !important;
        font-weight: 700 !important;
    } */

    .for-flexibility {
        min-width: 45px;
        width: 85;
        height: 40;
    }

    .for-quality {
        min-width: 45px;
        width: 115;
        height: 40;
    }

    .for-learning {
        min-width: 45px;
        width: 115;
        height: 40;
    }

    .for-global {
        min-width: 35px;
        width: 80;
        height: 40;
    }

    .for-affordability {
        min-width: 35px;
        width: 107px;
        height: 40;
    }

    .for-focus {
        min-width: 35px;
        width: 80;
        height: 40;
    }

    /* percentage section 3a */
    .animation {
        opacity: 0;
        transform: translateX(-300px);
        transition: all 0.7s ease-out;
        transition-delay: 0.4s;

    }

    .scroll-animation {
        opacity: 1;
        transform: translateX(0);
    }

    .percent-video video {
        clip-path: polygon(29% 0, 100% 0, 100% 100%, 0 100%);
    }

    .percent-video {
        padding-right: 0.3rem !important;

    }

    /* .percent-section {
        padding: 0px 70px !important;
    } */

    .percent-h {
        color: var(--system_secendory_color);
        font-weight: 700;
    }

    .percent1 {
        margin: 0 -132px 1.5rem 160px;
    }

    .percent2 {
        margin: 0 -100px 1.5rem 104px;
    }

    .percent3 {
        margin: 0 -74px 1.5rem 50px;
    }

    .percent4 {
        margin: 0 -23px 1.5rem -8px;
    }

    .percent {
        margin-right: 30px !important;
        color: var(--system_primery_color);
    }

    /* features  */
    /* .main-content-feature{
    height: 50vh;
    overflow: auto;
} */
    .content-features {
        padding: 3rem;
        border-radius: 10px;
        box-sizing: border-box;
        background-image: url({{ asset('/public/uploads/images/footerimg/Photo.png') }});
        background-size: cover;
        background-position: center;
        color: white;
        width: 100%;
        height: 490px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        word-wrap: break-word;
    }

    .content-feature {
        height: 490px;
        overflow: auto;
        scrollbar-width: none;
    }

    .content-features1 {
        font-family: Mulish;
        gap: 20px;
        display: flex;
        flex-direction: column;
    }

    /* .content-features2 {
        display: grid;
    } */

    .content-features2-h {
        text-align: left;
        color: #2F2F2F;
    }

    .content-feature1 h2,
    .content-feature1 h5,
    .content-feature1 p {
        opacity: 1;
        transition: opacity 0.5s ease-in all;
        color: #000;
    }

    .content-feature1:hover h2,
    .content-feature1:hover h5,
    .content-feature1:hover p {
        color: var(--system_secendory_color);
    }

    .content-feature1 {
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .in-view {
        opacity: 1;
    }

    .main-content-feature {
        align-items: center;
    }

    .content-features2-hh {
        color: #000;
    }

    .content-features-h {
        letter-spacing: 0em;
        text-align: left;
        color: white;
    }

    .content-features-p {
        color: white;
    }

    .content-features-btn {
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 0em;
        text-align: center;
        border-radius: 16px;
        border: none;
        cursor: pointer;
        border: 2px solid white;
    }

    .content-features-btn:hover {
        background-color: transparent;
        color: white;
    }

    .custom-h {
        font-size: 19px;
    }

    /* features end */
    /* logos section */
    .logos {
        justify-content: space-between;
        overflow: hidden;
        flex-wrap: wrap;
        min-width: 1330px;
    }

    .logos-img {
        height: 80px;
        width: 80px;
    }

    .logos-img8 {
        height: 80px;
        width: 100px;
    }

    .logos-img7 {
        height: 80px;
        width: 80px;
    }

    .logos-img2 {
        height: 80px;
        width: 80px;
    }

    .logos-img3 {
        height: 80px;
        width: 80px;
    }

    .logos-img4 {
        height: 80px;
        width: 80px;
    }

    .logos-img5 {
        height: 75px;
        width: 80px;
    }

    /* logos section end */
    .about-img {
        height: 300px;
    }

    /*  */
    @media only screen and (max-width: 576px) {

        .main_banner-section {
            width: 17rem;
        }

        .cus-padding {
            padding-left: 0px !important;
        }

        .hero-section-h-responsive {
            height: 400px !important;
        }

        .responsive-style-btn {
            /* width: 100% !important; */
            margin: 0 0 0 30px !important;
        }

        .heading-responsive-style {
            font-size: 16px !important;
            padding: 0px 0 0 30px !important;
        }

        .prep_card_height {
            height: 100%;
            width: 100%;
        }

        .prep_card-text {
            font-size: 12px !important;
        }

        .left-content {
            margin-bottom: 10px;
            font-size: 12px;
        }

        .random_program_data_2 {
            /* height: 200px; */
        }

        .random_program_data_1 {
            height: 250px !important;
            object-fit: cover;
        }

        .cta_service_info h2 {
            font-size: 14px;
            margin: 17px 0 17px;
        }

        .cta_service_info p {
            font-size: 12px;
            font-weight: 500;
            line-height: 23px;
            color: #373737;
            margin: 7px 0 10px;
            height: 7rem;
            overflow: auto;
        }
    }

    @media (min-width: 576px) and (max-width: 767px) {
        .main_banner-section {
            width: 23rem;
        }

        .hero-section-h-responsive {
            height: 440px !important;
            padding: 0px !important;
        }

        .responsive-style-btn {
            margin: 0 0 0 30px !important;
        }

        .heading-responsive-style {
            font-size: 37px !important;
            padding: 0px 0 0 30px !important;
        }

        .random_program_data_1 {
            height: 300px;
            overflow: hidden;
        }
    }

    @media (min-width: 768px) {
        .responsive-style-btn {
            padding: 10px 0 !important;
        }

        .heading-responsive-style {
            font-size: 18px !important;
        }
    }


    @media only screen and (max-width: 768px) {

        .map-main-div {
            height: 400px !important;
            width: 100% !important;
        }

        .section-margin-y {
            margin: 20px auto !important;
        }

        .left-s-h-cls {
            height: 200px !important;
        }

        .reviews {
            text-align: center !important;
        }

        .for-bold {
            font-size: 25px;
        }

        .for-main {
            margin-bottom: 4rem;
        }

        .hero-section-main-heading {
            font-size: 20px !important;
        }

        /*
        #program_title {
            font-size: 15px !important;
        } */
    }

    @media only screen and (min-width: 1024px) and (max-width: 1279px) {
        .for-border {
        min-height: 237px !important;
    }
        .single-event::before{
            left: calc(33% - 0.5px) !important;
        }
        .news-events-tabs-section{
            padding-left: 0px !important;
        }
  
        .main_banner-section {
            width: 25rem;
        }

        .hero-section-main-heading {
            font-size: 35px !important;
        }

        .left-content {
            width: 28rem;
        }

        .card-shadow {
            min-height: 95vh;
        }

        .percent1 {
            margin: 0 -103px 1.5rem 160px;
        }

        .percent2 {
            margin: 0 -77px 1.5rem 104px;
        }

        .percent3 {
            margin: 0 -53px 1.5rem 50px;
        }
        .text-video-overlay h2{
            font-size: 1.4rem !important;
        }
    }

    @media only screen and (min-width: 769px) and (max-width: 1024px) {
        .single-event::before{
            left: calc(33% - 0.5px) !important;
        }
        .news-events-tabs-section{
            padding-left: 0px !important;
        }
        .main_banner-section {
            width: 25rem;
        }

        h2 {
            font-size: 24px !important;
        }

        h5 {
            font-size: 18px !important;
        }

        .about-img {
            height: 365px !important;
        }

        .hero-section-main-heading {
            font-size: 30px !important;
        }

        .cus-padding {
            padding-left: 25px !important;
        }

        #program_title {
            font-size: 15px !important;
        }
    }


    @media only screen and (min-width: 1281px) {
        .text-video-overlay h2{
    font-size: 2rem !important;
}
        .prep_card-image {
            height: 15rem;
        }

        .main_banner-section {
            width: 40rem;
        }

        .heading-responsive-style {
            font-size: 30px !important;
        }
    }

    @media only screen and (min-width: 1350px) {
        .card-shadow {
            min-height: 95vh;
        }

        .shadow_msg {
            height: 3.5rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            height: 2.4rem !important;
        }

        .form_sm {
            height: 2.4rem !important;
        }

    }

    @media only screen and (min-width: 1440px) {
        .main-content-feature {
            height: 81vh;
            overflow: auto;
        }

        .content-features {
            height: 100% !important;
        }

        .content-feature {
            height: 100% !important;
        }

        .accordion {
            max-height: 720px !important;
        }

        .logos {
            min-width: 100rem !important;
        }

        .about-img {
            /* padding: 0px 25px 0px 0px !important; */
            height: 400px;
        }

        .about_us {
            height: 75vh;
        }

        .percent-video {
            padding: 0px 25px 0px 0px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            height: 2.3rem !important;
        }

        .form_sm {
            height: 2.3rem !important;
        }

        .video {
            height: 610px;
        }
    }

    @media only screen and (min-width: 1560px) {
        .main-content-feature {
            align-items: center
        }

        .content-feature1 {
            margin: 30px 0px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .shadow_msg {
            height: 5rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .shadow_msg {
            height: 5rem !important;
        }

        .percent4 {
            margin: 0 -14px 1.5rem -8px !important;
        }

        /* .top-center {
            left: 30% !important;
            transform: translate(-20%, 0%) !important;
        } */
    }

    @media screen and (width < 1650px) {

        /*   #program_title {
            font-size: 20px !important;
        } */

        #program_subtitle {
            font-size: 18px !important;
        }

        #program_desc {
            font-size: 16px !important;
            line-height: normal;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }

        .random_program_data_2 {
            font-size: 20px !important;

        }

    }

    @media only screen and (min-width: 1650px) {

        .news-events-tabs-section .news-events-tab .tab-content {
        height: 380px !important;
    }
        .logos {
            min-width: 125rem !important;
        }

        p {
            font-size: 20px !important;
        }

        h5 {
            font-size: 25px !important;
        }

        .percent1 {
            margin-top: 110px !important;
        }

        .percent4 {
            margin-bottom: 110px !important;
        }

        .prep_card-image {
            height: 13rem;
        }

        .left-content {
            width: 45rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .shadow_msg {
            height: 5rem !important;
        }

        .icon-img {
            max-width: 7% !important;
        }

        .for-label {
            font-size: 18px;
        }

        .widget-49-pro-title {
            font-size: 14px;
        }
    }

    @media only screen and (min-width: 1800px) {
        .flowdiv {
        padding: 5rem 3.5rem !important;
    }
        .card-date {
            font-size: 18px !important;
        }

        .image-date {
            font-size: 18px !important;
        }

        .category {
            font-size: 18px !important;
        }

        .ml_span {
            margin-left: -445px;
        }

        .Faq-btn,
        .content-features-btn {
            font-size: 18px;
            border-radius: 20px !important;
        }

        .btn_glo {
            border-radius: 20px;
            font-size: 18px;
        }

        .text-video-overlay {
            padding: 40px 0px;
        }

        .video-controls {
            padding: 25px 35px;
        }

        .fa-play {
            font-size: 30px !important;
        }

        .events-content .single-event::before {
            left: 18%;
        }

        .custom-button-call-to-action {
            font-size: 18px !important;
            border-radius: 20px !important;
        }

        .custom-button-call-to-action:hover {
            font-size: 18px !important;
        }
/* 
        .for-backcolor-container {
            padding: 0px 55px !important;
        } */

        .faqs-row {
            padding: 0px 20px !important;
        }
        .about-img {
            height: 460px !important;
        }

        .logo-text {
            font-size: 25px;
        }

        .logos-img {
            height: 120px;
            width: 120px;
        }

        .logos-img2 {
            height: 120px;
            width: 120px;
        }

        .logos-img3 {
            height: 128px;
            width: 128px;
        }

        .logos-img4 {
            height: 115px;
            width: 128px;
        }


        .logos-img5 {
            height: 120px;
            width: 120px;
        }

        .logos-img6 {
            height: 100px;
            width: 128px;
        }

        .logos-img7 {
            height: 120px;
            width: 120px;
        }

        .logos-img8 {
            height: 120px;
            width: 120px;
        }

        .card-shadow {
            min-height: 79vh;
        }

        .about_us {
            /* padding: 0px 75px !important; */
            height: 89vh !important;
        }

        .percent-video {
            max-height: 830px;
            min-height: 830px;
            padding: 0px 20px 0px 0px !important;
        }

        .for-border {
            min-width: 92%;
        }

        .percent_wrapper {
            padding: 157px 0;
        }

        .percent-row {
            padding: 0px 38px !important;
        }

        .percent {
            font-size: 60px;
        }

        .percent1 {
            margin: 0 -166px 1.5rem 230px;
        }

        .percent2 {
            margin: 0 -127px 1.5rem 155px;
        }

        .percent3 {
            margin: 0 -83px 1.5rem 85px;
        }

        .percent4 {
            margin: 0 -39px 1.5rem 0px;
        }

        .percent-padd {
            padding: 134px 0 !important;
        }

        .content-feature {
            height: 100%;
        }

        .content-features-p {
            font-size: 20px;
        }

        .content-features2-hh {
            font-size: 2rem;
        }

        .main_banner-section {
            width: 45rem !important;
        }

        /*
        .hero-section-main-heading {
            line-height: .9;
        } */

        .video {
            height: 835px;
        }

        .tab-about label {
            font-size: 20px;
        }

        .prep_card {
            height: 300px;
        }

        .prep_card-image {
            height: 16rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .shadow_msg {
            height: 8rem !important;
        }

        .content-features {
            min-width: 580px !important;
            max-width: 580px !important;
            height: 100%;
            /* margin-left: 45px; */
            margin-right: 45px;
        }

        .main-content-feature {
            height: 81vh;
            overflow: auto;
        }

        .content-feature {
            padding-left: 43px !important;
        }

    }

    @media only screen and (min-width: 2560px) {

        .custom_heading_1 {
            font-size: 35px;
        }

        .custom_paragraph {
            font-size: 25px;
        }

        .p-shadow {
            font-size: 20px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 22px;

        }

        .select2-container .select2-selection--single {
            height: 3.5rem !important;
        }

        .form_sm {
            height: 3.5rem !important;
        }

        .shadow_msg {
            height: 9rem !important;
        }

    }

    .custom_border_radius {
        border-radius: 40px !important;
    }

    .top-padd {
        padding-top: 4rem;
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

    .section-padding-y {
        padding-top: 60px !important;
        padding-bottom: 60px !important
    }

    .banner-img {
        width: 100%;
    }

    .cus-padding {
        padding-left: 70px;
    }

    .counter-section .counter_wrapper .single_counter h3 {
        min-width: 115px !important;
        margin-right: 0px !important;
    }

    .counter-padd {
        justify-content: space-between;

    }

    .custom-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 10px;
    }

    .custom-slider {
        display: flex;
        width: 400% !important;
        /* Total width is 4 times the width of a single custom-slide (4 slides in this example) */
        transition: transform 0.3s ease;
        /* Smooth transition for custom-slide movement */
    }

    .custom-slide {
        flex: 0 0 25%;
        /* Each custom-slide takes up 25% of the custom-slider width (4 slides per row) */
        box-sizing: border-box;
        padding: 0;
        text-align: center;
        position: relative;
    }

    .custom-slide img {
        width: 100%;
        height: 70vh;
        filter: brightness(70%);
        border-radius: 10px;
        transition: transform 0.6s ease;
    }

    .custom-slide:hover img {
        transform: scale(1.1);
        border-radius: 10px;
    }

    /* Overlay styles */
    .custom-slide .overlay {
        position: absolute;
        border-radius: 10px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background-color: #2441e7; */
        opacity: 0;
        transition: opacity 0.6s ease;
    }

    /* Text overlay styles */
    .text-overlay {
        position: absolute;
        bottom: 7%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        color: white;
    }

    /* Text overlay styles */
    .text-overlay p {
        color: white;
        /* Text color */
    }
.category_name{
    color: var(--system_primery_color);
}
    .image-text {
        color: white;
    }

    /* Date overlay styles */
    .date-overlay {
        position: absolute;
        top: 30px;
        right: 30px;
        background-color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .image-date {
        margin: 0;
        color: black;
        font-size: 12.5px;
    }

    button.prev,
    button.next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.5);
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1.5em;
        padding: 10px;
        z-index: 1;
    }

    button.prev {
        left: 30px;
    }

    button.next {
        right: 30px;
    }

    .category {
        position: absolute;
        font-size: 12.5px;
        top: 30px;
        left: 30px;
        background: rgba(255, 255, 255, 0.5);
        padding: 5px 10px;
        border-radius: 10px;
    }

    /* Custom CSS for the card */
    .custom-card {
        position: relative;
        overflow: hidden;
        color: white;
        border-radius: 10px !important;
    }

    .custom-card img {
        filter: brightness(70%);
        border-radius: 10px;
        height: 70vh;
        transition: transform 0.6s ease;
    }

    .custom-card:hover img {
        transform: scale(1.1);
    }

    .custom-card .card-img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 20px;
        transition: background-color 0.3s ease;
        background-color: transparent;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .custom-card h5 {
        position: absolute;
        bottom: 5%;
        left: 30px;
        color: white;
    }

    .card-date {
        position: absolute;
        top: 35px;
        left: 30px;
        font-size: 12.5px;
    }
.card_date_heading{
    background-color: white;
    color: black;
    padding: 5px 10px;
    border-radius: 5px;

}
    /* secondayr call to action by arsam  */
    .online-learning {
        position: relative;
        /* Ensure relative positioning for absolute pseudo-element */
        background-image: url(https://demoapus2.com/edumy/wp-content/uploads/2019/06/call-to-action-01.jpg);
        color: white;
        /* Set text color to white for better visibility */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 999;
        height: 83vh;
    }

    .online-learning::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--footer_background_color);
        opacity: 0.7;
        /* Adjust opacity to your preference */
        z-index: -1;
        /* Ensure the pseudo-element is behind the content */
    }

    /* Custom CSS for the button */
    .custom-button-call-to-action {
        font-size: 12.5px;
        font-weight: 700;
        border: 2px solid white !important;
        border-radius: 16px;
        color: white !important;
        background-color: transparent !important;
        transition: all 0.3s ease;
        /* Smooth transition for hover effect */
    }

    .custom-button-call-to-action:hover {
        font-size: 12.5px;
        font-weight: 700;
        background-color: white !important;
        color: black !important;
        border-color: white !important;
    }
</style>

@section('mainContent')
    {{-- MainBanner --}}
    {{-- zaheer --}}
    <section class="sec-1 show-animate">
        <div class="container-fluid px-0 g-0 ">
            <div class="row mb-3">
                <div class="col-md-8 pl-md-0 hero-section-h-responsive">
                    <div class="main_bannar d-flex align-items-start justify-content-center flex-column py-5 pl-5">

                        <div class="main_banner-section cus-padding">

                            <h1 class="hero-section-main-heading">
                                BECOME A LICENSED HEALTHCARE PROFESSIONAL
                            </h1>
                            <p class="mt-4 hero-section-p mb-5"> <span class="font-weight-bold">Adult Learners: </span> Your
                                Guide to Choosing the <span class="font-weight-bold">Perfect Prep Course</span> to Help
                                <span class="font-weight-bold">ACE</span> the NCLEX, CPT, CPhT, CMA, or other Healthcare
                                Licensing Exam on the <span class="font-weight-bold"> First Try!</span>
                            </p>

                            @guest
                                <a href="{{ url('/register') }}" class="btn_glo read_more text-white px-4 py-2">
                                    Enroll Now
                                </a>

                            @endguest
                        </div>
                    </div>
                </div>

                <div class="col-md-4 old_row pl-0">
                    @if (isset($random_program))
                        <div class="row" id="random_programs">
                            <div class="col-6 first_div random_program_data_1 height-card px-0">
                                <img id="program_icon" src="{{ $random_program->icon }}"
                                    class="w-100 h-100 imgcls object-fit-cover img-fluid height-card">
                            </div>
                            <div class="col-6 first_div height-card px-0">
                                <a href="{{ route('programs.detail', ['id' => $random_program->id]) }}"
                                    class="d-flex flex-column h-100 justify-content-center small_section_bg_color">
                                    <h5 class="font-weight-bold px-2 px-lg-4 pt-4 text-white" id="program_title">
                                        {{ $random_program->programtitle }}
                                    </h5>
                                    <h5 class="font-weight-bold px-2 px-lg-4 text-white" id="program_subtitle">
                                        {{ $random_program->subtitle }}
                                    </h5>
                                    <p class="px-2 px-lg-4 text-white" style="margin-bottom:0.5rem" id="program_desc">

                                        @php
                                            $program_description = strip_tags($random_program->discription);
                                        @endphp
                                        @if (Str::length($program_description) > 100)
                                            {{ Str::limit($program_description, 100, '...') }}
                                        @else
                                            {{ $program_description }}
                                        @endif
                                    </p>
                                    <h5 class="px-2 px-lg-4 pt-2 text-white" id="program_cost">
                                        ${{ $random_program->totalcost }}
                                    </h5>
                                </a>
                            </div>

                            <div class="col-6 random_program_data_2 height-card">
                                <div class="d-flex flex-column h-100 justify-content-center py-2 py-sm-3 py-md-0">
                                    <h5 class="font-weight-bold custom_heading_2 heading-responsive-style mb-4">
                                        Accelerate Your Future
                                        <br>
                                        Learn New Things
                                        <br>
                                        Get New skills,
                                        <br> JOIN US !
                                    </h5>
                                    <a class="theme_btn small_btn mt-2 text-center responsive-style-btn"
                                        href="{{ url('/prep-courses') }}">View
                                        Courses</a>
                                </div>
                            </div>
                            <div class="col-6 height-card random_program_data_1 px-0">
                                {{-- <div class=""> --}}
                                <img src="http://mchnursing.com/lms/public/uploads/homepage/home_banner.jpg" alt=""
                                    class="w-100 h-100 imgcls object-fit-cover img-fluid height-card" style="">
                                {{-- </div> --}}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            {{-- banner imagadd 2ndsection --}}
            {{-- <section class="d-flex justify-content-center align-items-center custom-padding">
            <div class="banner-img">
                <img src="{{ asset('/public/uploads/images/footerimg/WE ARE HERE TO LISTEN (2).png') }}"
                    class="h-100 w-100">
                <div>
        </section> --}}
            {{-- 3rdsection --}}
            {{-- features section --}}
        </div>
    </section>
    <section class="sec-2">
        <div class="container p-lg-5 p-3">
            <div class="row px-xl-5 main-content-feature ">
                <div class="col-5 content-features">
                    <div class="content-features1 px-xl-5 px-md-2 ">
                        <h2 class="content-features-h font-weight-bold">BEYOND KNOWLEDGE, EDUCATION TRANSFORMS LIVES
                            ANYWHERE</h2>
                        <p class="content-features-p">We understand that life doesn't always stop for education. That's
                            why we offer a truly
                            affordable and flexible learning experience that fits your schedule and lifestyle.</p>
                        <a href="{{ route('about') }}"><button class="content-features-btn py-2 px-4">How it
                                Works</button></a>
                    </div>
                </div>
                <div id="content-container" class="col-7 d-flex content-feature">
                    <div class="col-6 content-features2 d-flex flex-column ">
                        <div class=" px-2 content-feature1">
                            <h2 class="content-features2-h font-weight-bold">01</h2>
                            <h5 class="content-features2-hh font-weight-bold">Are You Struggling in Your <br>Nursing
                                Program?
                            </h5>
                            <p class="content-features2-p">Feeling overwhelmed or bewildered by the material? You may catch
                                up, understand, and succeed in nursing classes with our support.</p>
                        </div>
                        <div class="content-feature1 px-2">
                            <h2 class="content-features2-h font-weight-bold">03
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Having Trouble Passing the<br> HESI Exit Exam?
                            </h5>
                            <p class="content-features2-p">Don't let HESI stop your healthcare career. Helping you gain the
                                skills and knowledge you need to confidently pass the exam.</p>
                        </div>
                        <div class="content-feature1 px-2">
                            <h2 class="content-features2-h font-weight-bold">05
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Do You Get Test Anxiety or<br> Feel
                                Apprehensive Before Exams?
                            </h5>
                            <p class="content-features2-p">You'll learn how to control test anxiety and ace healthcare
                                tests. </p>
                        </div>
                        <div></div>
                    </div>
                    <div class="col-6 content-features2 d-flex flex-column ">
                        <div class="px-2 content-feature1">
                            <h2 class="content-features2-h font-weight-bold">02</h2>
                            <h5 class=" content-features2-hh font-weight-bold">Fail to Apply Knowledge to <br>NCLEX
                                Questions?
                            </h5>
                            <p class="content-features2-p">Knowledge is only half the battle. We can educate you about
                                NCLEX exam methods and how to use your knowledge.</p>
                            <div></div>
                        </div>
                        <div class="content-feature1 px-2">
                            <h2 class="content-features2-h font-weight-bold">04
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Healthcare Course <br>Failure?
                            </h5>
                            <p class="content-features2-p">Return to form! We can identify your deficiencies, provide
                                personalized assistance, and help you succeed in healthcare classes.</p>
                        </div>
                        <div class="content-feature1 px-2">
                            <h2 class="content-features2-h font-weight-bold">06
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Need Help Starting Your<br> Healthcare
                                Journey?
                            </h5>
                            <p class="content-features2-p">We can assist with program selection and entrance exam
                                preparation. Let us help you start your healthcare career. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- features end --}}

    {{-- component-call sec-3 --}}
    {{-- @elseif($block->id == 4) --}}
    @if ($homeContent->show_instructor_section == 1)
        <x-home-page-instructor-section :homeContent="$homeContent" />
    @endif


    {{-- Custom Slider by Arsam --}}
    <section class="sec-4">
        <div class="container px-lg-5 pt-5">
            <div class="row text-center main_row mb-5">
                <h2 class="font-weight-bold">Gain the Edge in Healthcare School & Beyond</h2>
                <p class="custom_paragraph">Adult-Focused Programs & Prep-Courses Prepare You for NCLEX® & Career
                    Licensure.</p>
            </div>
            <div class="row d-flex align-items-stretch pb-5 px-xl-5 animate">
                <div class="col-md-6 mb-2 px-0">
                    <div class="custom-slider-container">
                        <button class="prev">❮</button>
                        <div class="custom-slider">
                            @php
                                $recent_programs = $latest_programs;
                                $first_program = $recent_programs->first();
                                if ($first_program) {
                                    $recent_programs = $recent_programs->except($first_program->id);
                                }
                            @endphp
                            @php
                                $recent_courses = $latest_courses;
                                $first_course = $recent_courses->first();
                                if ($first_course) {
                                    $recent_courses = $recent_courses->except($first_course->id);
                                }
                                $i = 0;
                            @endphp
                            @foreach ($recent_programs as $keyprograms => $thisprogram)
                                <div class="custom-slide">
                                    <img src="{{ getCourseImage($thisprogram->image) }}" alt="Image 1">
                                    <div class="overlay"></div>
                                    <div class="text-overlay px-4 py-2">
                                        <a href = "{{ route('programs.detail', [$thisprogram->id]) }}">
                                            <h5 class="image-text font-weight-bold">{{ $thisprogram->programtitle }}</h5>
                                        </a>
                                        {{-- <br> --}}
                                        <p>
                                            @php
                                                $description = str_replace(
                                                    '&nbsp;',
                                                    ' ',
                                                    htmlspecialchars_decode(strip_tags($thisprogram->discription)),
                                                );
                                            @endphp
                                            @if (Str::length($description) > 120)
                                                {{ Str::limit($description, 120, '...') }}
                                            @else
                                                {{ $description }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="category">
                                        <span class="category_name">Program</span>
                                    </div>
                                    <div class="date-overlay">
                                        <span class="image-date">${{ $thisprogram->currentProgramPlan[0]->amount }}</span>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($recent_courses as $keycourses => $thiscourse)
                                @if (array_key_exists($keycourses, $recent_courses->toArray()))
                                    <div class="custom-slide">
                                        <img src="{{ getCourseImage($thiscourse->image) }}" alt="Recent Courses Image">

                                        <div class="overlay"></div>
                                        <div class="text-overlay">
                                            <a
                                                href="{{ !empty($thiscourse->parent_id) ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) . '?courseType=' . $thiscourse->type : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}">
                                                <h5 class="image-text font-weight-bold">
                                                    {{ !empty($thiscourse->parent_id) ? $thiscourse->parent->title : $thiscourse->title }}
                                                </h5>
                                            </a>
                                            <br>
                                            <p>
                                                @php
                                                    $requirements = str_replace(
                                                        '&nbsp;',
                                                        ' ',
                                                        htmlspecialchars_decode(
                                                            strip_tags(
                                                                !empty($thiscourse->parent_id)
                                                                    ? $thiscourse->parent->requirements
                                                                    : $thiscourse->requirements,
                                                            ),
                                                        ),
                                                    );
                                                @endphp
                                                @if (Str::length($requirements) > 120)
                                                    {{ Str::limit($requirements, 120, '...') }}
                                                @else
                                                    {{ $requirements }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="category">
                                            <span class="text-white">
                                                @if ($thiscourse->type == 1)
                                                    {{ __('Course') }}
                                                @elseif($thiscourse->type == 2)
                                                    {{ __('Big Quiz') }}
                                                @elseif($thiscourse->type == 3)
                                                    {{ __('Individual Course') }}
                                                @elseif($thiscourse->type == 4)
                                                    {{ __('Full Course') }}
                                                @elseif($thiscourse->type == 5)
                                                    {{ __('Prep-Course (On-Demand)') }}
                                                @elseif($thiscourse->type == 6)
                                                    {{ __('Prep-Course (Live)') }}
                                                @elseif($thiscourse->type == 8)
                                                    {{ __('Repeat Course') }}
                                                @elseif($thiscourse->type == 9)
                                                    {{ __('Tutor Course') }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="date-overlay">
                                            <span class="image-date">${{ number_format($thiscourse->price, 0) }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="next">❯</button>
                    </div>

                </div>
                @php

                @endphp
                <div class="col-md-6">
                    <div class="row">
                        @if ($first_program)
                            <div class="col-md-6 px-lg-2">
                                <div class="card custom-card">
                                    <img src="{{ getCourseImage($first_program->icon) }}" class="card-img"
                                        alt="...">
                                    {{-- <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/1105-pe3njtkqt5gexzmb6f3gua5ab17rzk5a1ccdwchmj0.jpg"
                                    class="card-img" alt="..."> --}}
                                    <div class="card-img-overlay">
                                        <h5 class="card-title font-weight-bold">{{ $first_program->programtitle }}</h5>
                                        <div class="card-date">
                                            <span
                                                class="card_date_heading">${{ number_format($first_program->currentProgramPlan[0]->amount, 0) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($first_course)
                            <div class="col-md-6 px-lg-2">
                                <div class="card custom-card">
                                    <img src="{{ getCourseImage($first_course->thumbnail) }}" class="card-img"
                                        alt="...">
                                    {{-- <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/301242-pe3njtkqt5gexzmb6f3gua5ab17rzk5a1ccdwchmj0.jpg"
                                    class="card-img" alt="..."> --}}
                                    <div class="card-img-overlay">
                                        <h5 class="card-title font-weight-bold">
                                            {{ !empty($first_course->parent_id) ? $first_course->parent->title : $first_course->title }}
                                        </h5>
                                        <div class="card-date">
                                            <span class="card_date_heading">${{ number_format($first_course->price, 0) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 mt-5 text-center">
                    <a href="{{ route('programs') }}" class="small_btn5 theme_btn py-2 px-4">View all Programs </a>

                </div>
            </div>
        </div>
    </section>
    {{-- Custom Slider End --}}

    {{-- percent section --}}
    <section class="sec-5 percent-section">
        {{-- <div class=""> --}}
            <div class="container px-lg-5 pb-5 mt-3">
                <div class="row percent-row px-xl-5">
                    <div class="col-lg-6 d-flex flex-column counter-padd px-0 ">

                        <div class="d-flex justify-content-left align-items-center percent1 animatee">
                            <h2 class="percent font-weight-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340" width="50"
                                    height="40">
                                    <g data-name="Layer 29">
                                        <path
                                            d="M295.094 120.483a11.956 11.956 0 0 1 11.955 11.956v12.288a12.193 12.193 0 0 1-5.634 10.428c-4.034 2.487-10.741 4.05-21.638.932a1.73 1.73 0 0 1-.7-2.936c2.255-2.031 5.084-5.632 4.391-10.537a45.723 45.723 0 0 1-.29-11.125 11.972 11.972 0 0 1 11.916-11.006z"
                                            style="fill:#ffc676" />
                                        <path
                                            d="M66.582 229.353s-20.584-31.059 0-95.515c0 0 9.792-39.71 35.257-37.318 0 0 14.345 28.784 15.784 53.486 0 0 2.878 62.762-17.267 84.622 0 0-19.104 13.637-33.774-5.275z"
                                            style="fill:#595975" />
                                        <path
                                            d="M113 23.5a43 43 0 0 0-12.811-1.419 8.247 8.247 0 0 0-7.794 7.3C90.667 45.262 80.967 90.6 26.876 131.991a8.263 8.263 0 0 0-2.208 10.641 32.392 32.392 0 0 0 14.662 13.18S96.949 90.792 113 23.5z"
                                            style="fill:#b8c7dd" />
                                        <path
                                            d="M110.8 13.959s-4.574 34.073-35.1 80.46Q70.493 117.6 49.592 128.9c-7.414 8.608-15.712 17.422-25 26.336a46.741 46.741 0 0 0 32.2 21.591 9.38 9.38 0 0 0 10.735-7.875 157.421 157.421 0 0 1 3.434-16.252c1.147-15.669 7.879-30.606 18.306-45.057a223.538 223.538 0 0 1 49.6-60.45 9.425 9.425 0 0 0 2.172-11.577C137.076 28.192 128.4 17.28 110.8 13.959z"
                                            style="fill:#fff" />
                                        <path
                                            d="M70.961 152.7a196.721 196.721 0 0 1 18.306-45.057l-14.915-11.19A337.064 337.064 0 0 1 49.588 128.9c4.497 8.441 11.278 17.408 21.373 23.8z"
                                            style="fill:#b8c7dd" />
                                        <path
                                            d="m55.654 108.89 13.124 13.319a15.687 15.687 0 0 0 11.174 4.677 15.689 15.689 0 0 1 11.442 4.955l17.5 18.654s2.367-37.123-7.052-53.975L83.605 79.1a12.4 12.4 0 0 0-17.011-.128 89.855 89.855 0 0 0-12.208 14 12.455 12.455 0 0 0 1.268 15.918z"
                                            style="fill:#ffd4ca" />
                                        <path
                                            d="M261.254 176.488s56.593 26.454 55.1 157.471H151s5.949-70.127-42.545-86.773a27.929 27.929 0 0 0-14.677-1c-8.051 1.657-23.235 2.071-27.2-16.83 0 0 7.294 10.335 22.1.5 21.989-14.613 21.105-93.356 13.16-133.33 17.031 7.187 31.1 21.584 41.453 45.011a65.824 65.824 0 0 0 11.337 17.552c2.762 3.055 5.02 5.32 5.02 5.32s35.082 27.991 101.606 12.079z"
                                            style="fill:#797996" />
                                        <path style="fill:#cbd5ea"
                                            d="m245.36 183.609-20.09-17.006h-22.309l-20.09 17.006 31.181 53.928 31.308-53.928z" />
                                        <path
                                            d="m206.345 188.748-3.384 30.6 10.639 15.28 10.636-15.277-2.94-26.594c-5.16-7.391-14.951-4.009-14.951-4.009z"
                                            style="fill:#ff6d8d" />
                                        <path d="M206.345 188.748a18.458 18.458 0 0 1 14.949 4.009l-2.261-20.447h-10.87z"
                                            style="fill:#e5486e" />
                                        <path
                                            d="m228.039 160.1 18.25 13.86-9.125 18.918L213.6 174.54s4.968-9.999 14.439-14.44zM199.156 160.1 177.9 170.357l12.132 22.52L213.6 174.54s-4.973-9.999-14.444-14.44z"
                                            style="fill:#fff" />
                                        <path style="fill:#ffd4ca"
                                            d="M199.156 152.822v7.277l14.442 14.441 14.441-14.441v-7.022l-28.883-.255z" />
                                        <path
                                            d="m246.289 173.959-32.11 54.1-35.641-60.53a10.441 10.441 0 0 0-8.054-5.107 20.867 20.867 0 0 0-10.835 1.978l50.909 82.527a4.255 4.255 0 0 0 7.242 0l43.454-70.442s-7.708-4.175-14.965-2.526z"
                                            style="fill:#fff" />
                                        <path d="M228.039 139.153h-28.883v13.669a49.712 49.712 0 0 0 28.883.255z"
                                            style="fill:#f99c9c" />
                                        <path
                                            d="M292.056 65.631a247.292 247.292 0 0 0-67.878-53.587 21.227 21.227 0 0 0-20 0A247.3 247.3 0 0 0 136.3 65.631a11.337 11.337 0 0 0 .38 15.393c34.668 35.586 77.5 42.81 77.5 42.81s42.829-7.224 77.5-42.81a11.337 11.337 0 0 0 .376-15.393z"
                                            style="fill:#797996" />
                                        <path d="M195.251 79.928s-16.706 0-24.6 6.855c0 0-2.5 22.641 12.3 29.233z"
                                            style="fill:#ffc676" />
                                        <path
                                            d="M184.723 118.01s-2.1-6.892-6.535-10.943c-5.124-4.676-13.312-.936-13.412 6-.047 3.266.909 7.375 4.213 12.014 8.309 11.668 18.032 3.182 18.032 3.182z"
                                            style="fill:#f99c9c" />
                                        <path d="M233.107 79.928s16.706 0 24.6 6.855c0 0 2.5 22.641-12.3 29.233z"
                                            style="fill:#ffc676" />
                                        <path
                                            d="M243.635 118.01s2.095-6.892 6.535-10.943c5.124-4.676 13.312-.936 13.412 6 .047 3.266-.909 7.375-4.213 12.014-8.309 11.668-18.032 3.182-18.032 3.182z"
                                            style="fill:#f99c9c" />
                                        <path
                                            d="M233.107 79.928a104.352 104.352 0 0 0-37.856 0s-17.069 21.631-12 44.953 30.927 21.463 30.927 21.463 25.856 1.859 30.927-21.463-11.998-44.953-11.998-44.953z"
                                            style="fill:#ffd4ca" />
                                        <path
                                            d="M256.875 71.784a11.935 11.935 0 0 0-3.868-8.187 61.883 61.883 0 0 0-21.534-12.512 53.328 53.328 0 0 0-34.589 0A61.879 61.879 0 0 0 175.351 63.6a11.931 11.931 0 0 0-3.868 8.187l-.832 15s14.772-6.855 43.528-6.855 43.528 6.855 43.528 6.855z"
                                            style="fill:#595975" />
                                        <path
                                            d="M202.784 112.049a3.5 3.5 0 0 1-3.5-3.5V105.3a3.5 3.5 0 0 1 7 0v3.247a3.5 3.5 0 0 1-3.5 3.502zM225.574 112.049a3.5 3.5 0 0 1-3.5-3.5V105.3a3.5 3.5 0 0 1 7 0v3.247a3.5 3.5 0 0 1-3.5 3.502zM214.132 134.43c-8.416 0-12.458-3.776-13.805-5.4a3.5 3.5 0 1 1 5.388-4.47c.4.48 2.671 2.869 8.417 2.869s8.018-2.389 8.416-2.868a3.5 3.5 0 1 1 5.387 4.47c-1.346 1.624-5.387 5.399-13.803 5.399z"
                                            style="fill:#f99c9c" />
                                        <path
                                            d="M262.818 173.355c-.9-.474-8.1-4.093-15.626-3.1l-15.653-11.888v-11.742a28.9 28.9 0 0 0 13.827-12.436 15 15 0 0 0 3.957.548c3.892 0 8.628-1.632 12.9-7.625 3.294-4.624 4.93-9.367 4.862-14.094a11.677 11.677 0 0 0-1.925-6.31 154.956 154.956 0 0 0 26.227-20.464v30.141a15.583 15.583 0 0 0-12.4 13.913 49.028 49.028 0 0 0 .311 11.9c.764 5.405-4.964 8.767-5.191 8.9a3.5 3.5 0 0 0 .566 6.361 48.052 48.052 0 0 0 15.515 2.979 23.13 23.13 0 0 0 12.365-3.2 15.768 15.768 0 0 0 7.3-13.409v-12.292a15.469 15.469 0 0 0-11.465-14.914V72.949a3.51 3.51 0 0 0-.052-.516 14.79 14.79 0 0 0-3.645-9.112 250.672 250.672 0 0 0-68.867-54.367 24.735 24.735 0 0 0-23.291 0 250.625 250.625 0 0 0-68.861 54.367 14.912 14.912 0 0 0 .5 20.146 154.2 154.2 0 0 0 29.028 23.24 11.68 11.68 0 0 0-1.927 6.311c-.068 4.726 1.568 9.468 4.862 14.094 4.26 5.981 8.971 7.634 12.878 7.634a14.983 14.983 0 0 0 3.987-.556 28.636 28.636 0 0 0 12.655 11.892V157.9l-14.636 7.063a13.947 13.947 0 0 0-10.224-6.025 24.808 24.808 0 0 0-10.292 1.322 177.763 177.763 0 0 1-3.28-3.525 62.209 62.209 0 0 1-10.733-16.621c-10.173-23.017-24.528-38.66-42.66-46.531l-1.087-1.038a226.084 226.084 0 0 1 38.417-42.707 12.869 12.869 0 0 0 2.968-15.871c-3.833-7.178-13.175-19.768-32.677-23.447a3.5 3.5 0 0 0-4.117 2.97c-.009.069-.278 1.924-1.041 5.268a42.049 42.049 0 0 0-6.286-.176A11.7 11.7 0 0 0 88.918 29c-.865 7.946-3.88 23.939-14.165 43.179a15.8 15.8 0 0 0-10.545 4.234 92.982 92.982 0 0 0-12.686 14.55 16 16 0 0 0-1.607 15.558 204.755 204.755 0 0 1-25.166 22.691 11.817 11.817 0 0 0-3.126 15.149 33.034 33.034 0 0 0 3.717 5.256c-1.053 1.034-2.1 2.071-3.169 3.1a3.5 3.5 0 0 0-.654 4.191A49.958 49.958 0 0 0 54.138 179.9c-1.614 30.848 7.21 47.526 9.163 50.8 3.451 15.162 15.059 22.23 31.182 18.91a24.425 24.425 0 0 1 12.835.885c45.318 15.557 40.25 82.494 40.194 83.169-.009.1-.013.2-.013.294h7.011a136.375 136.375 0 0 0-3.189-37.939c-6.274-26.9-18.636-45.082-43.881-52.8a26.478 26.478 0 0 0 7.411-8.063 3.5 3.5 0 1 0-6.059-3.507c-5.449 9.412-19.172 11.617-19.371 11.647-.025 0-.047.014-.072.018-7.132.69-12.421-1.317-15.8-6.017 4.326.833 10.041.13 17.063-4.536 22.947-15.25 22.57-88.944 15.882-130.093 14.057 7.791 25.087 21.033 33.591 40.274a69.185 69.185 0 0 0 11.943 18.485 174.709 174.709 0 0 0 4.847 5.15l54.325 88.06a3.5 3.5 0 0 0 5.957 0l45.269-73.385c4.619 3.069 14.552 10.978 24.315 27.268 12.33 20.573 26.87 59.028 26.116 125.439h7c.772-68.482-14.528-108.321-27.5-129.684-13.979-23.017-28.245-30.294-29.539-30.92zm40.03-41.818v12.288a8.726 8.726 0 0 1-3.972 7.45c-3.8 2.341-9.253 2.765-15.976 1.272a14.426 14.426 0 0 0 3.327-11.324 41.933 41.933 0 0 1-.267-10.352 8.457 8.457 0 0 1 16.888.666zM113.6 18.182a37.863 37.863 0 0 1 24.35 19.082 5.908 5.908 0 0 1-1.376 7.283 233.334 233.334 0 0 0-38.962 43.1l-8.622-8.235c13.843-24.386 22.777-52.222 24.61-61.23zM95.877 29.76a4.725 4.725 0 0 1 4.5-4.187 33.686 33.686 0 0 1 4.154.051c-3.05 10.794-9.155 28.1-20.9 49.063a15.79 15.79 0 0 0-1.76-.965C91.964 54.218 94.982 37.969 95.877 29.76zM57.25 94.987a85.906 85.906 0 0 1 11.731-13.451 8.9 8.9 0 0 1 12.206.1l17.427 16.646a293.681 293.681 0 0 1 4.59 41.035l-9.257-9.87a19.259 19.259 0 0 0-14-6.061 12.262 12.262 0 0 1-8.681-3.633l-13.123-13.32a8.958 8.958 0 0 1-.893-11.446zm-29.539 45.918A4.789 4.789 0 0 1 29 134.771 212.735 212.735 0 0 0 54.1 112.3l2.522 2.559a365.038 365.038 0 0 1-26.3 29.791 26.026 26.026 0 0 1-2.611-3.745zm29.649 32.469A43.816 43.816 0 0 1 29.1 155.75a377.782 377.782 0 0 0 32.47-35.87l4.714 4.785a19.282 19.282 0 0 0 8.63 5.019 178.553 178.553 0 0 0-10.84 38.74 5.91 5.91 0 0 1-2.379 3.91 5.759 5.759 0 0 1-4.335 1.04zm29.382 53.561c-11.294 7.508-16.62 1.29-17.275.433-.689-1.116-9.948-16.79-8.333-47.24a12.92 12.92 0 0 0 9.859-10.643 172.766 172.766 0 0 1 11.112-38.893 12.225 12.225 0 0 1 6.736 3.644l14.685 15.656c.522 34.717-4.304 68.748-16.784 77.043zm154.944-52.076-6.943 11.7-15.867-12.345 9.478-9.479zm-10.545 17.766-5.345 9.006-1.592-14.4zm-17.541-13.65 2.9 2.257 3.361 30.4-5.669 9.552-6.66-11.312 3.166-28.64zm-10.941-20.326v-9.987c6.989 1.834 18.027 1.152 21.882.282v9.705L213.6 169.59zm51.685-69.429a40.327 40.327 0 0 1-1.551 12.588 11.372 11.372 0 0 0-4.651 2.392 72.059 72.059 0 0 0-7.17-18.461 86.675 86.675 0 0 1 13.372 3.481zm-40.165-12.792c-19.651 0-32.952 3.121-39.74 5.251l.538-9.7a8.492 8.492 0 0 1 2.724-5.788A58.04 58.04 0 0 1 198.02 54.4a50.017 50.017 0 0 1 32.317 0 58.049 58.049 0 0 1 20.32 11.794 8.491 8.491 0 0 1 2.723 5.788l.538 9.7c-6.787-2.133-20.088-5.254-39.739-5.254zm42.339 46.623c-2.574 3.614-5.371 5.127-8.495 4.584.183-.653 1.639-10.148 1.442-14.046a17.06 17.06 0 0 1 3.064-3.936 4.3 4.3 0 0 1 4.724-.78 4.585 4.585 0 0 1 2.828 4.244c.046 3.207-1.152 6.549-3.563 9.934zM139.189 78.582a7.876 7.876 0 0 1-.257-10.642 243.435 243.435 0 0 1 66.893-52.808 17.737 17.737 0 0 1 16.707 0 243.483 243.483 0 0 1 66.894 52.808 7.877 7.877 0 0 1-.257 10.642 147.549 147.549 0 0 1-29.062 23.011 48.986 48.986 0 0 0 1.093-15.066l-.828-14.936A15.541 15.541 0 0 0 255.358 61a65.029 65.029 0 0 0-22.748-13.225 57.053 57.053 0 0 0-36.863 0A65.02 65.02 0 0 0 173 61a15.536 15.536 0 0 0-5.011 10.586l-.831 14.959a49.048 49.048 0 0 0 1.092 15.045 147.5 147.5 0 0 1-29.061-23.008zm32.65 44.469c-2.41-3.386-3.609-6.728-3.563-9.933a4.586 4.586 0 0 1 2.829-4.245 4.3 4.3 0 0 1 4.723.779 17.078 17.078 0 0 1 3.06 3.923c-.2 3.9 1.266 13.405 1.449 14.058-3.121.545-5.921-.965-8.498-4.582zm8.368-18.858a11.36 11.36 0 0 0-4.643-2.386 40.321 40.321 0 0 1-1.55-12.587 86.789 86.789 0 0 1 13.366-3.48 71.837 71.837 0 0 0-7.173 18.453zm6.465 19.945c-3.955-17.249 5.8-33.89 9.693-39.734a163.068 163.068 0 0 1 35.629 0c3.795 5.7 13.525 22.414 9.692 39.734-5.179 23.402-49.386 24.524-55.014 0zm11.768 40.193 9.88 9.881-14.942 11.625-8.741-14.845zm4.552 22.9L201.6 199.8l-4.642-7.884zm11.187 58.906-49.27-79.867a17.216 17.216 0 0 1 5.261-.355 6.954 6.954 0 0 1 5.353 3.4l35.64 60.531a3.5 3.5 0 0 0 3.01 1.725h.006a3.5 3.5 0 0 0 3.01-1.714l31.281-52.706a19.1 19.1 0 0 1 7.646 1.009z"
                                            style="fill:#3c3c4f" />
                                        <path
                                            d="M271.437 260.6a3.5 3.5 0 0 0-2.785 4.092c.063.335 6.36 33.857 6.36 66.944v2.32h7v-2.32c0-33.738-6.419-67.91-6.483-68.251a3.5 3.5 0 0 0-4.092-2.785z"
                                            style="fill:#3c3c4f" />
                                    </g>
                                </svg>
                            </h2>
                            <div class="percent_content1">
                                <h5 class="percent-h">Live Learning & Flexibility</h5>
                                <p class="custom_paragraph percent-p">Embrace the opportunity to learn live, anytime, and
                                    anywhere, and break free from the limitations of traditional schedules.</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-left align-items-center percent2 animatee">
                            <h2 class="percent font-weight-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 180" xml:space="preserve"
                                    width="50" height="40">
                                    <path fill="#FF916E"
                                        d="M154.622 90c0 35.69-28.932 64.623-64.621 64.623-35.69 0-64.623-28.934-64.623-64.623 0-35.689 28.933-64.623 64.623-64.623 35.689 0 64.621 28.934 64.621 64.623z" />
                                    <path fill="#FF916E"
                                        d="M57.667 121.357h16.467a2.72 2.72 0 0 1 2.71 2.711 2.718 2.718 0 0 1-2.71 2.711H57.667a2.718 2.718 0 0 1-2.71-2.711 2.72 2.72 0 0 1 2.71-2.711zM47.589 110.814h25.893a2.72 2.72 0 0 1 2.712 2.711 2.719 2.719 0 0 1-2.712 2.709H47.589a2.718 2.718 0 0 1-2.711-2.709 2.72 2.72 0 0 1 2.711-2.711zM37.398 110.814h3.988a2.72 2.72 0 0 1 2.71 2.711c0 1.49-1.22 2.709-2.71 2.709h-3.988a2.718 2.718 0 0 1-2.71-2.709 2.72 2.72 0 0 1 2.71-2.711z" />
                                    <path fill="#FF916E"
                                        d="M63.002 118.484v.617a2.41 2.41 0 0 1-2.403 2.404h13.116a2.411 2.411 0 0 1-2.403-2.404v-.617c0-1.32 1.082-2.4 2.403-2.4H60.599a2.408 2.408 0 0 1 2.403 2.4zM113.747 102.973h16.465c1.49 0 2.71 1.219 2.71 2.711a2.72 2.72 0 0 1-2.71 2.711h-16.465a2.72 2.72 0 0 1-2.712-2.711 2.718 2.718 0 0 1 2.712-2.711zM103.667 92.43h25.894a2.718 2.718 0 0 1 2.71 2.711 2.719 2.719 0 0 1-2.71 2.711h-25.894a2.72 2.72 0 0 1-2.711-2.711 2.718 2.718 0 0 1 2.711-2.711zM93.478 92.43h3.986a2.719 2.719 0 0 1 2.712 2.711 2.72 2.72 0 0 1-2.712 2.711h-3.986a2.72 2.72 0 0 1-2.711-2.711 2.717 2.717 0 0 1 2.711-2.711z" />
                                    <path fill="#FF916E"
                                        d="M119.079 100.102v.615a2.408 2.408 0 0 1-2.401 2.402h13.115a2.409 2.409 0 0 1-2.402-2.402v-.615a2.409 2.409 0 0 1 2.402-2.402h-13.115a2.406 2.406 0 0 1 2.401 2.402zM62.939 80.236h16.466a2.72 2.72 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711H62.939a2.72 2.72 0 0 1-2.711-2.711 2.721 2.721 0 0 1 2.711-2.711zM52.86 69.693h25.895a2.718 2.718 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711H52.86a2.72 2.72 0 0 1-2.71-2.711 2.718 2.718 0 0 1 2.71-2.711zM42.671 69.693h3.987a2.719 2.719 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711h-3.987a2.72 2.72 0 0 1-2.71-2.711 2.718 2.718 0 0 1 2.71-2.711z" />
                                    <path fill="#FF916E"
                                        d="M68.273 77.365v.617c0 1.32-1.081 2.4-2.402 2.4h13.116a2.408 2.408 0 0 1-2.403-2.4v-.617a2.41 2.41 0 0 1 2.403-2.404H65.871a2.41 2.41 0 0 1 2.402 2.404zM113.747 66.041h16.465c1.49 0 2.71 1.219 2.71 2.711a2.72 2.72 0 0 1-2.71 2.711h-16.465a2.72 2.72 0 0 1-2.712-2.711 2.719 2.719 0 0 1 2.712-2.711zM103.667 55.498h25.894a2.719 2.719 0 0 1 2.71 2.711 2.718 2.718 0 0 1-2.71 2.711h-25.894a2.719 2.719 0 0 1-2.711-2.711 2.72 2.72 0 0 1 2.711-2.711zM93.478 55.498h3.986a2.72 2.72 0 0 1 2.712 2.711 2.719 2.719 0 0 1-2.712 2.711h-3.986a2.718 2.718 0 0 1-2.711-2.711 2.719 2.719 0 0 1 2.711-2.711z" />
                                    <path fill="#FF916E"
                                        d="M119.079 63.17v.617c0 1.32-1.08 2.4-2.401 2.4h13.115a2.408 2.408 0 0 1-2.402-2.4v-.617a2.41 2.41 0 0 1 2.402-2.402h-13.115a2.409 2.409 0 0 1 2.401 2.402z" />
                                    <g>
                                        <path fill="#333"
                                            d="M137.133 80.832h-7.446a.385.385 0 0 1 0-.77h7.446a.385.385 0 0 1 0 .77zM138.141 83.602h-1.202a.385.385 0 1 1 0-.768h1.202a.383.383 0 1 1 0 .768zM145.284 85.904h-5.704a.383.383 0 0 1 0-.768h5.704a.385.385 0 1 1 0 .768zM121.386 89.273h-.96a.384.384 0 1 1 0-.768h.96a.384.384 0 1 1 0 .768zM133.085 89.273h-1.949a.385.385 0 1 1 0-.768h1.949a.384.384 0 0 1 0 .768zm-3.899 0h-1.95a.385.385 0 1 1 0-.768h1.95a.383.383 0 0 1 0 .768zm-3.901 0h-1.95a.383.383 0 0 1 0-.768h1.95a.385.385 0 1 1 0 .768zM135.995 89.273h-.96a.384.384 0 1 1 0-.768h.96a.384.384 0 0 1 0 .768z" />
                                        <g>
                                            <path fill="#333"
                                                d="M134.48 83.602h-5.475a.384.384 0 0 1 0-.768h5.475a.383.383 0 1 1 0 .768z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M131.098 116.816h-7.446a.385.385 0 0 1 0-.768h7.446a.385.385 0 1 1 0 .768zM132.106 119.588h-1.203a.384.384 0 0 1 0-.77h1.203a.386.386 0 0 1 0 .77zM139.25 121.891h-5.703a.384.384 0 1 1 0-.768h5.703a.384.384 0 0 1 0 .768zM115.351 125.26h-.96a.385.385 0 1 1 0-.768h.96a.384.384 0 1 1 0 .768zM127.051 125.26h-1.95a.385.385 0 1 1 0-.768h1.95a.384.384 0 1 1 0 .768zm-3.901 0h-1.95a.384.384 0 0 1 0-.768h1.95a.384.384 0 1 1 0 .768zm-3.899 0h-1.95a.385.385 0 1 1 0-.768h1.95a.383.383 0 0 1 0 .768zM129.961 125.26h-.96a.385.385 0 1 1 0-.768h.96a.384.384 0 0 1 0 .768z" />
                                        <g>
                                            <path fill="#333"
                                                d="M128.445 119.588h-5.474a.384.384 0 0 1 0-.77h5.474a.386.386 0 0 1 0 .77z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M65.553 139.607h-8.701a.385.385 0 1 1 0-.768h8.701a.383.383 0 1 1 0 .768zM68.578 137.412h-1.406a.386.386 0 0 1 0-.77h1.406a.384.384 0 0 1 0 .77zM70.251 142.473h-1.405a.384.384 0 0 1 0-.768h1.405a.384.384 0 1 1 0 .768zM65.553 137.412h-5.299a.386.386 0 0 1 0-.77h5.299a.385.385 0 0 1 0 .77zM73.449 135.178h-6.396a.385.385 0 1 1 0-.768h6.396a.384.384 0 1 1 0 .768z" />
                                        <g>
                                            <path fill="#333"
                                                d="M76.879 140.396h-3.323a.384.384 0 1 1 0-.768h3.323a.384.384 0 0 1 0 .768z" />
                                            <path fill="#333"
                                                d="M75.145 142.072a.386.386 0 0 1-.384-.385v-3.48a.385.385 0 1 1 .768 0v3.48a.387.387 0 0 1-.384.385z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M46.642 90.523H35.895a.384.384 0 0 1 0-.768h10.747a.383.383 0 1 1 0 .768zM50.377 87.811h-1.735a.383.383 0 1 1 0-.768h1.735a.385.385 0 1 1 0 .768zM52.445 94.061h-1.736a.383.383 0 1 1 0-.768h1.736a.384.384 0 0 1 0 .768zM46.642 87.811h-6.544a.384.384 0 1 1 0-.768h6.544a.384.384 0 1 1 0 .768zM56.396 85.053h-7.899a.385.385 0 1 1 0-.768h7.899a.384.384 0 1 1 0 .768z" />
                                        <g>
                                            <path fill="#333"
                                                d="M60.631 91.5h-4.104a.384.384 0 0 1 0-.768h4.104a.384.384 0 0 1 0 .768z" />
                                            <path fill="#333"
                                                d="M58.489 93.566a.384.384 0 0 1-.384-.385v-4.299c0-.213.171-.383.384-.383.212 0 .384.17.384.383v4.299a.384.384 0 0 1-.384.385z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M68.513 57.066H57.766a.383.383 0 1 1 0-.768h10.747a.383.383 0 1 1 0 .768zM55.766 59.779H54.03a.385.385 0 0 1 0-.77h1.735a.384.384 0 1 1 .001.77zM53.698 53.527h-1.736a.385.385 0 0 1 0-.768h1.736a.383.383 0 0 1 0 .768zM64.311 59.779h-6.545a.385.385 0 0 1 0-.77h6.545a.385.385 0 0 1 0 .77zM55.913 62.537h-7.9a.384.384 0 0 1-.384-.385c0-.213.171-.385.384-.385h7.9a.385.385 0 0 1 0 .77z" />
                                        <g>
                                            <path fill="#333"
                                                d="M50.904 57.949H46.8a.384.384 0 1 1 0-.768h4.104a.384.384 0 1 1 0 .768z" />
                                            <path fill="#333"
                                                d="M48.942 60.182a.385.385 0 0 1-.385-.385v-4.299c0-.211.172-.385.385-.385.211 0 .383.174.383.385v4.299a.384.384 0 0 1-.383.385z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#FFDB76"
                                            d="M116.831 148.939c-8.097 3.652-17.079 5.684-26.538 5.684a64.542 64.542 0 0 1-16.032-2.008c4.019-4.391 11.897-10.355 12.018-12.857.155-3.242-1.536-9.506-9.577-8.76-8.039.744-8.711-6.889-7.799-7.801 1.313-1.312 0-2.064 0-2.064s-1.44-.768-1.44-1.391c0-.625.864-1.49.864-1.49-1.824 0-1.488-1.822-1.488-1.822s.912-3.121-1.488-3.121c-2.399 0-2.303-2.16-2.063-3.072.24-.912 3.792-6.959 4.464-8.207.672-1.248-1.344-2.4-2.016-4.32a3.474 3.474 0 0 1-.153-.756h49.487c-.05 7.305-4.15 12.918-4.15 12.918s-4.737 4.607-4.737 10.494c0 5.889-.368 12.303 5.761 18.432 2.845 2.846 4.227 6.741 4.887 10.141z" />
                                    </g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ADEBF6"
                                            d="M116.483 65.5v15.777H71.062a7.904 7.904 0 0 1-7.543-7.895 7.895 7.895 0 0 1 7.364-7.883h45.6z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF"
                                            d="M116.483 66.641v13.494H72.111c-3.901 0-7.063-3.023-7.063-6.752 0-3.605 2.952-6.549 6.67-6.742h44.765z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#B2B2B2"
                                            d="m103.472 80.135.049-9.047-1.856.006v9.041z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                            d="m95.803 71.125 5.893-.037.099 15.795-2.969-2.5-2.925 2.537z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                            d="m95.866 80.329 5.893-.038.018 2.77-5.893.037z" opacity=".5" />
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M108.388 65.496V45.365l-17.749 8.031-17.748-8.031v20.131h35.497z" />
                                        <path fill="#333"
                                            d="M108.386 45.365v4.363l-17.749 8.025-17.746-8.031v-4.357l17.749 8.031 17.746-8.031z" />
                                        <path fill="#757575"
                                            d="M90.638 51.537v1.865l-30.67-12.287V39.42l.012-.006 30.658 12.123z" />
                                        <path fill="#333"
                                            d="M90.638 51.537 59.967 39.408 90.864 27.49l29.874 11.93zM118.546 40.633h1.793v18.836h-1.793z" />
                                        <path fill="#333"
                                            d="M122.283 60.143a2.838 2.838 0 0 0-2.841-2.838 2.839 2.839 0 0 0-2.839 2.838 2.841 2.841 0 0 0 2.839 2.842 2.842 2.842 0 0 0 2.841-2.842z" />
                                        <path fill="#333"
                                            d="M121.333 61.566h-3.587c-.6 1.604-1.927 6.01-1.173 12.051h.001c0 .363 1.325.656 2.961.656s2.96-.293 2.96-.656c.755-6.041-.566-10.447-1.162-12.051z" />
                                        <g>
                                            <path fill="#B2B2B2"
                                                d="m90.638 51.537.001 1.865 30.099-12.287V39.42l-.012-.006-30.087 12.123z" />
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#333"
                                            d="M76.618 71.43h1.729v25.523h-1.729zM88.521 71.43h1.727v25.523h-1.727z" />
                                        <path fill="#333"
                                            d="M77.294 92.014h12.204v1.156H77.294zM77.294 86.109h12.204v1.154H77.294zM77.294 80.205h12.204v1.154H77.294zM77.294 74.301h12.204v1.156H77.294z" />
                                    </g>
                                </svg>
                            </h2>
                            <div class="percent_content2">
                                <h5 class="percent-h">Affordability</h5>
                                <p class="custom_paragraph percent-p">Payment plans make it simple for you to plan your
                                    educational
                                    investment.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-left align-items-center percent3 animatee">
                            <h2 class="percent font-weight-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="50"
                                    height="40">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #374f68
                                            }

                                            .cls-2 {
                                                fill: #425b72
                                            }

                                            .cls-3 {
                                                fill: #ffde76
                                            }

                                            .cls-4 {
                                                fill: #fc6
                                            }

                                            .cls-5 {
                                                fill: #dad7e5
                                            }

                                            .cls-6 {
                                                fill: #edebf2
                                            }
                                        </style>
                                    </defs>
                                    <g id="_48._Mortarboard_and_Diploma_Roll_Certificate"
                                        data-name="48. Mortarboard and Diploma Roll Certificate">
                                        <path class="cls-1"
                                            d="M37 29a44.06 44.06 0 0 1-26 0l1.74-13.92h22.52C37.05 29.45 36.8 27.42 37 29z" />
                                        <path class="cls-2"
                                            d="M36.85 27.84a44 44 0 0 1-20.27-.13 3 3 0 0 1-2.26-3.29l1.17-9.34h19.77z" />
                                        <path class="cls-1" d="m47 11-23 8-23-8 23-8z" />
                                        <path class="cls-2" d="M42.69 9.5 24 16 5.31 9.5 24 3l18.69 6.5z" />
                                        <path class="cls-3"
                                            d="M5 20v-7.26a1 1 0 0 1 .9-1l16-1.56a1 1 0 0 1 .2 2L7 13.65V20a1 1 0 0 1-2 0z" />
                                        <path class="cls-4" d="M8 22v4H4v-4a2 2 0 0 1 4 0z" />
                                        <path class="cls-3"
                                            d="M8 22v3a3 3 0 0 1-3-3 4.1 4.1 0 0 1 .18-1.82A2 2 0 0 1 8 22z" />
                                        <path class="cls-4" d="M26 11a2 2 0 1 1-2.82-1.82A2 2 0 0 1 26 11z" />
                                        <path class="cls-3" d="M25.82 11.82a2 2 0 0 1-2.64-2.64 2 2 0 0 1 2.64 2.64z" />
                                        <path class="cls-5"
                                            d="m44.89 35.1-2 .34-1.39-7.87 2-.35a2 2 0 0 1 2.31 1.62l.7 3.94a2 2 0 0 1-1.62 2.32z" />
                                        <path class="cls-6"
                                            d="M46.52 32.87a2 2 0 0 1-3-1.4l-.73-4.13.66-.12a2 2 0 0 1 2.31 1.62c.78 4.16.76 3.93.76 4.03z" />
                                        <path class="cls-5"
                                            d="m7.46 41.7-2 .34a2 2 0 0 1-2.31-1.62l-.7-3.94a2 2 0 0 1 1-2.09c.39-.22.45-.2 2.6-.57 1.75 9.86.67 3.71 1.41 7.88z" />
                                        <path class="cls-6"
                                            d="m7.14 39.93-.65.07a2 2 0 0 1-2.31-1.62c-.73-4.11-.71-3.93-.71-4 .39-.22.45-.2 2.6-.57z" />
                                        <path class="cls-5"
                                            d="M43.07 36.33a1 1 0 0 1-.9 1.17C22.82 39 27 38.27 8.87 43.38a1 1 0 0 1-1.25-.8c-1.07-6.06-.68-3.84-1.7-9.65a1 1 0 0 1 .9-1.17c19.16-1.4 15.67-.91 33.3-5.88a1 1 0 0 1 1.25.8c1.45 8.24 1.33 7.52 1.7 9.65z" />
                                        <path class="cls-6"
                                            d="M42.94 35.59c-17.46 1.32-13.84.65-32.07 5.79a1 1 0 0 1-1.25-.8c-1-5.87-.67-3.82-1.57-8.91 17.38-1.3 13.72-.61 32.07-5.79a1 1 0 0 1 1.25.8c1.02 5.8.63 3.76 1.57 8.91z" />
                                        <path class="cls-4"
                                            d="M30.13 36.68c-1.48 1.25-1.09.65-1.78 2.55-1.9.34-1.26 0-2.81 1.31-1.9-.69-1.19-.61-3.1-.27-1.24-1.48-.64-1.09-2.54-1.78-.34-1.91 0-1.27-1.31-2.82.66-1.81.62-1.1.27-3.09 1.55-1.3 1.12-.73 1.78-2.55 1.87-.31 1.29 0 2.81-1.31 1.9.69 1.19.61 3.1.27 1.24 1.48.64 1.09 2.54 1.78.34 1.91 0 1.27 1.31 2.82-.66 1.81-.62 1.1-.27 3.09z" />
                                        <path
                                            d="m29.19 44-3.13-.47L23.28 45l-.84-4.73c2-.35 1.29-.39 3.1.27 1.48-1.24.82-1 2.81-1.31.82 4.6.65 3.66.84 4.77z"
                                            style="fill:#db5669" />
                                        <path
                                            d="m29.05 43.16-.84.15a4 4 0 0 1-4.63-3.24c.6-.11.19-.18 2 .47 1.48-1.24.82-1 2.81-1.31z"
                                            style="fill:#f26674" />
                                        <path class="cls-3"
                                            d="M30.13 36.68c-1.43 1.21-1.19.93-1.35 1.37A6 6 0 0 1 21.07 30c1.45-.25.9 0 2.38-1.24 1.9.69 1.19.61 3.1.27 1.24 1.48.64 1.09 2.54 1.78.34 1.91 0 1.27 1.31 2.82-.66 1.77-.62 1.06-.27 3.05z" />
                                        <path d="M26.32 35.45a2 2 0 1 1-2.17-2.79 2 2 0 0 1 2.17 2.79z"
                                            style="fill:#f16f39" />
                                        <path d="M26.32 35.45a2 2 0 0 1-2.63-2.65 2 2 0 0 1 2.63 2.65z"
                                            style="fill:#f8834b" />
                                    </g>
                                </svg>
                            </h2>
                            <div class="percent_content3">
                                <h5 class="percent-h">High Pass - Your NCLEX and General Licensure</h5>
                                <p class="custom_paragraph percent-p">Students successfully pass
                                    the NCLEX exam and other License exams, equipping them for licensure in their
                                    chosen healthcare field.</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-left align-items-center percent4 animatee">
                            <h2 class="percent font-weight-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                                    style="enable-background:new 0 0 256 256" xml:space="preserve" width="50"
                                    height="40">
                                    <style>
                                        .st2 {
                                            fill: none;
                                            stroke: #6b1d1d;
                                            stroke-width: .5;
                                            stroke-miterlimit: 10
                                        }

                                        .st3 {
                                            fill: #3a312a
                                        }

                                        .st4 {
                                            fill: #87796f
                                        }

                                        .st5 {
                                            fill: #d5de58
                                        }

                                        .st9 {
                                            fill: #8ac6dd
                                        }

                                        .st14 {
                                            fill: #d7e057
                                        }

                                        .st26 {
                                            fill: #f7e3c7
                                        }
                                    </style>
                                    <g id="Layer_1">
                                        <path
                                            d="m61.616 16.372-24.448-.012C25.755 16.354 16.5 25.604 16.5 37.017v158.966c0 11.408 9.249 20.657 20.657 20.657h119.186c11.408 0 20.657-9.249 20.657-20.657V68.485l-.304-31.604c-.109-11.327-9.318-20.453-20.645-20.459l-81.666-.042-12.769-.008z"
                                            style="fill:#f16c7a" />
                                        <path class="st3"
                                            d="M156.343 218.14H37.157C24.94 218.14 15 208.2 15 195.983V37.018a22.015 22.015 0 0 1 6.493-15.672 22.013 22.013 0 0 1 15.664-6.486h.012l24.448.013a1.5 1.5 0 0 1-.001 3h-.001l-24.448-.013h-.01a19.033 19.033 0 0 0-13.543 5.607A19.035 19.035 0 0 0 18 37.018v158.966c0 10.562 8.594 19.156 19.157 19.156h119.186c10.563 0 19.157-8.594 19.157-19.156v-127.5l-.304-31.589c-.1-10.457-8.689-18.968-19.146-18.974l-81.666-.041a1.5 1.5 0 0 1 .001-3h.001l81.666.042c12.095.006 22.028 9.851 22.145 21.944l.303 31.604v127.514c0 12.216-9.939 22.156-22.157 22.156z" />
                                        <path class="st26"
                                            d="M39.5 127.291v91.495c0 11.526 9.329 20.854 20.854 20.854h118.792c11.525 0 20.854-9.328 20.854-20.854V91.485l-52.135-52.136h-87.51c-11.525 0-20.854 9.329-20.854 20.855v67.087z" />
                                        <path class="st3"
                                            d="M179.145 241.14H60.354C48.028 241.14 38 231.112 38 218.786v-91.495a1.5 1.5 0 0 1 3 0v91.495c0 10.672 8.683 19.354 19.354 19.354h118.791c10.672 0 19.355-8.682 19.355-19.354V92.105l-51.257-51.257H60.354C49.683 40.849 41 49.531 41 60.203v53.871a1.5 1.5 0 0 1-3 0V60.203c0-12.326 10.028-22.354 22.354-22.354h87.51c.397 0 .779.158 1.061.44l52.136 52.136a1.5 1.5 0 0 1 .439 1.061v127.302c0 12.324-10.028 22.352-22.355 22.352z" />
                                        <path class="st3"
                                            d="M170.506 156.206H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3zM170.506 181.093H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3zM170.506 205.979H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3z" />
                                        <path class="st26"
                                            d="M200 91.485v.129h-33.668c-10.14 0-18.36-8.22-18.36-18.36V39.457L200 91.485z" />
                                        <path class="st3"
                                            d="M200 93.114h-33.668c-10.951 0-19.86-8.909-19.86-19.86V39.457a1.501 1.501 0 0 1 2.561-1.061l52.028 52.028a1.5 1.5 0 0 1 .439 1.061v.129a1.5 1.5 0 0 1-1.5 1.5zm-50.528-50.036v30.176c0 9.297 7.564 16.86 16.86 16.86h30.176l-47.036-47.036z" />
                                        <path class="st14"
                                            d="M226.278 26.131s3.408 12.659 13.222 13.246c0 0-13.1 4.525-13.321 14.202 0 0-2.579-13.572-12.925-14.059 0 .001 12.05-1.825 13.024-13.389z" />
                                        <path class="st3"
                                            d="M226.178 55.079a1.502 1.502 0 0 1-1.473-1.218c-.023-.124-2.494-12.417-11.521-12.843a1.5 1.5 0 0 1-.155-2.982c.441-.068 10.895-1.816 11.754-12.032a1.5 1.5 0 0 1 1.359-1.367c.74-.052 1.394.399 1.584 1.102.031.116 3.259 11.626 11.863 12.142a1.5 1.5 0 0 1 .402 2.914c-.121.042-12.119 4.311-12.312 12.819a1.5 1.5 0 0 1-1.501 1.465zm-7.74-15.729c3.878 1.969 6.23 5.746 7.586 8.876 2.026-4.021 5.941-6.787 8.949-8.427-4.134-1.842-6.783-5.651-8.334-8.723-1.793 4.361-5.271 6.869-8.201 8.274z" />
                                        <path class="st14"
                                            d="M204.579 43.112s2.411 8.954 9.352 9.369c0 0-9.266 3.201-9.422 10.045 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.291 9.212-9.47z" />
                                        <path class="st3"
                                            d="M204.508 64.026a1.502 1.502 0 0 1-1.473-1.22c-.016-.082-1.703-8.442-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.242 7.941-8.113a1.5 1.5 0 0 1 1.361-1.368 1.517 1.517 0 0 1 1.581 1.102c.022.079 2.229 7.92 7.995 8.266a1.5 1.5 0 0 1 .399 2.915c-.08.028-8.282 2.952-8.412 8.661a1.5 1.5 0 0 1-1.499 1.465zm-4.519-11.527c2.107 1.332 3.523 3.394 4.447 5.279 1.376-2.231 3.515-3.872 5.365-4.972-2.287-1.269-3.885-3.35-4.942-5.225-1.173 2.288-3.014 3.877-4.87 4.918z" />
                                        <path class="st14"
                                            d="M204.579 16.454s2.411 8.954 9.352 9.37c0 0-9.266 3.201-9.422 10.045 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.292 9.212-9.471z" />
                                        <path class="st3"
                                            d="M204.508 37.369a1.502 1.502 0 0 1-1.473-1.22c-.016-.082-1.703-8.442-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.243 7.941-8.113a1.5 1.5 0 0 1 1.361-1.368 1.517 1.517 0 0 1 1.581 1.102c.022.079 2.229 7.92 7.995 8.265a1.499 1.499 0 0 1 .4 2.915c-.081.028-8.283 2.953-8.413 8.662a1.5 1.5 0 0 1-1.499 1.465zm-4.519-11.527c2.107 1.332 3.522 3.394 4.447 5.279 1.376-2.232 3.515-3.872 5.364-4.973-2.286-1.269-3.884-3.35-4.941-5.224-1.173 2.288-3.014 3.876-4.87 4.918z" />
                                        <path class="st4"
                                            d="m176.109 239.64-6.429-12.924-14.68 1.292 25.643-46.535 21.109 11.632z" />
                                        <path class="st3"
                                            d="M176.109 241.141h-.031a1.498 1.498 0 0 1-1.311-.832l-5.975-12.009-13.66 1.203a1.5 1.5 0 0 1-1.446-2.218l25.643-46.536a1.499 1.499 0 0 1 2.037-.59l21.109 11.632c.726.399.99 1.311.59 2.037l-25.643 46.536c-.263.48-.767.777-1.313.777zm-6.428-15.925a1.5 1.5 0 0 1 1.342.832l5.155 10.361 23.536-42.715-18.481-10.184-23.561 42.757 11.876-1.046a1.97 1.97 0 0 1 .133-.005z" />
                                        <path class="st4"
                                            d="m217.891 239.64 6.429-12.924 14.68 1.292-25.643-46.535-21.109 11.632z" />
                                        <path class="st3"
                                            d="M217.891 241.141c-.546 0-1.05-.297-1.313-.776l-25.643-46.536a1.498 1.498 0 0 1 .59-2.037l21.109-11.632a1.498 1.498 0 0 1 2.037.59l25.643 46.536a1.498 1.498 0 0 1-1.446 2.218l-13.66-1.203-5.975 12.009a1.5 1.5 0 0 1-1.311.832l-.031-.001zm-23.605-47.447 23.536 42.715 5.155-10.361a1.49 1.49 0 0 1 1.475-.826l11.876 1.046-23.561-42.757-18.481 10.183z" />
                                        <path class="st9"
                                            d="m232.342 177.162-.018.015a8.457 8.457 0 0 0-2.863 8.813l.005.019c1.419 5.217-2.354 10.408-7.755 10.667l-.015.001a8.456 8.456 0 0 0-7.504 5.454c-1.915 5.062-8.026 7.047-12.55 4.077l-.001-.001a8.458 8.458 0 0 0-9.281 0l-.001.001c-4.524 2.969-10.635.984-12.55-4.077a8.456 8.456 0 0 0-7.504-5.454l-.015-.001c-5.401-.259-9.174-5.45-7.755-10.667l.005-.019a8.457 8.457 0 0 0-2.863-8.813l-.018-.014c-4.213-3.385-4.214-9.8 0-13.185l.018-.015a8.457 8.457 0 0 0 2.863-8.813l-.005-.019c-1.419-5.217 2.354-10.408 7.755-10.667l.015-.001a8.456 8.456 0 0 0 7.504-5.454c1.915-5.062 8.026-7.047 12.55-4.077l.001.001a8.458 8.458 0 0 0 9.281 0l.001-.001c4.524-2.969 10.635-.984 12.55 4.077a8.456 8.456 0 0 0 7.504 5.454l.015.001c5.401.259 9.174 5.45 7.755 10.667l-.005.019a8.457 8.457 0 0 0 2.863 8.813l.018.015c4.213 3.384 4.213 9.799 0 13.184z" />
                                        <path class="st3"
                                            d="M206.27 209.1a9.915 9.915 0 0 1-5.451-1.638 6.958 6.958 0 0 0-7.636-.001 9.907 9.907 0 0 1-8.541 1.146 9.91 9.91 0 0 1-6.236-5.945 6.955 6.955 0 0 0-6.173-4.488 9.912 9.912 0 0 1-7.591-4.091 9.91 9.91 0 0 1-1.555-8.469 6.962 6.962 0 0 0-2.35-7.269 9.92 9.92 0 0 1-3.739-7.776 9.916 9.916 0 0 1 3.721-7.762 6.964 6.964 0 0 0 2.374-7.265c-.802-2.946-.235-6.033 1.549-8.487s4.545-3.945 7.575-4.09a6.96 6.96 0 0 0 6.189-4.487 9.908 9.908 0 0 1 6.236-5.946c2.887-.939 6-.522 8.54 1.145a6.96 6.96 0 0 0 7.636.001 9.915 9.915 0 0 1 8.541-1.146 9.91 9.91 0 0 1 6.236 5.945 6.951 6.951 0 0 0 6.172 4.487c3.046.146 5.808 1.637 7.592 4.091s2.352 5.541 1.555 8.469a6.964 6.964 0 0 0 2.35 7.27 9.92 9.92 0 0 1 3.739 7.775 9.916 9.916 0 0 1-3.731 7.771l-.019.015a6.952 6.952 0 0 0-2.346 7.241c.802 2.947.235 6.034-1.549 8.488s-4.545 3.945-7.575 4.09a6.96 6.96 0 0 0-6.189 4.487 9.908 9.908 0 0 1-6.236 5.946 9.993 9.993 0 0 1-3.088.493zm-18.543-74.058c-.723 0-1.45.113-2.158.343a6.922 6.922 0 0 0-4.357 4.155 9.949 9.949 0 0 1-8.836 6.421 6.933 6.933 0 0 0-5.308 2.859 6.921 6.921 0 0 0-1.086 5.917 9.96 9.96 0 0 1-3.366 10.394 6.936 6.936 0 0 0-2.618 5.438c0 2.12.947 4.097 2.6 5.423a9.964 9.964 0 0 1 3.39 10.391 6.937 6.937 0 0 0 1.08 5.937 6.925 6.925 0 0 0 5.294 2.858 9.96 9.96 0 0 1 8.851 6.422 6.925 6.925 0 0 0 4.357 4.155 6.935 6.935 0 0 0 5.967-.801 9.955 9.955 0 0 1 10.929-.001 6.918 6.918 0 0 0 5.968.801 6.923 6.923 0 0 0 4.357-4.154 9.95 9.95 0 0 1 8.836-6.421 6.93 6.93 0 0 0 5.308-2.859 6.921 6.921 0 0 0 1.086-5.917 9.962 9.962 0 0 1 3.366-10.395l.018-.016a6.921 6.921 0 0 0 2.6-5.423 6.918 6.918 0 0 0-2.6-5.422 9.966 9.966 0 0 1-3.39-10.392 6.935 6.935 0 0 0-1.081-5.937 6.922 6.922 0 0 0-5.293-2.857 9.96 9.96 0 0 1-8.851-6.422 6.922 6.922 0 0 0-4.357-4.155 6.927 6.927 0 0 0-5.967.8 9.95 9.95 0 0 1-10.929.001 6.939 6.939 0 0 0-3.81-1.143z" />
                                        <path class="st3"
                                            d="M206.27 209.1a9.915 9.915 0 0 1-5.451-1.638 6.958 6.958 0 0 0-7.636-.001 9.907 9.907 0 0 1-8.541 1.146 9.91 9.91 0 0 1-6.236-5.945 6.955 6.955 0 0 0-6.173-4.488 9.912 9.912 0 0 1-7.591-4.091 9.91 9.91 0 0 1-1.555-8.469 6.962 6.962 0 0 0-2.35-7.269 9.92 9.92 0 0 1-3.739-7.776 9.916 9.916 0 0 1 3.721-7.762 6.964 6.964 0 0 0 2.374-7.265c-.802-2.946-.235-6.033 1.549-8.487s4.545-3.945 7.575-4.09a6.96 6.96 0 0 0 6.189-4.487 9.908 9.908 0 0 1 6.236-5.946c2.887-.939 6-.522 8.54 1.145a6.96 6.96 0 0 0 7.636.001 9.915 9.915 0 0 1 8.541-1.146 9.91 9.91 0 0 1 6.236 5.945 6.951 6.951 0 0 0 6.172 4.487c3.046.146 5.808 1.637 7.592 4.091s2.352 5.541 1.555 8.469a6.964 6.964 0 0 0 2.35 7.27 9.92 9.92 0 0 1 3.739 7.775 9.916 9.916 0 0 1-3.731 7.771l-.019.015a6.952 6.952 0 0 0-2.346 7.241c.802 2.947.235 6.034-1.549 8.488s-4.545 3.945-7.575 4.09a6.96 6.96 0 0 0-6.189 4.487 9.908 9.908 0 0 1-6.236 5.946 9.993 9.993 0 0 1-3.088.493zm-18.543-74.058c-.723 0-1.45.113-2.158.343a6.922 6.922 0 0 0-4.357 4.155 9.949 9.949 0 0 1-8.836 6.421 6.933 6.933 0 0 0-5.308 2.859 6.921 6.921 0 0 0-1.086 5.917 9.96 9.96 0 0 1-3.366 10.394 6.936 6.936 0 0 0-2.618 5.438c0 2.12.947 4.097 2.6 5.423a9.964 9.964 0 0 1 3.39 10.391 6.937 6.937 0 0 0 1.08 5.937 6.925 6.925 0 0 0 5.294 2.858 9.96 9.96 0 0 1 8.851 6.422 6.925 6.925 0 0 0 4.357 4.155 6.935 6.935 0 0 0 5.967-.801 9.955 9.955 0 0 1 10.929-.001 6.918 6.918 0 0 0 5.968.801 6.923 6.923 0 0 0 4.357-4.154 9.95 9.95 0 0 1 8.836-6.421 6.93 6.93 0 0 0 5.308-2.859 6.921 6.921 0 0 0 1.086-5.917 9.962 9.962 0 0 1 3.366-10.395l.018-.016a6.921 6.921 0 0 0 2.6-5.423 6.918 6.918 0 0 0-2.6-5.422 9.966 9.966 0 0 1-3.39-10.392 6.935 6.935 0 0 0-1.081-5.937 6.922 6.922 0 0 0-5.293-2.857 9.96 9.96 0 0 1-8.851-6.422 6.922 6.922 0 0 0-4.357-4.155 6.927 6.927 0 0 0-5.967.8 9.95 9.95 0 0 1-10.929.001 6.939 6.939 0 0 0-3.81-1.143z" />
                                        <circle transform="rotate(-80.781 197.003 170.567)" class="st14" cx="197"
                                            cy="170.57" r="25.471" />
                                        <path class="st3"
                                            d="M197 197.541c-14.872 0-26.971-12.1-26.971-26.972 0-14.872 12.099-26.971 26.971-26.971s26.971 12.099 26.971 26.971-12.099 26.972-26.971 26.972zm0-50.942c-13.218 0-23.971 10.753-23.971 23.971s10.753 23.972 23.971 23.972 23.971-10.754 23.971-23.972c0-13.218-10.753-23.971-23.971-23.971z" />
                                        <path
                                            d="m198.305 156.316 3.744 7.587c.212.429.622.727 1.095.796l8.373 1.217c1.193.173 1.67 1.64.806 2.482l-6.059 5.906a1.454 1.454 0 0 0-.418 1.288l1.43 8.339c.204 1.188-1.044 2.095-2.111 1.534l-7.489-3.937a1.454 1.454 0 0 0-1.354 0l-7.489 3.937c-1.067.561-2.315-.345-2.111-1.534l1.43-8.339a1.456 1.456 0 0 0-.419-1.288l-6.059-5.906c-.863-.842-.387-2.308.806-2.482l8.373-1.217a1.455 1.455 0 0 0 1.095-.796l3.745-7.587c.536-1.081 2.078-1.081 2.612 0z"
                                            style="fill:#fae6ca" />
                                        <path class="st3"
                                            d="M205.846 187.134c-.47 0-.941-.113-1.377-.342l-7.49-3.938-7.446 3.938a2.943 2.943 0 0 1-3.112-.227 2.938 2.938 0 0 1-1.175-2.89l1.43-8.339-6.045-5.865a2.938 2.938 0 0 1-.748-3.029 2.937 2.937 0 0 1 2.385-2.011l8.373-1.217 3.711-7.562a2.934 2.934 0 0 1 2.648-1.646h.001c1.133 0 2.148.631 2.649 1.646l3.744 7.587 8.34 1.192a2.937 2.937 0 0 1 2.385 2.011 2.938 2.938 0 0 1-.748 3.029l-6.059 5.905 1.443 8.299a2.939 2.939 0 0 1-1.175 2.89 2.942 2.942 0 0 1-1.734.569zm-8.888-30.157-3.662 7.59a2.95 2.95 0 0 1-2.227 1.616l-8.371 1.217 6.084 5.828a2.958 2.958 0 0 1 .85 2.616l-1.43 8.339 7.423-3.985a2.962 2.962 0 0 1 2.749 0l7.49 3.938-1.496-8.291a2.956 2.956 0 0 1 .848-2.615l6.061-5.906-8.348-1.14a2.954 2.954 0 0 1-2.226-1.617l-3.745-7.59z" />
                                        <path class="st9"
                                            d="M148.193 106.768v21.278a5.409 5.409 0 0 1-5.41 5.41h-47.57a5.41 5.41 0 0 1-5.411-5.41v-21.278l29.195 14.849 29.196-14.849z" />
                                        <path class="st3"
                                            d="M142.782 134.956H95.213c-3.811 0-6.91-3.1-6.91-6.91v-21.277a1.5 1.5 0 0 1 2.18-1.337l28.516 14.503 28.515-14.503a1.502 1.502 0 0 1 2.18 1.337v21.277c-.002 3.81-3.101 6.91-6.912 6.91zm-51.479-25.742v18.832a3.914 3.914 0 0 0 3.91 3.91h47.569a3.914 3.914 0 0 0 3.91-3.91v-18.832l-27.015 13.74a1.5 1.5 0 0 1-1.359 0l-27.015-13.74z" />
                                        <path class="st9"
                                            d="M118.998 76.933 75.071 99.275l43.927 22.342 43.926-22.342z" />
                                        <path class="st3"
                                            d="M118.998 123.117c-.233 0-.467-.055-.68-.163l-43.927-22.343a1.498 1.498 0 0 1 0-2.674l43.927-22.342a1.5 1.5 0 0 1 1.359 0l43.926 22.342a1.498 1.498 0 0 1 0 2.674l-43.926 22.343a1.5 1.5 0 0 1-.679.163zM78.38 99.274l40.618 20.66 40.617-20.66-40.617-20.659L78.38 99.274z" />
                                        <path class="st5"
                                            d="M162.924 99.275v27.213c-1.125-1.446-2.646-2.336-4.328-2.336-1.671 0-3.193.889-4.318 2.336v-22.82l8.646-4.393z" />
                                        <path class="st3"
                                            d="M162.924 127.987a1.5 1.5 0 0 1-1.184-.579c-.88-1.133-1.996-1.756-3.144-1.756-1.14 0-2.253.624-3.134 1.756a1.5 1.5 0 0 1-2.684-.921v-22.82a1.5 1.5 0 0 1 .82-1.337l8.645-4.393a1.49 1.49 0 0 1 1.464.059c.445.272.716.757.716 1.278v27.213a1.5 1.5 0 0 1-1.499 1.5zm-4.328-5.335c.985 0 1.94.229 2.828.668v-21.601l-5.645 2.868v18.732a6.312 6.312 0 0 1 2.817-.667z" />
                                        <ellipse class="st5" cx="158.599" cy="132.799" rx="6.33"
                                            ry="8.645" />
                                        <path class="st3"
                                            d="M158.599 142.944c-4.317 0-7.829-4.551-7.829-10.146 0-5.595 3.512-10.146 7.829-10.146s7.83 4.551 7.83 10.146c0 5.596-3.513 10.146-7.83 10.146zm0-17.291c-2.617 0-4.829 3.272-4.829 7.146 0 3.873 2.212 7.146 4.829 7.146 2.618 0 4.83-3.272 4.83-7.146 0-3.873-2.212-7.146-4.83-7.146z" />
                                        <path
                                            d="m175.46 64.832-15.14-15.15-.12-12.79c-.1-10.45-8.69-18.96-19.15-18.97h15c10.46.01 19.05 8.52 19.15 18.97l.26 27.94z"
                                            style="fill:#d34e5c" />
                                        <path
                                            d="M183.5 93.113v39.87c.37-.17.75-.32 1.14-.45 2.89-.94 6-.52 8.54 1.14a6.935 6.935 0 0 0 5.32.96v-41.52h-15z"
                                            style="fill:#decaad" />
                                    </g>
                                </svg>
                            </h2>
                            <div class="percent_content4">
                                <h5 class="percent-h">Career-Ready Graduates</h5>
                                <p class="custom_paragraph percent-p">Our <span class="font-weight-bold">Dedicated
                                        Experienced Faculty</span> prepares
                                    graduates to find employment in their chosen healthcare field, showcasing the
                                    marketability of our courses.</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6 d-none d-lg-block percent-video pr-2">
                        <img src="{{ asset('/public/uploads/images/footerimg/counter_bg.png') }}" class="w-100 h-100">
                        {{-- <video autoplay loop muted height="100%" width="100%" style="object-fit: cover">
                            <source src="{{ asset('/public/uploads/images/footerimg/ezgif-3-7f2a47567b.mp4') }}">
                        </video> --}}
                    </div>

                </div>
            {{-- </div> --}}
        </div>
    </section>

    {{-- sec-6 about-page-section"testimonial" --}}
    <x-about-page-students-work />

    {{-- Map aboutus --}}

    <section class="sec-7">
        <div class="container p-lg-5 ">
        <div class="row about_us px-xl-5 justify-content-between">
            <div class="col-sm-6 about_us_height align-items-center d-flex justify-content-center py-3 px-lg-2">
                <div class="about_us_p">
                    <i class="fa-regular fa-lightbulb fa-2x" style="color: var(--system_primery_color);"></i>
                    <h2 class="font-weight-bold mb-4">AT MERAKII</h2>
                    <h2 class="font-weight-bold mb-4">WE ARE ADULT LEARNER-CENTRIC <br> <span
                            class="d-flex justify-content-center ml_span">and</span>EDUCATION IS FOR
                        EVERYONE</h2>
                    <p class="mb-4 custom_paragraph">
                        At Merakii, we believe education is the key to unlocking potential, and that's why we
                        offer a variety of programs designed to fit diverse student body and learning styles. We
                        offer accessible learning pathways to fuel your passion for healthcare, regardless of
                        background, experience, or location. Merakii fosters a vibrant and supportive global
                        community where <span class="font-weight-bold">everyone can learn, grow, and achieve
                            their healthcare goals.</span>
                    </p>
                    <a href="{{ route('about') }}" class="learn_more font-weight-bold">Know More</a>
                </div>
            </div>

            <div class="col-sm-6 d-flex">
                <div class="col-md-6 align-self-end about-img pl-lg-0">
                    <img style="height:100%; object-fit: cover; object-position: right; border-radius: 20px;"
                        src="{{ asset('public/assets/ban.jpg') }}" class="img-fluid about_us_img">
                </div>
                <div class="col-md-6 align-self-start about-img pr-lg-0">
                    <img style="height:100%; object-fit: cover; object-position: right; border-radius: 20px;"
                        src="{{ asset('public/assets/ban.jpg') }}" class="img-fluid about_us_img">
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- aboutus end --}}
    {{-- after-about-section --}}
    <section class="px-5 d-none">
        <div class="container">
            <div class="row mx-lg-2" style="overflow: hidden">
                <h2 class="col-12 text-center mb-5 font-weight-bold">Our Trusted Education Partners</h2>
                <div class=" row logos mx-4 swiper">
                    <div class="swiper-wrapper d-flex">
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column align-items-center my-2 px-0 "> <img
                                    src="{{ asset('/public/uploads/images/footerimg/cie.png') }}" class="logos-img">
                                <span class="logo-text text-center">CIE </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/falbon.png') }}" class="logos-img2">
                                <span class="logo-text text-center"> FLBON </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/fapsc.png') }}" class="logos-img3">
                                <span class="logo-text text-center"> FAPSC </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/miltery.png') }}"
                                    class="logos-img4"><span class="logo-text text-center"> Military Spouse</span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/career.png') }}"
                                    class="logos-img5"><span class="logo-text text-center"> Career Source </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/post.png') }}" class="logos-img">
                                <span class="logo-text text-center">Post 9/11 GI Bill </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/national.png') }}"
                                    class="logos-img7"> <span class="logo-text text-center">National Healthcare
                                    Association </span></div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/lakeland1.png') }}"
                                    class="logos-img8"><span class="logo-text text-center"> Lakeland General
                                    Hospital</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- call to action added by arsam  -->

    <section class="sec-8 online-learning d-flex align-items-center justify-content-center my-lg-3">
        <div class="animate">
            <h2 class="text-white text-center font-weight-bold text-capitalize">Start your transformation with a
                single click.
                Limited Seats Available!</h2>
            <p class="text-white text-center py-4">Get Licensure, <a href="{{ url('pre-registration') }}"><span
                        class="font-weight-bold text-white">Apply Now
                    </span></a> Merakii College's Healthcare Programs and Courses. <br>Adult-Learner’s Success</p>
            <div class="d-flex justify-content-center mt-2">
                <a href="{{ url('contact#contact-form-ankar') }}"><button
                        class="custom-button-call-to-action px-4 py-2">Contact Admission Specialist</button></a>
            </div>
        </div>
    </section>
    <!-- section-3b -->
    <section class="sec-9 ">
        <div class="container for-backcolor-container p-5">
            <div class="row justify-content-left px-xl-5">
                <!-- 1st -->
                <div class="col-md-4 col-12 for-main px-lg-2">
                    <div>
                        <label class="for-label">Why Attend Merakii</label>
                        <h2 class="for-bold font-weight-bold">Unbound Learning: Your Healthcare Education, Anywhere
                        </h2>
                        <p class="for-para custom_paragraph mb-2">At Merakii, we understand that life doesn't always
                            stop
                            for education. That's why we offer a
                            truly flexible learning experience that fits your schedule and lifestyle. Study on your
                            terms, whether you're at home, traveling the world, or juggling a busy work life.</p>

                        <p class="for-para custom_paragraph "><span class="font-weight-bold">Our global reach</span>
                            means you can join a vibrant community of learners from over 35
                            countries. Plus, with our pioneering approach to online healthcare education, you can be
                            confident you're receiving a top-notch education, no matter your location. <span
                                class="font-weight-bold">So, wherever
                                you go, your education goes with you.</span></p>
                    </div>
                </div>
                <!-- 2nd 1st-side-->
                <div class="col-md-4 col-12 for-main">
                    <div class="d-flex for-element">
                        <svg class="for-flexibility" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
                            xml:space="preserve">
                            <switch>
                                <g>
                                    <circle fill="#382B73" cx="500" cy="500" r="398" />
                                    <circle fill="#473080" cx="500" cy="500" r="346" />
                                    <path fill="#382B73"
                                        d="M765 500.8H574.3c-10.4 0-19.2 6.3-23 15.3l-4-2.3v-26.5c12.7-5.4 24.5-13 34.6-22.3 10.4-9.6 19.2-21 25.7-33.6 3.9-7.5 6.9-15.4 9.1-23.5 1.2.2 2.5.4 3.8.4 11.2 0 20.3-9.1 20.3-20.3v-30.9c0-11.2-9.1-20.3-20.3-20.3-.4-2.7-.9-5.4-1.7-8.1-3.3-16.7-10.1-32.6-19.9-46.4-2.9-4.1-6-8-9.4-11.7-16.7-18.3-38.9-31.2-63.1-36.6-6.8-1.5-13.7-2.4-20.7-2.7-12.4-.6-24.9.8-36.9 4-3.3.9-6.7 1.9-9.9 3.1-6.8 2.5-13.4 5.6-19.7 9.2-2.9 1.7-5.8 3.6-8.6 5.5-2.6 1.8-5.3 3.7-7.7 5.8-1 .8-2 1.7-3 2.6-15.4 13.6-27.4 31.3-34.1 50.8-1.9 5.4-3.4 10.9-4.5 16.5-.7 2.7-1.3 5.4-1.7 8.1h-.1c-11.2 0-20.3 9.1-20.3 20.3v30.9c0 11.2 9.1 20.3 20.3 20.3 1.3 0 2.6-.1 3.8-.4 3.8 13.7 10 26.8 18.3 38.4 8.2 11.4 18.4 21.4 30 29.4 6.7 4.6 13.8 8.5 21.2 11.6V514v-.1l-31.3 17.6h-41.1c-52.3 0-94.8 42.4-94.8 94.8v78.4c16.2 18.8 34.8 35.4 55.3 49.4 5.9 4 11.9 7.8 18.1 11.3 5.4 3.1 11 6.1 16.6 8.8 14.7 7.2 30 13.1 45.6 17.7 16.2 4.7 32.9 7.9 49.7 9.6 17.2 1.8 34.7 2 51.9.6 17-1.4 33.8-4.2 50.3-8.6 15.8-4.2 31.2-9.8 46-16.7 1.8-.8 3.6-1.7 5.4-2.6 5.6-2.7 11.2-5.7 16.6-8.8 12.1-7 23.6-14.8 34.6-23.4l4.5-3.6c1.5-1.2 3.1-2.4 4.5-3.8 10.4-9 20.2-18.7 29.2-29.1h.6v-10H765c13.8 0 25-11.2 25-25V525.8c0-13.8-11.2-25-25-25z" />
                                    <path fill="#D1D3D4"
                                        d="M723.6 547.1c-8.7 0-16.9 2.1-24.1 5.7V545c0-8.3-6.7-15-15-15h-93.8c-8.3 0-15 6.7-15 15v100.4c0 8.3 6.7 15 15 15h93.8c3.8 0 7.4-1.5 10-3.8 2.2-1.9 3.8-4.5 4.5-7.4 7.4 3.8 15.7 5.9 24.6 5.9 29.8 0 54-24.2 54-54s-24.2-54-54-54z" />
                                    <path fill="#FFF"
                                        d="M452.8 447.4h94.4v114.5h-94.4zM379.6 388.3c-11.2 0-20.3-9.1-20.3-20.3v-30.9c0-11.2 9.1-20.3 20.3-20.3 11.2 0 20.3 9.1 20.3 20.3V368c-.1 11.2-9.1 20.3-20.3 20.3z" />
                                    <path fill="#D1D3D4"
                                        d="M379.6 378.7c-11.2 0-20.3-9.1-20.3-20.3v9.5c0 11.2 9.1 20.3 20.3 20.3 11.2 0 20.3-9.1 20.3-20.3v-9.5c-.1 11.2-9.1 20.3-20.3 20.3z" />
                                    <path fill="#FFF"
                                        d="M620.4 388.3c-11.2 0-20.3-9.1-20.3-20.3v-30.9c0-11.2 9.1-20.3 20.3-20.3 11.2 0 20.3 9.1 20.3 20.3V368c0 11.2-9.1 20.3-20.3 20.3z" />
                                    <path fill="#D1D3D4"
                                        d="M620.4 378.7c-11.2 0-20.3-9.1-20.3-20.3v9.5c0 11.2 9.1 20.3 20.3 20.3 11.2 0 20.3-9.1 20.3-20.3v-9.5c0 11.2-9.1 20.3-20.3 20.3z" />
                                    <path fill="#FFF"
                                        d="M381.3 308.8c3.9-20.2 12.9-38.5 25.5-53.8 3.6-4.4 7.6-8.6 11.8-12.4 21.5-19.6 50-31.5 81.4-31.5 1.4 0 2.8 0 4.2.1h1.4c31.2 1.4 59.3 14.6 79.9 35.3 18.4 18.4 30.9 42.7 34.4 69.9.7 5.1 1 10.3 1 15.6v24c0 66.8-54.1 120.9-120.9 120.9-66.8 0-120.9-54.1-120.9-120.9v-24c0-5.1.3-10.2.9-15.2l1.3-8z" />
                                    <path fill="#D1D3D4"
                                        d="M500 457.8c-66.8 0-120.9-54.1-120.9-120.9V356c0 66.8 54.1 120.9 120.9 120.9 66.8 0 120.9-54.1 120.9-120.9v-19.1c0 66.8-54.1 120.9-120.9 120.9z" />
                                    <path fill="#E7AD27"
                                        d="M381.3 308.8h11.5v57.9c0 3.8-2.9 7.1-6.7 7.2-3.9.1-7.1-3-7.1-6.9v-41.7c.1-5.6.8-11.2 2.3-16.5zM618.7 308.8c1.5 5.1 2.2 10.3 2.2 15.6V367c0 3.8-3.3 6.9-7.4 6.9-4.1 0-7.4-3.1-7.4-6.9v-58.2h12.6z" />
                                    <path fill="#E7AD27"
                                        d="M504.2 211.2c-12.2 19.1-42.5 60.4-91.6 89.4-11.8 7-22.7 12.3-32.5 16.3 2.9-23.3 12.5-44.6 26.8-61.8 3.6-4.4 7.6-8.6 11.8-12.4 21.5-19.6 50-31.5 81.4-31.5 1.3-.1 2.7-.1 4.1 0z" />
                                    <path fill="#FEDE3A"
                                        d="M619.9 316.4c-16.5 5-48.9 9.7-100.4-3.8C467.4 299 427.9 272 406.8 255c3.6-4.4 7.6-8.6 11.8-12.4 21.5-19.6 50-31.5 81.4-31.5 1.9 0 3.7 0 5.6.1 31.2 1.4 59.3 14.6 79.9 35.3 18.4 18.4 30.9 42.8 34.4 69.9z" />
                                    <path fill="#E7AD27"
                                        d="M519.5 241.9c-22.8-6-43.2-14.5-60.7-23.6-15 5.4-28.6 13.7-40.2 24.3-4.2 3.9-8.2 8-11.8 12.4 21.1 17 60.6 44 112.7 57.6 51.5 13.5 84 8.8 100.4 3.8-3.2-25.2-14.3-48-30.6-65.8-17.5.8-40.6-1-69.8-8.7z" />
                                    <path fill="#FEDE3A"
                                        d="M519.5 265.5c-33.3-8.7-61.5-22.9-83-36.4-6.4 3.9-12.4 8.5-17.9 13.5-4.2 3.9-8.2 8-11.8 12.4 21.1 17 60.6 44 112.7 57.6 51.5 13.5 84 8.8 100.4 3.8-2-15.8-7.1-30.6-14.6-43.8-18.5 2.9-46.6 3.1-85.8-7.1z" />
                                    <path fill="#E7AD27"
                                        d="M519.5 289.1c-42.7-11.2-77-31.3-99.6-47.6-.4.4-.9.8-1.3 1.2-4.2 3.9-8.2 8-11.8 12.4 21.1 17 60.6 44 112.7 57.6 51.5 13.5 84 8.8 100.4 3.8-1-7.6-2.7-15.1-5.1-22.2-17.6 4.2-48.6 7-95.3-5.2zM500 396c-7.4 0-13.4-6-13.4-13.4V365c0-7.4 6-13.4 13.4-13.4s13.4 6 13.4 13.4v17.6c0 7.4-6 13.4-13.4 13.4z" />
                                    <path fill="#1CAEE4"
                                        d="M714.5 614.4v70.2c-9.2 10.7-19.2 20.7-29.9 29.9-.1.1-.2.1-.2.2-10.9 9.4-22.5 17.9-34.8 25.6-29.6 18.5-62.9 31.6-98.5 38.1-6.5 1.2-13.1 2.1-19.8 2.9-6.4.7-12.9 1.2-19.4 1.5-2.6.1-5.1.2-7.7.2H496c-2.6 0-5.2-.1-7.7-.2-6.6-.3-13-.8-19.5-1.5-6.7-.7-13.4-1.7-20-2.9-35.5-6.5-68.7-19.6-98.3-38.1-5.6-3.5-11.1-7.2-16.4-11.1-6.4-4.6-12.6-9.6-18.6-14.7-10.7-9.2-20.7-19.2-29.9-29.9v-78.4c0-52.4 42.5-94.8 94.8-94.8h41.1l31.4 103h94.2l31.4-103h41.1c52.3 0 94.8 42.4 94.8 94.8l.1 8.2z" />
                                    <path fill="#136DA0"
                                        d="M641 745.4c-5.4 3.1-11 6.1-16.6 8.8L641 631.9v113.5zM375.5 754.2c-5.6-2.8-11.2-5.7-16.6-8.8V631.9l16.6 122.3z" />
                                    <path fill="#A72973"
                                        d="m550.1 604.6-26.2 85.8-.5 1.6-5.9 19.3-4.3 14.2-5.9 19.3L503 759l-3 9.9-3.7-12.1-5.3-17.3-7.2-23.6-5.3-17.4-2.4-7.9-26.2-86 50.1-42.7z" />
                                    <g fill="#E7AD27">
                                        <circle cx="443.8" cy="341.3" r="10.2" />
                                        <circle cx="556.2" cy="341.3" r="10.2" />
                                    </g>
                                    <g>
                                        <path fill="#E7AD27"
                                            d="M500 433.6c-13 0-26-4.9-35.9-14.8-2-2-2-5.1 0-7.1s5.1-2 7.1 0c15.9 15.9 41.8 15.9 57.6 0 2-2 5.1-2 7.1 0s2 5.1 0 7.1c-9.9 9.9-22.9 14.8-35.9 14.8z" />
                                    </g>
                                    <g>
                                        <path fill="#E7AD27"
                                            d="m523.9 690.4-1.3-14.3-1.9-21.8-1.4-16.1-3.4-38.7h-31.8l-2.3 26.4-1.3 15.2-1.9 20.6-1.3 15.2-1.2 13.7 2.4 7.9 5.3 17.4 7.2 23.6 5.3 17.3 3.7 12.1 3-9.9 4.3-14.2 5.9-19.3 4.3-14.2 5.9-19.3z" />
                                        <path fill="#FEDE3A"
                                            d="m520.7 654.3-40.3-13.2 1.4-15.2 37.5 12.3zM523.9 690.4l-1.3-14.3-44-14.4-1.3 15.2 46.1 15.1zM517.5 711.3l-4.3 14.2-29.4-9.6-5.3-17.4zM507.3 744.8 503 759l-6.7-2.2-5.3-17.3z" />
                                    </g>
                                    <path fill="#FEDE3A"
                                        d="M510.9 614.4h-21.7c-12.3 0-20.7-12.3-16.4-23.7l6.7-17.5c2.6-6.8 9.1-11.3 16.4-11.3h8.4c7.3 0 13.8 4.5 16.4 11.3l6.7 17.5c4.2 11.4-4.3 23.7-16.5 23.7z" />
                                    <path fill="#EF5A9D"
                                        d="m578.5 511.5-31.3-17.7-47.2 68.1 50.1 42.7zM421.5 511.5l31.3-17.7 47.2 68.1-50.1 42.7z" />
                                    <path fill="#136DA0"
                                        d="m578.5 511.5 25.9 82.7c.9 3-.6 6.2-3.6 7.3l-20.1 7.6c-5.1 1.9-5.1 9.1-.1 11l24.8 9.8c3.7 1.5 5 6.2 2.4 9.3L500 768.9l78.5-257.4zM421.5 511.5l-25.9 82.7c-.9 3 .6 6.2 3.6 7.3l20.1 7.6c5.1 1.9 5.1 9.1.1 11l-24.8 9.8c-3.7 1.5-5 6.2-2.4 9.3L500 768.9l-78.5-257.4z" />
                                    <path fill="#D1D3D4" d="M547.1 480.8 500 532.3l-47.2-51.5v13l47.2 68.1 47.2-68.1z" />
                                    <path fill="#136DA0"
                                        d="M630 723.2h-29c-6.1 0-11-4.9-11-11s4.9-11 11-11h29c6.1 0 11 4.9 11 11s-4.9 11-11 11zM619.6 521.5h-41.1l-29.3 95.9v37c0 17.1 13.9 31 31 31h134.1v-69.2c.1-52.3-42.3-94.7-94.7-94.7z" />
                                    <path fill="#FFF"
                                        d="M765 675.4H574.3c-13.8 0-25-11.2-25-25V505.8c0-13.8 11.2-25 25-25H765c13.8 0 25 11.2 25 25v144.6c0 13.8-11.2 25-25 25z" />
                                    <path fill="#D1D3D4"
                                        d="M723.6 556.5c-8.9 0-17.2 2.6-24.1 7.1v-18.7c0-8.3-6.7-15-15-15h-93.8c-8.3 0-15 6.7-15 15v100.4c0 8.3 6.7 15 15 15h93.8c3.8 0 7.4-1.5 10-3.8 3.1-2.8 5-6.7 5-11.2v-6.8c7 4.5 15.2 7.1 24.1 7.1 24.6 0 44.6-20 44.6-44.6s-20-44.5-44.6-44.5z" />
                                    <g>
                                        <path fill="#FEDE3A"
                                            d="M699.5 534.9v100.4c0 4.4-1.9 8.4-5 11.2-2.6 2.4-6.2 3.8-10 3.8h-93.8c-8.3 0-15-6.7-15-15V534.9c0-8.3 6.7-15 15-15h93.8c8.3 0 15 6.8 15 15z" />
                                        <path fill="#E7AD27"
                                            d="M684.5 643.7h-93.8c-8.3 0-15-6.7-15-15v6.7c0 8.3 6.7 15 15 15h93.8c8.3 0 15-6.7 15-15v-6.7c0 8.3-6.7 15-15 15z" />
                                        <path fill="#FFF335"
                                            d="M684.5 520h-93.8c-8.3 0-15 6.7-15 15v5.9c0-8.3 6.7-15 15-15h93.8c8.3 0 15 6.7 15 15V535c0-8.3-6.7-15-15-15z" />
                                        <g fill="#EF5A9D">
                                            <path
                                                d="M600.8 534.8h-1c-2.8 0-5-2.3-5-5v-19.6c0-2.8 2.3-5 5-5h1c2.8 0 5 2.3 5 5v19.6c.1 2.7-2.2 5-5 5zM625.7 534.8h-1c-2.8 0-5-2.3-5-5v-19.6c0-2.8 2.3-5 5-5h1c2.8 0 5 2.3 5 5v19.6c0 2.7-2.2 5-5 5zM650.5 534.8h-1c-2.8 0-5-2.3-5-5v-19.6c0-2.8 2.3-5 5-5h1c2.8 0 5 2.3 5 5v19.6c.1 2.7-2.2 5-5 5zM675.4 534.8h-1c-2.8 0-5-2.3-5-5v-19.6c0-2.8 2.3-5 5-5h1c2.8 0 5 2.3 5 5v19.6c0 2.7-2.2 5-5 5z" />
                                        </g>
                                        <g fill="#FFF">
                                            <path
                                                d="M593 545h23.7v23.7H593zM625.8 545h23.7v23.7h-23.7zM658.5 545h23.7v23.7h-23.7z" />
                                        </g>
                                        <g fill="#FFF">
                                            <path
                                                d="M593 576.5h23.7v23.7H593zM625.8 576.5h23.7v23.7h-23.7zM658.5 576.5h23.7v23.7h-23.7z" />
                                        </g>
                                        <g fill="#FFF">
                                            <path
                                                d="M593 608.1h23.7v23.7H593zM625.8 608.1h23.7v23.7h-23.7zM658.5 608.1h23.7v23.7h-23.7z" />
                                        </g>
                                    </g>
                                    <path fill="#E7AD27"
                                        d="M699.5 552.7v82.6c0 4.4-1.9 8.4-5 11.2-15-9.6-24.9-26.4-24.9-45.5 0-21.1 12.2-39.4 29.9-48.3z" />
                                    <g>
                                        <circle fill="#136DA0" cx="723.6" cy="591.1" r="44.6" />
                                    </g>
                                    <g>
                                        <path fill="#FFF"
                                            d="M737 605.9c-1 0-2.1-.3-3-1l-13.4-9.8c-1.3-.9-2-2.4-2-4v-28.2c0-2.8 2.2-5 5-5s5 2.2 5 5v25.7l11.3 8.3c2.2 1.6 2.7 4.8 1.1 7-.9 1.3-2.5 2-4 2z" />
                                    </g>
                                </g>
                            </switch>
                        </svg>
                        <div class="for-border ml-4">

                            <h5 class="for-label1 font-weight-bold">Flexible Learning Options</h5>
                            <p class="for-para custom_paragraph pr-2">Merakii offers a blend of online and in-person
                                classes, allowing you to learn at your own pace and convenience.</p>

                        </div>
                    </div>
                    <div class=" d-flex for-element">
                        <svg class="for-quality" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                            style="enable-background:new 0 0 256 256" xml:space="preserve">
                            <style>
                                .st2 {
                                    fill: none;
                                    stroke: #6b1d1d;
                                    stroke-width: .5;
                                    stroke-miterlimit: 10
                                }

                                .st3 {
                                    fill: #3a312a
                                }

                                .st4 {
                                    fill: #87796f
                                }

                                .st8 {
                                    fill: #f16c7a
                                }

                                .st9 {
                                    fill: #8ac6dd
                                }

                                .st14 {
                                    fill: #d7e057
                                }
                            </style>
                            <g id="Layer_1">
                                <path class="st4"
                                    d="M222.395 180.635H33.605c-9.447 0-17.105-7.658-17.105-17.105V33.241c0-9.447 7.658-17.106 17.105-17.106h188.789c9.447 0 17.105 7.659 17.105 17.106V163.53c.001 9.447-7.657 17.105-17.104 17.105z" />
                                <path class="st3"
                                    d="M222.395 182.135H33.605C23.347 182.135 15 173.789 15 163.53V33.241c0-10.259 8.347-18.605 18.605-18.605h188.789c10.259 0 18.605 8.346 18.605 18.605V163.53c.001 10.259-8.346 18.605-18.604 18.605zm-188.79-164.5c-8.604 0-15.605 7-15.605 15.605v130.29c0 8.605 7.001 15.605 15.605 15.605h188.789c8.604 0 15.605-7.001 15.605-15.605V33.241c0-8.605-7.001-15.605-15.605-15.605H33.605z" />
                                <path class="st14"
                                    d="M86.201 28.635h-45.17c-6.583 0-11.92 5.337-11.92 11.92v115.66c0 6.583 5.337 11.92 11.92 11.92h173.938c6.583 0 11.92-5.337 11.92-11.92V40.555c0-6.583-5.337-11.92-11.92-11.92H86.201z" />
                                <path class="st3"
                                    d="M214.969 169.635H41.031c-7.4 0-13.42-6.02-13.42-13.42V40.555c0-7.4 6.02-13.42 13.42-13.42h45.17a1.5 1.5 0 1 1 0 3h-45.17c-5.745 0-10.42 4.674-10.42 10.42v115.66c0 5.746 4.675 10.42 10.42 10.42h173.938c5.745 0 10.42-4.674 10.42-10.42V40.555c0-5.746-4.675-10.42-10.42-10.42H99.799a1.5 1.5 0 1 1 0-3h115.17c7.399 0 13.42 6.02 13.42 13.42v115.66c0 7.4-6.021 13.42-13.42 13.42z" />
                                <path class="st4" d="M113.688 180.635h28.625v35.593h-28.625z" />
                                <path class="st3"
                                    d="M142.312 217.729h-28.625a1.5 1.5 0 0 1-1.5-1.5v-35.593a1.5 1.5 0 0 1 1.5-1.5h28.625a1.5 1.5 0 0 1 1.5 1.5v35.593a1.5 1.5 0 0 1-1.5 1.5zm-27.124-3h25.625v-32.593h-25.625v32.593z" />
                                <path class="st4"
                                    d="M135.452 239.635h36.252c0-12.927-10.479-23.407-23.407-23.407h-40.593c-12.927 0-23.407 10.48-23.407 23.407h51.155z" />
                                <path class="st3"
                                    d="M171.703 241.135h-36.252a1.5 1.5 0 1 1 0-3h34.701c-.773-11.382-10.28-20.407-21.855-20.407h-40.594c-11.575 0-21.082 9.024-21.855 20.407h36.033a1.5 1.5 0 1 1 0 3H84.297a1.5 1.5 0 0 1-1.5-1.5c0-13.733 11.173-24.907 24.906-24.907h40.594c13.733 0 24.906 11.173 24.906 24.907a1.5 1.5 0 0 1-1.5 1.5z" />
                                <path class="st14"
                                    d="M226.278 203.469s3.408 12.659 13.222 13.247c0 0-13.1 4.525-13.321 14.202 0 0-2.579-13.572-12.925-14.059 0 0 12.05-1.826 13.024-13.39z" />
                                <path class="st3"
                                    d="M226.178 232.417a1.502 1.502 0 0 1-1.473-1.217c-.023-.124-2.494-12.418-11.521-12.842a1.5 1.5 0 0 1-.155-2.981c.441-.069 10.895-1.817 11.754-12.033a1.5 1.5 0 0 1 2.943-.265c.031.116 3.259 11.626 11.863 12.141a1.501 1.501 0 0 1 .402 2.915c-.121.042-12.119 4.311-12.312 12.819a1.5 1.5 0 0 1-1.375 1.46l-.126.003zm-7.742-15.729c3.878 1.969 6.231 5.746 7.587 8.876 2.026-4.021 5.941-6.787 8.949-8.427-4.135-1.842-6.783-5.651-8.334-8.722-1.792 4.36-5.271 6.868-8.202 8.273z" />
                                <path class="st14"
                                    d="M204.579 220.45s2.411 8.954 9.352 9.369c0 0-9.266 3.201-9.422 10.046 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.292 9.212-9.471z" />
                                <path class="st3"
                                    d="M204.508 241.365a1.5 1.5 0 0 1-1.473-1.22c-.016-.081-1.703-8.441-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.243 7.941-8.114a1.5 1.5 0 0 1 2.942-.266c.022.079 2.229 7.92 7.995 8.265a1.5 1.5 0 0 1 .399 2.915c-.08.028-8.282 2.952-8.412 8.662a1.5 1.5 0 0 1-1.499 1.466zm-4.519-11.528c2.106 1.333 3.523 3.395 4.447 5.28 1.376-2.232 3.515-3.872 5.364-4.972-2.286-1.27-3.884-3.35-4.941-5.224-1.173 2.286-3.014 3.875-4.87 4.916z" />
                                <path class="st14"
                                    d="M204.579 193.792s2.411 8.954 9.352 9.37c0 0-9.266 3.201-9.422 10.046 0 0-1.824-9.6-9.142-9.944 0-.001 8.524-1.292 9.212-9.472z" />
                                <path class="st3"
                                    d="M204.508 214.708a1.5 1.5 0 0 1-1.473-1.22c-.016-.081-1.703-8.442-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.243 7.941-8.113a1.5 1.5 0 0 1 2.942-.266c.022.079 2.229 7.919 7.995 8.264a1.5 1.5 0 0 1 .4 2.915c-.081.028-8.283 2.953-8.413 8.662a1.5 1.5 0 0 1-1.499 1.466zm-4.519-11.528c2.107 1.333 3.523 3.394 4.447 5.28 1.376-2.232 3.515-3.872 5.364-4.973-2.286-1.269-3.884-3.35-4.941-5.224-1.173 2.287-3.014 3.875-4.87 4.917z" />
                                <path
                                    d="M214.97 30.135h-15c5.74 0 10.42 4.67 10.42 10.42v115.66c0 5.75-4.68 10.42-10.42 10.42h15c5.74 0 10.42-4.67 10.42-10.42V40.555c0-5.75-4.68-10.42-10.42-10.42z"
                                    style="fill:#b9c239" />
                                <path class="st9"
                                    d="M170.44 95.613v32.03c0 4.5-3.645 8.145-8.145 8.145H90.687a8.143 8.143 0 0 1-8.145-8.145v-32.03l43.949 22.353 43.949-22.353z" />
                                <path class="st3"
                                    d="M162.296 137.288H90.687c-5.318 0-9.645-4.327-9.645-9.645v-32.03a1.501 1.501 0 0 1 2.18-1.337l43.27 22.007 43.269-22.007a1.5 1.5 0 0 1 2.18 1.337v32.03c-.001 5.318-4.327 9.645-9.645 9.645zm-78.254-39.23v29.585a6.653 6.653 0 0 0 6.645 6.645h71.608a6.653 6.653 0 0 0 6.645-6.645V98.058l-41.77 21.245a1.494 1.494 0 0 1-1.359 0L84.042 98.058z" />
                                <path class="st9" d="M126.491 50.699 60.366 84.332l66.125 33.633 66.125-33.633z" />
                                <path class="st3"
                                    d="M126.491 119.465c-.233 0-.467-.054-.68-.163L59.686 85.669a1.498 1.498 0 0 1 0-2.674l66.125-33.633a1.494 1.494 0 0 1 1.359 0l66.125 33.633a1.498 1.498 0 0 1 0 2.674l-66.125 33.633a1.483 1.483 0 0 1-.679.163zM63.675 84.332l62.816 31.95 62.816-31.95-62.816-31.95-62.816 31.95z" />
                                <path class="st8"
                                    d="M192.616 84.332v40.965c-1.693-2.177-3.984-3.516-6.516-3.516-2.516 0-4.806 1.339-6.5 3.516V90.945l13.016-6.613z" />
                                <path class="st3"
                                    d="M192.616 126.797a1.5 1.5 0 0 1-1.184-.579c-1.474-1.894-3.367-2.937-5.332-2.937-1.955 0-3.843 1.043-5.316 2.937a1.502 1.502 0 0 1-2.684-.921V90.945a1.5 1.5 0 0 1 .82-1.337l13.016-6.613a1.5 1.5 0 0 1 2.18 1.337v40.965a1.5 1.5 0 0 1-1.5 1.5zm-6.515-6.516c1.775 0 3.485.541 5.016 1.562V86.777l-10.016 5.088v29.977c1.526-1.02 3.231-1.561 5-1.561z" />
                                <ellipse class="st8" cx="186.105" cy="134.798" rx="9.528" ry="13.014" />
                                <path class="st3"
                                    d="M186.105 149.312c-6.081 0-11.028-6.511-11.028-14.515 0-8.003 4.947-14.514 11.028-14.514s11.028 6.511 11.028 14.514c.001 8.004-4.947 14.515-11.028 14.515zm0-26.029c-4.427 0-8.028 5.165-8.028 11.514 0 6.349 3.602 11.515 8.028 11.515 4.427 0 8.028-5.165 8.028-11.515.001-6.349-3.601-11.514-8.028-11.514z" />
                                <path class="st8"
                                    d="m19.95 207.283-3.07 3.069V239.6h61.504l4.588-4.588-45.375-45.376-6.822 6.822z" />
                                <path class="st3"
                                    d="M78.385 241.1H16.881a1.5 1.5 0 0 1-1.5-1.5v-29.248c0-.398.158-.779.439-1.06l3.069-3.069a1.5 1.5 0 1 1 2.121 2.121l-2.63 2.63V238.1h59.383l3.088-3.088-43.255-43.254-5.761 5.761a1.5 1.5 0 1 1-2.121-2.121l6.821-6.822c.562-.562 1.559-.562 2.121 0l45.376 45.376a1.5 1.5 0 0 1 0 2.121l-4.588 4.588c-.28.281-.662.439-1.059.439z" />
                                <path class="st9"
                                    d="m72.914 187.843-11.131-11.131a7.962 7.962 0 0 0-11.261 0l-12.924 12.924 45.376 45.376 12.924-12.924a7.962 7.962 0 0 0 0-11.261l-12.611-12.611-10.373-10.373z" />
                                <path class="st3"
                                    d="M82.973 236.512c-.398 0-.779-.158-1.061-.439l-45.376-45.376a1.5 1.5 0 0 1 0-2.122l12.925-12.924a9.397 9.397 0 0 1 6.691-2.772 9.4 9.4 0 0 1 6.691 2.772l11.132 11.131 22.982 22.983a9.397 9.397 0 0 1 2.772 6.691 9.397 9.397 0 0 1-2.772 6.691l-12.924 12.924a1.494 1.494 0 0 1-1.06.441zm-43.255-46.876 43.255 43.255 11.863-11.864a6.421 6.421 0 0 0 1.894-4.57 6.417 6.417 0 0 0-1.894-4.569l-34.114-34.115a6.42 6.42 0 0 0-4.569-1.893c-1.726 0-3.35.672-4.57 1.893l-11.865 11.863z" />
                                <path class="st4"
                                    d="M87.087 212.077a6.007 6.007 0 1 1-8.495 8.494 6.007 6.007 0 0 1 8.495-8.494z" />
                                <path class="st3"
                                    d="M82.839 223.827a7.485 7.485 0 0 1-5.308-2.195c-2.927-2.927-2.927-7.689 0-10.616 2.927-2.927 7.691-2.926 10.616 0 2.927 2.927 2.927 7.689 0 10.616a7.481 7.481 0 0 1-5.308 2.195zm.001-12.008a4.495 4.495 0 0 0-3.188 1.318 4.512 4.512 0 0 0 0 6.373 4.514 4.514 0 0 0 6.374 0 4.512 4.512 0 0 0 0-6.373 4.496 4.496 0 0 0-3.186-1.318z" />
                                <path
                                    d="m125.162 102.789-15.099 15.099-17.205 17.205-4.114 4.114a5.282 5.282 0 0 1-7.47 0L69.107 127.04c-4.166-4.166-10.922-4.166-15.084-.005a10.658 10.658 0 0 0 .005 15.083l9.414 9.414a12.819 12.819 0 0 1 2.435 14.727l-4.826 9.816c.253.193.496.407.729.64l34.116 34.116c.104.104.198.208.298.308l1.984-1.181a138.166 138.166 0 0 0 26.457-20.455c.064-.064.129-.119.193-.184l18.397-18.397a7.569 7.569 0 0 0 0-10.704l-.069-.069a7.569 7.569 0 0 0-10.704 0l3.66-3.661a7.569 7.569 0 0 0 0-10.704l-.07-.07a7.569 7.569 0 0 0-10.704 0l3.66-3.661a7.569 7.569 0 0 0 0-10.704l-.069-.069c-2.909-2.909-7.591-2.949-10.557-.133l17.574-17.574a7.627 7.627 0 0 0 0-10.785 7.624 7.624 0 0 0-10.784.001z"
                                    style="fill:#fce8cb" />
                                <path class="st3"
                                    d="M96.194 212.638c-.39 0-.774-.151-1.064-.442l-.297-.308-34.113-34.113a5.706 5.706 0 0 0-.579-.508 1.5 1.5 0 0 1-.434-1.854l4.826-9.816a11.317 11.317 0 0 0-2.15-13.004l-9.414-9.414a12.114 12.114 0 0 1-3.569-8.602c0-3.25 1.266-6.304 3.563-8.603 4.742-4.743 12.461-4.74 17.205.005l12.167 12.167a3.787 3.787 0 0 0 5.35 0l36.417-36.418c3.558-3.558 9.348-3.559 12.907 0 3.559 3.558 3.559 9.348 0 12.907l-12.926 12.926a9.03 9.03 0 0 1 5.909 2.659c3.248 3.248 3.57 8.239 1.017 11.783a9.004 9.004 0 0 1 6.096 2.651c3.249 3.249 3.57 8.24 1.017 11.783a9.004 9.004 0 0 1 6.097 2.651c1.782 1.782 2.726 4.06 2.726 6.481a9.01 9.01 0 0 1-2.656 6.413l-18.536 18.53a140.05 140.05 0 0 1-26.806 20.735l-1.984 1.18a1.511 1.511 0 0 1-.769.211zM62.9 175.714l33.535 33.535.976-.58a136.786 136.786 0 0 0 26.17-20.234l.132-.126 18.452-18.448a6.075 6.075 0 0 0 0-8.582c-1.216-1.216-2.74-1.847-4.361-1.847a6.03 6.03 0 0 0-4.291 1.777 1.5 1.5 0 1 1-2.121-2.121l3.661-3.661a6.077 6.077 0 0 0 0-8.583c-1.217-1.216-2.74-1.847-4.361-1.847-1.62 0-3.145.631-4.291 1.778a1.5 1.5 0 1 1-2.121-2.121l3.66-3.661a6.077 6.077 0 0 0 0-8.583c-2.412-2.411-6.129-2.458-8.533-.175a1.5 1.5 0 0 1-2.094-2.148l17.574-17.573a6.134 6.134 0 0 0 0-8.665 6.135 6.135 0 0 0-8.665 0l-36.417 36.418a6.79 6.79 0 0 1-9.592 0L68.046 128.1c-3.575-3.575-9.39-3.576-12.963-.005a9.107 9.107 0 0 0-2.685 6.479 9.136 9.136 0 0 0 2.69 6.484l9.414 9.414a14.314 14.314 0 0 1 2.721 16.45l-4.323 8.792z" />
                            </g>
                        </svg>
                        <div class="for-border ml-4">

                            <h5 class="for-label1 font-weight-bold">Student-Centered Approach</h5>
                            <p class="for-para custom_paragraph pr-2">Your success is our priority. Merakii's
                                instruction
                                prioritize individual needs and learning styles, ensuring you get the most out of
                                your educational experience.</p>
                        </div>
                    </div>
                    <div class=" d-flex for-element">
                        <svg class="for-learning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 180"
                            xml:space="preserve">
                            <path fill="#333"
                                d="M146.179 83.943h-3.884a.385.385 0 1 1 0-.768h3.884a.384.384 0 1 1 0 .768z" />
                            <path fill="#333"
                                d="M144.153 85.549a.385.385 0 0 1-.384-.385v-3.338a.384.384 0 0 1 .768 0v3.338a.385.385 0 0 1-.384.385z" />
                            <g>
                                <path fill="#FFDB76"
                                    d="M154.623 90c0 35.69-28.934 64.623-64.623 64.623-35.688 0-64.622-28.932-64.622-64.623 0-35.689 28.934-64.622 64.622-64.622 35.689 0 64.623 28.932 64.623 64.622z" />
                                <path fill="#333"
                                    d="M57.104 46.514h-9.818a.385.385 0 1 1 0-.768h9.818a.383.383 0 0 1 0 .768zM60.516 44.333h-1.585a.384.384 0 1 1 0-.768h1.585a.384.384 0 0 1 0 .768zM62.405 49.361H60.82a.385.385 0 0 1 0-.77h1.585a.386.386 0 0 1 0 .77zM57.104 44.333h-5.979a.385.385 0 0 1 0-.768h5.979a.383.383 0 0 1 0 .768zM58.412 61.128h-1.586a.383.383 0 1 1 0-.768h1.586a.384.384 0 0 1 0 .768zM54.999 61.128H49.02a.384.384 0 0 1 0-.768h5.979c.212 0 .385.172.385.385a.385.385 0 0 1-.385.383zM66.013 42.116h-7.218a.384.384 0 0 1-.383-.385c0-.212.171-.385.383-.385h7.218a.385.385 0 0 1 0 .77zM136.666 55.808h-10.17a.384.384 0 1 1 0-.768h10.17a.384.384 0 1 1 0 .768zM124.604 58.579h-1.643a.383.383 0 1 1 0-.768h1.643a.384.384 0 0 1 0 .768zM122.646 52.196h-1.643a.385.385 0 0 1 0-.77h1.643a.385.385 0 0 1 0 .77zM132.69 58.579h-6.193a.384.384 0 1 1 0-.768h6.193a.383.383 0 0 1 0 .768zM124.743 61.394h-7.477a.385.385 0 1 1 0-.768h7.477a.383.383 0 0 1 0 .768z" />
                                <g>
                                    <path fill="#333"
                                        d="M151.188 93.259h-6.951a.385.385 0 0 1 0-.769h6.951a.384.384 0 0 1 0 .769zM142.944 96.028h-1.123a.383.383 0 1 1 0-.768h1.123a.384.384 0 1 1 0 .768zM141.606 89.644h-1.122a.385.385 0 1 1 0-.768h1.122a.384.384 0 0 1 0 .768zM148.469 96.028h-4.232a.384.384 0 0 1 0-.768h4.232a.385.385 0 1 1 0 .768zM143.039 98.844h-5.11a.383.383 0 1 1 0-.768h5.11a.384.384 0 0 1 0 .768z" />
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M54.29 53.503h-3.269a.384.384 0 0 1 0-.768h3.269a.383.383 0 1 1 0 .768z" />
                                    <path fill="#333"
                                        d="M52.583 54.952a.385.385 0 0 1-.384-.385v-3.013a.384.384 0 1 1 .769 0v3.013a.386.386 0 0 1-.385.385z" />
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M87.998 145.032H77.827a.383.383 0 0 1 0-.768h10.171a.384.384 0 1 1 0 .768zM91.534 140.382h-1.643a.383.383 0 1 1 0-.768h1.643c.212 0 .383.17.383.383a.385.385 0 0 1-.383.385zM93.491 151.099h-1.643a.383.383 0 1 1 0-.768h1.643a.385.385 0 0 1 0 .768zM87.998 140.382h-6.192a.386.386 0 0 1-.385-.385c0-.213.172-.383.385-.383h6.192c.213 0 .385.17.385.383a.387.387 0 0 1-.385.385zM97.229 135.654h-7.477a.385.385 0 1 1 0-.768h7.477a.383.383 0 0 1 0 .768z" />
                                    <g>
                                        <path fill="#333"
                                            d="M102.004 145.361H98.12a.385.385 0 0 1 0-.77h3.884a.386.386 0 0 1 0 .77z" />
                                        <path fill="#333"
                                            d="M99.978 147.47a.382.382 0 0 1-.384-.383v-4.391a.384.384 0 1 1 .768 0v4.391a.383.383 0 0 1-.384.383z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M128.992 46.902h-3.884a.383.383 0 1 1 0-.768h3.884a.384.384 0 1 1 0 .768z" />
                                    <path fill="#333"
                                        d="M126.966 49.012a.384.384 0 0 1-.385-.383v-4.392a.385.385 0 0 1 .768 0v4.392a.382.382 0 0 1-.383.383z" />
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M36.786 126.585v2.639c0 1.459 1.155 2.643 2.58 2.643h101.27c1.424 0 2.58-1.184 2.58-2.643v-2.639H36.786z" />
                                    <path fill="#686868"
                                        d="M138.291 126.585V70.713c0-3.108-2.461-5.627-5.498-5.627H47.207c-3.036 0-5.498 2.519-5.498 5.627v55.872h96.582z" />
                                    <path fill="#CCCBC9" d="M46.505 70.419h86.989v51.845H46.505z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                        d="M67.814 88.174h43.087V101H67.814z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                        d="M67.814 94.587h43.087V101H67.814z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                        d="M103.65 88.174h1.609V101h-1.609zM95.976 88.174h1.609V101h-1.609zM70.754 88.174h1.609V101h-1.609zM100.484 92.429a1.235 1.235 0 1 1 0-2.47 1.235 1.235 0 0 1 0 2.47z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                        d="M100.484 95.821a1.234 1.234 0 1 1-.002-2.468 1.234 1.234 0 0 1 .002 2.468z"
                                        opacity=".6" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                        d="M100.484 99.213a1.234 1.234 0 1 1-.002-2.468 1.234 1.234 0 0 1 .002 2.468z"
                                        opacity=".2" />
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ADEBF6"
                                            d="m69.984 122.118.02-9.292 47.507.105-.02 9.292z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ADEBF6"
                                            d="m117.491 122.225.008-3.786-47.506-.274-.009 3.953z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                            d="m110.9 122.21.02-9.293 1.389.003-.02 9.292zM106.1 122.192l.021-9.293 1.387.003-.02 9.293z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                            d="m100.291 117.556 1.201-1.197 1.198 1.201-1.201 1.198zM97.423 117.502l1.202-1.197 1.197 1.202-1.202 1.196z" />
                                    </g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF916E"
                                            d="m64.35 88.133.01-9.292 47.51.057-.011 9.292z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF916E"
                                            d="m111.855 88.187.003-3.786-47.507-.225-.005 3.953z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#ADEBF6"
                                            d="m105.27 88.182.01-9.292 1.388.002-.01 9.292zM100.467 88.17l.011-9.292 1.387.002-.011 9.292z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                            d="m94.648 83.535 1.202-1.197 1.197 1.203-1.201 1.196zM91.78 83.496l1.2-1.198 1.198 1.2-1.2 1.198z" />
                                    </g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#333"
                                            d="M103.639 101.056v11.839H69.555a5.93 5.93 0 0 1-5.66-5.924 5.924 5.924 0 0 1 5.526-5.915h34.218z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF"
                                            d="M103.639 101.913v10.125H70.343c-2.927 0-5.299-2.269-5.299-5.066 0-2.704 2.214-4.913 5.004-5.059h33.591z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#B2B2B2"
                                            d="m93.372 112.038.023-6.788-.875.005v6.783z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF916E"
                                            d="m88.121 105.277 4.421-.027.075 11.852-2.228-1.876-2.193 1.905z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF916E"
                                            d="m88.166 112.188 4.422-.029.014 2.078-4.422.03z" opacity=".5" />
                                    </g>
                                    <g>
                                        <path fill="#FFF"
                                            d="M91.418 67.778c0 .802-.635 1.452-1.419 1.452s-1.418-.65-1.418-1.452c0-.802.634-1.452 1.418-1.452.785 0 1.419.65 1.419 1.452z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M103.184 65.096V49.408l-13.829 6.258-13.831-6.258v15.688h27.66z" />
                                    <path fill="#333"
                                        d="M103.184 49.409v3.4l-13.832 6.254-13.828-6.258v-3.396l13.831 6.259 13.829-6.259z" />
                                    <path fill="#757575"
                                        d="M89.354 54.218v1.454l-23.901-9.574v-1.322l.01-.005 23.891 9.447z" />
                                    <path fill="#333"
                                        d="m89.354 54.219-23.901-9.452 24.078-9.287 23.278 9.296zM111.101 45.721h1.396V60.4h-1.396z" />
                                    <path fill="#333"
                                        d="M114.012 60.925a2.21 2.21 0 0 0-2.213-2.212 2.214 2.214 0 0 0 0 4.427 2.214 2.214 0 0 0 2.213-2.215z" />
                                    <path fill="#333"
                                        d="M113.271 62.034h-2.794c-.468 1.249-1.502 4.684-.914 9.391 0 .282 1.033.511 2.308.511 1.274 0 2.308-.229 2.308-.511.587-4.707-.442-8.142-.908-9.391z" />
                                    <g>
                                        <path fill="#B2B2B2"
                                            d="m89.354 54.218.001 1.454 23.454-9.574v-1.322l-.01-.005-23.444 9.447z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M36.78 93.018h-6.034a.384.384 0 0 1 0-.769h6.034a.384.384 0 0 1 0 .769zM35.861 88.589h-.975a.385.385 0 1 1 0-.768h.975a.385.385 0 0 1 0 .768zM37.021 97.722h-.975a.385.385 0 1 1 0-.768h.975a.385.385 0 1 1 0 .768zM33.762 88.589h-3.674a.384.384 0 1 1 0-.768h3.674a.385.385 0 1 1 0 .768zM39.24 84.559h-4.436a.385.385 0 1 1 0-.769h4.436a.384.384 0 0 1 0 .769z" />
                                </g>
                            </g>
                        </svg>
                        <div class="for-border ml-4">

                            <h5 class="for-label1 font-weight-bold">Supportive Services</h5>
                            <p class="for-para custom_paragraph pr-2">Juggling work, studies, and personal life can be
                                demanding. Merakii provide academic advisors, mentors, and support services
                                to help you navigate your program and succeed.</p>
                        </div>
                    </div>
                </div>
                <!-- 3rd 1st-side-->
                <div class="col-md-4 col-12 for-main">
                    <div class="d-flex for-element">
                        <svg class="for-global" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                            style="enable-background:new 0 0 256 256" xml:space="preserve">
                            <style>
                                .st2 {
                                    fill: none;
                                    stroke: #6b1d1d;
                                    stroke-width: .5;
                                    stroke-miterlimit: 10
                                }

                                .st3 {
                                    fill: #3a312a
                                }

                                .st4 {
                                    fill: #87796f
                                }

                                .st14 {
                                    fill: #d7e057
                                }

                                .st19 {
                                    fill: #fae6ca
                                }
                            </style>
                            <g id="Layer_1">
                                <path class="st4"
                                    d="M222.145 180.568H33.355c-9.447 0-17.105-7.658-17.105-17.105V33.173c0-9.447 7.658-17.106 17.105-17.106h188.789c9.447 0 17.105 7.658 17.105 17.106v130.289c.001 9.447-7.657 17.106-17.104 17.106z" />
                                <path class="st3"
                                    d="M222.145 182.068H33.355c-10.259 0-18.605-8.346-18.605-18.605V33.173c0-10.259 8.347-18.605 18.605-18.605h188.789c10.259 0 18.605 8.346 18.605 18.605v130.289c.001 10.26-8.346 18.606-18.604 18.606zm-188.79-164.5c-8.604 0-15.605 7-15.605 15.605v130.289c0 8.605 7.001 15.605 15.605 15.605h188.789c8.604 0 15.605-7.001 15.605-15.605V33.173c0-8.605-7.001-15.605-15.605-15.605H33.355z" />
                                <path class="st14"
                                    d="M28.861 115.877v40.271c0 6.583 5.337 11.92 11.92 11.92h173.938c6.583 0 11.92-5.337 11.92-11.92V40.488c0-6.583-5.337-11.92-11.92-11.92H40.781c-6.583 0-11.92 5.337-11.92 11.92v75.389z" />
                                <path class="st3"
                                    d="M214.719 169.568H40.781c-7.4 0-13.42-6.02-13.42-13.42v-40.271a1.5 1.5 0 1 1 3 0v40.271c0 5.746 4.675 10.42 10.42 10.42h173.938c5.745 0 10.42-4.674 10.42-10.42V40.488c0-5.746-4.675-10.42-10.42-10.42H40.781c-5.745 0-10.42 4.674-10.42 10.42v62.167a1.5 1.5 0 1 1-3 0V40.488c0-7.4 6.02-13.42 13.42-13.42h173.938c7.399 0 13.42 6.02 13.42 13.42v115.66c0 7.4-6.021 13.42-13.42 13.42z" />
                                <path class="st4" d="M113.438 180.568h28.625v35.593h-28.625z" />
                                <path class="st3"
                                    d="M142.062 217.661h-28.625a1.5 1.5 0 0 1-1.5-1.5v-35.593a1.5 1.5 0 0 1 1.5-1.5h28.625a1.5 1.5 0 0 1 1.5 1.5v35.593a1.5 1.5 0 0 1-1.5 1.5zm-27.124-3h25.625v-32.593h-25.625v32.593z" />
                                <path class="st4"
                                    d="M135.202 239.568h36.252c0-12.927-10.479-23.407-23.407-23.407h-40.593c-12.927 0-23.407 10.479-23.407 23.407h51.155z" />
                                <path class="st3"
                                    d="M171.453 241.068h-36.252a1.5 1.5 0 1 1 0-3h34.701c-.773-11.382-10.28-20.407-21.855-20.407h-40.594c-11.575 0-21.082 9.024-21.855 20.407h36.033a1.5 1.5 0 1 1 0 3H84.047a1.5 1.5 0 0 1-1.5-1.5c0-13.733 11.173-24.907 24.906-24.907h40.594c13.733 0 24.906 11.173 24.906 24.907a1.5 1.5 0 0 1-1.5 1.5z" />
                                <path class="st14"
                                    d="M47.421 203.402s3.408 12.659 13.222 13.246c0 0-13.1 4.525-13.321 14.202 0 0-2.579-13.572-12.925-14.059 0 0 12.05-1.825 13.024-13.389z" />
                                <path class="st3"
                                    d="M47.321 232.349a1.502 1.502 0 0 1-1.473-1.217c-.023-.124-2.494-12.417-11.522-12.842a1.5 1.5 0 0 1-.155-2.982c.441-.069 10.895-1.817 11.754-12.032a1.501 1.501 0 0 1 2.943-.265c.031.116 3.259 11.626 11.863 12.141a1.5 1.5 0 0 1 .402 2.915c-.121.042-12.118 4.31-12.312 12.818a1.498 1.498 0 0 1-1.5 1.464zm-7.742-15.729c3.879 1.969 6.231 5.746 7.588 8.876 2.026-4.021 5.941-6.787 8.948-8.427-4.134-1.842-6.783-5.651-8.334-8.723-1.793 4.361-5.27 6.869-8.202 8.274z" />
                                <path class="st14"
                                    d="M25.722 220.382s2.411 8.954 9.352 9.369c0 0-9.266 3.201-9.422 10.046 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.291 9.212-9.471z" />
                                <path class="st3"
                                    d="M25.651 241.297a1.5 1.5 0 0 1-1.473-1.22c-.016-.082-1.704-8.442-7.739-8.726a1.5 1.5 0 0 1-.154-2.982c.296-.047 7.363-1.243 7.942-8.114a1.501 1.501 0 0 1 1.361-1.368 1.506 1.506 0 0 1 1.582 1.102c.021.079 2.227 7.919 7.993 8.264a1.5 1.5 0 0 1 .4 2.916c-.081.028-8.282 2.953-8.412 8.662a1.5 1.5 0 0 1-1.5 1.466zm-4.519-11.527c2.108 1.333 3.524 3.394 4.447 5.28 1.376-2.232 3.515-3.872 5.365-4.973-2.287-1.269-3.885-3.35-4.941-5.224-1.174 2.287-3.016 3.876-4.871 4.917z" />
                                <path class="st14"
                                    d="M25.722 193.725s2.411 8.954 9.352 9.369c0 0-9.266 3.201-9.422 10.046 0 0-1.824-9.6-9.142-9.944 0-.001 8.524-1.292 9.212-9.471z" />
                                <path class="st3"
                                    d="M25.651 214.64a1.5 1.5 0 0 1-1.473-1.22c-.016-.082-1.704-8.442-7.739-8.726a1.5 1.5 0 0 1-.154-2.982c.296-.047 7.363-1.243 7.942-8.114a1.501 1.501 0 0 1 1.361-1.368c.712-.061 1.392.4 1.582 1.103.038.138 2.249 7.92 7.993 8.263a1.5 1.5 0 0 1 .4 2.915c-.081.028-8.282 2.952-8.412 8.662a1.5 1.5 0 0 1-1.5 1.467zm-4.519-11.528c2.108 1.332 3.524 3.394 4.447 5.28 1.376-2.233 3.515-3.872 5.365-4.973-2.287-1.269-3.885-3.35-4.941-5.224-1.174 2.287-3.016 3.876-4.871 4.917z" />
                                <path class="st19"
                                    d="M208.323 25.02a105.268 105.268 0 0 0-80.572 0v107.968a105.277 105.277 0 0 1 80.572 0V25.02z" />
                                <path class="st3"
                                    d="M208.323 134.488c-.194 0-.39-.038-.574-.114-25.607-10.607-53.816-10.607-79.424 0a1.498 1.498 0 0 1-2.074-1.386V25.02a1.5 1.5 0 0 1 .926-1.386c26.35-10.914 55.371-10.914 81.721 0a1.5 1.5 0 0 1 .926 1.386v107.968a1.498 1.498 0 0 1-1.501 1.5zm-40.286-11.071c13.118 0 26.237 2.451 38.786 7.351V26.027c-25.053-10.104-52.52-10.104-77.572 0v104.741c12.549-4.901 25.668-7.351 38.786-7.351z" />
                                <path class="st19"
                                    d="M127.749 25.02a105.268 105.268 0 0 0-80.572 0v107.968a105.277 105.277 0 0 1 80.572 0V25.02z" />
                                <path class="st3"
                                    d="M127.749 134.488c-.194 0-.39-.038-.574-.114-25.607-10.607-53.816-10.607-79.424 0a1.498 1.498 0 0 1-2.074-1.386V25.02a1.5 1.5 0 0 1 .926-1.386c26.35-10.914 55.371-10.914 81.721 0 .561.232.926.779.926 1.386v107.968a1.498 1.498 0 0 1-1.501 1.5zm-40.286-11.071c13.118 0 26.237 2.451 38.786 7.351V26.027c-25.053-10.104-52.52-10.104-77.572 0v104.741c12.549-4.901 25.668-7.351 38.786-7.351z" />
                                <path class="st3"
                                    d="M56.463 114.153a1.501 1.501 0 0 1-.443-2.934c20.566-6.346 42.313-6.345 62.885 0a1.5 1.5 0 0 1-.885 2.867c-19.996-6.167-41.129-6.167-61.115 0a1.515 1.515 0 0 1-.442.067zM137.462 114.013a1.501 1.501 0 0 1-.436-2.935c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.946-40.475-5.934-60.13.039a1.508 1.508 0 0 1-.437.065zM56.463 99.153a1.501 1.501 0 0 1-.443-2.934c20.566-6.346 42.313-6.345 62.885 0a1.5 1.5 0 0 1-.885 2.867c-19.996-6.167-41.129-6.167-61.115 0a1.515 1.515 0 0 1-.442.067zM137.462 99.013a1.501 1.501 0 0 1-.436-2.935c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.946-40.475-5.934-60.13.039a1.508 1.508 0 0 1-.437.065zM56.463 84.153a1.501 1.501 0 0 1-.443-2.934c20.566-6.346 42.313-6.344 62.885 0a1.5 1.5 0 0 1-.885 2.867c-19.996-6.167-41.129-6.167-61.115 0a1.515 1.515 0 0 1-.442.067zM137.462 84.013a1.501 1.501 0 0 1-.436-2.935c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.947-40.475-5.933-60.13.039a1.508 1.508 0 0 1-.437.065zM56.463 69.153a1.501 1.501 0 0 1-.443-2.934c20.566-6.346 42.313-6.345 62.885 0a1.5 1.5 0 0 1-.885 2.867c-19.996-6.167-41.129-6.167-61.115 0a1.515 1.515 0 0 1-.442.067zM137.462 69.013a1.501 1.501 0 0 1-.436-2.935c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.946-40.475-5.933-60.13.039a1.508 1.508 0 0 1-.437.065zM56.463 54.153a1.5 1.5 0 0 1-.443-2.933c20.566-6.346 42.313-6.345 62.885-.001a1.5 1.5 0 0 1-.885 2.868c-19.996-6.167-41.129-6.167-61.115 0a1.548 1.548 0 0 1-.442.066zM137.462 54.013a1.501 1.501 0 0 1-.436-2.936c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.946-40.475-5.934-60.13.039a1.476 1.476 0 0 1-.437.066zM56.463 39.153a1.5 1.5 0 0 1-.443-2.933c20.566-6.346 42.313-6.345 62.885 0a1.5 1.5 0 0 1-.885 2.867c-19.996-6.167-41.129-6.167-61.115 0a1.548 1.548 0 0 1-.442.066zM137.462 39.013a1.501 1.501 0 0 1-.436-2.935c20.228-6.146 41.621-6.159 61.87-.041a1.5 1.5 0 0 1-.867 2.872c-19.681-5.946-40.475-5.934-60.13.039a1.508 1.508 0 0 1-.437.065z" />
                                <circle cx="183.75" cy="183.932" r="56" style="fill:#8ac6dd" />
                                <path class="st3"
                                    d="M183.75 241.432c-31.706 0-57.5-25.794-57.5-57.5s25.794-57.5 57.5-57.5 57.5 25.794 57.5 57.5-25.794 57.5-57.5 57.5zm0-112c-30.052 0-54.5 24.449-54.5 54.5s24.448 54.5 54.5 54.5 54.5-24.449 54.5-54.5-24.448-54.5-54.5-54.5z" />
                                <path class="st3"
                                    d="M183.75 241.432c-21.474 0-38.943-25.794-38.943-57.5s17.47-57.5 38.943-57.5 38.943 25.794 38.943 57.5-17.469 57.5-38.943 57.5zm0-112c-19.819 0-35.943 24.449-35.943 54.5s16.124 54.5 35.943 54.5 35.943-24.449 35.943-54.5-16.124-54.5-35.943-54.5z" />
                                <path class="st3"
                                    d="M183.75 241.432c-10.405 0-16.02-29.626-16.02-57.5s5.615-57.5 16.02-57.5 16.02 29.626 16.02 57.5-5.615 57.5-16.02 57.5zm0-112c-6.158 0-13.02 22.382-13.02 54.5 0 32.118 6.862 54.5 13.02 54.5s13.02-22.382 13.02-54.5c0-32.117-6.862-54.5-13.02-54.5z" />
                                <path class="st3"
                                    d="M183.75 222.876c-31.706 0-57.5-17.47-57.5-38.944 0-21.474 25.794-38.943 57.5-38.943s57.5 17.47 57.5 38.943c0 21.474-25.794 38.944-57.5 38.944zm0-74.887c-30.052 0-54.5 16.124-54.5 35.943s24.448 35.944 54.5 35.944 54.5-16.124 54.5-35.944c0-19.819-24.448-35.943-54.5-35.943z" />
                                <path class="st3"
                                    d="M183.75 199.953c-27.875 0-57.5-5.615-57.5-16.02s29.625-16.02 57.5-16.02 57.5 5.615 57.5 16.02-29.625 16.02-57.5 16.02zm0-29.041c-32.117 0-54.5 6.862-54.5 13.02 0 6.159 22.383 13.02 54.5 13.02s54.5-6.862 54.5-13.02c0-6.158-22.383-13.02-54.5-13.02z" />
                                <path
                                    d="M214.719 30.068h-4.896V132.71a57.788 57.788 0 0 1 15.316 11.369V40.488c0-5.746-4.675-10.42-10.42-10.42z"
                                    style="fill:#b9c239" />
                            </g>
                        </svg>
                        <div class="for-border ml-4">
                            <h5 class="for-label1 font-weight-bold">Evening and Weekend Courses</h5>
                            <p class="for-para custom_paragraph pr-2">Daytime obligations shouldn't hinder your
                                education. Merakii cater to working adults by providing classes outside of
                                regular business hours.</p>

                        </div>
                    </div>
                    <div class=" d-flex for-element">
                        <svg class="for-affordability" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            x="0" y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 256 256"
                            xml:space="preserve">
                            <style>
                                .st0 {
                                    fill: #382b73
                                }

                                .st2 {
                                    fill: #f6ca14
                                }

                                .st3 {
                                    fill: #e7ad27
                                }

                                .st5 {
                                    fill: #fddd3a
                                }

                                .st7 {
                                    fill: #009add
                                }

                                .st12 {
                                    fill: #d0d2d3
                                }

                                .st13 {
                                    fill: #fff
                                }

                                .st14 {
                                    fill: #0099dc
                                }

                                .st15 {
                                    fill: #1cade3
                                }

                                .st17 {
                                    fill: #106ea0
                                }
                            </style>
                            <switch>
                                <g>
                                    <circle class="st0" cx="128" cy="128" r="120" />
                                    <circle cx="128" cy="128" r="102.5" style="fill:#473080" />
                                    <path class="st0"
                                        d="M195.675 124.643h-28.026l.008-23.562v.013l.001-1.777a8.855 8.855 0 0 0-2.751-6.43l-.013-.012a8.913 8.913 0 0 0-1.27-1.004l-.129-.083a8.843 8.843 0 0 0-4.72-1.357h-1.341c.37-1.883.565-3.829.565-5.82 0-16.568-13.431-30-30-30s-30 13.432-30 30c0 1.985.193 3.924.561 5.801l-38.215-.013a8.854 8.854 0 0 0-1.5.126c-4.192.712-7.385 4.36-7.387 8.755l-.001 1.777v-.006l-.018 53.485a8.885 8.885 0 0 0 8.881 8.887l28.039.009v25.352a9.115 9.115 0 0 0 .227 2.007 9.005 9.005 0 0 0 .744 2.039l.1.19a8.883 8.883 0 0 0 7.812 4.649h98.43a8.885 8.885 0 0 0 8.884-8.884V133.53a8.88 8.88 0 0 0-8.881-8.887z" />
                                    <g>
                                        <path class="st2"
                                            d="m158.752 156.454-98.43-.033a8.884 8.884 0 0 1-8.881-8.887l.018-55.255a8.884 8.884 0 0 1 8.887-8.881l98.43.033a8.883 8.883 0 0 1 8.881 8.887l-.018 55.255a8.885 8.885 0 0 1-8.887 8.881z" />
                                        <path class="st3"
                                            d="m158.752 154.677-98.43-.033a8.884 8.884 0 0 1-8.881-8.887l-.001 1.777a8.885 8.885 0 0 0 8.881 8.887l98.43.033a8.885 8.885 0 0 0 8.887-8.881l.001-1.777c-.001 4.906-3.98 8.882-8.887 8.881z" />
                                        <path
                                            d="m158.776 83.43-98.43-.033a8.885 8.885 0 0 0-8.887 8.881l-.001 1.777a8.883 8.883 0 0 1 8.887-8.881l98.43.033a8.884 8.884 0 0 1 8.881 8.887l.001-1.777a8.884 8.884 0 0 0-8.881-8.887z"
                                            style="fill:#fff235" />
                                        <path class="st3" d="M51.456 92.298h116.198v16.936H51.456z" />
                                        <path class="st5"
                                            d="m155.743 123.894-93.859-.031a3.058 3.058 0 1 1 .002-6.116l93.859.031a3.057 3.057 0 1 1-.002 6.116zM117.85 138.255l-55.97-.019a3.058 3.058 0 1 1 .002-6.116l55.97.019a3.058 3.058 0 1 1-.002 6.116z" />
                                        <g>
                                            <path
                                                d="M195.675 190.667h-98.43a8.884 8.884 0 0 1-8.884-8.884v-55.255a8.884 8.884 0 0 1 8.884-8.884h98.43a8.883 8.883 0 0 1 8.884 8.884v55.255a8.884 8.884 0 0 1-8.884 8.884z"
                                                style="fill:#1caee4" />
                                            <path class="st7"
                                                d="M195.675 188.89h-98.43a8.884 8.884 0 0 1-8.884-8.884v1.777a8.884 8.884 0 0 0 8.884 8.884h98.43a8.884 8.884 0 0 0 8.884-8.884v-1.777a8.884 8.884 0 0 1-8.884 8.884z" />
                                            <path
                                                d="M195.675 117.643h-98.43a8.883 8.883 0 0 0-8.884 8.884v1.777a8.885 8.885 0 0 1 8.884-8.884h98.43a8.884 8.884 0 0 1 8.884 8.884v-1.777a8.884 8.884 0 0 0-8.884-8.884z"
                                                style="fill:#27c1e6" />
                                            <path class="st7"
                                                d="M110.734 151.637h-9.476a3.554 3.554 0 0 1-3.554-3.554v-9.476a3.554 3.554 0 0 1 3.554-3.554h9.476a3.554 3.554 0 0 1 3.554 3.554v9.476a3.555 3.555 0 0 1-3.554 3.554z" />
                                            <path class="st5"
                                                d="M110.734 150.926h-9.476a3.554 3.554 0 0 1-3.554-3.554v-9.476a3.554 3.554 0 0 1 3.554-3.554h9.476a3.554 3.554 0 0 1 3.554 3.554v9.476a3.555 3.555 0 0 1-3.554 3.554z" />
                                            <path class="st2" d="M102.442 139.081h7.107v7.107h-7.107z" />
                                            <path class="st2"
                                                d="M97.704 139.081h16.583v.711H97.704zM97.704 145.477h16.583v.711H97.704z" />
                                            <path transform="rotate(-90 102.797 142.634)" class="st2"
                                                d="M94.505 142.279h16.584v.711H94.505z" />
                                            <path transform="rotate(-90 109.194 142.634)" class="st2"
                                                d="M100.902 142.279h16.584v.711h-16.584z" />
                                            <path class="st5"
                                                d="M113.195 169.378H98.796a3.058 3.058 0 1 1 0-6.116h14.398a3.057 3.057 0 1 1 .001 6.116z" />
                                            <g>
                                                <path class="st5"
                                                    d="M139.682 169.378h-14.398a3.058 3.058 0 1 1 0-6.116h14.398a3.058 3.058 0 0 1 0 6.116z" />
                                            </g>
                                            <g>
                                                <path class="st5"
                                                    d="M166.169 169.378H151.77a3.058 3.058 0 1 1 0-6.116h14.398a3.057 3.057 0 1 1 .001 6.116z" />
                                            </g>
                                            <g>
                                                <path class="st5"
                                                    d="M192.656 169.378h-14.398a3.058 3.058 0 1 1 0-6.116h14.398a3.058 3.058 0 0 1 0 6.116z" />
                                            </g>
                                            <g>
                                                <path class="st5"
                                                    d="M154.767 180.987h-55.97a3.058 3.058 0 1 1 0-6.116h55.97a3.058 3.058 0 1 1 0 6.116z" />
                                            </g>
                                            <g>
                                                <path class="st5"
                                                    d="M194.529 142.634a9.335 9.335 0 1 1-18.67 0 9.335 9.335 0 0 1 18.67 0z" />
                                            </g>
                                            <g>
                                                <path class="st5"
                                                    d="M179.555 142.634a9.335 9.335 0 1 1-18.67 0 9.335 9.335 0 0 1 18.67 0z" />
                                            </g>
                                        </g>
                                        <path class="st3"
                                            d="M98.054 83.41c.931 15.73 13.982 28.2 29.946 28.2 15.957 0 29.004-12.459 29.945-28.18l-59.891-.02z" />
                                        <g>
                                            <circle cx="128" cy="77.609" r="30" style="fill:#ef5a9d" />
                                            <path
                                                d="m147.658 93.661-.001-.005a3.53 3.53 0 0 0-.016-.101l-.001-.008-.016-.087-.005-.025-.018-.081-.006-.027-.018-.072-.01-.038-.031-.106-3.544-11.548-.039-.121a3.444 3.444 0 0 0-2.455-2.225 3.532 3.532 0 0 0-.372-.068l-5.918-.781a.694.694 0 0 0-.171-.559l-1.672-1.863a.696.696 0 0 0-.785-.178l-.105.043v-1.634c1.729-1.129 3.09-2.961 3.812-5.173.049.013.099.023.15.03.933.131 1.824-.719 1.989-1.898.165-1.179-.457-2.241-1.39-2.371a1.42 1.42 0 0 0-.195-.013 4.955 4.955 0 0 0-.007-.125l-.007-.107a5.77 5.77 0 0 0-.01-.131l-.01-.11-.013-.131-.012-.104-.016-.129-.015-.11-.017-.117-.018-.116-.019-.113-.02-.112a4.108 4.108 0 0 0-.023-.118l-.021-.102-.026-.122-.023-.101a19.36 19.36 0 0 0-.027-.113l-.026-.104-.032-.117-.026-.096-.031-.106a3.34 3.34 0 0 0-.032-.107l-.02-.062a7.088 7.088 0 0 0-.086-.258l-.028-.08-.038-.103a3.91 3.91 0 0 0-.037-.098l-.047-.118-.029-.073-.05-.117a2.633 2.633 0 0 0-.034-.078l-.051-.112-.034-.074-.056-.114-.035-.071a5.628 5.628 0 0 0-.056-.109l-.04-.075-.059-.109-.035-.061a6.983 6.983 0 0 0-.067-.117l-.033-.055c-.023-.04-.048-.079-.072-.118l-.03-.047-.078-.122-.027-.04a5.647 5.647 0 0 0-.086-.127l-.01-.014a7.784 7.784 0 0 0-1.112-1.275l-.002-.001a7.865 7.865 0 0 0-2.474-1.539l-.033-.012-.175-.066a.868.868 0 0 0-.047-.016l-.161-.055a7.199 7.199 0 0 0-.214-.068l-.06-.018-.158-.045-.058-.016-.182-.046-.033-.008a8.2 8.2 0 0 0-.446-.094l-.047-.008a5.39 5.39 0 0 0-.401-.062 2.184 2.184 0 0 0-.08-.01l-.144-.017-.088-.009a.088.088 0 0 1-.016-.002h-.004l-.12-.011-.092-.007-.105-.007-.066-.004-.059-.003-.066-.003-.106-.004-.059-.002-.029-.001a13.604 13.604 0 0 0-.418 0l-.065.002a7.216 7.216 0 0 0-.147.005l-.096.005a4.51 4.51 0 0 0-.204.014l-.124.01-.085.008-.123.013a2.574 2.574 0 0 0-.092.011l-.113.014-.102.015-.103.015-.104.018-.099.017-.105.02-.097.019-.104.023-.095.021-.11.026-.086.022-.111.029-.085.023a3.53 3.53 0 0 0-.192.057l-.114.036a5.309 5.309 0 0 0-.381.134l-.074.028a13.329 13.329 0 0 0-.299.123l-.063.028-.122.055-.055.026a4.584 4.584 0 0 0-.122.059l-.055.028a7.622 7.622 0 0 0-.127.065l-.043.023-.128.07-.046.026-.129.075a.602.602 0 0 1-.034.02l-.137.084-.025.016a6.9 6.9 0 0 0-.142.092l-.017.012-.147.1a.055.055 0 0 0-.008.006l-.152.109-.002.001c-1.899 1.404-3.168 3.682-3.322 6.648-.065 0-.13.004-.194.013-.933.131-1.556 1.192-1.39 2.371.165 1.179 1.055 2.029 1.988 1.898.051-.007.101-.017.15-.03.722 2.212 2.082 4.044 3.812 5.173v1.634l-.105-.043a.697.697 0 0 0-.785.178l-1.672 1.863a.691.691 0 0 0-.171.559l-5.918.781a3.485 3.485 0 0 0-1.289.434 3.45 3.45 0 0 0-.767.601c-.028.03-.056.059-.083.09a3.451 3.451 0 0 0-.727 1.289l-3.544 11.548a4.378 4.378 0 0 0-.031.108l-.004.015a3.326 3.326 0 0 0-.027.103l-.022.1-.003.013a1.618 1.618 0 0 0-.018.096l-.001.008a3.4 3.4 0 0 0-.047.693l.005.101a3.718 3.718 0 0 0 .092.593l.025.096a3.496 3.496 0 0 0 .391.899c.223.361.511.681.85.941.052.04.106.078.16.116.546.37 1.208.589 1.934.589h31.592a3.435 3.435 0 0 0 3.042-1.816 3.422 3.422 0 0 0 .361-1.02l.017-.098c.015-.099.026-.199.032-.3l.005-.101a3.47 3.47 0 0 0-.031-.585z"
                                                style="fill:#e43d91" />
                                            <path class="st3" d="M124.396 69.185h8.078v8.078h-8.078z" />
                                            <path class="st2"
                                                d="M121.825 64.308c.165 1.179-.457 2.241-1.39 2.371-.933.131-1.823-.719-1.989-1.898-.165-1.179.457-2.241 1.39-2.371.933-.131 1.824.719 1.989 1.898zM135.045 64.308c-.165 1.179.457 2.241 1.39 2.371s1.823-.719 1.989-1.898c.165-1.179-.457-2.241-1.39-2.371-.933-.131-1.824.719-1.989 1.898z" />
                                            <path class="st5"
                                                d="M136.856 63.013c0 5.543-3.77 10.037-8.421 10.037s-8.421-4.494-8.421-10.037 3.77-8.869 8.421-8.869c4.651-.001 8.421 3.325 8.421 8.869z" />
                                            <path class="st2"
                                                d="M128.435 72.179c-4.528 0-8.22-4.26-8.412-9.6a12.36 12.36 0 0 0-.009.434c0 5.543 3.77 10.037 8.421 10.037s8.421-4.494 8.421-10.037c0-.146-.004-.291-.009-.434-.193 5.34-3.884 9.6-8.412 9.6z" />
                                            <path class="st2"
                                                d="M136.833 63.711c-.281-4.766-3.452-7.737-7.477-8.13a7.937 7.937 0 0 0 7.384 9.083c.044-.312.074-.63.093-.953z" />
                                            <path
                                                d="M144.231 95.229h-31.592c-2.325 0-3.987-2.249-3.305-4.472l3.544-11.548a3.457 3.457 0 0 1 2.867-2.415l12.69-1.675 12.69 1.675a3.457 3.457 0 0 1 2.867 2.415l3.544 11.548c.682 2.223-.98 4.472-3.305 4.472z"
                                                style="fill:#e6e7e8" />
                                            <path class="st12"
                                                d="m130.736 79.137-1.791 1.791a.72.72 0 0 1-1.02 0l-1.791-1.791a.72.72 0 0 1 0-1.02l1.791-1.791a.72.72 0 0 1 1.02 0l1.791 1.791a.72.72 0 0 1 0 1.02z" />
                                            <path class="st13"
                                                d="m109.334 92.151 3.544-11.548a3.457 3.457 0 0 1 2.867-2.415l12.69-1.675 12.69 1.675a3.457 3.457 0 0 1 2.867 2.415l3.544 11.548c.033.108.059.216.081.323a3.435 3.435 0 0 0-.081-1.716l-3.544-11.548a3.457 3.457 0 0 0-2.867-2.415l-12.69-1.676-12.69 1.676a3.458 3.458 0 0 0-2.867 2.415l-3.544 11.548a3.435 3.435 0 0 0-.081 1.716 3.39 3.39 0 0 1 .081-.323z" />
                                            <path class="st12"
                                                d="m128.435 75.128-2.737 3.833a.89.89 0 0 1-1.393.07l-2.649-3.017 6.779-.886zM128.435 75.128l2.737 3.833a.89.89 0 0 0 1.393.07l2.649-3.017-6.779-.886zM147.41 90.347a3.45 3.45 0 0 1-3.179 2.097h-31.592a3.45 3.45 0 0 1-3.179-2.097l-.126.411c-.682 2.223.98 4.471 3.305 4.471h31.592c2.325 0 3.987-2.249 3.305-4.471l-.126-.411z" />
                                            <path class="st2"
                                                d="M120.014 63.013c0 .456.028.904.077 1.344a9.547 9.547 0 0 0 12.011-9.222c0-.074-.004-.147-.005-.221a8.8 8.8 0 0 0-3.662-.77c-4.651-.001-8.421 3.325-8.421 8.869z" />
                                            <path class="st14"
                                                d="M120.024 62.568a7.94 7.94 0 0 0 11.205-7.991 9.004 9.004 0 0 0-2.794-.434c-4.525 0-8.215 3.149-8.411 8.425z" />
                                            <path class="st15"
                                                d="M128.435 55.536c.98 0 1.919.149 2.794.434l.006.078c.02-.23.032-.462.032-.698 0-.261-.014-.519-.038-.773a9.004 9.004 0 0 0-2.794-.434c-4.525 0-8.215 3.149-8.411 8.425.043.02.088.037.132.056.719-4.466 4.151-7.088 8.279-7.088z" />
                                            <path class="st15"
                                                d="M129.356 54.189a7.939 7.939 0 0 0 7.494 9.091c.002-.089.006-.178.006-.267 0-5.173-3.283-8.413-7.5-8.824z" />
                                            <path
                                                d="M129.356 55.582c3.901.38 7 3.183 7.443 7.695l.051.003c.002-.089.006-.178.006-.267 0-5.172-3.283-8.413-7.5-8.824a7.943 7.943 0 0 0-.053 1.858c.013-.156.031-.311.053-.465z"
                                                style="fill:#23c1e6" />
                                            <path class="st13"
                                                d="M131.51 78.194c.24.239.618.271.894.075l2.518-1.785a.696.696 0 0 0 .113-1.031l-1.672-1.863a.696.696 0 0 0-.785-.178l-4.144 1.715 3.076 3.067z" />
                                            <path class="st13"
                                                d="M125.36 78.194a.696.696 0 0 1-.894.075l-2.519-1.785a.696.696 0 0 1-.112-1.031l1.672-1.863a.696.696 0 0 1 .785-.178l4.144 1.715-3.076 3.067z" />
                                            <path class="st14" d="m125.286 95.229 2.156-17.479h1.986l2.157 17.479z" />
                                            <path class="st12"
                                                d="M137.84 85.724h-5.051a.698.698 0 0 1 0-1.396h5.051a.699.699 0 0 1 0 1.396zM114.682 95.229l1.501-8.299c.056-.312.506-.302.55.011l1.153 8.288h-3.204zM142.189 95.229l-1.501-8.299c-.056-.312-.506-.302-.55.011l-1.153 8.288h3.204z" />
                                            <path class="st17"
                                                d="m127.173 80.454.752.752a.72.72 0 0 0 1.02 0l.752-.752-.269-2.704h-1.986l-.269 2.704z" />
                                            <path class="st15"
                                                d="m130.736 78.441-1.791 1.791a.72.72 0 0 1-1.02 0l-1.791-1.791a.72.72 0 0 1 0-1.02l1.791-1.791a.72.72 0 0 1 1.02 0l1.791 1.791a.72.72 0 0 1 0 1.02z" />
                                            <path class="st2"
                                                d="m129.31 67.992-.655.655a.311.311 0 0 1-.441 0l-.655-.655a.312.312 0 0 1 .22-.532h1.31c.278 0 .418.336.221.532z" />
                                            <path class="st17" d="m125.626 92.474-.34 2.755h6.299l-.34-2.755z" />
                                        </g>
                                    </g>
                                </g>
                            </switch>
                        </svg>
                        <div class="for-border ml-4">

                            <h5 class="for-label1 font-weight-bold">Real-world Focused Curriculum</h5>
                            <p class="for-para custom_paragraph pr-2"> Learning goes beyond the basics and our
                                curriculum emphasizes achieving competency and mastering essential
                                healthcare skills, preparing you for real-world scenarios.</p>
                        </div>
                    </div>
                    <div class=" d-flex for-element">
                        <svg class="for-focus" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0"
                            y="0" viewBox="0 0 256 256" style="enable-background:new 0 0 256 256" xml:space="preserve">
                            <style>
                                .st0 {
                                    fill: #4671c6
                                }

                                .st3 {
                                    fill: #a4c9ff
                                }

                                .st4 {
                                    fill: #3762cc
                                }

                                .st5 {
                                    fill: #e0ebfc
                                }

                                .st7 {
                                    fill: #b9befc
                                }
                            </style>
                            <path class="st3"
                                d="M178.346 248.616H77.654a7.039 7.039 0 0 1 0-14.078h100.692a7.039 7.039 0 0 1 0 14.078zM232.568 207.378H23.432c-5.634 0-10.202-4.567-10.202-10.202V64.553c0-5.634 4.567-10.202 10.202-10.202h209.137c5.634 0 10.202 4.567 10.202 10.202v132.623c-.001 5.634-4.568 10.202-10.203 10.202z" />
                            <path
                                d="M25.982 190.8V70.929a3.826 3.826 0 0 1 3.826-3.826h196.384a3.826 3.826 0 0 1 3.826 3.826V190.8a3.826 3.826 0 0 1-3.826 3.826H29.808a3.826 3.826 0 0 1-3.826-3.826z"
                                style="fill:#6bdddd" />
                            <path class="st5" d="M105.684 207.378h44.633v27.16h-44.633z" />
                            <path class="st4"
                                d="M178.346 250.615H77.654c-4.984 0-9.039-4.055-9.039-9.039s4.055-9.039 9.039-9.039h100.691c4.984 0 9.039 4.055 9.039 9.039s-4.054 9.039-9.038 9.039zM77.654 236.537c-2.778 0-5.039 2.261-5.039 5.039s2.261 5.039 5.039 5.039h100.691c2.778 0 5.039-2.261 5.039-5.039s-2.261-5.039-5.039-5.039H77.654zM232.568 209.378H23.432c-6.729 0-12.202-5.474-12.202-12.202V64.553c0-6.729 5.474-12.202 12.202-12.202h209.137c6.729 0 12.202 5.474 12.202 12.202v132.623c0 6.728-5.474 12.202-12.203 12.202zM23.432 56.351c-4.522 0-8.202 3.68-8.202 8.202v132.623c0 4.522 3.68 8.202 8.202 8.202h209.137c4.522 0 8.202-3.68 8.202-8.202V64.553c0-4.522-3.68-8.202-8.202-8.202H23.432z" />
                            <path class="st4"
                                d="M150.316 236.537h-44.633a2 2 0 0 1-2-2v-27.159a2 2 0 0 1 2-2h44.633a2 2 0 0 1 2 2v27.159a2 2 0 0 1-2 2zm-42.632-4h40.633v-23.159h-40.633v23.159zM226.192 196.626H29.808a5.832 5.832 0 0 1-5.825-5.826V70.929a5.831 5.831 0 0 1 5.825-5.825h196.385a5.831 5.831 0 0 1 5.825 5.825V190.8a5.833 5.833 0 0 1-5.826 5.826zM29.808 69.104a1.826 1.826 0 0 0-1.825 1.825V190.8c0 1.007.818 1.826 1.825 1.826h196.385a1.827 1.827 0 0 0 1.825-1.826V70.929a1.826 1.826 0 0 0-1.825-1.825H29.808z" />
                            <path class="st0"
                                d="M128 155.538H43.427a3.677 3.677 0 0 1-3.677-3.677V42.835a3.677 3.677 0 0 1 3.677-3.677h78.001A6.572 6.572 0 0 1 128 45.73v109.808zM128 155.538h84.573a3.677 3.677 0 0 0 3.677-3.677V42.835a3.677 3.677 0 0 0-3.677-3.677h-78.001A6.572 6.572 0 0 0 128 45.73v109.808z" />
                            <path class="st4"
                                d="M128 157.538H43.427a5.684 5.684 0 0 1-5.677-5.678V42.835a5.684 5.684 0 0 1 5.677-5.677h78.001c4.727 0 8.572 3.846 8.572 8.572v109.808a2 2 0 0 1-2 2zM43.427 41.158c-.925 0-1.677.752-1.677 1.677V151.86a1.68 1.68 0 0 0 1.677 1.678H126V45.73a4.577 4.577 0 0 0-4.572-4.572H43.427z" />
                            <path class="st4"
                                d="M212.573 157.538H128a2 2 0 0 1-2-2V45.73c0-4.727 3.846-8.572 8.572-8.572h78.001a5.684 5.684 0 0 1 5.677 5.677V151.86a5.684 5.684 0 0 1-5.677 5.678zm-82.573-4h82.573a1.68 1.68 0 0 0 1.677-1.678V42.835c0-.925-.752-1.677-1.677-1.677h-78.001A4.577 4.577 0 0 0 130 45.73v107.808z" />
                            <path class="st7"
                                d="M201.542 33.21v6.067H54.458V33.21c-5.638.613-5.963 6.067-5.963 6.067v110.312h159.01V39.277c-.001 0-.325-5.454-5.963-6.067z" />
                            <path class="st4"
                                d="M207.505 151.59H48.495a2 2 0 0 1-2-2V39.277c0-.04.001-.079.004-.119.146-2.47 1.955-7.308 7.743-7.937a1.997 1.997 0 0 1 2.216 1.988v4.067h143.084V33.21a1.997 1.997 0 0 1 2.216-1.988c5.788.629 7.597 5.467 7.743 7.937.003.04.004.079.004.119V149.59a2 2 0 0 1-2 2zm-157.01-4h155.01V39.355c-.038-.395-.304-2.295-1.963-3.398v3.32a2 2 0 0 1-2 2H54.458a2 2 0 0 1-2-2v-3.324c-1.69 1.117-1.933 3.056-1.963 3.396V147.59z" />
                            <path class="st5"
                                d="M128 149.59H54.458V33.21h67.499A6.044 6.044 0 0 1 128 39.253V149.59zM128 149.59h73.542V33.21h-67.499A6.044 6.044 0 0 0 128 39.253V149.59z" />
                            <path class="st4"
                                d="M128 151.59H54.458a2 2 0 0 1-2-2V33.21a2 2 0 0 1 2-2h67.499c4.435 0 8.043 3.608 8.043 8.043V149.59a2 2 0 0 1-2 2zm-71.542-4H126V39.253a4.047 4.047 0 0 0-4.043-4.043H56.458v112.38z" />
                            <path class="st4"
                                d="M201.542 151.59H128a2 2 0 0 1-2-2V39.253c0-4.435 3.608-8.043 8.043-8.043h67.499a2 2 0 0 1 2 2v116.38a2 2 0 0 1-2 2zm-71.542-4h69.542V35.21h-65.499A4.047 4.047 0 0 0 130 39.253V147.59z" />
                            <path class="st7"
                                d="M122.037 143.641H54.458c-5.638.601-5.963 5.948-5.963 5.948h79.504c.001.001-.324-5.347-5.962-5.948zM201.542 143.641h-67.579c-5.638.601-5.963 5.948-5.963 5.948h79.505c-.001.001-.325-5.347-5.963-5.948z" />
                            <path class="st4"
                                d="M128 151.59H48.495a2 2 0 0 1-1.996-2.121c.147-2.434 1.957-7.199 7.747-7.815.07-.008.142-.012.212-.012h67.579c.07 0 .142.004.212.012 5.791.616 7.6 5.382 7.747 7.815A2.002 2.002 0 0 1 128 151.59zm-76.771-4h74.051c-.567-.879-1.572-1.731-3.356-1.948H54.571c-1.769.215-2.773 1.074-3.342 1.948z" />
                            <path class="st4"
                                d="M207.505 151.59H128a2 2 0 0 1-1.996-2.121c.147-2.434 1.956-7.199 7.747-7.815.07-.008.142-.012.212-.012h67.579c.07 0 .142.004.212.012 5.79.616 7.6 5.382 7.747 7.815a2 2 0 0 1-1.996 2.121zm-76.783-4h74.063c-.566-.879-1.572-1.731-3.355-1.948h-67.353c-1.783.216-2.789 1.068-3.355 1.948z" />
                            <path class="st7"
                                d="M191.859 54.801h-52.215a2.573 2.573 0 1 1 0-5.148h52.215a2.574 2.574 0 0 1 0 5.148zM191.859 69.509h-52.215a2.573 2.573 0 1 1 0-5.148h52.215a2.574 2.574 0 0 1 0 5.148zM191.859 113.634h-52.215a2.573 2.573 0 1 1 0-5.148h52.215c3.423 0 3.429 5.148 0 5.148zM191.859 128.343h-52.215a2.573 2.573 0 1 1 0-5.148h52.215a2.575 2.575 0 0 1 0 5.148zM117.336 54.801H92.884a2.573 2.573 0 1 1 0-5.148h24.453a2.575 2.575 0 0 1-.001 5.148zM117.336 69.509H92.884a2.573 2.573 0 1 1 0-5.148h24.453a2.575 2.575 0 0 1-.001 5.148zM117.336 84.218H65.122a2.573 2.573 0 1 1 0-5.148h52.215a2.573 2.573 0 0 1 2.574 2.574 2.576 2.576 0 0 1-2.575 2.574zM117.336 98.926H65.122a2.573 2.573 0 1 1 0-5.148h52.215a2.575 2.575 0 0 1-.001 5.148zM118.44 128.343H64.019a1.472 1.472 0 0 1-1.471-1.471v-16.915c0-.812.659-1.471 1.471-1.471h54.421c.812 0 1.471.659 1.471 1.471v16.915a1.472 1.472 0 0 1-1.471 1.471zM85.346 69.509H64.019a1.472 1.472 0 0 1-1.471-1.471V51.124c0-.812.659-1.471 1.471-1.471h21.327c.812 0 1.471.659 1.471 1.471v16.915a1.47 1.47 0 0 1-1.471 1.47zM192.962 98.926h-54.421a1.472 1.472 0 0 1-1.471-1.471V80.541c0-.812.659-1.471 1.471-1.471h54.421c.812 0 1.471.659 1.471 1.471v16.915c0 .811-.659 1.47-1.471 1.47z" />
                            <path
                                d="M167.17 40.809h-7.933a32.628 32.628 0 0 0-2.26-5.44c5.896-5.896 6.787-6.302 6.787-8.446 0-1.07-.417-2.075-1.173-2.831l-8.124-8.124a4.002 4.002 0 0 0-5.663 0l-5.614 5.615a32.668 32.668 0 0 0-5.44-2.261v-7.933a4.008 4.008 0 0 0-4.004-4.004h-11.49a4.008 4.008 0 0 0-4.004 4.004v7.933a32.618 32.618 0 0 0-5.44 2.261c-5.892-5.892-6.3-6.787-8.445-6.787-1.07 0-2.075.417-2.832 1.173-12.092 12.092-12.07 9.841-2.51 19.402a32.628 32.628 0 0 0-2.26 5.44H88.83a4.008 4.008 0 0 0-4.004 4.004v11.49a4.008 4.008 0 0 0 4.004 4.004h7.933a32.628 32.628 0 0 0 2.26 5.44c-5.892 5.892-6.787 6.3-6.787 8.446 0 2.169.563 2.221 9.297 10.956a3.98 3.98 0 0 0 2.832 1.173 3.979 3.979 0 0 0 2.831-1.173l5.614-5.615a32.668 32.668 0 0 0 5.44 2.261v7.933a4.008 4.008 0 0 0 4.004 4.004h11.49a4.008 4.008 0 0 0 4.004-4.004v-7.933a32.618 32.618 0 0 0 5.44-2.261c5.892 5.892 6.3 6.787 8.445 6.787 1.07 0 2.075-.417 2.832-1.173l8.124-8.124a4.001 4.001 0 0 0 0-5.663l-5.614-5.615a32.628 32.628 0 0 0 2.26-5.44h7.933a4.008 4.008 0 0 0 4.004-4.004v-11.49a4.006 4.006 0 0 0-4.002-4.005zm-19.944 9.749c0 10.602-8.625 19.226-19.226 19.226s-19.226-8.625-19.226-19.226c0-10.601 8.625-19.226 19.226-19.226s19.226 8.624 19.226 19.226z"
                                style="fill:#ffea94" />
                            <path class="st3"
                                d="M128 27.833c-12.53 0-22.724 10.194-22.724 22.724 0 12.531 10.194 22.725 22.724 22.725 12.531 0 22.725-10.194 22.725-22.725 0-12.529-10.194-22.724-22.725-22.724zm0 34.638c-6.569 0-11.914-5.345-11.914-11.914S121.43 38.644 128 38.644c6.569 0 11.914 5.343 11.914 11.913S134.569 62.471 128 62.471z" />
                            <path class="st4"
                                d="M133.745 95.731h-11.49a6.01 6.01 0 0 1-6.004-6.004V83.23a34.313 34.313 0 0 1-3.044-1.265l-4.597 4.597c-1.134 1.134-2.642 1.759-4.245 1.759s-3.111-.625-4.245-1.759c-1.646-1.646-3.001-2.982-4.116-4.083-4.999-4.933-5.768-5.69-5.768-8.287 0-2.598.988-3.568 4.665-7.18.5-.492 1.062-1.043 1.689-1.665a34.526 34.526 0 0 1-1.264-3.041H88.83a6.01 6.01 0 0 1-6.004-6.004V44.813a6.01 6.01 0 0 1 6.004-6.005h6.497a34.159 34.159 0 0 1 1.263-3.038c-.436-.429-.847-.831-1.234-1.209-3.367-3.292-5.222-5.104-5.223-7.575-.001-2.636 2.062-4.652 6.579-9.072a433.434 433.434 0 0 0 3.408-3.361 5.96 5.96 0 0 1 4.245-1.758c2.599 0 3.569.988 7.181 4.664.491.501 1.042 1.062 1.664 1.689a34.653 34.653 0 0 1 3.041-1.264v-6.496a6.01 6.01 0 0 1 6.004-6.004h11.49a6.01 6.01 0 0 1 6.004 6.004v6.496c1.032.373 2.05.795 3.044 1.265l4.597-4.597a6.008 6.008 0 0 1 8.49 0l8.124 8.125a5.959 5.959 0 0 1 1.76 4.245c0 2.598-.988 3.568-4.665 7.181-.501.492-1.062 1.043-1.689 1.665a34.33 34.33 0 0 1 1.264 3.04h6.497a6.01 6.01 0 0 1 6.004 6.005v11.489a6.01 6.01 0 0 1-6.004 6.004h-6.497a34.738 34.738 0 0 1-1.265 3.045l4.596 4.596a5.967 5.967 0 0 1 1.761 4.245 5.964 5.964 0 0 1-1.761 4.247l-8.124 8.123a5.965 5.965 0 0 1-4.245 1.759c-2.598 0-3.568-.987-7.177-4.661a546.866 546.866 0 0 0-1.668-1.692c-.993.469-2.01.892-3.041 1.263v6.497a6.012 6.012 0 0 1-6.005 6.003zm-20.933-18.197c.316 0 .636.075.93.229a30.612 30.612 0 0 0 5.106 2.121 2 2 0 0 1 1.403 1.909v7.934c0 1.104.899 2.004 2.004 2.004h11.49a2.007 2.007 0 0 0 2.004-2.004v-7.934a2 2 0 0 1 1.403-1.909 30.64 30.64 0 0 0 5.106-2.121 2.001 2.001 0 0 1 2.345.356c1.068 1.067 1.956 1.972 2.708 2.737 3.403 3.464 3.508 3.464 4.323 3.464a1.99 1.99 0 0 0 1.417-.587l8.124-8.124c.38-.38.589-.883.589-1.418 0-.534-.209-1.037-.589-1.416l-5.614-5.615a1.998 1.998 0 0 1-.355-2.346 30.752 30.752 0 0 0 2.121-5.105 2 2 0 0 1 1.909-1.403h7.934a2.007 2.007 0 0 0 2.004-2.004V44.813a2.007 2.007 0 0 0-2.004-2.005h-7.934a2 2 0 0 1-1.909-1.403 30.572 30.572 0 0 0-2.121-5.104 2 2 0 0 1 .355-2.346c1.066-1.066 1.97-1.954 2.733-2.705 3.469-3.407 3.469-3.512 3.469-4.327a1.99 1.99 0 0 0-.587-1.416l-8.125-8.126c-.758-.758-2.076-.758-2.834 0l-5.614 5.615a2 2 0 0 1-2.345.356 30.8 30.8 0 0 0-5.106-2.122 2 2 0 0 1-1.403-1.909v-7.933a2.007 2.007 0 0 0-2.004-2.004h-11.49a2.007 2.007 0 0 0-2.004 2.004v7.933a2 2 0 0 1-1.402 1.908 30.781 30.781 0 0 0-5.106 2.122 1.998 1.998 0 0 1-2.346-.355c-1.066-1.066-1.953-1.97-2.704-2.733-3.406-3.468-3.511-3.468-4.327-3.468a1.99 1.99 0 0 0-1.417.586c-1.28 1.281-2.426 2.401-3.439 3.393-3.004 2.938-5.376 5.26-5.376 6.212 0 .787 1.862 2.607 4.019 4.715.689.674 1.452 1.42 2.287 2.255.62.619.764 1.57.355 2.346a30.681 30.681 0 0 0-2.121 5.105 2.002 2.002 0 0 1-1.909 1.402H88.83a2.007 2.007 0 0 0-2.004 2.005v11.489c0 1.104.899 2.004 2.004 2.004h7.934a2 2 0 0 1 1.909 1.403 30.681 30.681 0 0 0 2.121 5.105 2 2 0 0 1-.355 2.346c-1.066 1.066-1.97 1.954-2.734 2.705-3.468 3.406-3.468 3.511-3.468 4.326 0 .854 0 .924 4.577 5.439 1.12 1.106 2.481 2.449 4.135 4.103.758.758 2.076.758 2.834 0l5.614-5.614a1.994 1.994 0 0 1 1.415-.586z" />
                            <circle class="st5" cx="128" cy="50.472" r="15.802" />
                            <path
                                d="M121.229 42.231v15.442a1.49 1.49 0 0 0 2.207 1.305l14.038-7.721a1.49 1.49 0 0 0 0-2.61l-14.038-7.721a1.49 1.49 0 0 0-2.207 1.305z"
                                style="fill:#f9a7a7" />
                        </svg>
                        <div class="for-border ml-4">
                            <h5 class="for-label1 font-weight-bold">Prior Learning Recognition</h5>
                            <p class="for-para custom_paragraph pr-2">Awarding credit for relevant certifications or
                                past
                                coursework, potentially reducing your overall program time.</p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
    <!-- section2 end -->


    @if (!empty($blocks))
        @foreach ($blocks as $block)
            @if ($block->id == 1)
                {{--
    <x-home-page-banner :homeContent="$homeContent" /> --}}
                {{-- Courses --}}
            @elseif($block->id == 3)
                @if ($homeContent->show_category_section == 1)
                    <div class="custom_section_backround_color section-padding-y d-none">
                        <div class="container g-0">
                            <div class="row g-0 justify-content-center mx-md-4 py-5">
                                <div class="col-12">
                                    <x-home-page-category-section :homeContent="$homeContent" :categories="$categories" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- new_section_add -->
                    {{-- <section class="bg-light card-paddingx d-none">
                            @if (isset($latest_courses))
                                <div class="container">
                                    <div class="row text-center mb-4 main_row">
                                        <h2 class="font-weight-bold">Gain the Edge in Nursing School & Beyond</h2>
                                        <p class="custom_paragraph">Our comprehensive Prep Courses equip Adult-Learners to
                                            gain knowledge, sharpen skills, learn effective strategies and ace the NCLEX®
                                            you need to thrive.</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 card_height left-s-h-cls image_card p-2">
                                            <div class="prep_card left-card h-100 w-100" id="left-card">
                                                <div class="overlay h-100"></div>
                                                <div class="left-top-content">
                                                    <div class="widget-49-meeting-info" id="left-title-info"></div>
                                                    <div id="left-pro-title"></div>
                                                </div>
                                                <!-- left image start  -->
                                                <div class="left-content">
                                                    <p class="left-card-text font-weight-bolder mb-4 custom_paragraph"></p>

                                                    <div class="for-left"></div>
                                                </div>
                                                <!-- left image end  -->
                                            </div>
                                        </div>
                                        <!-- 1 -->

                                        @php
                                            $counter = 1;
                                        @endphp


                                        <div class="col-md-5 pr-md-0" id="right-cards">
                                            <div class="row">
                                                <div class="col-md-6 col-6 h-auto mb-2 mt-md-0 mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[0]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0111</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[0]->parent_id) ? $latest_courses[0]->parent->title : $latest_courses[0]->title }}
                                                            </p>
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[0]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[0]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[0]
                                                                                            ->requirements,
                                                                                ),
                                                                            ),
                                                                        );
                                                                    @endphp
                                                                    @if (Str::length($requirements) > 120)
                                                                        {{ Str::limit($requirements, 120, '...') }}
                                                                    @else
                                                                        {{ $requirements }}
                                                                    @endif
                                                                </p>
                                                                <a href="{{ !empty($latest_courses[0]->parent_id) ? courseDetailsUrl(@$latest_courses[0]->parent->id, @$latest_courses[0]->type, @$latest_courses[0]->parent->slug) . '?courseType=' . $latest_courses[0]->type : courseDetailsUrl(@$latest_courses[0]->id, @$latest_courses[0]->type, @$latest_courses[0]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[0]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[0]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[0]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[0]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[0]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[0]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    <!-- <small>
                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-clock"></i>

                                                                                                                                                                                                                                                                                                                                                                                    </small> -->

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[0]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- 2 -->
                                                <div
                                                    class="col-md-6 col-6 h-auto  mb-2 mt-md-0 mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[1]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0222</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[1]->parent_id) ? $latest_courses[1]->parent->title : $latest_courses[1]->title }}
                                                            </p>
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[1]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[1]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[1]
                                                                                            ->requirements,
                                                                                ),
                                                                            ),
                                                                        );
                                                                    @endphp
                                                                    @if (Str::length($requirements) > 120)
                                                                        {{ Str::limit($requirements, 120, '...') }}
                                                                    @else
                                                                        {{ $requirements }}
                                                                    @endif
                                                                </p>
                                                                <a href="{{ !empty($latest_courses[1]->parent_id) ? courseDetailsUrl(@$latest_courses[1]->parent->id, @$latest_courses[1]->type, @$latest_courses[1]->parent->slug) . '?courseType=' . $latest_courses[1]->type : courseDetailsUrl(@$latest_courses[1]->id, @$latest_courses[1]->type, @$latest_courses[1]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[1]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[1]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[1]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[1]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[1]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[1]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[1]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 3 -->
                                                <div class="col-md-6 col-6 h-auto  mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[2]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0333</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[2]->parent_id) ? $latest_courses[2]->parent->title : $latest_courses[2]->title }}
                                                            </p>
                                                            <!-- Container for .for-left content -->
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[2]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[2]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[2]
                                                                                            ->requirements,
                                                                                ),
                                                                            ),
                                                                        );
                                                                    @endphp
                                                                    @if (Str::length($requirements) > 120)
                                                                        {{ Str::limit($requirements, 120, '...') }}
                                                                    @else
                                                                        {{ $requirements }}
                                                                    @endif
                                                                </p>
                                                                <a href="{{ !empty($latest_courses[2]->parent_id) ? courseDetailsUrl(@$latest_courses[2]->parent->id, @$latest_courses[2]->type, @$latest_courses[2]->parent->slug) . '?courseType=' . $latest_courses[2]->type : courseDetailsUrl(@$latest_courses[2]->id, @$latest_courses[2]->type, @$latest_courses[2]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[2]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[2]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[2]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[2]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[2]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[2]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[2]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 4 -->
                                                <div class="col-md-6 col-6 h-auto mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[3]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0444</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[3]->parent_id) ? $latest_courses[3]->parent->title : $latest_courses[3]->title }}
                                                            </p>
                                                            <!-- Container for .for-left content -->
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph"
                                                                    style="display: block;">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[3]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[3]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[3]
                                                                                            ->requirements,
                                                                                ),
                                                                            ),
                                                                        );
                                                                    @endphp
                                                                    @if (Str::length($requirements) > 120)
                                                                        {{ Str::limit($requirements, 120, '...') }}
                                                                    @else
                                                                        {{ $requirements }}
                                                                    @endif
                                                                </p>
                                                                <a href="{{ !empty($latest_courses[3]->parent_id) ? courseDetailsUrl(@$latest_courses[3]->parent->id, @$latest_courses[3]->type, @$latest_courses[3]->parent->slug) . '?courseType=' . $latest_courses[3]->type : courseDetailsUrl(@$latest_courses[3]->id, @$latest_courses[3]->type, @$latest_courses[3]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[3]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[3]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[3]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[3]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[3]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[3]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[3]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end4 -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 50px"
                                                src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                alt="">
                                        </div>
                                        <h1>
                                            {{ __('No Course Found') }}
                                        </h1>
                                    </div>
                                </div>
                            @endif
                        </section> --}}
                    <!-- new_section_hover_end -->

                    {{-- <div class="section-margin-y container g-0">
                            <div class="row g-0 mx-md-4 px-1">
                                <div class="col-md-12 text-center">
                                    <h2 class="font-weight-bold custom_heading_1">Healthcare Programs Options</h2>
                                    <p class="pb-3 custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem exerc
                                        <br>
                                        voluptatibus neque et obcaecati asperiores! Praesentium magnam error veritatis
                                        adipisicing elit. Dolorem exerc
                                    </p>
                                </div>

                                @if (isset($latest_programs))
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($latest_programs as $latest_program)
                                 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex my-2 px-2"
                                    data-aos-delay="{{ $counter * 500 }}" data-aos="fade-down">
                                    <div class="card rounded-card shadow">
                                        <div class="card-header rounded-card-header p-0 mw h-auto">
                                            <a href="{{ route('programs.detail', [$latest_program->id]) }}">
                                                <img src="{{ getCourseImage($latest_program->icon) }}"
                                                    class="img-fluid img-cover w-100 h-auto rounded-card-img"></a>
                                        </div>
                                        <div class="card-body d-flex flex-column p-3">
                                            <h5 class="font-weight-bold">
                                                <a {{ route('programs.detail', [$latest_program->id]) }}>
                                                    {{ $latest_program->programtitle }}</a>
                                            </h5>
                                            <div class="paragraph_custom_height mt-auto pb-2">
                                                <p>
                                                    @php
                                                        $description = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(
                                                                strip_tags(
                                                                    $latest_program->discription,
                                                                ),
                                                            ),
                                                        );
                                                    @endphp
                                                    @if (Str::length($description) > 120)
                                                        {{ Str::limit($description, 120, '...') }}
                                                    @else
                                                        {{ $description }}
                                                        @endif
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <small>
                                                    <i class="fa fa-book-open"></i>
                                                    {{ count(json_decode($latest_program->allcourses)) }}
                                                    Courses
                                                </small>

                                                <small>
                                                    <i class="fas fa-clock"></i>
                                                    {{ $latest_program->duration }} weeks
                                                </small>

                                                <small class="">
                                                    <i class="fa fa-dollar"></i>
                                                    {{ $latest_program->currentProgramPlan[0]->amount }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $counter++;
                                @endphp
    @endforeach
    @endif
                                                                                                                                                                                                                                                                                                                                                        @if (count($latest_programs) == 0)
    <div class="col-lg-12">
            <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
            <div class="thumb">
            <img style="width: 50px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
            alt="">
            </div>
            <h1>
            {{ __('No Program Found') }}
            </h1>
            </div>
            </div>
            @endif
            </div>
            </div> --}}
                    <!-- <section>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="col-md-12">
                                                                                                                                                                                                                                                                                                                                                                                                    <img src="{{ asset('public/frontend/infixlmstheme/img/images/WE_ARE_HERE_TO_LISTEN.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                        alt="" class="img-fluid w-100">
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
                    {{-- How to Buy --}}
                    {{-- hide from all screen --}}
                    <div class="section-margin-y container d-none">
                        <div class="row mx-md-4">
                            <div class="col-md-12 mb-4">
                                <h2 class="font-weight-bold text-center">How To Apply</h2>
                                <p class="text-center custom_paragraph custom_paragraph">"Pick a Program | Course to
                                    develop your skills
                                    & Get Started"
                                </p>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="300">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-solid fa-bars fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 1</h5>
                                    <p class="mt-auto text-center custom_paragraph">Trusted by companies of all sizes
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="600">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-regular fa-address-card fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 2</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="900">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-solid fa-book-open-reader fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 3</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="1200">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-regular fa-image fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 4</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-margin-y container d-none">
                        <div class="row mx-md-4 px-1">
                            <div class="col-md-12 text-center">
                                <h2 class="font-weight-bold">Our Popular Prep-Courses</h2>
                                <p class="pb-3 custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Dolorem
                                    exerc
                                    <br>
                                    voluptatibus neque et obcaecati asperiores! Praesentium magnam error veritatis
                                    adipisicing elit. Dolorem exerc
                                </p>
                            </div>

                            @if (isset($latest_courses))
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($latest_courses as $latest_course)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex my-2 px-2"
                                        data-aos-delay="{{ $counter * 500 }}" data-aos="fade-down">
                                        <div class="card rounded-card shadow">
                                            <div class="card-header rounded-card-header p-0">
                                                <a
                                                    href="{{ !empty($latest_course->parent_id) ? courseDetailsUrl(@$latest_course->parent->id, @$latest_course->type, @$latest_course->parent->slug) . '?courseType=' . $latest_course->type : courseDetailsUrl(@$latest_course->id, @$latest_course->type, @$latest_course->slug) }}">
                                                    <img src="{{ getCourseImage($latest_course->thumbnail) }}"
                                                        class="img-fluid rounded-card-img custom_img_height w-100"
                                                        style="object-fit: none;"></a>
                                            </div>
                                            <div class="card-body d-flex flex-column p-3">
                                                <h5 class="font-weight-bold custom-h">
                                                    <a
                                                        href="{{ !empty($latest_course->parent_id) ? courseDetailsUrl(@$latest_course->parent->id, @$latest_course->type, @$latest_course->parent->slug) . '?courseType=' . $latest_course->type : courseDetailsUrl(@$latest_course->id, @$latest_course->type, @$latest_course->slug) }}">
                                                        {{ !empty($latest_course->parent_id) ? $latest_course->parent->title : $latest_course->title }}</a>
                                                </h5>

                                                <div class="paragraph_custom_height mt-auto pb-2">
                                                    <p>@php
                                                        $requirements = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(
                                                                strip_tags(
                                                                    !empty($latest_course->parent_id)
                                                                        ? $latest_course->parent->requirements
                                                                        : $latest_course->requirements,
                                                                ),
                                                            ),
                                                        );
                                                    @endphp
                                                        @if (Str::length($requirements) > 120)
                                                            {{ Str::limit($requirements, 120, '...') }}
                                                        @else
                                                            {{ $requirements }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <small>
                                                        <i class="fa fa-book-open"></i>
                                                        @if ($latest_course->type == 1)
                                                            {{ __('Course') }}
                                                        @elseif($latest_course->type == 2)
                                                            {{ __('Big Quiz') }}
                                                        @elseif($latest_course->type == 4)
                                                            {{ __('Full Course') }}
                                                        @elseif($latest_course->type == 5)
                                                            {{ __('Prep-Course (On-Demand)') }}
                                                        @elseif($latest_course->type == 6)
                                                            {{ __('Prep-Course (Live)') }}
                                                        @elseif($latest_course->type == 8)
                                                            {{ __('Repeat Course') }}
                                                        @endif
                                                    </small>

                                                    <small>
                                                        ${{ number_format($latest_course->price, 0) }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            @endif
                            @if (count($latest_courses) == 0)
                                <div class="col-lg-12">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 50px"
                                                src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                alt="">
                                        </div>
                                        <h1>
                                            {{ __('No Course Found') }}
                                        </h1>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- new slider -->

                {{-- @include(theme('pages.reviews')) --}}


                {{-- Learning More --}}
                {{-- @elseif($block->id == 4)
                    @if ($homeContent->show_instructor_section == 1)
                        <x-home-page-instructor-section :homeContent="$homeContent" />
                    @endif --}}




                {{-- <section class="custom_section_color py-5">
        <div class="container" style="padding-top: 60px;">
            <div class="row mx-md-4">
                <div class="col-md-12">
                    <div class="mt-4 pb-2 text-center">
                        <h2 class="custom_heading_1 font-weight-bold">
                            What Our happy Students Say
                        </h2>
                        <p class="custom_paragraph">
                            The world’s largest selection of courses choose from 130,000 online video
                            courses
                            <br>with
                            new additions published every month
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($latest_course_reveiws as $course_reveiw)
                <!-- 1 -->
                <div class="swiper-slide" style="">
                    <div class="card card-review p-3">
                        <div class="row content d-flex justify-content-between">

                            <div class="col-md-4 image">
                                <img src="{{ asset($course_reveiw->user->image) }}"
                                    alt="{{ $course_reveiw->user->name }}" class="rounded-circle img-fluid">
                            </div>
                            <div class="col-md-8 heading d-flex flex-column justify-content-center">{{
                                $course_reveiw->user->name }}
                                <div class="text-warning">
                                    @php
                                    $main_stars = $course_reveiw->star;
                                    $stars = intval($course_reveiw->star);
                                    @endphp
                                    @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($main_stars > $stars)
                                        <i class="fas fa-star-half"></i>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="paragraph font-italic">
                            {{ $course_reveiw->comment }}
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}


                {{-- <section class="custom_section_color">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
            <div class="row mx-md-4">
                <div class="col-md-12">
                    <div class="mt-4 pb-2 text-center">
                        <h2 class="custom_heading_1 font-weight-bold">
                            What Our happy Students Say
                        </h2>
                        <p>
                            The world’s largest selection of courses choose from 130,000 online video
                            courses
                            <br>with
                            new additions published every month
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mx-md-4 justify-content-center pb-5 pt-2">

                @foreach ($latest_course_reveiws as $course_reveiw)
                <div class="col-md-4">
                    <div class="zakana" style="">
                        <div class="p-3">
                            <div class="card rounded-card p-3 shadow">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset($course_reveiw->user->image) }}"
                                            class="rounded-circle img-fluid mx-auto"
                                            style="width: 77px; height: 77px;" />
                                    </div>
                                    <div class="reviews col-md-8 d-flex flex-column justify-content-center">
                                        <p class="font-weight-bold">{{ $course_reveiw->user->name }}</p>
                                        <div class="text-warning">
                                            @php
                                            $main_stars = $course_reveiw->star;
                                            $stars = intval($course_reveiw->star);
                                            @endphp
                                            @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if ($main_stars > $stars)
                                                <i class="fas fa-star-half"></i>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 font-italic mt-3">
                                        <p>"{!! $course_reveiw->comment !!}"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
            @elseif($block->id == 8)
                @if ($homeContent->show_testimonial_section == 1)
                    {{--
    <x-home-page-testimonial-section :homeContent="$homeContent" /> --}}
                @endif
                {{-- <div class="row p-2" style="background: rgb(240 246 251);">
        <div class="col-md-12">
            <div class="ourprogram mt-4 pb-2 text-center">
                <h1 class="custom_heading_1 font-weight-bold">
                    What Our Student Have To <br> Say</h1>
                <p style="font-size:19px;">
                    The world’s largest selection of courses choose from 130,000 online video courses
                    <br>with
                    new additions published every month
                </p>
            </div>
        </div>
    </div> --}}
                {{-- <div class="row zakana m-0 py-4" style="background: rgb(240 246 251); justify-content: space-around; ">
        @foreach ($latest_course_reveiws as $course_reveiw)
        <div class="col-md-12">
            <div class="row m-0 p-4">
                <div class="col-md-12 col-sm-6 bg-white" style="border-radius: 7px;">
                    <div class="row p-5">
                        <div class="col-md-2">
                            <div class="image mt-2">
                                <img src="{{ asset($course_reveiw->user->image) }}"
                                    style="width: 77px; height: 77px; border-radius: 50%;" />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="para m-3 mt-3 px-3">
                                <p style="font-weight: bold;">{{ $course_reveiw->user->name }}</p>
                                @php
                                $main_stars = $course_reveiw->star;
                                $stars = intval($course_reveiw->star);
                                @endphp
                                @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                    @endfor
                                    @if ($main_stars > $stars)
                                    <i class="fas fa-star-half"></i>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p>
                                {!! $course_reveiw->comment !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}
                {{-- <div class="col-md-12"> --}}
                {{-- <div class="row m-0 p-4"> --}}
                {{-- <div class="col-md-12 bg-white" style="border-radius: 7px;"> --}}
                {{-- <div class="row p-5"> --}}
                {{-- <div class="col-md-2"> --}}
                {{-- <div class="image mt-2"> --}}
                {{-- <img src="{{ asset('public/assets/c2.jpg') }}" --}} {{--
                                    style="width: 77px; height: 77px; border-radius: 50%;" /> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-md-10"> --}}
                {{-- <div class="para m-3 mt-3 px-3"> --}}
                {{-- <p style="font-weight: bold;">Lorem Ipsum</p> --}}
                {{-- <p style="color: #373737;">Writer</p> --}}
                {{-- <i class="fa-sharp fa-solid fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}}
                {{--
                                    class="fa-sharp fa-solid d fa-star"></i> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-md-12 mt-3"> --}}
                {{-- <p> --}}
                {{-- “Lorem Ipsum is simply dummy text of the printing and --}}
                {{-- typesetting industry. Lorem Ipsum has been the industry's --}}
                {{-- standard dummy text ever since the 1500s, when an unknown --}}
                {{-- printer took a galley of type and scrambled it to make a type --}}
                {{-- specimen book” --}}
                {{-- </p> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}


                {{--
    </div> --}}


                {{-- FAQS section --}}
                <section class="sec-10">
                    <div class="container px-lg-5">
                    <div class="row faqs-row justify-content-between mt-lg-3 mb-lg-2 px-xl-5">
                        {{-- <div class="col-sm-7 shadow_row video-h-cls p-0">
                            <div class="video-container">
                                <video id="myVideo" class="h-100 w-100" style="object-fit: cover">
                                    <source src="{{ asset('/public/uploads/images/footerimg/ezgif-2-78802b2d5b.mp4') }}">
                                </video>
                                <div class="overlay-video"></div>
                                <div class="text-video-overlay" style="top: 0">

                                    <div class="d-flex text-center overlay-heading">
                                      <h2 class="font-weight-bold text-white">The Greatest Minds don't <br>Crumble Under Pressure<br> They Use it to Rise Higher</h2>
                                    </div>
                                  </div>
                                <div class="text-video-overlay" >

                                  <div class="d-flex text-center overlay-heading1">
                                    <h2 class="font-weight-bold text-white">Take a Tour of Merakii</h2>
                                  </div>
                                </div>
                                <div class="video-controls">
                                    <button onclick="togglePlayPause()" style="border: none">
                                        <i id="playPauseBtn" class="fa fa-play"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-7 shadow_row video-h-cls p-0">
                            <div class="video-container">
                                <video id="myVideo" class="h-100 w-100" style="object-fit: cover">
                                    <source src="{{ asset('/public/uploads/images/footerimg/ezgif-2-78802b2d5b.mp4') }}">
                                </video>
                                <div class="overlay-video"></div>
                                <div class="text-video-overlay top-center">
                                    <div class="d-flex text-center overlay-heading">
                                        <h2 class="font-weight-bold text-white">The Greatest Minds don't Crumble Under
                                            Pressure<br> They Use it to Rise Higher</h2>
                                    </div>
                                </div>
                                <div class="text-video-overlay bottom-center">
                                    <div class="d-flex text-center overlay-heading1">
                                        <h2 class="font-weight-bold text-white">Take a Tour of Merakii</h2>
                                    </div>
                                </div>
                                <div class="video-controls">
                                    <button onclick="togglePlayPause()" style="border: none">
                                        <i id="playPauseBtn" class="fa fa-play"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 bg-dark shadow_ist d-flex flex-column align-items-center">
                            <div class="accordion">
                                <h2 class="section-header font-weight-bold my-2">ASK US ANYTHING: FAQs</h2>
                                <!-- tab-about1 -->
                                @foreach ($faqs as $faq)
                                    <div class="tab-about">
                                        <div class="tab-about-wrapper">
                                            <input type="checkbox" name="checkbox-1" id="cb{{ $loop->iteration }}" />
                                            <label for="cb{{ $loop->iteration }}" class="tab-about_label"
                                                onclick="toggleAccordion('{{ $loop->iteration }}')">{{ $faq->question }}</label>
                                            <div id="collapse_{{ $loop->iteration }}"
                                                class="tab-about-content accordion-body">
                                                {{-- <p class="text-white">{{ strip_tags($faq->answer) }}</p> --}}
                                                <p class="text-white">
                                                    @php
                                                        $answer = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(strip_tags($faq->answer)),
                                                        );
                                                    @endphp
                                                    {{ $answer }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('customer-help') }}#faq" onclick="informationflag('faq')"
                                class="text-white m-md-3"> <button class="Faq-btn py-2 px-4 ">More FAQS</button></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 custom_section_color shadow_row custom_paragraph d-none"
                            style="padding: 1rem">
                            {{-- <form method="POST" action="{{ route('contactMsgSubmit') }}" class="fe mx-4 mt-1">
                                <h2 class="custom_heading_1 font-weight-bold my-2 form_h1">Stay in Touch!</h2>
                                @csrf
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Phone #</label>
                                <input type="text" name="phone" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Zip Code</label>
                                <input type="text" name="zip" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Select Program</label>
                                <select id="program" name="program" class="form-control form_sm mb-2"
                                    style="width: 100%" required>
                                    <option value="" selected>Select Program</option>
                                    <option value="REMEDIAL-RN(176 Hours)">REMEDIAL-RN(176 Hours)</option>
                                    <option value="Refresher-RM(Endorsement & inactive License)">
                                        Refresher-RM(Endorsement & inactive License)
                                    </option>
                                    <option value="NCLEX Refresher(Prep)">NCLEX Refresher(Prep)</option>
                                    <option value="CNA Exam Prep(Skills Testing)">CNA Exam Prep(Skills
                                        Testing)
                                    </option>
                                    <option value="Clinical-Proctor">Clinical-Proctor</option>
                                </select>
                                <label for="year" class="form-label mt-2">High School Grade Year</label>
                                <select id="years" name="year"
                                    class="form-control form_sm w-100 mb-2"style="width: 100%" required>
                                    <option value="" selected>Select Year</option>
                                    @php
                                        $years = range(date('Y'), 1950);
                                    @endphp
                                    @forelse ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @empty
                                        <option value="">No Year Found</option>
                                    @endforelse
                                </select>
                                <label for="message" class="form-label mt-2">Message</label>
                                <textarea name="message" class="form-control form_sm shadow_msg" rows="4" aria-required="true"
                                    aria-invalid="false" placeholder="" required style="resize: none"></textarea>
                                <div class="col-md-12 my-2 text-center">
                                    <button type="submit" class="theme_btn small_btn4">Submit</button>
                                </div>
                            </form> --}}
                            {{-- new form --}}
                            <form>
                                <h2 class="custom_heading_1 font-weight-bold my-2 form_h1">Stay in Touch!</h2>
                                <div class="form-row mt-3">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <input type="text" class="outside form-control" required />
                                            <span class="floating-label-outside">Your name</span>
                                            <i class="fa fa-user-o input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <input type="text" id="dateInput" class="outside" required />
                                            <span class="floating-label-outside">Email Address</span>
                                            <i class="fa fa-envelope-o input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <input type="text" class="outside" required />
                                            <span class="floating-label-outside">Phone #</span>
                                            <i class="fa fa-mobile input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <input type="text" class="outside" required />
                                            <span class="floating-label-outside">Zip Code</span>
                                            <i class="fa fa-map-marker input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <select class="outside" required>
                                                <option value="" disabled selected></option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </select>
                                            <span class="floating-label-outside">Select Program</span>
                                            <i class="fa fa-chalkboard-user input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-12 ">
                                        <div class="position-relative mb-2">
                                            <select class="outside" required>
                                                <option value="" disabled selected></option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </select>
                                            <span class="floating-label-outside">High School Grade Year</span>
                                            <i class="fa fa-graduation-cap input-icon-outside"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="position-relative mb-2">
                                            <input type="text" class="shadow_msg" required />
                                            <span class="floating-label-msg">Message</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="theme_btn small_btn4 py-2 px-4">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    </div>
                </section>

                {{-- stayin touchend --}}
                <section class="sec-11">
                    <div class="container p-lg-5">
                        <div class="row px-xl-5">
                            <div class="col-md-12">
                                <div class="pb-5 text-center ">
                                    <h2 class="custom_heading_1 font-weight-bold">
                                        Popular Events and News</h2>
                                    <p class="custom_paragraph font-weight-bold">
                                        Be in the Know: What’s happening at Merakii?
                                    </p>
                                    <p>Connect and Engage for all news and events from the desk of ThaRakii </p>
                                </div>
                            </div>
                            {{-- new section --}}
                            @if(count($featured_blogs) > 0)
                            <div class="col-md-11 col-lg-7 px-lg-0">
                                <div class="rts-event-section">
                                    <h4 class="rts-section-title mb--25">Blogs and News</h4>
                                    <div class="events-content">
                                        <ul class="list-unstyled rts-counter">
                                            @foreach($featured_blogs as $thisblog)
                                            <li class="single-event">
                                                <div class="single-event-counter">
                                                    <div class="count-number rt-clip-text"></div>
                                                </div>
                                                <div class="single-event-content">
                                                    <h5 class="event-title">{{ $thisblog->title }}</h5>
                                                    <div class="single-event-content-meta">
                                                        <div class="event-date">
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            <span>{{ Carbon\Carbon::parse($thisblog->authored_date)->format('d M, y') }}</span>
                                                        </div>
                                                        <div class="event-time">
                                                            <span><i class="fa fa-clock"></i></span>
                                                            <span>{{ Carbon\Carbon::parse($thisblog->created_at)->format('h:i a') }}</span>
                                                        </div>
                                                        {{-- <div class="event-place">
                                <span><i class="fa fa-location-dot"></i></span>
                                <span>Yarra Park, UK</span>
                            </div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-11 @if(count($featured_blogs) > 0) col-lg-5 @else col-lg-12 @endif">
                                @php
                                    $tags = Modules\Blog\Entities\Blog::where('status', 1)->pluck('tags')->toArray(); // Assuming 'tags' is the column name

                                    $tagsArray = [];

                                    foreach ($tags as $tagString) {
                                        $tagsArray = array_merge($tagsArray, explode(',', trim($tagString)));
                                    }
                                    $tagsArray = array_unique($tagsArray);    
                                @endphp
                                <div class="news-events-tabs-section">
                                    <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                                        <h4 class="rts-section-title">Events</h4>
                                        <a href="{{ route('blogs') }}" class="rts-arrow">View All <span><i
                                                    class="fa fa-arrow-right"></i></span></a>
                                    </div>
                                    <div class="news-events-tab">

                                        <ul class="nav nav-tabs pb--30">
                                            <li class="nav-item active" role="presentation">
                                                <a class="nav-link active"
                                                    href="#">Latest</a>
                                            </li>
                                            @foreach ($tagsArray as $tag)

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" class="nav-link"
                                                href="#"> {{$tag}} </a>
                                            </li>
                                            @endforeach
                                            {{-- <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-toggle="pill" href="#Admission">Admission</a>
                                            </li> --}}
                                        </ul>
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane active">
                                                <ul class="list-unstyled notice-content-box">
                                                    @foreach ($latest_blogs as $latest_blog)
                                                    <li class="single-notice">
                                                        <div class="single-notice-item">
                                                            <div class="notice-date">
                                                                {{ Carbon\Carbon::parse($latest_blog->authored_date)->format('d') }}
                                                                <span>Jan</span>
                                                            </div>
                                                            <div class="notice-content">
                                                                <p>
                                                                    <a href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                                                                        {{ $latest_blog->title }}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- section tabssss --}}

                            {{-- new section end --}}
                            @if (isset($latest_blogs))
                                @foreach ($latest_blogs as $latest_blog)
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 my-3 px-2 d-none">
                                        <div class="card rounded-card shadow card-shadow">
                                            <div class="card-header rounded-card-header blog p-0">
                                                <a href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                                                    <img src="{{ getBlogImage($latest_blog->thumbnail) }}"
                                                        class="img-fluid w-100 custom_img_height rounded-card-img">
                                                </a>
                                            </div>
                                            <div class="card-body d-flex flex-column justify-content-between"
                                                style="overflow: hidden">
                                                <h5 class="font-weight-bold mb-4">
                                                    <a href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                                                        {{ $latest_blog->title }} </a>
                                                </h5>
                                                <p class="">
                                                    {{ $latest_blog->user->name }} .
                                                    {{ showDate($latest_blog->authored_date) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if (count($latest_blogs) == 0)
                                <div class="col-lg-12">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 50px"
                                                src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                alt="">
                                        </div>
                                        <h1>
                                            {{ __('No News & Events Found') }}
                                        </h1>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </section>

                <!-- <div class="row m-0 mt-5 shadow">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 bg-dark">
    <div class="text-white">
    <h2 class="custom_heading_1 font-weight-bold my-4 text-white">About Us</h2>
    <p class="my-3 text-justify text-white">
    MCOH is an inclusive and equitable enviroment that provides educational
    oppturities for anyone seeking update their skill being a new career path and
    enhance professional Skills </p>
    <div class="mb-4 text-white">
    <p class="locaton py-1 text-white">
        <i class="fi fi-rs-marker"></i>
        501 S. Florida Avenue<br>
        <span class="ml-4">Lakeland, FL 33801</span>
    </p>
    <p class="call py-1 text-white">
        <i class="fi fi-br-phone-call"></i>
        863-250-8764 | 347-525-1736
    </p>
    <p class="time py-1 text-white">
        <i class="fi fi-rs-clock-three"></i>
        Mon - Thur: 8:30 AM - 7:00 PM
    </p>
    </div>
    </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 custom_section_color p-0">
    <form method="POST" action="{{ route('contactMsgSubmit') }}" class="fe mx-4 mt-2">
    <h2 class="custom_heading_1 font-weight-bold my-4">Stay in Touch!</h2>
    @csrf
    <label for="name" class="form-label">Your Name</label>
    <input type="text" name="name" class="form-control form_sm mb-2"
    placeholder="">
    <label for="" class="form-label">Email Address</label>
    <input type="email" name="email" class="form-control form_sm mb-2"
    placeholder="">
    <label for="" class="form-label">Phone #</label>
    <input type="text" name="phone" class="form-control form_sm mb-2"
    placeholder="">
    <label for="" class="form-label">Zip Code</label>
    <input type="text" name="zip" class="form-control form_sm mb-2"
    placeholder="">
    <label for="" class="form-label">Select Program</label>
    <select id="program" name="program" class="form-control form_sm mb-2" required>
    <option value="" selected>Select Program</option>
    <option value="REMEDIAL-RN(176 Hours)">REMEDIAL-RN(176 Hours)</option>
    <option value="Refresher-RM(Endorsement & inactive License)">
        Refresher-RM(Endorsement & inactive License)
    </option>
    <option value="NCLEX Refresher(Prep)">NCLEX Refresher(Prep)</option>
    <option value="CNA Exam Prep(Skills Testing)">CNA Exam Prep(Skills
        Testing)
    </option>
    <option value="Clinical-Proctor">Clinical-Proctor</option>
    </select>
    <label for="year" class="form-label mt-2">High School Grade Year</label>
    <select id="years" name="year" class="form-control form_sm w-100 mb-2"
    required>
    <option value="" selected>Select Year</option>
    @php
        $years = range(
            date(
                'Y',
            ),
            1950,
        );
    @endphp
    @forelse ($years as $year)
    <option value="{{ $year }}">{{ $year }}</option>
    @empty
    <option value="">No Year Found</option>
    @endforelse
        </select>
        <label for="message" class="form-label mt-2">Message</label>
        <textarea name="message" class="form-control form_sm" rows="4" aria-required="true" aria-invalid="false"
            placeholder="" required style="resize: none"></textarea>
        <div class="col-md-12 my-3 text-center">
            <button type="submit" class="theme_btn small_btn4">Submit</button>
        </div>
    </form>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 d-none d-lg-block d-md-block p-0">

    <div class="video1" onclick="homeVideo()">
        <div class="vidicons m-auto">
            <i class="fa-solid fa-play"></i>
        </div>
    </div>
    </div>
    </div>
    -->


                <div class="modal fade" id="video_image" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <video width="700" controls>
                                    <source src="https://jusoutbeauty.com/site/public/uploads/product/videos/57.mp4"
                                        type="video/mp4">
                                    <source src="https://jusoutbeauty.com/site/public/uploads/product/videos/57.mp4"
                                        type="video/ogg">
                                </video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn theme_btn small_btn2 px-4 py-2"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                </div>


                <!-- new section -->
                <section class="sec-12">
                    <div class="container-fluid mintban px-lg-5 mb-5">
                        <div class="row mintban_row mb-5 mt-3 px-xl-5">
                            {{-- <div class="col-md-12 mb-5">
            <div class="row "> --}}
                            <div class="flowdiv d-flex">
                                {{-- <div class="row m-0" style=""> --}}
                                <div class="col-md-4 ankar flowdiv-ele">

                                    <div
                                        class="dataflow  p-2 text-white d-flex justify-content-center align-items-center">
                                        <div class="eltdf-eh-item-content eltdf-eh-custom-5500"
                                            style="padding:0 8% 0 8% ;">
                                            <div class="cta_service_info txt">
                                                <h2 class="mb-4">Become a MCInstructor | Tutor</h2>
                                                <p class="mb-4"> Make a difference in the lives of future generations:
                                                    Merakii seeks
                                                    passionate
                                                    educators. Our students come from a variety of backgrounds, and so can
                                                    you. Share
                                                    your expertise, be it industry knowledge, academic prowess, or
                                                    real-world
                                                    experience.
                                                </p>
                                                <a href="{{ url('/instructors') }}"
                                                    class="theme_btn small_btn py-2 px-4">MC
                                                    Instructor</a>

                                                <!--
                                                                                                                                                                                                                                           <h1 class="mx-3 mt-5 pt-4">Ut enim ad minim veniam, quis nos trud exercita ion</h1>
                                                                                                                                                                                                                            <p class="mx-3 mt-2 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                                                                                                                                                                                                                            Doloremque, eveniet deleniti atque dicta ullam officia rerum. Non iure quos sint deserunt
                                                                                                                                                                                                                                 sed officia sequi assumenda eos repellendus expedita? Quasi veritatis tenetur, fugiat quis
                                                                                                                                                                                                                                               numquam maxime voluptate praesentium dolores amet nemo ipsum soluta unde quam suscipit.
                                                                                                                                                                                                                                                                                            Rerum nobis amet voluptatem eos.</p> -->
                                                {{-- <img src="{{ asset('public/assets/left-arrow-64.png') }}" height="50"
                                        class="lia" style="position:absolute;right: -12px;"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6 ankar col-md-6 p-0" >
                                                                 </div> -->
                                {{-- form-add --}}
                                <div class="col-md-4 flowdiv-ele col-12 custom_section_color shadow_row custom_paragraph custom_form d-flex align-items-center"
                                    style="padding: 0px 2% 0px 2%;">

                                    <form class="w-100">
                                        <h2 class="custom_heading_1 font-weight-bold my-2 form_h1">Stay in Touch!</h2>
                                        <div class="form-row mt-3">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside form-control" required />
                                                    <span class="floating-label-outside">Your name</span>
                                                    <i class="fa fa-user-o input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" id="dateInput" class="outside" required />
                                                    <span class="floating-label-outside">Email Address</span>
                                                    <i class="fa fa-envelope-o input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside" required />
                                                    <span class="floating-label-outside">Phone #</span>
                                                    <i class="fa fa-mobile input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside" required />
                                                    <span class="floating-label-outside">Zip Code</span>
                                                    <i class="fa fa-map-marker input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <select class="outside" required>
                                                        <option value="" disabled selected></option>
                                                        <option value="9">Grade 9</option>
                                                        <option value="10">Grade 10</option>
                                                        <option value="11">Grade 11</option>
                                                        <option value="12">Grade 12</option>
                                                    </select>
                                                    <span class="floating-label-outside">Select Program</span>
                                                    <i class="fa fa-chalkboard-user input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12 ">
                                                <div class="position-relative mb-2">
                                                    <select class="outside" required>
                                                        <option value="" disabled selected></option>
                                                        <option value="9">Grade 9</option>
                                                        <option value="10">Grade 10</option>
                                                        <option value="11">Grade 11</option>
                                                        <option value="12">Grade 12</option>
                                                    </select>
                                                    <span class="floating-label-outside">High School Grade Year</span>
                                                    <i class="fa fa-graduation-cap input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="shadow_msg" required />
                                                    <span class="floating-label-msg">Message</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                class="theme_btn small_btn4 py-2 px-4">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- form-end --}}
                                <div class=" col-md-4 flowdiv-ele">
                                    <div class="eltdf-eh-item eltdf-background-arrow-left changeborder ankar_eltdf"
                                        style="background: var(--footer_background_color);">

                                        <div class="eltdf-eh-item-inner d-flex align-items-center justify-content-center"
                                            style="">

                                            <div class="eltdf-eh-item-content eltdf-eh-custom-5500"
                                                style="padding: 0 8% 0 8% !important;">
                                                <div class="cta_service_info">
                                                    <h2 class="mb-4">Expand Your Reach to Global Adult Learners</h2>
                                                    <p class="mb-4 text-white"> Fuel your passion for Teaching and join
                                                        Merakii's vibrant
                                                        community of
                                                        Educators. Our diverse student body welcomes instructors from all
                                                        walks of life.
                                                        List Your Course & Reach Adult Healthcare Learners Worldwide.
                                                    </p>
                                                    <a href="{{ url('/teach-with-us') }}"
                                                        class="theme_btn small_btn py-2 px-4">Create
                                                        &
                                                        Sell Your Courses</a>
                                                </div>
                                            </div>
                                            <!-- <div class="eltdf-eh-item-content eltdf-eh-custom-5500"
                                                                                                                                                                                                                                                                                                                                                                                                    style="padding: 66px 12% 0 12% !important;">



                                                                                                                                                                                                                                                                                                                                                                                                    <div class="wpb_text_column wpb_content_element">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="wpb_wrapper mt-3">
                                                                                                                                                                                                                                                                                                                                                                                                            <h3 style="font-weight: bold;">Apply Now</h3>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="vc_empty_space" style="height: 25px"><span
                                                                                                                                                                                                                                                                                                                                                                                                            class="vc_empty_space_inner"></span></div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div role="form" class="wpcf7" id="wpcf7-f910-p311-o2" lang="en-US"
                                                                                                                                                                                                                                                                                                                                                                                                        dir="ltr">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="screen-reader-response">
                                                                                                                                                                                                                                                                                                                                                                                                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                                                                                                                                                                                                                                                                                                                                                                            <ul></ul>
                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                        <form action="{{ route('login') }}" method="POST" class="wpcf7-form init demo">
                                                                                                                                                                                                                                                                                                                                                                                                            @csrf
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="eltdf-contact-form-7-widget">
                                                                                                                                                                                                                                                                                                                                                                                                                <span class="wpcf7-form-control-wrap" data-name="your-email"><input
                                                                                                                                                                                                                                                                                                                                                                                                                        type="email" name="email" value="{{ old('email') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                        size="40"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                                                                                                                                                                                                                                                                                                                                                                        required placeholder="Email"></span><br>
                                                                                                                                                                                                                                                                                                                                                                                                                <span class="wpcf7-form-control-wrap" data-name="your-tel"><input
                                                                                                                                                                                                                                                                                                                                                                                                                        type="password" name="password" value="{{ old('password') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                        size="40"
                                                                                                                                                                                                                                                                                                                                                                                                                        class="w-100 wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                                                                                                                                                                                                                                                                                                                                                                                        required placeholder="Password"></span><br>
                                                                                                                                                                                                                                                                                                                                                                                                                {{-- <input type="submit" value="Get it now"
                                                    class="has-spinner small_btn theme_btn wpcf7-form-control wpcf7-submit mt-4"><span
                                                    class="wpcf7-spinner"></span> --}}
                                                                                                                                                                                                                                                                                                                                                                                                                <button type="submit" class="theme_btn small_btn5 text-center">
                                                                                                                                                                                                                                                                                                                                                                                                                    {{ __('common.Login') }}</button>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                                                                                                                                                                                                                                                                                                                                                                        </form>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                        {{--
        </div> --}}
                        {{-- </div> --}}
                    </div>
                </section>


                @include(theme('partials._custom_footer'))
            @elseif($block->id == 16)
                {{-- @if ($homeContent->show_how_to_buy == 1)
<x-home-page-how-to-buy :homeContent="$homeContent" />
@endif --}}
            @elseif($block->id == 17)
                {{-- @if ($homeContent->show_home_page_faq == 1)
<x-home-page-faq :homeContent="$homeContent" />
@endif --}}
            @endif
        @endforeach
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="path/to/swiper.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    {{-- for scroll --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // const iFrame = document.getElementById("myIframe")
        // console.log(iFrame)
        // function homeVideo() {
        //     $('#video_image').modal('show');
        // }
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        AOS.init({
            duration: 1000,
        });
        $(document).ready(function() {
            $('#years').select2();
            $('#program').select2();

            // var first_div = $('.first_div');
            // var second_div = $('.second_div');
            // var random_program = $('#random_programs');
            var url = '{{ route('getRandomProgram') }}';
            var random_program_data = '';
            setInterval(() => {
                $.ajax({
                    type: "GET",
                    url: url,
                    // data: "null",
                    dataType: "json",
                    success: function(response) {
                        var icon = response.program.icon ? response.program.icon :
                            "asset('public/assets/program/no-image.png')";
                        var programTitle = response.program.programtitle;
                        var programTotalsubtitle = response.program.subtitle;
                        var programTotaldesc = response.program.discription;
                        var programTotalcost = response.program.totalcost;

                        console.log(response);
                        $('#program_icon').attr("src", icon);
                        $('#program_title').html(programTitle);
                        $('#program_subtitle').html(programTotalsubtitle);
                        $('#program_desc').html(programTotaldesc);
                        $('#program_cost').html('$' + programTotalcost);
                        // $('.random_program_data').fadeOut(500, function() {
                        //     $(this).remove();
                        // });
                        // random_program_data = `<div class="col-lg-6 col-md-6 col-sm-6 col-6 first_div px-0 random_program_data">
                    //         <img src="` + response.program.icon + `" class="img-fluid w-100">
                    //     </div>
                    //     <div class="col-lg-6 col-md-6 col-sm-6 col-6 first_div px-0 random_program_data">
                    //         <div class="small_section_bg_color h-100">
                    //             <h2 class="px-4 pt-4 text-white">
                    //                 ` + response.program.programtitle + `
                    //             </h2>
                    //             <h4 class="px-4 pt-2 text-white">
                    //                 <span class="font-weight-bold font-italic">$` + response.program.totalcost + `</span>
                    //                 <br class="mb-3">

                    //             </h4>
                    //         </div>
                    //     </div>`;
                        // random_program.html(random_program_data).fadeIn(500);

                    }
                    // });
                    // if (first_div.hasClass('d-none')) {
                    //     first_div.fadeIn(500).removeClass('d-none');
                    //     second_div.fadeOut(500).addClass('d-none');
                    //     console.log('The div has the specified class.');
                    // } else {
                    //     second_div.fadeIn(500).removeClass('d-none');
                    //     first_div.fadeOut(500).addClass('d-none');
                    //     console.log('The div does not have the specified class.');
                    // }
                });
            }, 10000);


        });
    </script>

    {{-- <script src="{{ asset('public/assets/popper.js') }}"></script>
<script src="{{ asset('public/assets/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

    <script>
        // 3rdsection hovereffect
        const image_Card = document.querySelector(".image_card")
        document.addEventListener('DOMContentLoaded', function() {
            var firstRightCard = document.querySelector('#right-cards .prep_card');
            copyCardDataToLeftCard(firstRightCard);
            image_Card.style.transform = "translateX(0)"
        });

        function copyCardDataToLeftCard(prep_card) {
            var leftCard = document.querySelector('.left-card');
            var leftProTitle = document.getElementById('left-pro-title');
            var leftcardText = document.querySelector('.left-card-text');
            var leftMeetingInfo = document.querySelector('.widget-49-meeting-info');
            var leftForLeft = document.querySelector('.left-content .for-left');

            var imageUrl = prep_card.querySelector('.prep_card-image').getAttribute('src');
            var proTitle = prep_card.querySelector('.widget-49-pro-title').innerHTML;
            var cardText = prep_card.querySelector('.prep_card-text').innerHTML;

            leftCard.style.backgroundImage = 'url(' + imageUrl + ')';
            leftProTitle.innerHTML = proTitle;
            leftcardText.innerHTML = cardText;
            leftMeetingInfo.innerHTML = prep_card.querySelector('.widget-49-meeting-info').innerHTML;
            leftForLeft.innerHTML = prep_card.querySelector('.for-left').innerHTML;

            leftForLeft.style.display = 'block';
            leftForLeft.style.visibility = 'visible';

            // image_Card.style.transform = "translateX(-225%)";
            image_Card.style.transition = "transform .9s ease";
            image_Card.style.opacity = '0'


            setTimeout(function() {
                image_Card.style.transform = 'translateX(0)';
                image_Card.style.opacity = '1'
            }, 700);
        }
    </script>

    <script>
        // $('.zakana').slick({
        //     lazyLoad: 'ondemand',
        //     slidesToShow: 2,
        //     slidesToScroll: 1,
        //     infinite: true,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     // dots: false,
        //     // prevArrow: false,
        //     // nextArrow: false
        //     arrows: true,

        //     responsive: [{
        //             breakpoint: 992,
        //             settings: {
        //                 arrows: false,
        //                 centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 768,
        //             settings: {
        //                 arrows: true,
        //                 centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 576,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 320,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         }
        //     ]
        // });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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
                    // autoplayHoverPause: false,
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
        // jQuery(document).ready(function($) {
        // $('.owl-carousel').find('.owl-nav').removeClass('disabled');
        //     $('.owl-carousel').on('changed.owl.carousel', function(event) {
        //         $(this).find('.owl-nav').removeClass('disabled');
        //     });
        // });


        //         $(document).ready(function(){
        //     $(window).scroll(function(){
        //         $(".custom_form").css( "transform": "translateY(-100%)",
        //             "opacity": 0).animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //         $(".dataflow").css("transform", "translateY(-100%)").animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //         $(".ankar_eltdf").css("transform", "translateY(-100%)").animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //     });
        // });
    </script>
    <script>
        $(document).ready(function() {
            const slideWidth = $(".custom-slide").outerWidth(); // Width of each custom-slide
            const numSlides = $(".custom-slide").length;
            let currentSlide = 0;

            // Set the total width of the custom-slider dynamically based on number of slides
            $(".custom-slider").width(numSlides * slideWidth);

            // Function to move slides left
            $(".next").click(function() {
                if (currentSlide < numSlides - 1) {
                    currentSlide++;
                    $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
                }
            });

            // Function to move slides right
            $(".prev").click(function() {
                if (currentSlide > 0) {
                    currentSlide--;
                    $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
                }
            });
        });
    </script>
    {{-- //   scroll our partner --}}
    <script>
        var swiper = new Swiper('.swiper', {
            slidesPerView: 7,
            // slidesPerGroup: 1,
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            autoplay: {
                delay: 2000,
                //   disableOnInteraction: false,
            },

        });
        // video-of-faqs
        var video = document.getElementById("myVideo");
        var playPauseBtn = document.getElementById("playPauseBtn");
        var videoContainer = document.querySelector(".video-container");
        var overlay = document.querySelector(".overlay-video");
        var textOverlays = document.querySelectorAll(".text-video-overlay");
        var videoControls = document.querySelector(".video-controls");

        function togglePlayPause() {
            if (video.paused) {
                video.play();
                playPauseBtn.querySelector("i").classList.remove("fa-play");
                playPauseBtn.querySelector("i").classList.add("fa-pause");
                hideOverlay();
                hideTextAndButton();
                videoContainer.classList.add("video-playing");
            } else {
                video.pause();
                playPauseBtn.querySelector("i").classList.remove("fa-pause");
                playPauseBtn.querySelector("i").classList.add("fa-play");
                showTextAndButton();
                videoContainer.classList.remove("video-playing");
            }
        }

        document.body.addEventListener("click", function(event) {
            if (videoContainer.contains(event.target) && event.target !== playPauseBtn) {
                showOverlay();
                showTextAndButton();
            }
        });

        videoContainer.addEventListener("click", function(event) {
            togglePlayPause(); // Pause or play the video when clicking inside the container
        });

        playPauseBtn.addEventListener("click", function(event) {
            togglePlayPause(); // Pause or play the video when clicking on the button
        });

        function hideOverlay() {
            overlay.style.opacity = "0";
        }

        function showOverlay() {
            overlay.style.opacity = "1";
        }

        function hideTextAndButton() {
            playPauseBtn.style.opacity = "1";
            textOverlays.forEach(function(overlay) {
                overlay.style.opacity = "0";
            });
            videoControls.style.opacity = "0";
        }

        function showTextAndButton() {
            playPauseBtn.style.opacity = "1";
            textOverlays.forEach(function(overlay) {
                overlay.style.opacity = "1";
            });
            videoControls.style.opacity = "1";
        }

        video.addEventListener("click", function() {
            if (video.paused) {
                togglePlayPause();
            } else {
                showTextAndButton();
            }
        });

        video.addEventListener("play", function() {
            hideOverlay();
            hideTextAndButton();
        });
        video.addEventListener("pause", function() {
            showTextAndButton();
            showOverlay();
        });
    </script>
    <script>
        function toggleAccordion(id) {
            var content = document.getElementById('collapse_' + id);
            var isOpen = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';
            // Close all other tabs
            var allContents = document.querySelectorAll('.tab-about-content');
            allContents.forEach(function(item) {
                if (item.id !== 'collapse_' + id) {
                    item.style.maxHeight = '0';
                    var label = item.parentElement.querySelector('.tab-about_label');
                    label.classList.remove('rotate');
                }
            });
            if (!isOpen) {
                // Open the clicked tab
                content.style.maxHeight = content.scrollHeight + "px";
            } else {
                // Close the clicked tab
                content.style.maxHeight = '0';
                var label = content.parentElement.querySelector('.tab-about_label');
                label.classList.remove('rotate');
            }
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        let sections = document.querySelectorAll('section');
        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                if (top >= offset && top < offset + height) {
                    sec.classList.add('show-animate');
                } else {
                    sec.classList.remove('show-animate'); // corrected typo here
                }
            })
        }
    </script>
    {{-- sec-1 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const heading = document.querySelector('.hero-section-main-heading');
            const paragraph = document.querySelector('.hero-section-p');
            const enrollLink = document.querySelector('.btn_glo');
            const headingLetters = heading.textContent.trim().split('');
            heading.innerHTML = '';
            headingLetters.forEach(letter => {
                const span = document.createElement('span');
                span.textContent = letter;
                heading.appendChild(span);
            });
            const headingAnimation = gsap.from(heading.children, {
                duration: 0.3,
                opacity: 0,
                y: 10,
                ease: "power2.out",
                stagger: 0.1
            });
            gsap.set([paragraph, enrollLink], {
                opacity: 0
            });
            const timeline = gsap.timeline();
            timeline.add(headingAnimation);
            timeline.to([paragraph, enrollLink], {
                duration: 0.7,
                opacity: 1,
                y: 0,
                ease: "power2.out",
                stagger: 1
            });
        });
    </script>
    {{-- sec-2 --}}
    <script>
        function handleScroll() {
            const container = document.getElementById('content-container');
            const elements = container.querySelectorAll('.content-feature1');

            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                if (
                    rect.top >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
                ) {
                    gsap.to(element, {
                        opacity: 1,
                        duration: 0.5
                    });
                    console.log("Element in view:", element);
                } else {
                    gsap.to(element, {
                        opacity: 0,
                        duration: 0.5
                    });
                }
            });
        }
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    </script>
    {{-- sec-3 --}}
    <script>
        gsap.registerPlugin(ScrollTrigger);
        const stories = document.querySelectorAll(".cta_area-row");

        stories.forEach((s) => {
            var tl = gsap.timeline({
                scrollTrigger: {
                    trigger: s,
                    scrub: true,
                    end: "bottom top"
                }
            });

            tl.from(s.querySelector(".section__title"), { // Corrected the selector here
                scale: 1.5,
                ease: "power2"
            });
        });
    </script>
    {{-- sec-4 --}}
    {{-- sec-5 --}}
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.percent-section');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.animatee');
                percentItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        x: -50,
                        duration: 0.9,
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script>
    {{-- sec-7 --}}
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const imgSections = document.querySelectorAll('.about_us');

            imgSections.forEach((section) => {
                const imgItems = section.querySelectorAll('.about-img');
                imgItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        x: -50,
                        duration: 0.9,
                        ease: "power2.out",
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script>
    {{-- sec-9 --}}
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.for-main');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.for-element');
                percentItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        y: -50,
                        duration: 0.9,
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script>
    {{-- sec-12 --}}
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.flowdiv');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.flowdiv-ele');
                percentItems.forEach((item, index) => {
                    let animationProps = {
                        opacity: 0,
                        duration: 1,
                        delay: index * 0.4,
                    };

                    if (index === 0) {
                        animationProps.x = -200;
                    } else if (index === percentItems.length - 1) {
                        animationProps.x = 200;
                    } else {
                        animationProps.y = -200;
                    }

                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        ...animationProps
                    });
                });
            });
        }
        handleScroll();
    </script>
    </body>

@endsection
