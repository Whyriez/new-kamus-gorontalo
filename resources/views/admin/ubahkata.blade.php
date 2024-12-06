<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    @vite('resources/css/app.css')
    <!-- Styles -->

</head>

<body>
        <div class=" h-screen flex">
        {{-- Navbar --}}
        <div class="w-1/5 bg-purple-900 p-4">
            <div class="flex flex-col items-center bg-purple-600">
                <span class="text-zinc font-bold">ADMIN</span>
            </div>
            <nav class="mt-10">
                <ul class="space-y-4">
                    <li class="flex items-center text-white">
                        <i class="fas fa-home mr-2"></i>
                        <a href="dashboard" class="text-white font-medium">Dashboard</a>
                    </li>
                    <li class="flex items-center text-white">
                        <i class="fas fa-book mr-2"></i>
                        <a href="ubahkata" class="text-white font-medium">Mengelola Kata</a>
                    </li>
                    <li class="flex items-center text-white">
                        <i class="fas fa-user-edit mr-2"></i>
                        <a href="#" class="text-white font-medium">Mengelola Editor</a>
                    </li>
                    <li class="flex items-center text-white">
                        <i class="fas fa-user-check mr-2"></i>
                        <a href="#" class="text-white font-medium">Verifikasi Editor</a>
                    </li>
                    <li class="flex items-center text-white">
                        <i class="fas fa-history mr-2"></i>
                        <a href="history" class="text-white font-medium">Log History</a>
                    </li>
                    <li class="flex items-center text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Log Out</span>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="w-4/5 p-8 pt-0">
            <div class="bg-purple-900 text-white text-center py-1 px-8 mb-8">
                <h1 class="text-xl">ADMINISTRATOR DASHBOARD</h1>
            </div>
            {{-- Form --}}
            <form class="space-y-6 bg-purple-900 p-6 rounded-md shadow-md">
                <div class="grid gap-6">
                    <div class="flex items-center">
                        <label class="w-1/3 text-white">Kata</label>
                        <input type="text" class="w-full p-2 rounded-lg bg-gray-200 text-black"
                            placeholder="Masukkan Kata" />
                    </div>
                    <div class="flex items-center">
                        <label class="w-1/3 text-white">Kategori</label>
                        <select class="w-full p-2 rounded-lg bg-gray-200 text-black">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <label class="w-1/3 text-white">Pengucapan</label>
                        <input type="text" class="w-full p-2 rounded-lg bg-gray-200 text-black"
                            placeholder="Masukkan Pengucapan" />
                    </div>
                    <div class="flex items-center">
                        <label class="w-1/3 text-white">Arti</label>
                        <input type="text" class="w-full p-2 rounded-lg bg-gray-200 text-black"
                            placeholder="Masukkan Arti" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h1 class="text-white">Upload gambar atau suara</h1>
                    </div>
                    <div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:ring-purple-300"
                            type="file" accept="image/*" />
                    </div>
                    <div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:ring-purple-300"
                            type="file" />
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="submit" class="bg-purple-700 text-white p-2 rounded-lg">
                        Simpan
                    </button>
                    <button type="button" class="bg-purple-700 text-white p-2 rounded-lg">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
