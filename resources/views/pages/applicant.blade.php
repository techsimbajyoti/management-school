@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant'
])

@section('content')
<style>
    .info-button {
        background-color: #efefef;
        margin-left: 3px;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0%;
        text-decoration: none;
        color: #000;
    }
    .info-button:hover {
        background-color: #d4d3d3;
        color: #000;
    }

  /* Custom card styles */
  .card-stats {
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .card-stats:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 15px;
        }

        .card-body .icon-big {
            font-size: 2.5rem;
        }

        .card-body .numbers {
            text-align: right;
        }

        .card-body .card-category {
            font-size: 1.2rem;
            color: #777;
        }

        .card-body .card-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
        }

        .mini-card {
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            margin-bottom: 10px;
            color: #000;
        }

        .mini-card-body {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mini-card-title {
            font-size: 1rem;
            font-weight: bold;
        }

        .mini-card-number {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-footer {
            padding: 10px 15px;
            background-color: #f5f5f5;
            border-top: 1px solid #e3e3e3;
        }

        .card-footer .stats {
            display: flex;
            justify-content: center;
            font-size: 0.9rem;
            color: #777;
        }


    .event-color-c {
    display: flex;
    margin: 16px;
    align-items: center;
    cursor: pointer;
}

.event-color-label {
    flex: 1 0 auto;
}

.event-color {
    width: 30px;
    height: 30px;
    border-radius: 15px;
    margin-right: 10px;
    margin-left: 240px;
    background: #5ac8fa;
}

.crud-color-row {
    display: flex;
    justify-content: center;
    margin: 5px;
}

.crud-color-c {
    padding: 3px;
    margin: 2px;
}

.crud-color {
    position: relative;
    min-width: 46px;
    min-height: 46px;
    margin: 2px;
    cursor: pointer;
    border-radius: 23px;
    background: #5ac8fa;
}

.crud-color-c.selected,
.crud-color-c:hover {
    box-shadow: inset 0 0 0 3px #007bff;
    border-radius: 48px;
}

.crud-color:before {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -10px;
    margin-left: -10px;
    color: #f7f7f7;
    font-size: 20px;
    text-shadow: 0 0 3px #000;
    display: none;
}

.crud-color-c.selected .crud-color:before {
    display: block;
}
  
.icon-circle {
    width: 80px;
    height: 80px;
    border-radius: 20%;
    background-color: #ffe4b3;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
}
</style>
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-circle">
                                    <i class="fas fa-user-edit text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category"><strong>Applicant Statistics</strong></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Accepted</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Rejected</span>
                                        <span class="mini-card-number">41</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Pending</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            {{-- <i class="fa fa-refresh"></i> Update Now --}}
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-circle" style="background-color: #6bd098">
                                    <i class="fas fa-handshake" style="color: #1d7042"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category"><strong>Meeting Statistics</strong></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Done</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Pending</span>
                                        <span class="mini-card-number">41</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Cancelled</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="numbers text-left">
                            <p class="card-category" style="margin-left: 10px;"><strong>Meeting Purpose</strong></p>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">School Visit</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Doc Submission</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Interview</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Entrance Exam</span>
                                        <span class="mini-card-number">22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            {{-- <i class="fa fa-refresh"></i> Update Now --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12" style="margin-top: -230px">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-circle" style="background-color: #9fe5fa">
                                    <i class="fas fa-coins" style="color: #1d5d70"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category"><strong>Revenue Statistics</strong></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Paid Amount</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Remaining</span>
                                        <span class="mini-card-number">41</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            {{-- <i class="fa fa-refresh"></i> Update Now --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-content table-basic mt-20 activeStudentList" id="activeStudentList">
                    <div class="card ot-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 title">Upcoming Meetings</h4>
                        </div>
                        
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered role-table myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th class="serial">SR No.</th>
                                            <th class="purchase">Applicant NO</th>
                                            <th class="purchase">Applicant name</th>
                                            <th class="purchase">Class</th>
                                            <th class="purchase">Parent name</th>
                                            <th class="action">Contact</th>
                                            <th class="action">Date</th>
                                            <th class="action">Time Slot</th>
                                            <th class="action">Purpose</th>
                                            <th class="action">Mode</th>
                                            <th class="action">Status</th>
                                            <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            <tr id="row_7">
                                                <td class="serial">1</td>
                                                <td>2023114</td>
                                                
                                                <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                    <a href="{{ route('admin-student-profile')}}" target="_blank">John</a></td>
                                                <td>Two</td>
                                                <td>Parent5</td>
                                               
                                                <td>658932654</td>
                                               
                                                <td>jan 24,2024</td>
                                                <td>2:30 pm</td>
                                                <td>Student Interview</td>
                                                <td>
                                                    <div class="d-flex">
                                                    <span>Offline</span>
                                                    <a class="info-button applicant_mode">
                                                        <i class="fa fa-info"></i>
                                                    </a>
                                                    </div>
                                                </td>
                                                <td><p>Active</p></td>
                                                {{-- <td><div style="background: rgb(224, 224, 224);width:50%;" class="text-center"><a class="myBtn"><i class="fa fa-eye"></i></a></div></td> --}}
                                                <td class="action">
                                                  <a class="btn ot-btn-primary admin_side_meeting">
                                                      <i class="fas fa-cog"></i>
                                                  </a>
                                            </td>
                                            </tr>
                                            <tr id="row_7">
                                                <td class="serial">2</td>
                                                <td>2023111</td>
                                               
                                                <td> <img src="{{asset('paper/img/demo.png')}}" height="40px" width="40px">
                                                  <a href="{{ route('admin-student-profile')}}" target="_blank">William</a></td>
                                                <td>Two</td>
                                                <td>Parent8</td>
                                               
                                                <td>0147852111</td>
                                                <td>jun 05,2024</td>
                                                <td>3:30 pm</td>
                                                <td>Student Interview</td>
                                                <td>
                                                    <div class="d-flex">
                                                    <span>Offline</span>
                                                    <a class="info-button applicant_mode">
                                                        <i class="fa fa-info"></i>
                                                    </a>
                                                    </div>
                                                </td>
                                                <td><p>Active</p></td>
                                                 {{-- <td><div style="background: rgb(224, 224, 224);width:50%;" class="text-center"><a class="myBtn"><i class="fa fa-eye"></i></a></div></td> --}}
                                                 <td class="action">
                                                  <a class="btn ot-btn-primary admin_side_meeting">
                                                      <i class="fas fa-cog"></i>
                                                  </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h2>Note Details</h2>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula arcu, ultricies vitae porttitor ut, eleifend vel nisl. Nulla dui metus, ornare sit amet dolor aliquam, eleifend gravida dolor. </p>
            </div>
            <div class="col-md-6">
                <p>00/00/0000</p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
       <h3></h3>
      </div>
    </div>
  
  </div>

  <!-- The Modal -->
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <div class="modal-header">
          <h3>Meeting Mode</h3>
          <span class="close">&times;</span>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                  <label for="">Mode</label>
                  <p>Online / Offline</p>
              </div>
              <div class="col-md-6">
                  <label for="">Url / Location</label>
                  <p><a href="">http://example.com</a> / Vijay Nagar</p>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <h3></h3>
      </div>
  </div>
</div>



<!-- The Modal -->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
      <div class="modal-header">
          <h3>Add Note</h3>
          <span class="close">&times;</span>
      </div>
      <div class="modal-body">
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Status</label>
                  <select name="" id="" class="nice-select sections niceSelect bordered_style wide">
                        <option value="0">Meeting Status</option>
                        <option value="0">Active</option>
                        <option value="1">Reschedule Meeting Request</option>
                        <option value="2">Accept</option>
                        <option value="2">Meeting Schedule</option>
                        <option value="3">Cancelled By Admin</option>
                        <option value="3">Reject By Admin</option>
                        <option value="3">Upcoming Meeting</option>
                  </select>
              </div>
          </div>
          <div class="row justify-content-center mt-3">
              <div class="col-md-6">
                  <label for="">Note</label>
                  <textarea class="nice-select sections niceSelect bordered_style wide" placeholder="Enter Note" value="" id="note"></textarea>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-md-4 mt-3">
                  <button type="submit" class="btn btn-lg w-100 ot-btn-primary"><i class="fa fa-save"></i> Submit</button>
              </div>
            </div>
          </div>
      <div class="modal-footer">
          <h3></h3>
      </div>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
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


  // Get the modal
  var modal = document.getElementById("myModal");

var modal1 = document.getElementById("myModal1");

var modal2 = document.getElementById("myModal2");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }

  if (event.target == modal1) {
    modal1.style.display = "none";
  }

  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

// Add event listeners to all buttons with class "myBtn"
document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.getElementsByClassName("myBtn");
    Array.prototype.forEach.call(buttons, function(btn) {
        btn.addEventListener("click", function() {
            modal.style.display = "block";
        });
    });

        // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close");
    Array.prototype.forEach.call(span, function(sp) {
        sp.addEventListener("click", function() {
            modal.style.display = "none";
        });
    });
});

    // Add event listeners to all buttons with class "myBtn"
    document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.getElementsByClassName("applicant_mode");
    Array.prototype.forEach.call(buttons, function(btn) {
        btn.addEventListener("click", function() {
            modal1.style.display = "block";
        });
    });

        // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close");
    Array.prototype.forEach.call(span, function(sp) {
        sp.addEventListener("click", function() {
            modal1.style.display = "none";
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.getElementsByClassName("admin_side_meeting");
    Array.prototype.forEach.call(buttons, function(btn) {
        btn.addEventListener("click", function() {
            modal2.style.display = "block";
        });
    });

        // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close");
    Array.prototype.forEach.call(span, function(sp) {
        sp.addEventListener("click", function() {
          modal2.style.display = "none";
        });
    });
});
  
</script>
@endpush