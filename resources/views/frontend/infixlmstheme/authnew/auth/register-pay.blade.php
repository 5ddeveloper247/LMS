@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>


<style>
    .footerbox1 p {
        line-height: 30px !important;
        font-size: 17px !important;
        color: white !important;
        cursor: pointer;
    }

    .footerbox1 p:hover {
        line-height: 30px !important;
        font-size: 17px !important;
        color: #ff6700 !important;
        text-decoration: underline !important;
    }


    .footerbox1 h4 {
        font-weight: 700 !important;
        color: white !important;
        font-size: 24px !important;
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

    .icons i {
        font-size: 22px !important;
        cursor: pointer;
    }

    .icons i:hover {
        color: #ff6700 !important;
        font-size: 22px !important;
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

    .clover-footer {
        display: none;
    }

    @media (width > 1650px) {

        h4 {
            font-size: 32px !important;
            line-height: 25px;
        }

        h5 {
            font-size: 25px !important;
            line-height: 25px;
        }

        .login_wrapper {
            display: grid !important;
            grid-template-columns: 1200px auto !important;
            justify-content: center !important;
        }

        .theme_btn {
            font-size: 23px !important;
        }

        input,
        input::placeholder {
            font: 1.25rem/3 sans-serif !important;
        }
    }
</style>

@section('content')
    <input type="hidden" name="id" id="accesskey" value="{{ $pakms ?? null }}">
    <div class="login_wrapper">
        <div class="login_wrapper_left">
            <div class="login_wrapper_content">
                <!-- widgetsform -->
                <div class="row m-0">
                    <div class="col-md-12">
                        <div class="input_box_tittle">
                            <h4 class="px-2">@lang('Payment $100')</h4>
                            @if ($errors->first('Error'))
                                <span class="text-danger" role="alert">{{ $errors->first('Error') }}</span>
                            @endif
                            <div class="container">
                                <form action="{{ route('register.payp') }}" method="post" id="payment-form">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id ?? null }}">
                                    <div class="">
                                        <div id="amount" class="field card-number">
                                            <input type="hidden" name="amount"
                                                value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', 100) * 100 }}"
                                                placeholder="Amount">
                                        </div>
                                    </div>
                                   

                                   
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cardHolder">Cardholder Name</label>
                                            <input type="text" class="form-control" name="cardHolder" id="cardHolder" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cardNumber">Card Number</label>
                                            <input type="text" class="form-control" name="cardNumber" id="cardNumber" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="expiryDate">Expiry Date</label>
                                            <input type="text" class="form-control" name="expiryDate" id="expiryDate" placeholder="MM/YY" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cvv">CVV</label>
                                            <input type="text" class="form-control" name="cvv" id="cvv" required>
                                        </div>
                                    </div>
                                  

                                    <div id="card-response" role="alert"></div>
                                    
                                            <button class="small_btn4 theme_btn">Pay Now</button>
                                        
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="shitch_text">
            </h5>
        </div>

        @include(theme('auth.login_wrapper_right'))


    </div>




  
    @include(theme('partials._custom_footer'))
@endsection
