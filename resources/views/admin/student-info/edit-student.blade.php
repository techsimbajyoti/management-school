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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 title">{{ __('Update Student') }}</h5>
                            <a href="{{ route('students')}}" class="btn btn-lg ot-btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        
                    </div>
            
                <form action="{{route('post-admit-student')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="card ot-card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Please update the student details') }}</h6>
                            
                        </div>
                        <hr>

                        <div class="card-body">
                            <h5>Student Information</h5><br>
                            <div class="row mb-3">
                              
                                <div class="col-md-4">
                                   
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Admission No.:') }}</label>
    
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
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Name:') }}</label>
                                    <div class="form-group">
                                    <select class="nice-select sections niceSelect bordered_style wide" id="parent_name" name="parent_name"  data-fouc data-placeholder="Choose.." >
                                        <option value="">Parent Name</option>
                                        <option  value="Parent1">Parent1</option>
                                        <option  value="Parent2">Parent2</option>
                                      
                                    </select>
                                </div>
                                </div>
                                        @if ($errors->has('parent_name')) 
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                            </span>
                                        @endif
                             
                                <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('First Name:') }}</label>
    
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
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Last Name:') }}</label>

                                    <div class="form-group">
                                        <input type="text" name="last_name" class="nice-select niceSelect bordered_style wide" placeholder="Student Last Name" required>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Email address:') }}</label>
    
                                     <div class="form-group">
                                         <input type="text" name="email" class="nice-select niceSelect bordered_style wide" placeholder="Email Address" required value="admin@gmail.com">
                                     </div>
                                     @if ($errors->has('email'))
                                         <span class="invalid-feedback" style="display: block;" role="alert">
                                             <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                     @endif
                                 </div> 
                                 <div class="col-md-3">
                                    <span style="color:red">*</span>
                                     <label class="form-label" style="font-weight: 600;">{{ __('Password:') }}</label>
  
                                      <div class="form-group">
                                          <input type="password" name="password" class="nice-select niceSelect bordered_style wide" value="123456789" required>
                                          <span style="font-size: 12px;">Default Password: 123456789</span>

                                      </div>
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback" style="display: block;" role="alert">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div> 
                                  <div class="col-md-3">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">Gender:</label>
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
                                <div class="col-md-3">
                                    <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">{{ __('Class:') }}</label>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label" style="font-weight: 600;">Section:</label>
                                            <select class="nice-select sections niceSelect bordered_style wide"  name="section" required data-fouc data-placeholder="Choose.." name="section">
                                                <option value="">Select one of these</option>
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
                                        <input name="date_of_birth" value="" type="date" class="form-control date-pick" placeholder="Date of birth">
        
                                    </div>
                                </div>
                                <div class="col-md-3">
                            
                                    <label class="form-label" style="font-weight: 600;">{{ __('Place Of Birth:') }}</label>
    
                                        <div class="form-group">
                                            <input type="text" name="place_of_birth" class="nice-select niceSelect bordered_style wide" placeholder="Place Of Birth">
                                        </div>
                                        @if ($errors->has('place_of_birth'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('place_of_birth') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            
                                
                                
                                                  
                            </div>

                            <div class="row mb-3">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <label class="form-label" style="font-weight: 600;">Blood Group:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="blood-group" name="blood_group"  data-fouc data-placeholder="Choose.." name="blood_group">
                                            <option value="">Select one of these</option>
                                            <option  value="A+">A+</option>
                                            <option  value="A">A-</option>
                                            <option  value="B+">B+</option>
                                            <option  value="B-">B-</option>
                                            <option  value="AB+">AB+</option>
                                            <option  value="AB-">AB-</option>
                                            <option  value="O+">O+</option>
                                            <option  value="O-">O-</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                            
                                        <label class="form-label" style="font-weight: 600;">Religion:</label>
                                        <select class="nice-select niceSelect bordered_style wide" id="religion" name="religion" required data-fouc data-placeholder="Choose.." name="section">
                                            <option value="">Select one of these</option>
                                            <option value="Hindu">Hindu</option>
                                            <option  value="Muslim">Muslim</option>
                                            <option  value="Christian"> Christian</option>
                                            <option  value="Jain"> Jain</option>
                                            <option  value="Buddhist"> Buddhist</option>
                                            <option  value="Sikh">Sikh</option>
                                            <option  value="other">Other</option>
                                        </select>
                                        <input type="text" id="other-religion" name="other_religion" class="hidden nice-select niceSelect bordered_style wide mt-2" placeholder="Please specify">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <label class="form-label" style="font-weight: 600;">Category:</label>
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
                                 <div class="col-md-3">
                                    
                                    <label class="form-label" style="font-weight: 600;">{{ __('Student Language:') }}</label>
    
                                    <select class="nice-select niceSelect bordered_style wide" id="student_language" name="student_language"  data-fouc data-placeholder="Choose..">
                                        <option value="">Select one of these</option>
                                        <option  value="Hindi">Hindi</option>
                                        <option  value="English">English</option>
                                        <option  value="French">French</option>
                                        <option  value="other">Other</option>
                                    </select>
                                    <input type="text" id="other-language" name="other_gender" class="nice-select niceSelect bordered_style wide" placeholder="Please specify">
                                   
                                    @if ($errors->has('student_language'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('student_language') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                    
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span style="color:red">*</span>
                                        <label class="form-label" style="font-weight: 600;">{{ __('Admission Date:') }}</label>
                                        <input type="date" name="admission_date" id="admission_date" class="form-control">
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <label class="form-label" style="font-weight: 600;">{{ __('Student Photo:') }}</label>
                                        <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" required>
                                
                                    </div>
                            </div>
                            <hr style="margin-top: 50px">
                            <h5 style="margin-top:30px;">Contact Information</h5><br>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Address:') }}</label>
    
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
                                            <label class="form-label" style="font-weight: 600;">{{ __('Country:') }} </label>
                                            <select id="country" class="nice-select niceSelect bordered_style wide @error('country') is-invalid @enderror" name="country" required>
                                                <option value="">Select country</option>
                                                    @foreach ($country as $data)
                                                        <option value="{{ $data->id }}" {{ (old('country') == $data->id) ? 'selected' : '' }}>
                                                            {{ $data->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span style="color:red">*</span>
                                            <label class="form-label" style="font-weight: 600;">{{ __('State:') }} </label>
                                            <select name="state" id="state" class="nice-select niceSelect bordered_style wide @error('state') is-invalid @enderror">
                                                <option value="">Select state</option>
                                                @foreach ($state as $data)
                                                    <option value="{{ $data->id }}" {{ (old('state') == $data->id) ? 'selected' : '' }}>
                                                        {{ $data->state }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    
                                        <label class="form-label" style="font-weight: 600;">{{ __('City:') }}</label>
        
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
                                    
                                    <label class="form-label" style="font-weight: 600;">{{ __('Pin Code:') }}</label>
    
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
                                    <label class="form-label" style="font-weight: 600;">{{ __('Contact Number:') }}</label>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="nice-select niceSelect bordered_style wide" placeholder="Phone No." required>
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                               
                               <div class="col-md-4">
                                    <span style="color:red">*</span>
                                    <label class="form-label" style="font-weight: 600;">{{ __('Parent Mobile:') }}</label>
                                       <div class="form-group">
                                            <input type="text" name="parent_mobile" class="nice-select niceSelect bordered_style wide" placeholder="Parent Mobile" required>
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
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
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

        $('#student_language').change(function() {
            if (this.value === 'other') {
                $('#other-language').show();
            } else {
                $('#other-language').hide();
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

            var sections = {
                1: ["A", "B", "C"],
                2: ["D", "E"],
                3: ["F", "G", "H", "I"]
            };

            $('#getSections').change(function() {
                var classId = $(this).val();
                var $sectionsDropdown = $('.sections');
                $sectionsDropdown.empty();
                $sectionsDropdown.append('<option value="">Select section</option>');

                if (sections[classId]) {
                    sections[classId].forEach(function(section) {
                        $sectionsDropdown.append('<option value="' + section + '">' + section + '</option>');
                    });
                }
            });

            



        });
        $('#state').on('change', function () {
                var idState = $(this).val();
                
                // $("#country").html('');
                $.ajax({
                    url: "{{url('json-state')}}",
                    type: "POST",
                    data: { 
                        state_id: idState,
                        _token: '{{csrf_token()}}' 
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#country').html('<option value="">Select Country</option>');
                        $.each(result.states, function (key, value) {
                            $("#country").append('<option value="' + value
                                .id + '">' + value.country + '</option>');
                        });
                        // $('#city-dd').html('<option value="">Select City</option>');
                        $("#country").val('{{ old('country') }}');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log any error response
                    }
                });
            });
            
    document.getElementById('add-document').addEventListener('click', function() {
        var tableBody = document.querySelector('#student-document tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
            </td>
            <td>
                <input type="file" class="form-control" name="document_file[]">
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






                               
                               