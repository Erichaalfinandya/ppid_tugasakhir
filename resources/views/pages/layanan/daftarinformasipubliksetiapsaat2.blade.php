<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

        <!-- note : style tambahan -->
        @include('include.style-custom')

    </head>

    <body>

        @include('include.navbar-without-search')

        <div class="container-fluid py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h1 class="mb-0">Informasi Publik Setiap Saat</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5 align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="/img/informasi.png" alt="">
                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h1 class="mb-0 text-center">{{ $jenInfo }}</h1>
                        <center>
                            <div class="line-custom-2">
                            </div>
                        </center>
                        <p>Dalam kedudukan/domisili beserta alamat lengkap ini berisi mengenai alamat lengkap pemerintah Kota Surakarta. Adapun untuk pernyataan lebih lanjutnya sebagai berikut :</p>
                        <table>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Ringkasan Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;" class="text-break text-wrap">
                                :{{ $infoPublik->ringkasan_informasi }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Pejabat yang Menguasai Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $pejabat }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Penanggung Jawab Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $infoPublik->penanggung_jawab }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Waktu Pembuatan Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $infoPublik->waktu_pembuatan }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Bentuk Informasi yang Tersedia</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $infoPublik->bentuk_informasi }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Jangka Waktu Penyimpanan</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $infoPublik->jangka_waktu }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Jenis Media yang Memuat</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : {{ $infoPublik->jenis_media }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5 align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="mb-0 text-center">{{ $jenInfo }}</h1>
                        <center>
                            <div class="line-custom-2">
                            </div>
                        </center>
                    </div>
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
                                    @foreach($file as $index => $files)
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
                </div>
            </div>
        </div>

        @include('include.footer') 

        @include('include.script')

        <!-- note : script tambahan -->
        @include('include.script-custom')

    </body>

</html>