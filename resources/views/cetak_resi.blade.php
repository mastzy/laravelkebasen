<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran - {{ $data->kode_tiket }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Courier New', Courier, monospace; background: #e2e8f0; }
        .ticket {
            background: white;
            width: 380px;
            margin: 40px auto;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: relative;
            border-top: 5px solid #2563eb;
        }
        /* Efek Gerigi Kertas Struk */
        .ticket::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            height: 10px;
            width: 100%;
            background: linear-gradient(135deg, transparent 5px, white 5px), linear-gradient(225deg, transparent 5px, white 5px);
            background-size: 10px 10px;
            background-repeat: repeat-x;
        }
        
        /* Pengaturan saat di-Print (Ctrl+P) */
        @media print {
            body { background: white; -webkit-print-color-adjust: exact; }
            .no-print { display: none; }
            .ticket { box-shadow: none; margin: 0; width: 100%; border: none; }
        }
    </style>
</head>
<body>

    <div class="ticket">
        
        <div class="text-center border-b-2 border-dashed border-gray-300 pb-4 mb-4">
            <div class="flex justify-center mb-2">
                <i class="fa-solid fa-landmark text-4xl text-blue-600"></i>
            </div>
            <h2 class="font-bold text-xl uppercase">Kecamatan Kebasen</h2>
            <p class="text-xs text-gray-500">Jl. Raya Kebasen No. 123, Banyumas</p>
            <p class="text-xs text-gray-500">Telp: 0812-3456-7890</p>
        </div>

        <div class="text-center mb-6">
            <p class="text-sm font-bold text-gray-400">BUKTI PENDAFTARAN</p>
            <h1 class="text-3xl font-bold text-gray-800 tracking-widest my-1">{{ $data->kode_tiket }}</h1>
            <p class="text-xs text-gray-500">{{ $data->created_at->format('d M Y, H:i') }} WIB</p>
        </div>

        <div class="text-sm space-y-3 mb-6">
            <div class="flex justify-between">
                <span class="text-gray-500">Layanan:</span>
                <span class="font-bold text-right max-w-[200px]">{{ $data->jenis_layanan }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Pemohon:</span>
                <span class="font-bold">{{ $data->nama_pemohon }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">NIK:</span>
                <span class="font-bold">{{ $data->nik }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Status:</span>
                <span class="font-bold bg-gray-200 px-2 rounded">{{ $data->status }}</span>
            </div>
        </div>

        <div class="bg-blue-50 p-3 rounded text-xs text-blue-800 text-center mb-6 border border-blue-100">
            Simpan bukti ini. Tunjukkan kepada petugas loket saat mengambil dokumen atau verifikasi berkas.
        </div>

        <div class="text-center pt-4 border-t-2 border-dashed border-gray-300">
            <div class="font-bold text-2xl font-sans tracking-widest text-slate-700">*{{ $data->kode_tiket }}*</div>
            <p class="text-[10px] text-gray-400 mt-1">Terima kasih telah menggunakan layanan online.</p>
        </div>

        <div class="no-print mt-8 space-y-2">
            <button onclick="window.print()" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg">
                <i class="fa-solid fa-print mr-2"></i> Cetak Bukti / Simpan PDF
            </button>
            <a href="{{ route('status') }}" class="block w-full text-center bg-gray-200 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-300 transition">
                Kembali ke Cek Status
            </a>
        </div>

    </div>

</body>
</html>