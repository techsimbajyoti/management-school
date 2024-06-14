@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'lecture-plan'
])
@section('content')
<style>
    .table { width: 100%; }
    .form-control { width: 100%; }
    .fa-calendar, .fa-dollar-sign { margin-left: 5px; cursor: pointer; }
    .hidden { display: none; }
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lecture Plan</h4>
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
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">
                                <h6>Assign Lectures</h6>
                                <a id="add-document" class="btn btn-lg ot-btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="col-12">  
                            <div class="table-responsive">
                                <table class="table school_borderLess_table table_border_hide2 myTable" id="student-document">
                                    <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                        <tr>
                                            <th scope="col">Subject <span class="text-danger"></span></th>
                                            <th scope="col">Day1 <span class="text-danger"></span></th>
                                            <th scope="col">Day2 <span class="text-danger"></span></th>
                                            <th scope="col">Day3 <span class="text-danger"></span></th>
                                            <th scope="col">Day4 <span class="text-danger"></span></th>
                                            <th scope="col">Day5 <span class="text-danger"></span></th>
                                            <th scope="col">Day6 <span class="text-danger"></span></th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                          <div class="col-md-12 mt-24">
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save & Continue') }}</button>
                                    <a href="{{ route('assign-subject') }}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
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

        document.getElementById('add-document').addEventListener('click', function() {
            var tableBody = document.querySelector('#student-document tbody');
            var currentRowCount = tableBody.querySelectorAll('tr').length;

            if (currentRowCount < 10) {
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>
                        <label>Please Select </label>
                        <select class="form-control" name="document_name[]">
                            <option></option>
                            <option>Hindi</option>
                            <option>English</option>
                            <option>Math</option>
                            <option>Science</option>
                            <option>Sports</option>
                            <option>Art</option>
                            <option>Music</option>
                            <option>Bio</option>
                            <option>Chemistry</option>
                            <option>Physics</option>
                            <option>Commerce</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Monday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Tuesday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Wednesday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Thursday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Friday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <input type="checkbox" name="document_file[]" class="toggle-select">
                        <label>Saturday</label>
                        <select class="form-control hidden" name="document_name[]">
                            <option>Lecture No.</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-document">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </td>
                `;

                tableBody.appendChild(newRow);

                // Add event listener for the new checkboxes
                var checkboxes = newRow.querySelectorAll('.toggle-select');
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        var select = this.nextElementSibling.nextElementSibling;
                        if (this.checked) {
                            select.classList.remove('hidden');
                        } else {
                            select.classList.add('hidden');
                        }
                    });
                });
            } else {
                alert('You can only upload a maximum of 10 images.');
            }
        });

        document.querySelector('#student-document').addEventListener('click', function(e) {
            if (e.target && e.target.matches('button.remove-document, button.remove-document *')) {
                var row = e.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });

        // Add event listener for existing checkboxes
        document.querySelectorAll('.toggle-select').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var select = this.nextElementSibling.nextElementSibling;
                if (this.checked) {
                    select.classList.remove('hidden');
                } else {
                    select.classList.add('hidden');
                }
            });
        });

    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2); // Add leading zero
        var day = ('0' + today.getDate()).slice(-2); // Add leading zero

        var currentDate = year + '-' + month + '-' + day;
        document.getElementById('admission_date').value = currentDate;
    });

    </script>
@endpush
