@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'change-meeting-status'
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
                    <h4 class="mb-0">Change Status</h4>
                    <a href="{{ route('meeting-status') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label"> Status <span class="fillable">*</span></label> 
                            <select class="nice-select niceSelect bordered_style wide" name="name" id="class_setup">
                                <option value="">Upcoming Meeting</option>
                                <option value="">Rejected</option>
                                <option value="">Accepted</option>
                                <option value="">Postponed</option>
                                <option value="">Cancelled</option>
                                <option value="">Done</option>
                            </select>
                          </div>
                        </div>
                    
                          <div class="col-md-12 mt-24">
                            <div class="card-footer">
                              <div class="d-flex justify-content-end">
                                  <a href="{{ route('meeting-status') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
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