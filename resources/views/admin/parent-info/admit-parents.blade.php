@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admit-parent'
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
                        <h4 class="mb-0 title">Admit Parents</h4><a href="{{ route('parents') }}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="https://school.onesttech.com/parent/store" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                        <input type="hidden" name="_token" value="204iWXt9onsVIUAVM5lWdIZWnSqEjqDec1SiB2It">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Name</label> <input class="form-control ot-input" name="father_name" list="datalistOptions" id="exampleDataList" placeholder="Enter father Name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Mobile</label> <input class="form-control ot-input" name="father_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter father Mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father profession</label> <input class="form-control ot-input" name="father_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Father image (95 x 95 px)</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Father image" readonly id="placeholder"> 
                                    <button class="primary-btn-small-input btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother Name</label> <input class="form-control ot-input" name="mother_name" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother Mobile</label> <input class="form-control ot-input" name="mother_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother profession</label> <input class="form-control ot-input" name="mother_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Mother image (95 x 95 px)</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Mother image" readonly id="placeholder2"> 
                                    <button class="primary-btn-small-input  btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian name <span class="fillable">*</span></label> <input class="form-control ot-input" name="guardian_name" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian mobile <span class="fillable">*</span></label> <input class="form-control ot-input" name="guardian_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian profession</label> <input class="form-control ot-input" name="guardian_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Guardian Image (95 x 95 px)</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Guardian image" readonly id="placeholder2"> 
                                    <button class="primary-btn-small-input  btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian email</label> <input class="form-control ot-input" name="guardian_email" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian email" type="email" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian address</label> <input class="form-control ot-input" name="guardian_address" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian address" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Relation</label> <input class="form-control ot-input" name="guardian_relation" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian Relation" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label">Father Nationality</label> <input name="father_nationality" placeholder="Father Nationality" class="email form-control ot-input" type="text">
                                </div>
                                <div class="col-md-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                                    <select class="form-control ot-input" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-24">
                                <div class="text-right">
                                    <button class="btn ot-btn-primary">submit</button>
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