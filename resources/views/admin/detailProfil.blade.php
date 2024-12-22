@section('title', 'Profil')
@extends('layout.appAdmin')
@section('konten_admin')
    @vite('resources/css/app.css')


    <h1 class="text-2xl font-bold text-gray-800 mb-4">Profil</h1>
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Foto Profil -->
        <div class="flex-shrink-0">
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto Profil"
                    class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
            @else
                <img src="{{ asset('img/default.png') }}" alt="Foto Profil"
                    class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
            @endif
        </div>

        <!-- Informasi Detail -->
        <div class="flex-grow">
            <table class="w-full text-sm text-left text-gray-600">
                <tbody>

                    {{-- {{ dd($dataEditor) }} --}}
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Nama</th>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Nama Lengkap</th>
                        <td class="px-4 py-2">{{ $user->fullname }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Email</th>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Nomor HP</th>
                        <td class="px-4 py-2">{{ $user->phone_number }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Role</th>
                        <td class="px-4 py-2">{{ $user->role }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="px-4 py-2 text-gray-800 font-medium">Bio</th>
                        <td class="px-4 py-2">{{ $user->bio }}</td>
                    </tr>

                </tbody>
            </table>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-2">
                <div class="m-6 flex flex-col sm:flex-row justify-end gap-2">
                    <a href="{{ route('viewEditProfile', $user->id_user) }}"
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-800">Edit profile</a>
                </div>
            </div>
        </div>
    </div>

@endsection
