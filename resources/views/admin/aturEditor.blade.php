@extends('layout.app')
@section('title', 'Daftar Editor')
@section('konten')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Editor</h1>
<div class="m-4 bg-purple-900 rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 bg-white flex justify-between">
            <label for="table-search" class="sr-only">Search</label>
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="table-search"
                class="block w-full sm:w-full pl-10 text-xs sm:text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cari editor">
        </div>

        <!-- Tombol Filter -->
        <div class="flex w-full sm:w-auto space-x-2">
            <form action="" method="">
                <button type="submit"
                    class="flex-1 sm:flex-none text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-sm px-4 py-2">
                    Editor
                </button>
            </form>
            <form action="" method="">
                <button type="submit"
                    class="flex-1 sm:flex-none text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs sm:text-sm px-4 py-2">
                    Pending
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel untuk Desktop -->
    <div class="hidden sm:block">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Nomor HP</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataEditor as $editor)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $editor->name }}</td>
                    <td class="px-6 py-4">{{ $editor->email }}</td>
                    <td class="px-6 py-4">{{ $editor->phone_number }}</td>
                    <td class="px-6 py-4">{{ $editor->role }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('editAccEditor', $editor->id) }}"
                            class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-800 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tampilan Stacked untuk Mobile -->
    <div class="sm:hidden grid grid-cols-1 gap-4">
        @foreach($dataEditor as $editor)
        <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-center mb-3">
                <h2 class="font-semibold text-lg text-gray-800">{{ $editor->name }}</h2>
                <span class="text-sm text-gray-500">{{ $editor->role }}</span>
            </div>
            <div class="text-sm text-gray-700 mb-2">
                <strong>Email:</strong> {{ $editor->email }}
            </div>
            <div class="text-sm text-gray-700 mb-2">
                <strong>Nomor HP:</strong> {{ $editor->no_hp }}
            </div>
            <div class="mt-2">
                <a href="{{ route('editAccEditor', $editor->id) }}"
                    class="inline-block bg-blue-600 text-white text-sm font-medium px-3 py-2 rounded-lg hover:bg-blue-800">
                    Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
