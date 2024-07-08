@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees'
])
@section('content')

<div class="content">
  <div class="row">
    <div class="col-md-12 search-form">
      <form action="" id="marksheed" enctype="multipart/form-data" name="marksheed">
        <div class="card ot-card mb-24 position-relative z_1">
          <div class="card-header d-flex align-items-center gap-4 flex-wrap">
            <h3 class="mb-0">Filtering</h3>
            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
              <div class="single_large_selectBox">
                <select class="nice-select niceSelect bordered_style wide" name="student_id">
                  <option value="">
                    Select student
                  </option>
                  <option value="2">
                    Student 112
                  </option>
                  <option value="17">
                    Student 123
                  </option>
                  <option value="29">
                    Student 211
                  </option>
                  <option value="54">
                    Student 2212
                  </option>
                  <option value="65">
                    Student 319
                  </option>
                  <option value="79">
                    Student 329
                  </option>
                </select>
              </div><button class="btn btn-lg ot-btn-primary" type="submit" id="search"><i class="fa fa-search"></i> Search</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12 fees-form" style="display:none;">
      <div class="table-content table-basic">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Fees List</h4>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-30">
                <thead class="thead-light">
                  <tr>
                    <th class="purchase">Group</th>
                    <th class="purchase">Type</th>
                    <th class="purchase">Due date</th>
                    <th class="purchase">Amount (৳)</th>
                    <th class="purchase">Status</th>
                    <th class="purchase">Fine type</th>
                    <th class="purchase">Percentage</th>
                    <th class="purchase">Fine amount (৳)</th>
                    <th class="purchase">Payment Info</th>
                    <th class="purchase">Action</th>
                  </tr>
                </thead>
                <tbody class="tbody">
                  <tr>
                    <td>Monthly fees</td>
                    <td>January month's fee</td>
                    <td>30 Apr 2024</td>
                    <td>1000.00 <span class="text-danger">+ 0.00</span></td>
                    <td><span class="badge badge-danger">Unpaid</span></td>
                    <td><span class="badge badge-info">None</span></td>
                    <td>0</td>
                    <td>0.00</td>
                    <td></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" onclick="feePayByParentModal('2')"><span>Pay</span></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
@push('scripts') 
<script>


   $(document).ready(function(){
    $('.fees-form').hide();
    $('.search-form').show();


    $('#marksheed').on('submit', function(e) {
      e.preventDefault(); 
      $('.fees-form').show();
      $('.search-form').show();
     
    });

   });

</script>
 @endpush