@php
use App\Models\Galeri;
$galeris = Galeri::where('oleh', "PPID")->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PPID Kota Surakarta</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @include('include.style')
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>
<body>
    @include('include.navbar')
    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5 my-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Galeri</h5>
            <h1 class="mb-4">Galeri PPID</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#GalleryTab-1">
                        <span class="text-dark" style="width: 150px;">Semua</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-2">
                        <span class="text-dark" style="width: 150px;">Foto</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-3">
                        <span class="text-dark" style="width: 150px;">Video</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-2">
                        @foreach($galeris as $galeri)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery-item h-100">
                                @if(strtolower($galeri->jenis) == 'foto')
                                <img src="{{ $galeri->media }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                                @else
                                <video src="{{ $galeri->media }}" class="img-fluid w-100 h-100 rounded" controls preload="auto"></video>
                                @endif
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">{{ $galeri->judul }}</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ $galeri->media }}" data-fancybox="gallery" data-caption="{{ $galeri->judul }}" class="my-auto">
                                        <i class="fas fa-plus fa-2x text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="GalleryTab-2" class="tab-pane fade show p-0">
                    <div class="row g-2">
                        @foreach($galeris->where('jenis', strtolower('Foto')) as $galeri)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery-item h-100">
                                <img src="{{ $galeri->media }}" class="img-fluid w-100 h-100 rounded" alt="Image">
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">{{ $galeri->judul }}</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ $galeri->media }}" data-fancybox="gallery" data-caption="{{ $galeri->judul }}" class="my-auto">
                                        <i class="fas fa-plus fa-2x text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="GalleryTab-3" class="tab-pane fade show p-0">
                    <div class="row g-2">
                        @foreach($galeris->where('jenis', strtolower('Video')) as $galeri)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery-item h-100">
                                <video src="{{ $galeri->media }}" class="img-fluid w-100 h-100 rounded" controls preload="auto"></video>
                                <div class="gallery-content">
                                    <div class="gallery-info">
                                        <h5 class="text-white text-uppercase mb-2">{{ $galeri->judul }}</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="gallery-plus-icon">
                                    <a href="{{ $galeri->media }}" data-fancybox="gallery" data-caption="{{ $galeri->judul }}" class="my-auto">
                                        <i class="fas fa-plus fa-2x text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    @include('include.footer')
    @include('include.script')
    
    <!-- Fancybox JS -->
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
