@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'applicant'
])

@section('content')
<style>
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
            box-shadow: 10px 10px 5px rgb(174, 230, 248);
            transition: transform 0.2s, box-shadow 0.2s;
            color: #000;
        }

       

        .mini-card.accepted {
            color: #262b6e;
        }

        .mini-card.rejected {
            color: #262b6e;
        }

        .mini-card.pending {
            color: #262b6e;
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
                                    <p class="card-category">Total Applicant</p>
                                    @php
                                    $total_applicant = App\Models\StudentParent::get();    
                                    @endphp
                                    <p class="card-title">{{ $total_applicant->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Accepted</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Rejected</span>
                                        <span class="mini-card-number">41</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Pending</span>
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
                                    <p class="card-category">Total Meeting</p>
                                    @php
                                    $total_applicant = App\Models\StudentParent::get();    
                                    @endphp
                                    <p class="card-title">{{ $total_applicant->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Accepted</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Rejected</span>
                                        <span class="mini-card-number">41</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card pending">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Pending</span>
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
                                <div class="icon-big text-center icon-circle" style="background-color: #9fe5fa">
                                    <i class="fas fa-coins" style="color: #1d5d70"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Total Revenue</p>
                                    @php
                                    $total_applicant = App\Models\StudentParent::get();    
                                    @endphp
                                    <p class="card-title">{{ $total_applicant->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mini-card accepted">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Paid Amount</span>
                                        <span class="mini-card-number">23</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-card rejected">
                                    <div class="mini-card-body">
                                        <span class="mini-card-title">Total Remaining</span>
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
                <div class="card">
                    <div class="card-header ">
                        <h5 class="card-title">Schedule Meeting</h5>
                    </div><hr>
                    <div class="card-body ">
                        <div id='calendar'></div>
                    </div>
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
  
</script>
@endpush