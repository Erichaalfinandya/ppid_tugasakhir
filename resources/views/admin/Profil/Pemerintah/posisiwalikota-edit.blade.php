@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>RIWAYAT POSISI WALIKOTA SURAKARTA- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;RIWAYAT POSISI&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;WALIKOTA SURAKARTA&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form" action="{{ route('posisi_walikota.update', ['posisi_walikota' => $posisiwalikota->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <textarea class="form-control" id="posisi" placeholder="Masukkan data riwayat posisi walikota kota surakarta"
                        name="posisi" required>{{ old('posisi', $posisiwalikota->posisi) }}</textarea>
                    @error('posisi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">Riwayat Posisi/Lokasi Penempatans</label>
                    <input type="text" class="form-control" id="lokasi" placeholder="Masukkan penempatan posisi atau lokasi riwayat posisi"
                        name="lokasi" value="{{ old('lokasi', $posisiwalikota->lokasi) }}" required>
                    @error('lokasi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi riwayat posisi"
                        name="deskripsi" required>{{ old('deskripsi', $posisiwalikota->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <h5>Sampul Posisi</h5>
                    <img src="{{ url($posisiwalikota->sampul) }}" style="height:200px;object-fit:cover">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sampul Posisi</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Nama Penerbit"
                        name="penerbit" value="{{ old('penerbit', $posisiwalikota->penerbit) }}" required>
                    @error('penerbit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            var fileInput = document.getElementById('imageInput');
            var file = fileInput.files[0];

            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran gambar maksimal adalah 2MB');
                event.preventDefault();
            }
        });
    </script>

@endpush
