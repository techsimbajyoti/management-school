@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-meeting-status'
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
        <div class="col-12 search-form">
            <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
              @csrf
              <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                  <h3 class="mb-0">Filtering</h3>
                  <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    
                    <div class="single_large_selectBox">
                      <select class="class nice-select niceSelect bordered_style wide" name="view">
                        <option value="0">
                          Meeting Status  
                        </option>
                        <option value="0">
                          Cancelled
                        </option>
                        <option value="1">
                          Postponed
                        </option>
                        <option value="2">
                          Done
                        </option>
                        <option value="3">
                         Upcoming
                          </option>
                      </select>
                    </div>
                    <button class="btn btn-lg ot-btn-primary" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
  

        <div class="col-md-12">
          
        
            <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Meeting List</h4>
                    </div>
                    
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Applicant NO</th>
                                        <th class="purchase">Student name</th>
                                        <th class="purchase">Class (Section)</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Date</th>
                                        <th class="action">Time Slot</th>
                                        <th class="action">Type</th>
                                        <th class="action">Mode</th>
                                        <th class="action">Notes</th>
                                        <th class="action">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>2023114</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px"></td>
                                            <td>Two (A)</td>
                                            <td>Parent5</td>
                                           
                                            <td>658932654</td>
                                           
                                            <td>jan 24,2024</td>
                                            <td>2:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>Offline</td>
                                            <td><input type="text" name="note" placeholder="Note" class="form-control ot-input"></td>
                                            <td>
                                                <input type="hidden" name="items[]" value="1"> <input type="hidden" name="students[]" value="1"> <input type="hidden" name="studentsRoll[]" value="1">
                                                <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                                  <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="attendance[1]" value="1"> 
                                                    <label for="flexRadioDefault1" class="ml-2">Accepted</label>
                                                  </div>
                                                  <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" name="attendance[1]" value="2">
                                                     <label for="flexRadioDefault2" class="ml-2">Rejected</label>
                                                  </div>
                                                </div>
                                              </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td>2023111</td>
                                           
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">William</td>
                                            <td>Two (A)</td>
                                            <td>Parent8</td>
                                           
                                            <td>0147852111</td>
                                            <td>jun 05,2024</td>
                                            <td>3:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>Offline</td>
                                            <td><input type="text" name="note" placeholder="Note" class="form-control ot-input"></td>
                                            <td>
                                                <input type="hidden" name="items[]" value="1"> <input type="hidden" name="students[]" value="1"> <input type="hidden" name="studentsRoll[]" value="1">
                                                <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                                  <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="attendance[1]" value="1"> 
                                                    <label for="flexRadioDefault1" class="ml-2">Accepted</label>
                                                  </div>
                                                  <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" name="attendance[1]" value="2"> 
                                                    <label for="flexRadioDefault2" class="ml-2">Rejected</label>
                                                  </div>
                                                </div>
                                            </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn ot-btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        
        
        </div>    
    </div>
</div>
@endsection
