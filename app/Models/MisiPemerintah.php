<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiPemerintah extends Model
{
    use HasFactory;

    protected $table = 'misi_pemerintah';

    protected $fillable = [
        'urutan',
        'misi',
        'penerbit',
    ];
}
