@extends('backend.master')
@push('styles')
    {{--    <link rel="stylesheet" href="{{asset('public/backend/css/student_list.css')}}"/> --}}
@endpush

{{-- @section('table') --}}
{{--    @php --}}
{{--        $table_name='users'; --}}
{{--    @endphp --}}
{{--    {{$table_name}} --}}
{{-- @stop --}}
@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Tutor Slots') }} {{ __('common.List') }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="hidden" id="instructorId" value="{{ Auth::id() }}">
                                <label class="primary_input_label" for="slotDate">{{ __('Slot Date') }}</label>
                                <input class="primary_input_field" name="slotDate" id="slotDate" type="date" value="{{ $selecteddate }}">
                            </div>
                            <div class="col-lg-12 mt-20">
                                <div class="search_course_btn">
                                {{-- <div class="search_course_btn {{ $today_slots == 0 ? 'd-none' : '' }}"> --}}
                                    <button type="button" class="primary-btn radius_30px fix-gr-bg mr-10"
                                        onclick="setTutorSlotDate();">{{ __('SET SLOTS') }} </button>
                                </div>
                                <p class="d-none">Once You Are Assigned Hours, <span
                                {{-- <p class="{{ $today_slots > 0 ? 'd-none' : '' }}">Once You Are Assigned Hours, <span --}}
                                        class="font-weight-bold">SET SLOTS</span> Button Will
                                    Appear</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="">

                                <table class="Crm_table_active3 table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('Slot') }}</th>
                                            <th scope="col">{{ __('Start Time') }}</th>
                                            <th scope="col">{{ __('End Time') }}</th>
                                            {{--                                            <th scope="col">{{ __('Date') }}</th> --}}
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody id="instructor_slots_html">

                                        @php
                                            $i = 0;
                                        @endphp

                                        @foreach ($slots as $slot)
                                            @php

                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ __('Slot') }} {{ $i }}</td>
                                                <td>{{ $slot->start_time ? \Carbon\Carbon::parse($slot->start_time)->format('h:i a') : '' }}
                                                </td>
                                                <td>{{ $slot->end_time ? \Carbon\Carbon::parse($slot->end_time)->format('h:i a') : '' }}
                                                </td>
                                                {{--                                                <td>{{ $slot->date ? \Carbon\Carbon::parse($slot->date)->format('D, d M Y') : '' }} --}}
                                                {{--                                                </td> --}}
                                                <td>

                                                    @if (in_array($slot->id, $boughtSlotIds))
                                                    <button data-item-id="{{ $slot->id }}"
                                                        class="dropdown-item primary-btn fix-gr-bg setHoursInstructor disabled"
                                                        type="button">
                                                    Set
                                                </button>
                                                @else
                                                <button data-item-id="{{ $slot->id }}"
                                                    class="dropdown-item primary-btn fix-gr-bg setHoursInstructor"
                                                    type="button">
                                                    Set
                                                </button>
                                                    @endif

                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Modal Item_Details -->

                {{--                <div class="modal fade admin-query" id="deleteInstructor"> --}}
                {{--                    <div class="modal-dialog modal-dialog-centered"> --}}
                {{--                        <div class="modal-content"> --}}
                {{--                            <form action="{{route('instructor.delete')}}" method="POST"> --}}
                {{--                                @csrf --}}
                {{--                                <div class="modal-header"> --}}
                {{--                                    <h4 class="modal-title">{{__('common.Delete')}} {{__('quiz.Instructor')}} </h4> --}}
                {{--                                    <button type="button" class="close" data-dismiss="modal"><i --}}
                {{--                                            class="ti-close "></i></button> --}}
                {{--                                </div> --}}

                {{--                                <div class="modal-body"> --}}
                {{--                                    <div class="text-center"> --}}

                {{--                                        <h4>{{__('common.Are you sure to delete ?')}}</h4> --}}
                {{--                                    </div> --}}
                {{--                                    <input type="hidden" name="id" value="" id="instructorDeleteId"> --}}

                {{--                                    <div class="mt-40 d-flex justify-content-between"> --}}
                {{--                                        <button type="button" class="primary-btn tr-bg" --}}
                {{--                                                data-dismiss="modal">{{__('common.Cancel')}}</button> --}}
                {{--                                        <button class="primary-btn fix-gr-bg" --}}
                {{--                                                type="submit">{{__('common.Delete')}}</button> --}}

                {{--                                    </div> --}}
                {{--                                </div> --}}
                {{--                            </form> --}}
                {{--                        </div> --}}
                {{--                    </div> --}}
                {{--                </div> --}}
                <div class="modal fade admin-query" id="setHoursInstructor">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('set.slot.time') }}" method="POST" id="tutor_form">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('Set Hours') }} </h4>
                                    <button type="button" class="close" data-dismiss="modal"><i
                                            class="ti-close"></i></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" value="{{ Session::get('slot_id') }}"
                                        id="slot_id">
                                    <input type="hidden" name="slot_date" value="" id="slot_date">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for="">{{ __('Start Time') }}
                                                    <strong class="text-danger">*</strong></label>
                                                <input class="primary-input primary_input_field time form-control"
                                                    {{ $errors->first('start_time') ? 'autofocus' : '' }}
                                                    value="{{ old('start_time') }}" name="start_time" id="start_time"
                                                    placeholder="-" type="text">
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-xl-12"> --}}
                                        {{--                                            <div class="primary_input mb-15"> --}}
                                        {{--                                                <label class="primary_input_label" for="">{{ __('Start Day') }} --}}
                                        {{--                                                    <strong class="text-danger">*</strong> </label> --}}
                                        {{--                                                <div class="primary_datepicker_input"> --}}
                                        {{--                                                    <div class="no-gutters input-right-icon"> --}}
                                        {{--                                                        <div class="col"> --}}
                                        {{--                                                            <div class=""> --}}
                                        {{--                                                                <input placeholder="Date" --}}
                                        {{--                                                                    class="primary_input_field primary-input date form-control" --}}
                                        {{--                                                                    id="date" --}}
                                        {{--                                                                    {{ $errors->first('date') ? 'autofocus' : '' }} --}}
                                        {{--                                                                    type="text" name="date" --}}
                                        {{--                                                                    value="{{ old('date') }}" autocomplete="off"> --}}
                                        {{--                                                            </div> --}}
                                        {{--                                                        </div> --}}
                                        {{--                                                        <button class="" type="button"> --}}
                                        {{--                                                            <i class="ti-calendar" id="start-date-icon"></i> --}}
                                        {{--                                                        </button> --}}
                                        {{--                                                    </div> --}}
                                        {{--                                                </div> --}}
                                        {{--                                            </div> --}}
                                        {{--                                        </div> --}}
                                    </div>
                                    <div class="d-flex justify-content-between mt-40">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                        <button class="primary-btn fix-gr-bg" type="button" id="submit_btn"
                                            onclick="formValidations(this);"><i class="ti-check"></i>
                                            {{ __('common.Save') }}</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    @if ($errors->any())
        <script>
            @if (Session::has('slot_id'))
                $('#setHoursInstructor').modal('show');
            @endif
        </script>
    @endif


    <script>
        $(document).on('click', '.setHoursInstructor', function() {
            let slot_id = $(this).data('item-id');
            $('#slot_id').val(slot_id);
            let instructor_hours = $(this).data('item-hours');
            $('#start_time').val(instructor_hours);
            $('#setHoursInstructor').modal('show');

        });

        $(document).ready(function() {
            var form = $('#tutor_form');
            var current = new Date().setHours(0, 0, 0, 0);

            $('#submit_btn').on('click', function() {
                let date = form.find('#date').val();
                let selected_date = new Date(date).setHours(0, 0, 0, 0);
                console.log(date, current, selected_date);

                if (date == '') {
                    toastr.error('Please Select Date!', 'Error');
                    return false;
                }

                if (selected_date < current) {
                    toastr.error("Selected Date must not be earlier than today's date!", 'Error');
                    return false;
                }
            });


        });

        function reinitializeDataTable() {

            let datatable1 = $('.Crm_table_active3').DataTable({
                bLengthChange: true,
                "bDestroy": true,
                language: {
                    emptyTable: "No data available in the table",
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
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible',
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="far fa-file-excel"></i>',
                        titleAttr: 'Excel',
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
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible',
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="far fa-file-pdf"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: 'PDF',
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
                        titleAttr: 'Print',
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
                    }, {
                        responsivePriority: 1,
                        targets: 1
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
                paging: true,
                "lengthChange": true,
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ]
            });
        }

        function setTutorSlotDate() {

            var current = new Date().setHours(0, 0, 0, 0);

            var id = $("#instructorId").val();
            var slotDate = $("#slotDate").val();
            var selected_date = new Date(slotDate).setHours(0, 0, 0, 0);

            if (slotDate == '') {
                toastr.error("Slot Date is required.", 'Error');
                return false;
            }
            if (selected_date < current) {
                toastr.error("Selected Date must not be earlier than today's date!", 'Error');
                return false;
            }


            $.ajax({
                type: 'POST',
                url: '{{ URL::to('admin/systemsetting/setTutorSlotsWrtDate') }}',
                data: {
                    'id': id,
                    'slot_date': slotDate
                },
                success: function(data) {

                    $("#slot_date").val(slotDate);

                    if ($.fn.DataTable.isDataTable(".Crm_table_active3")) {
                        $('.Crm_table_active3').DataTable().clear().destroy();
                    }

                    $("#instructor_slots_html").empty();
                    var slots = data.slots;
                    var seqNo = 1;

                    for (var i = 0; i < slots.length; i++) {

                        var id = slots[i]["id"] != null ? slots[i]["id"] : '';
                        var start_time = slots[i]["start_time"] != null ? slots[i]["start_time"] : '';
                        var end_time = slots[i]["end_time"] != null ? slots[i]["end_time"] : '';
                        var bought = slots[i]["bought"] != null ? slots[i]["bought"] : 'no';
                        var btn_html;
                        switch (bought) {
                          case '0':
                            btn_html = '<button data-item-id="' + id + '" data-item-hours="' + start_time +
                            '" class="dropdown-item primary-btn fix-gr-bg setHoursInstructor" type="button"> Set </button>';
                            break;
                          case '1':
                            btn_html = '<button class="dropdown-item primary-btn bg-dark text-white" type="button"> Bought </button>';
                            break;
                          default:

                        }
                        var html = '<tr>' +
                            '<td>' + seqNo + '</td>' +
                            '<td>Slot ' + seqNo + '</td>' +
                            '<td>' + start_time + '</td>' +
                            '<td>' + end_time + '</td>' +

                            '<td>' +
                            btn_html +
                            '</td>' +
                            '</tr>';

                        $('#instructor_slots_html').append(html);
                        seqNo++;
                    }
                    setTimeout(function() {
                        reinitializeDataTable();
                    }, 500);
                },
            })

        }



        function formValidations(button) {
            $('.preloader').show();
            var errors = [];

            var form = $(button).closest("form");

            if (isEmpty(form.find("input[name='start_time']").val())) {
                errors.push('Start Time is required.');
            }


            var id = form.find("input[name='id']").val();
            var slot_date = form.find("input[name='slot_date']").val();
            var start_time = form.find("input[name='start_time']").val();


            $.ajax({
                type: 'post',
                url: '{{ URL::to('admin/systemsetting/validationTutorSlotTime') }}',
                data: {
                    'id': id,
                    'slot_date': slot_date,
                    'start_time': start_time
                },
                success: function(data) {
                    if (data.done == 'merge') {
                        $('.preloader').hide();
                        $("#courseTypConfirmMessage").text(data.error);
                        $("#courseTypeConfirm").modal('show');
                        return;
                    }
                    if (data.done == false || data.done == 'false' || data.done == 'exist') {
                        errors.push(data.error);
                    }

                    if (errors.length) {
                        //         	       		console.log(errors);
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function(index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                        return false;
                    }
                    form.submit();

                },
            })
        }
    </script>

    @if($selecteddate != '')
      <script type="text/javascript">
        $(document).ready(function(){
          setTutorSlotDate();
        });
      </script>
    @endif

@endpush
