@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant-list'
])
@section('content')

  
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/bootstrap/css/bootstrap.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/jquery-ui/jquery-ui.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/ext/cookieconsent/cookieconsent.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/css/frontend.min.css?6398SW">
<link rel="stylesheet" type="text/css" href="https://demo.easyappointments.org/assets/css/general.min.css?6398SW">


@section('content')
<style>
    #book-appointment-wizard #header {
     background: #324AAA;
}

#book-appointment-wizard #available-hours .selected-hour {
    background-color: #324AAA;
    border-color: #324AAA;
    color: #fff;
}
.selected-hour {
    background-color: #324AAA;
    border-color: #324AAA;
    color: #fff;
}

.btn-outline-primary {
    background: transparent;
    border: 2px solid #324AAA !important;
    color: #324AAA;
    
}
.btn-outline-primary:hover {
    background-color: #324AAA !important;
    color: rgba(255, 255, 255, 0.8) !important;
    border-color: #324AAA !important;
    
}

#book-appointment-wizard .book-step strong {
    font-size: 12px;
    display: block;
    text-align: center;
    color: white;
    transition: all .3s linear;
    cursor: default;
}


#book-appointment-wizard .active-step {
    display: inline-block;
    height: 45px;
    width: 45px;
    float: left;
    background: #33B4E8;
    padding: 7px;
    margin-right: 13px;
    margin-top: 0;
}

#book-appointment-wizard .book-step {
    display: inline-block;
    height: 35px;
    width: 35px;
    float: left;
    background: #33B4E8;
    padding: 8px;
    margin-right: 12px;
    margin-top: 6px;
    border-radius: 0.25rem;
    transition: all .3s linear;
}


#book-appointment-wizard .active-step strong {
    color: white;
    font-size: 21px;
    
}
    </style>
