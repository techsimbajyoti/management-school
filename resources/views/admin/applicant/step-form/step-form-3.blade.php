                <form class="form" method="POST" id="form3">
                                @csrf
                                <h5>Contact Information</h5><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Address:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="residence_address" class="nice-select niceSelect bordered_style wide" placeholder="Residance Address" required>
                                            </div>
                                           
                                            <span class="invalid-feedback" id="residence_address_error" style="display: none;" role="alert"></span>  
                                    </div>
                            
                                    <div class="col-md-6">
                                    
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">{{ __('Country:') }} </label>
                                                <div class="autocomplete">
                                                <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" id="country_error" style="display: none;" role="alert"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">{{ __('State:') }} </label>
                                                <div class="autocomplete">
                                                    <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <span class="invalid-feedback" id="state_error" style="display: none;" role="alert"></span>
                                        </div>
                                        <div class="col-md-6">
                                        
                                            <label class="form-label">{{ __('City:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="city" class="nice-select niceSelect bordered_style wide" placeholder="City" required>
                                                </div>
                                                <span class="invalid-feedback" id="city_error" style="display: none;" role="alert"></span>
                                        </div>
                                
                                    <div class="col-md-6">
                                        
                                        <label class="form-label">{{ __('Pin Code:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="pin_code" class="nice-select niceSelect bordered_style wide" placeholder="Pin Code" required>
                                            </div>
                                            <span class="invalid-feedback" id="pin_code_error" style="display: none;" role="alert"></span>
                                    </div>
                                    {{-- <div class="col-md-6">
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
                                    </div>  --}}
                                </div>
                                <div class="card-footer mt-5">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn ot-btn-primary back_1" style="margin-bottom:10px;"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <div>
                                            <button type="submit" class="btn btn-lg ot-btn-primary save_2" style="margin-bottom:10px;">
                                                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
                                            </button>
                                            <button type="submit" class="btn btn-lg ot-btn-primary ml-3" style="margin-bottom:10px;">
                                                <i class="fa fa-save"></i> {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                    {{-- <div class="d-flex justify-content-between">
                                        <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <button type="submit" class="btn ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                                    </div> --}}
                                </div>
                            </form>