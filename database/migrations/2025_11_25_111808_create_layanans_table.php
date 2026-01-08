<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan'); // Contoh: Perekaman E-KTP
            $table->text('persyaratan');    // Isi syarat (bisa panjang)
            $table->string('waktu');        // Contoh: 1-3 Hari
            $table->string('biaya');        // Contoh: Gratis
            $table->string('icon')->default('fa-file-lines'); // FontAwesome Icon
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanans');
    }
};