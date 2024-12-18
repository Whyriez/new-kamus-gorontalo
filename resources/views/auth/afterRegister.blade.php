<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Registrasi Berhasil</title>
</head>

<body class="bg-gradient-to-b from-purple-700 to-purple-900">

    <div class="flex items-center justify-center min-h-screen text-gray-50">
        <div class="flex flex-col items-center bg-white rounded-lg shadow-lg p-8 max-w-lg text-center dark:bg-gray-800">
            <!-- Pesan Registrasi -->
            <h1 class="text-2xl font-bold mb-2 text-purple-700 dark:text-purple-400">Registrasi Berhasil!</h1>
            <p class="mb-4 text-gray-700 dark:text-gray-300">
                Terima kasih telah mendaftar. Akun Anda sedang menunggu konfirmasi dari admin. Harap cek email atau kembali nanti.
            </p>

            <!-- Tombol Kembali -->
            <div class="flex flex-col items-center">
                <a href="{{ route('welcome') }}" 
                   class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-md shadow-md font-semibold transition duration-300">
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])

</body>

</html>
