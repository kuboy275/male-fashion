<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Male-Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Header include -->
    @include('front-end.components.header')
    <!-- // -->
    @yield('content')
    <!-- // -->
    <!-- Footer include -->
    @include('front-end.components.footer')
    <!-- // -->
    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    @yield('js-custom')
</body>

</html>