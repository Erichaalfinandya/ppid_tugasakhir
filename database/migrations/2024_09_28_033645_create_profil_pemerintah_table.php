<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profil_pemerintah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi_visi');
            $table->string('gambar_visi')->nullable();
            $table->text('deskripsi_misi');
            $table->string('gambar_misi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_pemerintah');
    }
};
