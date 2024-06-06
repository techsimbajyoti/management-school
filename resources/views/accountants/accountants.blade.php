@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'accountant-dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center global-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Capacity</p>
                                    <p class="card-title">1500
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> Update Now
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Revenue</p>
                                    <p class="card-title">$ 1,345
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> Last day
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Errors</p>
                                    <p class="card-title">23
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> In the last hour
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Followers</p>
                                    <p class="card-title">+45K
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update now
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Fees Collection (2024)</h5>
                    </div>
                    <div class="card-body ">
                        <canvas id=myChart width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="card-title">School Calender</h5>
                    </div><hr>
                    <div class="card-body ">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Revenue (2024)</h5>
                    </div><hr>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
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
                        title: 'Buddha Purnima',
                        start: '2024-05-23'
                    },
                    {
                        title: 'World Environment Day',
                        start: '2024-06-05'
                    },
                    {
                        title: 'World Oceans Day',
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