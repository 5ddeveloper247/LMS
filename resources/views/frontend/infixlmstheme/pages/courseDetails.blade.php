@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $course->title }}
@endsection
@section('og_image')
    {{ asset($course->image) }}
@endsection

<style>
    .ckdtext ul, .ckdtext ol{
        padding: revert;
    }
    .ckdtext li{
        list-style: revert;
    }
    .course__details .video_screen {
        background-image: url('{{ getCourseImage(@$course->image) }}');
    }

    iframe {
        position: relative !important;
    }

    .theme_according .card .card-header h5 button {
        padding: 12.3px 25px 13px 30px;
    }

    .table-responsive {

        overflow-x: clip !important;
       scrollbar-width: thin;
    }

    .theme_color2 {
        color: var(--system_primery_color);
    }

    .prog_blk {
        padding-bottom: 60vh !important;
    }

    .prog_blk {
        position: relative;
        background: #fff;
        padding: 2.5rem;
        border-radius: 1rem;
        -webkit-box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03);
        /* box-shadow: 0 0.7rem 1.5rem -0.5rem rgba(17, 17, 17, 0.08), 0 -0.5rem 1rem -0.6rem rgba(17, 17, 17, 0.03); */
        padding: 0;
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
        padding: 4rem 1.5rem 2.5rem;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .p-clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;

    }
   
    
    .course_tab{
        height: 100%;
    }
    .img_round{
        border-radius: 10px !important;
        object-fit: cover;
    }
    .img_circle{
        object-fit: none;
    }
 
    .course_image{
        height: 100% !important;
    }

 
@media only screen and (min-width: 2560px) {
   
.course-span{
    font-size: 22px !important;
}
.course_includes li p{
    font-size: 22px !important;
}

}
    /* @media (width > 1650px) {
        .lms_tabmenu li a {
            font-size: 18px;
            font-weight: 600;
            font-family: Source Sans Pro, sans-serif;
            color: var(--system_secendory_color);
            border-radius: 10px;
            padding: 13px 39px;
        }


        h6 {
            font-size: 1.2rem !important
        }

        .h6 {
            font-size: 1.4rem !important
        }

        label {
            color: #7e7e7e;
            cursor: pointer;
            font-size: 23px !important;
        }

        h4 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        .theme_btn {
            font-size: 23px !important;
        }

        .lms_tabmenu li a {
            font-size: 26px !important;
        }
    } */
</style>
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link href="{{ asset('public/frontend/infixlmstheme/css/videopopup.css') }}" rel="stylesheet" />
<link href="{{ asset('public/frontend/infixlmstheme/css/video.popup.css') }}" rel="stylesheet" />
<link href="{{ asset('public/frontend/infixlmstheme/css/class_details.css') }}" rel="stylesheet" />



@section('mainContent')
    {{-- @dd($course) --}}
    @php
        $course_type = [
            '4' => 'Full Course',
            '5' => 'Prep-Course (On-Demand)',
            '6' => 'Prep-Course (Live)',
            '7' => 'Time Table',
            '8' => 'Repeat Course',
            '9' => 'Individual Course',
        ];
    @endphp
    @if (array_key_exists($request->courseType, $course_type))
        @php
            $value = $course_type[$request->courseType];
        @endphp
        <x-breadcrumb :banner="$frontendContent->course_page_banner" :title="trans($value . ' Details')" :subTitle="$course->title" />
    @else
        <x-breadcrumb :banner="$frontendContent->course_page_banner" :title="trans('frontend.Course Details')" :subTitle="$course->title" />
    @endif
    
    @php
    if(isset($duration)){
        $course['duration']=$duration;
        $course['totalseats'] = $coursePlan;   
        $course['futurePlan'] = $futurePlan;   
    }
    @endphp

    <x-course-deatils-page-section :course="$course" :request="$request" :isEnrolled="$isEnrolled" />

    @if ($course->host == 'VdoCipher')
        @include(theme('partials._player_modal'))
    @endif
@endsection

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/class_details.js') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/videopopup.js') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/video.popup.js') }}"></script>

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


    {{-- <script>
        var SITEURL = "{{ courseDetailsUrl($course->id, $course->type, $course->slug) }}";
        var page = 1;
        load_more(page);
        $(window).scroll(function() { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
                page++;
                load_more(page);
            }


        });

        function load_more(page) {
            $.ajax({
                    url: SITEURL + "?page=" + page,
                    type: "get",
                    datatype: "html",
                    data: {
                        'type': 'comment',
                        @if (request()->has('program_id'))
                            'program_id': "{{ request()->program_id }}"
                        @endif
                        @if (request()->has('courseType'))
                            'courseType': "{{ request()->courseType }}"
                        @endif
                    },
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {

                        //notify user if nothing to load
                        $('.ajax-loading').html("");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#conversition_box").append(data); //append data into #results element


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('No response from server');
                });

        }


        load_more_review(page);


        $(window).scroll(function() { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
                page++;
                load_more_review(page);
            }


        });

        function load_more_review(page) {
            $.ajax({
                    url: SITEURL + "?page=" + page,
                    type: "get",
                    datatype: "html",
                    data: {
                        'type': 'review',
                        @if (request()->has('program_id'))
                            'program_id': "{{ request()->program_id }}"
                        @endif
                        @if (request()->has('courseType'))
                            'courseType': "{{ request()->courseType }}"
                        @endif
                    },
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {

                        //notify user if nothing to load
                        $('.ajax-loading').html("");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#customers_reviews").append(data); //append data into #results element


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('No response from server');
                });

        }
    </script> --}}
@endsection
