<?php
// koneksi/database.php
$host = "localhost";
$username = "root"; // Sesuaikan dengan user database Anda
$password = ""; // Sesuaikan dengan password database Anda
$database = "DB_LATIHAN_PBO_TRPL1A_NamaLengkap"; // Ubah dengan nama DB Anda

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// echo "Koneksi Berhasil"; // Hilangkan komentar untuk testing
?>