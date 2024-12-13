<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>

    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-purple-700 to-purple-900">
        <div class="flex flex-col items-center">
            <div id="alert-5" class="flex items-center p-4 rounded-lg max-w-md bg-gray-50 dark:bg-gray-800 mb-3"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                @if (session('success'))
                    <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                        <p>{{ session('success') }}</p>
                @endif
                        <a href="{{ route('welcome') }}" class="font-semibold underline hover:no-underline">Kembali ke
                            halaman pencarian</a>
                    </div>
                
            </div>
        </div>
        @vite(['resources/js/app.js'])
</body>

</html>
