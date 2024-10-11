<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita_pemerintah', function (Blueprint $table) {
            $table->id();
            $table->string('sampul')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('penerbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_pemerintah');
    }
};
