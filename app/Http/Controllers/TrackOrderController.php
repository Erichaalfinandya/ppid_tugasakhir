<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\StatusLayananInformasi;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function showTrackOrder($id)
    {
        // Mendapatkan data permohonan
        $permohonan = Permohonan::findOrFail($id);

        // Mendapatkan status permohonan (misalnya, dari model StatusLayananInformasi)
        $statusLayananInformasi = StatusLayananInformasi::where('permohonan_id', $id)->first();

        // Mendefinisikan stages dengan ID dan deskripsi
        $stages = [
            'Pengajuan informasi' => 1,
            'Proses Verifikasi' => 2,
            'Proses Tindak Lanjut' => 3,
            'Beri Tanggapan' => 4,
            'Selesai' => 5,
        ];

        // Menentukan status berdasarkan tahap
        $status = isset($statusLayananInformasi) ? $statusLayananInformasi->status : 0;

        // Mengembalikan tampilan dengan variabel yang diperlukan
        return view('track-order', compact('permohonan', 'statusLayananInformasi', 'stages', 'status'));
    }
}
