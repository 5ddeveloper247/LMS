@extends('backend.master')

@section('css')
    <link href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" rel="stylesheet">
@endsection
@php
    $table_name = 'package_purchasing';
    // if (\Route::current()->getName() == 'getAllCourse') {
    //     $url = route('getAllCourseData') . '?course_status=3';
    //     $text = trans('common.All');
    // } elseif (\Route::current()->getName() == 'getActiveCourse') {
    //     $url = route('getAllCourseData') . '?course_status=1';
    //     $text = trans('common.Active');
    // } elseif (\Route::current()->getName() == 'getPendingCourse') {
    //     $url = route('getAllCourseData') . '?course_status=0';
    //     $text = trans('common.Pending');
    // } elseif (\Route::current()->getName() == 'courseSortBy' || \Route::current()->getName() == 'courseSortByGet') {
    //     $category = request()->get('category');
    //     $type = request()->get('type');
    //     $instructor = request()->get('instructor');
    //     $status = request()->get('search_status');
    //     $search_required_type = request()->get('search_required_type');
    //     $search_delivery_mode = request()->get('search_delivery_mode');
    //     $url = route('getAllCourseData') . '?search_status=' . $status . '&category=' . $category . '&type=' . $type . '&instructor=' . $instructor . '&required_type=' . $search_required_type . '&mode_of_delivery=' . $search_delivery_mode;
    //     $text = trans('common.Filter');
    // } else {
    //     $url = route('getAllCourseData');
    //     $text = trans('common.All');
    // }
    $url = route('getAllsoldPackages');
@endphp
@section('table')
    {{ $table_name }}

@stop
@section('mainContent')
    {!! generateBreadcrumb() !!}
    @php
        if ($total_packages) {
            $text = 'You Can Upgrade Your Package at anytime';
            $button = 'Upgrade';
        } else {
            $text = 'In order to Add New Course, Please';
            $button = 'Buy Package';
        }
        if($current_package && $current_package->expiry_date != null && $current_package->expiry_date < Carbon\Carbon::now()){
            $text = 'In order to Add New Course, Please';
            $button = 'Renew Package';
        }
    @endphp
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center mt-50">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                @if (isAdmin())
                                    {{ $title ?? 'Sold Packages' }}
                                @else
                                    {{ $title ?? 'My Packages' }}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                @if (isTutor())
                    <div class="col-12">
                        <div class="box_header common_table_header">
                            <div class="main-title d-md-flex">
                                <p class="font-weight-bold mr-2">{{ $text }}</p>
                                <a class="primary-btn radius_30px fix-gr-bg mr-10"
                                    href="{{ route('teachWithUs') }}#package_prices">
                                    <i class="ti-plus"></i>{{ $button }}</a>
                            </div>
                            {{-- @if($invoice)
                            <div class="main-title d-md-flex">
                                <a class="primary-btn radius_30px fix-gr-bg mr-10"
                                    href="{{ route('invoice',[$invoice->id]) }}">Invoice</a>
                            </div>
                            @endif --}}
                        </div>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <div class="">
                                <table id="lms_table" class="classList table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col"> {{ __('common.SL') }}</th>
                                            @if (isAdmin())
                                                <th scope="col"> {{ __('Tutor Name') }}</th>
                                            @endif
                                            <th scope="col">{{ __('Package Name') }}</th>
                                            <th scope="col">{{ __('Price') }}</th>
                                            <th scope="col">{{ __('Allowed Courses') }}</th>
                                            <th scope="col">{{ __('Buying Date') }}</th>
                                            <th scope="col">{{ __('Expire Date') }}</th>
                                            @if (isAdmin())
                                                <th scope="col">{{ __('common.Status') }}</th>
                                                @endif
                                                <th scope="col">{{ __('Invoice') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.js"></script>

    <script>
        $(document).ready(function() {
            $('#reset_filter_form').on('click', function(e) {
                e.preventDefault();
                $('#course_filter_form').find('.nice-select>.list').each(function() {
                    $(this).find('li').first().trigger('click').trigger('click');
                });
            });

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('.classList').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            createdRow: function(row, data, dataIndex) {
                $(row).attr('data-seq_no', (data.seq_no));
                $(row).attr('data-course_id', (data.id));
            },
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],

            order: [],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $url !!}',
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                @if (isAdmin())
                    {
                        data: 'tutor_name',
                        name: 'tutor_name'
                    },
                @endif {
                    data: 'package_name',
                    name: 'package_name',
                    searchable: false
                },
                {
                    data: 'price',
                    name: 'price',
                    searchable: false
                },
                {
                    data: 'course_limit',
                    name: 'course_limit',
                    searchable: false
                },
                {
                    data: 'buying_date',
                    name: 'buying_date',
                    searchable: false
                },
                {
                    data: 'expiry_date',
                    name: 'expiry_date',
                    searchable: false
                },
                
                @if (isAdmin())
                    {
                        data: 'status',
                        name: 'status'
                    },
                @endif
                {
                        data: 'invoice',
                        name: 'invoice'
                    },
            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __('common.Quick Search') }}',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 2
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
                {
                    "orderable": false,
                    "targets": [0, -1]
                }
            ],
            responsive: true,
        });

        // $('#lms_table_info').append('<span id="add_here"> new-dynamic-text</span>');
    </script>
@endpush
