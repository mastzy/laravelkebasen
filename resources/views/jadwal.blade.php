@extends('layouts.app')

@section('title', 'Jadwal Kegiatan - Portal Kebasen')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Agenda Kegiatan Minggu Ini</h1>
            <p class="text-slate-500">Pantau jadwal pelayanan publik dan kegiatan masyarakat di Kecamatan Kebasen.</p>
        </div>

        <!-- Data Dummy Langsung di View (Agar tidak perlu ubah Route lagi) -->
        @php
            $agenda = [
                [
                    'hari' => 'Senin',
                    'tanggal' => date('d M Y', strtotime('monday this week')),
                    'jam' => '08:00 - 15:00',
                    'kegiatan' => 'Pelayanan Administrasi Umum & Kependudukan',
                    'lokasi' => 'Kantor Kecamatan',
                    'icon' => 'fa-id-card',
                    'color' => 'blue'
                ],
                [
                    'hari' => 'Selasa',
                    'tanggal' => date('d M Y', strtotime('tuesday this week')),
                    'jam' => '09:00 - 11:00',
                    'kegiatan' => 'Posyandu Balita & Imunisasi',
                    'lokasi' => 'Aula Desa Gambarsari',
                    'icon' => 'fa-baby',
                    'color' => 'pink'
                ],
                [
                    'hari' => 'Rabu',
                    'tanggal' => date('d M Y', strtotime('wednesday this week')),
                    'jam' => '08:00 - 12:00',
                    'kegiatan' => 'Rapat Koordinasi Perangkat Desa',
                    'lokasi' => 'Pendopo Kecamatan',
                    'icon' => 'fa-users',
                    'color' => 'purple'
                ],
                [
                    'hari' => 'Kamis',
                    'tanggal' => date('d M Y', strtotime('thursday this week')),
                    'jam' => '09:00 - 12:00',
                    'kegiatan' => 'Layanan Samsat Keliling (Pajak Kendaraan)',
                    'lokasi' => 'Halaman Parkir Kecamatan',
                    'icon' => 'fa-car-side',
                    'color' => 'amber'
                ],
                [
                    'hari' => 'Jumat',
                    'tanggal' => date('d M Y', strtotime('friday this week')),
                    'jam' => '07:00 - 08:00',
                    'kegiatan' => 'Senam Sehat Lansia & Prolanis',
                    'lokasi' => 'Alun-alun Kebasen',
                    'icon' => 'fa-heart-pulse',
                    'color' => 'red'
                ],
            ];
        @endphp

        <!-- Timeline Jadwal -->
        <div class="space-y-6">
            @foreach($agenda as $item)
            <div class="group flex flex-col md:flex-row gap-4 md:gap-8 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg transition-all items-center">
                
                <!-- Waktu (Kiri) -->
                <div class="md:w-48 flex-shrink-0 text-center md:text-right">
                    <div class="text-2xl font-bold text-slate-800">{{ $item['hari'] }}</div>
                    <div class="text-xs text-slate-400 uppercase tracking-wider font-bold">{{ $item['tanggal'] }}</div>
                </div>

                <!-- Icon Tengah (Hiasan) -->
                <div class="hidden md:flex items-center justify-center w-12 h-12 rounded-full bg-{{ $item['color'] }}-50 text-{{ $item['color'] }}-500 group-hover:scale-110 transition">
                    <i class="fa-solid {{ $item['icon'] }} text-xl"></i>
                </div>

                <!-- Detail (Kanan) -->
                <div class="flex-grow border-l-4 border-{{ $item['color'] }}-400 pl-4 md:border-none md:pl-0">
                    <h3 class="text-lg font-bold text-slate-900">{{ $item['kegiatan'] }}</h3>
                    <div class="flex flex-wrap gap-4 mt-2 text-sm text-slate-500">
                        <span class="flex items-center gap-2"><i class="fa-regular fa-clock text-{{ $item['color'] }}-500"></i> {{ $item['jam'] }}</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-{{ $item['color'] }}-500"></i> {{ $item['lokasi'] }}</span>
                    </div>
                </div>

                <!-- Badge Status -->
                <div>
                    @if($item['hari'] == date('l')) <!-- Cek jika hari ini -->
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full animate-pulse">HARI INI</span>
                    @else
                        <span class="px-3 py-1 bg-slate-100 text-slate-500 text-xs font-bold rounded-full">Akan Datang</span>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

        <!-- Info Tambahan -->
        <div class="mt-8 text-center bg-blue-50 p-6 rounded-xl border border-blue-100 text-blue-800 text-sm">
            <i class="fa-solid fa-circle-info mr-2"></i> Jadwal dapat berubah sewaktu-waktu menyesuaikan kondisi di lapangan.
        </div>

    </div>
</div>
@endsection