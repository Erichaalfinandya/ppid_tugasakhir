<?php

namespace App\Http\Controllers\Admin\Notifikasi;

use App\Http\Controllers\Controller;
use App\Models\PermohonanKeberatan;
use Illuminate\Http\Request;
use App\Mail\JawabanKeberatanUploaded;
use Illuminate\Support\Facades\Mail;

class NotifikasiKeberatanAdminController extends Controller
{
    public function index()
    {
        // Ambil semua permohonan keberatan dengan status 'Disetujui'
        $datas = PermohonanKeberatan::where('status', 'Disetujui')->get();

        // Kirimkan data ke view
        return view('notifikasiAdminKeberatan', compact('datas'));
    }

    public function uploadJawaban(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,mp3,mp4|max:5120',
        ]);

        $permohonan_keberatan = PermohonanKeberatan::findOrFail($id);

        if ($request->hasFile('jawaban')) {
            $file = $request->file('jawaban');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $permohonan_keberatan->update(['jawaban' => $filename]);

            // Kirim email notifikasi
            $this->sendJawabanUploadedNotification($permohonan_keberatan);
        }
        return redirect()->route('admin.notifikasi-keberatan.index')->with('success', 'Jawaban berhasil diupload.');
    }

    private function sendJawabanUploadedNotification(PermohonanKeberatan $permohonan_keberatan)
    {
        $userEmail = $permohonan_keberatan->user->email; // Asumsi ada relasi user di Permohonan
        
        Mail::to($userEmail)->send(new JawabanKeberatanUploaded($permohonan_keberatan));
        $this->createNotification($permohonan_keberatan);
    }
}
