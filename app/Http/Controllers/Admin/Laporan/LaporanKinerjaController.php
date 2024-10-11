<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanKinerja;
use Illuminate\Http\Request;

class LaporanKinerjaController extends Controller
{
    public function index()
    {
        $kinerjas = LaporanKinerja::all();
        return view('admin.Laporan.Laporan_Pemerintah.laporankinerja', compact('kinerjas'));
    }

    public function publicIndex()
    {
        $kinerjas = LaporanKinerja::all(); // Tampilkan data di halaman publik (laporankinerja.blade.php)
        return view('pages.laporan.laporankinerja', compact('kinerjas'));
    }

    public function create()
    {
        return view('laporan_kinerja.create');
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
    
        $kinerja = new LaporanKinerja();
        $kinerja->keterangan = $request->keterangan;
        $kinerja->tahun = $request->tahun;
        $kinerja->penerbit = $request->penerbit;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            $kinerja ->file = 'upload/' . $fileName;
        }        
    
        $kinerja->save();
        return redirect()->route('laporan_kinerja.index')->with('success', 'Laporan Kinerja berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporankinerja = LaporanKinerja::findOrFail($id);
        return view('admin.Laporan.Laporan_Pemerintah.laporankinerja-edit', compact('laporankinerja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $laporankinerja = LaporanKinerja::find($id);
        if (!$laporankinerja) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Update fields
        $laporankinerja->keterangan = $request->keterangan;
        $laporankinerja->tahun = $request->tahun;
        $laporankinerja->penerbit = $request->penerbit;

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($laporankinerja->file && file_exists(public_path('upload/' . $laporankinerja->file))) {
                unlink(public_path('upload/' . $laporankinerja->file));
            }

            // Save new file
            $fileDocument = time().'.'.$request->file->extension();
            $request->file->move(public_path('upload/'), $fileDocument);
            $laporankinerja->file = $fileDocument;
        }

        // Save the updated data
        $laporankinerja->save();
        return redirect()->route('laporan_kinerja.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kinerja = LaporanKinerja::findOrFail($id);
        $kinerja->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('laporan_kinerja.index');
    }
}
