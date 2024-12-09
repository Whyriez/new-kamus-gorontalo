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
    @if (session('error'))
        <div class="alert alert-danger">
            <b>Opps!</b> {{ session('error') }}
        </div>
    @endif
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-purple-700 to-purple-900">
        <div class="max-w-md w-full">
            <div id="alert-5" class="flex items-center p-4 rounded-lg max-w-md bg-gray-50 dark:bg-gray-800 mb-3" role="alert">
                <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                    A simple dark alert with an <a href="#" class="font-semibold underline hover:no-underline">example
                        link</a>. Give it a click if you like.
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                    data-dismiss-target="#alert-5" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="bg-gray-200 p-8 rounded-md shadow-lg  max-w-md text-center">
                <h1 class="text- text-black font-semibold">Daftarkan Diri Anda Sebagai</h1>
                <h2 class="text-2xl text-purple-900 font-semibold">Kontributor</h2>
                <h2 class="text-xl text-purple-900 font-semibold">Kamus Gorontalo</h2>
    
                <form method="POST" action="" class="space-y-6">
                    @csrf
                    <div class="relative">
                        <label class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-user-circle text-xl"></i>
                            <input type="text" name="username" placeholder="Username"
                                class="w-full border-b-2 border-gray-400 rounded-md focus:border-black outline-none py-2 pl-10 text-gray-700" />
                        </label>
                    </div>
    
                    <div class="relative">
                        <label class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-envelope text-xl"></i>
                            <input type="email" placeholder="Email" name="email"
                                class="w-full border-b-2 border-gray-400 rounded-md focus:border-black outline-none py-2 pl-10 text-gray-700" />
                        </label>
                    </div>

                    <div class="relative">
                        <label class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-user-circle text-xl"></i>
                            <input type="text" name="phone_number" placeholder="(+62) Nomor Telepon"
                                class="w-full border-b-2 border-gray-400 rounded-md focus:border-black outline-none py-2 pl-10 text-gray-700" />
                        </label>
                    </div>
    
                    <div class="relative">
                        <label class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-lock text-xl"></i>
                            <input type="password" placeholder="Kata Sandi" name="password"
                                class="w-full border-b-2 border-gray-400 rounded-md focus:border-black outline-none py-2 pl-10 text-gray-700" />
                        </label>
                    </div>
    
                    <div class="relative">
                        <label class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-lock text-xl"></i>
                            <input type="password" placeholder="Konfirmasi Kata Sandi" name="confirm_password"
                                class="w-full border-b-2 border-gray-400 rounded-md focus:border-black outline-none py-2 pl-10 text-gray-700" />
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full bg-gray-800 text-white font-medium py-3 rounded-lg mt-4 hover:bg-gray-900 flex items-center justify-center space-x-2">
                        <i class="fas fa-envelope"></i>
                        <span>Tumuwoto Log</span>
                    </button>
                </form>
                <a href="{{ route('afterRegister') }}" class="text-blue-500 hover:text-blue-700">tf</a>
                <p class="mt-1">Sudah punya akun? <a href="{{ route('login') }}"
                        class=" text-blue-500 hover:text-blue-700"></a></p>
            </div>
        </div>
        
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
