<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    <div>
        <aside id="logo-sidebar"
            class="fixed z-40 w-1/6 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gradient-to-b from-purple-900 to-black">
                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jhon Doe">
                    <div>
                        <h1 class="text-lg font-semibold">{{ $user->name }}</h1>
                    </div>
                </div>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('daftarKata') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Kata</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aturEditor') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Daftar Editor</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Log History</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="flex w-screen">
            <div class="w-1/6">
            </div>
            <div class="w-5/6">
                @yield('konten_admin')
            </div>
        </div>
        
    </div>

    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>

</body>

</html>
