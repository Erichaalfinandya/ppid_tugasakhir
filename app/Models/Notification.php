<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'read_at',
    ];

    protected $table = 'notifications';
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Kolom soft delete otomatis
    protected $dates = ['deleted_at'];
}


