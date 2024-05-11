{{-- @extends(theme('layouts.master')) --}}
{{-- @section('title') --}}
{{--    {{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{$row->title}} --}}
{{-- @endsection --}}
{{-- @section('css') --}}

{{--    @if (currentTheme() == 'infixlmstheme') --}}
{{--        <link rel="stylesheet" type="text/css" data-type="aoraeditor-style" --}}
{{--              href="{{ asset('public/frontend/infixlmstheme/css/frontend_style.css') }}"> --}}
{{--    @endif --}}

{{-- @endsection --}}

{{-- @section('mainContent') --}}

{{--    {!! $details??'' !!} --}}
{{-- @endsection --}}

{{-- @section('js') --}}

{{--    <script type="text/javascript" --}}
{{--            src="{{asset('Modules/AoraPageBuilder/Resources/assets/js/aoraeditor.js')}}"></script> --}}
{{--    <script type="text/javascript" --}}
{{--            src="{{asset('Modules/AoraPageBuilder/Resources/assets/js/aoraeditor-components.js')}}"></script> --}}


{{--    <script type="text/javascript" data-aoraeditor="script"> --}}
{{--        $(function () { --}}
{{--            KEditor.loadDynamicContent($('.dynamicData')); --}}

{{--        }); --}}
{{--    </script> --}}

{{-- @endsection --}}

@extends('aorapagebuilder::layouts.master')

@section('content')
    <div class="col-md-12 px-0">
        <div class="breadcrumb_area position-relative">
            <div class="w-100 h-100 position-absolute bottom-0 left-0">
                <img alt="Banner Image" class="w-100 h-100 img-cover"
                    src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h3 class="text-white">Privacy Policies</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Privacy Policies</h1>
                </div>
                <div class="card-body">
                    {!! htmlspecialchars_decode($details) !!}
                </div>
            </div>
        </div>
    </div>
    
   
    @include(theme('partials._custom_footer'))
@endsection


@section('scripts')
    <script src="{{ asset('public/frontend/infixlmstheme/js/courses.js') }}"></script>
    {{--    <script type="text/javascript" data-aoraeditor="script"> --}}
    {{--        $(function () { --}}
    {{--            aoraEditor.loadDynamicContent($('.dynamicData')); --}}

    {{--        }); --}}
    {{--    </script> --}}
@endsection
