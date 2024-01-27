-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 07:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apkmahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id_pengajuan` bigint UNSIGNED NOT NULL,
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lembaga_mengajukan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat_pengajuan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat_pengajuan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_offline` enum('Online','Offline') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pelaksanaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_pelaksanaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_pelaksanaan` enum('Malang','Batu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id_pengajuan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
