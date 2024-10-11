<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPpid;

class LaporanPpidController extends Controller
{
    public function index()
    {
        $laporans = LaporanPpid::all();
        return view('admin.Laporan.Laporan_PPID.laporanppid', compact('laporans'));

    }

    public function create()
    {
        return view('laporan_ppid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sampul' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
        ]);
    
        $laporan = new LaporanPpid();
        $laporan->judul = $request->judul;
        $laporan->tahun = $request->tahun;
        $laporan->penerbit = $request->penerbit;
    
        if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $laporan->sampul = 'upload/' . $sampulName;

            
        }
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            $laporan->file = 'upload/' . $fileName;
        }
    
        $laporan->save();
    
        return redirect()->route('laporan_ppid.index')->with('success', 'Laporan PPID berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporanppid = LaporanPpid::findOrFail($id);
        return view('admin.Laporan.Laporan_PPID.laporanppid-edit', compact('laporanppid'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sampul' => 'image|max:2048',
            'judul' => 'required|string|max:255',
            'file' => 'mimes:pdf|max:2048',
            'tahun' => 'required|numeric',
            'penerbit' => 'required|string|max:255',
        ]);

        $laporan = LaporanPpid::findOrFail($id);
        $laporan->judul = $request->judul;
        $laporan->tahun = $request->tahun;
        $laporan->penerbit = $request->penerbit;
        
        if ($request->hasFile('sampul')) {
            $sampul = $request->file('sampul');
            $sampulName = time() . '_' . $sampul->getClientOriginalName();
            $sampul->move(public_path('upload'), $sampulName);
            $laporan->sampul = 'upload/' . $sampulName;
        }
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            $laporan->file = 'upload/' . $fileName;
        }

        $laporan->save();

        return redirect()->route('laporan_ppid.index');
    }

    public function destroy($id)
    {
        $laporan = LaporanPpid::findOrFail($id);
        $laporan->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('laporan_ppid.index');
    }
}
