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
                    <form action="" method="post" id="marksheed" enctype="multipart/form-data">
                        @csrf
                        <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0 title">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                        <div class="single_large_selectBox">
                        <input class="form-control ot-input" name="keyword" list="datalistOptions" id="exampleDataList" placeholder="Enter keyword" value>
                        </div>
                        <button class="btn btn-lg ot-btn-info" type="submit">
                            <i class="fa fa-search"></i> Search
                        </button>
                        </div>
                        </div>
                        </div>
                    </form>
                
                    <div class="table-content table-basic mt-20">
                        <div class="card ot-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 title">Parents list</h4><a href="{{ route('admit-parents') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered role-table">
                                        <thead class="thead">
                                            <tr>
                                            <th class="serial">SR No.</th>
                                            <th class="purchase">Name</th>
                                            <th class="purchase">Phone</th>
                                            <th class="purchase">Email</th>
                                            <th class="purchase">Password</th>
                                            <th class="purchase">Relation</th>
                                            <th class="purchase">Childern Details</th>
                                            <th class="purchase">Address</th>
                                            <th class="purchase">Status</th>
                                            <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            <tr id="row_7">
                                                <td class="serial">1</td>
                                                <td>
                                                <div class>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalCustomizeWidth" id="myBtn">
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
                                                <td>12365857</td>
                                                <td>
                                                    parent@gmail.com
                                                </td>
                                                <td>123456789</td>
                                                <td>Father</td>
                                                <td>
                                                <a href="specific-student" class="btn ot-btn-primary"><i class="fa fa-eye"></i> Childern</a>
                                                    </td>
                                                <td>Dhaka</td>
                                                <td><span class="badge-basic-success-text">Active</span></td>
                                                <td class="action">
                                                    <div class="dropdown dropdown-action">
                                                        <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                <a href="{{ route('view-parents') }}" class="dropdown-item"><i class="fa fa-eye"></i>  {{ __('View') }}</a>
                                                                <a href="{{ route('edit-parents') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                                                <a href="{{ route('delete-parents') }}" class="dropdown-item"><i class="fa fa-trash"></i>  {{ __('Delete') }}</a>
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

  // Get the modal
  var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var span1 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

btn1.onclick = function() {
  modal1.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>
@endpush