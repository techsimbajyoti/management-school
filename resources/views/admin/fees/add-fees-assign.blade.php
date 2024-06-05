@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fees-assign'
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
                <div class="card ot-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Add Assign</h4>
                        <a href="{{ route('assign') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                           @csrf
                            <div class="row mb-3">
                                
                                <div class="col-md-4 mb-3">
                                  <label for="validationServer04" class="form-label">Fees group <span class="fillable">*</span></label> 
                                  <select id="fees_group" class="nice-select niceSelect bordered_style wide" name="fees_group" aria-describedby="validationServer04Feedback">
                                    <option value="">
                                      Select fees group
                                    </option>
                                    <option value="1">
                                      Monthly fees
                                    </option>
                                    <option value="2">
                                      Exam fees
                                    </option>
                                  </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> 
                                  <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class" aria-describedby="validationServer04Feedback">
                                    <option value="">
                                      Select class
                                    </option>
                                    <option value="2">
                                      Two
                                    </option>
                                  </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> 
                                  <select id="section" class="sections nice-select niceSelect bordered_style wide" name="section" aria-describedby="validationServer04Feedback">
                                    <option value="">
                                      Select section
                                    </option>
                                  </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <div>
                                    <label for="validationServer04" class="form-label">Gender</label> <select id="gender" class="nice-select gender niceSelect bordered_style wide" name="gender">
                                      <option value="">
                                        Select gender
                                      </option>
                                      <option value="1">
                                        Male
                                      </option>
                                      <option value="2">
                                        Female
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <div>
                                    <label for="validationServer04" class="form-label">Student Category</label> <select id="student_category" class="nice-select student_category niceSelect bordered_style wide" name="student_category">
                                      <option value="">
                                        Seelct student category
                                      </option>
                                      <option value="1">
                                        Regular
                                      </option>
                                      <option value="2">
                                        Eregular
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <h6>Fees Types</h6>
                                    <div class="table-responsive">
                                      <input type="hidden" id="page" value="create">
                                      <table class="table table-bordered role-table" id="types_table">
                                        <thead class="thead">
                                          <tr>
                                            <th class="purchase"><input type="checkbox" id="all_fees_masters"></th>
                                            <th class="purchase">Name</th>
                                            <th class="purchase">Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody id="student-fees">
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>january months fee</td>
                                                <td>1000.00</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>february month fee</td>
                                                <td>1000.00</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>march months fee</td>
                                                <td>1000.00</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>

                                  <div class="col-md-12 mb-3">
                                    <h6>Students List</h6>
                                    <div class="table-responsive">
                                      <table class="table table-bordered role-table" id="students_table">
                                        <thead class="thead">
                                          <tr>
                                            <th class="purchase"><input type="checkbox" id="all_students"></th>
                                            <th class="purchase">Admission NO</th>
                                            <th class="purchase">Student name</th>
                                            <th class="purchase">Class (Section)</th>
                                            <th class="purchase">Guardian name</th>
                                            <th class="purchase">Mobile number</th>
                                          </tr>
                                        </thead>
                                        <tbody id="student-list">
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>2023111</td>
                                                <td>Student 111</td>
                                                <td>Two (A)</td>
                                                <td>Guardian8</td>
                                                <td>0147852111</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>2023111</td>
                                                <td>Student 112</td>
                                                <td>Two (A)</td>
                                                <td>Guardian8</td>
                                                <td>0147852111</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>2023111</td>
                                                <td>Student 113</td>
                                                <td>Two (A)</td>
                                                <td>Guardian8</td>
                                                <td>0147852111</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>

                              <div class="col-md-12 mt-24">
                                <div class="text-right">
                                  <a class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</a>
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
        $('#student-fees').hide();
        $('#student-list').hide();

        $('#fees_group').click(function(){
            $('#student-fees').show();
        })

        $('#section').click(function(){
            $('#student-list').show();
        })

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