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
        Schema::create('status_keberatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_keberatan_id')->constrained('permohonan_keberatan')->onDelete('cascade');
            $table->string('status')->default('Proses');
            $table->text('alasan_penolakan')->nullable(); // Menambahkan kolom alasan_penolakan
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_keberatan');
    }
};
