<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/v4-shims.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-my.css') }}">
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
        $('.alert-success').fadeOut(3600);
    });
</script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}" defer></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" defer></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}" defer></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}" defer></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}" defer></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" defer></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}" defer></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" defer></script>

@yield('post-script')

</body>
</html>
