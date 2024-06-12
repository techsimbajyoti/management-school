@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-detail'
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
            <div class="row">
                <div class="col-12">
                  <div class="card ot-card mb-24 position-relative z_1">
                    <form action="" enctype="multipart/form-data" method="post">
                      @csrf
                      <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox">
                            <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                              <option value="">
                                Select class
                              </option>
                              <option selected value="1">
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
                              <option selected value="1">
                                A
                              </option>
                              <option value="2">
                                B
                              </option>
                            </select>
                          </div>
                          <button class="btn btn-lg ot-btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              
              <div class="col-md-12">
                <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList">
                    <div class="card ot-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 title">Student list</h4>
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
                                            {{-- <th class="action">Action</th> --}}
    
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
                                                {{-- <td class="action">
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
                                                </td> --}}
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
                                                {{-- <td class="action">
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
                                            </td> --}}
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
</div>
@endsection 

@push('scripts')
<script>
    $(document).ready(function() {
    var previousState = {};
    
    $('#holiday').change(function() {
      if ($(this).is(':checked')) {
        // Save the state of radio inputs before unchecking them
        $('#students_table input[type="radio"]').each(function() {
          var name = $(this).attr('name');
          previousState[name] = $('input[name="' + name + '"]:checked').val();
        });
        
        // Uncheck all radio inputs
        $('#students_table input[type="radio"]').prop('checked', false);
      } else {
        // Restore the previous state of radio inputs
        $.each(previousState, function(name, value) {
          $('input[name="' + name + '"][value="' + value + '"]').prop('checked', true);
        });
      }
    });
  });
</script>
@endpush
