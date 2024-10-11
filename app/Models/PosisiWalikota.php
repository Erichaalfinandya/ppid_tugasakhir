<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiWalikota extends Model
{
    use HasFactory;

    protected $table = 'posisi_walikota';

    protected $fillable = [
        'posisi',
        'lokasi',
        'deskripsi',
        'sampul',
        'penerbit',
    ];
}
