@section('css')
    <style>                                                                                                                                                               overflow-x: visible !important;
                                                                                                                                                                            } */
       
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
{{-- <div> --}}
    <div class="container-sub">
        <section class="sub-section">
            <div class="background-overlay"></div>
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-5 d-flex justify-content-center">
                    <div class="footer-img">
                        <img src="{{ asset('/public/uploads/images/footerimg/iStock-1465263629.png') }}"
                            class="w-100 h-100">
                    </div>
                    {{-- <h6 style="    color: #fff;
                        margin-bottom: 20px;">#Newsletter
                </h6> --}}

                </div>
                <div class="col-sm-7 custom_footer_btn " style="">
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
                    <h6 class="custom_footer_text" style="color: #ffffff;">By Subscribing You agree to and with <a href="#"
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
                <div class="col-lg-3 col-sm-6">
                    <div class="expore px-4 py-lg-2 py-sm-4 py-2 text-white">
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
                <div class="col-lg-3 col-sm-6">
                    <div class="footerbox1 px-4 py-lg-2 py-sm-4 py-2">
                        <x-footer-section-two-widget />
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footerbox1 px-lg-0 px-4 py-lg-2 py-sm-4 py-2">
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
                <div class="col-lg-4 col-sm-6">
                    <div class="float-lg-right footerbox1 px-lg-5 px-4 py-lg-2 py-sm-4 py-2">
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
                        @php
                         $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status',1)->orderBy('order','desc')->get();   
                        @endphp
                        @if(count($social_icons)>0)
                        <h5 class="mb-3 mt-4">
                            Our Socials
                        </h5>
                        <span class="d-flex icons" style="gap: 25px;">
                            @foreach ($social_icons as $link)
                            <a href="{{$link->link}}" style="color:inherit;"><i
                                class="{{$link->icon}}"></i>
                            </a>
                            @endforeach
                            {{-- <i class="fa-brands fa-linkedin"></i> --}}
                            {{-- <a href="https://www.facebook.com/merakiicollege" style="color:inherit;"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.tiktok.com/@merakiinursing" style="color:inherit;">
                                <i class="fa-brands fa-tiktok"></i></a> --}}
                        </span>
                        @endif
                    </div>
                    {{-- <img src="{{ asset('public/assets/map.png') }}" class="img-fluid mt-3"> --}}
                </div>
            </div>
        </div>
</div>
</footer>
<div class="col-md-12" style="background: #996699;box-shadow: 0px -10px 20px -14px;">
    <div class="container d-md-flex footercolor justify-content-between footer-padd">
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
                {{-- © 2023 Merakii College of Health --}}
                {{ function_exists('footerSettings') ? strip_tags(footerSettings('footer_copy_right')) : ''}}
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
