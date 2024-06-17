<form id="form1" method="POST" action="{{route('post-applicant-data')}}">
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
    <input type="hidden" name="applicant" value="applicant">
    <input type="hidden" name="role_id" value="5">
    <input type="hidden" name="status" value="active">

    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <input type="hidden" name="action" id="form-action" value="save">
            <button type="button" class="btn btn-lg ot-btn-primary" onclick="setActionAndSubmit('save-continue')">
                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
            </button>
            <button type="button" class="btn btn-lg ot-btn-primary ml-3" onclick="setActionAndSubmit('save')">
                <i class="fa fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>
</form>

@push('scripts')
<script>
    function setActionAndSubmit(action) {
        $('#form-action').val(action);
        submitForm();
    }

    function submitForm() {
        var formData = $('#form1').serialize();

        $.ajax({
            url: "{{ route('post-applicant-data') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                // Handle the response, e.g., redirect or show a success message
                if ($('#form-action').val() === 'save-continue') {
                    $('.form2').show();
                } else {
                    alert('Data saved successfully.');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                // Handle the error, e.g., show an error message
            }
        });
    }

    $('#form1').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        submitForm(); // Submit the form via AJAX
    });
</script>
@endpush