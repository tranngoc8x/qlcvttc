-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2013 at 09:52 AM
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
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(43, NULL, NULL, NULL, 'controllers', 1, 120),
(44, 43, NULL, NULL, 'Pages', 2, 5),
(45, 44, NULL, NULL, 'display', 3, 4),
(46, 43, NULL, NULL, 'Posts', 6, 17),
(47, 46, NULL, NULL, 'index', 7, 8),
(48, 46, NULL, NULL, 'detail', 9, 10),
(49, 46, NULL, NULL, 'add', 11, 12),
(50, 46, NULL, NULL, 'edit', 13, 14),
(51, 46, NULL, NULL, 'delete', 15, 16),
(52, 43, NULL, NULL, 'Users', 18, 37),
(53, 52, NULL, NULL, 'login', 19, 20),
(54, 52, NULL, NULL, 'login2', 21, 22),
(55, 52, NULL, NULL, 'logout', 23, 24),
(56, 52, NULL, NULL, 'index', 25, 26),
(57, 52, NULL, NULL, 'view', 27, 28),
(58, 52, NULL, NULL, 'add', 29, 30),
(59, 52, NULL, NULL, 'edit', 31, 32),
(60, 52, NULL, NULL, 'delete', 33, 34),
(61, 52, NULL, NULL, 'mdelete', 35, 36),
(62, 43, NULL, NULL, 'Acl', 38, 83),
(63, 62, NULL, NULL, 'Acos', 39, 46),
(64, 63, NULL, NULL, 'index', 40, 41),
(65, 63, NULL, NULL, 'empty_acos', 42, 43),
(66, 63, NULL, NULL, 'build_acl', 44, 45),
(67, 62, NULL, NULL, 'Aros', 47, 82),
(68, 67, NULL, NULL, 'index', 48, 49),
(69, 67, NULL, NULL, 'check', 50, 51),
(70, 67, NULL, NULL, 'users', 52, 53),
(71, 67, NULL, NULL, 'update_user_role', 54, 55),
(72, 67, NULL, NULL, 'ajax_role_permissions', 56, 57),
(73, 67, NULL, NULL, 'role_permissions', 58, 59),
(74, 67, NULL, NULL, 'user_permissions', 60, 61),
(75, 67, NULL, NULL, 'empty_permissions', 62, 63),
(76, 67, NULL, NULL, 'clear_user_specific_permissions', 64, 65),
(77, 67, NULL, NULL, 'grant_all_controllers', 66, 67),
(78, 67, NULL, NULL, 'deny_all_controllers', 68, 69),
(79, 67, NULL, NULL, 'get_role_controller_permission', 70, 71),
(80, 67, NULL, NULL, 'grant_role_permission', 72, 73),
(81, 67, NULL, NULL, 'deny_role_permission', 74, 75),
(82, 67, NULL, NULL, 'get_user_controller_permission', 76, 77),
(83, 67, NULL, NULL, 'grant_user_permission', 78, 79),
(84, 67, NULL, NULL, 'deny_user_permission', 80, 81),
(85, 43, NULL, NULL, 'Groups', 84, 95),
(86, 85, NULL, NULL, 'index', 85, 86),
(87, 85, NULL, NULL, 'view', 87, 88),
(88, 85, NULL, NULL, 'add', 89, 90),
(89, 85, NULL, NULL, 'edit', 91, 92),
(90, 85, NULL, NULL, 'delete', 93, 94),
(91, 43, NULL, NULL, 'Positions', 96, 107),
(92, 91, NULL, NULL, 'index', 97, 98),
(93, 91, NULL, NULL, 'view', 99, 100),
(94, 91, NULL, NULL, 'add', 101, 102),
(95, 91, NULL, NULL, 'edit', 103, 104),
(96, 91, NULL, NULL, 'delete', 105, 106),
(97, 43, NULL, NULL, 'Tasks', 108, 119),
(98, 97, NULL, NULL, 'index', 109, 110),
(99, 97, NULL, NULL, 'view', 111, 112),
(100, 97, NULL, NULL, 'add', 113, 114),
(101, 97, NULL, NULL, 'edit', 115, 116),
(102, 97, NULL, NULL, 'delete', 117, 118);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, 'Giám ??c', 1, 4),
(2, NULL, 'Group', 2, 'Phó Giám ??c', 5, 10),
(3, 1, 'User', 1, 'admin', 2, 3),
(4, 2, 'User', 2, '', 6, 7),
(5, NULL, 'Group', 3, 'PhÃ²ng tÃ i chÃ­nh', 11, 14),
(6, 5, 'User', 3, '', 12, 13),
(7, NULL, 'User', 4, '', 15, 16),
(12, NULL, 'Group', 4, 'Ban quáº£n lÃ½', 17, 20),
(13, NULL, 'Group', 5, 'PhÃ²ng nhÃ¢n sá»±', 21, 22),
(14, 12, 'User', 9, '', 18, 19),
(15, 2, 'User', 10, '', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(5, 3, 45, '1', '1', '1', '1'),
(6, 3, 49, '1', '1', '1', '1'),
(7, 3, 51, '1', '1', '1', '1'),
(8, 3, 48, '1', '1', '1', '1'),
(9, 3, 50, '1', '1', '1', '1'),
(10, 3, 47, '1', '1', '1', '1'),
(11, 3, 66, '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `note` mediumtext,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `note`, `order`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'PhÃ²ng giÃ¡m Ä‘á»‘c', 1),
(2, 'PhÃ²ng káº¿ hoáº¡ch', 'PhÃ²ng káº¿ hoáº¡ch', 2),
(3, 'PhÃ²ng tÃ i chÃ­nh', 'PhÃ²ng tÃ i chÃ­nh', 2),
(4, 'Ban quáº£n lÃ½', 'Ban quáº£n lÃ½', 3),
(5, 'PhÃ²ng nhÃ¢n sá»±', 'PhÃ²ng nhÃ¢n sá»±', 4);

-- --------------------------------------------------------

--
-- Table structure for table `linhvucs`
--

DROP TABLE IF EXISTS `linhvucs`;
CREATE TABLE IF NOT EXISTS `linhvucs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `linhvucs`
--

INSERT INTO `linhvucs` (`id`, `name`, `note`) VALUES
(1, '234', '234'),
(2, '4325676543', '34567543');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `ipadr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `users_id`, `ipadr`, `time`) VALUES
(1, 1, '::1', '2013-03-12 03:46:43'),
(3, 8, '::1', '2013-03-07 04:19:43'),
(4, 9, '::1', '2013-03-07 05:27:12'),
(5, 10, '::1', '2013-03-08 04:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `note` mediumtext,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
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

-- --------------------------------------------------------

--
-- Table structure for table `positions_groups`
--

DROP TABLE IF EXISTS `positions_groups`;
CREATE TABLE IF NOT EXISTS `positions_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positions_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `taskid` varchar(30) NOT NULL,
  `types_id` int(11) NOT NULL,
  `linhvucs_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `start`, `end`, `users_id`, `status`, `taskid`, `types_id`, `linhvucs_id`) VALUES
(1, 'BÃ¡o cÃ¡o tuáº§n', 'BÃ¡o cÃ¡o tuáº§n', '2013-07-03 12:00:00', '2013-08-03 12:00:00', 1, 1, 'QLCV/TTC-1', 1, 1),
(2, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-08 12:00:00', 1, 2, 'QLCV/TTC-2', 2, 2),
(3, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-11 12:00:00', 1, 1, 'QLCV-TTC-3', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tfiles`
--

DROP TABLE IF EXISTS `tfiles`;
CREATE TABLE IF NOT EXISTS `tfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int(2) NOT NULL DEFAULT '1',
  `tasks_id` int(11) NOT NULL,
  `folder` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tfiles`
--

INSERT INTO `tfiles` (`id`, `name`, `type`, `tasks_id`, `folder`) VALUES
(63, '120313093546_bulb24.png', 2, 2, '03-2013'),
(64, '120313094331_bulb24.png', 2, 2, '03-2013'),
(65, '120313094343_alert_medium.gif', 2, 2, '03-2013'),
(66, '120313094610_success_medium.gif', 2, 2, '03-2013'),
(67, '120313094703_important16.png', 3, 2, '03-2013');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `note`) VALUES
(1, '789789', '78978'),
(2, '456765', '567876');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `positions_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`) VALUES
(1, 'Tran Ngoc', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1),
(2, 'Ngá»c Tháº¯ng', 'tranngoc8x', '', 2, 2),
(3, 'Thu Trang', 'nttrang', '', 3, 3),
(4, 'NhÃ¢n sá»± 1', 'nsu1', '', 5, 5),
(9, 'Quáº£n lÃ½', 'qly1', '', 4, 4),
(10, 'Tháº¯ng Tráº§n', 'thangtn', '', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertasks`
--

DROP TABLE IF EXISTS `usertasks`;
CREATE TABLE IF NOT EXISTS `usertasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `tasks_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `users_id`, `tasks_id`, `status`) VALUES
(8, 4, 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
