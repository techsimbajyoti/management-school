@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-list'
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
            <form action="" method="" id="marksheet">
                         
                <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0 title">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                            <div class="single_large_selectBox">
                                <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                                    <option value>Select Session</option>
                                    <option value="1">2021</option>
                                    <option value="2">2022</option>
                                    <option value="3">2023</option>
                                    <option value="3" selected>2024</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select class="class nice-select niceSelect bordered_style wide sections" name="class" id="class">
                                    <option value>Select one of these</option>
                                    <option value="One">One</option>
                                    <option value="Two">Two</option>
                                    <option value="Three">Three</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select class="class nice-select niceSelect bordered_style wide" id="status-form" name="status_form">
                                    <option value="">Select Status</option>
                                    <option value="Incomplete">Incomplete</option>
                                    <option value="New">New</option>
                                    <option value="Accept">Accept</option>
                                    <option value="Reject">Reject</option>
                                    <option value="Meeting Schedule">Meeting Schedule</option>
                                    <option value="Approved By Admin">Approved By Admin</option>
                                    <option value="Denied By Admin">Denied By Admin</option>
                                    <option value="Approved By Applicant">Approved By Applicant</option>
                                    <option value="Admission Confirmed">Admission Confirmed</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <input type="text" placeholder="Search by Applicant Id" class="class nice-select niceSelect bordered_style wide" name="applicantIds">
                            </div>
                            <div class="form-group single_large_selectBox">
                                <button class="btn btn-lg ot-btn-primary equal-dimensions search-student" type="submit" id="search-student">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-content table-basic mt-20 activeStudentList">
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
                                        <th class="purchase">Applicant Name</th>
                                        <th class="purchase">User Name</th>
                                        <th class="purchase">Class</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Manage Status</th>
                                        <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                      
                                        @foreach($applicant_list as $applicant_lists)
                                       <input type = "hidden" name="student_id" value="{{$applicant_lists->student_id}}">
                                       <input type = "hidden" name="parent_id" value="{{$applicant_lists->parent_id}}">
                                       
                                        <tr id="row_7">
                                            <td class="serial">{{$applicant_lists->id}}</td>
                                            <td>{{$applicant_lists->applicant_id}}</td>
                                            
                                            <td><img src="{{ url('storage/student_photos/' . $applicant_lists->image) }}" height="40px" width="40px">
                                              <a href="{{route('new-applicant-student-profile',$applicant_lists->student_id)}}">{{$applicant_lists->first_name}} {{$applicant_lists->last_name}}</a></td>
                                             <td>{{ $applicant_lists->username }}</td> 
                                            <td>{{ $applicant_lists->class }}</td>
                                            <td>{{ $applicant_lists->father_name}}</td>
                                            <td>{{$applicant_lists->date_of_birth}}</td>
                                            <td>{{$applicant_lists->father_mobile}}</td>
                                            <td><span class="badge-basic-info-text">{{$applicant_lists->latest_status}}</span></td>
                                            <td>
                                                <a class="btn ot-btn-primary applicant_status" data-student-id="{{ $applicant_lists->student_id }}" data-parent-id="{{ $applicant_lists->parent_id }}"><i class="fas fa-cog"></i></a>

                                            </td>
                                            {{-- <td><input type="text" class="form-control ot-input" placeholder="Enter Note"></td> --}}
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-applicant',$applicant_lists->id) }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                           
                                                            <a href="{{ route('edit-applicant', ['student_id' => $applicant_lists->student_id, 'parent_id' => $applicant_lists->parent_id]) }}" class="dropdown-item">
                                                                <i class="fa fa-edit"></i>  {{ __('Edit') }}
                                                            </a>
                                                       
                                                        
                                                            <a href="{{ route('schedule-meeting',$applicant_lists->applicant_id) }}" class="dropdown-item"><i class="fa fa-handshake"></i>  {{ __('Schedule Meeting') }}</a>
                                                            <a class="dropdown-item view_document" data-id="{{ $applicant_lists->id }}"><i class="fas fa-file-alt"></i>  {{ __('View Document') }}</a>
                                                            <a href="{{ route('admin-download-profile') }}" class="dropdown-item"><i class="fa fa-download"></i>  {{ __('Download') }}</a>
                                                            <form action="{{ route('delete-applicant', $applicant_lists->parent_id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')">
                                                                    <i class="fa fa-trash"></i> {{ __('Delete') }}
                                                                </button>
                                                            </form>
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
            <h2>Document Details</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered role-table myTable">
                    <thead class="thead">
                        <tr>
                            <th>Document Name</th>
                            <th>Document File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Document rows will be appended here -->
                    </tbody>
                </table>
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
            <h3>Add Note</h3>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{route('update-status')}}" method="POST">
              @csrf
                <input type="hidden" name="student_id" id="student_id" value="">
                <input type="hidden" name="parent_id" id="parent_id" value="">
                
                 <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <label for="">Status</label>
                    <select name="status_update" id="status_update" class="nice-select sections niceSelect bordered_style wide">
                        <option>Incomplete</option>
                        <option>New</option>
                        <option>Accept</option>
                        <option>Reject</option>
                        <option>Meeting Schedule</option>
                        <option>Approved By Admin</option>
                        <option>Denied By Admin</option>
                        <option>Approved By Applicant</option>
                        <option>Admission Confirmed</option>
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
        </form>
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

