-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2022 at 08:15 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw_playstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `saw_aplikasi`
--

CREATE TABLE `saw_aplikasi` (
  `nama` varchar(100) NOT NULL,
  `pengembang` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saw_aplikasi`
--

INSERT INTO `saw_aplikasi` (`nama`, `pengembang`, `kategori`) VALUES
('bilibili', 'bilibili', 'Hiburan'),
('Clash Of Clans', 'Supercell', 'Permainan'),
('Peduli Lindungi', 'Ministry of Health Republic Indonesia', 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `saw_kriteria`
--

CREATE TABLE `saw_kriteria` (
  `no` int(11) NOT NULL,
  `peringkat` float NOT NULL,
  `ukuran` float NOT NULL,
  `unduhan` float NOT NULL,
  `aktif` float NOT NULL,
  `manfaat` float NOT NULL,
  `kelebihan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saw_kriteria`
--

INSERT INTO `saw_kriteria` (`no`, `peringkat`, `ukuran`, `unduhan`, `aktif`, `manfaat`, `kelebihan`) VALUES
(6, 0.25, 0.13, 0.19, 0.13, 0.19, 0.13);

-- --------------------------------------------------------

--
-- Table structure for table `saw_penilaian`
--

CREATE TABLE `saw_penilaian` (
  `nama` varchar(100) NOT NULL,
  `peringkat` float NOT NULL,
  `ukuran` float NOT NULL,
  `unduhan` float NOT NULL,
  `aktif` float NOT NULL,
  `manfaat` float NOT NULL,
  `kelebihan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saw_penilaian`
--

INSERT INTO `saw_penilaian` (`nama`, `peringkat`, `ukuran`, `unduhan`, `aktif`, `manfaat`, `kelebihan`) VALUES
('bilibili', 3.9, 1, 3, 2, 3, 2),
('Clash Of Clans', 4.3, 2, 5, 4, 3, 3),
('Peduli Lindungi', 3.6, 2, 4, 4, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `saw_perankingan`
--

CREATE TABLE `saw_perankingan` (
  `no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saw_perankingan`
--

INSERT INTO `saw_perankingan` (`no`, `nama`, `nilai_akhir`) VALUES
(1, 'bilibili', 0.765),
(2, 'Clash Of Clans', 0.908),
(3, 'Peduli Lindungi', 0.876);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saw_aplikasi`
--
ALTER TABLE `saw_aplikasi`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `saw_penilaian`
--
ALTER TABLE `saw_penilaian`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saw_perankingan`
--
ALTER TABLE `saw_perankingan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
