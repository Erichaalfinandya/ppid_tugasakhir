<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\SekretarisPemerintah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SekretarisPemerintahController extends Controller
{
    public function index()
    {
        $sekretarispemerintah = SekretarisPemerintah::first(); // Mengambil data pertama, ganti sesuai kebutuhan
        return view('admin.Profil.Pemerintah.sekretarispemerintah', compact('sekretarispemerintah'));
    }

    public function edit($id)
    {
        $sekretarispemerintah = SekretarisPemerintah::findOrFail($id);
        return view('admin.Profil.Pemerintah.sekretarispemerintah', compact('sekretarispemerintah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'ttl' => 'required|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // Pecah TTL menjadi kota lahir dan tanggal lahir
         $ttl = explode(', ', $request->ttl);
        if (count($ttl) == 2) {
            $kota_lahir = trim($ttl[0]);
            $tanggal_lahir = date('Y-m-d', strtotime(trim($ttl[1]))); // Ubah format tanggal lahir ke format Y-m-d
        } else {
            return redirect()->back()->withErrors(['ttl' => 'Format TTL tidak valid. Harus dalam format "Kota, Tanggal Lahir".']);
        }

         // Simpan data baru
         $sekretarispemerintah = new SekretarisPemerintah;
         $sekretarispemerintah->nama = $request->nama;
         $sekretarispemerintah->deskripsi = $request->deskripsi;
         $sekretarispemerintah->alamat = $request->alamat;
         $sekretarispemerintah->kota_lahir = trim($kota_lahir);
         $sekretarispemerintah->tanggal_lahir = trim($tanggal_lahir);

        if ($request->hasFile('sampul')) {
            $fileName = time().'.'.$request->sampul->extension();
            $request->sampul->move(public_path('upload'), $fileName);
            $sekretarispemerintah->sampul = $fileName;
        }

        try {
            $sekretarispemerintah->save();
            return redirect()->route('sekretaris_pemerintah.index')->with('success', 'Data sekretaris pemerintah kota surakarta berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'ttl' => 'required|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Pecah TTL menjadi kota lahir dan tanggal lahir
        $ttl = explode(', ', $request->ttl);
        if (count($ttl) == 2) {
            $kota_lahir = trim($ttl[0]);
            $tanggal_lahir = date('Y-m-d', strtotime(trim($ttl[1])));
        } else {
            return redirect()->back()->withErrors(['ttl' => 'Format TTL tidak valid. Harus dalam format "Kota, Tanggal Lahir".']);
        }

        $sekretarispemerintah = SekretarisPemerintah::first();
        $sekretarispemerintah->nama = $request->nama;
        $sekretarispemerintah->deskripsi = $request->deskripsi;
        $sekretarispemerintah->alamat = $request->alamat;
        $sekretarispemerintah->kota_lahir = trim($kota_lahir);
        $sekretarispemerintah->tanggal_lahir = trim($tanggal_lahir);

        // Proses upload file jika ada
        if ($request->hasFile('sampul')) {
            if ($sekretarispemerintah->sampul) {
                Storage::delete(public_path('upload/' . $sekretarispemerintah->sampul)); // Hapus gambar lama
            }

            $fileName = time() . '.' . $request->sampul->extension();
            $request->sampul->move(public_path('upload'), $fileName);
            $sekretarispemerintah->sampul = $fileName;
        }

        try {
            $sekretarispemerintah->save();
            return redirect()->route('sekretaris_pemerintah.index')->with('success', 'Data sekretaris pemerintah kota surakarta berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
