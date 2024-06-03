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
             <h5 class="card-title">Add Fees</h5>
         </div>
         <div class="card-body">
             <form action="#" method="post">
                 <div class="row mb-3">
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="form-label" for="Roll_No">Fees Title</label>
                             <input placeholder="eg. School fees" id="School_fees" type="text" class="form-control">
                         </div>
                     </div>
                     <div class="col-md-6">
                
                            <label class="form-label" >{{ __('Fees Type:') }}<span class="fillable">*</span></label>
                                <div class="form-group">
                                    <select id="fees_type" class="nice-select sections niceSelect bordered_style wide" name="fees_type" required>
                                        <option value>Fees Type</option>
                                        <option value="1">Annual</option>
                                        <option value="2">Exam</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                @if ($errors->has('fees_type'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('fees_type') }}</strong>
                                    </span>
                                @endif
                        </div>    
                </div>
                    
                
                     
                     <div class="row mb-3">
                        <div class="col-md-6">
                            
                                <label class="form-label" >{{ __('Class:') }}<span class="fillable">*</span></label>
                                    <div class="form-group">
                                        <select id="getSections" class="nice-select sections niceSelect bordered_style wide" name="class" required>
                                            <option value>Select class</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            </select>
                                    </div>
                                    @if ($errors->has('class'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('class') }}</strong>
                                        </span>
                                    @endif
                            </div>    
                            <div class="col-md-6">
                    
                                    <label class="form-label" >{{ __('Department:') }}<span class="fillable">*</span></label>
                                        <div class="form-group">
                                            <select id="department" class="nice-select sections niceSelect bordered_style wide" name="department" required>
                                                <option value>Select class</option>
                                                <option value="1">Computer</option>
                                                <option value="2">Arts</option>
                                                <option value="3">Commerce</option>
                                                <option value="3">Science</option>
                                                <option value="3">Information Practices</option>
                                                </select>
                                        </div>
                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif
                                </div>    
                        </div>
                     <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="Ammount">Amount<span class="fillable">*</span></label>
                                <input placeholder="Ammount" id="Amount" type="text" class="form-control"
                                    required>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> 
                            <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                              <option value="1">
                                Active
                              </option>
                              <option value="0">
                                Inactive
                              </option>
                            </select>
                          </div>
                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="Payment_Reference_Number">Payment Reference
                                    Number</label>
                                <input placeholder="Payment Reference Number" id="Payment_Reference_Number"
                                    type="number" class="form-control" required>
                            </div>
                        </div>  --}}
                        {{-- <div class="col-sm-6">
                            <div class="form-group ">
                                <label class="form-label">Payment Type</label>
                                <select class="form-control">
                                    <option value="Payment Type">Payment Type</option>
                                    <option value="Annual">Cash</option>
                                    <option value="Exam">Cheque</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    
                     
                    
                    <div class="row mb-3">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="form-label" for="Payment_Details">Payment Details</label>
                             <textarea placeholder="Payment Details" id="Payment_Details" class="form-control" rows="5" required></textarea>
                         </div>
                     </div>
                    </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                         <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
                         {{-- <button type="submit" class="btn btn-danger light">Cancel</button> --}}
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