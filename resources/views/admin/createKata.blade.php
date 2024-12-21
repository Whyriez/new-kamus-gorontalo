@extends('layout.appAdmin')
@section('konten_admin')
@section('title', 'Tambah Kata')
@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        {{ session('success') }}
    </div>
@endif

<div class="p-1">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-2xl font-bold mb-2">Penambahan Kata</h1>
        <form action="{{ route('simpanKata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rounded-md p-4">
                <div class="flex justify-between">
                    <div class="mb-2 w-full">
                        <label for="kata" class="block text-zinc-600 text-sm font-bold mb-2">Gorontalo<span
                                class="text-red-500">*</span></label>
                        <input required type="text" id="kata" name="gorontalo" placeholder="Gorontalo"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="mb-2 w-full ml-2">
                        <label for="arti" class="block text-zinc-600 text-sm font-bold mb-2">Bahasa<span
                                class="text-red-500">*</span></label>
                        <input required type="text" id="arti" name="indonesia" placeholder="Bahasa"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="kategori" class="block text-zinc-600 text-sm font-bold mb-2">Kategori<span
                            class="text-red-500">*</span></label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>- Pilih kategori kata -</option>
                        <option value="Nomina">Nomina</option>
                        <option value="Verba">Verba</option>
                        <option value="Adjektiv">Adjektiv</option>
                        <option value="Adverbia">Adverbia</option>
                        <option value="Pronomina">Pronomina</option>
                        <option value="Numeralia">Numeralia</option>
                        <option value="Preposisi">Preposisi</option>
                        <option value="Konjungsi">Konjungsi</option>
                        <option value="Interjeksi">Interjeksi</option>
                        <option value="Artikula">Artikula</option>
                    </select>
                </div>

                <div class="mt-4">
                    <label for="pengucapan" class="block text-zinc-600 text-sm font-bold my-2">Pengucapan<span
                            class="text-red-500">*</span></label>
                    <input required type="text" id="pengucapan" name="pengucapan" placeholder="Contoh : Hu.lon.ta.lo"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                <div class="mt-4">
                    <label class="block text-zinc-600 text-sm font-bold my-2">File</label>
                    <input type="file" name="gambar"
                        class="bg-white hover:bg-gray-100 font-semibold border border-gray-400 rounded shadow">
                    <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 mx-2">Gambar</i>
                </div>

                <div class="mt-4">
                    <input type="file" name="audio"
                        class="bg-white hover:bg-gray-100 font-semibold border border-gray-400 rounded shadow"
                        accept=".mp3,.wav">
                    <i class="fas fa-upload text-zinc-600 text-sm font-bold my-2 mx-2">Suara</i>
                </div>


                {{-- Prepare Rekam Suara --}}
                {{-- <div class="mt-4">
                    <label class="block text-zinc-600 text-sm font-bold my-2">Rekam Suara:</label>
                    <div class="flex items-center gap-3">
                        <button type="button" id="record-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Mulai Merekam
                        </button>
                        <button type="button" id="stop-btn" class="px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400" disabled>
                            Stop Rekaman
                        </button>
                    </div>
                    <audio id="audio-preview" controls class="mt-3" style="display:none;"></audio>
                </div> --}}

                <div class="mt-4">
                    <label for="kalimat" class="block text-zinc-600 text-sm font-bold my-2">Contoh Kalimat</label>
                    <input type="text" id="kalimat" name="kalimat"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                <div class="flex w-full mt-4">
                    <button type="submit"
                        class="justify-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Prepare Rekam Suara --}}
{{-- <script>
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob;
    let audioUrl;
    let audioPreview = document.getElementById('audio-preview'); // untuk preview audio
    let recordBtn = document.getElementById('record-btn');
    let stopBtn = document.getElementById('stop-btn');
    let form = document.querySelector('form');

    // Fungsi untuk memulai perekaman suara
    function startRecording() {
        audioChunks = []; // Kosongkan array audio
        audioPreview.style.display = 'none'; // Sembunyikan preview audio sebelumnya

        navigator.mediaDevices.getUserMedia({
                audio: true
            })
            .then(stream => {
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = event => {
                    audioChunks.push(event.data); // Menyimpan potongan audio
                };

                mediaRecorder.onstop = () => {
                    audioBlob = new Blob(audioChunks, {
                        type: 'audio/wav'
                    });
                    audioUrl = URL.createObjectURL(audioBlob);
                    audioPreview.style.display = 'block';
                    audioPreview.src = audioUrl;

                    // Membuat FormData untuk mengirimkan file audio
                    let formData = new FormData(form);
                    const audioFile = new File([audioBlob], 'audio.wav', {
                        type: 'audio/wav'
                    });
                    formData.append('audio', audioFile);

                    // Menambahkan CSRF token
                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                    // Mengirim FormData dengan AJAX
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', form.action, true);

                    // Menambahkan CSRF token secara eksplisit di header
                    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')
                        .content);

                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            console.log('Audio berhasil dikirim');
                        } else {
                            console.error('Terjadi kesalahan:', xhr.statusText);
                        }
                    };
                    xhr.send(formData); // Kirim data ke server
                };

                mediaRecorder.start();
                recordBtn.disabled = true; // Nonaktifkan tombol rekam
                stopBtn.disabled = false; // Aktifkan tombol stop
            })
            .catch(error => {
                console.error("Gagal mengakses mikrofon:", error);
            });
    }

    // Fungsi untuk menghentikan rekaman
    function stopRecording() {
        mediaRecorder.stop();
        recordBtn.disabled = false; // Aktifkan tombol rekam lagi
        stopBtn.disabled = true; // Nonaktifkan tombol stop
    }

    // Event listener untuk tombol rekam
    recordBtn.addEventListener('click', startRecording);

    // Event listener untuk tombol stop
    stopBtn.addEventListener('click', stopRecording);
</script> --}}

@endsection
