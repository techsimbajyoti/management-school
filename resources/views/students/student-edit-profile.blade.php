<div class="profile-body student-edit-profile" style="display:none;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="title">Edit Profile</h2>
    </div>
    <div class="profile-body-form" style="margin-top:25px">
        <form action="{{route('post-admit-student')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            
            
               
            
                <div class="card-body">
                    
                    <div class="row mb-3">
                      
                        <div class="col-md-4">
                           
                            <span style="color:red">*</span>
                            <label class="form-label">{{ __('Admission No.:') }}</label>

                                <div class="form-group">
                                    <input type="text" name="admission_no" class="nice-select sections niceSelect bordered_style wide" placeholder="Admission No." required>
                                </div>
                                @if ($errors->has('admission_no'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('admission_no') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-md-4">
                            <span style="color:red">*</span>
                            <label class="form-label">{{ __('Parent Name:') }}</label>
                            <div class="form-group">
                            <div class="autocomplete">
                                <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name">
                            </div>
                            {{-- <select class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name"  data-fouc data-placeholder="Choose.." >
                                <option value="">Select one of these</option>
                                <option  value="Parent1">Parent1</option>
                                <option  value="Parent2">Parent2</option>
                              
                            </select> --}}
                        </div>
                        </div>
                                @if ($errors->has('parent_name')) 
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('parent_name') }}</strong>
                                    </span>
                                @endif
                     
                        <div class="col-md-4">
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

                       
                                 
                       
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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
                          <div class="col-md-4">
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
                          
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span style="color:red">*</span>
                                    <label class="form-label">Section:</label>
                                    <select class="nice-select sections niceSelect bordered_style wide"  name="section" required data-fouc data-placeholder="Choose.." name="section">
                                        <option value="">Select one of these</option>
                                        <option value="A">A</option>
                                        <option  value="B">B</option>
                                        <option  value="C">C</option>
                                    </select>
                                </div>
                            </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <span style="color:red">*</span>
                                <label class="form-label">Date of Birth:</label>
                                <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth">

                            </div>
                        </div>           
                    </div>

                    <div class="row mb-3">
                         <div class="col-md-4">
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
                        <div class="col-md-4">
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
                        <div class="col-md-4">
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

                    </div>
                        <div class="row mb-3">
                         <div class="col-md-4">
                            <label class="form-label">{{ __('Student Language:') }}</label>
                            <select class="nice-select niceSelect bordered_style wide" id="student_language"  name="student_language"  data-fouc data-placeholder="Choose..">
                                <option value="">Select one of these</option>
                                @foreach($Language as $Languages)
                                <option value="{{ $Languages->lang_code }}">{{ $Languages->name }}</option>
                                @endforeach
                                <option value="other">Other</option>
                            </select>
                            <input type="text" id="other-language" name="other_gender" class="nice-select niceSelect bordered_style wide" placeholder="Please specify">
                           
                            @if ($errors->has('student_language'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('student_language') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <span style="color:red">*</span>
                                <label class="form-label">{{ __('Admission Date:') }}</label>
                                <input type="date" name="admission_date" id="admission_date" class="form-control">
                            </div>
                        </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Student Photo:') }}</label>
                                <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" required>
                                <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><span class="fillable">* </span>Status:</label>
                                    <select class="nice-select niceSelect bordered_style wide" id="category" name="category"  data-fouc data-placeholder="Choose.." name="category">
                                        <option value="">Select one of these</option>
                                        <option  value="active">Active</option>
                                        <option  value="deactive">deactive</option>
                                    </select>
                                    
                                </div>
                            </div>
                    </div>
                </div>
                    <hr style="margin-top: 50px">
                    <h5 style="margin-top:30px;">Contact Information</h5><br>
                    <div class="row mb-3">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                        
                                <div class="form-group">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('Country:') }} </label>
                                    <div class="autocomplete">
                                    <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span style="color:red">*</span>
                                    <label class="form-label">{{ __('State:') }} </label>
                                    {{-- <select name="state" id="state" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror">
                                        <option value="">Select state</option>
                                    </select> --}}
                                    <div class="autocomplete">
                                        <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            
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
                    </div>
                    <div class="row mb-3" >
                        <div class="col-md-4">
                            
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
                        <div class="col-md-4">
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
                       
                       <div class="col-md-4">
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
                    <hr style="margin-top: 50px">
                    <div class="d-flex justify-content-between align-items-center" style="margin-top:30px;">
                        <h5>Upload Documents</h5>
                        <a id="add-document" class="btn btn-lg ot-btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table school_borderLess_table table_border_hide2" id="student-document">
                                    <thead class="table-header" style="border-bottom: 2px solid #dee2e6;">
                                        <tr>
                                            <th scope="col">Name <span class="text-danger"></span></th>
                                            <th scope="col">Document <span class="text-danger"></span></th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                       
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">

                           <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-refresh"></i> {{ __('Update') }}</button>

                        </div>
                    </div>
                </div>
             
        </form>
    </div>
</div> 