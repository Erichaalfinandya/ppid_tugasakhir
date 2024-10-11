<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKominfo extends Model
{
    use HasFactory;

    protected $table = 'berita_kominfo';

    protected $fillable = [
        'sampul',
        'judul',
        'deskripsi',
        'link',
    ];
}