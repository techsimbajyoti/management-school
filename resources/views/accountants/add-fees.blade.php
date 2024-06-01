@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-fees'
])
@section('content')
<div class="content">
    <div class="container-fluid">
<div class="row page-titles mx-0">
 <div class="col-sm-6 p-md-0">
     <div class="welcome-text">
         <h4>Add Fees</h4>
     </div>
 </div>
 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     <ol class="breadcrumb">

         <li class="breadcrumb-item"><a href="javascript:void(0);">Fees</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Fees</a></li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-xl-12 col-xxl-12 col-sm-12">
     <div class="card">
         <div class="card-header">
             <h5 class="card-title">Add Department</h5>
         </div>
         <div class="card-body">
             <form action="#" method="post">
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label" for="Roll_No">Fees Title</label>
                             <input placeholder="eg. School fees" id="School_fees" type="text" class="form-control"
                                 required>
                         </div>
                     </div>
                     
                     {{-- <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label">Department</label>
                             <select class="form-control">
                                 <option value="Department">Department</option>
                                 <option value="Computer">Computer</option>
                                 <option value="Arts">Arts</option>
                                 <option value="Commerce">Commerce</option>
                             </select>
                         </div>
                     </div> --}}
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label">Type</label>
                             <select class="form-control">
                                 <option value="Fess Type">Fess Type</option>
                                 <option value="Annual">Annual</option>
                                 <option value="Exam">Exam</option>
                                 <option value="Other">Other</option>
                             </select>
                         </div>
                     </div>
                     
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label" for="Ammount">Amount</label>
                             <input placeholder="Ammount" id="Ammount" type="text" class="form-control"
                                 required>
                         </div>
                     </div>
                     
                     <div class="col-sm-6">
                         <div class="form-group ">
                             <label class="form-label">Payment Type</label>
                             <select class="form-control">
                                 <option value="Payment Type">Payment Type</option>
                                 <option value="Annual">Cash</option>
                                 <option value="Exam">Cheque</option>
                                 <option value="Other">Other</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label" for="Payment_Reference_Number">Payment Reference
                                 Number</label>
                             <input placeholder="Payment Reference Number" id="Payment_Reference_Number"
                                 type="number" class="form-control" required>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group mb-4">
                             <label class="form-label">Status</label>
                             <select class="form-control">
                                 <option value="Status">Status</option>
                                 <option value="Annual">Paid</option>
                                 <option value="Exam">Unpaid</option>
                                 <option value="Exam">Pending</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                         <div class="form-group">
                             <label class="form-label" for="Payment_Details">Payment Details</label>
                             <textarea placeholder="Payment Details" id="Payment_Details" class="form-control" rows="5" required></textarea>
                         </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                         <button type="submit" class="btn btn-primary">Submit</button>
                         <button type="submit" class="btn btn-danger light">Cancel</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>
</div>
 </div>
 @endsection