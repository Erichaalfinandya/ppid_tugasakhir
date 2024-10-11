<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakilWalikota extends Model
{
    use HasFactory;

    protected $table = 'wakil_walikota';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'kota_lahir',
        'tanggal_lahir',
        'sampul',
    ];
}
