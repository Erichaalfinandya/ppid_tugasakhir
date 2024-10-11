<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('kodepermohonan')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('kategoripermohonan');
            $table->string('nik', 16);
            $table->string('nama');
            $table->string('ktp');
            $table->string('alamat');
            $table->string('email');
            $table->string('nomortelepon');
            $table->string('pekerjaan');
            $table->string('uploadsurat')->nullable();
            $table->text('rincianinformasi');
            $table->text('tujuaninformasi');
            $table->string('mendapatkansalinan');
            $table->string('caramendapatkansalinan');
            $table->string('status')->default('Proses');
            $table->string('tahapan')->nullable(); // Hapus after('some_column') jika tidak dibutuhkan
            $table->string('current_stage')->nullable(); // Tambahkan kolom di sini
            $table->string('jawaban')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::table('permohonan', function (Blueprint $table) {
            $table->dropColumn('jawaban');
        });
    }
};