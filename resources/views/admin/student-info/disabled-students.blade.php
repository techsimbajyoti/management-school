@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'disabled-student'
])
@section('content')
<style>
  /* The Modal (background) */
  .modal{
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
            <div class="table-content table-basic mt-20">
                <div class="card ot-card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Inactive students</h4>
                  </div>
                  <hr>
                  <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> 
                          <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
                            <option value="">Select class</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> 
                          <select class="sections nice-select niceSelect bordered_style wide" name="section">
                            <option value="">Select section</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="text-right">
                          <a class="btn btn-lg ot-btn-primary search-student"><i class="fa fa-search"></i> Search</a>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-body student-disabled-list">
                    <div class="table-responsive">
                      <table class="table table-bordered role-table">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Admission NO</th>
                            <th class="purchase">Roll NO</th>
                            <th class="purchase">Student name</th>
                            <th class="purchase">Class (Section)</th>
                            <th class="purchase">Parent name</th>
                            <th class="purchase">Date of birth</th>
                            <th class="purchase">Gender</th>
                            <th class="purchase">Contact number</th>
                            <th class="purchase">Status</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_14">
                            <td class="serial">1</td>
                            <td class="serial">20231114</td>
                            <td class="serial">OneA101</td>
                            <td>
                            <div class>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn">
                            <div class="user-card">
                            <div class="user-avatar">
                            <img src="{{ asset('paper') }}/img/demo.png" alt>
                            </div>
                            <div class="user-info">
                            Student 1114
                            </div>
                            </div>
                            </a>
                            </div>
                            </td>
                            <td>Two (A)</td>
                            <td>Guardian5</td>
                            <td>12 Apr 2021</td>
                            <td>Male</td>
                            <td>01478521114</td>
                            <td><span class="badge-basic-success-text">Inactive</span></td>
                            <td class="action">
                              <div class="dropdown dropdown-action">
                                  <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                          <a href="{{ route('edit-inactive-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
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
      <h4 class="text-left">Student Details</h4>
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <div class="col-lg-12 marksheet-form">
        <div class="card ot-card mb-24" id="printableArea">
          <div class="routine_wrapper">
            <div class="routine_wrapper_body">
              <div class="student_info_wrapper">
                <div class="student_info_single">
                  <span>Student name :</span>
                  <h5>Student 1114</h5>
                </div>
                <div class="student_info_single">
                  <span>Contact Number :</span>
                  <h5>00000000000</h5>
                </div>
                <div class="student_info_single">
                  <span>Date of Birth :</span>
                  <h5>02 Oct 2023</h5>
                </div>
                <div class="student_info_single">
                  <span>Email Id :</span>
                  <h5>student@gmail.com</h5>
                </div>
                <div class="student_info_single">
                  <span>Class (Section) :</span>
                  <h5>Two (A)</h5>
                </div>
                <div class="student_info_single">
                  <span>Admission Date :</span>
                  <h5>00/00/0000</h5>
                </div>
                <div class="student_info_single">
                  <span>Address :</span>
                  <h5>Demo Demo</h5>
                </div>
                {{-- <div class="student_info_single">
                  <span>GPA :</span>
                  <h5>0.00</h5>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
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
            $('.student-disabled-list').hide();

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

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
        });
    </script>
@endpush