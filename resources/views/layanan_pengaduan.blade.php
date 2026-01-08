@extends('layouts.app')

@section('title', 'Pengaduan - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4">
        
        <a href="{{ url('/layanan') }}" class="text-slate-500 hover:text-blue-600 text-sm font-bold mb-6 inline-flex items-center transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Menu Layanan
        </a>

        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            
            <div class="bg-red-600 p-6 text-center text-white">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 backdrop-blur-md">
                    <i class="fa-solid fa-bullhorn text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">Layanan Pengaduan</h1>
                <p class="text-red-100 text-sm mt-1">Sampaikan kritik, saran, atau laporan Anda.</p>
            </div>

            @if ($errors->any())
            <div class="mx-6 mt-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-6">
                @csrf 
                <input type="hidden" name="jenis_layanan" value="Pengaduan Warga">

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-red-600 text-white rounded-full flex items-center justify-center text-xs mr-2">1</span>
                        Data Pelapor (Rahasia)
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Anda</label>
                            <input type="text" name="nama_pemohon" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">NIK (Untuk Validasi)</label>
                            <input type="number" name="nik" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">No. WhatsApp</label>
                            <input type="number" name="no_hp" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-red-500" required>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-red-600 text-white rounded-full flex items-center justify-center text-xs mr-2">2</span>
                        Isi Laporan
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Detail Pengaduan</label>
                            <textarea name="keterangan" rows="5" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-red-500" placeholder="Jelaskan lokasi, waktu, dan detail masalah..." required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Bukti Foto (Opsional)</label>
                            <input type="file" name="file_bukti" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-red-600 file:text-white hover:file:bg-red-700 cursor-pointer border border-slate-300 rounded-lg bg-white">
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 mt-4">
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2 text-lg">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
        <div class="h-24"></div> 
    </div>
</div>
@endsection