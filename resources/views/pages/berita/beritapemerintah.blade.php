@php
use App\Models\BeritaPemerintah;
$beritaPemerintah = BeritaPemerintah::all(); // Menampilkan 6 berita per halaman
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
    </head>

    <body>

        @include('include.navbar')

        <!-- Berita Pemerintah Start -->
        <div class="container-fluid blog">
            <div class="container py-5">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Berita</h5>
                        <h1 class="mb-0">Berita Pemerintah</h1>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach($beritaPemerintah as $index => $berita)
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
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>Pemerintah
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
                                    <a href="{{ url('/pages.berita.beritapemerintah/'.$berita['id']) }}" class="btn btn-primary rounded-pill py-2 px-4">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
</body>

</html>
