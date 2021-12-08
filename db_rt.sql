-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2021 at 08:23 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_warga`
--

CREATE TABLE `admin_warga` (
  `id_warga` int(11) NOT NULL,
  `nm_warga` varchar(255) NOT NULL,
  `nkk` bigint(16) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `tpt_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `gol_darah` varchar(6) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(21) NOT NULL,
  `status` varchar(11) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `warganegara` varchar(21) NOT NULL,
  `telp` bigint(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `humas_berita`
--

CREATE TABLE `humas_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `berita` text NOT NULL,
  `status` varchar(21) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `humas_berita`
--

INSERT INTO `humas_berita` (`id_berita`, `judul`, `tgl`, `gambar`, `berita`, `status`, `id_admin`) VALUES
(3, 'Kegiatan Kerja Bakti', '2021-11-01', '', 'Kegiatan kerja bakti dalam lingkungan warga RT 17 untuk membersihkan got, taman, dan pekarangan rumah.', 'Aktif', 2),
(4, 'Lomba 17 Agustus', '2021-08-17', '', 'Kegiatan perlombaan di RT 17 untuk Hari Kemerdekaan Republik Indonesia', 'Aktif', 2),
(5, 'Laporan Keuangan', '2021-11-20', '', 'Laporan keuangan per tanggal 20 November 2021 di organisasi RT 17. Laporan ini disampaikan untuk transparansi.', 'Aktif', 3),
(6, 'Undangan Maulid Nabi', '2021-11-01', '', 'Undangan Maulid Nabi di Mushalla Ar-Rahman untuk warga RT. 17 dan sekitarnya juga turut diundang.', 'Aktif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `humas_lapor`
--

CREATE TABLE `humas_lapor` (
  `id_lapor` int(11) NOT NULL,
  `nm_warga` varchar(255) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `uraian` text NOT NULL,
  `status` varchar(21) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `humas_lapor`
--

INSERT INTO `humas_lapor` (`id_lapor`, `nm_warga`, `jenis`, `uraian`, `status`, `tgl`, `id_user`) VALUES
(1, 'Aulya', 'Keluhan', 'Jalanan Rusak', 'Aktif', '2021-11-17', 3),
(2, 'Rahman', 'Keluhan', 'Kemalingan', 'Aktif', '2021-11-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_keluar`
--

CREATE TABLE `keuangan_keluar` (
  `id_uangkeluar` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` bigint(21) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan_keluar`
--

INSERT INTO `keuangan_keluar` (`id_uangkeluar`, `tgl`, `ket`, `jumlah`, `id_admin`) VALUES
(1, '2021-12-02', 'Alat Kegiatan Kerja Bakti', 350000, 6),
(2, '2021-12-01', 'Perawatan Mobil BPK', 750000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_masuk`
--

CREATE TABLE `keuangan_masuk` (
  `id_uangmasuk` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` bigint(21) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan_masuk`
--

INSERT INTO `keuangan_masuk` (`id_uangmasuk`, `tgl`, `ket`, `jumlah`, `id_admin`) VALUES
(1, '2021-11-29', 'Donasi dari Aulya', 800000, 6),
(2, '2021-11-28', 'Donasi dari Rahman', 375000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','warga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin'),
(3, 'aulya', '0699f94a419d775dd5dcc0215c7ec62e', 'aulya@aulya.com', 'admin'),
(4, 'me', 'ab86a1e1ef70dff97959067b723c5c24', 'me@me.com', 'warga'),
(5, 'aulyakeren', '54e66ce064a86a7f15cded0fbc76678c', 'tes@magil.com', 'warga'),
(6, 'testing', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing@testing.co.id', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_warga`
--
ALTER TABLE `admin_warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `humas_berita`
--
ALTER TABLE `humas_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `humas_lapor`
--
ALTER TABLE `humas_lapor`
  ADD PRIMARY KEY (`id_lapor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  ADD PRIMARY KEY (`id_uangkeluar`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  ADD PRIMARY KEY (`id_uangmasuk`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_warga`
--
ALTER TABLE `admin_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `humas_berita`
--
ALTER TABLE `humas_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `humas_lapor`
--
ALTER TABLE `humas_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  MODIFY `id_uangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  MODIFY `id_uangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_warga`
--
ALTER TABLE `admin_warga`
  ADD CONSTRAINT `admin_warga_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `humas_berita`
--
ALTER TABLE `humas_berita`
  ADD CONSTRAINT `humas_berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`);

--
-- Constraints for table `humas_lapor`
--
ALTER TABLE `humas_lapor`
  ADD CONSTRAINT `humas_lapor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `keuangan_keluar`
--
ALTER TABLE `keuangan_keluar`
  ADD CONSTRAINT `keuangan_keluar_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`);

--
-- Constraints for table `keuangan_masuk`
--
ALTER TABLE `keuangan_masuk`
  ADD CONSTRAINT `keuangan_masuk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
