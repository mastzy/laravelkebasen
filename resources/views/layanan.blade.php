@extends('layouts.app')

@section('title', 'Semua Layanan - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Pusat Layanan Digital</h1>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg">
                Urus dokumen kependudukan dan sampaikan aspirasi Anda kapan saja, di mana saja. Hemat waktu tanpa perlu antre.
            </p>
        </div>

        <!-- Grid Layanan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- 1. E-KTP -->
            <a href="{{ url('/layanan/ktp') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">ONLINE</div>
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 transition-colors">
                    <i class="fa-regular fa-id-card text-3xl text-green-600 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Pembuatan E-KTP</h3>
                <p class="text-slate-500 text-sm mb-4">Layanan perekaman baru, cetak ulang karena hilang/rusak, dan perubahan data identitas.</p>
                <span class="text-green-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Isi Formulir <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

            <!-- 2. Kartu Keluarga -->
            <a href="{{ url('/layanan/kk') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">ONLINE</div>
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <i class="fa-solid fa-people-roof text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Kartu Keluarga (KK)</h3>
                <p class="text-slate-500 text-sm mb-4">Pecah KK, penambahan anggota keluarga (bayi), atau perbaikan data anggota keluarga.</p>
                <span class="text-blue-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Isi Formulir <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

            <!-- 3. Surat Pindah -->
            <a href="{{ url('/layanan/pindah') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-purple-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">ONLINE</div>
                <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition-colors">
                    <i class="fa-solid fa-truck-moving text-3xl text-purple-600 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Surat Pindah (SKPWNI)</h3>
                <p class="text-slate-500 text-sm mb-4">Pengurusan surat keterangan pindah domisili antar desa, kecamatan, atau kabupaten.</p>
                <span class="text-purple-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Isi Formulir <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

            <!-- 4. Pengaduan -->
            <a href="{{ url('/layanan/pengaduan') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">24 JAM</div>
                <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition-colors">
                    <i class="fa-solid fa-bullhorn text-3xl text-red-600 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Layanan Pengaduan</h3>
                <p class="text-slate-500 text-sm mb-4">Saluran aspirasi dan pengaduan masyarakat terkait fasilitas umum atau pelayanan publik.</p>
                <span class="text-red-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Buat Laporan <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

            <!-- 5. Akta Kelahiran (SUDAH AKTIF / ONLINE) -->
            <a href="{{ url('/layanan/akta-lahir') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-rose-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">ONLINE</div>
                <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-rose-500 transition-colors">
                    <i class="fa-solid fa-baby text-3xl text-rose-500 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Akta Kelahiran</h3>
                <p class="text-slate-500 text-sm mb-4">Pembuatan akta kelahiran baru untuk bayi yang baru lahir secara online.</p>
                <span class="text-rose-500 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Isi Formulir <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

            <!-- 6. Akta Kematian (SUDAH AKTIF & IKON UNIVERSAL) -->
            <a href="{{ url('/layanan/akta-mati') }}" class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-slate-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">ONLINE</div>
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-slate-600 transition-colors">
                    <!-- Ikon diganti menjadi Buku Register (Universal) -->
                    <i class="fa-solid fa-book text-3xl text-slate-600 group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Akta Kematian</h3>
                <p class="text-slate-500 text-sm mb-4">Pelaporan kematian dan penerbitan akta kematian anggota keluarga.</p>
                <span class="text-slate-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
                    Isi Formulir <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>

        </div>

        <!-- Info Tambahan -->
        <div class="mt-16 bg-brand-600 rounded-3xl p-8 md:p-12 text-center text-white relative overflow-hidden">
            <!-- Hiasan Background -->
            <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                <i class="fa-solid fa-building text-[200px] absolute -left-10 -bottom-10"></i>
                <i class="fa-solid fa-users text-[200px] absolute -right-10 -top-10"></i>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Butuh layanan tatap muka?</h2>
                <p class="text-brand-100 mb-8 max-w-2xl mx-auto">
                    Kantor Kecamatan Kebasen tetap melayani secara offline pada jam kerja. Silakan datang langsung jika membutuhkan konsultasi mendalam.
                </p>
                <div class="inline-flex flex-wrap justify-center gap-4 text-sm font-semibold bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                    <span class="flex items-center gap-2"><i class="fa-regular fa-clock"></i> Senin - Kamis: 08.00 - 15.00</span>
                    <span class="w-px h-5 bg-white/30 hidden md:block"></span>
                    <span class="flex items-center gap-2"><i class="fa-regular fa-clock"></i> Jumat: 08.00 - 11.00</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection