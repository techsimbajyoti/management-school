@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-master'
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
        <div class="row">
            <div class="col-md-12">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Add Master</h4><a href="{{route('master')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                      <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                       @csrf
                        <div class="row mb-3">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Fees group <span class="fillable">*</span></label> 
                                <select class="nice-select niceSelect bordered_style wide" name="fees_group_id" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option value="">
                                    Select fees group
                                  </option>
                                  <option value="1">
                                    Monthly fees
                                  </option>
                                  <option value="2">
                                    Exam fees
                                  </option>
                                  <option value="3">
                                    Umut
                                  </option>
                                </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Fees type <span class="fillable">*</span></label> 
                                <select id="getSubjects" class="nice-select niceSelect bordered_style wide" name="fees_type_id">
                                  <option value="">
                                    Select section
                                  </option>
                                  <option value="1">
                                    january months fee
                                  </option>
                                  <option value="2">
                                    february month fee
                                  </option>
                                  <option value="3">
                                    march month fee
                                  </option>
                                  <option value="4">
                                    april month fee
                                  </option>
                                  <option value="5">
                                    may month fee
                                  </option>
                                  <option value="6">
                                    first term fee
                                  </option>
                                  <option value="7">
                                    2nd term fee
                                  </option>
                                  <option value="8">
                                    last term fee
                                  </option>
                                </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Due date <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="due_date" list="datalistOptions" id="exampleDataList" type="date" placeholder="enter_due_date" value="">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Amount  <span class="fillable">*</span></label> 
                                <input class="nice-select niceSelect bordered_style wide amount" name="amount" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter amount" value="">
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Fine type <span class="fillable">*</span></label> <select class="fine_type nice-select niceSelect bordered_style wide" name="fine_type" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option selected value="0">
                                    None
                                  </option>
                                  <option value="1">
                                    Percentage
                                  </option>
                                  <option value="2">
                                    Fix Amount
                                  </option>
                                </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option value="1">
                                    Active
                                  </option>
                                  <option value="0">
                                    Inactive
                                  </option>
                                </select>
                              </div>
                              <div class="col-md-6 mb-3 percentage">
                                <label for="exampleDataList" class="form-label">Percentage <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide percentage_input" name="percentage" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter percentage" value="0">
                              </div>
                              <div class="col-md-6 mb-3 fine_amount">
                                <label for="exampleDataList" class="form-label">Fine amount  <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide fine_amount_input" name="fine_amount" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter fine amount" value="0">
                              </div>
                              <div class="col-md-12 mt-24">
                                <div class="text-right">
                                  <button class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection