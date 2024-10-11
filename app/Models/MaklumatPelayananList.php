<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaklumatPelayananList extends Model
{
    use HasFactory;

    protected $table = 'maklumat_pelayanan_lists';

    protected $fillable = [
        'urutan',
        'deskripsi',
    ];
}