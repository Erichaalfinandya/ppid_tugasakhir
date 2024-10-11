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
            /* Kelas tombol umum dengan nama berbeda */
            .bttn {
                background-color: #1A374D; /* Warna background biru */
                color: white; /* Warna teks putih */
                border: 2px solid #1A374D; /* Border sama dengan warna background */
                transition: background-color 0.3s ease, color 0.3s ease; /* Animasi transisi */
            }

            /* Kelas khusus untuk tombol laporan */
            .bttn-laporan {
                background-color: #1A374D; /* Background biru tua */
                color: white !important; /* Teks putih */
                border: 2px solid #1A374D; /* Border biru tua */
                padding: 8px 20px; /* Padding tombol */
                border-radius: 5px; /* Sudut bulat */
                text-decoration: none; /* Menghapus underline pada link */
                transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease; /* Transisi halus */
            }

            /* Gaya saat dihover */
            .bttn-laporan:hover, .bttn-laporan:focus {
                background-color: white; /* Background putih saat dihover */
                color: #13357B !important; /* Teks berubah menjadi biru */
                border: 2px solid #13357B; /* Border tetap biru */
            }

            /* Gaya saat tombol diklik (aktif) */
            .bttn-laporan:active {
                background-color: white; /* Background tetap putih saat diklik */
                color: #13357B; /* Teks biru saat diklik */
                border: 2px solid #13357B; /* Border putih saat diklik */
            }
        </style>
    </head>

    <body>

        @include('include.navbar')

        <!-- Daftar Informasi Dikecualikan Start -->
        <div class="container-xxl project py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Laporan Pemerintah </h5>
                        <h1 class="mb-0">Laporan Kinerja Instansi Pemerintah Kota Surakarta</h1>
                    </div>
                </div>
                <table class="informasi-table">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Keterangan/Judul Laporan</th>
                            <th>Tahun Laporan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kinerjas as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->keterangan  }}</td>
                                <td class="text-center">{{ $data->tahun  }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ asset($data->file) }}" target="_blank" class="bttn bttn-laporan bttn-center">
                                        <span class="mdi mdi-download"></span> Lihat File
                                    </a>
                                </td>                                
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Daftar Informasi Dikecualikan End -->

        @include('include.footer') 

        @include('include.script')
    </body>

</html>