-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 10:19 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `refstasiun`
--

CREATE TABLE IF NOT EXISTS `refstasiun` (
  `id_stasiun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_stasiun` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_stasiun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `refstatus`
--

CREATE TABLE IF NOT EXISTS `refstatus` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `refstatustrx`
--

CREATE TABLE IF NOT EXISTS `refstatustrx` (
  `id_statustrx` int(11) NOT NULL AUTO_INCREMENT,
  `statustrx` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_statustrx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_topup`),
  KEY `id_statustrx` (`id_statustrx`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
