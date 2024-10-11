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
        Schema::create('form_sengketas', function (Blueprint $table) {
            $table->id(); // id (int) auto increment primary key
            $table->string('nama_lengkap');
            $table->date('ttl'); // Tanggal Lahir
            $table->string('nik');
            $table->string('ktp');
            $table->text('alamat');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('pekerjaan');
            $table->string('nama_lengkap_kuasa')->nullable();
            $table->text('alamat_kuasa')->nullable();
            $table->string('nomor_telepon_kuasa')->nullable();
            $table->string('nama_badan_publik');
            $table->text('alamat_badan_publik');
            $table->text('informasi_yang_dimohon');
            $table->text('jawaban_atas_permohonan');
            $table->text('alasan_keberatan');
            $table->text('tanggapan_atas_keberatan');
            $table->text('alasan_pengajuan_keberatan');
            $table->text('tuntutan_permohonan');
            $table->text('alasan_pengajuan_keberatan_dokumen');
            $table->string('tanda_bukti_pengajuan_permohonan');
            $table->string('tanda_bukti_pengajuan_keberatan');
            $table->integer('user_id');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_sengketas');
    }
};
