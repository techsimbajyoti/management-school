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
                                <select class="class nice-select niceSelect bordered_style wide sections" name="section">
                                    <option value>Select one of these</option>
                                    <option value="" selected>All</option>
                                    <option value="">Class</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select id="status" class="class nice-select niceSelect bordered_style wide" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Incomplete</option>
                                    <option value="1">New</option>
                                    <option value="2">Accept</option>
                                    <option value="3">Reject</option>
                                    <option value="4">Approve By Applicant</option>
                                    <option value="5">Denied By Applicant</option>
                                    <option value="6">Meeting Reschedule</option>
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
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Manage Status</th>
                                        <th class="action">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>2023114</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">John</td>
                                            <td>Two</td>
                                            <td>Parent5</td>
                                            <td>10/05/2024</td>
                                            <td>658932654</td>
                                            <td><span class="badge-basic-success-text">Done</span></td>
                                            <td class="action">
                                                <div class="dropdown">
                                                    <button class="btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <ul style="list-style: none">
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Incomplete</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Accept</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Reject</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Denied By Applicant</label></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('applicant-edit',auth()->guard('webparents')->user()->id) }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
                                            <td>10/05/2024</td>
                                            <td>0147852111</td>
                                            <td><span class="badge-basic-info-text">Pending</span></td>
                                            <td class="action">
                                                <div class="dropdown">
                                                    <button class="btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <ul style="list-style: none">
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Incomplete</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Accept</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Reject</label></li>
                                                                <li><input type="radio" name="add_note" class="applicant_status mr-3"><label for="">Denied By Applicant</label></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('applicant-edit',auth()->guard('webparents')->user()->id) }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                    <input type="text" class="nice-select sections niceSelect bordered_style wide" value="New" id="new_status">
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
