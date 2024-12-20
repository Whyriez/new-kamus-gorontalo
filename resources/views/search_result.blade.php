@extends('layout.app')
@extends('layout.appVisitor')
@section('title', 'Hasil Pencarian')
@section('konten')

    <div class="p-6">
        <div class="w-3/4 mx-auto">
            <div class="space-y-4">
                @forelse ($results as $result)
                    <div class="border-b border-gray-300 pb-2">
                        <div class="flex items-center mb-2">
                            <span class="font-bold text-lg mr-2">
                                @if ($result->kategori == 'Nomina')
                                    (n.)
                                @elseif($result->kategori == 'Verba')
                                    (v.)
                                @elseif($result->kategori == 'Adjektiv')
                                    (adj.)
                                @elseif($result->kategori == 'Adverbia')
                                    (adv.)
                                @elseif($result->kategori == 'Pronomina')
                                    (pron.)
                                @elseif($result->kategori == 'Numeralia')
                                    (num.)
                                @elseif($result->kategori == 'Preposisi')
                                    (prep.)
                                @elseif($result->kategori == 'Konjungsi')
                                    (conj.)
                                @elseif($result->kategori == 'Interjeksi')
                                    (interj.)
                                @elseif($result->kategori == 'Artikula')
                                    (art.)
                                @else
                                 (-)<!-- Default: if no category matched -->
                                @endif
                            </span>
                            <a href="{{ route('kata.getById', $result->id_kata) }}"
                                class="text-3xl font-semibold hover:underline">
                                {{ $result->gorontalo }}
                            </a>
                        </div>
                        <p class="text-gray-600 text-sm">Indonesia : <span
                                class="font-semibold text-lg">{{ $result->indonesia }}</span></p>
                    </div>
                @empty
                    <div class="text-center text-gray-500 mt-6">
                        <p class="text-xl font-medium">Tidak ada hasil yang ditemukan</p>
                        <p class="text-md">Coba kata kunci yang berbeda.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


@endsection
