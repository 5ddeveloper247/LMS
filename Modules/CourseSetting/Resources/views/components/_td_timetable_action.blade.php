<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        <a id="EditTimeTable" data-id="{{ $query->id }}" data-name="{{ $query->name }}" data-type="{{ $query->type }}"
            data-start_date="{{ $query->start_date }}" onclick="edit(this)" href="javascript:void(0);"
            class="dropdown-item">
            {{ trans('Edit') }}</a>
        <a target="_blank" href="{{ route('view.TimeTable', $query->id) }}" class="dropdown-item">
            {{ trans('View') }}</a>
        <a onclick="confirm_modal('{{ route('Delete.TimeTable', $query->id) }}')"
            class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>


    </div>
</div>
