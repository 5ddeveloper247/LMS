@extends('backend.master')
@section('table')
    @php
        $table_name = 'checkouts';
        if (Route::current()->getName() == 'filterSearch') {
            $start = request()->get('start_date');
            $end = request()->get('end_date');
            $method = request()->get('methods');
            $url = route('onlineLogData') . '?start_date=' . $start . '&end_date=' . $end . '&method=' . $method;
            // dd($start, $end, $url);
        } else {
            $url = route('onlineLogData');
            // dd($url);
        }
    @endphp
    {{ $table_name }}
@stop

@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4>{{ __('courses.Advanced Filter') }} </h4>
                        </div>
                        <form action="{{ route('filterSearch') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4 mt-30">
                                    <select class="primary_select" name="methods">
                                        <option data-display="{{ __('common.Select') }} {{ __('payment.Method') }}"
                                            value="">{{ __('common.Select') }} {{ __('payment.Method') }}</option>
                                        <option value="all" selected>{{ __('payment.All') }}</option>
                                        @foreach ($searchLog as $search)
                                            @if ($search->payment_method != 'Bank Payment')
                                                <option value="{{ $search->type }}"
                                                    @if (isset($_POST['methods']) && $_POST['methods'] == $search->type) selected @endif>
                                                    {{ $search->type }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-xl-4 col-md-4 col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label"
                                            for="startDate">{{ __('common.Start Date') }}</label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Date"
                                                            class="primary_input_field primary-input date form-control"
                                                            id="startDate" type="text" name="start_date"
                                                            value="@if (isset($_POST['start_date'])) {{ $_POST['start_date'] }} @else{{ date('m/d/Y') }} @endif"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4">
                                    <div class="primary_input mb-15">
                                        <label class="primary_input_label"
                                            for="admissionDate">{{ __('common.End Date') }}</label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Date"
                                                            class="primary_input_field primary-input date form-control"
                                                            id="admissionDate" type="text" name="end_date"
                                                            value="@if (isset($_POST['end_date'])) {{ $_POST['end_date'] }} @else{{ date('m/d/Y') }} @endif"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="admission-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mt-20">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit"
                                            class="primary-btn radius_30px fix-gr-bg mr-10">{{ __('courses.Filter') }}
                                        </button>
                                        <a href="{{ route('onlineLog') }}"
                                            class="primary-btn radius_30px fix-gr-bg mr-10">{{ __('Reset') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="white_box mt-30">
                <div class="white_box_tittle list_header">
                    <h4>{{ __('Total Amount') }} </h4>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            Other Amount
                        </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            @if (!empty($onlineLogs) && $onlineLogs != '0')
                                {{ getPriceFormat($onlineLogs) }}
                            @endif
                        </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            Individual Courses Revenue
                        </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            @if (!empty($admin_revenue) && $admin_revenue != '0')
                                {{ getPriceFormat($admin_revenue) }}
                            @endif
                        </h5>
                    </div>
                    <div class="col-12">
                        <hr class="border-secondary">
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            Total
                        </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <h5>
                            @if (!empty($admin_revenue) && $admin_revenue != '0' && !empty($onlineLogs) && $onlineLogs != '0')
                                {{ getPriceFormat($onlineLogs + $admin_revenue) }}
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row mb-25 mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">{{ __('payment.Received Online') }}</h3>
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

                                <th scope="col">{{ __('payment.Transaction') }}</th>
                                <th scope="col">{{ __('common.User') }}</th>
                                <th scope="col">{{ __('payment.Request Date') }}</th>
                                <th scope="col">{{ __('payment.Total') }} {{ __('Amount') }}</th>
                                <th scope="col">{{ __('Cash In/Out') }}</th>
                                <th scope="col">{{ __('payment.Payment') }} {{ __('payment.Method') }}</th>
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>


                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
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
                {
                    data: 'tracking',
                    name: 'tracking',
                    orderable: false
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'request_date',
                    name: 'request_date'
                },

                {
                    data: 'total_amount',
                    name: 'total_amount'
                },
                {
                    data: 'checkout_type',
                    name: 'checkout_type'
                },
                {
                    data: 'payment_method',
                    name: 'payment_method'
                },
                {
                    data: 'type',
                    name: 'type'
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
