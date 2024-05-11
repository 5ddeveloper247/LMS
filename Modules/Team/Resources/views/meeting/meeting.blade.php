@extends('backend.master')

@push('css')
    <link rel="stylesheet" href="{{asset('public/backend/css/team.css')}}"/>
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                @include('team::meeting.includes.form')
                @include('team::meeting.includes.list')
            </div>
        </div>
    </section>
    <input type="hidden" name="get_user" class="get_user" value="{{ url('get-user-by-role') }}">

@endsection

@push('scripts')
    <script src="{{asset('public/backend/js/team.js')}}"></script>
@endpush
