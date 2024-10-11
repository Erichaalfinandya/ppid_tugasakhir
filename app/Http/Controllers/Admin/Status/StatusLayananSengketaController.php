<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmailSengketa;
use App\Mail\RejectionEmailSengketa;
use App\Models\Notification;
use App\Models\PermohonanSengketa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StatusLayananSengketaController extends Controller
{
    public function updateStatusSengketa(Request $request, $id)
    {   
        // Validasi input
        $request->validate([
            'status' => 'required|in:Proses,Disetujui,Ditolak',
            'alasan_penolakan' => 'nullable|string|max:255', // Hanya validasi jika status Ditolak
        ]);

        $permohonanSengketa = PermohonanSengketa::findOrFail($id);
        $permohonanSengketa->status = $request->input('status');

         // Update current stage based on the new status
         if ($request->input('status') === 'Disetujui') {
            $permohonanSengketa->current_stage = 'Proses Verifikasi'; // Update to the next stage
            Mail::to($permohonanSengketa->email)->send(new ApprovalEmailSengketa($permohonanSengketa));
            $this->createNotification($permohonanSengketa);

        } elseif ($request->input('status') === 'Ditolak') {
            $permohonanSengketa->current_stage = 'Ditolak'; // Or appropriate stage for rejection

            $details = [
                'nama' => $permohonanSengketa->nama,
                // 'kodepermohonan' => $permohonanSengketa->kodepermohonan,
                'alasan_penolakan' => $request->input('alasan_penolakan'), // Link ke halaman sengketa

            ];
            Mail::to($permohonanSengketa->email)->send(new RejectionEmailSengketa($details));
            $this->createNotificationDitolak($permohonanSengketa);
        }

        $permohonanSengketa->save();
        return redirect()->route('admin.status-layanan-sengketa.index')->with('success', 'Status pengajuan berhasil diubah.');
    }

    public function createNotification($permohonanSengketa)
    {
       // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanSengketa->user_id,
            'title' => 'Status Pengajuan Penyelesaian Sengketa',
            'message' => 'Pengajuan Penyelesaian Sengketa Anda dengan kode ' . $permohonanSengketa->kodepermohonan . ' telah disetujui.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationDitolak($permohonanSengketa)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanSengketa->user_id,
            'title' => 'Status Pengajuan Penyelesaian Sengketa',
            'message' => 'Pengajuan Pengajuan Penyelesaian Sengketa Anda dengan kode ' . $permohonanSengketa->kodepermohonan . ' telah ditolak. Silakan cek email Anda untuk informasi lebih lanjut.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function sendRejectionEmail($permohonanSengketa, $alasanPenolakan)
    {
    $user = $permohonanSengketa->user; // Assuming the `user` relationship exists

        // Email content with the link to the dispute resolution form
        $emailData = [
            'nama' => $permohonanSengketa->nama,
            // 'kodepermohonan' => $permohonanSengketa->kodepermohonan,
            'alasan_penolakan' => $alasanPenolakan,
        ];

        // Send the email
        Mail::send('emails.keberatanDitolak', $emailData, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Pengajuan Keberatan Ditolak');
        });
    }
    
    public function index()
    {
        $pendingData = PermohonanSengketa::where('status', 'PROSES') 
        ->orderBy('updated_at', 'desc')
        ->get();
        $approvedData = PermohonanSengketa::whereIn('status', ['Disetujui', 'Ditolak']) 
        ->orderBy('updated_at', 'desc')
        ->get();
        
        // Retrieve all PermohonanKeberatan records
        $permohonanSengketa = PermohonanSengketa::all();

        // Tampilkan view untuk status penyelesaian sengketa
        return view('admin.Status.status-layanan-penyelesaian-sengketa',compact('pendingData', 'approvedData', 'permohonanSengketa'));
    }
}
