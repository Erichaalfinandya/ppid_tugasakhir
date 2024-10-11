<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ulasan_nama',
        'ulasan_type',
        'ulasan_isi',
        'ulasan_rating',
        'ulasan_status'
    ];
}
