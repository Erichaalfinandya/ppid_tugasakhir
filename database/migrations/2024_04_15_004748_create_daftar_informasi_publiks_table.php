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
        Schema::create('daftar_informasi_publiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_info_id')->nullable()->constrained('jenis_informasi')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('rincian_jenis_info_id')->nullable()->constrained('rincian_jenis_informasi')->onUpdate('cascade')->nullOnDelete();
            $table->text('ringkasan_informasi')->nullable();
            $table->foreignId('pejabat_id')->nullable()->constrained('pejabat')->onUpdate('cascade')->nullOnDelete();
            $table->string('penanggung_jawab');
            $table->string('waktu_pembuatan');
            $table->string('bentuk_informasi');
            $table->string('jangka_waktu');
            $table->string('jenis_media');
            $table->string('pembagian_informasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_informasi_publiks');
    }
};
