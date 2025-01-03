@extends('layout.app')
@section('title', 'Detail Editor')
@section('konten')

    @extends('layout.appAdmin')
@section('konten_admin')
    @vite('resources/css/app.css')

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Editor</h1>
            <div class="flex flex-col md:flex-row gap-6">
                @foreach ($dataEditor as $editor)
                    <!-- Foto Profil -->
                    @if ($editor->profile_photo_path)
                        <!-- Tampilkan gambar dari field 'img' jika tidak null -->
                        <img src="{{ asset('storage/' . $editor->profile_photo_path) }}" alt="" width="175px"
                            height="175px" class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
                    @else
                        <!-- Jika field 'img' kosong/null, tampilkan gambar default dari folder 'public' -->
                        <img src="{{ asset('img/default.png') }}" alt="Default Image" width="175px" height="175px"
                            class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
                    @endif
                    {{-- <div class="flex-shrink-0">
                        <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Foto Profil"
                            class="w-32 h-32 object-cover rounded-full mx-auto md:mx-0">
                    </div> --}}

                    <!-- Informasi Detail -->
                    <div class="flex-grow">
                        <table class="w-full text-sm text-left text-gray-600">
                            <tbody>

                                {{-- {{ dd($dataEditor) }} --}}
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Nama</th>
                                    <td class="px-4 py-2">{{ $editor->name }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Nama Lengkap</th>
                                    <td class="px-4 py-2">{{ $editor->fullname }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Email</th>
                                    <td class="px-4 py-2">{{ $editor->email }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Nomor HP</th>
                                    <td class="px-4 py-2">{{ $editor->phone_number }}</td>
                                </tr>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Role</th>
                                    <td class="px-4 py-2">
                                        @if ($editor->role == 'Editor')
                                            <p
                                                class="px-3 py-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-green-200 text-green-600">
                                                {{ $editor->role }}
                                            </p>
                                        @else
                                            <p
                                                class="px-3 py-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-yellow-200 text-yellow-600">
                                                {{ $editor->role }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-gray-800 font-medium">Bio</th>
                                    <td class="px-4 py-2">{{ $editor->bio }}</td>
                                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-2">
            <form action="{{ route('accEditor') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $editor->id }}">
                <button type="submit" name="action"
                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-800 w-full sm:w-auto mb-2 sm:mb-0">
                    <input type="hidden" name="role" value="Editor">
                    Terima
                </button>
            </form>

            <form action="{{ route('accEditor') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $editor->id }}">
                <button type="submit" name="action"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-800 w-full sm:w-auto mb-2 sm:mb-0">
                    <input type="hidden" name="role" value="Pending">
                    Tolak
                </button>
            </form>

            <a href="{{ route('aturEditor') }}"
                class="bg-gray-500 text-white text-center px-4 py-2 rounded-md hover:bg-gray-700 w-full sm:w-auto mb-2 sm:mb-0">Kembali</a>
        </div>
    </div>
    </div>

@endsection
@endsection
