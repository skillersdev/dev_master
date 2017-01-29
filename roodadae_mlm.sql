-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 08:28 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roodadae_mlm`
--
CREATE DATABASE IF NOT EXISTS `roodadae_mlm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `roodadae_mlm`;

-- --------------------------------------------------------

--
-- Table structure for table `earning_settings`
--

CREATE TABLE IF NOT EXISTS `earning_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `downline_count` int(11) NOT NULL,
  `earning_amt` float(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `active` smallint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `earning_settings`
--

INSERT INTO `earning_settings` (`id`, `downline_count`, `earning_amt`, `created_at`, `updated_at`, `active`) VALUES
(1, 2, 30.00, '0000-00-00 00:00:00', '2017-01-29 20:24:01', 1),
(2, 4, 40.00, '2017-01-29 19:32:15', '2017-01-29 20:24:19', 1),
(3, 6, 50.00, '2017-01-29 19:33:18', '2017-01-29 20:25:07', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
