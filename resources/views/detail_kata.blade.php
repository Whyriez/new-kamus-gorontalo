@extends('layout.app')
@extends('layout.appVisitor')
@section('title', 'Detail Kata')
@section('konten')

<div class="w-4/5 p-14 mx-auto">
    <div class="flex justify-between p-6">
        <div>
            <div class="flex items-center">
                <h1 class="text-3xl font-semibold text-gray-800">(v.) Le'ibaca</h1>
                <button class="bg-purple-300 hover:bg-purple-400 text-purple-900 p-2 rounded-full ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m-10.5 3v9l10.5-3m-10.5-6l-3-3m3 3H3m13.5-3l3 3m-3-3H21" />
                    </svg>
                </button>
            </div>
            <p class="text-lg text-gray-600 italic ml-14">Le.i.ba.ca</p>
            <div class="mt-10">
                <h1 class="ml-14 text-gray-700 text-md font-semibold">Indonesia :</h1>
                <p class="ml-14 text-xl font-bold">Suruh Membaca</p>
            </div>
            <div class="mt-10 max-w-sm">
                <h1 class="ml-14 text-gray-700 text-md font-semibold">Kalimat :</h1>
                <p class="ml-14 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id saepe ad possimus temporibus veniam iure perspiciatis animi. Pariatur, neque quos.</p>
            </div>
        </div>
        <div class="flex-1 flex justify-end items-center max-h-60">
            <div class="bg-gray-100 w-3/4 h-full rounded-lg border border-gray-400 flex items-center justify-center">
                <p class="text-gray-500 text-sm">Gambar</p>
            </div>
        </div>
    </div>
</div>

@endsection


<!-- <div class="flex justify-between items-center mb-4">
            <a href="{{ route('login') }}" class="text-lg font-bold hover:text-zinc-400">
                Tumuwoto Log
            </a>
            <div class="relative mb-4 flex justify-center">
                <input type="text" placeholder="" class="bg-gray-100 w-[400px] h-8 pl-3 pr-8 rounded-full text-sm focus:outline-none">
                <span class="absolute right-14 top-2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 6.65a7.5 7.5 0 010 10.7z" />
                    </svg>
                </span>
            </div>
        </div> -->