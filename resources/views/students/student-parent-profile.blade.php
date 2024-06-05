@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-profile'
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
     
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Steve Smith</h5>
                    <p class="text-muted mb-1">Contact : 1478523690 </p>
                    
                </div>
            </div>
        
        </div>
            <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">Parent Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Steve Smith</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Sohpia Steve</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">25147820</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">123654987</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Doctor</p>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Guardian Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">25635256</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Profession</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area,San Francisco
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Relation</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Uncle</p>
                        </div>
                    </div>
                    <hr>
                   
                    
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

{{-- <style>
  .routine_wrapper {
    padding: 0px; /* Increase padding to enlarge the wrapper */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 8px; /* Rounded corners */
  }

 .bold-large {
    font-weight: bold;
    font-size: 1.2em; /* Increase the font size as needed */
  }

  .student_info_single {
    margin-bottom: 15px;
  }

  .student_info_single span {
    display: inline-block;
    width: 200px; /* Adjust width as needed */
  }

  .student_info_single h5 {
    display: inline-block;
  }
 
</style> --}}

 {{-- <div class="row">
            <div class="col-md-12">
                <form action="" method="" id="marksheet" enctype="multipart/form-data" name="marksheet">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                            <img class="mt-2" width="100" height="100" src="{{ asset('paper/img/dummy-image.png') }}" alt="Student" style="margin-right:10px;">
                            <h3 class="mb-0">Father Name</h3>
                            <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
           {{-- <div class="col-md-12">
            <div class="card ot-card mb-24">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 title">View Parents Profile</h4>
                    <a href="{{ route('student-dashboard') }}" class="btn ot-btn-primary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="routine_wrapper">
                                <div class="routine_wrapper_body" style="padding: 0px;">
                                    <div class="student_info_wrapper">
                                        <div class="student_info_single">
                                            <span class="bold-large">Father Name :</span>
                                            <h5 class="bold-large">John Steve</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Mother Name :</span>
                                            <h5 class="bold-large">Sophia Steve</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Father Mobile :</span>
                                            <h5 class="bold-large">6589369632</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Mother Mobile :</span>
                                            <h5 class="bold-large">1236585123</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Father Profession :</span>
                                            <h5 class="bold-large">Professor</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Mother Profession :</span>
                                            <h5 class="bold-large">Doctor</h5>
                                        </div>
                                        <div class="student_info_single">
                                          <span class="bold-large">Father Nationality:</span>
                                          <h5 class="bold-large"></h5>
                                      </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="mb-0 title">View Guardian Profile</h4>
              </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="routine_wrapper">
                                <div class="routine_wrapper_body" style="padding: 0px;">
                                    <div class="student_info_wrapper">
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Name :</span>
                                            <h5 class="bold-large">William Steve</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Mobile :</span>
                                            <h5 class="bold-large">6589369632</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Profession :</span>
                                            <h5 class="bold-large">Professor</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Email :</span>
                                            <h5 class="bold-large">example@example.com</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Address :</span>
                                            <h5 class="bold-large">1234 Street, City, Country</h5>
                                        </div>
                                        <div class="student_info_single">
                                            <span class="bold-large">Guardian Relation :</span>
                                            <h5 class="bold-large">Uncle</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
{{-- <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Documents Uploaded</h4>
                </div>
                <hr>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Transfer Certificate</p><a href="#" class="btn ot-btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Attested Copy of Adhaar Card</p><a href="#" class="btn ot-btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Previous Year Marksheet</p><a href="#" class="btn ot-btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div> --}}