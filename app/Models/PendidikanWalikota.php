<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanWalikota extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_walikota';

    protected $fillable = [
        'pendidikan',
        'tahun',
        'deskripsi',
        'sampul',
        'penerbit',
    ];
}
