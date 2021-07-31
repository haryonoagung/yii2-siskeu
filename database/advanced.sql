-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 07:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `kode_mak` varchar(125) NOT NULL,
  `nama_bagian` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `kode_mak`, `nama_bagian`) VALUES
(1, '2142', 'Pendidikan'),
(2, '5103', 'Sekretariat'),
(3, '5104', 'Urusan'),
(4, '5104', 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) NOT NULL,
  `no_mak` varchar(125) NOT NULL,
  `nama_berkas` varchar(125) NOT NULL,
  `nominal` int(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `no_mak`, `nama_berkas`, `nominal`) VALUES
(1, 'MK 1234567891011121314151617181920', 'Perjalanan Dinas Kegiatan Tim Penyusun Modul dan Soal P3K Guru Agama ', 600000),
(8, 'MK 00004234525820958902852908021481023', 'Nama Berkas 2', 90000000),
(9, 'MK 498028359820395801273507132', 'Nama Berkas 3', 80000000),
(10, 'MK 095230583903284984', 'Nama Berkas 4', 8000000),
(11, 'MK 00090048275359621586187562', 'Nama Berkas 5', 100000000),
(12, 'MK 0000423452ruwru82164823', 'Nama Berkas 6', 10500000);

-- --------------------------------------------------------

--
-- Table structure for table `gu`
--

CREATE TABLE `gu` (
  `id_gu` int(10) NOT NULL,
  `id_berkas` int(11) NOT NULL,
  `id_bagian` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('-','lengkap','tidak lengkap','') NOT NULL,
  `proses` enum('-','KPPN','','') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gu`
--

INSERT INTO `gu` (`id_gu`, `id_berkas`, `id_bagian`, `tanggal_masuk`, `status`, `proses`, `keterangan`) VALUES
(2, 1, 1, '2021-05-01', '-', '-', 'Kurang Kwitansi'),
(3, 9, 2, '2021-05-02', '-', '-', 'Belum Disetujui'),
(4, 1, 4, '2021-05-01', 'tidak lengkap', '-', 'Tidak dapat Dilanjutkan'),
(6, 9, 2, '2021-05-02', 'lengkap', '-', 'Test'),
(7, 9, 1, '2021-05-02', 'lengkap', '-', 'Jos');

-- --------------------------------------------------------

--
-- Table structure for table `ls`
--

CREATE TABLE `ls` (
  `id_ls` int(11) NOT NULL,
  `id_berkas` int(11) NOT NULL,
  `id_bagian` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('-','lengkap','tidak lengkap','') NOT NULL,
  `proses` enum('-','KPPN','','') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ls`
--

INSERT INTO `ls` (`id_ls`, `id_berkas`, `id_bagian`, `tanggal_masuk`, `status`, `proses`, `keterangan`) VALUES
(2, 8, 3, '2021-05-01', '-', '-', 'Lengkap'),
(3, 9, 4, '2021-05-02', 'lengkap', 'KPPN', 'Disetujui'),
(14, 11, 2, '2021-05-02', 'lengkap', '-', 'Klew');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1619098628),
('m130524_201442_init', 1619098633),
('m190124_110200_add_verification_token_column_to_user_table', 1619098633);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(5, 'admin1', 'bSu06czstvU3thTYnRjxvwwry-9Sv_NS', '$2y$13$tV41UJ4ZxArCvK4gcL/3geHaq1uphMVDARmTCppR2tdsuxM3ozTcq', NULL, 'admin1@gmail.com', 10, 1619104480, 1619104523, 'WdbryjqN4r3-Z0_hgeXR5xWfcl079Sgh_1619104480'),
(6, 'admin2', 'jKGhR71RrbQcaCq4vKufMu9GZLmrRljk', '$2y$13$b/ecL5COte5qdobmha4GBeSbvThmN/qkx8T6HOtleR0za9gnFcGRK', NULL, 'admin2@example.test', 10, 1619233867, 1619234074, 'mBDCP2gUUqnlSyBJ3OZBbuToq432Z1T2_1619233867'),
(7, 'admin3', 'HbKOWxTBUwfmhSPdW6UI2G4bt3wMFGqj', '$2y$13$kqjkV00hc2oL3Bvlg.4eaeVz7QC5ON3rRmXHLCn5OfhVta5Xjzqlu', NULL, 'admin3@example.test', 10, 1619234208, 1619234236, 'KKIPqxcDZRpMb7kXhf-8odfoh2lbCwdl_1619234208');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `gu`
--
ALTER TABLE `gu`
  ADD PRIMARY KEY (`id_gu`),
  ADD KEY `berkas_gu_relation` (`id_berkas`),
  ADD KEY `bagian_gu_relation` (`id_bagian`);

--
-- Indexes for table `ls`
--
ALTER TABLE `ls`
  ADD PRIMARY KEY (`id_ls`),
  ADD KEY `bagian_ls_relation` (`id_bagian`),
  ADD KEY `berkas_ls_relation` (`id_berkas`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gu`
--
ALTER TABLE `gu`
  MODIFY `id_gu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ls`
--
ALTER TABLE `ls`
  MODIFY `id_ls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gu`
--
ALTER TABLE `gu`
  ADD CONSTRAINT `bagian_gu_relation` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`),
  ADD CONSTRAINT `berkas_gu_relation` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id_berkas`),
  ADD CONSTRAINT `gu_ibfk_1` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id_berkas`);

--
-- Constraints for table `ls`
--
ALTER TABLE `ls`
  ADD CONSTRAINT `bagian_ls_relation` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`),
  ADD CONSTRAINT `berkas_ls_relation` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id_berkas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
