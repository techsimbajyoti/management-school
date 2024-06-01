
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
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
            <div class="col-md-12 card">
                <div class="page-content">
                <div class="profile-content">
                    <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                        <div class="profile-menu">
                            <div class="profile-menu-head">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img class="img-fluid rounded-circle" src="{{ url('paper/img/demo.png') }}" alt="Admin"></div>
                                <div class="flex-grow-1">
                                <div class="body">
                                    <h2 class="title">Admin</h2>
                                    <p class="paragraph">Admin</p>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="profile-menu-body">
                                <nav>
                                    <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="">My Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link update-admin-password">Update Password</a>
                                    </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="profile-body edit">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="title">My Profile</h2>
                                <a class="btn btn-lg ot-btn-primary mb-5" id="edit-admin-profile"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
                            </div>
                            <div class="profile-body-form">
                            <div class="form-item border-bottom-0 pb-0">
                                <div class="image-box">
                                <img id="id-profile-image" class="img-fluid rounded-circle" src="{{ url('paper/img/demo.png') }}" alt="Admin"></div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">Name</h2>
                                    <p class="paragraph">Admin</p>
                                </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">E-mail Address<span class="text-info" style="font-size:0.85rem;"> (Note: This email address is your login username)</span></h2>
                                    <p class="paragraph"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="99eaece9fcebf8fdf4f0f7d9f6f7fceaedb7faf6f4">[email&nbsp;protected]</a></p>
                                </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">Date of Birth</h2>
                                    <p class="paragraph">2022-09-07</p>
                                </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">Phone</h2>
                                    <p class="paragraph">01811000000</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        @include('admin.edit-admin-profile')
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
        $('.edit-admin').hide();

    $('#edit-admin-profile').click(function(){
        $('.edit-admin').show();
        $('.edit').hide();
    })

    $('.update-admin-password').click(function(){
        $('.edit-admin').hide();
        $('.edit').hide();
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