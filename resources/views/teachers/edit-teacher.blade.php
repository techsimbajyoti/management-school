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
        <div class="edit-teacher">
            <div class="col-12">
                <div class="card ot-card mb-24 position-relative z_1">
                   <div class="card-header d-flex justify-content-between align-items-center">
                     <h3 class="title mb-0">My Profile</h3>
                     <a class="btn btn-lg ot-btn-primary mb-4" id="edit-profile"><span class=""><i class="fa fa-edit"></i>  Edit</span></a>
                   </div>
                 </div>
           </div> 
                <div class="row">
                    @include('teachers.staff-profile-inc')
                </div>
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
        $('.edit-teacher-profile').hide();

    $('#edit-profile').click(function(){
        $('.edit-teacher-profile').show();
        $('.edit-teacher').hide();
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