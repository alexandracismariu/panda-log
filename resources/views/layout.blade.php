<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Panda Logs')</title>

        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div class="flex">
            <nav class="flex flex-col space-y-2 w-2/12 h-screen bg-yellow-400">
                <div class="flex justify-center items-center space-x-4 py-6">
                    <img class="w-10 h-10 rounded-full" src="/img/favicon.ico">
                    <h1 class="text-2xl text-white font-semibold">
                        @yield('name', 'Panda Logs')
                    </h1>
                </div>

                @include('menu')
            </nav>

            <div class="flex flex-col w-10/12">
                <div class="flex justify-center items-center space-x-6 py-6">
                    <h1 class="text-6xl font-semibold text-gray-900">
                        @yield('title', 'My Workdays')
                    </h1>

                    <a href="{{ route('schedules.create') }}" class="mt-3">
                        <svg class="w-10 h-10 text-yellow-400 hover:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </a>
                </div>

                @yield ('content')
            </div>
        </div>
    </body>
</html>
