@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Contact') }}
@endsection
{{-- @section('css') --}}
{{-- @endsection --}}

@section('mainContent')
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Lms</title>
    </head>
    <style>
        .banner-img {
            height: calc(100vh - 100px);
            width: 100%;
        }

        .mainbanner {

            background-image: url("{{ asset('public/assets/contact.jpg') }}");
            background-size: cover;
        }

        .select2-container {
            width: 100% !important;
        }

        .custom_banner_height {
            height: 550px;
        }

        .boxbanner h1 {
            font-size: 70px;
            font-weight: bold;
            color: white;
        }

        .data h2 {
            /* font-size: 42px; */
            font-family: Poppins, sans-serif;
            color: #252525;
            font-weight: 700;
        }

        .data p {
            /* font-size: 20px; */
            font-weight: 400;
        }

        .separator {
            border-bottom: 4px solid var(--system_primery_color);
            max-width: 50px;
            margin-top: 15px;
        }

        .iconsdo i {
            color: var(--system_primery_color);
            font-size: 17px;
            padding-right: 5px;
            line-height: -16px;
            cursor: pointer;
        }

        .ankar a {
            text-decoration: none;
            color: #252525;
            line-height: 36px;
        }

        .custombtn {
            padding: 15px 50px;
            background-color: #ff7600;
            color: white;
            border: none;
            font-weight: bold;
        }

        .custombtn:hover {
            padding: 15px 50px;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            font-weight: bold;
        }

        .footerbox h4 {
            font-weight: 700;
            color: white;
            font-size: 35px;
        }

        .footerbox h5 {
            font-weight: 400;
        }

        .footerbox p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white;
            cursor: pointer !important;

        }

        .footerbox p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: var(--system_primery_color);
        }

        .fonts {
            font-size: 17px;
            font-weight: 400;
            text-align: justify;
            margin-top: 3px;
        }

        .footercolor {
            /* background: #252525; */
        }

        .mintban {
            background-image: url("{{ asset('public/assets/bgpicture.jpg') }}");
            height: auto;
            background-size: cover;
        }

        .flowdiv {
            max-width: 90%;
            padding: 6rem 5rem;
            margin: auto;
            height: 100%;
            display: flex;
            align-items: center;
        }

        element.style {
            border-color: #ffffff;
            background-color: #ffffff;
            background-image: url(https://academist.qodeinteractive.com/wp-content/uploads/2018/07/Form-background-img.jpg);
        }


        user agent stylesheet .formdokana input[type="text" i] {
            padding: 1px 2px;
        }

        .formdokana .wpcf7-form-control-wrap {
            position: relative;
        }

        a,
        abbr,
        acronym,
        address,
        applet,
        b,
        big,
        blockquote,
        body,
        caption,
        center,
        cite,
        code,
        dd,
        del,
        dfn,
        div,
        dl,
        dt,
        em,
        fieldset,
        font,
        form,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        html,
        i,
        iframe,
        ins,
        kbd,
        label,
        legend,
        li,
        object,
        ol,
        p,
        pre,
        q,
        s,
        samp,
        small,
        span,
        strike,
        strong,
        sub,
        sup,
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr,
        tt,
        u,
        ul,
        var {
            background: 0 0;
            border: 0;
            margin: 0;
            outline: 0;
            padding: 0;
            vertical-align: baseline;
        }

        .btn-submit {
            padding: 14px 31px;
            background: var(--system_primery_color);
            border: 0;
            color: white;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .btn-submit:hover {
            padding: 14px 31px;
            background: rgb(0, 0, 0);
            border: 0;
            color: white;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .formdokana .changeborder .wpcf7-form-control.wpcf7-text,
        .wpcf7-form-control.wpcf7-textarea,
        input[data-name=your-email],
        input[type=password],
        input.form-control-text {
            background-color: transparent;
            /* border: 1px solid #e1e1e1; */
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .formdokana .change .wpcf7-form-control.wpcf7-text,
        .wpcf7-form-control.wpcf7-textarea,
        input[data-name=your-email],
        input[type=password],
        input.form-control-text {
            background-color: transparent;
            /* border: 1px solid #e1e1e1; */
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
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

        .formdokana input.form-control-text {
            background-color: transparent;
            border: 1px solid #e1e1e1;
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .formdokana input.form-control-text {
            background-color: transparent;
            /* border: 1px solid #e1e1e1; */
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            /* padding: 12px 16px; */
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .selectProgram {
            margin: 0 0 1rem;
        }

        .breadcam_wrap {
            max-width: unset !important;
        }

        .select2-container .select2-selection--single {
            height: 38px !important;
            border: 1px solid #e1e1e1 !important;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444 !important;
            line-height: 35px !important;
        }

        .section-margin-y {
            margin: 60px auto !important;
        }

        .dataflow {
            height: 100%;
            background-color: #0079a8;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            padding: 2rem 3rem;
        }

        .dataflow-p::-webkit-scrollbar {
            width: 0;
        }

        .dataflow-p {
            scrollbar-width: none;
        }

        .dataflow h2 {
            font-family: Poppins, sans-serif;
            color: #fff !important;
            font-weight: bold;
        }

        .eltdf-eh-item {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        .lia {
            top: 50%;
            transform: translateY(-50%);
        }
        .custom-padding {
            padding: 30px 0;
        }
        @media only screen and (max-width: 768px) {
            .dataflow h2, .wpb_wrapper_h, .data h2{
                font-size: 18px !important;
            }
            .flowdiv {
                height: 340px;
                padding: 0px;
                width: 85%;
                margin: auto;
            }

            .dataflow {
                max-height: 340px;
                padding: 2rem 0.5rem;
            }
            .dataflow-p {
                line-height: normal;
                overflow: auto;
            }

            .dataflow img {
                display: none;
            }

            .mintban {
                background-image: url("{{ asset('public/assets/bgpicture.jpg') }}");
                height: auto;
                background-size: cover;
                padding: 4rem 0rem;
                margin-bottom: 4rem;
            }
            .banner-img {
                height: 60vh !important;
            }
        }

        @media only screen and (min-width:769px) and (max-width: 1024px) {

            .dataflow {
                max-height: 300px !important;
                padding: 1rem 1rem;
            }

            .dataflow-p {
                overflow: auto;
            }

            .dataflow h2 {
                font-size: 25px;
            }
            .dataflow h2, .wpb_wrapper_h, .data h2{
                font-size: 1.6rem !important;
            }
        }

        @media only screen and (min-width: 1025px) and (max-width:1279px) {
            .dataflow h2, .wpb_wrapper_h, .data h2{
                font-size: 1.6rem !important;
            }
            .dataflow {
                max-height: 300px !important;
            }

            .dataflow-p {
                overflow: auto;
            }
        }

        @media only screen and (min-width: 1650px) {
            .dataflow {
                height: 500px !important;
            }

            .formdokana input[type=text] {
                background-color: transparent;
                /* border: 1px solid #e1e1e1; */
                border-radius: 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                color: #252525;
                font-family: inherit;
                font-size: 15px;
                font-weight: inherit;
                line-height: calc(50px - (12px * 2) - 2px);
                margin: 0 0 40px;
                outline: 0;
                /* padding: 12px 16px; */
                position: relative;
                width: 100%;
                -webkit-appearance: none;
                -webkit-transition: border-color .2s ease-in-out;
                -o-transition: border-color .2s ease-in-out;
                transition: border-color .2s ease-in-out;
            }

            .selectProgram {
                margin: 0 0 40px;
            }

            .custom-padding {
                padding: 80px !important;
            }
        }



        /* @media only screen and (min-width: 1281px){
                                            .dataflow {height: 335px !important;}
                                        } */




        /* meadi queries for 67% */
        /* @media (width > 1650px) {
                                                                            .breadcrumb_area .breadcam_wrap h3 {
                                                                                font-size: 100px !important;
                                                                                font-weight: 900;
                                                                                line-height: 76px;
                                                                                color: #fff;
                                                                            }

                                                                            h5 {
                                                                                font-size: 27px !important;
                                                                                line-height: 25px;
                                                                            }

                                                                            h4 {
                                                                                font-size: 32px !important;
                                                                                line-height: 25px;
                                                                            }

                                                                            .select2-container .select2-selection--single {
                                                                                height: 67px !important;
                                                                                border: 1px solid #e1e1e1 !important;

                                                                            }

                                                                            .select2-container--default .select2-selection--single .select2-selection__rendered {
                                                                                color: #444;
                                                                                line-height: 61px !important;
                                                                            }

                                                                            .select2-container--default .select2-selection--single .select2-selection__arrow {
                                                                                height: 35px !important;

                                                                            }

                                                                            .select2 .select2-container .select2-container--default {
                                                                                width: 100% !important;
                                                                            }

                                                                            .form-control {
                                                                                display: block;
                                                                                width: 100%;
                                                                                height: calc(2.5em + 0.75rem + 2px) !important;
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

                                                                            .ankar a {
                                                                                font-size: 21px !important;
                                                                                line-height:  !important 36px;
                                                                            }

                                                                            input,
                                                                            input::placeholder {
                                                                                font: 1.25rem/3 sans-serif;
                                                                            }

                                                                            .eltdf-eh-item-inner {
                                                                                height: 550px !important;
                                                                            }

                                                                            .dataflow {
                                                                                height: 550px !important;
                                                                            }

                                                                            .theme_btn {
                                                                                font-size: 23px !important;
                                                                            }
                                                                        } */

        @media only screen and (min-width: 1800px) {

            /* .banner-img {
                    min-height: 815px;
                    max-height: 815px;
                } */
            .formdokana input.form-control-text {
                font-size: 20px;
            }

            .formdokana .change .wpcf7-form-control.wpcf7-text,
            .wpcf7-form-control.wpcf7-textarea,
            input[data-name=your-email],
            input[type=password],
            input.form-control-text {

                font-size: 20px;
            }

            .flowdiv {
                max-width: 100% !important;
                padding: 8rem 9rem !important;
            }

            .small_btn2 {
                margin-top: 20px !important;
            }
        }
    </style>
    {{-- <div class="mainbanner custom_banner_height">
        <div class="boxbanner containerdoosme py-5 p-5">
            <h1 class="pt-5 text-white mt-5">Contact Us</h1>
        </div>
    </div> --}}

    <!-- <div class="row"> -->
    <!-- <div class="col-md-12"> -->
    <section class="d-flex">
        <div class="banner-img">
            <img src="{{ asset('/public/uploads/images/footerimg/WE ARE HERE TO LISTEN (3).png') }}" class="h-100 w-100">
            <div>
    </section>
    {{-- <div class="breadcrumb_area position-relative">
        <div class="w-100 h-100 position-absolute bottom-0 left-0">
            <img alt="Banner Image" class="w-100 h-100 img-cover" src="{{ asset('public/assets/contact.jpg') }}">
        </div>
        <div class="col-lg-9 offset-1">
            <div class="breadcam_wrap">
                <h3 class="text-white custom-heading">Contact Us</h3>
            </div>
        </div>
    </div> --}}
    <!-- </div> -->

    <!-- </div> -->


    <div class="container-fluid doosme p-0">
        <div class="row">
            {{-- <div class="col-md-12"> --}}
            {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
            {{-- <div class="row px-4"> --}}
            <div class="col-sm-12 col-md-12">
                <div class="map m-1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5753.884181787861!2d-81.95946927069843!3d28.0388028608652!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88dd38ca4722ecc9%3A0x10d88b4491e12478!2s501%20Florida%20Ave%20S%2C%20Lakeland%2C%20FL%2033801%2C%20USA!5e0!3m2!1sen!2s!4v1705573853815!5m2!1sen!2s"
                        width="100%" style="border: 0; height:83vh" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-md-4">
                              <div class="map m-1">
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14944372.906747056!2d34.40694603561576!3d23.87086960764348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1675226140271!5m2!1sen!2s"
                                  width="100%"
                                  height="450"
                                  style="border: 0;"
                                  allowfullscreen=""
                                  loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                              <div class="map m-1">
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14944372.906747056!2d34.40694603561576!3d23.87086960764348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1675226140271!5m2!1sen!2s"
                                  width="100%"
                                  height="450"
                                  style="border: 0;"
                                  allowfullscreen=""
                                  loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                              </div>
                            </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>

    <div class="container custom-padding px-lg-5 px-2" id="contact-form-ankar">
        <div class="row px-xl-5 px-2">
            {{-- <div class="col-md-12 mx-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row  px-5"> --}}
            <div class="ankar col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="data px-1">
                    <h2>
                        Get In Touch
                    </h2>
                    {{-- <div class="separator my-3"></div> --}}
                    <p class="pb-4 pt-3">
                        MCOH is an inclusive and equitable enviroment that provides educational
                        oppturities for anyone seeking update their skill being a new career path and
                        enhance professional Skills
                    </p>

                    <a class="iconsdo">
                        <i class="fi fi-rs-marker"></i>
                        <span class="locaton"> 501 S. Florida Avenue
                            Lakeland, FL 33801</span>
                    </a><br />

                    <a class="iconsdo">
                        <i class="fi fi-br-phone-call"></i>
                        <span class="locaton"> 863-250-8764 | 347-525-1736</span>
                    </a><br />

                    <a class="iconsdo">
                        <i class="fi fi-rs-clock-three"></i>
                        <span class="locaton"> Mon - Thur: 8:30 AM - 7:00 PM</span>
                    </a>
                    <br />

                    {{-- <a class="iconsdo">
                                     <i class="fi fi-br-phone-call"></i>
                                     <span class="call"> 863-250-8764/347-525-1736</span>
                                    </a>
                                    <br />

                                    <a class="iconsdo">
                                     <i class="fi fi-rs-clock-three"></i>
                                     <span class="time"> Mondey To Friday: 8:30Am To 7Pm</span>
                                    </a> --}}
                    <br />


                </div>

            </div>

            <div class="col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                <form method="POST" action="{{ route('contactMsgSubmit') }}">
                    @csrf
                    <div class="row formdokana px-2">
                        <div class="col-sm-6 col-md-6 col-12">
                            <input type="text" name="name" placeholder="Your Name"
                                class="form-control name form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <input type="text" name="email" placeholder="Email Address"
                                class="form-control email form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">
                            <input type="text" name="phone" placeholder="Phone#"
                                class="form-control phone form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <input type="text" name="zip" placeholder="Zip Code"
                                class="form-control zip form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12 selectProgram">
                            <select name="program" id="program" class="form-control" required>
                                <option value="" selected> Select Program</option>
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
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <select id="years" name="year" class="form-control w-100 mb-2" required>
                                <option value="" selected>Select Year</option>
                                @php
                                    $years = range(date('Y'), 1950);
                                @endphp
                                @forelse ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @empty
                                    <option value="">No Year Found</option>
                                @endforelse

                            </select>
                        </div>

                        <div class="col-md-12 col-12 mt-1">

                            <!-- <textarea class="form-control" placeholder="Message" style="height:200px;">

                                            </textarea> -->
                            <textarea name="message" class="wpcf7-form-control wpcf7-textarea form-control wpcf7-validates-as-required"
                                aria-required="true" aria-invalid="false" placeholder="Message" style="height:100px;" required></textarea>

                            <button type="submit" class="small_btn2 theme_btn mt-2">Send</button>
                        </div>

                    </div>
                </form>
            </div>

            {{-- </div> --}}

            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    {{-- </div> --}}
    {{-- apply now Section  --}}
    <div class="contain mintban mb-5">
        <div class="row">
            {{-- <div class="col-md-12 mb-5">
                <div class="row "> --}}
            <div class="col-md-12 flowdiv">
                <div class="row m-0" style="">
                    <div class="col-6 p-0 " data-aos="fade-right">
                        <div class="dataflow text-white">
                            <h2 class="mx-2 mx-md-3 pt-2">Ut enim ad minim veniam, quis nos trud exercita ion</h2>
                            <p class="mx-2 my-2 text-white dataflow-p">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit.
                                Doloremque, eveniet deleniti atque dicta ullam officia rerum. Non iure quos sint deserunt
                                sed officia sequi assumenda eos repellendus expedita? Quasi veritatis tenetur, fugiat quis
                                numquam maxime voluptate praesentium dolores amet nemo ipsum soluta unde quam suscipit.
                                Rerum nobis amet voluptatem eos.</p>
                            <img src="{{ asset('public/assets/left-arrow-64.png') }}" height="50" class="lia"
                                style="position:absolute;right: -12px;">
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 ankar col-md-6 p-0" >
                                                                                                                                                                                     </div> -->
                    <div class="col-6 ankar p-0" data-aos="fade-left">
                        <div class="eltdf-eh-item eltdf-background-arrow-left changeborder p-2 p-sm-4"
                            style="background: white;">
                            <!-- <div class="eltdf-eh-item eltdf-background-arrow-left" style="/* visibility: hidden; */border-color: #ffffff;/* display: none; */background-color: #ffffff;background-image: url(https://academist.qodeinteractive.com/wp-content/uploads/2018/07/Form-background-img.jpg)" data-item-class="eltdf-eh-custom-5500" data-769-1024="15% 10% 6% 10%" data-681-768="10% 15% 5% 15%" data-680="0% 20px 0% 20px"> -->
                            <div class="eltdf-eh-item-inner pt-2 mx-2">
                                <div class="eltdf-eh-item-content eltdf-eh-custom-5500 mx-sm-2 mx-md-3" style="">
                                    <div class="wpb_text_column wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <h2 class="wpb_wrapper_h"style="font-weight: bold;">Apply Now</h2>
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
                                                <span class="wpcf7-form-control-wrap " data-name="your-email"><input
                                                        type="email" name="email" value="{{ old('email') }}"
                                                        size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email w-100"
                                                        required placeholder="Email"></span><br>
                                                <span class="wpcf7-form-control-wrap w-100" data-name="your-tel"><input
                                                        type="password" name="password" value="{{ old('password') }}"
                                                        size="40"
                                                        class="w-100 wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel w-100"
                                                        required placeholder="Password"></span><br>
                                                {{-- <input type="submit" value="Get it now"
                                                    class="has-spinner small_btn theme_btn wpcf7-form-control wpcf7-submit mt-4"><span
                                                    class="wpcf7-spinner"></span> --}}
                                                <button type="submit" class="theme_btn small_btn5 text-center p-2">
                                                    {{ __('common.Login') }}</button>
                                            </div>
                                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        {{-- </div> --}}
    </div>
    {{-- footer Section  --}}
    @include(theme('partials._custom_footer'))
@endsection
@section('js')
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
        $(document).ready(function() {
            $('#years').select2();
            $('#program').select2();

        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme') }}/js/map.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/contact.js') }}"></script>
@endsection
