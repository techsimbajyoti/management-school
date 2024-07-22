@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-list'
])
@section('content')
    <style>
        /*the container must be positioned relative:*/
    .autocomplete {
    position: relative;
    }

    .autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;
    }

    .autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
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
          <div class="col-12">
                <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0 title">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                            <div class="single_large_selectBox">
                                <select class="class nice-select niceSelect bordered_style wide sections" name="class" id="student_class">
                                    <option value>Select class from these</option>
                                    <option value="First Class">First Class</option>
                                    <option value="Second Class">Second Class</option>
                                    <option value="Third Class">Third Class</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select class="class nice-select niceSelect bordered_style wide" id="status_form" name="status_form">
                                    <option value="">Select Status from these</option>
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
                            <div class="single_large_selectBox d-flex gap-3">
                                <label for="">From</label> <input value="" name="date" id="from_date" class="form-control ot-input" type="date">
                            </div>
                            <div class="single_large_selectBox d-flex gap-3">
                                <label for="">To</label> <input value="" name="date" id="to_date" class="form-control ot-input" type="date">
                            </div>
                            <div class="single_large_selectBox">
                                <div class="autocomplete">
                                <input type="text" placeholder="Search by Applicant Id" class="class nice-select niceSelect bordered_style wide" id="applicantIds" name="applicantIds">
                                </div>
                            </div>
                            <div class="form-group single_large_selectBox">
                                <a class="btn btn-lg ot-btn-primary" id="search-student-1">
                                    <i class="fa fa-search"></i> Search
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

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
                                       <input type = "hidden" class="student_id" name="student_id" value="{{$applicant_lists->student_id}}">
                                       <input type = "hidden" name="parent_id" value="{{$applicant_lists->parent_id}}">
                                       <input type = "hidden" class="applicant_id" name="parent_id" value="{{$applicant_lists->applicant_id}}">
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
                                                <a class="btn ot-btn-primary applicant_status" data-status="{{ $applicant_lists->latest_status }}" data-note="{{ $applicant_lists->latest_note }}"  data-student-id="{{ $applicant_lists->student_id }}" data-parent-id="{{ $applicant_lists->parent_id }}"><i class="fas fa-cog"></i></a>

                                            </td>
                                            {{-- <td><input type="text" class="form-control ot-input" placeholder="Enter Note"></td> --}}
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-applicant', ['student_id' => $applicant_lists->student_id, 'parent_id' => $applicant_lists->parent_id]) }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-applicant', ['student_id' => $applicant_lists->student_id, 'parent_id' => $applicant_lists->parent_id]) }}" class="dropdown-item">
                                                                <i class="fa fa-edit"></i>  {{ __('Edit') }}
                                                            </a>
                                                            <a href="{{ route('schedule-meeting',$applicant_lists->applicant_id) }}" class="dropdown-item"><i class="fa fa-handshake"></i>  {{ __('Schedule Meeting') }}</a>
                                                            <a class="dropdown-item view_document" data-id="{{ $applicant_lists->id }}"><i class="fas fa-file-alt"></i>  {{ __('View Document') }}</a>
                                                            <a href="{{ route('admin-download-profile', ['student_id' => $applicant_lists->student_id, 'parent_id' => $applicant_lists->parent_id]) }}" class="dropdown-item">
                                                                <i class="fa fa-download"></i> {{ __('Download') }}
                                                            </a> 
                                                            <a class="dropdown-item" href="{{ route('delete-applicant', $applicant_lists->parent_id) }}" onClick="return confirm('Are you sure you want to delete this applicant?');"><i class="fa fa-trash"></i> {{ __('Delete') }}</a>
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
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">Note</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody id="status-table-body">
                </tbody>
              </table>
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
                            <option value="">Please select status</option>
                            <option>Accept</option>
                            <option>Reject</option>
                            <option>Approved By Admin</option>
                            <option>Denied By Admin</option>
                            <option>Admission Confirmed</option>
                        </select>
                    </div>
                {{-- </div>
                <div class="row justify-content-center mt-3"> --}}
                    <div class="col-md-6">
                        <label for="">Note</label>
                        <textarea name="note" class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
                    </div>
                {{-- </div>
                <div class="row justify-content-center mt-3">     --}}
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-lg w-100 ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    </div>
</div>

@endsection 
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

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

$(document).ready(function() {

    var student = <?php echo json_encode($ApplicantId); ?>;
autocomplete(document.getElementById("applicantIds"), student);

function autocomplete(inp, arr) {
    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            // Check if the input value matches the start of the applicant_id or the name
            if (arr[i].applicant_id.substr(0, val.length).toUpperCase() == val.toUpperCase() ||
                arr[i].name.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                // Highlight the matching part of the applicant_id and name
                b.innerHTML = "<strong>" + arr[i].applicant_id.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].applicant_id.substr(val.length) + " - ";
                b.innerHTML += "<strong>" + arr[i].name.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].name.substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i].applicant_id + " - " + arr[i].name + "'>";
                b.addEventListener("click", function(e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });

    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            e.preventDefault();
            if (currentFocus > -1) {
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

   

});

