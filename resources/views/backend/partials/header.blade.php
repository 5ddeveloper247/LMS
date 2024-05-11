<!DOCTYPE html>
<html dir="{{ isRtl() ? 'rtl' : '' }}" class="{{ isRtl() ? 'rtl' : '' }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ getCourseImage(Settings('favicon')) }}" type="image/png" />
    <title>
        {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }}
    </title>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link href="https://fonts.cdnfonts.com/css/cavolini" rel="stylesheet">
    @include('backend.partials.style')
    <style>
        #lms_table td {
            white-space: nowrap !important;
        }
    </style>
    <script src="{{ asset('public/js/common.js') }}"></script>


    <script>
        window.Laravel = {
            "baseUrl": '{{ url('/') }}' + '/',
            "current_path_without_domain": '{{ request()->path() }}',
            "csrfToken": '{{ csrf_token() }}',
        }
    </script>

    <script>
        window._locale = '{{ app()->getLocale() }}';
        window._translations = {!! json_encode(cache('translations'), JSON_INVALID_UTF8_IGNORE) !!}
    </script>


    <script>
        window.jsLang = function(key, replace) {
            let translation = true

            let json_file = $.parseJSON(window._translations[window._locale]['json'])
            translation = json_file[key] ?
                json_file[key] :
                key
            $.each(replace, (value, key) => {
                translation = translation.replace(':' + key, value)
            })
            return translation
        }
    </script>


    <x-frontend-dynamic-style-color />

    <script>
        const RTL = "{{ isRtl() }}";
        const LANG = "{{ app()->getLocale() }}";
    </script>

    @livewireStyles

<script>
    function isEmpty(e) {
        let t = !0;
        return null != e && "null" != e && "undefined" != e && "" != e && (t = !1), t
    }
    function isEmptySummernote(id) {
        if (
            $(id).val() == '' ||
            $(id).val() == '<p><br><p/>' ||
            $(id).summernote('isEmpty') ||
            $(id).summernote('code') == '<p><br><p/>' ||
            $(id).next('.note-editor').find('.note-editing-area').find('.note-editable').children().first().html() ==
            '<br>'
        ) {
            return true;
        }
        return false;
    }
    function isUnique(data,onSuccess) {
        $.ajax({

            type: 'GET',

            url: "{{ route('isUnique') }}",

            data: data,

            success: onSuccess,

            error: function (error) {
                $('.preloader').hide();
                toastr.error('Some thing wrong in sever side!', 'error', 1000);
            }

        });
    }

</script>
</head>

<body class="admin">
    @include('preloader')
    @include('secret_login')
    <input type="hidden" name="demoMode" id="demoMode" value="{{ appMode() }}">
    <input type="hidden" name="url" id="url" value="{{ URL::to('/') }}">
    <input type="hidden" name="active_date_format" id="active_date_format"
        value="{{ Settings('active_date_format') }}">
    <input type="hidden" name="js_active_date_format" id="js_active_date_format"
        value="{{ getActiveJsDateFormat() }}">
    <input type="hidden" name="table_name" id="table_name" value="@yield('table')">
    <input type="hidden" name="csrf_token" class="csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="currency_symbol" class="currency_symbol" value="{{ Settings('currency_symbol') }}">
    <input type="hidden" name="currency_show" class="currency_show" value="{{ Settings('currency_show') }}">
    <input type="hidden" name="chat_settings" id="chat_settings" value="{{ env('BROADCAST_DRIVER') }}">
    <div class="main-wrapper" style="min-height: 600px">
        <!-- Sidebar  -->
        @if (isModuleActive('LmsSaas') && Auth::user()->is_saas_admin == 1 && Auth::user()->active_panel == 'saas')
            @include('lmssaas::partials.sidebar')
        @elseif(isModuleActive('LmsSaasMD') && Auth::user()->is_saas_admin == 1 && Auth::user()->active_panel == 'saas')
            @include('lmssaasmd::partials.sidebar')
        @else
            @include('backend.partials.sidebar')
        @endif


        <!-- Page Content  -->
        <div id="main-content">
            @include('backend.partials.menu')
