<?php

namespace App\Http\Controllers;

use App\Models\BeritaPPID;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Ulasan::leftJoin('users', 'ulasans.user_id', '=', 'users.id')
        ->where('ulasan_status','approve')->get();

        $berita = BeritaPPID::get();

        // dd($berita);
        return view('index', [
            'data' => $data,
            'berita' => $berita,
        ]);
    }
}
