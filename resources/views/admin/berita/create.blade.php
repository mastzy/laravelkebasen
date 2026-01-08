<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tulis Berita Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 flex justify-center">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Tulis Kabar Kecamatan</h2>
        
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block font-bold mb-1">Judul Berita</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Kategori</label>
                <select name="kategori" class="w-full border p-2 rounded">
                    <option>Pemerintahan</option>
                    <option>Sosial</option>
                    <option>Pembangunan</option>
                    <option>Pengumuman</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-1">Isi Berita</label>
                <textarea name="isi" rows="6" class="w-full border p-2 rounded" required></textarea>
            </div>

            <div class="mb-6">
                <label class="block font-bold mb-1">Upload Gambar (Opsional)</label>
                <input type="file" name="gambar" class="w-full border p-2 rounded bg-gray-50">
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Terbitkan</button>
            </div>
        </form>
    </div>
</body>
</html>