@extends('backend.master')
@section('mainContent')
    @include("backend.partials.alertMessage")
    <style>
        .page-item.active .page-link {
            background: linear-gradient(
                90deg, var(--footer_background_color); 0%, #c738d8 100%);
        }
    </style>
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="white_box_tittle list_header">
                            <h4>{{__('courses.Advanced Filter')}} </h4>
                        </div>
                        <form action="{{route('timezone.index')}}" method="GET">
                            <div class="row">


                                <div class="col-lg-5 mt-10">
                                    <label class="primary_input_label" for="code">{{__('common.Name')}}</label>
                                    <input name="code" class="primary_input_field name" placeholder="Timezone Code"
                                           value="{{$code_search}}"
                                           type="text">

                                </div>

                                <div class="col-lg-5 mt-10">
                                    <label class="primary_input_label" for="timezone">{{__('setting.Timezone')}}</label>
                                    <input name="timezone" class="primary_input_field name" placeholder="Timezone"
                                           value="{{$timezone_search}}"
                                           type="text">

                                </div>


                                <div class="col-lg-2 mt-50">
                                    <div class="search_course_btn text-right">
                                        <button type="submit"
                                                class="primary-btn radius_30px mr-10 fix-gr-bg">{{__('courses.Filter')}} </button>
                                    </div>
                                </div>
                            </div>
                            {{--                            <input type="hidden" name="page" value="{{isset($_GET['page'])?$_GET['page']:1}}">--}}
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{ __('setting.Timezone List') }}</h3>
                                    <ul class="d-flex custom_list_style p-0">
                                        @if(permissionCheck('timezone.store'))
                                            <li><a data-toggle="modal" class="primary-btn radius_30px mr-10 fix-gr-bg"
                                                   href="#" onclick="open_add_timezone_modal()"><i
                                                        class="ti-plus"></i>{{ __('common.Add New') }} {{ __('setting.Timezone') }}
                                                </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3 table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('common.Name') }}</th>
                                        <th scope="col">{{ __('common.Country') }}</th>

                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($timezones as $key=>$timezone)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <td>{{ $timezone->code }}</td>
                                            <td>{{ $timezone->time_zone }}</td>

                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        @if(permissionCheck('timezone.update'))
                                                            <a href="#" data-toggle="modal" data-target="#Item_Edit"
                                                               class="dropdown-item edit_brand"
                                                               onclick="edit_timezone_modal({{ $timezone->id }})">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('timezone.delete'))
                                                            <a onclick="confirm_modal('{{route('timezone.destroy', $timezone->id)}}');"
                                                               class="dropdown-item edit_brand">{{__('common.Delete')}}</a>
                                                        @endif

                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="add_timezone_modal">
        <div class="modal fade admin-query" id="timezone_add">
            <div class="modal-dialog modal_800px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('common.Add New') }} {{ __('setting.Timezone') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close "></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('timezone.store') }}" method="POST" id="timezone_addForm">
                            @csrf
                            <div class="row">


                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('setting.Timezone Code') }}
                                            <strong
                                                class="text-danger">*</strong></label>

                                        <select class="primary_select mb-25" name="code" id="code" required>
                                            @foreach ($lists as $key => $item)
                                                <option value="{{$key}}">{{$key}} - {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('setting.Timezone Name') }}
                                            <strong
                                                class="text-danger">*</strong></label>
                                        <input name="timezone" class="primary_input_field name"
                                               placeholder="Timezone Name"
                                               type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="d-flex justify-content-center pt_20">
                                        <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                                id="save_button_parent"><i
                                                class="ti-check"></i>{{ __('common.Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="timezone_edit" class="timezone_edit" value="{{ route('timezone.edit_modal') }}">

    @include('backend.partials.delete_modal')
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
                [0, "desc"]
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
                    customize: function (doc) {
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
    <script src="{{asset('public/backend/js/timezone.js')}}"></script>
@endpush
