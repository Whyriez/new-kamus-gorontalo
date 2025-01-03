@extends('layout.appAdmin')
@section('konten_admin')
@section('title', 'Tambah Kata')
@if (session('success'))
    <div class="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('success') }}
    </div>
@endif


<div class="p-1">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-2xl font-bold mb-2">Edit Kata</h1>
        {{-- {{ dd($dataKata) }} --}}
        <form action="{{ route('updateKata') }}" method="POST" enctype="multipart/form-data">
            @foreach ($dataKata as $kata)
                @csrf
                @method('put')

                <input type="hidden" name="id_kata" value="{{ $kata->id_kata }}">
                <div class="rounded-md p-4">
                    <div class="flex justify-between">
                        <div class="mb-2 w-full">

                            <label for="kata" class="block text-zinc-600 text-sm font-bold mb-2">Gorontalo</label>
                            <input type="text" id="kata" name="gorontalo" value="{{ $kata->gorontalo }}"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        <div class="mb-2 w-full ml-2">
                            <label for="arti" class="block text-zinc-600 text-sm font-bold mb-2">Bahasa</label>
                            <input type="text" id="arti" name="indonesia" value="{{ $kata->indonesia }}"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="kategori" class="block text-zinc-600 text-sm font-bold mb-2">Kategori</label>
                        <select id="kategori" name="kategori"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option> {{ $kata->kategori }} </option>
                            <option value="Nomina">Nomina</option>
                            <option value="Verba">Verba</option>
                            <option value="Adjektiv">Adjektiv</option>
                            <option value="Adverbia">Adverbia</option>
                            <option value="Pronomina">Pronomina</option>
                            <option value="Numeralia">Numeralia</option>
                            <option value="Preposisi">Preposisi</option>
                            <option value="Konjungsi">Konjungsi</option>
                            <option value="Interjeksi">Interjeksi</option>
                            <option value="Artikula">Artikula</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold my-2">Pengucapan</label>
                        <!-- <p class="text-xs"><span class="text-red-500">*</span>contoh <span class="italic">tong.gu.la</span> -->
                        </p>
                        <input type="text" id="arti" name="pengucapan" value="{{ $kata->pengucapan }}"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="mt-4">
                        <label class="block text-zinc-600 text-sm font-bold my-2">File</label>
                        <!-- Menampilkan Gambar Sebelumnya -->
                        @if ($kata->gambar)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $kata->gambar) }}" alt="Gambar Sebelumnya"
                                    class="max-w-xs h-auto rounded-lg shadow-md">
                            </div>
                        @endif

                        <!-- Input untuk Mengunggah Gambar Baru -->
                        <div class="mb-4">
                            <input type="file" name="gambar"
                                accept="image/jpeg, image/png, image/gif"
                                class="bg-white hover:bg-gray-100 font-semibold border border-gray-400 rounded-lg shadow-md p-2">
                                <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 mx-2">Gambar</i>
                        </div>

                       
                        @if ($kata->suara)
                            <div class="mb-4">
                                <audio controls>
                                    <source src="{{ asset('storage/' . $kata->suara) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif
                        <div class="mb-4">
                            <input type="file" name="suara" accept="audio/mp3, audio/wav"
                                class="bg-white hover:bg-gray-100 font-semibold border ml-4 border-gray-400 rounded shadow">
                            <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 mx-2">Suara</i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold my-2">Contoh Kalimat</label>
                        <input type="text" id="arti" name="kalimat"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $kata->kalimat }}" />
                    </div>
                    <div class="mt-4">
                        <label for="" class="block text-zinc-600 text-sm font-bold my-2">Pesan Update<span
                                class="text-red-500">*</span></label>
                        <input required type="text" id="" name="activity" required
                            placeholder="Contoh : Mengubah pengucapan kata 'Ta.ng.gulo' menjadi 'Tang.gulo'"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $kata->kalimat }}" />
                    </div>
                    <div class="flex w-full mt-4">
                        <button type="submit"
                            class="justify-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded">Simpan</button>
                    </div>
                </div>
        </form>
        @endforeach

    </div>
</div>

@endsection
