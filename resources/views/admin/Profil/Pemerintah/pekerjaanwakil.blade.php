<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2> Riwayat Pekerjaan Wakil Walikota Surakarta</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-file menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Wakil Walikota&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Riwayat Pekerjaan Wakil Walikota Surakarta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Posisi Walikota dan Pendidikan Walikota dengan ukuran dinamis -->
        <div class="row mt-2 py-3 justify-content">
            <div class="col-auto">
                <!-- Tombol untuk halaman posisi walikota -->
                <a href="{{ Route('pendidikan_wakil.index') }}" class="btn btn-primary" style="margin-right: 10px;">
                    Riwayat Pendidikan
                </a>
            </div>
            <div class="col-auto">
                <!-- Tombol untuk halaman pendidikan walikota -->
                <a href="{{ Route('pekerjaan_wakil.index') }}" class="btn btn-secondary">
                    Riwayat Pekerjaan
                </a>
            </div>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                            <div class="d-flex justify-content-between align-items-end flex-wrap">
                                <button type="button" class="btn btn-primary text-white py-2 me-4 mt-2 mt-xl-0" data-toggle="modal" data-target="#addModal">
                                    Tambah Data
                                </button>
                            </div>
                        {{-- @endif --}}
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle text-center">Masa Jabatan</th>
                                        <th scope="col" class="align-middle text-center">Posisi Jabatan</th>
                                        <th scope="col" class="align-middle text-center" style="width: 250px;">Deskripsi</th>
                                        <th scope="col" class="align-middle text-center">Penerbit</th>
                                        @if (auth()->check() && auth()->user()->name === 'admin')
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                         @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaanwakil as $pekerjaan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $pekerjaan->masa }}</td>
                                            <td>{{ $pekerjaan->jabatan }}</td>
                                            <td class="text-truncate" style="max-width: 250px;">{{ $pekerjaan->deskripsi }}</td>
                                            <td>{{ $pekerjaan->penerbit }}</td>
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('pekerjaan_wakil.edit', ['pekerjaan_wakil' => $pekerjaan->id]) }}" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>
                                                        <form id="deleteForm-{{ $pekerjaan->id }}" action="{{ route('pekerjaan_wakil.destroy', ['pekerjaan_wakil' => $pekerjaan->id]) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $pekerjaan->jabatan }}" data-id="{{ $pekerjaan->id }}">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            {{-- @endif --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
        <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="form" action="{{ route('pekerjaan_wakil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Riwayat Pekerjaan Wakil Walikota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="masa">Masa Jabatan</label>
                                    <input type="text" class="form-control" id="masa" name="masa" placeholder="Masukkan riwayat masa jabatan pekerjaan wakil walikota surakarta" required>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Posisi Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan data riwayat posisi jabatan wakil walikota surakarta" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi riwayat pekerjaan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

{{-- @endif --}}

<!-- note : modal konfirmasi hapus -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Menghapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data <span id="modalData"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="confirmDelete">Konfirmasi</button>
                        </div>
                    </div>
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

    @push('style')
    @endpush

    @push('scripts')
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            var fileInput = document.getElementById('imageInput');
            var file = fileInput.files[0];

            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran file maksimal adalah 2MB');
                event.preventDefault();
            }
        });
    </script>
    <!-- note : script untuk menjalankan modal konfirmasi hapus -->
    <script>
        $('#confirmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id'); // Ambil nilai ID dari data-attribute
            var status = button.data('status'); // Ambil nilai status dari data-attribute

            var modal = $(this);
            modal.find('#modalData').text(status);

            // Tambahkan ID ke tombol konfirmasi
            $('#confirmDelete').data('id', id);
        });

        $('#confirmDelete').on('click', function () {
            var id = $(this).data('id');
            // Temukan form yang sesuai dengan ID dan submit
            $('#deleteForm-' + id).submit();
        });
    </script>

@endpush
