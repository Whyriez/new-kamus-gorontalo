@extends('layout.app')
@extends('layout.appVisitor')
@section('title', 'Detail Kata')
@section('konten')

<div class="w-4/5 px-14 md:py-4 py-10 mx-auto">
    <div class="flex flex-col lg:flex-row justify-between p-6">
        <div class="w-full lg:w-1/2 order-2 lg:order-1">
            <div class="flex items-center mt-5">
                <span class="font-bold text-md mr-2">
                    @if($kata->kategori == 'Nomina')
                        (n.) 
                    @elseif($kata->kategori == 'Verba')
                        (v.) 
                    @elseif($kata->kategori == 'Adjektiv')
                        (adj.) 
                    @elseif($kata->kategori == 'Adverbia')
                        (adv.) 
                    @elseif($kata->kategori == 'Pronomina')
                        (pron.) 
                    @elseif($kata->kategori == 'Numeralia')
                        (num.) 
                    @elseif($kata->kategori == 'Preposisi')
                        (prep.) 
                    @elseif($kata->kategori == 'Konjungsi')
                        (conj.) 
                    @elseif($kata->kategori == 'Interjeksi')
                        (interj.) 
                    @elseif($kata->kategori == 'Artikula')
                        (art.) 
                    @else
                         <!-- Default: if no category matched -->
                    @endif
                </span>
                <h1 class="text-3xl font-semibold text-gray-800">{{ $kata->gorontalo }}</h1>
                <button class="bg-purple-300 hover:bg-purple-400 text-purple-900 p-2 rounded-full ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m-10.5 3v9l10.5-3m-10.5-6l-3-3m3 3H3m13.5-3l3 3m-3-3H21" />
                    </svg>
                </button>
            </div>
            <p class="text-lg text-gray-600 italic">{{ $kata->pengucapan }}</p>
            <div class="mt-10">
                <h1 class="text-gray-700 text-md font-semibold">Indonesia :</h1>
                <p class="text-xl font-bold">{{ $kata->indonesia }}</p>
            </div>
            <div class="mt-10 max-w-sm">
                <h1 class="text-gray-700 text-md font-semibold">Kalimat :</h1>
                <p class="text-sm">{{ $kata->kalimat }}</p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 order-1 lg:order-2 flex justify-center mt-5">
            <div class=" w-4/6 lg:w-3/4 h-60 rounded-lg  flex items-center justify-center">
                <img src="{{ asset('storage/' . $kata->gambar) }}" class="text-gray-500 text-sm rounded-md">
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