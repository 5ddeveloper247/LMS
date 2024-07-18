@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Programs') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<style>
    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .custom_span_color {
        color: #ff7600;
    }

    .title_des {
        font-size: 22px;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        min-height: 78px;
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

    .bs-canvas-overlay {
        opacity: 0.85;
        z-index: 1000;
    }

    .bs-canvas {
        top: 0;
        z-index: 1000;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 140px 30px 40px 40px;
        width: 330px;
        transition: margin .4s ease-out;
        -webkit-transition: margin .4s ease-out;
        -moz-transition: margin .4s ease-out;
        -ms-transition: margin .4s ease-out;
    }

    .thumb_heading {
        white-space: nowrap;
        width: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media (max-width: 1600px) {
        .bs-canvas {
            top: 0;
            z-index: 1000;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 105px 30px 40px 40px;
            width: 330px;
            transition: margin .4s ease-out;
            -webkit-transition: margin .4s ease-out;
            -moz-transition: margin .4s ease-out;
            -ms-transition: margin .4s ease-out;
        }
    }

    .bs-canvas-left {
        left: 0;
        margin-left: -330px;
    }

    .bs-canvas-right {
        right: 0;
        margin-right: -330px;
    }

    .accent-color {
        accent-color: #ff7600 !important;
    }

    .banner_img {
        object-fit: fill;
    }

    #filter_btn {
        color: #ff7600 !important;
    }

    @media only screen and (max-width: 358px) {

        .course-small {
            font-size: 12px !important;
        }

        .filter_btn {
            font-size: 12px !important;
        }

    }

    @media only screen and (min-width: 359px)and (max-width: 769px) {

        h2,
        h3 {
            font-size: 17px !important;
        }

        .filter_btn {
            font-size: 14px !important;
        }

        .course-small {
            font-size: 13px !important;
        }
    }

    @media only screen and (min-width: 1800px) {


        .course-small {
            display: flex !important;
            justify-content: space-between;
        }
    }

    .img-cover {
        min-height: auto !important;
    }
</style>

@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">

                <x-breadcrumb :title="'Nursing School'" />
            </div>
        </div>
        <div class="container custom-padd px-lg-5 pt-md-5 pt-4">
            <div class="row px-4">
                <div class="col-12 mb-md-5 mb-4">

                    <h2 class="custom_small_heading font-weight-bold custom_heading_1 text-center">Something Awesome is n the Way...</h2>

                </div>
            </div>
        </div>
    </div>





    @include(theme('partials._custom_footer'))
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pull-bs-canvas-left', function() {
                $('body').prepend(
                    '<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                console.log(this);
                if ($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });

            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function() {
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $(
                    '.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });

            $('#program_title').keyup(function(event) {
                var value = $(this).val();
                localStorage.setItem("is_program_page", 1);



                $.ajax({
                    type: "GET",
                    url: "{{ route('search') }}",
                    data: {
                        'name': value
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#program_list').html(response);
                    }
                });
            });



            $('#program_price_max,#program_price_min,#program_duration_min,#program_duration_max').on('change',
                function(event) {
                    event.preventDefault();
                    if (parseInt($('#program_price_min').val()) > parseInt($('#program_price_max').val())) {
                        toastr.error("Min price must be less then max price", "Error");
                        return false;
                    }

                });

        });
        a = 1;

        function togglefn() {
            if (a == 1) {

                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "auto";
                a = 2;
            } else {
                a = 1;
                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "80px";
            }
        }
    </script>
    <script>
        $('.custom_slick_slider_02').slick({
            // dots: true,
            lazyLoad: 'ondemand',
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
