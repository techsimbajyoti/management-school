@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent'
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
            <div class="table-content table-basic mt-20 specific-student" id="specific-student">
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title"> Student list</h4>
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
                                        <td>OneA101</td>
                                        <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                          <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
                                        <td>Three (A)</td>
                                        <td>Parent2</td>
                                        <td>12 Apr 2019</td>
                                        <td>Male</td>
                                        <td>6589326562</td>
                                        <td><span class="badge-basic-success-text">Active</span></td>
                                        <td class="action">
                              <div class="dropdown dropdown-action">
                                  <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                          <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
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
                                        <th class="action">Password</th>
                                        <th class="action">Status</th>
                                        <th class="action">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>20231114</td>
                                            <td>OneA110</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent5</td>
                                            <td>12 Apr 2021</td>
                                            <td>Male</td>
                                            <td>658932654</td>
                                            <td>123456789</td>

                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="row_7">
                                            <td class="serial">2</td>
                                            <td>2023111</td>
                                            <td>OneA110</td>
                                           
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                              <a href="{{ route('admin-student-profile')}}" target="_blank">William</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent8</td>
                                            <td>10 Jan 2024</td>
                                            <td>Male</td>
                                            <td>0147852111</td>
                                            <td>123456789</td>

                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                            <a href="{{ route('edit-student') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
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
                                        <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                          <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
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
                                    <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                      <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
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
                                                    <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="row_7">
                                    <td class="serial">2</td>
                                    <td>2023111</td>
                                    <td></td>
                                    <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                      <a href="{{ route('admin-student-profile')}}" target="_blank">William</a></td>
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
                                                    <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="row_14">
                                  <td class="serial">1</td>
                                  <td>20231114</td>
                                  <td></td>
                                  <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                    <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
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
                $('.specific-student').hide();
            } else if (status == "2") {
                $('.activeStudentList').hide();
                $('.inactiveStudentList').show();
                $('.allStudentList').hide();
                $('.specific-student').hide();
            } else {
                $('.activeStudentList').hide();
                $('.inactiveStudentList').hide();
                $('.allStudentList').show();
                $('.specific-student').hide();
            }
        });
    });
</script>
@endpush

