-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2013 at 08:24 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbqlcvttc`
--

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `note` mediumtext CHARACTER SET utf8,
  `groups_id` int(11) NOT NULL,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `note`, `groups_id`, `order`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', 1, 1),
(2, 'PhÃ³ giÃ¡m Ä‘á»‘c', 'PhÃ³ giÃ¡m Ä‘á»‘c', 2, 2),
(3, 'PhÃ³ giÃ¡m Ä‘á»‘c', 'PhÃ³ giÃ¡m Ä‘á»‘c', 3, 2),
(4, 'TrÆ°á»Ÿng phÃ²ng', 'TrÆ°á»Ÿng phÃ²ng', 4, 3),
(5, 'NhÃ¢n sá»±', 'NhÃ¢n sá»±', 5, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
