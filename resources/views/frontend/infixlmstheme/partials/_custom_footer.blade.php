@section('css')
    <style>
        /* body {
                                                                                                                                                                                overflow-x: visible !important;
                                                                                                                                                                            } */
        .containerdoosme {

            padding-top: 160px;
        }

        .footerbox1 h5 {
            font-weight: 700 !important;
            color: white !important;
            /* font-size: 18px !important; */
        }

        .footerbox1 p {
            line-height: 30px !important;
            color: white !important;
            cursor: pointer;
            font-size: 12.5px;
            /* font-weight: 600; */
            /* transition: 1s; */
        }

        .footerbox1 p:hover {
            line-height: 30px !important;
            color: var(--system_primery_color) !important;
            text-decoration: underline !important;
        }

        .footerbox1 p:focus {
            color: var(--system_primery_color) !important;
        }

        .footerbox1 span {
            font-size: 12.5px;
            /* font-weight: 700; */
        }

        .expore h4 {
            font-weight: 700;
            color: white !important;
            font-size: 18px;
        }

        .expore p {
            line-height: 30px !important;
            color: white !important;
            cursor: pointer !important;
            font-size: 12.5px;
            /* font-weight: 700; */
            /* transition: 1s; */
        }

        .expore p:hover {
            line-height: 30px !important;
            color: var(--system_primery_color) !important;
            text-decoration: underline !important;
        }

        .expore p:focus {
            color: var(--system_primery_color) !important;
        }

        .fs-responsive {
            font-size: 12.5px;
            /* font-weight: 700; */
        }

        .icons i {
            font-size: 22px !important;
            /* padding: 11px !important; */
            cursor: pointer;
        }

        .icons i:hover {
            color: var(--system_primery_color) !important;
            font-size: 22px !important;
            /* padding: 11px !important; */
        }

        .icons i:focus {
            color: var(--system_primery_color) !important;
        }

        .newsletter_btn {
            background: var(--system_primery_color) !important;
            font-family: Source Sans Pro, sans-serif !important;
            font-size: 16px !important;
            color: #fff !important;
            font-weight: 600 !important;
            padding: 9.5px 15px !important;
            border: 1px solid transparent !important;
            text-transform: capitalize !important;
            display: inline-block !important;
            line-height: 1 !important;
        }

        .newsletter_btn:hover {
            background-color: #db5800 !important;
        }

        .form-control:focus {
            box-shadow: none !important;
        }

        .container-sub {
            width: 100%;
            padding: 0 170px;
            margin-right: auto;
            margin-left: auto;
            position: relative;
            top: 144px;
        }

        .sub-section {
            margin-top: -143px;
            background: rgb(254, 105, 3) !important;
            background: linear-gradient(0deg, rgb(255, 118, 25) 0%, rgb(153, 102, 153) 75%) !important;
            transition: background .3s, border .3s, border-radius .3s, box-shadow .3s;
            padding: 20px;
            border-radius: 15px;
            position: relative;
            z-index: 1;
        }

        .custom_footer_text {
            color: #fff;
            /* font-size: 30px; */
            font-weight: 700;

        }

        .custom_footer_btn {
            /* margin: 24px 0 0; */
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            position: relative;
            gap: 5px;
        }

        .background-overlay {
            background-image: url('public/frontend/infixlmstheme/img/images/newsletter_bg.png');
            background-position: center center;
            background-size: cover;
            transition: background .3s, border-radius .3s, opacity .3s;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
        }

        .subscribe_newsleter {
            position: absolute;
            right: 7px;
            top: 50%;
            transform: translateY(-50%);
            padding: 14px 25px 9px;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            color: #fff;
            background-color: #996699;
            border-style: none;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0);
        }

        .footer-img {
            min-width: 300px;
            max-width: 300px;
            height: 240px;
        }

        .container-footer {
            position: relative;
            width: 100%;
            height: 55px;
            margin: 0;
        }

        .sub_email {
            padding: 15px 30px 15px 30px;
            border-radius: 36px;
            width: 100%;
            max-width: 100%;
            height: auto;
            border-width: 1px;
            border-style: solid;
            border-color: #eaeaea;
            background-color: #fafafa;
            -webkit-box-sizing: border-box;
            -webkit-transition: all .2s linear;
            transition: all .2s linear;
            font-size: 14px;
            line-height: 24px;
        }

        .footer-padd {
            padding: 1rem 80px !important;
            position: relative;
            gap: 5px;
        }

        @media only screen and (max-width: 375px) {
            .container-sub {
                padding: 0 25px !important;
                top: 175px !important;
            }

            .footer-img {
                min-width: 250px;
                max-width: 250px;
                height: 185px !important;
            }

            .custom_footer_text {
                font-size: 18px !important;
            }
        }

        @media only screen and (min-width: 378px) and (max-width: 640px) {
            .sub-section {
                margin-top: -200px;
            }

            .custom_footer_text {
                font-size: 18px !important;
                text-align: center;
            }

            .subscribe_newsleter {
                right: 3px;
                top: 42%;
                padding: 11px 10px 9px;
                font-size: 12px;
            }

            .container-sub {
                padding: 0 50px !important;
                top: 155px !important;
            }

            .footer-img {
                min-width: 220px;
                max-width: 220px;
                height: 170px !important;
            }

            .subscribe_newsleter {
                padding: 11px 11px 9px !important;
            }
        }

        @media only screen and (max-width: 767px) {


            .footer-img {
                min-width: 300px;
                max-width: 300px;
                height: 200px !important;
            }

            .custom_footer_btn {
                align-items: center;
            }

            .footer-padd {
                padding: 1rem 12px !important;
            }

            .custom_footer_text {
                font-size: 20px;
            }

            .sub_email {
                padding: 10px 10px 10px 10px;
                line-height: 22px;
            }

            .subscribe_newsleter {
                right: 3px;
                top: 40%;
                padding: 9px 13px 9px;
            }

            .container-sub {
                padding: 0 120px;
                top: 160px;
            }

            .sub-section {
                margin-top: -205px;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .footer-padd {
                padding: 1rem 45px !important;
            }

            .containerdoosme {
                padding-top: 120px !important;
            }

            .sub-section {
                margin-top: -115px;
            }

            .container-sub {
                top: 128px;
                padding: 0 105px;
            }

            .container-footer {
                height: 50px;
            }

            .footer-img {
                min-width: 300px;
                max-width: 300px;
                height: 200px;
            }

            /* .custom_footer_text {
                font-size: 18px;
            } */

            .subscribe_newsleter {
                padding: 14px 9px 9px;
                font-size: 12px;
            }

            .subscribe_newsleter i {
                font-size: 12px;
            }

            .sub_email {
                line-height: 20px;
            }
        }

        @media only screen and (min-width: 1025px) and (max-width: 1200px) {
            .footer-img {
                min-width: 270px;
                max-width: 270px;
                height: 240px;
            }

            .footer-padd {
                padding: 1rem 30px !important;
            }

            /* .custom_footer_text {
                font-size: 30px;
            } */
        }

        @media (width > 1650px) {
            .expore p {
                font-size: 18px !important;
                line-height: 35px !important;
            }

            .expore p:hover {
                font-size: 18px !important;
                line-height: 35px !important;
            }

            .footerbox1 p {
                font-size: 18px !important;
                line-height: 35px !important;
            }

            .footerbox1 p:hover {
                font-size: 18px !important;
                line-height: 35px !important;
            }

            .fs-responsive {
                font-size: 18px !important;
                line-height: 38px !important;
            }

            .icons i {
                font-size: 25px !important;
            }

            .icons i:hover {
                font-size: 25px !important;
            }

            .expore h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }


            .footerbox1 h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }

            .newsletter_btn {
                font-size: 26px !important;
            }

            .form-control_responsive {
                display: block;
                width: 100%;
                height: calc(2em + 0.75rem + 2px) !important;
                padding: 0.375rem 0.75rem;
                font-size: 1.4rem !important;
                font-weight: 400;
                line-height: 1.5;
            }
        }

        @media only screen and (min-width: 1200px) {
            /* .container-sub {
                                                                                            padding: 0 125px;
                                                                                        } */

            .custom_footer_text {
                /* font-size: 30px; */
            }
        }

        @media only screen and (min-width: 1281px) {

            .footer-img {
                min-width: 380px;
                max-width: 380px;
                height: 280px;
            }
        }

        @media only screen and (min-width: 1400px) {
            .container-sub {
                max-width: 1300px;
            }

            .container-sub {
                padding: 0px 70px;
                top: 160px;
            }

        }

        @media only screen and (min-width: 1850px) {
            .container-sub {
                max-width: 1650px;
            }

            .container-sub {
                top: 155px;
            }
        }

        @media only screen and (min-width: 2000px) {
            .container-sub {
                max-width: 1800px !important;
            }
        }
    </style>
