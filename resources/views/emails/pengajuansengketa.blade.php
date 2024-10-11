<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Penyelesaian Sengketa</title>
</head>
<body>
    <h1>Pengajuan Penyelesaian Sengketa Berhasil</h1>
    <p>Terima kasih atas pengajuan Penyelesaian Sengketa Anda. Berikut adalah rincian pengajuan Anda:</p>
    <ul>
        <p>Nama: {{ $data['nama'] }}</p>
        <p>Tanggal Lahir: {{ $data['ttl'] }}</p>
        <p>NIK: {{ $data['nik'] }}</p>
        <p>Alamat: {{ $data['alamat'] }}</p>
        <p>Email: {{ $data['email'] }}</p>
        <p>Nomor Telepon: {{ $data['nomortelepon'] }}</p>
        <p>Pekerjaan: {{ $data['pekerjaan'] }}</p>
        <p>Alasan Sengketa: {{ $data['alasan_sengketa'] }}</p>
        <p>Tuntutan Pemohon: {{ $data['tuntutanpemohon'] }}</p>
    </ul>
    <p>Terima kasih telah mengajukan Penyelesaian Sengketa informasi. Kami akan segera memproses pengajuan Anda.</p>
    <p>Tim PPID Kota Surakarta</p>
</body>
</html>
