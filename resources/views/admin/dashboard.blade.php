@extends('layout.appAdmin')
@section('konten_admin')

{{-- Import Dashboard le ludin --}}
{{-- beken akan jooo --}}
<div id="logout-modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h2 class="text-lg font-bold mb-4">Logout Confirmation</h2>
        <p>Are you sure you want to logout?</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button id="cancel-logout" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
            <button id="confirm-logout" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
        </div>
    </div>
</div>

@endsection
