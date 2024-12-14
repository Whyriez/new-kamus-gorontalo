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
            <form action="{{ route('simpanKata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="rounded-md p-4">
                    <div class="flex justify-between">
                        <div class="mb-2 w-full">
                            <label for="kata" class="block text-zinc-600 text-sm font-bold mb-2">Gorontalo<span class="text-red-500">*</span></label>
                            <input type="text" id="kata" name="gorontalo" placeholder="mahale"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        <div class="mb-2 w-full ml-2">
                            <label for="arti" class="block text-zinc-600 text-sm font-bold mb-2">Bahasa<span class="text-red-500">*</span></label>
                            <input type="text" id="arti" name="indonesia" placeholder="mahal"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="kategori" class="block text-zinc-600 text-sm font-bold mb-2">Kategori<span class="text-red-500">*</span></label>
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
                    <div class="mt-4">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold my-2">Pengucapan<span class="text-red-500">*</span></label>
                        <!-- <p class="text-xs"><span class="text-red-500">*</span>contoh <span class="italic">tong.gu.la</span> -->
                        </p>
                        <input type="text" id="arti" name="pengucapan" placeholder="ma.ha.le"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="mt-4">
                        <label class="block text-zinc-600 text-sm font-bold my-2">File</label>
                        <input type="file" name="gambar"
                            class="bg-white hover:bg-gray-100 font-semibold border border-gray-400 rounded shadow w-full md:w-1/3">
                            <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 md:mx-2 mx-0">Gambar</i>
                        <input type="file" name="suara"
                            class="bg-white hover:bg-gray-100 font-semibold border md:ml-4 ml-0 border-gray-400 rounded shadow w-full md:w-1/3">
                            <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 md:mx-2 mx-0">Suara</i>
                    </div>
                    <div class="mt-4">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold my-2">Contoh Kalimat</label>
                        <input type="text" id="arti" name="kalimat"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="flex w-full mt-4">
                        <button
                        type="submit"
                            class="justify-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection