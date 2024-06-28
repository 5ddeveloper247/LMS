@extends('backend.master')
@php
    $table_name = 'pre-registration';
@endphp
@section('table')
    {{ $table_name }}
@stop

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <div class="QA_section QA_section_heading_custom check_box_table">
      <div class="QA_table">
        <table id="lms_table" class="classList table table-responsive">
            <thead>
                <tr>
                    <th scope="col">{{ __('common.SL') }}</th>
                    <th scope="col">{{ __('common.Name') }}</th>
                    <th scope="col">{{ __('common.Email Address') }}</th>
                    <th scope="col">{{ __('Language') }}</th>
                    <th scope="col">{{ __('Country') }}</th>
                    <th scope="col">{{ __('State') }}</th>
                    <th scope="col">{{ __('Application') }} {{ __('common.Date') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div>
    </div>
@endsection
@push('scripts')
    <script>
        function initDataTable() {
            let table = $('#lms_table').DataTable({
                bLengthChange: true,
                "lengthChange": true,
                "lengthMenu": [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                "bDestroy": true,
                processing: true,
                order: [
                    [0, "asc"]
                ],
                ajax: {
                    url: '{!! route('admin.getPreRegisteredStudents') !!}',
                    dataSrc: 'data'
                },
                searching: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id',
                        width: '10%'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '20%'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        width: '30%'
                    },
                    {
                        data: 'language',
                        name: 'language',
                        width: '20%'
                    },
                    {
                        data: 'country',
                        name: 'country',
                        width: '20%'
                    },
                    {
                        data: 'state',
                        name: 'state',
                        width: '20%'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        width: '30%'
                    }
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
                        targets: 4
                    },
                    {
                        targets: 0,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },

                    {
                        targets: 1,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },
                    {
                        targets: 2,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },
                    {
                        targets: 3,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },
                    {
                        targets: 4,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },
                    {
                        targets: 5,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    },
                    {
                        targets: 6,
                        className: 'dt-body-left',
                        render: function(data, type, row, meta) {
                            return '<div style="margin-left: 15px;">' + data + '</div>';
                        }
                    }
                ],
                responsive: true,
                searchable: true
            });
        }

        $(document).ready(function() {
            initDataTable(); // Call the initialization function
        });
    </script>
@endpush
