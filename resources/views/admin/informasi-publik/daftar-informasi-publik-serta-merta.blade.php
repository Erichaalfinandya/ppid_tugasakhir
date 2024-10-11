<!-- note : js tambahan untuk alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layouts.inc.admin.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Daftar Informasi Publik Serta Merta</h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Layanan&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Daftar Informasi Publik Serta Merta</p>
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
                            <table class="table table-striped" id="data-tables">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle">No</th>
                                        <th scope="col" class="align-middle">Jenis Informasi</th>
                                        <th scope="col" class="align-middle">Ringkasan Informasi</th>
                                        <th scope="col" class="align-middle">Pejabat Yang Menguasai Informasi</th>
                                        <th scope="col" class="align-middle">Penanggung Jawab Informasi</th>
                                        <th scope="col" class="align-middle">Waktu Pembuatan Informasi</th>
                                        <th scope="col" class="align-middle">Bentuk Informasi Yang Tersedia</th>
                                        <th scope="col" class="align-middle">Jangka Waktu Penyimpanan</th>
                                        <th scope="col" class="align-middle">Jenis Media Yang Memuat</th>
                                        {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                        <th scope="col" class="align-middle">Aksi</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->jenisInfo->nama }} <p class="mt-2">{{ $data->rincianJenisInfo->nama ?? '' }}</p>
                                            </td>
                                            <td>{{ $data->ringkasan_informasi }}</td>
                                            <td>{{ $data->pejabat->nama }}</td>
                                            <td>{{ $data->penanggung_jawab }}</td>
                                            <td>{{ $data->waktu_pembuatan }}</td>
                                            <td>{{ $data->bentuk_informasi }}</td>
                                            <td>{{ $data->jangka_waktu }}</td>
                                            <td>{{ $data->jenis_media }}</td>
                                            {{-- @if (auth()->check() && auth()->user()->name === 'admin') --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('informasi-publik.daftar-informasi-publik.file', ['id' => $data->id]) }}"
                                                        type="submit" class="btn btn-sm btn-primary text-white mr-1 py-1">
                                                        <span class="mdi mdi-eye"></span>
                                                    </a>
                                                    <a href="{{ route('informasi-publik.daftar-informasi-publik.edit', ['id' => $data->id]) }}"
                                                        type="submit" class="btn btn-sm btn-warning text-white mr-1 py-1">
                                                        <span class="mdi mdi-pen"></span>
                                                    </a>
                                                    <form id="deleteForm-{{ $data->id }}" action="{{ route('informasi-publik.daftar-informasi-publik.delete', ['id' => $data->id]) }}" method="POST" class="m-0">
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
                <form action="{{ route('daftar-informasi-serta-merta.store') }}" method="POST">
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
                                    <label for="exampleFormControlInput1">Jenis Informasi</label>
                                    <select name="jenis_info_id" id="selectJenisInfo" class="form-select">
                                        <option selected>-- Silahkan Pilih --</option>
                                        @foreach ($jenInfo as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="rincian_ji">
                                    <label for="exampleFormControlInput1">Rincian Jenis Informasi</label>
                                    <select name="rincian_jenis_info_id" id="selectRJI" class="form-select">
                                        <option value="">-- Pilih Jenis Informasi Dahulu --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Ringkasan Informasi</label>
                                    <textarea name="ringkasan_informasi" class="form-control" id="" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pejabat Yang Menguasai Informasi</label>
                                    <select name="pejabat_id" id="pejabat_id" class="form-select" required>
                                        <option value="">-- Silahkan Pilih --</option>
                                        @foreach ($pejabat as $pjb)
                                            <option value="{{ $pjb->id }}">{{ $pjb->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Penanggung Jawab Informasi</label>
                                    <input type="text" readonly class="form-control" id="" value="PPID"
                                        name="penanggung_jawab" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Waktu Pembuatan Informasi</label>
                                    <select id="waktu_pembuatan" name="waktu_pembuatan" class="form-select" required>
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
                                    <label for="exampleFormControlInput1">Bentuk Informasi Yang Tersedia</label>
                                    <select name="bentuk_informasi" class="form-select" required>
                                        <option value="">-- Pilih Bentuk Informasi --</option>
                                        <option value="Softfile">Softfile</option>
                                        <option value="Hardfile">Hardfile</option>
                                        <option value="Softfile dan Hardfile">Softfile dan Hardfile</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jangka Waktu Penyimpanan</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="Selama Berlaku" name="jangka_waktu" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jenis Media Yang Memuat</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Jenis Media Yang Memuat" name="jenis_media" required>
                                </div>
                            </div>
                            <input type="hidden" name="pembagian_informasi" value="Serta Merta">
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
