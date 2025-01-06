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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        {{--  <!-- Conditionally load Bootstrap for specific pages -->
        @if(Route::currentRouteName() == 'register') <!-- Or any other page where you want Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        @endif  --}}

        <!-- Vite for CSS and JS assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="{{ (request()->is('employer/register') || request()->is('employee/register'))? 'login' : '' }}">
            <!-- First Header: Social Links -->
    @if (!Auth::check()) <!-- Show this for non-logged in users -->
    <header class="top-header bg-light py-2">
        <div class="container">
            <ul class="list-inline text-center mb-0">
                <li class="list-inline-item"><a href="#" class="text-dark">Facebook</a></li>
                <li class="list-inline-item"><a href="#" class="text-dark">LinkedIn</a></li>
                <li class="list-inline-item"><a href="#" class="text-dark">Twitter</a></li>
                <li class="list-inline-item"><a href="#" class="text-dark">Pinterest</a></li>
                <li class="list-inline-item"><a href="#" class="text-dark">Employer Games</a></li>
            </ul>
        </div>
    </header>
    @endif

    <!-- Second Header: Navigation Links -->
    @if (!Auth::check()) <!-- Show this for non-logged in users -->
    <header class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container-fluid">
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a href="#" class="nav-link text-white">JOBS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">EMPLOYERS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">JOB CATEGORIES</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">ABOUT</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">CONTACT</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">EMPLOYEE</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @endif
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        @stack('scripts')
    </body>
</html>
