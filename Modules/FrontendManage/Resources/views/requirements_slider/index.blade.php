@extends('backend.master')

@section('table')
    @php
        $table_name='requirement_slides';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> @if(!isset($slider))
                                            {{__('frontendmanage.Add New Slider') }}
                                        @else
                                            {{__('common.Update')}}
                                        @endif</h3>
                                    @if(isset($slider))

                                        <a href="{{route('frontend.requirements_slider.index')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           style="position: absolute;  right: 0;   margin-right: 15px;"
                                           title="{{__('coupons.Add')}}">+ </a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        @if (isset($slider))
                            <form action="{{route('frontend.requirements_slider.update')}}" method="POST" id="coupon-form"
                                  name="coupon-form"
                                  enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$slider->id}}">
                                @else
                                    <form action="{{route('frontend.requirements_slider.store') }}" method="POST"
                                          id="coupon-form"
                                          name="coupon-form" enctype="multipart/form-data">

                                        @endif
                                        @csrf
                                        <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('common.Title') }}</label>
                                                        <input name="title" id="title"
                                                               class="primary_input_field name {{ @$errors->has('title') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Title') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->title:old('title')}}" {{$errors->has('title') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('title') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('common.Sub Title') }}</label>
                                                        <input name="sub_title" id="sub_title"
                                                               class="primary_input_field name {{ @$errors->has('sub_title') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Sub Title') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->sub_title:old('sub_title')}}" {{$errors->has('sub_title') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('sub_title'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('sub_title') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Slider Text') }}</label>
                                                        <textarea name="text" id="text"
                                                               class="primary_input_field name {{ @$errors->has('text') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('Slider Text') }}">{{(isset($slider) && $slider->text != null)?$slider->text:old('text')}}</textarea>
                                                        @if ($errors->has('text'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('text') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Slider Color') }}</label>
                                                        <input name="color" id="color"
                                                               class="primary_input_field name {{ @$errors->has('color') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Sub Title') }}"
                                                               type="color"
                                                               value="{{isset($slider)?$slider->color:old('color','#ffffff')}}" {{$errors->has('color') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('color'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('color') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{__('frontendmanage.Image')}}*
                                                        <small>({{__('common.Recommended Size')}} 780×800)</small>
                                                    </label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input filePlaceholder" type="text"
                                                               placeholder="{{isset($slider) && $slider->image ? showPicName($slider->image) :__('virtual-class.Browse Image file')}}"
                                                               readonly="" {{ $errors->has('image') ? ' autofocus' : '' }}>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file1">{{__('common.Browse')}}</label>
                                                            <input type="file"
                                                                   class="d-none fileUpload" name="image"
                                                                   id="document_file1">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                                <div class="col-xl-12" id="btn_title1">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Button Title') }}
                                                            (1)</label>
                                                        <input name="btn_title1" id="btn_title1"
                                                               class="primary_input_field name {{ @$errors->has('btn_title1') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Button Title') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->btn_title1:old('btn_title1')}}" {{$errors->has('btn_title1') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('btn_title1'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('btn_title1') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Button Link') }}
                                                            (1)</label>
                                                        <input name="btn_link1" id="btn_link1"
                                                               class="primary_input_field name {{ @$errors->has('btn_link1') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Button Link') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->btn_link1:old('btn_link1')}}" {{$errors->has('btn_link1') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('btn_link1'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('btn_link1') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>


                                            <div class="col-lg-12 text-center">
                                                <div class="d-flex justify-content-center pt_20">
                                                    <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                            id="save_button_parent">
                                                        <i class="ti-check"></i>
                                                        @if(!isset($slider))
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
                <div class="col-lg-9 ">
                    <div class="main-title">
                        <h3 class="mb-20">{{__('frontendmanage.Slider List')}}</h3>
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
                                            <th scope="col">{{ __('common.Sub Title') }}</th>
                                        <th scope="col">{{ __('common.Image') }}</th>

                                            <th scope="col">{{ __('frontendmanage.Button Title') }}</th>
                                            <th scope="col">{{ __('frontendmanage.Button Link') }}</th>
                                       
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <th><span class="m-3">{{ $key+1 }}</span></th>
                                                <td>{{@$slider->title }}</td>
                                                <td>{{@$slider->sub_title }}</td>
                                            <td>
                                                <div>
                                                    <img style="max-width: 100px" src="{{asset(@$slider->image)}}"
                                                         alt=""
                                                         class="img img-responsive m-2">
                                                </div>
                                            </td>
                                                <td>{{@$slider->btn_title }}</td>
                                                <td>{{@$slider->btn_link }}</td>
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
                                                           href="{{route('frontend.requirements_slider.edit',$slider->id)}}">{{__('common.Edit')}}</a>


                                                        <a onclick="confirm_modal('{{route('frontend.requirements_slider.destroy', $slider->id)}}');"
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


    </script>
@endpush
