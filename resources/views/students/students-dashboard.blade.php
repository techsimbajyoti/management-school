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




       