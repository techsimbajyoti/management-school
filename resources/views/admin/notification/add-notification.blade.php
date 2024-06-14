@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'notification'
])

@section('content')
<style>
    :root {
    --ot-border-primary: #cdcece; /* A shade of blue */
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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-5 title">{{ __('Add Notification') }}</h3>
                        </div>
                    </div>
                    <form action="" method="" enctype="multipart/form-data" >
                        @csrf
                        <div class="card ot-card">
                            <div class="card-header">
                                <h6 class="card-title">{{ __('Please include a new message here to send a notification.') }}</h6>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Notification Title :</label>
                                        <input type="text" class="form-control" placeholder="Notification Title" name="title">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer04" class="form-label">Status <span class="fillable">*</span></label>
                                        <select class="nice-select bordered_style wide" name="event_date" list="datalistOptions" type="date" value="">
                                        <option value="">Active</option>
                                        <option value="">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Subject <span class="fillable">*</span></label>
                                        <input class="form-control" placeholder="Add Subject" name="title">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer04" class="form-label"> Date <span class="fillable">*</span></label>
                                        <input type="date" class="form-control" placeholder="Notification Title" name="date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Recipients <span class="fillable">*</span></label>
                                        <select class="nice-select bordered_style wide" name="event_date" list="datalistOptions" type="date" value="">
                                            <option value="">--Select Recipients--</option>
                                            <option value="">Students</option>
                                            <option value="">Parents</option>
                                            <option value="">Staff</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Attachments</label>
                                        <input type="file" class="form-control" placeholder="Add Attatchment" name="date">  
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="exampleDataList" class="form-label">Add Message<span class="fillable">*</span></label> 
                                    <textarea id="editor" name="event" class="form-control ot-input" placeholder="Enter description"></textarea>
                                  </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>   
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  
  CKEDITOR.replace('editor');
  </script>
  @endpush