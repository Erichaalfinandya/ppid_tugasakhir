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
        Schema::create('laporan_penyelenggaraan', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->year('tahun');
            $table->string('penerbit');
            $table->string('file'); // pdf
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penyelenggaraan');
    }
};
