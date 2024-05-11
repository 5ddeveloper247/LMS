@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $course->title }}
@endsection


<style>
    iframe {
        position: relative !important;
    }

    .quiz__details {
        padding: 15px 0 !important;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .table-responsive {
        overflow-x: clip !important
    }

    .theme_color2 {
        color: var(--system_primery_color);
    }

    @media (width > 1650px) {
        .rating_font {
            font-size: 19px !important
        }

        .quiz_test_wrapper .quiz_test_body .quiz_test_info li {
            grid-template-columns: 110px auto !important;

        }

        .quiz_test_wrapper .quiz_test_body .quiz_test_info li span {
            font-size: 22px !important;
        }

        .breadcrumb_area .breadcam_wrap h3 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }

        p {
            font-size: 22px !important
        }

        h4 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        h6 {
            font-size: 1.4rem !important;
        }

        .theme_btn,
        .theme_line_btn,
        #Overview-tab,
        #Reviews-tab {
            font-size: 23px !important;
        }


    }
</style>
<link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/class_details.css') }}" />
<link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/quiz_details.css') }}" />

@section('og_image')
    {{ asset($course->image) }}
@endsection
@section('mainContent')
    @if ($course->type == 2)
        <x-breadcrumb :banner="$frontendContent->quiz_page_banner" :title="trans('Big Quiz Details')" :subTitle="$course->title" />
    @else
        <x-breadcrumb :banner="$frontendContent->quiz_page_banner" :title="trans('frontend.Quiz Details')" :subTitle="$course->title" />
    @endif

    <x-quiz-details-page-section :course="$course" :request="$request" :isEnrolled="$isEnrolled" />
    @include(theme('partials._custom_footer'))
@endsection

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme') }}/js/html2pdf.bundle.js"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/quiz_details.js') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/class_details.js') }}"></script>
    <script>
        $("#formSubmitBtn").on("click", function(e) {
            e.preventDefault();

            var form = $('#deleteCommentForm');
            var url = form.attr('action');
            var element = form.data('element');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {

                }
            });
            var el = '#' + element;
            $(el).hide('slow');
            $('#deleteComment').modal('hide');

        });
    </script>

    <script>
        function deleteCommnet(item, element) {
            let form = $('#deleteCommentForm')
            form.attr('action', item);
            form.attr('data-element', element);
        }
    </script>


      
@endsection
