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
    <link rel="icon" type="image" href="{{ asset('img/ustp_logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Sidebar Toggle Button -->
    <!--<button id="sidebar-toggle" class="text-white bg-gray-800 p-2 rounded-lg fixed top-4 right-4 z-50">
        <i class="fa-solid fa-bars"></i>
    </button>-->

    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar Component -->
        <div id="sidebar-wrapper" class="w-64 bg-gray-800 text-white hidden transition-all duration-300">
            <x-sidebar />
        </div>

        <!-- Main Content Area -->
        <div class="flex-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">

                    <!-- Sidebar Toggle Button -->
                    <button id="sidebar-toggle" class="text-white bg-gray-800 p-2 rounded-lg fixed top-4 right-4 z-50">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>

                </header>
            @endisset


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar-wrapper');
            
            // Simple toggle functionality for all screen sizes
            toggleBtn?.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>