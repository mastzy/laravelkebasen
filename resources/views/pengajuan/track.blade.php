<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Pengajuan - {{ $data->kode_tiket }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-50 font-sans">

    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
        <div class="text-center border-b pb-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Status Pengajuan</h1>
            <p class="text-gray-500 mt-1">Kode Tiket: <span class="font-mono font-bold text-blue-600 text-lg">{{ $data->kode_tiket }}</span></p>
            <p class="text-sm text-gray-400 mt-2">Halaman ini akan terupdate otomatis.</p>
        </div>

        <div class="relative flex items-center justify-between mb-8 px-4">
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10"></div>
            
            <div id="step-terkirim" class="step-item flex flex-col items-center bg-white p-2">
                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-blue-500 text-white font-bold transition-all duration-300 ring-4 ring-white">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <span class="mt-2 text-xs font-semibold text-blue-600">Terkirim</span>
            </div>

            <div id="step-diproses" class="step-item flex flex-col items-center bg-white p-2">
                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold transition-all duration-300 ring-4 ring-white">
                    <i class="fas fa-cog"></i>
                </div>
                <span class="mt-2 text-xs font-semibold text-gray-500">Diproses</span>
            </div>

            <div id="step-selesai" class="step-item flex flex-col items-center bg-white p-2">
                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold transition-all duration-300 ring-4 ring-white">
                    <i class="fas fa-check"></i>
                </div>
                <span class="mt-2 text-xs font-semibold text-gray-500">Selesai</span>
            </div>
        </div>

        <div id="status-alert" class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded transition-all duration-500">
            <p class="font-bold">Status Saat Ini: <span id="current-status-text" class="uppercase">{{ $data->status }}</span></p>
            <p class="text-sm mt-1">Terakhir diupdate: <span id="last-updated">{{ $data->updated_at->diffForHumans() }}</span></p>
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="text-gray-500 hover:text-gray-700 text-sm underline">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        const kodeTiket = "{{ $data->kode_tiket }}";
        const apiUrl = "{{ route('api.checkStatus', ':kode_tiket') }}".replace(':kode_tiket', kodeTiket);

        // Fungsi untuk update tampilan berdasarkan status
        function updateUI(status, timeAgo) {
            // Reset semua step ke abu-abu dulu
            const steps = ['terkirim', 'diproses', 'selesai'];
            const icons = {
                'terkirim': 'bg-blue-500', 
                'diproses': 'bg-yellow-500', 
                'selesai': 'bg-green-500',
                'ditolak': 'bg-red-500'
            };

            // Update Text
            document.getElementById('current-status-text').innerText = status;
            document.getElementById('last-updated').innerText = timeAgo;
            
            // Logika Pewarnaan Stepper
            const stepTerkirim = document.querySelector('#step-terkirim div');
            const stepDiproses = document.querySelector('#step-diproses div');
            const stepSelesai = document.querySelector('#step-selesai div');
            const alertBox = document.getElementById('status-alert');

            // Reset Default
            [stepTerkirim, stepDiproses, stepSelesai].forEach(el => {
                el.className = "w-10 h-10 rounded-full flex items-center justify-center bg-gray-300 text-white font-bold transition-all duration-300 ring-4 ring-white";
            });

            // Logic Pewarnaan Bertingkat
            if (status === 'terkirim') {
                stepTerkirim.classList.remove('bg-gray-300'); stepTerkirim.classList.add('bg-blue-500');
                alertBox.className = "bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded";
            } 
            else if (status === 'diproses') {
                stepTerkirim.classList.remove('bg-gray-300'); stepTerkirim.classList.add('bg-blue-500');
                stepDiproses.classList.remove('bg-gray-300'); stepDiproses.classList.add('bg-yellow-500');
                alertBox.className = "bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded";
            } 
            else if (status === 'selesai') {
                stepTerkirim.classList.remove('bg-gray-300'); stepTerkirim.classList.add('bg-blue-500');
                stepDiproses.classList.remove('bg-gray-300'); stepDiproses.classList.add('bg-blue-500');
                stepSelesai.classList.remove('bg-gray-300'); stepSelesai.classList.add('bg-green-500');
                // Ganti icon step terakhir jadi check
                stepSelesai.innerHTML = '<i class="fas fa-check"></i>';
                alertBox.className = "bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded";
            }
            else if (status === 'ditolak') {
                stepTerkirim.classList.remove('bg-gray-300'); stepTerkirim.classList.add('bg-blue-500');
                stepDiproses.classList.remove('bg-gray-300'); stepDiproses.classList.add('bg-blue-500');
                stepSelesai.classList.remove('bg-gray-300'); stepSelesai.classList.add('bg-red-500');
                // Ganti icon step terakhir jadi silang
                stepSelesai.innerHTML = '<i class="fas fa-times"></i>';
                alertBox.className = "bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded";
            }
        }

        // Fungsi Polling (Cek setiap 3 detik)
        function checkStatus() {
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    console.log("Status update:", data.status); // Untuk debugging
                    updateUI(data.status, data.updated_at);
                    
                    // Jika status sudah final (selesai/ditolak), hentikan polling agar hemat resource
                    if(data.status === 'selesai' || data.status === 'ditolak') {
                        clearInterval(pollingInterval);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Jalankan checkStatus setiap 3000ms (3 detik)
        const pollingInterval = setInterval(checkStatus, 3000);
        
        // Jalankan sekali saat load pertama
        checkStatus(); 

    </script>
</body>
</html>