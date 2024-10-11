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
        Schema::create('daftar_informasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judul_id')->nullable()->constrained('judul')->onUpdate('cascade')->nullOnDelete();
            $table->text('ringkasan_informasi')->nullable();
            $table->string('tahun');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_informasi');
    }
};
