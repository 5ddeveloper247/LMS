
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
  

            {{-- @dd($enroll) --}}
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
                            <h3 class="text-uppercase mb-0">C-{{ $enroll->id + 1000 }}</h3>
                        </div>
            </div>
        </div>
    {{-- </div> --}}

{{-- <div class="container"> --}}
    <div class="row">
        <table class="table">
            <tr>
                <td>Printed Date & Time:<br><u>{{ date('d F Y H:i a') }}</u></td>
                <td>Student ID:<br><u>{{ $enroll->user->id }}</u></u></td>
                <td>Name:<br><u>{{ @$enroll->user->name }}</u>
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
    <h6>Enrolled Course</h6> 
    <table id="example" class="table table-striped" >
      <thead>
          <tr>
            <th scope="col">
            <span class="pl-3">
                {{ __('common.SL') }}
            </span>
            </th>
            <th colspan="2" scope="col" class="black_color">{{ __('Course Name') }}
            </th>
            <th scope="col" class="black_color">{{ __('student.Price') }}</th>
          </tr>
      </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
                
                {{-- @if (isset($enroll->course)) --}}
                        @if (!empty($enroll->program_id))
                            <tr>
                                <td class="black_color">
                                    <span class="pl-3">
                                    </span>
                                </td>
                                <td colspan="2">
                                    <h5 class="black_color">
                                        {{ @$enroll->program->programtitle }}
                                        <small>(Program)</small>
                                    </h5>
                                </td>
                                <td class="black_color">
                                    {{ getPriceFormat($enroll->purchase_price) }}
                                </td>
                            </tr>
                        @endif
                        @if (!empty($enroll->course_id))
                            <tr>
                                <td class="black_color">
                                    <span class="pl-3">
                                    </span>
                                </td>
                                <td>
                                    @if ($enroll->course_type == '4')
                                        <h5 class="black_color">
                                            {{ @$enroll->course->title }}
                                            @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                            <small>(Full Course)</small>
                                        </h5>
                                    @elseif($enroll->course_type == '5')
                                        <h5 class="black_color">
                                            {{ @$enroll->course->title }}
                                            @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                            <small>(Prep-Course/on-demand)</small>
                                        </h5>
                                    @elseif($enroll->course_type == '6')
                                        <h5 class="black_color">
                                            {{ @$enroll->course->title }}
                                            @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                            <small>(Prep-Course/Live)</small>
                                        </h5>
                                    @elseif($enroll->course_type == '8')
                                        <h5 class="black_color">
                                            {{ @$enroll->course->title }}
                                            @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                            <small>(Repeat Course)</small>
                                        </h5>
                                    @elseif(!empty($enroll->course))
                                        @if ($enroll->course->type == '2')
                                            <h5 class="black_color">
                                                {{ @$enroll->course->title }}
                                                @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                                <small>(Big Quiz)</small>
                                            </h5>
                                        @elseif($enroll->course->type == '7')
                                            <h5 class="black_color">
                                                {{ @$enroll->course->title }}
                                                @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                                <small>(Time Table)</small>
                                            </h5>
                                        @elseif($enroll->course->type == '9')
                                            <h5 class="black_color">
                                                {{ @$enroll->course->title }}
                                                @if($enroll->course->course_code)
                                            <br>
                                            <span style="font-size:0.95em">Course Code: {{$enroll->course->course_code}}</span>
                                            @endif
                                                <small>(Individual Course)</small>
                                            </h5>
                                        @endif
                                    @else
                                        <h5 class="black_color">
                                            {{ 'Prduct Not Found' }}
                                        </h5>
                                    @endif
                                    <small>({{ \Carbon\Carbon::parse($enroll->created_at)->format('d M Y H:i:s') }}
                                        )</small>
                                </td>
                                <td><h6>Admin Revenue:</h6></td>
                                <td class="black_color">
                                    {{ getPriceFormat($enroll->reveune) }}
                                </td>
                            </tr>
                            @if($enroll->course_type == 9)
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <h6>Tutor Revenue</h6> </td>
                                <td> {{ getPriceFormat($enroll->course->price - $enroll->reveune) }} </td>
                            </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <h6>Tax</h6> </td>
                                <td> {{ getPriceFormat($enroll->course->tax) }} </td>
                            </tr>
                        {{-- @endif --}}
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