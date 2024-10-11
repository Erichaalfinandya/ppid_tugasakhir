<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\MisiPemerintah;
use Illuminate\Http\Request;

class MisiPemerintahController extends Controller
{
    public function index() // Tampilkan data di halaman admin untuk mengelola laporan keuangan
    {
        $misipemerintah = MisiPemerintah::all();
        return view('admin.Profil.Pemerintah.misipemerintah', compact('misipemerintah'));
    }

    public function publicIndex()
    {
        $misipemerintah = MisiPemerintah::all(); 
        return view('pages.profil.profilpemerintah', compact('misipemerintah'));
    }

    public function create()
    {
        return view('misi_pemerintah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'urutan' => 'required|integer',
            'misi' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
        ]);

       // Simpan data
       $misipemerintah = new MisiPemerintah();
       $misipemerintah->urutan = $request->urutan;
       $misipemerintah->misi = $request->misi;
       $misipemerintah->penerbit = $request->penerbit;
       $misipemerintah->save();
       return redirect()->route('misi_pemerintah.index')->with('success', 'Misi Kota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $misipemerintah = MisiPemerintah::findOrFail($id);
        return view('admin.Profil.Pemerintah.misipemerintah-edit', compact('misipemerintah'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'urutan' => 'required|integer',
            'misi' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
        ]);

        $misipemerintah = MisiPemerintah::find($id);

        if (!$misipemerintah) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Konversi urutan ke ejaan
        $ejaan = konversiUrutanKeKata($request->urutan);

        // Update data
        $misipemerintah->urutan = (int) $request->urutan;  // Explicit cast ke integer
        $misipemerintah->misi = $request->misi;
        $misipemerintah->penerbit = $request->penerbit;
        $misipemerintah->save();
        return redirect()->route('misi_pemerintah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $misipemerintah = MisiPemerintah::findOrFail($id);
        $misipemerintah->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('misi_pemerintah.index');
    }
}
