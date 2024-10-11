<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanWakil extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_wakil';

    protected $fillable = [
        'jenjang',
        'pendidikan',
        'deskripsi',
        'penerbit',
    ];
}
