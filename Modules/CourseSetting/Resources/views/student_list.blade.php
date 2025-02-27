@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
    <style>
        .progress-bar {
            background-color: #9734f2;
        }
    </style>
@endpush
@php
    $table_name = 'users';
@endphp
@section('table')
    {{ $table_name }}
@endsection

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('student.Students List') }}</h3>
                        </div>
                    </div>
                </div>
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
                                            <th scope="col">{{ __('common.Name') }}</th>
                                            <th scope="col">{{ __('common.Email') }}</th>
                                            <th scope="col">{{ __('Course Type') }}</th>
                                            <th scope="col">{{ __('common.Progress') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade admin-query" id="deleteStudent">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('common.Delete') }} {{ __('student.Student') }} </h4>
                                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ route('student.delete') }}" method="post">
                                    @csrf
                                    <div class="text-center">
                                        <h4>{{ __('common.Are you sure to delete ?') }} </h4>
                                    </div>
                                    <input type="hidden" name="id" value="" id="studentDeleteId">
                                    <div class="d-flex justify-content-between mt-40">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                        <button class="primary-btn fix-gr-bg" type="submit"><i class="ti-check"></i>
                                            {{ __('common.Delete') }}</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')

    @if ($errors->any())
        <script>
            @if (Session::has('type'))
                @if (Session::get('type') == 'store')
                    $('#add_student').modal('show');
                @else
                    $('#editStudent').modal('show');
                @endif
            @endif
        </script>
    @endif


    @php
        $url = route('course.getAllStudentData', $course->id);
    @endphp

    <script>
        

        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $url !!}',
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
                    data: 'student_name',
                    name: 'student_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'courseType',
                    name: 'courseType'
                },
                {
                    data: 'progressbar',
                    name: 'progressbar',
                    orderable: false
                },
                {
                    data: 'notify_user',
                    name: 'notify_user',
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
                }, {
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

        // let table = $('#allData').DataTable() ;
        // table.clearPipeline();
        // table.ajax.reload();
        $('.generateCertificate').on('click',function(e){
            e.preventDefault();
            console.log('test');
            var course_id = $(this).attr('data-course');
            var student_id = $(this).attr('data-student');
            console.log(course_id,student_id);
        });
    </script>

    <script src="{{ asset('public/backend/js/student_list.js') }}"></script>

@endpush
