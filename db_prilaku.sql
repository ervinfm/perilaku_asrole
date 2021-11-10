-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2021 pada 07.38
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
(427, '1', '2021-11-07', 'DHNF', 'P1,P1,P2,P3,P6,P7,P9,', 'P1,P2,P3,P4,P5,P6,P7,', 'P1,P2,P3,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(428, '1', '2021-11-07', 'AFA', 'P1,P2,P4,P5,P9,', 'P1,P2,P4,P5,', 'P1,P2,P3,P4,', 'P1,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(429, '1', '2021-11-07', 'Nahnuriyah ', 'P1,P2,P3,P4,P5,P7,P9,', 'P1,P2,P3,P5,P6,P7,', 'P1,P4,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(430, '1', '2021-11-07', 'GG', 'P1,P1,P2,P3,P4,P5,P7,P8,P9,', 'P1,P2,P3,P4,P5,P6,P7,', 'P2,P3,P4,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(431, '1', '2021-11-07', 'Yet', 'P1,P2,P3,P4,P5,P6,P7,P8,P9,', 'P1,P2,P3,P4,P5,P6,P7,', 'P1,P2,P3,P4,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(432, '1', '2021-11-07', 'Fairuz Fatchiyyah Darajah', 'P1,P2,P3,P4,P5,P6,P7,P8,P9,', 'P1,P2,P3,P4,P5,P6,P7,', 'P1,P2,P3,P4,', 'P2,P3,', '99473177322717184', '2021-11-07 09:46:16'),
(433, '1', '2021-11-07', 'Anita', 'P1,P2,P3,P4,P6,P7,P8', 'P1,P2,P6,', 'P1,P2,', 'P1,P2,P3,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(434, '1', '2021-11-07', 'Azzakiy ', 'P1,P2,P3,P5,P6,P7,P8', 'P1,P3,P4,', 'P1,P2,P3,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(435, '1', '2021-11-07', 'Risqi', 'P1,P2,P3,P4,P6,P7,P8,', 'P1,P2,P3,', 'P1,P2,P3,', 'P1,P2,P3,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(436, '1', '2021-11-07', 'Muhammad iqbal Zulfikar', 'P1,P2,P3,P4,P5,P6,P7,P8,P9,', 'P1,P2,P3,P4,P6,', 'P1,P2,P3,', 'P1,P2,P3,P4,P5,', '99473177322717184', '2021-11-07 09:46:16'),
(437, '1', '2021-11-07', 'Ghiee', 'P1,P2,P3,P4,P5,P6,P7,P8,P9,', 'P1,P2,P3,', 'P1,P2,P4,', 'P1,P3,P5,', '99473177322717184', '2021-11-07 09:46:16');

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
  `id_itemset1` int(11) NOT NULL,
  `id_proses` int(9) NOT NULL,
  `atribut` varchar(200) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `lolos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_itemset1`
--

INSERT INTO `tbl_itemset1` (`id_itemset1`, `id_proses`, `atribut`, `jumlah`, `support`, `lolos`) VALUES
(1, 926183405, 'P1', '10', '90.91', '1'),
(2, 926183405, 'P2', '9', '81.82', '1'),
(3, 926183405, 'P3', '11', '100', '1'),
(4, 926183405, 'P4', '7', '63.64', '1'),
(5, 926183405, 'P5', '10', '90.91', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset2`
--

CREATE TABLE `tbl_itemset2` (
  `id_itemset2` int(11) NOT NULL,
  `id_proses` int(9) NOT NULL,
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_itemset2`
--

INSERT INTO `tbl_itemset2` (`id_itemset2`, `id_proses`, `atribut1`, `atribut2`, `jumlah`, `support`, `lolos`) VALUES
(1, 926183405, 'P1', 'P2', 1, 9.0909090909091, 0),
(2, 926183405, 'P1', 'P3', 2, 18.181818181818, 1),
(3, 926183405, 'P1', 'P4', 1, 9.0909090909091, 0),
(4, 926183405, 'P1', 'P5', 2, 18.181818181818, 1),
(5, 926183405, 'P2', 'P3', 1, 9.0909090909091, 0),
(6, 926183405, 'P2', 'P4', 0, 0, 0),
(7, 926183405, 'P2', 'P5', 1, 9.0909090909091, 0),
(8, 926183405, 'P3', 'P4', 1, 9.0909090909091, 0),
(9, 926183405, 'P3', 'P5', 2, 18.181818181818, 1),
(10, 926183405, 'P4', 'P5', 1, 9.0909090909091, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset3`
--

CREATE TABLE `tbl_itemset3` (
  `id_itemset3` int(11) NOT NULL,
  `id_proses` int(9) NOT NULL,
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `atribut3` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `lolos` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_itemset3`
--

INSERT INTO `tbl_itemset3` (`id_itemset3`, `id_proses`, `atribut1`, `atribut2`, `atribut3`, `jumlah`, `support`, `lolos`) VALUES
(1, 926183405, 'P1', 'P3', 'P5', 10, '90.909090909091', 1);

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
  `id_proses` int(9) NOT NULL,
  `date_first` date NOT NULL,
  `date_last` date NOT NULL,
  `min_support` varchar(255) NOT NULL,
  `min_confident` varchar(255) NOT NULL,
  `kriteria_proses` int(1) NOT NULL,
  `status_proses` int(1) NOT NULL,
  `author_proses` varchar(255) NOT NULL,
  `created_proses` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_proses_log`
--

INSERT INTO `tbl_proses_log` (`id_proses`, `date_first`, `date_last`, `min_support`, `min_confident`, `kriteria_proses`, `status_proses`, `author_proses`, `created_proses`) VALUES
(926183405, '2021-11-07', '2021-11-07', '1', '25', 4, 0, '99473177322717184', '2021-11-09 14:55:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sistem`
--

CREATE TABLE `tbl_sistem` (
  `id_sistem` int(11) NOT NULL,
  `nama_sistem` varchar(255) NOT NULL,
  `email_sistem` varchar(255) NOT NULL,
  `pass_email_sistem` varchar(255) NOT NULL,
  `status_sistem` int(1) NOT NULL,
  `logo_sistem` varchar(255) DEFAULT NULL,
  `admin_sistem` varchar(255) NOT NULL,
  `updated_sistem` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sistem`
--

INSERT INTO `tbl_sistem` (`id_sistem`, `nama_sistem`, `email_sistem`, `pass_email_sistem`, `status_sistem`, `logo_sistem`, `admin_sistem`, `updated_sistem`) VALUES
(1, 'Sistem Pemetaan Perilaku Mahasiswa UAD', 'mabes.develover@gmail.com', 'mabes@group17', 1, NULL, '99473177322717184', '2021-11-10 00:22:23');

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
('948057SjkdyNnrsWzPiAUw78b2t4Hc', 'ervin.fikotm@gmail.com', 'Ervin Fikot M', 'user14', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, NULL, '2021-10-20 01:31:43'),
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
-- Indeks untuk tabel `tbl_itemset1`
--
ALTER TABLE `tbl_itemset1`
  ADD PRIMARY KEY (`id_itemset1`);

--
-- Indeks untuk tabel `tbl_itemset2`
--
ALTER TABLE `tbl_itemset2`
  ADD PRIMARY KEY (`id_itemset2`);

--
-- Indeks untuk tabel `tbl_itemset3`
--
ALTER TABLE `tbl_itemset3`
  ADD PRIMARY KEY (`id_itemset3`);

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
-- Indeks untuk tabel `tbl_sistem`
--
ALTER TABLE `tbl_sistem`
  ADD PRIMARY KEY (`id_sistem`);

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
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset_transit`
--
ALTER TABLE `tbl_dataset_transit`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4046;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset1`
--
ALTER TABLE `tbl_itemset1`
  MODIFY `id_itemset1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset2`
--
ALTER TABLE `tbl_itemset2`
  MODIFY `id_itemset2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset3`
--
ALTER TABLE `tbl_itemset3`
  MODIFY `id_itemset3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sistem`
--
ALTER TABLE `tbl_sistem`
  MODIFY `id_sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
