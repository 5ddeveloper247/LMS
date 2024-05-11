@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $tutor->name }}
@endsection
{{-- @section('css') --}}
<style>
    .ankartag {

        background-color: #e9dbf4;
    }

    .ankartag a {
        text-decoration: none;
        color: black;
        font-size: 12px;
        padding-left: 1%;
    }

    .ankartag i {
        font-size: 12px;
        padding-left: 1%;
        color: black;
    }

    /* .profiledetails h2 {
        font-size: 45px;
    } */

    /* .profiledetails p {
        letter-spacing: 4px;
    } */

    .borderBootom {
        border-bottom: 1px #e9dbf4 solid;

    }

    .form-control {

        background-color: #e1e1e1;
    }

    /* .italicPara i {
        font-size: calc(.7vw + 0.7rem);
    } */

    .just {
        text-align: justify;
    }

    .marginCont {
        margin: 29px 0px;
    }

    .btndo img {
        width: 20px;
    }

    .btndo .btn {
        color: black;
        background-color: #e9dbf4;
        border: none;
        transition: 1s;


    }

    .btndo i {
        font-size: 15px;

    }

    .btndo .btn:hover {
        color: rgb(255, 254, 254);
        border: none;

    }

    .share:hover {
        background-color: #3b5998;
    }

    .twitter:hover {
        background-color: #1da1f2;
    }

    .pinterest:hover {
        background-color: #bd081c;
    }

    .btn {
        margin-left: 1%;
    }

    .displayNone {
        display: none;
    }

    .imgcontrol {
        margin-top: 4rem;

    }

    .imgcontrol img {
        height: 450px;
        width: 450px;
    }

    @media (max-width: 500px) {

        .imgcontrol img {
            height: 300px;
            width: 300px;
        }

        .profiledetails h2 {
            font-size: 30px;

        }

        /* .displayNone {
                display: block;
                text-align: center;
                padding-top: 3rem;
            }

            .displayNoneMainProfile {
                display: none;
            }

            .imgcontrol {
                margin-top: 0rem;
            } */
    }

    /* @media (width > 1650px) {

        span {
            font-size: 1.2rem !important;
        }


        #total_amount_text {
            font-size: 28px !important;
            line-height: 1.2 !important;
        }

        h6 {
            font-size: 1.2rem !important
        }

        .h6 {
            font-size: 1.2rem !important
        }

        label {
            color: #7e7e7e;
            cursor: pointer;
            font-size: 23px !important;
        }

        .theme_btn {
            font-size: 23px !important;
        }

        h5 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        .imgcontrol img {
            height: 500px;
            width: 500px;
        }
    } */

    .section-margin-y {
        margin: 60px auto !important;
    }
</style>
{{-- @endsection --}}
{{-- @section('js')
    <script>
        function shoot(id) {
            if (id == 1) {
                $('.registermain').addClass('d-none');
                $('.whatmain').removeClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            }
            if (id == 2) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').removeClass('d-none');
            } else if (id == 3) {
                $('.registermain').removeClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 4) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').removeClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 5) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').removeClass('d-none');
                $('.coursemain').addClass('d-none');
            }

        }
    </script>
@endsection --}}

