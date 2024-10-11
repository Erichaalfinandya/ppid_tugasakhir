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
        Schema::create('pekerjaan_wakil', function (Blueprint $table) {
            $table->id();
            $table->string('masa'); // masa jabatan
            $table->string('jabatan'); // Informasi jabatan
            $table->text('deskripsi')->nullable(); // Deskripsi
            $table->string('penerbit'); // Penerbit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_wakil');
    }
};
