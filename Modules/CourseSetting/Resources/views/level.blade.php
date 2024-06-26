@extends('backend.master')
@php
    $table_name = 'course_levels';
@endphp
@section('table')
    {{ $table_name }}
@endsection
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                @if (!isset($edit))
                                    {{ __('courses.Add New Level') }}
                                @else
                                    {{ __('courses.Update Level') }}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="white-box mb_30 student-details header-menu">
                        @if (isset($edit))
                            @if (permissionCheck('course-level.update'))
                                <form action="{{ route('course-level.update', $edit->id) }}" method="POST" id="category-form"
                                    name="category-form" enctype="multipart/form-data">
                            @endif
                            <input type="hidden" name="id" value="{{ @$edit->id }}">
                            @method('PATCH')
                        @else
                            @if (permissionCheck('course-level.store'))
                                <form action="{{ route('course-level.store') }}" method="POST" id="category-form"
                                    name="category-form" enctype="multipart/form-data">
                            @endif
                        @endif

                        @csrf
                        @php
                            $LanguageList = getLanguageList();
                        @endphp
                        <div class="row pt-0">
                            @if (isModuleActive('FrontendMultiLang'))
                                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                                    @foreach ($LanguageList as $key => $language)
                                        <li class="nav-item">
                                            <a class="nav-link @if (auth()->user()->language_code == $language->code) active @endif"
                                                href="#element{{ $language->code }}" role="tab"
                                                data-toggle="tab">{{ $language->native }} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="tab-content">
                            @foreach ($LanguageList as $key => $language)
                                <div role="tabpanel"
                                    class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif"
                                    id="element{{ $language->code }}">
                                    <div class="row">


                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for="nameInput">{{ __('common.Title') }}
                                                    <strong class="text-danger">*</strong></label>
                                                <input name="title[{{ $language->code }}]" id="nameInput"
                                                    class="primary_input_field title {{ @$errors->has('title') ? ' is-invalid' : '' }}"
                                                    placeholder="{{ __('common.Title') }}" type="text"
                                                    value="{{ isset($edit) ? @$edit->title : '' }}">
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback d-block mb-10" role="alert">
                                                        <strong>{{ @$errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        @php
                                            $tooltip = '';
                                            if (permissionCheck('course-level.store')) {
                                                $tooltip = '';
                                            } else {
                                                $tooltip = trans('courses.You have no permission to add');
                                            }
                                        @endphp
                                        <div class="col-lg-12 text-center">
                                            <div class="d-flex justify-content-center pt_20">
                                                <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                    data-toggle="tooltip" title="{{ @$tooltip }}"
                                                    id="save_button_parent">
                                                    <i class="ti-check"></i>
                                                    @if (!isset($edit))
                                                        {{ __('common.Save') }}
                                                    @else
                                                        {{ __('common.Update') }}
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0">
                                {{ __('courses.Level List') }}
                            </h3>
                        </div>
                    </div>
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table-data table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('common.Title') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($levels as $key => $level)
                                            <tr>
                                                <th class="m-2">{{ $key + 1 }}</th>
                                                <td>{{ @$level->title }}</td>
                                                <td class="nowrap">
                                                    <x-backend.status :id="$level->id" :status="$level->status" :route="'course-level.changeStatus'">
                                                    </x-backend.status>
                                                </td>
                                                <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu1{{ @$level->id }}" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            {{ __('common.Select') }}
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenu1{{ @$level->id }}">
                                                            @if (permissionCheck('course-level.update'))
                                                                <a class="dropdown-item edit_brand"
                                                                    href="{{ route('course-level.edit', @$level->id) }}">{{ __('common.Edit') }}</a>
                                                            @endif
                                                            @if (permissionCheck('course-level.destroy'))
                                                                <a onclick="confirm_modal('{{ route('course-level.destroy', @$level->id) }}');"
                                                                    class="dropdown-item edit_brand">{{ __('common.Delete') }}</a>
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

            $('#lms_table').DataTable({
                bLengthChange: true,
                "lengthChange": true,
                "lengthMenu": [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                "bDestroy": true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: 'Quick Search',
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

                responsive: true,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    },
                ]
            });
  
    </script>
@endpush
