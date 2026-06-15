<?php

abstract class Tiket {
    // ==========================================
    // PROPERTI TERENKAPSULASI (PROTECTED)
    // ==========================================
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    /**
     * Constructor untuk memetakan nilai dari kolom tabel database
     */
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // ==========================================
    // METODE ABSTRAK (Tanpa Body / Implementasi)
    // ==========================================
    
    // Metode ini nantinya wajib diisi rumusnya oleh class anak (misal: class TiketRegular, TiketVelvet)
    abstract public function hitungTotalHarga();
    
    // Metode ini nantinya wajib diisi untuk menampilkan spesifikasi/fasilitas tiket
    abstract public function tampilkanInfoFasilitas();
}

?>

<?php
// Catatan: Pastikan class Tiket dari Tahap 3 sudah di-include/require sebelum kode ini
// require_once 'Tiket.php';

// ==========================================
// 1. Kelas TiketRegular
// ==========================================
class TiketRegular extends Tiket {
    // Properti khusus kelas Regular (Enkapsulasi private)
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        
        // Inisialisasi properti spesifik anak
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Implementasi wajib abstract method hitungTotalHarga
    public function hitungTotalHarga() {
        // Logika dasar: harga dasar x jumlah kursi
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Implementasi wajib abstract method tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Studio Regular | Audio: {$this->tipeAudio} | Lokasi Baris: {$this->lokasiBaris}";
    }
}

// ==========================================
// 2. Kelas TiketIMAX
// ==========================================
class TiketIMAX extends Tiket {
    // Properti khusus kelas IMAX
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        // Contoh logika: IMAX biasanya ada tambahan harga (misal + Rp50.000 dari harga dasar)
        $tambahanHarga = 50000;
        return ($this->hargaDasarTiket + $tambahanHarga) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $statusGerak = $this->efekGerakFitur ? "Aktif" : "Tidak Aktif";
        return "Studio IMAX | ID Kacamata 3D: {$this->kacamata3dId} | Efek Kursi Gerak: {$statusGerak}";
    }
}

// ==========================================
// 3. Kelas TiketVelvet
// ==========================================
class TiketVelvet extends Tiket {
    // Properti khusus kelas Velvet
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga() {
        // Contoh logika: Kelas Velvet premium, misal dihitung harga dasar dikali 2
        return ($this->hargaDasarTiket * 2) * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        $statusBantal = $this->bantalSelimutPack ? "Disediakan" : "Tidak Disediakan";
        $statusButler = $this->layananButler ? "Tersedia" : "Tidak Tersedia";
        return "Studio Velvet | Bantal & Selimut: {$statusBantal} | Layanan Butler: {$statusButler}";
    }
}
?>