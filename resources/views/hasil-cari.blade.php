@extends('layouts.app')
@section('title', 'Hasil Pencarian')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <div class="mb-8">
        <a href="{{ url('/') }}" class="text-sm text-slate-400 hover:text-brand-600"><i class="fa-solid fa-arrow-left mr-1"></i> Kembali</a>
        <h2 class="text-2xl font-bold text-slate-900 mt-2">Hasil Pencarian: "<span class="text-brand-600">{{ $keyword }}</span>"</h2>
    </div>

    @if($berita->isEmpty() && $jadwal->isEmpty())
        <div class="text-center py-16 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-regular fa-face-frown-open text-4xl text-slate-400"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">Oops, tidak ditemukan!</h3>
            <p class="text-slate-500 text-sm mt-1">Coba kata kunci lain seperti "KTP", "Samsat", atau "Desa".</p>
        </div>
    @else
        <div class="space-y-6">
            <!-- Hasil Jadwal -->
            @if(!$jadwal->isEmpty())
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider border-b pb-2">Jadwal Terkait</h3>
                @foreach($jadwal as $j)
                <div class="bg-white p-5 rounded-xl border border-slate-100 shadow-sm hover:border-amber-200 transition flex gap-4 items-start">
                    <div class="bg-amber-50 text-amber-600 p-3 rounded-lg">
                        <i class="fa-solid fa-calendar-check text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-lg">{{ $j->kegiatan }}</h4>
                        <p class="text-sm text-slate-600 mt-1">
                            <i class="fa-regular fa-clock mr-1 text-slate-400"></i> Setiap {{ $j->hari }}, {{ $j->jam }} WIB
                        </p>
                        <p class="text-sm text-slate-600">
                            <i class="fa-solid fa-location-dot mr-1 text-slate-400"></i> {{ $j->lokasi }}
                        </p>
                    </div>
                </div>
                @endforeach
            @endif

            <!-- Hasil Berita -->
            @if(!$berita->isEmpty())
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider border-b pb-2 mt-8">Berita & Informasi</h3>
                @foreach($berita as $b)
                <div class="bg-white p-5 rounded-xl border border-slate-100 shadow-sm hover:border-blue-200 transition group">
                    <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded uppercase mb-2 inline-block">{{ $b->kategori }}</span>
                    <h4 class="font-bold text-slate-900 text-lg group-hover:text-blue-600 transition">{{ $b->judul }}</h4>
                    <p class="text-sm text-slate-500 mt-2 line-clamp-2">{{ $b->isi }}</p>
                    <div class="mt-3 text-xs text-slate-400">
                        {{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    @endif
</div>
@endsection