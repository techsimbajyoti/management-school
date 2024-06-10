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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <style>
           
            
            .card-body {
                display: flex;
                flex-wrap: wrap;
            }
            .card-body .details {
                padding: 20px;
                flex: 1;
            }
            .card-body img {
                max-width: 100%;
                border-radius: 15px;
                flex: 1;
            }
            .details h3 {
                margin-top: 0;
                font-size: 2rem;
            }
            .details p {
                font-size: 1.2rem;
                margin: 10px 0;
            }
            .details .description {
                font-size: 1rem;
                line-height: 1.5;
                color : black;
            }
            
            @media (max-width: 768px) {
                .card-body {
                    flex-direction: column-reverse;
                }
            }
        </style>
  
    
        <div class="container" id="environmentlDayForm" style="display: none;">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 title">{{ __('View Event Details') }}</h5>
                    <a href="{{ route('student-event')}}" class="btn btn-md ot-btn-primary"><i class="	fa fa-angle-double-left"></i> All Events</a>
                </div>
                
            </div>
    
            <div class="card">
                <div class="card-body">
                    <div class="details">
                        <p>June 5 @ 10:00 AM - 2:00 PM</p>
                        <h3>World Environment Day</h3>
                        <p class="description"><strong>ABC Internation School,</strong> School Ground, 123 1st Aveune, New York City, NY, United States
                        </p><br>
                        <p class="description"> Join us for the World Environment Day celebration! It's a day dedicated to promoting environmental awareness and action through engaging activities, informative sessions, and fun games. Participate in tree planting, recycling projects, and interactive workshops to learn how you can make a difference. Enjoy delicious eco-friendly refreshments and connect with fellow students who share a passion for preserving our planet. Don’t miss out on this exciting opportunity to contribute to a greener future and celebrate our commitment to protecting the environment!</p>
                    </div>
                    <img src="{{ asset('paper') }}/img/environment.jpeg" alt="Event Image" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container" id="oceanDayForm" style="display: none;">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 title">{{ __('View Event Details') }}</h5>
                    <a href="{{ route('student-event')}}" class="btn btn-md ot-btn-primary"><i class="	fa fa-angle-double-left"></i> All Events</a>
                </div>
                
            </div>
    
            <div class="card">
                <div class="card-body">
                    <div class="details">
                        <p>June 8 @ 10:00 AM - 2:00 PM</p>
                        <h3>World Ocean Day</h3>
                        <p class="description"><strong>ABC Internation School,</strong> Event Center, 123 1st Aveune, New York City, NY, United States
                        </p><br>
                        <p class="description"> Join us for the World Ocean Day celebration! The day aims to create awareness about the importance of preserving and conserving oceanic resources. It also celebrates the many ways humanity and biodiversity depend on oceans. Like all other natural resources, oceans are also bearing the brunt of pollution and overexploitation.Let us come together to save our oceans! Save the Sea to See the Future. We are tied to the ocean. And when we go back to the sea, whether it is to sail or to watch – we are going back from whence we came.</p>
                    </div>
                    <img src="{{ asset('paper') }}/img/oceans.jpeg" alt="Event Image" class="img-fluid">
                </div>
            </div>
        </div>
 

        <div class="container"  id="milkDayForm" style="display: none;">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 title">{{ __('View Event Details') }}</h5>
                    <a href="{{ route('student-event')}}" class="btn btn-md ot-btn-primary"><i class="	fa fa-angle-double-left"></i> All Events</a>
                </div>
                
            </div>
    
            <div class="card">
                <div class="card-body">
                    <div class="details">
                        <p>June 1 @ 10:00 AM - 2:00 PM</p>
                        <h3>World Milk Day</h3>
                        <p class="description"><strong>ABC Internation School,</strong> Event Center, 123 1st Aveune, New York City, NY, United States
                        </p><br>
                        <p class="description"> Join us for the World Milk Day celebration! This day aims to raise awareness about the importance of milk and dairy products in our daily lives. It highlights the nutritional benefits of milk, which is essential for growth and development. Milk also supports the livelihoods of millions of dairy farmers worldwide. As we celebrate, let's remember to support sustainable dairy practices and ensure that everyone has access to this nutritious resource. Enjoy a glass of milk and appreciate the hard work that goes into bringing this vital food to our tables. Drink milk for a healthy future!</p>
                    </div>
                    <img src="{{ asset('paper') }}/img/milk.jpeg" alt="Event Image" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container" id="bloodDayForm" style="display: none;">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 title">{{ __('View Event Details') }}</h5>
                    <a href="{{ route('student-event')}}" class="btn btn-md ot-btn-primary"><i class="	fa fa-angle-double-left"></i> All Events</a>
                </div>
                
            </div>
    
            <div class="card">
                <div class="card-body">
                    <div class="details">
                        <p>June 14 @ 10:00 AM - 2:00 PM</p>
                        <h3>World Blood Donar Day</h3>
                        <p class="description"><strong>ABC Internation School,</strong> Event Center, 123 1st Aveune, New York City, NY, United States
                        </p><br>
                        <p class="description">Join us for the World Blood Donor Day celebration! This day aims to raise awareness about the importance of donating blood and to thank voluntary blood donors for their life-saving gifts. Blood donations are crucial for emergency surgeries, treatments, and chronic conditions, helping to save millions of lives every year. By donating blood, you contribute to the health and well-being of your community. Let’s come together to support this noble cause and ensure that blood is always available for those in need. Give blood, give life – your donation can make a difference!</p>
                    </div>
                    <img src="{{ asset('paper') }}/img/blood.jpeg" alt="Event Image" class="img-fluid">
                </div>
            </div>
        </div>



        {{-- <div class="row">
        <div class="col-md-12">
            <div class="card ot-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">View Event Details</h3>
                    <a href="{{ route('student-event') }}" class="btn btn-lg ot-btn-primary">Back</a>
                </div>
                <hr>
                <div class="card-body">
                <div class="row" id="environmentlDayForm" style="display: none;">
            
                    <div class="col-md-6">
                        <img src="{{ asset('paper') }}/img/environment.jpeg" alt="Event Name" class="img-fluid rounded" height="250px" width="250px">
                    </div>
                    <div class="col-md-6">
                        <h3>World Environment Day</h3>
                        <p style="font-size: 1.25rem;"><strong>Date:</strong> June 5</p>
                        <p style="font-size: 1.25rem;"><strong>Time:</strong> 10:00 AM</p>
                        <p style="font-size: 1.25rem;"><strong>Venue:</strong> School Ground</p>
                        <p style="font-size: 1rem;"><strong>Description:</strong> Join us for the World Environment Day celebration! It's a day dedicated to promoting environmental awareness and action through engaging activities, informative sessions, and fun games. Participate in tree planting, recycling projects, and interactive workshops to learn how you can make a difference. Enjoy delicious eco-friendly refreshments and connect with fellow students who share a passion for preserving our planet. Don’t miss out on this exciting opportunity to contribute to a greener future and celebrate our commitment to protecting the environment!</p>
                    </div>
                </div>
           

                <div class="row" id="oceanDayForm" style="display: none;">
                    <div class="col-md-6">
                       <img src="{{ asset('paper') }}/img/oceans.jpeg" alt="Event Name" class="img-fluid rounded" height="400px" width="400px">
                    </div>
                        <div class="col-md-6">
                            <h3>World Ocean Day</h3>
                            <p style="font-size: 1.25rem;"><strong>Date:</strong> June 8</p>
                            <p style="font-size: 1.25rem;"><strong>Time:</strong> 10:00 AM</p>
                            <p style="font-size: 1.25rem;"><strong>Venue:</strong> School Auditorium</p>
                            <p style="font-size: 1rem;"><strong>Description:</strong> Join us for the World Ocean Day celebration! The day aims to create awareness about the importance of preserving and conserving oceanic resources. It also celebrates the many ways humanity and biodiversity depend on oceans. Like all other natural resources, oceans are also bearing the brunt of pollution and overexploitation.Let us come together to save our oceans! Save the Sea to See the Future. We are tied to the ocean. And when we go back to the sea, whether it is to sail or to watch – we are going back from whence we came.</p>
                        </div>
                    </div>

                    <div class="row" id="milkDayForm" style="display: none;">
                        <div class="col-md-6">
                            <img src="{{ asset('paper') }}/img/milk.jpeg" alt="Event Name" class="img-fluid rounded" height="400px" width="400px">
                        </div>
                        <div class="col-md-6">
                            <h3>World Milk Day</h3>
                            <p style="font-size: 1.25rem;"><strong>Date:</strong> June 1</p>
                            <p style="font-size: 1.25rem;"><strong>Time:</strong> 10:00 AM</p>
                            <p style="font-size: 1.25rem;"><strong>Venue:</strong> School Auditorium</p>
                            <p style="font-size: 1rem;"><strong>Description:</strong> Join us for the World Milk Day celebration! This day aims to raise awareness about the importance of milk and dairy products in our daily lives. It highlights the nutritional benefits of milk, which is essential for growth and development. Milk also supports the livelihoods of millions of dairy farmers worldwide. As we celebrate, let's remember to support sustainable dairy practices and ensure that everyone has access to this nutritious resource. Enjoy a glass of milk and appreciate the hard work that goes into bringing this vital food to our tables. Drink milk for a healthy future!</p>
                        </div>
                    </div>
                    <div class="row" id="bloodDayForm" style="display: none;">
                        <div class="col-md-6">
                            <img src="{{ asset('paper') }}/img/blood.jpeg" alt="Event Name" class="img-fluid rounded" height="400px" width="400px">
                        </div>
                        <div class="col-md-6">
                            <h3>World Milk Day</h3>
                            <p style="font-size: 1.25rem;"><strong>Date:</strong> June 14</p>
                            <p style="font-size: 1.25rem;"><strong>Time:</strong> 1:00 PM</p>
                            <p style="font-size: 1.25rem;"><strong>Venue:</strong> School Auditorium</p>
                            <p style="font-size: 1rem;"><strong>Description:</strong>Join us for the World Blood Donor Day celebration! This day aims to raise awareness about the importance of donating blood and to thank voluntary blood donors for their life-saving gifts. Blood donations are crucial for emergency surgeries, treatments, and chronic conditions, helping to save millions of lives every year. By donating blood, you contribute to the health and well-being of your community. Let’s come together to support this noble cause and ensure that blood is always available for those in need. Give blood, give life – your donation can make a difference!</p>
                        </div>
                    </div>

            </div>
            

        </div>
        



    </div> 
    



</div> --}}
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    
    function getUrlParameter(name) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(window.location.href);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Check if URL parameter 'showForm' is set to 'milkDayForm' and show the form if true
    var showForm = getUrlParameter('showForm');
    if (showForm === 'environmentlDayForm') {
        document.getElementById('environmentlDayForm').style.display = 'block';
    }

    var showForm = getUrlParameter('showForm');
    if (showForm === 'oceanDayForm') {
        document.getElementById('oceanDayForm').style.display = 'block';
    }

    var showForm = getUrlParameter('showForm');
    if (showForm === 'milkDayForm') {
        document.getElementById('milkDayForm').style.display = 'block';
    }

    var showForm = getUrlParameter('showForm');
    if (showForm === 'bloodDayForm') {
        document.getElementById('bloodDayForm').style.display = 'block';
    }

</script>

@endpush