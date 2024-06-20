@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Courses') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
{{-- @section('css') --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .accent-color {
        accent-color: #ff7600 !important;
    }
    .select2-container {
        width: 100% !important;
    }
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 37px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 36px !important;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }
    .footerbox h4 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox {

        padding: 25px;

        margin-left: 0%;

    }

    /* .expore h4 {
        font-weight: 700;
        color: white;
        font-size: 24px;
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
        color: #ff6700;
    }

    .footerbox1 p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer;
        transition: 0.5s;
    }

    .footerbox1 p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color:#ff6700;
        text-decoration: underline;
    }

    .expore p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white;
        cursor: pointer !important;
        transition: 0.5s;
    }

    .expore p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: #ff6700;
        text-decoration: underline;
    } */
    .breadcam_wrap {
        max-width: unset !important;
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

    .section-margin-y {
        margin: 60px auto !important;
    }
    #filter_btn {
        color: #ff7600 !important;
    }
    .bs-canvas-overlay {
   		opacity: 0.85;
		z-index: 1000;
	}
	
	.bs-canvas {
		top: 0;
		z-index: 1000;
        padding: 130px 30px 40px 40px;
		overflow-x: hidden;
		overflow-y: auto;
		width: 330px;
		transition: margin .4s ease-out;
		-webkit-transition: margin .4s ease-out;
		-moz-transition: margin .4s ease-out;
		-ms-transition: margin .4s ease-out;
	}
	
	.bs-canvas-left {
		left: 0;
		margin-left: -330px;
	}
	
	.bs-canvas-right {
		right: 0;
		margin-right: -330px;
	}
    /* h2, h3{
    font-size: clamp(18px, 30px, 40px) !important;
   }  */
.img-thumb{
    object-fit: none;
}
   @media only screen and (max-width: 350px){
    /* .thumb-height {
    height: 170px;
    width: 100%;
} */
h2, h3{
    font-size: 14px !important;
}
.filter_btn{
    font-size: 12px !important;
}
.course-small{
    font-size: 12px !important;
   }
   }
    @media only screen and (min-width: 359px) and (max-width: 767px){
        /* .thumb-height {
    height: 210px;
    width: 100%;
} */
        h2, h3{
    font-size: 17px!important;
   } 
   .course-small{
    font-size: 13px !important;
   }
   /* .filter_btn{
    font-size: 1px !important;
} */
    }
@media only screen and (min-width: 1800px){
    .thumb-height{
        height: 400px;
    }
    .img-thumb{
        object-fit: cover;
    }
}
</style>
{{-- @endsection --}}

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/classes.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            $('#categories').select2();
            $('#sub_categories').select2();
            $(document).on('click', '.pull-bs-canvas-left', function(){
                $('body').prepend('<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                console.log(this);
                if($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });
            
            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function(){
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $('.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });
        });
        </script>
@endsection
@section('mainContent')
    @php
        $frontendContent->quiz_page_title = 'Prep-Course';
    @endphp
    <x-breadcrumb :banner="$frontendContent->quiz_page_banner" :title="$frontendContent->quiz_page_title" :subTitle="$frontendContent->quiz_page_sub_title" />
    {{-- @dd($frontendContent->quiz_page_title) --}}
    <x-quiz-page-section :request="$request" :categories="$categories" :languages="$languages" />

    @include(theme('partials._custom_footer'))
@endsection
