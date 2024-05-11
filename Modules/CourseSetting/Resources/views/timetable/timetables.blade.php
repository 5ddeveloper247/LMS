@extends('backend.master')



@php
    $table_name = 'time_tables';
@endphp
@section('table')
    {{ $table_name }}
@endsection
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row justify-content-center mt-50">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Time Tables') }}</h3>
                            <ul class="d-flex">
                                <li>
                                    <a class="primary-btn radius_30px fix-gr-bg mr-10" href="javascript:void(0)"
                                        id="addTimeTable">
                                        <i class="ti-plus"></i>{{ __('common.Add') }} {{ __('Time Table') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"> {{ __('common.SL') }}</th>
                                            <th scope="col"> {{ __('Name') }}</th>
                                            <th scope="col"> {{ __('Type') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
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



                <div class="modal fade admin-query" id="addTimeTableModel">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('Add Time Table') }} </h4>
                                <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Add.TimeTable') }}" class="row" method="POST"
                                    id="timetable_form">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">{{ __('Name') }}
                                                <strong class="text-danger">*</strong></label>
                                            <input class="primary-input primary_input_field form-control"
                                                {{ $errors->first('name') ? 'autofocus' : '' }}
                                                value="{{ old('name') }}" name="name" placeholder="-" type="text"
                                                id="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-25">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for="">{{ __('Type') }} <strong
                                                    class="text-danger">*</strong></label>
                                            <select class="primary_select" name="type" id="type">
                                                <option value="">Select Type </option>
                                                <option value="Individual">Individual </option>
                                                <option value="Repeat">Repeat </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">{{ __('Start Date') }}
                                                <strong class="text-danger">*</strong></label>
                                            <input class="primary-input primary_input_field date form-control"
                                                {{ $errors->first('start_date') ? 'autofocus' : '' }}
                                                value="{{ old('start_date') }}" name="start_date" placeholder="-" autocomplete="off"
                                                type="text" id="start_date">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-40">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                        <button class="primary-btn fix-gr-bg" type="submit" id="submit_btn"><i
                                                class="ti-check"></i> {{ __('common.Save') }}</button>

                                    </div>
                                </form>
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
    @if ($errors->any())
        <script>
            @if (Session::has('Addtime'))
                $('#addTimeTableModel').modal('show');
            @endif
        </script>
    @endif
    <script>
        var modal = $('#addTimeTableModel');

        $(document).on('click', '#addTimeTable', function() {
            modal.modal('show');
            modal.find('.modal-title').text('Add Time Table');
            modal.find('#submit_btn').text('Save');

        });

        $(document).on('click', '#EditTimeTable', function(e) {
            e.preventDefault();
            modal.modal('show');
            modal.find('.modal-title').text('Edit Time Table');
            modal.find('#submit_btn').text('Update');

        });

        function edit(el) {
            var form = $('#timetable_form');
            var url = '{{ route('Update.TimeTable') }}';
            var id = $(el).attr('data-id');
            var name = $(el).attr('data-name');
            var type = $(el).attr('data-type');
            var start_date_temp = $(el).attr('data-start_date');

            var dateComponents = start_date_temp.split('-');
            var year = dateComponents[0];
            var month = dateComponents[1];
            var day = dateComponents[2];

            // Format the date as desired (dd/mm/yyyy)
            var start_date = month + '/' + day + '/' + year;


            var action = form.attr('action', url);
            form.find('#id').val(id);
            form.find('#name').val(name);
            form.find('#type').val(type);
            form.find('#start_date').val(start_date);
            form.find('#timetable_form').val(timetable_form);

            $('#type').niceSelect('update');
        }
    </script>

    @php
        $url = route('getAllTimeTable');
    @endphp

    <script>
        $(document).ready(function() {
            var form = $('#timetable_form');
            var current = new Date().setHours(0, 0, 0, 0);

            $('#submit_btn').on('click', function() {
                let date = form.find('#start_date').val();
                let name = form.find('#name');
                let type = form.find('#type');

                let selected_date = new Date(date).setHours(0, 0, 0, 0);

                if (name.val() == '' || date == '' || type.val() == '') {
                    toastr.error('Please Fill All Fields!', 'Error');
                    return false;
                }
                if (name.val().length > 75) {
                    toastr.error('Name must be less then 75 characters!', 'Error');
                    return false;
                }

                if (selected_date < current) {
                    toastr.error("Selected Date must not be earlier than today's date!", 'Error');
                    return false;
                }
            });
        });

        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action'
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
            ],
            responsive: true,
        });
    </script>
@endpush
