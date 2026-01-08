@extends('layouts.app')

@section('title', 'Kabar Kecamatan - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen pb-20">
    
    <!-- Header Page -->
    <div class="bg-slate-900 text-white pt-24 pb-12 px-4 text-center">
        <h1 class="text-3xl font-bold mb-2">Kabar Kebasen</h1>
        <p class="text-slate-400">Informasi terkini seputar kegiatan dan pembangunan kecamatan.</p>
    </div>

    <div class="max-w-6xl mx-auto px-4 -mt-8">
        
        <!-- Filter Kategori (Hiasan) -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex flex-wrap gap-2 justify-center mb-8">
            <a href="#" class="px-4 py-2 bg-brand-600 text-white rounded-full text-sm font-bold">Semua</a>
            <a href="#" class="px-4 py-2 hover:bg-slate-100 text-slate-600 rounded-full text-sm font-medium transition">Pemerintahan</a>
            <a href="#" class="px-4 py-2 hover:bg-slate-100 text-slate-600 rounded-full text-sm font-medium transition">Layanan</a>
            <a href="#" class="px-4 py-2 hover:bg-slate-100 text-slate-600 rounded-full text-sm font-medium transition">Sosial</a>
            <a href="#" class="px-4 py-2 hover:bg-slate-100 text-slate-600 rounded-full text-sm font-medium transition">Kegiatan</a>
        </div>

        <!-- Grid Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($berita as $item)
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-lg transition group flex flex-col h-full">
                <!-- Gambar -->
                <a href="{{ url('/berita/'.$item->id) }}" class="h-48 bg-slate-200 block relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center text-slate-400 bg-slate-100 group-hover:scale-105 transition duration-500">
                        <i class="fa-regular fa-image text-4xl"></i>
                    </div>
                    <!-- Pastikan kolom 'kategori' ada di database, jika error ganti dengan text manual -->
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-slate-700 uppercase shadow-sm">
                        {{ $item->kategori ?? 'Umum' }}
                    </div>
                </a>
                
                <!-- Konten -->
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                        <!-- PERBAIKAN: Menggunakan operator '??' untuk mencegah error jika kolom tidak ditemukan -->
                        <!-- Urutan cek: created_at -> tanggal -> waktu -> sekarang (default) -->
                        <i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($item->created_at ?? $item->tanggal ?? $item->waktu ?? now())->format('d M Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 leading-tight group-hover:text-brand-600 transition">
                        <a href="{{ url('/berita/'.$item->id) }}">{{ $item->judul }}</a>
                    </h3>
                    <p class="text-slate-500 text-sm line-clamp-3 mb-4 flex-grow">
                        {{ $item->isi }}
                    </p>
                    <a href="{{ url('/berita/'.$item->id) }}" class="text-brand-600 font-bold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all mt-auto">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination Dummy -->
        <div class="mt-12 flex justify-center gap-2">
            <button class="w-10 h-10 rounded-full border border-slate-200 text-slate-400 hover:bg-slate-50"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="w-10 h-10 rounded-full bg-brand-600 text-white font-bold shadow-lg shadow-brand-200">1</button>
            <button class="w-10 h-10 rounded-full border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold">2</button>
            <button class="w-10 h-10 rounded-full border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold">3</button>
            <button class="w-10 h-10 rounded-full border border-slate-200 text-slate-600 hover:bg-slate-50"><i class="fa-solid fa-chevron-right"></i></button>
        </div>

    </div>
</div>
@endsection