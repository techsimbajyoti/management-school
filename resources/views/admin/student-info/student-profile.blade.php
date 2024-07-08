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
     @include('admin.student-info.profile-inc')
    </div>
</div>
@endsection
