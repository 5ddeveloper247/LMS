<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">
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
</head>
<body>

    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-3">
                <img src="">
            </div>
            
            <div class="col-6">
                <h2 class="text-center m-0">TUITION and FEE INVOICE </h2>
                <p class="text-center m-0">Account Services</p>
                <p class="text-center m-0">501 S. Florida Avenue, Lakeland, FL 33801</p>
                <p class="text-center m-0">Tel: 863-250-8764 | Fax: 863-250-5544</p>
                <p class="text-center m-0">Email: mcohstudentacct@merakinursing.com</p>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between">
            <label>Printed Date & Time:____________</label>
        <label>Student ID:____________</label>
        <label>Name:_________</label>
        <label>Term:_________</label>
        </div>
        <p>You are registered and financially responsible for the course listed below. Full payment of all registered courses must be paid by deadline. </p>
    </div>
  <h6>Class Schedule </h6>
  
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
</table>

{{-- 2nd table --}}

    <h6>Fee Assessment </h6> 
    <table id="example" class="table table-striped" >
      <thead>
          <tr>
              <th>Course Fees</th>
              <th>Trem</th>
              <th>Payment Deadline</th>
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
              <td>2012-11-27</td>
          </tr>
      
        
      </tfoot>
  </table>
  <div class="last-div">
    <h6 class="me-5">TOTAL FEE ASSESSMENT</h6>
    <label class="ms-5">750.00</label>
  </div>

  {{-- 3rd table --}}
 
    <h6>Payments, Waivers, Third Party</h6>
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
  </table>
  <div class="last-div">
    <h6 class="ms-5">TOTAL PAYMENTS</h6>
    <label class="ms-5">0.00</label>
  </div>
  </div>

  {{-- note --}}
  <div class="container mb-4">
    <div class="p-4 note_column">
        <h6>THE INFORMATION OF THIS FEE INVOICE IS SUBJECT TO CHANGE WITHOUT NOTICE</h6>
        <p>Payment Procedures: Acceptable form of payment are Money Order, Credit Card, Zelle, Debit Card, eCheck. 
            Credit Card, Debit Card, and eCheck may be made online by going to <a href="#" class="note_column-a">mpaccounts@merkaiixcelprep.com.</a> 
            <span class="note_column-span">(provide the how to for payments online) </span>
           <br> You  may also mail your Money Order to: Merkaii Xcellence Prep, Student Account Services, Attn: Payment Processing, 501 S. Florida Avenue, 
            Lakeland, FL 33801 
            <br>Late Payment of $100.00 will be assessed to students who do not pay their fees or do not pay their fees by the payment deadline. 
            For more information on fee payment procedures, go to our website at <a href="#" class="note_column-a">studentaccounts@merkaiixcelprep.com </a>
            <br>Although great care was used to calculate your fees, payments etc., occasional errors do occur. MXP reserves the right to verify and make 
            corrections to any information on this invoice without notice.</p>
    </div>
  </div>
</body>
</html>
