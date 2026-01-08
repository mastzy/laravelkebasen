@extends('layouts.app')

@section('title', $artikel->judul . ' - Portal Kebasen')

@section('content')
<div class="bg-white min-h-screen pb-20 pt-24">
    
    <!-- Breadcrumb -->
    <div class="max-w-4xl mx-auto px-4 mb-6">
        <div class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ url('/') }}" class="hover:text-brand-600">Beranda</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <a href="{{ url('/berita') }}" class="hover:text-brand-600">Berita</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-slate-900 font-medium truncate max-w-[200px]">{{ $artikel->judul }}</span>
        </div>
    </div>

    <article class="max-w-4xl mx-auto px-4">
        
        <!-- Header Artikel -->
        <div class="mb-8">
            <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">
                {{ $artikel->kategori }}
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                {{ $artikel->judul }}
            </h1>
            
            <div class="flex items-center gap-4 border-b border-slate-100 pb-8">
                <div class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center text-slate-400">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div>
                    <div class="font-bold text-slate-900 text-sm">{{ $artikel->penulis }}</div>
                    <div class="text-slate-500 text-xs">{{ \Carbon\Carbon::parse($artikel->tanggal)->isoFormat('dddd, D MMMM Y') }}</div>
                </div>
                <div class="ml-auto flex gap-2">
                    <button class="w-8 h-8 rounded-full bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 transition flex items-center justify-center"><i class="fa-brands fa-facebook-f"></i></button>
                    <button class="w-8 h-8 rounded-full bg-slate-50 text-slate-400 hover:bg-green-50 hover:text-green-600 transition flex items-center justify-center"><i class="fa-brands fa-whatsapp"></i></button>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="w-full h-[300px] md:h-[400px] bg-slate-100 rounded-2xl overflow-hidden mb-10 flex items-center justify-center text-slate-300">
            <i class="fa-regular fa-image text-6xl"></i>
        </div>

        <!-- Isi Artikel (Typography) -->
        <div class="prose prose-lg prose-slate max-w-none text-slate-700 leading-relaxed">
            <p class="mb-4">
                <strong>KEBASEN</strong> - {{ $artikel->isi }}
            </p>
            <p class="mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <blockquote class="border-l-4 border-brand-500 pl-4 italic my-6 text-slate-800 bg-slate-50 py-2 pr-2 rounded-r">
                "Digitalisasi layanan desa adalah prioritas kami untuk memberikan pelayanan prima kepada masyarakat Kebasen."
            </blockquote>
            <p class="mb-4">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h3 class="text-xl font-bold text-slate-900 mt-8 mb-4">Langkah Selanjutnya</h3>
            <p>
                Masyarakat diharapkan dapat berpartisipasi aktif dalam setiap program yang dicanangkan. Untuk informasi lebih lanjut, silakan hubungi perangkat desa setempat atau melalui layanan pengaduan di website ini.
            </p>
        </div>

        <!-- Navigasi Prev/Next -->
        <div class="grid grid-cols-2 gap-4 mt-12 pt-8 border-t border-slate-200">
            <a href="#" class="group text-left">
                <div class="text-xs text-slate-400 mb-1">Sebelumnya</div>
                <div class="font-bold text-slate-800 group-hover:text-brand-600 transition line-clamp-1">Kegiatan Posyandu Lansia</div>
            </a>
            <a href="#" class="group text-right">
                <div class="text-xs text-slate-400 mb-1">Selanjutnya</div>
                <div class="font-bold text-slate-800 group-hover:text-brand-600 transition line-clamp-1">Jadwal Ronda Malam</div>
            </a>
        </div>

    </article>
</div>
@endsection