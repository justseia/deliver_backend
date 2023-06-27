<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tandyr</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" href="{{ asset('build/assets/app-bfa46def.css.css') }}">
    <script src="{{ asset('build/assets/app-a6d2e222.js.js') }}"></script>
    <!-- @vite('resources/css/app.css') -->
    @livewireStyles
</head>

<body>

    @if(!Route::is('login') && !Route::is('register'))
    <x-header />
    @endif

    @yield('content')

    @if(!Route::is('login') && !Route::is('register'))
    <x-footer />
    @endif


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />

    @livewireScripts
</body>

</html>