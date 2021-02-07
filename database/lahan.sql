-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 04:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(10) NOT NULL
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
  `id_login` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` int(10) NOT NULL
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
  `kode` int(10) NOT NULL,
  `nama_tanaman` varchar(50) NOT NULL,
  `tekstur_tanaman` varchar(100) NOT NULL,
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

INSERT INTO `tb_alternatif` (`kode`, `nama_tanaman`, `tekstur_tanaman`, `ph_min`, `ph_max`, `drainase`, `suhu_min`, `suhu_max`, `ketinggian_min`, `ketinggian_max`, `lereng_min`, `lereng_max`, `ch_min`, `ch_max`) VALUES
(1, 'Lengkuas', 'Halus, Agak Halus, Sedang, Agak Kasar, Kasar, Sangat Halus', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '1', '1500', '1', '15', '250', '4000'),
(2, 'Jahe', 'Agak Kasar, Sedang, Agak Halus, Halus, Sangat Halus, Kasar', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 20, 35, '300', '900', '1', '15', '1800', '4000'),
(3, 'Kunyit', 'Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar', 4.5, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '1', '1500', '1', '15', '250', '4000'),
(4, 'Kencur', 'Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar', 1, 14, 'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat', 15, 40, '50', '600', '1', '15', '250', '4000'),
(5, 'Temulawak', 'Sedang, Agak Halus, Halus, Agak Kasar, Sangat Halus', 4.8, 14, 'Baik, Agak Terhambat, Terhambat, Sangat Cepat', 19, 27, '240', '700', '1', '45', '250', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(9) NOT NULL,
  `idalamat` int(9) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `jenistanaman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `idalamat`, `nilai`, `jenistanaman`) VALUES
(3, 10, '0.18', 'Kunyit'),
(6, 16, '0.21', 'Jahe'),
(7, 14, '0.18', 'Temulawak'),
(8, 17, '0.11', 'Temulawak'),
(9, 19, '0.25', 'Lengkuas'),
(10, 20, '0.43', 'Jahe');

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
  `id_alamat` int(50) NOT NULL,
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
(14, 'Serang, Banten', 'Sangat Halus', 6.5, 'Agak Baik', 21, '2500', '20', '4000'),
(16, 'LAHAN BASAH', 'Halus', 4.5, 'Baik', 28.5, '107', '8', '3061'),
(17, 'Pallangkaraya, Kalimantan Timur', 'Sangat Halus', 6.7, 'Baik', 45, '1600', '10', '1900'),
(18, 'Minangkabau', 'Halus', 5, 'Agak Cepat', 14, '2789', '11', '3400'),
(19, 'Cimareme', 'Agak Halus', 9, 'Agak Cepat', 32, '1200', '15', '2310'),
(20, 'Jombang, Jawa Timur', 'Agak Kasar', 8, 'Terhambat', 27, '1700', '16', '3232');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

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
-- Indexes for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_alamat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
