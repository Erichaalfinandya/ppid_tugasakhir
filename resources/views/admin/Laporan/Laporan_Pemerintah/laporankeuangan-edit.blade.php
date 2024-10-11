@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>LAPORAN KEUANGAN PEMERINTAH- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Laporan&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;LAPORAN KEUANGAN PEMERINTAH&nbsp;/&nbsp;</p>
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
            <form id="form" action="{{ route('laporan_keuangan.update', ['laporan_keuangan' => $laporankeuangan->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul"
                        name="judul" value="{{ old('judul', $laporankeuangan->judul) }}" required>
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Laporan</label>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi laporan"
                        name="deskripsi" required>{{ old('deskripsi', $laporankeuangan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun"
                        name="tahun" value="{{ old('tahun', $laporankeuangan->tahun) }}" required>
                    @error('tahun')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Penerbit"
                        name="penerbit" value="{{ old('penerbit', $laporankeuangan->penerbit) }}" required>
                    @error('penerbit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <h5>Sampul Laporan</h5>
                    <img src="{{ url($laporankeuangan->sampul) }}" style="height:200px;object-fit:cover">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sampul</label>
                    <input type="file" class="form-control form-control-file" id="fileInput" name="file">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar, ukuran gambar maksimal 2 MB.</small>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control form-control-file" id="file" name="file" accept="application/pdf">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file. Hanya file PDF dengan ukuran maksimal 2048KB yang diperbolehkan.</small>
                    @error('file')
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
