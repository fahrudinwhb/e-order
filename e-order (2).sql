-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 07:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
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

CREATE TABLE IF NOT EXISTS `kedai` (
`ID_KEDAI` int(11) NOT NULL,
  `ADMIN_KEDAI` char(8) DEFAULT NULL,
  `NAMA_KEDAI` varchar(30) DEFAULT NULL,
  `LOGO_KEDAI` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kedai`
--

INSERT INTO `kedai` (`ID_KEDAI`, `ADMIN_KEDAI`, `NAMA_KEDAI`, `LOGO_KEDAI`) VALUES
(1, 'KD7fe9', 'Makanan', 'assets/img/kedai/69.PNG'),
(2, 'KD583e', 'Minuman', 'assets/img/kedai/AICIRO.jpg'),
(7, 'KD413f', 'Snack', 'assets/img/kedai/Crop-foody-waroeng-batok---jl--veteran-60147-502-636022100654677836.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
`ID_MEJA` int(11) NOT NULL,
  `NOMOR_MEJA` char(8) DEFAULT NULL,
  `STATUS_MEJA` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`ID_MEJA`, `NOMOR_MEJA`, `STATUS_MEJA`) VALUES
(1, 'K1B1', '1'),
(2, 'K2B1', '0'),
(3, 'K3B1', '0'),
(4, 'K4B1', '1'),
(5, 'K5B1', '1'),
(6, 'K6B1', '1'),
(7, 'K7B1', '0'),
(8, 'K8B1', '0'),
(9, 'K1B2', '0'),
(10, 'K2B2', '1'),
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

CREATE TABLE IF NOT EXISTS `menu` (
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
('FD0917', 1, '1', 'Mie Pangsit dan Bakso', 'Pangsit ayam dengan tambahan bakso kenyal', '', 15000, '1', 'assets/img/menu/bakso.jpg'),
('FD0d5f', 1, '1', 'Sosi Bakar', 'Sosi bakar lezat ditambah dengan mayonaise', 'Beli 3 gratis 1', 20000, '1', 'assets/img/menu/sosis.jpg'),
('FD1a7c', 7, '1', 'Kulit Kremes', 'Kulit digoreng hingga kering dan menghasilkan sensasi krenyess', 'Beli 2 Gratis 1', 12000, '1', 'assets/img/menu/kulit.jpg'),
('FD2138', 7, '1', 'Martabak Manis', 'Martabak mnais dengan banyak pilihan toping', 'Gratis tambahan toping', 35000, '2', 'assets/img/menu/martabakmanis.jpg'),
('FD2eb5', 2, '1', 'Es Greentea', 'Es Greentea dengan rasa segar khas greentea', '', 10000, '3', 'assets/img/menu/greentea.jpg'),
('FD5b4c', 1, '1', 'Bubur Ayam', 'Bubur enak dengan suwir ayam yang banyak', '', 18000, '1', 'assets/img/menu/buburayam.jpg'),
('FD657B', 1, '0', 'Kentang Goreng', 'Kentang Goreng ukuran jumbo dengan rasa bermacam-macam', '', 15000, '1', 'assets/img/menu/ketanggoreng.jpg'),
('FD67ac', 2, '1', 'Teh Tarik', 'Teh Tarik rasa original', '', 6000, '3', 'assets/img/menu/tehtarik.jpg'),
('FD6ed8', 1, '1', 'Burger Monster', 'burger dengan ukuran jumbo dan rasa dahsyat', 'Diskon 70%', 16000, '1', 'assets/img/menu/burgerjumbo.png'),
('FD753c', 7, '1', 'Martabak Telor', 'Martabak telor berisi daging sapi dan mayonaise', '', 30000, '2', 'assets/img/menu/martabaktelor.jpg'),
('FD792f', 1, '0', 'puta menu', 'menu yang puta', 'asdwasdwa', 56000, '1', 'assets/img/menu/crop_Apsi PAD_16.jpg'),
('FD7f85', 1, '1', 'Ayam Goreng', 'Enak lezat halal', '', 40000, '1', 'assets/img/menu/ayam.jpg'),
('FDab29', 1, '1', 'Buger Keceng', 'Burger panjang dengan ekstra keju', 'Beli 1 gratis 1', 17000, '1', 'assets/img/menu/burgerkeceng.jpeg'),
('FDbf80', 2, '1', 'Coklat Panas', 'Coklat panas asli', '', 15000, '3', 'assets/img/menu/coklatpanas.jpg'),
('FDce5a', 1, '1', 'Spageti', 'Spageti dengan saus bolognese khas italia,cocok untuk lidah orang indonesia', 'Gratis Topping Keju', 12000, '1', 'assets/img/menu/spagetti.jpg'),
('FDe20d', 2, '1', 'Es Milo Milkshake', 'Es millo milkshake dengan rasa segar', '', 7000, '3', 'assets/img/menu/milkshake.jpg'),
('FDe682', 7, '1', 'Hotdog', 'Hotdog dengan isi daging asap', 'Free tambah saos mayonaise', 15000, '2', 'assets/img/menu/hotdog.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `ID_PEMESANAN` char(8) NOT NULL,
  `ID_MEJA` int(11) DEFAULT NULL,
  `WAKTU_PEMESANAN` datetime DEFAULT NULL,
  `TOTAL_MENU_PESANAN` int(11) DEFAULT NULL,
  `TOTAL_HARGA_PESANAN` int(11) DEFAULT NULL,
  `STATUS_PEMESANAN` varchar(100) DEFAULT 'Belum Di Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `ID_MEJA`, `WAKTU_PEMESANAN`, `TOTAL_MENU_PESANAN`, `TOTAL_HARGA_PESANAN`, `STATUS_PEMESANAN`) VALUES
('M1', 1, '2016-12-21 00:00:00', NULL, NULL, 'Sudah Di Konfirmasi'),
('M2', 2, '2017-01-07 00:00:00', NULL, NULL, 'Selesai'),
('M3', 5, '2017-01-10 22:44:51', 5, 63000, 'Belum Di Konfirmasi'),
('M44', 6, '2017-01-10 23:18:07', 4, 36000, 'Belum Di Konfirmasi'),
('M56', 4, '2017-01-10 22:15:37', NULL, NULL, 'Belum Di Konfirmasi'),
('M60', 3, '2017-01-10 21:59:46', NULL, NULL, 'Belum Di Konfirmasi'),
('M62', 3, '2017-01-10 21:58:32', NULL, NULL, 'Belum Di Konfirmasi'),
('M666', NULL, '2017-01-11 14:51:33', NULL, NULL, 'Belum Di Konfirmasi'),
('M7777', 10, '2017-01-11 14:52:55', 1, 18000, 'Belum Di Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_has_menu`
--

CREATE TABLE IF NOT EXISTS `pemesanan_has_menu` (
  `ID_MENU` char(8) NOT NULL,
  `ID_PEMESANAN` char(8) NOT NULL,
  `JUMLAH_MENU_PESANAN` int(11) NOT NULL,
  `JUMLAH_HARGA_PESANAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_has_menu`
--

INSERT INTO `pemesanan_has_menu` (`ID_MENU`, `ID_PEMESANAN`, `JUMLAH_MENU_PESANAN`, `JUMLAH_HARGA_PESANAN`) VALUES
('FD0917', 'M2', 5, 234567),
('FD0917', 'M3', 2, 30000),
('FD0917', 'M56', 2, 30000),
('FD0d5f', 'M3', 1, 20000),
('FD1a7c', 'M1', 1, 10000),
('FD1a7c', 'M44', 2, 24000),
('FD2eb5', 'M1', 1, 45000),
('FD5b4c', 'M2', 1, 12121),
('FD5b4c', 'M7777', 1, 18000),
('FD657B', 'M1', 1, 10000),
('FD67ac', 'M3', 1, 6000),
('FD67ac', 'M44', 2, 12000),
('FD6ed8', 'M56', 3, 48000),
('FD6ed8', 'M60', 3, 48000),
('FD7f85', 'M1', 2, 12121),
('FDe20d', 'M3', 1, 7000),
('FDe20d', 'M60', 2, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
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
('KD413f', 'AdminKedaiSnack', 'bumiasri', 'assets/img/admin/Crop-hfggj.jpg', 1),
('KD583e', 'AdminKedaiMinuman', 'bumiasri', 'assets/img/admin/admin_aiciro.jpg', 1),
('KD7fe9', 'AdminKedaiMakanan', 'bumiasri', 'assets/img/admin/admin_nasi_goreng_69.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE IF NOT EXISTS `ulasan` (
`ID_ULASAN` int(11) NOT NULL,
  `ID_KEDAI` int(11) DEFAULT NULL,
  `BINTANG` int(11) DEFAULT NULL,
  `ULASAN` varchar(1000) NOT NULL,
  `WAKTU` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`ID_KEDAI`), ADD KEY `ADMIN_KEDAI` (`ADMIN_KEDAI`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`ID_MEJA`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`ID_MENU`), ADD KEY `ID_KEDAI` (`ID_KEDAI`), ADD KEY `KATEGORI` (`KATEGORI`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`ID_PEMESANAN`), ADD KEY `ID_MEJA` (`ID_MEJA`);

--
-- Indexes for table `pemesanan_has_menu`
--
ALTER TABLE `pemesanan_has_menu`
 ADD PRIMARY KEY (`ID_MENU`,`ID_PEMESANAN`), ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
 ADD PRIMARY KEY (`ID_ULASAN`), ADD KEY `ID_KEDAI` (`ID_KEDAI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kedai`
--
ALTER TABLE `kedai`
MODIFY `ID_KEDAI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
MODIFY `ID_MEJA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
MODIFY `ID_ULASAN` int(11) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_MEJA`) REFERENCES `meja` (`ID_MEJA`);

--
-- Constraints for table `pemesanan_has_menu`
--
ALTER TABLE `pemesanan_has_menu`
ADD CONSTRAINT `pemesanan_has_menu_ibfk_1` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`),
ADD CONSTRAINT `pemesanan_has_menu_ibfk_2` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`ID_KEDAI`) REFERENCES `kedai` (`ID_KEDAI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
