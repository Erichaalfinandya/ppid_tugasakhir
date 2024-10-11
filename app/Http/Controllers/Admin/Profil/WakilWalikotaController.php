<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\WakilWalikota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WakilWalikotaController extends Controller
{
    public function index()
    {
        $wakilwalikota = WakilWalikota::first(); // Mengambil data pertama, ganti sesuai kebutuhan
        return view('admin.Profil.Pemerintah.wakilwalikota', compact('wakilwalikota'));
    }

    public function edit($id)
    {
        $wakilwalikota = WakilWalikota::findOrFail($id);
        return view('admin.Profil.Pemerintah.wakilwalikota', compact('wakilwalikota'));
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
         $wakilwalikota = new WakilWalikota;
         $wakilwalikota->nama = $request->nama;
         $wakilwalikota->deskripsi = $request->deskripsi;
         $wakilwalikota->alamat = $request->alamat;
         $wakilwalikota->kota_lahir = trim($kota_lahir);
         $wakilwalikota->tanggal_lahir = trim($tanggal_lahir);

        if ($request->hasFile('sampul')) {
            $fileName = time().'.'.$request->sampul->extension();
            $request->sampul->move(public_path('upload'), $fileName);
            $wakilwalikota->sampul = $fileName;
        }

        try {
            $wakilwalikota->save();
            return redirect()->route('wakil_walikota.index')->with('success', 'Data Wakil Walikota berhasil disimpan.');
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

        $wakilwalikota = WakilWalikota::first();
        $wakilwalikota->nama = $request->nama;
        $wakilwalikota->deskripsi = $request->deskripsi;
        $wakilwalikota->alamat = $request->alamat;
        $wakilwalikota->kota_lahir = trim($kota_lahir);
        $wakilwalikota->tanggal_lahir = trim($tanggal_lahir);

        // Proses upload file jika ada
        if ($request->hasFile('sampul')) {
            if ($wakilwalikota->sampul) {
                Storage::delete(public_path('upload/' . $wakilwalikota->sampul)); // Hapus gambar lama
            }

            $fileName = time() . '.' . $request->sampul->extension();
            $request->sampul->move(public_path('upload'), $fileName);
            $wakilwalikota->sampul = $fileName;
        }

        try {
            $wakilwalikota->save();
            return redirect()->route('wakil_walikota.index')->with('success', 'Data Wakil Walikota berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }
}
