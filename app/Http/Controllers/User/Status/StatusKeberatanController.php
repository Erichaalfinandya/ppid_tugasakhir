<?php

namespace App\Http\Controllers\User\Status;

use App\Http\Controllers\Controller;
use App\Models\PermohonanKeberatan;
use App\Models\StatusLayananKeberatanInformasi;
use Illuminate\Http\Request;

class StatusKeberatanController extends Controller
{
    // public function userIndex()
    // {
    //     $permohonanKeberatan = PermohonanKeberatan::all(); // Mengambil semua data keberatan
    //     return view('status-layanan-keberatan-informasi-user', compact('permohonanKeberatan'));
    // }

    public function userIndex()
    {
        $userId = auth()->user()->id; // Dapatkan ID user yang sedang login
        $permohonanKeberatan = PermohonanKeberatan::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get(); // Mengambil semua pengajuan yang terkait dengan user

        // Define stages and their corresponding IDs
        $stages = [
            'Pengajuan informasi' => 1,
            'Proses Verifikasi' => 2,
            'Proses Tindak Lanjut' => 3,
            'Selesai' => 4,
        ];

        // Initialize status
        $status = 0;

        foreach ($permohonanKeberatan as $data) {
            if ($data->status) {
                $status = $this->getStageIdForStatus($data->status);
                break;
            }
        }

        return view('status-layanan-keberatan-informasi-user', compact('permohonanKeberatan', 'stages', 'status'));
    }

    private function getStageIdForStatus($status)
    {
        $statusMap = [
            'Pengajuan informasi' => 1,
            'Proses Verifikasi' => 2,
            'Proses Tindak Lanjut' => 3,
            'Selesai' => 4,
        ];

        return $statusMap[$status] ?? 0;
    }

    public function delete($id)
    {
        try {
            // Menghapus data dari tabel status_layanan_informasi
            $statusLayananKeberatanInformasi = StatusLayananKeberatanInformasi::where('permohonan_id', $id)->first();
            if ($statusLayananKeberatanInformasi) {
                $statusLayananKeberatanInformasi->delete();
            }

            // Menghapus data dari tabel permohonan
            $permohonanKeberatan = PermohonanKeberatan::find($id);
            if ($permohonanKeberatan) {
                $permohonanKeberatan->delete();
            }

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }


}
