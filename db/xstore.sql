-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 05:09 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_orang`
--

CREATE TABLE `detail_orang` (
  `mail` varchar(64) COLLATE utf8_bin NOT NULL,
  `depan` varchar(20) COLLATE utf8_bin NOT NULL,
  `belakang` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `detail_orang`
--

INSERT INTO `detail_orang` (`mail`, `depan`, `belakang`) VALUES
('anjay@gmail.com', 'anjay', NULL),
('massive.annas@gmail.com', 'annas', 'Iman');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `nama` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nama`) VALUES
('Flashdisks'),
('Smartphones');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `mail` varchar(64) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`mail`, `pass`) VALUES
('anjay@gmail.com', '202cb962ac59075b964b07152d234b70'),
('massive.annas@gmail.com', '38f629170ac3ab74b9d6d2cc411c2f3c');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id` int(11) NOT NULL,
  `parent` varchar(20) COLLATE utf8_bin NOT NULL,
  `nama` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id`, `parent`, `nama`) VALUES
(1, 'Smartphones', 'Xiaomi'),
(2, 'Smartphones', 'Samsung'),
(3, 'Flashdisks', 'Sandisk'),
(4, 'Flashdisks', 'Kingston');

-- --------------------------------------------------------

--
-- Table structure for table `tproduk`
--

CREATE TABLE `tproduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `harga` decimal(13,0) NOT NULL,
  `gambar` text COLLATE utf8_bin,
  `deskripsi` text COLLATE utf8_bin,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tproduk`
--

INSERT INTO `tproduk` (`id`, `nama`, `harga`, `gambar`, `deskripsi`, `waktu`) VALUES
(1, 'Huawei P20 PRO Smartphone - Twilight [128GB/ RAM 6', '10798999', 'upload/huawei_huawei-p20-pro-smartphone---twilight--128gb--ram-6gb-_full02.jpg', 'OS : Android 8.1 (Oreo)\r\nProsesor : Octa-core (4x2.4 GHz Cortex-A73 & 4x1.8 GHz Cortex-A53)\r\nSim Card : Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nBaterai : Non-removable Li-Po 4000 mAh battery\r\nLayar : 6.1 Inch', '2018-11-21 03:48:08'),
(2, 'Xiaomi Redmi 6 Smartphone - Black [64 GB/ 4 GB/ O]', '2349000', 'upload/xiaomi_xiaomi-redmi-6-smartphone---black--64-gb--4-gb--o-_full02.jpg', 'OS : Android 8.1 (Oreo) Prosesor : Helio P22 Octa-core 2.0 GHz Kamera : Belakang Dual 12 MP (f/2.2, 1.25 m, PDAF) + 5 MP (f/2.2, 1.12 m, no AF, depth sensor) dan kamera depan 5 MP, 1080p Layar : 5.45 Inch Baterai : Non-removable Li-Po 3000 mAh', '2018-11-21 03:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `tspesifikasi`
--

CREATE TABLE `tspesifikasi` (
  `id` int(11) NOT NULL,
  `mProduk` int(11) NOT NULL,
  `poin` varchar(15) COLLATE utf8_bin NOT NULL,
  `detail` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`parent`);

--
-- Indexes for table `tproduk`
--
ALTER TABLE `tproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mProduk` (`mProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tproduk`
--
ALTER TABLE `tproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD CONSTRAINT `detail_orang_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `pengguna` (`mail`);

--
-- Constraints for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `fk` FOREIGN KEY (`parent`) REFERENCES `kategori` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  ADD CONSTRAINT `tspesifikasi_ibfk_1` FOREIGN KEY (`mProduk`) REFERENCES `tproduk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
