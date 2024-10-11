<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaPPIDController;
use App\Http\Controllers\JawabAdminController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\TanyaAdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanPPIDController;
use App\Http\Controllers\FormSengketaController;
use App\Http\Controllers\TrackOrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BeritaKominfoController;
use App\Http\Controllers\PermohonanKeberatanController;
use App\Http\Controllers\PermohonanSengketaController;
use App\Http\Controllers\FormPermohonanController;
use App\Http\Controllers\PagesController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\admin\ProfilPpidController;
use App\Http\Controllers\laporanstatistikController;
use App\Http\Controllers\LayananInformasiController;
use App\Http\Controllers\landingPageReviewController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\DaftarInformasiPublikController;
use App\Http\Controllers\admin\MaklumatPelayananController;
use App\Http\Controllers\User\Status\StatusLayananController;
use App\Http\Controllers\User\Status\StatusKeberatanController;
use App\Http\Controllers\User\Status\StatusSengketaController;
use App\Http\Controllers\Admin\Notifikasi\NotifikasiAdminController;
use App\Http\Controllers\Admin\Notifikasi\NotifikasiKeberatanAdminController;
use App\Http\Controllers\Admin\Status\StatusLayananInformasiController;
use App\Http\Controllers\Admin\Status\StatusLayananKeberatanController;
use App\Http\Controllers\Admin\Status\StatusLayananSengketaController;
use App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikSertaMertaController;
use App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikSetiapSaatController;
use App\Http\Controllers\Admin\Notifikasi\NotifikasiSengketaAdminController;
use App\Http\Controllers\Admin\Profil\KarakterKotaController;
use App\Http\Controllers\Admin\Profil\MisiPemerintahController;
use App\Http\Controllers\Admin\Profil\PekerjaanSekretarisController;
use App\Http\Controllers\Admin\Profil\PekerjaanWakilController;
use App\Http\Controllers\Admin\Profil\PendidikanSekretarisController;
use App\Http\Controllers\Admin\Profil\PendidikanWakilController;
use App\Http\Controllers\Admin\Profil\PendidikanWalikotaController;
use App\Http\Controllers\Admin\Profil\PosisiWalikotaController;
use App\Http\Controllers\Admin\Profil\ProfilPemerintahController;
use App\Http\Controllers\Admin\Profil\SekretarisPemerintahController;
use App\Http\Controllers\Admin\Profil\WakilWalikotaController;
use App\Http\Controllers\Admin\Profil\WalikotaPemerintahController;
use App\Http\Controllers\Admin\Laporan\LaporanKeuanganController;
use App\Http\Controllers\Admin\Laporan\LaporanKinerjaController;
use App\Http\Controllers\Admin\Laporan\LaporanPenyelenggaraanController;
use App\Http\Controllers\BeritaPemerintahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/',LandingPageController::class);
// Route::get('/', function () {
//     // return view('index');

