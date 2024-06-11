@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'image'
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
                        <h4 class="mb-0">Add Images</h4>
                        @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                        <a href="{{route('image')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                        <a href="{{route('teacher-image')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        @endif
                       
                    </div>
                    <hr>
                    <div class="card-body">
                      <form action="" enctype="multipart/form-data" method="" id="visitForm" name="visitForm">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="validationServer04" class="form-label">Gallery Category <span class="fillable">*</span></label> 
                                <select class="nice-select niceSelect bordered_style wide" name="category" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option value="">
                                    Select Category
                                  </option>
                                  <option value="1">
                                    Admission
                                  </option>
                                  <option value="2">
                                    Annual Program
                                  </option>
                                  <option value="3">
                                    Awards
                                  </option>
                                  <option value="4">
                                    Curriculum
                                  </option>
                                  <option value="5">
                                    wqwqwq
                                  </option>
                                </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="status" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option value="1">
                                    Active
                                  </option>
                                  <option value="0">
                                    Inactive
                                  </option>
                                </select>
                              </div>

                              <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">
                                  <h5>Upload Images</h5>
                                  <a id="add-document" class="btn btn-lg ot-btn-primary">
                                      <i class="fa fa-plus" aria-hidden="true"></i> Add
                                  </a>
                                </div>
                                <p class="text-info">Accepted Images : jpeg, jpg, png, svg and Max file size is 2Mb</p>
                              </div>

                              <div class="col-md-12">
                                <div class="table-responsive">
                                  <table class="table school_borderLess_table table_border_hide2" id="student-document">
                                      <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                          <tr>
                                              <th scope="col">Name <span class="text-danger"></span></th>
                                              <th scope="col">Images <span class="text-danger"></span></th>
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
                                    <a class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save $ Continue') }}</a>

                                    @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                    <a href="{{route('image')}}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                                    @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                    <a href="{{route('teacher-image')}}" class="btn btn-lg ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</a>
                                    @endif
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
        
        document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var currentRowCount = tableBody.querySelectorAll('tr').length;

        if (currentRowCount < 10) {
            var newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td>
                    <input type="text" class="form-control" name="document_name[]" placeholder="Enter Image Name">
                </td>
                <td>
                    <input type="file" class="form-control" name="document_file[]">
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-document">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </td>
            `;

            tableBody.appendChild(newRow);
        } else {
            alert('You can only upload a maximum of 10 images.');
        }
    });

    // Optional: Adding event listener for remove buttons
    document.querySelector('#student-document').addEventListener('click', function(e) {
        if (e.target && e.target.matches('button.remove-document, button.remove-document *')) {
            var row = e.target.closest('tr');
            row.parentNode.removeChild(row);
        }
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






                               
                               
