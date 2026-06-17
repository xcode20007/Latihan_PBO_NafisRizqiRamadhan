
<?php// Pastikan file koneksi sudah di-require sebelumnya
require_once 'Koneksi/database.php';
require_once 'TiketIMAX.php';

// Memanggil fungsi statis secara langsung menggunakan titik dua ganda (::)
$daftarTiketIMAX = TiketIMAX::getSemuaTiketIMAX($conn);

// Menampilkan datanya
foreach ($daftarTiketIMAX as $tiket) {
    echo $tiket->getNamaFilm() . "<br>";
    $tiket->tampilkanInfoFasilitas();

?>