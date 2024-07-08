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
                    @foreach($students as $student)
                   
                    <div class="card-body">
                       
                        <div class="card-footer">
                            <p><span class="title">Applicant Id:</span>{{$student->applicant_id}} </p>
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
                                        @foreach($children->where('id', $student->id) as $child)
                                        
                                        <tr id="row_7">
                                            <td class="serial">{{$loop->iteration}}</td>
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">{{$child->first_name}} {{$child->last_name}}</td>
                                            <td>{{$child->class}}</td>
                                            <td>{{substr($child->meeting_date,0,16)}}</td>
                                            <td>{{$child->time_slot}}</td>
                                            <td>{{$child->purpose}}</td>
                                            <td>
                                                <div class="d-flex">
                                                <span>{{$child->mode}}</span>
                                                <a href="#" class="info-button applicant_mode"  data-mode="{{$child->mode}}" data-location="{{$child->location_url}}" >
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                </div>
                                            </td>
                                            <td><span class="badge-basic-info-text">{{$child->status}}</span></td>
                                            <td class="action">
                                                <a class="btn ot-btn-primary applicant_status"
                                                data-student-id="{{ $child->id }}"
                                                data-parent-id="{{ $child->parent_id }}"
                                                data-applicant-id="{{ $child->applicant_id }}"
                                                data-meeting-date="{{ $child->meeting_date }}"
                                                data-time-slot="{{ $child->time_slot }}"
                                                data-purpose="{{ $child->purpose }}"
                                                data-other-purpose="{{ $child->other_purpose }}"
                                                data-mode="{{ $child->mode }}"
                                                data-location-url="{{ $child->location_url }}"
                                                data-status = {{$child->status}}
                                                data-note = {{$child->note}}
                                                data-modal-id="myModal">
                                                    <i class="fas fa-cog"></i>
                                                </a>
                                          </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
               
                    <hr>
                    @endforeach
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
        <form action="{{ route('parent-meeting-status-update') }}" method="POST">
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
                  <select name="status" id="status" class="nice-select sections niceSelect bordered_style wide">
                    <option value="Reschedule Meeting Request">Reschedule Meeting Request</option>
                    <option value="Accepted By Applicant">Accepted By Applicant</option>
                    <option value="Cancelled By Applicant">Cancelled By Applicant</option>
                  </select>
              </div>
          </div>
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Note</label>
                  <textarea note="note" class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
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
                    <p id="modal1-mode">Online / Offline</p>
                </div>
                <div class="col-md-6">
                    <label for="">Url / Location</label>
                    <p id="modal1-location"></p>
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

    var infoButtons = document.querySelectorAll('.info-button');
        infoButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var mode = this.getAttribute('data-mode');
                var location = this.getAttribute('data-location');
                
                document.getElementById('modal1-mode').innerText = mode;
                document.getElementById('modal1-location').innerHTML = location ;
                
                modal1.style.display = "block";
            });
        });

 

      var adminButtons = document.querySelectorAll('.applicant_status');
          adminButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var modal = document.getElementById('myModal');
                
                document.getElementById('student_id').value = this.getAttribute('data-student-id');
                document.getElementById('parent_id').value = this.getAttribute('data-parent-id');
                document.getElementById('applicant_id').value = this.getAttribute('data-applicant-id');
                document.getElementById('meeting_date').value = this.getAttribute('data-meeting-date');
                document.getElementById('time_slot').value = this.getAttribute('data-time-slot');
                document.getElementById('purpose').value = this.getAttribute('data-purpose');
                document.getElementById('other_purpose').value = this.getAttribute('data-other-purpose');
                document.getElementById('mode').value = this.getAttribute('data-mode');
                document.getElementById('location_url').value = this.getAttribute('data-location-url');

                var status = this.getAttribute('data-status');
                var note = this.getAttribute('data-note');
                
                document.querySelector('select[name="status"]').value = status;
                document.querySelector('textarea[name="note"]').value = note;
                 
                modal.style.display = "block";
            });
        });
    
</script>
@endpush

