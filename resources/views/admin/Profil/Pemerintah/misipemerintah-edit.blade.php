@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>MISI PEMERINTAH KOTA SURAKARTA- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;MISI PEMERINTAH&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;KOTA SURAKARTA&nbsp;/&nbsp;</p>
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
            <form id="form" action="{{ route('misi_pemerintah.update', ['misi_pemerintah' => $misipemerintah->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="urutan">Urutan</label>
                    <input type="number" class="form-control" id="urutan" placeholder="Masukkan urutan misi pemerintah Kota surakarta"
                        name="urutan" value="{{ old('urutan', $misipemerintah->urutan) }}" required>
                    @error('urutan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="misi">Misi Pemerintah Kota Surakarta</label>
                    <textarea class="form-control" id="misi" placeholder="Masukkan misi pemerintah kota surakarta"
                        name="misi" required>{{ old('misi', $misipemerintah->misi) }}</textarea>
                    @error('misi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Nama Penerbit"
                        name="penerbit" value="{{ old('penerbit', $misipemerintah->penerbit) }}" required>
                    @error('penerbit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="color: white">Perbarui Data</button>
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
