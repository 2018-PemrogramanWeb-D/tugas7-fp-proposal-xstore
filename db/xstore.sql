-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 05:09 PM
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
('anjay@gmail.com', 'anjay', NULL);

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
('anjay@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD KEY `mail` (`mail`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`mail`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD CONSTRAINT `detail_orang_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `pengguna` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
