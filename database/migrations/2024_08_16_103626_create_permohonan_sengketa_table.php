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
        Schema::create('permohonan_sengketa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Tambahkan baris ini
            $table->string('nama')->nullable();
            $table->string('ttl')->nullable();
            $table->string('nik')->nullable();
            $table->string('ktp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('nomortelepon')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alasan_sengketa')->nullable();
            $table->text('tuntutanpemohon')->nullable();
            $table->string('status')->default('Proses');
            $table->string('tahapan')->nullable(); // Hapus after('some_column') jika tidak dibutuhkan
            $table->string('current_stage')->nullable(); // Tambahkan kolom di sini
            $table->string('jawaban')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_sengketa');
    }
};
