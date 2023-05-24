@extends('backend.master')
@php
    $table_name='email_templates'
@endphp
@section('table')
    {{$table_name}}
@stop
@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <h4 class="pl-4 mb-3">{{__('setting.Email Template')}}</h4>
            <div class="col-lg-12">
                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <div class="">
                            <table id="lms_table" class="table Crm_table_active3">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('common.SL')}} </th>
                                    <th scope="col"> {{__('common.Name')}} </th>
                                    <th scope="col">{{__('dashboard.Subjects')}}</th>
                                    <th scope="col">{{__('common.Status')}}</th>
                                    <th scope="col">{{__('common.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($templates as $key=> $template)

                                    <tr>

                                        <th>{{$key+1}}</th>
                                        <td class="nowrap">{{@$template->name}}

                                        </td>
                                        <td class="nowrap">{{@$template->subj}}</td>
                                        <td class="nowrap">
                                            <label class="switch_toggle"
                                                   for="active_checkbox{{@$template->id }}">
                                                <input type="checkbox"
                                                       class=" status_enable_disable"
                                                       id="active_checkbox{{@$template->id }}"
                                                       @if (@$template->status == 1) checked
                                                       @endif value="{{@$template->id }}">
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
                                                    @if (permissionCheck('updateEmailTemp'))
                                                        <a class="dropdown-item btn-modal"
                                                           data-container="#commonModal" type="button"
                                                           href="{{route('EmailTempAjax',[$template->id,'email'])}}"
                                                        >{{__('common.Edit')}} </a>
                                                    @endif
                                                    @if (permissionCheck('updateBrowserMessage'))
                                                        <a class="dropdown-item btn-modal"
                                                           data-container="#commonModal"
                                                           type="button"
                                                           href="{{route('EmailTempAjax',[$template->id,'browser'])}}"
                                                        >{{__('common.Edit')}} {{__('frontend.Browser Notify')}}
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>

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


    </section>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
