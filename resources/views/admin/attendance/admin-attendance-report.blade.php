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
                                <option value="1">
                                  Details view
                                </option>
                                <option value="0">Percentage View</option>
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
                          </div>
                          <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox d-flex gap-3">
                          <label for="">From</label> <input value="" name="date" class="form-control ot-input" type="date">
                          </div>
                          <div class="single_large_selectBox d-flex gap-3">
                            <label for="">To</label> <input value="" name="date" class="form-control ot-input" type="date">
                          </div>
                          <a class="btn btn-lg ot-btn-primary search-student"><i class="fa fa-search"></i> Search</a>
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
                          <div class="table-responsive">
                            <table class="table table-bordered role-table" id="students_table">
                              <thead class="thead">
                                <tr>
                                  <th class="purchase">Student name</th>
                                  <th class="purchase">Roll NO</th>
                                  <th class="purchase">Class (Section)</th>
                                  <th class="purchase">Subject</th>
                                  <th class="purchase">Total Classes</th>
                                  <th class="purchase">Attempt Classes</th>
                                  <th class="purchase">Note</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id="document-file">
                                  <td>Student 1112</td>
                                  <td>12</td>
                                  <td>One (A)</td>
                                  <td>English</td>
                                  <td>50</td>
                                  <td>48</td>
                                  <td><input class="form-control ot-input" name="note[]" readonly placeholder="Note" value=""></td>
                                </tr>
                                <tr id="document-file">
                                  <td>Student 1113</td>
                                  <td>13</td>
                                  <td>One (A)</td>
                                  <td>Hindi</td>
                                  <td>50</td>
                                  <td>45</td>
                                  <td><input class="form-control ot-input" readonly name="note[]" placeholder="Note" value=""></td>
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
                      <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                          <table class="table table-bordered role-table" id="students_table">
                            <thead class="thead">
                              <tr>
                                <th class="purchase">Student name</th> 
                                <th class="purchase">Class (Section)</th>
                                <th class="purchase">Total Classes</th>
                                <th class="purchase">Classes Done</th>
                                <th class="purchase">Students classes done?</th>
                                <th class="purchase">Percentage</th>
                                <th class="purchase">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id="document-file">
                                <td>Student 1112</td>
                                <td>One (A)</td>
                                <td>120</td>
                                <td>100</td>
                                <td>90</td>
                                <td>90%</td>
                                <td class="action">
                                  <div class="dropdown dropdown-action">
                                      <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                              <a class="dropdown-item student-details"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              </tr>
                              <tr id="document-file">
                                <td>Student 1113</td>
                                <td>One (A)</td>
                                <td>120</td>
                                <td>100</td>
                                <td>90</td>
                                <td>90%</td>
                                <td class="action">
                                  <div class="dropdown dropdown-action">
                                      <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                              <a class="dropdown-item student-details"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                          </div>
                                      </div>
                                  </div>
                              </td>
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

                  {{-- <div class="table-content table-basic short-view">
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
                              <table class="table" id="myTable">
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
                  </div> --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.detail-view').hide();
            $('.short-view').hide();    

          var table = $('#myTable').DataTable({
              fixedHeader: true
          });

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

            $('.student-details').click(function(){
              $('.detail-view').show();
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