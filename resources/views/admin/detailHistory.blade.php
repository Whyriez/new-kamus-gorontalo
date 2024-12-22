@section('title', 'Daftar Kata')

@extends('layout.appAdmin')
@section('konten_admin')
@vite('resources/css/app.css')
<h1 class="text-3xl font-extrabold text-black text-center">Daftar Riwayat</h1>
<div class="m-4 rounded-lg">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
        
        <table class="w-full text-sm text-left text-gray-500" id="history-table">
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
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $history->user->name }}
                    </td>
                    <td class="px-6 py-4 font-medium ">
                        {{ $history->action }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                       {{ $history->activity }}
                    </td>
                    <td class="px-6 py-4 font-medium ">
                       {{ $history->kata->created_at->format('d-m-Y H:i') }}
                    </td>
                    <td class="px-6 py-4 font-medium ">
                       {{ $history->kata->updated_at->format('d-m-Y H:i') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

<script>
    // if (document.getElementById("history-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    //     const dataTable = new simpleDatatables.DataTable("#history-table", {
    //         paging: true,
    //         perPage: 10,
    //         perPageSelect: [10, 25, 50, 100],
    //         sortable: false
    //     });
</script>

@endsection
