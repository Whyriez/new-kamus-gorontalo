@section('title', 'Profil')
@extends('layout.appAdmin')
@section('konten_admin')
    @vite('resources/css/app.css')

    
        <h1 class="text-2xl font-bold text-gray-800 mb-4">PROFIL</h1>
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Foto Profil -->
                <div class="flex-shrink-0">
                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Foto Profil"
                        class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
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
                            <form method="GET" action="{{ route('editProfil') }}">
                                <button type="submit" name="action" 
                                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-800 w-full sm:w-auto mb-2 sm:mb-0">
                                    <input type="hidden" name="role" value="Editor">
                                    Edit Profil
                                </button>
                            </form>
                </div>
            </div>
        </div>
            

@endsection