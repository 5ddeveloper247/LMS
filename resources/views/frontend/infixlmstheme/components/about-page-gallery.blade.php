<style>
.animation {
    position: relative;
    opacity: 0;
    transition: top 0.5s ease, opacity 0.5s ease;
}

</style>


<div>
    <div class="about_gallery_area px-md-5 py-lg-2">
        <div class="container px-xl-5 px-lg-4 px-3 d-flex align-items-center">
            <div class="row align-items-center gallery_area_row">
                <div class="col-sm-7">
                    <div class="about_gallery">
                        <div class="gallery_box">
                            <div class="thumb image_thumb">
                                <img class="w-100" src="{{ asset($about->image1) }}" alt="">
                            </div>
                            <div class="thumb small_thumb image_thumb">
                                <img class="w-100" src="{{ asset($about->image2) }}" alt="">
                            </div>
                        </div>
                        <div class="gallery_box">
                            <div class="thumb image_thumb">
                                <img class="w-100" src="{{ asset($about->image3) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 pr-0">
                    <div class="section__title aniamtion" id="animation-text" data-aos="fade-left"
                    data-aos-duration="2000">
                        <h5 class="custom_small_heading mb-4 mt-4 mt-sm-0 font-weight-bold ">{{ $about->story_title }}</h5>
                        <p class="mb-sm-4">{{ $about->story_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
