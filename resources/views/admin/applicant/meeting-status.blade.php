@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'meeting-status'
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

    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: white;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: white;
  color: black;
}

.modal-body {
    padding: 2px 16px;
    background-color: white;
}

.modal-footer {
  padding: 2px 16px;
  background-color: white;
  color: white;
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
        <div class="col-12 search-form">
            <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
              @csrf
              <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                  <h3 class="mb-0">Filtering</h3>
                  <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox">
                      <select class="class nice-select niceSelect bordered_style wide" name="view">
                        <option value="0">Select One Of These</option>
                        <option value="0">Applicant1</option>
                        <option value="1">Applicant2</option>
                        <option value="2">Applicant3</option>
                        <option value="2">Applicant4</option>
                        <option value="3">Applicant5</option>
                        <option value="3">Applicant6</option>
                        <option value="3">Applicant7</option>
                      </select>
                    </div>
                  

                    <div class="single_large_selectBox">
                      <select class="class nice-select niceSelect bordered_style wide" name="view">
                        <option value="0">Meeting Status</option>
                        <option value="0">Active</option>
                        <option value="1">Reschedule Meeting Request</option>
                        <option value="2">Accept</option>
                        <option value="2">Meeting Schedule</option>
                        <option value="3">Cancelled By Admin</option>
                        <option value="3">Reject By Admin</option>
                        <option value="3">Upcoming Meeting</option>
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
                                        <th class="purchase">Applicant name</th>
                                        <th class="purchase">Class</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Date</th>
                                        <th class="action">Time Slot</th>
                                        <th class="action">Purpose</th>
                                        <th class="action">Mode</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>2023114</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
                                            <td>Two</td>
                                            <td>Parent5</td>
                                           
                                            <td>658932654</td>
                                           
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
                                            <td><p>Active</p></td>
                                            {{-- <td><div style="background: rgb(224, 224, 224);width:50%;" class="text-center"><a class="myBtn"><i class="fa fa-eye"></i></a></div></td> --}}
                                            <td class="action">
                                              <a class="btn ot-btn-primary admin_side_meeting">
                                                  <i class="fas fa-cog"></i>
                                              </a>
                                        </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td>2023111</td>
                                           
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                              <a href="{{ route('admin-student-profile')}}" target="_blank">William</a></td>
                                            <td>Two</td>
                                            <td>Parent8</td>
                                           
                                            <td>0147852111</td>
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
                                            <td><p>Active</p></td>
                                             {{-- <td><div style="background: rgb(224, 224, 224);width:50%;" class="text-center"><a class="myBtn"><i class="fa fa-eye"></i></a></div></td> --}}
                                             <td class="action">
                                              <a class="btn ot-btn-primary admin_side_meeting">
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
        <h2>Note Details</h2>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula arcu, ultricies vitae porttitor ut, eleifend vel nisl. Nulla dui metus, ornare sit amet dolor aliquam, eleifend gravida dolor. </p>
            </div>
            <div class="col-md-6">
                <p>00/00/0000</p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
       <h3></h3>
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



<!-- The Modal -->
<div id="myModal2" class="modal">
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
                        <option value="0">Meeting Status</option>
                        <option value="0">Active</option>
                        <option value="1">Reschedule Meeting Request</option>
                        <option value="2">Accept</option>
                        <option value="2">Meeting Schedule</option>
                        <option value="3">Cancelled By Admin</option>
                        <option value="3">Reject By Admin</option>
                        <option value="3">Upcoming Meeting</option>
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
@endsection

@push('scripts')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    var modal1 = document.getElementById("myModal1");

    var modal2 = document.getElementById("myModal2");
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }

      if (event.target == modal1) {
        modal1.style.display = "none";
      }

      if (event.target == modal2) {
        modal2.style.display = "none";
      }
    }
    
    // Add event listeners to all buttons with class "myBtn"
    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.getElementsByClassName("myBtn");
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

    document.addEventListener("DOMContentLoaded", function() {
        var buttons = document.getElementsByClassName("admin_side_meeting");
        Array.prototype.forEach.call(buttons, function(btn) {
            btn.addEventListener("click", function() {
                modal2.style.display = "block";
            });
        });

            // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close");
        Array.prototype.forEach.call(span, function(sp) {
            sp.addEventListener("click", function() {
              modal2.style.display = "none";
            });
        });
    });
    </script>
@endpush
