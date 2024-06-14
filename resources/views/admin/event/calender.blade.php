@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'calender'
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
                                @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                <a href="{{'admin-event-detail-view'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/environment.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                <a href="{{'teacher-event-detail-view'}}?showForm=environmentlDayForm"><img src="{{ asset('paper') }}/img/environment.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                                <a href="{{'accountant-event-detail-view'}}?showForm=environmentlDayForm"><img src="{{ asset('paper') }}/img/environment.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
                                <a href="{{'view-event'}}?showForm=environmentlDayForm"><img src="{{ asset('paper') }}/img/environment.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
                                <a href="{{'parent-view-event'}}?showForm=environmentlDayForm"><img src="{{ asset('paper') }}/img/environment.jpeg" alt="image"></a>
                                @endif
                               
                            </div>
                            <div class="card-footer text-center">
                                Word Environment Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                            @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                <a href="{{'admin-event-detail-view'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/oceans.jpeg" height="227px" alt="image"></a>
                            @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                <a href="{{'teacher-event-detail-view'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/oceans.jpeg" height="227px" alt="image"></a>
                                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                                <a href="{{'accountant-event-detail-view'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/oceans.jpeg" height="227px" alt="image"></a>
                                @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
                                <a href="{{'view-event'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/oceans.jpeg"  height="227px" alt="image"></a>
                                @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
                                <a href="{{'parent-view-event'}}?showForm=oceanDayForm"><img src="{{ asset('paper') }}/img/oceans.jpeg" height="227px" alt="image"></a>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                Word Oceans Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                <a href="{{'admin-event-detail-view'}}?showForm=milkDayForm"> <img src="{{ asset('paper') }}/img/milk.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                <a href="{{'teacher-event-detail-view'}}?showForm=milkDayForm"> <img src="{{ asset('paper') }}/img/milk.jpeg" alt="image"></a></a>
                                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                                <a href="{{'accountant-event-detail-view'}}?showForm=milkDayForm"><img src="{{ asset('paper') }}/img/milk.jpeg" alt="image"></a>
                                @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
                                <a href="{{'view-event'}}?showForm=milkDayForm"><img src="{{ asset('paper') }}/img/milk.jpeg"  alt="image"></a>
                                @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
                                <a href="{{'parent-view-event'}}?showForm=milkDayForm"><img src="{{ asset('paper') }}/img/milk.jpeg" alt="image"></a>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                World Milk Day
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                @if(auth()->guard('web')->check() && auth()->guard('web')->user()->role_id == 1)
                                <a href="{{'admin-event-detail-view'}}?showForm=bloodDayForm"> <img src="{{ asset('paper') }}/img/blood.jpeg" height="227px" alt="image"></a>
                                @elseif(auth()->guard('webteachers')->check() && auth()->guard('webteachers')->user()->role_id == 2)
                                <a href="{{'teacher-event-detail-view'}}?showForm=bloodDayForm"> <img src="{{ asset('paper') }}/img/blood.jpeg" height="227px" alt="image"></a>
                                @elseif(auth()->guard('webaccountants')->check() && auth()->guard('webaccountants')->user()->role_id == 3)
                                <a href="{{'accountant-event-detail-view'}}?showForm=bloodDayForm"><img src="{{ asset('paper') }}/img/blood.jpeg" height="227px" alt="image"></a>
                                @elseif(auth()->guard('webstudents')->check() && auth()->guard('webstudents')->user()->role_id == 4)
                                <a href="{{'view-event'}}?showForm=bloodDayForm"><img src="{{ asset('paper') }}/img/blood.jpeg"  height="227px" alt="image"></a>
                                @elseif(auth()->guard('webparents')->check() && auth()->guard('webparents')->user()->role_id == 5)
                                <a href="{{'parent-view-event'}}?showForm=bloodDayForm"><img src="{{ asset('paper') }}/img/blood.jpeg"  height="227px" alt="image"></a>
                                @endif
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

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Buddha Purnima',
                start: '2024-05-23',
                
            },
            {
                title: 'World Environment Day',
                start: '2024-06-05',
                url: getEventUrl('environmentlDayForm')
            },
            {
                title: 'World Oceans Day',
                start: '2024-06-08',
                end: '2024-06-03',
                url: getEventUrl('oceanDayForm')
            }
            
        ]
    });
    calendar.render();
    });

    var userRole = parseInt(@json(
        auth()->guard('web')->check() ? auth()->user()->role_id : (
        auth()->guard('webteachers')->check() ? auth()->guard('webteachers')->user()->role_id : (
        auth()->guard('webstudents')->check() ? auth()->guard('webstudents')->user()->role_id : (
        auth()->guard('webparents')->check() ? auth()->guard('webparents')->user()->role_id : (
        auth()->guard('webaccountants')->check() ? auth()->guard('webaccountants')->user()->role_id : null
    )))), 10));
    console.log('User Role:', userRole);

function getEventUrl(formName) {
    var baseUrl = '';
    console.log('Determining base URL for user role:', userRole);
    if (userRole === 1) {
        baseUrl = '{{ route("view-event") }}';
    } else if (userRole === 2) {
        baseUrl = '{{ route("teacher-event-detail-view") }}';
    } else if (userRole === 3) {
        baseUrl = '{{ route("accountant-event-detail-view") }}';
    } else if (userRole === 4) {
        baseUrl = '{{ route("view-event") }}';
    } else if (userRole === 5) {
        baseUrl = '{{ route("parent-view-event") }}';
    } else {
        console.error('Unknown user role:', userRole);
    }
    console.log('Generated URL:', baseUrl + '?showForm=' + formName);
    return baseUrl + '?showForm=' + formName;
}
</script>
@endpush
