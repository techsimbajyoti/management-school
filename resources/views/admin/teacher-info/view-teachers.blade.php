@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'view-parent'
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
                        <h4 class="mb-0 title">View Staff</h4><a href="{{ route('teachers') }}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                            @csrf
                            <div class="row mb-3">
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Staff ID <span class="fillable">*</span></label> 
                                <input class="nice-select niceSelect bordered_style wide" name="staff_id" value="" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter staff ID">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Roles <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-role" name="role" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="">Select role</option>
                            
                                <option value="2">Admin</option>
                                <option value="3">Teacher</option>
                                <option value="4">Accountant</option>
                              
                                </select>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Departments <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-department" name="department" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="">Select department</option>
                                <option value="">Science</option>
                                <option value="">Maths</option>
                                <option value="">Commerce</option>
                                <option value="">Arts/HUmanities</option>
                                <option value="">Information Practices</option>
                                <option value="">Accounts and Finance</option>
                                <option value="">Administration</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">First Name <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide" name="first_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter first name">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Last Name <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide" name="last_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter last name">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Father name</label> <input class="nice-select niceSelect bordered_style wide" name="father_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter father name">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Mother name</label> <input class="nice-select niceSelect bordered_style wide" name="mother_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter mother name">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email <span class="fillable">*</span><span class="text-info" style="font-size:0.85rem;"> (Username)</span></label> <input type="email" name="email" value="" class="nice-select niceSelect bordered_style wide" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Gender <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-gender" name="gender" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="">
                                    Select gender
                                </option>
                                <option value="1">
                                    Male
                                </option>
                                <option value="2">
                                    Female
                                </option>
                                <option value="2">
                                    Other
                                </option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Date of Birth <span class="fillable">*</span></label> 
                                <input class="form-control ot-input" name="dob" value="" list="datalistOptions" id="exampleDataList" type="date" placeholder="Enter date of Birth">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Joining date</label> 
                                <input class="form-control ot-input" name="joining_date" value="" list="datalistOptions" id="exampleDataList" type="date" placeholder="Enter joining date">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Contact <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide" name="phone" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter phone">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Emergency Contact</label> <input class="nice-select niceSelect bordered_style wide" name="emergency_contact" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter emergency contact">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Marital status</label> <select class="nice-select niceSelect bordered_style wide" name="marital_status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option selected value="0">
                                    Unmarried
                                </option>
                                <option value="1">
                                    Married
                                </option>
                                <option value="2">
                                    Widow
                                </option>
                                </select>
                            </div>
                            
                            
                            
                           
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label class="form-label" for="inputImage">Photo (95 x 95 px)</label>
                                <div class="ot_fileUploader left-side">
                                <input class="form-control" type="text" placeholder="Photo" readonly id="placeholder"> 
                                <button class="btn ot-btn-primary" type="button">Browse</button>
                                </div>
                                <p class="text-info">Accepted Image : jpg,jpeg,png,svg.Max file size 2Mb</p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label">Salary <span class="fillable">*</span></label> <input class="nice-select niceSelect bordered_style wide" name="basic_salary" value="" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter basic salary">
                            </div>
                            <div class="col-lg-6  mb-3">
                                <label for="exampleDataList" class="form-label">Current address</label>
                                 <textarea class="nice-select niceSelect bordered_style wide" name="current_address" value="" list="datalistOptions" id="exampleDataList" placeholder="   Enter current address"></textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="exampleDataList" class="form-label">Permanent Address</label>
                                <textarea class="nice-select niceSelect bordered_style wide" name="permanent_address" id="exampleDataList" placeholder="   Enter Permanent address"></textarea>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="1">
                                    Active
                                </option>
                                <option selected value="0">
                                    Inactive
                                </option>
                                </select>
                            </div> 
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection