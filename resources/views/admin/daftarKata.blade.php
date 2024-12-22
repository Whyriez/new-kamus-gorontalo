@section('title', 'Daftar Kata')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Kata</h1>
<div class="m-4 p rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
        <div class="flex w-full">
            <div class="justify-end">
                <a href="{{ route('formCreateKata') }}">
                    <button class=" mb-2 w-full md:w-auto lg:w-40 p-2 rounded-md hover:bg-purple-600 bg-purple-500 font-semibold text-white">
                        Tambah Kata
                    </button>
                </a>
            </div>
        </div>
        
        <table class="w-full text-sm text-left text-gray-500 p-10" id="pagination-table">
            
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4 hidden sm:table-cell">
                        no
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gorontalo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bahasa
                    </th>
                    <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3 hidden lg:table-cell">
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
                    <td class="w-4 p-4 hidden sm:table-cell">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $kata->gorontalo }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $kata->indonesia }}
                    </td>
                    <td class="px-6 py-4 hidden lg:table-cell">
                        {{ $kata->kategori }}
                    </td>
                    <td class="px-6 py-4 hidden lg:table-cell">
                       "{{ $kata->kalimat }}"
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('viewKata', $kata->id_kata) }}" class="font-medium bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-800">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>


<script>
    // if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    //     const dataTable = new simpleDatatables.DataTable("#pagination-table", {
    //         paging: true,
    //         perPage: 10,
    //         perPageSelect: [10, 25, 50, 100],
    //         sortable: false
    //     });
</script>

@endsection
