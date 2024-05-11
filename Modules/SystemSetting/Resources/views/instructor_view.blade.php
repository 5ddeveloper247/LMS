@extends('backend.master')
@push('styles')
    <style>
        .form-control,
        .form-select {
            border-radius: 10px;
        }

        textarea {
            height: 150px !important;
        }
    </style>
@endpush
@php
    if ($user_data->role_id == 9) {
        $url = route('getTutorAllPackages', $user_data->id);
        $section_1_heading = 'Become an Individual Tutor';
        $instructor = 'Individual Tutor';
    } else {
        $section_1_heading = 'Become an Instructor';
        $instructor = 'Instructor';
    }
@endphp
@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h3 class="">
                            {{ $instructor }} | {{ $instructors_personal_info->first_name ?? null }}
                            {{ $instructors_personal_info->last_name ?? null }}
                        </h3>
                    </div>

                    <div class="white_box_30px">
                        <div class="row mt_0_sm">
                            <div class="col-md-12">
                                <h2 class="hit my-3 text-center">
                                    {{ $section_1_heading }}
                                </h2>
                            </div>
                            <div class="col-md-4">
                                <label>What position are you applying?*</label>
                                <select disabled name="instructor_position_id" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected>--SELECT--</option>
                                    @foreach ($postions as $postion)
                                    	@if(isset($become_instructors_form_data->instructor_position_id))
                                        <option value="{{ $postion->id }}"
                                            {{ $postion->id == $become_instructors_form_data->instructor_position_id ? 'selected' : '' }}>
                                            {{ $postion->name }}</option>
                                       	@else
                                       	<option value="{{ $postion->id }}">{{ $postion->name }}</option>
                                       	@endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>How did you hear about us ?*</label>
                                <select disabled name="instructor_hear_id" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected>
                                        --SELECT--
                                    </option>
                                    @foreach ($hears as $hear)
                                    	@if(isset($become_instructors_form_data->instructor_hear_id))
                                        <option value="{{ $hear->id }}"
                                            {{ $hear->id == $become_instructors_form_data->instructor_hear_id ? 'selected' : '' }}>
                                            {{ $hear->name }}</option>
                                       	@else
                                       	<option value="{{ $hear->id }}">
                                            {{ $hear->name }}</option>
                                       	@endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Start Date
                                </label>
                                <input name="start_date" class="input--style-1 js-datepicker form-control" type="date"
                                    readonly placeholder="BIRTHDATE"
                                    value="{{ isset($become_instructors_form_data->start_date) ? $become_instructors_form_data->start_date : '' }}">


                            </div>
                            <div class="col-md-12">
                                <h2 class="my-3 text-center">
                                    Personal Information
                                </h2>
                            </div>
                            <div class="col-md-3">
                                <label>First Name*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="first_name"
                                    value="{{ isset($instructors_personal_info->first_name) ? $instructors_personal_info->first_name : '' }}">
                            </div>
                            <div class="col-md-3">
                                <label>Middle Name</label>
                                <input class="form-control" type="text" readonly placeholder="" name="middle_name"
                                    value="{{ isset($instructors_personal_info->middle_name) ? $instructors_personal_info->middle_name : '' }}">
                            </div>
                            <div class="col-md-3">
                                <label>Last Name*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="last_name"
                                    value="{{ isset($instructors_personal_info->last_name) ? $instructors_personal_info->last_name : '' }}">
                            </div>

                            <div class="col-md-3">
                                <label>Gender*</label>
                                <select disabled name="gender" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected disabled>--SELECT--</option>
                                    <option value="male"
                                        {{ 'male' == $instructors_personal_info->gender ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="female"
                                        {{ 'female' == $instructors_personal_info->gender ? 'selected' : '' }}>
                                        Female
                                    </option>
                                    <option value="other"
                                        {{ 'other' == $instructors_personal_info->gender ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Date of Birth*</label>
                                <input class="form-control" type="date" readonly placeholder="" name="date_of_birth"
                                    value="{{ $instructors_personal_info->date_of_birth }}">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Email*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="email"
                                    value="{{ $instructors_personal_info->email }}">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Phone (Home)</label>
                                <input class="form-control" type="text" readonly placeholder="" name="phone"
                                    value="{{ $instructors_personal_info->phone }}">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Cell*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="cell"
                                    value="{{ $instructors_personal_info->cell }}">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Work</label>
                                <textarea readonly name="work" class="form-control">{{ $instructors_personal_info->work }}</textarea>
                            </div>
                            <div class="col-md-9 mt-2">
                                <label>Address*</label>
                                <textarea readonly name="address" class="form-control">{{ $instructors_personal_info->address }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <h2 class="my-3 text-center">
                                    School Information
                                </h2>
                            </div>
                            <div class="col-md-3">
                                <label>High School/GED*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="high_school"
                                    value="{{ $instructors_school_info->high_school }}">
                            </div>
                            <div class="col-md-3">
                                <label>Years Attended*</label>
                                <input class="form-control" type="date" readonly placeholder=""
                                    name="school_years_attended"
                                    value="{{ $instructors_school_info->school_years_attended }}">
                            </div>
                            <div class="col-md-3">
                                <label>Graduates*</label>
                                <select disabled name="school_year_graduate" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected>
                                        --SELECT--
                                    </option>
                                    <option value="yes"
                                        {{ 'yes' == $instructors_school_info->school_year_graduate ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="no"
                                        {{ 'no' == $instructors_school_info->school_year_graduate ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Degree/Major*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="school_degree"
                                    value="{{ $instructors_school_info->school_degree }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>College*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="college"
                                    value="{{ $instructors_school_info->college }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>Years Attended*</label>
                                <input class="form-control" type="date" readonly placeholder="" name="college_email"
                                    value="{{ $instructors_school_info->email }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>Graduates*</label>
                                <select disabled name="college_graduate" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected>
                                        --SELECT--
                                    </option>
                                    <option value="yes"
                                        {{ 'yes' == $instructors_school_info->college_graduate ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="no"
                                        {{ 'no' == $instructors_school_info->college_graduate ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="nowrap">Trade or Correspondence School*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="trade_school"
                                    value="{{ $instructors_school_info->trade_school }}">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Degree/Major*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="trade_degree"
                                    value="{{ $instructors_school_info->trade_degree }}">

                            </div>
                            <div class="col-md-3 mt-2">
                                <label>Years Attended*</label>
                                <input class="form-control" type="date" readonly placeholder=""
                                    name="trade_years_attended"
                                    value="{{ $instructors_school_info->trade_years_attended }}">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Graduates*</label>
                                <select disabled name="trade_year_graduate" class="form-select form-control"
                                    aria-label="Default select example">
                                    <option value="" selected>--SELECT--</option>
                                    <option value="yes"
                                        {{ 'yes' == $instructors_school_info->trade_year_graduate ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option value="no"
                                        {{ 'no' == $instructors_school_info->trade_year_graduate ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <h2 class="my-3 text-center">
                                    Teaching Experience
                                </h2>
                            </div>

                            <div class="col-md-4">
                                <label>Current Position*</label>
                                <input class="form-control" type="text" readonly placeholder=""
                                    name="current_position"
                                    value="{{ $instructors_teaching_experience->current_position }}">
                            </div>
                            <div class="col-md-4">
                                <label>Phone No*</label>
                                <input class="form-control" type="number" placeholder="" name="Teach_phone"
                                    value="{{ $instructors_teaching_experience->phone }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Employer Name*</label>
                                <input class="form-control" type="text" readonly placeholder="" name="employee_name"
                                    value="{{ $instructors_teaching_experience->employee_name }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>Position Start Date*</label>
                                <input class="form-control" type="date" readonly placeholder="" name="date_employer"
                                    value="{{ $instructors_teaching_experience->date_employer_start }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                @if (
                                    !empty($instructors_teaching_experience->date_employer_end) &&
                                        $instructors_teaching_experience->date_employer_end != '0000-00-00')
                                    <label>Position End Date*</label>
                                    <input class="form-control" type="date" readonly placeholder=""
                                        name="date_employer"
                                        value="{{ $instructors_teaching_experience->date_employer_end }}">
                                @endif
                            </div>
                            <div class="col-md-4 mt-auto">
                                @if (empty($instructors_teaching_experience->date_employer_end) ||
                                        $instructors_teaching_experience->date_employer_end == '0000-00-00')
                                    <input class="mr-2" type="checkbox" readonly checked><label>Currently Employed?
                                    </label>
                                @endif
                            </div>

                            <div class="col-md-4 mt-2">
                                <label>Supervisor Name*</label>
                                <input class="form-control" type="text" readonly placeholder=""
                                    name="supervisor_name"
                                    value="{{ $instructors_teaching_experience->supervisor_name }}">
                            </div>

                            <div class="col-md-4 d-flex flex-column mt-2">
                                <label>Download Coverletter*</label>
                                <a href="{{ asset($instructors_teaching_experience->upload_resume) }}"
                                    class="primary-btn fix-gr-bg" download="">Download</a>
                            </div>
                            <div class="col-md-4 d-flex flex-column mt-2">
                                <label>Download Resume*</label>
                                <a href="{{ asset($instructors_teaching_experience->cover) }}"
                                    class="primary-btn fix-gr-bg" download="">Download</a>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label>Address*</label>
                                <textarea readonly name="employer_address" class="form-control">{{ $instructors_teaching_experience->address }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($user_data->role_id == 9)
                    <div class="col-md-12 my-4">
                        <h2>Package(s) Bought By This Tutor</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <!-- table-responsive -->
                                <div class="">
                                    <table id="lms_table" class="classList table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> {{ __('common.SL') }}</th>
                                                <th scope="col">{{ __('Package Name') }}</th>
                                                <th scope="col">{{ __('Price') }}</th>
                                                <th scope="col">{{ __('Allowed Courses') }}</th>
                                                <th scope="col">{{ __('Buying Date') }}</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>

                                    </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#save_button").click(function() {
            $(this).attr('disabled');
            $(this).find('span').first().remove();
            $(this).find('span').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');
        });
    </script>

    @if ($user_data->role_id == 9)
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table = $('.classList').DataTable({
                bLengthChange: true,
                "lengthChange": true,
                "bDestroy": true,
                processing: true,
                serverSide: true,
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-seq_no', (data.seq_no));
                    $(row).attr('data-course_id', (data.id));
                    // console.log(row);
                },
                "lengthMenu": [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],

                "ajax": $.fn.dataTable.pipeline({
                    url: '{!! $url !!}',
                    // pages: 5 // number of pages to cache
                }),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    }, {
                        data: 'package_name',
                        name: 'package_name',
                        searchable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        searchable: false
                    },
                    {
                        data: 'course_limit',
                        name: 'course_limit',
                        searchable: false
                    },
                    {
                        data: 'buying_date',
                        name: 'buying_date',
                        searchable: false
                    },
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
                        responsivePriority: 2,
                        targets: 2
                    },
                    {
                        responsivePriority: 2,
                        targets: -2
                    },
                    {
                        "orderable": false,
                        "targets": [0, -1]
                    }
                ],
                responsive: true,
            });
        </script>
    @endif
@endpush
