@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Programs') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<style>
    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .custom_span_color {
        color: #ff7600;
    }

    .title_des {
        font-size: 22px;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        min-height: 78px;
    }

    li {
        list-style-type: disclosure-closed !important;
    }

    .rounded-card {
        border-radius: 25px !important;
    }

    .rounded-card-header {
        border-radius: 25px !important;
    }

    .rounded-card-img {
        border-top-left-radius: 25px !important;
        border-top-right-radius: 25px !important;
    }

    /* .section-margin-y {
        margin: 60px auto !important;
    } */
    .bs-canvas-overlay {
        opacity: 0.85;
        z-index: 1000;
    }

    .bs-canvas {
        top: 0;
        z-index: 1000;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 140px 30px 40px 40px;
        width: 330px;
        transition: margin .4s ease-out;
        -webkit-transition: margin .4s ease-out;
        -moz-transition: margin .4s ease-out;
        -ms-transition: margin .4s ease-out;
    }

    .thumb_heading {
        /* display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden; */
        white-space: nowrap;
        width: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .course-small {
        display: flex;
        justify-content: space-between;
        gap: 5px;
        text-align: center;
        white-space: nowrap;
    }

    @media (max-width: 1600px) {
        .bs-canvas {
            top: 0;
            z-index: 1000;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 105px 30px 40px 40px;
            width: 330px;
            transition: margin .4s ease-out;
            -webkit-transition: margin .4s ease-out;
            -moz-transition: margin .4s ease-out;
            -ms-transition: margin .4s ease-out;
        }
    }

    .bs-canvas-left {
        left: 0;
        margin-left: -330px;
    }

    .bs-canvas-right {
        right: 0;
        margin-right: -330px;
    }

    .accent-color {
        accent-color: #ff7600 !important;
    }

    .banner_img {
        object-fit: fill;
    }

    #filter_btn {
        color: #ff7600 !important;
    }

    @media only screen and (max-width: 358px) {

        h2,
        h3 {
            font-size: 14px !important;
        }

        .course-small {
            font-size: 12px !important;
        }

        .filter_btn {
            font-size: 12px !important;
        }

        /* .quiz_wizged {
    width: 14rem !important;
} */

    }

    @media only screen and (min-width: 359px)and (max-width: 769px) {

        h2,
        h3 {
            font-size: 17px !important;
        }

        .filter_btn {
            font-size: 14px !important;
        }

        .course-small {
            font-size: 13px !important;
        }
    }

    @media only screen and (min-width: 1800px) {
        .thumb-height {
            /* height: 400px; */
        }

        .course-small {
            display: flex !important;
            justify-content: space-between;
        }
    }

    .img-cover {
        min-height: auto !important;
    }

    @media only screen and (min-width: 1600px) {
        .img-cover {
            min-height: 45vh !important;
        }

        /* .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        min-height: 9vh !important;
    } */
    }
</style>

