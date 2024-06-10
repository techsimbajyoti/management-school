@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student-event'
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
            <div class="card ot-card mb-24">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('view-event')}}?showForm=environmentlDayForm">
                                <img src="{{ asset('paper') }}/img/environment.jpeg" alt="image">
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                Word Environment Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('view-event')}}?showForm=oceanDayForm">
                                <img src="{{ asset('paper') }}/img/oceans.jpeg" height="227px" alt="image">
                            </div>
                            <div class="card-footer text-center">
                                Word Oceans Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('view-event')}}?showForm=milkDayForm">
                                <img src="{{ asset('paper') }}/img/milk.jpeg" alt="image">
                            </div>
                            <div class="card-footer text-center">
                                World Milk Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('view-event')}}?showForm=bloodDayForm">
                                <img src="{{ asset('paper') }}/img/blood.jpeg" height="227px" alt="image">
                            </div>
                            <div class="card-footer text-center">
                                World Blood Donor Day
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ot-card mb-24">
                <div id='calendar' style=""></div>
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
</script>
@endpush
