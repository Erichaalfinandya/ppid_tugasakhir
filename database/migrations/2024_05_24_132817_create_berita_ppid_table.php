<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaPpidTable extends Migration
{
    public function up()
    {
        Schema::create('berita_ppid', function (Blueprint $table) {
            $table->id();
            $table->string('sampul')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('penerbit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_ppid');
    }
};