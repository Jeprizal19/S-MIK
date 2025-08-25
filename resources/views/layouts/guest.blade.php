<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Log In') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<body class="h-screen flex items-center justify-center bg-gradient-to-r from-cyan-500 to-blue-500">
    </head>
    <div class="bg-slate-50 w-[900px] h-[500px] rounded-lg shadow-2xl flex overflow-hidden">
        {{ $slot }}
    </div>
</body>

</html>