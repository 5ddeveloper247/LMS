@extends(theme('layouts.master'))
@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontendmanage.Home') }}
@endsection


<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
{{--
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
{{-- carousel --}}
{{--
<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/owl.theme.default.min.css') }}" /> --}}

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />

<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/owl.theme.default.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{--
<link rel="stylesheet" href="{{ asset('public/assets/style.css') }}" /> --}}

{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    html {
        overflow-x: hidden;
        font-size: 16px;
        /* Set your desired base font size */
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
        background-color: black;
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
        color: white !important;
    }

    .owl-carousel .owl-nav button.owl-prev {
        z-index: 12 !important;
        position: relative;
        display: block;

        font-size: 60px;
        left: 63%;
        font-size: 60px !important;
        top: -37px;
        color: white;
    }

    .owl-carousel .owl-nav .owl-prev span:before,
    .owl-carousel .owl-nav .owl-next span:before {
        font-size: 60px;
        font-weight: bold;
        color: white;
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
        color: #ff6700;
    }

    .learn_more {
        font-size: 19px;
        border-bottom: 2px solid black;
        color: black;
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

    .btn_glo:hover {
        background-color: #ff6700 !important;
        border: 3px solid #ff6700 !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }

    .vidicons {
        width: 66px;
        position: relative;
        height: 66px;
        background: white;
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
    }

    .about_us_height {
        height: auto;
    }

    .about_us_p {
        height: auto;

    }

    .about_us_p::-webkit-scrollbar {
        display: none;
    }

    .shadow_row {
        height: auto;
    }

    .shadow_ist {
        height: auto;
    }

    .shadow_msg {
        height: 50px !important;
    }

    .mintban_row {
        height: 85vh;
    }

    .vidicons:hover {
        box-shadow: 0px 1px 15px 7px red;
    }

    .video1 {
        background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-1.jpg') }}");
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
    }

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
        background-color: #6a0dad !important;
    }

    .small_section_bg_color>h2 {
        font-size: calc(2vw + 0.7rem);
    }

    .small_section_bg_color>h4 {
        font-size: calc(1.5vw + 0.6rem);
    }

    .form_h1 {
        font-size: 1.5rem;
    }

    .main_bannar {
        background-image: url("{{ asset('public/assets/PN-Accelerated-fotor-2023070923837.jpg') }}");
        background-size: cover;
        height: 100%;
        position: relative;
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

    .main_bannar>h1 {
        font-weight: bold;
        color: #fff;
        font-size: calc(5vw + 1rem);
        position: relative;
    }

    .main_banner>button {
        position: relative;
    }

    .main_bannar>a {
        border: 3px solid white;
    }

    .custom_section_color {
        background-color: #eee !important;
    }

    .random_program_data_2 {
        overflow: hidden;
    }


    .modal-lg,
    .modal-xl {
        max-width: 800px !important;
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
        padding: 16px 25px;
        margin-bottom: 11px;
    }

    /* shift from contact */
    .mintban {
        background-image: url("{{ asset('public/assets/bgpicture.jpg') }}");
        height: auto;
        background-size: cover;
    }

    .flowdiv {
        width: 100% !important;
        padding: 3rem 3rem;
        margin: auto;
    }

    .dataflow {
    height: auto;
    background-color: #6a0dad;
    position: relative;
    padding: 8rem 8rem;
}

    .dataflow h1 {
        font-size: 28px;
        /* width: 70%; */
        margin: auto;
        line-height: 1.2em;
        font-family: Poppins, sans-serif;
        color: #ffffff;
        font-weight: bold;
    }

    .eltdf-eh-item-inner {
    height: 100%;
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

    .cta_service_info h4 {
        font-size: 22px;
        font-weight: 700;
        margin: 29px 0 29px;
        color: #1770b5;
    }

    .cta_service_info.txt h4 {
        color: white;
    }

    .cta_service_info p {
        font-size: 16px;
        font-weight: 500;
        line-height: 23px;
        color: #373737;
        margin: 10px 0 29px;
    }

    .cta_service_info.txt p {
        color: white;
    }

    .theme_btn.small_btn {
        padding: 16px px 25px;
    }

    .theme_btn {
        background: var(--system_primery_color);
        border-radius: 5px;
        font-family: Source Sans Pro, sans-serif;
        font-size: 16px;
        color: #fff;
        font-weight: 600;
        padding: 21px 28px;
        border: 1px solid transparent;
        text-transform: capitalize;
        display: inline-block;
        line-height: 1;
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
            background-color: rgba(0, 0, 0, 0.5);
        }

        .prep_card {
            height: auto;
            position: relative;
            display: flex;
            flex-direction: column;
            background-color: #FDFCFC;
            padding: 7px !important;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 0.25px;
            border: 1px solid gainsboro;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            word-wrap: break-word;
        }

        .prep_card-text {
            margin: 0px !important;
        }

        .prep_card-image {
            position: relative;
            object-fit: cover;
            width: 100%;
            height: 8rem;
        }
        .prep_card-title {
            margin-top: 20px;
        }

        .widget-49-meeting-info {
            position: absolute;
            right: 0;
        }

        .widget-49-pro-title {
            background-color: #989081;
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
            border: 1px solid #E1DED9;
            border-radius: .25rem;
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
        }

        #left-pro-title {
            display: none;
        }

        .left-card-text {
            font-size: 20px;
            color: #fff;
            font-weight: 500;
        }

        .learn-more, .prep-paragraph{
            color: #fff;
        }
        /* section2 */
.for-backcolor{
    background-color: #eee !important;
}
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
.for-label:hover{
    border-bottom: 0px; color: #fff;
    border-left: 3px solid #365e88;
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
.for-label:hover:after{ width: 100%;}
.for-label:after{ background: #D3D3D3; }
.for-main{
    display: flex;
    flex-direction: column;
    gap: 4rem;
}
.for-border {
    border: 0px;
    border-left: 1px solid #D3D3D3;
    padding-left: 20px;
   
}
.icons-style {
    font-size: 2rem;
    margin-right: 2rem;
    color: cadetblue;
}
.for-label1{
    font-size: 20px;
    color: black;
}
.for-para {
    font-size: 15px;
    line-height: 20px;
}
.for-bold{
    font-weight: 500;
}
.icon-img{
    height: 40px !important;
    max-width: 13% !important;
    width:100%;
}
    @media only screen and (max-width: 576px) {
        .prep_card_height {
                height: 30vh;
                width: 100%;
            }

            .prep_card-text {
                font-size: 12px !important;
            }

            .left-content {
                margin-bottom: 10px;
                font-size: 12px;
            }
        .random_program_data_1 {
            height: 200px;
            overflow: hidden;
        }

        .random_program_data_2 {
            height: 200px;
            overflow: hidden;
        }

        #program_icon {
            height: 200px;
            object-fit: cover;
        }
        .cta_service_info h4 {
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


    @media only screen and (max-width: 768px) {
        .reviews {
            text-align: center !important;
        }
        .for-bold{
            font-size: 25px;
        }
        .for-main{
            margin-bottom: 4rem;
        }
        .prep_card-text {
                font-size: 12px;
                display: flex;
                justify-content: center;
                text-align: center;
            }

            .image_card {
                height: 13rem;
            }
            .main_row-h{
                font-size: 20px !important;
            }
            .custom_paragraph{
                font-size: 16px;
            }
    }

    @media only screen and (min-width: 1280px) {

        .dataflow {
    height: 355px;
   
}
    }


    @media only screen and (min-width: 1350px) {

     
        .about_us_height {
            height: 540px;
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
       
     
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            height: 2.3rem !important;
        }

        .form_sm {
            height: 2.3rem !important;
        }
    }

    @media only screen and (min-width: 1560px) {
        .shadow_msg {
            height: 5rem !important;
        }

        .about_us_height {
            height: 600px;
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

      
    }

    @media screen and (width < 1650px) {
        #program_title {
            font-size: 20px !important;
        }

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

        /* .height-card {
            height: 425px !important
        }

        .imgdata {
            background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}");
            background-size: cover;
            height: 425px !important;
        } */
    }

    @media only screen and (min-width: 1650px) {

       
        .about_us_height {
            height: 657px;
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
        .dataflow {
    height: 500px;
}
    }

    @media only screen and (min-width: 1800px) {

        .prep_card {
    height: 250px; 
}

        .about_us_height {
            height: 720px;
        }
       

        .cta_service_info h4 {
            font-size: 28px;
        }

        .cta_service_info p {
            font-size: 18px;
        }

        .paragraph {
            font-size: 20px;
        }

        .custom_paragraph {
            font-size: 20px;
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

       

        .cta_service_info p {
            font-size: 25px;
        }

        .cta_service_info h4 {
            font-size: 36px;
        }

       

        .about_us_height {
            height: 964px;
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



    /* @media (width > 1650px) {
        .imgdata {
            background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}");
            background-size: cover;
            height: 500px;
        }

        .height-card {
            height: 500px;
        }

        .vidicons {
            width: 66px;
            position: relative;
            height: 66px;
            background: white;
            text-align: center;
            border-radius: 50%;
            top: 410px;
            cursor: pointer;
            transition: .5s;
        }


        .custom_img_height {
            height: 500px !important;
        }

        .select2-container .select2-selection--single {
            height: 44px !important;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 43px !important;
            font-size: 23px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {

        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #888 transparent transparent transparent;
            border-style: solid;
            border-width: 8px 8px 0 8px !important;
            height: 0;
            left: 50%;
            margin-left: -17px !important;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1.4rem !important;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .random_program_data_1 {
            height: 500px;
            overflow: hidden;
        }

        .random_program_data_2 {
            height: 500px;
            overflow: hidden;
        }

        #program_icon {
            height: 500px;
            object-fit: cover;
        }

        .cta_area {
            padding: 250px 0 !important;
        }

        .section__title h3.large_title {
            font-size: 80px;
            line-height: 76px;
        }

        h6 {
            font-size: 1.2rem !important
        }

        .h6 {
            font-size: 1.4rem !important
        }

        label {
            color: #7e7e7e;
            cursor: pointer;
            font-size: 23px !important;
        }

        .learn_more {
            font-size: 26px !important;
            border-bottom: 2px solid black;
            color: black;
        }

        .theme_btn {
            font-size: 1.2vw !important;
        }

        .read_more {
            font-size: 38px !important;
        }

        h4 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        .step_font {
            font-size: 29px !important;
        }

        .video1 {
            height: 100% !important;
        }

        .blog img {
            height: 31.875rem !important;
            width: 100%;
            transition: 500ms ease-in-out;
        }

        .about_us_height {
            height: 660px !important;
        }
    } */

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

    .section-margin-y {
        margin: 60px auto !important;
    }

    .section-padding-y {
        padding-top: 60px !important;
        padding-bottom: 60px !important
    }

    /* .step_font {
        color: #373737 !important;
    } */
    /*
    @media (width > 1800px) {
        .container {
            max-width: 1600px !important;
        }

        p {
            font-size: 1vw !important;
        }

        h2 {
            font-size: 2vw !important;
        }

        h4 {
            font-size: 1.5vw !important;
        }

        h5 {
            font-size: 1.4vw !important;
        }

        small {
            font-size: 0.9vw !important;
        }

        a.theme_btn {
            font-size: 1vw !important;
        }
    } */
</style>

@section('mainContent')
{{-- MainBanner --}}
{{-- zaheer --}}
<div class="container-fluid px-0 g-0">
    <div class="row g-0">
        <div class="col-md-8 pl-0">
            <div class="main_bannar d-flex justify-content-center align-items-center flex-column mb-5 pb-5">
                <h1 style=" font-weight: bold;
                    color: #fff;
                    font-size: calc(5vw + 1rem);">
                    The University <br> for Creative<br> Careers
                    <br>
                </h1>
                @guest
                <button class="btn_glo" style="
                    background-color: transparent;  border: 3px solid white; font-size:32px;
                    border-radius:6px; position:relative">
                    <a href="{{url('/register')}}" class="read_more px-4 py-2 text-white">
                        Apply Now
                    </a>
                </button>
                @endguest
            </div>
        </div>
        <div class="col-md-4 old_row pl-0">
            @if (isset($random_program))
            <div class="row" id="random_programs">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 first_div random_program_data_1 height-card px-0">
                    <img id="program_icon" src="{{ $random_program->icon }}"
                        class="w-100 imgcls object-fit-cover img-fluid height-card">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 first_div height-card px-0">
                    <div class="d-flex flex-column h-100 justify-content-center small_section_bg_color">
                        <h3 class="font-weight-bold px-4 pt-4 text-white" id="program_title">
                            {{ $random_program->programtitle }}
                        </h3>
                        <h5 class="font-weight-bold px-4 pt-2 text-white" id="program_subtitle">
                            {{ $random_program->subtitle }}
                        </h5>
                        <p class="px-4 pt-2 text-white" style="margin-bottom:0.5rem" id="program_desc">

                            @php
                            $program_description = strip_tags($random_program->discription);
                            @endphp
                            @if (Str::length($program_description) > 100)
                            {{ Str::limit($program_description, 100, '...') }}
                            @else
                            {{ $program_description }}
                            @endif
                        </p>
                        <h5 class="px-4 pt-2 text-white" id="program_cost">
                            ${{ $random_program->totalcost }}
                        </h5>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-6 random_program_data_2 height-card px-0">
                    <div class="d-flex flex-column h-100 justify-content-center px-4">
                        <h3 class="font-weight-bold custom_heading_2">
                            Accelerate Your Future
                            <br>
                            Learn New Things
                            <br>
                            Get New skills,
                            <br> JOIN US !
                            </h1>
                            <a class="theme_btn small_btn mt-2 text-center" href="{{url('/prep-courses')}}">View
                                Courses</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 height-card random_program_data_1 px-0">
                    <div class="">
                        <img src="http://mchnursing.com/lms/public/uploads/homepage/home_banner.jpg" alt=""
                            class="w-100 imgcls object-fit-cover img-fluid height-card" style="">
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

<!-- section2 -->
<section class="for-backcolor p-5">
    <div class="container">
        <div class="row justify-content-center mx-md-4 py-5">
            <!-- 1st -->
        <div class="col-md-3 col-12 for-main">
             <div>
                <label class="for-label">Achievements</label>
                <h2 class="for-bold">Lorem ipsum dolor sit amet</h2>
            </div>
        </div>
            <!-- 2nd -->
            <div class="col-md-4 col-12 for-main">
          
            <div class="d-flex">  <img src="{{asset('public/uploads/main/images/05-03-2024/Group.png')}}" alt="" class="img-fluid icon-img">
                <div class="for-border ml-4">
               
                <label class="for-label1">50K + Online Courses</label>
                <p class="for-para">Following the quality of our service thus having gained trust of our many clients</p>
                </div>
            </div>
            <div class="d-flex"><img src="{{asset('public/uploads/main/images/05-03-2024/Unlock.png')}}" alt="" class="img-fluid icon-img">
                <div class="for-border ml-4">
                
                <label class="for-label1">Unlimited access</label>
                <p class="for-para">Following the quality of our service thus having gained trust of our many clients</p>
                </div>
            </div>
          
          
            </div>
            <!-- 3rd -->
            <div class="col-md-4 col-12 for-main">
            <div class=" d-flex"><img src="{{asset('public/uploads/main/images/05-03-2024/Stroke Close copy 3.png')}}" alt="" class="img-fluid icon-img">
            <div class="for-border ml-4">
           
                <label class="for-label1">Teacher directory</label>
                <p class="for-para">Following the quality of our service thus having gained trust of our many clients</p>
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
    <section class="py-5 bg-light">
    <div class="container py-4">
            <div class="row text-center mb-5 main_row px-4 px-md-0">
                <h2 class="main_row-h">Our Popular Prep-Courses</h2>
                <p class="custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem exerc<br>
                    voluptatibus neque et obcaecati asperiores! Praesentium magnam error veritatis adipisicing elit.
                    Dolorem
                    exerc</p>
            </div>
            <div class="row px-5">
                <div class="col-md-7 card_height image_card p-2">
                    <div class="prep_card left-card h-100 w-100" id="left-card">
                        <div class="overlay"></div>
                        <div class="left-top-content">
                            <div class="widget-49-meeting-info" id="left-title-info"></div>
                            <div id="left-pro-title"></div>
                        </div>
                        <div class="left-content">
                            <p class="left-card-text font-weight-bolder mb-3"></p>
                           
                            <div class="for-left">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 1 -->
                <div class="col-md-5 pr-md-0" id="right-cards">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 col-3 px-2 mb-2 mt-md-0 mt-2 prep_card_height">
                            <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                <img class="prep_card-image"
                                    src="https://mchnursing.com/lms/public/uploads/main/images/15-01-2024/course-17053061371464395118.png" />
                                <div class="widget-49-meeting-info pr-2">
                                    <span class="widget-49-pro-title">PRO-0111</span>
                                </div>
                                <div class="container px-0">
                                    <p class="prep_card-text">Architect & Engineer01</p>
                                    <div class="for-left">
                                        <p class="prep-paragraph">This is my 1 paragraph</p>
                                        <a href="#" class="learn-more mr-2">Learn more</a><i
                                            class="fa fa-long-arrow-right"></i>
                                            <div class="d-flex justify-content-between pt-2">
                            <small>
                                <i class="fa fa-book-open"></i>
                               
                            </small>

                            <small>
                                <i class="fas fa-clock"></i>
                               
                            </small>

                            <small class="">
                                <i class="fa fa-dollar"></i>
                               
                            </small>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="col-md-6 col-sm-3 col-3 px-2 mb-2 mt-md-0 mt-2 prep_card_height">
                            <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                <img class="prep_card-image"
                                    src="https://mchnursing.com/lms/public/uploads/main/images/05-10-2023/course-16964895531379727219.png" />
                                <div class="widget-49-meeting-info pr-2">
                                    <span class="widget-49-pro-title">PRO-0222</span>
                                </div>
                                <div class="container px-0">
                                    <p class="prep_card-text">Architect & Engineer02</p>
                                    <div class="for-left">
                                        <p class="prep-paragraph">This is my 2 paragraph</p>
                                        <a href="#" class="learn-more mr-2">Learn more</a><i
                                            class="fa fa-long-arrow-right"></i>
                                            <div class="d-flex justify-content-between pt-2">
                            <small>
                                <i class="fa fa-book-open"></i>
                               
                            </small>

                            <small>
                                <i class="fas fa-clock"></i>
                               
                            </small>

                            <small class="">
                                <i class="fa fa-dollar"></i>
                              
                            </small>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="col-md-6 col-sm-3 col-3 px-2 mt-2 prep_card_height">
                            <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                <img class="prep_card-image"
                                    src="https://mchnursing.com/lms/public/uploads/main/images/24-10-2023/course-1698147134658694144.png" />
                                <div class="widget-49-meeting-info pr-2">
                                    <span class="widget-49-pro-title">PRO-0333</span>
                                </div>
                                <div class="container px-0">
                                    <p class="prep_card-text">Architect & Engineer03</p>
                                    <!-- Container for .for-left content -->
                                    <div class="for-left">
                                        <p class="prep-paragraph">This is my 3 paragraph</p>
                                        <a href="#" class="learn-more mr-2">Learn more</a><i
                                            class="fa fa-long-arrow-right"></i>
                                            <div class="d-flex justify-content-between pt-2">
                            <small>
                                <i class="fa fa-book-open"></i>
                               
                            </small>

                            <small>
                                <i class="fas fa-clock"></i>
                              
                            </small>

                            <small class="">
                                <i class="fa fa-dollar"></i>
                               
                            </small>
                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="col-md-6 col-sm-3 col-3 px-2 mt-2 prep_card_height">
                            <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                <img class="prep_card-image"
                                    src="https://mchnursing.com/lms/public/uploads/main/images/15-01-2024/course-17053061371464395118.png" />
                                <div class="widget-49-meeting-info pr-2">
                                    <span class="widget-49-pro-title">PRO-0444</span>
                                </div>
                                <div class="container px-0">
                                    <p class="prep_card-text">Architect & Engineer04</p>
                                    <!-- Container for .for-left content -->
                                    <div class="for-left">
                                        <p class="prep-paragraph" style="display: block;">This is my 4 paragraph</p>
                                        <a href="#" class="learn-more mr-2">Learn more</a><i
                                            class="fa fa-long-arrow-right"></i>
                                            <div class="d-flex justify-content-between pt-2">
                            <small>
                                <i class="fa fa-book-open"></i>
                              
                            </small>

                            <small>
                                <i class="fas fa-clock"></i>
                              
                            </small>

                            <small class="">
                                <i class="fa fa-dollar"></i>
                                
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
  
    </section>

    <!-- new_section_hover_end -->

    <!-- <div class="section-margin-y container g-0">
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
                                $description = str_replace('&nbsp;', ' ',
                                htmlspecialchars_decode(strip_tags($latest_program->discription)));
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
    </div> -->
    <!-- <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{ asset('public/frontend/infixlmstheme/img/images/WE_ARE_HERE_TO_LISTEN.png') }}"
                                        alt="" class="img-fluid w-100">
                                </div>
                            </div>
                        </section> -->
    {{-- How to Buy --}}

    <div class="section-margin-y container">
        <div class="row mx-md-4">
            <div class="col-md-12 mb-4">
                <h2 class="font-weight-bold text-center">How To Apply</h2>
                <p class="text-center custom_paragraph">"Pick a Program | Course to develop your skills & Get Started"
                </p>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in" data-aos-delay="300">
                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                    <i class="fa-solid fa-bars fa-2x p-3"></i>
                    <h5 class="step_font font-weight-bold my-3">Step 1</h5>
                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in" data-aos-delay="600">
                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                    <i class="fa-regular fa-address-card fa-2x p-3"></i>
                    <h5 class="step_font font-weight-bold my-3">Step 2</h5>
                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in" data-aos-delay="900">
                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                    <i class="fa-solid fa-book-open-reader fa-2x p-3"></i>
                    <h5 class="step_font font-weight-bold my-3">Step 3</h5>
                    <p class="mt-auto text-center">Trusted by companies of all sizes </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                data-aos-delay="1200">
                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                    <i class="fa-regular fa-image fa-2x p-3"></i>
                    <h5 class="step_font font-weight-bold my-3">Step 4</h5>
                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Map --}}

    <div class="row about_us" style="
                        background-color: #eee;
                    ">
        <div
            class="about_us_height align-items-center col-12 col-lg-3 col-md-4 col-sm-6 col-xl-3 d-flex justify-content-center py-3">
            <div class="mx-md-4 px-1  about_us_p">
                <i class="fa-regular fa-lightbulb fa-2x" style="color: #ff6700;"></i>
                <h2 class="font-weight-bold mb-4">About Us</h2>
                <p class="mb-3 custom_paragraph">
                    Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Aperiam, veritatis cupiditate obcaecati
                    accusantium totam est voluptate iusto quos eligendi possimus.
                    Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Aperiam, veritatis cupiditate obcaecati
                    accusantium totam est voluptate iusto quos eligendi possimus.
                    Lorem ipsum dolor sit amet consectetur.
                </p>
                <a href="{{ route('about') }}" class="learn_more font-weight-bold">Learn More </a>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 p-0">
            <img style="height: 100%; object-fit: cover; object-position: right;"
                src="{{ asset('public/assets/ban.jpg') }}" class="img-fluid about_us_img">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 p-0">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5753.884181787861!2d-81.95946927069843!3d28.0388028608652!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88dd38ca4722ecc9%3A0x10d88b4491e12478!2s501%20Florida%20Ave%20S%2C%20Lakeland%2C%20FL%2033801%2C%20USA!5e0!3m2!1sen!2s!4v1705573853815!5m2!1sen!2s"
                style="border:0;width:100%;height:100%" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26585.518296861614!2d73.13386923173827!3d33.600379866345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1674738639942!5m2!1sen!2s"
                                    style="border:0;width:100%;height:100%" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        </div>
    </div>

    <div class="section-margin-y container d-none">
        <div class="row mx-md-4 px-1">
            <div class="col-md-12 text-center">
                <h2 class="font-weight-bold">Our Popular Prep-Courses</h2>
                <p class="pb-3 custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem
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
                                class="img-fluid rounded-card-img custom_img_height w-100" style="object-fit: none;"></a>
                    </div>
                    <div class="card-body d-flex flex-column p-3">
                        <h5 class="font-weight-bold">
                            <a
                                href="{{ !empty($latest_course->parent_id) ? courseDetailsUrl(@$latest_course->parent->id, @$latest_course->type, @$latest_course->parent->slug) . '?courseType=' . $latest_course->type : courseDetailsUrl(@$latest_course->id, @$latest_course->type, @$latest_course->slug) }}">
                                {{ !empty($latest_course->parent_id) ? $latest_course->parent->title :
                                $latest_course->title }}</a>
                        </h5>

                        <div class="paragraph_custom_height mt-auto pb-2">
                            <p>@php
                                $requirements = str_replace('&nbsp;', ' ',
                                htmlspecialchars_decode(strip_tags(!empty($latest_course->parent_id) ?
                                $latest_course->parent->requirements : $latest_course->requirements)));
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
                <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                    <div class="thumb">
                        <img style="width: 50px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
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

    {{-- Learning More --}}
    @elseif($block->id == 4)
    @if ($homeContent->show_instructor_section == 1)
    <x-home-page-instructor-section :homeContent="$homeContent" />
    @endif
    <!-- new slider -->





    @include(theme('pages.reviews'))    
    
    

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
                                {{-- <p style="color: black;">Writer</p> --}}
                                {{-- <i class="fa-sharp fa-solid fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
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


    <div class="row m-0 shadow shadow_row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 bg-dark shadow_ist">
            <div class="text-white ml-2">
                <h2 class="custom_heading_1 font-weight-bold my-4 text-white">About Us</h2>
                <p class="my-3 text-justify text-white custom_paragraph">
                    MCOH is an inclusive and equitable enviroment that provides educational
                    oppturities for anyone seeking update their skill being a new career path and
                    enhance professional Skills </p>
                <div class="mb-4 text-white">
                    <p class="locaton py-1 text-white p-shadow">
                        <i class="fi fi-rs-marker"></i>
                        501 S. Florida Avenue<br>
                        <span class="ml-4">Lakeland, FL 33801</span>
                    </p>
                    <p class="call py-1 text-white p-shadow">
                        <i class="fi fi-br-phone-call"></i>
                        863-250-8764 | 347-525-1736
                    </p>
                    <p class="time py-1 text-white p-shadow">
                        <i class="fi fi-rs-clock-three"></i>
                        Mon - Thur: 8:30 AM - 7:00 PM
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 custom_section_color p-0 shadow_row custom_paragraph">
            <form method="POST" action="{{ route('contactMsgSubmit') }}" class="fe mx-4 mt-1">
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
                <select id="program" name="program" class="form-control form_sm mb-2" style="width: 100%" required>
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
                <select id="years" name="year" class="form-control form_sm w-100 mb-2"style="width: 100%" required>
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
            </form>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 d-none d-lg-block d-md-block p-0 shadow_row">

            <div class="video1" onclick="homeVideo()">
                <div class="vidicons m-auto">
                    <i class="fa-solid fa-play"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="section-margin-y container">
        <div class="row mx-md-4 px-1">
            <div class="col-md-12">
                <div class="pb-3 text-center">
                    <h2 class="custom_heading_1 font-weight-bold">
                        Popular Events and News</h2>
                    <p class="custom_paragraph">
                        The world’s largest selection of courses choose from 130,000 online video courses
                        <br>with
                        new additions published every month
                    </p>
                </div>
            </div>
            @if (isset($latest_blogs))
            @foreach ($latest_blogs as $latest_blog)
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 my-2 px-2">
                <div class="card rounded-card shadow">
                    <div class="card-header rounded-card-header blog p-0">
                        <a href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                            <img src="{{ getBlogImage($latest_blog->thumbnail) }}"
                                class="img-fluid w-100 custom_img_height rounded-card-img">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-bold">
                            <a href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                                {{ $latest_blog->title }} </a>
                        </h5>
                        <p class="mt-2">
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
                <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                    <div class="thumb">
                        <img style="width: 50px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                            alt="">
                    </div>
                    <h1>
                        {{ __('No News & Events Found') }}
                    </h1>
                </div>
            </div>
            @endif
            <div class="col-md-12 mt-5 text-center">
                <a href="{{ route('blogs') }}" class="small_btn5 theme_btn">View All </a>

            </div>
        </div>
    </div>

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
                                        $years = range(date('Y'), 1950);
                                    @endphp
                                    @forelse ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @empty
                                        <option value="">No Year Found</option>
                                    @endforelse
                                </select>
                                <label for="message" class="form-label mt-2">Message</label>
                                <textarea name="message" class="form-control form_sm" rows="4" aria-required="true"
                                    aria-invalid="false" placeholder="" required style="resize: none"></textarea>
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
    <div class="modal fade" id="video_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
                    <button type="button" class="btn theme_btn small_btn2" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>
        

<!-- new section -->
<div class="container-fluid mintban g-0">
    <div class="row m-0 mt-3 mintban_row g-0">
        {{-- <div class="col-md-12 mb-5">
            <div class="row "> --}}
                <div class="flowdiv">
                    <div class="row m-0" style="">
                        <div class="col-6 ankar p-0" data-aos="fade-right">

                            <div class="dataflow p-2 text-white d-flex justify-content-center align-items-center">
                                <div class="eltdf-eh-item-content eltdf-eh-custom-5500" style="padding:0 12% 0 12% ;">
                                    <div class="cta_service_info txt">
                                        <h4>Become a MCInstructor | Tutor</h4>
                                        <p> Teach what you love. Corrector gives you the tools to create a course
                                            Teach what you love. Corrector gives you the tools to create a course
                                        </p>
                                        <a href="{{ url('/instructors') }}" class="theme_btn small_btn">MC
                                            Instructor</a>

                                        <!--
                            <h1 class="mx-3 mt-5 pt-4">Ut enim ad minim veniam, quis nos trud exercita ion</h1>
                            <p class="mx-3 mt-2 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Doloremque, eveniet deleniti atque dicta ullam officia rerum. Non iure quos sint deserunt
                                sed officia sequi assumenda eos repellendus expedita? Quasi veritatis tenetur, fugiat quis
                                numquam maxime voluptate praesentium dolores amet nemo ipsum soluta unde quam suscipit.
                                Rerum nobis amet voluptatem eos.</p> -->
                                        <img src="{{ asset('public/assets/left-arrow-64.png') }}" height="50"
                                            class="lia" style="position:absolute;right: -12px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 ankar col-md-6 p-0" >
                                                                                                                                                 </div> -->
                        <div class=" col-6 ankar  p-0" data-aos="fade-left">
                            <div class="eltdf-eh-item eltdf-background-arrow-left changeborder"
                                style="background: white;">
                                <!-- <div class="eltdf-eh-item eltdf-background-arrow-left" style="/* visibility: hidden; */border-color: #ffffff;/* display: none; */background-color: #ffffff;background-image: url(https://academist.qodeinteractive.com/wp-content/uploads/2018/07/Form-background-img.jpg)" data-item-class="eltdf-eh-custom-5500" data-769-1024="15% 10% 6% 10%" data-681-768="10% 15% 5% 15%" data-680="0% 20px 0% 20px"> -->
                                <div class="eltdf-eh-item-inner d-flex align-items-center justify-content-center"
                                    style="">

                                    <div class="eltdf-eh-item-content eltdf-eh-custom-5500"
                                        style="padding: 0 12% 0 12% !important;">
                                        <div class="cta_service_info">
                                            <h4> Sell your Course with us</h4>
                                            <p> Teach what you love. Corrector gives you the tools to create a course
                                                Teach what you love. Corrector gives you the tools to create a course
                                            </p>
                                            <a href="{{ url('/teach-with-us') }}" class="theme_btn small_btn">Teach with
                                                us</a>
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
                    </div>
                </div>
            </div>
            {{--
        </div> --}}
        {{-- </div> --}}
</div>


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
<script src="path/to/swiper.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    function homeVideo() {
            $('#video_image').modal('show');
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
            // Copy all content within .for-left
            leftForLeft.innerHTML = prep_card.querySelector('.for-left').innerHTML;
            // Show the hidden content
            leftForLeft.style.display = 'block';
            leftForLeft.style.visibility = 'visible';
        }
    </script>

<script>
   

        $('.zakana').slick({
            lazyLoad: 'ondemand',
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            // dots: false,
            // prevArrow: false,
            // nextArrow: false
            arrows: true,

            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: true,
                        // centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        // centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        arrows: true,
                        // centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
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
</script>

@endsection