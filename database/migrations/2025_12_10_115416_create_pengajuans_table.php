<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pengajuans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_tiket')->unique(); // Penting
        $table->string('nama_pemohon');
        $table->string('nik');                 // <--- Pastikan baris ini ada!
        $table->string('no_hp');               // <--- Dan ini!
        $table->string('jenis_layanan');
        $table->string('status')->default('Menunggu');
        $table->text('keterangan_tambahan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
