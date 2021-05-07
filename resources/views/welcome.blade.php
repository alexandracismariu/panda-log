<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Panda Logs')</title>

        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>

    <body>
        <div class='flex w-full h-screen'>
            <img class='object-cover' src='/img/panda.jpeg' alt='User avatar'>

            <div class="space-y-6 mx-auto p-32 self-center bg-gray-50 shadow-2xl">
                <a class="text-6xl" href="#">Welcome!</a>

                <div class='flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden mx-auto border-r-8 border-yellow-400
                    hover:border-yellow-500'>
                    <a
                        href="{{ route('schedules.index') }}"
                        class='flex items-center space-x-4 px-10 py-2 text-gray-600 hover:text-yellow-500'
                    >
                        <div class="">
                            <p class='text-3xl'>Let's start!</p>
                        </div>

                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
