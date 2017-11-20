-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 03:40 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registerkesenian`
--
CREATE DATABASE IF NOT EXISTS `registerkesenian` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `registerkesenian`;

-- --------------------------------------------------------

--
-- Table structure for table `advis`
--

CREATE TABLE IF NOT EXISTS `advis` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(200) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `acara` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `noadvis` varchar(200) NOT NULL,
  `sektor` varchar(200) NOT NULL,
  `camat` varchar(200) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `nik` (`nik`),
  KEY `sektor` (`sektor`),
  KEY `camat` (`camat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `camat`
--

CREATE TABLE IF NOT EXISTS `camat` (
  `sektor` varchar(200) NOT NULL,
  `camat` varchar(200) NOT NULL,
  UNIQUE KEY `sektor` (`sektor`),
  UNIQUE KEY `camat` (`camat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camat`
--

INSERT INTO `camat` (`sektor`, `camat`) VALUES
('badas', 'badas'),
('gampeng', 'ngasem');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisk` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `foto`, `namalengkap`, `alamat`, `jenisk`, `username`, `password`) VALUES
(1, 'user3.png', 'Helmy Kurniawan', 'Ds.Putih Gampengrejo', 'LakiLaki', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rekom`
--

CREATE TABLE IF NOT EXISTS `rekom` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `norekom` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `namaorga` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `resort` varchar(100) NOT NULL,
  `kadin` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seniman`
--

CREATE TABLE IF NOT EXISTS `seniman` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `namaorganisasi` varchar(100) NOT NULL,
  `jmlanggota` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `berlakuawal` varchar(100) NOT NULL,
  `berlakuakhir` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `seniman`
--

INSERT INTO `seniman` (`no`, `foto`, `nama`, `telepon`, `alamat`, `namaorganisasi`, `jmlanggota`, `nik`, `berlakuawal`, `berlakuakhir`, `status`) VALUES
(3, 'a.PNG', 'riko', '01111', 'kediri', 'waranggana', '45', '1234', '10-21-2015', '10-09-2015', 'Lama'),
(4, 'lucu.jpg', 'helmy', '675767', 'putih', 'semar', '12', '12434', '10-29-2015', '10-16-2015', 'Lama');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advis`
--
ALTER TABLE `advis`
  ADD CONSTRAINT `advis_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `seniman` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advis_ibfk_2` FOREIGN KEY (`sektor`) REFERENCES `camat` (`sektor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advis_ibfk_3` FOREIGN KEY (`camat`) REFERENCES `camat` (`camat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekom`
--
ALTER TABLE `rekom`
  ADD CONSTRAINT `rekom_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `seniman` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
