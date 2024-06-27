@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-profile'
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
                                <li class="active" id="step1"><strong>Step 1</strong></li>
                                <li id="step2"><strong>Step 2</strong></li>
                                <li id="step3"><strong>Step 3</strong></li>
                                <li id="step4"><strong>Step 4</strong></li>
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

                                {{-- @if(auth()->guard('webparents')->user()->role_id == '5') --}}
                                <form clas="form active" method="POST" action="" id="form1">
                                    
                                    @csrf
                                    <h5>Parent Information</h5><br>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Parent Name:') }}</label>
                                            <div class="form-group">
                                                <div class="autocomplete">
                                                    <input type="text" placeholder="Parent Name" class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name" value="{{ $applicant_data->father_name}}">
                                                    <span class="invalid-feedback" id="parent_name_error" style="display: none;" role="alert"></span>
                                                </div>
                                               
                                           
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Email:') }}</label>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Enter Email"  value="{{ $applicant_data->email}}" >
                                                    <span class="invalid-feedback" id="email_error" style="display: none;"></span>
                                              
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Password:') }}</label>
                                        
                                            <div class="form-group">
                                                <input type="password" name="password" class="nice-select niceSelect bordered_style wide @error('password') is-invalid @enderror" placeholder="Enter Password"  value="{{ $applicant_data->password}}" readonly>
                                                <span class="invalid-feedback" id="password_error" style="display: none;"></span>
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Confirm Password:') }}</label>
                                        
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" class="nice-select niceSelect bordered_style wide @error('password_confirmation') is-invalid @enderror" autocomplete="current-password" placeholder="Enter Confirm Password"  value="{{ $applicant_data->password}}" readonly>
                                                <span class="invalid-feedback" id="password_error" style="display: none;"></span>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Contact Number:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="number" name="contact_number" class="nice-select niceSelect bordered_style wide" placeholder="Enter Contact Number"   value="{{ $applicant_data->father_mobile}}">
                                                    <span class="invalid-feedback" id="contact_number_error" style="display: none;"></span>
                                                </div>
                                               
                                        </div>
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Profession:') }}</label>
                                
                                                <div class="form-group">
                                                    <input type="text" name="profession" class="nice-select niceSelect bordered_style wide" placeholder="Enter Profession"  value="{{ $applicant_data->father_profession}}">
                                                     <span class="invalid-feedback" id="profession_error" style="display: none;"></span>
                                               
                                                </div>  
                                        </div>
                                    </div>
                                    <input type="hidden" name="role_id" value="5">
                                    <input type="hidden" name="status" value="active">
                                  
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <input type="hidden" name="action" id="form-action" value="save">
                                            <button type="submit" class="btn btn-lg ot-btn-primary save_1">
                                                <i class="fa fa-refresh"></i> {{ __('Update & Next') }}
                                            </button>
                                            {{-- <button type="submit" class="btn btn-lg ot-btn-primary ml-3">
                                                <i class="fa fa-save"></i> {{ __('Save') }}
                                            </button> --}}
                                        </div>
                                    </div>
                                </form> 

                                <form id="form2" class="form" method="POST"  action="" enctype="multipart/form-data">
                                    @csrf
                                    <h5>Applicant Information</h5><br>
                                    <div class="row">
    
                                    
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('First Name:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="first_name" class="nice-select niceSelect bordered_style wide" placeholder="Student First Name" required  value="{{ $applicant_data->first_name}}" >
                                                
                                                   <span class="invalid-feedback" id="first_name_error" style="display: none;" role="alert"></span>
                                                </div>
                                            </div>
                                    
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Last Name:') }}</label>
    
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" required  value="{{ $applicant_data->last_name}}">
                                           
                                            <span class="invalid-feedback" id="last_name_error" style="display: none;" role="alert"></span>
                                        </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">Gender:</label>
                                                <select class="nice-select sections niceSelect bordered_style wide" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                                    <option value="">Select one of these</option>
                                                    <option value="Male" {{ $applicant_data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $applicant_data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other" {{ $applicant_data->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <input type="text" id="other-gender" name="other_gender" class="form-control mt-2" placeholder="Please specify" style="display: none;" value="{{ $applicant_data->other_gender }}">
                                                <span class="invalid-feedback" id="gender_error" style="display: none;" role="alert"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <span style="color:red">*</span>
                                                <label class="form-label">{{ __('Class:') }}</label>
                                                    <div class="form-group">
                                                        <input name="class" value="{{ $applicant_data->class}}" type="text" class="form-control" placeholder="Enter Class" required>
                                                            <span class="invalid-feedback" id="class_error" style="display: none;" role="alert"></span>
                                                    </div>
                                                    
                                        </div>  
    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span style="color:red">*</span>
                                                <label class="form-label">Date of Birth:</label>
                                                <input name="date_of_birth" value="{{$applicant_data->date_of_birth}}" type="date" class="form-control date-pick" placeholder="Date of birth" required>
                                                <span class="invalid-feedback" id="date_of_birth_error" style="display: none;" role="alert"></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Blood Group:</label>
                                                <select class="nice-select niceSelect bordered_style wide" id="blood-group" name="blood_group" data-fouc data-placeholder="Choose..">
                                                    <option value="">Select one of these</option>
                                                     @foreach($BloodGroup as $BloodGroups)
                                                        <option value="{{ $BloodGroups->bg_code }}" {{ $BloodGroups->bg_code == $applicant_data->blood_group ? 'selected' : '' }}>
                                                            {{ $BloodGroups->bg_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" id="blood_group_error" style="display: none;" role="alert"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                    
                                                <label class="form-label">Religion:</label>
                                                <select class="nice-select niceSelect bordered_style wide" id="religion" name="religion" data-fouc data-placeholder="Choose.." name="section">
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
                                                    <option  value="General"  {{ $applicant_data->category == 'General' ? 'selected': '' }}>General</option>
                                                    <option  value="OBC"  {{ $applicant_data->category == 'OBC' ? 'selected': '' }}>OBC</option>
                                                    <option  value="SC"  {{ $applicant_data->category == 'SC' ? 'selected': '' }}>SC</option>
                                                    <option  value="ST"  {{ $applicant_data->category == 'ST' ? 'selected': '' }}>ST</option>
                                                    <option  value="other"  {{ $applicant_data->category == 'other' ? 'selected': '' }}>Other</option>
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
                                            
                                                <label class="form-label">
                                                    <span style="color:red">*</span> {{ __('Student Photo:') }}  </label>
                                                    <span class="text-info">Accepted Images: jpeg,jpg,png.Max file size 2Mb.</span>
                                              
                                                <input class="form-control" type="file" name="image" accept=".png,.jpg,.jpeg">
                                                <span class="invalid-feedback" id="image_error" style="display: none;" role="alert"></span>
                                                @if($applicant_data->image)
                                                   
                                                        <img src="{{ url('storage/student_photos/' . $applicant_data->image) }}"  height="100px" width="100px">
                                                    
                                                    <p id="pic">File: {{ $applicant_data->image }}</p>
                                                @else
                                                    <p id="pic">File: No File Uploaded</p>
                                                @endif
                                            
                                        </div>
                                        
                                          <div class="col-md-6">
                                            <label class="form-label">{{ __('Previous School') }} <span class="text-info">(If Applicable):</span></label>
                                            <input type="text" class="nice-select niceSelect bordered_style wide" placeholder="Enter Previous School" id="previous_school"  name="previous_school" value="{{ $applicant_data->previous_school}}">
                                            <span class="invalid-feedback" id="previous_school_error" style="display: none;">
                                                <span class="invalid-feedback" id="previous_school_error" style="display: none;">
                                        </div>
                                    </div>
                                    <input type="hidden" name="role_id" value="4">
                                    <input type="hidden" name="status" value="active">
                                   
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_1"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                            <div>
                                                <input type="hidden" name="action" id="form-action" value="save">
                                                <button type="submit" class="btn btn-lg ot-btn-primary save_2">
                                                    <i class="fa fa-refresh"></i> {{ __('Update & Next') }}
                                                </button>
                                                {{-- <button type="submit" class="btn btn-lg ot-btn-primary ml-3">
                                                    <i class="fa fa-save"></i> {{ __('Save') }}
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form class="form" method="POST" id="form3">
                                    @csrf
                                    <h5>Contact Information</h5><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="color:red">*</span>
                                            <label class="form-label">{{ __('Address:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="residence_address" class="nice-select niceSelect bordered_style wide" placeholder="Residance Address" required value="{{ $applicant_data->last_name}}">
                                                   
                                                </div>
                                                
                                        </div>
                                
                                        <div class="col-md-6">
                                        
                                                <div class="form-group">
                                                    <span style="color:red">*</span>
                                                    <label class="form-label">{{ __('Country:') }} </label>
                                                    <div class="autocomplete">
                                                    <input id="country" type="text" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" placeholder="Country" required value="{{ $applicant_data->country}}">
                                                    <span class="invalid-feedback" id="country_error" style="display: none;" role="alert"></span>   
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span style="color:red">*</span>
                                                    <label class="form-label">{{ __('State:') }} </label>
                                                    <div class="autocomplete">
                                                        <input id="state" type="text" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror" name="state" placeholder="State" required value="{{ $applicant_data->state}}">
                                                        <span class="invalid-feedback" id="state_error" style="display: none;" role="alert"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                                <label class="form-label">{{ __('City:') }}</label>
                
                                                    <div class="form-group">
                                                        <input type="text" name="city" class="nice-select niceSelect bordered_style wide" placeholder="City" required value="{{ $applicant_data->city}}">
                                                        <span class="invalid-feedback" id="city_error" style="display: none;" role="alert"></span>
                                                    </div>
                                                   
                                            </div>
                                    
                                        <div class="col-md-6">
                                            
                                            <label class="form-label">{{ __('Pin Code:') }}</label>
            
                                                <div class="form-group">
                                                    <input type="text" name="pin_code" class="nice-select niceSelect bordered_style wide" placeholder="Pin Code" required value="{{ $applicant_data->pin_code}}">
                                                    <span class="invalid-feedback" id="pin_code_error" style="display: none;" role="alert"></span>
                                                </div>
                                                
                                        </div>
                                      
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                            <div>
                                                <button type="button" class="btn ot-btn-primary save_3"><i class="fa fa-refresh"></i> {{ __('Update & Next') }}</button>
                                                 {{-- <button type="submit" class="btn ot-btn-primary ml-3"><i class="fa fa-save"></i> {{ __('Save') }}</button> --}}
                                            </div> 
                                        </div>
                                        {{-- <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_2"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                            <button type="submit" class="btn ot-btn-primary"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                                        </div> --}}
                                    </div>
                                </form>
    
                                <form id="form4" class="form" method="POST">
                                    @csrf
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
                                                        @php
                                                            $documents = json_decode($applicant_data->document);
                                                        @endphp
                            
                                                        @if (!empty($documents))
                                                            @foreach ($documents as $document)
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name" value="{{$document->name}}">
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control" name="document_file[]" value="{{ $document->file}}"  style="margin-top:15px;">
                                                                    <a href="{{ url('storage/student_documents/' . $document->file) }}" target="_blank">
                                                                        File: {{ $document->file }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <!-- Add action buttons if needed -->
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="3">No documents uploaded</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn ot-btn-primary back_3"><i class="fa fa-arrow-left"></i> {{ __('Previous') }}</button>
                                            <button type="submit" class="btn ot-btn-primary save_4"><i class="fa fa-refresh"></i> {{ __('Update') }}</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
     var parent_id = {{ Session::get('parent_id') }};
     $( function() {
    var availableTags = <?php echo json_encode($lang); ?>;
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#student_language" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );

$(document).ready(function() {
    demo.checkFullPageBackgroundImage();

    let currentStep = 1;
    const totalSteps = 4;

    function updateProgressBar(step) {
        const percentage = (step - 1) / (totalSteps - 1) * 100;
        $('.progress-bar').css('width', `${percentage}%`);
        $('#progressbar li').removeClass('active');
        for (let i = 1; i <= step; i++) {
            $(`#step${i}`).addClass('active');
        }
    }

    function displayValidationErrors(errors) {
    $('.invalid-feedback').hide(); // Hide all error messages initially
    $.each(errors, function(key, messages) {
        var errorElement = $('#' + key + '_error');
        errorElement.text(messages.join(', '));
        errorElement.show();
    });
}


    function showForm(step) {
        $('#form1, #form2, #form3, #form4').hide();
        $(`#form${step}`).show();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.save_1').click(function(e) {
        e.preventDefault();
     
        $.ajax({
            url: "{{ route('update-applicant', $applicant_data->id) }}",
            method: 'POST',
            data: $('#form1').serialize(),
            success: function(response) {
                if(response.success) {
                    currentStep = 2;
                    updateProgressBar(currentStep);
                    showForm(currentStep);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                }
            }
        
            
        });
    });
    

    $('.save_2').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "/update-student-applicant/" + parent_id,
            method: 'POST',
            data: new FormData($('#form2')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    currentStep = 3;
                    updateProgressBar(currentStep);
                    showForm(currentStep);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                }
                }
            
            
        });
    });
    $('.save_3').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "/update-contact-applicant/" + parent_id,
            method: 'POST',
            data: $('#form3').serialize(),
             success: function(response) {
                if (response.success) {
                    currentStep = 4;
                    updateProgressBar(currentStep);
                    showForm(currentStep);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                }
                }
            
            
        });
    });
   
    $('.save_4').click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "/update-document-applicant/" + parent_id,
            method: 'POST',
            data: new FormData($('#form4')[0]),
            processData: false,
            contentType: false,
             success: function(response) {
                if (response.success) {
                        Swal.fire({
                        title: "Form Updated successfully",
                        text: "The application form  was updated successfully!",
                        icon: "success",
                        button: "OK",
                        })
                        .then((value) => {
                        window.location.href = "/applicant-list"; // Redirect to the dashboard page
                        });
                    } 
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                
                }
            
            
        });
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
            // $('#other-language').hide();
            $('#other-category').hide();
            $('#other-religion').hide();

            $('#gender').change(function() {
            if (this.value === 'other') {
                $('#other-gender').removeClass('hidden').attr('required', true);

                $('#other-gender').show();
            } else {
                $('#other-gender').addClass('hidden').removeAttr('required');
                $('#other-gender').hide();
            }
        });

        // $('#student_language').change(function() {
        //     if (this.value === 'other') {
        //         $('#other-language').show();
        //     } else {
        //         $('#other-language').hide();
        //     }
        // });

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

           



            var countries = <?php echo json_encode($test); ?>;
    autocomplete(document.getElementById("country"), countries);  

  var parent = ['Parent 1114', 'Parent 1112', 'Parent 1113'];
  autocomplete(document.getElementById("parent_name"), parent);

    function autocomplete(inp, arr) {
        var currentFocus;
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(a);
            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                        if (inp.id === 'country') {
                            fetchStates(inp.value);
                        }
                    });
                    a.appendChild(b);
                }
            }
        });
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    function fetchStates(country) {

        $.ajax({
            url: "{{ route('json-country') }}",
            type: 'POST',
            data: {
                country_id: country,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                var states = data.states.map(function(state) { return state.state; });
                autocomplete(document.getElementById("state"), states);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
});

document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name" required>
            </td>
            <td>
                <input type="file" class="form-control" name="document_file[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-document">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </td>
        `;

        tableBody.appendChild(newRow);
    });

    document.querySelector('#student-document tbody').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-document')) {
            event.target.closest('tr').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2); // Add leading zero
        var day = ('0' + today.getDate()).slice(-2); // Add leading zero

        var currentDate = year + '-' + month + '-' + day;
        document.getElementById('admission_date').value = currentDate;
    });

</script>
@endpush

