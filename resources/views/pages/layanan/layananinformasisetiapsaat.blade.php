@php
use App\Models\Judul;
use App\Models\Kategori;
 use App\Models\DaftarInformasi;
   $informasiData = Kategori::where('pembagian_informasi', 'Berkala')->get();

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

    </head>

    <body>

        @include('include.navbar')

                        <!-- Daftar Layanan Setiap Saat Start -->
                        <div class="row mb-5 justify-content-center">
                            <div class="row mb-5 justify-content-center">
                                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                                    <h5 class="section-title px-3">Layanan</h5>
                                    <h1 class="mb-0">Setiap Saat</h1>
                                </div>
                            </div>
                            <section class="popular-categories">
                                <div class="container-fluid">
                                <div class="row">
                                    @foreach($informasiData as $item)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="popular-item">
                                            <div class="top-content">
                                                <div class="icon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                                <div class="right">
                                                    <h4>{{ $item['nama'] }}</h4>
                                                    @php
                                                    $kategori = Kategori::find($item->id);
                                                    $totalFile = Judul::where('kategori_id', $kategori->id)->count()
                                                    @endphp
                                                    <span><em>{{ $totalFile }}</em> File</span>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <img src="{{ $item->gambar }}" alt="">
                                            </div>
                                            <div class="border-button">
                                                <a href="{{ url('pages.layanan.layananinformasisetiapsaat2/'.$item->id) }}">Lihat File</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                </div>
                            </section>
                        </div>
                    <!-- Daftar Layanan Setiap Saat Start -->

        @include('include.footer')

        @include('include.script')
    </body>

</html>
