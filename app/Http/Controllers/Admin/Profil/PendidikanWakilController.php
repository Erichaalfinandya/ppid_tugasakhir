<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PendidikanWakil;
use Illuminate\Http\Request;

class PendidikanWakilController extends Controller
{
    public function index()
    {
        $pendidikanwakil = PendidikanWakil::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.pendidikanwakil', compact('pendidikanwakil'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'jenjang' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

       // Simpan data
       $pendidikanwakil = new PendidikanWakil();
       $pendidikanwakil->jenjang = $request->jenjang;
       $pendidikanwakil->pendidikan = $request->pendidikan;
       $pendidikanwakil->deskripsi = $request->deskripsi;
       $pendidikanwakil->penerbit = $request->penerbit;
    
       $pendidikanwakil->save();
       return redirect()->route('pendidikan_wakil.index')->with('success', 'Riwayat Pendidikan Wakil Walikota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendidikanwakil = PendidikanWakil::findOrFail($id);
        return view('admin.Profil.Pemerintah.pendidikanwakil-edit', compact('pendidikanwakil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang' => 'required|in:SD,SMP,SMA,Diploma,S1,S2',
            'pendidikan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

        $pendidikanwakil = PendidikanWakil::findOrFail($id);

        // Update data
        $pendidikanwakil->jenjang = $request->jenjang;
        $pendidikanwakil->pendidikan = $request->pendidikan;
        $pendidikanwakil->deskripsi = $request->deskripsi;
        $pendidikanwakil->penerbit = $request->penerbit;

        $pendidikanwakil->save();
        return redirect()->route('pendidikan_wakil.index')->with('success', 'Riwayat Pendidikan Wakil Walikota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendidikanwakil = PendidikanWakil::findOrFail($id);
        $pendidikanwakil->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('pendidikan_wakil.index');
    }
}
