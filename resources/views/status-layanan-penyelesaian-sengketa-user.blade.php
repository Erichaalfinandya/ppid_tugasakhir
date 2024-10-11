@extends('layouts.inc.admin.master')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Status Layanan Penyelesaian Sengketa Informasi</h2>
                    <div class="d-flex">
                        <i class="mdi mdi-headset menu-icon"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Status&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Status Layanan Penyelesaian Sengketa</p>
                    </div>
                </div>
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
                    <div class="table-responsive">
                        <table class="table table-striped" id="status_layanan_keberatan" width="100%">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" class="align-middle">Id</th>
                                    <th scope="col" class="align-middle">Waktu Pengajuan</th>
                                    <th scope="col" class="align-middle">Nama Lengkap</th>
                                    <th scope="col" class="align-middle">Tanggal Lahir</th>
                                    <th scope="col" class="align-middle">NIK/No. Identitas</th>
                                    <th scope="col" class="align-middle">Upload KTP</th>
                                    <th scope="col" class="align-middle">Alamat</th>
                                    <th scope="col" class="align-middle">Email</th>
                                    <th scope="col" class="align-middle">Nomor Telepon</th>
                                    <th scope="col" class="align-middle">Pekerjaan Terakhir</th>
                                    <th scope="col" class="align-middle">Alasan Permohonan Penyelesaian Sengketa Informasi</th>
                                    <th scope="col" class="align-middle">Tuntutan Pemohon</th>
                                    <th scope="col" class="align-middle">Status</th>
                                    <th scope="col" class="align-middle">Jawaban Pengajuan</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonanSengketa as $data)
                                    <tr>
                                        <td class="text-center">{{ $data->id }}</td>
                                        <td class="text-center">{{ $data->created_at->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">{{ $data->nama }}</td>
                                        <td class="text-center">{{ $data->ttl }}</td>
                                        <td class="text-center">{{ $data->nik }}</td>
                                        <td class="text-center">
                                            @if ($data->ktp)
                                                <a href="{{ asset('uploads/' . $data->ktp) }}" target="_blank">Lihat KTP</a>
                                            @else
                                                <p>Tidak ada KTP yang diupload</p>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $data->alamat }}</td>
                                        <td class="text-center">{{ $data->email }}</td>
                                        <td class="text-center">{{ $data->nomortelepon }}</td>
                                        <td class="text-center">{{ $data->pekerjaan }}</td>
                                        <td class="text-center">{{ $data->alasan_sengketa }}</td>
                                        <td class="text-center">{{ $data->tuntutanpemohon }}</td>
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
                                        <td class="text-center">
                                            @if ($data->jawaban)
                                            <a href="{{ asset('uploads/' . $data->jawaban) }}" class="btn btn-success" target="_blank">Lihat Jawaban</a>
                                            @else
                                                <button class="btn" style="background-color: #1A374D; color: white;">Belum Dijawab</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-action-container">
                                                <!-- Lihat detail -->
                                                <button type="button" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#viewModal{{ $data->id }}">
                                                    <i class="mdi mdi-eye mdi-24 text-white"></i>
                                                </button>
                                                <!-- Hapus -->
                                                <form action="{{ route('status-layanan-informasi-user.delete', ['id' => $data->id]) }}" method="POST" id="deleteForm{{ $data->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{ $data->id }})" class="btn btn-sm btn-danger text-white">
                                                        <span class="mdi mdi-trash-can-outline mdi-24"></span>
                                                    </button>
                                                </form>                                                    
                                            </div>
                                        </td>
                                    </tr>
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
                                                        <label for="nama{{ $data->id }}">Nama Lengkap</label>
                                                        <input type="text" class="form-control" id="nama{{ $data->id }}" value="{{ $data->nama }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ttl{{ $data->id }}">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="ttl{{ $data->id }}" value="{{ $data->ttl }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nik{{ $data->id }}">NIK/No. Identitas Pribadi</label>
                                                        <input type="text" class="form-control" id="nik{{ $data->id }}" value="{{ $data->nik }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ktp{{ $data->id }}">KTP</label>
                                                        @if ($data->ktp)
                                                            <a href="{{ asset('images/' . $data->ktp) }}" target="_blank">Lihat KTP</a>
                                                        @else
                                                            <p>Tidak ada KTP yang diupload</p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat{{ $data->id }}">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat{{ $data->id }}" value="{{ $data->alamat }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email{{ $data->id }}">Email</label>
                                                        <input type="email" class="form-control" id="email{{ $data->id }}" value="{{ $data->email }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomortelepon{{ $data->id }}">Nomor Telepon</label>
                                                        <input type="text" class="form-control" id="nomortelepon{{ $data->id }}" value="{{ $data->nomortelepon }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pekerjaan{{ $data->id }}">Pekerjaan Terakhir</label>
                                                        <input type="text" class="form-control" id="pekerjaan{{ $data->id }}" value="{{ $data->pekerjaan }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alasan_sengketa{{ $data->id }}">Alasan Permohonan Penyelesaian Sengket Informasi</label>
                                                        <input type="text" class="form-control" id="alasan_sengketa{{ $data->id }}" value="{{ $data->alasan_sengketa }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tuntutanpemohon{{ $data->id }}">Tuntutan Pemohon</label>
                                                        <textarea class="form-control" id="tuntutanpemohon{{ $data->id }}" rows="3" readonly>{{ $data->tuntutanpemohon }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- View Modal end-->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- Track order content -->
                    <div class="track-order">
                        <div class="stage">
                            <div class="circle">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="text">
                                <h4>Pengajuan informasi</h4>
                                <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                            </div>
                        </div>
                        <div class="stage">
                            <div class="circle">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="text">
                                <h4>Proses Verifikasi</h4>
                                <p>Dalam 3 hari, laporan anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                            </div>
                        </div>
                        <div class="stage">
                            <div class="circle">
                                <i class="fas fa-spinner fa spin"></i>
                            </div>
                            <div class="text">
                                <h4>Proses Tindak Lanjut</h4>
                                <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan anda</p>
                            </div>
                        </div>
                        <div class="stage">
                            <div class="circle">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="text">
                                <h4>Beri Tanggapan</h4>
                                <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                            </div>
                        </div>
                        <div class="stage">
                            <div class="circle">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="text">
                                <h4>Selesai</h4>
                                <p>Laporan anda akan terus ditindaklanjuti hingga terselesaikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
