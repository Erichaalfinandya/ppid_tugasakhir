<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PendidikanWalikota;
use Illuminate\Http\Request;

class PendidikanWalikotaController extends Controller
{
    public function index()
    {
        $pendidikanwalikota = PendidikanWalikota::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.pendidikanwalikota', compact('pendidikanwalikota'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'pendidikan' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'deskripsi' => 'required|string|max:65535',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penerbit' => 'required|string|max:255',
        ]);

       // Simpan data
       $pendidikanwalikota = new PendidikanWalikota();
       $pendidikanwalikota->pendidikan = $request->pendidikan;
       $pendidikanwalikota->tahun = $request->tahun;
       $pendidikanwalikota->deskripsi = $request->deskripsi;
       $pendidikanwalikota->penerbit = $request->penerbit;

       if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $pendidikanwalikota->sampul = 'upload/' . $sampulName;
        }
    
       $pendidikanwalikota->save();
       return redirect()->route('pendidikan_walikota.index')->with('success', 'Riwayat Posisi Walikota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendidikanwalikota = PendidikanWalikota::findOrFail($id);
        return view('admin.Profil.Pemerintah.pendidikanwalikota-edit', compact('pendidikanwalikota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pendidikan' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'deskripsi' => 'required|string|max:65535',
            'sampul' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'penerbit' => 'required|string|max:255',
        ]);

        $pendidikanwalikota = PendidikanWalikota::find($id);

        // Update data
        $pendidikanwalikota->pendidikan = $request->pendidikan;
        $pendidikanwalikota->tahun = $request->tahun;
        $pendidikanwalikota->deskripsi = $request->deskripsi;
        $pendidikanwalikota->penerbit = $request->penerbit;

         // Handle sampul upload
         if ($request->hasFile('sampul')) {
            // Delete old sampul if exists
            if ($pendidikanwalikota->sampul && file_exists(public_path('uploads/sampul/' . $pendidikanwalikota->sampul))) {
                unlink(public_path('upload/sampul/' . $pendidikanwalikota->sampul));
            }

            // Save new sampul
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $pendidikanwalikota->sampul = 'upload/' . $sampulName; // Menyimpan path lengkap
        }

        $pendidikanwalikota->save();
        return redirect()->route('pendidikan_walikota.index')->with('success', 'Riwayat Posisi Walikota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendidikanwalikota = PendidikanWalikota::findOrFail($id);
        $pendidikanwalikota->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('pendidikan_walikota.index');
    }
}
