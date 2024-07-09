@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Blog') }}
@endsection

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        width: 100%;
    }

    .card {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border: none;
    }

    .card span {
        font-size: 16px;
        color: #373737;
    }

    .card a {
        text-decoration: none;
        color: var(--system_secendory_color);
        font-weight: 700;
        font-size: 18px;
    }

    /* .search h5 {
        font-size: 18px;
    } */

    .search-input-field {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border-radius: 10px;
        margin-bottom: 30px;
        padding: 30px 30px 30px 30px;
    }

    form.search-input-field input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        /* background: #f1f1f1; */
    }

    form.search-input-field button {
        float: left;
        width: 20%;
        padding: 14px;
        background: var(--system_primery_color);
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.search-input-field button:hover {
        background: var(--system_primery_color);
    }

    form.search-input-field::after {
        content: "";
        clear: both;
        display: table;
    }

    input {
        border: 1px solid #0000001c;
        padding: 1rem 1.5rem;
        width: 100%;
    }

    .aurthor-card {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border-radius: 10px;
    }

    /* .aurthor h5 {
        font-size: 18px;
    } */

    /* .recent-post h5 {
        font-size: 18px;
    } */

    .recent-post-card {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border-radius: 10px;
    }

    .popular-tags h5 {
        /* font-size: 18px; */
    }

    .popular-tag-links {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border-radius: 10px;
    }

    .popular-tag-links a {
        text-decoration: none;
        color: #000;
        border: 1px solid #00000019;
        padding: 0.5rem 1rem;
    }

    /* .categories h5 {
        font-size: 18px;
    } */

    .categories-card {
        background-color: #fff;
        box-shadow: 0px 0px 55px 0px #00000026;
        border-radius: 10px;
    }

    .categories-card a {
        color: #000000b0;
        text-decoration: none;
        font-weight: 700;
    }

    .categories-card small {
        color: #000000b0;
        font-weight: 700;
        font-size: 18px;
    }

    .tag {
        border: 1px solid #00000021;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .post {
        background-color: #ffeaee;
    }

    textarea {
        background-color: #eeeeee;
        width: 100%;
        border: 1px solid #00000021;
    }

    .user-name {
        background-color: #eeeeee;
    }

    .user-email {
        background-color: #eeeeee;
    }

    .user-website {
        background-color: #eeeeee;
    }

    .submit-btn {
        background-color: var(--system_primery_color);
        color: #fff;
        padding: 0.3rem 1rem;
        border: none;
    }

    .blog-gap {
        gap: 10px;
    }

    .fw-bold {
        font-weight: 700;
    }

    .custom-img {
        height: 450px !important;

    }

    @media only screen and (min-width: 1800px) {
        .custom-img {
            height: 615px !important;
        }
         h5 {
    font-size: 25px;
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
                {{-- <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 img-cover"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h3 class="text-white custom-heading">Blogs</h3>
                        </div>
                    </div>
                </div> --}}
                <x-breadcrumb />
            </div>
        </div>
    </div>

    <div class="container">
        <x-blog-page-section />

    </div>
    @include(theme('partials._custom_footer'))
@endsection
