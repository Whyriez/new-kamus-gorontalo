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
    
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gradient-to-b from-purple-900 to-black">
    <div class="flex items-center gap-3">
            <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jhon Doe">
            <div>
                <h1 class="text-lg font-semibold">Jhon Doe</h1>
            </div>
    </div>
      <ul class="space-y-2 font-medium">
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Mengelola Kata</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Mengelola Editor</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Log History</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <h1 class="text-2xl font-bold text-center mb-5">Tambahkan Kata Baru</h1>
            <div class="bg-purple-500 rounded-md p-4">
                <div class="mb-2">
                    <label for="kata" class="block text-white text-sm font-bold mb-2">Gorontalo</label>
                    <input type="text" id="kata" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-2">
                    <label for="arti" class="block text-white text-sm font-bold mb-2">Indonesia</label>
                    <input type="text" id="arti" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
            <div class="mb-2">
                <label for="kategori" class="block text-white text-sm font-bold mb-2">Kategori</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="File" class="block text-white text-sm font-bold mb-2">Pengucapan</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class=" mt-4">
            <label  class="block text-white text-sm font-bold mb-2">File</label>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Gambar <i class="fas fa-upload"></i></button>
                <button class="bg-white hover:bg-gray-100 text-gray-8 00 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Audio <i class="fas fa-upload"></i></button>
            </div>
            <div class="mb-2 mt-4">
                <label for="deskripsi" class="block text-white text-sm font-bold mb-2">Deskripsi</label>
                <textarea id="deskripsi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="4" placeholder="Tambahkan deskripsi..."></textarea>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div> 
    </div>
</div>
 
</body>

</html>


<!-- <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-2xl font-bold text-center mb-5">Tambahkan Kata Baru</h1>
            <div class="bg-purple-500 rounded-md p-4">
                <div class="mb-2">
                    <label for="kata" class="block text-white text-sm font-bold mb-2">Gorontalo</label>
                    <input type="text" id="kata" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-2">
                    <label for="arti" class="block text-white text-sm font-bold mb-2">Indonesia</label>
                    <input type="text" id="arti" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
            <div class="mb-2">
                <label for="kategori" class="block text-white text-sm font-bold mb-2">Kategori</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="File" class="block text-white text-sm font-bold mb-2">Pengucapan</label>
                <select id="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>- Pilih kategori kata -</option>
                        <option>Nomina</option>
                        <option>Verba</option>
                        <option>Adjektiv</option>
                        <option>Adverbia</option>
                        <option>Pronomina</option>
                        <option>Numeralia</option>
                        <option>Preposisi</option>
                        <option>Konjungsi</option>
                        <option>Interjeksi</option>
                        <option>Artikula</option>
                </select>
            </div>
            <div class=" mt-4">
            <label  class="block text-white text-sm font-bold mb-2">File</label>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Gambar <i class="fas fa-upload"></i></button>
                <button class="bg-white hover:bg-gray-100 text-gray-8 00 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Upload Audio <i class="fas fa-upload"></i></button>
            </div>
            <div class="mb-2 mt-4">
                <label for="deskripsi" class="block text-white text-sm font-bold mb-2">Deskripsi</label>
                <textarea id="deskripsi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="4" placeholder="Tambahkan deskripsi..."></textarea>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div> 
    </div>
</div> -->
