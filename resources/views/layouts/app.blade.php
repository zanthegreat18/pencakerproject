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
        <main class="py-6 px-4 sm:px-6 lg:px-8">

            {{-- ✅ Global Alert untuk pesan error dari session --}}
            @if (session('error'))
                <div class="max-w-3xl mx-auto mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            {{-- ✅ Global Alert untuk pesan success juga (bonus) --}}
            @if (session('success'))
                <div class="max-w-3xl mx-auto mb-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            {{-- Konten halaman --}}
            @yield('content')
        </main>
    </div>
</body>
</html>
