-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2018 pada 06.39
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

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
-- Struktur dari tabel `detail_orang`
--

CREATE TABLE `detail_orang` (
  `mail` varchar(64) COLLATE utf8_bin NOT NULL,
  `depan` varchar(20) COLLATE utf8_bin NOT NULL,
  `belakang` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `detail_orang`
--

INSERT INTO `detail_orang` (`mail`, `depan`, `belakang`) VALUES
('anjay@gmail.com', 'anjay', NULL),
('ivan@gmail.com', 'RM Ivan', 'Indra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `nama` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`nama`) VALUES
('Flashdisks'),
('Smartphones');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `mail` varchar(64) COLLATE utf8_bin NOT NULL,
  `pass` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`mail`, `pass`) VALUES
('anjay@gmail.com', '202cb962ac59075b964b07152d234b70'),
('ivan@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `id` int(11) NOT NULL,
  `parent` varchar(20) COLLATE utf8_bin NOT NULL,
  `nama` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id`, `parent`, `nama`) VALUES
(1, 'Smartphones', 'Xiaomi'),
(2, 'Smartphones', 'Samsung'),
(3, 'Flashdisks', 'Sandisk'),
(4, 'Flashdisks', 'Kingston');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tproduk`
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
-- Dumping data untuk tabel `tproduk`
--

INSERT INTO `tproduk` (`id`, `nama`, `harga`, `gambar`, `deskripsi`, `waktu`) VALUES
(1, 'Huawei P20 PRO Smartphone - Twilight [128GB/ RAM 6', '10798999', 'upload/huawei_huawei-p20-pro-smartphone---twilight--128gb--ram-6gb-_full02.jpg', 'OS : Android 8.1 (Oreo)\r\nProsesor : Octa-core (4x2.4 GHz Cortex-A73 & 4x1.8 GHz Cortex-A53)\r\nSim Card : Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nBaterai : Non-removable Li-Po 4000 mAh battery\r\nLayar : 6.1 Inch', '2018-11-21 03:48:08'),
(2, 'Xiaomi Redmi 6 Smartphone - Black [64 GB/ 4 GB/ O]', '2349000', 'upload/xiaomi_xiaomi-redmi-6-smartphone---black--64-gb--4-gb--o-_full02.jpg', 'OS : Android 8.1 (Oreo) Prosesor : Helio P22 Octa-core 2.0 GHz Kamera : Belakang Dual 12 MP (f/2.2, 1.25 m, PDAF) + 5 MP (f/2.2, 1.12 m, no AF, depth sensor) dan kamera depan 5 MP, 1080p Layar : 5.45 Inch Baterai : Non-removable Li-Po 3000 mAh', '2018-11-21 03:57:05'),
(3, 'Toshiba Flashdisk Transmemory Hayabusa Putih 16GB', '54500', 'upload/toshiba-flashdisk-16gb-7854-46754563-2a3b0b0acce92833e1400e4a06d9699c-catalog_233.jpg', 'Kapasitas : 16GB', '2018-11-27 17:14:30'),
(4, 'Sandisk Flashdisk Cruzer Blade CZ50 16GB', '45200', 'upload/861106982e715c52d5345219e3548034.jpg', '', '2018-11-27 17:15:32'),
(5, 'Adata Ultra USB 3.0 100MB/s Flashdisk 8GB C008', '26700', 'upload/pendrive-adata-8gb-c008.jpg', '', '2018-11-27 17:17:18'),
(6, 'Universal Flash disk 8GB Transcend New Model JF340', '32600', 'upload/transcend-otg-flashdisk-jf340-8gb.jpg', '', '2018-11-27 17:19:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tspesifikasi`
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
-- Indeks untuk tabel `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD PRIMARY KEY (`mail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`mail`);

--
-- Indeks untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`parent`);

--
-- Indeks untuk tabel `tproduk`
--
ALTER TABLE `tproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mProduk` (`mProduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tproduk`
--
ALTER TABLE `tproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_orang`
--
ALTER TABLE `detail_orang`
  ADD CONSTRAINT `detail_orang_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `pengguna` (`mail`);

--
-- Ketidakleluasaan untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `fk` FOREIGN KEY (`parent`) REFERENCES `kategori` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tspesifikasi`
--
ALTER TABLE `tspesifikasi`
  ADD CONSTRAINT `tspesifikasi_ibfk_1` FOREIGN KEY (`mProduk`) REFERENCES `tproduk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
