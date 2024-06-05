@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'manage-payment'
])
@section('content')
<div class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('password_status'))
        <div class="alert alert-success" role="alert">
            {{ session('password_status') }}
        </div>
    @endif
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
    <style>
      .pay-now-container {
        display: flex;
        flex-direction: row;
        align-items: center;
      }
      .pay-now-container .form-control {
        flex: 1;
        margin-right: 5px;
      }
      .pay-now-container .btn {
        flex: 0;
      }
      .pay-now-column {
        width: 300px;
      }
      .table-responsive {
        overflow-x: auto;
      }
    </style>
    <div class="row">
        <div class="col-md-12">
          <div class="col-12">
          <form action="" method="" id="marksheed">
              @csrf
              <div class="card ot-card mb-24 position-relative z_1">
                  <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                      <h3 class="mb-0 title">Filtering</h3>
                      <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox">
                              <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                                  <option value>Payment Status</option>
                                  <option value="1">Completed Payment</option>
                                  <option value="2">Incomplete Payment</option>
                              </select>
                          </div>
                         
                          
                          <div class="form-group single_large_selectBox">
                              <button class="btn btn-lg ot-btn-primary equal-dimensions search-student" type="submit" id="search">
                                  <i class="fa fa-search"></i> Search
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
     
          <div class="table-content table-basic mt-20" id="incompleteStudent">
            <div class="card ot-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 title">Manage Students Payment Records</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                                <tr>
                                    <th>S No</th>
                                    <th>Title</th>
                                    <th>Pay_Ref</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>Pay Now</th>
                                    <th>Receipt_No</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td>1</td>
                                        <td>school</td>
                                        <td>2024/942618</td>
            
                                        
                                        <td class="font-weight-bold" id="amt-jq5xG0zx9YrLa6" data-amount="500">500</td>
            
                                        
                                        <td id="amt_paid-jq5xG0zx9YrLa6" data-amount="0" class="font-weight-bold" style="color:#03c6fc;">0.00</td>
            
                                        
                                        <td id="bal-jq5xG0zx9YrLa6" class="font-weight-bold" style="color:#fc1303;">500</td>
            
                                        
                                        <td class="pay-now-column">
                                            <form id="jq5xG0zx9YrLa6" method="post" class="ajax-pay" action="http://127.0.0.1:8000/payments/pay_now/jq5xG0zx9YrLa6" name="jq5xG0zx9YrLa6">
                                              <input type="hidden" name="_token" value="knwu3QmOTtf2kvAQX2J9mbg5Z7MekAkq7Y0IQhvt">
                                              <div class="pay-now-container">
                                                <input min="1" max="500" id="val-jq5xG0zx9YrLa6" class="form-control" style="width:100px;" required placeholder="Pay Now" title="Pay Now" name="amt_paid" type="number">
                                                <button data-text="Pay" class="btn btn-danger" type="submit">Pay  <i class="fa-solid fa-paper-plane"></i></button>
                                              </div>
                                            </form>
                                        </td>
                                        
                                        <td>18004210</td>
            
                                        <td>2018-2019</td>
            
                                        
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                        <a href="#" class="dropdown-item" onclick="confirmResetPayment(event, 'item-reset-jq5xG0zx9YrLa6')"><i class="fa fa-refresh" ></i>  {{ __('Reset Payment') }}</a>
                                                   
                                                        <a href="#" class="dropdown-item" id="print-receipt"><i class="fa fa-print"></i>  {{ __('Print Receipt') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    {{-- <tr id="row_7">
                                        <td class="serial">2</td>
                                        <td>2023111</td>
                            
                                       
                                        <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                          <a href="{{ route('admin-student-profile')}}" target="_blank">William</a></td>
                                        <td>Two (A)</td>
                                        <td>Parent8</td>
                                
                                    
                    
                                       
                                        <td class="action">
                                           <a href="{{route('student-payment')}}" class="btn btn-lg ot-btn-primary equal-dimensions" >Payment</a>
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container" id="printable-receipt" style="display:none;">
                <div  xmlns:margin-top="http://www.w3.org/1999/xhtml">
                    
                    <table width="100%">
                        <tr>
            
                            <td>
                                <strong><span
                                            style="color: #1b0c80; font-size: 25px;">Demo Institution</span></strong><br/>
                                
                                <strong><span
                                            style="color: #000; font-size: 15px;"><i>Address</i></span></strong>
                                <br/> <br/>
            
                                 <span style="color: #000; font-weight: bold; font-size: 25px;"> PAYMENT RECEIPT</span>
                            </td>
                        </tr>
                    </table>
            
                    
                    <div style="position: relative;  text-align: center; ">
                        <img src=""
                             style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.1; margin-left: auto;margin-right: auto; left: 0; right: 0;"/>
                    </div>
            
                    
                <div class="bold arial" style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
                    <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
                        <span  style="font-size: 16px;">Receipt Reference No.</span>
                    </div>
                    <div  style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
                        <span  style="font-size: 25px;">88361842</span>
                    </div>
                </div>
            
                    <div style="clear: both"></div>
            
                    
                    <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
                        <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">STUDENT INFORMATION</span>
                    </div>
            
                    
                    <div style="margin: 15px;">
                        <img style="width: 100px; height: 100px; float: left;" src="http://localhost/global_assets/images/user.png" alt="...">
                    </div>
            
                   <div style="float: left; margin-left: 20px">
                       <table style="font-size: 16px" class="td-left" cellspacing="5" cellpadding="5">
                           <tr>
                               <td class="bold">NAME:</td>
                               <td>John Steve</td>
                           </tr>
                           <tr>
                               <td class="bold">ADM_NO:</td>
                               <td></td>
                           </tr>
                           <tr>
                               <td class="bold">CLASS:</td>
                               <td>Nursery 1</td>
                           </tr>
                       </table>
                   </div>
                    <div class="clear"></div>
            
                    
                    <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
                        <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">PAYMENT INFORMATION</span>
                    </div>
            
                    <table class="td-left" style="font-size: 16px" cellspacing="2" cellpadding="2">
                            <tr>
                                <td class="bold">REFERENCE:</td>
                                <td>2024/942618</td>
                                <td class="bold">TITLE:</td>
                                <td>school</td>
                            </tr>
                            <tr>
                                <td class="bold">AMOUNT:</td>
                                <td>500</td>
                                <td class="bold">DESCRIPTION:</td>
                                <td></td>
                            </tr>
                        </table>
            
                    
                    <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
                        <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">DESCRIPTION</span>
                    </div>
            
                    <table class="td-left" style="font-size: 16px" width="100%" cellspacing="2" cellpadding="2">
                       <thead>
                       <tr>
                           <td class="bold">Date</td>
                           <td class="bold">Amount Paid <del style="text-decoration-style: double">N</del></td>
                           <td class="bold">Balance <del style="text-decoration-style: double">N</del></td>
                       </tr>
                       </thead>
                        <tbody>
                                    </tbody>
                    </table>
            
                    <hr>
                    <div class="bold arial" style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
                        <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
                            <span  style="font-size: 16px;">TOTAL DUE</span>
                        </div>
                        <div  style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
                            <span  style="font-size: 25px;">0</span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
      </div>

    </div>
</div>
</div>






    </div>
    @endsection
    @push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script> --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

 <script>

  $(document).ready(function() {
    $('.table').DataTable({

    });
    
  });
  document.getElementById('print-receipt').addEventListener('click', function(event) {
    event.preventDefault();

    // Get the content of the hidden printable receipt
    var printableContent = document.getElementById('printable-receipt').innerHTML;

    // Open a new window
    var printWindow = window.open('', '', 'height=400,width=600');

    // Add the receipt content to the new window
    printWindow.document.write('<html><head><title>Print Receipt</title>');
    printWindow.document.write(' <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/assets/css/receipt.css"/>');
    printWindow.document.write('</head><body>');
    printWindow.document.write(printableContent);
    printWindow.document.write('</body></html>');

    // Print the content of the new window
    printWindow.document.close();
    printWindow.print();
  });
  function confirmResetPayment(event, formId) {
    event.preventDefault();
    if (confirm('Are you sure you want to reset this payment?')) {
      document.getElementById(formId).submit();
    }
  }
</script>
@endpush