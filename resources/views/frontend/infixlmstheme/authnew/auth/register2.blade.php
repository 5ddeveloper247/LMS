@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Register') }}
@endsection
@section('content')
    <style>
        input {
            background: transparent;
        }

        body {
            /* background-image: url('body-bg.jpg'); */
            height: 100vh;
        }

        .formbord {
            border: none;
            width: 100%;
        }

        .formbord:focus {
            border: none;
        }

        .text span {
            font-size: 16px;
            font-weight: bold;
        }

        input:focus-visible {
            outline: none !important;


        }

        .checkbox input {
            width: 40px;
            height: 40px;
        }

        .checkboxdata {
            width: 100%;
        }

        .checkboxdata input {
            width: 20%;
            float: left;
        }

        .checkboxdata h5 {
            width: 50%;
            float: left;

        }

        .bordertop {
            border-top: 1px solid black;
        }

        .page {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center
        }

        .borderbottom {
            border-bottom: 1px solid gray;
        }

        .text span {
            font-size: 16px;
            font-weight: bold;
        }

        input:focus-visible {
            outline: none !important;


        }
        .radiobox-invalid input:before {
            font-family: "FontAwesome";
            content: "\f00c";
            font-size: 15px;
            color: transparent !important;
            background: transparent !important;
            display: block;
            width: 14px;
            height: 14px;
            border: 2px solid red;
            border-radius: 50%;
            margin: -1px 0 0 -1px;
        }
        .checkbox input {
            width: 40px;
            height: 40px;
        }

        .checkboxdata {
            width: 100%;
        }

        .checkboxdata input {
            width: 20%;
            float: left;
        }

        .checkboxdata h5 {
            width: 50%;
            float: left;

        }

        .bordertop {
            border-top: 1px solid black;
        }

        .formbord:focus {
            border: none;
        }

        .text span {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        input:focus-visible {
            outline: none !important;


        }

        .checkbox input {
            width: 40px;
            height: 40px;
        }

        .checkboxdata {
            width: 100%;
        }

        .checkboxdata input {
            width: 20%;
            float: left;
        }

        .checkboxdata h5 {
            width: 50%;
            float: left;
            width: 50%;
            font-size: 12px;
            color: grey;
            float: left;

        }

        .bordertop {
            border-top: 1px solid grey;
            border-top: 1px solid rgb(22, 68, 100);
        }

        .nameda p {
            margin-top: 0;
            font-size: 16px;
            /* margin-bottom: 1rem; */
            font-weight: bold;
            text-align: justify;
        }


        .containerer {
            width: 100%;
            /* margin:auto; */
        }

        .mdka {
            width: 0%;
            height: 100%;
            float: left;
        }

        .row p {
            font-size: 16px;
            color: rgb(49, 48, 48);
            font-weight: bold;
        }

        .footer .row p {
            font-weight: normal !important;
        }

        .program h5 {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        .program span {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        .program {
            font-weight: bold;
            font-size: 18px;
            color: grey;
        }

        .logo img {
            width: 120px;
            height: 110px;
        }

        .logo img {
            width: 120px;
            height: 110px;
        }

        .other_links {
            text-align: center;
            padding: 12px 0px;
        }

        .data {
            background: rgb(190, 190, 190);
        }

        .thumb img {
            width: 90% !important;
        }

        .thumb {
            text-align: center;
        }

        .login_main_info h4 {
            font-size: 25px;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            padding: 0px 0px 12px 0px;
        }

        .shitch_text a {
            color: blue;
        }

        .ff h4 {
            font-size: 31px;
            line-height: 30px;
            font-weight: bold;
        }

        .data h5 {
            text-align: center;
        }

        .is-invalid {
            border-bottom: 2px solid red !important;
        }

        ::placeholder {
            font-weight: bold;
            font-size: 12px;
            color: grey;
        }

        .footer .row p {
            font-weight: normal !important;
        }

        .footerbox1 h4 {
            font-weight: 700;
            color: white;
            font-size: 24px;
        }

        .footerbox h5 {
            font-weight: 400;
        }

        .footerbox p {
            line-height: 30px !important;
            font-size: 16px !important;
            color: white;
            cursor: pointer !important;
            font-weight: normal !important;
        }

        .footerbox p:hover {
            line-height: 30px !important;
            font-size: 16px !important;
            color: rgb(248, 0, 0);
        }

        .footerbox1 p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white !important;
            cursor: pointer;
            /* transition: 1s; */
        }

        .footerbox1 p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: #ff6700 !important;
            text-decoration: underline !important;
        }

        .footercolor {
            background: #252525;
        }

        .footerbox1 h4 {
            font-weight: 700 !important;
            color: white !important;
            font-size: 24px !important;
        }

        .footerbox {
            padding: 25px;
            margin-left: 0%;
        }

        .expore h4 {
            font-weight: 700;
            color: white !important;
            font-size: 24px;
        }

        .expore p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white !important;
            cursor: pointer !important;
            /* transition: 1s; */
        }

        .expore p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: #ff6700 !important;
            text-decoration: underline !important;
        }

        .container-sub {
            max-width: 1140px;

            margin-right: auto;
            margin-left: auto;
            position: relative;
        }

        .background-overlay {
            background-image: url('public/frontend/infixlmstheme/img/images/newsletter_bg.png');
            background-position: center center;
            background-size: cover;
            transition: background .3s, border-radius .3s, opacity .3s;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
        }

        .icons i {
            font-size: 22px !important;
            /* padding: 11px !important; */
            cursor: pointer;
        }

        .icons i:hover {
            color: #ff6700 !important;

            font-size: 22px !important;
            /* padding: 11px !important; */
        }

        .custom_d_flex {
            display: flex !important;
            flex-direction: row;
            padding-right: 0px;
        }

        .custom_col_01 {
            padding-right: 0px;
            width: 45%;
        }

        .custom_col_02 {
            /* padding-right: 0px; */
            width: 55%;
        }

        .custom_col_03 {
            /* padding-right: 0px; */
            width: fit-content;
            white-space: nowrap;
        }

        .custom_col_04 {
            /* padding-right: 0px; */
            width: 25%;
        }

        .custom_col_05 {
            display: flex;
            height: fit-content;
        }

        .custom_col_06 {
            padding-bottom: 0px;
            height: fit-content;
        }

        .custom_col_07 {
            display: flex;
            width: 100%;
        }
        .thumb img {
            max-width: 634px;
            height: 57vh;
            object-fit: cover;
        }

        @media only screen and (max-width: 320px) {
            .custom_d_flex {
                display: flex !important;
                flex-direction: column;
            }

            .custom_col_01 {
                padding-right: 0px;
                width: 100%;
            }

            .custom_col_02 {
                width: 100%;
                margin-top: 0.45rem;
            }

            .custom_col_03 {
                /* width: 100%; */
                width: fit-content;
                white-space: normal;
                margin-bottom: -1.7rem;
            }

            .custom_col_04 {
                width: 100%;
            }

            .custom_col_05 {
                margin-top: 0.9rem;
                width: 100%;
                align-items: flex-end;
            }

            .custom_col_06 {
                padding-bottom: 0px;
                height: fit-content;
                width: fit-content;
            }

            /* .responsive-order {
                                                                                                        order: -1 !important;
                                                                                                    } */
            .reg1_custom_top_margin {
                margin-top: 40px;
            }
        }

        .custom_nowrap {
            white-space: nowrap;
        }

        @media (width < 1650px) {

            .credit_card_auth,
            .login_main_info h4 {
                font-size: 30px !important;
                font-weight: 900;
                color: var(--system_secendory_color);
                line-height: 50px;
            }
            span {
                font-size: 1rem !important;
                line-height: 25px !important;

            }


            /* .login_main_info h4 {
                font-size: 30px;
                line-height: 31px;
                font-weight: bold;
                text-align: center;
                padding: 0px 0px 12px 0px;
            } */

            h5,
            .program h5,
            .checkboxdata h5 {
                font-size: 30px;
            }
        }

        @media (width > 1650px) {

            .credit_card_auth,
            .login_main_info h4 {
                font-size: 40px !important;
                font-weight: 900 !important;
                color: var(--system_secendory_color);
                line-height: 50px;
            }
            span {
                font-size: 1.4rem !important;
                line-height: 25px !important;

            }

            h5,
            .program h5,
            .checkboxdata h5 {
                font-size: 30px
            }

            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
                font-size: 23px;
            }

            /* .login_main_info h4 {
                font-size: 30px;
                line-height: 31px;
                font-weight: bold;
                text-align: center;
                padding: 0px 0px 12px 0px;
            } */

            .theme_btn {
                font-size: 23px !important;
            }

            .expore p {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .expore p:hover {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .footerbox1 p {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .footerbox1 p:hover {
                font-size: 22px !important;
                line-height: 35px !important;
            }

            .fs-responsive {
                font-size: 22px !important;
                line-height: 38px !important;
            }

            .icons i {
                font-size: 25px !important;
            }

            .icons i:hover {
                font-size: 25px !important;
            }

            .expore h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }

            .footerbox1 h4 {
                font-size: 30px !important;
                line-height: 40px !important;
            }

        }
    </style>

    <div class="container zaamaformdata">
        {{-- <div class="logo mx-5 pt-5">
            <a href="{{ url('/') }}">
                <img style="width: 190px" src="{{ asset(Settings('logo')) }} " alt="">
            </a>
        </div> --}}
        <div class="login_wrapper_content">
            <form action="{{ route('register.2p') }}" method="POST" id="regForm">
                @csrf
                <!-- widgetsform -->
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mainform row py-5">
                    <div class="col-lg-8 order-lg-0 order-1">
                        <div id="second" class="form">
                            <h5 class="font-weight-bold text-center credit_card_auth">Bank Card Authorization Agreement </h5>
                            <div id="first" class="form mb-5">
                                @if (count($errors))
                                    <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        <strong>Required!</strong> Please fill all fields.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
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
                            <div class="col-md-12 program my-3">
                                <h5>*Initials Required*</h5>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="row m-0">
                                    <div class="col-md-12 program mb-4">
                                        <div class="borderbottom @if ($errors->first('term_one_text')) is-invalid @endif">
                                            <span class="d-flex">I <input type="text" name="term_one_text"
                                                    class="w-100 border-0"
                                                    value="{{ $payment_details->term_one_text ?? old('term_one_text') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 program mb-3">
                                        <span>hereby authorize Merkaii Xcellence College Of Health to charge my Credit or Debit
                                            Card for payment of Education services rendered as described on</span>
                                    </div>
                                    {{--                                    <div class="col-md-6 program mb-4" style="display: flex; align-items: baseline;"> --}}
                                    {{--                                        <div class="borderbottom @if ($errors->first('invoice_date_one')) is-invalid @endif" --}}
                                    {{--                                            style="width:100%;"> --}}
                                    {{--                                            <span class="custom_nowrap d-flex">Invoice No. --}}
                                    {{--                                                <input type="text" name="invoice_date_one" class="formbord h-100 mt-1" --}}
                                    {{--                                                    value="{{ $payment_details->invoice_date_two ?? old('invoice_date_two') }}"> --}}
                                    {{--                                            </span> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <div class="col-md-6 program mb-4" >
                                        <div class="borderbottom @if ($errors->first('declaration_date')) is-invalid @endif"
                                            >
                                            <span class="custom_nowrap d-flex">Dated
                                                <input id="declaration_date" type="date" name="declaration_date" class="border-0 float-right font-weight-normal   w-100"
                                                    value="{{ $payment_details->declaration_date ?? old('declaration_date') }}">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 program mb-4">
                                        <div class="borderbottom @if ($errors->first('term_two_text')) is-invalid @endif"
                                           >
                                            <span class="custom_nowrap d-flex">I
                                                <input type="text" name="term_two_text" class="w-100 border-0 "
                                                    value="{{ $payment_details->term_two_text ?? old('term_two_text') }}">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 program mb-3">
                                        <span>agree, in all cases, to pay the Credit or Debit Card amount for the full
                                            payment of Education services rendered as described below</span>
                                    </div>
                                    {{--                                    <div class="col-md-12 program mb-4" style="display: flex; align-items: baseline;"> --}}
                                    {{--                                        <div --}}
                                    {{--                                            class="borderbottom @if ($errors->first('invoice_date_one')) is-invalid @endif" --}}
                                    {{--                                            style="width: 100%;"> --}}
                                    {{--                                            <span class="custom_nowrap d-flex" style="">Invoice No. --}}
                                    {{--                                                <input type="text" name="invoice_date_one" class="formbord h-100" --}}
                                    {{--                                                       value="{{ $payment_details->invoice_date_two ?? old('invoice_date_two') }}"> --}}
                                    {{--                                            </span> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <div class="col-md-12 program mb-3">
                                        <span>I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE
                                            TERMS.</span>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('name')) is-invalid @endif">
                                            <span class="d-flex">Name: <input type="text" name="name"
                                                    class="w-100 border-0"
                                                    value="{{ old('name') ? old('name') : $user->name }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('phone')) is-invalid @endif">
                                            <span class="d-flex">Phone: <input type="text" name="phone"
                                                    class="w-100 border-0"
                                                    value="{{ old('phone') ? old('phone') : $user->phone }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text my-2">
                                        <div class="borderbottom @if ($errors->first('address')) is-invalid @endif">
                                            <span class="d-flex">Address:<input type="text" name="address"
                                                    class="w-100 border-0"
                                                    value="{{ $userSetting->mailing_address  ?? old('address') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('fax')) is-invalid @endif">
                                            <span class="d-flex">Fax: <input type="text" name="fax"
                                                    class="w-100 border-0"
                                                    value="{{ $payment_details->fax ?? old('fax') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('city')) is-invalid @endif">
                                            <span class="d-flex">City: <input type="text" name="city"
                                                    class="w-100 border-0"
                                                    value="{{ $userSetting->city ?? old('city') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text my-2">
                                        <div class="borderbottom @if ($errors->first('state')) is-invalid @endif">
                                            <span class="d-flex">State: <input type="text" name="state"
                                                    class="w-100 border-0"
                                                    value="{{ $userSetting->state ?? old('state') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text my-2">
                                        <div class="borderbottom @if ($errors->first('Zip')) is-invalid @endif">
                                            <span class="d-flex">Zip:<input type="text" name="Zip"
                                                    class="w-100 border-0" value="{{ $user->zip ?? old('Zip') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text my-2">
                                        <div class="borderbottom @if ($errors->first('country')) is-invalid @endif">
                                            <span class="d-flex">Country: <input type="text" name="country"
                                                    class="w-100 border-0"
                                                    value="{{ $payment_details->country ?? old('country') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <div class="row">
                                           

                                            <div class="col-auto  @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2">
                                                    <span>
                                                        <input type="radio" value="VISA" name="payment_type"
                                                            {{ old('payment_type') == 'VISA' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'VISA' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>VISA</span>
                                                </div>
                                            </div>
                                            <div class="col-auto @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2"> 
                                                    <span>
                                                        <input type="radio" value="MASTERCARD" name="payment_type"
                                                            {{ old('payment_type') == 'MASTERCARD' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'MASTERCARD' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>MASTERCARD</span>
                                                </div>
                                            </div>
                                            <div class="col-auto @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2"> 
                                                    <span>
                                                        <input type="radio" value="AMERICAN EXPRESS" name="payment_type"
                                                            {{ old('payment_type') == 'AMERICAN EXPRESS' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'AMERICAN EXPRESS' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>AMERICAN EXPRESS</span>
                                                </div>
                                            </div>
                                            <div class="col-auto @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2"> 
                                                    <span>
                                                        <input type="radio" value="DISCOVER" name="payment_type"
                                                            {{ old('payment_type') == 'DISCOVER' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'DISCOVER' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>DISCOVER</span>
                                                </div>
                                            </div>
                                            {{-- <div class="col-auto @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2">
                                                    <span>
                                                        <input type="radio" value="DiSCOVER" name="payment_type"
                                                            {{ old('payment_type') == 'DiSCOVER' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'DiSCOVER' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>DISCOVER</span>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-auto @if ($errors->first('payment_type')) radiobox-invalid @endif">
                                                <div class="text my-2">
                                                    <span>
                                                        <input type="radio" value="AMEX" name="payment_type"
                                                            {{ old('payment_type') == 'AMEX' ? 'checked' : '' }}
                                                            {{ isset($payment_details->payment_type) && $payment_details->payment_type == 'AMEX' ? 'checked' : '' }}>
                                                    </span>
                                                    <span>AMEX </span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('credit_card_no')) is-invalid @endif"
                                            name="payment_type">
                                            <span class="d-flex nowrap">Card No: <input id="credit_card_no"
                                                    type="text" class="w-100 border-0" name="credit_card_no"
                                                    value="{{ $payment_details->credit_card_no ?? old('credit_card_no') }}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('exp_date')) is-invalid @endif">
                                            <span class="d-flex nowrap">Expire Date: <input id="expire_date" type="text"
                                                    class="w-100 border-0" name="exp_date"
                                                    value="{{ $payment_details->exp_date ?? old('exp_date') }}"
                                                    placeholder="xx/xxxx"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-12 text my-2">
                                        <div class="borderbottom  @if ($errors->first('card_appears_name')) is-invalid @endif">
                                            <span class="nowrap d-flex">Print Name as it appears on The Card:
                                                <input type="text"
                                                       class="w-100 border-0" name="card_appears_name"
                                                       value="{{ $payment_details->card_appears_name ?? old('card_appears_name') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('digit_on_back')) is-invalid @endif">
                                            <span class="d-flex nowrap">Digit # On Back: <input id="digit_on_back"
                                                    type="text" class="w-100 border-0" name="digit_on_back"
                                                    value="{{ $payment_details->digit_on_back ?? old('digit_on_back') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('dollar_amount')) is-invalid @endif">
                                            <span class="d-flex nowrap">Amount (USD): <input type="text" class="w-100 border-0"
                                                    name="dollar_amount"
                                                    value="100" readonly></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('stgnature')) is-invalid @endif">
                                            <span class="d-flex">Signature: <input type="text"
                                                    class="w-100 border-0 " name="stgnature"
                                                    value="{{ $payment_details->stgnature ?? old('stgnature') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('paid_bill_date')) is-invalid @endif">
                                            <span class="d-flex">Date:<input id="paid_bill_date" type="date" class="border-0 float-right font-weight-normal   w-100"
                                                    name="paid_bill_date"
                                                    value="{{ $payment_details->paid_bill_date ?? old('paid_bill_date') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('paid_bill')) is-invalid @endif">
                                            <span class="d-flex nowrap">Paid bill: <input type="number" class="w-100 border-0 "
                                                    name="paid_bill"
                                                    value="{{ $payment_details->paid_bill ?? old('paid_bill') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 text my-2">
                                        <div class="borderbottom @if ($errors->first('student_signature_date')) is-invalid @endif">
                                            <span class="d-flex">Date:<input type="date" class="border-0 float-right font-weight-normal   w-100"
                                                    name="student_signature_date"
                                                    value="{{ $payment_details->student_signature_date ?? old('student_signature_date') }}"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-12 text my-2">
                                        <div class="borderbottom @if ($errors->first('student_signature')) is-invalid @endif">
                                            <span class="d-flex nowrap">Student Signature:<input type="text"
                                                    class="w-100 border-0" name="student_signature"
                                                    value="{{ $payment_details->student_signature ?? old('student_signature') }}"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-5">
                                    <div class="page gap_15 mt_40">
                                        <a href="{{ route('register') }}" class="small_btn3 theme_btn">Back Page</a>
                                        <button type="submit" class="small_btn3 theme_btn" id="submit_btn">Next
                                            Page</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 responsive-order mb-4">
                        <div class="data py-5" style="background-color:#fbfff2">
                            {{-- #fbfff2 --}}
                            @include(theme('auth.login_wrapper_right'))
                        </div>
                        <hr class="d-lg-none">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include(theme('partials._custom_footer'))
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#credit_card_no').mask('9999-9999-9999-9999');
        $('#expire_date').mask('99/9999');
        $('#digit_on_back').mask('999');

        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("declaration_date").setAttribute('min', today);
            document.getElementById("paid_bill_date").setAttribute('min', today);
            // check if user entered correct month and year
            $('#submit_btn').on('click', function() {
                var selected_expiry_date = $('#expire_date').val();
                var current = new Date();

                var selectedMonth = parseInt(selected_expiry_date.substr(0, 2));
                var selectedYear = parseInt(selected_expiry_date.substr(3, 4));

                var currentMonth = current.getMonth() + 1;
                var currentYear = current.getFullYear();

                if (selectedYear < currentYear || (selectedYear === currentYear && selectedMonth <=
                        currentMonth)) {
                    toastr.error('Expiry Month & Year Must be Greater than Current Month');
                    return false;
                }
            });

            $('#expire_date').on('keyup', function() {
                var value = $(this).val();
                var month = value.substr(0, 2);
                // month = month.replace(/^0+/, '');

                if (month === '00' || parseInt(month) > 12) {
                    $(this).val('');
                }
            });
        });


        $(function() {
            $('#checkbox').click(function() {

                if ($(this).is(':checked')) {
                    $('#submitBtn').removeClass('disable_btn');
                    $('#submitBtn').removeAttr('disabled');

                } else {
                    $('#submitBtn').addClass('disable_btn');
                    $('#submitBtn').attr('disabled', 'disabled');

                }
            });
        });
    </script>
@endsection
