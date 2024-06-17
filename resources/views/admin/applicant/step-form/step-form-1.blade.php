<form class="form1" method="POST" action="{{route('post-applicant-data')}}">
    @csrf
    <h5>Parent Information</h5><br>
    <div class="row ">
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Parent Name:') }}</label>
            <div class="form-group">
                <div class="autocomplete">
                    <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name">
                </div>
            </div>
            @if ($errors->has('parent_name')) 
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('parent_name') }}</strong>
            </span>
            @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Email:') }}</label>
                <div class="form-group">
                    <input type="email" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Enter Email" required>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Password:') }}</label>

                <div class="form-group">
                    <input type="password" name="password" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Confirm Password:') }}</label>

                <div class="form-group">
                    <input type="password" name="password_confirmation" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Enter Confirm Password" required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Contact Number:') }}</label>

                <div class="form-group">
                    <input type="number" name="contact_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Contact Number" required>
                </div>
                @if ($errors->has('contact_number'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Profession:') }}</label>

                <div class="form-group">
                    <input type="text" name="profession" class="nice-select niceSelect bordered_style wide" placeholder="Enter Profession" required>
                </div>
                @if ($errors->has('profession'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('profession') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Office Contact Number:') }}</label>
                <div class="form-group">
                    <input type="number" name="office_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Office Contact Number" required>
                </div>
                @if ($errors->has('office_number'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('office_number') }}</strong>
                    </span>
                @endif
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Office Address:') }}</label>

                <div class="form-group">
                    <input type="text" name="office_address" class="nice-select niceSelect bordered_style wide" placeholder="Enter Office Address" required>
                </div>
                @if ($errors->has('office_address'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('office_address') }}</strong>
                    </span>
                @endif
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <input type="hidden" name="action" id="form-action" value="save">
            <button type="submit" class="btn btn-lg ot-btn-primary" onclick="document.getElementById('form-action').value='save-continue'">
                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
            </button>
            <button type="submit" class="btn btn-lg ot-btn-primary ml-3" onclick="document.getElementById('form-action').value='save'">
                <i class="fa fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>
</form>