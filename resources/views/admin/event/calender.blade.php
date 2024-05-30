@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'add-event'
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
                <div id="calendar"></div>
            </div>
        </div>    
    </div>
</div>
@endsection 

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'interaction' ],
            initialView: 'dayGridMonth',
            selectable: true,
            events: '/events', // URL to fetch events
            dateClick: function(info) {
                alert('Clicked on: ' + info.dateStr);
            },
            eventClick: function(info) {
                alert('Event: ' + info.event.title);
            }
        });

        calendar.render();
    });
</script>
@endpush
