@extends('layouts.app', [
    'class' => 'login-page',
    'backgroundImagePath' => 'img/bg/fabio-mangione.jpg'
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="col-lg-4 col-md-6 ml-auto mt-5 mr-auto">
                <div class="card card-login">
                    <div class="card-body ">
                        <div class="card-header ">
                            <h3 class="header text-center">{{ __('Reset Password') }}</h3>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('verify') }}" class="text-start">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            @error('email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary w-100 my-4 mb-2">Send</button>
                            </div>
                            <!--<p class="mt-4 text-sm text-center">-->
                            <!--    Don't have an account?-->
                            <!--    <a href="{{ route('register') }}"-->
                            <!--        class="text-primary text-gradient font-weight-bold">Sign up</a>-->
                            <!--</p>-->
                        </form>
                        {{-- <form class="form" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nc-icon nc-single-02"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <div>
                                        <span class="invalid-feedback" style="display: block" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn ot-btn-primary mb-3">{{ __('Send Password Reset Link') }}</button>
                            </div>
                            <div class="text-center">
                            <a href="{{url('/')}}" class="text-info">Back to login page</a>
                            </div>
                        </form> --}}
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