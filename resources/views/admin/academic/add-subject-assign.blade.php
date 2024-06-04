@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-subject-assign'
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
                    <h4 class="mb-0">Assign Subject </h4>
                    <a href="{{ route('assign-subject') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer04" class="form-label">Class <span class="fillable">*</span></label>
                                <select id="getSections" class="nice-select select-class niceSelect bordered_style wide " name="class" aria-describedby="validationServer04Feedback">
                                <option value>Select class</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four A</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div id="show_sections">
                                <label for="validationServer04" class="form-label">Section <span class="fillable">*</span></label>
                                <select class="nice-select niceSelect bordered_style sections wide " name="section" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value>Select section</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                                <select class="nice-select niceSelect bordered_style wide " name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="1">Active</option>
                                <option value="0">Inactive
                                </option>
                                </select>
                            </div>
                          <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Subject <span class="fillable">*</span></label> 
                                <select class="nice-select bordered_style wide" name="subjects" id="subject2" required="">
                                    <option value="">Select Subject</option>
                                    <option value="2">English</option>
                                    <option value="3">Math</option>
                                    <option value="4">Physics</option>
                                    <option value="5">Chemistry</option>
                                    <option value="6">Biology</option>
                                    <option value="7">Higher Math</option>
                                    <option value="8">Information &amp; Technology</option>
                                </select>
                          </div>
                          <div class="col-md-6">
                            <label for="validationServer04" class="form-label">Teacher <span class="fillable">*</span></label> 
                            <select class="nice-select bordered_style wide" name="teachers[]" id="teacher2" required="">
                                <option value="">Select teacher</option>
                                <option value="1">Teacher 1</option>
                                <option value="2">Teacher 2</option>
                        </select>
                          </div>
                          <div class="col-md-12 mt-24">
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save $ Continue') }}</button>
                                    <a href="{{ route('assign-subject') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                                </div>
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