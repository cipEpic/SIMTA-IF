-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 06:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `username`, `nama`, `password`, `email`, `no_telp`) VALUES
(3, '33333333', 'admin1', 'Admin Satu', 'password123', 'admin1@example.com', '123456789'),
(8, '', 'budiman', 'budiman', '$2y$10$kA8o/gWeXSKvBWlud5vcOukBxp7HZp/kSCUIy1LngbVTaKcJ1LphO', 'budiman@gmail.com', '081122223333'),
(9, '', 'admin5', 'admin5', '$2y$10$qLnU3WYsqxK1jwH0Lohuq.NwAx1jLbP6VRbCELjhBjUAAyEZ9Dck6', 'admin5@gmail.com', '081122223333');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `NIP`, `username`, `nama_dosen`, `password`, `email`, `no_telp`) VALUES
(1, '1234567890', 'dosen1', 'Dosen Satu', 'dosen1', 'dosen1@example.com', '987654321'),
(2, '9876543210', 'dosen2', 'Dosen Dua', 'dosen2', 'dosen2@example.com', '123456789'),
(3, '1234567893', 'dosen3', 'Dosen Tiga', 'dosen3', 'dosen3@example.com', '987654323'),
(4, '9876543214', 'dosen4', 'Dosen Empat', 'dosen4', 'dosen4@example.com', '123456784'),
(5, '10213912', 'budiman', 'budiman', '$2y$10$bWSp2vOhYd/ymOGzXcPaEuqE3WpsoamKmCgeT5ujzT3YKUWyV9l3e', 'budiman@gmail.com', '081122223333'),
(6, '20213915', 'dosen5', 'dosen5', '$2y$10$N36tIh9fQKgZtCQ0ucFQNuS8YbCd/J6TigbDjxykjxyMXaCWeKzcC', 'dosen5@gmail.com', '081122223333');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `NIM`, `username`, `nama_mahasiswa`, `password`, `email`, `no_telp`) VALUES
(1, '20230001', 'mahasiswa1', 'Mahasiswa Satu', 'mahasiswa1', 'mahasiswa1@example.com', '111222333'),
(2, '20230002', 'mahasiswa2', 'Mahasiswa Dua', 'mahasiswa2', 'mahasiswa2@example.com', '222333444'),
(3, '20230003', 'mahasiswa3', 'Mahasiswa Tiga', 'mahasiswa3', 'mahasiswa3@example.com', '333222333'),
(4, '20230004', 'mahasiswa4', 'Mahasiswa Empat', 'mahasiswa4', 'mahasiswa4@example.com', '444333444'),
(5, '10213912', 'budiman', 'budiman', '$2y$10$MMcz0Tvq/sMbTbv9I/TCFeLka5tphUHvi1g93LEPyHD0Mo8JA27v6', 'budiman@gmail.com', '081122223333'),
(6, '10213915', 'mahasiswa5', 'mahasiswa5', '$2y$10$jFoSWkwozziojQDDByUXAuJyLi6VcMMumkEr8qK844/WO9wzusHvq', 'mahasiswa5@gmail.com', '081122223333');

-- --------------------------------------------------------

--
-- Table structure for table `progress_bimbingan`
--

CREATE TABLE `progress_bimbingan` (
  `id_progress` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `sampul` tinyint(1) DEFAULT 0,
  `l_judul` tinyint(1) DEFAULT 0,
  `l_pengesahan` tinyint(1) DEFAULT 0,
  `abstrak` tinyint(1) DEFAULT 0,
  `katpeng` tinyint(1) DEFAULT 0,
  `dafis` tinyint(1) DEFAULT 0,
  `daftab` tinyint(1) DEFAULT 0,
  `dafgam` tinyint(1) DEFAULT 0,
  `latbel` tinyint(1) DEFAULT 0,
  `rumusan` tinyint(1) DEFAULT 0,
  `batasan` tinyint(1) DEFAULT 0,
  `tujuan` tinyint(1) DEFAULT 0,
  `manfaat` tinyint(1) DEFAULT 0,
  `sistematika_penulisan` tinyint(1) DEFAULT 0,
  `teoritis` tinyint(1) DEFAULT 0,
  `empiris` tinyint(1) DEFAULT 0,
  `metopen` tinyint(1) DEFAULT 0,
  `desain_sistem` tinyint(1) DEFAULT 0,
  `desain_evaluasi` tinyint(1) DEFAULT 0,
  `proses_kumpul_data` tinyint(1) DEFAULT 0,
  `implementasi_sistem` tinyint(1) DEFAULT 0,
  `implementasi_evaluasi` tinyint(1) DEFAULT 0,
  `kesimpulan` tinyint(1) DEFAULT 0,
  `saran` tinyint(1) DEFAULT 0,
  `dafpus` tinyint(1) DEFAULT 0,
  `lampiran` tinyint(1) DEFAULT 0,
  `file_revisi_pendahuluan` text DEFAULT NULL,
  `file_revisi_bab1` text DEFAULT NULL,
  `file_revisi_bab2` text DEFAULT NULL,
  `file_revisi_bab3` text DEFAULT NULL,
  `file_revisi_bab4` text DEFAULT NULL,
  `file_revisi_bab5` text DEFAULT NULL,
  `file_revisi_akhir` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_bimbingan`
--

INSERT INTO `progress_bimbingan` (`id_progress`, `id_mahasiswa`, `id_dosen`, `sampul`, `l_judul`, `l_pengesahan`, `abstrak`, `katpeng`, `dafis`, `daftab`, `dafgam`, `latbel`, `rumusan`, `batasan`, `tujuan`, `manfaat`, `sistematika_penulisan`, `teoritis`, `empiris`, `metopen`, `desain_sistem`, `desain_evaluasi`, `proses_kumpul_data`, `implementasi_sistem`, `implementasi_evaluasi`, `kesimpulan`, `saran`, `dafpus`, `lampiran`, `file_revisi_pendahuluan`, `file_revisi_bab1`, `file_revisi_bab2`, `file_revisi_bab3`, `file_revisi_bab4`, `file_revisi_bab5`, `file_revisi_akhir`) VALUES
(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sadasd sadasd', 'keren sadnkasdnkasndkjssssssssssssssssssssssssssssssssssssssssssssa', '', '', '', '', ''),
(2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sadasd sadasd', 'keren sadnkasdnkasndkjssssssssssssssssssssssssssssssssssssssssssssa', '', '', '', '', ''),
(8, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `progress_bimbingan`
--
ALTER TABLE `progress_bimbingan`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `fk_progress_mahasiswa` (`id_mahasiswa`),
  ADD KEY `fk_progress_dosen` (`id_dosen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `progress_bimbingan`
--
ALTER TABLE `progress_bimbingan`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progress_bimbingan`
--
ALTER TABLE `progress_bimbingan`
  ADD CONSTRAINT `fk_progress_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `fk_progress_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
