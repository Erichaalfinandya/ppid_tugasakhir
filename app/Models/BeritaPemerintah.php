<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaPemerintah extends Model
{
    use HasFactory;

    protected $table = 'berita_pemerintah';

    protected $fillable = [
        'sampul',
        'judul',
        'deskripsi',
        'waktu',
        'tanggal',
        'penerbit',
    ];
}