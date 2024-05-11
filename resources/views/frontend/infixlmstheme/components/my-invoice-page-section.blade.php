<div>
    <section class="admin-visitor-area up_st_admin_visitor mt-5 pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-9">
                    <div class="box_header common_table_header">
                        <div class="main-title d-flex">
                            <h3 class="mr-30 text-uppercase mb-0">INV-{{ $enroll->id + 1000 }}</h3>
                        </div>
                        <div class="table_btn_wrap">
                            <ul>
                                <li>
                                    <button class="primary_btn printBtn">{{ __('student.Print') }}</button>
                                </li>
                                <li>
                                    <button class="primary_btn downloadBtn">{{ __('student.Download') }}</button>
                                    {{-- @dd($enroll) --}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- invoice print part here -->
                    <div class="invoice_print pb-5">
                        <div class="container-fluid p-0">
                            <div id="invoice_print" class="invoice_part_iner">
                                <table style=" margin-bottom: 30px" class="table">
                                    <tbody>
                                        <td>
                                            <img style="width: 108px" src="{{ getCourseImage(Settings('logo')) }}"
                                                alt="{{ Settings('site_name') }}">
                                        </td>
                                        <td style="text-align: right">
                                            <h3 class="invoice_no black_color" style=" margin-bottom: 10px" ;>
                                                INV-{{ $enroll->id + 1000 }}</h3>
                                        </td>
                                    </tbody>
                                </table>

                                <table style="margin-bottom: 0 !important;" class="table">
                                    <tbody>
                                        <tr>
                                            <td class="w-50">
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Date') }}:
                                                    </span><span>{{ date('d F Y', strtotime(!empty($enroll->billing) ? $enroll->billing->created_at : $enroll->created_at)) }}</span>
                                                </p>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Pay Method') }}:
                                                    </span><span>{{ $enroll->payment_method }}</span>
                                                </p>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    @if ($enroll->courses->sum('purchase_price') == 0)
                                                        <span class="black_color">{{ __('student.Status') }}: </span>
                                                        <span class="black_color">{{ __('common.Paid') }}</span>
                                                </p>
                                            @else
                                                <span class="black_color">{{ __('student.Status') }}: </span>
                                                <span
                                                    class="black_color">{{ $enroll->status == 1 ? __('student.Paid') : __('student.Unpaid') }}</span>
                                                </p>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Company') }}:
                                                    </span><span>{{ Settings('site_title') }}</span>
                                                </p>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Phone') }}:
                                                    </span><span>{{ Settings('phone') }}</span>
                                                </p>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Email') }}:
                                                    </span><span>{{ Settings('email') }}</span>
                                                </p>
                                                <p class="invoice_grid"
                                                    style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                    <span class="black_color">{{ __('student.Address') }}:
                                                    </span><span>{{ Settings('address') }}</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h4 style=" font-size: 16px; font-weight: 500; color: #000000; margin-top: 0; margin-bottom: 3px "
                                    class="black_color" ;>{{ __('student.Billed To') }},</h4>
			
                                <table style="margin-bottom: 35px !important;" class="table">
                                    <tbody>
                                        <td>
                                            <p class="invoice_grid"
                                                style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                <span class="black_color">{{ __('student.Name') }}: </span><span>
                                                    @if (!empty($enroll->billing))
                                                        {{ @$enroll->billing->first_name }}
                                                        {{ @$enroll->billing->last_name }}
                                                    @else
                                                        {{ @$enroll->user->name }}
                                                    @endif
                                                </span>
                                            </p>
                                            <p class="invoice_grid"
                                                style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                <span class="black_color">{{ __('student.Phone') }}: </span><span>
                                                    {{ !empty($enroll->billing) ? @$enroll->billing->phone : $enroll->user->phone }}
                                                </span>
                                            </p>
                                            <p class="invoice_grid"
                                                style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                <span class="black_color">{{ __('student.Email') }}: </span><span>
                                                    {{ !empty($enroll->billing) ? @$enroll->billing->email : $enroll->user->email }}
                                                </span>
                                            </p>
                                            <p class="invoice_grid"
                                                style="font-size:14px; font-weight: 400; color:#3C4777;">
                                                <span class="black_color">{{ __('student.Address') }}: </span>
                                                <span class="black_color">
                                                    {{ !empty($enroll->billing) ? @$enroll->billing->address1 : $enroll->user->address }},
                                                    {{-- !empty($enroll->billing) ? @$enroll->billing->city : $enroll->user->city --}}
                                                    {{ !empty($enroll->billing) ? @$enroll->billing->zip_code : $enroll->user->zip_code }}
                                                    {{-- !empty($enroll->billing) ? @$enroll->billing->country : $enroll->user->userCountry->name --}}
                                                </span>
                                            </p>
                                        </td>
                                    </tbody>
                                </table>
                                <h2 style=" font-size: 18px; font-weight: 500; color: #000000; margin-top: 70px; margin-bottom: 33px "
                                    class="black_color" ;>{{ __('student.Order List') }}</h2>

                                <table class="custom_table3 mb-0 table">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <span class="pl-3">
                                                    {{ __('common.SL') }}
                                                </span>
                                            </th>
                                            <th colspan="2" scope="col" class="black_color">{{ __('Name') }}
                                            </th>
                                            <th scope="col" class="black_color">{{ __('student.Price') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp

                                        @if ($enroll->type == 'tutor_payment')
                                            @if (isset($enroll->tutorHirings) && count($enroll->tutorHirings))
                                                @foreach ($enroll->tutorHirings as $key => $tutorHiring)
                                                    @if (!empty($tutorHiring))
                                                        <tr>
                                                            <td class="black_color">
                                                                <span class="pl-3">
                                                                    {{ ++$key }}
                                                                </span>
                                                            </td>
                                                            <td colspan="2">
                                                                <h5 class="black_color">
                                                                    {{ $tutorHiring->instructor->name }}
                                                                    <small>(Tutor)</small>
                                                                </h5>
                                                                <br>
                                                                <small>({{ \Carbon\Carbon::parse($tutorHiring->assign_date)->format('d M Y') . ' ' . $tutorHiring->assign_start_time . ' ' . $tutorHiring->assign_end_time }}
                                                                    )</small>
                                                            </td>
                                                            <td class="black_color">

                                                                {{ getPriceFormat($tutorHiring->price) }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @elseif ($enroll->type == 'package')
                                            <tr>
                                                <td class="black_color">
                                                    <span class="pl-3">
                                                        1
                                                    </span>
                                                </td>
                                                <td colspan="2">
                                                    <h5 class="black_color">Package Purchasing</h5>
                                                </td>
                                                <td class="black_color">
                                                    {{ $enroll->price }}
                                                </td>
                                            </tr>
                                        @elseif($enroll->type == 'plan_installment_pay')
                                            <tr>
                                                <td class="black_color">
                                                    <span class="pl-3">
                                                        1
                                                    </span>
                                                </td>
                                                <td colspan="2">
                                                    <h5 class="black_color">
                                                        {{ $enroll->studentIstallment->program->programtitle }}
                                                        <br />
                                                        Plan {{ $enroll->studentIstallment->plan->plan_order }}
                                                        <small>
                                                            @if ($enroll->studentIstallment->type == '1')
                                                                (Initial)
                                                            @else
                                                                Installment {{ $enroll->studentIstallment->type }}
                                                            @endif
                                                        </small>
                                                    </h5>
                                                </td>
                                                <td class="black_color">
                                                    {{ getPriceFormat($enroll->studentIstallment->amount) }}
                                                </td>
                                            </tr>
                                        @elseif($enroll->type == 'student_register')
                                            <tr>
                                                <td class="black_color">
                                                    <span class="pl-3">
                                                        1
                                                    </span>
                                                </td>
                                                <td colspan="2">
                                                    <h5 class="black_color">Registeration</h5>

                                                </td>
                                                <td class="black_color">
                                                    100
                                                </td>
                                            </tr>
                                        @elseif($enroll->type == 'cash_out')
                                            <tr>
                                                <td class="black_color">
                                                    <span class="pl-3">
                                                        1
                                                    </span>
                                                </td>
                                                <td colspan="2">
                                                    <h5 class="black_color">Withdraw (Individual Tutor)</h5>
                                                </td>
                                                <td class="black_color">
                                                    @if ($enroll->price)
                                                        {{ getPriceFormat($enroll->price) }}
                                                    @else
                                                        100
                                                    @endif
                                                </td>
                                            </tr>
                                        @else
                                        	
                                            @if (isset($enroll->courses) && count($enroll->courses))
                                                @foreach ($enroll->courses as $key => $item)
                                                    @if (!empty($item->program_id))
                                                        <tr>
                                                            <td class="black_color">
                                                                <span class="pl-3">
                                                                    {{ ++$key }}
                                                                </span>
                                                            </td>
                                                            <td colspan="2">
                                                                <h5 class="black_color">
                                                                    {{ @$item->program->programtitle }}
                                                                    <small>(Program)</small>
                                                                </h5>
                                                            </td>
                                                            <td class="black_color">
                                                                {{ getPriceFormat($item->purchase_price) }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if (!empty($item->course_id))
                                                        <tr>
                                                            <td class="black_color">
                                                                <span class="pl-3">
                                                                    {{ ++$key }}
                                                                </span>
                                                            </td>
                                                            <td colspan="2">
                                                                @if ($item->course_type == '4')
                                                                    <h5 class="black_color">
                                                                        {{ @$item->course->title }}
                                                                        <small>(Full Course)</small>
                                                                    </h5>
                                                                @elseif($item->course_type == '5')
                                                                    <h5 class="black_color">
                                                                        {{ @$item->course->title }}
                                                                        <small>(Prep-Course/on-demand)</small>
                                                                    </h5>
                                                                @elseif($item->course_type == '6')
                                                                    <h5 class="black_color">
                                                                        {{ @$item->course->title }}
                                                                        <small>(Prep-Course/Live)</small>
                                                                    </h5>
                                                                @elseif($item->course_type == '8')
                                                                    <h5 class="black_color">
                                                                        {{ @$item->course->title }}
                                                                        <small>(Repeat Course)</small>
                                                                    </h5>
                                                                @elseif(!empty($item->course))
                                                                    @if ($item->course->type == '2')
                                                                        <h5 class="black_color">
                                                                            {{ @$item->course->title }}
                                                                            <small>(Big Quiz)</small>
                                                                        </h5>
                                                                    @elseif($item->course->type == '7')
                                                                        <h5 class="black_color">
                                                                            {{ @$item->course->title }}
                                                                            <small>(Time Table)</small>
                                                                        </h5>
                                                                    @elseif($item->course->type == '9')
                                                                        <h5 class="black_color">
                                                                            {{ @$item->course->title }}
                                                                            <small>(Individual Course)</small>
                                                                        </h5>
                                                                    @endif
                                                                @else
                                                                    <h5 class="black_color">
                                                                        {{ 'Prduct Not Found' }}
                                                                    </h5>
                                                                @endif
                                                            </td>
                                                            <td class="black_color">
                                                                {{ getPriceFormat($item->purchase_price) }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold text-right">{{ __('student.Total') }}</td>
                                            <td class="font-weight-bold">
                                                @if (empty($enroll->purchase_price) || $enroll->purchase_price == '0.00')
                                                    {{ getPriceFormat($enroll->price) }}
                                                @else
                                                    {{ getPriceFormat($enroll->purchase_price) }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- invoice print part end -->
                </div>
            </div>
        </div>
    </section>
    <div id="editor"></div>
</div>
