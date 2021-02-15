-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 09:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `status_pekerjaan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `status_keluarga` int(11) NOT NULL,
  `status_hidup` int(11) NOT NULL,
  `status_tinggal` int(11) NOT NULL,
  `goldar` varchar(20) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `nik`, `kk`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `kewarganegaraan`, `alamat`, `status_pekerjaan`, `agama`, `status_nikah`, `nama_ayah`, `nama_ibu`, `status_keluarga`, `status_hidup`, `status_tinggal`, `goldar`, `pendidikan`, `created_at`, `updated_at`) VALUES
(8, '1234567891123454', '1234567891123946', 'Widdy Arfiansyah', '1998-12-12', 'Bandung', 'Laki-laki', 'Indonesia', 'Sukabumi bhayangkara', 'Sedang Bekerja', 'Islam', 'Tidak/Belum Menikah', 'Kirito Kazuya', 'Shinon', 0, 0, 0, 'O', 'S3', '2020-09-29 23:23:21', '2020-10-02 10:45:18'),
(9, '1234567891123452', '1234567891123938', 'Agung Bimantara', '2020-09-03', 'Sukabumi', 'Laki-laki', 'Indonesia', 'Sukabumi Cisaat', 'Sedang Bekerja', 'Islam', 'Tidak/Belum Menikah', 'Kirito Kazuya', 'Shinon', 0, 0, 0, 'AB', 'S1', '2020-09-29 23:23:42', '2020-10-02 10:46:43'),
(16, '1234567891123453', '1234567891123938', 'Kirigaya Kazuto', '2020-09-16', 'Sukabumi', 'Laki-laki', 'Malaysia', 'Sukabumi bhayangkara', 'Sedang Bekerja', 'Budha', 'Tidak/Belum Menikah', 'Agung Bimantara', 'Shinon', 2, 0, 1, 'B', 'S2', '2020-09-30 10:52:52', '2020-10-02 07:50:05'),
(17, '1234567891123458', '1234567891123938', 'Raftalia', '2020-09-17', 'Sukabumi', 'Perempuan', 'Malaysia', 'Sukabumi bhayangkara', 'Sedang Bekerja', 'Islam', 'Tidak/Belum Menikah', 'Agung Bimantara', 'Shinon', 1, 0, 0, 'AB', 'S2', '2020-09-30 11:02:27', '2020-10-02 10:45:47'),
(18, '1234567891123450', '1234567891123938', 'Joko Kaguta', '2020-09-03', 'Sukabumi', 'Perempuan', 'Malaysia', 'Sukabumi bhayangkara', 'Tidak/Belum Bekerja', 'Islam', 'Sudah Menikah', 'Agung Bimantara', 'Shinon', 2, 0, 0, 'AB', 'SMA', '2020-09-30 11:17:23', '2020-10-03 02:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `data_pindah_penduduk`
--

CREATE TABLE `data_pindah_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `status_pekerjaan` varchar(50) NOT NULL,
  `alamat_asal` varchar(256) NOT NULL,
  `alamat_baru` varchar(256) NOT NULL,
  `alasan_pindah` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pindah_penduduk`
--

INSERT INTO `data_pindah_penduduk` (`id`, `nik`, `kk`, `nama`, `tanggal_lahir`, `kewarganegaraan`, `pendidikan`, `status_pekerjaan`, `alamat_asal`, `alamat_baru`, `alasan_pindah`, `created_at`, `updated_at`) VALUES
(18, '1234567891123453', '1234567891123938', 'Kirigaya Kazuto', '2020-09-16', 'Malaysia', 'S2', 'Sedang Bekerja', 'Sukabumi bhayangkara', 'Cianjur', 'Ga betah gan!', '2020-10-02 07:49:55', '2020-10-03 02:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `master_agama`
--

CREATE TABLE `master_agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_agama`
--

INSERT INTO `master_agama` (`id`, `agama`, `created_at`) VALUES
(1, 'Islam', '2020-09-20 05:21:17'),
(2, 'Budha', '2020-09-21 05:21:20'),
(3, 'Hindu', '2020-09-26 17:31:40'),
(4, 'Kristen', '2020-09-23 05:26:41'),
(5, 'Konghucu', '2020-09-16 17:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `master_negara`
--

CREATE TABLE `master_negara` (
  `id` int(11) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_negara`
--

INSERT INTO `master_negara` (`id`, `negara`, `created_at`) VALUES
(1, 'Indonesia', '2020-09-28 23:59:46'),
(2, 'Malaysia', '2020-09-28 23:59:46'),
(8, 'Timor Leste', '2020-09-28 12:59:02'),
(11, 'Brunei Darusalam', '2020-09-28 01:00:02'),
(12, 'Myanmar', '2020-09-28 01:04:34'),
(13, 'Vietnam', '2020-09-28 01:04:46'),
(14, 'Singapura', '2020-09-28 01:05:02'),
(16, 'Thailand', '2020-09-28 01:09:47'),
(17, 'Kamboja', '2020-09-28 01:09:52'),
(18, 'Filipina', '2020-09-28 01:10:58'),
(19, 'Laos', '2020-09-28 01:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `master_pendidikan`
--

CREATE TABLE `master_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pendidikan`
--

INSERT INTO `master_pendidikan` (`id`, `pendidikan`, `created_at`) VALUES
(1, 'Belum/Tidak Sekolah', '2020-10-02 10:26:54'),
(2, 'TK', '2020-10-02 10:27:49'),
(3, 'SD', '2020-10-02 10:28:41'),
(4, 'SMP', '2020-10-02 10:28:46'),
(5, 'SMA', '2020-10-02 10:28:50'),
(6, 'S1', '2020-10-02 10:29:01'),
(7, 'S2', '2020-10-02 10:29:06'),
(8, 'S3', '2020-10-02 10:29:10'),
(9, 'D1', '2020-10-02 10:29:13'),
(10, 'D2', '2020-10-02 10:29:15'),
(11, 'D3', '2020-10-02 10:29:18'),
(12, 'D4', '2020-10-02 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_auth`
--

CREATE TABLE `tb_auth` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pindah_penduduk`
--
ALTER TABLE `data_pindah_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_agama`
--
ALTER TABLE `master_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_negara`
--
ALTER TABLE `master_negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_auth`
--
ALTER TABLE `tb_auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_pindah_penduduk`
--
ALTER TABLE `data_pindah_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_agama`
--
ALTER TABLE `master_agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `master_negara`
--
ALTER TABLE `master_negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `master_pendidikan`
--
ALTER TABLE `master_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_auth`
--
ALTER TABLE `tb_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
