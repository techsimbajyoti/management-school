@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-exam-assign'
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
                    <h4 class="mb-0">Add Exam Assign</h4><a href="{{route('exam-assign')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                  </div>
                  <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Exam Type <span class="fillable">*</span></label> 
                            <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
                              <option value="">
                                Select class
                              </option>
                              <option value="1">
                                First
                              </option>
                              <option value="2">
                                Mid
                              </option>
                              <option value="3">
                                Final
                              </option>
                            </select>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> 
                            <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
                              <option value="">
                                Select class
                              </option>
                              <option selected value="1">
                                One
                              </option>
                              <option value="2">
                                Two
                              </option>
                              <option value="3">
                                Three
                              </option>
                            </select>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> 
                            <select class="sections nice-select niceSelect bordered_style wide" name="section">
                              <option value="">
                                Select section
                              </option>
                              <option selected value="1">
                                A
                              </option>
                              <option value="2">
                                B
                              </option>
                            </select>
                          </div>
                        
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Subject <span class="fillable">*</span></label>
                          <input class="sections nice-select niceSelect bordered_style wide" name="percent_upto" type="number" placeholder="Enter subject" value="">
                        </div>
                      </div>
                          <div class="col-md-12 mt-24">
                            <div class="text-right">
                              <a class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Save</a>
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

