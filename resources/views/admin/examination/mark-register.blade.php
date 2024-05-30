@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mark-register'
])
@section('content')
<style>
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
  background-color: #fefefe !important;
  margin: auto !important;
  padding: 20px !important;
  border: 1px solid #888 !important;
  width: 80% !important;
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
  color: black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  color: black;
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
            <form action="" method="post" id="marksheet" class="exam_assign" enctype="multipart/form-data" name="marksheet">
               @csrf
                <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                    <h3 class="mb-0">Filtering</h3>
                    <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox">
                        <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                        <option value="">
                            Select class
                        </option>
                        <option value="1">
                            One
                        </option>
                        <option value="2">
                            Two
                        </option>
                        <option value="3">
                            Three
                        </option>
                        <option value="4">
                            Four A
                        </option>
                        </select>
                    </div>
                    <div class="single_large_selectBox">
                        <select class="sections section nice-select niceSelect bordered_style wide" name="section">
                        <option value="">
                            Select section
                        </option>
                        </select>
                    </div>
                    <div class="single_large_selectBox">
                        <select class="nice-select niceSelect bordered_style wide exam_types" name="exam_type">
                        <option value="">
                            Select Exam Type
                        </option>
                        </select>
                    </div>
                    <div class="single_large_selectBox">
                        <select class="subjects nice-select niceSelect bordered_style wide" name="subject">
                        <option value="">
                            Select Subject
                        </option>
                        <option>Math</option>
                        <option>English</option>
                        <option>Hindi</option>
                        </select>
                    </div><a class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i> Search</a>
                    </div>
                </div>
                </div>
            </form>

            <div class="table-content table-basic mt-20">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Mark Register</h4><a href="{{route('add-mark-register')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered role-table">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Exam Type</th>
                            <th class="purchase">Class (Section)</th>
                            <th class="purchase">Subject</th>
                            <th class="purchase">Student & Mark</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_230">
                            <td class="serial">1</td>
                            <td>Final</td>
                            <td>Three (B)</td>
                            <td>Islam & Moral Education</td>
                            <td>
                                <a href="#" class="btn btn-sm ot-btn-primary" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn">
                                    <i class="fa fa-eye"></i>
                                  </a>
                            </td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-mark-register') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <a href="{{ route('delete-mark-register') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-left">Student & Marks</h4>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Total Mark</th>
                <th scope="col">Mark Distribution</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Student 321</td>
                <td>100</td>
                <td>Written</td>
                <td>42</td>
              </tr>
              <tr>
                <th>Student 322</th>
                <td>100</td>
                <td>Written</td>
                <td>59</td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="document.getElementById('myModal').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </div>
  
  </div>
@endsection 

@push('scripts')
    <script>
       // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

        $(document).ready(function() {

             var sections = {
                 1: ["A", "B", "C"],
                 2: ["D", "E"],
                 3: ["F", "G", "H", "I"]
             }

             var exams = {
                 1: ["First", "Mid", "Final"],
                 2: ["Mid", "Final"],
                 3: ["First", "Mid", "Final", "Test"]
             }

             $('#getSections').change(function() {
                 var classId = $(this).val();
                 var $sectionsDropdown = $('.sections');
                 $sectionsDropdown.empty();
                 $sectionsDropdown.append('<option value="">Select section</option>');
                
                 if (sections[classId]) {
                     sections[classId].forEach(function(section) {
                         $sectionsDropdown.append('<option value="' + classId + '">' + section + '</option>');
                     });
                 }
             });

             $('.sections').change(function() {
                 var classId = $(this).val();
                 var $sectionsDropdown = $('.exam_types');
                 $sectionsDropdown.empty();
                 $sectionsDropdown.append('<option value="">Select section</option>');
                 if (exams[classId]) {
                  exams[classId].forEach(function(exam) {
                         $sectionsDropdown.append('<option value="' + exam + '">' + exam + '</option>');
                     });
                 }
             });

            
        });
    </script>
@endpush

