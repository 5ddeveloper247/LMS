<style>
    .section__title3 h3{
        /* font-size: 99px; */
    }
    .theme_btn6 {
    background: var(--system_primery_color);
    border-radius: 16px;
    font-family: Source Sans Pro, sans-serif;
    font-size: 12px !important;
    color: #fff;
    font-weight: 700;
    border: 2px solid transparent;
    text-transform: capitalize;
    display: inline-block;
    /* line-height: 1; */
    text-align: center;
    padding: 0.5rem;
    white-space: nowrap;
}


h4 {
    font-size: 13px;
    line-height: 25px;
}
.couse_wizged .thumb {
    position: relative;
    overflow: hidden;
    height: 60vh !important;
    width: 100%;
}
/* .couse_wizged .course_content {
    padding-top: 5px !important;
    padding-right: 0px !important;
} */
.couse_wizged{
    border-radius: 10px;
}
.mYprogram_cards{
    background-position: top !important;
}
.quiz_wizged{
    border-radius: 10px;
    width: 100%;
}
.quiz_wizged .course_student-thumb{
    border-radius: 10px 10px 0px 0px;
    height: 50vh !important;
}
/* @media(max-width:2000px){
    .couse_wizged .thumb {
    position: relative;
    overflow: hidden;
    height: 350px!important;
}} */
/* @media(max-width:1800px){
    .couse_wizged .thumb {
    position: relative;
    overflow: hidden;
    height: 350px!important;
}
} */

@media only screen and (max-width: 767px){
    .theme_btn6 {
    font-size: 12px !important;
    padding: 6px 5px !important;
}
}
@media only screen and (min-width: 1800px){
    .theme_btn6 {
    border-radius: 20px !important;
    font-size: 18px !important;
}
}
</style>
@extends(theme('layouts.dashboard_master'))
@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} |
@if( routeIs('myClasses'))
    {{__('courses.Live Class')}}
@elseif( routeIs('myQuizzes'))
    {{__('courses.My Quizzes')}}
@else
    {{__('My Programs')}}
@endif @endsection
@section('css')

@endsection
@section('js')
    <script src="{{asset('public/frontend/infixlmstheme/js/my_course.js')}}"></script>
@endsection

@section('mainContent')
    <x-my-courses-page-section :request="$request"/>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
$(document).ready(function(){
$('.bandsha').removeClass('bandsha');
$('.theme_btn').removeClass('theme_btn');
$('.small_btn4').addClass('theme_btn6');
$('form').css({"display": "none"});
$("h4").css("fontSize", "14px!important");
});
</script>
