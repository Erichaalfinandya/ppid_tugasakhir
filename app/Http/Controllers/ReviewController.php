<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ulasan::leftJoin('users', 'ulasans.user_id', '=', 'users.id')
        ->select('ulasans.*', 'users.foto')
        ->get();
        // dd($data);
        return view('Review',compact('data'));
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
    public function show(Request $request, string $id)
    {
        $status = $request->status;
        if($status == 'decline'){
            Ulasan::where('id', $id)->delete();
            session()->flash('success', 'Data berhasil di decline dan terhapus');
        }else{
            Ulasan::where('id', $id)->update(['ulasan_status' => $status]);
        }
        return redirect()->back();
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
