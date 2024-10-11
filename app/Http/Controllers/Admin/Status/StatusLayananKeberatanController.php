<?php
namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Models\biodata;
use App\Mail\ApprovalEmailKeberatan;
use App\Mail\RejectionEmailKeberatan;
use Illuminate\Http\Request;
use App\Models\PermohonanKeberatan;
use App\Models\StatusLayananKeberatanInformasi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use App\Models\User;

class StatusLayananKeberatanController extends Controller
{
    public function updateStatusKeberatan(Request $request, $id)
    {   
        // Validasi input
        $request->validate([
            'status' => 'required|in:Proses,Disetujui,Ditolak',
            'alasan_penolakan' => 'nullable|string|max:255', // Hanya validasi jika status Ditolak
        ]);

        $permohonanKeberatan = PermohonanKeberatan::findOrFail($id);
        $permohonanKeberatan->status = $request->input('status');

         // Update current stage based on the new status
         if ($request->input('status') === 'Disetujui') {
            $permohonanKeberatan->current_stage = 'Proses Verifikasi'; // Update to the next stage
            Mail::to($permohonanKeberatan->email)->send(new ApprovalEmailKeberatan($permohonanKeberatan));
            $this->createNotification($permohonanKeberatan);

        } elseif ($request->input('status') === 'Ditolak') {
            $permohonanKeberatan->current_stage = 'Ditolak'; // Or appropriate stage for rejection

            $details = [
                'nama' => $permohonanKeberatan->nama,
                'kodepermohonan' => $permohonanKeberatan->kodepermohonan,
                'alasan_penolakan' => $request->input('alasan_penolakan'),
                'url_sengketa' => route('permohonansengketa.formulir'), // Link ke halaman sengketa

            ];
            Mail::to($permohonanKeberatan->email)->send(new RejectionEmailKeberatan($details));
            $this->createNotificationDitolak($permohonanKeberatan);
        }

        $permohonanKeberatan->save();
        return redirect()->route('admin.status-layanan-informasi.index')->with('success', 'Status pengajuan berhasil diubah.');
    }

    public function createNotification($permohonanKeberatan)
    {
       // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanKeberatan->user_id,
            'title' => 'Status Pengajuan Keberatan',
            'message' => 'Pengajuan Keberatan Anda dengan kode ' . $permohonanKeberatan->kodepermohonan . ' telah disetujui.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationDitolak($permohonanKeberatan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanKeberatan->user_id,
            'title' => 'Status Pengajuan Keberatan',
            'message' => 'Pengajuan Keberatan Anda dengan kode ' . $permohonanKeberatan->kodepermohonan . ' telah ditolak. Silakan cek email Anda untuk informasi lebih lanjut.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function sendRejectionEmail($permohonanKeberatan, $alasanPenolakan)
    {
    $user = $permohonanKeberatan->user; // Assuming the `user` relationship exists

        // Email content with the link to the dispute resolution form
        $emailData = [
            'nama' => $permohonanKeberatan->nama,
            'kodepermohonan' => $permohonanKeberatan->kodepermohonan,
            'alasan_penolakan' => $alasanPenolakan,
            $url_sengketa = route('permohonansengketa.formulir', ['id' => $permohonanKeberatan->id]) // Generates URL based on route name
        ];

        // Send the email
        Mail::send('emails.keberatanDitolak', $emailData, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Pengajuan Keberatan Ditolak');
        });
    }
    public function index()
    {
        // Retrieve data grouped by status
        $pendingData = PermohonanKeberatan::where('status', 'PROSES') 
        ->orderBy('updated_at', 'desc')
        ->get();
        $approvedData = PermohonanKeberatan::whereIn('status', ['Disetujui', 'Ditolak']) 
        ->orderBy('updated_at', 'desc')
        ->get();
        
        // Retrieve all PermohonanKeberatan records
        $permohonanKeberatan = PermohonanKeberatan::all();

        // Pass data to the view
        return view('admin.status.status-layanan-keberatan-informasi', compact('pendingData', 'approvedData', 'permohonanKeberatan'));
    }
}