@section('mainContent')
    <div class="Container ">
        {{-- <div class="row ankartag m-0">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <div class="py-1">
                    <a href="" class="">NCLECH HIGH YIELD</a><i class="bi bi-chevron-right"></i>
                    <a href="" class="">NCLECH HIGH YIELD</a><i class="bi bi-chevron-right"></i>
                    <a href="" class="">NCLECH HIGH YIELD</a><i class="bi bi-chevron-right"></i>
                </div>
            </div>
        </div> --}}
        <div class="px-md-4 px-1 mb-lg-5 row">
            <div class="col-md-2 displayNone">
                <h2>{{ $tutor->name }}</h2>
                <div class="iconstar my-3">
                    <div class="course_feedback_left">
                        <h2>{{ $tutor->total_tutor_rating }}</h2>
                        <div class="feedmak_stars">

                            @php

                                $main_stars = $tutor->total_tutor_rating;

                                $stars = intval($tutor->total_tutor_rating);
                            @endphp
                            @for ($i = 0; $i < $stars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @if ($main_stars > $stars)
                                <i class="fas fa-star-half"></i>
                            @endif
                            @if ($main_stars == 0)
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            @endif
                        </div>
                        <span>Tutor Rating</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="text-center mt-5">
                    <img src="{{ asset($tutor->image) }}" class="img-fluid" style="height:60vh; border-radius:30%">
                </div>
            </div>
            <div class="col-md-8 px-xl-5 px-2">
                <div class="d-flex displayNoneMainProfile gap_15 mt-lg-5 profiledetails">
                    <div>
                        <h2 class="font-weight-bold mb-0">{{ $tutor->name }}</h2>
                        <p class="mt-1 mb-4">${{ $tutor->tutor_price }} | hr. </p>
                    </div>

                    <div class="iconstar my-sm-3 mx-auto">
                        <div class="course_feedback_left">

                            <div class="feedmak_stars">
                                <span>({{ $tutor->total_tutor_rating }})</span>
                                @php

                                    $main_stars = $tutor->total_tutor_rating;

                                    $stars = intval($tutor->total_tutor_rating);
                                @endphp
                                @for ($i = 0; $i < $stars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @if ($main_stars > $stars)
                                    <i class="fas fa-star-half"></i>
                                @endif
                                @if ($main_stars == 0)
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <span>Tutor Rating</span>
                        </div>
                    </div>
                </div>


                <div class="borderBootom"></div>
                <form action="{{ route('tutorPayment') }}" method="post" id="form_submit">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                    <input type="hidden" name="amount" value="0" id="total_amount">
                    <div class="mb-2">
                        <label for="course_id" class="form-label">Courses</label>
                        <select name="course_id" id="course_id" class="form-control form-select" required>
                            <option value="">Select Course</option>
                            @forelse ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @empty
                                <option disabled>No Course</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="date" class="form-label">Select Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="time_slot" class="form-label">Time Slots</label>

                        <div class="row" id="time_slots">

                            <div class="col-12">
                                <p>Please Select Date First</p>
                            </div>

                        </div>
                        <div class="mt-2">
                            <p> Total ($): <span id="total_amount_text" class="font-weight-bold">0</span></p>

                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        @if(isAdmin())
                            <small class="alert-warning px-2 py-1">Admin cannot place order</small>
                        @endif
                        <button  id="form_button" class="theme_btn small_btn2 w-100 mt-4 text-center"
                            style="display: none;" {{ isAdmin() ? 'disabled': '' }}>Proceed To Pay
                        </button>
                    </div>
                </form>
                <p class="mt-3">
                    All the different tutoring options taught by Nurse Jocelyn. Once purchased, please allow 24-72
                    business
                    hours for the tutor to reach out to you.
                </p>
                <div class="mt-3 mb-3 italic">
                    <p class="">
                        You <b>must</b> reach out to your tutor to reschedule/cancel your appointment at least 24 hours
                        prior to the scheduled session. If no notice is given, the full appointment fee will be charged.
                    </p>
                </div>
                <div class="italicPara">
                    <h5 class="font-italic font-weight-bold text-dark">

                        TUTORING MUST BE SCHEDULED/USED WITHIN 60 DAYS OF PURCHASE OR YOU WILL NOT RECEIVE A REFUND.

                    </h5>

                    {{-- <div class="btndo my-3">
                        <a class="small_btn4 theme_btn"><i class="bi bi-facebook"></i> SHARE</a>
                        <a class="small_btn4 theme_btn"><i class="bi bi-twitter"></i> TWITTER</a>
                        <a class="small_btn4 theme_btn"><i class="bi bi-pinterest"></i> PIN IT</a>

                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @include(theme('partials._custom_footer'))

    <script>
        var price_per_hour = {{ $tutor->tutor_price }};

        function changePrice(el) {
            var price = parseInt($('#total_amount').val());

            if (el.checked) {
                $('#total_amount').val(price + price_per_hour)
                $('#total_amount_text').text(price + price_per_hour)
            } else {
                $('#total_amount').val(price - price_per_hour)
                $('#total_amount_text').text(price - price_per_hour)
            }
            if (parseInt($('#total_amount').val()) == 0) {
                $('#form_button').hide();
            } else {
                $('#form_button').show();
            }
        }

        $(document).ready(function() {
            $('#date').change(function(e) {
                e.preventDefault();
                var date = $(this).val();
                console.log(date);
                var url = '{{ route('checkAvailableSlots') }}';
                var tutor_id = {{ $tutor->id }}
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        date: date,
                        tutor_id: tutor_id
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#total_amount').val(0)
                        $('#total_amount_text').text('0')

                        var html = '';
                        if (response.length == 0) {
                            $('#time_slots').html(
                                `<div class="col-12 mt-2 text-danger font-weight-bold"> Slots Not Available in Selected Date </div>`
                            );
                            return false;
                        }
                        // console.log(response.tutor.start_time);
                        $.each(response, function(key, value) {
                            if (value.start_time != null) {
                                html += ` <div class="col-6">
                                        <label for="date" class="font-weight-bold text-secondary">
                                            <input type="checkbox"  name="time_slot[]" value="` + value.id + `"
                                                onclick="changePrice(this)">
                                            ` + value.start_time + ` --- ` + value.end_time + `
                                        </label>
                                    </div>`;
                                console.log(key, value);
                            }
                        });
                        $('#time_slots').html(html);

                    }
                });
            });
        });
    </script>
@endsection
