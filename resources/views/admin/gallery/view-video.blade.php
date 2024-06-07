@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'gallery-category'
])

@section('content')
<style>
    .gallery img {
        width: 200px;
        height: auto;
        margin: 10px;
        cursor: pointer;
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
                @include('admin.gallery.view-video-all')
            </div>
        </div>
    </div>
@endsection

