@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-profile'
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
                        @php
                            $applicant_profile = App\Models\StudentParent::where('id', auth()->guard('webparents')->user()->id)
                            ->first();
                        @endphp
                        @if($applicant_profile->image)
                        <img src="{{ url('storage/student_photos/' . $applicant_profile->image) }}" height="100px" width="100px" readonly>
                        @else
                        <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @endif
                        <h5 class="my-3">{{ $applicant_profile->father_name }}</h5>
                        <p class="text-muted mb-1">Contact : {{ $applicant_profile->father_mobile }} </p>
                    </div>
                </div>
            </div>
                
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 title">Parent Information</h4>
                        <a href="{{route('applicant-edit', auth()->guard('webparents')->user()->id)}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Parent Name</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="text-muted mb-0">{{ $applicant_profile->father_name }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="mb-0">Parent Profession</p>
                            </div>
                            <div class="col-sm-3">
                                @if($applicant_profile->father_profession !== null)
                                <p class="text-muted mb-0">{{ $applicant_profile->father_profession }}</p>
                                @else
                                <p class="text-muted mb-0"></p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Parent Email </p>
                            </div>  
                            <div class="col-sm-3">
                                <p class="text-muted mb-0">{{ $applicant_profile->email }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="mb-0">Contact Number</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="text-muted mb-0">{{ $applicant_profile->father_mobile }}</p>
                            </div>
                           
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">User Name</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="text-muted mb-0">{{ $applicant_profile->username }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="mb-0">Password</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="text-muted mb-0">{{ $applicant_profile->password }}</p>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
       

</div>
@endsection 

