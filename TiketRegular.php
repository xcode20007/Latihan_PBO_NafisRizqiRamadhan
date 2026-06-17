<?php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Overriding dari Tahap 5
    public function hitungTotalHarga() {
        // Tarif standar murni tanpa biaya tambahan
        return $this->jumlah_kursi * $this->hargaDasarTiket; 
    }

    public function tampilkanInfoFasilitas() {
        echo "🔊 <strong>Tipe Audio:</strong> {$this->tipeAudio} <br>";
        echo "💺 <strong>Lokasi Baris:</strong> {$this->lokasiBaris}";
    }
}
?>