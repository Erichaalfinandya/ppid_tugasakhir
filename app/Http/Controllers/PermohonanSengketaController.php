<?php

namespace App\Http\Controllers;

use App\Mail\PengajuanInformasiSengketaMail;
use App\Mail\ProsesVerifikasiSengketaMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanSengketa;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Models\StatusPenyelesaianSengketa;
use Illuminate\Support\Facades\DB; 

class PermohonanSengketaController extends Controller
{
    public function showFormulir()
    {
        // Ambil data profil pengguna
        $user = Auth::user(); 
        $profileData = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select(
                'biodatas.nama_lengkap',
                'biodatas.nik',
                'biodatas.ktp',
                'biodatas.tanggal_lahir',    
                'users.email',
                'biodatas.alamat',
                'biodatas.telp'
            )
            ->where('users.id', $user->id)
            ->first();


        return view('pages.kontak.formulirsengketa', compact('user', 'profileData'));
    }

    public function show($id)
    {
        $permohonan = PermohonanSengketa::find($id);

        if (!$permohonan) {
            return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
        }

        return view('pages.kontak.formulirsengketa', compact('permohonan'));
    }

    public function simpanSengketa(Request $request)
    {
        // Validasi incoming request
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'ttl' => 'required|string',
            'nik' => 'required|digits:16',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'nomortelepon' => 'required|regex:/^[0-9]{9,15}$/',
            'pekerjaan' => 'required|string',
            'alasan_sengketa' => 'required|string',
            'tuntutanpemohon' => 'required|string',
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

        // simpan data permohonan sengketa ke dalam database
        $permohonansengketa = PermohonanSengketa::create([
            'user_id' => auth()->id(),
            'nama' => $request->input('nama'),
            'ttl' => $request->input('ttl'),
            'nik' => $request->input('nik'),
            'ktp' => $ktpPath,
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nomortelepon' => $request->input('nomortelepon'),
            'pekerjaan' => $request->input('pekerjaan'),
            'alasan_sengketa' => $request->input('alasan_sengketa'),
            'tuntutanpemohon' => $request->input('tuntutanpemohon'),
            'status' => 'Proses', //set default ke Proses
        ]);

        $permohonanExists = DB::table('permohonan')->where('id', $permohonansengketa->id)->exists();

        if (!$permohonanExists) {
            return redirect()->back()->withErrors(['error' => 'Permohonan tidak ditemukan.']);
        }

        // Kirim email konfirmasi pengajuan
        Mail::to($validatedData['email'])->send(new PengajuanInformasiSengketaMail($permohonansengketa));
        $this->createNotification($permohonansengketa);
    
        // Kirim email verifikasi
        $verifikasiDetails = [
            'nama' => $validatedData['nama'],
        ];
        Mail::to($validatedData['email'])->send(new ProsesVerifikasiSengketaMail($verifikasiDetails));
        $this->createNotificationverifikasi($permohonansengketa);

        // Simpan status permohonan
        StatusPenyelesaianSengketa::create([
            'permohonan_id' => $permohonansengketa->id,
            'status' => 'Proses', // Default status Proses
        ]);
    
        return redirect()->route('permohonansengketa.formulir')->with('success', 'Permohonan Penyelesaian Sengketa berhasil diajukan');
    }

    protected function createNotification($permohonansengketa)
    {
        // Create notification for admin
        // Create notification for admin using the model
        Notification::create([
            'user_id' => $permohonansengketa->user_id,
            'title' => 'Pengajuan Penyelesaian Sengketa',
            'message' => 'Pengajuan Penyelesaian Sengketa dengan ID ' . $permohonansengketa->id . ' telah berhasil terkirim, dan sedang dalam proses.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    protected function createNotificationverifikasi($permohonansengketa)
    {
        Notification::create([
            'user_id' => $permohonansengketa->user_id,
            'title' => 'Proses Verifikasi',
            'message' => 'Pengajuan Penyelesaian Sengketa dengan ID ' . $permohonansengketa->id . ' dalam proses verifikasi oleh admin. Tunggu Dalam waktu 3 hari, laporan Anda akan diverifikasi.',
            'read_at' => null, // Default to null for unread notifications
        ]);
    }

    public function sendVerificationEmail($id)
    {
        $permohonansengketa = PermohonanSengketa::findOrFail($id);
        $userEmail = $permohonansengketa->email;

        // Kirim email verifikasi
        Mail::to($userEmail)->send(new ProsesVerifikasiSengketaMail($permohonansengketa));

        return back()->with('success', 'Email verifikasi berhasil dikirim');
    }

    public function getApprovedRequests()
    {
        // Mengambil semua data permohonan yang statusnya 'Disetujui'
        $datas = PermohonanSengketa::where('status', 'Disetujui')->get();

        // Mengirimkan data ke view
        return view('notifikasiAdminSengketa', compact('datas'));
    }
}
