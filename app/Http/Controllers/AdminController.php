<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan; // Pastikan Model ini ada
use Carbon\Carbon;        // Untuk pengelolaan tanggal (bulan/tahun)

class AdminController extends Controller
{
    // ==========================================================
    // 1. DASHBOARD UTAMA (Statistik)
    // ==========================================================
    public function dashboard()
    {
        // Hitung total data berdasarkan status
        $total    = Pengajuan::count();
        $menunggu = Pengajuan::where('status', 'Menunggu')->count();
        $diproses = Pengajuan::where('status', 'Diproses')->count();
        $selesai  = Pengajuan::where('status', 'Selesai')->count();

        // Ambil 5 data terbaru untuk tabel mini di dashboard
        $terbaru  = Pengajuan::latest()->take(5)->get();

        return view('admin.dashboard', compact('total', 'menunggu', 'diproses', 'selesai', 'terbaru'));
    }

    // ==========================================================
    // 2. HALAMAN KELOLA SEMUA DATA
    // ==========================================================
    public function kelola()
    {
        // Mengambil semua data dari yang terbaru
        // Tips: Jika data banyak, ganti get() dengan paginate(10)
        $data = Pengajuan::latest()->get();

        return view('admin.kelola', compact('data'));
    }

    // ==========================================================
    // 3. PROSES UPDATE STATUS
    // ==========================================================
    public function updateStatus(Request $request, $id)
    {
        // Validasi input agar status tidak kosong
        $request->validate([
            'status' => 'required|string'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        // Update status sesuai pilihan admin
        $pengajuan->status = $request->status;
        
        // Simpan perubahan
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    // ==========================================================
    // 4. HAPUS DATA
    // ==========================================================
    public function hapus($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // ==========================================================
    // 5. HALAMAN FILTER LAPORAN
    // ==========================================================
    public function laporan()
    {
        return view('admin.laporan');
    }

    // ==========================================================
    // 6. PROSES CETAK/LIHAT LAPORAN
    // ==========================================================
    public function cetakLaporan(Request $request)
    {
        // Ambil input bulan & tahun dari form
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Validasi sederhana
        if (!$bulan || !$tahun) {
            return redirect()->back()->with('error', 'Silakan pilih bulan dan tahun terlebih dahulu.');
        }

        // Ambil data sesuai filter created_at
        $data = Pengajuan::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get();

        // Mengubah angka bulan menjadi nama (Contoh: '1' -> 'Januari')
        // Pastikan App/Config locale 'id' jika ingin bahasa Indonesia
        $namaBulan = Carbon::create()
            ->month((int) $bulan)
            ->translatedFormat('F');

        // Return ke view khusus cetak (biasanya view ini hanya berisi tabel tanpa navbar/sidebar)
        return view('admin.laporan_cetak', compact('data', 'bulan', 'tahun', 'namaBulan'));
    }
}