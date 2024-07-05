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

@section('content')
<div class="content">
<div id="success-message" style="display: none;" class="alert alert-success" role="alert">
</div>

    <div class="row">
        <div id="book-appointment-wizard" class="col-12 col-xl-8">
            <div id="header">
                <span id="company-name">Schedule Meeting</span>
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
            <form id="form-1" action="" method="POST">
                @csrf
            <div id="wizard-frame-1" class="wizard-frame">
                <div class="frame-container">
                    @if($meetingStatus != 'schedule-meeting')
                   <input type="hidden" value="{{$info->student_id}}" name="student_id">
                   <input type="hidden" value="{{$info->parent_id}}" name="parent_id">
                   <input type="hidden" value="{{$info->applicant_id}}" name="applicant_id">
                   <input type="hidden" value="{{$info->email}}" name="email">
                 
                                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                <p class="title">Applicant Number : <span>{{$info->applicant_id}}</span></p>
                            </div>
                                <div class="col-md-6">
                                <p class="title">Father Name : <span>{{ isset($info->father_name) ? $info->father_name:''}}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <p class="title">Student Name : <span>{{ isset($info->first_name) ? $info->first_name : '' }} {{ isset($info->last_name) ? $info->last_name : ''}}</span></p>
                                  
                                </div>
                                <div class="col-md-6">
                                    <p class="title">Class : <span>{{isset($info->class) ? $info->class : ''}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                
                    @if($meetingStatus == 'schedule-meeting')
                    <div class="d-flex autocomplete">
                        <input type="text" placeholder="Search By Applicant Id..." id="applicantIds" name="applicantIds" class="ot-input form-control ot-input">
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
                                <select id="meeting_type" class="nice-select niceSelect bordered_style wide" name="meeting_type" >
                                    <option value="School Type">School Type</option>  
                                    <option value="Entrance Exam">Entrance Exam</option> 
                                    <option value="Student Interview">Student Interview</option>
                                    <option value="Parent Interview">Parent Interview</option>    
                                    <option value="Document Submission">Document Submission</option> 
                                    <option value="other">Other</option>                        
                                </select>
                               <input type="text" placeholder="Enter Meeting Type" class="nice-select niceSelect bordered_style wide" name="meeting_other" id="meeting_other">
                                                   
                            </div>
                            <div class="form-group">
                                <label for="select-provider">Meeting Mode <span class="fillable">*</span></label>
                                <select id="meeting_mode" class="nice-select niceSelect bordered_style wide" name="meeting_mode">
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
                    <button type="submit" id="button-next-1" class="btn btn-lg ot-btn-primary" data-step_index="1">
                        Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
        <form id="form-2" action="" method="POST">
            @csrf
            <div id="wizard-frame-2" class="wizard-frame">
                <div class="frame-container">
                    <h4 class="frame-title">Meeting Date & Time</h4>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-5">
                            <div id="datepicker"></div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="select-time">
                                <div class="form-group">
                                    <label for="select-timezone">Timezone</label>
                                    <select id="timezone-select" class="nice-select niceSelect bordered_style wide" value="UTC">
                                        <option value="Asia/Kolkata" selected>Kolkata (+5:30)</option>
                                    </select>
                                </div>
                                <div id="available-hours">
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
                    <button type="submit" id="button-next-2" class="btn btn-lg ot-btn-primary"
                            data-step_index="2">
                        Next  <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
        <form id="form-3" action="" method="POST">
            @csrf
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
                                    <p class="mb-0">{{ ($step2Data['meeting_date']) ?? '' }}, {{ $step2Data['meeting_time'] ?? '' }}</p>
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
                                    <p class="mb-0">{{isset($info->first_name) ? $info->first_name: ''}} {{ isset($info->last_name) ? $info->last_name : ''}}</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Phone Number:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{ isset($info->father_mobile) ? $info->father_mobile : ''}}</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Email:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{isset($info->email) ? $info->email : ''}}</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Meeting Mode:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{ isset($step1Data['meeting_mode']) ? $step1Data['meeting_mode']:''}}</p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-0"><strong>Meeting Purpose:</strong></p>  
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-0">{{isset($step1Data['meeting_type']) ? ($step1Data['meeting_type']) :'' }}</p>  
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
                    <button type="submit" id="button-next-3" class="btn btn-lg ot-btn-primary" data-step_index="2">
                        Confirm  <i class="fas fa-check-square ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>   
 
