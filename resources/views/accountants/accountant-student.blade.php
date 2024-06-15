@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'accountant-student'
])
@section('content')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css"> --}}
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
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
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
                        
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Admission NO</th>
                                        <th class="purchase">Roll NO</th>
                                        <th class="purchase">Student name</th>
                                        <th class="purchase">Class (Section)</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Payment Status</th>
                                        <th class="action">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr id="row_7">
                                            <td class="serial">1</td>
                                            <td>20231114</td>
                                            <td>OneA110</td>
                                            
                                            <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                <a href="{{ route('accountant-general-info-student')}}" target="_blank">John</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent5</td>
                                           
                                            <td>658932654</td>
                                            
                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td>
                                                <input type="hidden" name="items[]" value="2">
                                                <input type="hidden" name="students[]" value="2">
                                                <input type="hidden" name="studentsRoll[]" value="2">
                                                <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[1]" value="1">
                                                        <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[1]" value="2">
                                                        <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[1]" value="3" checked>
                                                        <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
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
                                              <a href="{{ route('accountant-general-info-student')}}" target="_blank">William</a></td>
                                            <td>Two (A)</td>
                                            <td>Parent8</td>
                                            
                                            <td>0147852111</td>
                                           
                                            <td><span class="badge-basic-success-text">Active</span></td>
                                            <td>
                                                <input type="hidden" name="items[]" value="2">
                                                <input type="hidden" name="students[]" value="2">
                                                <input type="hidden" name="studentsRoll[]" value="2">
                                                <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[2]" value="1">
                                                        <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[2]" value="2">
                                                        <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center mt-6">
                                                        <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[2]" value="3" checked>
                                                        <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                            <a href="{{ route('view-student') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('Payment Info') }}</a>
                                                        
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
                      
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Admission NO</th>
                                        <th class="purchase">Roll NO</th>
                                        <th class="purchase">Student name</th>
                                        <th class="purchase">Class (Section)</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Payment Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr id="row_14">
                                        <td class="serial">1</td>
                                        <td>20231114</td>
                                        <td>OneA110</td>
                                        <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                          <a href="{{ route('accountant-general-info-student')}}" target="_blank">Herry</a></td>
                                        <td>Three (A)</td>
                                        <td>Parent2</td>
                                      
                                        <td>6589326562</td>
                                        <td><span class="badge-basic-danger-text">Inactive</span></td>
                                        <td>
                                            <input type="hidden" name="items[]" value="2">
                                            <input type="hidden" name="students[]" value="2">
                                            <input type="hidden" name="studentsRoll[]" value="2">
                                            <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                                <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[3]" value="1">
                                                    <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[3]" value="2">
                                                    <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center mt-6">
                                                    <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[3]" value="3" checked>
                                                    <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="action">
                              <div class="dropdown dropdown-action">
                                  <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                          <a href="{{ route('view-payment-info') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('Payment Info') }}</a>
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
                      
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered role-table myTable">
                                <thead class="thead">
                                    <tr>
                                        <th class="serial">SR No.</th>
                                        <th class="purchase">Admission NO</th>
                                        <th class="purchase">Roll NO</th>
                                        <th class="purchase">Student name</th>
                                        <th class="purchase">Class (Section)</th>
                                        <th class="purchase">Parent name</th>
                                        <th class="action">Contact</th>
                                        <th class="action">Status</th>
                                        <th class="action">Payment Status</th>
                                        <th class="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                  <tr id="row_7">
                                    <td class="serial">1</td>
                                    <td>20231114</td>
                                    <td>OneA110</td>
                                    <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                      <a href="{{ route('accountant-general-info-student')}}" target="_blank">John</a></td>
                                    <td>Two (A)</td>
                                    <td>Parent5</td>
                                  
                                    <td>658932654</td>
                                    <td><span class="badge-basic-success-text">Active</span></td>
                                    <td>
                                        <input type="hidden" name="items[]" value="2">
                                        <input type="hidden" name="students[]" value="2">
                                        <input type="hidden" name="studentsRoll[]" value="2">
                                        <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[4]" value="1">
                                                <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[4]" value="2">
                                                <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[4]" value="3" checked>
                                                <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                    <a href="{{ route('view-payment-info') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('Payment Info') }}</a>
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
                                      <a href="{{ route('accountant-general-info-student')}}" target="_blank">William</a></td>
                                    <td>Two (A)</td>
                                    <td>Parent8</td>
                                    
                                    <td>0147852111</td>
                                    <td><span class="badge-basic-success-text">Active</span></td>
                                    <td>
                                        <input type="hidden" name="items[]" value="2">
                                        <input type="hidden" name="students[]" value="2">
                                        <input type="hidden" name="studentsRoll[]" value="2">
                                        <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[5]" value="1">
                                                <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[5]" value="2">
                                                <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                            </div>
                                            <div class="form-check d-flex align-items-center mt-6">
                                                <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[5]" value="3" checked>
                                                <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                    <a href="{{ route('view-payment-info') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('Payment Info') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="row_14">
                                  <td class="serial">1</td>
                                  <td>20231114</td>
                                  <td>OneA110</td>
                                  <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                    <a href="{{ route('accountant-general-info-student')}}" target="_blank">Herry</a></td>
                                  <td>Three (A)</td>
                                  <td>Parent2</td>
                                
                                  <td>6589326562</td>
                                  <td><span class="badge-basic-danger-text">Inactive</span></td>
                                  <td>
                                    <input type="hidden" name="items[]" value="2">
                                    <input type="hidden" name="students[]" value="2">
                                    <input type="hidden" name="studentsRoll[]" value="2">
                                    <div class="remember-me d-flex align-items-center input-check-radio mb-20 gap-4 attendance">
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="payment[6]" value="1">
                                            <label class="form-check-label ms-1" for="flexRadioDefault1"  style="padding-left:3px;">Full Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="payment[6]" value="2">
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault2">Partially Paid</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mt-6">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault3" name="payment[6]" value="3" checked>
                                            <label class="form-check-label ms-1"  style="padding-left:3px;" for="flexRadioDefault3">Unpaid</label>
                                        </div>
                                    </div>
                                </td>
                                  <td class="action">
                                  <div class="dropdown dropdown-action">
                                      <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                              <a href="{{ route('view-payment-info') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('Payment Info') }}</a>
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
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <!-- Include JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
    <!-- Include pdfmake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
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
