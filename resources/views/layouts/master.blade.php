<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('header-title')</title>
    <base href="{{ asset("") }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href={{ asset("img/favicon.ico") }}>

    <!-- CSS here -->
    <link rel="stylesheet" href={{ asset("css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("css/fontawesome-all.min.css") }}>
    <link rel="stylesheet" href={{ asset("css/nice-select.css") }}>
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
</head>
<body>
    @include('partials.header')
    <main>
        @yield('main')
    </main>
    @include('partials.footer')
</body>
