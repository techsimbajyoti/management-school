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
                        <option value="3">Rejected By Admin</option>
                        <option value="3">Rejected By Applicant</option>
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
                                  @foreach($meeting_data as $meeting_datas)
                                
                                        <tr id="row_7">
                                            <td class="serial">{{ $meeting_datas->id}}</td>
                                            <td>2023114</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                <a href="{{ route('admin-student-profile')}}" target="_blank">{{ $meeting_datas->first_name}}{{ $meeting_datas->last_name}}</a></td>
                                            <td>{{ $meeting_datas->class}}</td>
                                            <td>{{ $meeting_datas->father_name}}</td>
                                           
                                            <td>{{ $meeting_datas->father_mobile}}</td>
                                           
                                            <td>{{ substr($meeting_datas->meeting_date,0,16)}}</td>
                                            <td>{{ $meeting_datas->time_slot}}</td>
                                            <td>{{ $meeting_datas->purpose}}</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>{{ $meeting_datas->mode}}</span>
                                                <a href="#" class="info-button applicant_mode" data-modal-id="myModal{{ $meeting_datas->id }}">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-success-text">{{ $meeting_datas->status}}</span></td>

                                            {{-- <td><div style="background: rgb(224, 224, 224);width:50%;" class="text-center"><a class="myBtn"><i class="fa fa-eye"></i></a></div></td> --}}
                                            <td class="action">
                                              <a class="btn ot-btn-primary admin_side_meeting" 
                                                 data-student-id="{{ $meeting_datas->student_id }}" 
                                                 data-parent-id="{{ $meeting_datas->parent_id }}"
                                                 data-applicant-id="{{ $meeting_datas->applicant_id }}"
                                                 data-meeting-date="{{ $meeting_datas->meeting_date }}"
                                                 data-time-slot="{{ $meeting_datas->time_slot }}"
                                                 data-purpose="{{ $meeting_datas->purpose }}"
                                                 data-other-purpose="{{ $meeting_datas->other_purpose }}"
                                                 data-mode="{{ $meeting_datas->mode }}"
                                                 data-location-url="{{ $meeting_datas->location_url }}">
                                                  <i class="fas fa-cog"></i>
                                              </a>
                                          </td>
                                          
                                        </tr>
                                  @endforeach
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
  @foreach($meeting_data as $meeting_datas)
 
  <!-- The Modal -->
  <div id="myModal{{$meeting_datas->id}}" class="modal">
      <!-- Modal content --> 
      <div class="modal-content">
          <div class="modal-header">
              <h3>Meeting Details</h3>
              <span class="close">&times;</span>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-6">
                      <label for="">Mode</label>
                      <p>{{ $meeting_datas->mode }}</p>
                  </div>
                  <div class="col-md-6">
                      <label for="">URL / Location</label>
                      @if($meeting_datas->mode === 'online')
                          <p><a href="{{ $meeting_datas->location_url }}">{{ $meeting_datas->location_url }}</a></p>
                      @elseif($meeting_datas->mode === 'offline')
                          <p>{{ $meeting_datas->location_url }}</p>
                      @else
                          <p>No URL/Location available</p>
                      @endif
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <h3></h3>
          </div>
      </div>
  </div>
@endforeach
 


<!-- The Modal -->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <div class="modal-header">
          <h3>Add Note</h3>
          <span class="close">&times;</span>
      </div>

      <div class="modal-body">
        <form action="{{ route('applicant-meeting-status-update') }}" method="POST">
          @csrf
          <input type="hidden" name="student_id" id="student_id">
          <input type="hidden" name="parent_id" id="parent_id">
          <input type="hidden" name="applicant_id" id="applicant_id">
          <input type="hidden" name="meeting_date" id="meeting_date">
          <input type="hidden" name="time_slot" id="time_slot">
          <input type="hidden" name="purpose" id="purpose">
          <input type="hidden" name="other_purpose" id="other_purpose">
          <input type="hidden" name="mode" id="mode">
          <input type="hidden" name="location_url" id="location_url">
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Status</label>
                  <select name="status" id="" class="nice-select sections niceSelect bordered_style wide">
                        <option value="0">Meeting Status</option>
                        <option value="Active">Active</option>
                        <option value="Reschedule Meeting Request">Reschedule Meeting Request</option>
                        <option value="Accept">Accept</option>
                        <option value="Meeting Schedule">Meeting Schedule</option>
                        <option value="Cancelled By Admin">Cancelled By Admin</option>
                        <option value="Rejected By Admin">Rejected By Admin</option>
                        <option value="Upcoming Meeting">Upcoming Meeting</option>
                  </select>
              </div>
          </div>
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Note</label>
                  <textarea name="note" class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-4 mt-3">
                  <button type="submit" class="btn btn-lg w-100 ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
              </div>
            </div>
          </form>
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
    

    document.addEventListener("DOMContentLoaded", function() {
        // Get all elements with class "applicant_mode" (your info buttons)
        var infoButtons = document.querySelectorAll('.applicant_mode');

        // Function to handle modal display
        function showModal(event) {
            // Prevent default action (in case it's a link)
            event.preventDefault();

            // Get the modal associated with the clicked info button
            var modalId = this.getAttribute('data-modal-id');
            var modal = document.getElementById(modalId);

            // Display the modal
            modal.style.display = "block";
        }

        // Attach click event listener to each info button
        infoButtons.forEach(function(button) {
            button.addEventListener('click', showModal);
        });

        // Close modal functionality
        var closeButtons = document.querySelectorAll('.close');

        function closeModal() {
            // Get the parent modal of the close button
            var modal = this.closest('.modal');
            if (modal) {
                modal.style.display = "none";
            }
        }

        // Attach click event listener to each close button
        closeButtons.forEach(function(button) {
            button.addEventListener('click', closeModal);
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        });
    });



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

    document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('myModal2');
    var btns = document.querySelectorAll('.admin_side_meeting');
    var closeModal = modal.querySelector('.close');

    btns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var studentId = this.getAttribute('data-student-id');
            var parentId = this.getAttribute('data-parent-id');
            var applicantId = this.getAttribute('data-applicant-id');
            var meetingDate = this.getAttribute('data-meeting-date');
            var timeSlot = this.getAttribute('data-time-slot');
            var purpose = this.getAttribute('data-purpose');
            var otherPurpose = this.getAttribute('data-other-purpose');
            var mode = this.getAttribute('data-mode');
            var locationUrl = this.getAttribute('data-location-url');

            document.getElementById('student_id').value = studentId;
            document.getElementById('parent_id').value = parentId;
            document.getElementById('applicant_id').value = applicantId;
            document.getElementById('meeting_date').value = meetingDate;
            document.getElementById('time_slot').value = timeSlot;
            document.getElementById('purpose').value = purpose;
            document.getElementById('other_purpose').value = otherPurpose;
            document.getElementById('mode').value = mode;
            document.getElementById('location_url').value = locationUrl;

            modal.style.display = "block";
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = "none";
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});

    </script>
@endpush
