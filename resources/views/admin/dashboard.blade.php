@extends('layout.appAdmin')
@section('konten_admin')
    <div class="p-4 sm:p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-0">
        <!-- Card Total Kata -->
        <a href="{{ route('daftarKata') }}"
            class="bg-gradient-to-r from-purple-500 to-purple-700 text-white p-6 rounded-lg shadow-lg flex items-center gap-4 hover:scale-105 hover:shadow-2xl transition transform duration-300">
            <div class="flex items-center justify-center bg-white bg-opacity-20 p-4 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 7h2v5H9V7zm0 6h2v2H9v-2z" />
                </svg>
            </div>
            <div>
                <div class="text-4xl font-bold">{{ $totalKata }}</div>
                <p class="text-lg">Total Kata</p>
            </div>
        </a>
        <!-- Card Total Editor -->
        @if (Auth::check() && Auth::user()->role === 'admin')
            <a href=""
                class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-lg shadow-lg flex items-center gap-4 hover:scale-105 hover:shadow-2xl transition transform duration-300">
                <div class="flex items-center justify-center bg-white bg-opacity-20 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM8 9h4v1H8v1h2v1H8v1h4v1H8v1h4v-6H8z" />
                    </svg>
                </div>
                <div>
                    <div class="text-4xl font-bold">{{ $editor }}</div>
                    <p class="text-lg">Total Editor</p>
                </div>
            </a>

            <!-- Card Permintaan Editor -->
            <a href="{{ route('aturEditor') }}"
                class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white p-6 rounded-lg shadow-lg flex items-center gap-4 hover:scale-105 hover:shadow-2xl transition transform duration-300">
                <div class="flex items-center justify-center bg-white bg-opacity-20 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M8.257 3.099c.366-1.259 2.12-1.259 2.485 0l.516 1.774a1 1 0 00.95.69h1.843c1.309 0 1.853 1.68.8 2.465l-1.491 1.153a1 1 0 00-.363 1.118l.516 1.774c.366 1.26-1.065 2.3-2.086 1.535l-1.491-1.153a1 1 0 00-1.176 0l-1.491 1.153c-1.021.765-2.452-.275-2.086-1.535l.516-1.774a1 1 0 00-.363-1.118L3.061 7.028c-1.053-.785-.51-2.465.8-2.465h1.843a1 1 0 00.95-.69l.516-1.774z" />
                    </svg>
                </div>
                <div>
                    <div class="text-4xl font-bold">{{ $pending }}</div>
                    <p class="text-lg">Permintaan Editor</p>
                </div>
            </a>
        @endif
        <a href="{{ route('userHistory') }}"
            class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white p-6 rounded-lg shadow-lg flex items-center gap-4 hover:scale-105 hover:shadow-2xl transition transform duration-300">
            <div class="flex items-center justify-center bg-white bg-opacity-20 p-4 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M8.257 3.099c.366-1.259 2.12-1.259 2.485 0l.516 1.774a1 1 0 00.95.69h1.843c1.309 0 1.853 1.68.8 2.465l-1.491 1.153a1 1 0 00-.363 1.118l.516 1.774c.366 1.26-1.065 2.3-2.086 1.535l-1.491-1.153a1 1 0 00-1.176 0l-1.491 1.153c-1.021.765-2.452-.275-2.086-1.535l.516-1.774a1 1 0 00-.363-1.118L3.061 7.028c-1.053-.785-.51-2.465.8-2.465h1.843a1 1 0 00.95-.69l.516-1.774z" />
                </svg>
            </div>
            <div>
                <div class="text-4xl font-bold">{{ $kontribusi }}</div>
                <p class="text-lg">Kontribusi Anda</p>
            </div>
        </a>
    </div>
@endsection
