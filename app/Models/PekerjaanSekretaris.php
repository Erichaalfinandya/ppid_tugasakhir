<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanSekretaris extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_sekretaris';

    protected $fillable = [
        'masa',
        'jabatan',
        'deskripsi',
        'penerbit',
    ];
}
