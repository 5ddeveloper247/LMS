@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))



{{-- @section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection --}}

<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
@section('content')
@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        .preloader {
            display: none;
        }

        .is-invalid {
            border: 1px solid red;
        }

        .btn_login {
            width: 135px;
            height: 38px;
            font-size: 16px;
            background: var(--system_primery_color);
            border-radius: 5px;
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 600;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            line-height: 1;
        }

        .btn_login:hover {
            color: var(--system_primery_color);
            background: transparent;
            border-color: var(--system_primery_color);
        }

        .text_reg {
            font-size: 30px;
            font-weight: 900;
            color: var(--system_secendory_color);
            line-height: 50px;
        }

        .heading-reg {
            line-height: 30px;
            color: var(--system_secendory_color);
        }

        .larger-checkbox .form-check-input {
            width: 25px;
            height: 25px;
        }

        .larger-checkbox .form-check-label {
            margin-top: 0;
            font-size: 12px;
            text-align: justify;
        }

        .label-reg {
            font-size: 14px;
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: none !important;
            border-color: #ced4da;
        }

        .note-h {
            width: 600px;
            background-color: rgb(246 227 201);
            padding: 10px;
        }

        /* timeline */
        .timeline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            height: 30px;
            position: relative;
            height: 30px;
        }

        .inside-line {
            background: #e9ecef;
            height: 2px;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }

        .dott {
            border-radius: 50%;
            padding: 7px;
            width: 40px;
            height: 40px;
            background-color: #ccc;
            color: #fff;
            z-index: 1;
            text-align: center;
        }

        .dott.active {

            background-color: var(--system_primery_color);
        }

        @media only screen and (max-width: 578px) {
            .btn_login {
                width: 92px;
                height: 38px;
                font-size: 12px;
                text-align: center;
            }

            h6,
            span,
            .form-group {
                font-size: 14px;
            }

        }

        @media only screen and (min-width: 769px) and (max-width: 1024px) {

            h6,
            span,
            .form-group,
            .btn_forget,
            .btn_login {
                font-size: 14px;
            }
        }
    </style>

    <div class="container px-xl-5">
        <div class="row py-5">
            <!-- Left side - Registration Form -->
            <div class="col-md-12 ">
                <h3 class="text-uppercase text-center text_reg">We are merakii </h3>
                <h6 class="text-center mb-4 text-capitalize heading-reg">welcome to merakii <br><span
                        class="font-weight-300">please download the form </span></h6>
                <!-- <h6 class="text-center mb-4 text-capitalize heading-login">hello, welcome to merakii</h6>  -->
                <div class="timeline">
                    <div class="inside-line"></div>

                    <div class="dott">1</div>
                    <div class="dott ">2 </div>
                    <div class="dott">3</div>
                    <div class="dott active">4 </div>
                    <div class="dott">5</div>
                    <div class="dott">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>

                <form action="{{ route('register.3') }}" method="POST" id="regForm">
                    @csrf
                    <!-- widgetsform -->
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    @if (\App\Models\UserAuthorzIationAgreement::where('user_id', $user->id)->exists())
                        <div class="mt-5 text-center d-flex justify-content-center">
                            <h6 class="text-capitalize note-h">Note! your authorization form has already been uploaded as
                                per
                                persent</h6>
                        </div>
                    @else
                        <div class="mt-5 text-center d-flex justify-content-center">
                            <h6 class="text-capitalize note-h"> Please Download the Authorization Form by
                                clicking
                                the Download Button.</h6>
                        </div>
                    @endif
            </div>
            <div class="col-md-12 text-center mt-4 d-flex justify-content-center align-items-center gap-2">
                <a href="{{ route('register.declaration') }}" class="btn btn_login d-flex justify-content-center align-items-center" id="back-button">Back Page</button>
                    @if (\App\Models\UserAuthorzIationAgreement::where('user_id', $user->id)->exists())
                        <a href="{{ route('register.pay') }}" class="btn btn_login d-flex justify-content-center align-items-center">
                            Next Page</a>
                    @else
                        <a href="{{ asset('public/student_affidavit/agreement_form/Agreement_file.pdf') }}"
                            download="Agreement_file.pdf" id="redirect_to" class="btn btn_login d-flex justify-content-center align-items-center ">Download
                            Form</a>
                    @endif

            </div>


        </div>
    </div>
    </form>

    @include(theme('partials._custom_footer'))
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script>


    <script>

        // document.getElementById('back-button').addEventListener('click', function () {
        //     window.location.href = '{{ route('register.declaration') }}';
        // });

        $(document).ready(function() {
            $("#redirect_to").click(function() {
                // var url = "{{ route('register.pay') }}";
                window.setTimeout(function() {
                    $('#regForm').submit();
                    // window.location.href = url;
                }, 2500);
            });
        });
    </script>
@endsection
