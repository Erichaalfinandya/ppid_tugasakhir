<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FormSengketa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormSengketaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            // 'ktp_pribadi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'nama_kuasa' => 'nullable|string|max:255',
            'alamat_kuasa' => 'nullable|string|max:255',
            'nomor_telepon_kuasa' => 'nullable|string|max:255',
            'nama_badan_publik' => 'required|string|max:255',
            'alamat_badan_publik' => 'required|string',
            'informasi_dimohon' => 'required|string',
            'jawaban_permohonan_informasi' => 'required|string',
            'alasan_keberatan' => 'required|string',
            'tanggapan_keberatan' => 'required|string',
            'alasan_pengajuan_keberatan' => 'required|array',
            'tuntutan_pemohon' => 'required|string',
            'dokumen_kelengkapan' => 'required|array',
        ]);

        // Simpan file KTP jika ada
        if ($request->hasFile('ktp_pribadi')) {
            $file = $request->file('ktp_pribadi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('formulir'), $fileName);
            $filePath = 'formulir/' . $fileName;;
        }

        // Buat entri FormSengketa
        FormSengketa::create([
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'nik' => $request->nik,
            'ktp_pribadi' => $filePath ?? null,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'pekerjaan' => $request->pekerjaan,
            'nama_kuasa' => $request->nama_kuasa,
            'alamat_kuasa' => $request->alamat_kuasa,
            'nomor_telepon_kuasa' => $request->nomor_telepon_kuasa,
            'nama_badan_publik' => $request->nama_badan_publik,
            'alamat_badan_publik' => $request->alamat_badan_publik,
            'informasi_dimohon' => $request->informasi_dimohon,
            'jawaban_permohonan_informasi' => $request->jawaban_permohonan_informasi,
            'alasan_keberatan' => $request->alasan_keberatan,
            'tanggapan_keberatan' => $request->tanggapan_keberatan,
            'alasan_pengajuan_keberatan' => json_encode($request->alasan_pengajuan_keberatan),
            'tuntutan_pemohon' => $request->tuntutan_pemohon,
            'dokumen_kelengkapan' => json_encode($request->dokumen_kelengkapan),
            'user_id' => Auth::id(), // Isi user_id dengan ID pengguna yang sedang login
        ]);

        return redirect()->back()->with('success', 'Formulir berhasil diajukan.');
    }
}
