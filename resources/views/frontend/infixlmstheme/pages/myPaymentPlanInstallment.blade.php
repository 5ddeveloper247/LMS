@extends(theme('layouts.dashboard_master'))
@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('Payment Plan Installment')}} @endsection
@section('css') @endsection
@section('js') @endsection

@section('mainContent')
    <input type="hidden" name="id" id="accesskey" value="{{  $pakms ?? null }}">
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="row">
                    <div class="col-12">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">
                                        <h3 class="mb-0">{{__('Payment Plan Installment')}}</h3>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mainform m-0 row">
                                            <div class="col-md-12">
                                                <div class="input_box_tittle">

                                                    <h4>@lang('Payment $'){{ $installment->amount }}</h4>

                                                    @if($errors->first('Error'))
                                                        <span class="text-danger" role="alert">{{$errors->first('Error')}}</span>
                                                    @endif
                                                    <div class="container">
                                                        <form action="{{ route('my.payment.plan.installment.payment') }}" method="post" id="payment-form">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{$user->id ?? null}}">
                                                            <input type="hidden" name="installment_id" value="{{$installment->id ?? null}}">
                                                            <div class="form-row top-row">
                                                                <div id="amount" class="field card-number">
                                                                    <input type="hidden" name="amount" value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $installment->amount)*100 }}" placeholder="Amount">
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
                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
