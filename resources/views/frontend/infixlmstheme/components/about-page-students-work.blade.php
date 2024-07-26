@if(count($testimonials) > 0)
<style>
    .card-container {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-image: url({{ asset('/public/uploads/images/footerimg/testimonial.jpg') }});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .about-pagination {
        position: absolute;
        bottom: 13%;
        left: 44%;
    }

    .slick-slider {
        width: 100%;
        max-width: 100%;
        transition: all 0.3s linear 0s;
    }

    .aboutus-img {
        max-width: 350px;
        min-width: 350px;
        height: 315px;

    }

    .aboutus-img img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .slide p {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .heading-color {
        color: var(--system_primery_color);
    }

    .h-text {
        font-size: 50px;
        font-weight: 700;
    }

    .about-pagination .slick-dots li {
        margin: 0 5px;
        display: flex;
        gap: 12px;
        width: 40px;
    }

    .about-pagination .slick-dots li button {
        width: 18px;
        height: 7px;
        background-color: #0C0B0B;
        border-radius: 50px 50px 50px 50px;
    }

    .about-pagination .slick-dots li.slick-active button {
        background-color: var(--system_primery_color);
        width: 35px;
    }

    .slick-dots {
        display: flex !important;
    }

    .slick-dots li button:before {
        content: "";
        height: auto;
        margin: auto;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        width: auto;
    }

    .slick-dotted.slick-slider {
        margin-bottom: 0px !important;
    }
    @media only screen and (max-width: 530px) {
        .about-pagination {
            left: 30% !important;
        }
        .student_container{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }

    @media only screen and (max-width: 767px) {
        .elem-content{
            text-align: center !important;
        }
        .about-pagination {
            bottom: 4% !important;
            left: 40%;
        }

        .aboutus-img {
            min-width: 300px;
            max-width: 300px;
            min-height: 270px;
            height: 270px;
        }
        .about_custom_paragraph{
            height: 150px;
            overflow: auto;
            scrollbar-width: none;
        }
        .slide p{
            align-items: baseline !important;
        }
    }
@media only screen and (min-width: 768px) and (max-width: 1200px){
    .about-pagination {
        bottom: 8% !important;
        left: 51% !important;
    }
}
    @media only screen and (min-width: 1350px) {
        .about-pagination {
            left: 42.5%;
        }
    }

    @media only screen and (min-width: 1600px) {
        .about-pagination {
            left: 39.7%;
        }
    }

    @media only screen and (min-width: 1700px) {
        .about-pagination {
            bottom: 18%;
            left: 38.7%;
        }
    }

    @media only screen and (min-width: 1800px) {
        .card-container {
            position: relative;
        }

        .about-pagination {
            bottom: 20%;
            left: 42%;
        }

        .aboutus-img {
            max-width: 450px !important;
            min-width: 450px !important;
            height: 425px;
        }
    }
</style>

<section class="sec-6 card-container my-3">

    <div class="container student_container pb-4 pb-lg-0 ">

        <div class="row justify-content-center align-items-center flex-column mx-md-5 mx-3 mt-md-5 my-3">
            <div class="text-center">
                <h2 class="custom_small_heading custom_heading_1 font-weight-bold">
                    Real Student Voices and Success Stories
                </h2>
                <p class="custom_paragraph font-weight-bold">

                    Hear from Our Thriving Students, and the Achievement of their Healthcare goals.
                </p>
                {{-- <p class="custom_paragraph">"Student Success Stories: Hear from Our Thriving Graduates!" </p> --}}
            </div>

            {{-- <div class="col-12 justify-content-center align-items-center flex-column">

                    <h5 class="text-capitalize heading-color text-center">learner tributes</h5>

                    <h1 class="text-capitalize text-center h-text mb-5">our students work</h1>

                </div> --}}

        </div>

        <div class="slick-slider" id="student-work-slider">
            @foreach ($testimonials as $item)
            <div class="slide">

                <div class="row px-lg-5 px-2 justify-content-center elem pb-md-5">

                    <div class="col-md-6 aboutus-img">

                        <img src="{{ asset($item->image) }}">

                    </div>

                    <div class="col-md-6 pl-lg-5 elem-content d-flex flex-column justify-content-center pb-3 pb-lg-0">

                        <p class="about_custom_paragraph my-md-5 my-3">{{ $item->body }}</p>

                        <h6 class="text-capitalize">{{ $item->author }} - {{ $item->profession }}</h6>

                    </div>

                </div>

            </div>
            @endforeach



            {{-- <div class="slide d-flex">

                <div class="row px-lg-5 px-2 justify-content-center elem">

                    <div class=" col-md-6 aboutus-img">

                        <img src="{{ asset('/public/uploads/images/footerimg/image2.jpg') }}">

                    </div>

                    <div class="col-md-6 pl-lg-5 elem-content d-flex flex-column justify-content-center pb-3 pb-lg-0">

                        <p class="my-5">First, we have our physical health. This means being fit physically and in the
                            absence of any kind of disease or illness. When you have good physical health, you will have
                            a longer life span. One may maintain their physical health by having a balanced diet. Do not
                            miss out on the essential nutrients; take each of them in appropriate quantities.</p>

                        <h6 class="text-capitalize">sherdin berley - Human Resource</h6>

                    </div>

                </div>



            </div> --}}

            {{-- <div class="slide d-flex">

                <div class="row px-lg-5 px-2 justify-content-center elem">

                    <div class="col-md-6 aboutus-img">

                        <img src="{{ asset('/public/uploads/images/footerimg/image3.jpg') }}">

                    </div>

                    <div class="col-md-6 pl-lg-5 elem-content d-flex flex-column justify-content-center pb-3 pb-lg-0">

                        <p class="my-5 ">Next, we talk about our mental health. Mental health refers to the
                            psychological and emotional well-being of a person. The mental health of a person impacts
                            their feelings and way of handling situations. We must maintain our mental health by being
                            positive and meditating.</p>

                        <h6 class="text-capitalize">sherdin berley - producer</h6>

                    </div>

                </div>

            </div> --}}

        </div>

        <div class="about-pagination"></div>

    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
    integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
    integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>



<script>
$(document).ready(function() {
    $('.slick-slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        appendDots: $('.about-pagination'),
        arrows: false,
        fade: true,
        cssEase: 'linear'
    });

    $('.elem').on('click', function(event) {
        event.stopPropagation();
    });
});


</script>
@endif