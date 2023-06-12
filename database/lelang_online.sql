-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_awal` float NOT NULL,
  `deskripsi_barang` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `foto`, `nama_barang`, `stok_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`, `created_at`, `updated_at`) VALUES
(9, 'jYJZhEmBOlPx4GlqEfG58EMfk9VbGAcBt1RoLOTM.jpg', 'Iphone 12 pro', '0', '2023-03-30', 10000, 'test', '2023-03-30 07:22:37', '2023-03-30 07:29:13'),
(10, 'd4p8lxz2i5lZQJCf9e9XrB0tghUQ06sktPeFcVhz.jpg', 'Kacamata Oakley', '9', '2023-03-30', 100000, 'barang bagus sangat baguslaj', '2023-03-30 14:11:16', '2023-03-30 14:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(20) DEFAULT NULL,
  `tgl_lelang` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `stok_lelang` varchar(20) NOT NULL,
  `harga_akhir` float DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_petugas` int(20) DEFAULT NULL,
  `status` enum('dibuka','ditutup','selesai') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `tgl_akhir`, `stok_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`, `created_at`, `updated_at`) VALUES
(6, 9, '2023-03-30 13:23:00', '2023-03-31 09:23:00', '1', 20000, 29, NULL, 'selesai', '2023-03-30 07:23:52', '2023-03-30 13:39:52'),
(10, 10, '2023-03-31 14:11:00', '2023-04-01 14:11:00', '1', NULL, NULL, NULL, 'dibuka', '2023-03-30 14:11:52', '2023-03-30 14:12:53');

--
-- Triggers `tb_lelang`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `tb_lelang` FOR EACH ROW UPDATE tb_barang SET stok_barang = stok_barang - NEW.stok_lelang WHERE id_barang =NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('Administrator','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(28, 'ananda dina nur fatihah', 'ananda', '$2y$10$vymIQJKJes0vvVJS3eYWgeZSs3ObN/7F7USiJoRHXbY8VW3A.cHHm', '089575763112'),
(29, 'rudi hermawan', 'rudi salim', '$2y$10$ixhUDK.WbZcAfQmaKmFdA.rFdaJQBak7JrXodt15z0ueAVtH0/Lca', '0895384133157');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penawaran`
--

INSERT INTO `tb_penawaran` (`id_penawaran`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 3, 7, 29, 120000),
(2, 2, 8, 29, 20000),
(3, 1, 7, 29, 300000),
(4, 5, 8, 29, 12000),
(5, 6, 9, 29, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_level` int(20) DEFAULT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `id_level`, `nama_petugas`, `username`, `password`) VALUES
(3, 1, 'admin', 'admin', '$2y$10$.jOhimQmGvf1WV96BFlgKehs4kC1LpaLbpPfGwV5WM/h7.obe8Kby'),
(5, 2, 'ananda dina nur fatihah', 'ananda', '$2y$10$kf1ysEt79OBW4A77egNKXOSamkJPoKJNOaNvRvBUlHm8cxe.R.CQO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_lelang` (`id_lelang`,`id_barang`,`id_user`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_lelang` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
