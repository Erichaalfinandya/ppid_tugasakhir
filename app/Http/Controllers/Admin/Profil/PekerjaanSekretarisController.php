<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanSekretaris;
use Illuminate\Http\Request;

class PekerjaanSekretarisController extends Controller
{
    public function index()
    {
        $pekerjaansekretaris = PekerjaanSekretaris::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.pekerjaansekretaris', compact('pekerjaansekretaris'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'masa' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

       // Simpan data
       $pekerjaansekretaris = new PekerjaanSekretaris();
       $pekerjaansekretaris->masa = $request->masa;
       $pekerjaansekretaris->jabatan = $request->jabatan;
       $pekerjaansekretaris->deskripsi = $request->deskripsi;
       $pekerjaansekretaris->penerbit = $request->penerbit;
    
       $pekerjaansekretaris->save();
       return redirect()->route('pekerjaan_sekretaris.index')->with('success', 'Riwayat pekerjaan sekretaris pemerintah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pekerjaansekretaris = PekerjaanSekretaris::findOrFail($id);
        return view('admin.Profil.Pemerintah.pekerjaansekretaris-edit', compact('pekerjaansekretaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'masa' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

        $pekerjaansekretaris = PekerjaanSekretaris::findOrFail($id);

        // Update data
        $pekerjaansekretaris->masa = $request->masa;
        $pekerjaansekretaris->jabatan = $request->jabatan;
        $pekerjaansekretaris->deskripsi = $request->deskripsi;
        $pekerjaansekretaris->penerbit = $request->penerbit;

        $pekerjaansekretaris->save();
        return redirect()->route('pekerjaan_sekretaris.index')->with('success', 'Riwayat Pekerjaan sekretaris pemerintah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pekerjaansekretaris = PekerjaanSekretaris::findOrFail($id);
        $pekerjaansekretaris->delete();
        session()->flash('success', 'Data riwatar pekerjaan sekretaris berhasil dihapus');
        return redirect()->route('pekerjaan_sekretaris.index');
    }
}
