<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan; // Pastikan Model dipanggil

class PengajuanController extends Controller
{
    // FUNGSI UNTUK MENYIMPAN DATA DARI FORM KE DATABASE
    public function store(Request $request)
    {
        // 1. Validasi Input (Wajib diisi)
        $request->validate([
            'nama_pemohon' => 'required',
            'nik' => 'required|numeric',
            'no_hp' => 'required',
            'jenis_layanan' => 'required'
        ]);

        // 2. Buat Kode Tiket Unik (Contoh: KTP-2837)
        // Gabungan 3 huruf layanan + 4 angka acak
        $prefix = strtoupper(substr($request->jenis_layanan, 0, 3)); 
        $kodeUnik = $prefix . '-' . rand(1000, 9999);

        // 3. Simpan ke Database
        Pengajuan::create([
            'kode_tiket' => $kodeUnik,
            'nama_pemohon' => $request->nama_pemohon,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'jenis_layanan' => $request->jenis_layanan,
            'keterangan_tambahan' => $request->keterangan, // Opsional
            'status' => 'Menunggu' // Default status
        ]);

        // 4. Redirect kembali dengan pesan sukses & Kode Tiket
        return redirect()->route('status')->with([
            'success' => 'Permohonan Berhasil Dikirim!',
            'kode_tiket' => $kodeUnik
        ]);
    }

    // FUNGSI UNTUK PENCARIAN STATUS
    public function cari(Request $request)
    {
        $kode = $request->input('kode');
        $hasil = null;

        if ($kode) {
            // Cari data di tabel 'pengajuans' dimana kolom 'kode_tiket' sama dengan inputan
            $hasil = Pengajuan::where('kode_tiket', $kode)->first();
        }

        // Kembalikan ke tampilan 'status' dengan membawa data ($hasil)
        return view('status', compact('hasil', 'kode'));
    }

// ... fungsi store dan cari yang sudah ada ...

    // FUNGSI UNTUK MENAMPILKAN SEMUA DATA (Halaman Admin/Monitor)
    public function index()
    {
        // Ambil semua data dari tabel pengajuans, urutkan dari yang terbaru
        $dataPengajuan = Pengajuan::orderBy('created_at', 'desc')->get();
        return view('status', ['hasil' => null, 'kode' => null]);
        return view('pengajuan.index');

        // Kirim data ke view 'daftar_pengajuan'
        return view('daftar_pengajuan', compact('dataPengajuan'));
    }
    // ... fungsi-fungsi sebelumnya ...

    // FUNGSI CETAK BUKTI (RESI)
    public function cetak($kode)
    {
        $data = Pengajuan::where('kode_tiket', $kode)->firstOrFail();
        return view('cetak_resi', compact('data'));
    }
    
} // Tutup Kurung Class Controller


