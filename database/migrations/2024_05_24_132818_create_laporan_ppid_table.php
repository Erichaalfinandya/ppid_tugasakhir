<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPpidTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_ppid', function (Blueprint $table) {
            $table->id();
            $table->string('sampul'); // png/jpg
            $table->string('judul');
            $table->string('file'); // pdf
            $table->year('tahun');
            $table->string('penerbit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_ppid');
    }
};
