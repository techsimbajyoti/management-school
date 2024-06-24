@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'meeting-tracking'
])
@section('content')
<style>
    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
    }
    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }
    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }
    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
    }
    .stepper-item.active {
        font-weight: bold;
    }
    .stepper-item.completed .step-counter {
        background-color: #4bb543;
    }
    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #4bb543;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }
    .stepper-item:first-child::before {
        content: none;
    }
    .stepper-item:last-child::after {
        content: none;
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
                      <input type="text" placeholder="Search By Applicant Id" class="class nice-select niceSelect bordered_style wide" name="view">
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
                    {{-- <div class="stepper-wrapper">
                        <div class="stepper-item completed">
                          <div class="step-counter">1</div>
                          <div class="step-name">New</div>
                          <div class="step-name">00/00/0000</div>
                        </div>
                        <div class="stepper-item completed">
                            <div class="step-counter">1</div>
                            <div class="step-name">New</div>
                            <div class="step-name">00/00/0000</div>
                        </div>
                    </div> --}}
                    <div class="row">
                        @php
                            $stepCounter = 1;
                        @endphp
                        @foreach($steps as $step)
                            @if($step['status'])
                                <div class="col-md-4">
                                    <div class="stepper-wrapper">
                                    <div class="stepper-item {{ $step['status'] }}">
                                        <div class="step-counter">{{ $stepCounter }}</div>
                                        <div class="step-name">{{ $step['name'] }}</div>
                                        <div class="step-name">{{ $step['date'] }}</div>
                                    </div>
                                    </div>

                                    @php
                                        $stepCounter++;
                                    @endphp
                                </div>
                                @if($stepCounter % 3 == 1)
                                    </div><div class="row">
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
