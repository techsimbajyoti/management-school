@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-group'
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
                        <h4 class="mb-0">Edit Fees Group</h4>
                        <a href="{{ route('group') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                      <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Name <span class="fillable">*</span></label> <input class="form-control ot-input" name="name" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                              </div>
                              <div class="col-md-6 mb-3">
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
                              <div class="col-md-12 mb-3">
                                <label for="exampleDataList" class="form-label">Description</label> 
                                <textarea class="nice-select niceSelect bordered_style wide" name="description" placeholder="Enter description"></textarea>
                              </div>
                              <div class="col-md-3 mt-24">
                                <label class="form-label">Online Admission Fees</label>
                                <div class="input-check-radio academic-section">
                                    <input type="checkbox" name="online_admission_fees" value="1" id="flexCheckDefault-1">
                                    <label class="form-check-label" for="flexCheckDefault-1">Yes</label>
                                </div>
                              </div>
                              <div class="col-md-9 mt-24">
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