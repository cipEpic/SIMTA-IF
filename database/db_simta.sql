-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 06:29 PM
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
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `password`, `email`, `no_telp`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '082233334444'),
(3, 'admin1', 'Admin Satu', 'password123', 'admin1@example.com', '123456789'),
(4, 'admin2', 'Admin Dua', 'password456', 'admin2@example.com', '987654321');

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
(1, '1234567890', 'dosen1', 'Dosen Satu', 'password456', 'dosen1@example.com', '987654321'),
(2, '9876543210', 'dosen2', 'Dosen Dua', 'password789', 'dosen2@example.com', '123456789');

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
(1, '20230001', 'mahasiswa1', 'Mahasiswa Satu', 'password789', 'mahasiswa1@example.com', '111222333'),
(2, '20230002', 'mahasiswa2', 'Mahasiswa Dua', 'passwordabc', 'mahasiswa2@example.com', '222333444');

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
  `file_revisi_pendahuluan` varchar(255) DEFAULT NULL,
  `file_revisi_bab1` varchar(255) DEFAULT NULL,
  `file_revisi_bab2` varchar(255) DEFAULT NULL,
  `file_revisi_bab3` varchar(255) DEFAULT NULL,
  `file_revisi_bab4` varchar(255) DEFAULT NULL,
  `file_revisi_bab5` varchar(255) DEFAULT NULL,
  `file_revisi_akhir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_bimbingan`
--

INSERT INTO `progress_bimbingan` (`id_progress`, `id_mahasiswa`, `id_dosen`, `sampul`, `l_judul`, `l_pengesahan`, `abstrak`, `katpeng`, `dafis`, `daftab`, `dafgam`, `latbel`, `rumusan`, `batasan`, `tujuan`, `manfaat`, `sistematika_penulisan`, `teoritis`, `empiris`, `metopen`, `desain_sistem`, `desain_evaluasi`, `proses_kumpul_data`, `implementasi_sistem`, `implementasi_evaluasi`, `kesimpulan`, `saran`, `dafpus`, `lampiran`, `file_revisi_pendahuluan`, `file_revisi_bab1`, `file_revisi_bab2`, `file_revisi_bab3`, `file_revisi_bab4`, `file_revisi_bab5`, `file_revisi_akhir`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `progress_bimbingan`
--
ALTER TABLE `progress_bimbingan`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
