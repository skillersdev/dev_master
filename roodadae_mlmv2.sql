-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2017 at 07:38 AM
-- Server version: 5.6.31-77.0-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roodadae_mlmv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliateuser`
--

CREATE TABLE IF NOT EXISTS `affiliateuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `referedby` varchar(15) NOT NULL DEFAULT 'none',
  `ipaddress` int(10) unsigned NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `active` int(11) NOT NULL,
  `doj` date NOT NULL,
  `country` text NOT NULL,
  `tamount` double NOT NULL DEFAULT '0',
  `payment` varchar(10) NOT NULL,
  `signupcode` text NOT NULL,
  `level` int(1) NOT NULL DEFAULT '2',
  `pcktaken` int(10) NOT NULL DEFAULT '0',
  `launch` int(1) NOT NULL DEFAULT '0',
  `expiry` date NOT NULL DEFAULT '2199-12-31',
  `bankname` varchar(250) NOT NULL DEFAULT 'Not Available',
  `accountname` varchar(250) NOT NULL DEFAULT 'Not Available',
  `accountno` double NOT NULL DEFAULT '0',
  `accounttype` int(11) NOT NULL DEFAULT '0',
  `ifsccode` varchar(100) NOT NULL DEFAULT 'Not Available',
  `getpayment` int(11) NOT NULL DEFAULT '1',
  `renew` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `affiliateuser`
--

INSERT INTO `affiliateuser` (`Id`, `username`, `password`, `fname`, `address`, `email`, `referedby`, `ipaddress`, `mobile`, `active`, `doj`, `country`, `tamount`, `payment`, `signupcode`, `level`, `pcktaken`, `launch`, `expiry`, `bankname`, `accountname`, `accountno`, `accounttype`, `ifsccode`, `getpayment`, `renew`) VALUES
(1, 'adminadmin', 'test1234', 'Site Admin', 'Address OF Company Or Individual', 'EmailofAdmin@Domain.com', 'none', 0, 0, 1, '0000-00-00', 'Country', 81, '', '0', 1, 1, 1, '0000-00-00', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(2, 'roodabatoz', 'test1234', 'roodabatoz', 'Address OF Company Or Individual', 'transfer@roodabatoz.com', 'none', 0, 0, 1, '0000-00-00', 'Country', 30000150, '', '0', 1, 1, 0, '2020-12-25', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(3, 'roodab', 'test1234', 'roodab', 'Hzfvhvh ', 'roodab@gmail.com', 'adminadmin', 457048432, 987654323, 1, '2016-12-31', 'Malaysia', 10, '', '9271000553', 1, 8, 0, '2017-01-29', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(101, 'arash33', '12345678', 'arash33', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '1250401528', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(100, 'arash32', '12345678', 'arash32', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '2838767986', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(99, 'arash31', '12345678', 'arash31', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '7661107016', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(98, 'arash30', '12345678', 'arash30', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '1284127628', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(97, 'arash29', '12345678', 'arash29', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '4174732673', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(96, 'arash28', '12345678', 'arash28', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '7976865251', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(95, 'arash27', '12345678', 'arash27', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6809138299', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(93, 'arash25', '12345678', 'arash25', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '3641543173', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(94, 'arash26', '12345678', 'arash26', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '8885303636', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(92, 'arash24', '12345678', 'arash24', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '1942870567', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(91, 'arash23', '12345678', 'arash23', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6813627767', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(90, 'arash22', '12345678', 'arash22', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '7264153307', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(89, 'arash21', '12345678', 'arash21', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '3778489095', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(88, 'arash20', '12345678', 'arash20', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '2995929722', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(87, 'arash19', '12345678', 'arash19', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '5812204749', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(86, 'arash18', '12345678', 'arash17', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '5560401727', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(85, 'arash17', '12345678', 'arash17', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6441171757', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(84, 'arash16', '12345678', 'arash16', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash7', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '4973676030', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(83, 'arash15', '12345678', 'arash15', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '4045973138', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(82, 'arash14', '12345678', 'arash14', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '5283165213', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(81, 'arash13', '12345678', 'arash13', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '3105458165', 5, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(80, 'arash12', '12345678', 'arash12', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '8164381471', 4, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(79, 'arash11', '12345678', 'arash11', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '4928809151', 4, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(78, 'arash10', '12345678', 'arash10', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6418461807', 4, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(77, 'arash9', '12345678', 'arash9', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '2054103029', 4, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(76, 'arash8', '12345678', 'arash8', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash6', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6797241709', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(75, 'arash7', '12345678', 'arash7', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash6', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '1464750476', 1, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(74, 'arash6', '12345678', 'arash6', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 22, '', '3804052012', 1, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(73, 'arash5', '12345678', 'arash5', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '5056798412', 3, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(71, 'arash4', '12345678', 'arash4', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '2214371665', 3, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(70, 'arash3', '12345678', 'arash3', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash1', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '6557336362', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(67, 'arash', '12345678', 'arash', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'roodab', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 82, '', '9181759063', 1, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(68, 'arash1', '12345678', 'arash1', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 78, '', '4921700970', 1, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0),
(69, 'arash2', '12345678', 'arash2', 'KUALA LUMPUR', 'aliamgh1@yahoo.com', 'arash', 3075354352, 1231795716, 1, '2017-02-01', 'Angola', 10, '', '4478130402', 2, 8, 0, '2017-03-02', 'Not Available', 'Not Available', 0, 0, 'Not Available', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_bonus_history`
--

CREATE TABLE IF NOT EXISTS `affiliate_bonus_history` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `referedby` varchar(50) NOT NULL,
  `stage1_ref` varchar(30) DEFAULT NULL,
  `stage2_ref` varchar(30) DEFAULT NULL,
  `stage3_ref` varchar(30) DEFAULT NULL,
  `stage4_ref` varchar(30) DEFAULT NULL,
  `stage5_ref` varchar(30) DEFAULT NULL,
  `stage6_ref` varchar(225) DEFAULT NULL,
  `stage7_ref` varchar(40) DEFAULT NULL,
  `stage8_ref` varchar(40) DEFAULT NULL,
  `stage9_ref` varchar(40) DEFAULT NULL,
  `stage10_ref` varchar(40) DEFAULT NULL,
  `stage11_ref` varchar(40) DEFAULT NULL,
  `stage12_ref` varchar(40) DEFAULT NULL,
  `stage13_ref` varchar(40) DEFAULT NULL,
  `stage14_ref` varchar(40) DEFAULT NULL,
  `stage15_ref` varchar(40) DEFAULT NULL,
  `stage16_ref` varchar(40) DEFAULT NULL,
  `stage17_ref` varchar(40) DEFAULT NULL,
  `stage18_ref` varchar(40) DEFAULT NULL,
  `stage19_ref` varchar(40) DEFAULT NULL,
  `stage20_ref` varchar(40) DEFAULT NULL,
  `stage21_ref` varchar(40) DEFAULT NULL,
  `stage22_ref` varchar(40) DEFAULT NULL,
  `stage23_ref` varchar(40) DEFAULT NULL,
  `stage24_ref` varchar(40) DEFAULT NULL,
  `stage25_ref` varchar(40) DEFAULT NULL,
  `stage26_ref` varchar(40) DEFAULT NULL,
  `stage27_ref` varchar(40) DEFAULT NULL,
  `stage28_ref` varchar(40) DEFAULT NULL,
  `stage29_ref` varchar(40) DEFAULT NULL,
  `stage30_ref` varchar(40) DEFAULT NULL,
  `stage31_ref` varchar(40) DEFAULT NULL,
  `stage32_ref` varchar(40) DEFAULT NULL,
  `stage33_ref` varchar(40) DEFAULT NULL,
  `stage34_ref` varchar(40) DEFAULT NULL,
  `stage35_ref` varchar(40) DEFAULT NULL,
  `stage36_ref` varchar(40) DEFAULT NULL,
  `stage37_ref` varchar(40) DEFAULT NULL,
  `stage38_ref` varchar(40) DEFAULT NULL,
  `stage39_ref` varchar(40) DEFAULT NULL,
  `stage40_ref` varchar(40) DEFAULT NULL,
  `stage41_ref` varchar(40) DEFAULT NULL,
  `stage42_ref` varchar(40) DEFAULT NULL,
  `stage43_ref` varchar(40) DEFAULT NULL,
  `stage44_ref` varchar(40) DEFAULT NULL,
  `stage45_ref` varchar(40) DEFAULT NULL,
  `stage46_ref` varchar(40) DEFAULT NULL,
  `stage47_ref` varchar(40) DEFAULT NULL,
  `stage48_ref` varchar(40) DEFAULT NULL,
  `stage49_ref` varchar(40) DEFAULT NULL,
  `stage50_ref` varchar(40) DEFAULT NULL,
  `stage51_ref` varchar(40) DEFAULT NULL,
  `stage52_ref` varchar(40) DEFAULT NULL,
  `stage53_ref` varchar(40) DEFAULT NULL,
  `stage54_ref` varchar(40) DEFAULT NULL,
  `stage55_ref` varchar(40) DEFAULT NULL,
  `stage56_ref` varchar(40) DEFAULT NULL,
  `stage57_ref` varchar(40) DEFAULT NULL,
  `stage58_ref` varchar(40) DEFAULT NULL,
  `stage59_ref` varchar(40) DEFAULT NULL,
  `stage60_ref` varchar(40) DEFAULT NULL,
  `stage61_ref` varchar(40) DEFAULT NULL,
  `stage62_ref` varchar(40) DEFAULT NULL,
  `stage63_ref` varchar(40) DEFAULT NULL,
  `stage64_ref` varchar(40) DEFAULT NULL,
  `stage65_ref` varchar(40) DEFAULT NULL,
  `stage66_ref` varchar(40) DEFAULT NULL,
  `stage67_ref` varchar(40) DEFAULT NULL,
  `stage68_ref` varchar(40) DEFAULT NULL,
  `stage69_ref` varchar(40) DEFAULT NULL,
  `stage70_ref` varchar(40) DEFAULT NULL,
  `stage71_ref` varchar(40) DEFAULT NULL,
  `stage72_ref` varchar(40) DEFAULT NULL,
  `stage73_ref` varchar(40) DEFAULT NULL,
  `stage74_ref` varchar(40) DEFAULT NULL,
  `stage75_ref` varchar(40) DEFAULT NULL,
  `stage76_ref` varchar(40) DEFAULT NULL,
  `stage77_ref` varchar(40) DEFAULT NULL,
  `stage78_ref` varchar(40) DEFAULT NULL,
  `stage79_ref` varchar(40) DEFAULT NULL,
  `stage80_ref` varchar(40) DEFAULT NULL,
  `stage81_ref` varchar(40) DEFAULT NULL,
  `stage82_ref` varchar(40) DEFAULT NULL,
  `stage83_ref` varchar(40) DEFAULT NULL,
  `stage84_ref` varchar(40) DEFAULT NULL,
  `stage85_ref` varchar(40) DEFAULT NULL,
  `stage86_ref` varchar(40) DEFAULT NULL,
  `stage87_ref` varchar(40) DEFAULT NULL,
  `stage88_ref` varchar(40) DEFAULT NULL,
  `stage89_ref` varchar(40) DEFAULT NULL,
  `stage90_ref` varchar(40) DEFAULT NULL,
  `stage91_ref` varchar(40) DEFAULT NULL,
  `stage92_ref` varchar(40) DEFAULT NULL,
  `stage93_ref` varchar(40) DEFAULT NULL,
  `stage94_ref` varchar(40) DEFAULT NULL,
  `stage95_ref` varchar(40) DEFAULT NULL,
  `stage96_ref` varchar(40) DEFAULT NULL,
  `stage97_ref` varchar(40) DEFAULT NULL,
  `stage98_ref` varchar(40) DEFAULT NULL,
  `stage99_ref` varchar(40) DEFAULT NULL,
  `stage100_ref` varchar(40) DEFAULT NULL,
  `ref_stage` varchar(10) NOT NULL,
  `amt` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `affiliate_bonus_history`
--

INSERT INTO `affiliate_bonus_history` (`bid`, `user_id`, `referedby`, `stage1_ref`, `stage2_ref`, `stage3_ref`, `stage4_ref`, `stage5_ref`, `stage6_ref`, `stage7_ref`, `stage8_ref`, `stage9_ref`, `stage10_ref`, `stage11_ref`, `stage12_ref`, `stage13_ref`, `stage14_ref`, `stage15_ref`, `stage16_ref`, `stage17_ref`, `stage18_ref`, `stage19_ref`, `stage20_ref`, `stage21_ref`, `stage22_ref`, `stage23_ref`, `stage24_ref`, `stage25_ref`, `stage26_ref`, `stage27_ref`, `stage28_ref`, `stage29_ref`, `stage30_ref`, `stage31_ref`, `stage32_ref`, `stage33_ref`, `stage34_ref`, `stage35_ref`, `stage36_ref`, `stage37_ref`, `stage38_ref`, `stage39_ref`, `stage40_ref`, `stage41_ref`, `stage42_ref`, `stage43_ref`, `stage44_ref`, `stage45_ref`, `stage46_ref`, `stage47_ref`, `stage48_ref`, `stage49_ref`, `stage50_ref`, `stage51_ref`, `stage52_ref`, `stage53_ref`, `stage54_ref`, `stage55_ref`, `stage56_ref`, `stage57_ref`, `stage58_ref`, `stage59_ref`, `stage60_ref`, `stage61_ref`, `stage62_ref`, `stage63_ref`, `stage64_ref`, `stage65_ref`, `stage66_ref`, `stage67_ref`, `stage68_ref`, `stage69_ref`, `stage70_ref`, `stage71_ref`, `stage72_ref`, `stage73_ref`, `stage74_ref`, `stage75_ref`, `stage76_ref`, `stage77_ref`, `stage78_ref`, `stage79_ref`, `stage80_ref`, `stage81_ref`, `stage82_ref`, `stage83_ref`, `stage84_ref`, `stage85_ref`, `stage86_ref`, `stage87_ref`, `stage88_ref`, `stage89_ref`, `stage90_ref`, `stage91_ref`, `stage92_ref`, `stage93_ref`, `stage94_ref`, `stage95_ref`, `stage96_ref`, `stage97_ref`, `stage98_ref`, `stage99_ref`, `stage100_ref`, `ref_stage`, `amt`, `created`) VALUES
(46, 'roodab', 'adminadmin', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-01-31 00:00:00'),
(75, 'arash', 'roodab', 'roodab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(76, 'arash1', 'arash', 'arash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(77, 'arash2', 'arash', 'arash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(78, 'arash3', 'arash1', 'arash1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(79, 'arash4', 'arash1', 'arash1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(80, 'arash5', 'arash1', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(81, 'arash6', 'arash1', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '10', '2017-02-01 00:00:00'),
(82, 'arash7', 'arash6', 'arash6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(83, 'arash8', 'arash6', 'arash6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(84, 'arash9', 'arash1', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '10', '2017-02-01 00:00:00'),
(85, 'arash10', 'arash1', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '10', '2017-02-01 00:00:00'),
(86, 'arash11', 'arash1', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '10', '2017-02-01 00:00:00'),
(87, 'arash12', 'arash1', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '10', '2017-02-01 00:00:00'),
(88, 'arash13', 'arash1', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '10', '2017-02-01 00:00:00'),
(89, 'arash14', 'arash1', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(90, 'arash16', 'arash7', 'arash7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '10', '2017-02-01 00:00:00'),
(91, 'arash15', 'arash1', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(92, 'arash17', 'arash1', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(93, 'arash18', 'arash1', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(94, 'arash19', 'arash1', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(95, 'arash20', 'arash1', 'arash12', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(96, 'arash21', 'arash1', 'arash12', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(97, 'arash22', 'arash1', 'arash13', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '10', '2017-02-01 00:00:00'),
(98, 'arash23', 'arash1', 'arash13', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(99, 'arash24', 'arash1', 'arash14', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(100, 'arash25', 'arash1', 'arash14', 'arash9', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(101, 'arash26', 'arash1', 'arash15', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(102, 'arash27', 'arash1', 'arash15', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(103, 'arash28', 'arash1', 'arash17', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(104, 'arash29', 'arash1', 'arash17', 'arash10', 'arash4', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(105, 'arash30', 'arash1', 'arash18', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(106, 'arash31', 'arash1', 'arash18', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(107, 'arash32', 'arash1', 'arash19', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00'),
(108, 'arash33', 'arash1', 'arash19', 'arash11', 'arash5', 'arash3', 'arash1', 'arash', 'roodab', 'adminadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', '10', '2017-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `affliate_stage_bonus`
--

CREATE TABLE IF NOT EXISTS `affliate_stage_bonus` (
  `bonus_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `ref_by` varchar(200) NOT NULL,
  `upgrade_stage` varchar(100) NOT NULL,
  `upgrade_cost` varchar(20) NOT NULL,
  `bonus_to` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bonus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `affliate_stage_bonus`
--

INSERT INTO `affliate_stage_bonus` (`bonus_id`, `user_id`, `ref_by`, `upgrade_stage`, `upgrade_cost`, `bonus_to`, `created_on`) VALUES
(43, 'roodab', 'adminadmin', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(44, 'arash', 'roodab', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(45, 'arash1', 'arash', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(46, 'arash3', 'arash1', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(47, 'arash3', 'arash1', '2', '0', 'adminadmin', '2017-02-01 00:00:00'),
(48, 'arash6', 'arash1', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(49, 'arash4', 'arash1', '2', '0', 'adminadmin', '2017-02-01 00:00:00'),
(50, 'arash4', 'arash1', '3', '0', 'adminadmin', '2017-02-01 00:00:00'),
(51, 'arash5', 'arash1', '3', '0', 'adminadmin', '2017-02-01 00:00:00'),
(52, 'arash9', 'arash1', '3', '0', 'adminadmin', '2017-02-01 00:00:00'),
(53, 'arash9', 'arash1', '4', '0', 'adminadmin', '2017-02-01 00:00:00'),
(54, 'arash7', 'arash6', '1', '0', 'adminadmin', '2017-02-01 00:00:00'),
(55, 'arash10', 'arash1', '4', '0', 'adminadmin', '2017-02-01 00:00:00'),
(56, 'arash11', 'arash1', '4', '0', 'adminadmin', '2017-02-01 00:00:00'),
(57, 'arash12', 'arash1', '4', '0', 'adminadmin', '2017-02-01 00:00:00'),
(58, 'arash13', 'arash1', '4', '0', 'adminadmin', '2017-02-01 00:00:00'),
(59, 'arash13', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00'),
(60, 'arash14', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00'),
(61, 'arash15', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00'),
(62, 'arash17', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00'),
(63, 'arash18', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00'),
(64, 'arash19', 'arash1', '5', '0', 'adminadmin', '2017-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `bannerid` double NOT NULL AUTO_INCREMENT,
  `bannerdesc` varchar(100) NOT NULL,
  `bannerhtml` text NOT NULL,
  `banneractive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bannerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `code` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `comment`) VALUES
(1, 'US Doller', 'USD', ''),
(2, 'Australian Dollar', 'AUD', ''),
(3, 'Brazilian Real', 'BRL', ''),
(4, 'Canadian Dollar', 'CAD', ''),
(5, 'Czech Koruna', 'CZK', ''),
(6, 'Danish Krone', 'DKK', ''),
(7, 'Euro', 'EUR', ''),
(8, 'Thai Baht', 'THB', ''),
(9, 'Hong Kong Dollar', 'HKD', ''),
(10, 'Hungarian Forint', 'HUF', ''),
(11, 'Israeli New Sheqel', 'ILS', ''),
(12, 'Japanese Yen', 'JPY', ''),
(13, 'Malaysian Ringgit', 'MYR', ''),
(14, 'Mexican Peso', 'MXN', ''),
(15, 'Norwegian Krone', 'NOK', ''),
(16, 'New Zealand Dollar', 'NZD', ''),
(17, 'Philippine Peso', 'PHP', ''),
(18, 'Polish Zloty ', 'PLN', ''),
(19, 'Pound Sterling', 'GBP', ''),
(20, 'Russian Ruble', 'RUB', ''),
(21, 'Singapore Dollar', 'SGD', ''),
(22, 'Swedish Krona', 'SEK', ''),
(23, 'Swiss Franc', 'CHF', ''),
(24, 'Taiwan New Dollar', 'TWD', ''),
(26, 'Turkish Lira', 'TRY', '');

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
(1, 2, 200.00, '0000-00-00 00:00:00', '2017-01-29 20:24:01', 1),
(2, 4, 400.00, '2017-01-29 19:32:15', '2017-01-29 20:24:19', 1),
(3, 6, 600.00, '2017-01-29 19:33:18', '2017-01-29 20:25:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emailtext`
--

CREATE TABLE IF NOT EXISTS `emailtext` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `etext` text NOT NULL,
  `emailactive` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `emailtext`
--

INSERT INTO `emailtext` (`id`, `code`, `etext`, `emailactive`) VALUES
(1, 'SIGNUP', 'This email is the confirmation for your order you have just signed up. Thank you for your interest. Our team welcomes you to our website. \n\nRegards\nTeam MLM Marketing', 1),
(2, 'FORGOTPASSWORD', 'Hi, \nYou have requested a password on our website and therefore we have sent the password on this email. If you haven''t do it please ignore the email.\n\nRegards\nTeam MLM Marketing', 1),
(5, 'NEWMEMBER', 'You have got new order, bingo!', 1),
(6, 'NEWMEMBER', 'You have got new order, bingo!', 1),
(7, 'SIGNUP', 'This email is the confirmation for your order you have just signed up. Thank you for your interest. Our team welcomes you to our website. \n\nRegards\nTeam MLM Marketing', 1),
(8, 'NEWMEMBER', 'You have got new order, bingo!', 1),
(9, 'SIGNUP', 'This email is the confirmation for your order you have just signed up. Thank you for your interest. Our team welcomes you to our website. \n\nRegards\nTeam MLM Marketing', 1),
(10, 'NEWMEMBER', 'You have got new order, bingo!', 1),
(11, 'SIGNUP', 'This email is the confirmation for your order you have just signed up. Thank you for your interest. Our team welcomes you to our website. \n\nRegards\nTeam MLM Marketing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `posteddate` date NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `body`, `posteddate`, `valid`) VALUES
(14, 'test notification ', 'Details of thesadasdas asdasnotificationsasdasd', '2016-09-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `currency` text NOT NULL,
  `details` text NOT NULL,
  `tax` double NOT NULL DEFAULT '0',
  `mpay` double NOT NULL DEFAULT '0',
  `sbonus` double DEFAULT '0',
  `cdate` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `level1` double NOT NULL DEFAULT '0',
  `stage1_up` double NOT NULL DEFAULT '0',
  `level2` double NOT NULL DEFAULT '0',
  `stage2_up` double NOT NULL DEFAULT '0',
  `level3` double NOT NULL DEFAULT '0',
  `stage3_up` double NOT NULL DEFAULT '0',
  `level4` double NOT NULL DEFAULT '0',
  `stage4_up` double NOT NULL DEFAULT '0',
  `level5` double NOT NULL DEFAULT '0',
  `stage5_up` double NOT NULL DEFAULT '0',
  `level6` double NOT NULL DEFAULT '0',
  `level7` double NOT NULL DEFAULT '0',
  `level8` double NOT NULL DEFAULT '0',
  `level9` double NOT NULL DEFAULT '0',
  `level10` double NOT NULL DEFAULT '0',
  `level11` double NOT NULL DEFAULT '0',
  `level12` double NOT NULL DEFAULT '0',
  `level13` double NOT NULL DEFAULT '0',
  `level14` double NOT NULL DEFAULT '0',
  `level15` double NOT NULL DEFAULT '0',
  `level16` double NOT NULL DEFAULT '0',
  `level17` double NOT NULL DEFAULT '0',
  `level18` double NOT NULL DEFAULT '0',
  `level19` double NOT NULL DEFAULT '0',
  `level20` double NOT NULL DEFAULT '0',
  `level21` double NOT NULL DEFAULT '0',
  `level22` double NOT NULL DEFAULT '0',
  `level23` double NOT NULL DEFAULT '0',
  `level24` double NOT NULL DEFAULT '0',
  `level25` double NOT NULL DEFAULT '0',
  `level26` double NOT NULL DEFAULT '0',
  `level27` double NOT NULL DEFAULT '0',
  `level28` double NOT NULL DEFAULT '0',
  `level29` double NOT NULL DEFAULT '0',
  `level30` double NOT NULL DEFAULT '0',
  `level31` double NOT NULL DEFAULT '0',
  `level32` double NOT NULL DEFAULT '0',
  `level33` double NOT NULL DEFAULT '0',
  `level34` double NOT NULL DEFAULT '0',
  `level35` double NOT NULL DEFAULT '0',
  `level36` double NOT NULL DEFAULT '0',
  `level37` double NOT NULL DEFAULT '0',
  `level38` double NOT NULL DEFAULT '0',
  `level39` double NOT NULL DEFAULT '0',
  `level40` double NOT NULL DEFAULT '0',
  `level41` double NOT NULL DEFAULT '0',
  `level42` double NOT NULL DEFAULT '0',
  `level43` double NOT NULL DEFAULT '0',
  `level44` double NOT NULL DEFAULT '0',
  `level45` double NOT NULL DEFAULT '0',
  `level46` double NOT NULL DEFAULT '0',
  `level47` double NOT NULL DEFAULT '0',
  `level48` double NOT NULL DEFAULT '0',
  `level49` double NOT NULL DEFAULT '0',
  `level50` double NOT NULL DEFAULT '0',
  `level51` double NOT NULL DEFAULT '0',
  `level52` double NOT NULL DEFAULT '0',
  `level53` double NOT NULL DEFAULT '0',
  `level54` double NOT NULL DEFAULT '0',
  `level55` double NOT NULL DEFAULT '0',
  `level56` double NOT NULL DEFAULT '0',
  `level57` double NOT NULL DEFAULT '0',
  `level58` double NOT NULL DEFAULT '0',
  `level59` double NOT NULL DEFAULT '0',
  `level60` double NOT NULL DEFAULT '0',
  `level61` double NOT NULL DEFAULT '0',
  `level62` double NOT NULL DEFAULT '0',
  `level63` double NOT NULL DEFAULT '0',
  `level64` double NOT NULL DEFAULT '0',
  `level65` double NOT NULL DEFAULT '0',
  `level66` double NOT NULL DEFAULT '0',
  `level67` double NOT NULL DEFAULT '0',
  `level68` double NOT NULL DEFAULT '0',
  `level69` double NOT NULL DEFAULT '0',
  `level70` double NOT NULL DEFAULT '0',
  `level71` double NOT NULL DEFAULT '0',
  `level72` double NOT NULL DEFAULT '0',
  `level73` double NOT NULL DEFAULT '0',
  `level74` double NOT NULL DEFAULT '0',
  `level75` double NOT NULL DEFAULT '0',
  `level76` double NOT NULL DEFAULT '0',
  `level77` double NOT NULL DEFAULT '0',
  `level78` double NOT NULL DEFAULT '0',
  `level79` double NOT NULL DEFAULT '0',
  `level80` double NOT NULL DEFAULT '0',
  `level81` double NOT NULL DEFAULT '0',
  `level82` double NOT NULL DEFAULT '0',
  `level83` double NOT NULL DEFAULT '0',
  `level84` double NOT NULL DEFAULT '0',
  `level85` double NOT NULL DEFAULT '0',
  `level86` double NOT NULL DEFAULT '0',
  `level87` double NOT NULL DEFAULT '0',
  `level88` double NOT NULL DEFAULT '0',
  `level89` double NOT NULL DEFAULT '0',
  `level90` double NOT NULL DEFAULT '0',
  `level91` double NOT NULL DEFAULT '0',
  `level92` double NOT NULL DEFAULT '0',
  `level93` double NOT NULL DEFAULT '0',
  `level94` double NOT NULL DEFAULT '0',
  `level95` double NOT NULL DEFAULT '0',
  `level96` double NOT NULL DEFAULT '0',
  `level97` double NOT NULL DEFAULT '0',
  `level98` double NOT NULL DEFAULT '0',
  `level99` double NOT NULL DEFAULT '0',
  `level100` double NOT NULL DEFAULT '0',
  `stage6_up` double NOT NULL DEFAULT '0',
  `stage7_up` double NOT NULL DEFAULT '0',
  `stage8_up` double NOT NULL DEFAULT '0',
  `stage9_up` double NOT NULL DEFAULT '0',
  `stage10_up` double NOT NULL DEFAULT '0',
  `stage11_up` double NOT NULL DEFAULT '0',
  `stage12_up` double NOT NULL DEFAULT '0',
  `stage13_up` double NOT NULL DEFAULT '0',
  `stage14_up` double NOT NULL DEFAULT '0',
  `stage15_up` double NOT NULL DEFAULT '0',
  `stage16_up` double NOT NULL DEFAULT '0',
  `stage17_up` double NOT NULL DEFAULT '0',
  `stage18_up` double NOT NULL DEFAULT '0',
  `stage19_up` double NOT NULL DEFAULT '0',
  `stage20_up` double NOT NULL DEFAULT '0',
  `stage21_up` double NOT NULL DEFAULT '0',
  `stage22_up` double NOT NULL DEFAULT '0',
  `stage23_up` double NOT NULL DEFAULT '0',
  `stage24_up` double NOT NULL DEFAULT '0',
  `stage25_up` double NOT NULL DEFAULT '0',
  `stage26_up` double NOT NULL DEFAULT '0',
  `stage27_up` double NOT NULL DEFAULT '0',
  `stage28_up` double NOT NULL DEFAULT '0',
  `stage29_up` double NOT NULL DEFAULT '0',
  `stage30_up` double NOT NULL DEFAULT '0',
  `stage31_up` double NOT NULL DEFAULT '0',
  `stage32_up` double NOT NULL DEFAULT '0',
  `stage33_up` double NOT NULL DEFAULT '0',
  `stage34_up` double NOT NULL DEFAULT '0',
  `stage35_up` double NOT NULL DEFAULT '0',
  `stage36_up` double NOT NULL DEFAULT '0',
  `stage37_up` double NOT NULL DEFAULT '0',
  `stage38_up` double NOT NULL DEFAULT '0',
  `stage39_up` double NOT NULL DEFAULT '0',
  `stage40_up` double NOT NULL DEFAULT '0',
  `stage41_up` double NOT NULL DEFAULT '0',
  `stage42_up` double NOT NULL DEFAULT '0',
  `stage43_up` double NOT NULL DEFAULT '0',
  `stage44_up` double NOT NULL DEFAULT '0',
  `stage45_up` double NOT NULL DEFAULT '0',
  `stage46_up` double NOT NULL DEFAULT '0',
  `stage47_up` double NOT NULL DEFAULT '0',
  `stage48_up` double NOT NULL DEFAULT '0',
  `stage49_up` double NOT NULL DEFAULT '0',
  `stage50_up` double NOT NULL DEFAULT '0',
  `stage51_up` double NOT NULL DEFAULT '0',
  `stage52_up` double NOT NULL DEFAULT '0',
  `stage53_up` double NOT NULL DEFAULT '0',
  `stage54_up` double NOT NULL DEFAULT '0',
  `stage55_up` double NOT NULL DEFAULT '0',
  `stage56_up` double NOT NULL DEFAULT '0',
  `stage57_up` double NOT NULL DEFAULT '0',
  `stage58_up` double NOT NULL DEFAULT '0',
  `stage59_up` double NOT NULL DEFAULT '0',
  `stage60_up` double NOT NULL DEFAULT '0',
  `stage61_up` double NOT NULL DEFAULT '0',
  `stage62_up` double NOT NULL DEFAULT '0',
  `stage63_up` double NOT NULL DEFAULT '0',
  `stage64_up` double NOT NULL DEFAULT '0',
  `stage65_up` double NOT NULL DEFAULT '0',
  `stage66_up` double NOT NULL DEFAULT '0',
  `stage67_up` double NOT NULL DEFAULT '0',
  `stage68_up` double NOT NULL DEFAULT '0',
  `stage69_up` double NOT NULL DEFAULT '0',
  `stage70_up` double NOT NULL DEFAULT '0',
  `stage71_up` double NOT NULL DEFAULT '0',
  `stage72_up` double NOT NULL DEFAULT '0',
  `stage73_up` double NOT NULL DEFAULT '0',
  `stage74_up` double NOT NULL DEFAULT '0',
  `stage75_up` double NOT NULL DEFAULT '0',
  `stage76_up` double NOT NULL DEFAULT '0',
  `stage77_up` double NOT NULL DEFAULT '0',
  `stage78_up` double NOT NULL DEFAULT '0',
  `stage79_up` double NOT NULL DEFAULT '0',
  `stage80_up` double NOT NULL DEFAULT '0',
  `stage81_up` double NOT NULL DEFAULT '0',
  `stage82_up` double NOT NULL DEFAULT '0',
  `stage83_up` double NOT NULL DEFAULT '0',
  `stage84_up` double NOT NULL DEFAULT '0',
  `stage85_up` double NOT NULL DEFAULT '0',
  `stage86_up` double NOT NULL DEFAULT '0',
  `stage87_up` double NOT NULL DEFAULT '0',
  `stage88_up` double NOT NULL DEFAULT '0',
  `stage89_up` double NOT NULL DEFAULT '0',
  `stage90_up` double NOT NULL DEFAULT '0',
  `stage91_up` double NOT NULL DEFAULT '0',
  `stage92_up` double NOT NULL DEFAULT '0',
  `stage93_up` double NOT NULL DEFAULT '0',
  `stage94_up` double NOT NULL DEFAULT '0',
  `stage95_up` double NOT NULL DEFAULT '0',
  `stage96_up` double NOT NULL DEFAULT '0',
  `stage97_up` double NOT NULL DEFAULT '0',
  `stage98_up` double NOT NULL DEFAULT '0',
  `stage99_up` double NOT NULL DEFAULT '0',
  `stage100_up` double NOT NULL DEFAULT '0',
  `gateway` int(1) NOT NULL DEFAULT '3',
  `validity` int(5) NOT NULL DEFAULT '0',
  `indirect_ref_amt` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `currency`, `details`, `tax`, `mpay`, `sbonus`, `cdate`, `active`, `level1`, `stage1_up`, `level2`, `stage2_up`, `level3`, `stage3_up`, `level4`, `stage4_up`, `level5`, `stage5_up`, `level6`, `level7`, `level8`, `level9`, `level10`, `level11`, `level12`, `level13`, `level14`, `level15`, `level16`, `level17`, `level18`, `level19`, `level20`, `level21`, `level22`, `level23`, `level24`, `level25`, `level26`, `level27`, `level28`, `level29`, `level30`, `level31`, `level32`, `level33`, `level34`, `level35`, `level36`, `level37`, `level38`, `level39`, `level40`, `level41`, `level42`, `level43`, `level44`, `level45`, `level46`, `level47`, `level48`, `level49`, `level50`, `level51`, `level52`, `level53`, `level54`, `level55`, `level56`, `level57`, `level58`, `level59`, `level60`, `level61`, `level62`, `level63`, `level64`, `level65`, `level66`, `level67`, `level68`, `level69`, `level70`, `level71`, `level72`, `level73`, `level74`, `level75`, `level76`, `level77`, `level78`, `level79`, `level80`, `level81`, `level82`, `level83`, `level84`, `level85`, `level86`, `level87`, `level88`, `level89`, `level90`, `level91`, `level92`, `level93`, `level94`, `level95`, `level96`, `level97`, `level98`, `level99`, `level100`, `stage6_up`, `stage7_up`, `stage8_up`, `stage9_up`, `stage10_up`, `stage11_up`, `stage12_up`, `stage13_up`, `stage14_up`, `stage15_up`, `stage16_up`, `stage17_up`, `stage18_up`, `stage19_up`, `stage20_up`, `stage21_up`, `stage22_up`, `stage23_up`, `stage24_up`, `stage25_up`, `stage26_up`, `stage27_up`, `stage28_up`, `stage29_up`, `stage30_up`, `stage31_up`, `stage32_up`, `stage33_up`, `stage34_up`, `stage35_up`, `stage36_up`, `stage37_up`, `stage38_up`, `stage39_up`, `stage40_up`, `stage41_up`, `stage42_up`, `stage43_up`, `stage44_up`, `stage45_up`, `stage46_up`, `stage47_up`, `stage48_up`, `stage49_up`, `stage50_up`, `stage51_up`, `stage52_up`, `stage53_up`, `stage54_up`, `stage55_up`, `stage56_up`, `stage57_up`, `stage58_up`, `stage59_up`, `stage60_up`, `stage61_up`, `stage62_up`, `stage63_up`, `stage64_up`, `stage65_up`, `stage66_up`, `stage67_up`, `stage68_up`, `stage69_up`, `stage70_up`, `stage71_up`, `stage72_up`, `stage73_up`, `stage74_up`, `stage75_up`, `stage76_up`, `stage77_up`, `stage78_up`, `stage79_up`, `stage80_up`, `stage81_up`, `stage82_up`, `stage83_up`, `stage84_up`, `stage85_up`, `stage86_up`, `stage87_up`, `stage88_up`, `stage89_up`, `stage90_up`, `stage91_up`, `stage92_up`, `stage93_up`, `stage94_up`, `stage95_up`, `stage96_up`, `stage97_up`, `stage98_up`, `stage99_up`, `stage100_up`, `gateway`, `validity`, `indirect_ref_amt`) VALUES
(1, 'Joining Package', 30, 'USD', 'Newly Joining package', 0, 300, 0, '2016-09-15', 0, 30, 50, 30, 261, 30, 783, 30, 2349, 30, 7047, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 365, 1),
(2, 'Marketing And Advertising Page', 50, 'USD', ' Marketing And Advertising Page', 0, 7000, 49, '2016-11-12', 0, 10, 15, 20, 15, 30, 15, 40, 15, 30, 20, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33, 3),
(8, 'Marketing', 3, 'USD', 'marketing package', 0, 3000, 10, '2017-01-31', 1, 10, 0, 10, 0, 10, 0, 10, 0, 10, 0, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE IF NOT EXISTS `paymentgateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `comment` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `paymentgateway`
--

INSERT INTO `paymentgateway` (`id`, `Name`, `status`, `comment`, `date`) VALUES
(1, 'PayPal', 1, 0, '0000-00-00'),
(2, 'Cash On Delivery', 1, 0, '0000-00-00'),
(3, 'Payza', 0, 0, '0000-00-00'),
(4, 'SolidTrustPay', 0, 0, '0000-00-00'),
(5, 'Marketer Balance', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `payment_amount` double NOT NULL DEFAULT '0',
  `payment_status` int(1) NOT NULL DEFAULT '0',
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `paypalpayments`
--

CREATE TABLE IF NOT EXISTS `paypalpayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `transacid` text NOT NULL,
  `price` double DEFAULT '0',
  `currency` text NOT NULL,
  `date` date NOT NULL,
  `cod` int(1) NOT NULL DEFAULT '0',
  `renew` int(1) NOT NULL DEFAULT '0',
  `renacid` int(9) NOT NULL COMMENT 'Package choosen at renew time, id of package',
  `pckid` double NOT NULL,
  `gateway` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `paypalpayments`
--

INSERT INTO `paypalpayments` (`id`, `orderid`, `transacid`, `price`, `currency`, `date`, `cod`, `renew`, `renacid`, `pckid`, `gateway`) VALUES
(95, 101, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(94, 100, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(93, 99, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(92, 98, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(91, 97, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(90, 96, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(89, 95, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(88, 94, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(87, 93, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(86, 92, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(85, 91, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(84, 90, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(83, 89, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(82, 88, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(81, 87, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(80, 86, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(79, 85, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(78, 84, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(77, 83, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(76, 82, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(75, 81, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(74, 80, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(73, 79, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(72, 78, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(71, 77, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(70, 76, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(69, 75, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(68, 74, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(67, 73, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(66, 71, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(65, 70, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(64, 69, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(63, 68, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D'),
(62, 67, 'C.O.D', 3, 'USD', '2017-02-01', 1, 0, 0, 8, 'C.O.D');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `email` varchar(100) NOT NULL DEFAULT 'Enter Your E-Mail Address',
  `sno` int(9) NOT NULL,
  `wlink` varchar(100) NOT NULL DEFAULT 'www.yourwebsite.com',
  `invoicedetails` text NOT NULL,
  `coname` text NOT NULL,
  `fblink` text NOT NULL,
  `twitterlink` text NOT NULL,
  `paypalid` text NOT NULL,
  `maintain` int(1) NOT NULL DEFAULT '0',
  `alwdpayment` int(11) NOT NULL DEFAULT '0' COMMENT 'user will get payment via paypal or via payment in bank account.',
  `minmobile` double NOT NULL,
  `maxmobile` double NOT NULL,
  `footer` varchar(50) NOT NULL,
  `header` varchar(50) NOT NULL,
  `payzaid` varchar(128) NOT NULL DEFAULT 'Not Available',
  `solidtrustid` varchar(128) NOT NULL DEFAULT 'Not Available',
  `solidbutton` varchar(128) NOT NULL DEFAULT 'Not Available',
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`email`, `sno`, `wlink`, `invoicedetails`, `coname`, `fblink`, `twitterlink`, `paypalid`, `maintain`, `alwdpayment`, `minmobile`, `maxmobile`, `footer`, `header`, `payzaid`, `solidtrustid`, `solidbutton`) VALUES
('sridhar.subit@gmail.com', 0, 'http://roodabatoz.com/demo2', 'coimbatore, India', 'Roodabatoz ', 'https://www.facebook.com/ROODAB1/', 'https://twitter.com/@roodabatoz', 'admin@arycapital.com.my', 0, 3, 0, 0, 'Powered By - Roodabatoz:)', 'Roodabatoz', 'Payza', 'Solid', 'Button');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_history`
--

CREATE TABLE IF NOT EXISTS `transfer_history` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_from` varchar(70) NOT NULL,
  `transfer_to` varchar(70) NOT NULL,
  `amt` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
