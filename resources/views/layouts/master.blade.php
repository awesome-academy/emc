<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('header-title')</title>
    <base href="{{ asset("") }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href={{ asset("css/bootstrap.min.css") }}>
    <link rel="stylesheet" href="https://webapps1.chicago.gov/cdn/FontAwesome-5.0.6/css/fontawesome-all.min.css">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <link rel="stylesheet" type="text/css" 
        href="https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css">

    <!-- Pusher here -->
    <meta name="pusherAppKey" content="{{ env('PUSHER_APP_KEY') }}">
    <meta name="pusherCluster" content="{{ env('PUSHER_APP_CLUSTER') }}">
    <meta name="baseUrl" content="{{ url(route('home')) }}">
</head>
<body>
    @include('partials.header')
    <main>
        @yield('main')
    </main>
    @include('partials.footer')
    
    @yield('javascript')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
