<div class="profile-body change-password">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="title">Update Password</h2>
  </div>
  <div class="profile-body-form">
    <form action="" enctype="multipart/form-data" method="post" id="visitForm" name="visitForm">
      @csrf
      <div class="row mb-3 mt-3">
        <div class="col-md-12">
          <div class="row mb-3">
            <div class="col-sm-12">
              <label for="inputname" class="form-label">Current Password <span class="text-danger">*</span></label> <input type="password" name="current_password" placeholder="Current Password" class="form-control ot-input">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <label for="inputname" class="form-label">New Password <span class="text-danger">*</span></label> <input type="password" name="password" placeholder="New Password" class="form-control ot-input">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <label for="inputname" class="form-label">Confirm Password <span class="text-danger">*</span></label> <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control ot-input">
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-3">
          <div class="text-end">
            <button class="btn btn-lg ot-btn-primary">Update</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>