<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pengajuan - Portal Kebasen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 p-4 md:p-10 font-sans min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-6 md:p-8 border border-gray-100">
        
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-magnifying-glass-location text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Lacak Pengajuan</h2>
            <p class="text-slate-500 text-sm mt-1">Masukkan kode tiket untuk memantau progress.</p>
        </div>

        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl relative text-center">
            <strong class="font-bold block text-lg mb-1"><i class="fa-solid fa-circle-check"></i> Berhasil!</strong>
            <span class="block text-sm mb-2">{{ session('success') }}</span>
            
            @if(session('kode_tiket'))
                <div class="bg-white border-2 border-dashed border-green-300 p-2 rounded font-mono text-xl font-bold tracking-widest text-slate-700">
                    {{ session('kode_tiket') }}
                </div>
                <p class="text-xs text-green-600 mt-2">Simpan Kode Tiket di atas!</p>
            @endif
        </div>
        @endif
        
        <form action="{{ route('status.cari') }}" method="GET" class="mb-8">
            <label class="block mb-2 text-sm font-bold text-slate-700 ml-1">Kode Tiket / Resi</label>
            <div class="flex gap-2">
                <input type="text" name="kode" value="{{ $kode ?? '' }}" placeholder="Contoh: KTP-8291" 
                       class="w-full border-2 border-slate-200 p-3 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition uppercase font-bold text-slate-700 placeholder:normal-case placeholder:font-normal" required>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 font-bold shadow-md transition transform hover:scale-105">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </form>

        <hr class="border-slate-100 my-6">

        @if(isset($kode) && $kode != "")
            @if($hasil)
                <div class="bg-slate-50 border border-slate-200 p-5 rounded-xl">
                    <div class="flex items-center justify-between mb-4 border-b border-slate-200 pb-3">
                        <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                            <i class="fa-solid fa-file-circle-check text-green-500"></i> Detail Data
                        </h3>
                        <span class="text-xs text-slate-400 font-mono">{{ $hasil->created_at->format('d M Y') }}</span>
                    </div>
                    
                    <ul class="space-y-3 text-sm text-slate-700">
                        <li class="flex justify-between">
                            <span class="text-slate-500">Nama Pemohon</span>
                            <span class="font-bold text-slate-800 text-right">{{ $hasil->nama_pemohon }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-slate-500">Jenis Layanan</span>
                            <span class="font-bold text-slate-800 text-right">{{ $hasil->jenis_layanan }}</span>
                        </li>
                        <li class="flex justify-between items-center pt-2">
                            <span class="text-slate-500">Status Terkini</span>
                            <span class="px-3 py-1 rounded-full text-white text-xs font-bold uppercase tracking-wider shadow-sm
                                {{ $hasil->status == 'Selesai' ? 'bg-green-500' : ($hasil->status == 'Ditolak' ? 'bg-red-500' : ($hasil->status == 'Diproses' ? 'bg-blue-500' : 'bg-yellow-500')) }}">
                                {{ $hasil->status }}
                            </span>
                        </li>
                        
                        @if($hasil->keterangan_tambahan)
                            <li class="bg-white p-3 rounded border border-slate-200 mt-2 text-xs">
                                <span class="block text-slate-400 font-bold mb-1">Catatan:</span>
                                <span class="italic text-slate-600">"{{ $hasil->keterangan_tambahan }}"</span>
                            </li>
                        @endif
                    </ul>

                    <div class="mt-6 pt-4 border-t border-slate-200">
                        <a href="{{ route('pengajuan.cetak', $hasil->kode_tiket) }}" target="_blank" 
                           class="block w-full text-center bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-xl shadow transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-print"></i> Cetak Bukti Pendaftaran
                        </a>
                    </div>
                </div>

            @else
                <div class="bg-red-50 border border-red-200 p-6 rounded-xl text-center">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3 text-red-500">
                        <i class="fa-solid fa-circle-xmark text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-red-700 text-lg">Data Tidak Ditemukan</h3>
                    <p class="text-sm text-red-600 mt-1">Kode <strong>{{ $kode }}</strong> tidak terdaftar di sistem kami.</p>
                    <p class="text-xs text-slate-500 mt-3">Mohon periksa kembali huruf besar/kecil kode Anda.</p>
                </div>
            @endif
        @endif
        
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-slate-400 text-sm hover:text-blue-600 transition font-medium inline-flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>

</body>
</html>