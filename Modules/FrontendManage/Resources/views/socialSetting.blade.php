@extends('backend.master')
@section('table')
    {{__('social_links')}}
@endsection
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">
                                        @if(!isset($edit))
                                            {{__('common.Add New') }}
                                        @else
                                            {{__('common.Update')}}
                                        @endif</h3>
                                    @if(isset($edit))
                                        @if (permissionCheck('frontend.socialSetting.store'))
                                            <a href="{{url('frontend/social-setting')}}"
                                               class="primary-btn small fix-gr-bg updateBtn"
                                               title=" {{__('frontendmanage.Add')}}">+</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box mb_30 ">
                        @if (isset($edit))
                            <form action="{{route('frontend.socialSetting.update')}}" method="post" id="coupon-form"
                                  name="coupon-form" enctype="multipart/form-data">
                                @else
                                    @if(permissionCheck('frontend.socialSetting.store'))
                                        <form action="{{route('frontend.socialSetting.store') }}" method="POST"
                                              id="coupon-form" name="coupon-form" enctype="multipart/form-data">
                                            @endif
                                            @endif
                                            @csrf
                                            @if(isset($edit))
                                                <input type="hidden" name="id"
                                                       value="{{$edit->id}}">
                                            @endif
                                            <input type="hidden" name="category" value="1">
                                            <div class="row">


                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Icon') }} <strong
                                                                class="text-danger">*</strong></label>
                                                        <select
                                                            class="primary_select mb-25  {{ @$errors->has('icon') ? ' is-invalid' : '' }}"
                                                            name="icon" id="icon" required>
                                                            @if(isset($edit))
                                                                <option value="{{@$edit->icon}}"
                                                                        selected>{{@$edit->icon}}</option>
                                                            @endif
                                                            {!! socialIconList() !!}
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Enter social  link') }}
                                                            <strong class="text-danger">*</strong></label>
                                                        <input name="btn_link" id="btn_link"
                                                               class="primary_input_field name {{ @$errors->has('btn_link') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Enter social  link') }}"
                                                               type="text"
                                                               value="{{isset($edit)?$edit->link:old('btn_link')}}">
                                                        @if ($errors->has('btn_link'))
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ @$errors->first('btn_link') }}</strong>
                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Social Name') }} <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="name" id="btn_link"
                                                               class="primary_input_field name {{ @$errors->has('name') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Social Name') }}"
                                                               type="text"
                                                               value="{{isset($edit)?$edit->name:old('name')}}">
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ @$errors->first('name') }}</strong>
                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Social Color') }} <strong
                                                                class="text-danger">*</strong></label>
                                                        <input name="color" id="btn_link"
                                                               class="primary_input_field name {{ @$errors->has('color') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('Social Color') }}"
                                                               type="color"
                                                               value="{{isset($edit)?$edit->color:old('color')}}">
                                                        @if ($errors->has('color'))
                                                            <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ @$errors->first('color') }}</strong>
                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('common.Status') }}</label>
                                                        <select
                                                            class="primary_select mb-25  {{ @$errors->has('status') ? ' is-invalid' : '' }}"
                                                            name="status" id="status" required>
                                                            <option
                                                                value="1" {{isset($edit)?($edit->status==1?'selected':''):''}}>{{__('common.Active') }}</option>
                                                            <option
                                                                value="0" {{isset($edit)?($edit->status==0?'selected':''):''}}>{{__('common.Inactive') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                @php
                                                    $tooltip = "";
                                                      if(permissionCheck('frontend.socialSetting.store')){
                                                          $tooltip = "";
                                                      }else{
                                                          $tooltip = "You have no permission to add";
                                                      }
                                                @endphp
                                                <div class="col-lg-12 text-center">
                                                    <div class="d-flex justify-content-center pt_20">
                                                        <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                                data-toggle="tooltip" title="{{$tooltip}}"
                                                                id="save_button_parent">
                                                            <i class="ti-check"></i>
                                                            @if(!isset($edit))
                                                                {{ __('common.Save') }}
                                                            @else
                                                                {{ __('common.Update') }}
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                    </div>
                </div>
                @php $socialLinks = $data['social_links']; @endphp
                <div class="col-lg-9">

                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex mb-0">
                            <h3 class="mb-0">{{__('frontendmanage.Social Setting')}} </h3>
                        </div>
                    </div>
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="social_table" class="table Crm_table_active3 table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('frontendmanage.Icon') }}</th>
                                        <th scope="col">{{ __('frontendmanage.Link') }}</th>
                                        <th scope="col">{{ __('frontendmanage.Social Name') }}</th>
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($data['social_links'] as $key => $item)
                                        <tr data-item="{{$item->id}}" data-seq_no="{{$item->order}}">
                                            <th>{{ $key+1 }}</th>
                                            <td><i class="{{@$item->icon}}" style="color:{{@$item->color}}"></i></td>
                                            <td>{{ $item->link }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <label class="switch_toggle" for="status_enable_disable{{ $item->id }}">
                                                    <input type="checkbox" id="status_enable_disable{{ $item->id }}"
                                                           class="@if (permissionCheck('frontend.socialSetting.status_update')) status_enable_disable @endif"
                                                           @if ($item->status == 1) checked
                                                           @endif value="{{ $item->id }}">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        @if (permissionCheck('frontend.socialSetting.edit'))
                                                            <a href="{{route('frontend.socialSetting_edit',$item->id)}}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if (permissionCheck('frontend.socialSetting.delete'))
                                                            <a onclick="confirm_modal('{{route('frontend.socialSetting.delete', $item->id)}}');"
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

    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script>
        if ($.fn.DataTable.isDataTable('#social_table')) {
        $('#social_table').DataTable().destroy();
    }
    let table = $('#social_table').DataTable({
        bLengthChange: true,
        "bDestroy": true,
        "lengthChange": true,
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        // order: [
        //     [0, "desc"]
        // ],
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
                targets: -1
            },
            {
                responsivePriority: 2,
                targets: -2
            },
        ],
        responsive: true,
    });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        let order = [];
        var recordsTotal = '{{ count($socialLinks) }}';
        let course_seq_url = '{{route("frontend.socialSetting.changeSocialLinkOrder")}}';
        // let course_seq_url = '{{url("social-links/changeOrder")}}';
        $('#social_table tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('.dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('.paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#social_table tbody tr').each(function (index, element) {
                        var rowData = table.row(index).data();

                        order.push({
                            id: $(this).attr('data-item'),
                            new_position: postion_for,
                        });

                        $(this).data('seq_no', postion_for);

                        postion_for = postion_for - 1;

                    });
                    console.log(order);

                    $.ajax({
                        // type: "POST",
                        method: 'POST',
                        url: course_seq_url,
                        dataType: 'json',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            order: order
                        }),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response == 200) {
                                toastr.success('Order Successfully Changed !', 'Success');
                                order = [];
                            }
                        }
                    });
                },
            });
    </script>
@endpush
