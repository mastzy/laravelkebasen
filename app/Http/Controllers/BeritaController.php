<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // ========================================================================
    // BAGIAN PUBLIK (DILIHAT WARGA)
    // ========================================================================

    // 1. Menampilkan daftar berita untuk warga (Route: /berita)
    public function indexPublic()
    {
        // PERBAIKAN: Menggunakan nama variabel $berita agar cocok dengan View kamu
        $berita = Berita::latest()->paginate(6);
        
        return view('berita', compact('berita'));
    }

    // 2. Menampilkan detail satu berita (Route: /berita/{id})
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        
        return view('berita_detail', compact('berita'));
    }

    // ========================================================================
    // BAGIAN ADMIN (PANEL KELOLA)
    // ========================================================================

    // 3. Halaman list berita di Admin Panel (Route: /admin/berita)
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    // 4. Form Tambah Berita (Route: /admin/berita/tambah)
    public function create()
    {
        return view('admin.berita.create');
    }

    // 5. Proses Simpan ke Database (Route: /admin/berita/simpan)
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Upload Gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/berita');
            // Ubah path agar bisa diakses public
            $data['gambar'] = str_replace('public/', 'storage/', $path);
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 6. Hapus Berita (Route: /admin/berita/hapus/{id})
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus gambar fisik jika ada
        if ($berita->gambar) {
            $path = str_replace('storage/', 'public/', $berita->gambar);
            Storage::delete($path);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita dihapus.');
    }
}