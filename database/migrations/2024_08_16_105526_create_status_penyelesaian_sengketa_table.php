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
        Schema::create('status_penyelesaian_sengketa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id'); // Pastikan tipe data sesuai
            $table->string('status')->default('Proses');
            $table->text('alasan_penolakan')->nullable(); // Menambahkan kolom alasan_penolakan
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('permohonan_id')->references('id')->on('permohonan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_penyelesaian_sengketa');
    }
};