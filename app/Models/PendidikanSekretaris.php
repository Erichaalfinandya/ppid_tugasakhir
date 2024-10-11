<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanSekretaris extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_sekretaris';

    protected $fillable = [
        'jenjang',
        'pendidikan',
        'deskripsi',
        'penerbit',
    ];
}