@endsection
<!-- UP_ICON  -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="fa fa-angle-up font-weight-bold" aria-hidden="true" style="
    margin-top: 15px;
"></i>
    </a>
</div>
<div>
    <div class="container-sub">
        <section class="sub-section">
            <div class="background-overlay"></div>
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="footer-img">
                        <img src="{{ asset('/public/uploads/images/footerimg/iStock-1465263629.png') }}"
                            class="w-100 h-100">
                    </div>
                    {{-- <h6 style="    color: #fff;
                        margin-bottom: 20px;">#Newsletter
                </h6> --}}

                </div>
                <div class="col-md-7 custom_footer_btn " style="">
                    <h4 class="text-capitalize custom_footer_text" style=" ">
                        Don't Miss Out!<br>
                        Exclusive Offers & Latest Programs<br>
                        Join the Adult Learner's Community Today!</h4>
                    <div class="container-footer mb-2">
                        <form action="{{ route('subscribe') }}" class="form" method="POST">
                            @csrf
                            <input type="email" class="sub_email" name="email" style="">
                            <button type="submit" class="subscribe_newsleter" style=" "><i class="fas fa-envelope"
                                    style="color: #ffffff;"></i> SUBSCRIBE</button>
                        </form>
                       
                    </div>
                    <h6 style="color: #ffffff;">By Subscribing You agree to and with <a href="#"
                        style="color: #ffffff; font-weight:700;">Our Privacy Policy</a> & <a href="#"
                        style="color: #ffffff; font-weight:700;">Terms</a></h6>
                </div>
            </div>

        </section>
    </div>


    <footer class="footer py-4">


        <div class="containerdoosme container" style="
