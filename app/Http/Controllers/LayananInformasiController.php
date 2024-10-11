<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananInformasiController extends Controller
{
    public function showlayananinformasisertamerta()
    {
        return view('pages/layanan.layananinformasisertamerta');
    }

    // Metode untuk menampilkan halaman layananinformasisertamerta2
    public function showlayananinformasisertamerta2()
    {
        return view('pages/layanan.layananinformasisertamerta2');
    }
}
