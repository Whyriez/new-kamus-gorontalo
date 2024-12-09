@extends('layout.appAdmin')
@section('konten_admin')
@section('title', 'Tambah Kata')
@if (session('success'))
    <div class="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('success') }}
    </div>
@endif
<div class="p-4">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-2xl font-bold mb-5">Penambahan Kata</h1>
        <form action="{{ route('simpanKata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rounded-md p-4">
                <div class="flex justify-between">
                    <div class="mb-2 w-full">
                        <label for="kata" class="block text-zinc-600 text-sm font-bold mb-2">Gorontalo</label>
                        <input type="text" id="kata" name="gorontalo"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="mb-2 w-full ml-2">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold mb-2">Bahasa</label>
                        <input type="text" id="arti" name="indonesia"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="kategori" class="block text-zinc-600 text-sm font-bold mb-2">Kategori</label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>- Pilih kategori kata -</option>
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
                <div class="mb-2">
                    <label for="arti" class="block text-zinc-600 text-sm font-bold ">Pengucapan</label>
                    <p class="text-xs"><span class="text-red-500">*</span>contoh <span class="italic">tong.gu.la</span>
                    </p>
                    <input type="text" id="arti" name="pengucapan"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="flex mt-4">
                    <label class=" text-zinc-600 text-sm font-bold my-2 mr-4">File</label>
                    <button
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload
                        Gambar <i class="fas fa-upload"></i></button>
                    <button
                        class="bg-white hover:bg-gray-100 text-gray-8 00 font-semibold py-2 px-4 border ml-2 border-gray-400 rounded shadow">Upload
                        Audio <i class="fas fa-upload"></i></button>
                </div>
                <div class="mb-2 mt-4">
                    <label for="arti" class="block text-zinc-600 text-sm font-bold my-2">Contoh Kalimat</label>
                    <input type="text" id="arti" name="kalimat"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="flex w-full">
                    <button
                        class="justify-end bg-blue-500 hover:bg-blue-700 text-zinc-600 font-bold py-2 px-4 rounded">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection






<!-- <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-2xl font-bold text-center mb-5">Tambahkan Kata Baru</h1>
            <div class="bg-purple-500 rounded-md p-4">
                <div class="mb-2">
                    <label for="kata" class="block text-zinc-600 text-sm font-bold mb-2">Gorontalo</label>
                    <input type="text" id="kata" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-2">
                    <label for="arti" class="block text-zinc-600 text-sm font-bold mb-2">Indonesia</label>
                    <input type="text" id="arti" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
            <div class="mb-2">
                <label for="kategori" class="block text-zinc-600 text-sm font-bold mb-2">Kategori</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="File" class="block text-zinc-600 text-sm font-bold mb-2">Pengucapan</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class=" mt-4">
            <label  class="block text-zinc-600 text-sm font-bold mb-2">File</label>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Gambar <i class="fas fa-upload"></i></button>
                <button class="bg-white hover:bg-gray-100 text-gray-8 00 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Audio <i class="fas fa-upload"></i></button>
            </div>
            <div class="mb-2 mt-4">
                <label for="deskripsi" class="block text-zinc-600 text-sm font-bold mb-2">Deskripsi</label>
                <textarea id="deskripsi"
                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    rows="4" placeholder="Tambahkan deskripsi..."></textarea>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-zinc-600 font-bold py-2 px-4 rounded">Simpan</button>
            </div>
    </div>
</div> -->
