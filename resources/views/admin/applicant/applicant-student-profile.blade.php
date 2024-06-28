@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-student-profile'
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Steve Smith</h5>
                    <p class="text-muted mb-1">Contact : 1478523690 </p>
                </div>
            </div>
        </div>
            
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 title">Applicant Information</h4>
                    <a href="{{route('applicant-edit', auth()->guard('webparents')->user()->id)}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-edit"></i> Edit</a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">First Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Steve</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Last Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Smith</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Male</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Admission For</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">One</p>
                        </div>
                       
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Date Of Birth</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">00/00/0000</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Blood Group</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">O+</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Religion</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Hindu</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Category</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">OBC</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Language</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Hindi, English</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Previous School</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Demo</p>
                        </div>
                    </div>
                    <hr>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