<div class="content">
<div class="row">
    <div id="book-appointment-wizard" class="col-12 col-xl-8">
      
             <!-- FRAME TOP BAR -->

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
              <!-- SELECT SERVICE AND PROVIDER -->

            <div id="wizard-frame-1" class="wizard-frame">
                <div class="frame-container">
                    <h2 class="frame-title">Service & Provider</h2>

                    <div class="row frame-content">
                        <div class="col">
                            <div class="form-group">
                                <label for="select-service">
                                    <strong>Service</strong>
                                </label>

                                <select id="select-service" class="nice-select niceSelect bordered_style wide"required>
                                    <option value="1">Service</option>                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-provider">
                                    <strong>Provider</strong>
                                </label>

                                <select id="select-provider" class="nice-select niceSelect bordered_style wide" required>
                                    <option value="1">John Doe</option>  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="select-provider" style="margin-bottom:0;">
                                    <strong>Service</strong>
                                </label><br>
                                <label for="select-provider">
                                    [Duration 30 Minutes]
                                </label>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="command-buttons">
                    <span>&nbsp;</span>

                    <button type="button" id="button-next-1" class="btn btn-lg ot-btn-primary"
                            data-step_index="1">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        <div id="wizard-frame-2" class="wizard-frame" style="display:none;">
            <div class="frame-container">

                    <h2 class="frame-title">Appointment Date & Time</h2>

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
                                            <option value="Asia/Amman">Amman (+2:00)</option>
                                            <option value="Asia/Beirut">Beirut (+2:00)</option>
                                            <option value="Asia/Damascus">Damascus (+2:00)</option>
                                            <option value="Asia/Gaza">Gaza (+2:00)</option>
                                            <option value="Asia/Istanbul">Istanbul (+2:00)</option>
                                            <option value="Asia/Jerusalem">Jerusalem (+2:00)</option>
                                            <option value="Asia/Nicosia">Nicosia (+2:00)</option>
                                            <option value="Asia/Tel_Aviv">Tel_Aviv (+2:00)</option>
                                            <option value="Asia/Aden">Aden (+3:00)</option>
                                            <option value="Asia/Baghdad">Baghdad (+3:00)</option>
                                            <option value="Asia/Bahrain">Bahrain (+3:00)</option>
                                            <option value="Asia/Kuwait">Kuwait (+3:00)</option>
                                            <option value="Asia/Qatar">Qatar (+3:00)</option>
                                            <option value="Asia/Tehran">Tehran (+3:30)</option>
                                            <option value="Asia/Baku">Baku (+4:00)</option>
                                            <option value="Asia/Dubai">Dubai (+4:00)</option>
                                            <option value="Asia/Muscat">Muscat (+4:00)</option>
                                            <option value="Asia/Tbilisi">Tbilisi (+4:00)</option>
                                            <option value="Asia/Yerevan">Yerevan (+4:00)</option>
                                            <option value="Asia/Kabul">Kabul (+4:30)</option>
                                            <option value="Asia/Aqtau">Aqtau (+5:00)</option>
                                            <option value="Asia/Aqtobe">Aqtobe (+5:00)</option>
                                            <option value="Asia/Ashgabat">Ashgabat (+5:00)</option>
                                            <option value="Asia/Ashkhabad">Ashkhabad (+5:00)</option>
                                            <option value="Asia/Dushanbe">Dushanbe (+5:00)</option>
                                            <option value="Asia/Karachi">Karachi (+5:00)</option>
                                            <option value="Asia/Oral">Oral (+5:00)</option>
                                            <option value="Asia/Samarkand">Samarkand (+5:00)</option>
                                            <option value="Asia/Tashkent">Tashkent (+5:00)</option>
                                            <option value="Asia/Yekaterinburg">Yekaterinburg (+5:00)</option>
                                            <option value="Asia/Calcutta">Calcutta (+5:30)</option>
                                            <option value="Asia/Colombo">Colombo (+5:30)</option>
                                            <option value="Asia/Kolkata">Kolkata (+5:30)</option>
                                            <option value="Asia/Katmandu">Katmandu (+5:45)</option>
                                            <option value="Asia/Almaty">Almaty (+6:00)</option>
                                            <option value="Asia/Bishkek">Bishkek (+6:00)</option>
                                            <option value="Asia/Dacca">Dacca (+6:00)</option>
                                            <option value="Asia/Dhaka">Dhaka (+6:00)</option>
                                            <option value="Asia/Novosibirsk">Novosibirsk (+6:00)</option>
                                            <option value="Asia/Omsk">Omsk (+6:00)</option>
                                            <option value="Asia/Qyzylorda">Qyzylorda (+6:00)</option>
                                            <option value="Asia/Thimbu">Thimbu (+6:00)</option>
                                            <option value="Asia/Thimphu">Thimphu (+6:00)</option>
                                            <option value="Asia/Rangoon">Rangoon (+6:30)</option>
                                            <option value="Asia/Bangkok">Bangkok (+7:00)</option>
                                            <option value="Asia/Ho_Chi_Minh">Ho_Chi_Minh (+7:00)</option>
                                            <option value="Asia/Hovd">Hovd (+7:00)</option>
                                            <option value="Asia/Jakarta">Jakarta (+7:00)</option>
                                            <option value="Asia/Krasnoyarsk">Krasnoyarsk (+7:00)</option>
                                            <option value="Asia/Phnom_Penh">Phnom_Penh (+7:00)</option>
                                            <option value="Asia/Pontianak">Pontianak (+7:00)</option>
                                            <option value="Asia/Saigon">Saigon (+7:00)</option>
                                            <option value="Asia/Vientiane">Vientiane (+7:00)</option>
                                            <option value="Asia/Brunei">Brunei (+8:00)</option>
                                            <option value="Asia/Choibalsan">Choibalsan (+8:00)</option>
                                            <option value="Asia/Chongqing">Chongqing (+8:00)</option>
                                            <option value="Asia/Chungking">Chungking (+8:00)</option>
                                            <option value="Asia/Harbin">Harbin (+8:00)</option>
                                            <option value="Asia/Hong_Kong">Hong_Kong (+8:00)</option>
                                            <option value="Asia/Irkutsk">Irkutsk (+8:00)</option>
                                            <option value="Asia/Kashgar">Kashgar (+8:00)</option>
                                            <option value="Asia/Kuala_Lumpur">Kuala_Lumpur (+8:00)</option>
                                            <option value="Asia/Kuching">Kuching (+8:00)</option>
                                            <option value="Asia/Macao">Macao (+8:00)</option>
                                            <option value="Asia/Macau">Macau (+8:00)</option>
                                            <option value="Asia/Makassar">Makassar (+8:00)</option>
                                            <option value="Asia/Manila">Manila (+8:00)</option>
                                            <option value="Asia/Shanghai">Shanghai (+8:00)</option>
                                            <option value="Asia/Singapore">Singapore (+8:00)</option>
                                            <option value="Asia/Taipei">Taipei (+8:00)</option>
                                            <option value="Asia/Ujung_Pandang">Ujung_Pandang (+8:00)</option>
                                            <option value="Asia/Ulaanbaatar">Ulaanbaatar (+8:00)</option>
                                            <option value="Asia/Ulan_Bator">Ulan_Bator (+8:00)</option>
                                            <option value="Asia/Urumqi">Urumqi (+8:00)</option>
                                            <option value="Asia/Dili">Dili (+9:00)</option>
                                            <option value="Asia/Jayapura">Jayapura (+9:00)</option>
                                            <option value="Asia/Pyongyang">Pyongyang (+9:00)</option>
                                            <option value="Asia/Seoul">Seoul (+9:00)</option>
                                            <option value="Asia/Tokyo">Tokyo (+9:00)</option>
                                            <option value="Asia/Yakutsk">Yakutsk (+9:00)</option>
                                            <option value="Asia/Sakhalin">Sakhalin (+10:00)</option>
                                            <option value="Asia/Vladivostok">Vladivostok (+10:00)</option>
                                            <option value="Asia/Magadan">Magadan (+11:00)</option>
                                            <option value="Asia/Anadyr">Anadyr (+12:00)</option>
                                            <option value="Asia/Kamchatka">Kamchatka (+12:00)</option>
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
                <button type="button" id="button-back-2" class="btn btn-lg ot-btn-primary"
                        data-step_index="2">
                    <i class="fas fa-chevron-left mr-2"></i>
                    Back
                </button>
                <button type="button" id="button-next-2" class="btn btn-lg ot-btn-primary"
                        data-step_index="2">
                    Next <i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>
        <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
            <div class="frame-container">

                <h2 class="frame-title">Information</h2>

                <div class="row frame-content">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="control-label">
                                First Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="first-name" class="required form-control" maxlength="100"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="control-label">
                                Email  <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="email" class="required form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="phone-number" class="control-label">
                                Phone Number   <span class="text-danger">*</span>                                </label>
                            <input type="text" id="phone-number" maxlength="60"
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
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="last-name" class="control-label">
                                Last Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="last-name" class="required form-control" maxlength="120"/>
                        </div>
                        {{-- <div class="form-group">
                            <label for="address" class="control-label">
                                Address  
                            </label>
                            <input type="text" id="address" class="form-control" maxlength="120"/>
                        </div> --}}
                        <div class="form-group">
                            <label for="city" class="control-label">
                                City  
                            </label>
                            <input type="text" id="city" class="form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="zip-code" class="control-label">
                                Zip Code  
                            </label>
                            <input type="text" id="zip-code" class="form-control" maxlength="120"/>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="control-label">
                                Notes  
                            </label>
                            <textarea id="notes" maxlength="500" class="form-control" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address" class="control-label">
                                Address  
                            </label>
                            <input type="text" id="address" class="form-control" maxlength="120"/>
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
                        <p class="mb-0">Provider: Jane Doe</p>
                        <p class="mb-0">Start: 01/07/2024 12:00 pm</p>
                        <p class="mb-0"> Timezone: Damascus (+2:00)</p>               
                    </div>
                    <div id="customer-details" class="col-12 col-md-6">
                        <h4>Customer</h4>
                        <p class="mb-0">Customer: demo</p>
                        <p class="mb-0">Provider: Jane Doe</p>
                        <p class="mb-0">Phone Number: 1234567890</p>
                        <p class="mb-0"> Email: admin@gmail.com
                        </p>     

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

