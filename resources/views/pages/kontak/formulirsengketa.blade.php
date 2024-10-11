<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>PPID Kota Surakarta </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('include.style')

    </head>

    <body>

        @include('include.navbar')
        <div class="untree_co-section py-5">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Formulir</h5>
                        <h1 class="mb-0">Penyelesaian Sengketa Informasi</h1>
                        <center>
                            <div class="line-custom">
                                <div class="rectangle-custom"></div>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <form class="row g-3" action="{{ route('simpan.permohonansengketa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <label class="form-label">A. Identitas Pemohon</label>
                                        <div class="form-group">
                                            <label for="namaInput" id="namaLabel" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama" id="namaInput" placeholder="Masukan Nama Lengkap Anda" class="form-control" value="{{ old('nama', $profileData->nama_lengkap ?? '') }}" readonly>
                                            @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ttlInput" id="ttlLabel" class="form-label">Tanggal Lahir</label>
                                            <input type="text" name="ttl" id="ttlInput" placeholder="Masukan Tanggal Lahir Anda" class="form-control" value="{{ old('ttl', $profileData->tanggal_lahir ?? '') }}" readonly>
                                            @error('ttl')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="nik" class="form-group">
                                            <label for="nikInput" id="nikLabel" class="form-label">NIK/No.Identitas</label>
                                            <small class="form-text text-warning">Mohon pastikan NIK yang anda masukan sesuai dengan no NIK KTP</small>
                                            <input type="text" name="nik" id="nikInput" placeholder="Masukan NIK/No. Identitas" class="form-control" maxlength="16" pattern="\d{16}" title="NIK harus berisi 16 angka" value="{{ old('nik', $profileData->nik ?? '') }}" readonly>
                                            @error('nik')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="ktp" class="form-group">
                                            <label for="ktpInput" id="ktpLabel" class="form-label">Upload KTP (Kosongkan jika tidak ingin mengganti)</label>
                                            <!-- Tampilkan KTP yang sudah ada jika ada -->
                                            @if(!empty($profileData->ktp))
                                                <div class="mb-3">
                                                    <a href="{{ asset($profileData->ktp) }}" target="_blank">Lihat KTP Saat Ini</a>
                                                </div>
                                            @endif
                                            <!-- Input file untuk mengganti KTP -->
                                            <input type="file" name="ktp" id="ktpInput" class="form-control">
                                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti KTP. KTP yang terdaftar akan digunakan.</small>
                                            @error('ktp')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" rows="4" readonly>{{ old('alamat', $profileData->alamat ?? '') }}</textarea>
                                            @error('alamat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" placeholder="Masukan Email Anda" class="form-control" value="{{ old('email', $profileData->email ?? '') }}" readonly>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nomortelepon" class="form-label">Nomor Telepon</label>
                                        <small class="form-text">Contoh: 081234567890 (tanpa spasi)</small>
                                        <input type="tel" name="nomortelepon" id="nomortelepon" placeholder="Masukan Nomor Telepon Anda" class="form-control" pattern="[0-9]{9,15}" title="Nomor telepon harus berisi 9-15 digit angka" value="{{ old('nomortelepon', $profileData->telp ?? '') }}" readonly>
                                        @error('nomortelepon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan" class="form-label">Pekerjaan Terakhir</label>
                                        <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukan Pekerjaan  Anda" class="form-control" required>
                                        @error('pekerjaan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-section">
                                        <label class="form-label">B. MENGENAI PERMOHONAN INFORMASI</label>
                                        {{-- <div class="form-group">
                                            <label for="rincianinformasi" class="form-label">Rincian Informasi Pada pengajuan Informasi</label>
                                            <textarea name="rincianinformasi" id="rincianinformasi" placeholder="Masukan Rincian Informasi Anda" class="form-control" rows="4" required></textarea>
                                            @error('rincianinformasi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                    </div>
                                    <div class="form-section">
                                        {{-- <div class="form-group">
                                            <label for="jawabanpermohonanInput" class="form-label">Jawaban atas Permohonan Informasi</label>
                                            <textarea name="jawabanpermohonan" id="jawabanpermohonanInput" placeholder="Masukan Jawaban atas Permohonan Informasi" class="form-control" rows="4" required>{{ $alasanPenolakan ?? '' }}</textarea>
                                        </div> --}}
                                    </div>
                                    <div class="form-section">
                                        {{-- <div class="form-group">
                                            <label class="form-label">Alasan Pengajuan Keberatan</label>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan1" name="alasan_pengajuan" value="Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008">
                                                <label for="alasan1">Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan2" name="alasan_pengajuan" value="Tidak ditanggapinya permintaan informasi">
                                                <label for="alasan2">Tidak ditanggapinya permintaan informasi</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan3" name="alasan_pengajuan" value="Tidak dipenuhinya permintaan informasi">
                                                <label for="alasan3">Tidak dipenuhinya permintaan informasi</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan4" name="alasan_pengajuan" value="Penyampaian informasi yang melebihi jangka waktu yang diatur dalam UU No. 14 Tahun 2008">
                                                <label for="alasan4">Penyampaian informasi yang melebihi jangka waktu yang diatur dalam UU No. 14 Tahun 2008</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan5" name="alasan_pengajuan" value="Tidak disediakannya informasi berkala">
                                                <label for="alasan5">Tidak disediakannya informasi berkala</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan6" name="alasan_pengajuan" value="Permintaan informasi tidak ditanggapi sebagaimana yang diminta">
                                                <label for="alasan6">Permintaan informasi tidak ditanggapi sebagaimana yang diminta</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan7" name="alasan_pengajuan" value="Pengenaan biaya yang tidak wajar">
                                                <label for="alasan7">Pengenaan biaya yang tidak wajar</label>
                                            </div>
                                            @error('alasan_pengajuan')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="tanggapankeberatanInput" id="tanggapankeberatanLabel" class="form-label">Tanggapan atas Pengajuan Keberatan</label>
                                            <textarea name="tanggapankeberatan" id="tanggapankeberatanInput" placeholder="Masukan Tanggapan atas Pengajuan Keberatan" class="form-control" rows="4" required>>{{ old('tanggapankeberatan') }}</textarea>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="form-label">Alasan Permohonan Penyelesaian Sengketa Informasi</label>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan_sengketa1" name="alasan_sengketa" value="Penolakan atas permintaan informasi berdasarkan alasan pengecualian sebagaimana dimaksud dalam Pasal 17 UU No. 14 Tahun 2008">
                                                <label for="alasan_sengketa1">Atasan PPID menolak permohonan informasi dengan alasan pengecualian sebagaimana dimaksud didalam Pasal 17 UU KIP.</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan_sengketa2" name="alasan_sengketa" value="Atasan PPID tidak menanggapi Keberatan Pemohon">
                                                <label for="alasan_sengketa2">Atasan PPID tidak menanggapi Keberatan Pemohon.</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan_sengketa3" name="alasan_sengketa" value="Penyampaian informasi yang melebihi jangka waktu yang diatur dalam UU No. 14 Tahun 2008">
                                                <label for="alasan_sengketa3"> Pemohon tidak puas terhadap tanggapan Atasan PPID atas Keberatan.</label>
                                            </div>
                                            <div class="custom-radio">
                                                <input type="radio" id="alasan_sengketa4" name="alasan_sengketa" value="Tidak disediakannya informasi berkala">
                                                <label for="alasan_sengketa4">Pengenaan biaya yang tidak wajar.</label>
                                            </div>
                                            @error('alasan_sengketa')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tuntutanpemohon" class="form-label">Tuntutan Pemohon</label>
                                            <textarea name="tuntutanpemohon" id="tuntutanpemohon" placeholder="Masukan Tuntutan Pemohon" class="form-control" rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    @if(Auth::check())
                                        @if(Auth::user()->status === 'terverifikasi')
                                            <button type="submit" class="btn btn-primary px-5">Ajukan Permohonan</button>
                                        @else
                                            <button type="submit" class="btn btn-primary px-5" disabled>Ajukan Permohonan</button>
                                            <br>
                                            <small>*)Anda harus terverifikasi terlebih dahulu jika ingin mengirim formulir</small>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-primary px-5" disabled>Ajukan Permohonan</button>
                                        <br>
                                        <small>*)Anda harus login terlebih dahulu jika ingin mengirim formulir</small>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('include.footer')

        @include('include.script')
    </body>

</html>
