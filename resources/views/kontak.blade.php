@extends('layouts.app')

@section('title', 'Hubungi Kami - Portal Kebasen')

@section('content')
<div class="bg-white min-h-screen">
    
    <!-- Hero Header -->
    <div class="bg-slate-900 text-white py-20 text-center">
        <h1 class="text-4xl font-bold mb-4">Hubungi Kami</h1>
        <p class="text-slate-400 max-w-xl mx-auto">Ada pertanyaan atau butuh bantuan? Tim Pelayanan Kecamatan Kebasen siap membantu Anda.</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12 -mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Kartu Info Kontak -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-slate-100 flex flex-col gap-8">
                
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 flex-shrink-0">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Alamat Kantor</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Jl. Raya Kebasen No. 45<br>
                            Kecamatan Kebasen, Kabupaten Banyumas<br>
                            Jawa Tengah, 53172
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 flex-shrink-0">
                        <i class="fa-solid fa-phone text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Telepon & WhatsApp</h4>
                        <p class="text-slate-500 text-sm">(0281) 684xxx</p>
                        <p class="text-slate-500 text-sm">+62 812-3456-7890 (WA Layanan)</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 flex-shrink-0">
                        <i class="fa-solid fa-envelope text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Email Resmi</h4>
                        <p class="text-slate-500 text-sm">kecamatan.kebasen@banyumaskab.go.id</p>
                        <p class="text-slate-500 text-sm">layanan@kebasen.id</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-brand-50 rounded-lg flex items-center justify-center text-brand-600 flex-shrink-0">
                        <i class="fa-regular fa-clock text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Jam Operasional</h4>
                        <p class="text-slate-500 text-sm">Senin - Kamis: 08.00 - 15.00 WIB</p>
                        <p class="text-slate-500 text-sm">Jumat: 08.00 - 11.00 WIB</p>
                        <p class="text-red-400 text-sm font-bold mt-1">Sabtu - Minggu: Libur</p>
                    </div>
                </div>

            </div>

            <!-- Peta & Form -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Embed Google Maps (Iframe) -->
                <div class="bg-slate-200 w-full h-80 rounded-2xl overflow-hidden shadow-sm relative group">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.270912384666!2d109.2015231!3d-7.531176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6542b06c7e1435%3A0x51ad9c9d9b8acb4f!2sKantor%20Kecamatan%20Kebasen!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="grayscale group-hover:grayscale-0 transition duration-500">
                </iframe>
                </div>

                <!-- Form Kirim Pesan -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Kirim Pesan ke Admin</h3>
                    
                    <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Ini hanya UI saja untuk demo -->
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:border-brand-500" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Email / No. HP</label>
                            <input type="text" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:border-brand-500" placeholder="Kontak yang bisa dihubungi">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Pesan / Pertanyaan</label>
                            <textarea rows="4" class="w-full border border-slate-300 rounded-lg p-3 outline-none focus:border-brand-500" placeholder="Tulis pesan Anda disini..."></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <button type="button" onclick="alert('Pesan simulasi terkirim!')" class="bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 px-8 rounded-lg transition">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection