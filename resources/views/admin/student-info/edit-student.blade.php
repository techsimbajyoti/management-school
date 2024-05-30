@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admit-student'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
           
            <div class="col-md-12">
              
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Student') }}</h5>
                        </div>
                               
                    </div>
            
                <form  action="" method="">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Edit Student Details') }}</h6>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <hr style="width:1000px; height: 2px; border: none; background-color:#c2c2c2;">

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Admission No.:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="admission_no" class="form-control" placeholder="Admission No" required>
                                        </div>
                                        @if ($errors->has('admission_no'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('admission_no') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('First Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    @if ($errors->has('full_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                                  
                               
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Phone:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="" required>
                                        </div>
                                        @if ($errors->has(''))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                     <label class="form-label" style="font-weight: 600;">{{ __('Email address:') }}</label>
  
                                      <div class="form-group">
                                          <input type="text" name="" class="form-control" placeholder="email address" required>
                                      </div>
                                      @if ($errors->has(''))
                                          <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-md-3">
                                    <span style="color:red">*</span>
                                     <label class="form-label" style="font-weight: 600;">{{ __('Password:') }}</label>
  
                                      <div class="form-group">
                                          <input type="password" name="password" class="form-control"  required>
                                          <span style="font-size: 12px;">Default Password: 123456789</span>

                                      </div>
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                   
                                <div class="col-md-3">
                                        <label class="form-label" style="font-weight: 600;">{{ __('Class:') }}</label>
                                            <div class="form-group">
                                                <input type="text" name="class" class="form-control" placeholder="" required>
                                            </div>
                                            @if ($errors->has('class'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('class') }}</strong>
                                                </span>
                                            @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Section:</label>
                                        <select class="select form-control" id="section" name="section" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value=""></option>
                                            <option value="A">A</option>
                                            <option  value="B">B</option>
                                            <option  value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Date of Birth:</label>
                                        <input name="dob" value="" type="date" class="form-control date-pick" placeholder="Select Date...">
        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Religion:</label>
                                        <select class="select form-control" id="section" name="section" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value=""></option>
                                            <option value="Hindu">Hindu</option>
                                            <option  value="Muslim">Muslim</option>
                                            <option  value="Christian"> Christian</option>
                                            <option  value="Jain"> Jain</option>
                                            <option  value="Buddhist"> Buddhist</option>
                                            <option  value="Sikh">Sikh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Gender:</label>
                                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose.." name="gender">
                                            <option value=""></option>
                                            <option  value="Male">Male</option>
                                            <option  value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                                  
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Category:</label>
                                        <select class="select form-control" id="category" name="category" required data-fouc data-placeholder="Choose.." name="category">
                                            <option value=""></option>
                                            <option  value="General">General</option>
                                            <option  value="OBC">OBC</option>
                                            <option  value="SC">SC</option>
                                            <option  value="ST">ST</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Blood Group:</label>
                                        <select class="select form-control" id="category" name="blood_group" required data-fouc data-placeholder="Choose.." name="blood_group">
                                            <option value=""></option>
                                            <option  value="General">A+</option>
                                            <option  value="General">A-</option>
                                            <option  value="OBC">B+</option>
                                            <option  value="General">B-</option>
                                            <option  value="SC">AB+</option>
                                            <option  value="General">AB-</option>
                                            <option  value="ST">O+</option>
                                            <option  value="General">O-</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: 600;">Upload Passport Photo:</label>
                                        <span class="text-info" style="font-size: 12px;">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                        <input type="file" class="form-control-file" name="image" accept=".png,.jpg,.jpeg" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_name" class="form-control" placeholder="Parent Name" required>
                                        </div>
                                        @if ($errors->has('parent_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Mobile:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_mobile" class="form-control" placeholder="Parent Mobile" required>
                                        </div>
                                        @if ($errors->has('parent_mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Place Of Birth:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="place_of_birth" class="form-control" placeholder="Place Of Birth" required>
                                        </div>
                                        @if ($errors->has('place_of_birth'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('place_of_birth') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">{{ __('Nationality:') }} </label>
                                        <select data-placeholder="Choose..." required name="student_nationality" id="student_nationality" class="select-search form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($country as $data)
                                                <option value="{{ $data->id }}" {{ (old('country') == $data->id) ? 'selected' : '' }}>
                                                    {{ $data->country }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('CPR Number:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="CPR_number" class="form-control" placeholder="CPR Number" required>
                                        </div>
                                        @if ($errors->has('CPR_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('CPR_number') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Student Language:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="student_language" class="form-control" placeholder="Student Language" required>
                                        </div>
                                        @if ($errors->has('student_language'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('student_language') }}</strong>
                                            </span>
                                        @endif
                                </div>
                              
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Residance Address:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="residance_address" class="form-control" placeholder="Residance Address" required>
                                        </div>
                                        @if ($errors->has('residance_address'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('residance_address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" style="font-weight: 600;">Document</label>
                                    <input type="file" class="form-control" id="document" name="document">
                                </div>
                            </div>
                           
                            
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                   <button type="submit" class="btn btn-lg ot-btn-primary"><i class="fa fa-save"></i> {{ __('Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection







