<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarakterKota extends Model
{
    use HasFactory;

    protected $table = 'karakter_kota';

    protected $fillable = [
        'kategori',
        'deskripsi',
        'penerbit',
    ];
}
