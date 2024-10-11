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
        Schema::create('informasi_dikecualikan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_judul');
            $table->string('judul');
            $table->string('tahun');
            $table->string('file')->nullable();
            $table->string('pembagian_informasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_dikecualikan');
    }
};
