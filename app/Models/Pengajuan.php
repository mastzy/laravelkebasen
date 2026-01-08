<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';

    // BAGIAN INI YANG MENYEBABKAN ERROR TADI
    // Kita harus mendaftarkan semua kolom yang boleh diisi lewat kodingan 'create'
    protected $fillable = [
        'kode_tiket',         // <--- Tadi error karena ini belum ada
        'nama_pemohon',
        'nik',
        'jenis_layanan',
        'no_hp',
        'status',
        'keterangan_tambahan'
    ];
}