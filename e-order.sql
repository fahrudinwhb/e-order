-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 03:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` char(8) NOT NULL,
  `KATEGORY` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORY`) VALUES
('1', 'Makanan'),
('2', 'Snack'),
('3', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `kedai`
--

CREATE TABLE `kedai` (
  `ID_KEDAI` int(11) NOT NULL,
  `ADMIN_KEDAI` char(8) DEFAULT NULL,
  `NAMA_KEDAI` varchar(30) DEFAULT NULL,
  `LOGO_KEDAI` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kedai`
--

INSERT INTO `kedai` (`ID_KEDAI`, `ADMIN_KEDAI`, `NAMA_KEDAI`, `LOGO_KEDAI`) VALUES
(1, 'KD7fe9', 'Nasi Goreng 69', 'assets/img/kedai/69.PNG'),
(2, 'KD583e', 'AICIRO', 'assets/img/kedai/AICIRO.jpg'),
(4, 'KD583e', 'Buger Buto', 'assets/img/kedai/Crop-logo buto.jpg'),
(6, 'KDd19a', 'Hot Cui Mie', 'assets/img/kedai/Crop-hot-cui-mie-matoz.jpg'),
(7, 'KD413f', 'Waroeng Batok', 'assets/img/kedai/Crop-foody-waroeng-batok---jl--veteran-60147-502-636022100654677836.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `ID_MEJA` int(11) NOT NULL,
  `NOMOR_MEJA` char(8) DEFAULT NULL,
  `STATUS_MEJA` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`ID_MEJA`, `NOMOR_MEJA`, `STATUS_MEJA`) VALUES
(1, 'K1B1', '0'),
(2, 'K2B1', '0'),
(3, 'K3B1', '0'),
(4, 'K4B1', '0'),
(5, 'K5B1', '0'),
(6, 'K6B1', '0'),
(7, 'K7B1', '0'),
(8, 'K8B1', '0'),
(9, 'K1B2', '0'),
(10, 'K2B2', '0'),
(11, 'K3B2', '0'),
(12, 'K4B2', '0'),
(13, 'K5B1', '0'),
(14, 'K6B1', '0'),
(15, 'K7B2', '0'),
(16, 'K8B2', '0'),
(17, 'K1B3', '0'),
(18, 'K2B3', '0'),
(19, 'K3B3', '0'),
(20, 'K4B3', '0'),
(21, 'K5B3', '0'),
(22, 'K6B3', '0'),
(23, 'K7B3', '0'),
(24, 'K8B3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` char(8) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `BARU` char(1) DEFAULT NULL,
  `NAMA_MENU` varchar(50) DEFAULT NULL,
  `DESKRIPSI_MENU` varchar(100) DEFAULT NULL,
  `PROMO` varchar(100) DEFAULT NULL,
  `HARGA_MENU` int(11) DEFAULT NULL,
  `KATEGORI` char(8) DEFAULT NULL,
  `GAMBAR` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `ID_KEDAI`, `BARU`, `NAMA_MENU`, `DESKRIPSI_MENU`, `PROMO`, `HARGA_MENU`, `KATEGORI`, `GAMBAR`) VALUES
('FD040a', 2, '1', 'Tahu Krispi', 'Tahu krispi dengan rasa yang gurih', '', 9000, '2', 'assets/img/menu/Crop-P_20151216_142521.jpg'),
('FD1786', 7, '1', 'Es Jeruk Asli', 'Cocok untuk daerah tropis', '', 4000, '3', 'assets/img/menu/Crop-es-jeruk-tokomesin.jpg'),
('FD1a7c', 2, '1', 'Kulit Kremes', 'Kulit digoreng hingga kering dan menghasilkan sensasi krenyess', '', 12000, '1', 'assets/img/menu/Crop-kulit.jpg'),
('FD223d', 7, '1', 'Nasi Goreng Mawut', 'Manis, Asem, Asin, Rame rasanya', '', 12000, '1', 'assets/img/menu/Crop-Resep-Nasi-Goreng-Mawut-yang-Istimewa-dan-Enak.jpeg'),
('FD289e', 6, '1', 'Capcay', 'Cocok untuk daerah tropis', '', 12000, '1', 'assets/img/menu/Crop-capcay.jpg'),
('FD501e', 7, '1', 'Pizza', 'Manis, Asem, Asin, Rame rasanya', '', 22000, '2', 'assets/img/menu/Peri-Peri-new-3001.png'),
('FD656a', 6, '1', 'Es Jeruk Asli', 'Segar', '', 4000, '3', 'assets/img/menu/Crop-es-jeruk-tokomesin.jpg'),
('FD657B', 1, '0', 'Kentang Goreng', 'Kentang Goreng ukuran jumbo dengan rasa bermacam-macam', NULL, 15000, '2', 'assets/img/menu/kentang.jpg'),
('FD6bf1', 7, '1', 'French Fries', 'Cocok untuk daerah tropis', '', 11000, '2', 'assets/img/menu/Crop-french-fries-1200.jpg'),
('FD6ed8', 2, '1', 'Burger Buto', 'burger dengan ukuran jumbo', 'Diskon 70%', 16000, '1', 'assets/img/menu/Crop-logo buto.jpg'),
('FD72b3', 6, '1', 'Jus Strawberry', 'Cocok untuk daerah tropis', '', 8000, '3', 'assets/img/menu/Crop-jus-strawberry-.jpg'),
('FD7f40', 6, '1', 'Jus Alpukat', 'Cocok untuk daerah tropis', '', 7000, '3', 'assets/img/menu/Crop-jus-alpukat.jpg'),
('FD8008', 6, '1', 'Es Teh', 'Segar', '', 3000, '3', 'assets/img/menu/Crop-es teh batu.jpg'),
('FD8ca4', 6, '1', 'Pizza', 'Cocok untuk daerah tropis', '', 22000, '2', 'assets/img/menu/Crop-4791207-9790062099-Pizza1.jpg'),
('FD9b1c', 6, '1', 'Cui Mie Spesial', 'Cocok untuk makan siang', '', 12000, '1', 'assets/img/menu/Crop-cuimie spesial.JPG'),
('FD9e9a', 2, '1', 'Black Menu', 'Mantap Jiwa', '', 12000, '2', 'assets/img/menu/Crop-fff.png'),
('FDab29', 2, '1', 'Buger Keceng', 'Burger panjang dengan ekstra keju', 'Beli 1 gratis 1', 17000, '1', 'assets/img/menu/Crop-1328056271475.jpeg'),
('FDb278', 7, '1', 'Es Teh', 'Segar', '', 3000, '3', 'assets/img/menu/Crop-es teh batu.jpg'),
('FDc4c3', 7, '1', 'Nasi Goreng Jawa', 'Manis, Asem, Asin, Rame rasanya', '', 12000, '1', 'assets/img/menu/Crop-Resep-Nasi-Goreng-jawa.jpg'),
('FDce5a', 2, '1', 'Spageti', 'Spageti dengan saus bolognese khas italia,cocok untuk lidah orang indonesia', NULL, 12000, '2', 'assets/img/menu/Crop-Resep-Spesial-Spageti-Saus-Kornet-Sapi-Nikmat.jpg'),
('FDe741', 6, '1', 'Mie Aceh', 'Makanan Khas Aceh sejak 1932', '', 17000, '1', 'assets/img/menu/Crop-resep-mie-aceh.jpg'),
('FDee4a', 6, '1', 'Kwetiau Goreng', 'Gurih, cocok untuk daerah tropis', '', 15000, '1', 'assets/img/menu/Crop-kwetiau-goreng-seafood-pedas.jpg'),
('FDf247', 6, '1', 'French Fries', 'Cocok untuk daerah tropis', '', 11000, '2', 'assets/img/menu/Crop-french-fries-1200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` int(11) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `ID_MENU` char(8) DEFAULT NULL,
  `ID_MEJA` int(11) DEFAULT NULL,
  `WAKTU_PEMESANAN` datetime DEFAULT NULL,
  `JUMLAH_PESANAN` int(11) DEFAULT NULL,
  `TOTAL_HARGA` int(11) DEFAULT NULL,
  `STATUS_PEMESANAN` varchar(100) DEFAULT 'Belum Di Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `ID_KEDAI`, `ID_MENU`, `ID_MEJA`, `WAKTU_PEMESANAN`, `JUMLAH_PESANAN`, `TOTAL_HARGA`, `STATUS_PEMESANAN`) VALUES
(2, 2, 'FD6ed8', 1, '2016-12-14 00:00:00', 4, 50000, 'Selesai'),
(3, 2, 'FDce5a', 3, '2016-12-07 00:00:00', 1, 25000, 'Selesai'),
(4, 4, 'FDab29', 1, '2016-12-14 00:00:00', 2, 40000, 'Selesai'),
(6, 2, 'FD6ed8', 2, '2016-12-04 20:14:25', 2, 32000, 'Selesai'),
(7, 2, 'FD6ed8', 1, '2016-12-04 20:25:12', 1, 16000, 'Selesai'),
(8, 2, 'FD6ed8', 1, '2016-12-04 20:29:49', 2, 32000, 'Selesai'),
(9, 2, 'FD6ed8', 2, '2016-12-04 20:32:35', 2, 32000, 'Selesai'),
(10, 2, 'FD6ed8', 1, '2016-12-04 20:38:46', 1, 16000, 'Selesai'),
(12, 2, 'FD6ed8', 1, '2016-12-04 21:32:23', 1, 16000, 'Selesai'),
(13, 2, 'FD1a7c', 1, '2016-12-04 22:13:34', 1, 12000, 'Selesai'),
(14, 6, 'FD289e', 6, '2016-12-04 22:18:31', 1, 12000, 'Belum Di Konfirmasi'),
(15, 2, 'FD6ed8', 6, '2016-12-04 22:18:31', 1, 16000, 'Selesai'),
(16, 2, 'FD1a7c', 7, '2016-12-04 22:21:16', 1, 12000, 'Selesai'),
(17, 1, 'FD657B', 7, '2016-12-04 22:21:16', 1, 15000, 'Belum Di Konfirmasi'),
(18, 1, 'FD657B', 7, '2016-12-04 22:29:33', 2, 30000, 'Belum Di Konfirmasi'),
(19, 2, 'FD1a7c', 1, '2016-12-04 22:46:56', 2, 24000, 'Selesai'),
(20, 6, 'FD289e', 2, '2016-12-04 22:50:15', 1, 12000, 'Belum Di Konfirmasi'),
(21, 1, 'FD657B', 2, '2016-12-04 22:55:58', 2, 30000, 'Belum Di Konfirmasi'),
(22, 7, 'FD223d', 6, '2016-12-04 22:58:02', 2, 24000, 'Belum Di Konfirmasi'),
(23, 2, 'FD1a7c', 9, '2016-12-05 00:58:21', 2, 24000, 'Selesai'),
(25, 2, 'FDab29', 8, '2016-12-05 01:26:56', 2, 34000, 'Selesai'),
(26, 2, 'FD6ed8', 1, '2016-12-05 08:39:48', 1, 16000, 'Selesai'),
(27, 2, 'FD6ed8', 3, '2016-12-05 08:42:54', 4, 64000, 'Selesai'),
(28, 1, 'FD657B', 6, '2016-12-05 08:44:11', 8, 120000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` char(8) NOT NULL,
  `NAMA_PENGGUNA` varchar(100) DEFAULT NULL,
  `PASSWORD` char(8) DEFAULT NULL,
  `GAMBAR` varchar(1000) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `PASSWORD`, `GAMBAR`, `STATUS`) VALUES
('admin', 'admin', 'bumiasri', 'assets/img/admin/admin.jpg', 0),
('KD413f', 'AdminWaroengBatok', '123456', 'assets/img/admin/Crop-hfggj.jpg', 1),
('KD583e', 'adminAiciro', 'bumiasri', 'assets/img/admin/admin_aiciro.jpg', 1),
('KD7fe9', 'adminNasiGoreng69', 'bumiasri', 'assets/img/admin/admin_nasi_goreng_69.jpg', 1),
('KDd19a', 'AdminHotCuiMie', '123456', 'assets/img/admin/Crop-Crop-sepeda.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ID_ULASAN` int(11) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `BINTANG` int(11) DEFAULT NULL,
  `ULASAN` varchar(1000) NOT NULL,
  `WAKTU` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ID_ULASAN`, `ID_KEDAI`, `BINTANG`, `ULASAN`, `WAKTU`) VALUES
(1, 2, 4, 'Layanan bagus,makanan enak', '2016-12-08 00:00:00'),
(2, 2, 2, 'Pelayanan judes nih', '2016-12-04 00:00:00'),
(3, 2, 4, 'Mantap Jiwa', '2016-12-04 20:28:04'),
(4, 2, 3, '', '2016-12-04 22:16:37'),
(5, 6, 3, 'koko', '2016-12-04 22:20:09'),
(6, 2, 3, 'lolol', '2016-12-04 22:20:09'),
(7, 2, 5, 'Nasgor terbaik', '2016-12-04 22:21:48'),
(8, 1, 5, 'Aku suka aiciro', '2016-12-04 22:21:48'),
(9, 6, 3, 'good', '2016-12-04 22:54:50'),
(10, 1, NULL, '', '2016-12-04 22:56:03'),
(11, 2, 3, 'hhh', '2016-12-05 01:18:26'),
(12, 2, 3, 'kk', '2016-12-05 01:27:05'),
(13, 2, 5, 'Waaah Enak', '2016-12-05 08:41:41'),
(14, 2, 5, 'Keren', '2016-12-05 08:43:06'),
(15, 1, 5, 'xzcxczxcxc', '2016-12-05 08:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kedai`
--
ALTER TABLE `kedai`
  ADD PRIMARY KEY (`ID_KEDAI`),
  ADD KEY `ADMIN_KEDAI` (`ADMIN_KEDAI`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`ID_MEJA`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`),
  ADD KEY `ID_KEDAI` (`ID_KEDAI`),
  ADD KEY `KATEGORI` (`KATEGORI`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `ID_MENU` (`ID_MENU`),
  ADD KEY `ID_MEJA` (`ID_MEJA`),
  ADD KEY `ID_KEDAI` (`ID_KEDAI`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ID_ULASAN`),
  ADD KEY `ID_KEDAI` (`ID_KEDAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kedai`
--
ALTER TABLE `kedai`
  MODIFY `ID_KEDAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `ID_MEJA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PEMESANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ID_ULASAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kedai`
--
ALTER TABLE `kedai`
  ADD CONSTRAINT `kedai_ibfk_1` FOREIGN KEY (`ADMIN_KEDAI`) REFERENCES `pengguna` (`ID_PENGGUNA`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_MEJA`) REFERENCES `meja` (`ID_MEJA`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
