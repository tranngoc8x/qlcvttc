-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 10:34 AM
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
-- Table structure for table `elecs`
--

CREATE TABLE IF NOT EXISTS `elecs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `elec` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=336 ;

--
-- Dumping data for table `elecs`
--

INSERT INTO `elecs` (`id`, `date`, `elec`, `rooms_id`) VALUES
(317, '2013-04-01', 11, 1),
(318, '2013-04-01', 11, 2),
(319, '2013-04-01', 11, 4),
(320, '2013-04-01', 11, 3),
(321, '2013-04-02', 123, 1),
(322, '2013-04-02', 120, 2),
(323, '2013-04-02', 90, 4),
(324, '2013-04-02', 70, 3),
(325, '2013-03-01', 123, 1),
(326, '2013-03-01', 1231, 2),
(327, '2013-03-01', 123, 4),
(328, '2013-03-31', 1, 1),
(329, '2013-03-31', 1, 2),
(330, '2013-03-31', 1, 4),
(331, '2013-03-31', 1, 3),
(332, '2013-04-03', 200, 1),
(333, '2013-04-02', 120, 5),
(334, '2013-04-04', 200, 5),
(335, '2013-04-05', 200, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
