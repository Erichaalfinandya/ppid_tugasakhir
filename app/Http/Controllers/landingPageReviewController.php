<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class landingPageReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $dataUser = User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->select('users.id', 'biodatas.nama_lengkap')
            ->where('users.id',$user_id)
            ->first();
            // dd($dataUser);
        $data = Ulasan::leftJoin('biodatas', 'ulasans.user_id', '=', 'biodatas.user_id')
        ->where('ulasan_status','approve')    
        ->get();
        return view('landingPageReview', compact('data','dataUser'));
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
