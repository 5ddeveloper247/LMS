
<!-- swipper slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    .bg{
        background-color: #fdf6ea;
    }
    /* swiper */
    .swiper_container{
        padding: 0px 70px;
    /* align-items: center;
    display: grid; */
    /* max-height: 760px; */
    /* height: 100%; */
    height: auto !important;

    }
    .swiper {
    /* position: relative; */
    display: flex;
    flex-direction: column;
    gap: 20px;
    /* margin: 0px 0px; */
    height: 350px;
}

@media (max-width: 767px){
   .swiper{
    height: 300px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
   }
}
.swiper-wrapper {

    display: flex;
  
    /* padding: 0px 10px; */
    /* justify-content: start;
    align-items: start; */
    /* max-height: 300px; */
    /* height: 100%; */
}

.swiper-slide {
   /* height: 100% !important; */
   /* width: auto !important: */
}

.card-review {
    width: 100%;
    height: 300px !important;
    font-size: 24px;
    border: 1px solid #ccc !important;
    border-radius: 25px !important;
    margin-bottom: 5px;
    display: flex;
    justify-content: space-between;

    /* overflow: hidden; */
}

.image {
    position: relative;
    overflow: hidden;
}

.image img {
    width: 50px;
    height: 50px;
}

.content {
    padding: 10px;
}

.heading {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.paragraph {
    font-size: 14px;
    text-align: justify;
    line-height: 1.5;
    padding: 1rem;
}
.font-style-for-ellipsis{
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
}
.swiper-pagination {
      /* position: absolute;
      bottom: -20px;
      left: 0; */
      /* margin-bottom: -30px; */
      /* width: 100%; */
      /* text-align: center; */
    }
    .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      /* display: inline-block; */
      /* opacity: 0.5; */
      margin: 0 5px;
      cursor: pointer;
    }
    .swiper-pagination-bullet-active {
      /* opacity: 1; */
    }

@media only screen and (min-width: 1440px){
    .paragraph {
    font-size: 20px;
   
}
.heading {
    font-size: 25px;
    
}
.image img {
    width: 65px;
    height: 65px;
}
.text-warning{
    font-size: 20px;
}
.swiper {
    height: 350px;
}
}
@media only screen and (min-width: 1800px){
    .swiper_container{
        padding: 0px 100px;
    }
    /* .custom-margin{
        margin-top: 80px;
    } */
}



</style>

<section class="custom_section_color" style=" padding-top: 30px;
padding-bottom: 30px;">
    <div class="swiper_container " style="">
        {{-- <div class="row mx-md-4"> --}}
            {{-- <div class="col-md-12"> --}}
                <div class="mb-4 text-center">
                    <h2 class="custom_heading_1 font-weight-bold">
                        Real Student Voices and Success Stories
                    </h2>
                    <p class="custom_paragraph font-weight-bold">
                        Hear from Our Thriving Graduates, Discover the Transformative Power of a Merkaii Xcellence Education and the Achievement of their Healthcare goals
                    </p>
                    <p>"Student Success Stories: Hear from Our Thriving Graduates!" </p>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}

    <div class="swiper">
        <div class="swiper-wrapper ">
            @foreach ($latest_course_reveiws as $course_reveiw)
            <!-- 1 -->
            <div class="swiper-slide" style="">
                <div class="card card-review p-3">
                    <div class="paragraph font-style-for-ellipsis">
                        {{ $course_reveiw->comment }} wquiquequiequqyeqiyeqeyi
                    </div>
                    <div class="row content d-flex justify-content-between align-items-end custom-margin">

                        <div class="col-md-4 col-xl-3 image">
                            <img src="{{ asset($course_reveiw->user->image) }}"
                                alt="{{ $course_reveiw->user->name }}" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-md-8 col-xl-9 heading d-flex flex-column justify-content-center">{{
                            $course_reveiw->user->name }}
                            <div class="text-warning">
                                @php
                                $main_stars = $course_reveiw->star;
                                $stars = intval($course_reveiw->star);
                                @endphp
                                @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                    @endfor
                                    @if ($main_stars > $stars)
                                    <i class="fas fa-star-half"></i>
                                    @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>

<script>
    var swiper = new Swiper('.swiper', {
        slidesPerView:3,
        slidesPerGroup: 1,
        loop: true,
        spaceBetween: 10,
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
      },
        autoplay: {
          delay: 2000,
        //   disableOnInteraction: false,
        },
        breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                800: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            }

    });

//     var swiper = new Swiper('.swiper', {
//     slidesPerView: 3,
//     loop: true,
//     spaceBetween: 30,
//     autoplay: {
//         delay: 2000,
//         disableOnInteraction: false
//     },
//     breakpoints: {
//         992: {
//             slidesPerView: 2,
//             width: 300,
//             centeredSlides: true,
//         },
//         768: {
//             slidesPerView: 2,
//             centeredSlides: true,
//         },
//         576: {
//             slidesPerView: 1,
//             centeredSlides: true,
//         }
//     }
// });

    </script>
