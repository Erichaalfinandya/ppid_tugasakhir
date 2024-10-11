@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>RIWAYAT PENDIDIKAN SEKRETARIS PEMERINTAH SURAKARTA- Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Riwayat&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;PENDIDIKAN SEKRETARIS PEMERINTAH SURAKARTA&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Edit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form" action="{{ route('pendidikan_sekretaris.update', ['pendidikan_sekretaris' => $pendidikansekretaris->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="jenjang">Jenjang Pendidikan</label>
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="">Pilih Jenjang Pendidikan</option>
                        <option value="SD" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="Diploma" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="S1" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ old('jenjang', $pendidikansekretaris->jenjang) === 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                    @error('jenjang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pendidikan">Nama Sekolah/Universitas</label>
                    <input type="text" class="form-control" id="pendidikan" placeholder="Masukkan riwayat pendidikan"
                        name="pendidikan" value="{{ old('pendidikan', $pendidikansekretaris->pendidikan) }}" required>
                    @error('pendidikan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi riwayat pendidikan"
                        name="deskripsi">{{ old('deskripsi', $pendidikansekretaris->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" placeholder="Masukkan nama penerbit"
                        name="penerbit" value="{{ old('penerbit', $pendidikansekretaris->penerbit) }}" required>
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
