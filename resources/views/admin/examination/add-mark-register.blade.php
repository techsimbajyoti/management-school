@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mark-register'
])
@section('content')
<style>
    #students_table {
      border-collapse: collapse; /* Ensure borders don't double up */
      width: 100%;
    }

    #students_table thead th,
    #students_table tbody td {
      border: 1px solid gray !important; /* Apply border to table headers and cells */
    }

    #students_table thead {
      border-bottom: 1px solid gray; /* Optional: thicker border for header */
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
            <div class="card ot-card">
                <div class="card-body">
                  <form action="https://school.onesttech.com/marks-register/store" enctype="multipart/form-data" method="post" id="markRegister" name="markRegister">
                    <input type="hidden" name="_token" value="BkXIX47epMX3Dypk06ErAL4Tom5pQWjgTASJv7o8">
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> 
                            <select class="nice-select niceSelect bordered_style wide class" name="class" id="getSections" aria-describedby="validationServer04Feedback">
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
                          <div class="col-md-3 mb-3">
                            <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> 
                            <select class="nice-select niceSelect sections bordered_style wide section" name="section" id="validationServer04" aria-describedby="validationServer04Feedback">
                              <option value="">
                                Select section
                              </option>
                            </select>
                          </div>
                          <div class="col-lg-3">
                            <label for="validationServer04" class="form-label">Exam Type <span class="fillable">*</span></label> 
                            <select class="exam_types nice-select niceSelect bordered_style wide" name="exam_type">
                              <option value="">
                                Select Exam Type
                              </option>
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationServer04" class="form-label">Subject <span class="fillable">*</span></label> 
                            <select class="nice-select niceSelect subjects bordered_style wide" name="subject" id="validationServer04" aria-describedby="validationServer04Feedback">
                              <option value="">
                                Select Subject
                              </option>
                              <option value="">Math</option>
                              <option value="">English</option>
                            </select>
                          </div>
                          <div class="col-md-12 mt-24">
                            <div class="table-responsive">
                              <table class="table table-bordered role-table" id="students_table">
                                <thead class="thead">
                                  <tr>
                                    <th>Student name</th>
                                    <th>Total Mark</th>
                                    <th>Mark Distribution</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12 mt-24">
                            <div class="text-right">
                              <button class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
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