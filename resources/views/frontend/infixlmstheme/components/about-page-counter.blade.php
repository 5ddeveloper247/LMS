<div class="">
    <style>
        /* .counter_area::before {
            background-image: url('{{ asset($about->image4) }}');
            margin-right: 26px;
        } */
        .counter-image{
            clip-path: polygon(23% 0, 100% 0, 100% 100%, 0 100%);
        }
        .center-content-about{
            display: flex;
            align-items: center;
        }
    </style>
   <section class="aboutPage-sec3">
    <div class="counter_area d-flex align-items-center my-lg-5 px-xl-5 ">
        <div class="container center-content-about">
            <div class="row counter_area_row px-3 px-sm-0 px-lg-4">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="counter_wrapper mb-3 mb-lg-0">
                        <div class="single_counter">
                            <h3><span class="">{{ $about->total_teacher }}</span></h3>
                            <div class="counter_content">
                                <h5>{{ $about->teacher_title }}</h5>
                                <p>{{ $about->teacher_details }}</p>
                            </div>
                        </div>
                        <div class="single_counter">
                            <h3><span class="">{{ $about->total_student }}</span></h3>
                            <div class="counter_content">
                                <h5>{{ $about->student_title }}</h5>
                                <p>{{ $about->student_details }}</p>
                            </div>
                        </div>
                        <div class="single_counter">
                            <h3><span class="">{{ $about->total_courses }}</span></h3>
                            <div class="counter_content">
                                <h5>{{ $about->student_title }}</h5>
                                <p>{{ $about->student_details }}</p>
                            </div>
                        </div>
                        <div class="single_counter">
                            <h3><span class="">{{ $about->total_courses }}</span></h3>
                            <div class="counter_content">
                                <h5>{{ $about->student_title }}</h5>
                                <p>{{ $about->student_details }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    {{-- <img src="{{ asset('/public/uploads/images/footerimg/ezgif-2-78802b2d5b.mp4') }}" class="w-100 h-100"> --}}
                    <div class="counter_video">
                        <video class="counter-image h-100 w-100" autoplay loop muted style="object-fit: cover">
                            <source src="{{ asset('/public/uploads/images/footerimg/ezgif-2-78802b2d5b.mp4') }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
</div>
