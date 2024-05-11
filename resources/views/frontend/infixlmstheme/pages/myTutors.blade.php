@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('My Tutors') }}
@endsection
@section('css')
@endsection


@section('mainContent')
    <div>
        <div class="main_content_iner main_content_padding">
            <div class="dashboard_lg_card">
                <div class="container-fluid no-gutters">
                    <div class="my_courses_wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 margin-50">
                                    <h3>

                                        {{ __('Tutors') }}

                                    </h3>
                                </div>
                            </div>
                        </div>

                        @if (count($tutors)>0)
                        <div class="row">
                                @foreach ($tutors as $tutor)
                                    {{-- @dd($tutor->tutorReview) --}}
                                    <div class="col-xl-4 col-sm-6 col-12">
                                        <div class="couse_wizged border">
                                            <div class="thumb">
                                                <div class="thumb_inner lazy"
                                                    data-src="{{ getCourseImage($tutor->instructor->image) }}">
                                                </div>
                                            </div>
                                            <div class="course_content py-3 px-2">
                                                <div class="d-flex justify-content-between">
                                                    <a
                                                        href="{{ route('tutorDetails', [$tutor->instructor->id, \Illuminate\Support\Str::slug($tutor->instructor->name, '-')]) }}">
                                                        <h4 class="noBrake" title=" {{ $tutor->instructor->name }}">
                                                            {{ $tutor->instructor->name }}
                                                        </h4>
                                                    </a>

                                                    <div class="d-flex align-items-center">
                                                        <div class="progress_percent flex-fill text-right">
                                                            @php
                                                                $date_now = \Carbon\Carbon::now()->format('H:i:s');
                                                                if (\Carbon\Carbon::parse($tutor->assign_date)->format('d-m-Y') == \Carbon\Carbon::now()->format('d-m-Y')) {
                                                                    if (\Carbon\Carbon::parse($tutor->assign_start_time)->format('H:i:s') <= \Carbon\Carbon::now()->format('H:i:s') && \Carbon\Carbon::now()->format('H:i:s') <= \Carbon\Carbon::parse($tutor->assign_end_time)->format('H:i:s')) {
                                                                        $currentstat = 'started';
                                                                    } elseif (\Carbon\Carbon::parse($tutor->assign_start_time)->format('H:i:s') > \Carbon\Carbon::now()->format('H:i:s')) {
                                                                        $currentstat = 'waiting';
                                                                    } else {
                                                                        $currentstat = 'closed';
                                                                    }
                                                                } else {
                                                                    $currentstat = 'closed';
                                                                }
                                                                if (\Carbon\Carbon::parse($tutor->assign_date)->format('d-m-Y') > \Carbon\Carbon::now()->format('d-m-Y')) {
                                                                    $currentstat = 'waiting';
                                                                }
                                                            @endphp
                                                            @if ($currentstat == 'started')
                                                                <a href="{{ $tutor->meeting_join_url }}"
                                                                    class="link_value theme_btn small_btn4">Join</a>
                                                            @elseif($currentstat == 'waiting')
                                                                <a href="#"
                                                                    class="link_value theme_btn bg-info small_btn4">Waiting</a>
                                                            @else
                                                                {{-- @dd($tutor->tutorReview) --}}
                                                                @if (empty($tutor->tutorReviewRating))
                                                                    <a href="#"
                                                                        class="link_value bg-warning theme_btn small_btn4 modal_btn border-warning text-black-50"
                                                                        data-toggle="modal" data-target="#exampleModal"
                                                                        data-hiring_id="{{ $tutor->id }}"
                                                                        data-instructor_id="{{ $tutor->instructor->id }}">Review</a>
                                                                @endif
                                                                <a href="#"
                                                                    class="link_value bg-warning theme_btn small_btn4 border-warning text-black-50">Closed</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="course_less_students mt-3">
                                                    <ul>
                                                        <li>
                                                            <div class="d-inline">Date:</div>
                                                            <div class="d-inline float-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_date)->format('d M Y') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline">Start Time:</div>
                                                            <div class="d-inline float-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_start_time)->format('H:i a') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline">End Time:</div>
                                                            <div class="d-inline float-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_end_time)->format('H:i a') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline">Course:</div>
                                                            <div class="d-inline float-right">
                                                                {{ $tutor->course->title ?? 'Delete Course' }}
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    {{-- {{ \Carbon\Carbon::parse($tutor->assign_date)->format('d M Y') . ' ' . $tutor->assign_start_time . ' ' . $tutor->assign_end_time }} --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="my-4 mt-4">
                                {{ $tutors->links() }}
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12 text-center">
                                    No Tutor Found
                                </div>
                            </div>

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tutor Review Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Review</h3>
                    <button type="button" class="close close_btn" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" id="review_form" class="form row" method="POST">
                        @csrf
                        <input type="hidden" name="instructor_id" id="instructor_id" value="">
                        <input type="hidden" name="hiring_id" id="hiring_id" value="">
                        <div class="col-xl-12">
                            <label class="form-label" for="">{{ __('Write Reviews') }}</label>
                            <textarea id="reviews" class="form-control" name="reviews" rows="5" cols="8" style="resize: none">{{ old('reviews') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="">{{ __('Rating') }}</label>
                            <select class="form-control" id="rating" name="rating"
                                {{ $errors->has('rating') ? 'autofocus' : '' }}>
                                <option data-display="{{ __('common.Select') }}" value="">{{ __('common.Select') }}
                                </option>
                                <option value="1" class="text-warning">&#9733;</option>
                                <option value="2" class="text-warning">&#9733;&#9733;</option>
                                <option value="3" class="text-warning">&#9733;&#9733;&#9733;</option>
                                <option value="4" class="text-warning">&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="5" class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close_btn"
                        style="border: 1px solid #c738d8; background: transparent;">Close</button>
                    <button type="button" class="btn link_value small_btn4 custom_student_btn theme_btn6"
                        id="review_submit_btn"><i class="fa fa-spinner fa-spin d-none"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "showDuration": 300,
                "timeOut": 4000,
                "hideDuration": 1000,
                "preventDuplicates": true,
            }
            var review_form = $('#review_form');
            var submit_btn = $('#review_submit_btn');
            $('.modal_btn').on('click', function(e) {
                var hiring_id = $(this).data('hiring_id');
                var instructor_id = $(this).data('instructor_id');
                review_form.find('#hiring_id').val(hiring_id);
                review_form.find('#instructor_id').val(instructor_id);
            });
            $(submit_btn).on('click', function() {
                let reviews = review_form.find('#reviews').val();
                let rating = review_form.find('#rating').val();
                if (reviews == '') {
                    toastr.error('Please Write Some Review', 'Error');
                    return false;
                } else if (rating == '') {
                    toastr.error('Please Select Rating', 'Error');
                    return false;
                }
                $(this).find('i.fa-spinner').removeClass('d-none');
                let url = '{{ route('tutorReview') }}';
                let form = new FormData(review_form[0]);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            toastr.success(response.message, 'Success');
                            modalFormControl();
                            setTimeout(function() {
                                location.reload(true);
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'error');
                        }
                    }
                });
            });
            $('.close_btn').on('click', function() {
                modalFormControl();
            });

            function modalFormControl() {
                review_form.trigger("reset");
                review_form.parents('.modal').modal('hide');
            }
        });
    </script>
@endsection
