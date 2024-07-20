@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Programs') }}
@endsection
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

    .thumb_heading {
        white-space: nowrap;
        width: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .accent-color {
        accent-color: #ff7600 !important;
    }

    .banner_img {
        object-fit: fill;
    }

    .img-cover {
        min-height: auto !important;
    }
    .our_nursing_h{
        font-family: Monospace;
        box-shadow: 0px 16px 35px 2px  rgb(153, 102, 153, 0.63)!important;
    }
</style>

@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">

                <x-breadcrumb :title="'Nursing School'" />
            </div>
        </div>
        <div class="container custom-padd px-lg-5 py-md-5 py-4">
            <div class="row px-4">
                <div class="col-12 my-md-5 my-4">

                    <h2 class="custom_small_heading our_nursing_h font-weight-bold text-center">Something Awesome is on the Way...</h2>

                </div>
            </div>
        </div>
    </div>





    @include(theme('partials._custom_footer'))
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
  
@endsection
