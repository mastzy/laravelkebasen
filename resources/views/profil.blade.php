@extends('layouts.app')
@section('title', 'Profil Instansi')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    
    <!-- Intro -->
    <div class="text-center mb-16 max-w-3xl mx-auto">
        <span class="text-brand-600 font-bold tracking-widest text-xs uppercase bg-brand-50 px-3 py-1 rounded-full">Tentang Kami</span>
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-4 mb-4">Mewujudkan Pelayanan Prima untuk Masyarakat Kebasen</h2>
        <p class="text-slate-500">Komitmen kami adalah memberikan pelayanan publik yang transparan, akuntabel, dan mudah diakses.</p>
    </div>

    <!-- Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-8 mb-20">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-50 rounded-full group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-3 relative z-10">
                <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-lg"><i class="fa-regular fa-eye"></i></span>
                Visi
            </h3>
            <p class="text-slate-600 italic leading-relaxed relative z-10">
                "Terwujudnya Kecamatan Kebasen yang Maju, Sejahtera, dan Berdaya Saing melalui Tata Kelola Pemerintahan yang Baik."
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-50 rounded-full group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-3 relative z-10">
                <span class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 text-lg"><i class="fa-solid fa-bullseye"></i></span>
                Misi
            </h3>
            <ul class="space-y-3 text-slate-600 relative z-10">
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Meningkatkan kualitas pelayanan administrasi.</li>
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Mendorong pemberdayaan ekonomi desa.</li>
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Menjaga stabilitas keamanan wilayah.</li>
            </ul>
        </div>
    </div>

    <!-- Struktur Organisasi (Simple Tree) -->
    <div class="text-center">
        <h3 class="text-2xl font-bold text-slate-900 mb-10">Struktur Organisasi</h3>
        <div class="inline-flex flex-col items-center">
            <!-- Camat -->
            <div class="w-64 bg-white p-4 rounded-xl border-2 border-brand-500 shadow-lg mb-4 z-10 relative">
                <div class="w-16 h-16 bg-slate-200 rounded-full mx-auto mb-2 overflow-hidden">
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-slate-900">Nama Camat</h4>
                <p class="text-xs font-bold text-brand-600 uppercase">Camat Kebasen</p>
            </div>
            
            <!-- Garis Vertikal -->
            <div class="h-8 w-0.5 bg-slate-300"></div>
            
            <!-- Sekcam -->
            <div class="w-56 bg-white p-3 rounded-xl border border-slate-200 shadow-sm mb-4 z-10 relative">
                <h4 class="font-bold text-slate-900 text-sm">Nama Sekcam</h4>
                <p class="text-xs text-slate-500 uppercase">Sekretaris Kec.</p>
            </div>

            <!-- Garis Vertikal -->
            <div class="h-6 w-0.5 bg-slate-300"></div>
            <!-- Garis Horizontal -->
            <div class="w-[80%] h-0.5 bg-slate-300"></div>
            
            <!-- Staff -->
            <div class="flex gap-4 mt-4 justify-center flex-wrap">
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Pemerintahan</p>
                    </div>
                </div>
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Pelayanan</p>
                    </div>
                </div>
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Trantib</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection@extends('layouts.app')
@section('title', 'Profil Instansi')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    
    <!-- Intro -->
    <div class="text-center mb-16 max-w-3xl mx-auto">
        <span class="text-brand-600 font-bold tracking-widest text-xs uppercase bg-brand-50 px-3 py-1 rounded-full">Tentang Kami</span>
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-4 mb-4">Mewujudkan Pelayanan Prima untuk Masyarakat Kebasen</h2>
        <p class="text-slate-500">Komitmen kami adalah memberikan pelayanan publik yang transparan, akuntabel, dan mudah diakses.</p>
    </div>

    <!-- Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-8 mb-20">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-50 rounded-full group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-3 relative z-10">
                <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-lg"><i class="fa-regular fa-eye"></i></span>
                Visi
            </h3>
            <p class="text-slate-600 italic leading-relaxed relative z-10">
                "Terwujudnya Kecamatan Kebasen yang Maju, Sejahtera, dan Berdaya Saing melalui Tata Kelola Pemerintahan yang Baik."
            </p>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-50 rounded-full group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-3 relative z-10">
                <span class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 text-lg"><i class="fa-solid fa-bullseye"></i></span>
                Misi
            </h3>
            <ul class="space-y-3 text-slate-600 relative z-10">
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Meningkatkan kualitas pelayanan administrasi.</li>
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Mendorong pemberdayaan ekonomi desa.</li>
                <li class="flex gap-3"><i class="fa-solid fa-check text-emerald-500 mt-1"></i> Menjaga stabilitas keamanan wilayah.</li>
            </ul>
        </div>
    </div>

    <!-- Struktur Organisasi (Simple Tree) -->
    <div class="text-center">
        <h3 class="text-2xl font-bold text-slate-900 mb-10">Struktur Organisasi</h3>
        <div class="inline-flex flex-col items-center">
            <!-- Camat -->
            <div class="w-64 bg-white p-4 rounded-xl border-2 border-brand-500 shadow-lg mb-4 z-10 relative">
                <div class="w-16 h-16 bg-slate-200 rounded-full mx-auto mb-2 overflow-hidden">
                    <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-slate-900">Nama Camat</h4>
                <p class="text-xs font-bold text-brand-600 uppercase">Camat Kebasen</p>
            </div>
            
            <!-- Garis Vertikal -->
            <div class="h-8 w-0.5 bg-slate-300"></div>
            
            <!-- Sekcam -->
            <div class="w-56 bg-white p-3 rounded-xl border border-slate-200 shadow-sm mb-4 z-10 relative">
                <h4 class="font-bold text-slate-900 text-sm">Nama Sekcam</h4>
                <p class="text-xs text-slate-500 uppercase">Sekretaris Kec.</p>
            </div>

            <!-- Garis Vertikal -->
            <div class="h-6 w-0.5 bg-slate-300"></div>
            <!-- Garis Horizontal -->
            <div class="w-[80%] h-0.5 bg-slate-300"></div>
            
            <!-- Staff -->
            <div class="flex gap-4 mt-4 justify-center flex-wrap">
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Pemerintahan</p>
                    </div>
                </div>
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Pelayanan</p>
                    </div>
                </div>
                <!-- Item -->
                <div class="flex flex-col items-center">
                    <div class="h-4 w-0.5 bg-slate-300"></div>
                    <div class="bg-white p-3 rounded-lg border border-slate-100 shadow-sm w-32">
                        <p class="text-xs font-bold">Kasi Trantib</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection