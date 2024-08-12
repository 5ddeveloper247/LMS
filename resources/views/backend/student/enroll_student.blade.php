@extends('backend.master')
@php
    $table_name = 'course_enrolleds';
@endphp
@section('table')
    {{ $table_name }}
@stop

@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area student-details up_st_admin_visitor">
        <div class="container-fluid p-0">
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <div class="row pt-0">
                    <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link @if (!session()->get('type')) active @endif" href="#group_email_sms"
                                role="tab" data-toggle="tab">{{ __('Programs') }}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link @if (session()->get('type') == 2) active @endif" href="#indivitual_email_sms"
                                role="tab" data-toggle="tab">{{ __('Prep-Courses') }}</a>
                        </li>

                    </ul>
                </div>
            @endif
            <div class="">
                <div class="row mt_0_sm">

                    <!-- Start Sms Details -->
                    <div class="col-lg-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <input type="hidden" name="selectTab" id="selectTab">
                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <div role="tabpanel"
                                    class="tab-pane fade @if (!session()->get('type')) show active @endif"
                                    id="group_email_sms">

                                    <div class="row justify-content-center mt-50">
                                        <div class="col-lg-12">
                                            <div class="white_box mb_30">
                                                <div class="white_box_tittle list_header">
                                                    <h4>{{ __('student.Filter Enroll History') }}</h4>
                                                </div>
                                                <form action="{{ route('admin.enrollFilter') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-lg-12">
                                                            <div class="primary_input">
                                                                <label class="primary_input_label"
                                                                    for="courseSelect">{{ __('common.Select') }}
                                                                    {{ __('Program') }}</label>
                                                            </div>
                                                            <select class="primary_select" name="program" id="courseSelect">
                                                                <option
                                                                    data-display="{{ __('common.Select') }} {{ __('Program') }}"
                                                                    value="">{{ __('common.Select') }}
                                                                    {{ __('Program') }}</option>

                                                                @foreach ($programs as $program)
                                                                    <option value="{{ $program->id }}"
                                                                        {{ isset($programId) ? ($programId == $program->id ? 'selected' : '') : '' }}>
                                                                        {{ $program->programtitle }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{--                                <div class="col-xl-3 col-md-3 col-lg-3"> --}}
                                                        {{--                                    <div class="primary_input mb-15"> --}}
                                                        {{--                                        <label class="primary_input_label" --}}
                                                        {{--                                               for="startDate">{{__('common.Select')}} {{__('common.Start Date')}}</label> --}}
                                                        {{--                                        <div class="primary_datepicker_input"> --}}
                                                        {{--                                            <div class="no-gutters input-right-icon"> --}}
                                                        {{--                                                <div class="col"> --}}
                                                        {{--                                                    <div class=""> --}}
                                                        {{--                                                        <input placeholder="{{__('common.Date')}}" --}}
                                                        {{--                                                               class="primary_input_field primary-input date form-control" --}}
                                                        {{--                                                               id="startDate" type="text" name="start_date" --}}
                                                        {{--                                                               value="{{isset($start)?!empty($start)?date('m/d/Y', strtotime($start)):'':''}}" --}}
                                                        {{--                                                               autocomplete="off"> --}}
                                                        {{--                                                    </div> --}}
                                                        {{--                                                </div> --}}
                                                        {{--                                                <button class="" type="button"> --}}
                                                        {{--                                                    <i class="ti-calendar" id="start-date-icon"></i> --}}
                                                        {{--                                                </button> --}}
                                                        {{--                                            </div> --}}
                                                        {{--                                        </div> --}}
                                                        {{--                                    </div> --}}
                                                        {{--                                </div> --}}

                                                        {{--                                <div class="col-xl-3 col-lg-3"> --}}
                                                        {{--                                    <div class="primary_input mb-15"> --}}
                                                        {{--                                        <label class="primary_input_label" --}}
                                                        {{--                                               for="admissionDate">{{__('common.Select')}} {{__('common.End Date')}}</label> --}}
                                                        {{--                                        <div class="primary_datepicker_input"> --}}
                                                        {{--                                            <div class="no-gutters input-right-icon"> --}}
                                                        {{--                                                <div class="col"> --}}
                                                        {{--                                                    <div class=""> --}}
                                                        {{--                                                        <input placeholder="{{__('common.Date')}}" --}}
                                                        {{--                                                               class="primary_input_field primary-input date form-control" --}}
                                                        {{--                                                               id="admissionDate" type="text" name="end_date" --}}
                                                        {{--                                                               value="{{isset($end)?!empty($end)?date('m/d/Y', strtotime($end)):'':''}}" --}}
                                                        {{--                                                               autocomplete="off"> --}}
                                                        {{--                                                    </div> --}}
                                                        {{--                                                </div> --}}
                                                        {{--                                                <button class="" type="button"> --}}
                                                        {{--                                                    <i class="ti-calendar" id="admission-date-icon"></i> --}}
                                                        {{--                                                </button> --}}
                                                        {{--                                            </div> --}}
                                                        {{--                                        </div> --}}
                                                        {{--                                    </div> --}}
                                                        {{--                                </div> --}}
                                                        <div class="col-md-3 col-xl-3 mt-30">
                                                            <div class="search_course_btn text-center">
                                                                <button type="submit"
                                                                    class="primary-btn radius_30px fix-gr-bg mr-10">{{ __('common.Filter History') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="box_header common_table_header">
                                                <div class="main-title d-md-flex">
                                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                                        {{ __('student.Enrolled Student') }} {{ __('common.List') }}</h3>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="QA_section QA_section_heading_custom check_box_table">
                                                <div class="QA_table">

                                                    <div class="">
                                                        <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">{{ __('common.SL') }} </th>
                                                                    <th scope="col">{{ __('common.Image') }} </th>
                                                                    <th scope="col">{{ __('common.Name') }} </th>
                                                                    <th scope="col">{{ __('common.Email Address') }}
                                                                    </th>
                                                                    <th scope="col">{{ __('Program') }}</th>
                                                                    <th scope="col">{{ __('common.Price') }}</th>
                                                                    <th scope="col">{{ __('courses.Enrollment') }}
                                                                        {{ __('common.Date') }} </th>
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
                                        <!-- Add Modal Item_Details -->
                                    </div>
                                </div>
                            @endif

                            <div role="tabpanel" class="tab-pane fade @if (session()->get('type') == 2 || Auth::user()->role_id == 9  || Auth::user()->role_id == 2) show active @endif"
                                id="indivitual_email_sms">
                                <div class="row justify-content-center mt-50">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="white_box_tittle list_header">
                                                <h4>{{ __('student.Filter Enroll History') }}</h4>
                                            </div>
                                            <form action="{{ route('admin.enrollFilter') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="2">
                                                <div class="row">
                                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for="courseSelect">{{ __('common.Select') }}
                                                                {{ __('courses.Course') }}</label>
                                                        </div>

                                                        <select class="primary_select" name="course" id="courseSelect">
                                                            <option
                                                                data-display="{{ __('common.Select') }} {{ __('Prep-Courses') }}"
                                                                value="">{{ __('common.Select') }}
                                                                {{ __('Prep-Courses') }}</option>

                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}"
                                                                    {{ isset($courseId) ? ($courseId == $course->id ? 'selected' : '') : '' }}>
                                                                    {{ !empty($course->parent_id) ? $course->parent->title : $course->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-3 col-md-3 col-lg-3">
                                                        <div class="primary_input mb-15">
                                                            <label class="primary_input_label"
                                                                for="startDate">{{ __('common.Select') }}
                                                                {{ __('common.Start Date') }}</label>
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input placeholder="{{ __('common.Date') }}"
                                                                                class="primary_input_field primary-input date form-control"
                                                                                id="startDate" type="text"
                                                                                name="start_date"
                                                                                value="{{ isset($start) ? (!empty($start) ? date('m/d/Y', strtotime($start)) : '') : '' }}"
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

                                                    <div class="col-xl-3 col-lg-3">
                                                        <div class="primary_input mb-15">
                                                            <label class="primary_input_label"
                                                                for="admissionDate">{{ __('common.Select') }}
                                                                {{ __('common.End Date') }}</label>
                                                            <div class="primary_datepicker_input">
                                                                <div class="no-gutters input-right-icon">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <input placeholder="{{ __('common.Date') }}"
                                                                                class="primary_input_field primary-input date form-control"
                                                                                id="admissionDate" type="text"
                                                                                name="end_date"
                                                                                value="{{ isset($end) ? (!empty($end) ? date('m/d/Y', strtotime($end)) : '') : '' }}"
                                                                                autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                    <button class="" type="button">
                                                                        <i class="ti-calendar"
                                                                            id="admission-date-icon"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-xl-3 mt-30">
                                                        <div class="search_course_btn text-center">
                                                            <button type="submit"
                                                                class="primary-btn radius_30px fix-gr-bg mr-10">{{ __('common.Filter History') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box_header common_table_header">
                                            <div class="main-title d-md-flex">
                                                <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                                    {{ __('student.Enrolled Student') }} {{ __('common.List') }}</h3>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="QA_section QA_section_heading_custom check_box_table">
                                            <div class="QA_table">

                                                <div class="">
                                                    <table id="lms_table1" class="Crm_table_active3 table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">{{ __('common.SL') }} </th>
                                                                <th scope="col">{{ __('common.Image') }} </th>
                                                                <th scope="col">{{ __('common.Name') }} </th>
                                                                <th scope="col">{{ __('common.Email Address') }} </th>
                                                                <th scope="col">{{ __('Prep-Courses') }}</th>
                                                                <th scope="col">{{ __('common.Price') }}</th>
                                                                <th scope="col">{{ __('Type') }}</th>
                                                                <th scope="col">{{ __('courses.Enrollment') }}
                                                                    {{ __('common.Date') }} </th>
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
                                    <!-- Add Modal Item_Details -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="confirm_refund_delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Refund Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">{{ __('common.Are you sure to refund') }}?</h3>
                    <p class="text-center">
                        {{ __('Student will not Access Program/Course Anymore !') }}.
                    </p>
                    <p class="text-center">
                        {{ __('common.But also refund money to student') }}
                    </p>
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <a id="refund_link" class="primary-btn semi_large2 fix-gr-bg"><i class="ti-check"></i>
                                {{ __('common.Refund') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="confirm_cancel_delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Cancel Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">{{ __('common.Are you sure to cancel') }}?</h3>
                    <p class="text-center">
                        {{ __('Student will not Access Program/Course Anymore !') }}.
                    </p>
                    {{--                    <p class="text-center"> --}}
                    {{--                        {{__('common.But not refund money to student')}} --}}
                    {{--                    </p> --}}
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <a id="delete_link" class="primary-btn semi_large2 fix-gr-bg"><i class="ti-check"></i>
                                {{ __('common.Delete') }}</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="confirm_cancel_delete_program">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Cancel Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">{{ __('common.Are you sure to cancel') }}?</h3>
                    <p class="text-center">
                        {{ __('Student can not access Program anymore') }}.
                    </p>
                    {{--                    <p class="text-center"> --}}
                    {{--                        {{__('common.But not refund money to student')}} --}}
                    {{--                    </p> --}}
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <a id="delete_link_program"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('common.Delete') }}</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

    @php
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
            $url = route('admin.getEnrollLogsData') . '?program=' . $programId . '&start_date=' . $start . '&end_date=' . $end;
        }
        $url1 = route('admin.getEnrollLogsQuiz') . '?course=' . $courseId . '&start_date=' . $start . '&end_date=' . $end;
    @endphp

    <script>
        function confirm_refund_modal(refund_link) {
            jQuery('#confirm_refund_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('refund_link').setAttribute('href', refund_link);
        }

        function confirm_cancel_modal(delete_url) {
            jQuery('#confirm_cancel_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }

        function confirm_cancel_program_modal(delete_url) {
            jQuery('#confirm_cancel_delete_program').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link_program').setAttribute('href', delete_url);
        }
    </script>
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
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
                        data: 'image',
                        name: 'image',
                        orderable: false
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'user.email',
                        name: 'user.email'
                    },
                    {
                        data: 'program',
                        name: 'program'
                    },
                    {
                        data: 'purchase_price',
                        name: 'purchase_price'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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
                        targets: 4
                    },
                ],
                responsive: true,
            });
        </script>
    @endif

    <script>
        let table1 = $('#lms_table1').DataTable({
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
                url: '{!! $url1 !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'user.email',
                    name: 'user.email'
                },
                {
                    data: 'course.title',
                    name: 'course.title'
                },
                {
                    data: 'purchase_price',
                    name: 'purchase_price'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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
                }, {
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
            ],
            responsive: true,
        });
        console.log('kjdnc');
    </script>

@endpush
