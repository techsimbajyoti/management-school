<form id="form3" class="form" method="POST">
                                @csrf
                                <h5>Contact Information</h5><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Address:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="residence_address" class="nice-select niceSelect bordered_style wide" placeholder="Residance Address" required>
                                            </div>
                                            @if ($errors->has('residence_address'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('residence_address') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            
                                    <div class="col-md-6">
                                    
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">{{ __('Country:') }} </label>
                                                <div class="autocomplete">
                                                <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">{{ __('State:') }} </label>
                                                <div class="autocomplete">
                                                    <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        
                                            <label class="form-label">{{ __('City:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="city" class="nice-select niceSelect bordered_style wide" placeholder="City" required>
                                                </div>
                                                @if ($errors->has('city'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                
                                    <div class="col-md-6">
                                        
                                        <label class="form-label">{{ __('Pin Code:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="pin_code" class="nice-select niceSelect bordered_style wide" placeholder="Pin Code" required>
                                            </div>
                                            @if ($errors->has('pin_code'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('pin_code') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Contact Number:') }}</label>
                                            <div class="form-group">
                                                <input type="text" name="mobile" class="nice-select niceSelect bordered_style wide" placeholder="Contact Number" required>
                                            </div>
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Alternative Number:') }}</label>
                                        <div class="form-group">
                                                <input type="text" name="parent_mobile" class="nice-select niceSelect bordered_style wide" placeholder="Alternative Number" required>
                                            </div>
                                            @if ($errors->has('parent_mobile'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('parent_mobile') }}</strong>
                                                </span>
                                            @endif
                                    </div> 
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <div>
                                            <button type="button" class="btn ot-btn-primary save_3"><i class="fa fa-save"></i> {{ __('Save & Continue') }}</button>
                                            <button type="submit" class="btn ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex justify-content-between">
                                        <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <button type="submit" class="btn ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                                    </div> --}}
                                </div>
                            </form>