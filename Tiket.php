<?php
// Tiket.php
abstract class Tiket {
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // --- TAMBAHKAN GETTER INI UNTUK TAHAP 6 ---
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return date('d-M-Y H:i', strtotime($this->jadwal_tayang)); }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    // ------------------------------------------

    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();
}
?>