-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 05.46
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(9) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `stok` int(9) DEFAULT NULL,
  `harga` int(9) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `foto`, `deskripsi`) VALUES
(1, 'aku', 2, 1, 'aku.jpg', ''),
(3, 'kamu', 4, 3, 'kamu.jpg', ''),
(4, 'kmu', 45, 23, 'kmu.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `nomortelpon` int(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id` int(3) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_obat` int(9) NOT NULL,
  `stock_obat` int(9) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `image_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `harga_obat`, `stock_obat`, `deskripsi`, `image_name`) VALUES
(1, 'sya', 2, 5, 'qweqwe', 'sya.jpeg'),
(2, 'kmu', 6, 2, 'asdasd', 'kmu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reciepes`
--

DROP TABLE IF EXISTS `reciepes`;
CREATE TABLE `reciepes` (
  `id` int(5) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reciepes`
--

INSERT INTO `reciepes` (`id`, `user_id`, `picture`, `status`, `time`) VALUES
(1, 'steven', 'steven_1608006272.jpg', 0, '2020-12-15 11:24:32'),
(2, 'steven', 'steven_1608006479.jpg', 1, '2020-12-15 11:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resepdetail`
--

DROP TABLE IF EXISTS `resepdetail`;
CREATE TABLE `resepdetail` (
  `reciepes_id` int(5) NOT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resepdetail`
--

INSERT INTO `resepdetail` (`reciepes_id`, `message`) VALUES
(2, 'obatnya blabla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(3) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomortelepon` int(9) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_disabled` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `is_disabled`) VALUES
('jere@gmail.com', 'steven', '$2y$10$r4RJHJT.wO04FiCBx128c.7bqdR22r4Ls6Q8eRQwtsnNOBJVCWSaC', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reciepes`
--
ALTER TABLE `reciepes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reciepes`
--
ALTER TABLE `reciepes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
