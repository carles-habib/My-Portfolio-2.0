@if(config('services.google_analytics.measurement_id'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.measurement_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.measurement_id') }}');
    </script>
@endif

<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />

<!-- Site Title -->
<title>
    @hasSection('title')
        @yield('title') | {{ config('app.name') }}
    @else
        {{ config('app.name') }} — Web Developer
    @endif
</title>

<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}" />
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flaticon_gerold.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/backToTop.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/odometer-theme-default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
