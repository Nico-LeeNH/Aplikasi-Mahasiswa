-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 10:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabdin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id_pengajuan` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `no_wa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lembaga_mengajukan` varchar(225) NOT NULL,
  `nomor_surat_pengajuan` varchar(225) NOT NULL,
  `tgl_surat_pengajuan` varchar(225) NOT NULL,
  `perihal` varchar(225) NOT NULL,
  `online_offline` enum('online','offline') NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `tgl_pelaksanaan` varchar(255) NOT NULL,
  `tempat_pelaksanaan` varchar(255) NOT NULL,
  `kota_pelaksanaan` enum('Malang','Batu') NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuans`
--

INSERT INTO `pengajuans` (`id_pengajuan`, `id`, `nama_lengkap`, `nim`, `no_wa`, `email`, `lembaga_mengajukan`, `nomor_surat_pengajuan`, `tgl_surat_pengajuan`, `perihal`, `online_offline`, `judul_penelitian`, `tgl_pelaksanaan`, `tempat_pelaksanaan`, `kota_pelaksanaan`, `upload_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'siapakah saya', '098', '123apaya', 'saya@gmail.com', 'telkom', '1', '22 dejanuari 2777', 'liburan', 'online', 'apakah wibu apakah', 'kapan kapan', 'gatau', 'Malang', 'uploads/XQ3wvaScpmbtSn4bYvQzkRPRE0QeSHZLdCsJWZwt.pdf', '2024-01-24 02:53:48', '2024-01-24 02:53:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id_pengajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
