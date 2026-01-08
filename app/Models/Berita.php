<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Tambahkan baris ini agar Laravel membaca tabel 'berita' (bukan 'beritas')
    protected $table = 'berita';

    // Jika tabel Anda tidak punya kolom 'created_at' dan 'updated_at', aktifkan baris di bawah ini:
    // public $timestamps = false;
    
    // DAFTARKAN KOLOM YANG BOLEH DIISI DARI FORM
    protected $fillable = ['judul', 'slug', 'kategori', 'isi', 'gambar', 'tanggal'];
}