@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Package Checkout') }}
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
<script src="https://checkout.sandbox.dev.clover.com/sdk.js"></script>
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>

<style>
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
        color: var(--system_primery_color) !important;
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
        color: var(--system_primery_color) !important;
        text-decoration: underline !important;
    }

    .icons i {
        font-size: 22px !important;
        /* padding: 11px !important; */
        cursor: pointer;
    }

    .icons i:hover {
        color: var(--system_primery_color) !important;

        font-size: 22px !important;
        /* padding: 11px !important; */
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

        /* p {
            font-size: 22px !important
        } */

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

        .border-dark {
            /*height: 55px !important;*/
        }

        .theme_btn {
            font-size: 23px !important;
        }

        /* input,
        input::placeholder {
            font: 1.25rem/3 sans-serif !important;
        } */


    }
</style>

@section('content')
    {{-- @dd('working') --}}
    <input type="hidden" name="id" id="accesskey" value="{{ $pakms ?? null }}" class="for-placeholder">
    @php
        $price = convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $package->price) * 100;
        $lang = 'Payment $' . $package->price;
    @endphp

    <div class="section-margin-y container">
        <div class="justify-content-around px-md-5 row px-1">
            <div class="col-xl-12 mb-5 text-center">
                <h3 class="font-weight-bold">Please Add Your Card Details</h3>
            </div>
            <div class="col-xl-6">
                <h3 class="font-weight-bold mb-3">@lang($lang)</h3>
                @if ($errors->first('Error'))
                    <span class="text-danger" role="alert">{{ $errors->first('Error') }}</span>
                @endif
                <form action="{{ route('packageBuyingCreate') }}" method="post" id="payment-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $tutor->id }}" class="for-placeholder">
                    <input type="hidden" name="package_id" value="{{ $package->id ?? null }}" class="for-placeholder">
                    <input type="hidden" name="type" value="package" class="for-placeholder">
                    <div class="">
                        <div id="amount" class="field card-number">
                            <input type="hidden" name="amount" value="{{ $price }}" placeholder="Amount" class="for-placeholder">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="cardHolder">First Name</label>
                            <input type="text" class="form-control for-placeholder" name="cardHolder" id="cardHolder" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cardHolderLastname">Last Name</label>
                            <input type="text" class="form-control for-placeholder" name="cardHolderLastname" id="cardHolderLastname" required>
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label for="cardHolder">Cardholder Name</label>
                            <input type="text" class="form-control" name="cardHolder" id="cardHolder" required>
                        </div> --}}
                        <div class="col-md-12 mb-3">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control for-placeholder" name="cardNumber" id="cardNumber" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" class="form-control for-placeholder" name="expiryDate" id="expiryDate" placeholder="MM/YYYY" pattern="(?:0[1-9]|1[0-2])/[0-9]{4}" required >
                            {{-- pattern="(?:0[1-9]|1[0-2])/[0-9]{4}" --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control for-placeholder" name="cvv" id="cvv" required>
                        </div>
                    </div>
                  
                    <div class="form-row p-2 border border-dark rounded">
                                <div class="col-md-12">
                                    <div class="d-flex flex-column">
                                    <p class="mb-0"><b>Terms & Conditions</b></p>
                                    <small class="mb-0 agree_checkbox_p">I <b>{{ auth()->user()->name }}</b> hereby authorize Merkaii Xcellence College Of Health to charge my Credit or Debit
                                                    Card for payment of Education services rendered as described on <b>Date: {{ Carbon\Carbon::now()->format(Settings('active_date_format')) }}</b>.<br>
                                                    I <b>{{ auth()->user()->name }}</b> agree, in all cases, to pay the Credit or Debit Card amount for the full payment of Education services rendered as described above.
                                                </small>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <input type="checkbox" name="accept" id="accept"><p class="px-1 mb-0">I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.</p></div>
                                </div>

                            </div>
                    <div id="card-response" role="alert"></div>
                    
                            <div class="form-row text-center">
                                <button
                                    class="theme_btn text-white my-4 mx-auto "style="display: block;"
                                    type="submit">Pay now</button>

                            </div>
                </form>
            </div>
            <div class="col-xl-4">
                <h3 class="font-weight-bold mb-3">
                    {{ 'Package Details' }}
                </h3>
                <div class="row">
                    <div class="col-3 mb-3">
                        <p class="font-weight-bold">Name</p>
                    </div>
                    <div class="col-9 mb-3">
                        <p class="font-weight-bold float-right">{{ $package->title }}</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold">Allowed Courses</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold float-right">{{ $package->allowed_courses }}</p>
                    </div>
                    <div class="col-3 mb-3">
                        <p class="font-weight-bold">Price</p>
                    </div>
                    <div class="col-9 mb-3">
                        <p class="font-weight-bold float-right">${{ $package->price }}</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold">Discount Price</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold float-right">{{ '0' }}</p>
                    </div>
                    <div class="col-12">
                        <hr class="border-secondary">
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold">Total Payable</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold float-right">${{ $package->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
       
    </script>
    @include(theme('partials._custom_footer'))

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
  
    $(document).ready(function() {
   
    $('#cardNumber').mask('0000 0000 0000 0000');
    
    $('#expiryDate').mask('00/0000');
   
    $('#cvv').mask('000');

//     Array.prototype.forEach.call(document.body.querySelectorAll("*[data-mask]"), applyDataMask);

// function applyDataMask(field) {
//     var mask = field.dataset.mask.split('');
    
//     // For now, this just strips everything that's not a number
//     function stripMask(maskedData) {
//         function isDigit(char) {
//             return /\d/.test(char);
//         }
//         return maskedData.split('').filter(isDigit);
//     }
    
//     // Replace `_` characters with characters from `data`
//     function applyMask(data) {
//         return mask.map(function(char) {
//             if (char != '_') return char;
//             if (data.length == 0) return char;
//             return data.shift();
//         }).join('')
//     }
    
//     function reapplyMask(data) {
//         return applyMask(stripMask(data));
//     }
    
//     function changed() {   
//         var oldStart = field.selectionStart;
//         var oldEnd = field.selectionEnd;
//         field.value = reapplyMask(field.value);
//         field.selectionStart = oldStart;
//         field.selectionEnd = oldEnd;
//     }
    
//     field.addEventListener('click', changed);
//     field.addEventListener('keyup', changed);

// }
   
    $('#payment-form').submit(function(e) {
        e.preventDefault();
   
        var cardholderName = $('#cardHolder').val();
        var cardNumber = $('#cardNumber').val();
        var expirationDate = $('#expiryDate').val();
        var cvv = $('#cvv').val();
      
        if (cardholderName === '' || cardNumber === '' || expirationDate === '' || cvv === '' ) {
            alert('All fields are required');
        } 
        else if (cardNumber.replace(/\s/g, '').length < 16 || cvv.length < 3) {
                    alert('Invalid card number or CVV');
                    $('#cardNumber').addClass("bordered-1 border-danger")
                    $('#cvv').addClass("bordered-1 border-danger")
                 
        }else {
            const form=document.querySelector('#payment-form');
            form.submit();
         
           
           
        }
    });
});
</script>
@endsection
