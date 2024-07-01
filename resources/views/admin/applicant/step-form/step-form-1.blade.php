<form class="form active" method="POST" action="" id="form1">
    @csrf
    <h5>Parent Information</h5><br>
    <div class="row">
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Parent Name:') }}</label>
            <div class="form-group">
                <div class="autocomplete">


                    <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name" pattern="[A-Za-z ]+" title="Please enter letters only.">

                </div>
                <span class="invalid-feedback" id="parent_name_error" style="display: none;" role="alert"></span>
            </div>
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Email:') }}</label>
            <div class="form-group">
                <input type="email" name="email" id="email" autocomplete="off" class="nice-select niceSelect bordered_style wide" placeholder="Enter Email" required>
                <span class="invalid-feedback" id="email_error" style="display: none;"></span>
            </div>
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label for="password" class="form-label">{{ __('Password:') }}</label>
            <div class="form-group">
                <input type="password" name="password" id="password" autocomplete="off" class="nice-select niceSelect bordered_style wide" placeholder="Enter Password" pattern=".{8,}" title="Eight or more characters" required>
                <span class="invalid-feedback" id="password_error" style="display: none;"></span>
            </div>
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label for="password-confirmation" class="form-label">{{ __('Confirm Password:') }}</label>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="nice-select niceSelect bordered_style wide" placeholder="Enter Confirm Password" pattern=".{8,}" title="Eight or more characters" required>
                <span class="invalid-feedback" id="password_confirmation_error" style="display: none;"></span>
            </div>
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Contact Number:') }}</label>
            <div class="form-group">
                <input type="text" name="contact_number" id="contact_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Contact Number" pattern="\d+" title="Please enter digits only." required>
                <span class="invalid-feedback" id="contact_number_error" style="display: none;"></span>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">{{ __('Profession:') }}</label>
            <div class="form-group">
                <input type="text" name="profession" id="profession" class="nice-select niceSelect bordered_style wide" placeholder="Enter Profession">
                <span class="invalid-feedback" id="profession_error" style="display: none;"></span>
            </div>
        </div>
    </div>
    <input type="hidden" name="role_id" value="5">
    <input type="hidden" name="status" value="active">
    <input type="hidden" name="applicant_status" value="applicant">
    
    <div class="card-footer mt-5">
        <div class="d-flex justify-content-end">
            <input type="hidden" name="action" id="form-action" value="save">
            <button type="button" id="save-continue" class="btn btn-lg ot-btn-primary">
                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
            </button>
            {{-- <button type="button" id="save" class="btn btn-lg ot-btn-primary ml-3">
                <i class="fa fa-save"></i> {{ __('Save') }}
            </button> --}}
        </div>
    </div>    
</form>
