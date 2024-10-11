@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar Publik Informasi - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Daftar Informasi&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                        data-target="#addModal">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('informasi-publik.daftar-informasi-publik.file-update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="informasi_publik_id" value="{{ $data->informasi_publik_id }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"
                        placeholder="Deskripsi" required>{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tahun</label>
                    <select id="tahun" name="tahun" class="form-select" required>
                        <?php
                        // Mendapatkan tahun sekarang
                        $tahunSekarang = date('Y');

                        // Menentukan rentang tahun yang diinginkan
                        $tahunAwal = 2018; // Tahun awal
                        $tahunAkhir = $tahunSekarang; // Tahun akhir

                        // Membuat opsi untuk setiap tahun dalam rentang yang ditentukan
                        for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
                            $selected = $tahun == $data->tahun ? 'selected' : ''; // menambahkan atribut selected jika tahun saat ini
                            echo "<option value='$tahun' $selected>$tahun</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fileInput">File</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" accept=".pdf" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file, file wajib PDF dan berukuran maksimal 5 MB.</small>
                </div>
                <input type="hidden" name="oldFile" value="{{ $data->file }}">
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>
@endsection
