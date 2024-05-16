@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="col-lg-12 mt-60">
                <div class="box_header">
                    <div class="main-title d-md-flex mb-0">
                        <h3 class="mb-0">{{ __('payment.Admin Revenue') }}</h3>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table">
                <div class="QA_table">
                    <!-- table-responsive -->
                    <div class="">
                        <table id="lms_table" class="Crm_table_active3 table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('courses.Course Title') }}</th>
                                    <th scope="col">{{ __('courses.Instructor') }}</th>
                                    <th scope="col">{{ __('courses.Price') }}</th>
                                    <th scope="col">{{ __('courses.Publish') }}</th>
                                    <th scope="col">{{ __('payment.Total') }} {{ __('courses.Enrolled') }}</th>
                                    <th scope="col">{{ __('courses.Revenue') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($courses as $course)
                                   
                                    <tr>
                                        <td scope="row">
                                            {{ @$course->title }}
                                        </td>
                                        <td>{{ @$course->user->name }}</td>
                                        <td>
                                            {{ getPriceFormat($course->purchasePrice) }}
                                        </td>
                                        <td>
                                            {{ showDate(@$course->created_at ?? now()) }}
                                        </td>
                                        <td>{{ @$course->enrolls_count }} </td>
                                        <td>
                                            <a href="{{ route('admin.enrollLog', [@$course->id]) }}" class="btn_1 light">
                                                {{ getPriceFormat(@$course->purchasePrice ? @$course->purchasePrice : 0) }}
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "bDestroy": true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],

            order: [
                [1, "asc"]
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
    </script>
@endpush
