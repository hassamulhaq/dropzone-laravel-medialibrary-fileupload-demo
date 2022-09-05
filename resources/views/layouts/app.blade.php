<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{ asset('plugins/jquery@3.6.0/jquery-v3.6.0.js') }}"></script>
        <link rel="stylesheet" href="{{ asset("/plugins/dropzone@6.0.0-beta.2/dropzone.css") }}">
        <script src="{{ asset("plugins/dropzone@6.0.0-beta.2/dropzone-min.js") }}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="{{ asset('plugins/flowbite@1.5.3/flowbite.js') }}"></script>
        {{--<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>--}}



    @stack('footer_scripts')
    </body>
</html>
