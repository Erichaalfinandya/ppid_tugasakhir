<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PekerjaanWakil;
use Illuminate\Http\Request;

class PekerjaanWakilController extends Controller
{
    public function index()
    {
        $pekerjaanwakil = PekerjaanWakil::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.pekerjaanwakil', compact('pekerjaanwakil'));
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
       $pekerjaanwakil = new PekerjaanWakil();
       $pekerjaanwakil->masa = $request->masa;
       $pekerjaanwakil->jabatan = $request->jabatan;
       $pekerjaanwakil->deskripsi = $request->deskripsi;
       $pekerjaanwakil->penerbit = $request->penerbit;
    
       $pekerjaanwakil->save();
       return redirect()->route('pekerjaan_wakil.index')->with('success', 'Riwayat Pekerjaan Wakil Walikota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pekerjaanwakil = PekerjaanWakil::findOrFail($id);
        return view('admin.Profil.Pemerintah.pekerjaanwakil-edit', compact('pekerjaanwakil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'masa' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

        $pekerjaanwakil = PekerjaanWakil::findOrFail($id);

        // Update data
        $pekerjaanwakil->masa = $request->masa;
        $pekerjaanwakil->jabatan = $request->jabatan;
        $pekerjaanwakil->deskripsi = $request->deskripsi;
        $pekerjaanwakil->penerbit = $request->penerbit;

        $pekerjaanwakil->save();
        return redirect()->route('pekerjaan_wakil.index')->with('success', 'Riwayat Pekerjaan Wakil Walikota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pekerjaanwakil = PekerjaanWakil::findOrFail($id);
        $pekerjaanwakil->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('pekerjaan_wakil.index');
    }
}
