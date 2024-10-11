<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\PendidikanSekretaris;
use Illuminate\Http\Request;

class PendidikanSekretarisController extends Controller
{
    public function index()
    {
        $pendidikansekretaris = PendidikanSekretaris::all(); // Ambil data dari model
        return view('admin.Profil.Pemerintah.pendidikansekretaris', compact('pendidikansekretaris'));
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
       $pendidikansekretaris = new PendidikanSekretaris();
       $pendidikansekretaris->jenjang = $request->jenjang;
       $pendidikansekretaris->pendidikan = $request->pendidikan;
       $pendidikansekretaris->deskripsi = $request->deskripsi;
       $pendidikansekretaris->penerbit = $request->penerbit;
    
       $pendidikansekretaris->save();
       return redirect()->route('pendidikan_sekretaris.index')->with('success', 'Riwayat pendidikan sekretaris pemerintah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendidikansekretaris = PendidikanSekretaris::findOrFail($id);
        return view('admin.Profil.Pemerintah.pendidikansekretaris-edit', compact('pendidikansekretaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang' => 'required|in:SD,SMP,SMA,Diploma,S1,S2',
            'pendidikan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:65535',
            'penerbit' => 'required|string|max:255',
        ]);

        $pendidikansekretaris = PendidikanSekretaris::findOrFail($id);

        // Update data
        $pendidikansekretaris->jenjang = $request->jenjang;
        $pendidikansekretaris->pendidikan = $request->pendidikan;
        $pendidikansekretaris->deskripsi = $request->deskripsi;
        $pendidikansekretaris->penerbit = $request->penerbit;

        $pendidikansekretaris->save();
        return redirect()->route('pendidikan_sekretaris.index')->with('success', 'Riwayat pendidikan sekretaris pemerintah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendidikansekretaris = PendidikanSekretaris::findOrFail($id);
        $pendidikansekretaris->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('pendidikan_sekretaris.index');
    }
}
