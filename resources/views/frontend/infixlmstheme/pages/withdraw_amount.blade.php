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

        input,
        input::placeholder {
            font: 1.25rem/3 sans-serif !important;
        }


    }
</style>

@section('content')
    {{-- @dd('working') --}}
    <div class="section-margin-y container">
        <div class="justify-content-around px-md-5 row px-1">
            <div class="col-xl-12 mb-5 text-center">
                <h3 class="font-weight-bold">Please Add Your Bank Details</h3>
            </div>
            <div class="col-xl-6">
                <h3 class="font-weight-bold mb-3">{{ 'Payment $' . $amount }}</h3>
                @if ($errors->first('Error'))
                    <span class="text-danger" role="alert">{{ $errors->first('Error') }}</span>
                @endif
                <form action="{{ route('tutorRevenueWithdraw') }}" method="post" id="payment-form">
                    @csrf
                    <input type="hidden" name="tutor_id" value="{{ Crypt::encrypt($tutor->id) }}">
                    <input type="hidden" name="type" value="withdraw_amount">
                    <input type="hidden" name="amount" value="{{ Crypt::encrypt($amount) }}">
                    <div class="mb-2">
                        <label for="bank_name" class="form-label">Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control"
                            value="{{ old('bank_name') }}" required>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="branch_code" class="form-label">Branch Code</label>
                            <input type="text" name="branch_code" id="branch_code" class="form-control"
                                value="{{ old('branch_code') }}" required>
                        </div>
                        <div class="col-md-9">
                            <label for="account_number" class="form-label">Account/IBAN Number</label>
                            <input type="text" name="account_number" id="account_number" class="form-control"
                                value="{{ old('account_number') }}" required>
                                {{-- value="{{ old('account_number') }}" onKeyPress="if(this.value.length==20) return false;" required> --}}
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="account_holder" class="form-label">Account Holder</label>
                        <input type="text" name="account_holder" id="account_holder" class="form-control"
                            value="{{ old('account_holder') }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="account_type" class="form-label">Account Type</label>
                        <select name="account_type" id="account_type" class="form-control" required>
                            <option value="">Select</option>
                            <option value="current">Current</option>
                            <option value="saving">Saving</option>
                            <option value="fixed">Fixed</option>
                            <option value="salaried">Salaried</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="small_btn4 theme_btn">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-4">
                <h3 class="font-weight-bold mb-3">
                    {{ 'Withdraw Amount' }}
                </h3>
                <div class="row">
                    <div class="col-3 mb-3">
                        <p class="font-weight-bold">Name;</p>
                    </div>
                    <div class="col-9 mb-3">
                        <p class="font-weight-bold float-right">{{ $tutor->name }}</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold">Email:</p>
                    </div>
                    <div class="col-6 mb-3">
                        <p class="font-weight-bold float-right">{{ $tutor->email }}</p>
                    </div>
                    <div class="col-3 mb-3">
                        <p class="font-weight-bold">Amount</p>
                    </div>
                    <div class="col-9 mb-3">
                        <p class="font-weight-bold float-right">${{ $amount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#branch_code').mask('99999');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
      
        $(document).ready(function() {
       
        // $('#account_number').mask('0000 0000 0000 0000');
       
        $('#payment-form').submit(function(e) {
            e.preventDefault();
       
            var cardholderName = $('#account_holder').val();
            var cardNumber = $('#account_number').val();
            var account_type = $('#account_type').val();
            var branch_code = $('#branch_code').val();
            var bank_name = $('#bank_name').val();
           
          
            if (cardholderName === '' || cardNumber === '' || account_type === '' || bank_name === '' || branch_code === '' ) {
                alert('All fields are required');
            } 
           else {
                const form=document.querySelector('#payment-form');
                form.submit();
             
               
               
            }
        });
    });
    </script>

    @include(theme('partials._custom_footer'))


@endsection
