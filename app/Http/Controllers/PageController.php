<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Jadwal;
use App\Models\Layanan; // Pastikan Model Layanan dipanggil

class PageController extends Controller
{
    // --- HALAMAN PUBLIK ---

    public function home() {
        // Ambil 3 berita terbaru untuk di beranda
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->limit(3)->get();
        return view('home', compact('beritaTerbaru'));
    }

    public function jadwal() {
        $rutin = Jadwal::where('jenis', 'rutin')->get();
        $event = Jadwal::where('jenis', 'event')->get();
        return view('jadwal', compact('rutin', 'event'));
    }

    // UPDATE: Ambil data layanan dari database
    public function layanan() {
        $layanans = Layanan::all(); 
        return view('layanan', compact('layanans'));
    }

    public function kontak() {
        return view('kontak');
    }

    // Logika Pencarian Global
    public function cari(Request $request) {
        $keyword = $request->input('q');

        $berita = Berita::where('judul', 'like', "%$keyword%")
                        ->orWhere('isi', 'like', "%$keyword%")->get();
        
        $jadwal = Jadwal::where('kegiatan', 'like', "%$keyword%")
                        ->orWhere('lokasi', 'like', "%$keyword%")->get();

        // Opsional: Bisa tambah pencarian layanan juga disini jika mau
        
        return view('hasil-cari', compact('berita', 'jadwal', 'keyword'));
    }


    // --- LOGIKA ADMIN (TERPADU) ---

    // Halaman Admin Utama
    public function admin() {
        $berita = Berita::orderBy('tanggal', 'desc')->get();
        $jadwal = Jadwal::all();
        $layanan = Layanan::all(); // Kirim data layanan ke view admin
        
        return view('admin', compact('berita', 'jadwal', 'layanan'));
    }

    // Aksi Jadwal
    public function storeJadwal(Request $request) {
        Jadwal::create($request->all());
        return redirect('/admin')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function destroyJadwal($id) {
        Jadwal::destroy($id);
        return redirect('/admin')->with('success', 'Jadwal berhasil dihapus!');
    }

    // Aksi Layanan (BARU)
    public function storeLayanan(Request $request) {
        Layanan::create($request->all());
        return redirect('/admin')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function destroyLayanan($id) {
        Layanan::destroy($id);
        return redirect('/admin')->with('success', 'Layanan berhasil dihapus!');
    }
}