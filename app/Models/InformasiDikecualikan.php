<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDikecualikan extends Model
{
    use HasFactory;

    protected $table = 'informasi_dikecualikan';
    protected $guarded = ['id'];
}
