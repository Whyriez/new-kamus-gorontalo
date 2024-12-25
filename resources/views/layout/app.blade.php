<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- @vite('resources/css/app.css') --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <script src="{{ asset('build/assets/app.js') }}"></script>
        {{-- <link rel="stylesheet" href="https://kamus-gorontalo.vercel.app/build/assets/app-BjRauw1h.css"> --}}

        <!-- Styles -->
    </head>
    
    <body>
        @yield('konten')
    </body>
    
</html>