@extends(theme('layouts.master'))

@section('title')

    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontend.Blog') }}

@endsection



    <style>

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



        .section-margin-y {

            margin: 60px auto !important;

        }

        .blog_page_wrapper .single_blog .thumb {

            margin-bottom: 18px !important;

        }



        .blog_page_wrapper .single_blog .blog_meta span {

            margin-bottom: 0px !important;

        }

        @media (width > 1650px) {

        p {

            font-size: 21px !important;

            line-height: 1.2 !important;

        }



        .breadcrumb_area .breadcam_wrap h3 {

            font-size: 100px !important;

            font-weight: 900;

            line-height: 76px;

            color: #fff;

        }

    }

    </style>



@section('js')

    <script src="{{ asset('public/frontend/infixlmstheme/js/blogs.js') }}"></script>

@endsection



@section('mainContent')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12 px-0">

                <div class="breadcrumb_area position-relative">

                    <div class="w-100 h-100 position-absolute bottom-0 left-0">

                        <img alt="Banner Image" class="w-100 h-100 img-cover"

                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">

                    </div>

                    <div class="col-lg-9 offset-lg-1">

                        <div class="breadcam_wrap">&nbsp;

                            <h3 class="text-white">Blogs</h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- <x-breadcrumb :banner="$frontendContent->blog_page_banner"

                  :title="$frontendContent->blog_page_title"

                  :subTitle="$frontendContent->blog_page_sub_title"/> --}}

<div class="container">

    <x-blog-page-section />



</div>



@endsection

