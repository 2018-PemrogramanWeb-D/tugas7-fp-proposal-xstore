-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 03:33 AM
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
  `belakang` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `detail_orang`
--

INSERT INTO `detail_orang` (`mail`, `depan`, `belakang`, `admin`) VALUES
('andri@yahoo.com', 'Andri', 'Gunawan', 0),
('anjay@gmail.com', 'Admin', NULL, 1),
('ivan@gmail.com', 'RM Ivan', 'Indra', 0),
('ivan@yahoo.com', 'Ivan', 'Indra', 0),
('krisna@gmail.com', 'Krisna', 'Black', 0);

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
('andri@yahoo.com', '202cb962ac59075b964b07152d234b70'),
('anjay@gmail.com', '202cb962ac59075b964b07152d234b70'),
('ivan@gmail.com', '202cb962ac59075b964b07152d234b70'),
('ivan@yahoo.com', '202cb962ac59075b964b07152d234b70'),
('krisna@gmail.com', '202cb962ac59075b964b07152d234b70');

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
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `id` int(11) NOT NULL,
  `subkategori` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tkategori`
--

INSERT INTO `tkategori` (`id`, `subkategori`, `parent`) VALUES
(1, 'flashdisk', 0),
(2, 'sandisk', 1),
(3, 'kingston', 1),
(4, 'transcend', 1);

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
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kategori` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tproduk`
--

INSERT INTO `tproduk` (`id`, `nama`, `harga`, `gambar`, `deskripsi`, `waktu`, `kategori`) VALUES
(3, 'Kingston Flashdisk Transmemory Hayabusa Putih 16GB', '54500', 'upload/toshiba-flashdisk-16gb-7854-46754563-2a3b0b0acce92833e1400e4a06d9699c-catalog_233.jpg', 'Kapasitas : 16GB', '2018-12-20 02:31:33', 3),
(4, 'Sandisk Flashdisk Cruzer Blade CZ50 16GB', '45200', 'upload/861106982e715c52d5345219e3548034.jpg', '', '2018-12-20 02:31:36', 2),
(5, 'Kingston Ultra USB 3.0 100MB/s Flashdisk 8GB C008', '26700', 'upload/pendrive-adata-8gb-c008.jpg', '', '2018-12-20 02:32:04', 3),
(6, 'Universal Flashdisk 8GB Transcend New Model JF340', '32600', 'upload/transcend-otg-flashdisk-jf340-8gb.jpg', '', '2018-12-20 02:32:12', 4),
(7, 'Transcend Adata New Universal Flashdisk C008 1TB', '20000', 'upload/pendrive-adata-8gb-c008.jpg', '8 GB', '2018-12-20 02:32:23', 4),
(8, 'Sandisk Xpand X16ZY Super Ultra Lighting Port 16GB', '126000', 'upload/sandiskxpand.jpg', NULL, '2018-12-20 02:32:51', 2),
(11, 'Sandisk Flashdisk Cruzer Blade CZ50A 32GB', '85500', 'upload/861106982e715c52d5345219e3548034.jpg', '', '2018-12-20 02:32:55', 2),
(12, 'Universal Kingston Ultra Superr Flashdisk 128GB', '70000', 'upload/IMG_20181218_224840_scaled.jpg', '16GB', '2018-12-20 02:33:04', 3),
(13, 'Transcend JetFlash+++ 780 MLC USB 3.0 128GB', '1250000', 'upload/IMG_20181218_224854_scaled.jpg', '', '2018-12-20 02:33:09', 4);

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
-- Indexes for table `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tproduk`
--
ALTER TABLE `tproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
