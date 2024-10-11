<?php

namespace App\Http\Controllers\User\Status;

use App\Models\Permohonan;
use App\Models\StatusLayananInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class StatusLayananController extends Controller
{
    public function userIndex()
    {
        $userId = auth()->user()->id; // Dapatkan ID user yang sedang login
        $datas = Permohonan::where('user_id', $userId)->get(); // Mengambil semua pengajuan yang terkait dengan user

        // Define stages and their corresponding IDs
        $stages = [
            'Pengajuan informasi' => 1,
            'Proses Verifikasi' => 2,
            'Proses Tindak Lanjut' => 3,
            'Selesai' => 4,
        ];

        // Initialize status
        $status = 0;

        foreach ($datas as $data) {
            if ($data->status) {
                $status = $this->getStageIdForStatus($data->status);
                break;
            }
        }

        return view('status-layanan-informasi-user', compact('datas', 'stages', 'status'));
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
            $statusLayananInformasi = StatusLayananInformasi::where('permohonan_id', $id)->first();
            if ($statusLayananInformasi) {
                $statusLayananInformasi->delete();
            }

            // Menghapus data dari tabel permohonan
            $permohonan = Permohonan::find($id);
            if ($permohonan) {
                $permohonan->delete();
            }

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
