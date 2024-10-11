<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $ulasan_nama = $request->ulasan_nama;
        $ulasan_type = $request->ulasan_type;
        $ulasan_isi = $request->ulasan_isi;
        $ulasan_rating = $request->ulasan_rating;
        $ulasan_status = 'pending';
        $id_user = $request->user_id;
        // dd($ulasan_nama, $ulasan_type, $ulasan_isi, $ulasan_rating, $ulasan_status);
        Ulasan::create([
            'user_id' => $id_user,
            'ulasan_nama' => $ulasan_nama,
            'ulasan_type' => $ulasan_type,
            'ulasan_isi' => $ulasan_isi,
            'ulasan_rating' => $ulasan_rating,
            'ulasan_status' => $ulasan_status
        ]);
        return redirect()->back();
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
    public function destroy(string $id)
    {
        //
    }
}
