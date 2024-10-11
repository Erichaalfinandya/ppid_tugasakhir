<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSengketa extends Model
{
    use HasFactory;

    protected $table = 'permohonan_sengketa';

    protected $fillable = [
        'user_id',
        'nama',
        'ttl',
        'nik',
        'ktp',
        'alamat',
        'email',
        'nomortelepon',
        'pekerjaan',
        'alasan_sengketa',
        'tuntutanpemohon',
        'status',
        'current_stage',
        'jawaban',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusPenyelesaianSengketa()
    {
        return $this->hasMany(StatusPenyelesaianSengketa::class, 'permohonan_id'); // Tentukan foreign key di sini
    }

    public $timestamps = true; // Mengaktifkan timestamp

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia';
    }
}
