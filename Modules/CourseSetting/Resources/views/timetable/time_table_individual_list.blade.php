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
                                                            data-image="{{ $WeekWiseDay->image }}"
                                                            data-comment="{!! $WeekWiseDay->comment !!}"
                                                            data-content="{{ $WeekWiseDay->content }}"
                                                            onclick="edit(this,{{ $time_table->week }},{{ $WeekWiseDay->week }})">
                                                            <i class="fa fa-pencil-alt m-0 py-0" aria-hidden="true"></i>
                                                        </span>
                                                        @if (!empty($WeekWiseDay->date))
                                                            <p>({{ Carbon\Carbon::parse($WeekWiseDay->date)->format('M d, y') }})
                                                            </p>

                                                            @if (!empty($WeekWiseDay->image))
                                                                <div style="width: 100%; text-align:center;">
                                                                    <img src="{{ getCourseImage($WeekWiseDay->image) }}"
                                                                        class="preview image-editor-preview-img-1"
                                                                        id="image_preview-1"
                                                                        style="width:80px;height:80px;" />
                                                                </div>
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
                    <form action="{{ route('Add.list.IndividualTimeTable') }}" method="POST" class="row"
                        id="calender_form" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="time_table_id" value="{{ old('id') }}">
                        @csrf
                        <div class="col-xl-12">
                            <div class="primary_input mb-35">
                                <label class="primary_input_label">
                                    Image (Recommended Dimensions: 300X300)
                                </label>
                                <div class="primary_file_uploader" id="image_file-1">
                                    <input class="primary-input filePlaceholder" type="text" id="input-1"
                                        placeholder="{{ __('Browse Image file') }}" readonly="">
                                    <button class="" type="button">
                                        <label class="primary-btn small fix-gr-bg" id="avatar"
                                            for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                        <input type="file" class="d-none fileUpload" name="image"
                                            id="document_file_thumb-1" accept="image/jpeg, image/png">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for="">{{ __('Comment') }}
                                    <strong class="text-danger">*</strong></label>
                                <textarea class="primary-input primary_input_field form-control"
                                    {{ $errors->first('comment') ? 'autofocus' : '' }} name="comment" rows="4" id="comment"
                                    style="border-radius:10px; padding:10px;">{{ old('comment') }}</textarea>
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
            var image = $(el).attr('data-image');
            var comment = $(el).attr('data-comment');
            var selectedContenttxt = '';
            $('#date').val(date);

            $("#document_file_thumb-1").val('');
            $("#input-1").val(image);

           // $('#comment').summernote('code', comment);
                         $('#comment').val(comment);
            $('#time_table_id').val(id);
            $('#addTimeTableModel').modal('show');
        }

        $(document).ready(function() {
            var form = $('#calender_form');

            $('#submit_btn').on('click', function() {

                //                 let instructor_id = form.find('#instructor_id');
                // let image = $('#document_file_thumb-1')[0].files[0] != undefined ? $(
                //     '#document_file_thumb-1')[0].files[0] : $("#input-1").val();
                let image = form.find('#document_file_thumb-1');
                let comment = form.find('#comment');

                if (image.val() == '' || comment.val() == '') {
                    toastr.error('Please Fill All Fields!', 'Error');
                    return false;
                }

                //                 if (comment.val().length >100) {
                //                     toastr.error('Comment must be less then 100 characters!', 'Error');
                //                     return false;
                //                 }
            });
        });
        $(document).ready(function() {

            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb-1").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = this.width;
                        var image_height = this.height;
                        if (image_width <= 300 && image_height <= 300) {
                            //                             jQuery('#image-editor-modal-1').modal('show', {
                            //                                 backdrop: 'static'
                            //                             });
                        } else {
                            $("#document_file_thumb-1").val('');
                            $('#input-1').val('');
                            toastr.error(
                                'Wrong Image Dimensions, Please Select Image of 300 X 300 !',
                                'Error')
                        }
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });

        });
    </script>

@endpush
