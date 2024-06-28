@extends('backend.master')

@section('css')
    <link href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" rel="stylesheet">
@endsection
@php
    $table_name = 'package_pricing';
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
    $url = route('getAllPackagePricing');
@endphp
@section('table')
    {{ $table_name }}

@stop
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center mt-50">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ $title ?? 'Package Pricing' }}
                            </h3>
                            <ul class="d-flex">
                                @if (isAdmin() && $total_packages < 3)
                                    <li>
                                        <a class="primary-btn radius_30px fix-gr-bg mr-10" href="{{ route('addPackage') }}">
                                            <i class="ti-plus"></i>{{ __('Add Package') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="classList table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col"> {{ __('common.SL') }}</th>
                                            <th scope="col"> {{ __('Title') }}</th>
                                            <th scope="col">{{ __('Price') }}</th>
                                            <th scope="col">{{ __('Allowed Courses') }}</th>
                                            <th scope="col">{{ __('Option 1 ') }}</th>
                                            <th scope="col">{{ __('Option 2') }}</th>
                                            <th scope="col">{{ __('Option 3') }}</th>
                                            <th scope="col">{{ __('Option 4') }}</th>
                                            <th scope="col">{{ __('Option 5') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>

                                    </tbody> --}}
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
            // check if user entered correct month and year
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
        // $(document).ready(function() {

        // });
        var recordsTotal;
        let table = $('.classList').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "bDestroy": true,
            processing: true,
            serverSide: true,
            createdRow: function(row, data, dataIndex) {
                $(row).attr('data-seq_no', (data.seq_no));
                $(row).attr('data-course_id', (data.id));
                // console.log(row);
            },
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],

            order: [],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $url !!}',
                // pages: 5 // number of pages to cache
            }),
            "fnInitComplete": function (oSettings, json) {
                recordsTotal = json.recordsTotal;

            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                }, {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'price',
                    name: 'price',
                    searchable: false
                },

                {
                    data: 'allowed_courses',
                    name: 'allowed_courses',
                    searchable: false
                },
                {
                    data: 'option_1',
                    name: 'option_1'
                },
                {
                    data: 'option_2',
                    name: 'option_2'
                },
                {
                    data: 'option_3',
                    name: 'option_3'
                },
                {
                    data: 'option_4',
                    name: 'option_4'
                },
                {
                    data: 'option_5',
                    name: 'option_5'
                },
                {
                    data: 'status',
                    name: 'search_status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
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

        var order = [];
        var course_seq_url = '{{ route('changePackageSeq') }}';
        $('#lms_table tbody').sortable({
            update: function(event, ui) {
                // Get the sorted row IDs

                var page_length = parseInt($('.dataTable_select>.list>li.selected').data('value'));
                var current_page = parseInt($('.paginate_button.current').text());
                //
                var postion_for_text = (current_page * page_length) - page_length; //asc
                var postion_for = recordsTotal - (postion_for_text); // dsec


                $('#lms_table tbody tr').each(function(index, element) {
                    var rowData = table.row(index).data();

                    order.push({
                        id: $(this).attr('data-course_id'),
                        new_position: postion_for,
                    });
                    $(this).children().first().text(postion_for_text+=1);
                    $(this).data('seq_no', postion_for);

                    postion_for = postion_for - 1;


                });
                // console.log(postion_for,order,page_length,current_page);

                $.ajax({
                    // type: "POST",
                    method: 'POST',
                    url: course_seq_url,
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        order: order
                    }),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response == 200) {
                            toastr.success('Order Successfully Changed !', 'Success');
                            order = [];
                        }
                    }
                });
            },
        });

        $('#lms_table_info').append('<span id="add_here"> new-dynamic-text</span>');
    </script>
@endpush
