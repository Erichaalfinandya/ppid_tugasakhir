@extends('layouts.inc.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Status Layanan Informasi </h2>
                        <div class="d-flex">
                            <i class="mdi mdi-headset menu-icon"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Status&nbsp;/&nbsp;</p>
                            <p class="text-primary mb-0 hover-cursor">Status Layanan Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="status_layanan_informasi" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col" class="align-middle">Id</th>
                                        <th scope="col" class="align-middle">Waktu Pengajuan</th>
                                        <th scope="col" class="align-middle">Kode Permohonan</th>
                                        <th scope="col" class="align-middle">Kategori Permohonan</th>
                                        <th scope="col" class="align-middle">NIK/No. Identitas Pribadi</th>
                                        <th scope="col" class="align-middle">Nama Lengkap</th>
                                        <th scope="col" class="align-middle">Upload KTP Pribadi</th>
                                        <th scope="col" class="align-middle">Alamat</th>
                                        <th scope="col" class="align-middle">Email</th>
                                        <th scope="col" class="align-middle">Nomor Telepon</th>
                                        <th scope="col" class="align-middle">Pekerjaan</th>
                                        <th scope="col" class="align-middle">Upload Surat</th>
                                        <th scope="col" class="align-middle">Rincian Informasi</th>
                                        <th scope="col" class="align-middle">Tujuan Penggunaan Informasi</th>
                                        <th scope="col" class="align-middle">Mendapatkan Salinan Informasi</th>
                                        <th scope="col" class="align-middle">Cara Pengambilan Salinan Informasi</th>
                                        <th scope="col" class="align-middle">Status</th>
                                        <th scope="col" class="align-middle">Jawaban Pengajuan</th>
                                        <th scope="col" class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td class="text-center">{{ $data->id }}</td>
                                            <td class="text-center">{{ $data->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="text-center">{{ $data->kodepermohonan }}</td>
                                            <td class="text-center">{{ $data->kategoripermohonan }}</td>
                                            <td class="text-center">{{ $data->nik }}</td>
                                            <td class="text-center">{{ $data->nama }}</td>
                                            <td class="text-center">
                                                @if ($data->ktp)
                                                    <a href="{{ asset('path/to/ktp/' . $data->ktp ) }}" target="_blank">Lihat File</a>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $data->alamat }}</td>
                                            <td class="text-center">{{ $data->email }}</td>
                                            <td class="text-center">{{ $data->nomortelepon }}</td>
                                            <td class="text-center">{{ $data->pekerjaan }}</td>
                                            <td class="text-center">
                                                @if ($data->uploadsurat)
                                                    <a href="{{ asset('uploads/' . $data->uploadsurat) }}" class="btn btn-success" target="_blank">Lihat File</a>
                                                @else
                                                    <p>Tidak ada dokumen yang diupload</p>
                                                @endif
                                            </td>
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
                                            <td class="text-center">
                                                @if ($data->jawaban)
                                                <a href="{{ asset('uploads/' . $data->jawaban) }}" class="btn btn-success" target="_blank">Lihat Data</a>
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
                                                            <label for="kodepermohonan{{ $data->id }}">Kode Permohonan</label>
                                                            <input type="text" class="form-control" id="kodepermohonan{{ $data->id }}" value="{{ $data->kodepermohonan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategoripermohonan{{ $data->id }}">Kategori Permohonan</label>
                                                            <input type="text" class="form-control" id="kategoripermohonan{{ $data->id }}" value="{{ $data->kategoripermohonan }}" readonly>
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
                                                            <label for="ktp{{ $data->id }}">KTP</label>
                                                            <p>
                                                                @if ($data->ktp)
                                                                    <a href="{{ asset('path/to/ktp/' . $data->ktp ) }}" target="_blank">Lihat File</a>
                                                                @else
                                                                    <p>Tidak ada KTP yang diupload</p>
                                                                @endif
                                                            </p>
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
                                                            <label for="pekerjaan{{ $data->id }}">Pekerjaan</label>
                                                            <input type="text" class="form-control" id="pekerjaan{{ $data->id }}" value="{{ $data->pekerjaan }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uploadsurat{{ $data->id }}">Upload Surat</label>
                                                           <p>
                                                                 @if ($data->uploadsurat)
                                                                    <a href="{{ asset('files/' . $data->uploadsurat) }}" target="_blank" class="btn btn-primary">Lihat Dokumen</a>
                                                                @else
                                                                    <p>Tidak ada dokumen yang diupload</p>
                                                                @endif
                                                           </p>
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
                        <h2 class="centered-text">Informasi Alur Tahapan Pengajuan</h2>
                        <div class="track-order">
                            @foreach ($stages as $stageName => $stageId)
                                <div class="stage {{ $status >= $stageId ? 'completed' : '' }}" id="stage-{{ $stageId }}">
                                    <div class="circle {{ $status >= $stageId ? 'completed' : '' }}">
                                        <i class="fas {{ getIconForStage($stageName) }}"></i>
                                    </div>
                                    <div class="text">
                                        <h4>{{ $stageName }}</h4>
                                        <p>{{ getStageDescription($stageName) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>                   
                </div>        
            </div>                                                                                                                                                    
        </div>
    </div>
@endsection

<style>
.track-order-container {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.centered-text {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 5px; /* Mengurangi jarak bawah dari judul */
    font-size: 1.5rem;
    font-weight: bold;
}

.track-order {
    margin-top: 5px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 0 10px;
}

.stage {
    width: 22%; /* Lebar konsisten untuk setiap stage */
    margin-bottom: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between; /* Membuat jarak antara circle dan teks sama */
    min-height: 200px; /* Tinggi minimum agar semua stage terlihat seragam */
}

.circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: #ccc;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    color: white;
    margin-bottom: 15px;
}

.completed .circle {
    background-color: #4CAF50; /* Warna saat stage telah selesai */
}

.text h4 {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.text p {
    font-size: 0.9rem;
    color: #777;
    margin: 0;
}
.centered-text {
    text-align: center;
    margin-bottom: 30px;
}

</style>

<script>
    function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
</script>

@push('style')
@endpush