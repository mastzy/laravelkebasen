@extends('layouts.app')

@section('title', 'Akta Kelahiran - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4">
        
        <a href="{{ url('/layanan') }}" class="text-slate-500 hover:text-blue-600 text-sm font-bold mb-6 inline-flex items-center transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Menu Layanan
        </a>

        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            
            <div class="bg-pink-500 p-6 text-center text-white">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 backdrop-blur-md">
                    <i class="fa-solid fa-baby text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold">Akta Kelahiran</h1>
                <p class="text-pink-100 text-sm mt-1">Pencatatan Sipil Kelahiran Baru.</p>
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
                <input type="hidden" name="jenis_layanan" value="Akta Kelahiran">

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-pink-500 text-white rounded-full flex items-center justify-center text-xs mr-2">1</span>
                        Data Pelapor (Ayah/Ibu)
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Pelapor</label>
                            <input type="text" name="nama_pemohon" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-pink-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">NIK Pelapor</label>
                            <input type="number" name="nik" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-pink-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">No. WhatsApp</label>
                            <input type="number" name="no_hp" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-pink-500" required>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                    <h3 class="text-slate-800 font-bold mb-4 flex items-center">
                        <span class="w-6 h-6 bg-pink-500 text-white rounded-full flex items-center justify-center text-xs mr-2">2</span>
                        Data Anak
                    </h3>
                    
                    <label class="block text-sm font-bold text-slate-700 mb-2">Detail Anak & Kelahiran</label>
                    <textarea name="keterangan" rows="5" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:ring-2 focus:ring-pink-500" placeholder="Contoh: 
Nama Anak: Bagas
Tgl Lahir: 10/12/2025
Jenis Kelamin: Laki-laki
Nama Ibu: Siti" required></textarea>
                </div>

                <div class="pt-6 border-t border-slate-100 mt-4">
                    <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2 text-lg">
                        <i class="fa-solid fa-paper-plane"></i> Buat Akta
                    </button>
                </div>
            </form>
        </div>
        <div class="h-24"></div> 
    </div>
</div>
@endsection