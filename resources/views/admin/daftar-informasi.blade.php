<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar {{ $judul->kategori->pembagian_informasi }}</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar {{ $judul->kategori->pembagian_informasi }}</p>
                        </div>
                    </div>
                    {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                        <div class="d-flex justify-content-between align-items-end flex-wrap">
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal" data-target="#addModal">
                                <i class="mdi mdi-plus text-muted"></i>
                            </button>
                            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal" data-target="#editModal">
                                <i class="mdi mdi-eye text-muted"></i>
                            </button>
                        </div>
                    {{-- @endif --}}
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
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-tables2">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle text-center">No</th>
                                        <th scope="col" class="align-middle text-center">Kategori Judul</th>
                                        <th scope="col" class="align-middle text-center">Ringkasan Informasi</th>
                                        <th scope="col" class="align-middle text-center">Tahun</th>
                                        <th scope="col" class="align-middle text-center">File</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle text-center">Aksi</th>
                                        {{-- @endif                                     --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarInfo as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            </td>
                                            <td>{{ $data->kategoriJudul->judul }}</td>
                                            <td>{{ $data->ringkasan_informasi }}</td>
                                            <td class="text-center">{{ $data->tahun }}</td>
                                            <td class="text-center"><a href="{{ asset('admin/file/' . $data->file) }}" target="blank" class="btn btn-success btn-sm text-white py-1"><span class="mdi mdi-download"></span>
                                                    Download</a>
                                            </td>
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('daftar-informasi.edit', ['id' => $data->id]) }}"
                                                        type="submit" class="btn btn-sm btn-warning text-white py-1 mr-1">
                                                        <span class="mdi mdi-pen"></span>
                                                    </a>
                                                    <form id="deleteForm-{{ $data->id }}" action="{{ route('daftar-informasi.delete', ['id' => $data->id]) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger text-white py-1" data-toggle="modal" data-target="#confirmModal" data-status="{{ $data->ringkasan_informasi }}" data-id="{{ $data->id }}">
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
            <form action="{{ route('daftar-informasi.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="" value="{{ $judul->judul }}"
                                    placeholder="Masukkan kategori judul" name="kategori_judul" readonly required>
                            </div>
                            <input type="hidden" name="judul_id" value="{{ $judul->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ringkasan Informasi</label>
                                <textarea name="ringkasan_informasi" class="form-control" id="" cols="30" rows="10" required></textarea>
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
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('detail-informasi.update', ['id' => $detail->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                <label for="exampleFormControlInput1">Ringkasan Informasi</label>
                                <textarea name="ringkasan_informasi" class="form-control" id="" cols="30" rows="10" required>{{ $detail->ringkasan_informasi ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pejabat Yang Menguasai Informasi</label>
                                <select name="pejabat_id" id="pejabat_id" class="form-select" required disabled>
                                    <option value="">PPID</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Penanggung Jawab Informasi</label>
                                <input type="text" readonly class="form-control" id="" value="PPID"
                                    name="penanggung_jawab" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Waktu Pembuatan Informasi</label>
                                <select id="waktu" name="waktu" class="form-select" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php
                                        // Mendapatkan tahun sekarang
                                        $tahunSekarang = date('Y');

                                        // Menentukan rentang tahun yang diinginkan
                                        $tahunAwal = 2018; // Tahun awal
                                        $tahunAkhir = $tahunSekarang; // Tahun akhir (10 tahun dari tahun sekarang)

                                        // Menggunakan operator null coalescing untuk menyediakan nilai default
                                        $selectedYear = $detail->waktu ?? '';

                                        // Membuat opsi untuk setiap tahun dalam rentang yang ditentukan
                                        for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
                                            $selected = $tahun == $selectedYear ? 'selected' : ''; // menambahkan atribut selected jika tahun saat ini
                                            echo "<option value='$tahun' $selected>$tahun</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Bentuk Informasi Yang Tersedia</label>
                                <select name="bentuk" class="form-select" required>
                                    <option>-- Pilih Bentuk Informasi --</option>
                                    <option value="Softfile" {{ ($detail->bentuk ?? '') === 'Softfile' ? 'selected' : '' }}>Softfile</option>
                                    <option value="Hardfile" {{ ($detail->bentuk ?? '') === 'Hardfile' ? 'selected' : '' }}>Hardfile</option>
                                    <option value="Softfile dan Hardfile" {{ ($detail->bentuk ?? '') === 'Softfile dan Hardfile' ? 'selected' : '' }}>Softfile dan Hardfile</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jangka Waktu Penyimpanan</label>
                                <input type="text" readonly class="form-control" id=""
                                    value="Selama Berlaku" name="jangka_waktu" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis Media Yang Memuat</label>
                                <textarea class="form-control" id=""
                                    placeholder="Jenis Media Yang Memuat" name="jenis_media" required>{{ $detail->jenis_media ?? '' }}</textarea>
                            </div>
                            <input type="hidden" name="judul_id" value="{{ $judul->id }}">
                            <input type="hidden" name="jenis_ppid" value="visimisigeneral">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    {{-- @endif --}}
    </div>

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
