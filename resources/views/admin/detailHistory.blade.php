@section('title', 'Daftar Kata')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Riwayat</h1>
<div class="m-4 bg-purple-900 rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 bg-white flex justify-between">
            <form action="{{ route('searchHistory') }}" method="GET">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Kata...">
                </div>
            </form>
        </div>
        
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kata
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Activity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated At
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($editHistories as $history)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="w-4 p-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $history->kata->gorontalo }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $history->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $history->action }}
                    </td>
                    <td class="px-6 py-4">
                       {{ $history->activity }}
                    </td>
                    <td class="px-6 py-4">
                       {{ $history->kata->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td class="px-6 py-4">
                       {{ $history->kata->updated_at->format('d-m-Y H:i') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

@endsection
