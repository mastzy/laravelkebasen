@extends('layouts.app')
@section('title', 'Admin Panel - Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    
    <!-- Header Admin -->
    <div class="bg-slate-900 text-white p-6 rounded-2xl mb-8 flex flex-col md:flex-row justify-between items-center shadow-lg gap-4">
        <div>
            <h2 class="text-2xl font-bold">Dashboard Admin</h2>
            <p class="text-slate-400 text-sm">Pantau aktivitas layanan online dan kelola konten.</p>
        </div>
        <div class="flex gap-3">
             <div class="bg-blue-600 px-4 py-2 rounded-lg text-xs font-bold flex items-center gap-2">
                <i class="fa-solid fa-bell animate-pulse"></i> 3 Permohonan Baru
            </div>
            <div class="bg-yellow-500 text-black px-4 py-2 rounded-lg text-xs font-bold">MODE DEMO</div>
        </div>
    </div>

    <!-- Feedback Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded relative mb-8">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <!-- SECTION 1: PERMOHONAN MASUK (FITUR BARU IMK) -->
    <div class="mb-10">
        <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center">
            <i class="fa-solid fa-inbox mr-2 text-brand-600"></i> Permohonan Layanan Online (Terbaru)
        </h3>
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 border-b text-slate-500 uppercase text-xs">
                    <tr>
                        <th class="p-4">Nama Pemohon</th>
                        <th class="p-4">Jenis Layanan</th>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Data Dummy Simulasi -->
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-700">Budi Santoso</td>
                        <td class="p-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">E-KTP Baru</span></td>
                        <td class="p-4 text-slate-500">Baru saja</td>
                        <td class="p-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-bold">● Menunggu Verifikasi</span></td>
                        <td class="p-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800 font-bold text-xs border border-blue-200 px-3 py-1 rounded">Lihat Detail</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-700">Siti Aminah</td>
                        <td class="p-4"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-bold">Kartu Keluarga</span></td>
                        <td class="p-4 text-slate-500">10 Menit lalu</td>
                        <td class="p-4"><span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-bold">● Sedang Diproses</span></td>
                        <td class="p-4 text-center">
                            <button class="text-blue-600 hover:text-blue-800 font-bold text-xs border border-blue-200 px-3 py-1 rounded">Lihat Detail</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-700">Ahmad Riyadi</td>
                        <td class="p-4"><span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Pengaduan</span></td>
                        <td class="p-4 text-slate-500">1 Jam lalu</td>
                        <td class="p-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">● Selesai</span></td>
                        <td class="p-4 text-center">
                            <button class="text-slate-400 hover:text-slate-600 font-bold text-xs border px-3 py-1 rounded">Arsipkan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        
        <!-- KOLOM 1: KELOLA BERITA -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-slate-800"><i class="fa-regular fa-newspaper mr-2"></i> Daftar Berita</h3>
                <a href="{{ url('/tambah') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-bold shadow">
                    + Tulis Berita
                </a>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 border-b">
                        <tr>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $b)
                        <tr class="border-b hover:bg-slate-50">
                            <td class="p-3 font-medium">{{ $b->judul }}</td>
                            <td class="p-3 text-slate-500">{{ $b->tanggal }}</td>
                            <td class="p-3 text-center">
                                <form action="{{ url('/hapus-berita/'.$b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="p-4 text-center text-slate-400">Belum ada berita.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- KOLOM 2: KELOLA JADWAL -->
        <div>
            <h3 class="text-xl font-bold text-slate-800 mb-4"><i class="fa-regular fa-calendar-check mr-2"></i> Kelola Jadwal</h3>
            
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 mb-6">
                <h4 class="font-bold text-sm text-slate-700 mb-3">Tambah Jadwal Baru</h4>
                <form action="{{ url('/simpan-jadwal') }}" method="POST" class="grid grid-cols-2 gap-3">
                    @csrf
                    <select name="hari" class="border p-2 rounded text-sm bg-slate-50">
                        <option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option>
                    </select>
                    <input type="text" name="jam" placeholder="Jam" class="border p-2 rounded text-sm bg-slate-50" required>
                    <input type="text" name="kegiatan" placeholder="Nama Kegiatan" class="border p-2 rounded text-sm col-span-2 bg-slate-50" required>
                    <button type="submit" class="bg-green-600 text-white py-2 rounded text-sm font-bold col-span-2 hover:bg-green-700">Simpan</button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 border-b"><tr><th class="p-3">Kegiatan</th><th class="p-3 text-center">Aksi</th></tr></thead>
                    <tbody>
                        @forelse($jadwal as $j)
                        <tr class="border-b hover:bg-slate-50">
                            <td class="p-3">
                                <div class="font-bold text-slate-800">{{ $j->kegiatan }}</div>
                                <div class="text-xs text-slate-500">{{ $j->hari }}, {{ $j->jam }}</div>
                            </td>
                            <td class="p-3 text-center">
                                <form action="{{ url('/hapus-jadwal/'.$j->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="p-4 text-center text-slate-400">Belum ada jadwal.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection