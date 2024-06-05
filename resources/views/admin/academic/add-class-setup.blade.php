@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-class'
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
                    <h4 class="mb-0">Add Class Setup</h4>
                    <a href="{{ route('class-setup') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label"> Class Name <span class="fillable">*</span></label> <input class="form-control ot-input" name="name" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label">Section <span class="fillable">*</span></label>
                            <div class="input-check-radio academic-section d-flex">
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="1" id="flexCheckDefaultA" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultA">A</label>
                                </div>
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="2" id="flexCheckDefaultB" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultB">B</label>
                                </div>
                                <div class="form-check me-3" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="3" id="flexCheckDefaultC" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultC">C</label>
                                </div>
                                <div class="form-check" style="display: flex; align-items: center;">
                                    <input type="checkbox" name="sections[]" value="4" id="flexCheckDefaultD" />
                                    <label class="form-check-label ms-2" for="flexCheckDefaultD">D</label>
                                </div>
                            </div>
                        </div>
                        
                        
                      
                        
                          <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                              <option value="1">
                                Active
                              </option>
                              <option value="0">
                                Inactive
                              </option>
                            </select>
                          </div>
                    
                          <div class="col-md-12 mt-24">
                            <div class="card-footer">
                              <div class="d-flex justify-content-end">
                                  <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save & Continue') }}</button>
                                  <a href="{{ route('class-setup') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                              </div>
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
