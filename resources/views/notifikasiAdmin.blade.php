@extends('layouts.inc.admin.master')
@push('scripts')
<script>
    $("#notifikasi_layanan_informasi").DataTable();
</script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Notifikasi Layanan Informasi </h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Notifikasi&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Notifikasi Layanan Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-striped-custom" id="notifikasi_layanan_informasi" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle">Id</th>
                                        <th scope="col" class="align-middle">Kode Permohonan</th>
                                        <th scope="col" class="align-middle">NIK/No. Identitas Pribadi</th>
                                        <th scope="col" class="align-middle">Nama Lengkap</th>
                                        <th scope="col" class="align-middle">Rincian Informasi</th>
                                        <th scope="col" class="align-middle">Tujuan Penggunaan Informasi</th>
                                        <th scope="col" class="align-middle">Mendapatkan Salinan Informasi</th>
                                        <th scope="col" class="align-middle">Cara Pengambilan Salinan Informasi</th>
                                        <th scope="col" class="align-middle">Status</th>
                                        {{-- <th scope="col" class="align-middle">Proses Pengajuan</th> --}}
                                        <th scope="col" class="align-middle">Jawaban Pengajuan</th>
                                        <th scope="col" class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $data->kodepermohonan }}</td>
                                            <td class="text-center">{{ $data->nik }}</td>
                                            <td class="text-center">{{ $data->nama }}</td>
                                            <td class="text-center">{{ $data->rincianinformasi }}</td>
                                            <td class="text-center">{{ $data->tujuaninformasi }}</td>
                                            <td class="text-center">{{ $data->mendapatkansalinan }}</td>
                                            <td class="text-center">{{ $data->caramendapatkansalinan }}</td>
                                            <td class="text-center">
                                                @if ($data->status == 'Disetujui')
                                                    <span class="badge text-dark" style="background-color: #28a745; color: #fff;">{{ $data->status }}</span>
                                                @elseif ($data->status == 'Ditolak')
                                                    <span class="badge text-dark" style="background-color: #dc3545; color: #fff;">{{ $data->status }}</span>
                                                @elseif ($data->status == 'Proses')
                                                    <span class="badge text-dark" style="background-color: #ffc107; color: #000 !important;">{{ $data->status }}</span>
                                                @else
                                                    <span class="badge text-dark" style="background-color: #6c757d; color: #fff;">{{ $data->status }}</span>
                                                @endif
                                            </td>
                                            <!-- Modal Trigger -->
                                            <td class="text-center">
                                                @if($data->jawaban)
                                                    <!-- Button to view the uploaded file -->
                                                    <a href="{{ asset('uploads/' . $data->jawaban) }}" class="btn btn-success" target="_blank">Lihat Data</a>
                                                @else
                                                    <!-- Button trigger modal for upload -->
                                                    <button class="btn" style="background-color: #1A374D; color: white;" data-toggle="modal" data-target="#uploadModal-{{ $data->id }}">Upload Jawaban</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-action-container">
                                                    <!-- Lihat detail -->
                                                    <button type="button" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#viewModal{{ $data->id }}">
                                                        <i class="mdi mdi-eye mdi-24 text-white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal untuk upload jawaban -->
                                        <div class="modal fade" id="uploadModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel-{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="uploadModalLabel-{{ $data->id }}">Upload Jawaban Pengajuan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.notifikasi.uploadJawaban', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="jawaban">Pilih File</label>
                                                                <input type="file" name="jawaban" class="form-control-file" id="jawaban" accept=".pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx, .jpg, .jpeg, .png, .mp3, .mp4" required>
                                                            </div>
                                                            <small class="form-text text-muted">Maksimal ukuran file adalah 5MB.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn" style="background-color: #1A374D; color: white;">Upload</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{ $data->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel{{ $data->id }}">Detail Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="kodepermohonan{{ $data->id }}">Kode Permohonan</label>
                                                            <input type="text" class="form-control" id="kodepermohonan{{ $data->id }}" value="{{ $data->kodepermohonan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik{{ $data->id }}">NIK/No. Identitas Pribadi</label>
                                                            <input type="text" class="form-control" id="nik{{ $data->id }}" value="{{ $data->nik }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama{{ $data->id }}">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama{{ $data->id }}" value="{{ $data->nama }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rincianinformasi{{ $data->id }}">Rincian Informasi</label>
                                                            <textarea class="form-control" id="rincianinformasi{{ $data->id }}" rows="3" readonly>{{ $data->rincianinformasi }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tujuaninformasi{{ $data->id }}">Tujuan Penggunaan Informasi</label>
                                                            <input type="text" class="form-control" id="tujuaninformasi{{ $data->id }}" value="{{ $data->tujuaninformasi }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mendapatkansalinan{{ $data->id }}">Mendapatkan Salinan Informasi</label>
                                                            <input type="text" class="form-control" id="mendapatkansalinan{{ $data->id }}" value="{{ $data->mendapatkansalinan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="caramendapatkansalinan{{ $data->id }}">Cara Pengambilan Salinan Informasi</label>
                                                            <input type="text" class="form-control" id="caramendapatkansalinan{{ $data->id }}" value="{{ $data->caramendapatkansalinan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status{{ $data->id }}">Status</label>
                                                            <input type="text" class="form-control" id="status{{ $data->id }}" value="{{ $data->status }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jawaban_pengajuan{{ $data->id }}">Jawaban Pengajuan</label>
                                                            <p>
                                                                @if ($data->jawaban)
                                                                <a href="{{ asset('uploads/' . $data->jawaban) }}" target="_blank" class="btn btn-primary">Lihat Data</a>
                                                            @else
                                                                <p>Tidak ada jawaban yang di-upload</p>
                                                            @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- View Modal end -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
@endpush
