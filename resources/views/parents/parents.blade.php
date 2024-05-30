@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
           <div class="col-md-12"> 
            <form action="" method="" id="marksheet" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="VEysqVBCR0KYZWVKtIbfyAXh5yl4uSwDtDxCKKTo"> <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                <h3 class="mb-0">Filtering</h3>
                <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                
                <div class="single_large_selectBox">
                <select class="nice-select niceSelect bordered_style wide studen" name="student">
                <option value>Select student</option>
                <option selected value="2">Student 112
                <option value="17">Student 123
                <option value="29">Student 211
                <option value="54">Student 2212
                <option value="65">Student 319
                <option value="79">Student 329
                </select>
                </div>
                
                <button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i>
                Search
                </button>
                </div>
                </div>
                </div>
                </form>
        </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-users" style='font-size:40px;color:#76a0e3'></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Class</p>
                                    <p class="card-title">5
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        
                        <div class="stats">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-book" style='font-size:40px;color:#76e39e'></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Subject</p>
                                    <p class="card-title">13
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    
                        <div class="stats">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fas fa-chalkboard-teacher" style='font-size:40px;color:#e38a76'></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Teacher</p>
                                    <p class="card-title">8
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        
                        <div class="stats">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fas fa-calendar-alt" style="color:#494F55;"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Event</p>
                                    <p class="card-title">0
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        
                        <div class="stats">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap_10 card_header_border">
                  <div class="card-title">
                    <h6>Student info</h6>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="mt-2" width="100" height="100" src="{{asset('paper/img/dummy-image.png')}}" alt="Student">
                      <div class="d-flex justify-content-between align-content-center mb-3 mt-2">
                        <div class="align-self-center">
                          <h6 class="title">Student name</h6>
                          <p class="paragraph">Student 123</p><input type="hidden" name="student_id" id="student_id" value="17">
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="align-self-center">
                          <h6 class="title">Admission NO</h6>
                          <p class="paragraph">2023123</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="align-self-center">
                          <h6 class="title">Class (Section)</h6>
                          <p class="paragraph">One (B)</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="align-self-center">
                          <h6 class="title">Roll NO</h6>
                          <p class="paragraph">3</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="align-self-center">
                          <h6 class="title">Guardian name</h6>
                          <p class="paragraph">Guardian1</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="align-self-center">
                          <h6 class="title">Mobile number</h6>
                          <p class="paragraph">0147852123</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">Upcoming Events</h5>
                        
                    </div>
                    <hr>
                    <div class="card-body">
                        <canvas id="speedChart" width="400" height="300"></canvas>
                    </div>
                    
                </div>
            </div>
          </div>
            
           
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush