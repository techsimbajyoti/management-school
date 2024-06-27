@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'schedule-meeting'
])
@section('content')

  
<link rel="stylesheet" type="text/css" href="{{asset('paper')}}/css/easyappointments/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('paper')}}/css/easyappointments/cookieconsent.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('paper')}}/css/easyappointments/frontend.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('paper')}}/css/easyappointments/general.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('paper')}}/css/easyappointments/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@section('content')
<div class="content">
    <div class="row">
        <div id="book-appointment-wizard" class="col-12 col-xl-8">
            <div id="header">
                <span id="company-name">School Name</span>
                <div id="steps">
                    <div id="step-1" class="book-step active-step"
                            data-tippy-content="Service & Provider">
                        <strong>1</strong>
                    </div>
                    <div id="step-2" class="book-step" data-toggle="tooltip"
                            data-tippy-content="Appointment Date & Time">
                        <strong>2</strong>
                    </div>
                    <div id="step-3" class="book-step" data-toggle="tooltip"
                            data-tippy-content="Customer Information">
                        <strong>3</strong>
                    </div>
                </div>
            </div> 
            <div id="wizard-frame-1" class="wizard-frame">
                <div class="frame-container">
                    @if($meetingStatus == 'schedule-meeting')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="title">Applicant Number : <span>Demo</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="title">Father Name : <span>Demo</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="title">Student Name : <span>Demo</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="title">Class : <span>One</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($meetingStatus == 'applicant-1')
                    <div class="d-flex">
                        <input type="text" placeholder="Search By Applicant Id..." name="applicant_id" class="ot-input form-control ot-input">
                    </div>
                    <div class="row frame-content mt-5">
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="control-label">
                                    First Name 
                                </label>
                                <input type="text" id="first-name" class="form-control ot-input" placeholder="First Name"  maxlength="100"/>
                            </div>
                        </div>    
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="last-name" class="control-label">
                                    Last Name 
                                </label>
                                <input type="text" id="last-name" placeholder="Enter Last Name" class=" form-control ot-input"
                                maxlength="120"/>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label for="email" class="control-label">
                                    Email  
                                </label>
                                <input type="text" id="email" class=" form-control ot-input"  placeholder="Email" maxlength="120"/>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">    
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    Phone Number                                   </label>
                                <input type="text" id="phone-number" placeholder="Phone Number" maxlength="60"
                                    class=" form-control ot-input"/>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">    
                            <div class="form-group">
                                <label for="address" class="control-label">
                                    Address  
                                </label>
                                <textarea id="address" class="form-control ot-input" rows="1" maxlength="500" Placeholder="Address"></textarea>
                            </div>
                        </div>    
                       
                        
                        <div class="col-6 col-md-6">    
                            <div class="form-group">
                                <label for="city" class="control-label">
                                    City  
                                </label>
                                <input type="text" id="city" class="form-control ot-input" Placeholder="City" maxlength="120"/>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">    
                            <div class="form-group">
                                <label for="zip-code" class="control-label">
                                    Zip Code  
                                </label>
                                <input type="text" id="zip-code" class="form-control ot-input"  Placeholder=" Zip Code" maxlength="120"/>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row frame-content">
                        <div class="col">
                            <div class="form-group">
                                <label for="select-service">Purpose <span class="fillable">*</span></label>
                                <select id="meeting_type" class="nice-select niceSelect bordered_style wide" >
                                    <option value="1">School Type</option>  
                                    <option value="">Entrance Exam</option> 
                                    <option value="">Student Interview</option>
                                    <option value="">Parent Interview</option>    
                                    <option value="">Document Submission</option> 
                                    <option value="other">Other</option>                        
                                </select>

                                <input type="text" placeholder="Enter Meeting Type" class="nice-select niceSelect bordered_style wide" name="meeting_other" id="meeting_other">
                            </div>
                            <div class="form-group">
                                <label for="select-provider">Meeting Mode <span class="fillable">*</span></label>
                                <select id="meeting_mode" class="nice-select niceSelect bordered_style wide" >
                                    <option value="">Please select one of these</option>
                                    <option value="offline">Offline</option>  
                                    <option value="online">Online</option>
                                </select>
                                <input type="text" placeholder="Enter location" class="nice-select niceSelect bordered_style wide" name="meeting_location" id="meeting_location">
                                <input type="text" placeholder="Enter Meeting Mode Url" class="nice-select niceSelect bordered_style wide" name="meeting_mode_other" id="meeting_mode_other">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="command-buttons text-right">
                    <button type="button" id="button-next-1" class="btn btn-lg ot-btn-primary" data-step_index="1">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            <div id="wizard-frame-2" class="wizard-frame">
                <div class="frame-container">
                    <h4 class="frame-title">Meeting Date & Time</h4>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" id="datepicker" placeholder="Please Select a date">
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="select-time">
                                <div class="form-group">
                                    <label for="select-timezone">Timezone</label>
                                    <select id="timezone-select" class="nice-select niceSelect bordered_style wide" value="UTC">
                                        <option value="Asia/Kolkata" selected>Kolkata (+5:30)</option>
                                    </select>
                                </div>
                                <div id="available-hours"  style="display: none;">
                                    <button class="btn btn-outline-primary  btn-block shadow-none available-hour selected-hour">1:30 pm </button>
                                    <button class="btn btn-outline-primary  btn-block shadow-none available-hour">2:30 pm </button>
                                    <button class="btn btn-outline-primary  btn-block shadow-none available-hour">3:30 pm </button>
                                    <button class="btn btn-outline-primary  btn-block shadow-none available-hour">4:30 pm </button>
                                    <button class="btn btn-outline-primary  btn-block shadow-none available-hour">5:30 pm </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="command-buttons">
                    <button type="button" id="button-back-2" class="btn btn-lg ot-btn-primary"
                            data-step_index="2">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Back  
                    </button>
                    <button type="button" id="button-next-2" class="btn btn-lg ot-btn-primary"
                            data-step_index="2">
                        Next  <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
                <div class="frame-container">
                    <h3 class="frame-title">Meeting Confirmation</h3>
                    <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-12">
                            <h5>Meeting Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Start:</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">01/07/2024 12:00 pm</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Timezone:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">Kolkata (+5:30)</p>  
                                </div>
                            </div>
                                         
                        </div>
                        <div id="customer-details" class="col-12 col-md-12 mt-5">
                            <h5>Applicant Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Applicant:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">demo</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Phone Number:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">1234567890</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Email:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">admin@gmail.com</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Meeting Mode:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">Offline</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Meeting Type:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">Student Interview</p>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="command-buttons">
                    <button type="button" id="button-back-3" class="btn btn-lg ot-btn-primary" data-step_index="3">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Back  
                    </button>
                    <button type="button" id="button-next-2" class="btn btn-lg ot-btn-primary" data-step_index="2">
                        Confirm  <i class="fas fa-check-square ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>   
 
