<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        @if (permissionCheck('instructor.secretLogin') && isset($query->role_id))
            <a class="dropdown-item" href="{{ route('secretLogin', $query->id) }}"
                type="button">{{ trans('common.Secret Login') }}</a>
        @endif
        @if (permissionCheck('instructor.edit') && isset($query->role_id))
            @if (isModuleActive('Appointment'))
                <a class="dropdown-item" target="_blank"
                    href="{{ route('appointment.instructor.edit', [$query->id]) }}">
                    Change Password
                    {{--                    {{trans('common.Edit')}} --}}
                </a>
            @else
                <button data-item-id="{{ $query->id }}" class="dropdown-item editInstructor" type="button">
                    Change Password
                    {{--                    {{trans('common.Edit')}} --}}
                </button>
            @endif
        @endif
        @if (isset($query->role_id))
            <a class="dropdown-item" href="{{ route('instructor.view', [$query->id]) }}">
                View
            </a>
        @elseif (!isset($query->package_id))
            <a class="dropdown-item" href="{{ route('editPackage', [$query->id]) }}">
                Edit
            </a>
        @endif

        @if ($query->role_id == 2)
            <button data-item-id="{{ $query->id }}" data-item-hours="{{ $query->total_hours }}"
                data-item-price="{{ $query->tutor_price }}" data-item-type="{{ $query->tutor_type }}"
                class="dropdown-item setHoursInstructor" type="button">
                Set Hours
            </button>
        @endif
        @if($query->role_id == 9)
        <a href="{{ route('course.tutorCourseList', ['tutor_id' => $query->id]) }}" class="dropdown-item">Courses</a>
        @endif
        @if (permissionCheck('instructor.delete') && isset($query->role_id))
            <button class="dropdown-item deleteInstructor" data-id="{{ $query->id }}"
                type="button">{{ trans('common.Delete') }}
            </button>
        @elseif (isset($query->package_id))
            <a onclick="confirm_modal('{{ route('destroyPackagePurchasing', $query->id) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @else
            <a onclick="confirm_modal('{{ route('deletePackage', $query->id) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @endif


    </div>
</div>
