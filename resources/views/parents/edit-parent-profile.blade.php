
@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
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
        <div class="edit-parent-profile">
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="title">My Profile</h2>
            <a class="btn btn-lg ot-btn-primary mb-5" id="edit-parent"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
        </div>
       </div>
       <div class="row">
     
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Steve Smith</h5>
                    <p class="text-muted mb-1">Contact : 1478523690 </p>
                    
                </div>
            </div>
        </div>
            
        <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">Father Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Steve Smith</p>
                        </div>
                        
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">25147820</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Father Nationality</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo</p>
                        </div>
                        
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">Sohpia Steve</h5>
                    <p class="text-muted mb-1">Contact : 123654987 </p>
                    
                </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 class="mb-0">Mother Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Name</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Sohpia Steve</p>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Contact </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">123654987</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Email</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-3">
                            <p class="mb-0">Mother Profession</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-muted mb-0">Doctor</p>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body text-center">
                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">demo</h5>
                    <p class="text-muted mb-1">Contact : 25635256 </p>
                    <p class="text-muted mb-1">Guardian Relation : Uncle </p>
                    
                </div>
            </div>
        
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Guardian Information</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">25635256</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">demo@demo.com</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Profession</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Professor</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Bay Area,San Francisco
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Guardian Relation</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">Uncle</p>
                        </div>
                    </div>
                    <hr>
                   
                    
                </div>
            </div>
        </div>
      </div>
        </div>
        <div class="row">
            <div class="col-md-12 card">
            <div class="page-content">
                <div class="profile-content">
                    <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                        
                        

                        @include('parents.edit-parent')
                        @include('admin.change-password')
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.change-password').hide();
        $('.edit-parent').hide();

    $('#edit-parent').click(function(){
        $('.edit-parent-profile').hide();
        $('.edit-parent').show();
        $('.change-password').hide();
    })

    $('.update-admin-password').click(function(){
        $('.edit-parent-profile').hide();
        $('.edit-parent').hide();
        $('.change-password').show();

    })

    $('.nav-link').click(function() {
            // Remove active class from all buttons
            $('.nav-link').removeClass('active');
            // Add active class to the clicked button
            $(this).addClass('active');
        });
});
</script>
@endpush