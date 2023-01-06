<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'E-Auction') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full dark">
<div class="wrapper flex flex-col min-h-full bg-gray-900">
    @include('partials.header')
    <main class="main flex-auto container mx-auto py-12 ">
        @yield('content')
    </main>
    @include('partials.footer')
</div>


@yield('scripts')
</body>
</html>
