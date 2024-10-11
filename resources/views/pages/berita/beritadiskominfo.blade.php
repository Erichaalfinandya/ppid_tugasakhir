@php
use App\Models\BeritaKominfo;
    $beritakominfo = BeritaKominfo::all();
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

    @include('include.navbar')

    <!-- Berita Diskominfo Start -->
    <div class="container-fluid blog">
        <div class="container py-5">
            <div class="row mb-5 justify-content-center">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Berita</h5>
                    <h1 class="mb-0">Berita Kominfo</h1>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach( $beritakominfo as $berita)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-img">
                            <div class="blog-img-inner">
                                <img class="img-fluid w-100 rounded-top" src="{{  $berita->sampul }}" alt="Image">
                                <div class="blog-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                            <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>Diskominfo
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
                            <a href="#" class="h4">{{ $berita['judul'] }}</a>
                            <p class="my-3">{{ strlen($berita['deskripsi']) > 50 ? substr($berita['deskripsi'], 0, 50) . '...' : $berita['deskripsi'] }}</p>
                            <a href="{{ $berita['link'] }}" class="btn btn-primary rounded-pill py-2 px-4">Lihat</a>
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
</body>

</html>
