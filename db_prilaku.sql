-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2021 pada 14.11
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
(384, '1', '2021-11-06', 'N', ',P1,P2,P3,P4,P5,P7', ',P1,P2,P3,P5,P6,P7', ',P2,P3,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(385, '1', '2021-11-06', 'Ur', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P7', ',P1,P4', ',P1,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(386, '1', '2021-11-06', 'DHNF', ',P1,P2,P3,P6,P7,P9', ',P1,P2,P3,P4,P5,P6,P7', ',P1,P2,P3', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(387, '1', '2021-11-06', 'LUTFIA INDAH PALUPI', ',P1,P2,P3,P4,P5,P7,P9', ',P5', ',P1,P2,P3', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(388, '1', '2021-11-06', 'Zuni', ',P1,P2,P3,P4,P7,P8,P9', ',P1,P2,P7', ',P3', ',P1,P2,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(389, '1', '2021-11-06', 'Widya', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P5,P7', ',P1,P2,P3,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(390, '1', '2021-11-06', 'AFA', ',P1,P2,P4,P5,P9', ',P1,P2,P4,P5', ',P1,P2,P3,P4', ',P1,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(391, '1', '2021-11-06', 'Nahnuriyah ', ',P1,P2,P3,P4,P5,P7,P9', ',P1,P2,P3,P5,P6,P7', ',P1,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(392, '1', '2021-11-06', 'Herti Herliani', ',P1,P2,P3,P4,P5,P7,P8,P9', ',P1,P2,P3,P7', ',P1,P2,P3,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(393, '1', '2021-11-06', 'GG', ',P1,P2,P3,P4,P5,P7,P8,P9', ',P1,P2,P3,P4,P5,P6,P7', ',P2,P3,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(394, '1', '2021-11-06', 'Yet', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P4,P5,P6,P7', ',P1,P2,P3,P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(395, '1', '2021-11-06', 'Bl H', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P4,P5,P6,P7', ',P4', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(396, '1', '2021-11-06', 'Fairuz Fatchiyyah Darajah', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P4,P5,P6,P7', ',P1,P2,P3,P4', ',P2,P3', '99473177322717184', '2021-11-06 13:09:11'),
(397, '1', '2021-11-06', 'Anita', ',P1,P2,P3,P4,P6,P7,P8,P9', ',P1,P2,P6', ',P1,P2', ',P1,P2,P3,P5', '99473177322717184', '2021-11-06 13:09:11'),
(398, '1', '2021-11-06', 'Azzakiy ', ',P1,P2,P3,P5,P6,P7,P8,P9', ',P1,P3,P4', ',P1,P2,P3', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(399, '1', '2021-11-06', 'Moh Amirrulloh', ',P1,P7', ',P1,P2,P4,P6', ',P1,P2,P3,P4', ',P1,P2,P3,P5', '99473177322717184', '2021-11-06 13:09:11'),
(400, '1', '2021-11-06', 'S', ',P1,P2,P3,P6,P7,P8,P9', ',P6,P7', ',P1,P2,P3,P4', ',P1,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(401, '1', '2021-11-06', 'Sakila', ',P1,P2,P3,P4,P5,P6,P7,P9', ',P1,P2,P3,P5,P6,P7', ',P1,P2,P4', ',P1,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(402, '1', '2021-11-06', 'Risqi', ',P1,P2,P3,P4,P6,P7,P8', ',P1,P2,P3', ',P1,P2,P3', ',P1,P2,P3,P5', '99473177322717184', '2021-11-06 13:09:11'),
(403, '1', '2021-11-06', 'Muhammad iqbal Zulfikar', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3,P4,P6', ',P1,P2,P3', ',P1,P2,P3,P4,P5', '99473177322717184', '2021-11-06 13:09:11'),
(404, '1', '2021-11-06', 'Ghiee', ',P1,P2,P3,P4,P5,P6,P7,P8,P9', ',P1,P2,P3', ',P1,P2,P4', ',P1,P3,P5', '99473177322717184', '2021-11-06 13:09:11');

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
-- Struktur dari tabel `tbl_itemset1`
--

CREATE TABLE `tbl_itemset1` (
  `id_proses` int(11) NOT NULL,
  `atribut` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset2`
--

CREATE TABLE `tbl_itemset2` (
  `id_proses` int(11) NOT NULL,
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset3`
--

CREATE TABLE `tbl_itemset3` (
  `id_proses` int(11) NOT NULL,
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `atribut3` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultasi`
--

CREATE TABLE `tbl_konsultasi` (
  `id_konsultasi` varchar(255) NOT NULL,
  `subyek_konsultasi` varchar(255) NOT NULL,
  `params1_konsultasi` text NOT NULL DEFAULT '3',
  `params2_konsultasi` text NOT NULL DEFAULT '3',
  `params3_konsultasi` text NOT NULL DEFAULT '3',
  `params4_konsultasi` text NOT NULL DEFAULT '3',
  `author_konsultasi` varchar(255) NOT NULL,
  `status_konsultasi` int(1) NOT NULL,
  `created_konsultasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_konsultasi`
--

INSERT INTO `tbl_konsultasi` (`id_konsultasi`, `subyek_konsultasi`, `params1_konsultasi`, `params2_konsultasi`, `params3_konsultasi`, `params4_konsultasi`, `author_konsultasi`, `status_konsultasi`, `created_konsultasi`) VALUES
('54700334681569212879', 'Tiara Anggraini Gaib', '1,1,1,1,1,1,1,1,1', '2,2,2,2,2,2,2', '3,4,4,3', '4,4,4,4,4', '850319kcGUjp6TSso54amC3dbqnXYV', 1, '2021-10-28 08:56:06'),
('69246143310897552780', 'Tiara Anggraini Gaib', '1,2,3,4,5,4,3,2,1', '1,2,3,4,5,4,3', '2,1,2,3', '4,5,4,3,2', '850319kcGUjp6TSso54amC3dbqnXYV', 0, '2021-10-28 08:53:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proses_log`
--

CREATE TABLE `tbl_proses_log` (
  `id_proses` int(11) NOT NULL,
  `date_first` date NOT NULL,
  `date_last` date NOT NULL,
  `min_support` varchar(255) NOT NULL,
  `min_confident` varchar(255) NOT NULL,
  `kriteria_proses` int(1) NOT NULL,
  `status_proses` int(1) NOT NULL,
  `author_proses` varchar(255) NOT NULL,
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
-- Indeks untuk tabel `tbl_proses_log`
--
ALTER TABLE `tbl_proses_log`
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
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset_transit`
--
ALTER TABLE `tbl_dataset_transit`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3878;

--
-- AUTO_INCREMENT untuk tabel `tbl_proses_log`
--
ALTER TABLE `tbl_proses_log`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
