-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 06:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_nafisrizqiramadhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(100) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` tinyint(1) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT NULL,
  `layanan_butler` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Dune: Part Two', '2026-06-20 14:00:00', '50000.00', 'Regular', 'Dolby Digital', 'A1', NULL, NULL, NULL, NULL),
(2, 'Dune: Part Two', '2026-06-20 14:00:00', '50000.00', 'Regular', 'Dolby Digital', 'A2', NULL, NULL, NULL, NULL),
(3, 'Oppenheimer', '2026-06-20 16:30:00', '45000.00', 'Regular', 'Standard', 'C5', NULL, NULL, NULL, NULL),
(4, 'Deadpool & Wolverine', '2026-06-21 19:00:00', '55000.00', 'Regular', NULL, 'D10', NULL, NULL, NULL, NULL),
(5, 'Inside Out 2', '2026-06-21 10:00:00', '40000.00', 'Regular', 'Standard', NULL, NULL, NULL, NULL, NULL),
(6, 'Godzilla x Kong', '2026-06-22 13:15:00', '50000.00', 'Regular', 'Dolby Atmos', 'E8', NULL, NULL, NULL, NULL),
(7, 'Godzilla x Kong', '2026-06-22 13:15:00', '50000.00', 'Regular', 'Dolby Atmos', 'E9', NULL, NULL, NULL, NULL),
(8, 'Dune: Part Two', '2026-06-20 15:00:00', '100000.00', 'IMAX', 'IMAX 12-Track', 'F1', NULL, NULL, NULL, NULL),
(9, 'Avatar 3', '2026-12-18 19:30:00', '120000.00', 'IMAX', 'IMAX 12-Track', 'G5', '3D-GLS-001', NULL, NULL, NULL),
(10, 'Avatar 3', '2026-12-18 19:30:00', '120000.00', 'IMAX', 'IMAX 12-Track', 'G6', '3D-GLS-002', NULL, NULL, NULL),
(11, 'Furiosa', '2026-06-25 20:00:00', '95000.00', 'IMAX', 'IMAX 6-Track', 'H10', NULL, NULL, NULL, NULL),
(12, 'Twisters', '2026-07-20 18:00:00', '110000.00', 'IMAX', 'IMAX 12-Track', 'J12', NULL, 1, NULL, NULL),
(13, 'Twisters', '2026-07-20 18:00:00', '110000.00', 'IMAX', 'IMAX 12-Track', 'J13', NULL, 1, NULL, NULL),
(14, 'Interstellar', '2026-08-01 14:00:00', '100000.00', 'IMAX', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'The Batman Part II', '2026-10-02 21:00:00', '250000.00', 'Velvet', 'Dolby Atmos', 'V1', NULL, NULL, 1, 1),
(16, 'The Batman Part II', '2026-10-02 21:00:00', '250000.00', 'Velvet', 'Dolby Atmos', 'V2', NULL, NULL, 1, 1),
(17, 'A Quiet Place: Day One', '2026-06-28 22:15:00', '200000.00', 'Velvet', 'Dolby Atmos', 'V5', NULL, NULL, 1, 0),
(18, 'A Quiet Place: Day One', '2026-06-28 22:15:00', '200000.00', 'Velvet', 'Dolby Atmos', 'V6', NULL, NULL, 1, 0),
(19, 'Wicked', '2026-11-25 19:00:00', '300000.00', 'Velvet', 'Dolby Atmos', NULL, NULL, NULL, NULL, NULL),
(20, 'Gladiator 2', '2026-11-20 20:30:00', '275000.00', 'Velvet', NULL, 'V10', NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
