@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-list'
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
          <div class="col-12">
            <form action="" method="" id="marksheed">
                @csrf
                <div class="card ot-card mb-24 position-relative z_1">
                    <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0 title">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                            <div class="single_large_selectBox">
                                <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                                    <option value>Select class</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select class="class nice-select niceSelect bordered_style wide sections" name="section">
                                    <option value>Select section</option>
                                </select>
                            </div>
                            <div class="single_large_selectBox">
                                <select id="status" class="class nice-select niceSelect bordered_style wide" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active Students</option>
                                    <option value="2">Inactive Students</option>
                                    <option value="3">All</option>
                                </select>
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
        
            <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList" style="display:none;">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Active Student list</h4>
                        <a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <hr>
                    <div class="card-body">
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
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Gender</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr id="row_7">
                                        <td class="serial">1</td>
                                        <td>20231114</td>
                                        <td></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn"> 
                                            <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">John</a>
                                        </td>
                                        <td>Two (A)</td>
                                        <td>Parent5</td>
                                        <td>12 Apr 2021</td>
                                        <td>Male</td>
                                        <td>658932654</td>
                                        <td><span class="badge-basic-success-text">Active</span></td>
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                        <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                        <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                        <a href="{{ route('delete-student') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="row_7">
                                        <td class="serial">2</td>
                                        <td>2023111</td>
                                        <td></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn1"> 
                                            <img src="{{asset('paper/img/dummy-image.png')}}" height="40px" width="40px">William</a>
                                        </td>
                                        <td>Two (A)</td>
                                        <td>Parent8</td>
                                        <td>10 Jan 2024</td>
                                        <td>Male</td>
                                        <td>0147852111</td>
                                        <td><span class="badge-basic-success-text">Active</span></td>
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                        <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                        <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                        <a href="{{ route('delete-student') }}" class="dropdown-item"><i class="fa fa-trash" onclick="return confirm('Are you sure you want to delete?')"></i>  {{ __('Delete') }}</a>
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
          
            <div class="table-content table-basic mt-20 inactiveStudentList" id="" style="display:none;">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Inactive Student list</h4>
                        <a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <hr>
                    <div class="card-body">
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
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Gender</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr id="row_14">
                                        <td class="serial">1</td>
                                        <td>20231114</td>
                                        <td></td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn"> 
                                            <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">Herry</a>
                                        </td>
                                        <td>Three (A)</td>
                                        <td>Parent2</td>
                                        <td>12 Apr 2019</td>
                                        <td>Male</td>
                                        <td>6589326562</td>
                                        <td><span class="badge-basic-danger-text">Inactive</span></td>
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
            <div class="table-content table-basic mt-20 allStudentList" style="display:none;">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">All Student list</h4>
                        <a href="{{ route('admit-student') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <hr>
                    <div class="card-body">
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
                                        <th class="action">Date Of Birth</th>
                                        <th class="action">Gender</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                  <tr id="row_7">
                                    <td class="serial">1</td>
                                    <td>20231114</td>
                                    <td></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn"> 
                                        <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">John</a>
                                    </td>
                                    <td>Two (A)</td>
                                    <td>Parent5</td>
                                    <td>12 Apr 2021</td>
                                    <td>Male</td>
                                    <td>658932654</td>
                                    <td><span class="badge-basic-success-text">Active</span></td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                    <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                    <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                    <a href="{{ route('delete-student') }}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="row_7">
                                    <td class="serial">2</td>
                                    <td>2023111</td>
                                    <td></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn1"> 
                                        <img src="{{asset('paper/img/dummy-image.png')}}" height="40px" width="40px">William</a>
                                    </td>
                                    <td>Two (A)</td>
                                    <td>Parent8</td>
                                    <td>10 Jan 2024</td>
                                    <td>Male</td>
                                    <td>0147852111</td>
                                    <td><span class="badge-basic-success-text">Active</span></td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                    <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                    <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                    <a href="{{ route('delete-student') }}" class="dropdown-item"><i class="fa fa-trash" onclick="return confirm('Are you sure you want to delete?')"></i>  {{ __('Delete') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="row_14">
                                  <td class="serial">1</td>
                                  <td>20231114</td>
                                  <td></td>
                                  <td>
                                      <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn"> 
                                      <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">Herry</a>
                                  </td>
                                  <td>Three (A)</td>
                                  <td>Parent2</td>
                                  <td>12 Apr 2019</td>
                                  <td>Male</td>
                                  <td>6589326562</td>
                                  <td><span class="badge-basic-danger-text">Inactive</span></td>
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
</div>
{{-- <div id="myModal" class="modal">

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
                    <span>Admission No :</span>
                    <h5>12</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Student name :</span>
                    <h5>John</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Student Contact :</span>
                    <h5>00000000000</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Date of Birth :</span>
                    <h5>02 Oct 2023</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Email Id :</span>
                    <h5>john@gmail.com</h5>
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
                  <div class="student_info_single">
                    <span>GPA :</span>
                    <h5>0.00</h5>
                  </div>
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

<div id="myModal1" class="modal">

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
                    <span>Admission No :</span>
                    <h5>13</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Student name :</span>
                    <h5>William</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Student Contact :</span>
                    <h5>00000000000</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Date of Birth :</span>
                    <h5>05 july 2023</h5>
                  </div>
                  <div class="student_info_single">
                    <span>Email Id :</span>
                    <h5>william@gmail.com</h5>
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
                  <div class="student_info_single">
                    <span>GPA :</span>
                    <h5>0.00</h5>
                  </div>
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
</div> --}}
@endsection 
@push('scripts')
<script>
    $(document).ready(function() {
        $('.activeStudentList').hide();
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
{{--
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");


//   var modal1 = document.getElementById("myModal1");

// // Get the button that opens the modal
// var btn1 = document.getElementById("myBtn1");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// var span1 = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// btn1.onclick = function() {
//   modal1.style.display = "block";
// }


// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// } if (status == "1") {
//             $('.no-data').hide();
//             $('.exam-form').show();
//             $('.exam-form').show();

// }
// span1.onclick = function() {
//   modal1.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

// window.onclick = function(event) {
//   if (event.target == modal1) {
//     modal1.style.display = "none";
//   }
// }



  // document.getElementById('statusSelect').addEventListener('change', function() {
  //     var status = this.value;
  //     var activeStudentList = document.getElementById('activeStudentList');
  //     var inactiveStudentList = document.getElementById('inactiveStudentList');
  
  //     if (status == '1') {
  //         activeStudentList.style.display = 'block';
  //         inactiveStudentList.style.display = 'none';
  //         allStudentList.style.display = 'none';
  //     } else if (status == '2') {
  //         activeStudentList.style.display = 'none';
  //         inactiveStudentList.style.display = 'block';
  //         allStudentList.style.display = 'none';
  //     } else {
  //         allStudentList.style.display = 'block';
  //         activeStudentList.style.display = 'none';
  //         inactiveStudentList.style.display = 'none';
  //     }
  // });
        
--}}
