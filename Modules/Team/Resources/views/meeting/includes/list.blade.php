<div class="@if(isset($editdata)) col-lg-9 @else col-lg-12 @endif">
    <div class="main-title">
        <h3 class="mb-20">{{__('team.Class')}} {{__('team.List')}}</h3>
    </div>

    <div class="QA_section QA_section_heading_custom check_box_table">
        <div class="QA_table ">

            <div class="">
                <table id="lms_table" class="table Crm_table_active3 table-responsive">
                    <thead>
                    <tr>
                    <tr>
                        <th>{{__('common.SL')}}</th>
                        <th>   {{__('team.Class')}}</th>
                        <th>   {{__('team.Instructor')}}</th>
                        <th>   {{__('team.Topic')}}</th>
                        <th>   {{__('team.Date')}}</th>
                        <th>   {{__('team.Time')}}</th>
                        <th>   {{__('team.Duration')}}</th>
                        <th>   {{__('team.Start Join')}}</th>
                        <th>{{__('team.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($meetings as $key => $meeting )

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $meeting->class->title }}</td>
                            <td>{{ $meeting->class->course->user->name }}</td>
                            <td>{{ $meeting->topic }}</td>
                            <td>{{ $meeting->date_of_meeting }}</td>
                            <td>{{ $meeting->time_of_meeting }}</td>
                            <td>{{ $meeting->meeting_duration }} Min</td>
                            <td>
                                @if($meeting->cancelled == 1)
                                <a href="#"
                                       class="primary-btn small bg-danger text-white border-0">Cancelled</a>
                                @else
                                @if($meeting->currentStatus == 'started')

                                    <a class="primary-btn small fix-gr-bg small  text-white border-0"
                                       href="{{ route('team.meeting.join', $meeting->meeting_id) }}" target="_blank">
                                        @if (Auth::user()->role_id == 1 || Auth::user()->id == $meeting->instructor_id)
                                            {{__('team.Start')}}
                                        @else
                                            {{__('team.Join')}}
                                        @endif
                                    </a>

                                @elseif( $meeting->currentStatus == 'waiting')
                                    <a href="#"
                                       class="primary-btn small bg-info text-white border-0">Waiting</a>
                                @else
                                    <a href="#"
                                       class="primary-btn small bg-warning text-white border-0">Closed</a>
                                @endif
                                @endif
                            </td>
                            <td>
                                @if($meeting->created_by==$user->id)
                                    <div class="dropdown CRM_dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                        {{ __('common.Select') }}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"
                                         aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item"
                                            href="{{ route('team.meetings.edit',$meeting->id )}}">{{__('team.Edit')}}</a>

                                        <a class="dropdown-item" onclick="assignCancelId({{ $meeting->id }})"
                                            href="#">{{__('Cancel')}}</a>
                                            
                                        </div>
                                    </div>
                                 @endif
                            </td>
                        </tr>


                        <div class="modal fade admin-query" id="d{{$meeting->id}}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{__('team.Delete Class')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4>{{__('common.Are you sure to delete ?')}}</h4>
                                        </div>

                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                    data-dismiss="modal">{{__('team.Cancel')}}</button>
                                            <form class="" action="{{ route('team.meetings.destroy',$meeting->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="primary-btn fix-gr-bg"
                                                        type="submit">{{__('team.Delete')}}</button>
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
