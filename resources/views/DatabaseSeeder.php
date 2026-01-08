<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\Jadwal;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Isi Data Berita Dummy
        Berita::create([
            'judul' => 'Perbaikan Jalan Desa Gambarsari Dimulai',
            'kategori' => 'Pembangunan',
            'isi' => 'Dinas PU Banyumas mengonfirmasi jadwal perbaikan aspal di ruas jalan utama dimulai minggu depan. Warga dimohon berhati-hati saat melintas.',
            'tanggal' => now()->subDays(1),
        ]);

        Berita::create([
            'judul' => 'Penyaluran BLT Tahap 4',
            'kategori' => 'Sosial',
            'isi' => 'Warga penerima manfaat diharapkan membawa KTP asli dan KK saat pengambilan bantuan di Balai Desa masing-masing sesuai jadwal.',
            'tanggal' => now()->subDays(2),
        ]);

        Berita::create([
            'judul' => 'Pekan Imunisasi Nasional',
            'kategori' => 'Kesehatan',
            'isi' => 'Puskesmas Kebasen mengajak seluruh balita untuk mengikuti PIN Polio di Posyandu terdekat.',
            'tanggal' => now()->subDays(3),
        ]);

        // 2. Isi Data Jadwal Dummy
        // Jadwal Rutin
        Jadwal::create(['hari' => 'Senin', 'jam' => '09.00 - 12.00', 'kegiatan' => 'Samsat Keliling', 'lokasi' => 'Balai Desa Adisana', 'jenis' => 'rutin']);
        Jadwal::create(['hari' => 'Selasa', 'jam' => '09.00 - 12.00', 'kegiatan' => 'Samsat Keliling', 'lokasi' => 'Balai Desa Cindaga', 'jenis' => 'rutin']);
        
        // Jadwal Event
        Jadwal::create(['hari' => 'Rabu, 25 Nov', 'jam' => '08.00 - Selesai', 'kegiatan' => 'Posyandu Balita', 'lokasi' => 'Desa Kaliwedi', 'jenis' => 'event']);
        Jadwal::create(['hari' => 'Jumat, 27 Nov', 'jam' => '13.00 - Selesai', 'kegiatan' => 'Musyawarah Desa', 'lokasi' => 'Desa Kebasen', 'jenis' => 'event']);
    }
}