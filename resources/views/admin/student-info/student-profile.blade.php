@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-profile'
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
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">John Smith</h5>
                    <p class="text-muted mb-1">Admission No : 1256</p>
                    <p class="text-muted mb-4">Roll No : 4554</p>
                </div>
            </div>
    
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Documents Uploaded</h4>
                </div>
                <hr>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Transfer Certificate</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Attested Copy of Adhaar Card</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">Previous Year Marksheet</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    
    
    
        <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">General Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">John Smith</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Class </p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Two</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Section</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">A</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Date Of Birth</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">05 April, 2014</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Admission Date</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">12 Aug, 2021</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Parent Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Steve Smith</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Contact Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Country</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">United States Of America</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">State</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">California</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">City</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">San Francisco</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Pin Code</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">125896</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(097) 234-5678</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Alternative Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">(098) 765-4321</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">example@example.com</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
