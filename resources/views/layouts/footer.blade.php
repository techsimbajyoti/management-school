@if(auth()->guard('web')->check() || auth()->guard('webstudents')->check() || auth()->guard('webteachers')->check() || auth()->guard('webparents')->check() || auth()->guard('webaccountants')->check() || auth()->guard('webadmissions')->check())

<footer class="footer footer-black footer-white bg-white">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                   
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>
                    {{ __(' by ') }}
                    <a class="@if(Auth::guest()) text-black @endif" href="https://techsimba.in/" target="_blank">{{ __('Tech Simba') }}</a>
                    {{ __(' and ') }}
                    <a class="@if(Auth::guest()) text-black @endif" target="_blank" href="#">{{ __('UPDIVISION') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>
@else
<style>
    /* Footer Styles */
    .home_three_footer {
        background-color: #003366 !important;
        padding: 10px 0;
    }
    
    /* Other existing styles remain unchanged */
    
    .main_footer_wrap {
        padding: 20px 0;
    }
    
    .footer_widget {
        margin-bottom: 30px;
    }
    
    .footer_logo img {
        max-height: 60px;
    }
    
    .description_text {
        color: #6c757d;
        line-height: 1.6;
    }
    
    .footer_title h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .footer_links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer_links li {
        margin-bottom: 10px;
    }
    
    .footer_links a {
        color: #6c757d;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .footer_links a:hover {
        color: #007bff;
    }
    
    .subscribe_text {
        color: #6c757d;
        margin-bottom: 20px;
    }
    
    .subscription {
        display: flex;
    }
    
    .subscription .email {
        flex: 1;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px 0 0 4px;
    }
    
    .subscription .submit-btn {
        padding: 10px 20px;
        background-color: #007bff;
        border: 1px solid #007bff;
        border-radius: 0 4px 4px 0;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .subscription .submit-btn:hover {
        background-color: #0056b3;
    }
    
    .social__Links a {
        color: #6c757d;
        margin-right: 10px;
        font-size: 18px;
        transition: color 0.3s ease;
    }
    
    .social__Links a:hover {
        color: #007bff;
    }
    
    .copyright_area {
        background-color: #e9ecef;
        padding: 20px 0;
        text-align: center;
    }
    
    .footer_border {
        border-top: 1px solid #dee2e6;
        margin: 20px 0;
    }
    
    .copy_right_text p {
        color: #6c757d;
        margin: 0;
    }
    
    .gap_20 {
        gap: 20px;
    }
    
    @media (max-width: 767px) {
        .footer_widget {
            text-align: center;
        }
        .subscription {
            flex-direction: column;
        }
        .subscription .email,
        .subscription .submit-btn {
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .subscription .submit-btn {
            border-radius: 4px;
            margin-bottom: 0;
        }
    }
    </style>
    <footer class="home_three_footer">
        <div class="main_footer_wrap">
        <div class="container">
            <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer_widget">
                <div class="footer_logo">
                    <a href="#" class="text-white d-block">
                        <img src="{{ asset('paper') }}/img/d-updated.png" alt="Logo">
                        <h4>School Name</h4>
                    </a>
                    
                </div>
                <p class="text-white">Lorem ipsum dolor sit amet consectetur. Morbi cras sodales elementum sed. Suspendisse adipiscing arcu magna leo sodales pellentesque. Ac iaculis mattis ornare rhoncus nibh mollis arcu.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer_widget">
                    <div class="footer_logo">
                        <a href="#" class="text-white">
                            <h5><i class="fa fa-location"></i> Address</h5>
                        </a>
                    </div>
                    <p class="text-white">
                        1234 Elm Street,<br>
                        Springfield, XY 12345<br>
                        United States
                    </p>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div id="googleMap" style="width:100%;height:200px;"></div>
            </div>
            </div>
        </div>
        </div>
        <div class="p-0">
        <div class="container">
            <div class="footer_border m-0"></div>
            <div class="row">
            <div class="col-md-12">
                <div class="copy_right_text d-flex align-items-center gap_20 flex-wrap justify-content-center">
                <p class="text-white">© 2024 School Name . All rights reserved.</p>
                </div>
            </div>
            </div>
        </div>
        </div>
  </footer>

  @push('scripts')
  <script>
    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(51.508742,-0.120850),
      zoom:5,   
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLW5wzQivrAkMyYlnYp76FwqVUHFjUFTc&callback=myMap"></script>
  @endpush
@endif