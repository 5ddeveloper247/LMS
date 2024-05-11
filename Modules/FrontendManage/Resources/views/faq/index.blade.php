@extends('backend.master')

@php
    $table_name='home_page_faqs';
@endphp
@section('table')
    {{$table_name}}
@endsection

@section('mainContent')
    @php
        $LanguageList = getLanguageList();
    @endphp
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{__('frontend.FAQ List')}}</h3>

                            <ul class="d-flex">
                                <li><a class="primary-btn radius_30px mr-10 fix-gr-bg" data-toggle="modal"
                                       id="add_faq_btn"
                                       data-target="#add_faq" href="#"><i
                                            class="ti-plus"></i>{{__('frontend.Add FAQ')}}</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="faq_table" class="table Crm_table_active3 ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">{{__('frontend.Question')}}</th>
                                        <th scope="col">{{__('frontend.Answer')}}</th>
                                        <th scope="col">{{__('common.Status')}}</th>
                                        <th scope="col">{{__('common.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $key => $faq)
                                        <tr data-item="{{$faq->id}}" data-seq_no="{{$faq->order}}">
                                            <td>
                                                <i class="ti-menu"></i>
                                            </td>
                                            <td>{{@$faq->question}}</td>
                                            <td>{!! @$faq->answer !!}</td>
                                            <td class="nowrap">
                                                <label class="switch_toggle" for="active_checkbox{{@$faq->id }}">
                                                    <input type="checkbox"
                                                           class="status_enable_disable"
                                                           id="active_checkbox{{@$faq->id }}"
                                                           @if (@$faq->status == 1) checked
                                                           @endif value="{{@$faq->id }}">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>

                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{__('common.Action')}}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">

                                                        <button data-item="{{$faq}}"
                                                                class="dropdown-item editfaq"
                                                                type="button">{{__('common.Edit')}}</button>


                                                        <button class="dropdown-item deletefaq"
                                                                data-id="{{$faq->id}}"
                                                                type="button">{{__('common.Delete')}}</button>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if(count($faqs)==0)
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                {{ __("common.No data available in the table") }}
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade admin-query" id="add_faq">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('frontend.Add FAQ')}}</h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body student-details header-menu">
                                <form action="{{route('frontend.faq.store')}}" method="POST"
                                      enctype="multipart/form-data" id="faqs_add_form">
                                    @csrf


                                    <div class="row pt-0">
                                        @if(isModuleActive('FrontendMultiLang'))
                                            <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                role="tablist">
                                                @foreach ($LanguageList as $key => $language)
                                                    <li class="nav-item">
                                                        <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                           href="#element{{'_add_'.$language->code}}"
                                                           role="tab"
                                                           data-toggle="tab">{{ $language->native }}  </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="tab-content">
                                        @foreach ($LanguageList as $key => $language)
                                            <div role="tabpanel"
                                                 class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                 id="element{{'_add_'.$language->code}}">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for="">{{__('frontend.Question')}} <small>(max:255)</small> <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input class="primary_input_field"
                                                                   name="question[{{$language->code}}]"
                                                                   placeholder="-"
                                                                   type="text" id="addQuestion"
                                                                   maxlength="255"
                                                                   value="{{ old('question.'.$language->code) }}" {{$errors->first('question') ? 'autofocus' : ''}}>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-35">
                                                            <label class="primary_input_label"
                                                                   for="">{{__('frontend.Answer')}} <strong
                                                                    class="text-danger">*</strong></label>
                                                            <textarea class="custom_summernote"
                                                                      name="answer[{{$language->code}}]"
                                                                      id="addAnswer" cols="30"
                                                                      rows="10">{{ old('answer.'.$language->code) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg" id="save_button_parent"
                                                    type="submit"><i
                                                    class="ti-check"></i> {{__('common.Save')}} {{__('frontend.FAQ')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade admin-query" id="editfaq">
                    <div class="modal-dialog modal_1000px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('frontend.Update FAQ')}}</h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body student-details header-menu">
                                <form action="{{route('frontend.faq.update')}}" method="POST"
                                      enctype="multipart/form-data" id="faqs_update_form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{old('id')}}" id="faqId">

                                    <div class="row pt-0">
                                        @if(isModuleActive('FrontendMultiLang'))
                                            <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                role="tablist">
                                                @foreach ($LanguageList as $key => $language)
                                                    <li class="nav-item">
                                                        <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                           href="#element{{'_edit_'.$language->code}}"
                                                           role="tab"
                                                           data-toggle="tab">{{ $language->native }}  </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="tab-content">
                                        @foreach ($LanguageList as $key => $language)
                                            <div role="tabpanel"
                                                 class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                 id="element{{'_edit_'.$language->code}}">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-25">
                                                            <label class="primary_input_label"
                                                                   for="">{{__('frontend.Question')}} <small>(max:255)</small> <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input class="primary_input_field"
                                                                   name="question[{{$language->code}}]" placeholder="-"
                                                                   type="text" id="editQuestion{{$language->code}}"
                                                                   maxlength="255"
                                                                   value="{{ old('question.'.$language->code) }}" {{$errors->first('question') ? 'autofocus' : ''}}>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="primary_input mb-35">
                                                            <label class="primary_input_label"
                                                                   for="">{{__('frontend.Answer')}} <strong
                                                                    class="text-danger">*</strong></label>
                                                            <textarea class="custom_summernote"
                                                                      name="answer[{{$language->code}}]"
                                                                      id="editAnswer{{$language->code}}" cols="30"

                                                                      rows="10">{{ old('answer.'.$language->code) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-12 text-center pt_15">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2  fix-gr-bg"
                                                    id="update_button_parent" type="submit"><i
                                                    class="ti-check"></i> {{__('frontend.Update FAQ')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="deletefaq">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{__('common.Delete')}} {{__('frontend.FAQ')}} </h4>
                                <button type="button" class="close" data-dismiss="modal"><i
                                        class="ti-close "></i></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('frontend.faq.destroy')}}" method="post">
                                    @csrf

                                    <div class="text-center">

                                        <h4>{{__('common.Are you sure to delete ?')}} </h4>
                                    </div>
                                    <input type="hidden" name="id" value="" id="faqDeleteId">
                                    <div class="mt-40 d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                                data-dismiss="modal">{{__('common.Cancel')}}</button>

                                        <button class="primary-btn fix-gr-bg"
                                                type="submit">{{__('common.Delete')}}</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

        	var customFontFam = ['Arial','Helvetica','Cavolini','Jost','Impact','Tahoma','Verdana','Garamond','Georgia','monospace','fantasy','Papyrus','Poppins'];
            // Summer Note
            $('.custom_summernote').summernote({
            	fontNames: customFontFam,
                fontNamesIgnoreCheck: ['Cavolini','Jost'],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
                codeviewFilter: true,
                codeviewIframeFilter: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
                height: 188,
                tooltip: true
            });




            // order
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var recordsTotal = '{{ count($faqs) }}'
            var order = [];
            var course_seq_url = '{{ route('frontend.changeHomePageFaqPosition') }}';
            $('#faq_table tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('.dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('.paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#faq_table tbody tr').each(function (index, element) {
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
        });
    </script>
    @include('frontendmanage::faq.script')
@endpush

