<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index() // Tampilkan data di halaman admin untuk mengelola laporan keuangan
    {
        $keuangans = LaporanKeuangan::all();
        return view('admin.Laporan.Laporan_Pemerintah.laporankeuangan', compact('keuangans'));
    }

    public function publicIndex()
    {
        $keuangans = LaporanKeuangan::all(); // Tampilkan data di halaman publik (laporankeuangan.blade.php)
        return view('pages.laporan.laporankeuangan', compact('keuangans'));
    }

    public function create()
    {
        return view('laporan_keuangan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
            'sampul' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $keuangan = new LaporanKeuangan();
        $keuangan->judul = $request->judul;
        $keuangan->deskripsi = $request->deskripsi;
        $keuangan->tahun = $request->tahun;
        $keuangan->penerbit = $request->penerbit;
    
        if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $keuangan->sampul = 'upload/' . $sampulName;
        }
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            $keuangan->file = 'upload/' . $fileName;
        }        
    
        $keuangan->save();
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporankeuangan = LaporanKeuangan::findOrFail($id);
        return view('admin.Laporan.Laporan_Pemerintah.laporankeuangan-edit', compact('laporankeuangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $laporankeuangan = LaporanKeuangan::find($id);

        if (!$laporankeuangan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Update fields
        $laporankeuangan->judul = $request->judul;
        $laporankeuangan->deskripsi = $request->deskripsi;
        $laporankeuangan->tahun = $request->tahun;
        $laporankeuangan->penerbit = $request->penerbit;

        // Handle sampul upload
        if ($request->hasFile('sampul')) {
            // Delete old sampul if exists
            if ($laporankeuangan->sampul && file_exists(public_path('uploads/sampul/' . $laporankeuangan->sampul))) {
                unlink(public_path('upload/sampul/' . $laporankeuangan->sampul));
            }

            // Save new sampul
            $fileName = time().'.'.$request->sampul->extension();
            $request->sampul->move(public_path('uploads/sampul'), $fileName);
            $laporankeuangan->sampul = $fileName;
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($laporankeuangan->file && file_exists(public_path('uploads/files/' . $laporankeuangan->file))) {
                unlink(public_path('upload/' . $laporankeuangan->file));
            }

            // Save new file
            $fileDocument = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/'), $fileDocument);
            $laporankeuangan->file = $fileDocument;
        }

        // Save the updated data
        $laporankeuangan->save();

        return redirect()->route('laporan_keuangan.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $keuangan = LaporanKeuangan::findOrFail($id);
        $keuangan->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('laporan_keuangan.index');
    }
}
