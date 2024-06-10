
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
        @include('students.parent-profile')
       
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