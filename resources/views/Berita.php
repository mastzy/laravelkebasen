<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Kolom apa saja yang boleh diisi oleh Admin
    protected $fillable = [
        'judul', 
        'kategori', 
        'isi', 
        'tanggal', 
        'gambar'
    ];
}