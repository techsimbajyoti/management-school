                    <form class="form" method="POST" id="form2">
                                @csrf
                                <h5>Applicant Information</h5><br>
                                <input type="hidden" name="student_id" id="student_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('First Name:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="nice-select niceSelect bordered_style wide" placeholder="Student First Name" required>
                                        </div>
                                        <span class="invalid-feedback" id="first_name_error" style="display: none;" role="alert"></span>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Last Name:') }}</label>
                            
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" required>
                                        </div>
                                        <span class="invalid-feedback" id="last_name_error" style="display: none;" role="alert"></span>
                                    </div>
                            
                                
                                    {{-- <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('User Name:') }}</label>
                                    
                                        <div class="form-group">
                                            <input type="text" name="user_name" class="nice-select niceSelect bordered_style wide" placeholder="User Name" required >
                                        </div>
                                        <span class="invalid-feedback" id="user_name_error" style="display: none;" role="alert"></span>
                                    </div>  --}}
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">Gender:</label>
                                            <select class="nice-select sections niceSelect bordered_style wide" id="gender" name="gender" required data-fouc data-placeholder="Choose.." name="gender">
                                                <option value="">Select one of these</option>
                                                <option  value="Male">Male</option>
                                                <option  value="Female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <input type="text" id="other-gender" name="other_gender" class="hidden form-control mt-2" placeholder="Please specify">
                                            <span class="invalid-feedback" id="gender_error" style="display: none;" role="alert"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Admission   For:') }}</label>
                                                <div class="form-group">
                                                    <input name="class"  type="text" class="form-control" placeholder="Enter Class" required>
                                                        <span class="invalid-feedback" id="class_error" style="display: none;" role="alert"></span>
                                                </div>
                                    </div>  
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">Date of Birth:</label>
                                            <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth" required>
                                            <span class="invalid-feedback" id="date_of_birth_error" style="display: none;" role="alert"></span>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Blood Group:</label>
                                            <select class="nice-select niceSelect bordered_style wide" id="blood-group" name="blood_group"  data-fouc data-placeholder="Choose.." name="blood_group">
                                                <option value="">Select one of these</option>
                                                @foreach($BloodGroup as $BloodGroups)
                                                <option value="{{ $BloodGroups->bg_code }}">{{ $BloodGroups->bg_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback" id="blood_group_error" style="display: none;" role="alert"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                    
                                            <label class="form-label">Religion:</label>
                                            <select class="nice-select niceSelect bordered_style wide" id="religion" name="religion"  data-fouc data-placeholder="Choose.." name="section">
                                                <option value="">Select one of these</option>
                                                @foreach($Religion as $Religions)
                                                <option  value="{{ $Religions->religion_code}}">{{ $Religions->religion_name}}</option>
                                                @endforeach
                                                <option  value="other">Other</option>
                                            </select>
                                            <input type="text" id="other-religion" name="other_religion" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
                                            <span class="invalid-feedback" id="religion_error" style="display: none;" role="alert"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Category:</label>
                                            <select class="nice-select niceSelect bordered_style wide" id="category" name="category"  data-fouc data-placeholder="Choose.." name="category">
                                                <option value="">Select one of these</option>
                                                <option  value="General">General</option>
                                                <option  value="OBC">OBC</option>
                                                <option  value="SC">SC</option>
                                                <option  value="ST">ST</option>
                                                <option  value="other">Other</option>
                                            </select>
                                            <input type="text" id="other-category" name="other_category" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
                                            <span class="invalid-feedback" id="category_error" style="display: none;" role="alert"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Student Language:') }}</label>
                                        <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Language type" id="student_language"  name="student_language">
                                        <span class="invalid-feedback" id="student_language_error" style="display: none;" role="alert"></span>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Student Photo:') }}</label>
                                        <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" required>
                                        <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                        <span class="invalid-feedback" id="image_error" style="display: none;">
                                        </div>
                                    
                                  
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Previous School') }} <span class="text-info">(If Applicable):</span></label>
                                        <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Previous School" id="previous_school"  name="previous_school">
                                        <span class="invalid-feedback" id="previous_school_error" style="display: none;">
                                
                                    </div>
                                </div>
                                <input type="hidden" name="role_id" value="4">
                                <input type="hidden" name="status" value="active">
                                <input type="hidden" name="applicant_status" value="applicant">
                               
                                <div class="card-footer mt-5">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-lg ot-btn-primary back_1" style="margin-bottom:10px;"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <div>
                                            <button type="submit" class="btn btn-lg ot-btn-primary save_2" style="margin-bottom:10px;">
                                                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
                                            </button>
                                            {{-- <button type="submit" class="btn btn-lg ot-btn-primary ml-3" style="margin-bottom:10px;">
                                                <i class="fa fa-save"></i> {{ __('Save') }}
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>

                            