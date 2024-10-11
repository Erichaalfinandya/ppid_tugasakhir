<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanKeberatan extends Model
{
    use HasFactory;

    protected $table = 'permohonan_keberatan';

    protected $fillable = [
        'user_id',
        'kodepermohonan',
        'nik',
        'alasan_pengajuan',
        'nama',
        'nomortelepon',
        'email',
        'alamat',
        'kasusposisi',
        'uploadsuratkeberatan',
        'status',
        'tahapan',
        'current_stage',
        'jawaban',
    ];

    /**
     * Get the status layanan keberatan informasi associated with the permohonan keberatan.
     */
    public function statusKeberatanInformasi()
    {
        return $this->hasMany(StatusLayananKeberatanInformasi::class, 'permohonan_id');
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
