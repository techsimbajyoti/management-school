@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'report-marksheet'
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
            <div class="row">
                <div class="col-12">
                  <form action="" method="post" id="marksheet" enctype="multipart/form-data" name="marksheet">
                    @csrf
                    <div class="card ot-card mb-24 position-relative z_1">
                      <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                        <h3 class="mb-0">Filtering</h3>
                        <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                          <div class="single_large_selectBox">
                            <select id="getSections" class="class nice-select niceSelect bordered_style wide" name="class">
                              <option value="">
                                Select class *
                              </option>
                              <option value="2">
                                Two
                              </option>
                            </select>
                          </div>
                          <div class="single_large_selectBox">
                            <select class="sections section nice-select niceSelect bordered_style wide" name="section">
                              <option value="">
                                Select section *
                              </option>
                            </select>
                          </div>
                          <div class="single_large_selectBox">
                            <select class="nice-select niceSelect bordered_style wide exam_types" name="exam_type">
                              <option value="">
                                Select Exam Type *
                              </option>
                            </select>
                          </div>
                          <div class="single_large_selectBox">
                            <select class="students nice-select niceSelect bordered_style wide" name="student">
                              <option value="">
                                Select student *
                              </option>
                            </select>
                          </div><button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
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


