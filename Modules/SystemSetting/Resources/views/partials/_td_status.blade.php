@if (permissionCheck($route))
    <label class="switch_toggle" for="active_checkbox{{ $query->id }}">
        <input type="checkbox" class="status_enable_disable" id="active_checkbox{{ $query->id }}"
            value="{{ $query->id }}" {{ $query->status == 1 ? 'checked' : '' }}
            {{ isset($query->role_id) && $query->password == null ? 'disabled' : '' }}><i class="slider round"
            style=" {{ isset($query->role_id) && $query->password == null ? 'opacity: 0.5;' : '' }}"></i></label>
@else
    {{ $query->status == 1 ? trans('common.Active') : trans('common.Inactive') }}
@endif
