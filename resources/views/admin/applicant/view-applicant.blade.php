@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-list'
])
@section('content')
<style>
    /* Progress Bar */
.progress-container {
    width: 100%;
    position: relative;
}

#progressbar {
    display: flex;
    justify-content: space-between;
    list-style-type: none;
    counter-reset: step;
    margin-bottom: 20px;
}

#progressbar li {
    text-align: center;
    position: relative;
    flex: 1;
    counter-increment: step;
}

#progressbar li::before {
    content: counter(step);
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: block;
    font-size: 14px;
    color: #333;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    margin: 0 auto 10px auto;
}

#progressbar li::after {
    content: '';
    width: 100%;
    height: 2px;
    background: #ddd;
    position: absolute;
    left: -50%;
    top: 15px;
    z-index: -1;
}

#progressbar li:first-child::after {
    content: none;
}

#progressbar li.active::before, #progressbar li.active::after {
    background: #0275d8;
    color: white;
    border-color: #0275d8;
}

/* Progress Bar Indicator */
.progress {
    height: 4px;
    background: #ddd;
    position: relative;
    margin-top: 20px;
}

.progress-bar {
    width: 0;
    height: 100%;
    background: #0275d8;
    transition: width 0.4s ease;
}

</style>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress-container">
                            <ul id="progressbar">
                                <li class="step active" id="step1"><strong>Step 1</strong></li>
                                <li class="step" id="step2"><strong>Step 2</strong></li>
                                <li class="step" id="step3"><strong>Step 3</strong></li>
                               
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right">
                                    @if(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5 && auth()->guard('webparents')->user()->applicant_status == 'applicant')
                                    <a href="{{route('applicant-profile')}}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                                    @else
                                    <a href="{{route('applicant-list')}}" class="btn ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                                    @endif
                                </div>
                               
                                <form id="form1" class="form active" method="POST" action="{{ route('view-applicant',$applicant_data->id) }}">
                                    @csrf
                                    <h5>Parent Information</h5><br>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            
                                            <label class="form-label">{{ __('Parent Name:') }}</label>
                                            <div class="form-group">
                                                <div class="autocomplete">
                                                    <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name" value="{{ $applicant_data->father_name}}" readonly>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <label class="form-label">{{ __('Email:') }}</label>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Enter Email" value="{{ $applicant_data->email}}" readonly>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="col-md-6">
                                          
                                            <label class="form-label">{{ __('Password:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="password" name="password" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" placeholder="Enter Password" value="{{ $applicant_data->password }}" readonly>
                                                </div>
                                                
                                        </div>
                                        <div class="col-md-6">
                                           
                                            <label class="form-label">{{ __('Confirm Password:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Enter Confirm Password" value="{{ $applicant_data->password}}" readonly>
                                                </div>
                                                
                                        </div>
                                        <div class="col-md-6">
                                           
                                            <label class="form-label">{{ __('Contact Number:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="number" name="contact_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Contact Number" value="{{ $applicant_data->father_mobile }}" readonly>
                                                </div>
                                               
                                        </div>
                                        <div class="col-md-6">
                                           
                                            <label class="form-label">{{ __('Profession:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="text" name="profession" class="nice-select niceSelect bordered_style wide" placeholder="Enter Profession" value="{{ $applicant_data->father_profession }}" readonly>
                                                </div>
                                               
                                        </div>
                                      
                                    </div>
                                   
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <input type="hidden" name="action" id="form-action" value="save">
                                            <a type="submit" class="btn btn-lg ot-btn-primary save_1">
                                                <i class="fa fa-arrow-right"></i> {{ __('Next') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <form class="form" method="POST" id="form2" action="{{ route('view-applicant',$applicant_data->id) }}">
                                    @csrf
                                    <h5>Applicant Information</h5><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                          
                                            <label class="form-label">{{ __('First Name:') }}</label>
                                            <div class="form-group">
                                                <input type="text" name="first_name" class="nice-select niceSelect bordered_style wide" placeholder="Student First Name" value="{{ $applicant_data->first_name}}" readonly>
                                            </div>
                                           
                                        </div>
                                
                                        <div class="col-md-6">
                                           
                                            <label class="form-label">{{ __('Last Name:') }}</label>
                                
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" value="{{ $applicant_data->last_name}}" readonly>
                                            </div>
                                            <span class="invalid-feedback" id="last_name_error" style="display: none;" role="alert"></span>
                                        </div>
                                
                                    
                                                                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label class="form-label">Gender:</label>
                                                <input type="text" name="gender" class="nice-select niceSelect bordered_style wide" placeholder="choose .." value="{{ $applicant_data->gender}}" readonly>
                                                <input type="text" id="other-gender" name="other_gender" class="hidden form-control mt-2" placeholder="Please specify">
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                                <label class="form-label">{{ __('Admission   For:') }}</label>
                                                    <div class="form-group">
                                                        <input type="text" name="class" class="nice-select niceSelect bordered_style wide" placeholder="Choose Class" value="{{ $applicant_data->class}}" readonly> 
                                                           
                                                    </div>
                                        </div>  
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth:</label>
                                                <input name="date_of_birth" type="text" class="form-control date-pick" placeholder="Date of birth" value="{{ $applicant_data->date_of_birth}}">
                                                
                                            </div>
                                        </div> 
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Blood Group:</label>
                                                <input name="blood_group" type="text" class="form-control date-pick" placeholder="Blood Group" value="{{ $applicant_data->blood_group}}">  
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                        
                                            <label class="form-label">Religion:</label>
                                            <input name="religion"  type="text" class="form-control date-pick" placeholder="Choose" value="{{ $applicant_data->religion}}">  
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Category:</label>
                                                <input type="text" name="category" class="nice-select niceSelect bordered_style wide" placeholder="Choose" value="{{ $applicant_data->category}}" readonly>
                                                
                                              
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Student Language:') }}</label>
                                            <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Language type" id="student_language"  name="student_language" value="{{ $applicant_data->student_language}}"readonly>
                                            <span class="invalid-feedback" id="student_language_error" style="display: none;" role="alert"></span>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Student Photo:') }}</label>
                                            <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                            <input class="form-control" type="text" name="profile_image" value="{{ $applicant_data->image}}">
                                            
                                                @if($applicant_data->image)
                                                  <img src="{{ url('storage/student_photos/' . $applicant_data->image) }}" height="100px" width="100px" readonly>
                                                @else
                                                <input class="form-control" type="text" name="profile_image" value="No Image Uploaded">
                                                 
                                            @endif
                                           
                                            </div>
                                        
                                      
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Previous School') }} <span class="text-info">(If Applicable):</span></label>
                                            <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Previous School" id="previous_school"  name="previous_school" value="{{ $applicant_data->previous_school}}" readonly>
                                            <span class="invalid-feedback" id="previous_school_error" style="display: none;">
                                    
                                        </div>
                                    </div>
                                                    
                                    
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_1"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                            <div>
                                                <input type="hidden" name="action" id="form-action" value="save">
                                                <a type="submit" class="btn btn-lg ot-btn-primary save_2">
                                                    <i class="fa fa-arrow-right"></i> {{ __('Next') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form class="form" method="POST" id="form3" action="{{ route('view-applicant',$applicant_data->id) }}">
                                    @csrf
                                    <h5>Contact Information</h5><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                          
                                            <label class="form-label">{{ __('Address:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="residence_address" class="nice-select niceSelect bordered_style wide" placeholder="Residance Address" value="{{ $applicant_data->address}}">
                                                </div>
                                               
                                        </div>
                                
                                        <div class="col-md-6">
                                        
                                                <div class="form-group">
                                                    
                                                    <label class="form-label">{{ __('Country:') }} </label>
                                                    <div class="autocomplete">
                                                    <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" value="{{ $applicant_data->country}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                    <label class="form-label">{{ __('State:') }} </label>
                                                    <div class="autocomplete">
                                                        <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" value="{{ $applicant_data->state}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                                <label class="form-label">{{ __('City:') }}</label>
                
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="nice-select niceSelect bordered_style wide" placeholder="City" value="{{ $applicant_data->city}}" readonly>
                                                    </div>
                                                   
                                            </div>
                                    
                                        <div class="col-md-6">
                                            
                                            <label class="form-label">{{ __('Pin Code:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="pin_code" class="nice-select niceSelect bordered_style wide" placeholder="Pin Code" value="{{ $applicant_data->pin_code}}" readonly>
                                                </div>
                                              
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                           
                                        </div>
                                    </div>
                                </form>
    
                               
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
         </div>
</div>
@endsection 


@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script>
    

$(document).ready(function() {
    demo.checkFullPageBackgroundImage();

    let currentStep = 1;
    const totalSteps = 3;

    function updateProgressBar(step) {
        const percentage = (step - 1) / (totalSteps - 1) * 100;
        $('.progress-bar').css('width', `${percentage}%`);
        $('#progressbar li').removeClass('active');
        for (let i = 1; i <= step; i++) {
            $(`#step${i}`).addClass('active');
        }
    }

    function showForm(step) {
        $('#form1, #form2, #form3').hide();
        $(`#form${step}`).show();
    }

    $('.save_1').click(function() {
        currentStep = 2;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.save_2').click(function() {
        currentStep = 3;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.save_3').click(function() {
        currentStep = 4;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_1').click(function() {
        currentStep = 1;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_2').click(function() {
        currentStep = 2;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    $('.back_3').click(function() {
        currentStep = 3;
        updateProgressBar(currentStep);
        showForm(currentStep);
    });

    updateProgressBar(currentStep);
    showForm(currentStep);

    $('#other-gender').hide();
            $('#other-language').hide();
            $('#other-category').hide();
            $('#other-religion').hide();

            $('#gender').change(function() {
            if (this.value === 'other') {
                // $('#other-gender').removeClass('hidden').attr('required', true);

                $('#other-gender').show();
            } else {
                // $('#other-gender').addClass('hidden').removeAttr('required');
                $('#other-gender').hide();
            }
        });


        $('#category').change(function(){
            if (this.value === 'other') {
                $('#other-category').show();
            } else {
                $('#other-category').hide();
            }
        })

        $('#religion').change(function(){
            if (this.value === 'other') {
                $('#other-religion').show();
            } else {
                $('#other-religion').hide();
            }
        })

});     

</script>
@endpush

