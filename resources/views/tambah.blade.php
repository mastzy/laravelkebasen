@extends('layouts.app')
@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-2xl mx-auto px-4">
    <div class="bg-white p-8 rounded-xl shadow-md border border-slate-100">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Tulis Berita Baru</h2>

        <form action="{{ url('/simpan-berita') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Token Keamanan Wajib di Laravel -->
            
            <!-- TAMBAHAN: Input Upload Gambar -->
    <div class="mb-5">
        <label class="block text-slate-700 font-bold mb-2 text-sm">Gambar Utama (Opsional)</label>
        <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:bg-slate-50 transition cursor-pointer relative">
            <input type="file" name="gambar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(this)">
            <div id="preview-container">
                <i class="fa-regular fa-image text-4xl text-slate-300 mb-2"></i>
                <p class="text-sm text-slate-500">Klik untuk upload foto (Maks 2MB)</p>
            </div>
            <!-- Tempat Preview Gambar -->
            <img id="img-preview" class="hidden max-h-48 mx-auto rounded-lg shadow-sm mt-2">
        </div>
        @error('gambar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

            <div class="mb-4">
                <label class="block text-slate-700 font-bold mb-2">Judul</label>
                <input type="text" name="judul" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-slate-700 font-bold mb-2">Kategori</label>
                <select name="kategori" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                    <option>Pembangunan</option>
                    <option>Sosial</option>
                    <option>Kegiatan</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-slate-700 font-bold mb-2">Isi Berita</label>
                <textarea name="isi" rows="5" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none" required></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 w-full">Simpan</button>
                <a href="{{ url('/admin') }}" class="bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-bold w-full text-center">Batal</a>
            </div>
        </form>
    </div>
</div>
<!-- Script untuk Preview Gambar sebelum Upload -->
<script>
    function previewImage(input) {
        const preview = document.getElementById('img-preview');
        const container = document.getElementById('preview-container');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                container.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection