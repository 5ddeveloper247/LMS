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

    .row {
        display: flex;
        flex: 1;
        width: 100%;
    }

    .row .slider {
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
        /* Adjust as needed */
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

    @media only screen and (max-width: 767px) {
        .stepper_right {
            padding-left: 40px !important;
        }

        .paddingy {
            padding-right: 40px !important;
        }

        .slider h2::before {
            width: 30px !important;
        }
        .slider-right h2::before{
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


<div class="custom-padding px-md-5 mb-5">
    <div class="container center-content-about px-0">
        <div class="row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-end text-end paddingy" data-aos="fade-left"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Step 1</h2>
                <p class="mb-3">This is the first step This is the third step This is the first step This is the third
                    step This is the third step This is the second step This is the third stepThis is the third step
                    This is the third stepThis is the third step</p>
                <div class="image"><img src="{{ asset('/public/uploads/images/footerimg/image1.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Step 2</h2>
                <p class="mb-3">This is the second step This is the third stepThis is the first step This is the third
                    step This is the third step This is the second step This is the third stepThis is the third stepThis
                    is the third stepThis is the third stepThis is the third step</p>
                <div class="image"><img src="{{ asset('/public/uploads/images/footerimg/image1.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
        </div>
        <div class="row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-end text-end paddingy" data-aos="fade-right"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Step 3</h2>
                <p class="mb-3"> This is the third stepThis is the third step This is the first step This is the third
                    stepThis is the third stepThis is the third step This is the second step This is the third stepThis
                    is the third step This is the third step</p>
                <div class="image"><img src="{{ asset('/public/uploads/images/footerimg/image1.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Step 4</h2>
                <p class="mb-3">This is the fourth stepThis is the fourth step This is the first step This is the
                    third step This is the fourth step This is the second step This is the third stepThis is the third
                    step This is the fourth stepThis is the fourth step</p>
                <div class="image"><img src="{{ asset('/public/uploads/images/footerimg/image1.jpg') }}"
                        class="w-100 h-100" style="object-fit: cover;"></div>
            </div>
        </div>
    </div>
</div>
