@extends('layout.appAdmin')
@section('konten_admin')

<div class="w-11/12 mx-auto">
    <div class="flex flex-col lg:flex-row justify-between">
    @foreach($dataKata as $kata)
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
                <button class="bg-purple-300 hover:bg-purple-400 text-purple-900 p-2 rounded-full ml-2" id="playButton_{{ $kata->id_kata }}">
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

                <!-- Tombol Edit dan Hapus -->
                <div class="flex mt-4 space-x-4">
                    <a href="{{ route('editKata', $kata->id_kata) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-center w-24 px-5 py-2 rounded text-sm">
                        Edit
                    </a>
                    <a href="{{ route('deleteKata', $kata->id_kata) }}" class="bg-red-500 hover:bg-red-600 text-white text-center w-24 px-5 py-2 rounded text-sm">
                        Hapus
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 order-1 lg:order-2 flex justify-center mt-5">
            <div class=" w-4/6 lg:w-3/4 h-60 rounded-lg  flex items-center justify-center">
                <img src="{{ asset('storage/' . $kata->gambar) }}" class="text-gray-500 text-sm rounded-md">
            </div>
        </div>
        <audio id="audio_{{ $kata->id_kata }}" src="{{ asset('storage/' . $kata->suara) }}"></audio>
    @endforeach
    </div>
</div>

<script>
    // Menambahkan event listener untuk setiap tombol play
    @foreach($dataKata as $kata)
        document.getElementById('playButton_{{ $kata->id_kata }}').addEventListener('click', function() {
            var audio = document.getElementById('audio_{{ $kata->id_kata }}');
            // Cek apakah audio sedang diputar
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
                audio.currentTime = 0;  // Reset ke awal
            }
        });
    @endforeach
</script>


@endsection
