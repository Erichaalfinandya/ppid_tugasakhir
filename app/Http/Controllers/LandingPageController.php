<?php

namespace App\Http\Controllers;

use App\Models\BeritaPPID;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ulasan::leftJoin('users', 'ulasans.user_id', '=', 'users.id')
        ->where('ulasan_status','approve')->get();

        // dd($data);
        $berita = BeritaPPID::get();

        // dd($berita);
        return view('index', [
            'data' => $data,
            'berita' => $berita,
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
    public function destroy(string $id)
    {
        //
    }
}
