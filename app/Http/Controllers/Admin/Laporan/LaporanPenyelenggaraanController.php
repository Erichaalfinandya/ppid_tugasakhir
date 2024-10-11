<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanPenyelenggaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanPenyelenggaraanController extends Controller
{
    public function index()
    {
        $penyelenggaraans = LaporanPenyelenggaraan::all();
        return view('admin.Laporan.Laporan_Pemerintah.laporanpenyelenggaraan', compact('penyelenggaraans'));
    }

    public function publicIndex()
    {
        $penyelenggaraans = LaporanPenyelenggaraan::all(); // Tampilkan data di halaman publik (laporankinerja.blade.php)
        return view('pages.laporan.laporanpenyelenggaraan', compact('penyelenggaraans'));
    }

    public function create()
    {
        return view('laporan_penyelenggaraan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $penyelenggaraan = new LaporanPenyelenggaraan();
        $penyelenggaraan->keterangan = $request->keterangan;
        $penyelenggaraan->tahun = $request->tahun;
        $penyelenggaraan->penerbit = $request->penerbit;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            $penyelenggaraan ->file = 'upload/' . $fileName;
        }        
    
        $penyelenggaraan->save();
        return redirect()->route('laporan_penyelenggaraan.index')->with('success', 'Laporan Penyelenggaraan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporanpenyelenggaraan = LaporanPenyelenggaraan::findOrFail($id);
        return view('admin.Laporan.Laporan_Pemerintah.laporanpenyelenggaraan-edit', compact('laporanpenyelenggaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $laporanpenyelenggaraan = LaporanPenyelenggaraan::find($id);

        if ($request->hasFile('file')) {
            // Jika file baru diunggah, simpan file baru dan hapus file lama
            if ($laporanpenyelenggaraan->file && Storage::exists('public/' . $laporanpenyelenggaraan->file)) {
                Storage::delete('public/' . $laporanpenyelenggaraan->file);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('upload', $fileName, 'public');
            $laporanpenyelenggaraan->file = $filePath;
        }

        // Update fields
        $laporanpenyelenggaraan->keterangan = $request->keterangan;
        $laporanpenyelenggaraan->tahun = $request->tahun;
        $laporanpenyelenggaraan->penerbit = $request->penerbit;

        // Save the updated data
        $laporanpenyelenggaraan->save();
        return redirect()->route('laporan_penyelenggaraan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penyelenggaraan = LaporanPenyelenggaraan::findOrFail($id);
        $penyelenggaraan->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('laporan_penyelenggaraan.index');
    }
}
