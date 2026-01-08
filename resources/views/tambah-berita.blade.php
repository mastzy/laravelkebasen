<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 py-10 px-4">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-100">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Tambah Berita Baru</h2>

        {{-- Form Action mengarah ke route simpan-berita --}}
        <form action="{{ url('/simpan-berita') }}" method="POST">
            @csrf  {{-- WAJIB DI LARAVEL: Token keamanan --}}

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-600 mb-1">Judul Berita</label>
                <input type="text" name="judul" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Contoh: Perbaikan Jalan Desa..." required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Kategori</label>
                    <select name="kategori" class="w-full px-4 py-2 border rounded-lg outline-none">
                        <option value="Pembangunan">Pembangunan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Kegiatan">Kegiatan Warga</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full px-4 py-2 border rounded-lg outline-none" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-600 mb-1">Isi Berita</label>
                <textarea name="isi" rows="5" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Tulis isi berita di sini..."></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">Simpan Berita</button>
                <a href="{{ url('/berita') }}" class="px-6 py-2 bg-slate-200 text-slate-700 font-bold rounded-lg hover:bg-slate-300">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>