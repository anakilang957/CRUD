-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 13.34
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `idbuku` int(255) NOT NULL,
  `judul` text NOT NULL,
  `pengarang` text NOT NULL,
  `tahunterbit` text NOT NULL,
  `Isbn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`idbuku`, `judul`, `pengarang`, `tahunterbit`, `Isbn`) VALUES
(1, 'ada apa', 'sisi', '2001', 1211),
(789, 'jjq1', 'uyiioop', '4567890', 456789),
(1212, 'dwdw', 'asacd', '2131', 23123323),
(23456, 'tyjukil', 'hfjghjk', '46578', 54678),
(24356, 'sytuyf', 'hgfjk', '564765', 568),
(213456, 'weqrwet', 'aSDF', '1232', 34567),
(354678, 'ghhjkl', 'fhghgjkl', '5768', 56),
(466789, '45767', 'ffjhkjkl', 'chkjk', 0),
(12314253, 'dsfdg', 'dfsdg', '2324', 232456);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idbuku`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `idbuku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
