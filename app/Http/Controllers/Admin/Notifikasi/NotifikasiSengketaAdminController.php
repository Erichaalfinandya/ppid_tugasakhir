<?php

namespace App\Http\Controllers\Admin\Notifikasi;

use App\Http\Controllers\Controller;
use App\Mail\JawabanUploadedSengketa;
use App\Models\Notification;
use App\Models\PermohonanSengketa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifikasiSengketaAdminController extends Controller
{
    public function index()
    {
        // Ambil semua permohonan keberatan dengan status 'Disetujui'
        $datas = PermohonanSengketa::where('status', 'Disetujui')->get();

        // Kirimkan data ke view
        return view('notifikasiAdminSengketa', compact('datas'));
    }

    public function uploadJawaban(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,mp3,mp4|max:5120',
        ]);

        $permohonanSengketa = PermohonanSengketa::findOrFail($id);

        if ($request->hasFile('jawaban')) {
            $file = $request->file('jawaban');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $permohonanSengketa->update(['jawaban' => $filename]);

            // Kirim email notifikasi
            $this->sendJawabanUploadedNotification($permohonanSengketa);
        }
        return redirect()->route('notifikasi-sengketa')->with('success', 'Jawaban berhasil diupload.');
    }

    private function sendJawabanUploadedNotification(PermohonanSengketa $permohonanSengketa)
    {
        $userEmail = $permohonanSengketa->user->email; // Asumsi ada relasi user di Permohonan
        
        Mail::to($userEmail)->send(new JawabanUploadedSengketa($permohonanSengketa));
        $this->createNotification($permohonanSengketa);
    }

    protected function createNotification($permohonanSengketa)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanSengketa->user_id,
            'title' => 'Pengajuan Penyelesaian Sengketa Selesai',
            'message' => 'Pengajuan Penyelesaian Sengketa dengan ID ' . $permohonanSengketa->id . ' telah terjawab.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }
}
