                    <form class="form" method="POST" id="form2">
                                @csrf
                                <h5>Student Information</h5><br>
                                <div class="row">

                                
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('First Name:') }}</label>
        
                                            <div class="form-group">
                                                <input type="text" name="first_name" class="nice-select niceSelect bordered_style wide" placeholder="Student First Name" required>
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Last Name:') }}</label>

                                        <div class="form-group">
                                            <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" required>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                        <label class="form-label">{{ __('Email address:') }}</label>
        
                                        <div class="form-group">
                                            <input type="text" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Email Address" required value="admin@gmail.com">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div> 
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
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Class:') }}</label>
                                                <div class="form-group">
                                                    <select id="getSections" class="nice-select sections niceSelect bordered_style wide" name="class" required>
                                                        <option value>Select class</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        </select>
                                                </div>
                                                @if ($errors->has('class'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('class') }}</strong>
                                                    </span>
                                                @endif
                                    </div>  

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label">Date of Birth:</label>
                                            <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth">
            
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
                                        </div>
    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                
                                            <label class="form-label">Religion:</label>
                                            <select class="nice-select niceSelect bordered_style wide" id="religion" name="religion" required data-fouc data-placeholder="Choose.." name="section">
                                                <option value="">Select one of these</option>
                                                @foreach($Religion as $Religions)
                                                <option  value="{{ $Religions->religion_code}}">{{ $Religions->religion_name}}</option>
                                                @endforeach
                                                <option  value="other">Other</option>
                                            </select>
                                            <input type="text" id="other-religion" name="other_religion" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
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
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Student Language:') }}</label>
                                        <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Language type" id="student_language"  name="student_language">
                                        @if ($errors->has('student_language'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('student_language') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Student Photo:') }}</label>
                                        <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" required>
                                        <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                    </div>
                                  
                                </div>
                                <input type="hidden" name="role_id" value="5">
                                <input type="hidden" name="status" value="active">
                                <input type="hidden" name="applicant_id" value="applicant">
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn ot-btn-primary back_1"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                        <div>
                                            <input type="hidden" name="action" id="form-action" value="save">
                                            <button type="submit" class="btn btn-lg ot-btn-primary save_2">
                                                <i class="fa fa-save"></i> {{ __('Save & Continue') }}
                                            </button>
                                            <button type="submit" class="btn btn-lg ot-btn-primary ml-3">
                                                <i class="fa fa-save"></i> {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            