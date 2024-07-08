@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-profile'
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
        @include('students.parent-profile')
       
      </div>
    </div>
@endsection

