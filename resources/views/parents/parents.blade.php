@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'parent-dashboard'
])

@section('content')
<style>
        .d-flex-center {
            display: flex;
            align-items: center;
        }

        .chart-container {
            position: relative;
            width: 100%;
            margin: auto;
        }
        
.mini-card {
            background: #f4f4f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .mini-card:hover {
            transform: scale(1.05);
        }
        .mini-card .card-header {
            background: #76a0e3;
            color: #1d1b1b;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .mini-card .card-title {
            margin-bottom: 0;
        }
        .mini-card .card-body {
            padding: 15px;
        }
        .mini-card .card-text {
            margin-bottom: 0;
            font-size: 1em;
            color: #333;
        }
        label#applicant_id {
            width: 25%;
            margin-top: 15px;
            font-weight: bold;
        }
        .d-flex-center {
            display: flex;
            align-items: center;
        }
</style>
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-handshake" style='font-size:40px;color:#76a0e3'></i>
                                </div>
                            </div>
                            <div class="col-8 col-md-9">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Upcoming Meeting</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-footer">
                    {{-- <div id="meeting-details"></div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Mode</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Offline</p>
                                    <p class="card-text">Vijay Nagar Scheme No. 54</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Purpose</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Interview</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Date & Time</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">26/06/2024 at 12:30pm</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Interview</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">26/06/2024 at 12:30pm</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa-solid fa-child" style='font-size:40px;color:#76a0e3'></i>
                                </div>
                            </div>
                            <div class="col-8 col-md-9">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Children</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-footer">
                    {{-- <div id="meeting-details"></div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Total Children</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">2</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Incomplete</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">1</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-card">
                                <div class="card-header">
                                    <h6 class="card-title">Complete</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <hr>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <div class="icon-big text-left icon-warning">
                                    <i class="fa fa-clock-o" style='font-size:40px;color:#76a0e3' aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-8 col-md-9">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Pending Application</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-footer">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="myPieChart"></canvas>
                                    <p class="text-center mt-3"><strong>Applicant Id: </strong>HYYUgff</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('applicant-edit', auth()->guard('webparents')->user()->id)}}" class="btn ot-btn-primary">Complete Profile</a>
                            </div>
                            <div>
                                @php
                                    $id = auth()->guard('webparents')->user()->id;
                                    $student_data = App\Models\Student::where('parent_id', $id)
    ->select(
        'students.first_name as student_name',
        'students.email as student_email',
        'students.mobile as student_phone',
        'students.address as student_address',
        'students.gender as student_gender',
        'students.class as student_class',
        'students.date_of_birth as student_dob',
        'students.country as student_country',
        'students.state as student_state',
        'students.city as student_city',
        'students.pin_code as student_pin_code',
        'students.document as student_doc'
    )
    ->first();

    $parent_data = App\Models\StudentParent::where('id', $id)
    ->select(
        'student_parents.father_name',
        'student_parents.father_mobile',
        'student_parents.email as parent_email',
        'student_parents.password as parent_password'
    )
    ->first();


    $applicant_data = [];

if ($student_data) {
    $applicant_data = array_merge($applicant_data, $student_data->toArray());
}

if ($parent_data) {
    $applicant_data = array_merge($applicant_data, $parent_data->toArray());
}

// Check if any data was found
if (empty($applicant_data)) {
    return redirect('/')->withErrors(['error' => 'No data found for the given parent ID.']);
}

// Process the data as needed



                            
                             // Initialize the profile completion percentage
$profileCompletionPercentage = 0;
$totalSteps = 16; // Number of fields to check
$stepIncrement = 100 / $totalSteps;

// Fields to check
$fields = [
    'student_doc', 'student_pin_code', 'student_city', 'student_state', 'student_country',
    'student_dob', 'student_class', 'father_name', 'parent_email', 'father_mobile',
    'parent_password', 'student_name', 'student_email', 'student_phone', 'student_address',
    'student_gender'
];

// Check each field
foreach ($fields as $field) {
    if (!empty($applicant_data[$field])) {
        $profileCompletionPercentage += $stepIncrement;
    }
}
                                @endphp
                                <input type="hidden" value="{{$profileCompletionPercentage}}" name="profile_progress" id="profile_progress">
                            </div>
                            
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <div class="icon-big text-left icon-warning">
                                    <i class="fas fa-user" style='font-size:40px;color:#76a0e3' aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-8 col-md-9">
                                <div class="numbers">
                                    <p class="card-category" style="font-weight: 700;">Applicant List</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="card-footer">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Applicant Id</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>HYYUgff</td>
                                <td><span>Incomplete</span></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        
        
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card ot-card mb-24">
                    <div id='calendar'></div>
                </div>
            </div>    
        </div> --}}
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data of upcoming meetings
const meetings = [
    { title: 'Project Kickoff', date: '2024-07-01', time: '10:00 AM' },
    { title: 'Team Sync', date: '2024-07-03', time: '02:00 PM' },
    { title: 'Client Presentation', date: '2024-07-05', time: '11:00 AM' }
];

