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
        Schema::create('pendidikan_sekretaris', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang'); // Jenjang pendidikan
            $table->string('pendidikan'); // Nama Sekolah/Universitas
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
        Schema::dropIfExists('pendidikan_sekretaris');
    }
};
