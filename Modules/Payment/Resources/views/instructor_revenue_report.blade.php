@extends('backend.master')
@php
    $table_name = 'course_enrolleds';
    $role_id = \Illuminate\Support\Facades\Auth::user()->role_id;
@endphp
@section('table')
    {{ $table_name }}
@stop
@section('mainContent')
    {{-- @dd($search_instructor, $search_month, $search_year, $instructors, $enrolls, $subscriptions) --}}
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4>{{ __('courses.Advanced Filter') }} </h4>
                        </div>
                        <form action="" method="GET">

                            <div class="row">
                                @if ($role_id == 1)

                                    <div class="col-lg-4 mt-30">

                                        <label class="primary_input_label"
                                            for="instructor">{{ __('courses.Instructor') }}</label>
                                        <select class="primary_select" name="instructor" id="instructor">
                                            <option data-display="{{ __('common.Select') }} {{ __('courses.Instructor') }}"
                                                value="">{{ __('common.Select') }} {{ __('courses.Instructor') }}
                                            </option>
                                            @foreach ($instructors as $instructor)
                                                <option {{ $search_instructor == $instructor->id ? 'selected' : '' }}
                                                    value="{{ $instructor->id }}">{{ @$instructor->name }} </option>
                                            @endforeach
                                        </select>

                                    </div>
                                @endif
                                <div class="col-lg-4 mt-30">
                                    <label class="primary_input_label" for="month">{{ __('courses.Month') }}</label>
                                    <select class="primary_select" name="month" id="month">
                                        <option data-display="{{ __('common.Select') }} {{ __('courses.Month') }}"
                                            value="">{{ __('common.Select') }} {{ __('courses.Month') }}</option>
                                        @php
                                            $formattedMonthArray = [
                                                '1' => 'January',
                                                '2' => 'February',
                                                '3' => 'March',
                                                '4' => 'April',
                                                '5' => 'May',
                                                '6' => 'June',
                                                '7' => 'July',
                                                '8' => 'August',
                                                '9' => 'September',
                                                '10' => 'October',
                                                '11' => 'November',
                                                '12' => 'December',
                                            ];
                                        @endphp
                                        @foreach ($formattedMonthArray as $key => $month)
                                            <option {{ $search_month == $key ? 'selected' : '' }}
                                                value="{{ $key }}">
                                                {{ $month }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-lg-4 mt-30">

                                    <label class="primary_input_label" for="year">{{ __('courses.Year') }}</label>
                                    <select class="primary_select" name="year" id="year">

                                        @php
                                            $starting_year = date('Y');
                                            $ending_year = date('Y', strtotime('-10 year'));
                                            $yearArray = range($starting_year, $ending_year);
                                            $current_year = date('Y');
                                            foreach ($yearArray as $year) {
                                                echo '<option value="' . $year . '"';
                                                if ($search_year == $year) {
                                                    echo ' selected="selected"';
                                                } elseif ($year == $current_year) {
                                                    echo ' selected="selected"';
                                                }
                                                echo ' >' . $year . '</option>';
                                            }
                                        @endphp
                                    </select>

                                </div>

                                @if ($role_id == 1)
                                    <div class="col-12 mt-20">
                                    @else
                                        <div class="col-lg-4 mt-30 float-right">
                                            <label class="primary_input_label pt-4" style="    margin-top: 5px;"> </label>
                                @endif


                                <div class="search_course_btn @if ($role_id == 1) text-right @endif">

                                    <button type="submit"
                                        class="primary-btn radius_30px fix-gr-bg mr-10">{{ __('courses.Filter') }}
                                    </button>
                                </div>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-25 mt-40">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">{{ __('courses.Instructor') }} {{ __('courses.Revenue') }}</h3>
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
                            <th scope="col">{{ __('report.Purchase ID') }}</th>
                            <th scope="col"><span class="m-2">{{ __('courses.Course Title') }}</span></th>
                            <th scope="col">{{ __('courses.Enrollment') }} {{ __('certificate.Date') }}</th>
                            @if ($role_id == 1)
                                <th scope="col">{{ __('courses.Instructor') }} </th>
                            @endif
                            <th scope="col">{{ __('courses.Purchase') }} {{ __('courses.By') }} </th>
                            <th scope="col">{{ __('courses.Purchase') }} {{ __('courses.Price') }}</th>
                            <th scope="col">{{ __('courses.Instructor') }} {{ __('courses.Revenue') }}</th>

                        </tr>
                    </thead>

                    <tbody>
                        @if (isModuleActive('Subscription'))
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>S-{{ @$subscription['checkout_id'] + 1000 }}</td>
                                    <td>
                                        <span class="m-2">
                                            <strong>Subscription - </strong>
                                            {{ @$subscription['plan'] }}</span>
                                    </td>
                                    <td>
                                        {{ showDate(@$subscription['date']) }}
                                    </td>


                                    @if ($role_id == 1)
                                        <td>{{ @$subscription->instructor }}</td>
                                    @endif

                                    <td></td>
                                    <td></td>
                                    <td>{{ getPriceFormat($subscription['price']) }}</td>


                                </tr>
                            @endforeach
                        @endif

                        @foreach ($enrolls as $enroll)
                            <tr>
                                <td>C-{{ @$enroll->id + 1000 }}</td>
                                <td>
                                    <span class="m-2"> {{ @$enroll->course->title }}</span>
                                </td>
                                <td>
                                    {{ showDate(@$enroll->created_at) }}
                                </td>


                                @if ($role_id == 1)
                                    <td>{{ @$enroll->course->user->name }}</td>
                                @endif

                                <td>{{ @$enroll->user->name }}</td>
                                <td>{{ getPriceFormat($enroll->purchase_price) }}</td>
                                <td>{{ getPriceFormat($enroll->reveune) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
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
