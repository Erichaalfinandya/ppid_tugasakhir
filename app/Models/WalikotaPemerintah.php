<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalikotaPemerintah extends Model
{
    use HasFactory;

    protected $table = 'walikota_pemerintah';

    protected $fillable = [
        'nama',
        'sampulutama',
        'sampul',
    ];
}
