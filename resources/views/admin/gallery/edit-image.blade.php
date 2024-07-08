@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'edit-image'
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
                        <h4 class="mb-0">Edit Images</h4><a href="{{route('image')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <hr>
                    <div class="card-body">
                      <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="validationServer04" class="form-label">Gallery category <span class="fillable">*</span></label> <select class="nice-select niceSelect bordered_style wide" name="category" id="validationServer04" aria-describedby="validationServer04Feedback">
                                  <option value="">
                                    Select Category
                                  </option>
                                  <option value="2">
                                    Annual Program
                                  </option>
                                  <option value="3">
                                    Awards
                                  </option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleDataList" class="form-label">Image (335 x 405 px) <span class="fillable">*</span></label>
                                <div class="ot_fileUploader left-side mb-3">
                                  <input class="form-control" type="text" placeholder="Image" readonly id="placeholder"> <button class="primary-btn-small-input" type="button"><label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label> <input type="file" class="d-none form-control" name="image" accept="image/*" id="fileBrouse"></button>
                                </div>
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
                              <div class="col-md-12 mt-24">
                                <div class="text-right">
                                  <a href="{{route('image')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> Update</a>
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
