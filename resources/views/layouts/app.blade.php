<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex h-screen bg-gray-300 dark:bg-gray-900" x-data="{ isSidebarExpanded: true }">
        
        <!-- Sidebar -->
        <aside class="flex-shrink-0 h-screen overflow-y-auto bg-white dark:bg-gray-800">
            @include('layouts.sidebar')
        </aside>

        <!-- Content area -->
        <div class="flex flex-col flex-1">
            
            <!-- Navbar (tetap di atas) -->
            <header class="flex-shrink-0">
                @include('layouts.navigation')
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
