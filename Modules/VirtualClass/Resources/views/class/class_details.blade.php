@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}

    @if ($class->host ==  'Team')
        <div id="view_details">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-20">{{ __('zoom.Class') }} {{ __('zoom.List') }}

                    </h3>


                </div>

                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table">
                        <!-- table-responsive -->
                        <div class="">
                            <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>{{ __('common.SL') }}</th>
                                        <th> {{ __('zoom.Topic') }}</th>
                                        <th> {{ __('zoom.Date') }}</th>
                                        <th> {{ __('Day') }}</th>
                                        <th> {{ __('zoom.Time') }}</th>
                                        <th> {{ __('zoom.Duration') }}</th>
                                        <th> {{ __('zoom.Start Join') }}</th>
                                        <th>{{ __('zoom.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class->teamMeetings as $key => $meeting)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->date_of_meeting }}</td>
                                            <td>{{ $class->class_day }}</td>
                                            <td>{{ $meeting->time_of_meeting }}</td>
                                            <td>{{ MinuteFormat($meeting->meeting_duration) }}</td>
                                            <td>
                                                <?php
                                                $now = Carbon\Carbon::now()->setTimezone(Settings('active_time_zone'));
                                                $current_date = $now->toDateString();
                                                $current_time = $now->toTimeString();
                                                // dd($meeting, $class, $current_date, $current_time, $now->toDateTimeString());
                                                if($meeting->cancelled == 1){
                                                    $currentstat = 'cancelled';
                                                }
                                                else{
                                                    if(Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) < Carbon\Carbon::parse($meeting->start_time)){
                                                    $currentstat = 'waiting';
                                                    }elseif (Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) >= Carbon\Carbon::parse($meeting->start_time) && Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) <= Carbon\Carbon::parse($meeting->end_time)) {
                                                    $currentstat = 'started';
                                                    }elseif(Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) > Carbon\Carbon::parse($meeting->end_time)){
                                                    $currentstat = 'closed';
                                                    }
                                                }
                                                ?>

                                                @if ($currentstat == 'started')
                                                    <a class="primary-btn small fix-gr-bg small border-0 text-white"
                                                        href="{{ route('team.meeting.join', $meeting->meeting_id) }}"
                                                        target="_blank">
                                                        @if (Auth::user()->role_id == 1 || Auth::user()->id == $meeting->instructor_id)
                                                            {{ __('zoom.Start') }}
                                                        @else
                                                            {{ __('zoom.Join') }}
                                                        @endif
                                                    </a>
                                                @elseif($currentstat == 'waiting')
                                                    <a href="#"
                                                        class="primary-btn small bg-info border-0 text-white">Waiting</a>
                                                @elseif($currentstat == 'cancelled')
                                                    <a href="#"
                                                        class="primary-btn small bg-danger border-0 text-white">Cancelled</a>
                                                        @else
                                                    <a href="#"
                                                        class="primary-btn small bg-warning border-0 text-white">Closed</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenu2">
                                                        {{--                                                    <a class="dropdown-item" --}}
                                                        {{--                                                       href="{{ route('zoom.meetings.show', $meeting->meeting_id) }}">{{__('zoom.View')}}</a> --}}
                                                        @if ($meeting->created_by == $user->id || $user->id == $class->course->user_id)
                                                            {{--                                                        <a class="dropdown-item" --}}
                                                            {{--                                                           href="{{ route('zoom.meetings.edit',$meeting->id )}}">{{__('zoom.Edit')}}</a> --}}

                                                            
                                                            <a class="dropdown-item"
                                                                href="{{ route('team.meetings.edit',$meeting->id) }}">{{ __('Edit') }}</a>
                                                            <a class="dropdown-item"
                                                                onclick="assignCancelId({{ $meeting->id }})"
                                                                href="javascript:void(0)">{{ __('Cancel') }}</a>
                                                        @endif

                                                    </div>
                                                </div>


                                            </td>
                                        </tr>


                                        <div class="modal fade admin-query" id="d{{ $meeting->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ __('zoom.Delete Class') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-40">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">{{ __('Close') }}</button>
                                                            <form class=""
                                                                action="{{ route('zoom.meetings.destroy', $meeting->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="primary-btn fix-gr-bg"
                                                                    type="submit">{{ __('Cancel') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal fade admin-query" id="cancelMeetingModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{__('Cancel Class')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4>{{__('Are you sure to cancel ?')}}</h4>
                                        </div>

                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                    data-dismiss="modal">{{__('Close')}}</button>
                                            <form class="" action="{{ route('team.meetings.cancel') }}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden" id="cancelClassId" name="meeting_id">
                                                <button class="primary-btn fix-gr-bg"
                                                        type="submit">{{__('Cancel')}}</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
<script>
    function assignCancelId(id){
        $('#cancelClassId').val(id);
        $('#cancelMeetingModal').modal('show');
    }
</script>
    @elseif($class->host == 'BBB' && isModuleActive('BBB'))
        <div id="view_details">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-20">{{ __('bbb.Class') }} {{ __('bbb.List') }}

                    </h3>


                </div>

                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table">
                        <!-- table-responsive -->
                        <div class="">
                            <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>{{ __('common.SL') }}</th>
                                        <th> {{ __('bbb.ID') }}</th>
                                        <th> {{ __('bbb.Topic') }}</th>
                                        <th> {{ __('bbb.Date') }}</th>
                                        <th> {{ __('bbb.Time') }}</th>
                                        <th> {{ __('bbb.Duration') }}</th>
                                        <th> {{ __('bbb.Join as Moderator') }}</th>
                                        <th> {{ __('bbb.Join as Attendee') }}</th>

                                        <th>{{ __('bbb.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class->bbbMeetings as $key => $meeting)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $meeting->meeting_id }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->date }}</td>
                                            <td>{{ $meeting->time }}</td>
                                            <td>
                                                @if ($meeting->duration == 0)
                                                    Unlimited
                                                @else
                                                    {{ MinuteFormat($meeting->duration) }}
                                                @endif

                                            </td>
                                            <td>
                                                <form action="{{ route('bbb.meetingStart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="meetingID"
                                                        value="{{ $meeting->meeting_id }}">
                                                    <input type="hidden" name="type" value="Moderator">
                                                    <button type="submit" class="primary-btn small fix-gr-bg">Join
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('bbb.meetingStart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="meetingID"
                                                        value="{{ $meeting->meeting_id }}">
                                                    <input type="hidden" name="type" value="Attendee">
                                                    <button type="submit" class="primary-btn small fix-gr-bg">Join
                                                    </button>
                                                </form>
                                            </td>

                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenu2">
                                                        <a class="dropdown-item"
                                                            href="{{ route('bbb.meetings.show', $meeting->id) }}">{{ __('bbb.View') }}</a>

                                                        <a class="dropdown-item"
                                                            href="{{ route('bbb.recordList', $meeting->id) }}">{{ __('bbb.Record List') }}</a>


                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#d{{ $meeting->id }}"
                                                            href="#">{{ __('bbb.Delete') }}</a>

                                                    </div>
                                                </div>


                                            </td>
                                        </tr>


                                        <div class="modal fade admin-query" id="d{{ $meeting->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ __('bbb.Delete Class') }}</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-40">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">{{ __('bbb.Cancel') }}</button>
                                                            <form class=""
                                                                action="{{ route('bbb.meetings.destroy', $meeting->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="primary-btn fix-gr-bg"
                                                                    type="submit">{{ __('bbb.Delete') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @elseif($class->host == 'Jitsi' && isModuleActive('Jitsi'))
        <div id="view_details">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-20">{{ __('jitsi.Class') }} {{ __('jitsi.List') }}

                    </h3>


                </div>

                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table">
                        <!-- table-responsive -->
                        <div class="">
                            <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>#</th>
                                        <th> {{ __('jitsi.ID') }}</th>
                                        <th> {{ __('jitsi.Topic') }}</th>
                                        <th> {{ __('jitsi.Date') }}</th>
                                        <th> {{ __('jitsi.Time') }}</th>
                                        <th> {{ __('jitsi.Duration') }}</th>
                                        <th> {{ __('jitsi.Join') }}</th>

                                        <th>{{ __('jitsi.Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class->jitsiMeetings as $key => $meeting)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $meeting->meeting_id }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->date }}</td>
                                            <td>{{ $meeting->time }}</td>
                                            <td>
                                                @if ($meeting->duration == 0)
                                                    Unlimited
                                                @else
                                                    {{ MinuteFormat($meeting->duration) }}
                                                @endif
                                            </td>

                                            <td>
                                                <a class="primary-btn small fix-gr-bg text-white" target="_blank"
                                                    href="{{ route('jitsi.meetings.show', $meeting->id) }}">{{ __('jitsi.Start') }}</a>
                                            </td>
                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenu2">


                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#d{{ $meeting->id }}"
                                                            href="#">{{ __('bbb.Delete') }}</a>

                                                    </div>
                                                </div>


                                            </td>
                                        </tr>


                                        <div class="modal fade admin-query" id="d{{ $meeting->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ __('jitsi.Delete Class') }}</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-40">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">{{ __('jitsi.Cancel') }}</button>
                                                            <form class=""
                                                                action="{{ route('jitsi.meetings.destroy', $meeting->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="primary-btn fix-gr-bg"
                                                                    type="submit">{{ __('jitsi.Delete') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @else
    @endif

    @include('backend.partials.delete_modal')

@endsection
@push('scripts')
    <script>
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "bDestroy": true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            order: [
                [0, "desc"]
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
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 1,
                    targets: -1
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });
    </script>
@endpush
