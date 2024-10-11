<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\WalikotaPemerintah;
use Illuminate\Http\Request;

class WalikotaPemerintahController extends Controller
{
    public function index()
    {
        // Mengambil data profil pemerintah, hanya ada satu data dengan ID 1
        $walikota = WalikotaPemerintah::first();
        // Menampilkan form profil dengan data yang ada
        return view('admin.Profil.Pemerintah.walikota', compact('walikota'));
    }

    public function profilPemerintah()
    {
        // Mengambil data walikota
        $walikota = WalikotaPemerintah::first();
        // Menampilkan view profil pemerintah dengan data walikota
        return view('pages.profil.profilpemerintah', compact('walikota'));
    }

    public function store(Request $request)
    {
        $existingData = WalikotaPemerintah::first();
        if ($existingData) {
            // Jika data sudah ada, kembalikan pesan error
            return redirect()->route('walikota_pemerintah.index')->with('error', 'Data Profil Pemerintah sudah ada. Anda hanya bisa mengubah data yang ada.');
        }
        $request->validate([
            'nama' => 'required|string|max:255',
            'sampulutama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan data baru
        $walikota = new WalikotaPemerintah;
        $walikota->nama = $request->nama;

        if ($request->hasFile('sampulutama')) {
            $file = $request->file('sampulutama');
            $filename = time() . '_sampulutama.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $walikota->sampulutama = $filename; // Save the path to the database
        }
    
        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $filename = time() . '_sampul.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $walikota->sampul = $filename; // Save the path to the database
        }

        $walikota->save();

        return redirect()->route('walikota_pemerintah.index')->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'sampulutama' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'sampul' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        // Update data yang ada
        $walikota = WalikotaPemerintah::first();
        $walikota->nama = $request->nama;

        if ($request->hasFile('sampulutama')) {
            $fileName = time().'.'.$request->sampulutama->extension();
            $request->sampulutama->move(public_path('upload'), $fileName);
            $walikota->sampulutama = $fileName;
        }

        if ($request->hasFile('sampul')) {
            $fileName = time().'.'.$request->sampul->extension();
            $request->sampul->move(public_path('upload'), $fileName);
            $walikota->sampul = $fileName;
        }

        $walikota->save();
        return redirect()->route('walikota_pemerintah.index')->with('success', 'Data berhasil diperbarui.');
    }
}
