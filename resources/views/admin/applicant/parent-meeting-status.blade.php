@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-meeting-status'
])
@section('content')
<style>
    .info-button {
        background-color: #efefef;
        margin-left: 3px;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0%;
        text-decoration: none;
        color: #000;
    }
        .info-button:hover {
            background-color: #d4d3d3;
            color: #000;
        }
</style>
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
            <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Meeting Status Of The Applicant</h4>
                    </div>
                    
                    <hr>
                    <div class="card-body">
                        <div class="card-footer">
                            <p><span class="title">Applicant Id:</span> HFFGpokI</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Applicant Name</th>
                                        <th class="purchase">Class</th>
                                        <th class="action">Date</th>
                                        <th class="action">Time Slot</th>
                                        <th class="action">Purpose</th>
                                        <th class="action">Mode</th>
                                        <th class="action">Status</th>
                                        <th class="action">Meeting</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">Demo</td>
                                            <td>Two</td>
                                            <td>jan 24,2024</td>
                                            <td>2:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>Offline</span>
                                                <a href="#" class="info-button applicant_mode">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                                <a class="btn ot-btn-primary applicant_status">
                                                    <i class="fas fa-cog"></i>
                                                </a>
                                          </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">William</td>
                                            <td>Two</td>
                                            <td>jun 05,2024</td>
                                            <td>3:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>Offline</span>
                                                <a href="#" class="info-button applicant_mode">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                                <a class="btn ot-btn-primary applicant_status">
                                                    <i class="fas fa-cog"></i>
                                                </a>
                                          </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="card-footer">
                            <p><span class="title">Applicant Id:</span> PkOjjmO</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Applicant Name</th>
                                        <th class="purchase">Class</th>
                                        <th class="action">Date</th>
                                        <th class="action">Time Slot</th>
                                        <th class="action">Purpose</th>
                                        <th class="action">Mode</th>
                                        <th class="action">Status</th>
                                        <th class="action">Meeting</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td><img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">Demo</td>
                                            <td>Two</td>
                                            <td>jan 24,2024</td>
                                            <td>2:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>Offline</span>
                                                <a href="#" class="info-button applicant_mode">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                                <a class="btn ot-btn-primary applicant_status">
                                                    <i class="fas fa-cog"></i>
                                                </a>
                                          </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td><img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">William</td>
                                            <td>Two</td>
                                            <td>jun 05,2024</td>
                                            <td>3:30 pm</td>
                                            <td>Student Interview</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>Offline</span>
                                                <a href="#" class="info-button applicant_mode">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-info-text">Active</span></td>
                                            <td class="action">
                                                <a class="btn ot-btn-primary applicant_status">
                                                    <i class="fas fa-cog"></i>
                                                </a>
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

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <div class="modal-header">
          <h3>Add Note</h3>
          <span class="close">&times;</span>
      </div>
      <div class="modal-body">
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Status</label>
                  <select name="" id="" class="nice-select sections niceSelect bordered_style wide">
                    <option>Reschedule Meeting Request</option>
                    <option>Accepted By Applicant</option>
                    <option>Cancelled By Applicant</option>
                  </select>
              </div>
          </div>
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Note</label>
                  <textarea class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
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
</div>


<!-- The Modal -->
<div id="myModal1" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h3>Meeting Mode</h3>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Mode</label>
                    <p>Online / Offline</p>
                </div>
                <div class="col-md-6">
                    <label for="">Url / Location</label>
                    <p><a href="">http://example.com</a> / Vijay Nagar</p>
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
   
 var modal1 = document.getElementById("myModal1");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }

      if (event.target == modal1) {
        modal1.style.display = "none";
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

    // Add event listeners to all buttons with class "myBtn"
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.getElementsByClassName("applicant_mode");
        Array.prototype.forEach.call(buttons, function(btn) {
            btn.addEventListener("click", function() {
                modal1.style.display = "block";
            });
        });

            // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close");
        Array.prototype.forEach.call(span, function(sp) {
            sp.addEventListener("click", function() {
                modal1.style.display = "none";
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

