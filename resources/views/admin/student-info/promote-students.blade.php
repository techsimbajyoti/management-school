@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'promote-student'
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
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Promote students</h4>
                  </div>
                  <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                     @csrf
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label> <select id="getSections" class="nice-select niceSelect bordered_style wide" name="class">
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
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label> <select class="sections nice-select niceSelect bordered_style wide" name="section">
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
                            <option selected value="1">
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
                            <option selected value="1">
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
                            <option selected value="1">
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
                    <hr>
                    <form action="" method="post" class="student-disabled-list">
                        <div class="table-responsive mb-3">
                          <table class="table table-bordered">
                            <thead class="thead">
                              <tr>
                                <th>
                                  <div class="">
                                    <div class="">
                                      <input type="checkbox">
                                    </div>
                                  </div>
                                </th>
                                <th class="purchase">Admission no</th>
                                <th class="purchase">Student Name</th>
                                <th class="purchase">Guardian Name</th>
                                <th class="purchase">Mobile Number</th>
                                <th class="purchase">Result</th>
                                <th class="purchase">Roll</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                                
                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-12">
                          <div class="text-right">
                            <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Promote</button>
                          </div>
                        </div>
                      </form>
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

            // var sections = {
            //     1: ["A", "B", "C"],
            //     2: ["D", "E"],
            //     3: ["F", "G", "H", "I"]
            // };

            // $('#getSections').change(function() {
            //     var classId = $(this).val();
            //     var $sectionsDropdown = $('.sections');
            //     $sectionsDropdown.empty();
            //     $sectionsDropdown.append('<option value="">Select section</option>');

            //     if (sections[classId]) {
            //         sections[classId].forEach(function(section) {
            //             $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
            //         });
            //     }
            // });

            $('.search-student').click(function(){
                $('.student-disabled-list').show();
            })
        });
    </script>
@endpush