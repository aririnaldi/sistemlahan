-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 09:13 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lahan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode` int(11) NOT NULL,
  `nama_tanaman` varchar(50) NOT NULL,
  `tekstur` varchar(100) NOT NULL,
  `ph_min` float NOT NULL,
  `ph_max` float NOT NULL,
  `drainase` varchar(100) NOT NULL,
  `suhu_min` float NOT NULL,
  `suhu_max` float NOT NULL,
  `ketinggian_min` varchar(10) NOT NULL,
  `ketinggian_max` varchar(10) NOT NULL,
  `lereng_min` varchar(10) NOT NULL,
  `lereng_max` varchar(10) NOT NULL,
  `ch_min` varchar(10) NOT NULL,
  `ch_max` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode`, `nama_tanaman`, `tekstur`, `ph_min`, `ph_max`, `drainase`, `suhu_min`, `suhu_max`, `ketinggian_min`, `ketinggian_max`, `lereng_min`, `lereng_max`, `ch_min`, `ch_max`) VALUES
(1, 'Lengkuas', 'Halus, Agak Halus, Sedang, Agak Kasar, Kasar, Sangat Halus', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '1', '1500', '1', '15', '250', '4000'),
(2, 'Jahe', 'Agak Kasar, Sedang, Agak Halus, Halus, Sangat Halus, Kasar', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 20, 35, '300', '900', '1', '15', '1800', '4000'),
(3, 'Kunyit ', 'Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar', 4.5, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '1', '1500', '1', '15', '250', '4000'),
(4, 'Kencur', 'Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '50', '600', '1', '15', '250', '4000'),
(5, 'Temulawak', 'Sedang, Agak Halus, Halus, Agak Kasar, Sangat Halus', 4.8, 14, 'Baik, Agak Terhambat, Terhambat, Sangat Cepat', 19, 27, '240', '700', '1', '45', '250', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_curah_hujan`
--

CREATE TABLE `tb_bobot_curah_hujan` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `min_curah` float DEFAULT '0',
  `maks_curah` float DEFAULT '0',
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_curah_hujan`
--

INSERT INTO `tb_bobot_curah_hujan` (`id`, `tanaman_id`, `min_curah`, `maks_curah`, `bobot`) VALUES
(15, 15, 2500.1, 3500, 4),
(16, 15, 1800, 2500, 3),
(17, 15, 3500.1, 4000, 2),
(18, 15, 1, 1799, 1),
(19, 15, 4000.1, 5000, 1),
(20, 15, 5001, 6000, 1),
(21, 14, 1000.1, 2000, 4),
(22, 14, 2000.1, 4000, 3),
(23, 14, 250, 1000, 2),
(24, 14, 1, 249.9, 1),
(25, 14, 4000.1, 5000, 1),
(26, 16, 1000.1, 2000, 4),
(27, 16, 2000.1, 4000, 3),
(28, 16, 250, 1000, 2),
(29, 16, 0, 249.9, 1),
(30, 16, 4000.1, 5000, 1),
(31, 17, 1000.1, 2000, 4),
(32, 17, 2000.1, 4000, 3),
(33, 17, 250, 1000, 2),
(34, 17, 0, 249.9, 1),
(35, 17, 4000.1, 5000, 1),
(36, 18, 2500.1, 3000, 4),
(37, 18, 1500.1, 2500, 3),
(38, 18, 250, 1500, 2),
(39, 18, 0, 249.9, 1),
(40, 18, 3000.1, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_drainase`
--

CREATE TABLE `tb_bobot_drainase` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_drainase`
--

INSERT INTO `tb_bobot_drainase` (`id`, `tanaman_id`, `nama`, `bobot`) VALUES
(49, 15, 'Baik', 4),
(50, 15, 'Sedang', 4),
(51, 15, 'Agak Terhambat', 3),
(52, 15, 'Terhambat', 2),
(53, 15, 'Agak Cepat', 2),
(54, 15, 'Sangat Terhambat', 1),
(55, 15, 'Cepat', 1),
(56, 14, 'Baik', 4),
(57, 14, 'Sedang', 4),
(58, 14, 'Agak Terhambat', 3),
(59, 14, 'Agak Cepat', 2),
(60, 14, 'Sangat Terhambat', 1),
(61, 14, 'Cepat', 1),
(62, 16, 'Baik', 4),
(63, 16, 'Sedang', 4),
(64, 16, 'Agak Terhambat', 3),
(65, 16, 'Agak Cepat', 2),
(66, 16, 'Sangat Terhambat', 1),
(67, 16, 'Cepat', 1),
(68, 17, 'Baik', 4),
(69, 17, 'Sedang', 4),
(70, 17, 'Agak Terhambat', 3),
(71, 17, 'Terhambat', 2),
(72, 17, 'Agak Cepat', 2),
(73, 17, 'Sangat Terhambat', 1),
(74, 17, 'Cepat', 1),
(75, 18, 'Baik', 4),
(76, 18, 'Sedang', 3),
(77, 18, 'Agak Terhambat', 2),
(78, 18, 'Terhambat', 1),
(79, 18, 'Sangat Cepat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_lereng`
--

CREATE TABLE `tb_bobot_lereng` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `min_lereng` float DEFAULT '0',
  `maks_lereng` float DEFAULT '0',
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_lereng`
--

INSERT INTO `tb_bobot_lereng` (`id`, `tanaman_id`, `min_lereng`, `maks_lereng`, `bobot`) VALUES
(14, 15, 0, 2.9, 4),
(15, 15, 3, 8, 3),
(16, 15, 8.1, 15, 2),
(17, 15, 15.1, 100, 1),
(18, 14, 0, 2.9, 4),
(19, 14, 3, 8, 3),
(20, 14, 8.1, 15, 2),
(21, 14, 15.1, 100, 1),
(22, 16, 1, 2.9, 4),
(23, 16, 3, 8, 3),
(24, 16, 8.1, 15, 2),
(25, 16, 15.1, 100, 1),
(26, 17, 1, 2.9, 4),
(27, 17, 3, 8, 3),
(28, 17, 8.1, 15, 2),
(29, 17, 15.1, 100, 1),
(30, 18, 1, 4.9, 4),
(31, 18, 5, 13, 3),
(32, 18, 13.1, 45, 2),
(33, 18, 45.1, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_ph`
--

CREATE TABLE `tb_bobot_ph` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `min_ph` float DEFAULT '0',
  `maks_ph` float DEFAULT '0',
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_ph`
--

INSERT INTO `tb_bobot_ph` (`id`, `tanaman_id`, `min_ph`, `maks_ph`, `bobot`) VALUES
(15, 15, 5.1, 7, 4),
(16, 15, 4, 5, 3),
(17, 15, 7.1, 8, 2),
(18, 15, 0, 3.9, 1),
(19, 15, 8.1, 14, 1),
(20, 14, 5.1, 6, 4),
(21, 14, 4.5, 5, 3),
(22, 14, 6.1, 7.5, 2),
(23, 14, 0, 4.49, 1),
(24, 14, 7.51, 14, 1),
(25, 16, 5.1, 6, 4),
(26, 16, 4.5, 5, 3),
(27, 16, 6.1, 7.5, 2),
(28, 16, 0, 4.4, 1),
(29, 16, 7.6, 14, 1),
(30, 17, 5.1, 6, 4),
(31, 17, 4.5, 5, 3),
(32, 17, 6.1, 7.5, 2),
(33, 17, 0, 4.4, 1),
(34, 17, 7.6, 14, 1),
(35, 18, 6.8, 7.9, 4),
(36, 18, 5.9, 6.7, 3),
(37, 18, 4.8, 5.8, 2),
(38, 18, 8, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_suhu`
--

CREATE TABLE `tb_bobot_suhu` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `min_suhu` float DEFAULT '0',
  `maks_suhu` float DEFAULT '0',
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_suhu`
--

INSERT INTO `tb_bobot_suhu` (`id`, `tanaman_id`, `min_suhu`, `maks_suhu`, `bobot`) VALUES
(18, 15, 25.1, 30, 4),
(19, 15, 20, 25, 3),
(20, 15, 30.1, 35, 2),
(21, 15, 0, 19.9, 1),
(22, 15, 35.1, 50, 1),
(23, 14, 22.1, 28, 4),
(24, 14, 28.1, 40, 3),
(25, 14, 15, 22, 2),
(26, 14, 0, 14.9, 1),
(27, 14, 40.1, 50, 1),
(28, 16, 22.1, 28, 4),
(29, 16, 28.1, 40, 3),
(30, 16, 15, 22, 2),
(31, 16, 0, 14.9, 1),
(32, 16, 40.1, 50, 1),
(33, 17, 22.1, 28, 4),
(34, 17, 28.1, 40, 3),
(35, 17, 15, 22, 2),
(36, 17, 0, 14.9, 1),
(37, 17, 40.1, 50, 1),
(38, 18, 25, 27, 4),
(39, 18, 22, 24, 3),
(40, 18, 19, 21, 2),
(41, 18, 0, 19.1, 1),
(42, 18, 27.1, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_tekstur`
--

CREATE TABLE `tb_bobot_tekstur` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_tekstur`
--

INSERT INTO `tb_bobot_tekstur` (`id`, `tanaman_id`, `nama`, `bobot`) VALUES
(22, 15, 'Agak Kasar', 4),
(23, 15, 'Sedang', 4),
(24, 15, 'Agak Halus', 3),
(25, 15, 'Halus', 3),
(26, 15, 'Sangat Halus', 2),
(27, 15, 'Kasar', 1),
(28, 14, 'Agak Halus', 4),
(29, 14, 'Sedang', 4),
(30, 14, 'Halus', 3),
(31, 14, 'Agak Kasar', 2),
(32, 14, 'Sangat Halus', 2),
(33, 14, 'Kasar', 1),
(34, 16, 'Agak Halus', 4),
(35, 16, 'Sedang', 4),
(36, 16, 'Halus', 3),
(37, 16, 'Agak Kasar', 2),
(38, 16, 'Sangat Halus', 2),
(39, 16, 'Kasar', 1),
(40, 17, 'Agak Halus', 4),
(41, 17, 'Sedang', 4),
(42, 17, 'Halus', 3),
(43, 17, 'Agak Kasar', 2),
(44, 17, 'Sangat Halus', 2),
(45, 17, 'Kasar', 1),
(46, 18, 'Agak Halus', 4),
(47, 18, 'Sedang', 4),
(48, 18, 'Halus', 3),
(49, 18, 'Agak Kasar', 2),
(50, 18, 'Sangat Halus', 2),
(51, 18, 'Kasar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_tinggi_lahan`
--

CREATE TABLE `tb_bobot_tinggi_lahan` (
  `id` int(11) NOT NULL,
  `tanaman_id` int(11) NOT NULL,
  `min_tinggi` float DEFAULT '0',
  `maks_tinggi` float DEFAULT '0',
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_tinggi_lahan`
--

INSERT INTO `tb_bobot_tinggi_lahan` (`id`, `tanaman_id`, `min_tinggi`, `maks_tinggi`, `bobot`) VALUES
(16, 15, 450.1, 600, 4),
(17, 15, 300, 450, 3),
(18, 15, 600.1, 900, 2),
(19, 15, 0, 299.9, 1),
(20, 15, 900.1, 4884, 1),
(21, 14, 1, 600, 4),
(22, 14, 600.1, 900, 3),
(23, 14, 900.1, 1500, 2),
(24, 14, 1500.1, 4884, 1),
(25, 16, 0, 599.9, 4),
(26, 16, 900.1, 1500, 2),
(27, 16, 1500.1, 4884, 1),
(28, 17, 200.1, 450, 4),
(29, 17, 50, 200, 3),
(30, 17, 450.1, 600, 2),
(31, 17, 0, 49.9, 1),
(32, 17, 600.1, 4884, 1),
(33, 18, 300.1, 470, 4),
(34, 18, 240, 300, 3),
(35, 18, 470.1, 700, 2),
(36, 18, 0, 239.9, 1),
(37, 18, 700.1, 4884, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'tekstur'),
(2, 'ph'),
(3, 'drainase'),
(4, 'suhu'),
(5, 'ketinggian'),
(6, 'lereng'),
(7, 'curah_hujan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahan`
--

CREATE TABLE `tb_lahan` (
  `id_alamat` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tekstur` varchar(100) NOT NULL,
  `ph` float NOT NULL,
  `drainase` varchar(100) NOT NULL,
  `suhu` float NOT NULL,
  `ketinggian` varchar(100) NOT NULL,
  `lereng` varchar(100) NOT NULL,
  `curah_hujan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_alamat`, `alamat`, `tekstur`, `ph`, `drainase`, `suhu`, `ketinggian`, `lereng`, `curah_hujan`) VALUES
(2, 'Caringin', 'Agak Kasar', 5.6, 'Baik', 24, '455', '15', '2574'),
(4, 'Cariu', 'Halus', 4.5, 'Baik', 28.5, '107', '8', '3061'),
(5, 'Ciampea', 'Halus', 4.5, 'Baik', 27, '188', '8', '3936'),
(6, 'Ciawi', 'Agak Kasar', 5.6, 'Baik', 23.5, '518', '40', '2574'),
(9, 'Cibinong', 'Sangat Halus', 4.5, 'Baik', 28, '139', '3', '4344'),
(10, 'Cigudeg', 'Halus', 4.5, 'Baik', 28, '369', '41', '3060'),
(12, 'Cibungbulang', 'Halus', 6.6, 'Baik', 27, '350', '8', '2976'),
(13, 'Cigombong', 'Agak Kasar', 5.6, 'Baik', 27, '578', '15', '2068'),
(14, 'Cijeruk', 'Agak Kasar', 5.6, 'Baik', 24.5, '587', '15', '3054'),
(15, 'Cileungsi', 'Halus', 4.5, 'Baik', 26, '107', '25', '4236');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `kriteria_1` int(11) NOT NULL,
  `kriteria_2` int(11) NOT NULL,
  `kriteria_3` int(11) NOT NULL,
  `kriteria_4` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_alternatif`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `level`) VALUES
(78, 32, 16, 3, 11, 5, 6),
(79, 33, 7, 3, 12, 1, 6),
(80, 34, 7, 3, 14, 3, 6),
(81, 35, 16, 3, 14, 2, 6),
(82, 36, 16, 3, 12, 4, 6),
(83, 37, 16, 3, 13, 2, 6),
(84, 38, 9, 4, 13, 3, 6),
(85, 32, 1, 11, 6, 5, 5),
(86, 33, 1, 12, 7, 1, 5),
(87, 34, 3, 12, 16, 3, 5),
(88, 35, 4, 12, 7, 2, 5),
(89, 36, 1, 13, 9, 4, 5),
(90, 37, 3, 13, 16, 2, 5),
(91, 38, 4, 14, 16, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai_akhir` float NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanaman`
--

CREATE TABLE `tb_tanaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tanaman`
--

INSERT INTO `tb_tanaman` (`id`, `nama`) VALUES
(14, 'Lengkuas'),
(15, 'Jahe'),
(16, 'Kunyit'),
(17, 'Kencur'),
(18, 'Temulawak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_bobot_curah_hujan`
--
ALTER TABLE `tb_bobot_curah_hujan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_curah_hujan_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_drainase`
--
ALTER TABLE `tb_bobot_drainase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_drainase_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_lereng`
--
ALTER TABLE `tb_bobot_lereng`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_lereng_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_ph`
--
ALTER TABLE `tb_bobot_ph`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_ph_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_suhu`
--
ALTER TABLE `tb_bobot_suhu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_suhu_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_tekstur`
--
ALTER TABLE `tb_bobot_tekstur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_tekstur_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_bobot_tinggi_lahan`
--
ALTER TABLE `tb_bobot_tinggi_lahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_tinggi_lahan_tanaman_id_fk` (`tanaman_id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `tb_tanaman`
--
ALTER TABLE `tb_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_bobot_curah_hujan`
--
ALTER TABLE `tb_bobot_curah_hujan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tb_bobot_drainase`
--
ALTER TABLE `tb_bobot_drainase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tb_bobot_lereng`
--
ALTER TABLE `tb_bobot_lereng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_bobot_ph`
--
ALTER TABLE `tb_bobot_ph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_bobot_suhu`
--
ALTER TABLE `tb_bobot_suhu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_bobot_tekstur`
--
ALTER TABLE `tb_bobot_tekstur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tb_bobot_tinggi_lahan`
--
ALTER TABLE `tb_bobot_tinggi_lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tanaman`
--
ALTER TABLE `tb_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bobot_curah_hujan`
--
ALTER TABLE `tb_bobot_curah_hujan`
  ADD CONSTRAINT `bobot_curah_hujan_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_drainase`
--
ALTER TABLE `tb_bobot_drainase`
  ADD CONSTRAINT `bobot_drainase_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_lereng`
--
ALTER TABLE `tb_bobot_lereng`
  ADD CONSTRAINT `bobot_lereng_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_ph`
--
ALTER TABLE `tb_bobot_ph`
  ADD CONSTRAINT `bobot_ph_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_suhu`
--
ALTER TABLE `tb_bobot_suhu`
  ADD CONSTRAINT `bobot_suhu_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_tekstur`
--
ALTER TABLE `tb_bobot_tekstur`
  ADD CONSTRAINT `bobot_tekstur_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bobot_tinggi_lahan`
--
ALTER TABLE `tb_bobot_tinggi_lahan`
  ADD CONSTRAINT `bobot_tinggi_lahan_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
