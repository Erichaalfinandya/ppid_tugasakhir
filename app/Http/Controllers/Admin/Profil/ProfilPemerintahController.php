<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\ProfilPemerintah;
use Illuminate\Http\Request;

class ProfilPemerintahController extends Controller
{
    public function showProfil()
    {
        // Mengambil data dari tabel ProfilPemerintah
        $pemerintah = ProfilPemerintah::first();
        
        // Mengirim data ke view 'pages.profil.profilpemerintah'
        return view('pages.profil.profilpemerintah', compact('pemerintah'));
    }

    public function index()
    {
        // Mengambil data profil pemerintah, hanya ada satu data dengan ID 1
        $pemerintah = ProfilPemerintah::first();
        // Menampilkan form profil dengan data yang ada
        return view('admin.Profil.Pemerintah.profil', compact('pemerintah'));
    }

    public function store(Request $request)
    {
        $existingData = ProfilPemerintah::first();
        if ($existingData) {
            // Jika data sudah ada, kembalikan pesan error
            return redirect()->route('profil_pemerintah.index')->with('error', 'Data Profil Pemerintah sudah ada. Anda hanya bisa mengubah data yang ada.');
        }
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_visi' => 'required|string',
            'gambar_visi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_misi' => 'required|string',
            'gambar_misi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan data baru
        $pemerintah = new ProfilPemerintah;

        $pemerintah->judul = $request->judul;
        $pemerintah->deskripsi_visi = $request->deskripsi_visi;
        $pemerintah->deskripsi_misi = $request->deskripsi_misi;

        if ($request->hasFile('gambar_visi')) {
            $fileName = time().'.'.$request->gambar_visi->extension();
            $request->gambar_visi->move(public_path('upload'), $fileName);
            $pemerintah->gambar_visi = $fileName;
        }

        if ($request->hasFile('gambar_misi')) {
            $fileName = time().'.'.$request->gambar_misi->extension();
            $request->gambar_misi->move(public_path('upload'), $fileName);
            $pemerintah->gambar_misi = $fileName;
        }

        $pemerintah->save();

        return redirect()->route('profil_pemerintah.index')->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_visi' => 'required|string',
            'gambar_visi' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'deskripsi_misi' => 'required|string',
            'gambar_misi' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        // Update data yang ada
        $pemerintah = ProfilPemerintah::first();

        $pemerintah->judul = $request->judul;
        $pemerintah->deskripsi_visi = $request->deskripsi_visi;
        $pemerintah->deskripsi_misi = $request->deskripsi_misi;

        if ($request->hasFile('gambar_visi')) {
            $fileName = time().'.'.$request->gambar_visi->extension();
            $request->gambar_visi->move(public_path('upload'), $fileName);
            $pemerintah->gambar_visi = $fileName;
        }

        if ($request->hasFile('gambar_misi')) {
            $fileName = time().'.'.$request->gambar_misi->extension();
            $request->gambar_misi->move(public_path('upload'), $fileName);
            $pemerintah->gambar_misi = $fileName;
        }

        $pemerintah->save();

        return redirect()->route('profil_pemerintah.index')->with('success', 'Data berhasil diperbarui.');
    }
}
