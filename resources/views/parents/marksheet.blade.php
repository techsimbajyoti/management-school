@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'marksheet'
])
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-12 p-0 search-form">
                    <form action="" method="post" id="marksheed" enctype="multipart/form-data" name="marksheet">
                      <input type="hidden" name="_token" value="T8ADYQ4K6q9LyaUSsnKqFQ0S4GqWjDxZrDkKbHTb">
                      <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                          <h3 class="mb-0">Filtering</h3>
                          <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                            <div class="single_large_selectBox">
                              <select class="nice-select niceSelect bordered_style wide student" name="student">
                                <option value="">
                                  Select student
                                </option>
                                <option value="2">
                                  Student 112
                                </option>
                                <option value="17">
                                  Student 123
                                </option>
                                <option selected value="29">
                                  Student 211
                                </option>
                                <option value="54">
                                  Student 2212
                                </option>
                                <option value="65">
                                  Student 319
                                </option>
                                <option value="79">
                                  Student 329
                                </option>
                              </select>
                            </div>
                            <div class="single_large_selectBox">
                              <select class="nice-select niceSelect bordered_style wide exam_types" name="exam_type">
                                <option value="">
                                  Select Exam Type *
                                </option>
                              </select>
                            </div><button class="btn btn-lg ot-btn-primary" type="submit"> <i class="fa fa-search"></i> Search</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="col-lg-12 marksheet-form">
                    <div class="card ot-card mb-24" id="printableArea">
                        <div class="download_print_btns">
                            <button class="btn btn-lg ot-btn-primary" onclick="printDiv('printableArea')"><i class="fa-solid fa-print"></i> Print Now</button> <a class="btn btn-lg ot-btn-primary" href=""><i class="fas fa-file-pdf"></i> PDF Download</a>
                        </div>
                      <div class="routine_wrapper">
                        <div class="routine_wrapper_body">
                          <div class="student_info_wrapper">
                            <div class="student_info_single">
                              <span>Student name :</span>
                              <h5>Student 211</h5>
                            </div>
                            <div class="student_info_single">
                              <span>Guardian Name :</span>
                              <h5>Guardian1</h5>
                            </div>
                            <div class="student_info_single">
                              <span>Date of Birth :</span>
                              <h5>02 Oct 2023</h5>
                            </div>
                            <div class="student_info_single">
                              <span>Guardian Phone :</span>
                              <h5>12365851</h5>
                            </div>
                            <div class="student_info_single">
                              <span>Class (Section) :</span>
                              <h5>Two (A)</h5>
                            </div>
                            <div class="student_info_single">
                              <span>Guardian Email :</span>
                              <h5><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3e594b5f4c5a575f500f7e59535f5752105d5153">[email&nbsp;protected]</a></h5>
                            </div>
                            <div class="student_info_single">
                              <span>Result :</span>
                              <h5>Failed</h5>
                            </div>
                            <div class="student_info_single">
                              <span>GPA :</span>
                              <h5>0.00</h5>
                            </div>
                          </div>
                          <div class="markseet_title">
                            <h5>Grade Sheet</h5>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-30">
                              <thead>
                                <tr>
                                  <th class="marked_bg">Subject Code</th>
                                  <th class="marked_bg">Subject Name</th>
                                  <th class="marked_bg">Grade</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <tr>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>102</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>English</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>A-</h5>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>103</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>Math</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>B</h5>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>104</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>Physics</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>A-</h5>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>105</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>Chemistry</h5>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="classBox_wiz">
                                      <h5>A+</h5>
                                    </div>
                                  </td>
                                </tr>
                                                                                                                  
                              </tbody>
                            </table>
                          </div>
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
     $(document).ready(function(){
         $('.marksheet-form').hide();

        $('#marksheed').submit(function(e){
            e.preventDefault();
            $('.search-form').show();
            $('.marksheet-form').show();
        })


     });

  </script>

@endpush