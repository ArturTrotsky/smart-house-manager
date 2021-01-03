@extends('welcome')

@section('page-script-head')
    <!-- Custom Theme files -->
    <link href="../css/style-auth.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
@endsection

@section('content')
    <div class="main-w3layouts">
        <div class="main-agileinfo">
            <div class="agileits-top">

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <h1 class="form-header">{{ __('Reset Password') }}</h1>

                    <div class="form-group row">
                        @if (session('status'))
                            <div class="col-form-label-big-lg-red text-md-right" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

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
                        <input type="submit" value={{ __('Send Password Reset Link') }}>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
