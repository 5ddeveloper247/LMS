@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $blog->title ?? '' }}
@endsection

<style>
    .footerbox h4 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox {
        padding: 25px;
        margin-left: 0%;
    }

    .expore h4 {
        font-weight: 700;
        color: white;
        font-size: 24px;
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
        color: rgb(255, 0, 0);
        text-decoration: underline;
    }

    .footerbox1 h4 {
        font-weight: 700;
        color: white;
        font-size: 24px;
    }

    .footerbox h5 {
        font-weight: 400;
    }

    .footerbox p {
        line-height: 30px !important;
        font-size: 16px !important;
        color: white;
        cursor: pointer !important;

    }

    .footerbox p:hover {
        line-height: 30px !important;
        font-size: 16px !important;
        color: rgb(248, 0, 0);
    }

    .footerbox1 p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer;
        transition: 1s;
    }

    .footerbox1 p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: rgb(255, 0, 0);
        text-decoration: underline;
    }

    .footercolor {
        /* background: #252525; */
    }

    .blog-detail-img {
        height: 80vh;
        object-fit: cover;
    }

    .set-title {
        position: absolute;
        top: 255px;
        font-size: 48px;
        left: 61px;
        color: white;
    }

    @media(width < 576px) {
        .blog-detail-img {
            height: 40vh !important;
            object-fit: cover;
        }

        .social_btns {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
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

        .social_btn {
            border-radius: 5px;
            font-family: Source Sans Pro, sans-serif;
            font-size: 22px !important;
            color: #fff;
            font-weight: 600;
            padding: 13px 20px;
            text-transform: capitalize;
            display: inline-block;
        }
    }
</style>

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/blogs.js') }}"></script>
@endsection
@section('og_image')
    {{ asset($blog->image) }}
@endsection
@section('mainContent')
    <div class="container-fluid">
        <x-blog-details-page-section :blog="$blog" />
    </div>
    @include(theme('partials._custom_footer'))
@endsection
