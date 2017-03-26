-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 04:08 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trainfc`
--
CREATE DATABASE IF NOT EXISTS `trainfc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trainfc`;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_stasiun` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_status` (`id_status`),
  KEY `id_stasiun` (`id_stasiun`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `id_status`, `id_stasiun`, `date`) VALUES
(3, 2, 0, 0, NULL),
(4, 4, 1, 1, NULL),
(5, 5, 1, 0, NULL),
(6, 5, 0, 1, NULL);

--
-- Triggers `log`
--
DROP TRIGGER IF EXISTS `log_ins`;
DELIMITER //
CREATE TRIGGER `log_ins` AFTER INSERT ON `log`
 FOR EACH ROW BEGIN
DECLARE s integer unsigned;
SET @s := (SELECT saldo FROM user WHERE id_user = NEW.id_user)-3000;

IF(NEW.id_status = 0)
THEN
UPDATE user
	SET id_status = NEW.id_status, saldo = @s
	WHERE id_user = NEW.id_user;
ELSE
UPDATE user
	SET id_status = NEW.id_status
	WHERE id_user = NEW.id_user;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `refstasiun`
--

CREATE TABLE IF NOT EXISTS `refstasiun` (
  `id_stasiun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stasiun` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_stasiun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `refstasiun`
--

INSERT INTO `refstasiun` (`id_stasiun`, `nama_stasiun`) VALUES
(0, 'cilebut'),
(1, 'bogor');

-- --------------------------------------------------------

--
-- Table structure for table `refstatus`
--

CREATE TABLE IF NOT EXISTS `refstatus` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `refstatus`
--

INSERT INTO `refstatus` (`id_status`, `nama_status`) VALUES
(0, 'out'),
(1, 'in');

-- --------------------------------------------------------

--
-- Table structure for table `refstatustrx`
--

CREATE TABLE IF NOT EXISTS `refstatustrx` (
  `id_statustrx` int(11) NOT NULL AUTO_INCREMENT,
  `statustrx` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_statustrx`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `refstatustrx`
--

INSERT INTO `refstatustrx` (`id_statustrx`, `statustrx`) VALUES
(0, 'Request'),
(1, 'Verification'),
(2, 'Paid'),
(3, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `id_topup` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jml_topup` int(11) NOT NULL,
  `id_statustrx` int(11) NOT NULL,
  `no_rek` bigint(20) NOT NULL,
  `nama_rek` varchar(50) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id_topup`),
  KEY `id_statustrx` (`id_statustrx`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id_topup`, `id_user`, `jml_topup`, `id_statustrx`, `no_rek`, `nama_rek`, `tgl`) VALUES
(5, 2, 59000, 2, 654, 'eretr', '0000-00-00 00:00:00'),
(6, 2, 41000, 3, 875654, 'yr', '0000-00-00 00:00:00'),
(7, 2, 46000, 2, 532, 'qwer', '0000-00-00 00:00:00'),
(8, 2, 7800, 2, 8676543, 'utr', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `no_hp`, `id_status`, `level`, `saldo`) VALUES
(2, 'hilmisyam', 'hilmi.syam@gmail.com', 'hilmisyam', '081808593159', 0, 1, 73400),
(4, 'fatihavila', 'fatih.avila@gmail.com', 'fatihavila', '081180808080', 1, 0, 100000),
(5, 'guneight', 'guneight7@gmail.com', 'guneight', '081110101010', 0, 0, 197000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `refstatus` (`id_status`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`id_stasiun`) REFERENCES `refstasiun` (`id_stasiun`),
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_statustrx`) REFERENCES `refstatustrx` (`id_statustrx`),
  ADD CONSTRAINT `topup_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `refstatus` (`id_status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
