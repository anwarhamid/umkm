-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 12:01 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(3, 'Yosua Robby Rossevelt', 'yosua03', '$2y$10$W3O70aoJhcdOAGeBYh153uhqdZITSSrAoRCbuBm8QXyVU1hq9rEFS', '06112021_pp_yosua.jpeg'),
(4, 'Yosua', 'admin123', '$2y$10$k7K/ArZFPTu9DmwaRF7niudz92NSOVus0tVnlt2eHDyt9bglw1uZu', '06112021_ic_festival.png');

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id_sektor` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id_sektor`, `nama`, `keterangan`) VALUES
('S1', 'Kerajinan', 'Kerajinan merupakan salah satu sektor UMKM yang ada di kecamatan Kare.'),
('S2', 'Makanan & Minuman', 'Makanan dan minuman merupakan salah satu sektor UMKM yang ada di kecamatan Kare'),
('S3', 'Kuliner', 'Kuliner merupakan salah satu sektor UMKM'),
('S4', 'Agribisnis', 'Agribisnis merupakan salah satu UMKM Kare');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` varchar(5) NOT NULL,
  `id_sektor` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `sektor` varchar(25) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pendapatan` int(11) DEFAULT NULL,
  `pemilik` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `id_sektor`, `nama`, `sektor`, `lokasi`, `pendapatan`, `pemilik`) VALUES
('U1', 'S1', 'Batik Nusantara', 'Kerajinan', 'Jl. Raya Kare', 5000000, 'Anwar'),
('U2', 'S4', 'Kopi Kare', 'Agribisnis', 'Jl. Raya Kare', 10000000, 'Yosua'),
('U3', 'S2', 'Pancake Durian', 'Makanan & Minuman', 'Jl. Raya Kare', 1000000, 'Mustakim'),
('U4', 'S3', 'Nasi Pecel', 'Kuliner', 'Jl. Raya Kare', 5000000, 'Isan'),
('U5', 'S2', 'Makaroni', 'Makanan & Minuman', 'Jl. Kare', 6000000, 'Anwar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_sektor`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`id_sektor`) REFERENCES `sektor` (`id_sektor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
