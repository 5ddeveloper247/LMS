@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))



{{-- @section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection --}}
{{-- signature --}}
<script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        .preloader {
            display: none;
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

        .reg_img {
            /* min-height: 72vh;
            min-height: 500px; */
            max-width: 100%;
            width: 100%;
        }
        .reg_img img{
            height: 45%;
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

        .login-span {
            cursor: pointer;
            color: var(--system_primery_color)
        }

        input.outside,
        input[class=outside],
        [type=password].outside {
            color: #555;
            width: 100%;
            font-size: 1rem;
            line-height: normal;
            border: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
            box-sizing: border-box;
            /* margin-bottom: -1px; */
            padding: .375rem 45px;
            position: relative;
            z-index: 1;
            height: calc(1.5em + .75rem + 2px);
        }

        input:focus,
        select:focus {
            outline: 0 !important;
            color: #555 !important;
            border-color: #9e9e9e;
            z-index: 2
        }

        input:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside {
            top: 15px;
            left: 40px;
            font-size: 15px;
            opacity: 1;
            font-weight: 400
        }

        input:focus~.floating-label-outside,
        input[type="date"]~.floating-label-outside,
        input:valid~.floating-label-outside {
            top: -10px;
            opacity: 1;
            font-size: 15px;
            color: #727272;
            background: #fff;
            padding: 0px 5px;
        }

        input:focus~.floating-label-outside,
        input[type="date"]~.floating-label-outside,
        input:not(:focus):valid~.floating-label-outside {
            left: 40px
        }

        .form-control:focus {
            box-shadow: none !important;
            border-color: #ced4da;
        }

        .floating-label-outside {
            position: absolute;
            pointer-events: none;
            left: 60px;
            top: 12px;
            transition: .2s ease all;
            color: #777;
            font-weight: 500;
            font-size: 10px;
            letter-spacing: .5px;
            z-index: 3;
            text-transform: uppercase
        }

        .input-icon-outside {
            position: absolute;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            height: 100%;
            top: 0.5px;
            left: 0.5px;
            z-index: 3;
            color: #fff;
            background: linear-gradient(0deg, rgb(255, 118, 25) 0%,rgb(153, 102, 153) 75%);
            padding: .4rem .75rem;
            display: flex;
            align-items: center;
            border-right: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        .btn_login {
            /* width: 135px;
            height: 38px; */
            font-size: 16px;
            background: var(--system_primery_color);
            border-radius: 16px;
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 700;
            border: 2px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            /* line-height: 1; */
            padding: 0.5rem 1.5rem;
            white-space: nowrap;
        }

        .btn_login:hover {
            color: var(--system_primery_color);
            background: transparent;
            border-color: var(--system_primery_color);
        }

        /* signature */
        .signature {
	border: 1px solid #ced4da;
	height: 155px;
	width: 100%;
    overflow: hidden;
}

#root {
	height: 100%;
	width: 100%;
	/* max-width: 1200px;
	max-height: 130px; */
	/* margin: 0 auto; */
}

canvas {
	/* width: 100%; */
	height: 100%;
}

.sign-btn {
	position: absolute;
	bottom: 1px;
	right: 6px;
}

.reset-btn,
.save-btn {
    background: var(--system_primery_color);
            border-radius: 5px;
            font-family: Source Sans Pro, sans-serif;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            padding: 6px 10px;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            line-height: 1;
            margin: 10px;
}
.reset-btn:hover,
.save-btn:hover {
    border-color: var(--system_primery_color);
            background: transparent;
    color: var(--system_primery_color) !important;
}
.reset-btn:focus,
.save-btn:focus {
    border-color: var(--system_primery_color);
            background: transparent;
    color: var(--system_primery_color) !important;
}
.date-btn{
    border: 0px;
    font-size: 12px;
    background-color: #e9ecef;
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

        @media only screen and (max-width: 767px) {
            .login-txt {
                margin-top: 20px;
                text-align: center;
            }

            .btn_login {
                /* width: 92px; */
                /* height: 38px; */
                font-size: 12px;
                text-align: center;
            }

            h6,
            span,
            .form-group {
                font-size: 14px;
            }

            .data {
                margin-top: 10px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1024px) {

            h6,
            span,
            .form-group {
                font-size: 13px;
            }

            /* .reg_img {
                max-height: 420px;
                max-width: 375px;
            } */

            .data {
                margin-top: 10px;
            }
        }

        @media only screen and (min-width: 1300px) {
            .data {
                margin-top: -23px;
            }
        }

        @media only screen and (min-width: 1800px) {
            /* .reg_img {
                max-height: 495px;
                max-width: 100%;
            } */
            .btn_login{
                border-radius: 20px !important;
            }
        }
    </style>

    <div class="container px-xl-5">
        <div class="row my-4 my-lg-5 px-xl-5">
            <!-- Left side - Registration Form -->
            <div class="col-md-8 mb-5 mb-md-0">
                <h3 class="text-uppercase text-center text_reg">We are merakii </h3>

                <h6 class="text-center mb-4 text-capitalize heading-reg">hello, welcome to merakii <br><span
                        class="font-weight-300">please fill the form below to get started</span></h6>

                <div class="timeline">
                    <div class="inside-line"></div>

                    <div class="dott active">1</div>
                    <div class="dott ">2 </div>
                    <div class="dott">3</div>
                    <div class="dott">4 </div>
                    <div class="dott">5</div>
                    <div class="dott">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>
                <form action="{{ route('register') }}" method="POST" id="regForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="is_user_setting" value="1">
                    <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
                    @if (count($errors))
                        {{-- @dd($errors) --}}
                        <div class="mt-5 alert alert-danger alert-dismissible fade f-block @if (count($errors)) show @endif"
                            role="alert">
                            <strong>Required!</strong> Please Fill all Fields.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br>
                    @endif

                    @if ($errors->first('email') || $errors->first('password') || $errors->first('phone'))
                        <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                            role="alert">
                            <ul>
                                @if ($errors->first('email'))
                                    <li>
                                        {{ $errors->first('email') }}
                                    </li>
                                @endif
                                @if ($errors->first('phone'))
                                    <li>
                                        {{ $errors->first('phone') }}
                                    </li>
                                @endif
                                @if ($errors->first('password'))
                                    <li>
                                        {{ $errors->first('password') }}
                                    </li>
                                @endif
                                @if ($errors->first('f_name'))
                                    <li>
                                        {{ $errors->first('f_name') }}
                                    </li>
                                @endif
                                @if ($errors->first('l_name'))
                                    <li>
                                        {{ $errors->first('l_name') }}
                                    </li>
                                @endif
                                @if ($errors->first('dob'))
                                    <li>
                                        {{ $errors->first('dob') }}
                                    </li>
                                @endif
                                @if ($errors->first('SS'))
                                    <li>
                                        {{ $errors->first('SS') }}
                                    </li>
                                @endif
                                @if ($errors->first('city'))
                                    <li>
                                        {{ $errors->first('city') }}
                                    </li>
                                @endif
                                @if ($errors->first('state'))
                                    <li>
                                        {{ $errors->first('state') }}
                                    </li>
                                @endif
                                @if ($errors->first('zip'))
                                    <li>
                                        {{ $errors->first('zip') }}
                                    </li>
                                @endif
                                @if ($errors->first('mailing_address'))
                                    <li>
                                        {{ $errors->first('mailing_address') }}
                                    </li>
                                @endif
                                @if ($errors->first('program_review'))
                                    <li>
                                        {{ $errors->first('program_review') }}
                                    </li>
                                @endif
                            </ul>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="form-row">

                        <div class="col-md-12 my-3">
                            <h6 class="mt-5">$100 Fee Required</h6>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('f_name')) is-invalid @endif">
                                <input type="text" name="f_name"
                                    value="{{ (!empty($user) ? (isset(explode(' ', $user->name)[0]) ? explode(' ', $user->name)[0] : null) : null) ?? old('f_name') }}"
                                    class="outside form-control" required />
                                <span class="floating-label-outside">First name</span>
                                <i class="fa fa-user-o input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('l_name')) is-invalid @endif">
                                <input type="text" name="l_name"
                                    value="{{ (!empty($user) ? (isset(explode(' ', $user->name)[1]) ? explode(' ', $user->name)[1] : null) : null) ?? old('l_name') }}"
                                    class="outside" required />
                                <span class="floating-label-outside">Last name</span>
                                <i class="fa fa-user-o input-icon-outside"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('dob')) is-invalid @endif">
                                <input id="dob" type="text" name="dob" autocomplete="off"
                                    value="{{ !empty($user) ? $user->dob : old('dob') }}"
                                    class="outside" max="{{ date('Y-m-d') }}" required>
                                <span class="floating-label-outside">DOB</span>
                                <i class="far fa-calendar input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('SS')) is-invalid @endif">
                                <input type="text" name="SS" value="{{ $userSetting->SS ?? old('SS') }}"
                                    class="outside" required />
                                <span class="floating-label-outside">SS#</span>
                                <i class="bi bi-person-badge input-icon-outside"></i>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="position-relative mt-4 @if ($errors->first('city')) is-invalid @endif">
                                <input type="text"name="city" value="{{ $userSetting->city ?? old('city') }}"
                                    class="outside" required />
                                <span class="floating-label-outside">City</span>
                                <i class="far fa-building input-icon-outside"></i>
                            </div>

                        </div>
                        <div class="form-group col-md-4">
                            <div class="position-relative mt-4 @if ($errors->first('state')) is-invalid @endif">
                                <input type="text" name="state" value="{{ $userSetting->state ?? old('state') }}"
                                    class="outside" required />
                                <span class="floating-label-outside">State</span>
                                <i class="fa fa-flag input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="position-relative mt-4 @if ($errors->first('zip')) is-invalid @endif">
                                <input type="text" name="zip" value="{{ $user->zip ?? old('zip') }}" class="outside"
                                    required />
                                <span class="floating-label-outside">Zip</span>
                                <i class="bi bi-geo input-icon-outside"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('email')) is-invalid @endif">
                                <input type="email" name="email" value="{{ $user->email ?? old('email') }}"
                                    class="outside"autocomplete="off" required />
                                <span class="floating-label-outside">Email</span>
                                <i class="fa fa-envelope-o input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('phone')) is-invalid @endif">
                                <input type="number" name="phone" value="{{ $user->phone ?? old('phone') }}"
                                    class="outside" maxlength="15" minlength="7" required />
                                <span class="floating-label-outside">Cell No</span>
                                <span class="bi bi-telephone-plus input-icon-outside"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('password')) is-invalid @endif">
                                <input id="password1" type="password" name="password" value="{{ old('password') }}"
                                    class="outside" autocomplete="off" minlength="8" required />
                                <span class="floating-label-outside">Password</span>
                                <i id="icon1" class="bi bi-unlock input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('password_confirmation')) is-invalid @endif">
                                <input id="password2" type="password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" class="outside " minlength="8" required />
                                <span class="floating-label-outside">Confirm Password</span>
                                <i id="icon2" class="bi bi-unlock input-icon-outside"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4 @if ($errors->first('mailing_address')) is-invalid @endif">
                                <input type="text" name="mailing_address"
                                    value="{{ $userSetting->mailing_address ?? old('mailing_address') }}"
                                    class="outside " required />
                                <span class="floating-label-outside">Mailing Address</span>
                                <i class="fa fa-address-card-o input-icon-outside"></i>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="form-group form-check larger-checkbox row pl-3">
                        <div class="col-md-12 p-0 my-3">
                            <h6>PROGRAM REVIEW: NCLEX REMEDIAL or RN COURSE
                                REVIEW:</h6>
                        </div>
                        @php
                            if (old('program_review') && !empty(old('program_review'))):
                                $programReview = old('program_review');
                            elseif (!empty($userSetting->program_review)):
                                $programReview = json_decode($userSetting->program_review);
                            else:
                                $programReview = [];
                            endif;
                        @endphp
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('program_review')) is-invalid @endif">
                            <input type="checkbox" name="program_review[]" value="Transition"
                                {{ in_array('Transition', array_values($programReview)) ? 'checked' : '' }}
                                class="form-check-input increae " id="checkbox1">
                            <label class="form-check-label" for="checkbox1">Transition</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('program_review')) is-invalid @endif">
                            <input type="checkbox" name="program_review[]" value="Remedial"
                                {{ in_array('Remedial', array_values($programReview)) ? 'checked' : '' }}
                                class="form-check-input increae " id="checkbox2">
                            <label class="form-check-label" for="checkbox2">Remedial</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('program_review')) is-invalid @endif">
                            <input type="checkbox" name="program_review[]" value="Review"
                                {{ in_array('Review', array_values($programReview)) ? 'checked' : '' }}
                                class="form-check-input increae " id="checkbox3">
                            <label class="form-check-label" for="checkbox3">Review</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-2 checkboxdata  @if ($errors->first('program_review')) is-invalid @endif">
                            <input type="checkbox" name="program_review[]" value="CNA Prep"
                                {{ in_array('CNA Prep', array_values($programReview)) ? 'checked' : '' }}
                                class="form-check-input" id="checkbox4">
                            <label class="form-check-label " for="checkbox4">CNA Prep</label>
                        </div>
                    </div> --}}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="d-flex justify-content-between">
                                <small class="mb-0 font-weight-bold">Please sign up the document and click 'Save' or Upload your signature.</small>
                                <span>Selected file: <small id="sign_filename" class="bg-dark px-2 text-white">No file chosen</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="signature">
                                <div id='root'></div>
                                <div class="" style="position: absolute; bottom: 0; padding: 5px;">
                                    <input class="date-btn" type="date" id="datepicker"
                                        value="{{date('Y-m-d')}}" />
                                </div>
                                <div class="sign-btn" style="position: absolute;">
                                    <input type="button" value="Reset" id="resetCanvas" class="reset-btn mx-1" />
                                    <input type="button" value="Save" id="saveImage" class="save-btn mx-1" />
                                </div>
                                <img id="signatureImage" class="image full-width"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            
                            <input type="file" id="canvasFileInput" name="signature-img" required style="display:none">
                            <label for="canvasFileInput" class="btn btn_login w-100 mt-2">Upload Signature</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn_login mt-4" id="next-button">Next Page</button>
                    </div>
                </form>
            </div>
            <!-- Right side - Image -->
            <div class="col-md-4 px-0">
                <div class="reg_img img-fluid d-none d-md-block h-100">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class="w-100 mb-4" alt="Placeholder Image">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class="w-100 mb-4  d-xxl-none" alt="Placeholder Image">

                    <h6 class="text-uppercase">student centered expert instructors learn anywhere community</h6>
                </div>

                {{-- <div class="data mt-4">
                    <h6 class="login-txt">You have already an account? <span class="login-span"
                            id="myButton">Login</span></h6>
                </div> --}}
            </div>
        </div>
    </div>

    @include(theme('partials._custom_footer'))
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#password2').on('input', function() {
                var password1 = $('#password1').val();
                var password2 = $(this).val();

                if (password1 === password2 && password1 !== '') {
                    $('#icon1').removeClass('bi-unlock').addClass('bi-lock');
                    $('#icon2').removeClass('bi-unlock').addClass('bi-lock');
                } else {
                    $('#icon1').removeClass('bi-lock').addClass('bi-unlock');
                    $('#icon2').removeClass('bi-lock').addClass('bi-unlock');
                }
            });
        });


        $('#canvasFileInput').on('change',function(){
            if (this.files.length > 0) {
                var file = $('#canvasFileInput')[0].files[0].name;
                $('#sign_filename').text(file);
            }else{
                $('#sign_filename').text('No file chosen');
            }
        });
     
    </script>

    {{-- <script>
     var body = document.body;

        if (window.location.pathname == "/register.html") {

        }

        document.getElementById('next-button').addEventListener('click', function () {

            window.location.href = 'reg2.html';
        });
        document.getElementById('myButton').addEventListener('click', function () {

            window.location.href = 'login.html';
        });
    </script> --}}
    
    
    <script>
        function base64ToBlob(base64URL) {
            var parts = base64URL.split(';base64,');
            var contentType = parts[0].split(':')[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;
            var uInt8Array = new Uint8Array(rawLength);

            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], { type: contentType });
        }

        // Function to set the file input field's value with a Blob
        function setFileInputFromBase64(base64URL) {
            var blob = base64ToBlob(base64URL);
            var file = new File([blob], "signature.png", { type: blob.type });

            var fileInput = document.getElementById('canvasFileInput');
            //var previewImage = document.getElementById('previewImage');

            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            fileInput.files = dataTransfer.files;
            // Create a new 'change' event
            var event = new Event('change');

            // Dispatch it.
            fileInput.dispatchEvent(event);
            // Display the image preview
            //previewImage.src = base64URL;
        }


        // Signature
        const root = document.getElementById("root");
        const resetCanvas = document.getElementById("resetCanvas");
        const saveImage = document.getElementById("saveImage");
        const signatureImage = document.getElementById("signatureImage");
    
        const component = Signature(root, {
            width: 1200,
            height: 150,
        });
    
        resetCanvas.addEventListener("click", () => {
            component.value = [];
        });
    
        // saveImage.addEventListener("click", () => {
        //     signatureImage.src = component.getImage();
        // });
    
        const today = new Date().toISOString().split('T')[0];
        datepicker.min = today;
        datepicker.max = today;
    
        // Canvas Image Saving
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
    
        saveImage.addEventListener("click", () => {
            const dataURL = component.getImage();
            // const dataURL = canvas.toDataURL("image/png");
            const a = document.createElement("a");
            a.href = dataURL;
            a.download = "signature.png";
            a.click();
            setFileInputFromBase64(dataURL);

        });
    
        //window.addEventListener('resize', updateCanvasWidth);
    </script>
    <script>
        document.getElementById('dob').addEventListener('click', function() {
            this.type = 'date';
            this.click();
        });
    </script>

    {{-- handling signature submission --}}



@endsection
