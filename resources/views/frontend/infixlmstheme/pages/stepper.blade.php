<style>
    .slider p {
        text-align: justify;
        flex-direction: row-reverse;
    }

    .slider {
        flex: 1;
        box-sizing: border-box;
        position: relative;
        padding-left: 20px;
    }

    .slider img {
        max-width: 100%;
        height: auto;
    }

    .stepper_row {
        display: flex;
        flex: 1;
        width: 100%;
    }

    .stepper_row .slider {
        flex-wrap: wrap;
        flex: 1;
    }

    .slider:not(:last-child) {
        border-right: 2px solid #ccc;
    }

    .image {
        height: 385px;
        width: 100%;
    }

    .slider h2 {
        position: relative;
    }

    .slider h2::before {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translate(10px, -50%);
        width: 60px;
        height: 2px;
        background-color: #ccc;
    }

    .stepper_right {
        padding-left: 70px;
        padding-top: 40px;
    }

    .paddingy {
        padding-right: 70px;
        padding-top: 100px;
    }

    .slider-right h2 {
        position: relative;
    }

    .slider-right h2::before {
        content: "";
        position: absolute;
        left: -70px;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 2px;
        background-color: #ccc;
    }

    .center-content-about {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media only screen and (max-width: 576px) {
        .stepper_right, .paddingy {
            padding-left: 0px !important;
        }
        .stepper_row {
            flex-direction: column;
        }

        .paddingy {
            padding-top: 40px !important;
        }

        .slider {
            width: 100%;
            padding-left: 20px !important;
            padding-right: 20px !important;
            border-right: none !important;
            text-align: left !important;
            margin-bottom: 20px;
        }

        .slider h2 {
            padding-left: 0 !important;
        }

        .slider h2::before,
        .slider-right h2::before {
            display: none;
        }

        .slider-right {
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        .slider-right h2 {
            padding-left: 0 !important;
        }

        .stepper_row:not(:last-child) .slider::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -60px;
            transform: translateX(-50%);
            width: 2px;
            height: 60px;
            background-color: #ccc;
        }

        .stepper_row:nth-child(2) .slider:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -60px;
            transform: translateX(-50%);
            width: 2px;
            height: 60px;
            background-color: #ccc;
        }
    }

    @media only screen and (max-width: 767px) {
        .stepper_right {
            padding-left: 40px;
        }

        .paddingy {
            padding-right: 40px !important;
        }

        .slider h2::before {
            width: 30px !important;
        }

        .slider-right h2::before {
            width: 30px !important;
            left: -40px !important;
        }

        .image {
            height: 300px !important;
        }
    }

    @media only screen and (min-width: 1800px) {
        .row-padding {
            padding: 0px 70px !important;
        }

        .image {
            height: 500px !important;
            width: 100%;
        }
    }

    /* slider timeline-end */
</style>


<div class="custom-padding px-md-5 mb-md-5 mb-3">
    <div class="container center-content-about px-0">
        <div class="row stepper_row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-md-end text-end paddingy" data-aos="fade-left"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Mission & Story</h2>
                <h4 class="custom_text_small">Mission Statement</h4>
                <p class="mb-3">At Merkaii Xcellence Prep, our mission is to empower aspiring healthcare
                    professionals through exceptional education and unwavering support, ensuring they
                    achieve their fullest potential in the ever-evolving world of healthcare.</p>
                <h4 class="custom_text_small">Our Story</h4>
                <p class="mb-3">Our journey began in 2015 with a simple yet profound goal: to create a student-
                    centered environment that fosters success in healthcare education. Over the years,
                    we've grown from a small tutoring service in the basement into a comprehensive
                    education hub, offering specialized review courses, personalized tutoring, and in-
                    depth exam reviews. Our commitment to excellence and our passion for student
                    success have driven us every step of the way.</p>
                <div class="image"><img src="{{ asset('/public/assets/lms/about-slider1.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Evolution & Transformation</h2>
                <h4 class="custom_text_small">Our Evolution</h4>
                <p class="mb-3">From our humble beginnings, we've continuously evolved to meet the needs of our
                    students. What started as a modest family and friends tutoring service in the
                    basement has transformed into a renowned institution known for its rigorous
                    healthcare review courses and individualized tutoring programs. We've embraced
                    new teaching methodologies, integrated cutting-edge technology, and expanded
                    our curriculum to cover the diverse and dynamic field of healthcare.</p>
                <h4 class="custom_text_small">Our “Aha!” Moment</h4>
                <p class="mb-3">Our pivotal moment came when we realized the profound impact personalized
                    education has on family and friends’ outcomes. Witnessing this we embarked on
                    opening our services to others and observing students transform from struggling
                    learners into confident, competent healthcare professionals. This has become our
                    cornerstone approach in offering tailored education and one-on-one support.</p>
                <div class="image"><img src="{{ asset('/public/assets/lms/about-slider2.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
        </div>
        <div class="row stepper_row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-md-end text-end paddingy" data-aos="fade-right"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Who We Serve</h2>
                <h4 class="custom_text_small">Our Audience</h4>
                <p class="mb-3"> Merkaii Xcellence Prep serves a diverse group of aspiring healthcare professionals,
                    from nursing students to future doctors, pharmacists, and allied health practitioners.
                    Our students come from various backgrounds, united by their dedication to
                    healthcare and their desire to excel. We are here to guide them, support them, and
                    celebrate their achievements along the way.</p>
                <div class="image"><img src="{{ asset('/public/assets/lms/about-slider3.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Merkaii Values</h2>
                <h4 class="custom_text_small">Our Brand Values</h4>
                <p class="mb-3"><span class="font-weight-bold">Student-Centric:</span> Our students are at the heart
                    of everything we do. Their success
                    is our success.</p>
                <p class="mb-3"><span class="font-weight-bold">Excellence:</span> We strive for excellence in all
                    aspects of our educational offerings,
                    ensuring high quality, comprehensive, and relevant content.</p>
                <p class="mb-3"><span class="font-weight-bold">Innovation:</span> We embrace innovative teaching
                    methods and technologies to
                    enhance learning and keep pace with the evolving healthcare landscape.</p>
                <p class="mb-3"><span class="font-weight-bold">Support:</span> We provide unwavering support, understanding
                        that each student’s
                        journey is unique and deserving of personalized attention.</p>
                <p class="mb-3"><span class="font-weight-bold">Integrity:</span> We uphold the highest standards of
                    integrity, fostering a trustworthy and
                    respectful learning environment.</p>
                <p class="mb-3"><span class="font-weight-bold">Teacher Well-Being:</span> We believe that happy
                    teachers are the foundation of
                    successful students. By taking exceptional care of our educators, we ensure they
                    can focus wholeheartedly on their goals, bringing passion and dedication to every
                    lesson.</p>
                <div class="image"><img src="{{ asset('/public/assets/lms/about-slider4.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
        </div>
    </div>
</div>
