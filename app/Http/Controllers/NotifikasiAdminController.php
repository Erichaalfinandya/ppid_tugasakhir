<?php

namespace App\Http\Controllers\Admin\Notifikasi;

use App\Models\User;
use App\Models\Permohonan;
use App\Mail\ProsesTindakLanjutMail;
use App\Mail\ProsesVerifikasiMail;
use App\Mail\BeriTanggapanMail;
use App\Mail\SelesaiMail;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\NotifikasiAdmin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\TahapanUpdated; 
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class NotifikasiAdminController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan notifikasi admin
        return view('notifikasiAdmin'); // Pastikan view yang benar
    }

    public function edit($id)
    {
        $notifikasi = Notifikasi::find($id);

        // Pastikan $notifikasi tidak null
        if (!$notifikasi) {
            abort(404, 'Notifikasi tidak ditemukan');
        }

        return view('admin.notifikasi.edit', compact('notifikasi'));
    }

    public function getApprovedRequests(Request $request)
    {
        // Simpan URL saat ini di session
        $request->session()->put('previous_url', $request->fullUrl());

        // Mengambil data dengan status 'Disetujui'
        $datas = Notifikasi::where('status', 'Disetujui')->get();
        return view('admin.notifikasi.index', compact('datas'));
    }

    // public function updateTahapan(Request $request, $id)
    // {
    //     $notifikasi = Notifikasi::find($id);

    //     if (!$notifikasi) {
    //         return redirect()->back()->with('error', 'Notifikasi tidak ditemukan');
    //     }

    //     $validatedData = $request->validate([
    //         'tahapan' => 'required|string',
    //     ]);

    //     $notifikasi->tahapan = $validatedData['tahapan'];
    //     $notifikasi->save();

    //     return redirect()->back()->with('success', 'Tahapan berhasil diperbarui');
    // }

    private function sendEmailBasedOnTahapan($permohonan, $tahapan)
    {
        $user = $permohonan->user;

        switch ($tahapan) {
            case 'Proses Verifikasi':
                Mail::to($user->email)->send(new ProsesVerifikasiMail($permohonan));
                break;

            case 'Proses Tindak Lanjut':
                Mail::to($user->email)->send(new ProsesTindakLanjutMail($permohonan));
                break;

            case 'Beri Tanggapan':
                Mail::to($user->email)->send(new BeriTanggapanMail($permohonan));
                break;

            case 'Selesai':
                Mail::to($user->email)->send(new SelesaiMail($permohonan));
                break;

            default:
                // Lakukan tindakan default jika perlu
                break;
        }
    }
    public function uploadJawaban(Request $request, $id)
    {
        dd('jawaban');
        $request->validate([
            'jawaban' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png,mp3,mp4|max:5120', // 5MB
        ]);
    
        $data = Notifikasi::find($id);
        
        if ($request->hasFile('jawaban')) {
            $file = $request->file('jawaban');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            
            // Save file path to the database
            $data->jawaban = $filename;
            $data->save();
        }
    
        return redirect()->back()->with('success', 'File berhasil diunggah!');
    }
    
}
    