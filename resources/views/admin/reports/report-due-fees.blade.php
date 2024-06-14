@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'report-due-fees'
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
            <form action="" method="post" id="marksheed" enctype="multipart/form-data" name="marksheed">
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
                        <select class="sections nice-select niceSelect bordered_style wide" name="section">
                          <option value="">
                            Select section *
                          </option>
                        </select>
                      </div>
                      <div class="single_large_selectBox">
                        <select class="fees-masters nice-select niceSelect bordered_style wide" name="fees_master">
                          <option value="">
                            Select Fees Type *
                          </option>
                        </select>
                      </div><button class="btn btn-lg ot-btn-primary" type="submit">Search</button>
                    </div>
                  </div>
                </div>
              </form>
        </div>    
    </div>
</div>
@endsection 


