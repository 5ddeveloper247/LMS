@extends('backend.master')
@push('styles')
@endpush
<style>
    #lms_table tr,
    td {
        width: 12.5% !important;
        height: 120px !important;
    }

    .table_th {
        width: 12.5% !important;
        text-align: center;
    }

    .pencil_icon {
        font-size: 12px;
        position: absolute;
        right: 5px;
        top: 10px;
    }
</style>
@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">


        <div class="white_box mb_30 student-details header-menu">
            <div class="white_box_tittle list_header">
                <h4>{{ $time_table->name }} {{ __('View') }} </h4>

            </div>
            <div class="col-lg-12">
                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table">
                        <!-- table-responsive -->
                        <div class="table-responsive">
                            <table class="table-bordered table table-responsive">
                                <thead>
                                    <tr>
                                        <th class="" style="padding:unset !important;text-align:center;">
                                            {{ __('Weeks') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 1') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 2') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 3') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 4') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 5') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 6') }}</th>
                                        <th class="table_th" style="padding:unset !important;"> {{ __('Day 7') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($time_tables as $time_table)
                                        <tr>
                                            {{-- @dd($time_table) --}}
                                            <td style="padding:unset !important;text-align:center;width: 10% !important;">
                                                Week {{ $time_table->week }}</td>
                                            @foreach ($time_table->weekWiseDays as $WeekWiseDay)
                                                <td class="p-1">
                                                    @php
                                                        $current_date = Carbon\Carbon::now()->format('Y-m-d');
                                                        $date = Carbon\Carbon::parse($WeekWiseDay->date)->format('Y-m-d');
                                                        // dd($current_date, $date);
                                                    @endphp

                                                    <div id="block_{{ $time_table->week }}_{{ $WeekWiseDay->week }}">
                                                        <span
                                                            class="{{ $current_date > $date ? 'd-none' : '' }} pencil_icon float-right"
                                                            data-id="{{ $WeekWiseDay->id }}"
                                                            data-date="{{ $WeekWiseDay->date }}"
                                                            data-Instructor_id="{{ $WeekWiseDay->Instructor_id }}"
                                                            data-comment="{{ $WeekWiseDay->comment }}"
                                                            data-content="{{ $WeekWiseDay->content }}"
                                                            onclick="edit(this,{{ $time_table->week }},{{ $WeekWiseDay->week }})">
                                                            <i class="fa fa-pencil-alt m-0 py-0" aria-hidden="true"></i>
                                                        </span>
                                                        @if (!empty($WeekWiseDay->date))
                                                            <p>({{ Carbon\Carbon::parse($WeekWiseDay->date)->format('M d, y') }})
                                                            </p>
                                                            @if (!empty($WeekWiseDay->Instructor_id))
                                                                <p class="mt-2">
                                                                    <strong>{{ !empty($WeekWiseDay->Instructor_id) ? (!empty($WeekWiseDay->instructor) ? $WeekWiseDay->instructor->name : 'Deleted User') : '' }}</strong>
                                                                </p>
                                                            @endif
                                                            @if (!empty($WeekWiseDay->content))
                                                                <p class="mt-1">
                                                                    @php
                                                                        $all_contents = json_decode($WeekWiseDay->content);
                                                                        $contents = implode(', ', $all_contents);
                                                                    @endphp
                                                                    <strong>{{ $contents }}</strong>
                                                                </p>
                                                            @endif
                                                        @else
                                                            <h1>-</h1>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade admin-query" id="addTimeTableModel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add Time Table') }} </h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Add.list.TimeTable') }}" method="POST" class="row" id="calender_form">
                        <input type="hidden" name="id" id="time_table_id">
                        @csrf
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('Tutor') }} <strong
                                        class="text-danger">*</strong></label>
                                <select class="primary_select" name="Instructor_id" id="Instructor_id"
                                    {{ $errors->has('assign_instructor') ? 'autofocus' : '' }} required>
                                    <option data-display="{{ __('common.Select') }} {{ __('courses.Instructor') }}"
                                        value="">{{ __('common.Select') }} {{ __('courses.Instructor') }} </option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}">{{ @$instructor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('Content') }} <strong
                                        class="text-danger">*</strong></label>
                                <select class="multypol_check_select active mb-15 e1" multiple name="content[]"
                                    id="content">
                                    <option value="Class">Class</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Lecture">Lecture</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('Comment') }} <strong
                                        class="text-danger">*</strong></label>
                                <textarea class="primary-input primary_input_field form-control lms_summernote"
                                    {{ $errors->first('comment') ? 'autofocus' : '' }} name="comment" rows="4" id="comment"
                                    style="border-radius:10px; padding:10px;" required>{{ old('comment') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>
                            <button class="primary-btn fix-gr-bg" type="submit" id="submit_btn"><i class="ti-check"></i>
                                {{ __('common.Save') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if ($errors->any())
        <script>
            @if (Session::has('Addtime'))
                $('#addTimeTableModel').modal('show');
            @endif
        </script>
    @endif
    <script>
        function edit(el, week, day) {
            var id = $(el).attr('data-id');
            var date = $(el).attr('data-date');
            var Instructor_id = $(el).attr('data-Instructor_id');
            var content = $(el).attr('data-content');
            var comment = $(el).attr('data-comment');
            var selectedContenttxt = '';
            $('#date').val(date);
            $('#Instructor_id').val(Instructor_id);
            $('#Instructor_id').niceSelect('update');

            if (content != '') {
                var contentArray = JSON.parse(content);
                $('.infix_ul_lists').find('li').removeClass('selected');
                $.each(contentArray, function(index, value) {
                    var checkbox = $('.infix_ul_lists').find('li input[value="' + value + '"]');
                    if (checkbox.length) {
                        checkbox.prop('checked', true);
                        checkbox.closest('li').addClass('selected');
                        // console.log('selected: ' + value);
                    }
                    selectedContenttxt = selectedContenttxt == '' ? value : selectedContenttxt + ', ' + value;
                });

                $('#ms-list-1').find('span').first().text(selectedContenttxt);
                $('#content').val(contentArray);
                $('#content').niceSelect('update');
            } else {
                $('.infix_ul_lists').find('li').removeClass('selected');
            }
            $('#comment').summernote('code', comment);
            //             $('#comment').val(comment);

            $('#time_table_id').val(id);
            $('#addTimeTableModel').modal('show');
        }

        $(document).ready(function() {
            var form = $('#calender_form');

            $('#submit_btn').on('click', function() {

                // let instructor_id = form.find('#instructor_id');
                // let comment = form.find('#comment').summernote('code');
                // if (instructor_id.val() == '' || $(comment).text() == '') {
                //     toastr.error('Please Fill All Fields!', 'Error');
                //     return false;
                // }
                //                 if (comment.val().length >100) {
                //                     toastr.error('Comment must be less then 100 characters!', 'Error');
                //                     return false;
                //                 }
            });
        });
    </script>
@endpush