@endsection
@push('scripts')
<!-- Example with CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
  $(document).ready(function() {
var student = <?php echo json_encode($ApplicantId); ?>;

autocomplete(document.getElementById("applicantIds"), student);

function autocomplete(inp, arr) {
    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            // Check if the input value matches the start of the applicant_id or the name
            if (arr[i].applicant_id.substr(0, val.length).toUpperCase() == val.toUpperCase() ||
                arr[i].name.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                // Highlight the matching part of the applicant_id and name
                b.innerHTML = "<strong>" + arr[i].applicant_id.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].applicant_id.substr(val.length) + " - ";
                b.innerHTML += "<strong>" + arr[i].name.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].name.substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i].applicant_id + " - " + arr[i].name + "'>";
                b.addEventListener("click", function(e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
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

    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}
        $('#applicantIds').on('click', function() {
            var value = $('#applicantIds').val(); 
            console.log("Applicant ID:", value);

            $.ajax({
                url: '/get-applicant-id', 
                method: 'POST', 
                data: {
                    applicant_id: value,
                   
                },
                success: function(response) {
                   console.log(response);
                },
                error: function(xhr, status, error) {
                     console.error(xhr.responseText);
                }
            });

        });


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

    // $('#timezone-select').change(function() {
    //     if ($(this).val() !== '') {
    //         $('#available-hours').show();
    //     } else {
    //         $('#available-hours').hide();
    //     }
    // });

    $('#available-hours').on('click', '.available-hour', function() {
        $('.available-hour').removeClass('selected-hour');
        $(this).addClass('selected-hour');
    });

});
   
   


    let flatpickrInstance;

    document.addEventListener('DOMContentLoaded', function() {
        const datepickerElement = document.querySelector("#datepicker");
        if (datepickerElement) {
            flatpickrInstance = flatpickr(datepickerElement, {
                inline: true // This makes the calendar always visible
            });

            // Example of accessing selected dates
            flatpickrInstance.config.onChange.push(function(selectedDates, dateStr, instance) {
                // console.log(selectedDates); // Output selected dates to console
            });
        }
    });


    $(document).ready(function() {
    // Set the CSRF token in the header of every AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#wizard-frame-2').hide();
    $('#wizard-frame-3').hide();  
    $('#wizard-frame-4').hide(); 

    $('#button-next-1').click(function(e) {
        e.preventDefault(); 

        let formData = $('#form-1').serialize(); // Serialize form data for step 1
      
        $.ajax({
            url: '{{ route("post-schedule-meeting-1") }}', // Update with your route for step 1
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.status === 'success') {
                    $('#wizard-frame-2').show(); 
                    $('#wizard-frame-1').hide(); 
                    $('#wizard-frame-3').hide();
                    $('#wizard-frame-4').hide(); 
                    updateSteps(2);
                    console.log(response); 
                } else {
                    // Handle validation errors or other responses
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    $('#form-2').submit(function(e) {
        e.preventDefault(); 
        
        if (flatpickrInstance) {
        var selectedDates = flatpickrInstance.selectedDates;
       
        // var selectedDates = $('#datepicker').flatpickr().selectedDates;
       
        var meeting_time = $('#available-hours .selected-hour').text().trim();
        // var timezone = $('#timezone-select').val();
       
       
         let formData = {
            '_token': '{{ csrf_token() }}', // Include CSRF token
            'meeting_date': selectedDates[0], // Assuming you want the first selected date
            'meeting_time': meeting_time,
            // 'timezone': timezone
        };
       
        console.log(formData);
  
        
        $.ajax({
            url: "{{ route('post-schedule-meeting-2') }}", // Update with your route for step 1
            type: 'POST',
            data: formData,
            success: function(response) {
                if(response.status === 'success') {
                    $('#wizard-frame-3').show();
                    $('#wizard-frame-2').hide(); 
                    $('#wizard-frame-1').hide(); 
                    $('#wizard-frame-4').hide(); 
                    updateSteps(3);
                    console.log(response.message); 
                } else {
                    // Handle validation errors or other responses
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
         } else {
        alert("Flatpickr is not initialized");
    }
    });


                $('#form-3').click(function(e) {
                e.preventDefault(); 

                $.ajax({
                    url: '{{ route("final-submit") }}',
                    type: 'POST',
                    success: function(response) {
                        if(response.status === 'success') {
                            console.log(response.message); 
                            console.log(response.data); 

                            // Extract response data
                            var responseData = response.data;

                            // Second AJAX call to update meeting status
                            $.ajax({
                                url: '{{ route("applicant-meeting-status-update") }}',
                                type: 'POST',
                                data: {
                                    student_id: responseData.student_id,
                                    parent_id: responseData.parent_id,
                                    applicant_id: responseData.applicant_id,
                                    meeting_date: responseData.meeting_date,
                                    time_slot: responseData.meeting_time,
                                    purpose: responseData.meeting_type,
                                    other_purpose: responseData.meeting_other,
                                    mode: responseData.meeting_mode,
                                    location_url: responseData.meeting_location,
                                    status: 'meeting scheduled', // Static status name
                                    note: 'New meeting scheduled via form submit' // Optional note
                                },
                                success: function(addResponse) {
                                    console.log('Meeting status added successfully');
                                    console.log(addResponse);

                                    // Show success message to user
                                    Swal.fire({
                                        title: "Meeting Scheduled successfully!",
                                        text: "Please check your email for the scheduled meeting details.",
                                        icon: "success",
                                        button: "OK"
                                    }).then((value) => {
                                        // Redirect user to meeting status page
                                        window.location.href = "{{ url('meeting-status') }}"; 
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.log('Error adding meeting status: ' + xhr.responseText);
                                }
                            });
                        } else {
                            console.log('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
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

