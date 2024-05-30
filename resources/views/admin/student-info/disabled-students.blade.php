@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'disabled-student'
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
            <div class="table-content table-basic mt-20">
                <div class="card ot-card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Disabled students</h4>
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
                            <th class="purchase">Guardian name</th>
                            <th class="purchase">Date of birth</th>
                            <th class="purchase">Gender</th>
                            <th class="purchase">Mobile number</th>
                            <th class="purchase">Status</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_14">
                            <td class="serial">1</td>
                            <td class="serial">20231114</td>
                            <td class="serial"></td>
                            <td>
                              <div class="">
                                <a href="">
                                <div class="user-card">
                                  <div class="user-info">
                                    Student 1114
                                  </div>
                                </div></a>
                              </div>
                            </td>
                            <td>Two (A)</td>
                            <td>Guardian5</td>
                            <td>12 Apr 2021</td>
                            <td>Male</td>
                            <td>01478521114</td>
                            <td><span class="badge-basic-success-text">Active</span></td>
                            {{-- <td class="action">
                              <div class="dropdown dropdown-action">
                                <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="https://school.onesttech.com/student/edit/98">Edit</a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('student/delete', 98)"><span>Delete</span></a>
                                  </li>
                                </ul>
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
@endsection 

@push('scripts')
    <script>
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