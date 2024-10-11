<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class DaftarSetiapSaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasiData = Kategori::where('pembagian_informasi', 'Setiap Saat')->get();
        // $jenisInformasi = JenisInformasi::pluck('nama', 'id');
        return view('admin.daftar-setiap-saat', [
            'kategori' => $informasiData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $data = DaftarInformasi::find($id);
        $data->delete();
        return redirect()->route('daftar-setiap-saat.index')->with('success', 'Data Berhasil Dihapus');
    }
}
