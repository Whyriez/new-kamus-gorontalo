@section('title', 'EditProfil')
@extends('layout.appAdmin')
@section('konten_admin')
    @vite('resources/css/app.css')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Profil</h1>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Foto Profil -->
        <div class="mb-4">
            <label for="profile_photo" class="block text-gray-700 font-bold mb-2">Foto Profil</label>
            @if ($user->profile_photo_path)
                        <!-- Tampilkan gambar dari field 'img' jika tidak null -->
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="" width="175px" height="175px"
                            class="w-32 h-32 object-cover rounded-full mb-4">
                    @else
                        <!-- Jika field 'img' kosong/null, tampilkan gambar default dari folder 'public' -->
                        <img src="{{ asset('img/default.png') }}" alt="Default Image" width="175px" height="175px"
                            class="w-32 h-32 object-cover rounded-full mb-4">
                    @endif
            {{-- <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Foto Profil" class="w-32 h-32 object-cover rounded-full mb-4"> --}}
            <input type="file" id="profile_photo" name="profile_photo" class="block w-full text-gray-700 border rounded py-2 px-3">
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Username</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="block w-full text-gray-700 border rounded py-2 px-3" required>
        </div>

        <!-- Nama Lengkap -->
        <div class="mb-4">
            <label for="fullname" class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
            <input type="text" id="fullname" name="fullname" value="{{ $user->fullname }}" class="block w-full text-gray-700 border rounded py-2 px-3">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="block w-full text-gray-700 border rounded py-2 px-3" required>
        </div>

        <!-- Nomor HP -->
        <div class="mb-4">
            <label for="phone_number" class="block text-gray-700 font-bold mb-2">Nomor HP</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" class="block w-full text-gray-700 border rounded py-2 px-3">
        </div>

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-gray-700 font-bold mb-2">Bio</label>
            <textarea id="bio" name="bio" class="block w-full text-gray-700 border rounded py-2 px-3">{{ $user->bio }}</textarea>
        </div>

        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-800">
                Simpan
            </button>
            <a href="{{ route('viewProfile') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-800">
                Batal
            </a>
        </div>
    </form>
</div>

    @endsection