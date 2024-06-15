@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-dashboard'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-users" style='font-size:40px;color:#76a0e3'></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category" style="font-weight: 700;">Class</p>
                                <p class="card-title">5
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="stats">
                        <i class=""></i>
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
                                <i class="fa fa-book" style='font-size:40px;color:#76e39e'></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category" style="font-weight: 700;">Subject</p>
                                <p class="card-title">13
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class=""></i>
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
                                <i class="fas fa-chalkboard-teacher" style='font-size:40px;color:#e38a76'></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category" style="font-weight: 700;">Teacher</p>
                                <p class="card-title">8
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="stats">
                        <i class=""></i>
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
                                <i class="fas fa-calendar-alt" style="color:#494F55;"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category" style="font-weight: 700;">Event</p>
                                <p class="card-title">0
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="stats">
                        <i class=""></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card ot-card mb-24">
                <div class="card-header">My Class Performance</div>
                <div class="card-body">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ot-card mb-24">
                <div class="card-header">My Assignments</div>
                <div class="card-body">
                    <canvas id="assignmentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ot-card mb-24">
                <div id='calendar'></div>
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

$(document).ready(function() {
    // Calendar
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
        ]
    });
    calendar.render();

    // Performance Chart
    var performanceCtx = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(performanceCtx, {
        type: 'bar',
        data: {
            labels: ['Math', 'Science', 'English', 'History', 'Geography'],
            datasets: [{
                label: 'Performance',
                data: [85, 90, 78, 88, 92],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Assignments Chart
    var assignmentsCtx = document.getElementById('assignmentsChart').getContext('2d');
    var assignmentsChart = new Chart(assignmentsCtx, {
        type: 'line',
        data: {
            labels: ['Completed', 'Pending', 'Overdue'],
            datasets: [{
                label: 'Assignments',
                data: [10, 5, 2],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
});
</script>
@endpush
