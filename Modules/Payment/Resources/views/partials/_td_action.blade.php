<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        @php
            $route = route('admin.change_request_status');
        @endphp
        @if ($query->status == 0)
            <a class="dropdown-item font-weight-bold"
                onclick="confirm_modal('{{ $route }}', {{ $query->id }}, 1)" href="javascript:void(0)">
                In Progress
            </a>
            <a class="dropdown-item font-weight-bold"
                onclick="confirm_modal('{{ $route }}', {{ $query->id }}, 3)" href="javascript:void(0)">
                Declined
            </a>
        @elseif ($query->status == 1)
            <a class="dropdown-item font-weight-bold"
                onclick="transection_modal('{{ $route }}', {{ $query->id }}, {{ $query->amount }}, 2)"
                href="javascript:void(0)">
                Approved
            </a>
            <a class="dropdown-item font-weight-bold"
                onclick="confirm_modal('{{ $route }}', {{ $query->id }}, 3)" href="javascript:void(0)">
                Decline
            </a>
        @elseif ($query->status == 2)
            <a class="dropdown-item font-weight-bold" href="javascript:void(0)">
                Completed
            </a>
        @elseif ($query->status == 3)
            <a class="dropdown-item font-weight-bold" href="javascript:void(0)">
                Declined
            </a>
        @endif
    </div>
</div>
