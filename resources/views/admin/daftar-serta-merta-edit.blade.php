@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar {{ $data->pembagian_informasi }} - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Daftar {{ $data->pembagian_informasi }}&nbsp;/&nbsp;</p>
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
            <form action="{{ route('daftar-serta-merta.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <input type="text" class="form-control" id="" placeholder="Masukkan Kategori"
                        name="nama" value="{{ $data->nama }}" required>
                </div>
                <input type="hidden" name="pembagian_informasi" value="{{ $data->pembagian_informasi }}">
                <div class="form-group">
                    <label for="fileInput">Gambar</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>
@endsection
