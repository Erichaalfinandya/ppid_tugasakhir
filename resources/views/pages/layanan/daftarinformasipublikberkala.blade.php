<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

        <!-- note : css tambahan -->
        @include('include.style-custom')

    </head>

    <body>

        @include('include.navbar-without-search')

                        <!-- Daftar Informasi Publik Berkala Start -->
                <div class="container-fluid py-5">
                    <div class="container">
                        <div class="row mb-5 justify-content-center">
                            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                                <h1 class="mb-0">Daftar Informasi Publik Secara Berkala</h1>
                                <center>
                                    <div class="line-custom">
                                        <div class="rectangle-custom"></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div class="align-items-center">
                            <h5 class="float-start">A. INFORMASI WAJIB DIUMUMKAN SECARA BERKALA</h5>
                        </div>
                        <div>
                            <table id="example" class="table display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center text-white bg-primary">No</th>
                                        <th class="text-center text-white bg-primary">Jenis Informasi</th>
                                        <th class="text-center text-white bg-primary">Ringkasan Informasi</th>
                                        <th class="text-center text-white bg-primary">Pejabat Yang Menguasai Informasi</th>
                                        <th class="text-center text-white bg-primary">Penanggung Jawab Informasi</th>
                                        <th class="text-center text-white bg-primary">Waktu Pembuatan Informasi</th>
                                        <th class="text-center text-white bg-primary">Bentuk Informasi yang Tersedia</th>
                                        <th class="text-center text-white bg-primary">Jangka Waktu Penyimpanan</th>
                                        <th class="text-center text-white bg-primary">Jenis Media yang Memuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-break"><span>{{ $data->jenisInfo->nama }}</span>
                                                <p class="mt-2">{{ $data->rincianJenisInfo->nama ?? '' }}</p>
                                            </td>
                                            <td class="text-break">{{ $data->ringkasan_informasi }}</td>
                                            <td class="text-break">{{ $data->pejabat->nama }}</td>
                                            <td class="text-break">{{ $data->penanggung_jawab }}</td>
                                            <td class="text-break">{{ $data->waktu_pembuatan }}</td>
                                            <td class="text-break">{{ $data->bentuk_informasi }}</td>
                                            <td class="text-break">{{ $data->jangka_waktu }}</td>
                                            <td class="text-break"><a href="{{ url('pages/layanan/daftarinformasipublikberkala2/'.$data->id) }}">{{ $data->jenis_media }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Daftar Informasi Publik Berkala Start -->

        @include('include.footer')

        @include('include.script')

        <!-- note : script tambahan -->
        @include('include.script-custom')
    </body>

</html>
