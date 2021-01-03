@extends('welcome')

@section('page-script-head')
    <!-- Custom Theme files -->
    <link href="css/style-auth.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
@endsection

@section('content')
    <div class="main-w3layouts">
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <h1 class="form-header">{{ __('Sign In') }}</h1>

                    <div class="form-group row">
                        <label for="email"
                               class="col-form-label-big-lg text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="text @error('email') is-invalid @enderror" name="email"
                               placeholder="Please fill out this field" value="{{ old('email') }}" required
                               autocomplete="email"
                               autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-form-label-big-lg text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="text @error('password') is-invalid @enderror"
                               name="password"
                               placeholder="Please fill out this field" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                            <div class="form-check">
                                <input class="col-form-label-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="col-form-label-remember" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                    </div>

                    <div class="form-group row">
                        <input type="submit" value={{ __('Continue') }}>
                    </div>

                </form>

                @if (Route::has('password.request'))
                    <p><a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a></p>
                @endif
                <p>or <a href="{{ route('register') }}"> Register Now!</a></p>
            </div>
        </div>
    </div>
@endsection
