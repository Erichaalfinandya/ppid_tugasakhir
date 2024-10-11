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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('ulasan_nama')->nullable();
            $table->text('ulasan_type')->nullable();
            $table->text('ulasan_isi')->nullable();
            $table->integer('ulasan_rating')->nullable();
            $table->string('ulasan_status')->default('pending'); //pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
