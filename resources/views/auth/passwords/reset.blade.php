@extends('welcome')

@section('page-script-head')
    <!-- Custom Theme files -->
    <link href="/css/style-auth.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
@endsection

@section('content')
    <div class="main-w3layouts">
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{route('password.update') }}" method="POST">
                @csrf

                <!--TODO: Change scale on form-->

                    <h1 class="form-header">{{ __('Reset Password') }}</h1>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <label for="email"
                               class="col-form-label-big-lg text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="text @error('email') is-invalid @enderror" name="email"
                               value="{{ $email ?? old('email') }}" required
                               autocomplete="email">
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
                               placeholder="Please fill out this field" required autocomplete="new-password" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-form-label-big-lg text-md-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password"
                               class="text @error('password') is-invalid @enderror" name="password_confirmation"
                               placeholder="Please fill out this field" required autocomplete="new-password">
                    </div>

                    <div class="form-group row">
                        <input type="submit" value={{ __('Reset Password') }}>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
