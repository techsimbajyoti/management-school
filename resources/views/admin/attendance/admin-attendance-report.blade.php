@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin-attendance-report'
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
                              <select class="class nice-select niceSelect bordered_style wide" name="view">
                                <option value="0">
                                  Short view
                                </option>
                                <option value="1">
                                  Details view
                                </option>
                              </select>
                            </div>
                            <div class="single_large_selectBox">
                              <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                                <option value="">
                                  Select class *
                                </option>
                                <option value="1">
                                  One
                                </option>
                                <option value="2">
                                  Two
                                </option>
                                <option value="3">
                                  Three
                                </option>
                                <option value="4">
                                  Four A
                                </option>
                              </select>
                            </div>
                            <div class="single_large_selectBox">
                              <select class="sections section nice-select niceSelect bordered_style wide" name="section">
                                <option value="">
                                  Select section *
                                </option>
                              </select>
                            </div>
                            <div class="single_large_selectBox">
                              <input value="" name="month" class="form-control ot-input" type="month" placeholder="Search month">
                            </div>
                            <div class="single_large_selectBox">
                              <input value="" name="date" class="form-control ot-input" type="date">
                            </div>
                            <div class="single_large_selectBox">
                              <input value="" name="roll" class="form-control ot-input" type="number" placeholder="Roll number">
                            </div><a class="btn btn-lg ot-btn-primary search-student"><i class="fa fa-search"></i> Search</a>
                          </div>
                        </div>
                      </form>
                </div>
                <div class="table-content table-basic detail-view">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <button class="btn btn-lg ot-btn-primary">Print Now <i class="fa fa-print"></i></button>
                        <button class="btn btn-lg ot-btn-primary">PDF Download <i class="fa fa-download"></i></button>
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
                                  <th class="purchase">Date</th>
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
                                  <td><span class="badge-basic-success-text">Present</span></td>
                                  <td>00/00/0000</td>
                                  <td><input class="form-control ot-input" name="note[]" placeholder="Note" value=""></td>
                                </tr>
                                <tr id="document-file">
                                  <td>Student 1113</td>
                                  <td>13</td>
                                  <td>20231113</td>
                                  <td>One (A)</td>
                                  <td><span class="badge-basic-success-text">Present</span></td>
                                  <td>00/00/0000</td>
                                  <td><input class="form-control ot-input" name="note[]" placeholder="Note" value=""></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                            <a class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Save</a>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>

                <div class="table-content table-basic short-view">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <button class="btn btn-lg ot-btn-primary">Print Now <i class="fa fa-print"></i></button>
                        <button class="btn btn-lg ot-btn-primary">PDF Download <i class="fa fa-download"></i></button>
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="text-right">
                            <strong>
                            <span class="text-success">Present = P</span>
                            <span class="text-warning">Late = L</span>
                            <span class="text-danger">Absent = A</span>
                            <span>Holiday = H</span>
                            </strong>
                            </div>
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th class="purchase">Name</th>
                                  <th class="purchase">Roll NO</th>
                                  <th class="purchase">Admission NO</th>
                                  <th>1</th>
                                  <th>2</th>
                                  <th>3</th>
                                  <th>4</th>
                                  <th>5</th>
                                  <th>6</th>
                                  <th>7</th>
                                  <th>8</th>
                                  <th>9</th>
                                  <th>10</th>
                                  <th>11</th>
                                  <th>12</th>
                                  <th>13</th>
                                  <th>14</th>
                                  <th>15</th>
                                  <th>16</th>
                                  <th>17</th>
                                  <th>18</th>
                                  <th>19</th>
                                  <th>20</th>
                                  <th>21</th>
                                  <th>22</th>
                                  <th>23</th>
                                  <th>24</th>
                                  <th>25</th>
                                  <th>26</th>
                                  <th>27</th>
                                  <th>28</th>
                                  <th>29</th>
                                  <th>30</th>
                                  <th>31</th>
                                  <th class="purchase text-success">P</th>
                                  <th class="purchase text-warning">L</th>
                                  <th class="purchase text-danger">A</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Student 111</td>
                                  <td></td>
                                  <td>2023111</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td><span class="text-success">P</span></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td><span class="text-success">1</span></td>
                                  <td><span class="text-warning">0</span></td>
                                  <td><span class="text-danger">0</span></td>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.detail-view').hide();
            $('.short-view').hide();    

            $('.search-student').click(function(){
                var niceSelect = $('.niceSelect').val();
                if(niceSelect == 1){
                    $('.detail-view').show();
                }else{
                    $('.detail-view').hide();
                }

                if(niceSelect == 0){
                    $('.short-view').show();
                }else{
                    $('.short-view').hide();
                }
                
            })

            var sections = {
                1: ["A", "B", "C"],
                2: ["D", "E"],
                3: ["F", "G", "H", "I"]
            };

            $('#getSections').change(function() {
                var classId = $(this).val();
                var $sectionsDropdown = $('.sections');
                $sectionsDropdown.empty();
                $sectionsDropdown.append('<option value="">Select section</option>');

                if (sections[classId]) {
                    sections[classId].forEach(function(section) {
                        $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
                    });
                }
            });
        });
    </script>
@endpush