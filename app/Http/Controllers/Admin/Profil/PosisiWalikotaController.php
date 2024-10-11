<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PosisiWalikota;
use Illuminate\Http\Request;

class PosisiWalikotaController extends Controller
{
    public function index()
    {
        $posisiwalikota = PosisiWaliKota::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.posisiwalikota', compact('posisiwalikota'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'posisi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:65535',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penerbit' => 'required|string|max:255',
        ]);

       // Simpan data
       $posisiwalikota = new PosisiWalikota();
       $posisiwalikota->posisi = $request->posisi;
       $posisiwalikota->lokasi = $request->lokasi;
       $posisiwalikota->deskripsi = $request->deskripsi;
       $posisiwalikota->penerbit = $request->penerbit;

       if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $posisiwalikota->sampul = 'upload/' . $sampulName;
        }
    
       $posisiwalikota->save();
       return redirect()->route('posisi_walikota.index')->with('success', 'Riwayat Posisi Walikota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $posisiwalikota = PosisiWalikota::findOrFail($id);
        return view('admin.Profil.Pemerintah.posisiwalikota-edit', compact('posisiwalikota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'posisi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:65535',
            'sampul' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'penerbit' => 'required|string|max:255',
        ]);

        $posisiwalikota = PosisiWalikota::find($id);

        // Update data
        $posisiwalikota->posisi = $request->posisi;
        $posisiwalikota->lokasi = $request->lokasi;
        $posisiwalikota->deskripsi = $request->deskripsi;
        $posisiwalikota->penerbit = $request->penerbit;

         // Handle sampul upload
         if ($request->hasFile('sampul')) {
            // Delete old sampul if exists
            if ($posisiwalikota->sampul && file_exists(public_path('uploads/sampul/' . $posisiwalikota->sampul))) {
                unlink(public_path('upload/sampul/' . $posisiwalikota->sampul));
            }

            // Save new sampul
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $posisiwalikota->sampul = 'upload/' . $sampulName; // Menyimpan path lengkap
        }

        $posisiwalikota->save();
        return redirect()->route('posisi_walikota.index')->with('success', 'Riwayat Posisi Walikota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $posisiwalikota = PosisiWalikota::findOrFail($id);
        $posisiwalikota->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('posisi_walikota.index');
    }
}
