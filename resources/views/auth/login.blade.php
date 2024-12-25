<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href=“http://kamus-gorontalo.vercel.app/build/assets/app-BjRauw1h.css”>
    {{-- @vite('resources/css/app.css') --}}
    <title>Document</title>
</head>

<body>

  <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-purple-800 to-purple-900">
    <div class="w-full max-w-md">
        @if (session('error'))
            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="bg-gray-200 p-8 rounded-md shadow-lg text-center">
            <h1 class="text-2xl text-black font-semibold">Bahasa</h1>
            <h2 class="text-4xl font-bold text-black mt-2">Hulondalo</h2>

            <form method="POST" action="{{ route('auth.proses_login') }}" class="space-y-6">
                @csrf
                <div class="relative">
                    <label class="flex items-center space-x-2 text-gray-700">
                        <i class="fas fa-envelope text-xl"></i>
                        <input type="email" placeholder="Email" name="email"
                            class="w-full rounded-md border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700" />
                    </label>
                </div>

                <div class="relative">
                    <label class="flex items-center space-x-2 text-gray-700">
                        <i class="fas fa-lock text-xl"></i>
                        <input type="password" placeholder="Password" name="password"
                            class="w-full rounded-md border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700" />
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-gray-800 text-white font-medium py-3 rounded-lg mt-4 hover:bg-gray-900 flex items-center justify-center space-x-2">
                    <i class="fas fa-envelope"></i>
                    <span>Tumuwoto Log</span>
                </button>
            </form>
            <p class="mt-1">Belum punya akun? <a href="{{ route('viewRegister') }}"
                    class=" text-blue-500 hover:text-blue-700">Daftar disini</a></p>
        </div>
    </div>
</div>
<script>
  // JavaScript untuk menghapus alert saat tombol close ditekan
  document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('[data-dismiss-target]').forEach(button => {
          button.addEventListener('click', function () {
              const target = document.querySelector(this.getAttribute('data-dismiss-target'));
              if (target) target.remove(); // Menghapus elemen alert
          });
      });
  });
</script>
</body>

</html>
