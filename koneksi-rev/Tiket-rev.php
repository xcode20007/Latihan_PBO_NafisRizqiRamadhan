<?php
// Pastikan class induk sudah dipanggil jika Anda meletakkannya di file terpisah
// require_once 'Tiket.php';

// ==========================================
// 1. Subclass TiketRegular
// ==========================================
class TiketRegular extends Tiket {
    // Properti tambahan spesifik
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil properti dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Implementasi metode abstrak
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio Regular | Audio: {$this->tipeAudio} | Posisi: {$this->lokasiBaris}";
    }
}

// ==========================================
// 2. Subclass TiketIMAX
// ==========================================
class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Implementasi metode abstrak
    public function hitungTotalHarga() {
        $biayaTambahanIMAX = 50000; // Contoh penambahan harga untuk IMAX
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $statusGerak = $this->efekGerakFitur ? "Aktif" : "Tidak Aktif";
        return "Studio IMAX | ID Kacamata 3D: {$this->kacamata3dId} | Efek Gerak: {$statusGerak}";
    }
}

// ==========================================
// 3. Subclass TiketVelvet
// ==========================================
class TiketVelvet extends Tiket {
    // Properti tambahan spesifik
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Implementasi metode abstrak
    public function hitungTotalHarga() {
        $biayaTambahanVelvet = 100000; // Contoh penambahan harga untuk Velvet
        return ($this->hargaDasarTiket + $biayaTambahanVelvet) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $statusBantal = $this->bantalSelimutPack ? "Tersedia" : "Tidak Tersedia";
        $statusButler = $this->layananButler ? "Tersedia" : "Tidak Tersedia";
        return "Studio Velvet | Bantal/Selimut: {$statusBantal} | Butler: {$statusButler}";
    }
}
?>