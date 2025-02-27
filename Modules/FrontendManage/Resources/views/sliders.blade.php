@extends('backend.master')

@section('table')
    @php
        $table_name='sliders';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                {{-- <div class="col-lg-3 @if(!isset($slider)) d-none @endif"> --}}
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

                                        <a href="{{route('frontend.sliders.index')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           style="position: absolute;  right: 0;   margin-right: 15px;"
                                           title="{{__('coupons.Add')}}"><i class="ti-arrow-left"></i></a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        @if (isset($slider))
                            <form action="{{route('frontend.sliders.update')}}" method="POST" id="coupon-form"
                                  name="coupon-form"
                                  enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$slider->id}}">
                                @else
                                    <form action="{{route('frontend.sliders.store') }}" method="POST"
                                          id="coupon-form"
                                          name="coupon-form" enctype="multipart/form-data">

                                        @endif
                                        @csrf
                                        <div class="row">
                                            @if (Settings('frontend_active_theme') == 'tvt')
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="course_id">{{ __('courses.Course') }}</label>
                                                        <select name="course_id" id="course_id"
                                                                class="primary_select mb-15">
                                                            <option
                                                                data-display="{{__('common.Select')}} "
                                                                value="">{{__('common.Select')}}

                                                            </option>
                                                            @foreach ($courses as $key => $course)
                                                                <option
                                                                    {{isset($slider)?$course->id==$slider->course_id?'selected':'':''}}
                                                                    value="{{ $course->id }}">{{ $course->title }}</option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                </div>
                                            @endif

                                            @if(!isModuleActive('Org'))
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Name') }}</label>
                                                        <input name="name" id="name"
                                                               class="primary_input_field name {{ @$errors->has('name') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('Page Name') }}"
                                                               type="text"
                                                               value="{{(isset($slider) && $slider->name != null) ? $slider->name : old('name')}}" {{$errors->has('name') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
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
                                                               for="">{{ __('common.Sub Title') }} <small>(Max Length: 130)</small></label>
                                                        <input name="sub_title" id="sub_title"
                                                               class="primary_input_field name {{ @$errors->has('sub_title') ? ' is-invalid' : '' }}" maxlength="130"
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
                                            @endif
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{__('frontendmanage.Image')}}*
                                                        <small>({{__('common.Recommended Size')}} 1920x900)</small>
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
                                                {{-- <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('frontendmanage.Button Type') }}
                                                            (1)</label>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-25">
                                                                <label class="primary_checkbox d-flex mr-12 "
                                                                       for="btn_type11">
                                                                    <input type="radio"
                                                                           class="common-radio "
                                                                           id="btn_type11"
                                                                           name="btn_type1"
                                                                           {{isset($slider)?$slider->btn_type1==1?'checked':'':'checked'}}
                                                                           value="1">
                                                                    <span
                                                                        class="checkmark mr-2"></span> {{__('common.Text')}}
                                                                </label>
                                                            </div>
                                                            <div class="col-md-4 mb-25">
                                                                <label class="primary_checkbox d-flex mr-12 "
                                                                       for="btn_type12">
                                                                    <input type="radio"
                                                                           class="common-radio"
                                                                           id="btn_type12"
                                                                           name="btn_type1"
                                                                           {{isset($slider)?$slider->btn_type1==0?'checked':'':''}}
                                                                           value="0">
                                                                    <span
                                                                        class="checkmark mr-2"></span> {{__('common.Image')}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}


                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Page') }}
                                                        </label>
                                                        <select name="page" id="page"
                                                               class="primary_select name {{ @$errors->has('page') ? ' is-invalid' : '' }}">
                                                               <option>Select a PAGE</option>
                                                               @foreach($pages as $item)
                                                                <option value = "{{$item->id}}" {{(isset($slider) && $slider->page_id == $item->id) ? 'selected' : ''}}>
                                                                    {{$item->name}}
                                                                </option>
                                                                @endforeach
                                                        </select>
                                                               @if ($errors->has('page'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('page') }}</strong>
                                                        </span>
                                                        @endif
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


                                                {{-- <div class="col-xl-12" id="btn_image1">
                                                    <label class="primary_input_label"
                                                           for="">{{ __('frontendmanage.Button Image') }}
                                                        (1)</label>
                                                    <div class="primary_file_uploader mb-25">
                                                        <input class="primary-input filePlaceholder" type="text"
                                                               placeholder="{{isset($slider) && $slider->btn_image1 ? showPicName($slider->btn_image1) :__('virtual-class.Browse Image file')}}"
                                                               readonly="" {{ $errors->has('image') ? ' autofocus' : '' }}>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="btn_image_1">{{__('common.Browse')}}</label>
                                                            <input type="file"
                                                                   class="d-none fileUpload" name="btn_image1"
                                                                   id="btn_image_1">
                                                        </button>
                                                    </div>
                                                </div> --}}


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
                <div class="col-lg-9">
                {{-- <div class="@if(!isset($slider)) col-lg-12 @else col-lg-9 @endif"> --}}
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
                                        @if (Settings('frontend_active_theme') == 'tvt')
                                            <th scope="col">{{ __('courses.Course') }}</th>
                                        @endif
                                        @if(!isModuleActive('Org'))
                                            <th scope="col">{{ __('Page Name') }}</th>
                                            <th scope="col">{{ __('common.Title') }}</th>
                                            <th scope="col">{{ __('common.Sub Title') }}</th>
                                        @endif
                                        <th scope="col">{{ __('common.Image') }}</th>
                                        @if(!isModuleActive('Org'))
                                            {{-- <th scope="col">{{ __('common.Type') }}(1)</th> --}}

                                            <th scope="col">{{ __('frontendmanage.Button Title') }}</th>
                                            <th scope="col">{{ __('frontendmanage.Button Link') }}</th>
                                            {{-- <th scope="col">{{ __('frontendmanage.Button Image') }}</th> --}}

                                            {{-- <th scope="col">{{ __('common.Type') }}(2)</th>
                                            <th scope="col">{{ __('frontendmanage.Button Title') }}(2)</th>
                                            <th scope="col">{{ __('frontendmanage.Button Link') }}(2)</th>
                                            <th scope="col">{{ __('frontendmanage.Button Image') }}(2)</th> --}}
                                        @endif
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slider)
                                        <tr>
                                            <th><span class="m-3">{{ $key+1 }}</span></th>
                                            @if (Settings('frontend_active_theme') == 'tvt')
                                                <td>{{@$slider->course->name }}</td>
                                                <td>{{@$slider->course->title }}</td>
                                            @endif
                                            @if(!isModuleActive('Org'))
                                                <td>{{@$slider->name }}</td>
                                                <td>{{@$slider->title }}</td>
                                                <td>{{@$slider->sub_title }}</td>
                                            @endif
                                            <td>
                                                <div>
                                                    <img style="max-width: 100px" src="{{asset(@$slider->image)}}"
                                                         alt=""
                                                         class="img img-responsive m-2">
                                                </div>
                                            </td>
                                            @if(!isModuleActive('Org'))
                                                {{-- <td>{{@$slider->btn_type1==1?'Text':'Image' }}</td> --}}
                                                <td>{{@$slider->btn_title1 }}</td>
                                                <td>{{@$slider->btn_link1 }}</td>
                                                {{-- <td>
                                                    <div>
                                                        <img style="max-width: 70px"
                                                             src="{{asset(@$slider->btn_image1)}}"
                                                             alt=""
                                                             class="img img-responsive m-2">
                                                    </div>
                                                </td> --}}
                                                {{-- <td>{{@$slider->btn_type2==1?'Text':'Image' }}</td>
                                                <td>{{@$slider->btn_title2 }}</td>
                                                <td>{{@$slider->btn_link2 }}</td>
                                                <td>
                                                    <div>
                                                        <img style="max-width: 70px"
                                                             src="{{asset(@$slider->btn_image2)}}"
                                                             alt=""
                                                             class="img img-responsive m-2">
                                                    </div>
                                                </td> --}}
                                            @endif
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
                                                           href="{{route('frontend.sliders.edit',$slider->id)}}">{{__('common.Edit')}}</a>


                                                        <a onclick="confirm_modal('{{route('frontend.sliders.destroy', $slider->id)}}');"
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
