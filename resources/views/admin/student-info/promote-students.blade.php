@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'promote-student'
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
                    <h4 class="mb-0">Promote students</h4>
                  </div>
                  <hr>
                  <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                     @csrf
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> 
                          <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
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
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> <select class="sections nice-select niceSelect bordered_style wide" name="section">
                            <option value="">
                              Select section
                            </option>
                            <option value="1">
                              A
                            </option>
                            <option value="2">
                              B
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <h3>Promote students in next session</h3>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer04" class="form-label">Promote session <span class="fillable">*</span></label> <select class="session nice-select niceSelect bordered_style wide" name="promote_session">
                            <option value="">
                              Select session
                            </option>
                            <option value="1">
                              2024 Current
                            </option>
                            <option value="2">
                              2025
                            </option>
                          </select>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer04" class="form-label">Promote class <span class="fillable">*</span></label> <select class="classes nice-select niceSelect bordered_style wide" name="promote_class">
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
                          </select>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer04" class="form-label">Promote section <span class="fillable">*</span></label> <select class="promoteSections nice-select niceSelect bordered_style wide" name="promote_section">
                            <option value="">
                              Select section
                            </option>
                            <option value="1">
                              A
                            </option>
                            <option value="2">
                              B
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="text-right">
                          <a class="btn btn-lg ot-btn-primary search-student"><i class="fa fa-search"></i> Search</a>
                        </div>
                      </div>
                    </form>
                    
                    <form action="" method="post" class="student-disabled-list">
                        <div class="table-responsive mb-3">
                          <table class="table table-bordered" id="dtExample">
                            <thead class="thead">
                              <tr>
                                <th>
                                  <div class="">
                                    <div class="">
                                      <input type="checkbox" name="check" id="checking">
                                    </div>
                                  </div>
                                </th>
                                <th class="purchase">Admission no</th>
                                <th class="purchase">Student Name</th>
                                <th class="purchase">Parent Name</th>
                                <th class="purchase">Contact Number</th>
                                <th class="purchase">Result</th>
                                <th class="purchase">Roll</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr id="row_14">
                                <td class="serial"><input type="checkbox" name="check"></td>
                                <td class="serial">20231114</td>
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
                                  <td>
                                    <div class>
                                      <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn1">
                                    <div class="user-card">
                                    <div class="user-avatar">
                                    <img src="{{ asset('paper') }}/img/demo.png" alt>
                                    </div>
                                    <div class="user-info">
                                    Parent 1114
                                    </div>
                                    </div>
                                    </a>
                                    </div>
                                    </td>
                                <td>01478521114</td>
                                <td>80%</td>
                                <td>OneA101</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-12">
                          <div class="text-right">
                            <a href="{{route('promote-students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Promote</a>
                          </div>
                        </div>
                      </form>
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


<!-- The Modal -->
<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="text-left">Parent Details</h4>
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <div class="col-lg-12 marksheet-form">
        <div class="card ot-card mb-24" id="printableArea">
          <div class="routine_wrapper">
            <div class="routine_wrapper_body">
              <div class="student_info_wrapper">
                <div class="student_info_single">
                  <span>Parent name :</span>
                  <h5>Parent 1114</h5>
                </div>
                <div class="student_info_single">
                  <span>Parent Number :</span>
                  <h5>00000000000</h5>
                </div>
                <div class="student_info_single">
                  <span>Date of Birth :</span>
                  <h5>02 Oct 2023</h5>
                </div>
                <div class="student_info_single">
                  <span>Email Id :</span>
                  <h5>parent@gmail.com</h5>
                </div>
                {{-- <div class="student_info_single">
                  <span>Class (Section) :</span>
                  <h5>Two (A)</h5>
                </div> --}}
                {{-- <div class="student_info_single">
                  <span>Admission Date :</span>
                  <h5>00/00/0000</h5>
                </div> --}}
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
      <button type="button" onclick="document.getElementById('myModal1').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </div>

</div>
@endsection 

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<!-- DataTables FixedHeader CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- DataTables FixedHeader JS -->
<script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
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


  // Get the modal
  var modal = document.getElementById("myModal1");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

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

            var table = $('#dtExample').DataTable({
                fixedHeader: true
            });

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

            $('#checking').click(function(){
                $('input[type="checkbox"]').prop('checked', true);
            });

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
        });
    </script>
@endpush