@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | @lang('frontendmanage.Payment Method')
@endsection

@section('mainContent')
    <style>
        .clover-footer {
            display: none
        }

        div.billing_details_wrapper {
            order: 1;
        }

        div.order_wrapper {
            order: 2;
        }

        @media screen and (max-width: 576px) {
            div.billing_details_wrapper {
                order: 2;
            }

            div.order_wrapper {
                order: 1;
            }
        }

        .receipt {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            border-bottom: solid 1px;
            margin-bottom: 1rem;
        }

        .receipt-heading {
            font-size: 1.6rem;
            text-align: left;
        }

        .table {
            /* border-collapse: separate; */
            border-spacing: 0 1.5rem;
            color: #64645f;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            width: 100%;
        }

        .total td {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .price {
            text-align: end;
        }

        @media (width > 1650px) {
            /* p {
                                                font-size: 28px !important;
                                                line-height: 1.2 !important;
                                            } */

            h6 {
                font-size: 1.2rem !important
            }

            .h6 {
                font-size: 1.4rem !important
            }

            label {
                color: #7e7e7e;
                cursor: pointer;
                font-size: 23px !important;
            }

            .theme_btn {
                font-size: 23px !important;
            }

            h4 {
                font-size: 32px !important;
                line-height: 25px;
            }

            h5 {
                font-size: 25px !important;
                line-height: 25px;
            }

            .checkout_wrapper .order_wrapper {
                background: #fafafa;
                padding: 146px 95px 150px 90px !important;
            }

        }
    </style>
    <?php

    $pakms = Config::get('apiaccess');

    ?>
    <div>
        <input type="hidden" name="id" id="accesskey" value="{{ $pakms ?? null }}">
        {{-- @dd($pakms) --}}

        <div class="container">
            <div class="row px-md-4 px-1">
                <div class="col-md-12">
                    <div class="checkout_wrapper payment_area" id="mainFormData">
                        <div class="pt-5">
                            <div class="biling_address gray-bg">
                                <div class="biling-header d-flex justify-content-between align-items-center">
                                    <h4>{{ __('frontendmanage.Billing Address') }}</h4>
                                    @if (isModuleActive('Invoice') && ($type == 'invoice' || $type == 'certificate'))
                                        <a class="billingUpdate theme_btn">{{ __('common.Edit') }}</a>
                                        <a class="billingUpdateShow d-none theme_btn">{{ __('common.Show') }}</a>
                                    @else
                                        <a class="theme_btn"
                                            href="{{ route('CheckOut') }}?type=edit">{{ __('common.Edit') }}</a>
                                    @endif
                                </div>

                                <div class="biling_body_content" id="deafult">
                                    <p>{{ Auth::user()->name }}</p>
                                    <p>{{ Auth::user()->address }}</p>
                                </div>
                            </div>
                            @if (isModuleActive('Invoice'))
                                @includeIf('invoice::billing')
                            @endif
                            <div class="select_payment_method">
                                <div class="input_box_tittle">
                                    <h3 class=" font-weight-bold pl-2">@lang('Clover Payment ')</h3>
                                    <div class="container">
                                        <form action="{{ route('tutorPaymentSubmit') }}" method="post" id="payment-form">
                                            @csrf
                                            <input type="hidden" name="user_id"
                                                value="{{ Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                            <input type="hidden" name="payment_type" value="{{ $payment_type }}">
                                            <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                                            <div class="form-row top-row">
                                                <div id="amount" class="field card-number">
                                                    <input type="hidden" name="amount"
                                                        value="{{ request()->amount * 100 }}" placeholder="Amount">
                                                </div>
                                            </div>




                                            <div class="form-row top-row card-number border-bottom border-dark mb-2 rounded border pt-2 pl-2"
                                                style="height: 40px;">
                                                <div id="card-number" class="field"></div>
                                                <div class="input-errors" id="card-number-errors" role="alert"></div>
                                            </div>

                                            <div class="form-row border-bottom border-dark mb-2 rounded border pt-2 pl-2"
                                                style="height: 40px;">
                                                <div id="card-date" class="field third-width"></div>
                                                <div class="input-errors" id="card-date-errors" role="alert"></div>
                                            </div>

                                            <div class="form-row border-bottom border-dark mb-2 rounded border pt-2 pl-2"
                                                style="height: 40px;">
                                                <div id="card-cvv" class="field third-width"></div>
                                                <div class="input-errors" id="card-cvv-errors" role="alert"></div>
                                            </div>

                                            <div class="form-row border-bottom border-dark mb-2 rounded border pt-2 pl-2"
                                                style="height: 40px;">
                                                <div id="card-postal-code" class="field third-width"></div>
                                                <div class="input-errors" id="card-postal-code-errors" role="alert"></div>
                                            </div>

                                            <div id="card-response" role="alert"></div>

                                            <div class="button-container float-right mr-4 mt-3">
                                                @if (isset($pakms->message))
                                                    {{ $pakms->message }}
                                                @else
                                                    <button class="theme_btn btn btn-secondary h6">Pay
                                                        Now</button>
                                                @endif
                                            </div>
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
                                                    {{-- @if (isset($methods))
                                                        @php

                                                            $withMoule = $methods;

                                                            $methods = $methods->where('method', '!=', 'Bank Payment')->where('method', '!=', 'Offline Payment');

                                                            $payment_type = $checkout->invoice ? $checkout->invoice->payment_type : null;

                                                            if (isModuleActive('Invoice') && $payment_type == 2) {
                                                                $methods = $withMoule->where('method', 'Bank Payment');
                                                            }

                                                        @endphp
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order_wrapper mt-5 pt-5">
                            <div class="d-flex flex-column justify-content-between align-items-center mb_30 gap-2">
                                <img class="rounded-circle" height="180" width="180"
                                    src="{{ getInstructorImage($tutor->image) }}" class="h-100" alt=""
                                    style="border:3px solid #ff7600 !important;">
                                {{-- {{ 'Your Tutor:' }} --}}
                                <h3 class=" f_w_700 m-0">{{ $tutor->name }}</h3>
                            </div>

                            <div class="ordered_products">
                                <div class="receipt">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class=" f_w_700">Course</h3>
                                        <span class="order_prise f_w_500 font_16">
                                            {{ $course->title }}
                                        </span>
                                    </div>

                                    <h3 class=" f_w_700">Slots</h3>
                                    @php $totalSum=0; @endphp
                                    @if ($payment_type == 'tutor_payment')
                                        <div>
                                            <table class="table">
                                                @forelse ($time_slots as $time)
                                                    {{-- <li>{{ $time->start_time . '---' . $time->end_time }} </li> --}}
                                                    <tr>
                                                        <td>{{ $time->start_time . '---' . $time->end_time }}</td>
                                                        <td class="price">${{ $tutor->tutor_price }}.00</td>
                                                    </tr>
                                                @empty
                                                    <li>No Slot Selected</li>
                                                @endforelse
                                                <tr class="total">
                                                    <td>Total</td>
                                                    <td class="price">{{ getPriceFormat(request()->amount) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                                {{-- @php $totalSum=0; @endphp
                                @if ($payment_type == 'tutor_payment')
                                    <div class="single_ordered_product row">
                                        <div class="product_name d-flex align-items-center">
                                            <div class="thumb">

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="order_prise f_w_500 font_16">
                                                {{ getPriceFormat(request()->amount) }}
                                            </span>
                                        </div>
                                        <hr>
                                        <span class="order_prise f_w_500 font_16">
                                            {{ $tutor->name }}
                                        </span>
                                        <hr>
                                        <span class="order_prise f_w_500 font_16">
                                            {{ $course->title }}
                                        </span>
                                        <hr>
                                        <span class="order_prise f_w_500 font_16">
                                            <ul>
                                                @forelse ($time_slots as $time)
                                                    <li>{{ $time->start_time . '---' . $time->end_time }} </li>
                                                @empty
                                                    <li>No Slot Selected</li>
                                                @endforelse ()

                                            </ul>
                                        </span>
                                    </div>
                                @endif --}}
                            </div>
                            {{-- <div class="ordered_products">
                                @php $totalSum=0; @endphp
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
                                            @endphp
                                            <div class="single_ordered_product">
                                                <div class="product_name d-flex align-items-center">
                                                    <div class="thumb">
                                                        <img src="{{ getCourseImage(@$cart->course->thumbnail) }}" class="h-100"
                                                            alt="">

                                                    </div>
                                                    <span>{{ @$cart->course->title }}
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
                                                        if ($cart->program->discount_price > 0) {
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
                            </div> --}}
                            {{--
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
                                    <div class="single_lists">
                                        <span class="total_text">{{ __('frontend.Payable Amount') }} </span>
                                        <span class="totalBalance">{{ getPriceFormat($checkout->purchase_price) }}</span>
                                    </div>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(theme('partials._custom_footer'))
    {{-- @if (isModuleActive('Invoice') && $payment_type == 2)
        <div class="modal fade" id="bankModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('invoice.Bank Payment') }} </h5>
                    </div>
                    <form name="bank_payment" enctype="multipart/form-data"
                        action="{{ route('invoice.offline-payment.store') }} " class="single_account-form" method="POST">
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
                                    <input type="text" required class="primary_input4 mb_20" placeholder="Account number"
                                        name="account_number" value="{{ @old('account_number') }}">
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
    @endif --}}
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="https://checkout.sandbox.dev.clover.com/sdk.js"></script>
    <script>
        const accesskey = document.getElementById('accesskey').value;

        const clover = new Clover(accesskey);
        const elements = clover.elements();

        let styles = "";
        const form = document.getElementById('payment-form');
        const cardNumber = elements.create('CARD_NUMBER', styles);
        const cardDate = elements.create('CARD_DATE', styles);
        const cardCvv = elements.create('CARD_CVV', styles);
        const cardPostalCode = elements.create('CARD_POSTAL_CODE', styles);

        cardNumber.mount('#card-number');
        cardDate.mount('#card-date');
        cardCvv.mount('#card-cvv');
        cardPostalCode.mount('#card-postal-code');

        const cardResponse = document.getElementById('card-response');
        const displayCardNumberError = document.getElementById('card-number-errors');
        const displayCardDateError = document.getElementById('card-date-errors');
        const displayCardCvvError = document.getElementById('card-cvv-errors');
        const displayCardPostalCodeError = document.getElementById('card-postal-code-errors');

        // Handle real-time validation errors from the card element
        cardNumber.addEventListener('change', function(event) {
            console.log(`cardNumber changed ${JSON.stringify(event)}`);
        });

        cardNumber.addEventListener('blur', function(event) {
            console.log(`cardNumber blur ${JSON.stringify(event)}`);
        });

        cardDate.addEventListener('change', function(event) {
            console.log(`cardDate changed ${JSON.stringify(event)}`);
        });

        cardDate.addEventListener('blur', function(event) {
            console.log(`cardDate blur ${JSON.stringify(event)}`);
        });

        cardCvv.addEventListener('change', function(event) {
            console.log(`cardCvv changed ${JSON.stringify(event)}`);
        });

        cardCvv.addEventListener('blur', function(event) {
            console.log(`cardCvv blur ${JSON.stringify(event)}`);
        });

        cardPostalCode.addEventListener('change', function(event) {
            console.log(`cardPostalCode changed ${JSON.stringify(event)}`);
        });

        cardPostalCode.addEventListener('blur', function(event) {
            console.log(`cardPostalCode blur ${JSON.stringify(event)}`);
        });


        // Listen for form submission
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Use the iframe's tokenization method with the user-entered card details
            clover.createToken()
                .then(function(result) {
                    if (result.errors) {
                        Object.values(result.errors).forEach(function(value) {
                            //displayError.textContent = value;
                            alert(value);
                        });
                    } else {
                        cloverTokenHandler(result.token);
                    }
                });
        });


        function cloverTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'cloverToken');
            hiddenInput.setAttribute('value', token);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
@endsection
