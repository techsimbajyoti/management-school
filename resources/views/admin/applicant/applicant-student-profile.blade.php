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
                    @if($StudentView->image)
                    <img src="{{ url('storage/student_photos/' . $StudentView->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    @else
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    @endif
                    <h5 class="my-3">{{ $StudentView->first_name }} {{ $StudentView->last_name }}</h5>
                    <p class="text-muted mb-1">Class : {{ $StudentView->class }} </p>
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
                            <p class="text-muted mb-0">{{ $StudentView->first_name }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Last Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->last_name }}</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->gender }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Admission For</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->class }}</p>
                        </div>
                       
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Date Of Birth</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->date_of_birth }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Blood Group</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->blood_group }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Religion</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->religion }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Category</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->category }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Language</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->language }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="mb-0">Previous School</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">{{ $StudentView->previous_school }}</p>
                        </div>
                    </div>
                    <hr>
                </div>
                
            </div>
        </div>

        <div class="col-md-4" style="margin-top: -180px;">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Documents Uploaded</h4>
                </div>
                <hr>
                <div class="card-body p-0">
                    @php
                         $documents = json_decode($StudentView->document, true);
                    @endphp
                     <ul class="list-group list-group-flush rounded-3">
                        @foreach($documents as $document)
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">{{ $document['name'] }}</p>
                                <a href="{{ url('storage/student_documents/' . $document['file']) }}" class="btn ot-btn-primary" download>
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
