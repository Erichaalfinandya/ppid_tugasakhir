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
                <div class="row g-5 mb-5 mt-5 align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="mb-0">Daftar Informasi Publik Secara Serta Merta</h1>
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
                                                    <a href="{{ route('layananinformasisetiapsaat3', ['id' => $data->id]) }}"
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
            </div>
        </div>

        @include('include.footer') 

        @include('include.script')

        <!-- note : script tambahan -->
        @include('include.script-custom')

    </body>

</html>