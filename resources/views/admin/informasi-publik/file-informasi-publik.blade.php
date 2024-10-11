<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar File {{ $informasiData->ringkasan_informasi }}</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar {{ $informasiData->ringkasan_informasi }}</p>
                        </div>
                    </div>
                    @if (auth()->check() && auth()->user()->name === 'admin')
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                                data-target="#addModal">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                        </div>
@endif                </div>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle text-center">Deskripsi</th>
                                        <th scope="col" class="align-middle text-center">Tahun</th>
                                        <th scope="col" class="align-middle text-center">File</th>
                                        @if (auth()->check() && auth()->user()->name === 'admin')
                                        <th scope="col" class="align-middle text-center">Aksi</th>
@endif                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarInfo as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td class="text-center">{{ $data->tahun }}</td>
                                            <td class="text-center"><a href="{{ url('admin/file/'.$data->file) }}"
                                                    target="blank" class="btn btn-success btn-sm text-white py-1"><span
                                                        class="mdi mdi-download"></span>
                                                    Download</a>
                                            </td>
                                            @if (auth()->check() && auth()->user()->name === 'admin')
                                            <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('informasi-publik.daftar-informasi-publik.file-edit', ['id' => $data->id]) }}"
                                                            type="submit" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>
                                                        <form id="deleteForm-{{ $data->id }}" action="{{ route('informasi-publik.daftar-informasi-publik.file-destroy', ['id' => $data->id]) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $data->ringkasan_informasi }}" data-id="{{ $data->id }}">
                                                                <span class="mdi mdi-trash-can-outline"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
@endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->check() && auth()->user()->name === 'admin')
            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="{{ route('informasi-publik.daftar-informasi-publik.file-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="informasi_publik_id" value="{{ $informasiData->id }}">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tahun</label>
                                    <select id="tahun" name="tahun" class="form-select" required>
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php
                                        // Mendapatkan tahun sekarang
                                        $tahunSekarang = date('Y');

                                        // Menentukan rentang tahun yang diinginkan
                                        $tahunAwal = 2018; // Tahun awal
                                        $tahunAkhir = $tahunSekarang; // Tahun akhir (10 tahun dari tahun sekarang)

                                        // Membuat opsi untuk setiap tahun dalam rentang yang ditentukan
                                        for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
                                            $selected = $tahun == $tahunSekarang ? 'selected' : ''; // menambahkan atribut selected jika tahun saat ini
                                            echo "<option value='$tahun' $selected>$tahun</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fileInput">File</label>
                                    <input type="file" class="form-control form-control-file" id="fileInput" accept=".pdf" name="file"
                                        required>
                                    <div class="mt-1 text-muted"><small>File harus pdf dan memiliki ukuran maksimal 5 MB.</small></div>
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
        @endif
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
