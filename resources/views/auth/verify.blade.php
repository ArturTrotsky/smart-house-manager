@extends('welcome')

@section('page-script-head')
    <!-- Custom Theme files -->
    <link href="../css/style-auth.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
@endsection
<!--TODO: Доработать вьюшку-->
@section('content')
    <div class="main-w3layouts">
        <div class="main-agileinfo">
            <div class="agileits-top">

                <h3 class="form-header">{{ __('Verify Your Email Address') }}</h3>

                <div class="form-group row">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
