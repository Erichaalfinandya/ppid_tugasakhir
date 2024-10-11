<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaPPID extends Model
{
    use HasFactory;

    protected $table = 'berita_ppid';

    protected $fillable = [
        'sampul',
        'judul',
        'deskripsi',
        'waktu',
        'tanggal',
        'penerbit',
    ];
}