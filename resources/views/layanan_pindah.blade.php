@extends('layouts.app')

@section('title', 'Surat Pindah - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4">
        
        <a href="{{ url('/layanan') }}" class="text-slate-500 hover:text-blue-600 text-sm font-bold mb-6 inline-flex items-center transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Menu Layanan
        </a>

        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            
            <div class="bg-indigo-600 p-6 text-center text-white">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 backdrop-blur-md">
                    <i class="fa-solid fa-truck-moving text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">Surat Pindah (SKPWNI)</h1>
                <p class="text-indigo-100 text-sm mt-1">Surat Keterangan Pindah Warga Negara Indonesia.</p>
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

            <form action="{{ route('pengajuan.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
                @csrf 
                <input type="hidden" name="jenis_layanan" value="Surat Pindah">

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-indigo-600 text-white rounded-full flex items-center justify-center text-xs mr-2">1</span>
                        Identitas Pemohon
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_pemohon" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">NIK</label>
                            <input type="number" name="nik" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">No. WhatsApp</label>
                            <input type="number" name="no_hp" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-indigo-600 text-white rounded-full flex items-center justify-center text-xs mr-2">2</span>
                        Detail Kepindahan
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="bg-yellow-50 border border-yellow-200 p-3 rounded text-sm text-yellow-800 flex items-start gap-2">
                            <i class="fa-solid fa-info-circle mt-1"></i>
                            <p>Tuliskan alamat lengkap tujuan pindah (Jalan, RT/RW, Desa, Kec, Kab, Prov) di kolom bawah ini.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Tujuan Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="keterangan" rows="4" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Jl. Merdeka No 10, RT 01 RW 02..." required></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 mt-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2 text-lg">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Permohonan
                    </button>
                </div>
            </form>
        </div>
        <div class="h-24"></div> 
    </div>
</div>
@endsection