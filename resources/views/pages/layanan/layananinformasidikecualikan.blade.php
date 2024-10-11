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
                        <h1 class="mb-0">Daftar Informasi Dikecualikan</h1>
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
                                <img class="img-fluid w-100" src="{{ asset('img/dikecualikan.jpg') }}" alt="">
                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h1 class="mb-0 text-center">Daftar Informasi Dikecualikan</h1>
                        <center>
                            <div class="line-custom-2">
                            </div>
                        </center>
                        <p>Dalam informasi dikecualikan ini berisi daftar informasi yang dikecualikan Pemerintah Kota Surakarta,<br>Dengan adanya daftar ini diharapkan untuk memberikan informasi bagi masyarakat yang ingin mengajukan informasi selain dari data informasi yang dikecualikan ini</p>
                        <table>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Ringkasan Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;" class="text-break text-wrap">
                                : Berisi daftar informasi yang dikecualikan Pemerintah Kota Surakarta
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Pejabat yang Menguasai Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : PPID
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Penanggung Jawab Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : PPID
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Waktu Pembuatan Informasi</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : 2024
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Bentuk Informasi yang Tersedia</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : Softfile
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Jangka Waktu Penyimpanan</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : Selama Berlaku
                                </td>
                            </tr>
                            <tr>
                                <td style="width:50%;vertical-align: top;">
                                    <ul>
                                        <li>Jenis Media yang Memuat</li>
                                    </ul>
                                </td>
                                <td style="width:50%;vertical-align: top;">
                                : http://ppid.surakarta.go.id/informasi/daftar-informasi-publik-dikecualikan
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row g-5 mb-5 mt-5 align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="mb-0 text-center">Daftar Informasi Dikecualikan</h1>
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
                                        <th class="text-center text-white bg-primary">Jenis File</th>
                                        <th class="text-center text-white bg-primary">Tahun</th>
                                        <th class="text-center text-white bg-primary">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($daftarInfo as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->judul }}</td>
                                            <td class="text-center">{{ $data->tahun }}</td>
                                            <td class="text-center"><a href="{{ url($data->file) }}"
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
                </div>
            </div>
        </div>

        @include('include.footer')

        @include('include.script')

        <!-- note : script tambahan -->
        @include('include.script-custom')

    </body>

</html>
