-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2021 pada 11.14
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prilaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dataset`
--

CREATE TABLE `tbl_dataset` (
  `id_dataset` int(11) NOT NULL,
  `itemset_dataset` varchar(255) NOT NULL,
  `datetime_dataset` date NOT NULL,
  `subyek_dataset` varchar(255) NOT NULL,
  `params1_dataset` text NOT NULL,
  `params2_dataset` text NOT NULL,
  `params3_dataset` text NOT NULL,
  `params4_dataset` text NOT NULL,
  `author_dataset` varchar(255) NOT NULL,
  `created_dataset` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dataset`
--

INSERT INTO `tbl_dataset` (`id_dataset`, `itemset_dataset`, `datetime_dataset`, `subyek_dataset`, `params1_dataset`, `params2_dataset`, `params3_dataset`, `params4_dataset`, `author_dataset`, `created_dataset`) VALUES
(186, '1', '2021-10-26', 'C', '5,5,1,4,4,2,2,2,5', '5,4,3,1,1,4,4', '3,2,3,3', '1,1,1,3,1', '99473177322717184', '2021-10-26 12:58:17'),
(187, '1', '2021-10-26', 'N', '5,5,1,5,5,2,4,3,3', '5,5,5,2,1,5,5', '3,4,4,4', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(188, '1', '2021-10-26', 'SARITA SEPTIA ALDITA PUTRI', '5,5,1,5,5,2,5,5,5', '5,1,2,2,1,2,2', '2,2,3,2', '1,1,1,2,1', '99473177322717184', '2021-10-26 12:58:17'),
(189, '1', '2021-10-26', 'Liv', '5,5,1,3,2,4,5,3,3', '4,2,3,3,3,4,4', '2,3,2,3', '1,1,1,2,1', '99473177322717184', '2021-10-26 12:58:17'),
(190, '1', '2021-10-26', 'Ur', '5,5,1,5,5,4,5,5,4', '1,1,1,2,3,3,5', '5,3,3,4', '1,3,1,4,1', '99473177322717184', '2021-10-26 12:58:17'),
(191, '1', '2021-10-26', 'DHNF', '5,5,1,3,2,4,5,3,5', '5,5,5,5,5,5,5', '4,1,5,2', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(192, '1', '2021-10-26', 'LUTFIA INDAH PALUPI', '5,5,1,4,4,3,4,3,5', '2,2,3,2,4,2,3', '4,4,4,3', '1,1,5,1,4', '99473177322717184', '2021-10-26 12:58:17'),
(193, '1', '2021-10-26', 'Zuni', '5,5,1,5,3,3,5,4,5', '5,5,3,3,3,3,4', '3,3,4,3', '1,1,2,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(194, '1', '2021-10-26', 'Widya', '5,5,1,5,5,5,5,5,5', '5,5,5,2,1,3,5', '1,5,5,5', '5,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(195, '1', '2021-10-26', 'AFA', '5,5,2,5,5,3,3,3,5', '5,5,3,5,5,3,3', '4,4,4,4', '1,2,1,5,1', '99473177322717184', '2021-10-26 12:58:17'),
(196, '1', '2021-10-26', 'Nahnuriyah ', '5,5,1,5,1,3,5,3,5', '5,4,5,2,5,4,4', '5,2,2,5', '1,1,1,5,1', '99473177322717184', '2021-10-26 12:58:17'),
(197, '1', '2021-10-26', 'Rafiq', '5,5,1,5,5,3,5,5,5', '4,3,3,3,4,4,5', '3,2,3,3', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(198, '1', '2021-10-26', 'Herti Herliani', '5,5,1,4,5,3,5,5,5', '5,5,4,3,3,3,4', '1,4,5,1', '1,1,1,5,1', '99473177322717184', '2021-10-26 12:58:17'),
(199, '1', '2021-10-26', 'GG', '5,5,1,5,4,2,5,5,5', '5,5,5,5,5,5,5', '3,4,5,1', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(200, '1', '2021-10-26', 'Yet', '5,5,1,5,5,5,5,5,5', '5,5,5,5,1,5,5', '1,1,5,1', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(201, '1', '2021-10-26', 'Bl H', '5,5,1,4,4,5,5,5,5', '5,5,5,5,5,5,5', '3,2,2,1', '4,1,1,1,1', '99473177322717184', '2021-10-26 12:58:17'),
(202, '1', '2021-10-26', 'Fairuz Fatchiyyah Darajah', '5,5,1,4,4,5,5,4,5', '5,4,5,4,4,5,4', '1,4,4,4', '2,1,1,2,2', '99473177322717184', '2021-10-26 12:58:17'),
(203, '1', '2021-10-26', 'Anita', '5,5,1,5,3,5,5,5,5', '4,4,3,3,2,4,3', '1,1,3,3', '1,1,1,3,1', '99473177322717184', '2021-10-26 12:58:17'),
(233, '1', '2021-10-26', 'IA', '5,5,1,4,5,5,5,5,5', '4,4,2,1,1,2,2', '1,2,3,2', '3,3,1,3,3', '99473177322717184', '2021-10-26 12:58:17'),
(243, '1', '2021-10-26', 'RAL', '5,5,1,5,5,4,5,5,5', '5,4,2,5,4,1,3', '3,3,3,2', '1,1,3,5,1', '99473177322717184', '2021-10-26 12:58:18'),
(253, '1', '2021-10-26', 'AM', '5,5,1,4,5,5,5,5,5', '4,4,4,3,5,3,5', '5,5,2,2', '2,2,1,2,5', '99473177322717184', '2021-10-26 12:58:18'),
(257, '1', '2021-10-26', 'Zuhra NF', '5,5,1,3,5,3,5,2,5', '5,4,4,2,2,4,5', '1,2,4,1', '5,1,1,2,2', '99473177322717184', '2021-10-26 12:58:18'),
(273, '1', '2021-10-26', 'Ade', '5,5,5,5,5,5,5,5,5', '5,5,5,5,5,5,5', '2,2,2,3', '1,1,1,1,1', '99473177322717184', '2021-10-26 12:58:18'),
(278, '1', '2021-10-26', 'Fina Delvia Nuroniyah ', '5,5,1,5,4,4,4,4,5', '5,4,5,3,5,4,3', '1,1,3,1', '1,1,4,3,1', '99473177322717184', '2021-10-26 12:58:18'),
(282, '1', '2021-10-26', 'Aulia Jannah', '5,3,1,5,5,2,3,3,3', '2,2,1,2,5,5,3', '1,1,5,1', '4,3,5,4,1', '99473177322717184', '2021-10-26 12:58:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dataset_transit`
--

CREATE TABLE `tbl_dataset_transit` (
  `id_dataset` int(11) NOT NULL,
  `datetime_dataset` date DEFAULT NULL,
  `subyek_dataset` varchar(255) NOT NULL,
  `params1_dataset` text NOT NULL,
  `params2_dataset` text NOT NULL,
  `params3_dataset` text NOT NULL,
  `params4_dataset` text NOT NULL,
  `author_dataset` varchar(255) NOT NULL,
  `created_dataset` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultasi`
--

CREATE TABLE `tbl_konsultasi` (
  `id_konsultasi` varchar(255) NOT NULL,
  `subyek_konsultasi` varchar(255) NOT NULL,
  `params1_konsultasi` text NOT NULL,
  `params2_konsultasi` text NOT NULL,
  `params3_konsultasi` text NOT NULL,
  `params4_konsultasi` text NOT NULL,
  `author_konsultasi` varchar(255) NOT NULL,
  `created_konsultasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proses`
--

CREATE TABLE `tbl_proses` (
  `id_proses` int(11) NOT NULL,
  `date_first` date NOT NULL,
  `date_last` date NOT NULL,
  `min_support` varchar(10) NOT NULL,
  `min_confident` varchar(10) NOT NULL,
  `status_proses` int(1) NOT NULL DEFAULT 0,
  `created_proses` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `level_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL,
  `image_user` varchar(255) DEFAULT NULL,
  `created_user` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email_user`, `nama_user`, `username_user`, `password_user`, `level_user`, `status_user`, `image_user`, `created_user`) VALUES
('819765yh2Do0pCF61jQTK5a3vxMrw7', 'riccoyhandy12@gmail.com', 'Ricco Yhandy Fenando', 'user1', '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, NULL, '2021-10-22 05:50:47'),
('850319kcGUjp6TSso54amC3dbqnXYV', 'tiaraanggrainig15@gmail.com', 'Tiara Anggraini Gaib', 'tiara', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, NULL, '2021-10-22 07:56:07'),
('948057SjkdyNnrsWzPiAUw78b2t4Hc', 'ervin.fikotm@gmail.com', 'Ervin Fikot M', 'user14', '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, NULL, '2021-10-20 01:31:43'),
('99473177322717184', 'ervinfm14@gmail.com', 'Tiara Anggraini Gaib', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 'user-24ENf6vMmsjiLdBAHYO8WgyeDKXkQa.jpg', '2021-10-13 05:29:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indeks untuk tabel `tbl_dataset_transit`
--
ALTER TABLE `tbl_dataset_transit`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indeks untuk tabel `tbl_konsultasi`
--
ALTER TABLE `tbl_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `tbl_proses`
--
ALTER TABLE `tbl_proses`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`),
  ADD UNIQUE KEY `username_user` (`username_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset_transit`
--
ALTER TABLE `tbl_dataset_transit`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3583;

--
-- AUTO_INCREMENT untuk tabel `tbl_proses`
--
ALTER TABLE `tbl_proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
