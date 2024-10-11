<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanInformasiMail;
use App\Mail\ProsesVerifikasiMail;
use App\Models\Permohonan;
use App\Models\StatusLayananInformasi;
use App\Models\biodata;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    // Menampilkan halaman formulir permohonan
    public function showFormulir()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu untuk mengajukan permohonan.');
        }
        
        // Ambil data profil pengguna
        $user = Auth::user(); 
        $profileData = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'biodatas.nama_lengkap',
                'biodatas.nik',
                'biodatas.ktp',
                'users.email',
                'biodatas.alamat',
                'biodatas.telp'
            )
            ->where('users.id', $user->id)
            ->first();

        return view('pages.kontak.formulirpermohonan', compact('user', 'profileData'));
    }

    // Menyimpan data permohonan dari formulir
    public function simpanPermohonan(Request $request)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'kategoripermohonan' => 'required|string|in:Perorangan,Lembaga/organisasi,Kelompok Orang',
            'nik' => 'required|digits:16',
            'nama' => 'required|string',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB for image file
            'alamat' => 'required|string',
            'email' => 'required|email',
            'nomortelepon' => 'required|regex:/^[0-9]{9,15}$/',
            'pekerjaan' => 'required|string',
            'uploadsurat' => 'nullable|file|mimes:doc,docx,pdf|max:2048', // Diperlukan untuk kategori Lembaga/organisasi, atau Kelompok Orang
            'rincianinformasi' => 'required|string',
            'tujuaninformasi' => 'required|string',
            'mendapatkansalinan' => 'required|string',
            'caramendapatkansalinan' => 'required|string',
        ]);
    
        // Proses file upload untuk KTP
        $ktpPath = null;
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktpName = time() . '.' . $ktp->getClientOriginalExtension();
            $ktpPath = public_path('/ktp_user');
            $ktp->move($ktpPath, $ktpName);
            $ktpPath = 'ktp_user/' . $ktpName; // Simpan nama file dengan path relatif
        } else {
            // Ambil KTP yang tersimpan di profil pengguna
            $user = Auth::user();
            $biodata = $user->biodata; // Pastikan relasi 'biodata' ada pada model User

            // Cek apakah biodata ada
            if ($biodata) {
                $ktpPath = $biodata->ktp; // Ambil path file KTP dari profil pengguna
            } else {
                // Jika biodata tidak ada, berikan path default atau beri pesan error
                $ktpPath = 'default/path/to/ktp';
                // Anda bisa menambahkan logika tambahan untuk menangani kasus ini, seperti mengarahkan pengguna untuk melengkapi biodata
            }
        }

         // Proses file upload untuk surat jika ada
         if ($request->hasFile('uploadsurat')) {
            $file = $request->file('uploadsurat'); // Simpan file ke direktori public/uploads
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validatedData['uploadsurat'] = $filename; // Update validatedData dengan nama file yang disimpan
        } else {
            $validatedData['uploadsurat'] = null;
        }

        // Simpan data permohonan ke dalam database
        $permohonan = Permohonan::create([
            'user_id' => auth()->user()->id, // Menyimpan user_id
            'kategoripermohonan' => $validatedData['kategoripermohonan'],
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'ktp' => $ktpPath,
            'alamat' => $validatedData['alamat'],
            'email' => $validatedData['email'],
            'nomortelepon' => $validatedData['nomortelepon'],
            'pekerjaan' => $validatedData['pekerjaan'],
            'uploadsurat' =>  $validatedData['uploadsurat'],
            'rincianinformasi' => $validatedData['rincianinformasi'],
            'tujuaninformasi' => $validatedData['tujuaninformasi'],
            'mendapatkansalinan' => $validatedData['mendapatkansalinan'],
            'caramendapatkansalinan' => $validatedData['caramendapatkansalinan'],
            'status' => 'Proses', // Set status default ke Proses
        ]);

        // Kirim email konfirmasi pengajuan
        Mail::to($validatedData['email'])->send(new PengajuanInformasiMail($permohonan));
        $this->createNotification($permohonan);

        // Kirim email verifikasi
        $verifikasiDetails = [
            'nama' => $validatedData['nama'],
        ];
        Mail::to($validatedData['email'])->send(new ProsesVerifikasiMail($verifikasiDetails));
        $this->createNotificationVerifikasi($permohonan);

        // Simpan status permohonan
        StatusLayananInformasi::create([
            'permohonan_id' => $permohonan->id,
            'status' => 'Proses', // Default status Proses
        ]);
    
        return redirect()->route('formulir.permohonan')->with('success', 'Permohonan berhasil diajukan');
    }

    public function sendVerificationEmail($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $userEmail = $permohonan->email; // Assuming you have an email field in Permohonan

        // Kirim email verifikasi
        Mail::to($userEmail)->send(new ProsesVerifikasiMail($permohonan));

        return back()->with('success', 'Email verifikasi berhasil dikirim');
    }
    
    public function updateStatus(Request $request, $id)     // Fungsi untuk memperbarui status
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->input('status');
        $permohonan->save();

        // Simpan juga status permohonan ke dalam tabel StatusLayananInformasi
        $statusLayananInformasi = StatusLayananInformasi::where('permohonan_id', $permohonan->id)->first();
        if ($statusLayananInformasi) {
            $statusLayananInformasi->status = $request->input('status'); // Pastikan 'status' sesuai dengan apa yang dikirim dari form atau request
            $statusLayananInformasi->save();
        }

        return redirect()->route('admin.status-layanan-informasi.update', ['id' => $statusLayananInformasi->id]);
    }

    public function updateStage(Request $request, $id)
    {
        DB::table('permohonan')
            ->where('id', $id)
            ->update([
                'status' => 'Disetujui',
                'current_stage' => 'Proses Verifikasi',
                'updated_at' => now()
            ]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function showUserDashboard()
    {
        $user_id = auth()->user()->id;
        $datas = Permohonan::where('user_id', $user_id)->get(); // Mengambil data permohonan milik user yang sedang login

        Log::info('Datas from database: ' . json_encode($datas));

        return view('user.status.status-layanan-informasi-user', compact('datas'));
    }

    public function getApprovedRequests()
    {
        // Mengambil semua data permohonan yang statusnya 'Disetujui'
        $datas = Permohonan::where('status', 'Disetujui')->get();

        // Mengirimkan data ke view
        return view('notifikasiAdmin', compact('datas'));
    }

    protected function createNotification($permohonan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonan->user_id,
            'title' => 'Status Pengajuan Berhasil',
            'message' => 'Pengajuan dengan ID ' . $permohonan->id . ' telah berhasil terkirim, dan sedang dalam proses.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationVerifikasi($permohonan)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonan->user_id,
            'title' => 'Proses Verifikasi',
            'message' => 'Pengajuan dengan ID ' . $permohonan->id . ' dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }
}