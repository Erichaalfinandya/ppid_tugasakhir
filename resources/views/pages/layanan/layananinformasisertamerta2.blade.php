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

                        <!-- Daftar Layana n Berkala Start -->
                <div class="container-fluid py-5">
                    <div class="container">
                        <div class="row mb-5 justify-content-center">
                            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                                <h1 class="mb-0">Daftar Informasi Publik Secara Serta Merta</h1>
                                <center>
                                    <div class="line-custom">
                                        <div class="rectangle-custom"></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div>
                            <table id="example" class="table display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center text-white bg-primary">No</th>
                                        <th class="text-center text-white bg-primary">Jenis File</th>
                                        <th class="text-center text-white bg-primary">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($judul as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->judul }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('layananinformasisertamerta3', ['id' => $data->id]) }}"
                                                        type="submit" class="text-primary fw-bolder">
                                                        Lihat
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Daftar Layanan Berkala Start -->

        @include('include.footer') 

        @include('include.script')

        <!-- note : script tambahan -->
        @include('include.script-custom')
    </body>

</html>