<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSengketa extends Model
{
    use HasFactory;
    // Tentukan nama tabel jika tidak menggunakan konvensi penamaan default
    protected $table = 'form_sengketas';

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_lengkap',
        'ttl',
        'nik',
        'ktp',
        'alamat',
        'email',
        'nomor_telepon',
        'pekerjaan',
        'nama_lengkap_kuasa',
        'alamat_kuasa',
        'nomor_telepon_kuasa',
        'nama_badan_publik',
        'alamat_badan_publik',
        'informasi_yang_dimohon',
        'jawaban_atas_permohonan',
        'alasan_keberatan',
        'tanggapan_atas_keberatan',
        'alasan_pengajuan_keberatan',
        'tuntutan_permohonan',
        'alasan_pengajuan_keberatan_dokumen',
        'tanda_bukti_pengajuan_permohonan',
        'tanda_bukti_pengajuan_keberatan',
        'user_id',
    ];
}
