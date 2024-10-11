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
        Schema::create('detail_daftar_informasis', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->nullable();
            $table->text('ringkasan_informasi');
            $table->text('id_kategori');
            $table->string('pejabat');
            $table->string('penanggung_jawab');
            $table->string('waktu');
            $table->string('bentuk');
            $table->string('jangka_waktu');
            $table->text('jenis_media');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_informasis');
    }
};