">
            <div class="row text-white">
                <div class="col-lg-3">
                    <div class="expore px-4 py-2 text-white">
                        <x-footer-section-one-widget />
                        {{-- <h5 class="font-weight-bold mb-3 mt-4 text-white">
                        Join our Community of Students
                    </h5> --}}
                        {{-- <div class="input-group mb-3">
                        <input type="text" class="bg-white form-control form-control_responsive"
                            placeholder="Enter Your Email" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary newsletter_btn" type="button">Subscribe</button>
                        </div>
                    </div> --}}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footerbox1 px-4 py-2">
                        <x-footer-section-two-widget />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerbox1 px-lg-0 px-4 py-2">
                        <h5>
                            Support | Services
                        </h5>
                        <p><a href="{{ route('customer-help') }}"
                                onclick="informationflag('Certificate Verification')" style="color:inherit;">
                                Certificate Verification</a></p>
                        <p><a href="#" style="color:inherit;">Campus Tour</a></p>
                        <p><a href="{{ route('customer-help') }}" onclick="informationflag('Help and Support')"
                                style="color:inherit;">Help &
                                Support</a></p>
                        <p><a href="{{ route('blogs') }}" style="color:inherit;">News | Events</a></p>



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="float-lg-right footerbox1 px-lg-5 px-3 py-2">
                        <h5>
                            Contact
                        </h5>

                        <span class="locaton fs-responsive " style="line-height:35px;">
                            <i class="fi fi-rs-marker"></i>501 S. Florida Avenue
                            Lakeland, FL 33801
                        </span><br>


                        <span class="call fs-responsive"style="line-height:35px;">
                            <i class="fi fi-br-phone-call"></i> 863-250-8764 | 347-525-1736</span><br>


                        <span class="time fs-responsive" style="line-height:35px;">
                            <i class="fi fi-rs-clock-three"></i> Mon – Thur: 8:30am – 7:00pm

                        </span>
                        <br>
                        <span class="time fs-responsive" style="line-height:35px;">
                            <i class="fi fi-rs-clock-three"></i>
                            Sat – Sun: 10:00am – 3:00pm

                        </span>

                        <h5 class="mb-3 mt-4">
                            Our Socials
                        </h5>
                        <span class="d-flex icons" style="gap: 25px;">
                            <i class="fa-brands fa-twitter"></i>
                            <a href="https://www.instagram.com/merakiinursing/" style="color:inherit;"><i
                                    class="fa-brands fa-instagram"></i>
                            </a>
                            {{-- <i class="fa-brands fa-linkedin"></i> --}}
                            <a href="https://www.facebook.com/merakiicollege" style="color:inherit;"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.tiktok.com/@merakiinursing" style="color:inherit;">
                                <i class="fa-brands fa-tiktok"></i></a>
                        </span>
                    </div>
                    {{-- <img src="{{ asset('public/assets/map.png') }}" class="img-fluid mt-3"> --}}
                </div>
            </div>
        </div>
