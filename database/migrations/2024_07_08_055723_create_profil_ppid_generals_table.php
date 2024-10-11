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
        Schema::create('profil_ppid_generals', function (Blueprint $table) {
            $table->id();
            $table->text('latar_belakang');
            $table->text('tugas');
            $table->text('motto');
            $table->text('gambar_visi');
            $table->text('gambar_misi');
            $table->text('gambar_profil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_ppid_generals');
    }
};