@endsection
@push('scripts')
<script>
     document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d", // Date format (e.g., YYYY-MM-DD)
            defaultDate: "today", // Default date (today's date)
            onChange: function(selectedDates, dateStr, instance) {
                alert('Selected Date: ' + dateStr); // Show selected date in an alert
            }
        });
    });

 $(document).ready(function() {
    $('#meeting_mode_other').hide();
    $('#meeting_other').hide();
    $('#meeting_location').hide();

    $('#meeting_type').change(function(){
        if($(this).val() == 'other'){
            $('#meeting_other').show();
        }else{
            $('#meeting_other').hide();
        }
    });

    $('#meeting_mode').change(function(){
        if($(this).val() == 'online'){
            $('#meeting_mode_other').show();
        }else{
            $('#meeting_mode_other').hide();
        }

        if($(this).val() == 'offline'){
            $('#meeting_location').show();
        }else{
            $('#meeting_location').hide();
        }
    });

    $('#timezone-select').change(function() {
        if ($(this).val() !== '') {
            $('#available-hours').show();
        } else {
            $('#available-hours').hide();
        }
    });

    $('#available-hours').on('click', '.available-hour', function() {
        $('.available-hour').removeClass('selected-hour');
        $(this).addClass('selected-hour');
    });

});

$('document').ready(function() {
    $('#wizard-frame-2').hide();
    $('#wizard-frame-3').hide();  
    $('#wizard-frame-4').hide(); 
   
    $('#button-next-1').click(function(e) {
        e.preventDefault(); 
        $('#wizard-frame-2').show(); 
        $('#wizard-frame-1').hide(); 
        $('#wizard-frame-3').hide();
        $('#wizard-frame-4').hide(); 
        updateSteps(2);
        // Open flatpickr calendar immediately after page load
        document.querySelector("#datepicker")._flatpickr.open();
    });
    $('#button-next-2').click(function() {
       $('#wizard-frame-3').show();
        $('#wizard-frame-2').hide(); 
        $('#wizard-frame-1').hide(); 
        $('#wizard-frame-4').hide(); 
         updateSteps(3);
    });
    $('#button-next-3').click(function(e) {
        $('#wizard-frame-4').show(); 
        $('#wizard-frame-3').hide(); 
        $('#wizard-frame-2').hide(); 
        $('#wizard-frame-1').hide(); 
        updateSteps(4);
    });


         $('#button-back-2').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').hide(); 
            $('#wizard-frame-1').show(); 
            $('#wizard-frame-3').hide();
            $('#wizard-frame-4').hide(); 
            updateSteps(1);
        })

        $('#button-back-3').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').show();
            $('#wizard-frame-1').hide(); 
            $('#wizard-frame-3').hide();
            $('#wizard-frame-4').hide(); 
            updateSteps(2);
        })
       
        $('#button-back-4').click(function(e){
            e.preventDefault(); 
            $('#wizard-frame-2').hide(); 
            $('#wizard-frame-1').hide(); 
            $('#wizard-frame-3').show();
            $('#wizard-frame-4').hide(); 
            updateSteps(3);
        })

        function updateSteps(step) {
                $('.book-step').removeClass('active-step');
                $('#step-' + step).addClass('active-step');
            }
      
});
    

</script>
@endpush