</div>
</footer>
<div class="col-md-12" style="background: #996699;box-shadow: 0px -10px 20px -14px;">
    <div class="container d-lg-flex footercolor justify-content-between footer-padd">
        <div class="my-lg-0 my-2">
            <span style="" class="fs-responsive text-white">
                <a href="{{ route('customer-help') }}" onclick="informationflag('privacy policy')"
                    class="text-white">Privacy
                    Policy</a> |
                <a href="{{ route('customer-help') }}" onclick="informationflag('term of use')"
                    class="text-white">Terms</a>
                |
                <a href="{{ route('customer-help') }}" onclick="informationflag('cookies settings')"
                    class="text-white">Cookies
                    Policy</a> |
                <a href="{{ route('customer-help') }}" onclick="informationflag('faq')" class="text-white">FAQs</a>
            </span>
        </div>
        <div class="my-lg-0 my-2">
            <span style="" class="fs-responsive text-white">
                © 2023 Merakii College of Health
            </span>
        </div>
        <div class="my-lg-0 my-2">
            <span style="" class="fs-responsive text-white"> Call us 863-250-8764 | 347-525-1736
            </span>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#search').keyup(function(e) {
            // alert('working');
            if ($('#search').val() == '') {
                $('#search_listing').remove();
                return false;
            }
            var value = $(this).val();
            localStorage.setItem("is_program_search", 1);
            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                data: {
                    'name': value
                },
                dataType: "json",
                success: function(response) {
                    $('#courses_list').html(response);
                }
            });
        });
    });

    function selectedSearch(name,type='program') {

        if(type != null){
            switch (type) {
                case 'prep_course_live':
                    
                    name = name + '(Prep Course - Live)';
                    break;
                    case 'full_course':
                    name = name + '(Full Course)';
                    
                    break;
                    case 'program':
                    name = name + '(Program)';
                    
                    break;
            
                default:
                    break;
            }
        }
        if (localStorage.getItem('is_program_search') == 1) {

            $('#search_form').find('#search').val(name);
            $('#search_form').find('#search').focus();
            $('#search_listing').remove();
        }
        if (localStorage.getItem('is_program_page') == 1) {
            $('#program_title').val(name);
            $('#program_title').focus();
        }
    }

    function informationflag($text) {
        localStorage.setItem("information", $text);
    }
</script>
{{-- <div class="" style="background: black;">
    <div class="containerdoosme">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left text-white">
                <p style="font-weight: 300;" class="my-4 mx-5 text-white">
                    © 2018 Qode Interactive, All Rights Reserved
                </p>
            </div>
            <div class="col-md-6 icons my-4 text-center text-lg-right text-white">
                <span style="font-weight: 300;" class="my-4">
                    Call +44 300 303 026 Follow us
                </span>
               <span class="d-inline-flex gap_15 mr-lg-5 mx-2">
                 <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-google-plus-g"></i>
                <i class="fa-brands fa-linkedin"></i>
                </span>
            </div>
        </div>
    </div>
</div> --}}
