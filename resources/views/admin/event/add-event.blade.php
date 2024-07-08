@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-event'
])
@section('content')
<style>
    input#exampleDataList {
    margin-left: 10px;
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add Event</h4>
                    @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                    <a href="{{ route('admin-event') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                    <a href="{{ route('teacher-event') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    @endif
                    
                </div>
                <hr>
                <div class="card-body">
                  <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event Name <span class="fillable">*</span></label> 
                            <input class="nice-select bordered_style wide" name="event" list="datalistOptions" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event Place <span class="fillable">*</span></label> 
                            <input class="nice-select bordered_style wide" name="event" list="datalistOptions" type="text" placeholder="Enter name" value="">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Event For <span class="fillable">*</span></label> 
                            <br><input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                            <label for="">All</label>
                            <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                            <label for="">Students</label>
                            <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                            <label for="">Teachers</label>
                            <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                            <label for="">Parents</label>
                            <input name="event" list="datalistOptions" id="exampleDataList" type="radio" placeholder="Enter name" value="">
                            <label for="">Open Event</label>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Event Poster <span class="text-info">(Accepted Images: jpg,jpeg,png.Max file size 2Mb)</span> <span class="fillable">*</span></label>
                            <input class="form-control ot-input" name="event_date" list="datalistOptions" type="file" value="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                            <select class="nice-select bordered_style wide" name="event_date" list="datalistOptions" type="date" value="">
                            <option value="">Active</option>
                            <option value="">Inactive</option>
                            </select>
                            </div>

                          <hr style="margin-top: 50px">
                            <div class="col-md-12 d-flex justify-content-between align-items-center" style="margin-top:30px;">

                                <h5>Add Date & Time</h5>
                                <a id="add-document" class="btn btn-lg ot-btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                                </a>
                            </div>

                              <div class="col-md-12">
                                  <div class="table-responsive">
                                      <table class="table school_borderLess_table table_border_hide2" id="student-document">
                                          <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                              <tr>
                                                  <th scope="col">Date <span class="text-danger"></span></th>
                                                  <th scope="col">Start Time <span class="text-danger"></span></th>
                                                  <th scope="col">End Time <span class="text-danger"></span></th>
                                                  <th scope="col">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>

                         

                          <div class="col-md-12 mb-3">
                            <label for="exampleDataList" class="form-label">Event Description<span class="fillable">*</span></label> 
                            <textarea id="editor" name="event" class="form-control ot-input" placeholder="Enter description"></textarea>
                          </div>

                          <div class="col-md-12 mt-24">
                            <div class="text-right">
                              @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                              <a href="{{ route('admin-event') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</a>
                              @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                              <a href="{{ route('teacher-event') }}" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> Submit</a>
                              @endif
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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  // Initialize CKEditor
  CKEDITOR.replace('editor');

  document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="date" class="form-control" name="document_name[]">
            </td>
            <td>
                <input type="time" class="form-control" name="document_file[]">
            </td>
            <td>
                <input type="time" class="form-control" name="document_file[]">
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-document">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </td>
        `;

        tableBody.appendChild(newRow);
    });

    document.querySelector('#student-document tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-document')) {
            event.target.closest('tr').remove();
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
