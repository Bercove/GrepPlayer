<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php

        $title = !empty($title)?$title:'';

    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href="{{ asset('/css/universal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">

    <script>
        window.csrf = "{{ csrf_token() }}";
        @if(Auth::user())
            window.user = {"name":"{{ Auth::user()->name }}","email":"{{ Auth::user()->email }}", "id":"{{ Auth::user()->id }}"};
        @else
            window.user = {"name":"","email":"", "id":""};
        @endif
    </script>

    @vite(['resources/js/app.js'])

    @yield('stylesheets')

    <title>{{ $title }}</title>
</head>
<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <div class="pop-up">

        @include('errors.errors')
        @include('successes.success')

    </div> 
     
    <main class="wrapper">
        @yield('contents')
    </main>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('/js/countdown.min.js') }}"></script>
    <script src="{{ asset('/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <script src="{{ asset('/js/apexcharts.js') }}"></script>
    <script src="{{ asset('/js/slick.min.js') }}"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('/js/lottie.js') }}"></script>
    <script src="{{ asset('/js/core.js') }}"></script>
    <script src="{{ asset('/js/charts.js') }}"></script>
    <script src="{{ asset('/js/animated.js') }}"></script>
    <script src="{{ asset('/js/kelly.js') }}"></script>
    <script src="{{ asset('/js/maps.js') }}"></script>
    <script src="{{ asset('/js/worldLow.js') }}"></script>
    <script src="{{ asset('/js/raphael-min.js') }}"></script>
    <script src="{{ asset('/js/morris.js') }}"></script>
    <script src="{{ asset('/js/morris.min.js') }}"></script>
    <script src="{{ asset('/js/flatpickr.js') }}"></script>
    <script src="{{ asset('/js/style-customizer.js') }}"></script>
    <script src="{{ asset('/js/chart-custom.js') }}"></script>
    <script src="{{ asset('/js/music-player.js') }}"></script>
    <script src="{{ asset('/js/music-player-dashboard.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    
    @yield('scripts')

    @include('notification.success')
    @include('notification.error')
</body>
</html>