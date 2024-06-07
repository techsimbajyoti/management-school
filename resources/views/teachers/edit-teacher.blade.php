@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'edit-teacher'
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
                <div class="edit-student">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="title">My Profile</h2>
                            <a class="btn btn-lg ot-btn-primary mb-5" id="student-edit-profile"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
                        </div>
                    </div>
                </div>        
                          
                <div class="row">
                        <div class="col-lg-4">
                            <div class="card" style="margin-bottom: 20px;">
                                <div class="card-body text-center">
                                    <img src="{{ asset('paper') }}/img/dummy-image.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">John Smith</h5>
                                    <p class="text-muted mb-1">Contact : 1478523690</p>
                                    <p class="text-muted mb-1">Department : Science</p>
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
                                            <p class="mb-0">First Name</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">John </p>
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
                                            <p class="mb-0">Father Name </p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">Demo</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mother Name</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">Demo</p>
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
                                            <p class="mb-0">Date Of Birth</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">05 April, 2000</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Contact</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">05 April, 2014</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="mb-0">Emergency Contact</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">147852309</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Current Address</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">Demo</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="mb-0">Permenant Address</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">Demo</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">demo@demo.com</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="mb-0">Marital Status</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="text-muted mb-0">Unmarried</p>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4 class="mb-0">Administrative Information</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Staff Id</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">121</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Department</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">Science</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Joining Date</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">15 july, 2024</p>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Salary</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">demo</p>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>



                        {{-- <div class="profile-body edit-teacher">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="title">My Profile</h2>
                                <a class="btn btn-lg ot-btn-primary mb-5" id="edit-profile"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
                            </div>
                            <div class="profile-body-form">
                                <div class="form-item border-bottom-0 pb-0">
                                    <div class="image-box">
                                    <img id="id-profile-image" class="img-fluid rounded-circle" src="{{ url('paper/img/demo.png') }}" alt="Teacher"></div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">Designations</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Departments</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">First Name</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Last Name</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">Father Name</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Mother Name</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">Email</h2>
                                        <p class="paragraph">demo@demo.com</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Gender</h2>
                                        <p class="paragraph">Demo</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">Date Of Birth</h2>
                                        <p class="paragraph">00/00/0000</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Joining Date</h2>
                                        <p class="paragraph">00/00/0000</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">Phone</h2>
                                        <p class="paragraph">0000000000</p>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="title">Basic salary</h2>
                                        <p class="paragraph">00000</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12 card">
                            <div class="page-content">
                                <div class="profile-content">
                                    <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                                    @include('teachers.edit-teacher-profile')
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
        $('.edit-teacher-profile').hide();

    $('#edit-profile').click(function(){
        $('.edit-teacher-profile').show();
        $('.edit-teacher').hide();
    })

    $('.update-admin-password').click(function(){
        $('.edit-teacher-profile').hide();
        $('.edit-teacher').hide();
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