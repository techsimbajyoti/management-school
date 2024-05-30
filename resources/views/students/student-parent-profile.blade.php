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
        </div>
      <div class="row">
        <div class="col-md-12">
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
        </div>
      </div>
    </div>
@endsection

<style>
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
 
</style>
