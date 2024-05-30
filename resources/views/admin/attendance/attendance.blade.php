@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'attendance'
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
                <div class="card ot-card mb-24 position-relative z_1">
                    <form action="" enctype="multipart/form-data" method="post">
                      @csrf
                      <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox">
                            <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                              <option value="">Select class</option>
                              <option selected value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                              <option value="4">Four A</option>
                            </select>
                          </div>
                          <div class="single_large_selectBox">
                            <select class="sections section nice-select niceSelect bordered_style wide" name="section">
                              <option value="">Select section</option>
                              <option selected value="1">A</option>
                              <option value="2">B</option>
                            </select>
                          </div>
                          <div class="single_large_selectBox">
                            <input value="2024-02-13" name="date" class="form-control ot-input" type="date">
                          </div><a class="btn btn-lg ot-btn-primary search-student"><i class="fa fa-search"></i> Search</a>
                        </div>
                      </div>
                    </form>
                </div>
                <div class="table-content table-basic student-disabled-list">
                    <div class="card ot-card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Attendance</h4>
                      </div>
                      <hr>
                      <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="input-check-radio mb-3">
                            <div class="form-check d-flex align-items-center">
                              <input type="checkbox" id="holiday" class="form-check-input mt-0 mr-4 read common-key" name="holiday"> 
                              <label class="custom-control-label">Holiday</label>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table class="table table-bordered role-table" id="students_table">
                              <thead class="thead">
                                <tr>
                                  <th class="purchase">Student name</th>
                                  <th class="purchase">Roll NO</th>
                                  <th class="purchase">Admission NO</th>
                                  <th class="purchase">Class (Section)</th>
                                  <th class="purchase">Attendance</th>
                                  <th class="purchase">Note</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id="document-file">
                                  <td>Student 1112</td>
                                  <td>12</td>
                                  <td>20231112</td>
                                  <td>One (A)</td>
                                  <td>
                                    <input type="hidden" name="items[]" value="12"> <input type="hidden" name="students[]" value="12"> <input type="hidden" name="studentsRoll[]" value="12">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="attendance[12]" value="1"> <label for="flexRadioDefault1">Present</label>
                                      </div>
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="attendance[12]" value="2"> <label for="flexRadioDefault2">Late</label>
                                      </div>
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault3" name="attendance[12]" value="3" checked> <label for="flexRadioDefault3">Absent</label>
                                      </div>
                                    </div>
                                  </td>
                                  <td><input class="form-control ot-input" name="note[]" placeholder="Note" value=""></td>
                                </tr>
                                <tr id="document-file">
                                  <td>Student 1113</td>
                                  <td>13</td>
                                  <td>20231113</td>
                                  <td>One (A)</td>
                                  <td>
                                    <input type="hidden" name="items[]" value="13"> <input type="hidden" name="students[]" value="13"> <input type="hidden" name="studentsRoll[]" value="13">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="attendance[13]" value="1"> <label for="flexRadioDefault1">Present</label>
                                      </div>
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="attendance[13]" value="2"> <label for="flexRadioDefault2">Late</label>
                                      </div>
                                      <div class="form-check d-flex align-items-center mt-6">
                                        <input class="form-check-input" type="radio" id="flexRadioDefault3" name="attendance[13]" value="3" checked> <label for="flexRadioDefault3">Absent</label>
                                      </div>
                                    </div>
                                  </td>
                                  <td><input class="form-control ot-input" name="note[]" placeholder="Note" value=""></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                            <a class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-save"></i> Submit</a>
                          </div>
                        </form>
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
            $('.student-disabled-list').hide();

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
        });
    </script>
@endpush