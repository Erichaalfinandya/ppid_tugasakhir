<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\PermohonanKeberatan;
use App\Models\PermohonanSengketa;
use Illuminate\Http\Request;

class LaporanStatistikController extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::where('status', 'Disetujui')->count();
        $keberatan = PermohonanKeberatan::where('status', 'Disetujui')->count();
        $sengketa = PermohonanSengketa::where('status', 'Disetujui')->count();
        return view('pages.laporan.laporanstatistik', compact('permohonan', 'keberatan', 'sengketa'));
    }
}
