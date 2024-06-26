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
                          Active
                        </option>
                        <option value="0">
                          Rescheduled Meeting
                        </option>
                        <option value="0">
                          Accepted By Applicant
                        </option>
                        <option value="1">
                          Meeting Done
                        </option>
                        <option value="3">
                         Cancelled By Applicant
                          </option>
                      </select>
                    </div>
                    <button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
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
                                        <th class="purchase">Applicant name</th>
                                        <th class="purchase">Class</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Date</th>
                                        <th class="action">Time Slot</th>
                                        <th class="action">Type</th>
                                        <th class="action">Mode</th>
                                        <th class="action">Status</th>
                                        <th class="action">Manage Status</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>2023114</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px"></td>
                                            <td>Two</td>
                                            <td>Parent5</td>
                                           
                                            <td>658932654</td>
                                           
                                            <td>jan 24,2024</td>
                                            <td>2:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>Offline</td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                              <div class="dropdown">
                                                  <button class="btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                          <ul style="list-style: none">
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Active</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Rescheduled Meeting</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Accepted By Applicant</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Meeting Done</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Cancelled By Applicant</label></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td>2023111</td>
                                           
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">William</td>
                                            <td>Two</td>
                                            <td>Parent8</td>
                                           
                                            <td>0147852111</td>
                                            <td>jun 05,2024</td>
                                            <td>3:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>Offline</td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                              <div class="dropdown">
                                                  <button class="btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                          <ul style="list-style: none">
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Active</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Rescheduled Meeting</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Accepted By Applicant</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Meeting Done</label></li>
                                                              <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Cancelled By Applicant</label></li>
                                                          </ul>
                                                      </div>
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

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <div class="modal-header">
          <h3>Add Note</h3>
          <span class="close">&times;</span>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-4">
                  <label for="">Status</label>
                  <input type="text" class="nice-select sections niceSelect bordered_style wide" value="Active" id="new_status">
              </div>
              <div class="col-md-4">
                  <label for="">Note</label>
                  <textarea class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
              </div>
              <div class="col-md-4 mt-3">
                  <button type="submit" class="btn btn-lg w-100 ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <h3></h3>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    // Get the modal
 var modal = document.getElementById("myModal");
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    
    // Add event listeners to all buttons with class "myBtn"
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.getElementsByClassName("applicant_status");
        Array.prototype.forEach.call(buttons, function(btn) {
            btn.addEventListener("click", function() {
                modal.style.display = "block";
            });
        });

            // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close");
        Array.prototype.forEach.call(span, function(sp) {
            sp.addEventListener("click", function() {
                modal.style.display = "none";
            });
        });
    });

    $(document).ready(function() {
        $('.inactiveStudentList').hide();
        $('.allStudentList').hide();

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

        $('#marksheed').on('submit', function(e) {
            e.preventDefault();
            var status = $('select[name="status"]').val();
            

            if (status == "1") {
                $('.activeStudentList').show();
                $('.inactiveStudentList').hide();
                $('.allStudentList').hide();
            } else if (status == "2") {
                $('.activeStudentList').hide();
                $('.inactiveStudentList').show();
                $('.allStudentList').hide();
            } else {
                $('.activeStudentList').hide();
                $('.inactiveStudentList').hide();
                $('.allStudentList').show();
            }
        });
    });
</script>
@endpush

