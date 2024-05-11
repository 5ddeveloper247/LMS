@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('common.About') }}
@endsection
{{-- @section('css') --}}
<!-- <link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" /> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
{{-- gsap animation --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    .custom_section_color {
        background-color: #eee !important;
    }

    /* .custom-padd{
    padding: 30px 0;
} */
    /* .swiper{
  position: relative;
  padding: 50px 50px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;

}
.swiper-wrapper{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0px 0px;

}
.swiper-slide {
  width: 100%;
  max-width: 500px;
}
.card-review {

            max-width:
            width: 100%;
            font-size: 24px;
            border: 1px solid #ccc !important;
            border-radius: 25px !important;
            overflow: hidden;
            margin: 10px;
        }

        .image {
            position: relative;
            overflow: hidden;
        }

        .image img {
            width: 77px;
            height: 77px;
        }

        .content {
            padding: 10px;
        }

        .heading {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

       */

    .breadcam_wrap {
        max-width: unset !important;
    }

    @media (width > 1650px) {
        .breadcrumb_area .breadcam_wrap h3 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }

        p {
            font-size: 20px !important;
        }

        h5 {
            font-size: 25px !important;
        }

        .responsive_card {
            height: 500px !important;
        }

        .about_gallery_area .about_gallery {
            display: grid !important;
            grid-template-columns: 440px 440px !important;
            grid-gap: 30px !important;
            align-items: center !important;
        }
    }

    @media only screen and (min-width: 2000px) {
        .about_gallery_area .about_gallery {
            grid-template-columns: 520px 520px !important;
        }
    }

    /* Student Work component styles */
</style>
{{-- @endsection --}}
@section('js')
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
                    autoplay: false,
                    // autoplayTimeout: 4000,
                    // navigation : true,

                    margin: 30,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    nav: true,
                    dots: false,
                    items: 3,
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
    {{-- animation for counter-section --}}
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const counterSections = document.querySelectorAll('.counter_area');

            counterSections.forEach((section) => {
                const counterItems = section.querySelectorAll('.single_counter');
                counterItems.forEach((item, index) => {
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
{{-- animation for instructor section --}}
<script>
    function handleScroll() {
        gsap.registerPlugin(ScrollTrigger);
        const instructorSections = document.querySelectorAll('.service_cta_row');

        instructorSections.forEach((section) => {
            const instructorItems = section.querySelectorAll('.single_cta_service');
            instructorItems.forEach((item, index) => {
                let animationProps = {
                    opacity: 0,
                    duration: 1,
                    delay: index * 0.4,
                };

                if (index === 0) {
                    animationProps.x = -200;
                } else if (index === instructorItems.length - 1) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

@section('mainContent')
    <x-breadcrumb :banner="$frontendContent->about_page_banner" :title="$frontendContent->about_page_title" :subTitle="$frontendContent->about_page_title" />
    @include('frontend.infixlmstheme.pages.stepper')
    {{-- <x-about-page-who-we-are :whoWeAre="$about->who_we_are" :bannerTitle="$about->banner_title" /> --}}

    <x-about-page-gallery :about="$about" />

    <x-about-page-counter :about="$about" />

    {{-- @if ($about->show_testimonial)
        <x-about-page-testimonial :frontendContent="$frontendContent" />
    @endif --}}

    <x-about-page-students-work />

    {{-- reviews are added here --}}
    {{-- @include('frontend.infixlmstheme.pages.reviews') --}}


    @if ($about->show_brand)
        <x-about-page-brand />
    @endif
    @if ($about->show_become_instructor)
        <x-about-page-become-instructor :frontendContent="$frontendContent" />
    @endif
    @include(theme('partials._custom_footer'))
@endsection
