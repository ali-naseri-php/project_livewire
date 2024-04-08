<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css.link.component')

    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>

<div class="min-h-screen bg-gray-100">
    @if(Auth::user())
        @include('layouts.navigation')
        <br>

        <!-- Page Heading -->

        <header class="bg-white shadow">
            <a href="">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    chat Global !
                </div>
            </a>
        </header>

    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
