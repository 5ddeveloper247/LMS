<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>


</head>


<div class="container">

    <input type="hidden" name="id" id="accesskey" value="{{ $pakms ?? null }}">
    <div class="checkout_wrapper payment_area" id="mainFormData">
        <div class="billing_details_wrapper p-4 p-lg-5">
            <div class="container gray-bg">
                <div class="biling-header d-flex justify-content-between align-items-center">
                    <h5 class="f_w_700">{{ __('frontendmanage.Billing Address') }}</h5>
                    @if (isModuleActive('Invoice') && ($type == 'invoice' || $type == 'certificate'))
                        <a class="billingUpdate">{{ __('common.Edit') }}</a>
                        <a class="billingUpdateShow d-none">{{ __('common.Show') }}</a>
                    @else
                        <a href="{{ route('CheckOut') }}?type=edit">{{ __('common.Edit') }}</a>
                    @endif
                </div>
                <div class="biling_body_content" id="deafult">
                    <p>{{ @$checkout->billing->first_name }} {{ @$checkout->billing->last_name }}</p>
                    <p>{{ @$checkout->billing->address }}</p>
                    <p>{{ (!empty($checkout->billing->stateDetails->name)) ? $checkout->billing->stateDetails->name.',' : '' }}
                        {{ !empty($checkout->billing->cityDetails->name) ? $checkout->billing->cityDetails->name.' - ' : '' }}
                        {{ @$checkout->billing->zip_code }} </p>
                    <p> {{ @$checkout->billing->countryDetails->name }} </p>
                </div>
            </div>

            @if (isModuleActive('Invoice'))
                @includeIf('invoice::billing')
            @endif

            <div class="select_payment_method">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                           
                                <li>Please fill all the required fields</li>
                           
                        </ul>
                    </div>
                @endif


                <div class="input_box_tittle">
                    <div class="container">
                    <h5 class="f_w_700">@lang('AuthorizeNet Payment')</h5>
                        <form action="{{ route('paymentSubmit') }}" method="post" id="payment-form">
                            @csrf
                            <div>
                                <input type="hidden" name="user_id"
                                    value="{{ Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                <input type="hidden" name="tracking_id" value="{{ $checkout->tracking }}">
                                <input type="hidden" name="id" value="{{ $checkout->id }}">
                                <div class="form-row top-row">
                                    <div id="amount" class="field card-number">
                                        <input type="hidden" name="amount"
                                            value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $checkout->purchase_price) * 100 }}"
                                            placeholder="Amount">
                                    </div>
                                </div>
                            </div>
                            @php
                             $purchase_amount = ($checkout->purchase_price > $balance) ? $checkout->purchase_price - $balance : 0;
                             $remaining_balance = ($checkout->purchase_price > $balance) ? 0 : $balance - $checkout->purchase_price; 
                            @endphp
                            <input type="hidden" name="remaining_balance" value="{{ $remaining_balance }}">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="cardHolder">Cardholder Name</label>
                                    <input type="text" class="form-control" name="cardHolder" id="cardHolder"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cardHolderLastname">Cardholder Last Name</label>
                                    <input type="text" class="form-control" name="cardHolderLastname" id="cardHolderLastname"
                                        required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="cardNumber">Card Number</label>
                                    <input type="text" class="form-control" name="cardNumber"
                                        id="cardNumber"placeholder="____ ____ ____ ____" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" class="form-control" name="expiryDate" id="expiryDate"
                                        placeholder="MM/YYYY" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" name="cvv" id="cvv"
                                        placeholder="_ _ _" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="hidden" name="amount"
                                        value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $purchase_amount) * 100 }}"
                                        placeholder="Amount" class="col">
                                    <input type="text" class="form-control col"
                                        value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $purchase_amount) }}"
                                        readonly>

                                </div>
                                <button
                                    class="theme_btn text-white mt-4 w-100 "style="display: block;"
                                    type="submit">Pay now</button>

                            </div>



                            {{--  <div class="form-row top-row card-number border-bottom border-dark mb-2 rounded border pl-2 pt-2"
                                style="height: 40px;">
                                <div id="card-number" class="field"></div>
                                <div class="input-errors" id="card-number-errors" role="alert"></div>
                            </div>
                            <div class="form-row border-bottom border-dark mb-2 rounded border pl-2 pt-2"
                                style="height: 40px;">
                                <div id="card-date" class="field third-width"></div>
                                <div class="input-errors" id="card-date-errors" role="alert"></div>
                            </div> 

                            <div class="form-row border-bottom border-dark mb-2 rounded border pl-2 pt-2"
                                style="height: 40px;">
                                <div id="card-cvv" class="field third-width"></div>
                                <div class="input-errors" id="card-cvv-errors" role="alert"></div>
                            </div>

                            <div class="form-row border-bottom border-dark mb-2 rounded border pl-2 pt-2"
                                style="height: 40px;">
                                <div id="card-postal-code" class="field third-width"></div>
                                <div class="input-errors" id="card-postal-code-errors" role="alert"></div>
                            </div>

                            <div id="card-response" role="alert"></div>
                            <div class="button-container float-right mr-4 mt-3">
                                @if (isset($pakms->message))
                                    {{ $pakms->message }}
                                @else
                                    <button class="btn btn-secondary h6"
                                        style="background: var(--system_primery_color);border:var(--system_primery_color); ">Pay
                                        Now</button>
                                @endif 
                            </div> --}}
                        </form>

                        {{-- <form action="{{ route('paymentSubmit') }}" method="post" id="payment-form"> --}}
                        {{--    @csrf --}}
                        {{--  <div class="form-row top-row"> --}}
                        {{--    <div id="amount" class="field card-number"> --}}
                        {{--      <input type="hidden" name="amount" value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $checkout->purchase_price)*100 }}"placeholder="Amount"> --}}
                        {{--    </div> --}}
                        {{--  </div> --}}
                        {{--  <input type="hidden" name="tracking_id"value="{{ $checkout->tracking }}"> --}}
                        {{--  <input type="hidden" name="id" value="{{ $checkout->id }}"> --}}
                        {{--  <div class="form-row top-row"> --}}
                        {{--    <div id="card-number" class="field card-number"></div> --}}
                        {{--    <div class="input-errors" id="card-number-errors" role="alert"></div> --}}
                        {{--  </div> --}}

                        {{--  <div class="form-row"> --}}
                        {{--    <div id="card-date" class="field third-width"></div> --}}
                        {{--    <div class="input-errors" id="card-date-errors" role="alert"></div> --}}
                        {{--  </div> --}}

                        {{--  <div class="form-row"> --}}
                        {{--    <div id="card-cvv" class="field third-width"></div> --}}
                        {{--    <div class="input-errors" id="card-cvv-errors" role="alert"></div> --}}
                        {{--  </div> --}}

                        {{--  <div class="form-row"> --}}
                        {{--    <div id="card-postal-code" class="field third-width"></div> --}}
                        {{--    <div class="input-errors" id="card-postal-code-errors" role="alert"></div> --}}
                        {{--  </div> --}}

                        {{--  <div id="card-response" role="alert"></div> --}}

                        {{--	<div class="button-container"> --}}
                        {{--    <button>Submit Payment</button> --}}
                        {{--  </div> --}}

                        {{-- </form> --}}
                    </div>
                </div>

                <div class="privaci_polecy_area section-padding checkout_area">
                    <div class="">
                        <div class="row">
                            <div class="col-12">
                                <div class="payment_method_wrapper">
                                    @if (isset($methods))
                                        @php
                                            $withMoule = $methods;

                                            $methods = $methods
                                                ->where('method', '!=', 'Bank Payment')
                                                ->where('method', '!=', 'Offline Payment');

                                            $payment_type = $checkout->invoice
                                                ? $checkout->invoice->payment_type
                                                : null;

                                            if (isModuleActive('Invoice') && $payment_type == 2) {
                                                $methods = $withMoule->where('method', 'Bank Payment');
                                            }

                                        @endphp
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <div class="order_wrapper my-4 my-lg-5 mr-4 mr-lg-5">
        <div class="p-lg-4 p-2" style=" background: #fafafa;">
            <h5 class="f_w_700">{{ __('frontend.Your order') }}</h5>
            <div class="ordered_products">
                @php
                    $totalSum = 0;
                @endphp
                @if (isset($carts))

                    @foreach ($carts as $cart)
                        @if (!empty($cart->course_id))
                            @php
                                if ($cart->course_id) {
                                    if ($cart->course_id != 0) {
                                        if ($cart->course->discount_price > 0) {
                                            $price = $cart->course->discount_price;
                                        } else {
                                            $price = $cart->price;
                                        }
                                    } else {
                                        $price = $cart->bundle->price;
                                    }
                                } elseif (isModuleActive('Appointment')) {
                                    $price = $cart->instructor->hour_rate;
                                } else {
                                    $price = 0;
                                }
                                if ($type == 'certificate') {
                                    $price = $cart->price;
                                }
                                $totalSum = $totalSum + @$price;
                                if (count($cart->course->children)) {
                                    foreach ($cart->course->children as $child) {
                                        if ($cart->course_type == $child->type) {
                                            $thumbnail = getCourseImage($child->thumbnail);
                                            break;
                                        } else {
                                            $thumbnail = getCourseImage($cart->course->thumbnail);
                                        }
                                    }
                                } else {
                                    $thumbnail = getCourseImage($cart->course->thumbnail);
                                }

                            @endphp
                            <div class="single_ordered_product">
                                <div class="product_name d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ $thumbnail }}" class="h-100" alt="">
                                    </div>
                                    <span>{{ @$cart->course->parent->title }}
                                        {{ $type == 'certificate' ? '[' . __('certificate.Certificate') . ']' : '' }}</span>
                                </div>
                                <span class="order_prise f_w_500 font_16">
                                    {{ getPriceFormat($price) }}
                                </span>
                            </div>
                        @else
                            @php
                                if ($cart->program_id) {
                                    if ($cart->program_id != 0) {
                                        if (@$cart->program->discount_price > 0) {
                                            $price = $cart->program->discount_price;
                                        } else {
                                            $price = $cart->price;
                                        }
                                    } else {
                                        $price = $cart->bundle->price;
                                    }
                                } elseif (isModuleActive('Appointment')) {
                                    $price = $cart->instructor->hour_rate;
                                } else {
                                    $price = 0;
                                }
                                if ($type == 'certificate') {
                                    $price = $cart->price;
                                }

                                $totalSum = $totalSum + @$price;
                            @endphp
                            <div class="single_ordered_product">
                                <div class="product_name d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="{{ getCourseImage(@$cart->program->icon) }}" class="h-100"
                                            alt="">
                                    </div>
                                    <span>{{ @$cart->program->programtitle }}
                                        {{ $type == 'certificate' ? '[' . __('certificate.Certificate') . ']' : '' }}</span>
                                </div>
                                <span class="order_prise f_w_500 font_16">
                                    {{ getPriceFormat($price) }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="ordered_products_lists">
                <div class="single_lists">
                    <span class="total_text">{{ __('frontend.Subtotal') }}</span>
                    <span>{{ getPriceFormat($checkout->price) }}</span>
                </div>
                @if ($checkout->purchase_price > 0)
                    <div class="single_lists">
                        <span class="total_text">{{ __('payment.Discount Amount') }}</span>
                        <span>{{ $checkout->discount == '' ? '0' : getPriceFormat($checkout->discount) }}</span>
                    </div>
                    
                    @if (hasTax())
                        <div class="single_lists">
                            <span class="total_text">{{ __('tax.TAX') }} </span>
                            <span class="totalTax">{{ getPriceFormat($checkout->tax) }}</span>
                        </div>
                    @endif
                    @if($balance && $balance > 0)
                    <div class="single_lists">
                        <span class="total_text">{{ __('Balance Amount') }}</span>
                        <span>- {{ $balance == '' ? '0' : getPriceFormat($balance) }}</span>
                    </div>
                    @endif
                    <div class="single_lists">
                        <span class="total_text">{{ __('frontend.Payable Amount') }} </span>
                        <span class="totalBalance">{{ getPriceFormat($checkout->purchase_price - $balance) }}</span>
                    </div>
                @endif
            </div>
        </div>
       </div>
    </div>
</div>

@if (isModuleActive('Invoice') && $payment_type == 2)
    <div class="modal fade" id="bankModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f_w_700" id="exampleModalLabel">{{ __('invoice.Bank Payment') }} </h5>
                </div>
                <form name="bank_payment" enctype="multipart/form-data"
                    action="{{ route('invoice.offline-payment.store') }} " class="single_account-form"
                    method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="method" value="Bank Payment">
                        <input type="hidden" name="tracking" value="{{ $checkout->tracking }}">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <label for="name" class="mb-2">@lang('setting.Bank Name')
                                    <span>*</span></label>
                                <input type="text" required class="primary_input4 mb_20" placeholder="Bank Name"
                                    name="bank_name" value="{{ @old('bank_name') }}">
                                <span class="invalid-feedback" role="alert" id="bank_name"></span>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <label for="name" class="mb-2">@lang('setting.Branch Name')
                                    <span>*</span></label>
                                <input type="text" required name="branch_name" class="primary_input4 mb_20"
                                    placeholder="Name of account owner" value="{{ @old('branch_name') }}">
                                <span class="invalid-feedback" role="alert" id="owner_name"></span>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-xl-6 col-md-6">
                                <label for="name" class="mb-2">@lang('setting.Account Number')
                                    <span>*</span></label>
                                <input type="text" required class="primary_input4 mb_20"
                                    placeholder="Account number" name="account_number"
                                    value="{{ @old('account_number') }}">
                                <span class="invalid-feedback" role="alert" id="account_number"></span>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <label for="name" class="mb-2">@lang('setting.Account Holder')
                                    <span>*</span></label>
                                <input type="text" required name="account_holder" class="primary_input4 mb_20"
                                    placeholder="Account Holder" value="{{ @old('account_holder') }}">
                                <span class="invalid-feedback" role="alert" id="account_holder"></span>
                            </div>
                            <input type="hidden" name="deposit_amount" value="{{ $checkout->price }}">
                        </div>
                        <div class="row mb-20">
                            <div class="col-xl-6 col-md-12">
                                <label for="name" class="mb-2">@lang('setting.Account Type')
                                    <span>*</span></label>
                                <select class="theme_select wide update-select-arrow" name="type" required
                                    id="type" style="margin-top: -10px;">
                                    <option
                                        data-display="{{ __('common.Select') }}  {{ __('setting.Account Type') }}"
                                        value="">{{ __('common.Select') }} {{ __('setting.Account Type') }}
                                    </option>
                                    <option value="Current Account"
                                        {{ (getPaymentEnv('ACCOUNT_TYPE') ? getPaymentEnv('ACCOUNT_TYPE') : '') == 'Current Account' ? 'selected' : '' }}>
                                        {{ __('invoice.Current Account') }}
                                    </option>
                                    <option value="Savings Account"
                                        {{ (getPaymentEnv('ACCOUNT_TYPE') ? getPaymentEnv('ACCOUNT_TYPE') : '') == 'Savings Account' ? 'selected' : '' }}>
                                        {{ __('invoice.Savings Account') }}
                                    </option>
                                    <option value="Salary Account"
                                        {{ (getPaymentEnv('ACCOUNT_TYPE') ? getPaymentEnv('ACCOUNT_TYPE') : '') == 'Salary Account' ? 'selected' : '' }}>
                                        {{ __('invoice.Salary Account') }}
                                    </option>
                                    <option value="Fixed Deposit"
                                        {{ (getPaymentEnv('ACCOUNT_TYPE') ? getPaymentEnv('ACCOUNT_TYPE') : '') == 'Fixed Deposit' ? 'selected' : '' }}>
                                        {{ __('invoice.Fixed Deposit') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <label for="name" class="mb-2">{{ __('invoice.Cheque Slip') }}
                                    <span>*</span></label>
                                <input type="file" required name="image" class="primary_input4 mb_20">
                                <span class="invalid-feedback" role="alert" id="amount_validation"></span>
                            </div>
                        </div>
                        <fieldset class="mt-3">
                            <legend>{{ __('invoice.Bank Account Info') }}
                            </legend>
                            <table class="table-bordered table">
                                <tr>
                                    <td>@lang('setting.Bank Name')</td>
                                    <td>{{ getPaymentEnv('BANK_NAME') }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('setting.Branch Name')</td>
                                    <td>{{ getPaymentEnv('BRANCH_NAME') }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('setting.Account Type')</td>
                                    <td>{{ getPaymentEnv('ACCOUNT_TYPE') }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('setting.Account Number')</td>
                                    <td>{{ getPaymentEnv('ACCOUNT_NUMBER') }}</td>
                                </tr>
                                <tr>
                                    <td>@lang('setting.Account Holder')</td>
                                    <td>{{ getPaymentEnv('ACCOUNT_HOLDER') }}</td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="theme_line_btn"
                            data-dismiss="modal">@lang('common.Cancel')</button>
                        <button class="theme_btn" type="submit">@lang('payment.Payment')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif



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

            if (cardholderName === '' || cardNumber === '' || expirationDate === '' || cvv === '') {
                alert('All fields are required');
            } else if (cardNumber.replace(/\s/g, '').length < 16 || cvv.length < 3) {
                alert('Invalid card number or CVV');
                $('#cardNumber').addClass("bordered-1 border-danger")
                $('#cvv').addClass("bordered-1 border-danger")

            } else {
                // Check if the expiration date is valid
                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();
                var currentMonth = currentDate.getMonth() + 1; // Month is 0-based
                var expiryParts = expirationDate.split('/');
                var expiryMonth = parseInt(expiryParts[0], 10);
                var expiryYear = parseInt(expiryParts[1], 10);

                if (expiryYear < currentYear || (expiryYear == currentYear && expiryMonth < currentMonth)) {
                    alert('Expiration date must be in the future');
                    $('#expiryDate').addClass("bordered-1 border-danger")
                } else if (expiryYear > currentYear + 50) {
                    alert('Expiration year must not be more than 50 years ahead');
                    $('#expiryDate').addClass("bordered-1 border-danger")
                } else {
                    const form = document.querySelector('#payment-form');
                    form.submit();
                    // alert('submitted')
                }
            }
        });
    });
</script>
@include(theme('partials._custom_footer'))