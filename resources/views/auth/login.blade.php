@extends('layouts.app', [
    'class' => 'login-page',
    'backgroundImagePath' => 'img/bg/school2.jpg'
])

@section('content')
    <div class="content">
        <div class="container" style="background-color: red;">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto">
                    <div class="info-area info-horizontal mt-3">
                        <div class="icon icon-primary">
                            <img src="{{asset('paper')}}/img/list1.png" alt="ff" width="30px">
                        </div>
                        <div class="description">
                            <p class="description">
                                {{ __('Admission Open from July 1, 2024 to August 15, 2024') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-lg-5 col-md-5 ml-auto">
                    <div class="info-area info-horizontal mt-5">
                        <div class="icon icon-primary">
                            <i class="nc-icon nc-tv-2"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('Marketing') }}</h5>
                            <p class="description">
                                {{ __('We\'ve created the marketing campaign of the website. It was a very interesting collaboration.') }}
                            </p>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-primary">
                            <i class="nc-icon nc-html5"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('Fully Coded in HTML5') }}</h5>
                            <p class="description">
                                {{ __('We\'ve developed the website with HTML5 and CSS3. The client has access to the code using GitHub.') }}
                            </p>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="icon icon-info">
                            <i class="nc-icon nc-atom"></i>
                        </div>
                        <div class="description">
                            <h5 class="info-title">{{ __('Built Audience') }}</h5>
                            <p class="description">
                                {{ __('There is also a Fully Customizable CMS Admin Dashboard for this product.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mr-auto">
                    <div class="card card-signup text-center" style="margin-bottom: 30px !important;">
                        <div class="card-body ">
                            <form class="form" method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                        <div class="card-header">
                                            <h3 class="header text-center">{{ __('Login') }}</h3>
                                        </div>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="nc-icon nc-single-02"></i>
                                                </span>
                                            </div>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
            
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="nc-icon nc-single-02"></i>
                                                </span>
                                            </div>
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>
                                            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
            
                                        <div class="form-group">
                                            {{-- <div class="form-check"> --}}
                                                 <label class="form-check-label">
                                                    <input name="remember" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="form-check-sign"></span>
                                                    {{ __('Remember me') }}
                                                </label>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
            
                                    <div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-warning btn-round mb-3">{{ __('Sign in') }}</button>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="btn btn-link" style="margin-button:10px;">
                                            {{ __('Forgot password') }}
                                        </a>
                                    </div>
                                
                            </form>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush