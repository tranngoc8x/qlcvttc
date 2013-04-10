-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 10:35 AM
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
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `add` varchar(255) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `ngaytl` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `tax`, `email`, `phone`, `add`, `fax`, `agent`, `chucvu`, `ngaytl`) VALUES
(7, 'CÃ´ng ty TNHH Potter', '1234p7', 'potter123@gmail.com', '123456789', 'TÃ²a nhÃ  abc', '', 'Nguyá»…n Thu Trang', 'GiÃ¡m Ä‘á»‘c', '2007-07-07'),
(8, 'CÃ´ng ty CPTM Tran Ngoc', '88888', 'Tranngoc@gmail.com', '987654321', 'TÃ²a nhÃ  abc', '12345678', 'Tráº§n Ngá»c Tháº¯ng', 'GiÃ¡m Ä‘á»‘c', '2000-04-10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
