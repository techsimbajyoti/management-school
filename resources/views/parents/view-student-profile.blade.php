@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'students_profile'
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
                            <h5 class="title">{{ __('View Student') }}</h5>
                        </div>
                               
                    </div>
            
                <form  action="" method="">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('View Student Details') }}</h6>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('parent-dashboard')}}" class="btn btn-lg ot-btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </div>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Admission No.:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="admission_no" class="form-control" placeholder="Admission No" disabled>
                                        </div>
                                        
                                </div>

                                <div class="col-md-4">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('First Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" disabled>
                                        </div>
                                        
                                </div>

                                <div class="col-md-4">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" disabled>
                                    </div>
                                   
                                </div>
                                                  
                               
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Phone:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="" disabled>
                                        </div>
                                       
                                </div>
                                <div class="col-md-3">
                                   
                                     <label class="form-label" style="font-weight: 600;">{{ __('Email address:') }}</label>
  
                                      <div class="form-group">
                                          <input type="text" name="" class="form-control" placeholder="email address" disabled>
                                      </div>
                                     
                                  </div>
                                  <div class="col-md-3">
                                   
                                     <label class="form-label" style="font-weight: 600;">{{ __('Password:') }}</label>
  
                                      <div class="form-group">
                                          <input type="password" name="password" class="form-control"  disabled>
                                          <span style="font-size: 12px;">Default Password: 123456789</span>

                                      </div>
                                    
                                  </div>
                                   
                                <div class="col-md-3">
                                        <label class="form-label" style="font-weight: 600;">{{ __('Class:') }}</label>
                                            <div class="form-group">
                                                <input type="text" name="class" class="form-control" placeholder="" disabled>
                                            </div>
                                           
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Section:</label>
                                        <input type="text" name="section" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Date of Birth:</label>
                                        <input name="dob" value="" type="date" class="form-control date-pick" placeholder="Select Date..." disabled>
        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Religion:</label>
                                        <input type="text" name="religion" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Gender:</label>
                                        <input type="text" name="gender" class="form-control" disabled>
                                    </div>
                                </div>
                                                  
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Category:</label>
                                        <input type="text" name="category" class="form-control" disabled>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Blood Group:</label>
                                        <input type="text" name="blood_group" class="form-control" disabled>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label class="form-label" style="font-weight: 600;">Admission Date</label>
                                        <input type="date" name="admission_date" class="form-control" disabled>
                                    </div> 
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: 600;">Upload Passport Photo:</label>
                                        <span class="text-info" style="font-size: 12px;">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                        <input type="file" class="form-control-file" name="image" accept=".png,.jpg,.jpeg" disabled>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Name:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_name" class="form-control" placeholder="Parent Name" disabled>
                                        </div>
                                        @if ($errors->has('parent_name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Mobile:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="parent_mobile" class="form-control" placeholder="Parent Mobile" disabled>
                                        </div>
                                        @if ($errors->has('parent_mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Place Of Birth:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="place_of_birth" class="form-control" placeholder="Place Of Birth" disabled>
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
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('CPR Number:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="CPR_number" class="form-control" placeholder="CPR Number" disabled>
                                        </div>
                                        @if ($errors->has('CPR_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('CPR_number') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Student Language:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="student_language" class="form-control" placeholder="Student Language" disabled>
                                        </div>
                                        @if ($errors->has('student_language'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('student_language') }}</strong>
                                            </span>
                                        @endif
                                </div>
                              
                                <div class="col-md-3">
                                   
                                    <label class="form-label" style="font-weight: 600;">{{ __('Residance Address:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="residance_address" class="form-control" placeholder="Residance Address" disabled>
                                        </div>
                                        @if ($errors->has('residance_address'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('residance_address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" style="font-weight: 600;">Document</label>
                                    <input type="file" class="form-control" id="document" name="document" disabled>
                                </div>
                            </div>
                           
                            
                            
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection







