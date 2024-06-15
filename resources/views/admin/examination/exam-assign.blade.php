@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam-assign'
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
                    <h4 class="mb-0">Exam assign</h4><a href="{{route('add-exam-assign')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-plus"></i> Add</a>
                  </div>
                  <hr>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered role-table myTable">
                        <thead class="thead">
                          <tr>
                            <th class="serial">SR No.</th>
                            <th class="purchase">Exam Title</th>
                            <th class="purchase">Class (Section)</th>
                            <th class="purchase">Subjects</th>
                            <th class="purchase">Total Mark</th>
                            <th class="purchase">Mark Distribution</th>
                            <th class="action">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                          <tr id="row_221">
                            <td class="serial">9</td>
                            <td>Final</td>
                            <td>Three (A)</td>
                            <td>Math</td>
                            <td>100</td>
                            <td>
                              <div class="d-flex align-items-center justify-content-between mt-0">
                                <p>Written</p>
                                <p>100</p>
                              </div>
                            </td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-exam-assign') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr id="row_224">
                            <td class="serial">10</td>
                            <td>Final</td>
                            <td>Three (B)</td>
                            <td>Math</td>
                            <td>100</td>
                            <td>
                              <div class="d-flex align-items-center justify-content-between mt-0">
                                <p>Written</p>
                                <p>100</p>
                              </div>
                            </td>
                            <td class="action">
                                <div class="dropdown dropdown-action">
                                    <button class="btn btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                            <a href="{{ route('edit-exam-assign') }}" class="dropdown-item"><i class="fa fa-edit"></i>  {{ __('Edit') }}</a>
                                            <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>  {{ __('Delete') }}</button>
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
@endsection 

@push('scripts')
    <script>
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

