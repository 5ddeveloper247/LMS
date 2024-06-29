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
                <div class="col-lg-12">
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