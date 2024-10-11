<?php

namespace App\Http\Controllers\Admin\Notifikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\PermohonanKeberatan;
use App\Models\StatusLayananInformasi;
use Illuminate\Support\Facades\Mail;
use App\Mail\JawabanUploaded;
use App\Models\Notification;

class NotifikasiAdminController extends Controller
{
    private function progressToNextStage(Permohonan $permohonan, $nextStage)
    {
        // Update tahapan on the Permohonan model
        $permohonan->tahapan = $nextStage;
        $permohonan->save();

        // Update tahapan in StatusLayananInformasi
        $statusLayananInformasi = StatusLayananInformasi::where('permohonan_id', $permohonan->id)->first();
        if ($statusLayananInformasi) {
            $statusLayananInformasi->tahapan = $nextStage;
            $statusLayananInformasi->save();
        }
    }
    public function index()
    {
        $datas = Permohonan::where('status', 'Disetujui')->get(); 

        return view('notifikasiAdmin', compact('datas'));
    }

    // public function updateTahapan(Request $request, $id)
    // {
    //     $data = Permohonan::findOrFail($id);
    //     $data->tahapan = $request->input('tahapan');
    //     $data->save();

    //     return redirect()->route('admin.notifikasi.updateTahapan', ['id' => $id])->with('success', 'Tahapan berhasil diperbarui.');
    // }

    public function uploadJawaban(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,mp3,mp4|max:5120',
        ]);

        $permohonan = Permohonan::findOrFail($id);

        if ($request->hasFile('jawaban')) {
            $file = $request->file('jawaban');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $permohonan->update(['jawaban' => $filename]);

            // Kirim email notifikasi
            $this->sendJawabanUploadedNotification($permohonan);
        }

        return redirect()->route('admin.notifikasi.index')->with('success', 'Jawaban berhasil diupload.');
    }

    private function sendJawabanUploadedNotification(Permohonan $permohonan)
    {
        $userEmail = $permohonan->user->email; // Asumsi ada relasi user di Permohonan
        Mail::to($userEmail)->send(new JawabanUploaded($permohonan));
        $this->createNotification($permohonan);
    }

    protected function createNotification($permohonan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonan->user_id,
            'title' => 'Jawaban Pengajuan',
            'message' => 'Pengajuan dengan ID ' . $permohonan->id . ' telah terjawab dengan file berikut.' .$permohonan->jawaban.' silahkan cek halaman pengajuan.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

}
