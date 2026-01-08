<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari');      // Contoh: Senin, Selasa
            $table->string('kegiatan');  // Contoh: Samsat Keliling
            $table->string('lokasi');    // Contoh: Balai Desa Cindaga
            $table->string('jam');       // Contoh: 09.00 - 12.00
            $table->string('jenis');     // 'rutin' (kantor/samsat) atau 'event' (desa)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
};