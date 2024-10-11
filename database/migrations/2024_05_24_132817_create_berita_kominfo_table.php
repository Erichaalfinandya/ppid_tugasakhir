<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaKominfoTable extends Migration
{
    public function up()
    {
        Schema::create('berita_kominfo', function (Blueprint $table) {
            $table->id();
            $table->string('sampul')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_kominfo');
    }
};