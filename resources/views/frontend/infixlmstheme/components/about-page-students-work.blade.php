<style>
    .card-container {
        position: relative;
        /* padding: 30px 0; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* height: 80vh; */
        /* background-color: #FAE6FA; */
        background-image: url({{ asset('/public/uploads/images/footerimg/testimonial.jpg') }});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .about-pagination {
        position: absolute;
        bottom: 13%;
        left: 43.5%;
        transform: translateX(-50%);
    }

    .slick-slider {
        width: 100%;
        max-width: 100%;
        /* transition-duration: 0ms; */
        transition: all 0.3s linear 0s;
    }

    .aboutus-img {
        max-width: 350px !important;
        min-width: 350px !important;
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
@media only screen and (max-width: 767px){
    .about-pagination {
        bottom: 3% !important;
        left: 10% !important;
    }
}
    @media only screen and (max-width:1200px) {
        .about-pagination {
        bottom: 13%;
        left: 48%;
    }
    
    }

    @media only screen and (min-width: 1350px) {
        .about-pagination {
            left: 41.5%;
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
            /* height: 80vh; */
        }

        .about-pagination {
            bottom: 20%;
            left: 40%;
        }

        .aboutus-img {
            max-width: 450px !important;
            min-width: 450px !important;
            height: 425px;
        }
    }
</style>

<section class="my-3">

    <div class="card-container pb-4 pb-md-0">

        <div class="row justify-content-center align-items-center flex-column mx-5 mt-5 mb-3">
            <div class="text-center">
                <h2 class="custom_heading_1 font-weight-bold">
                    Real Student Voices and Success Stories
                </h2>
                <p class="custom_paragraph font-weight-bold">

                    Hear from Our Thriving Graduates, and the Achievement of their Healthcare goals.
                </p>
                {{-- <p class="custom_paragraph">"Student Success Stories: Hear from Our Thriving Graduates!" </p> --}}
            </div>

            {{-- <div class="col-12 justify-content-center align-items-center flex-column">

                    <h5 class="text-capitalize heading-color text-center">learner tributes</h5>

                    <h1 class="text-capitalize text-center h-text mb-5">our students work</h1>

                </div> --}}

        </div>

        <div class="slick-slider" id="student-work-slider">

            <div class="slide">

                <div class="row px-md-5 px-2 justify-content-center elem pb-5">

                    <div class="col-md-6 aboutus-img">

                        <img src="{{ asset('/public/uploads/images/footerimg/image1.jpg') }}">

                    </div>

                    <div class="col-md-6 pl-5 elem-content d-flex flex-column justify-content-center pb-3 pb-md-0">

                        <p class="custom_paragraph my-5">This is the first paragraph on the right side of the circle.his
                            is the

                            first paragraph on the right side of the circle.This is the first paragraph on the

                            right side of the circle.his is the

                            first paragraph on the right side of the circle.</p>

                        <h6 class="text-capitalize">sherdin berley - manager</h6>

                    </div>

                </div>

            </div>



            <div class="slide">

                <div class="row px-md-5 px-2 justify-content-center elem">

                    <div class=" col-md-6 aboutus-img">

                        <img src="{{ asset('/public/uploads/images/footerimg/image2.jpg') }}">

                    </div>

                    <div class="col-md-6 pl-5 elem-content d-flex flex-column justify-content-center pb-3 pb-md-0">

                        <p class="my-5">First, we have our physical health. This means being fit physically and in the
                            absence of any kind of disease or illness. When you have good physical health, you will have
                            a longer life span. One may maintain their physical health by having a balanced diet. Do not
                            miss out on the essential nutrients; take each of them in appropriate quantities.</p>

                        <h6 class="text-capitalize">sherdin berley - Human Resource</h6>

                    </div>

                </div>



            </div>

            <div class="slide">

                <div class="row px-md-5 px-2 justify-content-center elem">

                    <div class="col-md-6 aboutus-img">

                        <img src="{{ asset('/public/uploads/images/footerimg/image3.jpg') }}">

                    </div>

                    <div class="col-md-6 pl-5 elem-content d-flex flex-column justify-content-center pb-3 pb-lg-0">

                        <p class="my-5 ">Next, we talk about our mental health. Mental health refers to the
                            psychological and emotional well-being of a person. The mental health of a person impacts
                            their feelings and way of handling situations. We must maintain our mental health by being
                            positive and meditating.</p>

                        <h6 class="text-capitalize">sherdin berley - producer</h6>

                    </div>

                </div>

            </div>

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
    document.querySelectorAll(".slide").forEach(function(slide) {
        var elems = slide.querySelectorAll(".elem");
        elems.forEach(function(elem) {
            var contents = elem.querySelectorAll(".elem-content");
            var index = 0;
            var animating = false;
            elem.addEventListener("click", function() {
                if (!animating) {
                    animating = true;
                    gsap.to(contents[index], {
                        top: "-=100%",
                        duration: 1,
                        ease: Expo.easeInOut,
                        onComplete: function() {
                            gsap.set(this._targets, {
                                top: "100%"
                            });
                            animating = false;
                        }
                    });
                    index === contents.length - 1 ? (index = 0) : index++;
                    gsap.to(contents[index], {
                        top: "-=100%",
                        duration: 1,
                        ease: Expo.easeInOut
                    });
                }
            });
        });
    });
</script>

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
    });
</script>
