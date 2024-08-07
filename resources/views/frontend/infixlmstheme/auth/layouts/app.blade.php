<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- <title>@yield('title')</title> --}}
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ getCourseImage(Settings('favicon')) }}">

    <x-frontend-dynamic-style-color />
    <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme') }}/css/app.css">
    <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme') }}/css/frontend_style.css">

    <script src="{{ asset('public/js/common.js') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme') }}/css/gijgo.min.css">
    <script src="{{ asset('public/frontend/infixlmstheme') }}/js/gijgo.min.js"></script>
    <link rel="stylesheet" href="{{ asset('public/backend/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/preloader.css') }}" />
    @yield('css')
</head>

<body>
    @include('secret_login')
    @include('preloader')
    @yield('content')
    {!! \Brian2694\Toastr\Facades\Toastr::message() !!}
    {!! NoCaptcha::renderJs() !!}

    <script>
        $(document).ready(function(){
            
   
        if ($('.small_select').length > 0) {
            $('.small_select').niceSelect();
        }

        if ($('.datepicker').length > 0) {
            $('.datepicker').datepicker();
        }
        setTimeout(function() {
            $('.preloader').fadeOut('hide', function() {
            //$(this).remove();

            });
        }, 0); 
    })
    </script>

</body>

</html>