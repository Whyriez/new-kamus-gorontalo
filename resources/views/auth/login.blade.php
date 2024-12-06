<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-purple-700 to-purple-900">
     
        <div class="bg-gray-200 p-8 rounded-2xl shadow-lg w-full max-w-md text-center">
       
          <h1 class="text-2xl text-black font-semibold">Bahasa</h1>
          <h2 class="text-4xl font-bold text-black mt-2 mb-6">Hulondalo</h2>
          <p class="text-lg font-medium mb-8 text-black">SIGN-IN</p>
    
          <form method="POST" action="{{ route('auth.proses_login') }}" class="space-y-6">
            @csrf
            <div class="relative">
              <label class="flex items-center space-x-2 text-gray-700">
                <i class="fas fa-user-circle text-xl"></i>
                <input
                  type="text"
                  placeholder="Username"
                  class="w-full border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700"
                />
              </label>
            </div>
    
            <div class="relative">
              <label class="flex items-center space-x-2 text-gray-700">
                <i class="fas fa-envelope text-xl"></i>
                <input
                  type="email"
                  placeholder="Email"
                  name="email"
                  class="w-full border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700"
                />
              </label>
            </div>

            <div class="relative">
              <label class="flex items-center space-x-2 text-gray-700">
                <i class="fas fa-lock text-xl"></i>
                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  class="w-full border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700"
                />
              </label>
            </div>
    
          
            <button
              type="submit"
              class="w-full bg-gray-800 text-white font-medium py-3 rounded-lg mt-4 hover:bg-gray-900 flex items-center justify-center space-x-2"
            >
              <i class="fas fa-envelope"></i>
              <span>Request</span>
            </button>
          </form>
        </div>
      </div>
</body>
</html>

