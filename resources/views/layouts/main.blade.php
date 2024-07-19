<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Reader Blog</title>
    <!-- CSS và các meta tags khác -->

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ url('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/slick/slick.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}" media="screen">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('images/favicon.png') }}" type="image/x-icon">

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    <!-- JS scripts -->
    <script src="{{ url('plugins/jQuery/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('plugins/slick/slick.min.js') }}"></script>
    <script src="{{ url('plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ url('js/script.js') }}"></script>
</body>
</html>
