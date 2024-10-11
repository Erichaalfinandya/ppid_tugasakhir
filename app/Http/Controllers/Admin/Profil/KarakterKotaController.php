<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\KarakterKota;
use Illuminate\Http\Request;

class KarakterKotaController extends Controller
{
    public function index()
    {
        $karakterkota = KarakterKota::all();
        return view('admin.Profil.Pemerintah.karakterkota', compact('karakterkota'));
    }

    public function create()
    {
        return view('karakter_kota.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penerbit' => 'required|string|max:255',
        ]);
    
        $karakterkota = new KarakterKota();
        $karakterkota->kategori = $request->kategori;
        $karakterkota->deskripsi = $request->deskripsi;
        $karakterkota->penerbit = $request->penerbit;
        $karakterkota->save();
        return redirect()->route('karakter_kota.index')->with('success', 'Karakter Kota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karakterkota = KarakterKota::findOrFail($id);
        return view('admin.Profil.Pemerintah.karakterkota-edit', compact('karakterkota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penerbit' => 'required|string|max:255',
        ]);

        $karakterkota = KarakterKota::find($id);

        if (!$karakterkota) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Update fields
        $karakterkota->kategori = $request->kategori;
        $karakterkota->deskripsi = $request->deskripsi;
        $karakterkota->penerbit = $request->penerbit;

        // Save the updated data
        $karakterkota->save();
        return redirect()->route('karakter_kota.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karakterkota = KarakterKota::findOrFail($id);
        $karakterkota->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('karakter_kota.index');
    }
}

