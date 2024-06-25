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
            <form action="" method="" id="marksheed">
                @csrf
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
                                <select class="class nice-select niceSelect bordered_style wide sections" name="class">
                                    <option value>Select one of these</option>
                                    <option value="One" selected>One</option>
                                    <option value="Two">Two</option>
                                    <option value="Three">Three</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select id="status" class="class nice-select niceSelect bordered_style wide" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">New</option>
                                    <option value="2">Accepted</option>
                                    <option value="3">Rejected</option>
                                    <option value="4">Approve</option>
                                    <option value="5">Done</option>
                                    <option value="6">Meeting Schedule</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <input type="text" placeholder="Search by Applicant Id" class="class nice-select niceSelect bordered_style wide" name="student_name">
                            </div>
                            <div class="form-group single_large_selectBox">
                                <button class="btn btn-lg ot-btn-primary equal-dimensions search-student" type="submit" id="search">
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
                                        {{-- <th class="action">Note</th> --}}
                                        <th class="action">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        
                                        @foreach($applicant_list as $applicant_lists)
                                        <tr id="row_7">
                                            <td class="serial">{{$applicant_lists->id}}</td>
                                            <td>{{$applicant_lists->applicant_id}}</td>
                                            
                                            <td><img src="{{ url('storage/student_photos/' . $applicant_lists->image) }}" height="40px" width="40px">
                                                {{$applicant_lists->first_name}} {{$applicant_lists->last_name}}</td>
                                             <td>{{ $applicant_lists->user_name }}</td> 
                                            <td>{{ $applicant_lists->class }}</td>
                                            <td>{{ $applicant_lists->father_name}}</td>
                                            <td>{{$applicant_lists->date_of_birth}}</td>
                                            <td>{{$applicant_lists->father_mobile}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <ul style="list-style: none">
                                                                <li><input type="radio" name="add_note" class="mr-3"><label for="">New</label></li>
                                                                <li><input type="radio" name="add_note" class="mr-3"><label for="">Accept</label></li>
                                                                <li><input type="radio" name="add_note" class="mr-3"><label for="">Reject</label></li>
                                                                <li><input type="radio" name="add_note" class="mr-3"><label for="">Approve</label></li>
                                                                <li><input type="radio" name="add_note" class="mr-3"><label for="">Done</label></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td><input type="text" class="form-control ot-input" placeholder="Enter Note"></td> --}}
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-applicant',$applicant_lists->id) }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-applicant',$applicant_lists->id) }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <a href="{{ route('schedule-meeting','applicant-1') }}" class="dropdown-item"><i class="fa fa-handshake"></i>  {{ __('Schedule Meeting') }}</a>
                                                            <a class="dropdown-item view_document" data-id="{{ $applicant_lists->id }}"><i class="fas fa-file-alt"></i>  {{ __('View Document') }}</a>
                                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
        var buttons = document.getElementsByClassName("view_document");
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


    // $(document).ready(function() {

    //     $('.add-note').click(function(){

    //     });

    //     $('.inactiveStudentList').hide();
    //     $('.allStudentList').hide();

       

        

    //     $('#marksheed').on('submit', function(e) {
    //         e.preventDefault();
    //         var status = $('select[name="status"]').val();
            

    //         if (status == "1") {
    //             $('.activeStudentList').show();
    //             $('.inactiveStudentList').hide();
    //             $('.allStudentList').hide();
    //         } else if (status == "2") {
    //             $('.activeStudentList').hide();
    //             $('.inactiveStudentList').show();
    //             $('.allStudentList').hide();
    //         } else {
    //             $('.activeStudentList').hide();
    //             $('.inactiveStudentList').hide();
    //             $('.allStudentList').show();
    //         }
    //     });
    // });
</script>
@endpush
