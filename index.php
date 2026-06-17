<?php
// Pastikan pemanggilan folder Koneksi huruf awalnya besar (sesuai struktur folder Anda)
require_once 'Koneksi/database.php';
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// Mengambil semua data dari database
$query = "SELECT * FROM tabel_tiket ORDER BY jenis_studio ASC, jadwal_tayang ASC";
$result = $conn->query($query);

// Menyiapkan array untuk memisahkan data berdasarkan studio
$koleksiRegular = [];
$koleksiIMAX = [];
$koleksiVelvet = [];

// Memproses baris database menjadi Objek (Instansiasi)
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['jenis_studio'] == 'Regular') {
            $koleksiRegular[] = new TiketRegular($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['tipe_audio'], $row['lokasi_baris']);
        } elseif ($row['jenis_studio'] == 'IMAX') {
            $koleksiIMAX[] = new TiketIMAX($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['kacamata_3d_id'], $row['efek_gerak_fitur']);
        } elseif ($row['jenis_studio'] == 'Velvet') {
            $koleksiVelvet[] = new TiketVelvet($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['bantal_selimut_pack'], $row['layanan_butler']);
        }
    }
} else {
    $pesan_error = "Belum ada data di database. Pastikan tabel_tiket sudah terisi.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket Bioskop - Nafis</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        h2 { color: #fff; padding: 10px 15px; border-radius: 5px; margin-top: 30px; }
        .bg-regular { background-color: #3498db; }
        .bg-imax { background-color: #e67e22; }
        .bg-velvet { background-color: #8e44ad; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; vertical-align: top; }
        th { background-color: #ecf0f1; font-weight: 600; }
        tr:hover { background-color: #f9f9f9; }
        .highlight-harga { font-weight: bold; color: #27ae60; font-size: 1.1em;}
        .alert { background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Data Pemesanan Tiket Bioskop</h1>
    <p style="text-align:center;">Daftar tiket ditarik langsung dari MySQL dengan implementasi Polimorfisme</p>

    <?php if(isset($pesan_error)): ?>
        <div class="alert"><?= $pesan_error ?></div>
    <?php endif; ?>

    <h2 class="bg-regular">Studio Regular</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Kursi</th>
                <th>Fasilitas Spesifik</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($koleksiRegular as $tiket): ?>
            <tr>
                <td><?= $tiket->getNamaFilm() ?></td>
                <td><?= $tiket->getJadwalTayang() ?></td>
                <td><?= $tiket->getJumlahKursi() ?></td>
                <td><?php $tiket->tampilkanInfoFasilitas(); ?></td>
                <td class="highlight-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="bg-imax">Studio IMAX</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Kursi</th>
                <th>Fasilitas Spesifik</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($koleksiIMAX as $tiket): ?>
            <tr>
                <td><?= $tiket->getNamaFilm() ?></td>
                <td><?= $tiket->getJadwalTayang() ?></td>
                <td><?= $tiket->getJumlahKursi() ?></td>
                <td><?php $tiket->tampilkanInfoFasilitas(); ?></td>
                <td class="highlight-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="bg-velvet">Studio Velvet</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Film</th>
                <th>Jadwal Tayang</th>
                <th>Kursi</th>
                <th>Fasilitas Spesifik</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($koleksiVelvet as $tiket): ?>
            <tr>
                <td><?= $tiket->getNamaFilm() ?></td>
                <td><?= $tiket->getJadwalTayang() ?></td>
                <td><?= $tiket->getJumlahKursi() ?></td>
                <td><?php $tiket->tampilkanInfoFasilitas(); ?></td>
                <td class="highlight-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>