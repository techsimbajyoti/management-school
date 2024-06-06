
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
            @include('admin.student-info.profile-inc')
           </div>
        </div>
        <div class="row">
            <div class="col-md-12 card">
            <div class="page-content">
                <div class="profile-content">
                    <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                        
                        {{-- <div class="profile-body edit-parent-profile">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2 class="title">My Profile</h2>
                                <a class="btn btn-lg ot-btn-primary mb-5" id="edit-parent"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
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
                                    <p class="paragraph">Parent</p>
                                </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">E-mail Address</h2>
                                    <p class="paragraph"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="99eaece9fcebf8fdf4f0f7d9f6f7fceaedb7faf6f4">[email&nbsp;protected]</a></p>
                                </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">Occupation</h2>
                                    <p class="paragraph">occupation</p>
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
                        </div> --}}

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