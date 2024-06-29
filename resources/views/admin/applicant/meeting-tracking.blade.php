@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-tracking'
])
@section('content')
<style>
    .stepper-wrapper {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        position: relative;
    }
    .stepper-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        position: relative;
    }
    .stepper-item::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 50%;
        width: 100%;
        border-bottom: 2px solid #ccc;
        z-index: 1;
    }
    .stepper-item:first-child::before {
        left: 0;
        width: 50%;
    }
    .stepper-item:last-child::before {
        content: none;
    }
    .stepper-item .step-counter {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
        margin-bottom: 6px;
    }
    .stepper-item.active .step-counter {
        background-color: #007bff;
        color: #fff;
    }
    .stepper-item.completed .step-counter {
        background-color: #2c5f14;
        color: #fff;
        font-weight: bold;
    }
    .stepper-item.completed::before {
        border-bottom-color: #2c5f14;
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
        <div class="col-12 search-form">
            <form action="" method="" id="marksheed" enctype="multipart/form-data" name="marksheed">
              @csrf
              <div class="card ot-card mb-24 position-relative z_1">
                <div class="card-header d-flex align-items-center gap-4 flex-wrap">
                  <h3 class="mb-0">Filtering</h3>
                  <div class="card_header_right d-flex align-items-center gap-3 flex-fill justify-content-end flex-wrap">
                    <div class="single_large_selectBox">
                      <input type="text" placeholder="Search By Applicant Name" class="class nice-select niceSelect bordered_style wide" name="view">
                    </div>
                    <button class="btn btn-lg ot-btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
  
        <div class="col-md-12 search-form">
            <div class="card ot-card">
                <div class="card-header">
                    <h4>Application Status</h4>
                </div>
                <hr>
                <div class="card-body">
                    @php
                        $stepCounter = 1;
                    @endphp
                    <div class="row">
                        @foreach($steps as $step)
                            <div class="col-md-4">
                                <div class="stepper-wrapper">
                                    <div class="stepper-item {{ $step['status'] }}">
                                        <div class="step-counter">{{ $stepCounter }}</div>
                                        <div class="step-name">{{ $step['name'] }}</div>
                                        <div class="step-date">{{ $step['date'] }}</div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $stepCounter++;
                            @endphp
                            @if($stepCounter % 3 == 1)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
