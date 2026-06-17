<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Overriding dari Tahap 5
    public function hitungTotalHarga() {
        // Dikenakan surcharge 50% dari total harga dasar
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50; 
    }

    public function tampilkanInfoFasilitas() {
        $statusPack = $this->bantalSelimutPack ? "✅ Disediakan" : "❌ Tidak Disediakan";
        $statusButler = $this->layananButler ? "✅ Standby" : "❌ Tidak Tersedia";
        
        echo "🛏️ <strong>Bantal & Selimut:</strong> {$statusPack} <br>";
        echo "🤵 <strong>Layanan Butler:</strong> {$statusButler}";
    }
}
?>