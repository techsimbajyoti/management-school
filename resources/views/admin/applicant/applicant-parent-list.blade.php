@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-parent-list'
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
          <div class="col-12">
            <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Applicants List</h4>
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
                                        <th class="purchase">Class</th>
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Status</th>
                                        <th class="action">Manage Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody class="tbody">
                                        @foreach($studentDetails as $details)
                                        <tr id="row_7">
                                            <td class="serial">{{ $details->id }}</td>
                                            <td>{{ $details->applicant_id }}</td>
                                            
                                            <td>
                                                @if($details->image)
                                                <img src="{{ url('storage/student_photos/' . $details->image) }}" alt="avatar" height="40px" width="40px">
                                                @else
                                                <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" height="40px" width="40px">
                                                @endif
                                                <a href="{{route('applicant-student-profile', $details->id)}}" target="_blank">{{ $details->first_name }}{{ $details->last_name }}</a>
                                            </td>
                                            <td>{{ $details->class }}</td>
                                            <td>{{ $details->date_of_birth }}</td>
                                            <td><span class="badge-basic-success-text text-uppercase">{{ $details->applicant_status }}</span></td>
                                            <td>
                                                <a class="btn ot-btn-primary applicant_status" data-applicant-id="{{ $details->applicant_id }}" data-student-id="{{ $details->id }}"><i class="fas fa-cog"></i></a>
                                            </td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('applicant-edit',auth()->guard('webparents')->user()->id) }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <a href="{{ route('download-profile', ['student_id' => $details->id, 'parent_id' => auth()->guard('webparents')->user()->id]) }}" class="dropdown-item"><i class="fa fa-download"></i>  {{ __('Download') }}</a>
                                                            <a class="dropdown-item" href="{{route('delete-applicant-parent', $details->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
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
        <form action="{{route('applicant-parent-status-update')}}" method="POST">
            @csrf
            <input type="hidden" name="parent_id" value="{{ auth()->guard('webparents')->user()->id }}">
            <input type="hidden" name="student_id" id="student_id" value="">
            <input type="hidden" name="applicant_id" id="applicant_id" value="">
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <label for="">Status</label>
                    <select name="status_update" id="status_update" class="nice-select sections niceSelect bordered_style wide" required>
                        <option>Incomplete</option>
                        <option>Accept</option>
                        <option>Reject</option>
                        <option>Denied By Applicant</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <label for="">Note</label>
                    <textarea name="note" class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note" required></textarea>
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
                var studentId = this.getAttribute('data-student-id');
                var applicantId = this.getAttribute('data-applicant-id');

                document.getElementById('student_id').value = studentId;
                document.getElementById('applicant_id').value = applicantId;

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
