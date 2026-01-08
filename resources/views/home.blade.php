@extends('layouts.app')

@section('title', 'Beranda - Portal Kebasen')

@section('content')
    
    {{-- SECTION 1: HERO / PENCARIAN --}}
    <section class="px-4 mb-10 text-center pt-12 bg-white pb-12 border-b border-slate-100">
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
            Pelayanan Publik <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-400">Kecamatan Kebasen</span>
        </h2>
        <p class="text-slate-500 mb-8">Urus administrasi kependudukan jadi lebih mudah, cepat, dan transparan.</p>
        
        <form action="{{ url('/cari') }}" method="GET" class="max-w-xl mx-auto relative group z-10">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-slate-400 group-focus-within:text-blue-500 transition-colors"></i>
            </div>
            <input type="text" name="q" class="block w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-full shadow-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all text-slate-700" 
                    placeholder="Cari layanan (Contoh: KTP, Jadwal Samsat...)">
        </form>

        <div class="mt-6 text-sm">
            {{-- Pastikan route 'status' ada di web.php --}}
            <a href="{{ Route::has('status') ? route('status') : '#' }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:bg-blue-50 px-4 py-2 rounded-full transition">
                <i class="fa-solid fa-clock-rotate-left"></i> Cek Status Pengajuan Saya
            </a>
        </div>
    </section>

    {{-- SECTION 2: INFO STATUS KANTOR (Card Floating) --}}
    <section class="max-w-6xl mx-auto px-4 -mt-8 mb-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            {{-- Card 1: Kantor Kecamatan --}}
            <div class="bg-white p-5 rounded-xl shadow-md border border-slate-100 flex items-center gap-4">
                <div class="p-3 bg-blue-100 text-blue-600 rounded-full"><i class="fa-solid fa-landmark text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-slate-800">Kantor Kecamatan</h4>
                    @php
                        $jam = now()->hour;
                        $hari = now()->dayOfWeek; // 0=Minggu, 6=Sabtu
                        $buka = ($jam >= 8 && $jam < 15 && $hari > 0 && $hari < 6);
                    @endphp
                    @if($buka)
                        <span class="text-xs font-bold text-green-600">● SEDANG BUKA</span>
                    @else
                        <span class="text-xs font-bold text-red-500">● TUTUP</span>
                    @endif
                </div>
            </div>

            {{-- Card 2: Samsat --}}
            <div class="bg-white p-5 rounded-xl shadow-md border border-slate-100 flex items-center gap-4">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-full"><i class="fa-solid fa-bus text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-slate-800">Samsat Keliling</h4>
                    <span class="text-xs text-slate-500">Kamis, 09.00 - 12.00 WIB</span>
                </div>
            </div>

            {{-- Card 3: Puskesmas --}}
            <div class="bg-white p-5 rounded-xl shadow-md border border-slate-100 flex items-center gap-4">
                <div class="p-3 bg-red-100 text-red-600 rounded-full"><i class="fa-solid fa-hospital text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-slate-800">Puskesmas</h4>
                    <span class="text-xs font-bold text-green-600">● UGD 24 JAM</span>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: MENU LAYANAN --}}
    <section class="max-w-6xl mx-auto px-4 mb-16">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-slate-900">Menu Layanan</h3>
            @auth 
                {{-- INI YANG SEBELUMNYA ERROR, Pastikan route bernama 'pengajuan.index' sudah dibuat --}}
                <a href="{{ route('pengajuan.index') }}" class="text-sm font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg hover:bg-indigo-100">
                    <i class="fa-solid fa-list-check mr-1"></i> Monitoring
                </a>
            @endauth
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            {{-- Tombol Layanan --}}
            {{-- Gunakan Route::has() untuk mencegah error jika rute belum dibuat --}}
            
            <a href="{{ Route::has('layanan.ktp') ? route('layanan.ktp') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-blue-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-regular fa-id-card text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-blue-600">E-KTP</span>
            </a>

            <a href="{{ Route::has('layanan.kk') ? route('layanan.kk') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-orange-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-people-roof text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-orange-600">Kartu Keluarga</span>
            </a>

            <a href="{{ Route::has('layanan.pindah') ? route('layanan.pindah') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-indigo-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-truck-moving text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-indigo-600">Surat Pindah</span>
            </a>

            <a href="{{ Route::has('layanan.akta-lahir') ? route('layanan.akta-lahir') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-pink-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-baby text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-pink-600">Akta Lahir</span>
            </a>

            <a href="{{ Route::has('layanan.akta-mati') ? route('layanan.akta-mati') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-slate-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-book-skull text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-slate-600">Akta Kematian</span>
            </a>

            <a href="{{ Route::has('layanan.pengaduan') ? route('layanan.pengaduan') : '#' }}" class="flex flex-col items-center p-4 bg-white border border-slate-200 rounded-xl hover:border-red-500 hover:shadow-lg transition-all group cursor-pointer text-center h-full">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-bullhorn text-2xl"></i>
                </div>
                <span class="text-sm font-bold text-slate-700 group-hover:text-red-600">Pengaduan</span>
            </a>
        </div>
    </section>

    {{-- SECTION 4: KABAR KECAMATAN (BERITA) --}}
    <section class="max-w-6xl mx-auto px-4 mb-16">
        <div class="flex justify-between items-end mb-6">
            <div>
                <h3 class="text-xl font-bold text-slate-900">Kabar Kecamatan</h3>
                <p class="text-slate-500 text-sm mt-1">Informasi pembangunan dan kegiatan terkini.</p>
            </div>
            <a href="{{ url('/berita') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($beritaTerbaru as $item)
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-lg transition group flex flex-col h-full">
                
                <a href="{{ url('/berita/'.$item->id) }}" class="h-40 overflow-hidden bg-slate-100 block relative">
                    @if($item->gambar != 'default.jpg' && file_exists(public_path('storage/'.$item->gambar)))
                        <img src="{{ asset('storage/'.$item->gambar) }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="{{ $item->judul }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-50 group-hover:bg-blue-50 group-hover:text-blue-300 transition">
                            <i class="fa-regular fa-image text-4xl"></i>
                        </div>
                    @endif
                </a>
                
                <div class="p-5 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded uppercase">{{ $item->kategori ?? 'Umum' }}</span>
                        <span class="text-xs text-slate-400"><i class="fa-regular fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                    </div>
                    
                    <h4 class="font-bold text-slate-900 text-lg leading-snug mb-2">
                        <a href="{{ url('/berita/'.$item->id) }}" class="group-hover:text-blue-600 transition line-clamp-2">
                            {{ $item->judul }}
                        </a>
                    </h4>
                    
                    <p class="text-sm text-slate-500 line-clamp-2 mb-4 flex-grow">
                        {{ Str::limit(strip_tags($item->isi), 100) }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-10 bg-slate-50 rounded-xl border border-dashed border-slate-300">
                <p class="text-slate-400">Belum ada berita terbaru.</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- SECTION 5: JADWAL PELAYANAN --}}
    <section class="max-w-6xl mx-auto px-4 mb-12">
        <h3 class="text-lg font-bold text-slate-900 mb-4">Jadwal Pelayanan</h3>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach($jadwal as $j)
                <div class="bg-white p-4 rounded-lg shadow-sm border border-slate-100 text-center">
                    <h3 class="font-bold text-sm text-blue-600 uppercase">{{ $j['hari'] }}</h3>
                    <p class="text-slate-800 font-bold text-xs mt-1">{{ $j['kegiatan'] }}</p>
                    <span class="text-[10px] text-slate-500 block mt-1">
                        {{ $j['waktu'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </section>

@endsection