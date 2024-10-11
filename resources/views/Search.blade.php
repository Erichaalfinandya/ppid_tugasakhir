@php
use App\Models\BeritaPPID;
$beritaPPID = BeritaPPID::all(); // Menampilkan 6 berita per halaman
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
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <style>
        .blog-img-inner {
            width: 100%;
            height: 200px; /* Menetapkan tinggi tetap untuk gambar */
            overflow: hidden; /* Memastikan gambar yang melebihi area terpotong */
        }

        .blog-img-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menjaga proporsi gambar dan memotong sesuai area */
        }
    </style>
</head>

<body>

    <!-- @include('include.navbar') -->

    <!-- Berita Diskominfo Start -->
   <!-- Berita Diskominfo Start -->
   <div class="container-fluid blog">
    <div class="container pt-5 pb-0">
        @if($jenis === 'semua' || $jenis === 'berita')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Berita PPID</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
        @if(!$beritaResults->isEmpty())
            @foreach($beritaResults as $index => $berita) <!-- Tambahkan $index -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" src="{{ $berita->sampul }}" alt="Image">
                            <div class="blog-icon">
                                <a href="{{ $berita->sampul }}" data-fancybox="gallery" data-caption="{{ $berita->judul }}" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>PPID
                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($berita['created_at'])->format('d M') }}
                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-clock text-primary me-2"></i>{{ \Carbon\Carbon::parse($berita['created_at'])->format('H:i') }}
                            </small>
                        </div>
                    </div>
                    <div class="blog-content border border-top-0 rounded-bottom p-4">
                        <p class="mb-3">Posted By: {{ $berita['penerbit'] }}</p>
                        <a href="#" class="h4">{{ $berita['judul'] }}</a>
                        <p class="my-3">{{ strlen($berita['deskripsi']) > 50 ? substr($berita['deskripsi'], 0, 50) . '...' : $berita['deskripsi'] }}</p>
                        <a href="{{ url('/pages.berita.beritappid/'.$berita['id']) }}" class="btn btn-primary rounded-pill py-2 px-4">Lihat</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam berita</p>
        @endif
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'laporan')
            @if($jenis === 'semua')
            <br><br>
            <hr>
            @endif
        <div class="row mt-5 justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Laporan PPID</h1>
            </div>
        </div>
        <div class="container mx-auto p-4 pt-0 prefix-">
            <!-- Konten di sini akan terpengaruh oleh Tailwind dengan prefix 'prefix-' -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($laporanResults as $laporan)
                <a href="{{ url($laporan->file) }}">
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md overflow-hidden flex flex-row">
                        <div class="w-64">
                            <img src="{{ asset($laporan->sampul) }}" alt="Report 1" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="flex-grow p-4">
                            <span class="inline-block bg-yellow-500 text-white text-xs px-2 py-1 rounded-full mb-2">{{$laporan->tahun}}</span>
                            <h3 class="text-lg font-bold dark:text-zinc-800 dark:text-zinc-100">{{$laporan->judul}}</h3>
                            <p class="text-zinc-600 dark:text-zinc-400">{{$laporan->deskripsi}} </p>
                            <p class="text-zinc-600 dark:text-zinc-400 mt-2">Dokumen, PDF</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="flex justify-center items-center space-x-2 mt-4">
                @for($i = 0; $i < ceil(count($laporanResults) / 3); $i++)
                <div class="dot w-3 h-3 rounded-full bg-zinc-400 cursor-pointer" onclick="activateDot({{$i}})"></div>
                @endfor
            </div>
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'daftar informasi publik')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Daftar Informasi Publik</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @if(!$daftarInformasiPublikResults->isEmpty())
            <div class="col-lg-12 col-md-12">
                <div>
                    <table id="example" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center text-white bg-primary">No</th>
                                <th class="text-center text-white bg-primary">Deskripsi</th>
                                <th class="text-center text-white bg-primary">Tahun</th>
                                <th class="text-center text-white bg-primary">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarInformasiPublikResults as $index => $files)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td class="text-center">{{ $files->deskripsi }}</td>
                                <td class="text-center">{{ $files->tahun }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/file/'.$files->file) }}" class="text-primary fw-bolder">Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam daftar informasi</p>
            @endif
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'informasi berkala')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Informasi Berkala</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @if(!$informasiBerkalaResults->isEmpty())
            <div class="col-lg-12 col-md-12">
                <div>
                    <table id="example" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center text-white bg-primary">No</th>
                                <th class="text-center text-white bg-primary">Jenis File</th>
                                <th class="text-center text-white bg-primary">Tahun</th>
                                <th class="text-center text-white bg-primary">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($informasiBerkalaResults as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $data->ringkasan_informasi }}</td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="text-center"><a href="{{ url('admin/file/'.$data->file) }}"
                                            target="blank" class="btn btn-success btn-sm text-white py-1"><span
                                                class="mdi mdi-download"></span>
                                            Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam informasi berkala</p>
            @endif
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'serta merta')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Informasi Serta Merta</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @if(!$informasiSertaMertaResults->isEmpty())
            <div class="col-lg-12 col-md-12">
                <div>
                    <table id="example" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center text-white bg-primary">No</th>
                                <th class="text-center text-white bg-primary">Jenis File</th>
                                <th class="text-center text-white bg-primary">Tahun</th>
                                <th class="text-center text-white bg-primary">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($informasiSertaMertaResults as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $data->ringkasan_informasi }}</td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="text-center"><a href="{{ url('admin/file/'.$data->file) }}"
                                            target="blank" class="btn btn-success btn-sm text-white py-1"><span
                                                class="mdi mdi-download"></span>
                                            Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam informasi serta merta</p>
            @endif
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'setiap saat')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Informasi Setiap Saat</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @if(!$informasiSetiapSaatResults->isEmpty())
            <div class="col-lg-12 col-md-12">
                <div>
                    <table id="example" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center text-white bg-primary">No</th>
                                <th class="text-center text-white bg-primary">Jenis File</th>
                                <th class="text-center text-white bg-primary">Tahun</th>
                                <th class="text-center text-white bg-primary">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($informasiSetiapSaatResults as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $data->ringkasan_informasi }}</td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="text-center"><a href="{{ url('admin/file/'.$data->file) }}"
                                            target="blank" class="btn btn-success btn-sm text-white py-1"><span
                                                class="mdi mdi-download"></span>
                                            Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam informasi setiap saat</p>
            @endif
        </div>
        @endif
        @if($jenis === 'semua' || $jenis === 'dikecualikan')
        <div class="row justify-content-center">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Hasil Pencarian</h5>
                <h1 class="mb-0">Informasi Dikecualikan</h1>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @if(!$informasiDikecualikanResults->isEmpty())
            <div class="col-lg-12 col-md-12">
                <div>
                    <table id="example" class="table display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center text-white bg-primary">No</th>
                                <th class="text-center text-white bg-primary">Jenis File</th>
                                <th class="text-center text-white bg-primary">Tahun</th>
                                <th class="text-center text-white bg-primary">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($informasiDikecualikanResults as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $data->ringkasan_informasi }}</td>
                                    <td class="text-center">{{ $data->tahun }}</td>
                                    <td class="text-center"><a href="{{ url('admin/file/'.$data->file) }}"
                                            target="blank" class="btn btn-success btn-sm text-white py-1"><span
                                                class="mdi mdi-download"></span>
                                            Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <p>Tidak ada hasil ditemukan untuk "{{ $query }}" dalam informasi dikecualikan</p>
            @endif
        </div>
        @endif
     </div>
    </div>
    <br>
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
    <style>
        .dot {
            transition: background-color 0.3s;
        }
        .collapse {
            visibility: unset!important;
        }
    </style>

<!-- Berita Diskominfo End -->

    <!--  Berita Diskominfo End -->
    @include('include.footer')

    @include('include.script')
    
    <!-- note : fancy box plugin untuk lightbox seperti di galeri -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $("[data-fancybox]").fancybox({
                video: {
                    autoStart: true,
                    preload: true
                },
                buttons: [
                    "zoom",
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ],
                youtube: {
                    controls: 0,
                    showinfo: 0
                },
                vimeo: {
                    color: 'f00'
                }
            });
        });
    </script>
<script src="https://cdn.tailwindcss.com"></script>    
</body>

</html>
