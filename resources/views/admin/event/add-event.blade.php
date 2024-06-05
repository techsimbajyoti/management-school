@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-event'
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
                    <h4 class="mb-0">Add Event</h4>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event Name<span class="fillable">*</span></label> 
                            <input class="form-control ot-input" name="event" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event Description<span class="fillable">*</span></label> 
                            <input class="form-control ot-input" name="event" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event Place<span class="fillable">*</span></label> 
                            <input class="form-control ot-input" name="event" list="datalistOptions" id="exampleDataList" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event For<span class="fillable">*</span></label> 
                            <br><input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                          <label for="">All</label>
                          <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                          <label for="">Student's</label>
                          <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                          <label for="">Teacher's</label>
                          <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                          <label for="">Parent's</label>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Start Date <span class="fillable">*</span></label>
                            <input class="form-control ot-input" name="event_date" list="datalistOptions" id="exampleDataList" type="date" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">End Date <span class="fillable">*</span></label>
                            <input class="form-control ot-input" name="event_date" list="datalistOptions" id="exampleDataList" type="date" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Event Poster <span class="fillable">*</span></label>
                            <input class="form-control ot-input" name="event_date" list="datalistOptions" id="exampleDataList" type="file" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                            <select class="form-control ot-input" name="event_date" list="datalistOptions" id="exampleDataList" type="date" value="">
                            <option value="">Active</option>
                            <option value="">Inactive</option>
                            </select>
                            </div>
                          <div class="col-md-12 mt-24">
                            <div class="text-right">
                              <a href="" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</a>
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
