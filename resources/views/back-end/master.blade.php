<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('back-end.components.header')
        @include('back-end.components.siderbar')

        @yield('content')

        @include('back-end.components.footer')
    </div>
    <!-- jQuery -->
    <script src="{{ asset('backend/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/adminlte/dist/js/adminlte.min.js') }}"></script>
    @yield('js')
</body>
</html>