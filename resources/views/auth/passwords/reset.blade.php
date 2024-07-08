@extends('layouts.app', [
    'class' => 'register-page'
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="col-lg-4 col-md-6 ml-auto mt-5 mr-auto">
                <div class="card card-login">
                    <div class="card-body ">
                        <form class="form" method="POST" action="{{ route('password.update', ['token' => $token]) }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="card-header ">
                                <h3 class="header text-center">{{ __('Reset Password') }}</h3>
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nc-icon nc-single-02"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="off" autofocus>
                                </div>
                                @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nc-icon nc-key-25"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="{{ __('Password') }}" type="password" value="{{ old('password') }}" autocomplete="off" required>
                                </div>
                                @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nc-icon nc-key-25"></i></span>
                                    </div>
                                    <input class="form-control" name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" type="password" value="{{ old('password_confirmation') }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn ot-btn-primary mb-3">{{ __('Reset Password') }}</button>
                            </div>
                        </form>
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