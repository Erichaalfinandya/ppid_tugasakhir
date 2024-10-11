<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PengajuanInformasiKeberatanMail;
use App\Mail\ProsesVerifikasiKeberatanMail;
use App\Models\PermohonanKeberatan;
use App\Models\StatusLayananKeberatanInformasi;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PermohonanKeberatanController extends Controller
{
    public function create()
    {
        // Logika untuk menampilkan form
        return view('pages.kontak.formulirkeberatan');
    }
    
    public function showFormulir(Request $request)
    {
        // Ambil data profil pengguna
        $user = Auth::user(); 
        $profileData = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'biodatas.nama_lengkap',
                'biodatas.nik',
                'users.email',
                'biodatas.alamat',
                'biodatas.telp'
            )
            ->where('users.id', $user->id)
            ->first();

            // Ambil kode permohonan dari query string
            $kodePermohonan = $request->query('kodepermohonan');

                return view('pages.kontak.formulirkeberatan', [
                'user' => $user,
                'profileData' => $profileData,
                'kodepermohonan' => $kodePermohonan
            ]);
    }

    public function simpanPermohonanKeberatan(Request $request)
    {        
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'kodepermohonan' => 'required|exists:permohonan,kodepermohonan',
            'nik' => 'required|string|max:20',
            'alasan_pengajuan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nomortelepon' => 'required|string|max:15',
            'email' => 'required|email',
            'alamat' => 'required|string|max:255',
            'kasusposisi' => 'required|string',
            'uploadsuratkeberatan' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('uploadsuratkeberatan')) {
            // Simpan file ke direktori public/uploads
            $file = $request->file('uploadsuratkeberatan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validatedData['uploadsuratkeberatan'] = $filename; // Update validatedData dengan nama file yang disimpan
        } else {
            $validatedData['uploadsuratkeberatan'] = null;
        }

        // Simpan data keberatan ke dalam database
        $permohonanKeberatan = PermohonanKeberatan::create([
            'user_id' => auth()->user()->id,
            'kodepermohonan' => $validatedData['kodepermohonan'],
            'nik' => $validatedData['nik'],
            'alasan_pengajuan' => $validatedData['alasan_pengajuan'],
            'nama' => $validatedData['nama'],
            'nomortelepon' => $validatedData['nomortelepon'],
            'email' => $validatedData['email'],
            'alamat' => $validatedData['alamat'],
            'kasusposisi' => $validatedData['kasusposisi'],
            'uploadsuratkeberatan' => $validatedData['uploadsuratkeberatan'],
            'status' => 'Proses', // Set status default ke Proses
        ]);        
        
        // Kirim email konfirmasi pengajuan
        Mail::to($validatedData['email'])->send(new PengajuanInformasiKeberatanMail($permohonanKeberatan));
        $this->createNotification($permohonanKeberatan);

        // Kirim email verifikasi
        $verifikasiDetails = [
            'nama' => $validatedData['nama'],
        ];
        Mail::to($validatedData['email'])->send(new ProsesVerifikasiKeberatanMail($verifikasiDetails));
        $this->createNotificationverifikasi($permohonanKeberatan);

        // Simpan status permohonan
        StatusLayananKeberatanInformasi::create([
            'permohonan_keberatan_id' => $permohonanKeberatan->id,
            'status' => 'Proses', // Default status Proses
        ]);
    
        return redirect()->route('formulir.permohonan-keberatan')->with('success', 'Pengajuan Keberatan Informasi berhasil diajukan');
    }

    protected function createNotification($permohonanKeberatan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonanKeberatan->user_id,
            'title' => 'Status Pengajuan Keberatan Berhasil',
            'message' => 'Pengajuan Keberatan dengan ID ' . $permohonanKeberatan->id . ' telah berhasil terkirim, dan sedang dalam proses.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationverifikasi($permohonanKeberatan)
    {
        Notification::create([
            'user_id' => $permohonanKeberatan->user_id,
            'title' => 'Proses Verifikasi',
            'message' => 'Pengajuan Keberatan dengan ID ' . $permohonanKeberatan->id . ' dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    public function sendVerificationEmail($id)
    {
        $permohonanKeberatan = PermohonanKeberatan::findOrFail($id);
        $userEmail = $permohonanKeberatan->email;

        // Kirim email verifikasi
        Mail::to($userEmail)->send(new ProsesVerifikasiKeberatanMail($permohonanKeberatan));

        return back()->with('success', 'Email verifikasi berhasil dikirim');
    }

    public function updateStatus(Request $request, $id)
    {
        $permohonanKeberatan = PermohonanKeberatan::findOrFail($id);
        $permohonanKeberatan->status = $request->input('status');
        $permohonanKeberatan->save();

        // Simpan juga status keberatan ke dalam tabel StatusLayananKeberatanInformasi
        $statusLayananKeberatan = StatusLayananKeberatanInformasi::where('permohonan_keberatan_id', $permohonanKeberatan->id)->first();
        if ($statusLayananKeberatan) {
            $statusLayananKeberatan->status = $request->input('status');
            $statusLayananKeberatan->save();
        } else {
            StatusLayananKeberatanInformasi::create([
                'permohonan_keberatan_id' => $permohonanKeberatan->id,
                'status' => $request->input('status'),
            ]);
        }

        return redirect()->route('admin.status-layanan-keberatan.update', ['id' => $statusLayananKeberatan->id]);
    }

    public function getApprovedRequests()
    {
        // Mengambil semua data permohonan yang statusnya 'Disetujui'
        $datas = PermohonanKeberatan::where('status', 'Disetujui')->get();

        // Mengirimkan data ke view
        return view('notifikasiAdminKeberatan', compact('datas'));
    }
}
