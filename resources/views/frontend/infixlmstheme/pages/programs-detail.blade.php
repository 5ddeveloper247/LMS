@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Programs Detail') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css"/>
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
.program-span{
    font-size: 13px;
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

    .p {
        color: #444;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
        font-weight: 300;
        line-height: 24px;
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

    /*
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
                .accordion .card .card-header a {
                    display: block;
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-size: 20px;
                    font-weight: bold;
                } */

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

    /* .expore h5 {
                    font-weight: 700;
                    color: white;
                    font-size: 24px;
                } */

    /* .footerbox1 h5 {
                    font-weight: 700;
                    color: white;
                    font-size: 24px;
                } */

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

    /* .footerbox1 p {
                    line-height: 30px !important;
                    font-size: 17px !important;
                    color: white;
                    cursor: pointer;
                    transition: 1s;
                }

                .footerbox1 p:hover {
                    line-height: 30px !important;
                    font-size: 17px !important;
                    color: #5600;
                    text-decoration: underline;
                }

                .expore p {
                    line-height: 30px !important;
                    font-size: 17px !important;
                    color: white;
                    cursor: pointer !important;
                    transition: 1s;
                }

                .expore p:hover {
                    line-height: 30px !important;
                    font-size: 17px !important;
                    color: #ff5600;
                    text-decoration: underline;
                }

                .icons i {
                    font-size: 12px;
                    padding: 3px;
                    cursor: pointer;
                }

                .icons i:hover {
                    color: #ff1949;

                    font-size: 12px;
                    padding: 3px;
                } */

    .fonts {
        font-size: 17px;
        font-weight: 400;
        text-align: justify;
        margin-top: 3px;
    }

    .img_round {
        border-radius: 10px !important;
        object-fit : cover;
    }

    /* .footercolor {
                    background: #252525;
                } */


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
        /* -webkit-box-shadow: 0 15px 25px rgba(0, 0, 50, 0.2);
        box-shadow: 0 15px 25px rgba(0, 0, 50, 0.2); */
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
        height: 100%;
    }

    .amount_total {
        justify-content: center;
        display: flex;
        flex-direction: column;
        text-align: right
    }

    @media (width < 576px

    ) {
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

    /* @media (width > 1650px) {

         {
            margin-top: 43px !important;
        }

        .image_responsive {
            margin-top: 0px;
        }

        .breadcrumb_area .breadcam_wrap h5 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }


        p {
            font-size: 1.5rem !important;
            line-height: 1.2 !important;
        }

        h5 {
            font-size: 27px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 32px !important;
            line-height: 25px;
        }

        span {
            font-size: 1.5rem !important;


        }

        .lms_tabmenu li a {
            font-size: 26px !important;
        }

        .table.custom_table3 tbody tr td,
        .table.custom_table3 thead tr th {
            font-size: 24px !important;
        }

        .theme_btn {
            font-size: 23px !important;
        }

        .image_responsive {
            padding-top: 17px;
        }

    } */
    /* .prog_blk {
        padding-bottom: 60vh !important;
    } */

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

    .prog_blk > .txt {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(#111));
        /* background: linear-gradient(transparent, #111); */
        color: #fff;
        padding: 4rem 1.5rem 2.5rem;
    }

.banner_img{
    object-fit: fill !important;
}
.program_tab {
    height: 100% !important;
    border-radius: 10px;
}

@media only screen and (max-width: 576px){
    .small_screen {
     flex-direction: column;
     gap: 10px;
}
.program-span {
    font-size: 12px !important;
}
.buttons-padding{
    margin: 7px 0px;
}
}
@media only screen and (max-width: 990px) {

.img_height{
     max-height: 10rem;
     height: 100%;
}
.custom_heading_1 {
       font-size: 1rem !important;
    }
.span_h{
    font-size:12px !important;
}
}

@media only screen and (min-width:991px) and (max-width: 1199px) {

.custom_heading_1 {
       font-size: 1rem !important;
    }
    .program-span{
    font-size: 11px;
}
.theme_btn {
    font-size: 12px !important;
}
.span_h{
    font-size:12px !important;
}
}
@media only screen and (min-width:1800px){
    .program-span{
    font-size: 16px;
}
}
</style>
{{-- @endsection --}}
{{--
@section('js')
@endsection --}}
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
                            <h5 class="text-white custom-heading">Program Details</h5>
                        </div>
                    </div>
                </div> --}}
                <x-breadcrumb :title="'Program Details'"/>
            </div>
        </div>


        <div class="container pt-md-5 pt-3">
            <!-- <div class="px-xl-5 row px-1"> -->
                @php
                    $count_enrolled = 0;
                    if (isset($program_detail->currentProgramPlan[0])) {
                        $count_enrolled = \Modules\CourseSetting\Entities\CourseEnrolled::where('program_id', $program_detail->id)
                            ->where('plan_id', $program_detail->currentProgramPlan[0]->id)
                            ->count();
                    }
                @endphp
                <!-- <div class="col-xl-9 col-lg-9 col-md-8 mt-3 px-2"> -->
                    <!-- first -->
                    <div class="row px-xl-5 small_screen">
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-7 col-12 d-flex justify-content-between">

                            <div class="">
                                <h5 class="font-weight-bold custom_heading_1 mt-1">
                                    {{ $program_detail->programtitle }}
                                </h5>
                                <span class="mt-4 program-span" style="font-weight:400;">{{ $program_detail->subtitle }}</span>
                            </div>

                        <div class="d-flex flex-column justify-content-between">
                            <div class="amount_total">
                                @if (isset($program_detail->currentProgramPlan[0]))
                                    <h4 class="color font-weight-bold custom_heading_1 "
                                          style="margin-left: 6px;">
                                        ${{ $program_detail->currentProgramPlan[0]->amount }}
                                    </h4>
                                    @if (!empty($program_detail->currentProgramPlan[0]->initialProgramPalnDetail[0]))
                                        <small class="program-span"
                                            style="font-size: 15px;">Initial:${{ $program_detail->currentProgramPlan[0]->initialProgramPalnDetail[0]->amount }}</small>
                                    @endif
                                @endif
                            </div>


                        <!-- <div class="row"> -->
                        <div class="buttons-padding d-flex " style="gap: 10px;">
                        @if (Auth::check())
                            @if ($isEnrolled  ||  isAdmin())
                                <a href="javascript:void(0)" class="small_btn theme_btn m-1 ">Enrolled
                                </a>
                            @elseif(isStudent())
                                @if (isset($program_detail->currentProgramPlan[0]) &&
                                       $program_detail->currentProgramPlan[0]->no_of_students > $count_enrolled)
                                    <a href="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $program_detail->currentProgramPlan[0]->id]) }}"
                                       class="small_btn theme_btn text-nowrap">Add
                                        to Cart
                                    </a>
                                    <a href="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $program_detail->currentProgramPlan[0]->id]) }}"
                                       class="small_btn theme_btn text-nowrap">Buy
                                        Now
                                    </a>
                                @else
                                    <a href="javascript:void(0)"
                                       class="bgwebs btn rounded-0 small_btn theme_btn disabled m-1">Enrolled
                                        Complete
                                    </a>
                                @endif
                            @endif
                        @else
                            @if (isset($program_detail->currentProgramPlan[0]) &&
                                    $program_detail->currentProgramPlan[0]->no_of_students > $count_enrolled)
                                <a href="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $program_detail->currentProgramPlan[0]->id]) }}"
                                   class="small_btn theme_btn text-nowrap">Add to
                                    Cart
                                </a>
                                <a href="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $program_detail->currentProgramPlan[0]->id]) }}"
                                   class="small_btn theme_btn text-nowrap">Buy Now
                                </a>
                            @else
                                <a href="javascript:void(0)" class="small_btn theme_btn m-1">Enrolled
                                    Complete
                                </a>
                            @endif
                        @endif
                    </div>

                    </div>
                    </div>
                    <!-- </div> -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-12 ">
                    <div class="custom_section_color rounded_section p-2" style="height: auto;">
                        <h5 class="font-weight-bold custom_heading_1">This Program includes:
                        </h5>
                        <span class="program-span"><i class="fa fa-book-open"></i>&nbsp;&nbsp; Courses |
                            {{ count(json_decode($program_detail->allcourses)) }}
                        </span>
                        <br class="mt-2">
                        @if (isset($program_detail->currentProgramPlan[0]))
                            <span class="program-span"><i class="fa-clock-o fas"></i>&nbsp;&nbsp; Duration |
                                {{ round((strtotime($program_detail->currentProgramPlan[0]->edate) - strtotime($program_detail->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                Weeks
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Enrolled | {{ $count_enrolled }} Students
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Remaining Enrolled |
                                {{ $program_detail->currentProgramPlan[0]->no_of_students - $count_enrolled }}
                            </span>
                            <br class="mt-2">
                        @endif
                    </div>
                    </div>
                    </div>
                    <!-- first-end -->
<!-- 2ndtart -->
<div class="row my-4 px-lg-5 small_screen">
    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-7 col-12">
                    <div class="image_responsive program_image">
                        <img src="{{ getCourseImage($program_detail->image) }}"
                             class="img-fluid w-100 h-100 img_round " style="">
                    </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-12">
                    <div class="custom_section_color d-lg-block d-nonerounded_section pt-2 px-2 program_tab">
                        <h5 class="font-weight-bold custom_heading_1">You May also Like</h5>
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
                                <div class="col-md-12">
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
                    </div>
                    </div>
                    <!--2ndend  -->
                    <!-- 3rdstart -->
                    <div class="row px-lg-5 small_screen mt-4 mb-2 mb-md-4">
                        <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                        <div class="course_tabs">
                            <div class="events_wrapper">
                                <div class="eventsIcon d-xl-none"><i id="left" class="fa-solid fa-angle-left"></i>
                                </div>
                        <ul class="d-flex lms_tabmenu nav w-100 text-center"
                            style="
                        background: #eee;  " id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active tab_spy" id="Overview-tab" data-toggle="tab" onclick="fire(1)"
                                   role="tab" aria-controls="Overview" aria-selected="true">Overview
                                </a>
                            </li>
                            <li>
                                <a class="nav-link tab_spy" id="Curriculum-tab" data-toggle="tab" onclick="fire(2)"
                                   role="tab" aria-controls="Curriculum" aria-selected="false">Courses
                                </a>
                            </li>
                            <li>
                                <a class="nav-link tab_spy" id="Classes-tab" data-toggle="tab" onclick="fire(3)"
                                   role="tab" aria-controls="Classes" aria-selected="false">Program costing details
                                </a>
                            </li>
                            <li>
                                <a class="nav-link tab_spy" id="instructor-tab" data-toggle="tab" onclick="fire(4)"
                                   role="tab" aria-controls="Classes" aria-selected="false">Instructors
                                </a>
                            </li>
                        </ul>
                        <div class="eventsIcon d-xl-none"><i id="right" class="fa-solid fa-angle-right"></i></div>
                    </div>
                    </div>
                    <hr>
                    <div>
                        <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                             aria-labelledby="Overview-tab">
                            <div class="desc">
                                @if ($program_detail->discription)
                                    <h5 class="font-weight-bold custom_heading_1 mb-3"> Program Description</h5>
                                    <div class="row">
                                    	<div class="col-12">
                                         	<div class="table-responsive" style="overflow:hidden;">
                                             	{{-- <iframe id="iframeDesc" style="border:unset;width:100%;"></iframe> --}}
                                                {!! $program_detail->discription !!}
                                      		</div>
                                     		</div>
                                  	</div>
                                    <p></p>
                                    <hr>
                                @endif
                                @if ($program_detail->outcome)
                                    <h5 class="font-weight-bold custom_heading_1 my-3">Program Outcome</h5>
                                    <div class="row">
                                    	<div class="col-12">
                                         	<div class="table-responsive" style="overflow:hidden;">
                                             	{{-- <iframe id="iframeOutcome" style="border:unset;width:100%;"></iframe> --}}
                                                {!! $program_detail->outcome !!}
                                      		</div>
                                     		</div>
                                  	</div>
                                    <p></p>
                                    <hr>
                                @endif
                                @if ($program_detail->requirement)
                                    <h5 class="font-weight-bold custom_heading_1 my-3">Program Requirement</h5>
                                    <div class="row">
                                    	<div class="col-12">
                                         	<div class="table-responsive" style="overflow:hidden;">
                                             	{{-- <iframe id="iframeReq" style="border:unset;width:100%;"></iframe> --}}
                                                {!! $program_detail->requirement !!}
                                      		</div>
                                     		</div>
                                  	</div>
                                    <p></p>
                                    <hr>
                                @endif
                            </div>
                        <div class="review d-none">
                            <div class="card mb-4 p-2">
                                <div class="accordion" id="accordion" role="tablist">
                                    @if (isset($courses))
                                        @foreach ($courses as $course)
                                            <div class="card shadow-sm">
                                                <div
                                                    class="card-header custom_section_color d-flex justify-content-between p-4"
                                                    role="tab" id="heading-{{ $course->id }}">
                                                    <h6 style=" color: var(--system_secendory_color);"
                                                        class="font-weight-bold mb-0">
                                                        {{ @$course->title }}
                                                    </h6>
                                                    <a onclick="toggleIcon(this,1)" id="plus"
                                                       class="float-right p-1" style="cursor:pointer;"><i
                                                            class="fa fa-plus"></i></a>
                                                    <a onclick="toggleIcon(this,2)" id="minus"
                                                       class="d-none float-right p-1" style="cursor:pointer;">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <div id="collapse-{{ $course->id }}" class="controbtndo collapse"
                                                     role="tabpanel" aria-labelledby="heading-{{ $course->id }}"
                                                     data-parent="#accordion">
                                                    @php
                                                        $userRating = userRating($course->user_id);
                                                    @endphp
                                                    <div class="card-body border">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-6 my-1">
                                                                <h5 class="custom_small_heading font-weight-bold">Course Title</h5>
                                                                <p>
                                                                    @if ($is_allow)
                                                                        <a
                                                                            href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}?program_id={{ $program_detail->id }}">
                                                                            {{ @$course->title }}
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)">
                                                                            {{ @$course->title }}
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-6 my-1">
                                                                <h5 class="custom_small_heading font-weight-bold">
                                                                    {{ __('frontend.Course Rating') }}
                                                                </h5>
                                                                <p>
                                                                    @php
                                                                        $main_stars = $course->totalReview;

                                                                        $stars = intval($course->totalReview);
                                                                    @endphp
                                                                    @for ($i = 0; $i < $stars; $i++)
                                                                        <i class="fas fa-star text-warning"></i>
                                                                    @endfor
                                                                    @if ($main_stars > $stars)
                                                                        <i class="fas fa-star-half"></i>
                                                                    @endif

                                                                    @for ($i = 0; $i < 5 - $stars; $i++)
                                                                        <i class="far fa-star"></i>
                                                                    @endfor

                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-6 my-1">
                                                                <h5 class="custom_small_heading font-weight-bold">
                                                                    Course
                                                                    {{ __('frontend.Lectures') }}
                                                                </h5>
                                                                <p>{{ count($course->lessons) }}
                                                                    {{ __('frontend.lessons') }}
                                                                </p>
                                                            </div>

                                                            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-6 my-1">
                                                                <h5 class="custom_small_heading font-weight-bold">
                                                                    {{ __('frontend.Instructor') }}
                                                                </h5>
                                                                <p>
                                                                    {{ @$course->user->name }}
                                                                </p>
                                                            </div>
                                                            <style>
                                                                .courseDescription {
                                                                    height: 105px;
                                                                    overflow: hidden;
                                                                }

                                                                .readmorebtn {
                                                                    background: red;
                                                                    border-radius: 8px;
                                                                    color: white !important;
                                                                    border: 2px solid red !important;
                                                                    transition: 1s;

                                                                }

                                                                .readmorebtn:hover {
                                                                    background: rgb(255, 255, 255);
                                                                    border-radius: 8px;
                                                                    color: rgb(255, 0, 0) !important;
                                                                    border: 2px solid red !important;

                                                                }
                                                            </style>
                                                            <div class="col-12 mt-3 mb-1">
                                                                <div class="courseDescription">
                                                                    <h5 class="custom_small_heading font-weight-bold">
                                                                        Course Description
                                                                    </h5>
                                                                    <p>
                                                                        {!! @$course->about !!}
                                                                    </p>
                                                                </div>
                                                                <button onclick="readmore(this,1)"
                                                                        class="Readmore small_btn theme_btn mt-2 p-2">
                                                                    Readmore
                                                                </button>

                                                                <button onclick="readless(2)"
                                                                        class="added small_btn theme_btn d-none mt-2 p-2">
                                                                    ReadLess
                                                                </button>
                                                                <script>
                                                                    function readmore(id) {
                                                                        $('.courseDescription').height('auto');
                                                                        $(".Readmore").hide();
                                                                        $('.added').removeClass('d-none');
                                                                    }

                                                                    function readless(id) {
                                                                        $('.courseDescription').height('105px');
                                                                        $(".Readmore").show();
                                                                        $('.added').addClass('d-none');
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (count($courses) == 0)
                                        <div class="col-lg-12">
                                            <div
                                                class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                                <div class="thumb">
                                                    <img style="width: 50px"
                                                         src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                         alt="">
                                                </div>
                                                <h1>
                                                    {{ __('No Course Found') }}
                                                </h1>
                                            </div>
                                        </div>
                                    @endif
                                    {{--@if (Auth::check())
                                        @if (!$isEnrolled && isStudent())
                                            <div class="cardBuy mb-3 text-center" style="z-index:9">
                                                <a href="{{ route('buyNow', [$program_detail->id]) }}"
                                                   class="btn small_btn theme_btn m-1">Buy Now
                                                </a>
                                            </div>
                                            <div class="cardBuy" style="background: white;opacity: 0.6;">

                                            </div>
                                        @endif
                                    @else
                                        <div class="cardBuy mb-3 text-center" style="z-index:9">
                                            <a href="{{ route('buyNow', [$program_detail->id]) }}"
                                               class="btn small_btn theme_btn m-1">Buy Now
                                            </a>
                                        </div>
                                        <div class="cardBuy" style="background: white;opacity: 0.6;">

                                        </div>
                                    @endif--}}
                                </div>
                            </div>
                        </div>
                        <div class="text d-none">
                            <h5 class="font-weight-bold">Program costing details</h5>
                            <div class="row">
                             	<div class="col-12">
                               		<div class="table-responsive" >
                                    	{{-- <iframe id="iframeCosting" style="border:unset;width:100%;"></iframe> --}}
                                        {!! $program_detail->payment_plan !!}
                                  	</div>
                             	</div>
                          	</div>
                            <p> </p>
                            <br>
                            <div class="card mb-4 p-2">
                                <div class="accordion" id="accordion" role="tablist">
                                    @if (isset($program_detail->programPlans) && count($program_detail->programPlans) > 0)
                                        @foreach ($program_detail->programPlans as $programPlans)
                                            <div class="card m-0 shadow-sm">
                                                <div
                                                    class="card-header custom_section_color d-flex justify-content-between p-4"
                                                    role="tab" id="heading-{{ $programPlans->id }}">
                                                    <h6 style=" color: var(--system_secendory_color);" class="mb-0">
                                                        <span style="font-size: 22px;font-weight:bold;">
                                                            {{ 'Plan ' . @$programPlans->plan_order }}
                                                            @if (isset($program_detail->currentProgramPlan[0]) && $programPlans->id == $program_detail->currentProgramPlan[0]->id)
                                                                (Current)
                                                            @elseif(\Carbon\Carbon::parse($programPlans->edate)->format('Y-m-d') < \Carbon\Carbon::now()->format('Y-m-d'))
                                                                (Closed)
                                                            @else
                                                                (Pending)
                                                            @endif
                                                            <br/>
                                                        </span>
                                                        <span>
                                                            <u>Duration</u>:
                                                            {{ \Carbon\Carbon::parse($programPlans->sdate)->format('d M Y') }}
                                                            to
                                                            {{ \Carbon\Carbon::parse($programPlans->edate)->format('d M Y') }},
                                                            <u>Class Start</u>:
                                                            {{ \Carbon\Carbon::parse($programPlans->cdate)->format('d M Y') }}
                                                        </span>
                                                    </h6>
                                                    <a onclick="toggleIcon(this,1)" id="plus"
                                                       class="float-right my-2 p-1" style="cursor:pointer;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a onclick="toggleIcon(this,2)" id="minus"
                                                       class="d-none float-right my-2 p-1" style="cursor:pointer;">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <div id="collapse-{{ $programPlans->id }}" class="controbtndo collapse"
                                                     role="tabpanel" aria-labelledby="heading-{{ $programPlans->id }}"
                                                     data-parent="#accordion" style="">
                                                    <div class="card-body border">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="table-responsive">
                                                                    <table class="custom_table3 table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th scope="col">
                                                                                {{ __('common.SL') }}
                                                                            </th>
                                                                            <th scope="col">
                                                                                {{ __('Installments') }}
                                                                            </th>
                                                                            <th scope="col">
                                                                                {{ __('payment.Total Price') }}
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @if (isset($programPlans->programPalnDetail) && count($programPlans->programPalnDetail) > 0)
                                                                            @foreach ($programPlans->programPalnDetail as $plan)
                                                                                <tr>
                                                                                    <td scope="row">
                                                                                        {{ $plan->type + 1 }}
                                                                                    </td>

                                                                                    <td>
                                                                                        @if ($plan->type == 0)
                                                                                            Initial
                                                                                        @else
                                                                                            Installment
                                                                                            {{ $plan->type }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $plan->amount }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                        @if (isset($programPlans->programPalnDetail) && count($programPlans->programPalnDetail) == 0)
                                                                            <div class="col-12">
                                                                                <div class="section__title3 margin_50">
                                                                                    <p class="text-center">
                                                                                        {{ __('No Installment Found') }}
                                                                                        !
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        </tbody>
                                                                    </table>

                                                                    <div style="float: left">
                                                                        ({{ $programPlans->programPlanViseEnrollCount }}
                                                                        /{{ $programPlans->no_of_students }}
                                                                        )
                                                                    </div>
                                                                    <div style="float: right">
                                                                        @if (\Carbon\Carbon::parse($programPlans->edate)->format('Y-m-d') > \Carbon\Carbon::now()->format('Y-m-d'))
                                                                            @if (Auth::check())
                                                                                @if ($programPlans->isProgramPlanViseEnroll || isAdmin())
                                                                                    <a href="javascript:void(0)"
                                                                                       class="bgwebs btn small_btn theme_btn m-1">Enrolled
                                                                                    </a>
                                                                                @elseif(isStudent())
                                                                                    <a href="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $programPlans->id]) }}"
                                                                                       class="bgwebs btn small_btn theme_btn m-1">Add
                                                                                        to
                                                                                        Cart
                                                                                    </a>
                                                                                    <a href="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $programPlans->id]) }}"
                                                                                       class="bgwebs btn small_btn theme_btn m-1">Buy
                                                                                        Now
                                                                                    </a>
                                                                                @endif
                                                                            @else
                                                                                <a href="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $programPlans->id]) }}"
                                                                                   class="bgwebs btn small_btn theme_btn m-1">Add
                                                                                    to Cart
                                                                                </a>
                                                                                <a href="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $programPlans->id]) }}"
                                                                                   class="bgwebs btn small_btn theme_btn m-1">Buy
                                                                                    Now
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a href="javascript:void(0)"
                                                                               class="bgwebs btn small_btn theme_btn m-1">Closed
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if (isset($program_detail->programPlans) && count($program_detail->programPlans) == 0)
                                        <div class="col-lg-12">
                                            <div
                                                class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                                <div class="thumb">
                                                    <img style="width: 50px"
                                                         src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                         alt="">
                                                </div>
                                                <h1>
                                                    {{ __('No Plan Found') }}
                                                </h1>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <style>
                            .single_qualification_1 {
                                display: flex;
                                align-items: center;
                                font-size: 16px;
                                font-weight: 500;
                                font-family: Jost, sans-serif;
                                margin-bottom: 10px;
                            }

                            .single_qualification_1 i {
                                font-size: 22px;
                                font-weight: 400;
                                margin-right: 15px;
                            }

                        </style>
                        <div class="instructor_tab d-none">
                            {{--                            <div class="instractor_title mb-5">--}}
                            {{--                                <h5 class="font_22 f_w_700">Instructor</h5>--}}
                            {{--                                <p class="font_16 f_w_400"></p>--}}
                            {{--                            </div>--}}
                            @if (count($courses->unique('user_id')))
                                @foreach ($courses->unique('user_id') as $course)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumb">
                                                <img class="w-100" style="border-radius:25px;"
                                                     src="{{ getInstructorImage($course->user->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="instractor_details_info">
                                                <a
                                                    href="javascript:void(0)">
                                                    {{-- href="{{ route('instructorDetails', [$course->user->id, $course->user->name]) }}"> --}}
                                                    <h5 class="font_22 f_w_700">{{ $course->user->name }}</h5>
                                                </a>
                                                <h5> {{ $course->user->headline }}</h5>
                                                <div class="ins_details">
                                                    <p> {{ $course->user->short_details }}</p>
                                                </div>
                                                @php
                                                    $userRating = userRating($course->user_id);
                                                @endphp
                                                <div class="intractor_qualification mt-4">
                                                    <div class="single_qualification_1">
                                                        <i class="ti-star"></i> {{ $userRating['rating'] }}
                                                        {{ __('frontend.Rating') }}
                                                    </div>
                                                    <div class="single_qualification_1">
                                                        <i class="ti-comments"></i> {{ $userRating['total'] }}
                                                        {{ __('frontend.Reviews') }}
                                                    </div>
                                                    <div class="single_qualification_1">
                                                        <i class="ti-user"></i> {{ $course->user->totalEnrolled() }}
                                                        {{ __('frontend.Students') }}
                                                    </div>
                                                    <div class="single_qualification_1">
                                                        <i class="ti-layout-media-center-alt"></i>
                                                        {{ $course->user->totalCourses() }}
                                                        {{ __('frontend.Courses') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="mt-4 mb-3">
                                                {!! $course->user->about !!}
                                            </p>
                                        </div>
                                    </div>
                                    @php
                                        $limit_courses = $course->user->courses()
                                                            ->where('id', '!=', $course->id)
                                                            ->whereIn('type', [2, 4, 5, 6, 7])
                                                            ->where('price', '!=', '0.00')
                                                            ->where('status', 1)
                                                            ->orderBy('created_at','DESC')
                                                            ->limit(3)->get();
                                    @endphp
                                    <div class="border-bottom mb-3 pb-4">
                                        <div class="section__title">
                                            @if (count($limit_courses) == 0)
                                                <h5 class="font-weight-bold mb-0">{{ __('No more Prep-Course by Author') }}
                                                </h5>
                                            @else
                                                <h5 class="font-weight-bold mb-3">{{ __('More Prep-Course by Author') }}
                                                </h5>
                                            @endif
                                        </div>
                                        <div class="row">
                                            @foreach ($limit_courses as $course)
                                                @if ($course->type == 2)
                                                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="quiz_wizged card rounded-card shadow">
                                                            <a
                                                                href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">
                                                                <div class="thumb rounded-card-img">
                                                                    <img src="{{ getCourseImage($course->thumbnail) }}"
                                                                         alt=""
                                                                         class="img-fluid w-100">
                                                                    <x-price-tag :price="$course->price"
                                                                                 :discount="$course->discount_price"/>
                                                                    <span class="quiz_tag">{{ __('Big Quiz') }}</span>
                                                                </div>
                                                            </a>

                                                            <div class="card-body course_content">
                                                                <a
                                                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">
                                                                    <h5 class="noBrake" title=" {{ $course->title }}">
                                                                        {{ $course->title }}
                                                                    </h5>
                                                                </a>
                                                                <div class="rating_cart">
                                                                    <div class="rateing">
                                                                        <span>{{ $course->totalReview }} | 5</span>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                    @if (!onlySubscription())
                                                                        @auth()
                                                                            @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                                            @endif
                                                                        @endauth
                                                                        @guest()
                                                                            @if (!$course->isGuestUserCart)
                                                                            @endif
                                                                        @endguest
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    class="course_less_students d-flex justify-content-between">
                                                                    <small class="small_tag_color"> <i
                                                                            class="ti-agenda"></i>
                                                                        {{ count($course->quiz->assign) }}
                                                                        {{ __('frontend.Question') }}</small>
                                                                    <small class="small_tag_color">
                                                                        <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                        {{ __('frontend.Students') }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @elseif ($course->type == 4 || $course->type == 5 || $course->type == 6 || $course->type == 7)
                                                    <div class="col-sm-6 col-md-4 col-xl-3 d-flex justify-content-center mb-md-4 mb-3">
                                                        <div class="quiz_wizged card rounded-card shadow">
                                                            <a
                                                                href="{{ !empty($course->parent_id) ? courseDetailsUrl(@$course->parent->id, @$course->type, @$course->parent->slug) . '?courseType=' . $course->type : courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">

                                                                <div class="thumb rounded-card-img">
                                                                    <img src="{{ getCourseImage($course->thumbnail) }}"
                                                                         class="img-fluid w-100 rounded-card-img"
                                                                         alt="">

                                                                    <x-price-tag :price="$course->price"
                                                                                 :discount="$course->discount_price"/>
                                                                    @if ($course->type == 4)
                                                                        <span
                                                                            class="quiz_tag">{{ __('Full Course') }}</span>
                                                                    @elseif($course->type == 5)
                                                                        <span
                                                                            class="quiz_tag">{{ __('Prep-Course') }}<small>(On-Demand)</small></span>
                                                                    @elseif($course->type == 7)
                                                                        <span
                                                                            class="quiz_tag">{{ __('Time Table') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="quiz_tag">{{ __('Prep-Course') }}<small>(Live)</small></span>
                                                                    @endif
                                                                </div>
                                                            </a>


                                                            <div class="card-body course_content">
                                                                <a
                                                                    href="{{ !empty($course->parent_id) ? courseDetailsUrl(@$course->id, @$course->type, @$course->parent->slug) . '?courseType=' . $course->type : courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">
                                                                    <h5 class="noBrake"
                                                                        title=" {{ !empty($course->parent_id) ? $course->parent->title : $course->title }}">
                                                                        {{ !empty($course->parent_id) ? $course->parent->title : $course->title }}
                                                                    </h5>
                                                                </a>
                                                                <div class="rating_cart">
                                                                    <div class="rateing">
                                                        <span>{{ !empty($course->parent_id) ? $course->parent->totalReview : $course->totalReview }}
                                                            | 5</span>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                    @if (!onlySubscription())
                                                                        @auth()
                                                                            @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                                            @endif
                                                                        @endauth
                                                                        @guest()
                                                                            @if (!$course->isGuestUserCart)
                                                                            @endif
                                                                        @endguest
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    class="course_less_students d-flex justify-content-between">

                                                                    @if ($course->type == 6)
                                                                        <small class="small_tag_color"> <i
                                                                                class="ti-agenda"></i>
                                                                            {{ count($course->parent->classes) }}
                                                                            {{ __('Classes') }}</small>
                                                                    @else
                                                                        @if ($course->type != 7)
                                                                            <small class="small_tag_color"> <i
                                                                                    class="ti-agenda"></i>
                                                                                {{ count($course->parent->chapters) }}
                                                                                {{ __('Chapters') }}</small>
                                                                        @endif
                                                                    @endif
                                                                    @if ($course->type == 2 || $course->type == 7)
                                                                        <small class="small_tag_color">
                                                                            <i class="ti-user"></i> {{ $course->total_enrolled }}
                                                                            {{ __('frontend.Students') }}
                                                                        </small>
                                                                    @else
                                                                        <small class="small_tag_color">
                                                                            <i class="ti-user"></i>
                                                                            {{ $course->course_enrolled_count }}
                                                                            {{ __('frontend.Students') }}
                                                                        </small>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="boxaccordion mt-4 mb-4">
                                    <h5 class="font-weight-bold custom_heading_1 mb-4">FAQs</h5>
                                    @forelse ($faqs as $faq)
                                        <div class="containerwidth">
                                            <div class="wrapper shadow">
                                                <button class="toggle">
                                                    <div class="text-left">
                                                        <h6  style=" color: var(--system_secendory_color);"
                                                            class="font-weight-bold program-span custom_heading_1">
                                                            <i class="fa fa-angle-right font-weight-bold"
                                                               style="color: #ff7600;"></i>
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
                    <div class=" custom_section_color rounded_section mb-4 p-2" style="height: auto;">
                        <h5 class="font-weight-bold custom_heading_1">This Program includes:
                        </h5>
                        <span class="program-span"><i class="fa fa-book-open"></i>&nbsp;&nbsp; Courses |
                            {{ count(json_decode($program_detail->allcourses)) }}
                        </span>
                        <br class="mt-2">
                        @if (isset($program_detail->currentProgramPlan[0]))
                            <span class="program-span"><i class="fa-clock-o fas"></i>&nbsp;&nbsp; Duration |
                                {{ round((strtotime($program_detail->currentProgramPlan[0]->edate) - strtotime($program_detail->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                Weeks
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Enrolled | {{ $count_enrolled }} Students
                            </span>
                            <br class="mt-2">
                            <span class="program-span"><i class="fas fa-user"></i>&nbsp;&nbsp; Remaining Enrolled |
                                {{ $program_detail->currentProgramPlan[0]->no_of_students - $count_enrolled }}
                            </span>
                            <br class="mt-2">
                        @endif
                    </div>
                    <!-- <div
                        class="custom_section_color d-lg-block d-none my-md-3 rounded_section my-2 pt-2 px-2 course_tab">
                        <h5 class="font-weight-bold">You May also Like</h5>
                        <div class="row mx-0 mt-2">
                            @forelse($recent_program as  $program)
                                <div class="col-xl-5 col-lg-5 col-md-6 cus-mb-5 pl-0 pr-2">
                                    <a href="{{ route('programs.detail', [$program->id]) }}">
                                        <img style="object-fit: cover;" src="{{ getCourseImage($program->icon) }}"
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-6 p-0">
                                    <p class="p-clamp program-span">
                                        <a class="text-dark" href="{{ route('programs.detail', [$program->id]) }}">
                                            {{ $program->programtitle }}</a>
                                    </p>
                                    <p> {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                        Weeks</p>
                                    <p class="color"> ${{ $program->currentProgramPlan[0]->amount }}</p>
                                </div>
                            @empty
                                <div class="col-md-12">
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
                    </div> -->
                    <div class="custom_section_color rounded_section mb-1 p-2">
                        <h5 class="font-weight-bold custom_heading_1">Start Your Application:</h5>
                        <p class="my-1 program-span"><i class="fa fa-calendar-days"></i>&nbsp;&nbsp; Current Cohort End :
                            @if (isset($program_detail->currentPlan[0]))
                                {{-- <br class="mt-2"> --}}
                                <span class="font-weight-bold">
                                    {{ \Carbon\Carbon::parse($program_detail->currentPlan[0]->edate)->format('d M Y') }}</span>
                            @else
                                <span class="font-weight-bold">Not Given</span>
                            @endif
                        </p>
                        <p class="my-1 program-span"><i class="fa fa-calendar-days"></i>&nbsp;&nbsp; Next Cohort Start :
                            @if (isset($program_detail->nextPlans[0]))
                                {{-- <br class="mt-2"> --}}
                                <span
                                    class="font-weight-bold">{{ \Carbon\Carbon::parse($program_detail->nextPlans[0]->sdate)->format('d M Y') }}</span>
                            @else
                                <span class="font-weight-bold">Not Given</span>
                            @endif
                        </p>
                        @if (isset($program_detail->programPlans))
                            <div class="row mt-3 text-center">
                                @if (!Auth::user())
                                    <div class="col-12">
                                        <a href="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $program_detail->currentProgramPlan[0]->id]) }}" class="theme_btn small_btn4 px-2 pt-1 pb-2">Apply
                                            Now</a>
                                    </div>
                                @endif
                                <div class="col-12 mb-1 mt-2">
                                    <a href="{{ route('application-requirements') }}" class="program-span">Application
                                        Requirements</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($program_detail->review_id != '0' && !empty($program_detail->review()))
                        @if(!empty($program_detail->review()->first()))

                        <div class="prog_blk mt-4" style="background-image: url({{ !empty($program_detail->review()->first()->user()) ? asset($program_detail->review()->first()->user()->first()->image)  : asset('public/assets/c1.jpg') }})">
                            <div class="txt">
{{--                                @dd($program_detail->review()->first()->course())--}}
									<h6>
		                                    <div class="rating_star">
		                                        <div class="stars">
		                                            @php
		                                                $main_stars = $program_detail->review()->first()->star;
		                                                $stars = intval($program_detail->review()->first()->star);
		                                            @endphp
		                                            @for ($i = 0; $i < $stars; $i++)
		                                                <i class="fas fa-star"></i>
		                                            @endfor
		                                            @if ($main_stars > $stars)
		                                                <i class="fas fa-star-half"></i>
		                                            @endif
		                                            @if ($main_stars == 0)
		                                                @for ($i = 0; $i < 5; $i++)
		                                                    <i class="far fa-star"></i>
		                                                @endfor
		                                            @endif
		                                        </div>
		                                    </div>
		                                </h6>
                                <h5 class="text-white"> {{ $program_detail->review()->first()->user()->first()->name }} </h5>

                                <h5 class="text-white"> {{ !empty($program_detail->review()->first()->course()) ? $program_detail->review()->first()->course()->first()->title : '' }}</h5>
                                <p class="paragraph_custom_height text-white">
                                    {{ $program_detail->review()->first()->comment }}
                                </p>
                            </div>
                        </div>
                        @endif
                    @endif

                    <div class="custom_section_color rounded_section my-4 p-3">
                        <h5 class="font-weight-bold custom_heading_1 mt-2">Social Links:</h5>
                        <div class="row my-md-4">
                            <div class="col-auto">
                                <div class="instabox">
                                    <a target="_blank" href="https://www.facebook.com/merakiicollege"
                                    {{-- href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"> --}}
                                    <i class="fa-brands fa-square-facebook"
                                       style="color: #395799;font-size: 50px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="instabox mt-1"
                                     style="
                                background: #000;
                                border-radius: 6px;
                                width: 46px;
                                height: 44px;
                            ">
                                    <a target="_blank"
                                       href="https://www.tiktok.com/@merakiinursing" {{-- href="https://twitter.com/intent/tweet?text={{ $program_detail->programtitle }}&amp;url={{ URL::current() }}"> --}}
                                    <i class="fa-brands fa-tiktok mt-2 px-1" style="color: #fff;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="instabox">
                                    <a target="_blank"
                                       href="https://pinterest.com/pin/create/link/?url={{ URL::current() }}&amp;description={{ $program_detail->programtitle }}">
                                        <i class="fa-brands fa-square-youtube" style="color: red;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="instabox">
                                    <a target="_blank" href="https://www.instagram.com/merakiinursing/"
                                    {{-- href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::current() }}&amp;title={{ $program_detail->programtitle }}&amp;summary={{ $program_detail->programtitle }}"> --}}
                                    <i class="fa fa-instagram-square"
                                       style="color: var(--system_primery_color);font-size: 50px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- 3rdend -->
                        <!-- 4thstart -->
                        <!-- <div class="row px-xl-5 my-4">
                            <div class="col-12">
                                <div class="boxaccordion mt-2 mb-5">
                                    <h5 class="font-weight-bold custom_heading_1 mb-4">FAQs</h5>
                                    @forelse ($faqs as $faq)
                                        <div class="containerwidth">
                                            <div class="wrapper shadow">
                                                <button class="toggle">
                                                    <div class="text-left">
                                                        <h6  style=" color: var(--system_secendory_color);"
                                                            class="font-weight-bold program-span custom_heading_1">
                                                            <i class="fa fa-angle-right font-weight-bold"
                                                               style="color: #ff7600;"></i>
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
                        </div> -->
                        </div>
                        <!-- 4thend -->
            <div class="row custom_slick_slider_02 d-lg-none d-none mx-0 my-3 mb-4 text-center">
                @forelse($recent_program as  $program)
                    <div class="px-2">
                        <div class="card rounded-0 shadow">
                            <div class="card-header p-0">
                                <a href="{{ route('programs.detail', [$program->id]) }}">
                                    <img style="" src="{{ getCourseImage($program->icon) }}"
                                         class="img-fluid w-100">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-bold custom_heading_1">
                                    <a href="{{ route('programs.detail', [$program->id]) }}">
                                        @if (Str::length($program->programtitle) > 25)
                                            {{ Str::limit($program->programtitle, 25, '...') }}
                                        @else
                                            {{ Str::limit($program->programtitle, 25) }}
                                        @endif
                                    </a>
                                </h5>
                                <p class="pb-1">
                                    @if (Str::length($program->subtitle) > 25)
                                        {{ Str::limit($program->subtitle, 25, '...') }}
                                    @else
                                        {{ $program->subtitle }}
                                    @endif
                                </p>
                                <div class="row justify-content-between pt-1">
                                    <div class="col-auto">
                                        <small>
                                            <i class="fas fa-clock"></i>
                                            {{ round((strtotime($program->currentProgramPlan[0]->edate) - strtotime($program->currentProgramPlan[0]->sdate)) / 604800, 1) }}
                                            Weeks
                                        </small>
                                    </div>
                                    <div class="font-weight-bold col-auto custom_heading_1">
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
                                <img style="width: 20px"
                                     src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                            </div>
                            <h6>
                                {{ __('No Program Found') }}
                            </h6>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    @include(theme('partials._custom_footer'))

    <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
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

                // var iframeCosting = document.getElementById("iframeCosting");
        	    // var iframeDocCosting = iframeCosting.contentDocument || iframeCosting.contentWindow.document;
        	   	// var bodyHeight4 = iframeDocCosting.body.querySelector("div").scrollHeight + 30;
        	    // $("#iframeCosting").css('height', bodyHeight4);
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
	$(document).ready(function () {

		// set outcome iframe
	    // var iframeOutcome = document.getElementById("iframeOutcome");
	    // var iframeDocOutcome = iframeOutcome.contentDocument || iframeOutcome.contentWindow.document;
	    // var dynamicDivOutcome = document.createElement("div");

	    // dynamicDivOutcome.innerHTML = '';

	    // iframeDocOutcome.body.appendChild(dynamicDivOutcome);

	    // var bodyHeight1 = iframeDocOutcome.body.querySelector("div").scrollHeight + 30;
	    // $("#iframeOutcome").css('height', bodyHeight1);


	 // set Description iframe
	    // var iframeDesc = document.getElementById("iframeDesc");
	    // var iframeDocDesc = iframeDesc.contentDocument || iframeDesc.contentWindow.document;
	    // var dynamicDivDesc = document.createElement("div");

	    // dynamicDivDesc.innerHTML = '{!! $program_detail->discription !!}';

	    // iframeDocDesc.body.appendChild(dynamicDivDesc);

	    // var bodyHeight2 = iframeDocDesc.body.querySelector("div").scrollHeight + 30;
	    // $("#iframeDesc").css('height', bodyHeight2);


	 // set Requirement iframe
	    // var iframeReq = document.getElementById("iframeReq");
	    // var iframeDocReq = iframeReq.contentDocument || iframeReq.contentWindow.document;
	    // var dynamicDivReq = document.createElement("div");

	    // dynamicDivReq.innerHTML = '{!! $program_detail->requirement !!}';

	    // iframeDocReq.body.appendChild(dynamicDivReq);

	    // var bodyHeight3 = iframeDocReq.body.querySelector("div").scrollHeight + 30;
	    // $("#iframeReq").css('height', bodyHeight3);

	 // set Requirement iframe
	    // var iframeCosting = document.getElementById("iframeCosting");
	    // var iframeDocCosting = iframeCosting.contentDocument || iframeCosting.contentWindow.document;
	    // var dynamicDivCosting = document.createElement("div");

	    // dynamicDivCosting.innerHTML = '{!! $program_detail->payment_plan !!}';

	    // iframeDocCosting.body.appendChild(dynamicDivCosting);

	    // var bodyHeight4 = iframeDocCosting.body.querySelector("div").scrollHeight + 30;
	    // $("#iframeCosting").css('height', bodyHeight4);


	});

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
            $arrowEventsIcons.eq(0).parent().css("display", $tabsBox.scrollLeft() <= 0 ? "none" : "flex");
            $arrowEventsIcons.eq(1).parent().css("display", maxScrollableWidth - $tabsBox.scrollLeft() <= 1 ? "none" : "flex");
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
