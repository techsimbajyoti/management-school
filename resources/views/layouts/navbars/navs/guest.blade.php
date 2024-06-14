<style>
    .navbar {
      background-color: white !important;
      padding: 0.5rem 1rem;
    }
    .navbar-brand {
      display: flex;
      align-items: center;
      font-size: 1.5rem;
      font-weight: bold;
      color: #333; /* Adjust color as needed */
    }
    .navbar-brand img {
      height: 50px;
      width: 50px;
    }
    .navbar-brand span {
      margin-left: 10px;
      color: #333; /* Adjust color as needed */
    }
    .navbar-toggler-bar {
      background-color: #333; /* Adjust color as needed */
    }
    .header_topbar_wrapper {
      background-color: #003366; /* Navy blue color */
      padding: 10px 0;
      color: white;
    }
    .header_topbar_left p, .header_topbar_right p, .header_topbar_right a {
      color: white;
    }
    .header_topbar_social a {
      color: white;
      margin: 0 5px;
    }
    .header_topbar_social a:hover {
      color: #007bff; /* Optional: Change color on hover */
    }
    .login__regiter a {
      color: white;
      margin-left: 15px;
      text-decoration: none;
    }
    .login__regiter a:hover {
      text-decoration: underline;
    }
  </style>

   <!-- Top Bar -->
   <div class="header_topbar_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="header_topbar_left d-flex">
            <p>
              <svg width="16" height="15" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.5 13.42V16.956C18.5001 17.2092 18.4042 17.453 18.2316 17.6382C18.059 17.8234 17.8226 17.9363 17.57 17.954C17.133 17.984 16.776 18 16.5 18C7.663 18 0.5 10.837 0.5 2C0.5 1.724 0.515 1.367 0.546 0.93C0.563722 0.677444 0.676581 0.441011 0.861804 0.268409C1.04703 0.0958068 1.29082 -0.000114433 1.544 2.56579e-07L5.08 2.56579e-07C5.20404 -0.000125334 5.3237 0.045859 5.41573 0.12902C5.50776 0.212182 5.5656 0.326583 5.578 0.45C5.601 0.68 5.622 0.863 5.642 1.002C5.84073 2.38892 6.248 3.73783 6.85 5.003C6.945 5.203 6.883 5.442 6.703 5.57L4.545 7.112C5.86445 10.1865 8.31455 12.6365 11.389 13.956L12.929 11.802C12.9919 11.714 13.0838 11.6509 13.1885 11.6237C13.2932 11.5964 13.4042 11.6068 13.502 11.653C14.767 12.2539 16.1156 12.6601 17.502 12.858C17.641 12.878 17.824 12.9 18.052 12.922C18.1752 12.9346 18.2894 12.9926 18.3724 13.0846C18.4553 13.1766 18.5012 13.2961 18.501 13.42H18.5Z" fill="white" />
              </svg>
              +0000000000
            </p>
            <p class="ml-3">
              <svg width="16" height="15" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.5 17.007C22.4982 17.2696 22.3931 17.521 22.2075 17.7068C22.0219 17.8926 21.7706 17.9979 21.508 18H3.492C3.22881 17.9997 2.9765 17.895 2.79049 17.7088C2.60448 17.5226 2.5 17.2702 2.5 17.007V16H20.5V4.3L12.5 11.5L2.5 2.5V1C2.5 0.734784 2.60536 0.48043 2.79289 0.292893C2.98043 0.105357 3.23478 0 3.5 0H21.5C21.7652 0 22.0196 0.105357 22.2071 0.292893C22.3946 0.48043 22.5 0.734784 22.5 1V17.007ZM4.934 2L12.5 8.81L20.066 2H4.934ZM0.5 12H8.5V14H0.5V12ZM0.5 7H5.5V9H0.5V7Z" fill="white" />
              </svg>
              <a href="" >school@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="header_topbar_right d-flex justify-content-end align-items-center">
            <div class="header_topbar_social d-none d-sm-flex">
              <a target="_blank" href="https://www.facebook.com" class="ml-3"><i class="fab fa-facebook-f"></i></a>
              <a target="_blank" href="https://www.twitter.com" class="ml-3"><i class="fab fa-twitter"></i></a>
              <a target="_blank" href="https://www.pinterest.com" class="ml-3"><i class="fab fa-pinterest-p"></i></a>
              <a target="_blank" href="https://www.instagram.com" class="ml-3"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="login__regiter d-flex align-items-center">
              <a>Affiliation Number : 0000000000</a>
            </div>

            {{-- <div class="login__regiter d-flex align-items-center">
                <a href="{{route('register')}}"><i class="nc-icon nc-book-bookmark"></i> Register</a>
              </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute">
    <div class="container">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#pablo">
          <img src="{{ asset('paper') }}/img/d.png" class="img-fluid" alt="Logo">
          <span>{{ __('School Name') }}</span>
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link btn ot-btn-primary">
              <i class="nc-icon nc-book-bookmark"></i>{{ __('Register') }}
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{ route('login') }}" class="nav-link btn ot-btn-primary">
              <i class="nc-icon nc-tap-01"></i>{{ __('Login') }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>