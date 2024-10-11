<!DOCTYPE html>
<html>
    <head>
        <title>Pengajuan Informasi Berhasil</title>
    </head>

<body>
    <h1>Pengajuan Informasi Berhasil</h1>
    <p>Terima kasih atas pengajuan informasi Anda. Berikut adalah rincian pengajuan Anda:</p>
    <ul>
        <li>Kategori Permohonan: {{ $permohonan->kategoripermohonan }}</li>
        <li>NIK: {{ $permohonan->nik }}</li>
        <li>Nama: {{ $permohonan->nama }}</li>
        <li>KTP: <a href="{{ asset('images/' . $permohonan->ktp) }}" target="_blank">Lihat KTP</a></li>
        <li>Alamat: {{ $permohonan->alamat }}</li>
        <li>Email: {{ $permohonan->email }}</li>
        <li>Nomor Telepon: {{ $permohonan->nomortelepon }}</li>
        <li>Pekerjaan: {{ $permohonan->pekerjaan }}</li>
        <li>Upload Surat: @if($permohonan->uploadsurat) <a href="{{ asset($permohonan->uploadsurat) }}" target="_blank">Lihat Surat</a> @else Tidak ada surat yang diunggah @endif</li>
        <li>Rincian Informasi: {{ $permohonan->rincianinformasi }}</li>
        <li>Tujuan Informasi: {{ $permohonan->tujuaninformasi }}</li>
        <li>Mendapatkan Salinan Informasi: {{ $permohonan->mendapatkansalinan }}</li>
        <li>Cara Pengambilan Salinan Informasi: {{ $permohonan->caramendapatkansalinan }}</li>
    </ul>
    <p>Terima kasih atas pengajuan Anda.</p>
    <p>Tim PPID Kota Surakarta</p>
</body>

</html>