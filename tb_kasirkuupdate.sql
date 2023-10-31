-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 06:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_kasirkuupdate`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga_barang` int(250) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tgl_input` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `nama_barang`, `harga_barang`, `kategori`, `tgl_input`) VALUES
(29, 'Coffee1', 'Americano', 10000, 'Coffee', '31 October 2023, 1:16'),
(30, 'Tea1', 'Teh Tawar', 10000, 'Tea', '31 October 2023, 1:59'),
(31, 'Mocktails1', 'Wine Anggur', 100000, 'Mocktails', '31 October 2023, 2:01'),
(32, 'ArtisanCoffe1', 'Kopi Susu Gula Aren', 10000, 'ArtisanCoffee', '31 October 2023, 2:01'),
(33, 'ArtisanTea1', 'Blue Pea Tea', 10000, 'ArtisanTea', '31 October 2023, 2:03'),
(34, 'ArtisanMilkBlend1', 'Choco Malt', 12000, 'ArtisanMilkBlend', '31 October 2023, 2:04');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_cart` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `kembalian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_cart`, `kode_barang`, `nama_barang`, `harga_barang`, `quantity`, `subtotal`, `tgl_input`, `no_transaksi`, `bayar`, `kembalian`) VALUES
(120, 'Coffee1', 'Americano', '10000', '2', '18000', '31 October 2023, 12:07', 'AD311020231207', '50000', '5000'),
(121, 'ArtisanCoffe1', 'Kopi Susu Gula Aren', '10000', '3', '27000', '31 October 2023, 12:07', 'AD311020231207', '50000', '5000'),
(122, 'Coffee1', 'Americano', '10000', '1', '9000', '31 October 2023, 12:08', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangstatus`
--

CREATE TABLE `keranjangstatus` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telpon` int(50) NOT NULL,
  `statusMember` varchar(100) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjangstatus`
--

INSERT INTO `keranjangstatus` (`id`, `nama`, `nomor_telpon`, `statusMember`, `tgl_input`) VALUES
(0, 'Ray Edison', 2147483647, 'Khusus', '31 October 2023, 12:07');

-- --------------------------------------------------------

--
-- Table structure for table `laporanku`
--

CREATE TABLE `laporanku` (
  `id_cart` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `quantity` text NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `kembalian` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `member` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporanku`
--

INSERT INTO `laporanku` (`id_cart`, `kode_barang`, `nama_barang`, `harga_barang`, `quantity`, `subtotal`, `tgl_input`, `no_transaksi`, `bayar`, `kembalian`, `nama`, `member`) VALUES
(113, 'Kopi1', 'Kopi Capucino', '10000', '1', '9000', '30 October 2023, 1:31', 'AD30102023132', '10000', '1000', '', ''),
(114, 'Capucino', 'Kopi Capucino', '10000', '2', '18000', '30 October 2023, 15:09', 'AD301020231510', '20000', '2000', '', ''),
(116, 'BRG004', 'Ayam Goreng', '10000', '1', '9000', '30 October 2023, 22:44', 'AD301020232244', '10000', '1000', '', ''),
(117, 'Coffee1', 'Americano', '10000', '2', '18000', '31 October 2023, 2:07', 'AD31102023207', '20000', '2000', '', ''),
(118, 'ArtisanCoffe1', 'Kopi Susu Gula Aren', '10000', '3', '27000', '31 October 2023, 2:08', 'AD31102023208', '30000', '3000', '', ''),
(119, 'Coffee1', 'Americano', '10000', '3', '27000', '31 October 2023, 11:17', 'AD311020231117', '30000', '3000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporankumember`
--

CREATE TABLE `laporankumember` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telpon` int(50) NOT NULL,
  `statusMember` varchar(100) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporankumember`
--

INSERT INTO `laporankumember` (`id`, `nama`, `nomor_telpon`, `statusMember`, `tgl_input`) VALUES
(3, 'Ray', 123, 'Khusus', '30 October 2023, 1:31'),
(4, 'Ray', 123, 'Khusus', '30 October 2023, 15:07'),
(5, 'Ray Edison', 2147483647, 'Khusus', '30 October 2023, 22:43'),
(6, 'Ray Edison', 2147483647, 'Khusus', '31 October 2023, 2:06'),
(7, 'Salvator', 2147483647, 'Khusus', '31 October 2023, 2:08'),
(8, 'Ray Edison', 2147483647, 'Khusus', '31 October 2023, 11:17');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_toko`, `user`, `pass`, `alamat`, `telp`) VALUES
(1, 'KASIRKU', 'admin', 'admin', 'Metland', '0812');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telpon` varchar(100) NOT NULL,
  `statusMember` varchar(100) NOT NULL,
  `tgl_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `nomor_telpon`, `statusMember`, `tgl_input`) VALUES
(21, 'Ray Edison', '081297739223', 'Khusus', '31 October 2023, 2:04'),
(23, 'Salvator', '012345678901', 'Khusus', '31 October 2023, 2:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `keranjangstatus`
--
ALTER TABLE `keranjangstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporanku`
--
ALTER TABLE `laporanku`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `laporankumember`
--
ALTER TABLE `laporankumember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `laporanku`
--
ALTER TABLE `laporanku`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `laporankumember`
--
ALTER TABLE `laporankumember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
