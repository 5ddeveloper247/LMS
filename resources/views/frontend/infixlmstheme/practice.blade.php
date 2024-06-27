@extends(theme('layouts.master'))
@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('common.Checkout') }}
@endsection
@section('css')
<style>
    /* .custom-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .custom-slider {
        display: flex;
        width: 400%;
        transition: transform 0.3s ease;
    }

    .custom-slide {
        flex: 0 0 25%;
        box-sizing: border-box;
        padding: 0;
        text-align: center;
        position: relative;
    }

    .custom-slide img {
        width: 100%;
        height: 70vh;
        filter: brightness(70%);
        border-radius: 10px;

    }

    .custom-slide .overlay {
        position: absolute;
        border-radius: 10px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #2441e7;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .text-overlay {
        position: absolute;
        bottom: 12%;
        display: flex;
        flex-direction: column;
        align-items: center;
        left: 35px;
        color: white;
    }

    .text-overlay p {
        color: white;
    }

    .custom-slide:hover .overlay {
        opacity: 0.8;
        background-color: #2441e7;

    }
    .image-text{
        color: white;
    }

    .date-overlay {
        position: absolute;
        top: 30px;
        right: 50px;
        background-color: white;
        padding: 5px 20px;
        border-radius: 5px;
    }

    .image-date {
        margin: 0;
        color: black;
    }

    button.prev,
    button.next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.5);
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1.5em;
        padding: 10px;
        z-index: 1;
    }

    button.prev {
        left: 30px;
    }

    button.next {
        right: 30px;
    }
    .category{
        position: absolute;
        top: 30px;
        left: 30px;
        background: rgba(255, 255, 255, 0.5);
        padding: 5px 20px;
        border-radius: 10px;
    }

.custom-card {
    position: relative;
    overflow: hidden;
    color: white;
    border-radius: 10px;
}

.custom-card img {
    filter: brightness(70%);
    border-radius: 10px;
    height: 70vh;
}

.custom-card .card-img-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 20px;
    transition: background-color 0.3s ease;
    background-color: transparent; 
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border-radius: 10px;
}

.custom-card:hover .card-img-overlay {
    background-color: rgba(36, 65, 231, 0.8); 
}

.custom-card h5 {
    position: absolute;
    bottom: 11%;
    left: 30px;
    color: white;
}

.card-date {
    position: absolute;
    top:30px;
    left: 30px;
} */
.online-learning {
    position: relative; /* Ensure relative positioning for absolute pseudo-element */
    background-image: url(https://demoapus2.com/edumy/wp-content/uploads/2019/06/call-to-action-01.jpg);
    color: white; /* Set text color to white for better visibility */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 999;
    height: 83vh;
}
.online-learning::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #192675;
    opacity: 0.7; /* Adjust opacity to your preference */
    z-index: -1; /* Ensure the pseudo-element is behind the content */
}
  /* Custom CSS for the button */
  .custom-button {
            border: 2px solid white;
            border-radius: 20px;
            color: white;
            background-color: transparent;
            transition: all 0.3s ease; /* Smooth transition for hover effect */
        }

        .custom-button:hover {
            background-color: white;
            color: black;
            border-color: white;
        }

</style>

@endsection
@section('mainContent')
<section class="online-learning d-flex align-items-center justify-content-center"><div class="py-5">
    <div class="py-5">
    <h2 class="text-white text-center font-weight-bold">Start your transformation with a single click. Limited Seats Available!</h2>
    <h2 class="text-white text-center pt-2">Get Licensure, Apply Now for Merkaii Xcellence College's Healthcare Programs and Courses. <br>Adult-Learner’s Success</h2>
    <div class="d-flex justify-content-center">
    <button class="btn custom-button px-lg-5 px-3 py-2 mt-5">Contact Admission Specialist</button>
    </div>
    </div>
</div></section>

