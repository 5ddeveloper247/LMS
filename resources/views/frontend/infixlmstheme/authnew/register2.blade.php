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

        .is-invalid {
            border: 1px solid red;
        }

        .preloader {
            display: none;
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
            /* min-height: 72vh; */
             max-width: 100%;
            width: 100%;
        }
        .reg_img img{
            height: 30%;
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
            margin-bottom: -1px;
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
            top: 12px;
            left: 40px;
            font-size: 13px;
            opacity: 1;
            font-weight: 400
        }

        input:focus~.floating-label-outside,
        input:valid~.floating-label-outside,
        input:read-only~.floating-label-outside {
            top: -10px;
            opacity: 1;
            font-size: 13px;
            color: #727272;
            background: #fff;
            padding: 0px 5px;
        }

        input:focus~.floating-label-outside,
        input:not(:focus):valid~.floating-label-outside,
        input:read-only~.floating-label-outside {
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
            /* background-color: #e9ecef; */
            background: linear-gradient(0deg, rgb(255, 118, 25) 0%,rgb(153, 102, 153) 75%);
            padding: .4rem .75rem;
            display: flex !important;
            align-items: center;
            border-right: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }


        .borderbottom,
        .date-span {
            border: none;
            border-bottom: 1px solid #000;
            width: auto;
            margin-right: 5px;
            margin-bottom: 5px;
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

            /* .reg_img {
                max-height: 440px;
                max-width: 100%;
                width: 100%;
                height: 100%;
            } */
        }

        @media only screen and (min-width: 1800px) {
            /* .reg_img {
                max-height: 657px;
                max-width: 100%;
            } */
            .btn_login{
                border-radius: 20px !important;
            }
        }
    </style>



    <div class="container px-xl-5">
        <div class="row my-4 my-lg-5 px-xl-5 ">
            <!-- Left side - Registration Form -->
            <div class="col-md-8">
                <h3 class="text-uppercase text-center text_reg">We are Merkaii Xcellence </h3>
                <h6 class="text-center mb-4 text-capitalize heading-reg">welcome to Merkaii Xcellence <br><span
                        class="font-weight-300">please fill the form below</span></h6>
                <div class="timeline">
                    <div class="inside-line"></div>

                    <div class="dott">1</div>
                    <div class="dott active">2 </div>
                    <div class="dott">3</div>
                    <div class="dott">4 </div>
                    <div class="dott">5</div>
                    <div class="dott">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>

                <form action="{{ route('register.2p') }}" method="POST" id="regForm" class="mt-5" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <h6 class="text-center text-capitalize heading-login">Bank Card Authorization Agreement </h6>
                    <div id="first" class="form mb-5">
                        @if (count($errors))
                            <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                role="alert">
                                <strong>Required!</strong> Please fill all fields.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
                        @endif
                        @if ($errors->first('phone'))
                            <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                role="alert">
                                @if ($errors->first('phone'))
                                    {{ $errors->first('phone') }}
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-row">

                        <div class="col-md-12 my-3 d-flex p-0">
                            <h6 class="">*Initials Required*</h6>
                        </div>
                        <div
                            class="form-group col-md-12 d-flex align-items-cente mb-0 @if ($errors->first('term_one_text')) is-invalid @endif">
                            <label for="agree_checkbox ">I</label>
                            <input id="agree_checkbox" class="borderbottom agree_checkbox w-50"
                                type="text"name="term_one_text"
                                value="{{ $payment_details->term_one_text ?? old('term_one_text') }}" required>
                            <label for="agree_checkbox ">Guardian</label>
                            <input id="agree_checkbox" class="borderbottom agree_checkbox w-50" type="text"
                                name="term1_father_name"
                                value="{{ $payment_details->term1_father_name ?? old('term1_father_name') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 d-flex p-0">
                            <p>hereby authorize Merkaii Xcellence College Of Health to charge my Credit or Debit Card for payment
                                of Education services rendered as described on <span class="">Date:</span>
                                <input class="date-span " type="date" placeholder="mm/dd/yyyy" name="declaration_date"
                                    value="{{ $payment_details->declaration_date ?? old('declaration_date') }}">
                            </p>
                        </div>
                    </div>


                    <div class="form-row">
                        <div
                            class="form-group col-md-12 d-flex align-items-cente mb-0 p-0 @if ($errors->first('term_two_text')) is-invalid @endif">
                            <label for="agree_checkbox ">I</label>
                            <input id="agree_checkbox" class="borderbottom agree_checkbox w-50"
                                type="text"name="term_two_text"
                                value="{{ $payment_details->term_two_text ?? old('term_two_text') }}" required>
                            <label for="agree_checkbox ">Guardian</label>
                            <input id="agree_checkbox" class="borderbottom agree_checkbox w-50"
                                type="text"name="term2_father_name"
                                value="{{ $payment_details->term2_father_name ?? old('term2_father_name') }}" required>
                        </div>
                        <p class="mb-0 ml-2 agree_checkbox_p">agree, in all cases, to pay the Credit or Debit Card amount
                            for the
                            full payment of Education services rendered as described below</p>
                    </div>



                    <div class="form-row mt-4">
                        <h6 class="px-1">I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.</h6>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('name')) is-invalid @endif">
                                <input type="text" class="outside form-control" name="name"
                                    value="{{ old('name') ? old('name') : $user->name }}" required />
                                <span class="floating-label-outside">Name</span>
                                <i class="fa fa-user-o input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 @if ($errors->first('phone')) is-invalid @endif">
                            <div class="position-relative mt-4 ">
                                <input type="text" class="outside form-control" name="phone"
                                    value="{{ old('phone') ? old('phone') : $user->phone }}" required />
                                <span class="floating-label-outside">Phone</span>
                                <i class="bi bi-telephone-plus input-icon-outside"></i>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 @if ($errors->first('address')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="address"
                                    value="{{ $userSetting->mailing_address ?? old('address') }}" required />
                                <span class="floating-label-outside">Mailing Address</span>
                                <i class="fa fa-address-card-o input-icon-outside"></i>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6 @if ($errors->first('fax')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="number" class="outside" name="fax"
                                    value="{{ $payment_details->fax ?? old('fax') }}" required minlength="7" maxlength="15"/>
                                <span class="floating-label-outside">Fax</span>
                                <i class="fa fa-fax input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 @if ($errors->first('city')) is-invalid @endif">

                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="city"
                                    value="{{ $userSetting->city ?? old('city') }}" required />
                                <span class="floating-label-outside">City</span>
                                <i class="fa fa-street-view input-icon-outside"></i>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4  @if ($errors->first('state')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="state"
                                    value="{{ $userSetting->state ?? old('state') }}" required />
                                <span class="floating-label-outside">State</span>
                                <i class="fa fa-flag input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-4 @if ($errors->first('zip')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="Zip"
                                    value="{{ $user->zip ?? old('Zip') }}" required />
                                <span class="floating-label-outside">Zip</span>
                                <i class="bi bi-geo input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-4  @if ($errors->first('country')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="country"
                                    value="{{ $payment_details->country ?? old('country') }}" required />
                                <span class="floating-label-outside">Country</span>
                                <i class="far fa-building input-icon-outside"></i>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h5 class="mb-0">Please choose respective Card</h5>
                        </div>
                    </div>

                    <div class="form-group form-check larger-checkbox row mt-4 ">
                        
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('payment_type')) radiobox-invalid @endif">
                            <input type="checkbox" class="form-check-input increae" id="checkbox1"value="VISA"
                                name="payment_type" {{ old('payment_type') == 'VISA' ? 'checked' : '' }}
                                {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'VISA' ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox1">VISA</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('payment_type')) radiobox-invalid @endif">
                            <input type="checkbox" class="form-check-input increae" id="checkbox2"value="MASTERCARD"
                                name="payment_type" {{ old('payment_type') == 'MASTERCARD' ? 'checked' : '' }}
                                {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'MASTERCARD' ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox2">MASTERCARD</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-3 checkboxdata @if ($errors->first('payment_type')) radiobox-invalid @endif">
                            <input type="checkbox" class="form-check-input increae" id="checkbox3"
                                value="AMERICAN EXPRESS" name="payment_type"
                                {{ old('payment_type') == 'AMERICAN EXPRESS' ? 'checked' : '' }}
                                {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'AMERICAN EXPRESS' ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox3">AMERICAN EXPRESS</label>
                        </div>
                        <div
                            class="form-check form-check-inline col-md-2 checkboxdata @if ($errors->first('payment_type')) radiobox-invalid @endif">
                            <input type="checkbox" class="form-check-input" id="checkbox4" value="DISCOVER"
                                name="payment_type" {{ old('payment_type') == 'DISCOVER' ? 'checked' : '' }}
                                {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'DISCOVER' ? 'checked' : '' }}>
                            <label class="form-check-label " for="checkbox4">DISCOVER</label>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6 @if ($errors->first('credit_card_no')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="credit_card_no" id="cardNumber"
                                    value="{{ $payment_details->credit_card_no ?? old('credit_card_no') }}" maxlength="16" minlength="16" required />
                                <span class="floating-label-outside">Card No</span>
                                <i class="fa fa-credit-card input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 @if ($errors->first('exp_date')) is-invalid @endif">

                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="exp_date" id="expiryDate"
                                    value="{{ $payment_details->exp_date ?? old('exp_date') }}" required pattern="(?:0[1-9]|1[0-2])/[0-9]{4}" />
                                <span class="floating-label-outside">Expiry Date (MM/YYYY)</span>
                                <i class="far fa-calendar input-icon-outside"></i>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6  @if ($errors->first('card_appears_name')) is-invalid @endif">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="card_appears_name"
                                    value="{{ $payment_details->card_appears_name ?? old('card_appears_name') }}"
                                    required />
                                <span class="floating-label-outside">Print Name as it appears on The Card</span>
                                <i class="fa fa-id-card input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">

                            <div class="position-relative mt-4 @if ($errors->first('dollar_amount')) is-invalid @endif ">
                                <input type="text" class="outside"name="dollar_amount" value="100" readonly />
                                <span class="floating-label-outside">Amount USD</span>
                                <i class="fa fa-money input-icon-outside"></i>

                            </div>
                        </div>


                    </div>
                    <div class="form-row @if ($errors->first('digit_on_back')) is-invalid @endif">

                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside" name="digit_on_back" id="cvv"
                                    value="{{ $payment_details->digit_on_back ?? old('digit_on_back') }}" maxlength="3" minlength="3" required />
                                <span class="floating-label-outside">Digit # On Back:</span>
                                <i class="fa fa-id-card input-icon-outside"></i>
                            </div>
                        </div>
                    </div>

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
                                        value="{{date('Y-m-d')}}" name="student_signature_date" />
                                        {{-- value="<%= new Date().toISOString().split('T')[0] %>" name="student_signature_date" /> --}}
                                </div>
                                <div class="sign-btn" style="position: absolute;">
                                    <input type="button" value="Reset" id="resetCanvas" class="reset-btn mx-1" />
                                    <input type="button" value="Save" id="saveImage" class="save-btn mx-1" />
                                </div>
                                <img id="signatureImage" class="image full-width" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                           
                            <input type="file" id="canvasFileInput" name="signature-img" required style="display:none">
                            <label for="canvasFileInput" class="btn btn_login w-100 mt-2 d-flex- justify-content-center align-items-center">Upload Signature</label>

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn_login mt-4" id="back-button">Back Page</button>
                        <button type="submit" class="btn btn_login mt-4" id="next-button">Next Page</button>
                    </div>
                </form>
            </div>
            <!-- Right side - Image -->
            <div class="col-md-4 pr-0 ">
                <div class="img-fluid reg_img d-none d-md-block h-100">
                    
                    <img src="{{asset('public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg')}}"
                        class="w-100 mb-4" alt="Placeholder Image">
                    <img src="{{asset('public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg')}}"
                        class="w-100 mb-4" alt="placeholder Image">
                    {{-- <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class="w-100" alt="placeholder Image"> --}}
                    <h6 class="text-uppercase mt-lg-2">student centered expert instructors learn anywhere community</h6>
                </div>

            </div>
        </div>
    </div>

    @include(theme('partials._custom_footer'))
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        // document.getElementById('exp-datee').addEventListener('click', function() {
        //     const today = new Date();
        //     const yyyy = today.getFullYear();
        //     let mm = today.getMonth() + 1; // Months start at 0!
        //     if (mm < 10) {
        //         mm = '0' + mm;
        //     } 
        //     this.type = 'month';
        //     this.min = yyyy+'-'+mm;
        //     this.click();
        // });

        $('#cardNumber').mask('0000 0000 0000 0000');
    
    $('#expiryDate').mask('00/0000');
   
    $('#cvv').mask('000');
    </script>
    <script>
        document.getElementById("back-button").onclick = function() {

            window.location.href = "{{route('register')}}";
        };
    </script>
  
  <script>

    $('#canvasFileInput').on('change',function(){
            if (this.files.length > 0) {
                var file = $('#canvasFileInput')[0].files[0].name;
                $('#sign_filename').text(file);
            }else{
                $('#sign_filename').text('No file chosen');
            }
        });

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
@endsection
