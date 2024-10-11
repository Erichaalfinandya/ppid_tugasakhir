<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\RejectionEmail;
use App\Models\Permohonan;
use App\Models\Notification;
use App\Models\StatusLayananInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StatusLayananInformasiController extends Controller
{
    //untuk memperbrui status di model dan mengirimkan email ketika status berubah menjadi disetujui
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Proses,Disetujui,Ditolak',
            'alasan_penolakan' => 'required_if:status,Ditolak|string|nullable',
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->input('status');

        // Update current stage based on the new status
        if ($request->input('status') === 'Disetujui') {
            $permohonan->current_stage = 'Proses Verifikasi'; // Update to the next stage
            Mail::to($permohonan->email)->send(new ApprovalEmail($permohonan));
            $this->createNotification($permohonan);

        } elseif ($request->input('status') === 'Ditolak') {
            $permohonan->current_stage = 'Ditolak'; // Or appropriate stage for rejection

            // URL untuk form keberatan
            $urlKeberatan = route('formulir.permohonan-keberatan', ['kodepermohonan' => $permohonan->kodepermohonan]);

            $details = [
                'nama' => $permohonan->nama,
                'kodepermohonan' => $permohonan->kodepermohonan,
                'alasan_penolakan' => $request->input('alasan_penolakan'),
                'url_keberatan' => $urlKeberatan,
            ];
            Mail::to($permohonan->email)->send(new RejectionEmail($details));

             // Set session untuk menangani keberatan
        session(['keberatan_ajukan' => true]);
        session(['kodepermohonan' => $permohonan->kodepermohonan]);
            $this->createNotificationDitolak($permohonan);
        }

        $permohonan->save();
        return redirect()->route('admin.status-layanan-informasi.index')->with('success', 'Status pengajuan berhasil diubah.');
    }

    protected function createNotification($permohonan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonan->user_id,
            'title' => 'Status Pengajuan',
            'message' => 'Pengajuan dengan kode ' . $permohonan->kodepermohonan . ' telah disetujui.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationDitolak($permohonan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonan->user_id,
            'title' => 'Status Pengajuan',
            'message' => 'Pengajuan dengan kode ' . $permohonan->kodepermohonan . ' telah ditolak, untuk selengkapnya silahkan cek email anda.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    public function index()
    {
        // Data yang perlu di-approve (status masih 'Proses')
        $pendingData = Permohonan::where('status', 'Proses')
        ->orderBy('created_at', 'desc')
        ->paginate(10); // Misalnya dengan pagination

        // Data yang sudah di-approve atau ditolak
        $approvedData = Permohonan::whereIn('status', ['Disetujui', 'Ditolak'])
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('admin.Status.status-layanan-informasi', compact('pendingData', 'approvedData'));
    }

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $createdAt = $permohonan->created_at;

        $formattedDate = $createdAt ? $createdAt->format('Y-m-d H:i:s') : 'Tanggal tidak tersedia';

        return view('admin.status.show', compact('permohonan', 'formattedDate'));
    }

    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $statusLayananInformasi = $permohonan->statusLayananInformasi ?? new StatusLayananInformasi();

        return view('admin.status.edit', compact('permohonan', 'statusLayananInformasi'));
    }

    public function showInfo($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        return view('admin.status.info', compact('permohonan'));
    }

    // Menghapus data status layanan informasi
    public function delete($id)
    {
        try {
            $statusLayananInformasi = StatusLayananInformasi::where('permohonan_id', $id)->firstOrFail();
            $statusLayananInformasi->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
    
    public function showStatusLayananInformasi($id)
    {
        $permohonan = Permohonan::findOrFail($id); // Mencari data permohonan berdasarkan $id yang diberikan

        // Lakukan logika lain yang diperlukan sesuai kebutuhan, misalnya:
        // - Mengambil status layanan informasi terkait
        // - Mengambil data lain yang ingin ditampilkan di halaman status-layanan-informasi

        return view('admin.status.status-layanan-informasi', compact('permohonan'));
    }
};
