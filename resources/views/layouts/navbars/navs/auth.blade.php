<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">{{ __('School Management') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
            @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle btn btn-sm ot-btn-primary" href="" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        {{ auth()->guard('web')->user()->name }}
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                            <a class="dropdown-item" id="change-password">{{ __('Change Password') }}</a>
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                        </div>
                    </div>
                </li>
            @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="{{ route('edit-teacher') }}">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>

                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                <a class="dropdown-item" href="{{ route('accountant-edit') }}">{{ __('My profile') }}</a>
                            </div>
                        </div>
                    </li>

                @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="{{ route('student-edit') }}">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>
                @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="{{ route('edit-parent-profile') }}">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="background-color: white">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close model-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="card">
  
                      <form method="POST" action="" id="myForm">
                          @csrf
                          <div class="card-body">
                              <div class="mb-3">
                                  <label for="oldPasswordInput" class="form-label">Old Password</label>
                                  <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                      placeholder="Old Password" required>
                                  @error('old_password')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label for="newPasswordInput" class="form-label">New Password</label>
                                  <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                      placeholder="New Password" required>
                                  @error('new_password')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                  <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                      placeholder="Confirm New Password" required>
                              </div>
  
                          </div>
  
                          <div class="card-footer change-button">
                              <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
                          </div>
  
                      </form>
                  </div>
              </div>
          </div>
      </div>
  
  
        </div>
        <div class="modal-footer">
          <button type="button" id="" class="btn btn-secondary model-close" data-dismiss="modal">Close</button>
          <!-- Add additional buttons or actions as needed -->
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    $(document).ready(function() {
        $('#change-password').click(function(){
            $('#exampleModal').modal('show');
            $('#myForm')[0].reset();
        });

        $('.model-close').click(function(){
            $('#exampleModal').modal('hide');
            $('#myForm')[0].reset();
        });

       
        $('#submitBtn').click(function(e){
        if ($('#myForm')[0].checkValidity()) {
            e.preventDefault();
            e.stopPropagation();

            var old_password = $('#oldPasswordInput').val();
            var new_password = $('#newPasswordInput').val();
            var new_password_confirmation = $('#confirmNewPasswordInput').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('update-password') }}",
                type: 'POST', // Ensure the method is set to POST
                data: {
                    old_password: old_password,
                    new_password: new_password,
                    new_password_confirmation: new_password_confirmation
                },
                success: function(response) {
                     // Show the success message from the server
                    if(response.error){
                        alert(response.error);
                        $('#exampleModal').modal('show'); // Close modal on success
                    }else{
                        alert(response.success);
                        $('#exampleModal').modal('hide'); // Close modal on success

                    $('#myForm')[0].reset();
                    }

                },
                error: function(xhr, status, error) {
                    alert('Error occurred while submitting the form.');
                }
            });

        } else {
            e.preventDefault();
            e.stopPropagation();
            alert('Please fill in all fields correctly before submitting.');
        }
});

    });
  </script>
  @endpush