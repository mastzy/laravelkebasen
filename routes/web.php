<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

// --- IMPORT CONTROLLER & MODEL ---
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Models\Berita;
use App\Models\Pengajuan;
use App\Http\Controllers\StatusController;
/*
|--------------------------------------------------------------------------
| Web Routes - PORTAL KECAMATAN KEBASEN
|--------------------------------------------------------------------------
*/
// ========================================================================
// 1. HALAMAN PUBLIK (TANPA LOGIN)
// ========================================================================
// --- HALAMAN UTAMA (BERANDA) ---
Route::get('/', function () {
    // Ambil 3 berita terbaru. Jika tabel kosong, gunakan collect([]) agar tidak error
    try {
        $beritaTerbaru = Berita::latest()->take(3)->get();
    } catch (\Exception $e) {
        $beritaTerbaru = collect([]);
    }

    // Jadwal (Statis)
    $jadwal = [
        ['hari' => 'Senin - Kamis', 'kegiatan' => 'Layanan Umum', 'waktu' => '08:00 - 15:00'],
        ['hari' => 'Jumat', 'kegiatan' => 'Layanan & Senam', 'waktu' => '08:00 - 11:00'],
        ['hari' => 'Kamis', 'kegiatan' => 'Samsat Keliling', 'waktu' => '09:00 - 12:00'],
    ];

    return view('home', compact('beritaTerbaru', 'jadwal'));
})->name('home');

// --- PENCARIAN ---
Route::get('/cari', function (Request $request) {
    $keyword = $request->input('q');

    // Data Statis Layanan
    $semuaLayanan = collect([
        ['nama' => 'Pembuatan E-KTP', 'url' => '/layanan/ktp', 'desc' => 'Buat KTP baru', 'icon' => 'fa-id-card'],
        ['nama' => 'Kartu Keluarga (KK)', 'url' => '/layanan/kk', 'desc' => 'Pecah KK', 'icon' => 'fa-people-roof'],
        ['nama' => 'Surat Pindah', 'url' => '/layanan/pindah', 'desc' => 'SKPWNI', 'icon' => 'fa-truck-moving'],
        ['nama' => 'Pengaduan', 'url' => '/layanan/pengaduan', 'desc' => 'Lapor Masalah', 'icon' => 'fa-bullhorn'],
    ]);

    // Pencarian Berita
    $hasilBerita = collect([]);
    if ($keyword) {
        // Cek dulu apakah tabel ada untuk mencegah error jika migrasi belum jalan
        try {
            $hasilBerita = Berita::where('judul', 'like', '%' . $keyword . '%')->get();
        } catch (\Exception $e) {
            $hasilBerita = collect([]);
        }
    }

    // Filter Layanan
    $hasilLayanan = collect([]);
    if ($keyword) {
        $hasilLayanan = $semuaLayanan->filter(function ($item) use ($keyword) {
            return stripos($item['nama'], $keyword) !== false;
        });
    }

    return view('cari', compact('keyword', 'hasilLayanan', 'hasilBerita'));
})->name('cari');

// --- HALAMAN STATIS LAINNYA ---
Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');
Route::get('/jadwal', function () {
    return view('jadwal');
})->name('jadwal');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// --- BERITA (PUBLIK) ---
Route::get('/berita', [BeritaController::class, 'indexPublic'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// ========================================================================
// 2. LAYANAN & PENGAJUAN
// ========================================================================

// [PENTING] INI ADALAH FIX UNTUK ERROR "Route [pengajuan.index] not defined"
// Route ini mengarahkan ke halaman daftar pengajuan atau riwayat pengajuan user
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');

// Route Form Layanan
Route::prefix('layanan')->group(function () {
    Route::get('/ktp', function () {
        return view('layanan_ktp');
    })->name('layanan.ktp');
    Route::get('/kk', function () {
        return view('layanan_kk');
    })->name('layanan.kk');
    Route::get('/pindah', function () {
        return view('layanan_pindah');
    })->name('layanan.pindah');
    Route::get('/pengaduan', function () {
        return view('layanan_pengaduan');
    })->name('layanan.pengaduan');
    Route::get('/akta-lahir', function () {
        return view('layanan_akta_lahir');
    })->name('layanan.akta-lahir');
    Route::get('/akta-mati', function () {
        return view('layanan_akta_mati');
    })->name('layanan.akta-mati');
});

// PROSES SIMPAN PENGAJUAN (POST)
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

// ========================================================================
// 3. CEK STATUS (TRACKING)
// ========================================================================

Route::get('/status', function () {
    return view('status', ['hasil' => null, 'kode' => null]);
})->name('status');

Route::get('/status/cari', [PengajuanController::class, 'cari'])->name('status.cari');

// Route Dummy (Bisa dihapus nanti)
Route::get('/buat-data-palsu', function () {
    try {
        Pengajuan::create([
            'kode_tiket' => 'KTP-TEST01',
            'nama_pemohon' => 'Toik Zakiyudin',
            'nik' => '3301010000000001',
            'jenis_layanan' => 'Pembuatan E-KTP',
            'no_hp' => '081234567890',
            'status' => 'Diproses'
        ]);
        return "Data dummy dibuat. Cek kode: KTP-TEST01";
    } catch (\Exception $e) {
        return "Gagal buat data dummy: " . $e->getMessage();
    }
});

// ========================================================================
// 4. AUTENTIKASI (LOGIN / LOGOUT)
// ========================================================================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================================================================
// 5. ADMIN PANEL (DILINDUNGI PASSWORD)
// ========================================================================

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // A. Dashboard Utama
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // B. Manajemen Pengajuan Surat
    Route::get('/kelola', [AdminController::class, 'kelola'])->name('admin.kelola');
    Route::post('/update/{id}', [AdminController::class, 'updateStatus'])->name('admin.update');
    Route::delete('/hapus/{id}', [AdminController::class, 'hapus'])->name('admin.hapus');
    Route::get('/cetak-surat/{kode}', [PengajuanController::class, 'cetak'])->name('pengajuan.cetak');

    // C. Laporan Bulanan
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::post('/laporan/cetak', [AdminController::class, 'cetakLaporan'])->name('admin.laporan.cetak');

    // D. Manajemen Berita (CRUD)
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita/simpan', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::delete('/berita/hapus/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    // Halaman form pencarian & hasil
    Route::get('/cek-status', [StatusController::class, 'index'])->name('status.index');
    Route::get('/cek-status/cari', [StatusController::class, 'cari'])->name('status.cari');
});
