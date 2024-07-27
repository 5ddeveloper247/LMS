@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('resource') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">

<style>
    .boxbanner h1 {
        font-size: 70px;
        font-weight: bold;
        color: white;
        padding-top: 8rem !important;
    }

    .mainbanner {
        background-image: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}");
        height: 530px;
        background-size: cover;
        color: white;
    }

    .bgcolor {
        background-color: whitesmoke;
    }

    .rightbox h5 {
        font-weight: bold;
    }

    .rightbox p {
        /* font-weight: bold; */
        margin-bottom: 0px;
    }

    .bgwebs {
        transition: .6s;
        background-color: #ff1949;
    }

    .bgwebs:hover {
        background-color: transparent;
        border: #ff5600 1px solid;
        color: #ff5600 !important;
    }

    .color {
        color: #ff5600;
    }

    .courseimg {
        position: relative;
    }

    .coursebtn {
        position: absolute;
        bottom: 25px;
        right: 0px;
        padding: 8px 29px;
    }

    .coursedata h5 {
        font-weight: 800;
        font-size: 20px;
    }

    .just {
        text-align: justify;
    }

    .span::before {
        content: "\f007";
        font-family: "Font Awesome 5 Free";
        display: inline-block;
        padding-right: 3px;
        vertical-align: middle;
        font-weight: 900;
    }

    .rating::before {
        content: "\f005";
        font-family: "Font Awesome 5 Free";
        display: inline-block;
        padding-right: 3px;
        vertical-align: middle;
        font-weight: 900;
    }

    .rating {
        font-size: 13px;
    }

    .span {
        font-size: 13px;
    }

    .spane {
        font-size: 17px;
        font-weight: bold;
    }

    .coureparagraph p {
        line-height: 20px;
    }

    .instabox i {
        font-size: 50px;
        cursor: pointer;
    }

    .instabox {
        font-size: 46px;
        text-align: center;
    }

    .courseimg {
        background-color: black;
    }

    .courseimg img:hover {
        opacity: 0.5;
    }

    .osegora {
        border-bottom: 2px dashed rgb(205, 199, 199);
    }

    .tab_spy {
        cursor: pointer;
    }

    .tab_spy i {
        color: #ff5600;
        opacity: 0;
    }

    .tab_spy:hover i {
        opacity: 1;
    }

    .reviewda i {
        color: #edd903;
    }

    .textdo h5::before {
        content: "\f054";
        font-family: "Font Awesome 5 Free";
        display: inline-block;
        padding-right: 3px;
        vertical-align: middle;
        font-weight: 900;
        color: #ff5600;
        font-size: 18px;
        padding: 5px;
    }

    .textdo p {
        color: #444;
        font-size: 16px;
        font-weight: 300;
        line-height: 24px;
    }

    .data h5 {
        font-weight: 700;
    }

    .coursedata h1 {

        margin-top: -22px;
        font-weight: 800;
        font-size: 48px;
        font-family: Poppins, sans-serif;
        color: #252525;
    }


    .sub h5 {
        font-weight: bold;
    }

    .btr a {

        width: 213px;
        padding: 13px 0px;
        float: right;
        border-radius: 5px !important;
        border: 1PX solid #ff5600;
    }

    .btr a:hover {
        border: 1PX solid #ff5600;
        background: white;
        color: black !important;
    }

    body {
        background-color: #f9f9fa;
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }


    .card {
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
    }

    .pl-3,
    .px-3 {
        padding-left: 1rem !important;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #d2d2dc;
        border-radius: 0;
    }

    .card .card-title {
        color: #000000;
        margin-bottom: 0.625rem;
        text-transform: capitalize;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .card .card-description {
        margin-bottom: 0.875rem;
        font-weight: 400;
        color: #76838f;
    }

    .card {
        border: none;
    }

    .card-header a {
        font-size: 21px;
        font-weight: bold;
    }

    .mujt h5 {
        font-weight: bold;
        font-size: 17px;
    }


    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 0px;
    }

    .footerbox h5 {
        font-weight: 700;
        color: white;

    }

    .footerbox h5 {
        font-weight: 400;
        color: white;

    }

    .footerbox p {
        font-weight: 300 !important;
        line-height: 24px !important;
        font-size: 15px !important;
        color: white;
    }

    .icons i {
        font-size: 12px;
        padding: 3px;
        cursor: pointer;
        color: white;

    }

    .icons i:hover {
        color: #ff5600;

        font-size: 12px;
        padding: 3px;
    }

    .fonts {
        font-size: 17px;
        font-weight: 400;
        text-align: justify;
        margin-top: 3px;
        color: white;

    }

    .footerbox h5 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox h5 {
        font-weight: 400;
    }

    .footerbox p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer !important;

    }

    .footerbox p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: #ff5600;
    }

    .rounded_section {
        border-radius: 10px
    }


    .fonts {
        font-size: 17px;
        font-weight: 400;
        text-align: justify;
        margin-top: 3px;
    }

    .img_round {
        border-radius: 10px !important;
        object-fit: cover;
    }

    .accordion .card:first-of-type {
        border-bottom: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .accordion .card {
        margin-bottom: 0.75rem;
        box-shadow: 0px 1px 15px 1px rgba(230, 234, 236, 0.35);
        border-radius: 0.25rem;
        border: none;
    }

    .accordion .card .card-header {
        background-color: transparent;
        border: none;
        padding: 2rem;
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .accordion .card .card-header * {
        font-weight: 400;
        font-size: 1rem;
    }

    .mb-0,
    .my-0 {
        margin-bottom: 0 !important;
    }

    .accordion .card .card-header a {
        display: block;
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        position: relative;
        -webkit-transition: color 0.5s ease;
        -moz-transition: color 0.5s ease;
        -ms-transition: color 0.5s ease;
        -o-transition: color 0.5s ease;
        transition: color 0.5s ease;
        padding-right: 1.5rem;
    }

    .accordion .card .card-header * {
        font-weight: 400;
        font-size: 1rem;
    }

    .accordion .card .card-header a[aria-expanded="false"]:before {
        content: "\f067";
    }

    .accordion .card .card-header a[aria-expanded="true"]:before {
        content: "\f068";
    }

    .accordion .card .card-header a:before {
        position: absolute;
        right: 7px;
        top: 0;
        font-size: 18px;
        display: block;
        font-family: FontAwesome;
        display: inline-block;
        padding-right: 3px;
        vertical-align: middle;
        font-size: 0.756em;
        color: #405189;
    }

    .card {
        border: none;
    }

    .card-header a {
        font-size: 21px;
        font-weight: bold;
    }

    .mujt h5 {
        font-weight: bold;
        font-size: 17px;
    }

    .accordion .card .card-header a {
        display: block;
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-size: 20px;
        font-weight: bold;
    }

    .custom_section_color {
        background-color: #eee !important;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .containerwidth {
        width: 100%;
    }

    .wrapper {
        background-color: #eee;
        padding: 10px 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .toggle,
    .content {
        font-family: "Poppins", sans-serif;
    }

    .toggle {
        width: 100%;
        background-color: transparent;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-size: 16px;
        color: #111130;
        font-weight: 600;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 0;
    }

    .content {
        position: relative;
        font-size: 14px;
        text-align: justify;
        line-height: 30px;
        height: 0;
        overflow: hidden;
        -webkit-transition: all 1s;
        -o-transition: all 1s;
        transition: all 1s;
    }

    .program_image {
        border-radius: 10px !important;
        height: 485px;
        overflow: hidden;
    }
    .program_tab {
        height: 485px !important;
        border-radius: 10px;
        overflow: auto;
    }

    .amount_total {
        justify-content: center;
        display: flex;
        flex-direction: column;
        text-align: right
    }

    @media (width < 576px) {
        .custom_heading_1 {
            font-size: 1rem;
        }

        .amount_total {
            justify-content: center;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
    }


    .p-clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;

    }

    .cus-mb-5 {
        margin-bottom: 1.14rem;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }



    .prog_blk {
        position: relative;
        background: #fff;
        border-radius: 1rem;
        -webkit-box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        /* box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03); */
        padding: 3rem;
        padding-bottom: 100%;
        overflow: hidden;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .prog_blk>.txt {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(#111));
        /* background: linear-gradient(transparent, #111); */
        color: #fff;
        padding: 4rem 1.5rem 1.5rem;
    }

    .banner_img {
        object-fit: fill !important;
    }

    @media only screen and (max-width: 576px) {
        .small_screen {
            flex-direction: column;
            gap: 10px;
        }

        .program-span {
            font-size: 12px !important;
        }

        .buttons-padding {
            margin: 7px 0px;
        }
    }

    @media only screen and (max-width: 990px) {

        .img_height {
            max-height: 10rem;
            height: 100%;
        }

        .custom_heading_1 {
            font-size: 1rem !important;
        }

        .span_h {
            font-size: 12px !important;
        }
    }

    @media only screen and (min-width:991px) and (max-width: 1199px) {

        .custom_heading_1 {
            font-size: 1rem !important;
        }
        .theme_btn {
            font-size: 12px !important;
        }

        .span_h {
            font-size: 12px !important;
        }
    }

    @media only screen and (min-width:1800px) {
        .program-span {
            font-size: 16px;
        }
    }
</style>
@section('mainContent')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                {{-- <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 banner_img "
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>

                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h5 class="text-white custom-heading">Resource Center</h5>
                        </div>
                    </div>
                </div> --}}
                <x-breadcrumb :title="'Resource Center'" />
            </div>
        </div>
    </div>

        <div class="container pt-md-5 pt-4">
            <!-- <div class="col-xl-9 col-lg-9 col-md-8 mt-3 px-2"> -->
           
          
            <!-- 3rdstart -->
            <div class="row px-lg-5 small_screen mt-4 mb-2 mb-md-4">
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                    <div class="course_tabs">
                        <div class="events_wrapper">
                            <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="left" class="fa-solid fa-angle-left"></i>
                            </div>
                            <ul class="d-flex lms_tabmenu nav w-100 text-center"
                                style="
                        background: #eee;  " id="myTab" role="tablist">
                            @foreach ($tabs as $tab)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->iteration == 1) active @endif tab_spy" href="#{{ $tab->slug }}-tab" data-toggle="tab"
                                     role="tab" aria-controls="{{ $tab->name }}"
                                        aria-selected="true">{{ $tab->name }}
                                    </a>
                                </li>
                            @endforeach
                                {{-- <li>
                                    <a class="nav-link tab_spy" id="Curriculum-tab" data-toggle="tab" onclick="fire(2)"
                                        role="tab" aria-controls="Curriculum" aria-selected="false">Courses
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link tab_spy" id="Classes-tab" data-toggle="tab" onclick="fire(3)"
                                        role="tab" aria-controls="Classes" aria-selected="false">Program costing
                                        details
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link tab_spy" id="instructor-tab" data-toggle="tab" onclick="fire(4)"
                                        role="tab" aria-controls="Classes" aria-selected="false">Instructors
                                    </a>
                                </li> --}}
                            </ul>
                            <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="right" class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-content">
                        @foreach ($tabs as $tab)
                        <div class="tab-pane fade @if($loop->iteration == 1) show active @endif" id="{{$tab->slug}}-tab" role="tabpanel"
                            aria-labelledby="{{ $tab->slug }}-tab">
                            {!! $tab->content !!}
                        </div>
                        @endforeach
                    </div>
                    <div class="boxaccordion mt-4 mb-4">
                        <h5 class="custom_small_heading font-weight-bold custom_heading_1 mb-4">FAQs</h5>
                        @forelse ($faqs as $faq)
                            <div class="containerwidth">
                                <div class="wrapper shadow">
                                    <button class="toggle">
                                        <div class="text-left">
                                            <h6 style=" color: var(--system_secendory_color);"
                                                class="font-weight-bold program-span custom_heading_1">
                                                <i class="fa fa-angle-right font-weight-bold" style="color: #ff7600;"></i>
                                                {{ @$faq->question }}
                                            </h6>
                                        </div>
                                        <i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <p>
                                            {!! @$faq->answer !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No FAQs Found
                        @endforelse
                    </div>
                </div>
                <!-- 3rdmid -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-12">
                    <div class="custom_section_color rounded_section pt-2 px-2 program_tab mb-3">
                        <h5 class="custom_small_heading font-weight-bold custom_heading_1">This Program includes:</h5>
                        <div class="row mx-0 mt-2">
                            @forelse($recent_program as  $program)
                                <div class="col-xl-5 col-lg-5 col-md-6 col-4 cus-mb-5 pl-0 pr-2">
                                    <a href="{{ route('programs.detail', [$program->id]) }}">
                                        <img style="object-fit: cover;" src="{{ getCourseImage($program->icon) }}"
                                             class="img-fluid img_height">
                                    </a>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-6 col-8 p-0">
                                    <p class="p-clamp program-span">
                                        <a class="text-dark" href="{{ route('programs.detail', [$program->id]) }}">
                                            {{ $program->programtitle }}</a>
                                    </p>
                                    <p> {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                        Weeks</p>
                                    <p class="color"> ${{ $program->currentProgramPlan[0]->amount }}</p>
                                </div>
                            @empty
                                <div class="col-md-12 mb-md-5 mb-4">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 20px"
                                                 src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                 alt="">
                                        </div>
                                        <h6>
                                            {{ __('No Program Found') }}
                                        </h6>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="row mx-0 mt-2">
                            @forelse($recent_program as  $program)
                                <div class="col-xl-5 col-lg-5 col-md-6 col-4 cus-mb-5 pl-0 pr-2">
                                    <a href="{{ route('programs.detail', [$program->id]) }}">
                                        <img style="object-fit: cover;" src="{{ getCourseImage($program->icon) }}"
                                             class="img-fluid img_height">
                                    </a>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-6 col-8 p-0">
                                    <p class="p-clamp program-span">
                                        <a class="text-dark" href="{{ route('programs.detail', [$program->id]) }}">
                                            {{ $program->programtitle }}</a>
                                    </p>
                                    <p> {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                        Weeks</p>
                                    <p class="color"> ${{ $program->currentProgramPlan[0]->amount }}</p>
                                </div>
                            @empty
                                <div class="col-md-12 mb-md-5 mb-4">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 20px"
                                                 src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                 alt="">
                                        </div>
                                        <h6>
                                            {{ __('No Program Found') }}
                                        </h6>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                  
                    @if(Settings('resource_center_sidebar_image'))
                   <div class="prog_blk mt-4" style="background-image: url({{ asset(Settings('resource_center_sidebar_image')) }})";>
                    <div class="txt">
                        <div class="rating_star">
                            <div class="stars">
                                
                            <h5 class="text-white">{{Settings('resource_center_image_heading') ?? ''}}</h5>
                            <p class="paragraph_custom_height text-white">
                                {{Settings('resource_center_image_text') ?? ''}}
                            </p>
                            </div>
                        </div>
                    </div>
                   </div>
                  @endif

                    
{{-- socail media section --}}
                    <div class="custom_section_color rounded_section my-4 p-3">
                        <h5 class="custom_small_heading font-weight-bold custom_heading_1 mt-2">Social Links:</h5>
                        <div class="row my-md-4">
                            @foreach($socials as $social)
                            <div class="col-auto py-2">
                                <div class="instabox mt-1 p-2 rounded" style="background-color:{{ $social->color }}; ">
                                    <a target="_blank" href="{{$social->link}}"> <i class="{{ $social->icon }}"
                                        style="color:white;font-size: 30px;"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                </div>
    @include(theme('partials._custom_footer'))

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh5U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function fire(id) {
            if (id == 1) {
                $(".text").addClass("d-none");
                $(".review").addClass("d-none");
                $(".desc").removeClass("d-none");
                $(".instructor_tab").addClass("d-none");
            } else if (id == 2) {
                $(".text").addClass("d-none");
                $(".review").removeClass("d-none");
                $(".desc").addClass("d-none");
                $(".instructor_tab").addClass("d-none");
            } else if (id == 3) {
                $(".text").removeClass("d-none");
                $(".review").addClass("d-none");
                $(".desc").addClass("d-none");
                $(".instructor_tab").addClass("d-none");
            } else {
                $(".instructor_tab").removeClass("d-none");
                $(".review").addClass("d-none");
                $(".desc").addClass("d-none");
                $(".text").addClass("d-none");
            }

        }
    </script>
    </div>

    <script>
        function toggleIcon(add, x) {
            $(add).addClass('d-none');
            if (x == 1) {
                $(add).parent().siblings('.controbtndo').addClass('show');
                $(add).siblings('#minus').removeClass('d-none');
                // $('.minusbtn').removeClass('d-none');
            } else {
                $(add).parent().siblings('.controbtndo').removeClass('show');
                $(add).siblings('#plus').removeClass('d-none');
                // $('.minusbtn').addClass('d-none');
            }
        }
    </script>
    <script>
        $('.custom_slick_slider_02').slick({
            "slidesToShow": 4,
            "pauseOnHover": true,
            "autoplay": true,
            "infinite": true,
            "dots": false,
            "arrows": false,
            "responsive": [{
                    "breakpoint": 1400,
                    "settings": {
                        "slidesToShow": 4
                    }
                },
                {
                    "breakpoint": 1200,
                    "settings": {
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 576,
                    "settings": {
                        "slidesToShow": 1
                    }
                }
            ]
        });
    </script>
    <script>
        let toggles = document.getElementsByClassName("toggle");
        let contentDiv = document.getElementsByClassName("content");
        let icons = document.getElementsByClassName("icon");

        for (let i = 0; i < toggles.length; i++) {
            toggles[i].addEventListener("click", () => {
                if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                    contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                    toggles[i].style.color = "#996699";
                    icons[i].classList.remove("fa-plus");
                    icons[i].classList.add("fa-minus");
                } else {
                    contentDiv[i].style.height = "0px";
                    toggles[i].style.color = "#111130";
                    icons[i].classList.remove("fa-minus");
                    icons[i].classList.add("fa-plus");
                }

                for (let j = 0; j < contentDiv.length; j++) {
                    if (j !== i) {
                        contentDiv[j].style.height = 0;
                        toggles[j].style.color = "#111130";
                        icons[j].classList.remove("fa-minus");
                        icons[j].classList.add("fa-plus");
                    }
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            const $tabsBox = $(".lms_tabmenu"),
                $allTabs = $tabsBox.find(".nav-item"),
                $arrowEventsIcons = $(".eventsIcon i");

            const handleEventsIcons = () => {
                let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
                if (maxScrollableWidth <= 0) {
                    // Hide both arrows if there's no overflow
                    $arrowEventsIcons.parent().css("display", "none");
                } else {
                    // Handle visibility based on scroll position
                    $arrowEventsIcons.eq(0).parent().css("display", $tabsBox.scrollLeft() <= 0 ? "none" :
                        "flex");
                    $arrowEventsIcons.eq(1).parent().css("display", maxScrollableWidth - $tabsBox
                    .scrollLeft() <= 1 ? "none" : "flex");
                }
            };

            // Initial check
            handleEventsIcons();

            $arrowEventsIcons.on("click", function() {
                if ($(this).attr("id") === "left") {
                    $tabsBox.animate({
                        scrollLeft: "-=340"
                    }, 400);
                } else {
                    $tabsBox.animate({
                        scrollLeft: "+=340"
                    }, 400);
                }
            });

            $allTabs.on("click", function() {
                $tabsBox.find(".active").removeClass("active");
                $(this).addClass("active");
            });

            $tabsBox.on("scroll", handleEventsIcons);
            $(window).on("resize", handleEventsIcons); // Check on resize as well
        });
    </script>

@endsection
