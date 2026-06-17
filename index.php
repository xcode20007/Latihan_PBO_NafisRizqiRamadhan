<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Bioskop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select, input[type="datetime-local"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;}
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
        button:hover { background-color: #218838; }
        .specific-fields { display: none; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #007bff; margin-top: 10px;}
        .result-box { margin-top: 20px; padding: 15px; background-color: #e9ecef; border-radius: 5px; border-left: 5px solid #17a2b8;}
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pemesanan Tiket</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="jenis_studio">Pilih Jenis Studio:</label>
            <select name="jenis_studio" id="jenis_studio" required onchange="toggleFields()">
                <option value="">-- Pilih Studio --</option>
                <option value="Regular">Regular</option>
                <option value="IMAX">IMAX</option>
                <option value="Velvet">Velvet</option>
            </select>
        </div>

        <div class="form-group"><label>Nama Film:</label><input type="text" name="nama_film" required></div>
        <div class="form-group"><label>Jadwal Tayang:</label><input type="datetime-local" name="jadwal_tayang" required></div>
        <div class="form-group"><label>Jumlah Kursi:</label><input type="number" name="jumlah_kursi" required min="1"></div>
        <div class="form-group"><label>Harga Dasar Tiket (Rp):</label><input type="number" name="harga_dasar_tiket" required min="1"></div>

        <div id="fields_regular" class="specific-fields">
            <h4>Fasilitas Regular</h4>
            <div class="form-group"><label>Tipe Audio:</label><input type="text" name="tipe_audio" placeholder="Contoh: Dolby Atmos"></div>
            <div class="form-group"><label>Lokasi Baris:</label><input type="text" name="lokasi_baris" placeholder="Contoh: A-1"></div>
        </div>

        <div id="fields_imax" class="specific-fields">
            <h4>Fasilitas IMAX</h4>
            <div class="form-group"><label>ID Kacamata 3D:</label><input type="text" name="kacamata_3d_id" placeholder="Contoh: GL-3D-01"></div>
            <div class="form-group"><label>Efek Gerak Fitur:</label>
                <select name="efek_gerak_fitur">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div id="fields_velvet" class="specific-fields">
            <h4>Fasilitas Velvet</h4>
            <div class="form-group"><label>Paket Bantal & Selimut:</label>
                <select name="bantal_selimut_pack">
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group"><label>Layanan Butler:</label>
                <select name="layanan_butler">
                    <option value="1">Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
            </div>
        </div>

        <button type="submit" name="submit_tiket">Hitung Total & Buat Tiket</button>
    </form>

    <?php
    // Memproses Data Form jika di-submit
    if (isset($_POST['submit_tiket'])) {
        require_once 'TiketRegular.php';
        require_once 'TiketIMAX.php';
        require_once 'TiketVelvet.php';

        $jenis = $_POST['jenis_studio'];
        $id_tiket = rand(1000, 9999); // Generate ID acak untuk simulasi
        $nama_film = $_POST['nama_film'];
        $jadwal = $_POST['jadwal_tayang'];
        $jumlah = $_POST['jumlah_kursi'];
        $harga_dasar = $_POST['harga_dasar_tiket'];
        
        $tiketObj = null;

        // Implementasi Polimorfisme berdasarkan pilihan Dropdown
        if ($jenis == 'Regular') {
            $tiketObj = new TiketRegular($id_tiket, $nama_film, $jadwal, $jumlah, $harga_dasar, $_POST['tipe_audio'], $_POST['lokasi_baris']);
        } elseif ($jenis == 'IMAX') {
            $tiketObj = new TiketIMAX($id_tiket, $nama_film, $jadwal, $jumlah, $harga_dasar, $_POST['kacamata_3d_id'], (bool)$_POST['efek_gerak_fitur']);
        } elseif ($jenis == 'Velvet') {
            $tiketObj = new TiketVelvet($id_tiket, $nama_film, $jadwal, $jumlah, $harga_dasar, (bool)$_POST['bantal_selimut_pack'], (bool)$_POST['layanan_butler']);
        }

        // Output Hasil
        if ($tiketObj != null) {
            echo "<div class='result-box'>";
            echo "<h3>Detail Pemesanan Tiket</h3>";
            echo "<p><strong>ID Tiket:</strong> TICK-{$id_tiket}</p>";
            echo "<p><strong>Nama Film:</strong> {$nama_film}</p>";
            echo "<p><strong>Jumlah Kursi:</strong> {$jumlah} Kursi</p>";
            
            // Memanggil method yang di-override (Polymorphism berjalan disini)
            echo "<hr><strong>Fasilitas:</strong><br>";
            $tiketObj->tampilkanInfoFasilitas();
            
            echo "<hr><h3>Total Harga: Rp " . number_format($tiketObj->hitungTotalHarga(), 0, ',', '.') . "</h3>";
            echo "</div>";
        }
    }
    ?>
</div>

<script>
    // JavaScript untuk menampilkan form spesifik berdasarkan dropdown jenis studio
    function toggleFields() {
        var jenis = document.getElementById('jenis_studio').value;
        document.getElementById('fields_regular').style.display = (jenis === 'Regular') ? 'block' : 'none';
        document.getElementById('fields_imax').style.display = (jenis === 'IMAX') ? 'block' : 'none';
        document.getElementById('fields_velvet').style.display = (jenis === 'Velvet') ? 'block' : 'none';
    }
</script>

</body>
</html>