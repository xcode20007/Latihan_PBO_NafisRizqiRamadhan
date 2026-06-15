<?php
// Konfigurasi Database
$host     = "localhost";
$username = "root";       // Sesuaikan dengan username database Anda
$password = "";           // Sesuaikan dengan password database Anda
$database = "db_latihan_pbo_ti1c_nafisrizqiramadhan"; // Sesuaikan dengan nama database Anda pada Tahap 1

try {
    // Membuat instance PDO baru
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Set mode error PDO ke exception agar mudah dilacak jika ada error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // (Opsional) Uncomment baris di bawah ini untuk tes koneksi
    // echo "Koneksi database berhasil!"; 
    
} catch(PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
?>