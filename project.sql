-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 05:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(9) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `stok` int(9) DEFAULT NULL,
  `harga` int(9) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `foto`, `deskripsi`) VALUES
(1, 'Kursi Roda', 1, 428000, 'Kursi Roda.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `nomortelpon` int(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `jalan`, `nomortelpon`, `foto`) VALUES
(3, '', 'Jalan Malang selatan', 12345678, '.jpg'),
(4, '', 'Jalan Surabaya', 123456789, '.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(3) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_obat` int(9) NOT NULL,
  `stock_obat` int(9) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `image_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `harga_obat`, `stock_obat`, `deskripsi`, `image_name`) VALUES
(1, 'Bodreksin', 15000, 8, 'Obat penurun demam', 'Bodreksin.png'),
(2, 'Panadol', 19000, 9, 'Obat Anti demam', 'Panadol.png');

-- --------------------------------------------------------

--
-- Table structure for table `reciepes`
--

CREATE TABLE `reciepes` (
  `id` int(5) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reciepes`
--

INSERT INTO `reciepes` (`id`, `user_id`, `picture`, `status`, `time`) VALUES
(1, '1', '1_1608008065.png', 0, '2020-12-15 11:54:25'),
(2, '1', '1_1608008075.png', 0, '2020-12-15 11:54:35'),
(3, '3', '3_1608008214.png', 1, '2020-12-15 11:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `resepdetail`
--

CREATE TABLE `resepdetail` (
  `reciepes_id` int(5) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resepdetail`
--

INSERT INTO `resepdetail` (`reciepes_id`, `message`) VALUES
(3, 'Contoh 1'),
(3, 'Contoh 2');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(3) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomortelepon` int(9) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `nomortelepon`, `alamat`) VALUES
(3, 'Jaragon', 123456789, 'Jalan Jaragon Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_disabled` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `is_disabled`) VALUES
('1@mail.com', '1', '$2y$10$r6HfyarVcjr5oZUWRufuNeHOa8Tqw7j2G2c.YEu75E/VyUl05DyJi', 0),
('2@mail.com', '2', '$2y$10$45LsP8PTgBvzAAxRJ6k/P.vBuJkHkUSc5LKXmM.ZLNcKXOrvCDkf.', 1),
('3@mail.com', '3', '$2y$10$I76fYenyF3dxKkLBpTF5FednJE29fNwOIOUooXMSyuL9NbXLzepWC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciepes`
--
ALTER TABLE `reciepes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reciepes`
--
ALTER TABLE `reciepes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
