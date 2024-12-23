@extends('layout.app')
@section('title', 'Daftar Editor')
@section('konten')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Editor</h1>
<div class="m-4 rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">   
    <!-- Tabel untuk Desktop -->
    <div class="hidden sm:block">
        <table class="w-full text-sm text-left text-gray-500" id="editor-table">
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
                    <td class="px-6 py-4 ">
                        @if ($editor->role == 'Editor')
                        <p class="px-3 py-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-green-200 text-green-600">
                            {{ $editor->role }}
                        </p>
                        @else
                        <p class="px-3 py-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-yellow-200 text-yellow-600">
                            {{ $editor->role }}
                        </p>
                        @endif
                    </td>
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
