<!-- resources/views/admin/riwayat_table.blade.php -->

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
