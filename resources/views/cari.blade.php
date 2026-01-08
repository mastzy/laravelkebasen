@extends('layouts.app')

@section('title', 'Hasil Pencarian - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4">

        <!-- Form Pencarian Ulang -->
        <div class="mb-8">
            <form action="{{ url('/cari') }}" method="GET" class="relative group">
                <input type="text" name="q" value="{{ $keyword }}" class="w-full p-4 pl-12 rounded-xl border border-slate-200 shadow-sm focus:ring-2 focus:ring-brand-500 outline-none transition" placeholder="Cari layanan atau berita lain...">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-4.5 text-slate-400 group-focus-within:text-brand-500"></i>
                <button type="submit" class="absolute right-2 top-2 bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-brand-700 transition">Cari</button>
            </form>
        </div>

        <!-- Hasil Pencarian -->
        @if($keyword)
            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Menampilkan hasil untuk "<span class="text-brand-600">{{ $keyword }}</span>"
            </h2>

            @if($hasilLayanan->isEmpty() && $hasilBerita->isEmpty())
                <!-- Jika Tidak Ditemukan -->
                <div class="bg-white p-12 rounded-2xl border border-slate-200 text-center shadow-sm">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-face-frown-open text-4xl text-slate-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Oops, tidak ditemukan!</h3>
                    <p class="text-slate-500 mt-2">Coba gunakan kata kunci lain seperti "KTP", "KK", atau "Jadwal".</p>
                </div>
            @else
                
                <!-- 1. Hasil Layanan -->
                @if(!$hasilLayanan->isEmpty())
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 border-b pb-2">Layanan & Menu</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($hasilLayanan as $layanan)
                        <a href="{{ url($layanan['url']) }}" class="flex items-center gap-4 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:shadow-md hover:border-brand-500 transition group">
                            <div class="w-12 h-12 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition">
                                <i class="fa-solid {{ $layanan['icon'] }} text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 group-hover:text-brand-600">{{ $layanan['nama'] }}</h4>
                                <p class="text-xs text-slate-500">{{ $layanan['desc'] }}</p>
                            </div>
                            <i class="fa-solid fa-chevron-right ml-auto text-slate-300 group-hover:text-brand-500"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- 2. Hasil Berita -->
                @if(!$hasilBerita->isEmpty())
                <div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 border-b pb-2">Berita & Informasi</h3>
                    <div class="space-y-4">
                        @foreach($hasilBerita as $berita)
                        <a href="{{ url('/berita/'.$berita->id) }}" class="block bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:shadow-md transition">
                            <h4 class="font-bold text-slate-900 hover:text-brand-600 mb-1">{{ $berita->judul }}</h4>
                            <p class="text-sm text-slate-500 line-clamp-2">{{ $berita->isi }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            @endif

        @else
            <!-- Jika Masuk Halaman Cari Tanpa Keyword -->
            <div class="text-center py-20">
                <i class="fa-solid fa-magnifying-glass text-6xl text-slate-200 mb-4"></i>
                <p class="text-slate-500">Silakan ketik kata kunci di atas untuk mencari layanan.</p>
            </div>
        @endif

    </div>
</div>
@endsection