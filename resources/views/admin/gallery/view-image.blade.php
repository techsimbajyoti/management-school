@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gallery-category'
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
                <div class="table-content table-basic mt-20">
                    <div class="card ot-card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Annual Function</h4>
                        <a href="{{route('gallery-category')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                      </div>
                      <hr>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('paper') }}/img/environment.jpeg" width="100%" alt="image">
                                    </div>
                                    <div class="card-footer text-center">
                                        Word Environment Day
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('paper') }}/img/oceans.jpeg" width="100%" alt="image">
                                    </div>
                                    <div class="card-footer text-center">
                                        Word Oceans Day
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('paper') }}/img/milk.jpeg" width="100%" alt="image">
                                    </div>
                                    <div class="card-footer text-center">
                                        World Milk Day
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('paper') }}/img/blood.jpeg" width="100%" alt="image">
                                    </div>
                                    <div class="card-footer text-center">
                                        World Blood Donor Day
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
