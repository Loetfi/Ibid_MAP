<?php
session_start();
$id_biodata=$_SESSION['uid'];
include"include/connection.php";

//hapus jika sudah ada
$qdel="DROP TABLE webid_bank";
$rdel=mysql_query($qdel);

$qdel="-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.13 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ibid_ims.map_items_history
CREATE TABLE IF NOT EXISTS `map_items_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_schedule` varchar(50) NOT NULL DEFAULT '0',
  `auc_location` varchar(200) NOT NULL DEFAULT '0',
  `idauction_item` varchar(50) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `id_biodata` varchar(50) NOT NULL DEFAULT '0',
  `id_nppl` varchar(50) NOT NULL DEFAULT '0',
  `sts_delete` enum('0','1') NOT NULL DEFAULT '0',
  `auc_date` date NOT NULL,
  `title` varchar(500) NOT NULL,
  `no_pol` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `seri` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `cylinder` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `score_in` varchar(50) NOT NULL,
  `score_ex` varchar(50) NOT NULL,
  `score_fr` varchar(50) NOT NULL,
  `score_en` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `km` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `mission` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `minimum_price` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `sold` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
";
$rdel=mysql_query($qdel);


?>



