-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 00.31
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
(448, '1', '2021-11-11', 'AFA', 'P1,P2,P4,P5,P9,', 'P1,P2,P4,P5,', 'P1,P2,P3,P4,', 'P4,', '99473177322717184', '2021-11-11 11:18:09'),
(449, '1', '2021-11-11', 'Nahnuriyah ', 'P1,P2,P4,P7,P9,', 'P1,P2,P3,P5,P6,P7,', 'P1,P4,', 'P4,', '99473177322717184', '2021-11-11 11:18:09'),
(450, '1', '2021-11-11', 'Azzakiy ', 'P1,P2,P5,P6,P7,P8,P9,', 'P1,P3,P4,', 'P3,', 'P4,', '99473177322717184', '2021-11-11 11:18:09');

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
  `id_proses` varchar(255) NOT NULL,
  `atribut` varchar(200) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `lolos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_itemset1`
--

INSERT INTO `tbl_itemset1` (`id_itemset1`, `id_proses`, `atribut`, `jumlah`, `support`, `lolos`) VALUES
(125, '956243780', 'P1', '3', '100', '1'),
(126, '956243780', 'P2', '3', '100', '1'),
(127, '956243780', 'P4', '2', '66.67', '1'),
(128, '956243780', 'P5', '2', '66.67', '1'),
(129, '956243780', 'P6', '1', '33.33', '0'),
(130, '956243780', 'P7', '2', '66.67', '1'),
(131, '956243780', 'P8', '1', '33.33', '0'),
(132, '956243780', 'P9', '3', '100', '1'),
(140, '246971380', 'P1', '3', '100', '1'),
(141, '246971380', 'P2', '3', '100', '1'),
(142, '246971380', 'P4', '2', '66.67', '1'),
(143, '246971380', 'P5', '2', '66.67', '1'),
(144, '246971380', 'P6', '1', '33.33', '0'),
(145, '246971380', 'P7', '2', '66.67', '1'),
(146, '246971380', 'P8', '1', '33.33', '0'),
(147, '246971380', 'P9', '3', '100', '1'),
(148, '310549826', 'P1', '3', '100', '1'),
(149, '310549826', 'P2', '3', '100', '1'),
(150, '310549826', 'P4', '2', '66.67', '1'),
(151, '310549826', 'P5', '2', '66.67', '1'),
(152, '310549826', 'P6', '1', '33.33', '0'),
(153, '310549826', 'P7', '2', '66.67', '1'),
(154, '310549826', 'P8', '1', '33.33', '0'),
(155, '310549826', 'P9', '3', '100', '1'),
(156, '863590142', 'P1', '3', '100', '1'),
(157, '863590142', 'P2', '3', '100', '1'),
(158, '863590142', 'P4', '2', '66.67', '1'),
(159, '863590142', 'P5', '2', '66.67', '1'),
(160, '863590142', 'P6', '1', '33.33', '0'),
(161, '863590142', 'P7', '2', '66.67', '1'),
(162, '863590142', 'P8', '1', '33.33', '0'),
(163, '863590142', 'P9', '3', '100', '1'),
(199, '6391528704', 'P1', '4', '80', '1'),
(200, '6391528704', 'P2', '4', '80', '1'),
(201, '6391528704', 'P3', '2', '40', '1'),
(202, '6391528704', 'P5', '4', '80', '1'),
(203, '9108245673', 'P1', '4', '80', '1'),
(204, '9108245673', 'P2', '4', '80', '1'),
(205, '9108245673', 'P3', '2', '40', '1'),
(206, '9108245673', 'P5', '4', '80', '1'),
(207, '4906382571', 'P1', '4', '80', '1'),
(208, '4906382571', 'P2', '4', '80', '1'),
(209, '4906382571', 'P3', '4', '80', '1'),
(210, '4906382571', 'P4', '4', '80', '1'),
(211, '4906382571', 'P5', '4', '80', '1'),
(212, '8756932410', 'P1', '1', '20', '0'),
(213, '8756932410', 'P2', '1', '20', '0'),
(214, '8756932410', 'P3', '2', '40', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset2`
--

CREATE TABLE `tbl_itemset2` (
  `id_itemset2` int(11) NOT NULL,
  `id_proses` varchar(100) NOT NULL,
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
(164, '956243780', 'P1', 'P2', 2, 66.666666666667, 1),
(165, '956243780', 'P1', 'P4', 1, 33.333333333333, 0),
(166, '956243780', 'P1', 'P5', 2, 66.666666666667, 1),
(167, '956243780', 'P1', 'P7', 2, 66.666666666667, 1),
(168, '956243780', 'P1', 'P9', 2, 66.666666666667, 1),
(169, '956243780', 'P2', 'P4', 1, 33.333333333333, 0),
(170, '956243780', 'P2', 'P5', 2, 66.666666666667, 1),
(171, '956243780', 'P2', 'P7', 2, 66.666666666667, 1),
(172, '956243780', 'P2', 'P9', 2, 66.666666666667, 1),
(173, '956243780', 'P4', 'P5', 1, 33.333333333333, 0),
(174, '956243780', 'P4', 'P7', 1, 33.333333333333, 0),
(175, '956243780', 'P4', 'P9', 1, 33.333333333333, 0),
(176, '956243780', 'P5', 'P7', 2, 66.666666666667, 1),
(177, '956243780', 'P5', 'P9', 2, 66.666666666667, 1),
(178, '956243780', 'P7', 'P9', 2, 66.666666666667, 1),
(189, '246971380', 'P1', 'P2', 2, 66.666666666667, 1),
(190, '246971380', 'P1', 'P4', 1, 33.333333333333, 0),
(191, '246971380', 'P1', 'P5', 2, 66.666666666667, 1),
(192, '246971380', 'P1', 'P7', 2, 66.666666666667, 1),
(193, '246971380', 'P1', 'P9', 2, 66.666666666667, 1),
(194, '246971380', 'P2', 'P4', 1, 33.333333333333, 0),
(195, '246971380', 'P2', 'P5', 2, 66.666666666667, 1),
(196, '246971380', 'P2', 'P7', 2, 66.666666666667, 1),
(197, '246971380', 'P2', 'P9', 2, 66.666666666667, 1),
(198, '246971380', 'P4', 'P5', 1, 33.333333333333, 0),
(199, '246971380', 'P4', 'P7', 1, 33.333333333333, 0),
(200, '246971380', 'P4', 'P9', 1, 33.333333333333, 0),
(201, '246971380', 'P5', 'P7', 2, 66.666666666667, 1),
(202, '246971380', 'P5', 'P9', 2, 66.666666666667, 1),
(203, '246971380', 'P7', 'P9', 2, 66.666666666667, 1),
(204, '310549826', 'P1', 'P2', 2, 66.666666666667, 1),
(205, '310549826', 'P1', 'P4', 1, 33.333333333333, 0),
(206, '310549826', 'P1', 'P5', 2, 66.666666666667, 1),
(207, '310549826', 'P1', 'P7', 2, 66.666666666667, 1),
(208, '310549826', 'P1', 'P9', 2, 66.666666666667, 1),
(209, '310549826', 'P2', 'P4', 1, 33.333333333333, 0),
(210, '310549826', 'P2', 'P5', 2, 66.666666666667, 1),
(211, '310549826', 'P2', 'P7', 2, 66.666666666667, 1),
(212, '310549826', 'P2', 'P9', 2, 66.666666666667, 1),
(213, '310549826', 'P4', 'P5', 1, 33.333333333333, 0),
(214, '310549826', 'P4', 'P7', 1, 33.333333333333, 0),
(215, '310549826', 'P4', 'P9', 1, 33.333333333333, 0),
(216, '310549826', 'P5', 'P7', 2, 66.666666666667, 1),
(217, '310549826', 'P5', 'P9', 2, 66.666666666667, 1),
(218, '310549826', 'P7', 'P9', 2, 66.666666666667, 1),
(219, '863590142', 'P1', 'P2', 2, 66.666666666667, 1),
(220, '863590142', 'P1', 'P4', 1, 33.333333333333, 0),
(221, '863590142', 'P1', 'P5', 2, 66.666666666667, 1),
(222, '863590142', 'P1', 'P7', 2, 66.666666666667, 1),
(223, '863590142', 'P1', 'P9', 2, 66.666666666667, 1),
(224, '863590142', 'P2', 'P4', 1, 33.333333333333, 0),
(225, '863590142', 'P2', 'P5', 2, 66.666666666667, 1),
(226, '863590142', 'P2', 'P7', 2, 66.666666666667, 1),
(227, '863590142', 'P2', 'P9', 2, 66.666666666667, 1),
(228, '863590142', 'P4', 'P5', 1, 33.333333333333, 0),
(229, '863590142', 'P4', 'P7', 1, 33.333333333333, 0),
(230, '863590142', 'P4', 'P9', 1, 33.333333333333, 0),
(231, '863590142', 'P5', 'P7', 2, 66.666666666667, 1),
(232, '863590142', 'P5', 'P9', 2, 66.666666666667, 1),
(233, '863590142', 'P7', 'P9', 2, 66.666666666667, 1),
(250, '9108245673', 'P1', 'P2', 3, 75, 1),
(251, '9108245673', 'P1', 'P3', 1, 25, 0),
(252, '9108245673', 'P1', 'P5', 3, 75, 1),
(253, '9108245673', 'P2', 'P3', 1, 25, 0),
(254, '9108245673', 'P2', 'P5', 3, 75, 1),
(255, '9108245673', 'P3', 'P5', 1, 25, 0),
(256, '4906382571', 'P1', 'P2', 4, 100, 1),
(257, '4906382571', 'P1', 'P3', 4, 100, 1),
(258, '4906382571', 'P1', 'P4', 4, 100, 1),
(259, '4906382571', 'P1', 'P5', 4, 100, 1),
(260, '4906382571', 'P2', 'P3', 4, 100, 1),
(261, '4906382571', 'P2', 'P4', 4, 100, 1),
(262, '4906382571', 'P2', 'P5', 4, 100, 1),
(263, '4906382571', 'P3', 'P4', 4, 100, 1),
(264, '4906382571', 'P3', 'P5', 4, 100, 1),
(265, '4906382571', 'P4', 'P5', 4, 100, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset3`
--

CREATE TABLE `tbl_itemset3` (
  `id_itemset3` int(11) NOT NULL,
  `id_proses` varchar(100) NOT NULL,
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
(45, '956243780', 'P1', 'P2', 'P7', 2, '66.666666666667', 1),
(46, '956243780', 'P1', 'P5', 'P7', 1, '33.333333333333', 0),
(47, '956243780', 'P1', 'P7', 'P9', 2, '66.666666666667', 1),
(48, '956243780', 'P2', 'P5', 'P7', 1, '33.333333333333', 0),
(49, '956243780', 'P2', 'P7', 'P9', 2, '66.666666666667', 1),
(50, '956243780', 'P5', 'P7', 'P9', 1, '33.333333333333', 0),
(52, '246971380', 'P1', 'P2', 'P7', 2, '66.666666666667', 1),
(53, '246971380', 'P1', 'P5', 'P7', 1, '33.333333333333', 0),
(54, '246971380', 'P1', 'P7', 'P9', 2, '66.666666666667', 1),
(55, '246971380', 'P2', 'P5', 'P7', 1, '33.333333333333', 0),
(56, '246971380', 'P2', 'P7', 'P9', 2, '66.666666666667', 1),
(57, '246971380', 'P5', 'P7', 'P9', 1, '33.333333333333', 0),
(58, '310549826', 'P1', 'P2', 'P7', 2, '66.666666666667', 1),
(59, '310549826', 'P1', 'P5', 'P7', 1, '33.333333333333', 0),
(60, '310549826', 'P1', 'P7', 'P9', 2, '66.666666666667', 1),
(61, '310549826', 'P2', 'P5', 'P7', 1, '33.333333333333', 0),
(62, '310549826', 'P2', 'P7', 'P9', 2, '66.666666666667', 1),
(63, '310549826', 'P5', 'P7', 'P9', 1, '33.333333333333', 0),
(64, '863590142', 'P1', 'P2', 'P7', 2, '66.666666666667', 1),
(65, '863590142', 'P1', 'P5', 'P7', 1, '33.333333333333', 0),
(66, '863590142', 'P1', 'P7', 'P9', 2, '66.666666666667', 1),
(67, '863590142', 'P2', 'P5', 'P7', 1, '33.333333333333', 0),
(68, '863590142', 'P2', 'P7', 'P9', 2, '66.666666666667', 1),
(69, '863590142', 'P5', 'P7', 'P9', 1, '33.333333333333', 0),
(89, '9108245673', 'P1', 'P2', 'P3', 1, '25', 0),
(90, '9108245673', 'P1', 'P3', 'P5', 1, '25', 0),
(91, '9108245673', 'P2', 'P3', 'P5', 1, '25', 0),
(92, '4906382571', 'P1', 'P2', 'P4', 4, '100', 1),
(93, '4906382571', 'P1', 'P3', 'P4', 4, '100', 1),
(94, '4906382571', 'P1', 'P4', 'P5', 4, '100', 1),
(95, '4906382571', 'P2', 'P3', 'P4', 4, '100', 1),
(96, '4906382571', 'P2', 'P4', 'P5', 4, '100', 1),
(97, '4906382571', 'P3', 'P4', 'P5', 4, '100', 1);

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
('23068165807479594321', 'Tiara Anggraini', 'P1,P2,P5', 'P1,P2,P5', 'P1,P2,P3,P5', 'P3', '819765yh2Do0pCF61jQTK5a3vxMrw7', 0, '2021-11-15 17:50:30'),
('45730041997265138268', 'Tiara Anggraini', 'P1,P2,P5', 'P1,P2,P5', 'P1,P2,P3,P5', 'P3', '819765yh2Do0pCF61jQTK5a3vxMrw7', 0, '2021-11-15 17:49:14'),
('81095760732825694134', 'Tiara Anggraini', 'P1,P2,P3,P4,P5', 'P1,P2,P3,P4,P5', 'P1,P2,P3,P4,P5', 'P1,P2,P3,P4,P5', '819765yh2Do0pCF61jQTK5a3vxMrw7', 0, '2021-11-16 01:16:50'),
('96205174593470123688', 'Tiara Anggraini', 'P1', 'P2', 'P3', 'P4', '819765yh2Do0pCF61jQTK5a3vxMrw7', 0, '2021-11-16 03:14:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultasi_hasil`
--

CREATE TABLE `tbl_konsultasi_hasil` (
  `id_proses_hasil` int(11) NOT NULL,
  `id_proses` varchar(100) NOT NULL,
  `kombinasi1` varchar(255) DEFAULT NULL,
  `kombinasi2` varchar(255) DEFAULT NULL,
  `support_xUy` double DEFAULT NULL,
  `support_x` double DEFAULT NULL,
  `confidence` double DEFAULT NULL,
  `jumlah_a` int(11) DEFAULT NULL,
  `jumlah_b` int(11) DEFAULT NULL,
  `jumlah_ab` int(11) DEFAULT NULL,
  `px` double DEFAULT NULL,
  `py` double DEFAULT NULL,
  `pxuy` double DEFAULT NULL,
  `uji_lift` double DEFAULT NULL,
  `aturan_korelasi` varchar(255) NOT NULL,
  `iterasi` int(11) DEFAULT NULL COMMENT 'dari itemset 2/3',
  `lolos_proses_hasil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konsultasi_hasil`
--

INSERT INTO `tbl_konsultasi_hasil` (`id_proses_hasil`, `id_proses`, `kombinasi1`, `kombinasi2`, `support_xUy`, `support_x`, `confidence`, `jumlah_a`, `jumlah_b`, `jumlah_ab`, `px`, `py`, `pxuy`, `uji_lift`, `aturan_korelasi`, `iterasi`, `lolos_proses_hasil`) VALUES
(36, '4906382571', 'P1,P5', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(35, '4906382571', 'P5,P4', 'P1', 5, 4, 80, 5, 5, 1, 1.25, 0.25, 0.25, 0.8, 'Korelasi Negatif', 3, 1),
(34, '4906382571', 'P1,P4', 'P5', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(33, '4906382571', 'P1,P4', 'P3', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(32, '4906382571', 'P4,P3', 'P1', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(31, '4906382571', 'P1,P3', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(30, '4906382571', 'P1,P4', 'P2', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(29, '4906382571', 'P4,P2', 'P1', 5, 4, 80, 5, 5, 1, 1.25, 0.25, 0.25, 0.8, 'Korelasi Negatif', 3, 1),
(28, '4906382571', 'P1,P2', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(27, '9108245673', 'P2,P5', 'P3', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(26, '9108245673', 'P5,P3', 'P2', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(25, '9108245673', 'P2,P3', 'P5', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(24, '9108245673', 'P1,P5', 'P3', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(23, '9108245673', 'P5,P3', 'P1', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(22, '9108245673', 'P1,P3', 'P5', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(21, '9108245673', 'P1,P3', 'P2', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(20, '9108245673', 'P3,P2', 'P1', 5, 2, 40, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(19, '9108245673', 'P1,P2', 'P3', 5, 4, 80, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(37, '4906382571', 'P2,P3', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(38, '4906382571', 'P4,P3', 'P2', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(39, '4906382571', 'P2,P4', 'P3', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(40, '4906382571', 'P2,P4', 'P5', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(41, '4906382571', 'P5,P4', 'P2', 5, 4, 80, 5, 5, 1, 1.25, 0.25, 0.25, 0.8, 'Korelasi Negatif', 3, 1),
(42, '4906382571', 'P2,P5', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(43, '4906382571', 'P3,P4', 'P5', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1),
(44, '4906382571', 'P5,P4', 'P3', 5, 4, 80, 5, 5, 1, 1.25, 0.25, 0.25, 0.8, 'Korelasi Negatif', 3, 1),
(45, '4906382571', 'P3,P5', 'P4', 8, 4, 50, 1, 1, 1, 0.25, 0.25, 0.25, 4, 'Korelasi Positif', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultasi_log`
--

CREATE TABLE `tbl_konsultasi_log` (
  `id_proses` varchar(255) NOT NULL,
  `id_konsultasi` varchar(255) NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confident` int(11) NOT NULL,
  `author_proses` varchar(255) NOT NULL,
  `status_proses` int(11) NOT NULL,
  `created_proses` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_konsultasi_log`
--

INSERT INTO `tbl_konsultasi_log` (`id_proses`, `id_konsultasi`, `min_support`, `min_confident`, `author_proses`, `status_proses`, `created_proses`) VALUES
('4906382571', '81095760732825694134', 1, 25, '819765yh2Do0pCF61jQTK5a3vxMrw7', 1, '2021-11-16 01:16:50'),
('8756932410', '96205174593470123688', 1, 25, '819765yh2Do0pCF61jQTK5a3vxMrw7', 1, '2021-11-16 03:14:33'),
('9108245673', '23068165807479594321', 1, 25, '819765yh2Do0pCF61jQTK5a3vxMrw7', 1, '2021-11-15 17:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proses_hasil`
--

CREATE TABLE `tbl_proses_hasil` (
  `id_proses_hasil` int(11) NOT NULL,
  `id_proses` int(11) NOT NULL,
  `kombinasi1` varchar(255) DEFAULT NULL,
  `kombinasi2` varchar(255) DEFAULT NULL,
  `support_xUy` double DEFAULT NULL,
  `support_x` double DEFAULT NULL,
  `confidence` double DEFAULT NULL,
  `jumlah_a` int(11) DEFAULT NULL,
  `jumlah_b` int(11) DEFAULT NULL,
  `jumlah_ab` int(11) DEFAULT NULL,
  `px` double DEFAULT NULL,
  `py` double DEFAULT NULL,
  `pxuy` double DEFAULT NULL,
  `uji_lift` double DEFAULT NULL,
  `aturan_korelasi` varchar(255) NOT NULL,
  `iterasi` int(11) DEFAULT NULL COMMENT 'dari itemset 2/3',
  `lolos_proses_hasil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_proses_hasil`
--

INSERT INTO `tbl_proses_hasil` (`id_proses_hasil`, `id_proses`, `kombinasi1`, `kombinasi2`, `support_xUy`, `support_x`, `confidence`, `jumlah_a`, `jumlah_b`, `jumlah_ab`, `px`, `py`, `pxuy`, `uji_lift`, `aturan_korelasi`, `iterasi`, `lolos_proses_hasil`) VALUES
(26, 956243780, 'P9,P7', 'P2', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(27, 956243780, 'P2,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(25, 956243780, 'P2,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(24, 956243780, 'P1,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(23, 956243780, 'P9,P7', 'P1', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(22, 956243780, 'P1,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(21, 956243780, 'P1,P7', 'P2', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(20, 956243780, 'P7,P2', 'P1', 5, 2, 40, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 0),
(19, 956243780, 'P1,P2', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(38, 246971380, 'P9,P7', 'P1', 5, 3, 60, 2, 2, 1, 0.22222222222222, 0.11111111111111, 0.33333333333333, 13.5, 'Korelasi Positif', 3, 1),
(37, 246971380, 'P1,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(36, 246971380, 'P1,P7', 'P2', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(35, 246971380, 'P7,P2', 'P1', 5, 2, 40, 2, 2, 1, 0.22222222222222, 0.11111111111111, 0.33333333333333, 13.5, 'Korelasi Positif', 3, 0),
(34, 246971380, 'P1,P2', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(39, 246971380, 'P1,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(40, 246971380, 'P2,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(41, 246971380, 'P9,P7', 'P2', 5, 3, 60, 2, 2, 1, 0.22222222222222, 0.11111111111111, 0.33333333333333, 13.5, 'Korelasi Positif', 3, 1),
(42, 246971380, 'P2,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(43, 310549826, 'P1,P2', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(44, 310549826, 'P7,P2', 'P1', 5, 2, 40, 3, 3, 1, 0.33333333333333, 0.11111111111111, 0.33333333333333, 9, 'Korelasi Positif', 3, 0),
(45, 310549826, 'P1,P7', 'P2', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(46, 310549826, 'P1,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(47, 310549826, 'P9,P7', 'P1', 5, 3, 60, 3, 3, 1, 0.33333333333333, 0.11111111111111, 0.33333333333333, 9, 'Korelasi Positif', 3, 1),
(48, 310549826, 'P1,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(49, 310549826, 'P2,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(50, 310549826, 'P9,P7', 'P2', 5, 3, 60, 3, 3, 1, 0.33333333333333, 0.11111111111111, 0.33333333333333, 9, 'Korelasi Positif', 3, 1),
(51, 310549826, 'P2,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(52, 863590142, 'P1,P2', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(53, 863590142, 'P7,P2', 'P1', 5, 2, 40, 4, 4, 1, 0.44444444444444, 0.11111111111111, 0.33333333333333, 6.75, 'Korelasi Positif', 3, 0),
(54, 863590142, 'P1,P7', 'P2', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(55, 863590142, 'P1,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(56, 863590142, 'P9,P7', 'P1', 5, 3, 60, 4, 4, 1, 0.44444444444444, 0.11111111111111, 0.33333333333333, 6.75, 'Korelasi Positif', 3, 1),
(57, 863590142, 'P1,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(58, 863590142, 'P2,P7', 'P9', 5, 3, 60, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1),
(59, 863590142, 'P9,P7', 'P2', 5, 3, 60, 4, 4, 1, 0.44444444444444, 0.11111111111111, 0.33333333333333, 6.75, 'Korelasi Positif', 3, 1),
(60, 863590142, 'P2,P9', 'P7', 4, 3, 75, 1, 1, 1, 0.11111111111111, 0.11111111111111, 0.33333333333333, 27, 'Korelasi Positif', 3, 1);

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
(246971380, '2021-11-01', '2021-11-13', '1', '40', 1, 1, '99473177322717184', '2021-11-12 17:49:18'),
(310549826, '2021-11-01', '2021-11-13', '1', '40', 1, 1, '948057SjkdyNnrsWzPiAUw78b2t4Hc', '2021-11-12 17:56:18'),
(863590142, '2021-11-01', '2021-11-14', '1', '50', 1, 1, '99473177322717184', '2021-11-14 12:19:14'),
(956243780, '2021-11-01', '2021-11-12', '1', '60', 1, 1, '99473177322717184', '2021-11-12 17:46:11');

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
(1, 'Sistem Pemetaan Perilaku Mahasiswa Universitas Ahmad Dahlan', 'mabes.develover@gmail.com', 'mabes@group17', 1, NULL, '99473177322717184', '2021-11-14 07:47:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `id_prodi` varchar(100) DEFAULT NULL,
  `id_fakultas` varchar(100) DEFAULT NULL,
  `email_user` varchar(255) NOT NULL,
  `nim_user` varchar(100) DEFAULT NULL,
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

INSERT INTO `tbl_user` (`id_user`, `id_prodi`, `id_fakultas`, `email_user`, `nim_user`, `nama_user`, `username_user`, `password_user`, `level_user`, `status_user`, `image_user`, `created_user`) VALUES
('819765yh2Do0pCF61jQTK5a3vxMrw7', NULL, NULL, 'riccoyhandy12@gmail.com', NULL, 'Tiara Anggraini', 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, NULL, '2021-10-22 05:50:47'),
('872594mwrOfNe29L8gzRqDStoP1kCH', '55201', '009', 'ervin.fikotm@gmail.com', '1700018127', 'Ervin Fikot M', 'user1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, NULL, '2021-11-23 23:07:42'),
('948057SjkdyNnrsWzPiAUw78b2t4Hc', NULL, NULL, 'user@gmail.com', NULL, 'Ervin Fikot M', 'user14', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, NULL, '2021-10-20 01:31:43'),
('99473177322717184', NULL, NULL, 'ervinfm14@gmail.com', NULL, 'Tiara Anggraini Gaib', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 'user-JCgGbja9n0zAQUHP1M6lyxNIswVt5X.png', '2021-10-13 05:29:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `id_user_log` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `target_user_log` varchar(255) DEFAULT NULL,
  `device_user_log` varchar(255) NOT NULL,
  `created_user_log` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_log`
--

INSERT INTO `tbl_user_log` (`id_user_log`, `id_user`, `target_user_log`, `device_user_log`, `created_user_log`) VALUES
(1, '99473177322717184', 'admin/dataset/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:34:37'),
(2, '99473177322717184', 'admin/dataset/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:34:52'),
(3, '948057SjkdyNnrsWzPiAUw78b2t4Hc', 'admin/setting/proses', 'Windows 10 | Firefox | 127.0.0.1', '2021-11-10 17:53:07'),
(4, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:54:43'),
(5, '99473177322717184', 'admin/apriori/hasil/617082539', 'Windows 10 | Chrome | ::1', '2021-11-10 17:54:43'),
(6, '99473177322717184', 'admin/apriori/reset_proses/617082539', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:02'),
(7, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:17'),
(8, '99473177322717184', 'admin/apriori/hasil/081576249', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:17'),
(9, '99473177322717184', 'admin/apriori/reset_proses/81576249', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:38'),
(10, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:57'),
(11, '99473177322717184', 'admin/apriori/hasil/458291037', 'Windows 10 | Chrome | ::1', '2021-11-10 17:55:57'),
(12, '99473177322717184', 'admin/apriori/reset_proses/458291037', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:13'),
(13, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:28'),
(14, '99473177322717184', 'admin/apriori/hasil/348509167', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:28'),
(15, '99473177322717184', 'admin/apriori/reset_proses/348509167', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:37'),
(16, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:48'),
(17, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-10 17:56:49'),
(18, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-10 18:17:26'),
(19, '99473177322717184', 'admin/dataset/reset_dataset', 'Windows 10 | Chrome | ::1', '2021-11-10 18:27:01'),
(20, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-10 18:27:03'),
(21, '99473177322717184', 'admin/setting/proses', 'Windows 10 | Chrome | ::1', '2021-11-10 18:28:20'),
(22, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:02:32'),
(23, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:06:39'),
(24, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:07:06'),
(25, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:07:29'),
(26, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:07:35'),
(27, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:07:57'),
(28, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:08:40'),
(29, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:15:43'),
(30, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:16:27'),
(31, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:16:50'),
(32, '99473177322717184', 'admin/apriori/hasil/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:17:14'),
(33, '99473177322717184', 'admin/apriori/reset_proses/584639210', 'Windows 10 | Chrome | ::1', '2021-11-11 11:17:40'),
(34, '99473177322717184', 'admin/dataset/upload', 'Windows 10 | Chrome | ::1', '2021-11-11 11:17:57'),
(35, '99473177322717184', 'admin/dataset/cleaning', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:02'),
(36, '99473177322717184', 'admin/dataset/reduction', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:06'),
(37, '99473177322717184', 'admin/dataset/submit', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:09'),
(38, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:29'),
(39, '99473177322717184', 'admin/apriori/hasil/498751306', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:29'),
(40, '99473177322717184', 'admin/apriori/reset_proses/498751306', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:37'),
(41, '99473177322717184', 'admin/apriori/proses', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:50'),
(42, '99473177322717184', 'admin/apriori/hasil/134280695', 'Windows 10 | Chrome | ::1', '2021-11-11 11:18:50'),
(43, '99473177322717184', 'admin/apriori/hasil/134280695', 'Windows 10 | Chrome | ::1', '2021-11-11 11:19:22'),
(44, '99473177322717184', 'admin/apriori/hasil/134280695', 'Windows 10 | Chrome | ::1', '2021-11-11 11:19:43'),
(45, '99473177322717184', 'admin/apriori/hasil/134280695', 'Windows 10 | Chrome | ::1', '2021-11-11 11:20:02'),
(46, '99473177322717184', 'admin/apriori/hasil/134280695', 'Windows 10 | Chrome | ::1', '2021-11-11 11:46:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `created_fakultas` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`, `created_fakultas`) VALUES
('001', 'Fakultas Agama Islam', '2021-11-23 20:23:00'),
('002', 'Fakultas Ekonomi dan Bisnis', '2021-11-23 20:23:00'),
('003', 'Fakultas Hukum', '2021-11-23 20:23:00'),
('004', 'Fakultas Psikolgi', '2021-11-23 20:23:00'),
('005', 'Fakultas Farmasi', '2021-11-23 20:23:00'),
('006', 'Fakultas Kedokteran', '2021-11-23 20:23:00'),
('007', 'Fakultas Kesehatan Masyarakat', '2021-11-23 20:23:00'),
('008', 'Fakultas Keguruan dan Ilmu Pendidikan', '2021-11-23 20:23:00'),
('009', 'Fakultas Teknologi Industri', '2021-11-23 20:21:33'),
('010', 'Fakultas Sastra Budaya dan Komunikasi', '2021-11-23 20:23:28'),
('011', 'Fakultas Sains dan Teknologi Terapan', '2021-11-23 20:23:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(50) NOT NULL,
  `id_fakultas` varchar(50) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_prodi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`, `created_prodi`) VALUES
('11201', '006', 'Kedokteran', '2021-11-23 22:39:32'),
('13201', '007', 'Kesehatan Masyarakat', '2021-11-23 22:41:49'),
('13211', '007', 'Gizi', '2021-11-23 22:42:26'),
('20201', '009', 'Teknik Elektro', '2021-11-23 20:56:44'),
('24201', '009', 'Teknik Kimia', '2021-11-23 22:48:18'),
('26201', '009', 'Teknik Industri', '2021-11-23 22:47:52'),
('41221', '009', 'Teknologi Pangan', '2021-11-23 22:48:32'),
('44201', '011', 'Matematika', '2021-11-23 22:59:42'),
('45201', '011', 'Fisika', '2021-11-23 22:58:54'),
('46201', '011', 'Biologi', '2021-11-23 22:59:10'),
('48101', '005', 'Farmasi', '2021-11-23 22:38:12'),
('55201', '009', 'Teknik Informatika', '2021-11-23 20:21:14'),
('57201', '011', 'Sistem Informasi\r\n', '2021-11-23 20:27:06'),
('60201', '002', 'Ekonomi Pembangunan', '2021-11-23 22:31:29'),
('61101', '002', 'Manajemen', '2021-11-23 22:25:32'),
('61206', '001', 'Perbankan Syari\'ah', '2021-11-23 22:22:11'),
('62201', '002', 'Akuntansi', '2021-11-23 22:29:44'),
('70201', '010', 'Ilmu Komunikasi', '2021-11-23 22:52:49'),
('70234', '001', 'Pendidikan Agama Islam', '2021-11-23 22:21:44'),
('73201', '004', 'Psikologi', '2021-11-23 22:35:21'),
('74201', '003', 'Ilmu Hukum', '2021-11-23 22:34:59'),
('76231', '001', 'Ilmu Hadis', '2021-11-23 22:33:01'),
('79201', '010', 'Sastra Indonesia', '2021-11-23 22:51:53'),
('79202', '010', 'Sastra Inggris', '2021-11-23 22:52:09'),
('79203', '001', 'Bahasa dan Sastra Arab', '2021-11-23 20:27:06'),
('84202', '008', 'Pendidikan Matematika', '2021-11-23 22:44:31'),
('84203', '008', ' Pendidikan Fisika', '2021-11-23 22:44:49'),
('84205', '008', 'Pendidikan Biologi', '2021-11-23 20:27:06'),
('86201', '008', 'Bimbingan Konseling', '2021-11-23 22:43:38'),
('86206', '008', ' Pendidikan Guru dan Sekolah Dasar', '2021-11-23 22:45:27'),
('86207', '008', 'Pendidikan Guru Pendidikan Anak Usia Dini', '2021-11-23 22:46:27'),
('87205', '008', ' Pendidikan Pancasila dan Kewarganegaraan', '2021-11-23 22:45:04'),
('88103', '008', ' Pendidikan Bahasa Inggris', '2021-11-23 22:43:59'),
('88201', '008', ' Pendidikan Bahasa dan Sastra Indonesia', '2021-11-23 22:44:15'),
('93312', '002', 'Bisnis Jasa Makanan', '2021-11-23 22:31:00');

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
-- Indeks untuk tabel `tbl_konsultasi_hasil`
--
ALTER TABLE `tbl_konsultasi_hasil`
  ADD PRIMARY KEY (`id_proses_hasil`);

--
-- Indeks untuk tabel `tbl_konsultasi_log`
--
ALTER TABLE `tbl_konsultasi_log`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `tbl_proses_hasil`
--
ALTER TABLE `tbl_proses_hasil`
  ADD PRIMARY KEY (`id_proses_hasil`);

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
-- Indeks untuk tabel `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  ADD PRIMARY KEY (`id_user_log`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataset_transit`
--
ALTER TABLE `tbl_dataset_transit`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4158;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset1`
--
ALTER TABLE `tbl_itemset1`
  MODIFY `id_itemset1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset2`
--
ALTER TABLE `tbl_itemset2`
  MODIFY `id_itemset2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset3`
--
ALTER TABLE `tbl_itemset3`
  MODIFY `id_itemset3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `tbl_konsultasi_hasil`
--
ALTER TABLE `tbl_konsultasi_hasil`
  MODIFY `id_proses_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_proses_hasil`
--
ALTER TABLE `tbl_proses_hasil`
  MODIFY `id_proses_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tbl_sistem`
--
ALTER TABLE `tbl_sistem`
  MODIFY `id_sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  MODIFY `id_user_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
