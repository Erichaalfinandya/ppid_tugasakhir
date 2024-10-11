<?php

namespace App\Http\Controllers\User\Status;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSengketa;
use App\Models\StatusPenyelesaianSengketa;
use Illuminate\Http\Request;

class StatusSengketaController extends Controller
{
    public function userIndex()
    {
        $userId = auth()->user()->id; // Dapatkan ID user yang sedang login
        $permohonanSengketa = permohonanSengketa::where('user_id', $userId)
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

        foreach ($permohonanSengketa as $data) {
            if ($data->status) {
                $status = $this->getStageIdForStatus($data->status);
                break;
            }
        }

        return view('status-layanan-penyelesaian-sengketa-user', compact('permohonanSengketa', 'stages', 'status'));
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
            $statusPenyelesaianSengketa = StatusPenyelesaianSengketa::where('permohonan_id', $id)->first();
            if ($statusPenyelesaianSengketa) {
                $statusPenyelesaianSengketa->delete();
            }

            // Menghapus data dari tabel permohonan
            $permohonanSengketa = PermohonanSengketa::find($id);
            if ($permohonanSengketa) {
                $permohonanSengketa->delete();
            }

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }


}
