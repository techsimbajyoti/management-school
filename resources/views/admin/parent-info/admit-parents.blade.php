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
                        <h4 class="mb-0 title">Add New Parent</h4><a href="{{ route('parents') }}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Name <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="father_name" list="datalistOptions" id="exampleDataList" placeholder="Enter father Name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Mobile <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="father_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter father Mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Profession <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="father_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Father Email<span class="text-info"> (username login Id)</span> <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="email" list="datalistOptions" id="exampleDataList" placeholder="Enter father login id" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Password <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="password" list="datalistOptions" id="exampleDataList" placeholder="Enter father login id" type="password" value="123456789">
                                <p>Default password is 123456789</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="exampleDataList" class="form-label">Confirm Password <span class="fillable">*</span></label> 
                                    <input class="form-control ot-input" name="password" list="datalistOptions" id="exampleDataList" placeholder="Enter father login id" type="password" value="123456789">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Father Nationality</label> 
                                    <input name="father_nationality" placeholder="Father Nationality" class="email form-control ot-input" type="text">
                                    </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Photo</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Father image" readonly id="placeholder"> 
                                    <button class="primary-btn-small-input btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                                    <select class="form-control ot-input" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother Name <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="mother_name" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother Mobile</label> 
                                <input class="form-control ot-input" name="mother_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter mother Mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Mother Profession</label> 
                                <input class="form-control ot-input" name="mother_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter father profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Photo</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Mother image" readonly id="placeholder2"> 
                                    <button class="primary-btn-small-input  btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Name <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="guardian_name" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian name" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Mobile</label> 
                                <input class="form-control ot-input" name="guardian_mobile" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian mobile" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Profession</label>
                                 <input class="form-control ot-input" name="guardian_profession" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian profession" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label class="form-label" for="inputImage">Photo</label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control" type="text" placeholder="Guardian image" readonly id="placeholder2"> 
                                    <button class="primary-btn-small-input  btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Email</label> 
                                <input class="form-control ot-input" name="guardian_email" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian email" type="email" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Address</label> 
                                <input class="form-control ot-input" name="guardian_address" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian address" type="text" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                <label for="exampleDataList" class="form-label">Guardian Relation</label> 
                                <input class="form-control ot-input" name="guardian_relation" list="datalistOptions" id="exampleDataList" placeholder="Enter guardian Relation" type="text" value="">
                                </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-24">
                                <div class="text-right">

                                    <a href="{{route('parents')}}" class="btn ot-btn-primary"><i class="fa fa-save"></i> Save</a>
                                    
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