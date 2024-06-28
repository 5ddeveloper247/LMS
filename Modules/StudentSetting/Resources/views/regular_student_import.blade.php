@extends('backend.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
    <link href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" rel="stylesheet">
@endpush
@php
    $table_name = 'programs';
@endphp
@section('table')
    {{ $table_name }}
@endsection

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-10">
                    <div class="main-title">
                        <h3>{{ __('All Program') }}</h3>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <a href="{{ route('add_new') }}" class="primary-btn fix-gr-bg float-right" role="button">Add New</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-40">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('common.Image') }}</th>
                                            <th scope="col">{{ __('common.Title') }}</th>
                                            <th scope="col" class="d-none">{{ __('Total Cost') }}</th>
                                            <th scope="col" class="d-none">{{ __('Duration') }}</th>
                                            <th scope="col">{{ __('Total Courses') }}</th>
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
    <div class="modal fade admin-query" id="confirm_delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Delete Program') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">{{ __('common.Are you sure to delete') }}?</h3>
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <a id="delete_link" class="primary-btn semi_large2 fix-gr-bg">{{ __('common.Delete') }}</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.js"></script>

    <script>
        function confirm_modal(delete_url) {
            jQuery('#confirm_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
    <script>
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "bDestroy": true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            processing: true,
            serverSide: true,
            createdRow: function(row, data, dataIndex) {
                $(row).attr('data-seq_no', (data.seq_no));
                $(row).attr('data-course_id', (data.id));
                // console.log(row);
            },
            order: [],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! route('getallprogram') !!}',
                data: function() {
                    //pass variable
                },
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: true
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'programtitle',
                    name: 'programtitle'
                },
                // {data: 'totalcost', name: 'totalcost'},
                // {data: 'duration', name: 'duration'},
                {
                    data: 'numberofcourses',
                    name: 'numberofcourses'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false
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
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 1,
                    targets: -1
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });

        var order = [];
        var program_seq_url = '{{ route('changeProgramSeq') }}';
        $('#lms_table tbody').sortable({
            update: function(event, ui) {
                // Get the sorted row IDs

                var page_length = parseInt($('.dataTable_select>.list>li.selected').data('value'));
                var current_page = parseInt($('.paginate_button.current').text());

                var postion_for = (current_page * page_length) - page_length;

                $('#lms_table tbody tr').each(function(index, element) {
                    var rowData = table.row(index).data();

                    var new_position = postion_for + (index + 1);
                    order.push({
                        id: $(this).attr('data-course_id'),
                        new_position: new_position,
                    });
                    $(this).children().first().text(new_position);

                });
                $.ajax({
                    // type: "POST",
                    method: 'POST',
                    url: program_seq_url,
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        order: order
                    }),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == 200) {
                            toastr.success('Order Successfully Changed !', 'Success');
                        }
                    }
                });
            },
        });
        // let table = $('#allData').DataTable() ;
        // table.clearPipeline();
        // table.ajax.reload();
    </script>
@endpush
