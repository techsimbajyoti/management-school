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
                    <div id="step-4" class="book-step" data-toggle="tooltip"
                            data-tippy-content="Appointment Confirmation">
                        <strong>4</strong>
                    </div>
                </div>
            </div> 
            <div id="wizard-frame-1" class="wizard-frame">
                <div class="frame-container">
                    <h4 class="frame-title">Purpose</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Applicant Number : <span>Demo</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Father Name : <span>Demo</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Student Name : <span>Demo</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Class : <span>One</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row frame-content">
                        <div class="col">
                            <div class="form-group">
                                <label for="select-service">Meeting Type <span class="fillable">*</span></label>
                                <select id="meeting_type" class="nice-select niceSelect bordered_style wide" required>
                                    <option value="1">School Type</option>  
                                    <option value="">Entrance Exam</option> 
                                    <option value="">Interview</option>    
                                    <option value="">Document Submission</option> 
                                    <option value="other">Other</option>                        
                                </select>

                                <input type="text" placeholder="Enter Meeting Type" class="nice-select niceSelect bordered_style wide" name="meeting_other" id="meeting_other">
                            </div>
                            <div class="form-group">
                                <label for="select-provider">Meeting Mode <span class="fillable">*</span></label>
                                <select id="meeting_mode" class="nice-select niceSelect bordered_style wide" required>
                                    <option value="office">Offline</option>  
                                    <option value="online">Online</option>
                                </select>

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
                            <div id="calendar"></div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="select-time">
                                <div class="form-group">
                                    <label for="select-timezone">Timezone</label>
                                    <select id="timezone-select" class="nice-select niceSelect bordered_style wide" value="UTC">
                                        <optgroup label="Asia">
                                            <option value="Asia/Istanbul">Istanbul (+2:00)</option>
                                            <option value="Asia/Kuwait">Kuwait (+3:00)</option>
                                            <option value="Asia/Qatar">Qatar (+3:00)</option>
                                            <option value="Asia/Kabul">Kabul (+4:30)</option>
                                            <option value="Asia/Karachi">Karachi (+5:00)</option>
                                            <option value="Asia/Kolkata" selected>Kolkata (+5:30)</option>
                                        </optgroup>
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
                    <button type="button" id="button-back-2" class="btn btn-lg ot-btn-primary" data-step_index="2">
                        <i class="fas fa-chevron-left mr-2"></i>Back
                    </button>
                    <button type="button" id="button-next-2" class="btn btn-lg ot-btn-primary" data-step_index="2">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
                <div class="frame-container">
                    <h4 class="frame-title">Information</h4>
                    <div class="d-flex">
                        <input type="text" placeholder="Search By Applicant Id..." name="applicant_id" class="ot-input form-control">
                    </div>
                    <div class="row frame-content mt-5">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="first-name" class="control-label">
                                    First Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="first-name" class="required form-control" placeholder="First Name"  maxlength="100"/>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">
                                    Email  <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="email" class="required form-control"  placeholder="Email" maxlength="120"/>
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    Phone Number   <span class="text-danger">*</span>                                </label>
                                <input type="text" id="phone-number" placeholder="Phone Number" maxlength="60"
                                    class="required form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    Type  <span class="text-danger">*</span>                                </label>
                                <select class="nice-select niceSelect bordered_style wide" name="type">
                                    <option>Student Interview</option>
                                    <option>Parent Interview</option>
                                    <option>School Visit</option>
                                    <option>Staff Interview</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class="control-label">
                                    Address  
                                </label>
                                <textarea id="address" class="form-control" rows="1" maxlength="500" Placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="last-name" class="control-label">
                                    Last Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="last-name" class="required form-control"
                                maxlength="120"/>
                            </div>
                            <div class="form-group">
                                <label for="city" class="control-label">
                                    City  
                                </label>
                                <input type="text" id="city" class="form-control" Placeholder="City" maxlength="120"/>
                            </div>
                            <div class="form-group">
                                <label for="zip-code" class="control-label">
                                    Zip Code  
                                </label>
                                <input type="text" id="zip-code" class="form-control"  Placeholder=" Zip Code" maxlength="120"/>
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    Meeting Mode  <span class="text-danger">*</span>                                </label>
                                <select class="nice-select niceSelect bordered_style wide" name="type">
                                    <option>Online</option>
                                    <option>Offline</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="control-label">
                                    Notes  
                                </label>
                                <textarea id="notes" maxlength="500" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="command-buttons">
                    <button type="button" id="button-back-3" class="btn btn-lg ot-btn-primary"
                            data-step_index="3">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Back  
                    </button>
                    <button type="button" id="button-next-3" class="btn btn-lg ot-btn-primary"
                            data-step_index="3">
                        Next  <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
            <div id="wizard-frame-4" class="wizard-frame" style="display:none;">
                <div class="frame-container">
                    <h2 class="frame-title">Appointment Confirmation</h2>
                    <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-6">
                            <h4>Appointment</h4>
                            <p class="mb-0">Service: Service</p>
                            <p class="mb-0">Provider: Administrator</p>
                            <p class="mb-0">Start: 01/07/2024 12:00 pm</p>
                            <p class="mb-0"> Timezone: Damascus (+2:00)</p>               
                        </div>
                        <div id="customer-details" class="col-12 col-md-6">
                            <h4>Customer</h4>
                            <p class="mb-0">Customer: demo</p>
                            <p class="mb-0">Phone Number: 1234567890</p>
                            <p class="mb-0"> Email: admin@gmail.com
                            </p> 
                            <p class="mb-0"> Meeting Mode: Offline</p> 
                            <p class="mb-0"> Meeting Type: Student Interview</p> 


                        </div>
                    </div>
                </div>
                <div class="command-buttons">
                    <button type="button" id="button-back-4" class="btn btn-lg ot-btn-primary"
                            data-step_index="4">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Back  
                    </button>
                    <button type="button" id="button-next-3" class="btn btn-lg ot-btn-primary"
                            data-step_index="3">
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
 $(document).ready(function() {
    $('#meeting_mode_other').hide();
    $('#meeting_other').hide();

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


var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
       
    });
    calendar.render();
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