<!-- <div class="container px-xl-4">
    <div class="row d-flex align-items-stretch px-xl-5 mb-3">
        <div class="col-md-6 mt-md-5 mt-4">
            <div class="custom-slider-container">
                <button class="prev">❮</button>
                <div class="custom-slider">
                    <div class="custom-slide">
                        <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/6927-pe3njtkt8uybrprhgnp0phhydpp6ogakasxznri7kc.jpg" alt="Image 1">
                        <div class="overlay"></div>
                        <div class="text-overlay">
                            <h5 class="image-text">Successful Self Tapping</h5>
                            <br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem amet cupiditate libero corporis molestias similique eius temporibus, vero illum error labore. Sit atque ab consequuntur ipsa ratione quis suscipit.</p>
                        </div>
                        <div class="category">
                            <h5 class="text-white">Category</h5>
                        </div>
                        <div class="date-overlay">
                            <h5 class="image-date">20<br>May</h5>
                        </div>
                    </div>
                    <div class="custom-slide"><img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/1093-pe3njtkt8uybrprhgnp0phhydpp6ogakasxznri7kc.jpg" alt="Image 2">
                        <div class="overlay"></div>
                        <div class="text-overlay">
                        <h5 class="image-text">Successful Self Tapping</h5>
                            <br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem amet cupiditate libero corporis molestias similique eius temporibus, vero illum error labore. Sit atque ab consequuntur ipsa ratione quis suscipit.</p>                        </div>
                            <div class="category">
                            <h5 class="text-white">Category</h5>
                        </div>
                            <div class="date-overlay">
                            <h5 class="image-date">20<br>May</h5>
                        </div>
                    </div>
                    <div class="custom-slide"><img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/2629-pe3njtkt8uybrprhgnp0phhydpp6ogakasxznri7kc.jpg" alt="Image 3">
                        <div class="overlay"></div>
                        <div class="text-overlay">
                        <h5 class="image-text">Successful Self Tapping</h5>
                            <br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem amet cupiditate libero corporis molestias similique eius temporibus, vero illum error labore. Sit atque ab consequuntur ipsa ratione quis suscipit.</p>                        </div>
                            <div class="category">
                            <h5 class="text-white">Category</h5>
                        </div>
                            <div class="date-overlay">
                            <h5 class="image-date">20<br>May</h5>
                        </div>
                    </div>
                    <div class="custom-slide"><img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/1093-pe3njtkt8uybrprhgnp0phhydpp6ogakasxznri7kc.jpg" alt="Image 4">
                        <div class="overlay"></div>
                        <div class="text-overlay">
                        <h5 class="image-text">Successful Self Tapping</h5>
                            <br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem amet cupiditate libero corporis molestias similique eius temporibus, vero illum error labore. Sit atque ab consequuntur ipsa ratione quis suscipit.</p>                        </div>
                            <div class="category">
                            <h5 class="text-white">Category</h5>
                        </div>
                            <div class="date-overlay">
                            <h5 class="image-date">20<br>May</h5>
                        </div>
                    </div>
                </div>
                <button class="next">❯</button>
            </div>

        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 mt-md-5 mt-4">
                    <div class="card custom-card">
                        <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/1105-pe3njtkqt5gexzmb6f3gua5ab17rzk5a1ccdwchmj0.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Card Title</h5>
                            <div class="card-date">
                            <h4 class="text-white">22 May</h4>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-5 mt-4">
                    <div class="card custom-card">
                        <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/301242-pe3njtkqt5gexzmb6f3gua5ab17rzk5a1ccdwchmj0.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Another Card</h5>
                            <div class="card-date">
                            <h4 class="text-white">22 May</h4>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@include(theme('partials._custom_footer'))
@endsection
@section('js')
<!-- <script>
    $(document).ready(function() {
        const slideWidth = $(".custom-slide").outerWidth(); // Width of each custom-slide
        const numSlides = $(".custom-slide").length;
        let currentSlide = 0;

        // Set the total width of the custom-slider dynamically based on number of slides
        $(".custom-slider").width(numSlides * slideWidth);

        // Function to move slides left
        $(".next").click(function() {
            if (currentSlide < numSlides - 1) {
                currentSlide++;
                $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
            }
        });

        // Function to move slides right
        $(".prev").click(function() {
            if (currentSlide > 0) {
                currentSlide--;
                $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
            }
        });
    });
</script> -->

@endsection