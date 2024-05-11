@extends('backend.master')

@section('css')
    <link href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" rel="stylesheet">
@endsection
@php
    $table_name = 'package_purchasing';
    
@endphp
@section('table')
    {{ $table_name }}

@stop
@section('mainContent')
    {{-- @dd($total_packages) --}}
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center mt-50">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ $title ?? 'My Packages' }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>
    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#lms_table_info').append('<span id="add_here"> new-dynamic-text</span>');
    </script>
@endpush
