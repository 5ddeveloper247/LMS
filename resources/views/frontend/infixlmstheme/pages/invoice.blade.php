
  {{-- <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css"> --}}
  <style>
     table.table td {
      border: none;
      background-color: transparent;
    }
    table.table th {
      border: 1px solid #181818;
      background-color: rgb(233 208 178);
    }

    .last-div {
      display: flex;
      justify-content: flex-end;
    }
    .note_column{
        border: 1px solid black;
    }
    .note_column-span{
        font-weight: 500;
        color: blueviolet;
    }
    .note_column-a{
        color: #72af72;
    }
  </style>
<div id="invoice_print" class="invoice_part_iner">
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-3">
                <img src="{{ getCourseImage(Settings('logo')) }}" class="img-fluid">
            </div>
            
            <div class="col-6">
                <h2 class="text-center m-0">TUITION and FEE INVOICE </h2>
                <p class="text-center m-0">Account Services</p>
                <p class="text-center m-0">{{ Settings('address') }}</p>
                <p class="text-center m-0">Tel: {{ Settings('phone') }} | Fax: 863-250-5544</p>
                <p class="text-center m-0">Email: {{ Settings('email') }}</p>
            </div>
            <div class="col-3">
                <div class="main-title d-flex h-100 justify-content-center align-items-center">
                            <h3 class="text-uppercase mb-0">INV-{{ $enroll->id + 1000 }}</h3>
                        </div>
            </div>
        </div>
    {{-- </div> --}}
@php
switch ($enroll->type) {
    case 'tutor_payment':
        $invoice_title = 'Tutor Payment';
        break;
    case 'package':
        $invoice_title = 'Tutor Package Buy';
        break;
    case 'plan_installment_pay':
        $invoice_title = 'Installment Pay';
        break;
    case 'student_register':
        $invoice_title = 'Student Registration';
        break;
    case 'cash_out':
       $invoice_title = 'Cash Out / Withdrawal';
        break;
    
    default:
        $invoice_title = 'Course Checkout';
        break;
}
    




@endphp
{{-- <div class="container"> --}}
    <div class="row">
        <table class="table">
            <tr>
                <td>Printed Date & Time:<br><u>{{ date('d F Y H:i a') }}</u></td>
                <td>ID:<br><u>{{ $enroll->user->id }}</u></u></td>
                <td>Name:<br><u>
                    @if (!empty($enroll->billing))
                        {{ @$enroll->billing->first_name }}
                        {{ @$enroll->billing->last_name }}
                    @else
                        {{ @$enroll->user->name }}
                    @endif</u>
                </td>
                <td>Email:<br><u>{{ @$enroll->user->email }}</u></td>
            </tr>
        </table>
        {{-- <div class="d-flex w-100 justify-content-between">
            <label>Printed Date & Time: <u>{{ date('d F Y H:i a') }}</u></label>
        <label>Student ID: <u>{{ $enroll->user->id }}</u></label>
        <label>Name: <u>
            @if (!empty($enroll->billing))
                {{ @$enroll->billing->first_name }}
                {{ @$enroll->billing->last_name }}
            @else
                {{ @$enroll->user->name }}
            @endif</u>
        </label>
        <label>Email: <u>{{ @$enroll->user->email }}</u></label>
        </div> --}}
        <p>You are registered and financially responsible for the course listed below. Full payment of all registered courses must be paid by deadline. </p>
    </div>

  {{-- <h6>Class Schedule </h6>
  
  <table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>Class</th>
            <th>Course</th>
            <th>Description</th>
            <th>Day</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Gloria Little</td>
            <td>Systems Administrator</td>
            <td>New York</td>
            <td>59</td>
            <td>2009-04-10</td>
        </tr>
      
    </tfoot>
</table> --}}

{{-- 2nd table --}}
<div class= "row">
    <h6>{{ $invoice_title }}</h6> 
    <table id="example" class="table table-striped" >
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
                                            @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                            <small>(Full Course)</small>
                                        </h5>
                                    @elseif($item->course_type == '5')
                                        <h5 class="black_color">
                                            {{ @$item->course->title }}
                                            @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                            <small>(Prep-Course/on-demand)</small>
                                        </h5>
                                    @elseif($item->course_type == '6')
                                        <h5 class="black_color">
                                            {{ @$item->course->title }}
                                            @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                            <small>(Prep-Course/Live)</small>
                                        </h5>
                                    @elseif($item->course_type == '8')
                                        <h5 class="black_color">
                                            {{ @$item->course->title }}
                                            @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                            <small>(Repeat Course)</small>
                                        </h5>
                                    @elseif(!empty($item->course))
                                        @if ($item->course->type == '2')
                                            <h5 class="black_color">
                                                {{ @$item->course->title }}
                                            @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                                <small>(Big Quiz)</small>
                                            </h5>
                                        @elseif($item->course->type == '7')
                                            <h5 class="black_color">
                                                {{ @$item->course->title }}
                                                @if($item->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                            @endif
                                                <small>(Time Table)</small>
                                            </h5>
                                        @elseif($item->course->type == '9')
                                            <h5 class="black_color">
                                                {{ @$item->course->title }}
                                                @if($item->course->course_code)
                                                    <br>
                                                    <span style="font-size:0.95em">Course Code: {{$item->course->course_code}}</span>
                                                @endif
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
  {{-- <div class="last-div">
    <h6 class="me-5">TOTAL FEE ASSESSMENT</h6>
    <label class="ms-5">750.00</label>
  </div> --}}

  {{-- 3rd table --}}
 
    {{-- <h6>Payments, Waivers, Third Party</h6>
    <table id="example" class="table table-striped">
      <thead>
          <tr>
              <th>Credit</th>
              <th>Posted Date</th>
              <th>Item Amount</th>
              <th>Total</th>
              
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Michael Silva</td>
              <td>Marketing Designer</td>
              <td>London</td>
              <td>66</td>
          </tr>
      </tfoot>
  </table> --}}
  {{-- <div class="last-div">
    <h6 class="ms-5">TOTAL PAYMENTS</h6>
    <label class="ms-5">0.00</label>
  </div> --}}
  
  {{-- note --}}
  {{-- <div class="container mb-4"> --}}
      <div class="row mb-4">
          <div class="p-4 note_column">
              <h6>THE INFORMATION OF THIS FEE INVOICE IS SUBJECT TO CHANGE WITHOUT NOTICE</h6>
              <p>Payment Procedures: Acceptable form of payment are Money Order, Credit Card, Zelle, Debit Card, eCheck. 
                  Credit Card, Debit Card, and eCheck may be made online by going to <a href="mailto:mpaccounts@merkaiixcelprep.com" class="note_column-a">mpaccounts@merkaiixcelprep.com.</a> 
                  <span class="note_column-span">(provide the how to for payments online) </span>
                  <br> You  may also mail your Money Order to: Merkaii Xcellence Prep, Student Account Services, Attn: Payment Processing, 501 S. Florida Avenue, 
                  Lakeland, FL 33801 
                  <br>Late Payment of $100.00 will be assessed to students who do not pay their fees or do not pay their fees by the payment deadline. 
                  For more information on fee payment procedures, go to our website at <a href="mailto:studentaccounts@merkaiixcelprep.com" class="note_column-a">studentaccounts@merkaiixcelprep.com </a>
                  <br>Although great care was used to calculate your fees, payments etc., occasional errors do occur. MXP reserves the right to verify and make 
                  corrections to any information on this invoice without notice.</p>
                </div>
            </div>
  </div>
</div>