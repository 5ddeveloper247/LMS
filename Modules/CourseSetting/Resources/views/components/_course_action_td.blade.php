<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        @if ($query->type != 'full_course' || $query->type != 'prep_course_live')
            <a target="_blank" href="{{ route('courseDetailsView',['slug' => $query->courses->parent->slug , 'courseType' => $query->courses->type]) }}"
            {{-- <a target="_blank" href="{{ courseDetailsUrl($query->courses->id, $query->courses->type, $query->courses->slug) }}" --}}
                class="dropdown-item">
                {{ trans('courses.Frontend View') }}</a>
            @if (permissionCheck('courseDetails') && $query->type == 1)
                <a href="{{ route('courseDetails', [$query->id]) }}" class="dropdown-item">
                    {{ __('courses.Add Lesson') }}</a>
            @endif
        @endif
        {{-- <a onclick="" href="javascript:void(0)"
            class="dropdown-item edit_brand">Course Reviews</a> --}}
        @if (Settings('frontend_active_theme') == 'edume')
            @if ($query->feature == 0)
                <a href="{{ route('courseMakeAsFeature', [$query->id, 'make']) }}" class="dropdown-item">
                    {{ trans('courses.Mark As Feature') }}
                </a>
            @else
                <a href="{{ route('courseMakeAsFeature', [$query->id, 'remove']) }}" class="dropdown-item">
                    {{ trans('courses.Remove Feature') }}
                </a>
            @endif
        @endif
        @if ($query->type == 'full_course' || $query->type == 'prep_course_live')
            <a href="{{ route('editCoursePlan', [$query->id]) }}" class="dropdown-item">
                {{ __('common.Edit') }}
            </a>
        @else
            @if (permissionCheck('course.edit'))
                <a href="{{ route('courseDetails', [$query->id]) . '?type=courseDetails' }}" class="dropdown-item">
                    {{ __('common.Edit') }}
                </a>
            @endif
            @if (permissionCheck('course.view'))
                <a href="{{ route('courseDetails', [$query->id]) }}" class="dropdown-item">
                    {{ trans('common.View') }}
                </a>
            @endif
        @endif

        @if ($query->type == 'full_course' || $query->type == 'prep_course_live')
            <a onclick="confirm_modal('{{ route('deleteCoursePlan', $query->id) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @else
            @if (permissionCheck('course.delete'))
                <a onclick="confirm_modal('{{ route('course.delete', $query->id) }}')"
                    class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
            @endif
            @if (permissionCheck('course.enrolled_students') && $query->type == 1)
                <a href="{{ route('course.enrolled_students', $query->id) }}" class="dropdown-item edit_brand">
                    {{ trans('student.Students') }}
                </a>
            @endif

            @if (isModuleActive('CourseInvitation') && permissionCheck('course.courseInvitation') && $query->type == 1)
                <a href="{{ route('course.courseInvitation', $query->id) }}"
                    class="dropdown-item edit_brand">{{ trans('common.Send Invitation') }}</a>
            @endif

            @if (permissionCheck('course.AddToSale') && $query->type == 1)
                <a href="{{ route('course.addToSale', [$query->id]) }}"
                    class="dropdown-item edit_brand">{{ 'Repeat Course' }}</a>
            @endif
        @endif
    </div>
</div>
