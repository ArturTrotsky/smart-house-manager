<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @yield('pre-css')
    <title>@yield('title')</title>

</head>

<body>

@include('layouts.header')

<div class="wrapper">

    @yield('content')

    @include('layouts.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.alert-success').fadeOut(2400);
    });
</script>

@yield('post-script')

</body>
</html>
