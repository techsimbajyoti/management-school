@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'settings'
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
                <div class="card-header">
                  <h4>Examination Settings</h4>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-12 col-md-12 mb-3">
                            <label for="inputname" class="form-label">Average Pass marks(Percentage) <span class="fillable">*</span></label> <input type="number" name="values[]" class="form-control ot-input" value="75" placeholder="Enter Average Pass marks(Percentage)"> <input type="hidden" name="fields[]" value="average_pass_marks">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <div class="text-right">
                          <a class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Update</a>
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
