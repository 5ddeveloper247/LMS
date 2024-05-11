@extends('backend.master')
@php
    $table_name = 'withdraw_requests';
    $url = route('admin.tutorWithdrawRequestData');
@endphp
@section('table')
    {{ $table_name }}
@stop
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mb-25 mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">
                                    @if (isAdmin())
                                        {{ "Tutor's Withdraw Requests" }}
                                    @else
                                        {{ 'Your Withdraw Requests' }}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="QA_section QA_section_heading_custom check_box_table mt-30">
                <div class="QA_table">
                    <table id="lms_table" class="Crm_table_active3 table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Sr #') }}</th>
                                @if (isAdmin())
                                    <th scope="col">{{ __('Tutor Name') }} </th>
                                @endif
                                <th scope="col"><span class="m-2">{{ __('Amount') }}</span></th>
                                <th scope="col">{{ __('Bank Name') }} </th>
                                <th scope="col">{{ __('Branch Code') }} </th>
                                <th scope="col">{{ __('Account/IBAN #') }} </th>
                                <th scope="col">{{ __('Account Holder') }} </th>
                                <th scope="col">{{ __('Account Type') }}</th>
                                <th scope="col">{{ __('Request Date') }}</th>
                                <th scope="col">{{ __('Transection ID') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                @if (isAdmin())
                                    <th scope="col">{{ __('Action') }}</th>
                                @endif

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('partials.change_request_status') --}}
    {{-- Confirmation Modal --}}
    <div class="modal fade admin-query" id="confirmation_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="status_form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ 'Confirm' }} </h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <input type="hidden" name="status" id="request_status">
                    <input type="hidden" name="request_id" id="request_id">
                    <div class="modal-body">
                        <h4>Are you Sure you Want to Confirm ?</h4>
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ 'Cancel' }}</button>
                            <button class="primary-btn fix-gr-bg" type="submit">{{ 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Transection Modal --}}
    <div class="modal fade admin-query" id="transection_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="transection_form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ 'Transection ID' }} </h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <input type="hidden" name="status" id="transection_status">
                    <input type="hidden" name="request_id" id="transection_request_id">
                    <input type="hidden" name="amount" id="amount">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ 'ID' }}
                                        <strong class="text-danger">*</strong></label>
                                    <input class="primary_input_field" value="{{ old('transection_id') }}"
                                        name="transection_id" id="transection_id" placeholder="-" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ 'Cancel' }}</button>
                            <button class="primary-btn fix-gr-bg" type="button"
                                id="transection_btn">{{ 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        function confirm_modal(route, id, status) {
            jQuery('#confirmation_modal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('status_form').setAttribute('action', route);
            document.getElementById('request_status').setAttribute('value', status);
            document.getElementById('request_id').setAttribute('value', id);
        }

        function transection_modal(route, id, amount, status) {
            jQuery('#transection_modal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('transection_form').setAttribute('action', route);
            document.getElementById('transection_status').setAttribute('value', status);
            document.getElementById('transection_request_id').setAttribute('value', id);
            document.getElementById('amount').setAttribute('value', amount);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#transection_btn').on('click', function() {
                var transection_form = $('#transection_form');
                var transection_number = transection_form.find('#transection_id').val();

                if (transection_number == '') {
                    toastr.error('Please Enter Transection ID !', 'Error');
                    return false;
                } else {
                    transection_form.submit();
                }

            });
        });
    </script>
    <script>
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
                @if (isAdmin())
                    {
                        data: 'tutor_name',
                        name: 'tutor_name',
                        orderable: false
                    },
                @endif {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'bank_name',
                    name: 'bank_name'
                },

                {
                    data: 'branch_code',
                    name: 'branch_code'
                },
                {
                    data: 'account_number',
                    name: 'account_number'
                },
                {
                    data: 'account_holder',
                    name: 'account_holder'
                },
                {
                    data: 'account_type',
                    name: 'account_type'
                },
                {
                    data: 'request_date',
                    name: 'request_date'
                },
                {
                    data: 'transection_id',
                    name: 'transection_id'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false
                },
                @if (isAdmin())
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                @endif

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
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });
    </script>
@endpush
