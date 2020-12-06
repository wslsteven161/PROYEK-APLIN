-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 03:53 PM
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
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `nomortelpon` int(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'asd', 23, 2, 'asdasdada', 'asd.jpg'),
(2, 'asd', 222, 1, 'asdadasd', 'asd.jpg'),
(3, 'asd', 222, 1, 'asdadasd', 'asd.jpg'),
(4, 'asd', 222, 1, 'asdadasd', 'asd.jpg'),
(5, 'asd', 222, 1, 'asdadasd', 'asd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reciepes`
--

CREATE TABLE `reciepes` (
  `id` int(5) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `picture` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reciepes`
--

INSERT INTO `reciepes` (`id`, `user_id`, `picture`) VALUES
(1, '1', '1_1607266222.png');

-- --------------------------------------------------------

--
-- Table structure for table `resepdetail`
--

CREATE TABLE `resepdetail` (
  `reciepes_id` int(5) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(3) NOT NULL DEFAULT 0,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resepdetail`
--

INSERT INTO `resepdetail` (`reciepes_id`, `time`, `status`, `message`) VALUES
(1, '2020-12-06 21:50:22', 1, NULL);

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
('1@mail.com', '1', '$2y$10$A8veSJWZMvfaocpeKcIgn.Alxb9aI4QVlBfPo9V2Qh/Darww3dWf6', 0),
('5', '5', '$2y$10$Xda5mb.WnhL0Df.Z/kCJKuMntBZdakMIUNj0UI2hqi.Sa8MaDQ0r6', 0),
('', '6', '$2y$10$arllNSXs4KDm4X9fU/00qePlJulcbuyWQuW5CEiAE/V0M6JBS/L16', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reciepes`
--
ALTER TABLE `reciepes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
