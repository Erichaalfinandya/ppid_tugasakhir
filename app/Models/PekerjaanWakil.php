<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanWakil extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_wakil';

    protected $fillable = [
        'masa',
        'jabatan',
        'deskripsi',
        'penerbit',
    ];
}
