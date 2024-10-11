<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanKeberatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_keberatan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kodepermohonan');
            $table->string('nik');
            $table->string('alasan_pengajuan');
            $table->string('nama');
            $table->string('nomortelepon');
            $table->string('email');
            $table->string('alamat');
            $table->text('kasusposisi');
            $table->string('uploadsuratkeberatan');
            $table->string('status')->default('Proses');
            $table->string('tahapan')->nullable(); // Hapus after('some_column') jika tidak dibutuhkan
            $table->string('current_stage')->nullable(); // Tambahkan kolom di sini
            $table->string('jawaban')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_keberatan');
    }
}