// });
Route::post('ulasan',[UlasanController::class,'store'])->name('ulasan.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});

Route::get('/auth-check', [App\Http\Controllers\AuthCheckController::class, 'check'])->name('auth-check');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//route untuk pages topbar
// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke HomeController index karena sudah ada controllernya
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


//route untuk pages profil
Route::get('pages.profil.profilpemerintah', function () {
    return view('pages.profil.profilpemerintah');
})->name('profilpemerintah');

// note : route untuk profil ppid sinkron dengan database melalui controller
Route::get('pages.profil.profilppid', [ProfilPpidController::class, 'show_profil_ppid'])->name('profilppid');

 //route untuk pages prosedur
Route::get('pages.prosedur.prosedurlayanan', function () {
    return view('pages.prosedur.prosedurlayanan');
})->name('prosedurlayanan');

Route::get('pages.prosedur.prosedurkeberatan', function () {
    return view('pages.prosedur.prosedurkeberatan');
})->name('prosedurkeberatan');

Route::get('pages.prosedur.prosedurpenyelesaiansengketa', function () {
    return view('pages.prosedur.prosedurpenyelesaiansengketa');
})->name('prosedurpenyelesaiansengketa');

Route::get('pages.prosedur.standarpengumumaninformasi', function () {
    return view('pages.prosedur.standarpengumumaninformasi');
})->name('standarpengumumaninformasi');

//route untuk pages layanan
// note : membuat maklumat pelayanan bisa sinkron dengan database melalui Maklumat Pelayanan Kontroler
Route::get('pages.layanan.maklumatpelayanan', [MaklumatPelayananController::class, 'show_maklumat_pelayanan'])->name('maklumatpelayanan');

Route::get('pages.layanan.daftarinformasipublik', function () {
    return view('pages.layanan.daftarinformasipublik');
})->name('daftarinformasipublik');

//route untuk layanan informasisertamerta start//
Route::get('pages/layanan//layananinformasisertamerta', [LayananInformasiController::class, 'showlayananinformasisertamerta']);

Route::get('/pages.layanan.layananinformasisertamerta2', function () {
    return view('pages.layanan.layananinformasisertamerta2');
})->name('layananinformasisertamerta2');

//route untuk layanan informasisertamerta start//
// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipublikberkala', [DaftarInformasiPublikController::class, 'index'])->name('daftarinformasipublikberkala');
// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipublikberkala2/{id}', [DaftarInformasiPublikController::class, 'detail'])->name('daftarinformasipublikberkala2');

// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipubliksertamerta', [DaftarInformasiPublikController::class, 'index_serta_merta'])->name('daftarinformasipubliksertamerta');

// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipubliksertamerta2/{id}', [DaftarInformasiPublikController::class, 'detail_serta_merta'])->name('daftarinformasipubliksertamerta2');

// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipubliksetiapsaat', [DaftarInformasiPublikController::class, 'index_setiap_saat'])->name('daftarinformasipubliksetiapsaat');

// custom route
// note : sebelumnya hanya langsung diroute menuju view, sekarang diarahkan ke Controllernya
Route::get('pages/layanan/daftarinformasipubliksetiapsaat2/{id}', [DaftarInformasiPublikController::class, 'detail_setiap_saat'])->name('daftarinformasipubliksetiapsaat2');
//route untuk daftarinformasipublik menuju ke berkala, sertamerta, dan setiap saat end

Route::get('pages.layanan.layananinformasiberkala', [DaftarInformasiPublikController::class, 'index_layanan_berkala'])->name('layananinformasiberkala');

Route::get('pages.layanan.layananinformasiberkala2/{id}', [DaftarInformasiPublikController::class, 'detail2_layanan_berkala'])->name('layananinformasiberkala2');

Route::get('pages.layanan.layananinformasiberkala3/{id}', [DaftarInformasiPublikController::class, 'detail3_layanan_berkala'])->name('layananinformasiberkala3');

Route::get('pages.layanan.layananinformasisertamerta', [DaftarInformasiPublikController::class, 'index_layanan_sertamerta'])->name('layananinformasisertamerta');

Route::get('pages.layanan.layananinformasisertamerta2/{id}', [DaftarInformasiPublikController::class, 'detail2_layanan_sertamerta'])->name('layananinformasisertamerta2');

Route::get('pages.layanan.layananinformasisertamerta3/{id}', [DaftarInformasiPublikController::class, 'detail3_layanan_sertamerta'])->name('layananinformasisertamerta3');

Route::get('pages.layanan.layananinformasisetiapsaat', [DaftarInformasiPublikController::class, 'index_layanansetiapsaat'])->name('layananinformasisetiapsaat');

Route::get('pages.layanan.layananinformasisetiapsaat2/{id}', [DaftarInformasiPublikController::class, 'detail2_layanansetiapsaat'])->name('layananinformasisetiapsaat2');

Route::get('pages.layanan.layananinformasisetiapsaat3/{id}', [DaftarInformasiPublikController::class, 'detail3_layanansetiapsaat'])->name('layananinformasisetiapsaat3');

Route::get('pages.layanan.layananinformasidikecualikan', [DaftarInformasiPublikController::class, 'detail3_layanan_dikecualikan'])->name('layananinformasidikecualikan');

Route::get('pages.layanan.layananinformasidikecualikan2', function () {
    return view('pages.layanan.layananinformasidikecualikan2');
})->name('layananinformasidikecualikan2');


//route untuk pages berita
Route::get('pages.berita.beritappid', function () {
    return view('pages.berita.beritappid');
})->name('beritappid');

// note : route untuk detail berita khusus ppid
Route::get('pages.berita.beritappid/{id}', [App\Http\Controllers\BeritaPPIDController::class, 'show'])->name('beritappiddetail');

Route::get('pages.berita.beritapemerintah', function () {
    return view('pages.berita.beritapemerintah');
})->name('beritapemerintah');

Route::get('pages.berita.beritadiskominfo', function () {
    return view('pages.berita.beritadiskominfo');
})->name('beritadiskominfo');

//route untuk pages kontak
Route::get('pages.kontak.kontak', function () {
    return view('pages.kontak.kontak');
})->name('kontak');

//route untuk pages galeri
Route::get('pages.galeri.galerippid', function () {
    return view('pages.galeri.galerippid');
})->name('galerippid');

Route::get('pages.galeri.galeripemerintah', function () {
    return view('pages.galeri.galeripemerintah');
})->name('galeripemerintah');

//route untuk pages laporan
Route::get('pages.laporan.laporanppid', function () {
    return view('pages.laporan.laporanppid');
})->name('laporanppid');

Route::get('pages.laporan.laporanpemerintah', function () {
    return view('pages.laporan.laporanpemerintah');
})->name('laporanpemerintah');

Route::get('profil-pemerintah', [ProfilPemerintahController::class, 'index'])->name('profil_pemerintah.index');
Route::post('profil-pemerintah', [ProfilPemerintahController::class, 'store'])->name('profil_pemerintah.store');
Route::put('profil-pemerintah', [ProfilPemerintahController::class, 'update'])->name('profil_pemerintah.update');
Route::get('pages.profil.profilpemerintah', [PagesController::class, 'karakterkota'])->name('profilpemerintah.index'); //untuk menampilkan data crud dari admin ke landing bagian ProfilPemerintah (Karakter Kota)
Route::get('pages.profil.profilpemerintah', [PagesController::class, 'misipemerintah'])->name('profilpemerintah.index'); //untuk menampilkan data crud dari admin ke landing bagian ProfilPemerintah (Karakter Kota)
Route::get('walikota', [PagesController::class, 'walikota'])->name('walikota.index'); //untuk menampilkan data crud dari admin ke walikota (posisi,pendidikan walikota)
Route::get('profil-pemerintah', [PagesController::class, 'showWalikota'])->name('profilpemerintah');
Route::get('wakil-walikota', [PagesController::class, 'wakilWalikota'])->name('wakil.walikota');
Route::get('sekretaris-pemerintah', [PagesController::class, 'sekretarisPemerintah'])->name('sekretaris.pemerintah');

Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'publicIndex'])->name('laporan_keuangan.public'); //untuk menampilkan data crud dari admin ke landing bagian laporan keuangan
Route::get('/laporan-kinerja', [LaporanKinerjaController::class, 'publicIndex'])->name('laporan_kinerja.public'); //untuk menampilkan data crud dari admin ke landing bagian laporan kinerja
Route::get('/laporan-penyelenggaraan', [LaporanPenyelenggaraanController::class, 'publicIndex'])->name('laporan_penyelenggaraan.public'); //untuk menampilkan data crud dari admin ke landing bagian laporan penyelenggaraan

//dashboard admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');
    Route::post('/informasi-publik/daftar-informasi-publik', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikController::class, 'store'])->name('informasi-publik.daftar-informasi-publik.store');
    Route::get('/informasi-publik/daftar-informasi-publik/edit/{id}', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikController::class, 'edit'])->name('informasi-publik.daftar-informasi-publik.edit');
    Route::put('/informasi-publik/daftar-informasi-publik/edit/{id}', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikController::class, 'update'])->name('informasi-publik.daftar-informasi-publik.update');
    Route::delete('/informasi-publik/daftar-informasi-publik/{id}', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikController::class, 'delete'])->name('informasi-publik.daftar-informasi-publik.delete');
    Route::get('/jawabAdmin',[JawabAdminController::class, 'index'])->name('jawabAdmin.index');
    Route::get('/jawabAdmin/{id}', [JawabAdminController::class, 'show'])->name('jawabAdmin.show');
    Route::post('jawabAdmin', [JawabAdminController::class, 'store'])->name('jawabAdmin.store');
    Route::get('reviewAdmin',[ReviewController::class, 'index'])->name('reviewAdmin.index');
    Route::get('reviewAdmin/{id}',[ReviewController::class, 'show'])->name('reviewAdmin.show');
    Route::get('daftar-user',[UserDashboardController::class, 'datatable'])->name('daftar-user.datatable');
    Route::post('daftar-user/{id}/acc',[UserDashboardController::class, 'acc'])->name('daftar-user.acc');
    Route::post('daftar-user/{id}/deny',[UserDashboardController::class, 'deny'])->name('daftar-user.deny');
    
    Route::get('notifikasi', [NotifikasiAdminController::class, 'index'])->name('admin.notifikasi.index');
    Route::get('notifikasi/{id}/edit', [NotifikasiAdminController::class, 'edit'])->name('admin.notifikasi.edit');
    // Route::patch('notifikasi/{id}/update-tahapan', [NotifikasiAdminController::class, 'updateTahapan'])->name('admin.notifikasi.updateTahapan');
    Route::patch('/admin/notifikasi/upload-jawaban/{id}', [NotifikasiAdminController::class, 'uploadJawaban'])->name('admin.notifikasi.uploadJawaban');

    Route::get('notifikasi-keberatan', [NotifikasiKeberatanAdminController::class, 'index'])->name('notifikasi-keberatan');
    Route::patch('/notifikasi-keberatan/uploadJawaban/{id}', [NotifikasiKeberatanAdminController::class, 'uploadJawaban'])->name('admin.notifikasi-keberatan.uploadJawaban');

    Route::get('notifikasi-sengketa', [NotifikasiSengketaAdminController::class, 'index'])->name('notifikasi-sengketa');
    Route::patch('/notifikasi-sengketa/uploadJawaban/{id}', [NotifikasiSengketaAdminController::class, 'uploadJawaban'])->name('admin.notifikasi-sengketa.uploadJawaban');

    // Admin Status Layanan Informasi
    Route::get('status-layanan-informasi', [StatusLayananInformasiController::class, 'index'])->name('admin.status-layanan-informasi.index');
    Route::put('/status-layanan-informasi/update/{id}', [StatusLayananInformasiController::class, 'updateStatus'])->name('admin.status-layanan-informasi.update');
    Route::post('status-layanan-informasi/store', [StatusLayananInformasiController::class, 'store'])->name('admin.status-layanan-informasi.store'); // Menyimpan status layanan informasi baru
    Route::get('status-layanan-informasi/{id}/info', [StatusLayananInformasiController::class, 'showInfo'])->name('admin.status-layanan-informasi.info'); // Menampilkan informasi detail layanan 
    
    Route::get('status/keberatan', [StatusLayananKeberatanController::class, 'index'])->name('status-keberatan.index');
    Route::put('/status-keberatan/{id}', [StatusLayananKeberatanController::class, 'updateStatusKeberatan'])->name('admin.status-layanan-keberatan-informasi.update');

    Route::get('status-layanan-sengketa', [StatusLayananSengketaController::class, 'index'])->name('admin.status-layanan-sengketa.index');
    Route::put('/admin/status-sengketa/{id}/update', [StatusLayananSengketaController::class, 'updateStatusSengketa'])->name('admin.status-layanan-sengketa.update');


    // Route untuk daftar data yang sudah di-approve
    Route::get('/data-approved', [StatusLayananInformasiController::class, 'dataApproved'])->name('admin.data-approved');
    // Route untuk daftar data yang masih pending
    Route::get('/data-pending', [StatusLayananInformasiController::class, 'dataPending'])->name('admin.data-pending');
    Route::get('/layanan-keberatan-informasi', [StatusLayananKeberatanController::class, 'index'])->name('admin.status.status-layanan-keberatan-informasi');

    //penambahan berita",galeri, dan laporan ppid
    Route::resource('berita_ppid', BeritaPPIDController::class);
    Route::resource('berita_kominfo', BeritaKominfoController::class);
    Route::resource('berita_pemerintah', BeritaPemerintahController::class);

    Route::resource('galeri', GaleriController::class);
    
    //Route LAPORAN PADA ADMIN
    Route::resource('laporan_ppid', LaporanPPIDController::class);
    Route::get('laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan_keuangan.index');
    Route::post('laporan-keuangan/store', [LaporanKeuanganController::class, 'store'])->name('laporan_keuangan.store');
    Route::get('laporan-keuangan/{laporan_keuangan}/edit', [LaporanKeuanganController::class, 'edit'])->name('laporan_keuangan.edit');
    Route::put('laporan-keuangan/{laporan_keuangan}', [LaporanKeuanganController::class, 'update'])->name('laporan_keuangan.update');
    Route::delete('laporan-keuangan/{laporan_keuangan}', [LaporanKeuanganController::class, 'destroy'])->name('laporan_keuangan.destroy');

    Route::get('laporan-kinerja', [LaporanKinerjaController::class, 'index'])->name('laporan_kinerja.index');
    Route::post('laporan-kinerja/store', [LaporanKinerjaController::class, 'store'])->name('laporan_kinerja.store');
    Route::get('laporan-kinerja/{laporan_kinerja}/edit', [LaporanKinerjaController::class, 'edit'])->name('laporan_kinerja.edit');
    Route::put('laporan-kinerja/{laporan_kinerja}', [LaporanKinerjaController::class, 'update'])->name('laporan_kinerja.update');
    Route::delete('laporan-kinerja/{laporan_kinerja}', [LaporanKinerjaController::class, 'destroy'])->name('laporan_kinerja.destroy');

    Route::get('laporan-penyelenggaraan', [LaporanPenyelenggaraanController::class, 'index'])->name('laporan_penyelenggaraan.index');
    Route::post('laporan-penyelenggaraan/store', [LaporanPenyelenggaraanController::class, 'store'])->name('laporan_penyelenggaraan.store');
    Route::get('laporan-penyelenggaraan/{laporan_penyelenggaraan}/edit', [LaporanPenyelenggaraanController::class, 'edit'])->name('laporan_penyelenggaraan.edit');
    Route::put('laporan-penyelenggaraan/{laporan_penyelenggaraan}', [LaporanPenyelenggaraanController::class, 'update'])->name('laporan_penyelenggaraan.update');
    Route::delete('laporan-penyelenggaraan/{laporan_penyelenggaraan}', [LaporanPenyelenggaraanController::class, 'destroy'])->name('laporan_penyelenggaraan.destroy');


    //sertamerta-setiapsaat
    Route::resource('daftar-informasi-setiap-saat', DaftarInformasiPublikSetiapSaatController::class);
    Route::resource('daftar-informasi-serta-merta', DaftarInformasiPublikSertaMertaController::class);

    // note : route untuk maklumat pelayanan
    Route::resource('maklumat-pelayanan', MaklumatPelayananController::class);
    Route::post('maklumat-pelayanan/nolist/update', [App\Http\Controllers\Admin\MaklumatPelayananController::class, 'update_nolist'])->name('maklumat-pelayanan.update_nolist');

     //note : route untuk admin profil pemerintah 
     Route::get('profil', [ProfilPemerintahController::class, 'index'])->name('profil_pemerintah.index');
     Route::get('profil/create', [ProfilPemerintahController::class, 'create'])->name('profil_pemerintah.create');
     Route::post('profil/store', [ProfilPemerintahController::class, 'store'])->name('profil_pemerintah.store');
     Route::get('profil/edit', [ProfilPemerintahController::class, 'edit'])->name('profil_pemerintah.edit');
     Route::put('profil/update', [ProfilPemerintahController::class, 'update'])->name('profil_pemerintah.update');
 
     Route::get('karakter-kota', [KarakterKotaController::class, 'index'])->name('karakter_kota.index');
     Route::post('karakter-kota/store', [KarakterKotaController::class, 'store'])->name('karakter_kota.store');
     Route::get('karakter-kota/{karakter_kota}/edit', [KarakterKotaController::class, 'edit'])->name('karakter_kota.edit');
     Route::put('karakter-kota/{karakter_kota}', [KarakterKotaController::class, 'update'])->name('karakter_kota.update');
     Route::delete('karakter-kota/{karakter_kota}', [KarakterKotaController::class, 'destroy'])->name('karakter_kota.destroy');
 
     Route::get('misi-pemerintah', [MisiPemerintahController::class, 'index'])->name('misi_pemerintah.index');
     Route::post('misi-pemerintah/store', [MisiPemerintahController::class, 'store'])->name('misi_pemerintah.store');
     Route::get('misi-pemerintah/{misi_pemerintah}/edit', [MisiPemerintahController::class, 'edit'])->name('misi_pemerintah.edit');
     Route::put('misi-pemerintah/{misi_pemerintah}', [MisiPemerintahController::class, 'update'])->name('misi_pemerintah.update');
     Route::delete('misi-pemerintah/{misi_pemerintah}', [MisiPemerintahController::class, 'destroy'])->name('misi_pemerintah.destroy');
 
     Route::get('walikota', [WalikotaPemerintahController::class, 'index'])->name('walikota_pemerintah.index');
     Route::get('walikota/create', [WalikotaPemerintahController::class, 'create'])->name('walikota_pemerintah.create');
     Route::post('walikota/store', [WalikotaPemerintahController::class, 'store'])->name('walikota_pemerintah.store');
     Route::get('walikota/edit', [WalikotaPemerintahController::class, 'edit'])->name('walikota_pemerintah.edit');
     Route::put('walikota/update', [WalikotaPemerintahController::class, 'update'])->name('walikota_pemerintah.update');
     
     Route::get('posisi-walikota', [PosisiWalikotaController::class, 'index'])->name('posisi_walikota.index');
     Route::post('posisi-walikota/store', [PosisiWalikotaController::class, 'store'])->name('posisi_walikota.store');
     Route::get('posisi-walikota/{posisi_walikota}/edit', [PosisiWalikotaController::class, 'edit'])->name('posisi_walikota.edit');
     Route::put('posisi-walikota/{posisi_walikota}', [PosisiWalikotaController::class, 'update'])->name('posisi_walikota.update');
     Route::delete('posisi-walikota/{posisi_walikota}', [PosisiWalikotaController::class, 'destroy'])->name('posisi_walikota.destroy');
 
     Route::get('pendidikan-walikota', [PendidikanWalikotaController::class, 'index'])->name('pendidikan_walikota.index');
     Route::post('pendidikan-walikota/store', [PendidikanWalikotaController::class, 'store'])->name('pendidikan_walikota.store');
     Route::get('pendidikan-walikota/{pendidikan_walikota}/edit', [PendidikanWalikotaController::class, 'edit'])->name('pendidikan_walikota.edit');
     Route::put('pendidikan-walikota/{pendidikan_walikota}', [PendidikanWalikotaController::class, 'update'])->name('pendidikan_walikota.update');
     Route::delete('pendidikan-walikota/{pendidikan_walikota}', [PendidikanWalikotaController::class, 'destroy'])->name('pendidikan_walikota.destroy');
 
     Route::get('wakil-walikota', [WakilWalikotaController::class, 'index'])->name('wakil_walikota.index');
     Route::get('wakil-walikota/create', [WakilWalikotaController::class, 'create'])->name('wakil_walikota.create');
     Route::post('wakil-walikota/store', [WakilWalikotaController::class, 'store'])->name('wakil_walikota.store');
     Route::get('wakil-walikota/{id}/edit', [WakilWalikotaController::class, 'edit'])->name('wakil_walikota.edit');
     Route::put('wakil-walikota/update', [WakilWalikotaController::class, 'update'])->name('wakil_walikota.update');
 
     Route::get('pendidikan-wakil', [PendidikanWakilController::class, 'index'])->name('pendidikan_wakil.index');
     Route::post('pendidikan-wakil/store', [PendidikanWakilController::class, 'store'])->name('pendidikan_wakil.store');
     Route::get('pendidikan-wakil/{pendidikan_wakil}/edit', [PendidikanWakilController::class, 'edit'])->name('pendidikan_wakil.edit');
     Route::put('pendidikan-wakil/{pendidikan_wakil}', [PendidikanWakilController::class, 'update'])->name('pendidikan_wakil.update');
     Route::delete('pendidikan-wakil/{pendidikan_wakil}', [PendidikanWakilController::class, 'destroy'])->name('pendidikan_wakil.destroy');
 
     Route::get('pekerjaan-wakil', [PekerjaanWakilController::class, 'index'])->name('pekerjaan_wakil.index');
     Route::post('pekerjaan-wakil/store', [PekerjaanWakilController::class, 'store'])->name('pekerjaan_wakil.store');
     Route::get('pekerjaan-wakil/{pekerjaan_wakil}/edit', [PekerjaanWakilController::class, 'edit'])->name('pekerjaan_wakil.edit');
     Route::put('pekerjaan-wakil/{pekerjaan_wakil}', [PekerjaanWakilController::class, 'update'])->name('pekerjaan_wakil.update');
     Route::delete('pekerjaan-wakil/{pekerjaan_wakil}', [PekerjaanWakilController::class, 'destroy'])->name('pekerjaan_wakil.destroy');
 
     Route::get('sekretaris-pemerintah', [SekretarisPemerintahController::class, 'index'])->name('sekretaris_pemerintah.index');
     Route::get('sekretaris-pemerintah/create', [SekretarisPemerintahController::class, 'create'])->name('sekretaris_pemerintah.create');
     Route::post('sekretaris-pemerintah/store', [SekretarisPemerintahController::class, 'store'])->name('sekretaris_pemerintah.store');
     Route::get('sekretaris-pemerintah/{id}/edit', [SekretarisPemerintahController::class, 'edit'])->name('sekretaris_pemerintah.edit');
     Route::put('sekretaris-pemerintah/update', [SekretarisPemerintahController::class, 'update'])->name('sekretaris_pemerintah.update');
 
     Route::get('pendidikan-sekretaris', [PendidikanSekretarisController::class, 'index'])->name('pendidikan_sekretaris.index');
     Route::post('pendidikan-sekretaris/store', [PendidikanSekretarisController::class, 'store'])->name('pendidikan_sekretaris.store');
     Route::get('pendidikan-sekretaris/{pendidikan_sekretaris}/edit', [PendidikanSekretarisController::class, 'edit'])->name('pendidikan_sekretaris.edit');
     Route::put('pendidikan-sekretaris/{pendidikan_sekretaris}', [PendidikanSekretarisController::class, 'update'])->name('pendidikan_sekretaris.update');
     Route::delete('pendidikan-sekretaris/{pendidikan_sekretaris}', [PendidikanSekretarisController::class, 'destroy'])->name('pendidikan_sekretaris.destroy');
 
     Route::get('pekerjaan-sekretaris', [PekerjaanSekretarisController::class, 'index'])->name('pekerjaan_sekretaris.index');
     Route::post('pekerjaan-sekretaris/store', [PekerjaanSekretarisController::class, 'store'])->name('pekerjaan_sekretaris.store');
     Route::get('pekerjaan-sekretaris/{pekerjaan_sekretaris}/edit', [PekerjaanSekretarisController::class, 'edit'])->name('pekerjaan_sekretaris.edit');
     Route::put('pekerjaan-sekretaris/{pekerjaan_sekretaris}', [PekerjaanSekretarisController::class, 'update'])->name('pekerjaan_sekretaris.update');
     Route::delete('pekerjaan-sekretaris/{pekerjaan_sekretaris}', [PekerjaanSekretarisController::class, 'destroy'])->name('pekerjaan_sekretaris.destroy');

    // note : route untuk profil ppid
    Route::get('profilppid/profil', [ProfilPpidController::class, 'profilgeneral'])->name('profilgeneral');
    Route::put('profilppid/profil/edit/{id}', [ProfilPpidController::class, 'update'])->name('profilppid.update');

    Route::get('profilppid/visimisi', [ProfilPpidController::class, 'profilvisimisi'])->name('profilvisimisi');
    Route::post('profilppid/visimisi/store/', [ProfilPpidController::class, 'profilvisimisistore'])->name('profilvisimisi.store');
    Route::get('profilppid/visimisi/edit/{id}', [ProfilPpidController::class, 'profilvisimisiedit'])->name('profilvisimisi.edit');
    Route::delete('profilppid/visimisi/delete/{id}', [ProfilPpidController::class, 'profilvisimisidestroy'])->name('profilvisimisi.destroy');

    Route::get('profilppid/tugastanggungjawab', [ProfilPpidController::class, 'profiltugastanggungjawab'])->name('profiltugastanggungjawab');
    Route::post('profilppid/tugastanggungjawab/store/', [ProfilPpidController::class, 'profiltugastanggungjawabstore'])->name('profiltugastanggungjawab.store');
    Route::get('profilppid/tugastanggungjawab/edit/{id}', [ProfilPpidController::class, 'profiltugastanggungjawabedit'])->name('profiltugastanggungjawab.edit');
    Route::delete('profilppid/tugastanggungjawab/delete/{id}', [ProfilPpidController::class, 'profiltugastanggungjawabdestroy'])->name('profiltugastanggungjawab.destroy');

    Route::get('profilppid/struktur', [ProfilPpidController::class, 'profilstruktur'])->name('profilstruktur');

    Route::get('profilppid/dasarhukum', [ProfilPpidController::class, 'profildasarhukum'])->name('profildasarhukum');
    Route::post('profilppid/dasarhukum/store/', [ProfilPpidController::class, 'profildasarhukumstore'])->name('profildasarhukum.store');
    Route::get('profilppid/dasarhukum/edit/{id}', [ProfilPpidController::class, 'profildasarhukumedit'])->name('profildasarhukum.edit');
    Route::delete('profilppid/dasarhukum/delete/{id}', [ProfilPpidController::class, 'profildasarhukumdestroy'])->name('profildasarhukum.destroy');

    //daftar berkala
    Route::get('/daftar-berkala', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'index'])->name('daftar-berkala.index');
    Route::get('/daftar-judul/judul/{id}', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'judul'])->name('daftar-judul.judul');
    Route::post('/daftar-judul/add', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'store'])->name('daftar-judul.store');
    Route::get('/daftar-judul/edit/{id}', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'edit'])->name('daftar-judul.edit');
    Route::put('/daftar-judul/edit/{id}', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'update'])->name('daftar-judul.update');
    Route::delete('/daftar-judul/delete/{id}', [App\Http\Controllers\Admin\DaftarBerkalaController::class, 'delete'])->name('daftar-judul.delete');
    Route::get('/daftar-informasi/{id}', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'index'])->name('daftar-informasi.index');
    Route::post('/daftar-informasi/add', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'store'])->name('daftar-informasi.store');
    Route::get('/daftar-informasi/edit/{id}', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'edit'])->name('daftar-informasi.edit');
    Route::put('/daftar-informasi/edit/{id}', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'update'])->name('daftar-informasi.update');
    Route::delete('/daftar-informasi/delete/{id}', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'delete'])->name('daftar-informasi.delete');

    //daftar serta merta
    Route::get('/daftar-serta-merta', [App\Http\Controllers\Admin\DaftarSertaMertaController::class, 'index'])->name('daftar-serta-merta.index');
    Route::post('/daftar-serta-merta/add', [App\Http\Controllers\Admin\DaftarSertaMertaController::class, 'store'])->name('daftar-serta-merta.store');
    Route::get('/daftar-serta-merta/edit/{id}', [App\Http\Controllers\Admin\DaftarSertaMertaController::class, 'edit'])->name('daftar-serta-merta.edit');
    Route::put('/daftar-serta-merta/edit/{id}', [App\Http\Controllers\Admin\DaftarSertaMertaController::class, 'update'])->name('daftar-serta-merta.update');
    Route::delete('/daftar-serta-merta/{id}', [App\Http\Controllers\Admin\DaftarSertaMertaController::class, 'delete'])->name('daftar-serta-merta.delete');

    //daftar setiap saat
    Route::get('/daftar-setiap-saat', [App\Http\Controllers\Admin\DaftarSetiapSaatController::class, 'index'])->name('daftar-setiap-saat.index');

    //daftar Informasi DIkecualikan
    Route::get('/informasi-dikecualikan', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'index'])->name('informasi-dikecualikan.index');
    Route::post('/informasi-dikecualikan/add', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'store'])->name('informasi-dikecualikan.store');
    Route::get('/informasi-dikecualikan/edit/{id}', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'edit'])->name('informasi-dikecualikan.edit');
    Route::put('/informasi-dikecualikan/edit/{id}', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'update'])->name('informasi-dikecualikan.update');
    Route::delete('/informasi-dikecualikan/{id}', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'delete'])->name('informasi-dikecualikan.delete');
    // Route::delete('/informasi-dikecualikan/{id}', [App\Http\Controllers\Admin\InformasiDikecualikanController::class, 'delete'])->name('informasi-dikecualikan.delete');
});

Route::get('/formulir-permohonan', [PermohonanController::class, 'showFormulir'])->name('formulir.permohonan');
Route::post('/simpan-permohonan', [PermohonanController::class, 'simpanPermohonan'])->name('permohonan.simpan');

Route::get('/formulir-keberatan', [PermohonanKeberatanController::class, 'create'])->name('formulir.permohonan-keberatan');
Route::get('/formulir-keberatan', [PermohonanKeberatanController::class, 'showFormulir'])->name('formulir.permohonan-keberatan'); //akses dari email
Route::post('/simpan-permohonan-keberatan', [PermohonanKeberatanController::class, 'simpanPermohonanKeberatan'])->name('simpan.permohonan-keberatan');

Route::get('/penyelesaian-sengketa', [PermohonanSengketaController::class, 'showFormulir'])->name('permohonansengketa.formulir');
Route::get('/status-penyelesaian-sengketa', [StatusLayananSengketaController::class, 'index'])->name('status.penyelesaian.sengketa');
Route::get('/permohonan-sengketa/{id}', [PermohonanSengketaController::class, 'show'])->name('permohonan.sengketa.show');
Route::post('/simpan-permohonansengketa', [PermohonanSengketaController::class, 'simpanSengketa'])->name('simpan.permohonansengketa');

Route::get('detail-profile/{id}',[ProfileController::class, 'detailForAdmin'])->name('profile.detailForAdmin');  

Route::middleware(['auth', 'user'])->prefix('user')->group(function () {
    Route::get('dashboard',[App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('user.index');
    Route::get('tanyaAdmin',[TanyaAdminController::class, 'index'])->name('tanyaAdmin.index');
    Route::get('/user/status-layanan-informasi', [StatusLayananController::class, 'userIndex'])->name('user.status-layanan-informasi');
    Route::get('notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::delete('/notifikasi/{id}', [NotifikasiController::class, 'destroy'])->name('notifikasi.delete');

    Route::post('/notifications/{id}/mark-as-read', [NotifikasiController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/{id}/redirect', [NotifikasiController::class, 'redirectTo'])->name('notifications.redirectTo');

    Route::post('tanyaAdmin',[TanyaAdminController::class, 'store'])->name('tanyaAdmin.store');
    Route::get('detail-profile',[ProfileController::class, 'detail'])->name('profile.detail');  
    Route::get('profile',[ProfileController::class, 'index'])->name('profile.index');  
    Route::post('profile',[ProfileController::class, 'store'])->name('profile.store');
    Route::get('landingPageReview',[landingPageReviewController::class, 'index'])->name('landingPageReview.index');

    Route::get('status-layanan-informasi/{id}', [StatusLayananInformasiController::class, 'showInfo'])->name('user.status-layanan-informasi.show');
    Route::delete('/status-layanan-informasi/{id}', [StatusLayananController::class, 'delete'])->name('status-layanan-informasi-user.delete');

    Route::get('/status-keberatan', [StatusKeberatanController::class, 'userIndex'])->name('status-keberatan');
    Route::delete('/status-layanan-keberatan/{id}', [StatusKeberatanController::class, 'delete'])->name('status-layanan-keberatan-informasi-user.delete');

    Route::get('/status-sengketa', [StatusSengketaController::class, 'userIndex'])->name('status-sengketa');
    Route::delete('/status-layanan-keberatan/{id}', [StatusSengketaController::class, 'delete'])->name('status-layanan-keberatan-informasi-user.delete');

});

// Routes for track order
Route::get('/track-order/{id}', [TrackOrderController::class, 'showTrackOrder'])->name('track-order.show');
Route::patch('track-order/update-status/{id}', [TrackOrderController::class, 'updateStatus'])->name('track-order.update-status');


Route::middleware(['auth'])->group(function(){
    Route::get('/informasi-publik/daftar-informasi-publik', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikController::class, 'index'])->name('informasi-publik.daftar-informasi-publik.index');
    Route::get('/informasi-publik/daftar-informasi-publik/setiap-saat', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikSetiapSaatController::class, 'index'])->name('informasi-publik.daftar-informasi-publik-setiap-saat.index');
    Route::get('/informasi-publik/daftar-informasi-publik/serta-merta', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikSertaMertaController::class, 'index'])->name('informasi-publik.daftar-informasi-publik-serta-merta.index');
    Route::post('/selectInformasi', [App\Http\Controllers\Admin\InformasiPublik\DaftarInformasiPublikSetiapSaatController::class, 'RincianInformasi'])->name('informasi.select');
    Route::get('/informasi-publik/daftar-informasi-publik/file/{id}', [App\Http\Controllers\Admin\InformasiPublik\FileInformasiPublikController::class, 'index'])->name('informasi-publik.daftar-informasi-publik.file');
    Route::get('/informasi-publik/daftar-informasi-publik/file/edit/{id}', [App\Http\Controllers\Admin\InformasiPublik\FileInformasiPublikController::class, 'edit'])->name('informasi-publik.daftar-informasi-publik.file-edit');
    Route::put('/informasi-publik/daftar-informasi-publik/file/edit/{id}', [App\Http\Controllers\Admin\InformasiPublik\FileInformasiPublikController::class, 'update'])->name('informasi-publik.daftar-informasi-publik.file-update');
    Route::delete('/informasi-publik/daftar-informasi-publik/file/delete/{id}', [App\Http\Controllers\Admin\InformasiPublik\FileInformasiPublikController::class, 'destroy'])->name('informasi-publik.daftar-informasi-publik.file-destroy');
    Route::post('/informasi-publik/daftar-informasi-publik/file/store', [App\Http\Controllers\Admin\InformasiPublik\FileInformasiPublikController::class, 'store'])->name('informasi-publik.daftar-informasi-publik.file-store');
});


// note : route untuk search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// note : route untuk logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// note : route untuk tambahan untuk edit tabel pada 
Route::put('/daftar-informasi-detail/edit/{id}', [App\Http\Controllers\Admin\DaftarInformasiController::class, 'update_detail'])->name('detail-informasi.update');

// note : route untuk tambahan untuk laporan statistik
Route::get('pages.laporan.laporanstatistik', [laporanstatistikController::class, 'index'])->name('laporanstatistik');

