{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page5</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Login') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>

@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        .reg_img {
            /* min-height: 72vh; */
            max-width: 100%;
            width: 100%;
        }
        .reg_img img{
            height: 90%;
        }

        .btn_login {
            /* width: 135px;
            height: 38px; */
            font-size: 16px;
            background: var(--system_primery_color);
            border-radius: 20px;
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 700;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            /* line-height: 1; */
            padding: 0.5rem 1.5rem;
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
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            margin-bottom: -1px;
            padding: .375rem 45px;
            -webkit-appearance: none;
            -moz-appearance: none;
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
        input:valid~.floating-label-outside {
            top: -10px;
            opacity: 1;
            font-size: 15px;
            color: #727272;
            background: #fff;
            padding: 0px 5px;
        }

        input:focus~.floating-label-outside,
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
            background: linear-gradient(0deg, rgba(254, 108, 10, 1) 0%, rgba(96, 42, 181, 1) 75%);
            padding: .4rem .75rem;
            display: flex;
            align-items: center;
            border-right: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        #thankYouModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            justify-content: right;
            align-items: start;
            backdrop-filter: blur(1px);
            background-color: transparent;
            margin-top: 20px;
            margin-right: auto;

        }

        .modal-content {
            height: 150px;
            width: 350px;
            background-color: rgb(208, 205, 205);
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-h {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            font-size: 20px;
            color: var(--system_primery_color);
        }

        .modal-span {
            color: #fff;
            font-weight: bold;
            background-color: var(--system_primery_color);
            border-radius: 50%;
            padding: 7px;
            margin-left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .is-invalid {
            border: 1px solid red;
        }
    </style>

    <div class="container px-xl-5">
        <input type="hidden" name="id" id="accesskey" value="{{ $pakms ?? null }}">
        <div class="row my-4 my-lg-5 px-xl-5">
            <!-- Left side - Registration Form -->
            <div class="col-md-8 mt-4">
                <h3 class="text-uppercase text-center text_reg">We are merakii </h3>

                <h6 class="text-center mb-4 text-capitalize heading-reg">welcome to merakii <br><span
                        class="font-weight-300">please fill the form below</span></h6>
                        <div class="timeline">
                            <div class="inside-line"></div>
        
                            <div class="dott ">1</div>
                            <div class="dott ">2 </div>
                            <div class="dott">3</div>
                            <div class="dott">4 </div>
                            <div class="dott active">5</div>
                            <div class="dott">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                        </div>


                @if ($errors->first('Error'))
                    <span class="text-danger" role="alert">{{ $errors->first('Error') }}</span>
                @endif
                <form action="{{ route('register.payp') }}" method="post" id="payment-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id ?? null }}">
                    <input type="hidden" name="amount"
                        value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', 100) * 100 }}"
                        placeholder="Amount">
                    <div class="form-row">
                        <div class="col-md-12 my-3">
                            <h6 class="mt-5">Payment $100</h6>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="cardHolder" id="cardHolder" required />
                                <span class="floating-label-outside">Card Holder First Name</span>
                                <i class="fa fa-user input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="cardHolderLastname" id="cardHolderLastname" required />
                                <span class="floating-label-outside">Card Holder Last Name</span>
                                <i class="fa fa-user input-icon-outside"></i>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="cardNumber" id="cardNumber" required />
                                <span class="floating-label-outside">Card No</span>
                                <i class="fa fa-credit-card input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="expiryDate" id="expiryDate" placeholder="" required pattern="(?:0[1-9]|1[0-2])/[0-9]{4}" />
                                <span class="floating-label-outside">Expiry Date (MM/YYYY)</span>
                                <i class="far fa-calendar input-icon-outside"></i>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="position-relative mt-4">
                                <input type="text" class="outside"name="cvv" id="cvv" required />
                                <span class="floating-label-outside">CVV</span>
                                <i class="bi bi-credit-card-2-front input-icon-outside"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn_login mt-3" id="pay-button">Pay Now</button>
                    </div>
                </form>
            </div>
            <!-- Right side - Image -->
            <div class="col-md-4">
                <div class="reg_img img-fluid h-100 d-none d-md-block">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class="mb-4 w-100" alt="Placeholder Image">

                    <!-- <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg" class="reg_img h-100" alt="placeholder Image"> -->
                    <h6 class="text-uppercase my-2">student centered expert instructors learn anywhere community</h6>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- popup message -->
    <div id="thankYouModal">
        <div class="modal-content">
            <h1 class="modal-h">Thanku for submit the form <span class="modal-span"><i class="fa fa-check"
                        aria-hidden="true"></i></span></h1>
        </div>
    </div>
    @include(theme('partials._custom_footer'))
    <script>
        const payNow = document.getElementById("pay-button")
        const thankYouModal = document.getElementById("thankYouModal")
        const timeLine = document.getElementById("timeline");
        let sixthChild = timeLine.children[5];
        let fifthChild = timeLine.children[4];

        // payNow.addEventListener("click", () => {
        //     thankYouModal.style.display = "flex"

        //     sixthChild.classList.add("active");
        //     fifthChild.classList.remove("active")

        // })
        // document.getElementById('pay-button').addEventListener('click', function() {

        //     setTimeout(function() {
        //         window.location.href = 'login.html';
        //     }, 2000);
        // });
    </script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<script>
  
    $(document).ready(function() {
   
    $('#cardNumber').mask('0000 0000 0000 0000');
    
    $('#expiryDate').mask('00/0000');
   
    $('#cvv').mask('000');
   
    $('#payment-form').submit(function(e) {
        e.preventDefault();
   
        var cardholderName = $('#cardHolder').val();
        var cardNumber = $('#cardNumber').val();
        var expirationDate = $('#expiryDate').val();
        var cvv = $('#cvv').val();
      
        if (cardholderName === '' || cardNumber === '' || expirationDate === '' || cvv === '' ) {
            alert('All fields are required');
        } 
        else if (cardNumber.length < 16 || cvv.length < 3) {
                    alert('Invalid card number or CVV');
                    $('#cardNumber').addClass("bordered-1 border-danger")
                    $('#cvv').addClass("bordered-1 border-danger")
                 
        }else {
            const form=document.querySelector('#payment-form');
            form.submit();
            // alert('submitted')

         
           
           
        }
    });
});
</script>

@endsection