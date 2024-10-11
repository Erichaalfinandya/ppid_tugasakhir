<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Informasi Dikecualikan</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Informasi Dikecualikan</p>
                        </div>
                    </div>
                    {{-- @if (auth()->check() && auth()->user()->name === 'admin')
                    @endif --}}
                </div>
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
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-primary text-white py-2 me-4 mt-2 mt-xl-0" data-toggle="modal" data-target="#addModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle">Judul</th>
                                        <th scope="col" class="align-middle text-center">Tahun</th>
                                        <th scope="col" class="align-middle text-center">File</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datasertamerta as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->judul }}</td>
                                            <td class="text-center">{{ $data->tahun }}</td>
                                            <td class="text-center"><a href="{{ '/' .$data->file }}"
                                                    target="blank" class="btn btn-success text-white py-1"><span
                                                        class="mdi mdi-download"></span>
                                                    Download</a>
                                            </td>
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <form
                                                        action="{{ route('informasi-dikecualikan.delete', ['id' => $data->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('informasi-dikecualikan.edit', ['id' => $data->id]) }}"
                                                            type="submit" class="btn btn-sm btn-warning text-white mr-1 py-1">
                                                            <span class="mdi mdi-pen"></span>
                                                        </a>
                                                        <button type="submit" class="btn btn-sm btn-danger text-white py-1">
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
                <form action="{{ route('informasi-dikecualikan.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kategori Judul</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Masukkan kategori judul" name="kategori_judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Judul</label>
                                    <input type="text" class="form-control" id="" placeholder="Masukkan Judul"
                                        name="judul" required>
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
                                        $tahunAkhir = $tahunSekarang;

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
                                    <input type="file" class="form-control form-control-file" id="fileInput" accept=".pdf" name="file">
                                    <small class="form-text text-muted mt-1">Kosongkan jika tidak ingin mengganti file. File wajib PDF.</small>
                                </div>

                            </div>
                            <input type="hidden" name="pembagian_informasi" value="Informasi Dikecualikan">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        {{-- @endif --}}
    @endsection

    @push('style')
    @endpush


    @push('scripts')
    <!-- note : script untuk pdf agar tidak lebih dari 2mb -->
    <script>
        $("#fileInput").on("change", function () {
            if(this.files[0].size > 2000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengupload',
                    text: 'File Yang Akan Diupload Terlalu Besar. File Tidak Boleh Melebihi 2MB',
                    showConfirmButton: false,
                    timer: 1500
                });
                $(this).val('');
            }
        });
    </script>
    {{-- <script>
        $('#daftar-informasi-publik-table').DataTable({
            rowReorder: true,
            responsive: true
        })
    </script> --}}
@endpush
