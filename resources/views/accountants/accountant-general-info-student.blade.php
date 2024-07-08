@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'accountant-student'
])

@section('content')
<style>
    :root {
    --ot-border-primary: #cdcece; /* A shade of blue */
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
                <div class="col-12">
                    <div class="card ot-card mb-24 position-relative z_1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="title mb-0">View Student Details</h3>
                        <a href="{{ route('accountant-student')}}" class="btn btn-lg ot-btn-primary mb-4">
                            <span><i class="fa fa-arrow-left"></i> Back</span>
                        </a>
                        </div>
                    </div>
                </div>
                @include('admin.student-info.profile-inc')
            </div>
 @endsection           
 