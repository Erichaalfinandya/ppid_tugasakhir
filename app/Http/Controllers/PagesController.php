<?php

namespace App\Http\Controllers;

use App\Models\KarakterKota;
use App\Models\MisiPemerintah;
use App\Models\PekerjaanSekretaris;
use App\Models\PekerjaanWakil;
use App\Models\PendidikanSekretaris;
use App\Models\PendidikanWakil;
use App\Models\PendidikanWalikota;
use App\Models\PosisiWalikota;
use App\Models\SekretarisPemerintah;
use App\Models\WakilWalikota;
use App\Models\WalikotaPemerintah;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function misipemerintah() //untuk menampilkan data dari admin ke landing (KARAKTER KOTA)
    {
        // Ambil data kategori dan deskripsi dari tabel KarakterKota
        $misipemerintah = MisiPemerintah::all();
        $karakterkota = KarakterKota::all();

        // Kirim data ke view
        return view('pages.profil.profilpemerintah', compact('misipemerintah', 'karakterkota'));
    }
    public function walikota() //untuk menampilkan data dari admin ke landing (KARAKTER KOTA)
    {
        // Ambil data kategori dan deskripsi dari tabel KarakterKota
        $posisiwalikota = PosisiWalikota::all();
        $pendidikanwalikota = PendidikanWalikota::all();

        // Kirim data ke view
        return view('pages.profil.walikota', compact('posisiwalikota', 'pendidikanwalikota'));
    }

    public function showWalikota()
    {
        $walikota = WalikotaPemerintah::first(); // Ambil data walikota
        return view('pages.profil.walikota', compact('walikota'));
    }

    public function wakilWalikota()
    {
        $wakilwalikota = WakilWalikota::first();
        $pendidikanwakil = PendidikanWakil::all();
        $pekerjaanwakil = PekerjaanWakil::all();

        return view('pages.profil.wakilwalikota', compact('wakilwalikota','pendidikanwakil', 'pekerjaanwakil'));
    }

    public function SekretarisPemerintah()
    {
        $sekretarispemerintah = SekretarisPemerintah::first();
        $pendidikansekretaris = PendidikanSekretaris::all();
        $pekerjaansekretaris = PekerjaanSekretaris::all();

        return view('pages.profil.sekretaris', compact('sekretarispemerintah','pendidikansekretaris', 'pekerjaansekretaris'));
    }
}
