@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
@if(auth()->guard('web')->check() || auth()->guard('webstudents')->check() || auth()->guard('webteachers')->check() || auth()->guard('webparents')->check() || auth()->guard('webaccountants')->check())
<div class="content col-md-12 ml-auto mr-auto">
    <div class="header py-5 pb-7 pt-lg-9">
        <div class="container col-md-10">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 pt-5">
                        <h1 class="@if(Auth::guest()) text-black @endif">{{ __('Welcome to School Management System.') }}</h1>

                        <p class="@if(Auth::guest()) text-black @endif text-lead mt-3 mb-0">
                            {{ __('Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="content" style="margin-top: 40px;">
        <div class="container" style="background-color: red;">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto">
                    <div class="info-area info-horizontal mt-3" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <div class="icon icon-primary" style="margin-right: 10px;margin-top:-10px;">
                            <img src="{{asset('paper')}}/img/admission-icon.png" alt="Admission Icon" width="30px">
                        </div>
                        <div class="description">
                            <p class="description" style="font-weight: bold;">
                                {{ __('Admission Open from July 1, 2024 to August 15, 2024') }}
                            </p>
                        </div>
                    </div>
                    
                </div>                
            </div>
        </div>

        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-lg-5 col-md-5 ml-auto">
                    <div class="info-area info-horizontal">
                        <div class="description">
                            <h3 class="info-title">{{ __('Facilities :') }}</h3>
                            <ul style="list-style: none;">
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> well-lit areas</li>
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> ventilated seats</li>
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> spacious rooms equipped with desks</li>
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> whiteboards/blackboards</li>
                            </ul>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="description">
                            <ul style="list-style: none;">
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> A quiet space with a diverse collection of books</li>
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> digital resources for reading and research</li>
                            </ul>
                        </div>
                    </div>
                    <div class="info-area info-horizontal">
                        <div class="description">
                            <ul style="list-style: none;">
                                <li style="font-weight: bold"><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check">  Science labs for subjects like physics, chemistry, and biology with necessary equipment and safety measures</li>
                                {{-- <li><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> ventilated seats</li>
                                <li><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> spacious rooms equipped with desks</li>
                                <li><img src="{{asset('paper/img/list1.png')}}" width="20px" alt="check"> whiteboards/blackboards</li> --}}
                            </ul>
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
                                            <button type="submit" class="btn ot-btn-primary mb-3">{{ __('Sign in') }}</button>
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
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush