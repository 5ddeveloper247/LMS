@extends('backend.master')
@push('styles')
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            width: 100%;
            height: 46px;
            line-height: 46px;
            font-size: 13px;
            padding: 3px 20px;
            padding-left: 20px;
            font-weight: 300;
            border-radius: 30px;
            color: var(--base_color);
            border: 1px solid #ECEEF4
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 46px;
            position: absolute;
            top: 1px;
            right: 20px;
            width: 20px;
            color: var(--text-color);
        }

        .select2-dropdown {
            background-color: white;
            border: 1px solid #ECEEF4;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            position: absolute;
            left: -100000px;
            width: 100%;
            width: 100%;
            background: var(--bg_white);
            overflow: auto !important;
            border-radius: 0px 0px 10px 10px;
            margin-top: 1px;
            z-index: 9999 !important;
            border: 0;
            box-shadow: 0px 10px 20px rgb(108 39 255 / 30%);
            z-index: 1051;
            min-width: 200px;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 4px;
            width: 100%;
            box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid rgba(130, 139, 178, 0.3) !important;
            border-radius: 3px;
            box-shadow: none;
            color: #333;
            display: inline-block;
            vertical-align: middle;
            padding: 0px 8px;
            width: 100% !important;
            height: 46px;
            line-height: 46px;
            outline: 0 !important;
        }

        .select2-container {
            width: 100% !important;
            min-width: 90px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 40px;
        }

        .max {
            z-index: 9999999999999;
        }

        .modal-open .modal {
            z-index: 1050 !important;
        }

        .modal-backdrop {
            /*background-color:transparent;*/
        }
    </style>
@endpush
@section('mainContent')
    @include("backend.partials.alertMessage")
    <style>
        .page-item.active .page-link {
            background: linear-gradient(
                90deg, #0079a8 0%, #996699 100%);
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
                        <form action="{{route('city.index')}}" method="GET">
                            <div class="row">

                                <div class="col-lg-3 mt-10">

                                    <label class="primary_input_label" for="country">{{__('common.Country')}}</label>
                                    <select class="primary_select" name="country" id="country">
                                        <option data-display="{{__('common.Select')}} {{__('common.Country')}}"
                                                value="">{{__('common.Select')}} {{__('common.Country')}}</option>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{$country->id}}" {{isset($country_search)?$country_search==$country->id?'selected':'':''}}>{{@$country->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-10">

                                    <label class="primary_input_label" for="state">{{__('common.State')}}</label>
                                    <select class="stateList" name="state" id="state">
                                        <option data-display="{{__('common.Select')}} {{__('common.State')}}"
                                                value="">{{__('common.Select')}} {{__('common.State')}}</option>
                                        @foreach($states as $state)
                                            <option
                                                value="{{$state->id}}" {{isset($state_search)?$state_search==$state->id?'selected':'':''}}>{{@$state->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-10">
                                    <label class="primary_input_label" for="category">{{__('common.Name')}}</label>
                                    <input name="name" class="primary_input_field name" placeholder="City Name"
                                           value="{{$city_search}}"
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
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{ __('setting.City List') }}</h3>
                                    <ul class="d-flex custom_list_style p-0">
                                        @if(permissionCheck('city.store'))
                                            <li><a data-toggle="modal" class="primary-btn radius_30px mr-10 fix-gr-bg"
                                                   href="#" onclick="open_add_city_modal()"><i
                                                        class="ti-plus"></i>{{ __('common.Add New') }} {{ __('common.City') }}
                                                </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table table-responsive">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table  ">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('common.Country') }}</th>
                                        <th scope="col">{{ __('common.State') }}</th>
                                        <th scope="col">{{ __('common.City') }}</th>

                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($cities)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Data Found</td>
                                        </tr>
                                    @endif
                                    @foreach($cities as $key=>$city)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <td>{{ $city->state->country->name }}</td>
                                            <td>{{ $city->state->name }}</td>
                                            <td>{{ $city->name }}</td>

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
                                                        @if(permissionCheck('city.update'))
                                                            <a href="#" data-toggle="modal" data-target="#Item_Edit"
                                                               class="dropdown-item edit_brand"
                                                               onclick="edit_city_modal({{ $city->id }})">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('city.delete'))
                                                            <a onclick="confirm_modal('{{route('city.destroy', $city->id)}}');"
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
                            <div class="mt-3">
                                {{ $cities->appends(Request::all())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="add_city_modal">
        <div class="modal fade admin-query" id="city_add">
            <div class="modal-dialog modal_800px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('common.Add New') }} {{ __('common.City') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close "></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('city.store') }}" method="POST" id="city_addForm">
                            @csrf
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Country') }} <strong
                                                class="text-danger">*</strong></label>
                                        <select class="primary_select" name="country" id="country_add">
                                            <option data-display="{{__('common.Select')}} {{__('common.Country')}}"
                                                    value="">{{__('common.Select')}} {{__('common.Country')}}</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}">{{@$country->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.State') }} <strong
                                                class="text-danger">*</strong></label>
                                        <select class="stateList max" name="state" id="state_add">
                                            <option data-display="{{__('common.Select')}} {{__('common.State')}}"
                                                    value="">{{__('common.Select')}} {{__('common.State')}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for="">{{ __('common.Name') }} <strong
                                                class="text-danger">*</strong></label>
                                        <input name="name" class="primary_input_field name" placeholder="City Name"
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

    <input type="hidden" name="city_edit" class="city_edit" value="{{ route('city.edit_modal') }}">

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
    <script src="{{asset('public/backend/js/city.js')}}"></script>
@endpush
