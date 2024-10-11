<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Keberatan Berhasil</title>
</head>
<body>
    <h1>Pengajuan Keberatan Berhasil</h1>
    <p>Terima kasih atas pengajuan Keberatan Anda. Berikut adalah rincian pengajuan Anda:</p>
    <ul>
        <p>Kode Permohonan: {{ $data['kodepermohonan'] }}</p>
        <p>NIK: {{ $data['nik'] }}</p>
        <p>Alasan Pengajuan: {{ $data['alasan_pengajuan'] }}</p>
        <p>Kasus Posisi: {{ $data['kasusposisi'] }}</p>
    </ul>
    <p>Terima kasih telah mengajukan keberatan informasi. Kami akan segera memproses pengajuan Anda.</p>
    <p>Tim PPID Kota Surakarta</p>
</body>
</html>
