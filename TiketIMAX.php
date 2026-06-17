<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Overriding dari Tahap 5
    public function hitungTotalHarga() {
        // Dikenakan biaya tambahan teknologi IMAX Rp 35.000 flat
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000; 
    }

    public function tampilkanInfoFasilitas() {
        $statusEfek = $this->efekGerakFitur ? "<span style='color: green;'>Aktif</span>" : "<span style='color: red;'>Tidak Aktif</span>";
        echo "🕶️ <strong>ID Kacamata 3D:</strong> {$this->kacamata3dId} <br>";
        echo "📳 <strong>Efek Gerak:</strong> {$statusEfek}";
    }
}
?>