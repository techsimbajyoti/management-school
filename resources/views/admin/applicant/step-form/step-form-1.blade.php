<form clas="form active" method="POST" action="" id="form1">
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
          
            @if ($errors->has('parent_name')) 
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('parent_name') }}</strong>
            </span>
            @endif
            </div>
        </div>
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Email:') }}</label>
                <div class="form-group">
                    <input type="email" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Enter Email" >
                
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
        </div>
              
       
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label for="password" class="form-label">{{ __('Password:') }}</label>
        
            <div class="form-group">
                <input type="password" name="password" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" placeholder="Enter Password">
            
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label for="password-confirmation" class="form-label">{{ __('Confirm Password:') }}</label>
        
            <div class="form-group">
                <input type="password" name="password_confirmation" class="nice-select niceSelect bordered_style wide @error('password_confirmation') is-invalid @enderror" autocomplete="current-password" placeholder="Enter Confirm Password">
            
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Contact Number:') }}</label>

                <div class="form-group">
                    <input type="number" name="contact_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Contact Number" >
                    @if ($errors->has('contact_number'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
                    @endif
                </div>
               
        </div>
        <div class="col-md-6">
            
            <label class="form-label">{{ __('Profession:') }}</label>

                <div class="form-group">
                    <input type="text" name="profession" class="nice-select niceSelect bordered_style wide" placeholder="Enter Profession" >
                
                @if ($errors->has('profession'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('profession') }}</strong>
                    </span>
                @endif
                </div>  
        </div>
        {{-- <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Office Contact Number:') }}</label>
                <div class="form-group">
                    <input type="number" name="office_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Office Contact Number" >
               
                @if ($errors->has('office_number'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('office_number') }}</strong>
                    </span>
                @endif
                </div>
        </div> --}}
        {{-- <div class="col-md-6">
            <span style="color:red">*</span>
            <label class="form-label">{{ __('Office Address:') }}</label>

                <div class="form-group">
                    <input type="text" name="office_address" class="nice-select niceSelect bordered_style wide" placeholder="Enter Office Address" >
              
                @if ($errors->has('office_address'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('office_address') }}</strong>
                    </span>
                @endif
                </div>
        </div> --}}
    </div>
    <input type="hidden" name="role_id" value="5">
    <input type="hidden" name="status" value="active">
   
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <input type="hidden" name="action" id="form-action" value="save">
            <button type="submit" id="save-continue" class="btn btn-lg ot-btn-primary">
                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
            </button>
            <button type="submit" id="save" class="btn btn-lg ot-btn-primary ml-3">
                <i class="fa fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div>    
</form> 
