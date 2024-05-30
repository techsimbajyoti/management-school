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
                        <h4 class="mb-0 title">Admit Teachers</h4><a href="{{ route('teachers') }}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                        @csrf
                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Staff ID <span class="fillable">*</span></label> <input class="form-control ot-input" name="staff_id" value="" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter staff ID">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Roles <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-role" name="role" id="validationServer04" aria-describedby="validationServer04Feedback">
                            <option value="">Select role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Staff</option>
                            <option value="4">Accounting</option>
                            <option value="5">Instructor</option>
                            <option value="6">Student</option>
                            <option value="7">Guardian</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Designations <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-designation" name="designation" id="validationServer04" aria-describedby="validationServer04Feedback">
                            <option value="">Select designation</option>
                            <option value="1">HRM</option>
                            <option value="2">Admin</option>
                            <option value="3">Accounts</option>
                            <option value="4">Development</option>
                            <option value="5">Software</option>
                            <option value="6">Instructor</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Departments <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-department" name="department" id="validationServer04" aria-describedby="validationServer04Feedback">
                            <option value="">Select department</option>
                            <option value="1">History</option>
                            <option value="2">Science</option>
                            <option value="3">Arch</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">First Name <span class="fillable">*</span></label> <input class="form-control ot-input" name="first_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter first name">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Last Name</label> <input class="form-control ot-input" name="last_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter last name">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Father name</label> <input class="form-control ot-input" name="father_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter father name">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Mother name</label> <input class="form-control ot-input" name="mother_name" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter mother name">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email <span class="fillable">*</span></label> <input type="email" name="email" value="" class="form-control ot-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Genders <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide change-gender" name="gender" id="validationServer04" aria-describedby="validationServer04Feedback">
                            <option value="">
                                Select gender
                            </option>
                            <option value="1">
                                Male
                            </option>
                            <option value="2">
                                Female
                            </option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Date of Birth <span class="fillable">*</span></label> <input class="form-control ot-input" name="dob" value="" list="datalistOptions" id="exampleDataList" type="date" placeholder="Enter date of Birth">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Joining date</label> <input class="form-control ot-input" name="joining_date" value="" list="datalistOptions" id="exampleDataList" type="date" placeholder="Enter joining date">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Phone <span class="fillable">*</span></label> <input class="form-control ot-input" name="phone" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter phone">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Emergency contact</label> <input class="form-control ot-input" name="emergency_contact" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter emergency contact">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Marital status</label> <select class="nice-select niceSelect bordered_style wide" name="marital_status" id="validationServer04" aria-describedby="validationServer04Feedback">
                            <option selected value="0">
                                Unmarried
                            </option>
                            <option value="1">
                                Married
                            </option>
                            </select>
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
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label class="form-label" for="inputImage">Image (95 x 95 px)</label>
                            <div class="ot_fileUploader left-side">
                            <input class="form-control" type="text" placeholder="Image" readonly id="placeholder"> 
                            <button class="btn ot-btn-primary" type="button">Browse</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Current address</label> <input class="form-control ot-input" name="current_address" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter current address">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Permanenet Address</label> <input class="form-control ot-input" name="permanent_address" value="" list="datalistOptions" id="exampleDataList" placeholder="Enter permanent address">
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Basic salary <span class="fillable">*</span></label> <input class="form-control ot-input" name="basic_salary" value="" list="datalistOptions" id="exampleDataList" type="number" placeholder="Enter basic salary">
                        </div>
                        </div>
                        <div class="col-md-12 mt-24">
                            <div class="text-right">
                                <a href="{{route('teachers')}}" class="btn ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                </span>Submit</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection