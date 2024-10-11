@php
use App\Models\DaftarInformasi;
use App\Http\Controllers\Controller;
use App\Models\LaporanPpid;
$laporan_ppid = LaporanPpid::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPID Kota Surakarta </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('include.style')
<style>
    .dot {
        transition: background-color 0.3s;
    }
    .collapse {
        visibility: unset!important;
    }
</style>

</head>

<body>

    @include('include.navbar')

    <!-- Laporan Pemerintah Start  -->
    <div class="container-fluid blog">
    <div class="container pt-5 pb-0">
        <div class="row mb-5 justify-content-center">
            <div class="row mb-5 justify-content-center">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Laporan</h5>
                    <h1 class="mb-0">Laporan PPID Kota Surakarta</h1>
                </div>
            </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($laporan_ppid as $laporan)
            <a href="{{ url($laporan->file) }}">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{ asset($laporan->sampul) }}" class="img-fluid rounded-start" style="height:250px;width:100%;object-fit:cover">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <span class="inline-block badge rounded-pill bg-warning text-dark text-xs px-2 py-1 mb-2">{{$laporan->tahun}}</span>
                            <h3 class="text-lg font-bold dark:text-zinc-800 dark:text-zinc-100">{{$laporan->judul}}</h3>
                            <p class="text-zinc-600 dark:text-zinc-400">{{$laporan->deskripsi}} </p>
                            <p class="text-zinc-600 dark:text-zinc-400 mt-2">Dokumen Laporan PPID Kota Surakarta</p>
                            <p class="text-zinc-600 dark:text-zinc-400 mt-2">Dokumen, PDF</p>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-center items-center space-x-2 mt-4">
            @for($i = 0; $i < ceil(count($laporan_ppid) / 3); $i++)
            <div class="dot w-3 h-3 rounded-full bg-zinc-400 cursor-pointer" onclick="activateDot({{$i}})"></div>
            @endfor
        </div>
        <script>
            function activateDot(index) {
                const dots = document.querySelectorAll('.dot');
                dots.forEach((dot, i) => {
                    dot.classList.remove('bg-blue-500');
                    dot.classList.add('bg-zinc-400');
                    if (i === index) {
                        dot.classList.remove('bg-zinc-400');
                        dot.classList.add('bg-blue-500');
                    }
                });
                console.log(`Dot ${index + 1} activated`);
            }
        </script>

    </div>
    </div>
    </div>
    <!-- Laporan Pemerintah End -->

    @include('include.footer')

    @include('include.script')
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</body>

</html>


