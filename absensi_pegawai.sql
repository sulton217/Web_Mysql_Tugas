-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 03:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi`
--

CREATE TABLE `tabel_absensi` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_jabatan` varchar(100) NOT NULL,
  `id_bagian` varchar(100) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `waktu_kehadiran` varchar(100) NOT NULL,
  `keterangan_absensi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_absensi`
--

INSERT INTO `tabel_absensi` (`id`, `id_pegawai`, `id_jabatan`, `id_bagian`, `tgl_absensi`, `waktu_kehadiran`, `keterangan_absensi`, `created_at`, `updated_at`) VALUES
(1, 'PG_001', 'JBT_001', 'BGN_001', '2020-04-30', '08:44:00', 'Terlambat ', NULL, NULL),
(5, 'PG_002', 'JBT_001', 'BGN_001', '2020-07-07', '19:57:15', 'Terlambat', '2020-07-07 12:57:15', '2020-07-07 12:57:15'),
(6, 'PG_004', 'JBT_001', 'BGN_001', '2020-07-04', '16:27:59', 'aksdjlsadasldjlsakdj', '2020-07-07 13:27:59', '2020-07-07 13:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_bagian`
--

CREATE TABLE `tabel_bagian` (
  `id_bagian` varchar(50) NOT NULL,
  `nama_bagian` varchar(100) DEFAULT NULL,
  `keterangan_bagian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_bagian`
--

INSERT INTO `tabel_bagian` (`id_bagian`, `nama_bagian`, `keterangan_bagian`) VALUES
('BGN_001', 'IT Network', NULL),
('BGN_002', 'Marketing', NULL),
('BGN_003', 'HRD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jabatan`
--

CREATE TABLE `tabel_jabatan` (
  `id_jabatan` varchar(50) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `keterangan_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_jabatan`
--

INSERT INTO `tabel_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan_jabatan`) VALUES
('JBT_001', 'Direktur Bagian', NULL),
('JBT_002', 'Supervisor', NULL),
('JBT_003', 'Manager Bagian', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_login`
--

CREATE TABLE `tabel_login` (
  `id_pegawai` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `passwords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_login`
--

INSERT INTO `tabel_login` (`id_pegawai`, `username`, `passwords`) VALUES
('PG_001', 'PG_001', 'root'),
('PG_002', 'PG_002', 'root'),
('PG_003', 'PG_003', 'root'),
('PG_004', 'PG_004', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `hari_kerja` varchar(100) DEFAULT NULL,
  `tempat_kelahiran` varchar(100) DEFAULT NULL,
  `tgl_kelahiran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `jenis_kelamin`, `hari_kerja`, `tempat_kelahiran`, `tgl_kelahiran`) VALUES
('PG_001', 'Ahmad Basori', 'Jl.Salunggung RT.01 RW.02  Kota Malang', 'L', 'Senin-Jumat', 'Malang', '1998-09-21'),
('PG_002', 'Kiki', 'Kediri', 'P', 'Senin-Sabtu', 'Kediri', '1993-04-02'),
('PG_003', 'Kim Sung', 'Malang', 'L', 'Senin-Rabu', 'Surabaya', '1987-05-01'),
('PG_004', 'shel', 'seng', 'P', '20', 'Mal', '2020-07-09');

--
-- Triggers `tabel_pegawai`
--
DELIMITER $$
CREATE TRIGGER `Trigger_insert_Username` AFTER INSERT ON `tabel_pegawai` FOR EACH ROW INSERT INTO `tabel_login` (`id_pegawai`, `username`, `passwords`) VALUES (NEW.id_pegawai,NEW.id_pegawai, 'root')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_bagian`
--
ALTER TABLE `tabel_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tabel_jabatan`
--
ALTER TABLE `tabel_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ForeignKey_tabel_bagian` FOREIGN KEY (`id_bagian`) REFERENCES `tabel_bagian` (`id_bagian`),
  ADD CONSTRAINT `tabel_absensi_ForeignKey_tabel_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `tabel_absensi_ibfk_ForeignKey_tabel_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`);

--
-- Constraints for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD CONSTRAINT `tabel_login_ForeignKey_tabel_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
