@extends('backend.master')

@section('table')
    @php
        $table_name='resource_tabs';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">
                                            {{__('Resource Center') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box mb-3">
                                    <form action="{{route('frontend.resource_center.setting') }}" method="POST"
                                          id="coupon-form"
                                          name="coupon-form" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">Image Heading</label>
                                                        <input type="text" name="image_heading" id="image_heading"
                                                               class="primary_input_field name {{ @$errors->has('image_heading') ? ' is-invalid' : '' }}"
                                                               value="{{Settings('resource_center_image_heading') ?? old('image_heading')}}">
                                                        @if ($errors->has('image_heading'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('image_heading') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">Image Text</label>
                                                        <input type="text" name="image_text" id="image_text"
                                                               class="primary_input_field name {{ @$errors->has('image_text') ? ' is-invalid' : '' }}"
                                                               value="{{Settings('resource_center_image_text') ?? old('image_text')}}">
                                                        @if ($errors->has('image_text'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('image_text') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">Sidebar {{__('frontendmanage.Image')}}*
                                                        <small>({{__('common.Recommended Size')}} 780×900)</small>
                                                    </label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input filePlaceholder" type="text"
                                                               readonly="" {{ $errors->has('sidebar_image') ? ' autofocus' : '' }}>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file1">{{__('common.Browse')}}</label>
                                                            <input type="file"
                                                                   class="d-none fileUpload" name="sidebar_image"
                                                                   id="document_file1">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Settings('resource_center_sidebar_image'))
                                                <div class="col-lg-3">
                                                    <img src="{{asset(Settings('resource_center_sidebar_image'))}}" class="img-fluid">
                                                </div>
                                            @endif
                                            
                                        </div>
                                                
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 text-center">
                                                <div class="d-flex justify-content-center pt_20">
                                                    <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                            id="save_button_parent">
                                                        <i class="ti-check"></i>
                                                            {{ __('common.Save') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="main-title d-md-flex mb-20">
                        <h3>{{__('Tabs List')}}</h3>
                         <a href="{{route('frontend.resource_center.create')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           title="{{__('coupons.Add Resource Tab')}}">Add Resource Tab</a>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3 table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('common.Title') }}</th>
                                            <th scope="col">{{ __('Slug') }}</th>
                                        
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <th><span class="m-3">{{ $key+1 }}</span></th>
                                                <td>{{@$slider->name }}</td>
                                                <td>{{@$slider->slug }}</td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox{{@$slider->id }}">
                                                    <input type="checkbox" class="status_enable_disable"
                                                           id="active_checkbox{{@$slider->id }}"
                                                           @if (@$slider->status == 1) checked
                                                           @endif value="{{@$slider->id }}">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
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

                                                        <a class="dropdown-item edit_brand"
                                                           href="{{route('frontend.resource_center.edit',$slider->id)}}">{{__('common.Edit')}}</a>


                                                        <a onclick="confirm_modal('{{route('frontend.resource_center.destroy', $slider->id)}}');"
                                                           class="dropdown-item edit_brand">{{__('common.Delete')}}</a>

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
    <div id="view_details">

    </div>


    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script>
        var recordsTotal;
        $("input[name='btn_type1']").change(function () {
            var type = $("input[name='btn_type1']:checked").val();
            if (type == 0) {
                $('#btn_title1').hide();
                $('#btn_image1').show();
            } else {
                $('#btn_title1').show();
                $('#btn_image1').hide();
            }
        });

        $("input[name='btn_type2']").change(function () {
            var type = $("input[name='btn_type2']:checked").val();
            if (type == 0) {
                $('#btn_title2').hide();
                $('#btn_image2').show();
            } else {
                $('#btn_title2').show();
                $('#btn_image2').hide();
            }
        });

        $(document).ready(function () {
            $("input[name='btn_type1']").trigger('change');
            $("input[name='btn_type2']").trigger('change');
        });

        var course_seq_url = '{{ route('frontend.resource_center.changeTabSeq') }}';

        // $('#lms_table tbody').sortable({

        //     update: function (event, ui) {

        //         // Get the sorted row IDs



        //         var page_length = parseInt($('.dataTable_select>.list>li.selected').data('value'));

        //         var current_page = parseInt($('.paginate_button.current').text());

        //         //

        //         var postion_for_text = (current_page * page_length) - page_length; //asc

        //         var postion_for = recordsTotal - (postion_for_text); // dsec





        //         $('#lms_table tbody tr').each(function (index, element) {

        //             var rowData = datatable.row(index).data();



        //             order.push({

        //                 id: $(this).attr('data-course_id'),

        //                 new_position: postion_for,

        //             });

        //             $(this).children().first().text(postion_for_text += 1);

        //             $(this).data('seq_no', postion_for);



        //             postion_for = postion_for - 1;





        //         });

        //         // console.log(postion_for, order, page_length, current_page);



        //         $.ajax({

        //             // type: "POST",

        //             method: 'POST',

        //             url: course_seq_url,

        //             dataType: 'json',

        //             contentType: 'application/json',

        //             data: JSON.stringify({

        //                 order: order

        //             }),

        //             dataType: "json",

        //             processData: false,

        //             contentType: false,

        //             success: function (response) {

        //                 if (response == 200) {

        //                     toastr.success('Order Successfully Changed !', 'Success');

        //                     order = [];

        //                 }

        //             }

        //         });

        //     },

        // });
    </script>
@endpush
