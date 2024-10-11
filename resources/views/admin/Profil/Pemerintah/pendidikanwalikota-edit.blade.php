@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>RIWAYAT PENDIDIKAN WALIKOTA SURAKARTA- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Riwayat&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;PENDIDIKAN WALIKOTA SURAKARTA&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form" action="{{ route('pendidikan_walikota.update', ['pendidikan_walikota' => $pendidikanwalikota->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="pendidikan">Riwayat Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" placeholder="Masukkan riwayat pendidikan walikota"
                        name="pendidikan" value="{{ old('pendidikan', $pendidikanwalikota->pendidikan) }}" required>
                    @error('pendidikan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Pendidikan</label>
                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Pendidikan"
                        name="tahun" value="{{ old('tahun', $pendidikanwalikota->tahun) }}" required>
                    @error('tahun')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi riwayat pendidikan"
                        name="deskripsi" required>{{ old('deskripsi', $pendidikanwalikota->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <h5>Sampul Pendidikan</h5>
                    <img src="{{ url($pendidikanwalikota->sampul) }}" style="height:200px;object-fit:cover">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sampul Posisi</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan nama penerbit"
                        name="penerbit" value="{{ old('penerbit', $pendidikanwalikota->penerbit) }}" required>
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