// Function to display upcoming meetings
function displayMeetings() {
    const meetingContainer = $('#meeting-details');
    meetingContainer.empty();

    if (meetings.length === 0) {
        meetingContainer.append('<p>No upcoming meetings</p>');
    } else {
        meetings.forEach(meeting => {
            const meetingElement = `
            <div class="col-md-6">
                <div class="card meeting-card">
                    <div class="card-header">
                        <h6 class="card-title">${meeting.title}</h6>

                        </div>
                    <div class="card-body">
                        <p class="card-text">${meeting.date} at ${meeting.time}</p>
                    </div>
                </div>
            </div>    
            `;
            meetingContainer.append(meetingElement);
        });
    }
}

$(document).ready(function() {
    displayMeetings();
});


         document.addEventListener('DOMContentLoaded', function () {
            // Get today's date in the format "01 Jun 2024"
            var todayDate = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
            var chartTitle = "Today's Attendance (" + todayDate + ")";

            // Sample data (replace with actual data retrieval)
            var classWiseAttendance = {
                "Class 1": 30,
                "Class 2": 25,
                "Class 3": 28,
                "Class 4": 32,
                "Class 5": 29
            };

            // Extract class names and attendance counts
            var classNames = Object.keys(classWiseAttendance);
            var attendanceCounts = Object.values(classWiseAttendance);

            // Create the chart
            var ctx = document.getElementById('attendanceChart').getContext('2d');
            var attendanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: classNames,
                    datasets: [{
                        label: 'Total Attendance',
                        data: attendanceCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue color for bars
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: chartTitle,
                            font: {
                                size: 18
                            }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Attendance Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Class'
                            }
                        }
                    }
                }
            });
        });

  window.onload = function () {
            var options = {
                animationEnabled: true, 
                title: {
                    text: "Yearly Metrics"
                },
                axisX: {
                    valueFormatString: "YYYY"
                },
                axisY: {
                    title: "Amount (in USD)",
                    prefix: "$"
                },
                data: [
                    {
                        type: "spline",
                        name: "Total Income",
                        showInLegend: true,
                        yValueFormatString: "$#,###",
                        xValueFormatString: "YYYY",
                        dataPoints: [
                            { x: new Date(2018, 0), y: 10000 },
                            { x: new Date(2019, 0), y: 15000 },
                            { x: new Date(2020, 0), y: 20000 },
                            { x: new Date(2021, 0), y: 25000 },
                            { x: new Date(2022, 0), y: 30000 },
                            { x: new Date(2023, 0), y: 35000 }
                        ]
                    },
                    {
                        type: "spline",
                        name: "Total Expense",
                        showInLegend: true,
                        yValueFormatString: "$#,###",
                        xValueFormatString: "YYYY",
                        dataPoints: [
                            { x: new Date(2018, 0), y: 5000 },
                            { x: new Date(2019, 0), y: 7000 },
                            { x: new Date(2020, 0), y: 9000 },
                            { x: new Date(2021, 0), y: 11000 },
                            { x: new Date(2022, 0), y: 13000 },
                            { x: new Date(2023, 0), y: 15000 }
                        ]
                    },
                    {
                        type: "spline",
                        name: "Total Balance",
                        showInLegend: true,
                        yValueFormatString: "$#,###",
                        xValueFormatString: "YYYY",
                        dataPoints: [
                            { x: new Date(2018, 0), y: 5000 },
                            { x: new Date(2019, 0), y: 8000 },
                            { x: new Date(2020, 0), y: 11000 },
                            { x: new Date(2021, 0), y: 14000 },
                            { x: new Date(2022, 0), y: 17000 },
                            { x: new Date(2023, 0), y: 20000 }
                        ]
                    }
                ]
            };
            $("#chartContainer").CanvasJSChart(options);
        }

         $(document).ready(function() {

          // Get the profile progress value
            var profileProgress = parseFloat($('#profile_progress').val());

            // Calculate the incomplete percentage
            var incompleteProgress = 100 - profileProgress;

            // Data for the pie chart
            var chartData = {
                labels: ["Complete", "Incomplete"],
                datasets: [{
                    data: [profileProgress, incompleteProgress],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Complete color
                        'rgba(255, 99, 132, 0.2)'  // Incomplete color
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Options for the pie chart
            var chartOptions = {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                            }
                        }
                    }
                }
            };

            // Create the pie chart
            var ctx = $("#myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: chartData,
                options: chartOptions
            });





            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    {
                        title: 'School Visiting',
                        start: '2024-05-23'
                    },
                    {
                        title: 'Parents Meeting',
                        start: '2024-06-05'
                    },
                    {
                        title: 'Document Submission',
                        start: '2024-06-08',
                        end: '2024-06-03'
                    }
                    // more events here
                ]
            });
            calendar.render();
        });

        const xValues = [50,60,70,80,90,100,110,120,130,140,150];
const yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});

mobiscroll.setOptions({
  theme: 'ios',
  themeVariant: 'light'
});

$(function () {
  var inst = $('#demo-desktop-month-view')
    .mobiscroll()
    .eventcalendar({
      clickToCreate: false,
      dragToCreate: false,
      dragToMove: false,
      dragToResize: false,
      eventDelete: false,
      view: {
        calendar: { labels: true },
      },
      onEventClick: function (args) {
        mobiscroll.toast({
          message: args.event.title,
        });
      },
    })
    .mobiscroll('getInst');

  $.getJSON(
    'https://trial.mobiscroll.com/events/?vers=5&callback=?',
    function (events) {
      inst.setEvents(events);
    },
    'jsonp',
  );
});
  
</script>
@endpush