@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 banner_img"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h1 class="text-white custom-heading">Programs</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container custom-padd px-lg-5 pt-md-5 pt-3">
            <div class="row px-sm-4 ">
                <div class="col-12 d-flex justify-content-between mb-4">
                    <div class="col-6 col-md-8">
                        <h2 class="custom_small_heading font-weight-bold custom_heading_1">Program Features</h2>
                        <ul style="color: #996699!important" class="ml-4">
                            <li>
                                <h5 class="small_heading font-weight-bold">
                                    Courses | {{ getProgramListCourseCount() }}
                                </h5>
                            </li>
                            <li>
                                <h5 class="small_heading font-weight-bold">
                                    Classes | {{ getProgramListClassCount() }}
                                </h5>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-end">

                        <a class="font-weight-500 pull-bs-canvas-left text-dark filter_btn" id="filter_btn"
                            style="cursor: pointer">
                            Show Filter
                            <svg width="22" height="16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg">
                                <g id="icon-filter" fill-rule="nonzero" fill="none">
                                    <rect fill="#D8D8D8" y="2" width="22" height="2" rx="1"></rect>
                                    <rect fill="#D8D8D8" y="12" width="22" height="2" rx="1"></rect>
                                    <circle fill="#373737" cx="15.5" cy="13" r="2.5"></circle>
                                    <circle fill="#373737" cx="6.5" cy="3" r="2.5"></circle>
                                </g>
                            </svg>
                        </a>
                        {{-- <form action="" class="form w-100 {{ request()->has('filter') ? '' : 'd-none' }}" id="filter_form">

                        <input type="hidden" name="filter" value="1">
                        <div class="row">
                            <div class="col-4">
                                <label for="program_title">Program Title</label>
                                <input type="text" name="program_title" class="form-control" id="program_title"
                                       value="{{ request()->has('filter') ? request()->input('program_title','') : '' }}">
                                <div id="program_list" class="position-absolute"></div>
                            </div>
                            <div class="col-8">
                                <label for="program_price">Price (0 to {{programFilterMaxPrice()}})</label>
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row-reverse">
                                        <p id="price_range_min"
                                           class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}</p>
                                        <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="100"
                                               name="program_price_min"
                                               class="form-control accent-color"
                                               oninput="price_range_min.innerText = this.value"
                                               id="program_price_min"
                                               value="{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}">
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <p id="price_range_max"
                                           class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}</p>
                                        <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="100"
                                               name="program_price_max"
                                               class="form-control accent-color"
                                               oninput="price_range_max.innerText = this.value"
                                               id="program_price_max"
                                               value="{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form> --}}
                    </div>
                </div>
                @if (isset($programs))
                    @foreach ($programs as $program)
                        <div class="col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center mb-md-4 mb-3">
                            <div class="quiz_wizged card rounded-card shadow w-100">
                                <div class="thumb rounded-card-img">
                                    <a href="{{ route('programs.detail', [$program->id]) }}"><img
                                            src="{{ getCourseImage($program->icon) }}"
                                            class="img-fluid img-cover w-100 rounded-card-img">
                                            <div>
                                                <span class="prise_tag"><span> ${{ $program->currentProgramPlan[0]->amount }}</span>
                                    </span>
                                        </div>
                                        </a>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="font-weight-bold thumb_heading">
                                        <a href="{{ route('programs.detail', [$program->id]) }}">

                                            {{ $program->programtitle }}
                                        </a>
                                    </h5>
                                    <p class="font-weight-bold thumb_heading">
                                        {{ $program->subtitle }}

                                    </p>
                                    <div class="paragraph_custom_height mb-2">
                                        <p style="font-size: 18px !important;">
                                            @php
                                                $description = str_replace(
                                                    '&nbsp;',
                                                    ' ',
                                                    htmlspecialchars_decode(strip_tags($program->discription)),
                                                );
                                            @endphp
                                            @if (Str::length($description) > 119)
                                                {{ Str::limit($description, 119, '...') }}
                                            @else
                                                {{ $description }}
                                            @endif
                                        </p>
                                    </div>

                                    <div class="course-small">
                                        <small>
                                            <i class="fa fa-book-open"></i>
                                            {{ count(json_decode($program->allcourses)) }} Courses
                                        </small>

                                        <small>
                                            <i class="fas fa-clock"></i>
                                            {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                            Weeks
                                        </small>
                                        {{-- <small>
                                            ${{ $program->currentProgramPlan[0]->amount }}
                                        </small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (count($programs) == 0)
                    <div class="col-lg-12">
                        <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                            <div class="thumb">
                                <img style="width: 50px"
                                    src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                            </div>
                            <h1>
                                {{ __('No Program Found') }}
                            </h1>
                        </div>
                    </div>
                @endif
                <div class="col-md-12 {{ count($programs) ? 'd-block' : 'd-none' }} mt-4">
                    {{ $programs->links() }}
                </div>

                {{-- <div class="col-md-12 my-3">
                <h2>You May Like</h2>
            </div> --}}
            </div>
        </div>

        {{-- <div class="row custom_slick_slider_02 mb-4 text-center">
            @forelse($recent_program as  $program)
                <div class="col-md-10 my-3">
                    <div class="card rounded-0 shadow">
                        <div class="card-header p-0">
                            <a href="{{ route('programs.detail', [$program->id]) }}">
                                <img style="" src="{{ getCourseImage($program->icon) }}" class="img-fluid">
                            </a>

                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold">
                                <a href="{{ route('programs.detail', [$program->id]) }}">
                                    @if (Str::length($program->programtitle) > 25)
                                        {{ Str::limit($program->programtitle, 25, '...') }}
                                    @else
                                        {{ Str::limit($program->programtitle, 25) }}
                                    @endif
                                </a>
                            </h5>
                            <p class="pb-2">
                                @if (Str::length($program->subtitle) > 25)
                                    {{ Str::limit($program->subtitle, 25, '...') }}
                                @else
                                    {{ $program->subtitle }}
                                @endif
                            </p>
                            <div class="row justify-content-between pt-2">
                                <div class="col-auto">
                                    <small>
                                        <i class="fas fa-clock"></i>
                                        {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                        Weeks
                                    </small>
                                </div>
                                <div class="font-weight-bold col-auto">
                                    <small class="font-weight-bold">
                                        ${{ $program->currentProgramPlan[0]->amount }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 my-3">
                    <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                        <div class="thumb">
                            <img style="width: 20px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                alt="">
                        </div>
                        <h6>
                            {{ __('No Program Found') }}
                        </h6>
                    </div>
                </div>
            @endforelse
        </div> --}}
        <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
            <header class="border-bottom bs-canvas-header p-3">
                <h4 class="d-inline-block f_w_600 mb-0">Filter</h4>
                <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                        class="">&times;</span></button>
            </header>
            <div class="bs-canvas-content px-3 py-1">

                <form action="{{ route('programs') }}" method="GET" class="form w-100" id="filter_form">

                    <input type="hidden" name="filter" value="1">
                    <div class="row">
                        <div class="col-12">
                            <label for="program_title">Program Title</label>
                            <input type="text" name="program_title" class="form-control form-control-sm"
                                id="program_title"
                                value="{{ request()->has('filter') ? request()->input('program_title', '') : '' }}"
                                placeholder="Enter Program Name">
                            <div id="program_list" class="position-absolute"></div>
                        </div>

                        <div class="col-12 mt-3">
                            <small class="alert alert-info p-0">Min price must be less then max price</small>
                            <label for="program_price">Price (0 to {{ programFilterMaxPrice() }})</label>
                            <div class="d-flex flex-column">
                                <h6 class="mb-0">Min</h6>
                                <div class="align-items-center d-flex flex-row-reverse gap-2">
                                    <p id="price_range_min" class="font-weight-bold">
                                        {{ request()->has('filter') ? request()->input('program_price_min', 0) : 0 }}</p>
                                    <input type="range" min="0" max="{{ programFilterMaxPrice() }}"
                                        step="1" name="program_price_min" class="form-control accent-color p-0"
                                        oninput="price_range_min.innerText = this.value" id="program_price_min"
                                        value="{{ request()->has('filter') ? request()->input('program_price_min', 0) : 0 }}">
                                </div>
                                <h6 class="mb-0">Max</h6>
                                <div class="align-items-center d-flex flex-row-reverse gap-2">
                                    <p id="price_range_max" class="font-weight-bold">
                                        {{ request()->has('filter') ? request()->input('program_price_max', 0) : 0 }}</p>
                                    <input type="range" min="0" max="{{ programFilterMaxPrice() }}"
                                        step="1" name="program_price_max" class="form-control accent-color p-0"
                                        oninput="price_range_max.innerText = this.value" id="program_price_max"
                                        value="{{ request()->has('filter') ? request()->input('program_price_max', 0) : 0 }}">
                                </div>
                                <p class="text-center mb-0 mt-4">
                                    <a href="{{ route('programs') }}" class="theme_btn small_btn2 p-2">Clear</a>
                                    <button type="submit" class="theme_btn small_btn2 p-2">Submit</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>




    @include(theme('partials._custom_footer'))
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pull-bs-canvas-left', function() {
                $('body').prepend(
                    '<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                console.log(this);
                if ($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });

            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function() {
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $(
                    '.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });

            // var filter_form = $('#filter_form');
            // $('#filter_btn').on('click', function () {
            //     filter_form.toggleClass('d-none');
            // });

            $('#program_title').keyup(function(event) {
                var value = $(this).val();
                localStorage.setItem("is_program_page", 1);

                // if (event.which === 13) {
                //     event.preventDefault();
                //     $('#program_price_max').val(0)
                //     $('#program_price_min').val(0)
                //     $('#price_range_min').text(0)
                //     $('#price_range_max').text(0)
                //     $('#filter_form').submit();
                // }


                $.ajax({
                    type: "GET",
                    url: "{{ route('search') }}",
                    data: {
                        'name': value
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#program_list').html(response);
                    }
                });
            });



            $('#program_price_max,#program_price_min,#program_duration_min,#program_duration_max').on('change',
                function(event) {
                    event.preventDefault();
                    if (parseInt($('#program_price_min').val()) > parseInt($('#program_price_max').val())) {
                        toastr.error("Min price must be less then max price", "Error");
                        return false;
                    }
                    // if (parseInt($('#program_duration_min').val()) > parseInt($('#program_duration_max').val())) {
                    //     toastr.error("Min duration must be less then max duration", "Error");
                    //     return false;
                    // }
                    // $('#program_title').val('');
                    // $('#filter_form').submit();
                });

        });
        a = 1;

        function togglefn() {
            if (a == 1) {

                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "auto";
                a = 2;
            } else {
                a = 1;
                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "80px";
            }
        }
    </script>
    <script>
        $('.custom_slick_slider_02').slick({
            // dots: true,
            lazyLoad: 'ondemand',
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            // nextArrow: '<button class="any-class-name-you-want-next">Next</button>',
            // prevArrow: '<button class="any-class-name-you-want-previous">Previous</button>'
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
