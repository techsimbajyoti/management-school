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
                      <select class="class nice-select niceSelect bordered_style wide" id="applicant_view" name="view">
                        <option value="0">Select One Of These</option>
                        @foreach($ApplicantId as $ApplicantIds)
                        <option value="{{$ApplicantIds->applicant_id}}">{{$ApplicantIds->applicant_id}} - {{$ApplicantIds->first_name}} {{$ApplicantIds->last_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  

                    <div class="single_large_selectBox">
                      <select class="class nice-select niceSelect bordered_style wide" id="applicant_status" name="view">
                        <option value="">Meeting Status</option>
                        <option value="Active">Active</option>
                        <option value="Reschedule Meeting Request">Reschedule Meeting Request</option>
                        <option value="Accept">Accept</option>
                        <option value="Meeting Schedule">Meeting Schedule</option>
                        <option value="Cancelled By Admin">Cancelled By Admin</option>
                        <option value="Rejected By Admin">Rejected By Admin</option>
                        <option value="Rejected By Applicant">Rejected By Applicant</option>
                        <option value="Upcoming Meeting">Upcoming Meeting</option>
                      </select>
                    </div>
                    <button class="btn btn-lg ot-btn-primary" id="search-student" type="submit">Search</button>
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
                                            <td>{{ $meeting_datas->applicant_id}}</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">{{ $meeting_datas->first_name}}{{ $meeting_datas->last_name}}</td>
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
                                                 data-meeting-status="{{ $meeting_datas->latest_status }}"
                                                 data-meeting-note="{{ $meeting_datas->latest_note }}"
                                                 data-other-purpose="{{ $meeting_datas->other_purpose }}"
                                                 data-mode="{{ $meeting_datas->mode }}"
                                                 data-location-url="{{ $meeting_datas->location_url }}">
                                                  <i class="fas fa-cog"></i>
                                              </a>
                                          </td>
                                        </tr>
                                        @endforeach
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
                  <select name="status" id="meetingStatus" class="nice-select sections niceSelect bordered_style wide">
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
                  <textarea name="note" class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="meetingNote"></textarea>
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
   document.addEventListener("DOMContentLoaded", function() {
    // Get the modals
    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");

    // Function to show a specific modal
    function showModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    // Function to close a specific modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        } else if (event.target == modal2) {
            modal2.style.display = "none";
        }
    };

    // Close modal when clicking on close buttons
    var closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var modal = this.closest('.modal');
            if (modal) {
                modal.style.display = "none";
            }
        });
    });

    // Event delegation for info buttons with class "applicant_mode"
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('applicant_mode')) {
            event.preventDefault();
            var modalId = event.target.getAttribute('data-modal-id');
            showModal(modalId);
        }
    });

    // Event delegation for buttons with class "admin_side_meeting"
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('admin_side_meeting')) {
            event.preventDefault();
            var modalId = 'myModal2'; // Assuming this is the ID for your admin side meeting modal
            showModal(modalId);

            // Populate modal fields based on data attributes
            var studentId = event.target.getAttribute('data-student-id');
            var parentId = event.target.getAttribute('data-parent-id');
            var applicantId = event.target.getAttribute('data-applicant-id');
            var meetingDate = event.target.getAttribute('data-meeting-date');
            var timeSlot = event.target.getAttribute('data-time-slot');
            var purpose = event.target.getAttribute('data-purpose');
            var mode = event.target.getAttribute('data-mode');
            var locationUrl = event.target.getAttribute('data-location-url');
            var meetingStatus = event.target.getAttribute('data-meeting-status');
            var meetingNote = event.target.getAttribute('data-meeting-note');

            // Update modal content with fetched data
            document.getElementById('student_id').value = studentId;
            document.getElementById('parent_id').value = parentId;
            document.getElementById('applicant_id').value = applicantId;
            document.getElementById('meeting_date').value = meetingDate;
            document.getElementById('time_slot').value = timeSlot;
            document.getElementById('purpose').value = purpose;
            document.getElementById('mode').value = mode;
            document.getElementById('location_url').value = locationUrl;
            document.getElementById('meetingStatus').value = meetingStatus;
            document.getElementById('meetingNote').value = meetingNote;
        }
    });

    

    // AJAX request for searching students
    $('#search-student').on('click', function(e) {
        e.preventDefault();

        var applicant_view = $('#applicant_view').val();
        var applicant_status = $('#applicant_status').val();

        $.ajax({
            url: '{{ route("search-student") }}',
            method: 'POST',
            data: {
                applicant_view: applicant_view,
                applicant_status: applicant_status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                if (response.success === true) {
                    var tableBody = $('.tbody');
                    tableBody.empty(); // Clear existing rows

                    response.applicant_list.forEach(function(applicant) {
                        var newRow = '<tr id="row_' + applicant.id + '">' +
                            '<td class="serial">' + (applicant.id || '') + '</td>' +
                            '<td>' + (applicant.applicant_id || '') + '</td>' +
                            '<td><img src="{{ asset("paper/img/demo.png") }}" height="40px" width="40px">' +
                            '<a href="{{ route("admin-student-profile") }}" target="_blank">' + ((applicant.first_name || '') + ' ' + (applicant.last_name || '')) + '</a></td>' +
                            '<td>' + (applicant.class || '') + '</td>' +
                            '<td>' + (applicant.father_name || '') + '</td>' +
                            '<td>' + (applicant.father_mobile || '') + '</td>' +
                            '<td>' + ((applicant.meeting_date && applicant.meeting_date.substr(0, 16)) || '') + '</td>' +
                            '<td>' + (applicant.time_slot || '') + '</td>' +
                            '<td>' + (applicant.meeting_type || '') + '</td>' +
                            '<td><div class="d-flex">' +
                            '<span>' + (applicant.meeting_mode || '') + '</span>' +
                            '<a href="#" class="info-button applicant_mode" data-modal-id="myModal' + (applicant.id) + '">' +
                            '<i class="fa fa-info"></i></a></div></td>' +
                            '<td><span class="badge-basic-success-text">' + (applicant.meeting_status || '') + '</span></td>' +
                            '<td class="action">' +
                            '<a class="btn ot-btn-primary admin_side_meeting" ' +
                            'data-student-id="' + (applicant.student_id || '') + '" ' +
                            'data-parent-id="' + (applicant.parent_id || '') + '" ' +
                            'data-applicant-id="' + (applicant.applicant_id || '') + '" ' +
                            'data-meeting-date="' + (applicant.meeting_date || '') + '" ' +
                            'data-time-slot="' + (applicant.time_slot || '') + '" ' +
                            'data-purpose="' + (applicant.meeting_type || '') + '" ' +
                            'data-mode="' + (applicant.meeting_mode || '') + '" ' +
                            'data-location-url="' + (applicant.location_url || '') + '">' +
                            '<i class="fas fa-cog"></i></a></td>' +
                            '</tr>';

                        tableBody.append(newRow);
                    });
                } else {
                    alert('No data found');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while fetching data');
            }
        });
    });
});


    </script>
@endpush