$(document).ready(function() {
    $('#search-student-1').on('click', function(e) {
        e.preventDefault();

        var student_class = $('#student_class').val();
        var status = $('#status_form').val();
        var from = $('#from_date').val();
        var to = $('#to_date').val();
        var applicantid = $('#applicantIds').val();

        $.ajax({
            url: '{{ route("search-student") }}',
            method: 'POST',
            data: {
                student_class: student_class,
                status: status,
                from: from,
                to: to,
                applicantid: applicantid,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response.applicant_list);

                var tableBody = $('.tbody');
                tableBody.empty();

                response.applicant_list.forEach(function(applicant) {
                    var newRow = '<tr id="row_' + applicant.student_id + '">' +
                        '<td class="serial">' + applicant.id + '</td>' +
                        '<td>' + applicant.applicant_id + '</td>' +
                        '<td><img src="{{ url("storage/student_photos/") }}/' + applicant.image + '" height="40px" width="40px">' +
                        '<a href="{{ route("new-applicant-student-profile", ":student_id") }}">' + applicant.first_name + ' ' + applicant.last_name + '</a></td>' +
                        '<td>' + applicant.username + '</td>' +
                        '<td>' + applicant.class + '</td>' +
                        '<td>' + applicant.father_name + '</td>' +
                        '<td>' + applicant.date_of_birth + '</td>' +
                        '<td>' + applicant.father_mobile + '</td>' +
                        '<td><span class="badge-basic-info-text">' + applicant.latest_status + '</span></td>' +
                        '<td>' +
                        '<a class="btn ot-btn-primary applicant_status" data-status="' + applicant.latest_status + '" data-note="' + applicant.latest_note + '" data-student-id="' + applicant.student_id + '" data-parent-id="' + applicant.parent_id + '"><i class="fas fa-cog"></i></a>' +
                        '</td>' +
                        '<td class="action">' +
                        '<div class="dropdown dropdown-action">' +
                        '<button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>' +
                        '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">' +
                        '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">' +
                        '<a href="{{ route("view-applicant",["student_id" => ":student_id", "parent_id" => ":parent_id"]) }}" class="dropdown-item">'.replace(':student_id', applicant.student_id).replace(':parent_id', applicant.parent_id) + '<i class="fa fa-eye"></i> View</a>' +
                        '<a href="{{ route("edit-applicant", ["student_id" => ":student_id", "parent_id" => ":parent_id"]) }}" class="dropdown-item">'.replace(':student_id', applicant.student_id).replace(':parent_id', applicant.parent_id) + '<i class="fa fa-edit"></i> Edit</a>' +
                        '<a href="{{ route("schedule-meeting", ":applicant_id") }}" class="dropdown-item">'.replace(':applicant_id', applicant.applicant_id) + '<i class="fa fa-handshake"></i> Schedule Meeting</a>' +
                        '<a class="dropdown-item view_document" data-id="' + applicant.id + '"><i class="fas fa-file-alt"></i> View Document</a>' +
                        '<a href="{{ route("admin-download-profile", ["student_id" => ":student_id", "parent_id" => ":parent_id"]) }}" class="dropdown-item">'.replace(':student_id', applicant.student_id).replace(':parent_id', applicant.parent_id) + '<i class="fa fa-download"></i> Download</a>' +
                        '<a class="dropdown-item" href="{{ route("delete-applicant", ":parent_id") }}"><i class="fa fa-trash"></i> Delete</a>' +
                        '</div></div></div></td></tr>';

                    tableBody.append(newRow);
                });
            },
            error: function(response) {
                console.log(response);
                alert('An error occurred while fetching data');
            }
        });
    });


    $('.applicant_status').click(function(){
            var student_id = this.getAttribute('data-student-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get-applicant-status-by-id-admin') }}",
                method: 'POST',
                data: {
                    student_id: student_id
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                            var tbody = $('#status-table-body');
                            tbody.empty(); // Clear existing table body content

                            response.applicant_status.forEach(function(status) {
                                var datetime = status.created_at;
                                var date = datetime.split('T')[0];
                               

                                var row = '<tr>' +
                                    '<td>' + status.id + '</td>' +
                                    '<td>' + status.status + '</td>' +
                                    '<td>' + status.note + '</td>' +
                                    '<td>' + date + '</td>' +
                                    '</tr>';

                                tbody.append(row);
                            });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        })
});

</script>
@endpush
