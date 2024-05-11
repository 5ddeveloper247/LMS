<!-- <div>
    <div class="testmonial_area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section__title text-center mb_80">
                        <h3>{{ @$frontendContent->testimonial_title }}</h3>
                        <p>
                            {{ @$frontendContent->testimonial_sub_title }}

                        </p>
                    </div>
                </div>
            </div>
            <div class="px-1 px-md-5 row owl-carousel">
                <div class="col-lg-12">
                    <div class="testmonail_active ">
                        @if (@$testimonials != '')
                            @foreach ($testimonials as $testimonial)
                                <div class="single_testmonial col-md-12">
                                    <div class="testmonial_header d-flex align-items-center">
                                        <div class="thumb profile_info ">
                                            <div class="profile_img">
                                                <div class="testimonialImage"
                                                    style="background-image: url('{{ getTestimonialImage($testimonial->image) }}')">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="reviewer_name">
                                            <h4>{{ @$testimonial->author }}</h4>
                                            <div class="rate d-flex align-items-center">

                                                @for ($i = 1; $i <= $testimonial->star; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor

                                            </div>
                                        </div>
                                    </div>
                                    <p> “{{ @$testimonial->body }}”</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

{{-- what our happy --}}
<section class="custom_section_color">
                    <div class="container" style="padding-top: 60px;">
                    <div class="row mx-md-4">
                        <div class="col-md-12">
                                    <div class="mt-4 pb-2 text-center">
                                        <h2 class="custom_heading_1 font-weight-bold">
                                            What Our happy Students Say
                                        </h2>
                                        <p class="custom_paragraph">
                                            The world’s largest selection of courses choose from 130,000 online video
                                            courses
                                            <br>with
                                            new additions published every month
                                        </p>
                                    </div>
                            </div>
                                </div>
                            </div>

        <div class="swiper">
        <div class="swiper-wrapper">
        @foreach ($latest_course_reveiws as $course_reveiw)
        <!-- 1 -->
            <div class="swiper-slide" style="">
            <div class="card card-review p-3">
            <div class="row content d-flex justify-content-between">

            <div class="col-md-4 image">
                <img src="{{ asset($course_reveiw->user->image) }}" alt="{{ $course_reveiw->user->name }}" class="rounded-circle img-fluid">
                </div>
                <div class="col-md-8 heading d-flex flex-column justify-content-center">{{ $course_reveiw->user->name }}
                    <div class="text-warning">
                      @php
                          $main_stars = $course_reveiw->star;
                          $stars = intval($course_reveiw->star);
                      @endphp
                      @for ($i = 0; $i < $stars; $i++)
                          <i class="fas fa-star"></i>
                      @endfor
                      @if ($main_stars > $stars)
                          <i class="fas fa-star-half"></i>
                      @endif
                    </div>
                    </div>
                    </div>
                    <div class="paragraph font-italic">
                      {{ $course_reveiw->comment }}
                    </div>

                </div>
                 </div>
          @endforeach
        </div>
         </div>
         </section>
