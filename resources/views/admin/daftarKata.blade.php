@section('title', 'Daftar Kata')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Kata</h1>
<div class="m-4 bg-purple-900 rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 bg-white flex justify-between">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <form action="{{ route('searchKataAdmin') }}">

                    <input type="text" id="table-search" name="q" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Kata...">
                    
                </input>
                </form>
            </div>
            <div>
                <a href="{{ route('formCreateKata') }}">
                    <button class="p-2 rounded-md hover:bg-purple-600 bg-purple-500 font-bold text-white">
                        + Kata
                    </button>
                </a>
            </div>
        </div>
        
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gorontalo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bahasa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kalimat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKata as $kata)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="w-4 p-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $kata->gorontalo }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $kata->indonesia }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $kata->kategori }}
                    </td>
                    <td class="px-6 py-4">
                       "{{ $kata->kalimat }}"
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('editKata', $kata->id_kata) }}" class="font-medium bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-800">Edit</a>
                        <a href="{{ route('deleteKata', $kata->id_kata) }}" class="font-medium bg-red-600 text-white rounded-md px-2 py-1 hover:bg-red-800">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

@endsection
