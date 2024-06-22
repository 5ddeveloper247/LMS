<div class="main_content_iner main_content_padding">
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-12">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 mb_40">
                                    <h3 class="custom_small_heading mb-0">{{ __('payment.Purchase history') }}</h3>
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        @if (count($enrolls) == 0)
                            <div class="col-12">
                                <div class="section__title3 margin_50">
                                    <p class="text-center">{{ __('student.No Course Purchased Yet') }}!</p>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="table-responsive">
                                        <table class="custom_table3 table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('common.Date') }}</th>
                                                    <th scope="col">{{ __('Products') }}</th>
                                                    <th scope="col">{{ __('payment.Total Price') }}</th>
                                                    {{--                                                <th scope="col">{{__('common.Discount')}}</th> --}}
                                                    {{--                                                @if (hasTax()) --}}
                                                    {{--                                                    <th scope="col">{{__('tax.TAX')}}</th> --}}
                                                    {{--                                                @endif --}}
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('common.Payment Type') }}</th>
                                                    <th scope="col">{{ __('payment.Invoice') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if (isset($enrolls))
                                                    @foreach ($enrolls as $key => $enroll)
                                                        @if (!is_null($enroll->payment_method))
                                                            <tr>
                                                                <td scope="row">{{ @$key + 1 }}</td>
                                                                <td>{{ showDate($enroll->created_at) }}</td>
                                                                <td>
                                                                    @if ($enroll->type == 'tutor_payment')
                                                                        {{ count($enroll->tutorHirings) }}
                                                                    @else
                                                                        @if (count($enroll->courses) == 0)
                                                                            1
                                                                        @else
                                                                            {{ count($enroll->courses) }}
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ getPriceFormat($enroll->purchase_price) }}
                                                                </td>

                                                                {{--                                                        <td> --}}
                                                                {{--                                                            @if ($enroll->discount != 0) --}}

                                                                {{--                                                                {{getPriceFormat($enroll->discount)}} --}}
                                                                {{--                                                            @endif --}}
                                                                {{--                                                        </td> --}}
                                                                {{--                                                        @if (hasTax()) --}}
                                                                {{--                                                            <td> --}}
                                                                {{--                                                                @if ($enroll->tax) --}}
                                                                {{--                                                                    {{getPriceFormat($enroll->tax)}} --}}
                                                                {{--                                                                @endif --}}
                                                                {{--                                                            </td> --}}
                                                                {{--                                                        @endif --}}
                                                                <td>
                                                                    {{-- @dd($enroll->type) --}}
                                                                    @if ($enroll->type == 'tutor_payment')
                                                                        Tutor Payment
                                                                    @elseif($enroll->type == 'plan_installment_pay')
                                                                        Installment
                                                                    @elseif($enroll->type == 'student_register')
                                                                        Register
                                                                    @else
                                                                        Checkout
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ $enroll->payment_method }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('invoice', $enroll->id) }}"
                                                                        class="link_value theme_btn small_btn4">{{ __('common.View') }}</a>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="mt-4">
                                            {{ $enrolls->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    @if (isSubscribe())
                        <div class="purchase_history_wrapper mt-0 pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">
                                        <h3 class="mb-0">{{ __('subscription.Subscription History') }}</h3>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                            @if (count($checkouts) == 0)
                                <div class="col-12">
                                    <div class="section__title3 margin_50">
                                        <p class="text-center">{{ __('subscription.No Subscription Purchased Yet') }}!
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="custom_table3 mb-0 table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">{{ __('common.SL') }}</th>
                                                        <th scope="col">{{ __('subscription.Plan') }}</th>
                                                        <th scope="col">{{ __('subscription.Start Date') }}</th>
                                                        <th scope="col">{{ __('subscription.End Date') }}</th>
                                                        <th scope="col">{{ __('subscription.Days') }}</th>
                                                        <th scope="col">{{ __('subscription.Price') }}</th>
                                                        <th scope="col">{{ __('subscription.Payment Method') }}</th>
                                                        <th scope="col">{{ __('subscription.Status') }}</th>
                                                        <th scope="col">{{ __('payment.Invoice') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($checkouts))

                                                        @foreach ($checkouts as $key => $checkout)
                                                            <tr>
                                                                <td scope="row">{{ @$key + 1 }}</td>
                                                                <td>{{ $checkout->plan->title }}</td>

                                                                <td>{{ showDate($checkout->start_date) }}</td>
                                                                <td>{{ showDate($checkout->end_date) }}</td>


                                                                <td> {{ $checkout->days }} </td>
                                                                <td> {{ $checkout->price }} </td>
                                                                <td> {{ $checkout->payment_method }} </td>
                                                                <td>
                                                                    @php
                                                                        $date_of_subscription = $checkout->end_date;
                                                                        $now = new DateTime();
                                                                        $startdate = new DateTime($checkout->start_date);
                                                                        $enddate = new DateTime($checkout->end_date);
                                                                        
                                                                        if ($startdate <= $now && $now <= $enddate) {
                                                                            echo 'Valid';
                                                                        } else {
                                                                            echo 'Expire';
                                                                        }
                                                                    @endphp
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('subInvoice', $checkout->id) }}"
                                                                        class="link_value theme_btn small_btn4">{{ __('common.View') }}</a>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                {{ $checkouts->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
