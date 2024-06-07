@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parents'
])
@section('content')
<style>
  input#exampleDataList {
  margin-left: 10px;
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
        <div class="col-md-12">
               @include('students.parent-profile')
        </div>    
    </div>
</div>
@endsection 
