@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>RIWAYAT PEKERJAAN WAKIL WALIKOTA SURAKARTA- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Riwayat&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;PEKERJAAN WAKIL WALIKOTA SURAKARTA&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form" action="{{ route('pekerjaan_wakil.update', ['pekerjaan_wakil' => $pekerjaanwakil->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="masa">Masa Jabatan</label>
                    <input type="text" class="form-control" id="masa" placeholder="Masukkan riwayat masa jabatan wakil walikota"
                        name="masa" value="{{ old('masa', $pekerjaanwakil->masa) }}" required>
                    @error('masa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Posisi Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" placeholder="Masukkan riwayat posisi jabatan wakil walikota"
                        name="jabatan" value="{{ old('jabatan', $pekerjaanwakil->jabatan) }}" required>
                    @error('jabatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi riwayat pendidikan"
                        name="deskripsi">{{ old('deskripsi', $pekerjaanwakil->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan nama penerbit"
                        name="penerbit" value="{{ old('penerbit', $pekerjaanwakil->penerbit) }}" required>
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
