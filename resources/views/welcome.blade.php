@extends('layout.app')
@section('title', 'Bank Kata Gorontalo')
@section('konten')
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-purple-950 to-purple-900 text-white relative">
    <div class="absolute top-4 left-4">
        <a href="{{ route('login') }}" class="text-lg font-bold">
            Tumuwoto Log
        </a>
    </div>
    <div class="absolute top-4 right-4 flex items-center space-x-2">
        
    </div>
    <div class="text-center">
        <h1 class="text-6xl font-bold mb-8">HULONTALO</h1>
        
        <form class="relative w-full max-w-2xl mx-auto">
        <input 
            type="search" 
            class="block w-full h-16 p-4 pl-14 text-lg text-gray-900 rounded-full bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
            placeholder="cari kata" 
            required 
        />
        <button 
            type="submit" 
            class="absolute top-1/2 left-4 transform -translate-y-1/2 text-gray-500"
        >
            <svg 
            class="w-6 h-6" 
            aria-hidden="true" 
            xmlns="http://www.w3.org/2000/svg" 
            fill="none" 
            viewBox="0 0 24 24"
            >
            <path 
                stroke="currentColor" 
                strokeLinecap="round" 
                strokeLinejoin="round" 
                strokeWidth="2" 
                d="m21 21-5-5m0-7A7 7 0 1 1 3 10a7 7 0 0 1 13 0Z"
            />
            </svg>
        </button>
        </form>
        
        <p class="mt-4 text-sm text-gray-300">
        *kosakata yang ada masih belum diinput semuanya, dan masih dalam tahap pengembangan
        </p>
    </div>
</div>
@endsection
