<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Profil Visi Misi - Edit data</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-account menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil&nbsp;/&nbsp;</p>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Profil Visi Misi&nbsp;/&nbsp;</p>
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
            <form action="{{ route('profilppid.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Deskripsi</label>
                    <textarea class="form-control" id="" placeholder="Masukkan Deskripsi"
                        name="deskripsi" required>{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Urutan</label>
                    <input type="number" min="0" value="{{ $data->urutan }}" class="form-control" id="" placeholder="Masukkan Urutan"
                        name="urutan" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis (Visi / Misi)</label>
                    <select class="form-control" id="" name="jenis" required value="{{ $data->jenis }}">
                        <option value="misi" {{ $data->jenis == 'misi' ? 'selected' : ''  }}>Misi</option>
                        <option value="visi" {{ $data->jenis == 'visi' ? 'selected' : ''  }}>Visi</option>
                    </select>
                </div>
                <input type="hidden" name="jenis_ppid" value="visimisi">
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </form>
        </div>
    </div>

    <!-- note : Jika terdapat session dengan data success maka tampilkan alert dari sweetalert sesuai dengan isi data successnya -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@endsection
