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
      @if(session('error'))
        <div class="alert alert-danger">
            <b>Opps!</b> {{session('error')}}
        </div>
      @endif
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-purple-800 to-purple-900">
     
        <div class="bg-gray-200 p-8 rounded-md shadow-lg w-full max-w-md text-center">
       
          <h1 class="text-2xl text-black font-semibold">Bahasa</h1>
          <h2 class="text-4xl font-bold text-black mt-2">Hulondalo</h2>
    
          <form method="POST" action="{{ route('auth.proses_login') }}" class="space-y-6">
            @csrf
            <div class="relative ">
              <label class="flex items-center space-x-2 text-gray-700">
                <i class="fas fa-envelope text-xl"></i>
                <input
                  type="email"
                  placeholder="Email"
                  name="email"
                  class="w-full rounded-md border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700"
                />
              </label>
            </div>

            <div class="relative ">
              <label class="flex items-center space-x-2 text-gray-700">
                <i class="fas fa-lock text-xl"></i>
                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  class="w-full rounded-md border-b-2 border-gray-400 focus:border-black outline-none py-2 pl-10 text-gray-700"
                />
              </label>
            </div>
    
          
            <button
              type="submit"
              class="w-full bg-gray-800 text-white font-medium py-3 rounded-lg mt-4 hover:bg-gray-900 flex items-center justify-center space-x-2"
            >
              <i class="fas fa-envelope"></i>
              <span>Tumuwoto Log</span>
            </button>
          </form>
          <p class="mt-1">Belum punya akun? <a href="{{ route('viewRegister') }}" class=" text-blue-500 hover:text-blue-700">Daftar disini</a></p>
        </div>
      </div>

      {{-- <div x-data="{ showLogoutModal: false }">
        <!-- Trigger Modal -->
        <button 
            class="hidden" 
            x-ref="logoutTrigger" 
            @click="showLogoutModal = true">
        </button>
    
        <!-- Modal -->
        <div 
            x-show="showLogoutModal" 
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Logout</h2>
                <p class="text-sm text-gray-600 mt-2">Apakah Anda yakin ingin logout?</p>
                <div class="flex justify-end gap-4 mt-4">
                    <button 
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300" 
                        @click="showLogoutModal = false">Batal</button>
                    <a 
                        href="{{ route('logout') }}" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Logout
                    </a>
                </div>
            </div>
        </div> --}}
    </div>

</body>

</html>

