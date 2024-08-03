<style>
    .service_cta_row {
        display: flex;
        height: 100%;
        width: 100%
}
.center-content-about{
    display: flex;
    align-items: center;
}
.small_btn{
    white-space: nowrap;
}
    @media only screen and (min-width:1800px) {
        p {
            font-size: 20px;
        }

        h5 {
            font-size: 25px;
        }
        .service_cta_row{
            padding: 0px 35px !important;
        }
    }
</style>

<div>
    <div class="service_cta_area p-lg-5 p-3">
        <div class="container center-content-about mb-3">
            {{-- <div class="border_top_1px"></div> --}}
            <div class="service_cta_row row px-xl-3 d-flex justify-content-center" id="service_cta_row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_cta_service single_cta1">
                        <div class="thumb">
                            <img src="{{ asset(@$frontendContent->become_instructor_logo) }}" alt="">
                        </div>
                        <div class="cta_service_info">
                            <h5 class="custom_small_heading mb-4 font-weight-bold text-white">
                                {{ @$frontendContent->become_instructor_title }}</h5>
                            <p class="mb-4 text-white"> {{ @$frontendContent->become_instructor_sub_title }}
                            </p>
                            <a href="{{ url('/instructors') }}"
                                class="theme_btn small_btn">{{ __('frontend.Start Teaching') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-3 mt-md-0">
                    <div class="single_cta_service single_cta2">
                        <div class="thumb">
                            <img src="{{ asset(@$frontendContent->become_instructor_logo) }}" alt="">
                        </div>
                        <div class="cta_service_info">
                            <h5 class="custom_small_heading mb-4 font-weight-bold text-dark"> Become a Tutor | Mentor </h5>
                            <p class="mb-4"> Make a lasting impact on aspiring nurses. Share your expertise, inspire students, and build a fulfilling career while helping others achieve their dreams.
                            </p>
                            <a href="{{ route('register') }}" class="theme_btn small_btn p-2">Share Knowledge</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-3 mt-lg-0">
                    <div class="single_cta_service single_cta3">
                        <div class="thumb">
                            <img src="{{ asset(@$frontendContent->become_instructor_logo) }}" alt="">
                        </div>
                        <div class="cta_service_info">
                            <h5 class="custom_small_heading mb-4 font-weight-bold text-white"> Healthcare Student</h5>
                            <p class="mb-4 text-white"> Launch your healthcare career Gain the knowledge and skills you need to succeed in the dynamic healthcare industry.
                            </p>
                            <a href="{{ route('register') }}" class="theme_btn small_btn p-2">Start New Career </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