var modal1 = document.getElementById("myModal1");
var modal = document.getElementById("myModal");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  } else if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Add event listeners to all buttons with class "applicant_status" and "view_document"
document.addEventListener("DOMContentLoaded", function() {
    var applicantStatusButtons = document.getElementsByClassName("applicant_status");
    var viewDocumentButtons = document.getElementsByClassName("view_document");
    
    // Applicant status buttons
    Array.prototype.forEach.call(applicantStatusButtons, function(btn) {
        btn.addEventListener("click", function() {
            var studentId = this.getAttribute('data-student-id');
            var parentId = this.getAttribute('data-parent-id');
            document.getElementById('student_id').value = studentId;
            document.getElementById('parent_id').value = parentId;
            modal1.style.display = "block";
        });
    });

    // View document buttons
    Array.prototype.forEach.call(viewDocumentButtons, function(btn) {
        btn.addEventListener("click", function() {
            modal.style.display = "block";
        });
    });

    // Get the <span> elements that close the modals
    var closeButtons = document.getElementsByClassName("close");
    Array.prototype.forEach.call(closeButtons, function(sp) {
        sp.addEventListener("click", function() {
            modal1.style.display = "none";
            modal.style.display = "none";
        });
    });
});

// AJAX call to load documents and open modal
$(document).on('click', '.view_document', function(e) {
    e.preventDefault();
    var applicantId = $(this).data('id');

    $.ajax({
        url: '/students/' + applicantId + '/documents',
        method: 'GET',
        success: function(response) {
            if(response.success) {
                // Populate modal with the returned data
                var tableBody = $('#myModal .modal-body tbody');
                tableBody.empty();
                response.documents.forEach(function(document) {
                    tableBody.append(
                        '<tr>' +
                            '<td class="text-center">' + document.name + '</td>' +
                            '<td class="text-center"><a class="btn btn-lg ot-btn-primary" href="/storage/student_documents/' + document.file + '" download><i class="fa fa-download" aria-hidden="true"></i> Download</a></td>' +
                        '</tr>'
                    );
                });

                // Open the modal
                $('#myModal').show();
            } else {
                alert('Failed to load documents');
            }
        },
        error: function(response) {
            console.log(response);
            alert('An error occurred while fetching documents');
        }
    });
});


// Close the modal
$(document).on('click', '.close', function() {
    $('#myModal').hide();
});

</script>
@endpush
