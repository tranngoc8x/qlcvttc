-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 09:45 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 114),
(2, 1, NULL, NULL, 'Groups', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Positions', 14, 27),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 8, NULL, NULL, 'mutildelete', 25, 26),
(15, 1, NULL, NULL, 'Tasks', 28, 53),
(16, 15, NULL, NULL, 'index', 29, 30),
(17, 15, NULL, NULL, 'view', 31, 32),
(18, 15, NULL, NULL, 'add', 33, 34),
(19, 15, NULL, NULL, 'edit', 35, 36),
(20, 15, NULL, NULL, 'delete', 37, 38),
(21, 15, NULL, NULL, 'listns', 39, 40),
(22, 15, NULL, NULL, 'listPB', 41, 42),
(23, 15, NULL, NULL, 'listPBgv', 43, 44),
(24, 15, NULL, NULL, 'change', 45, 46),
(25, 15, NULL, NULL, 'getNV', 47, 48),
(26, 15, NULL, NULL, 'download', 49, 50),
(27, 15, NULL, NULL, 'addfile', 51, 52),
(28, 1, NULL, NULL, 'Users', 54, 67),
(29, 28, NULL, NULL, 'login', 55, 56),
(30, 28, NULL, NULL, 'index', 57, 58),
(31, 28, NULL, NULL, 'view', 59, 60),
(32, 28, NULL, NULL, 'add', 61, 62),
(33, 28, NULL, NULL, 'edit', 63, 64),
(34, 28, NULL, NULL, 'changepassword', 65, 66),
(35, 1, NULL, NULL, 'Acl', 68, 113),
(36, 35, NULL, NULL, 'Acos', 69, 76),
(37, 36, NULL, NULL, 'index', 70, 71),
(38, 36, NULL, NULL, 'empty_acos', 72, 73),
(39, 36, NULL, NULL, 'build_acl', 74, 75),
(40, 35, NULL, NULL, 'Aros', 77, 112),
(41, 40, NULL, NULL, 'index', 78, 79),
(42, 40, NULL, NULL, 'check', 80, 81),
(43, 40, NULL, NULL, 'users', 82, 83),
(44, 40, NULL, NULL, 'update_user_role', 84, 85),
(45, 40, NULL, NULL, 'ajax_role_permissions', 86, 87),
(46, 40, NULL, NULL, 'role_permissions', 88, 89),
(47, 40, NULL, NULL, 'user_permissions', 90, 91),
(48, 40, NULL, NULL, 'empty_permissions', 92, 93),
(49, 40, NULL, NULL, 'clear_user_specific_permissions', 94, 95),
(50, 40, NULL, NULL, 'grant_all_controllers', 96, 97),
(51, 40, NULL, NULL, 'deny_all_controllers', 98, 99),
(52, 40, NULL, NULL, 'get_role_controller_permission', 100, 101),
(53, 40, NULL, NULL, 'grant_role_permission', 102, 103),
(54, 40, NULL, NULL, 'deny_role_permission', 104, 105),
(55, 40, NULL, NULL, 'get_user_controller_permission', 106, 107),
(56, 40, NULL, NULL, 'grant_user_permission', 108, 109),
(57, 40, NULL, NULL, 'deny_user_permission', 110, 111);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 4, 'Ban quáº£n lÃ½', 1, 4),
(2, NULL, 'Group', 1, 'GiÃ¡m Ä‘á»‘c', 5, 8),
(3, NULL, 'Group', 6, 'Káº¿ toÃ¡n', 9, 12),
(4, NULL, 'Group', 2, 'PhÃ²ng káº¿ hoáº¡ch', 13, 18),
(5, NULL, 'Group', 5, 'PhÃ²ng nhÃ¢n sá»±', 19, 22),
(6, NULL, 'Group', 3, 'PhÃ²ng tÃ i chÃ­nh', 23, 26),
(7, 2, 'User', 1, 'admin', 6, 7),
(8, 3, 'User', 11, 'ketoan', 10, 11),
(9, 5, 'User', 4, 'nsu1', 20, 21),
(10, 6, 'User', 3, 'nttrang', 24, 25),
(11, 1, 'User', 9, 'qly1', 2, 3),
(12, 4, 'User', 10, 'thangtn', 14, 15),
(13, 4, 'User', 2, 'tranngoc8x', 16, 17);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `failtasks`
--

DROP TABLE IF EXISTS `failtasks`;
CREATE TABLE IF NOT EXISTS `failtasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tasks_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `lydo` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `failtasks`
--

INSERT INTO `failtasks` (`id`, `tasks_id`, `users_id`, `lydo`, `status`) VALUES
(1, 2, 4, 'LÃ m láº¡i theo yÃªu cáº§u chá»‰ Ä‘áº¡o', 3),
(4, 2, 4, 'YÃªu cáº§u lÃ m láº¡i', 3),
(5, 3, 4, 'KhÃ´ng kháº£ thi', 3);

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
  `magroup` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `note`, `order`, `magroup`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'PhÃ²ng giÃ¡m Ä‘á»‘c', 1, 'GD'),
(2, 'PhÃ²ng káº¿ hoáº¡ch', 'PhÃ²ng káº¿ hoáº¡ch', 2, 'PGD'),
(3, 'PhÃ²ng tÃ i chÃ­nh', 'PhÃ²ng tÃ i chÃ­nh', 2, 'PGD'),
(4, 'Ban quáº£n lÃ½', 'Ban quáº£n lÃ½', 3, 'BQL'),
(5, 'PhÃ²ng nhÃ¢n sá»±', 'PhÃ²ng nhÃ¢n sá»±', 4, 'NS'),
(6, 'Káº¿ toÃ¡n', 'Káº¿ toÃ¡n', 3, 'KT');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `users_id`, `ipadr`, `time`) VALUES
(1, 1, '::1', '2013-03-20 04:23:40'),
(3, 8, '::1', '2013-03-14 10:40:55'),
(4, 9, '::1', '2013-03-21 10:13:45'),
(5, 10, '::1', '2013-03-08 04:46:30'),
(6, 11, '::1', '2013-03-13 05:15:47'),
(7, 12, '::1', '2013-03-13 05:15:55');

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
  `done` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `start`, `end`, `users_id`, `status`, `taskid`, `types_id`, `linhvucs_id`, `done`) VALUES
(1, 'BÃ¡o cÃ¡o tuáº§n', 'BÃ¡o cÃ¡o tuáº§n', '2013-07-03 12:00:00', '2013-08-03 12:00:00', 9, 11, 'QLCV/TTC-1', 1, 1, 2),
(2, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-08 12:00:00', 9, 5, 'QLCV/TTC-2', 2, 2, 1),
(3, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-11 12:00:00', 9, 3, 'QLCV-TTC-3', 2, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tfiles`
--

INSERT INTO `tfiles` (`id`, `name`, `type`, `tasks_id`, `folder`) VALUES
(63, '120313093546_bulb24.png', 2, 2, '03-2013'),
(64, '120313094331_bulb24.png', 2, 2, '03-2013'),
(65, '120313094343_alert_medium.gif', 2, 2, '03-2013'),
(66, '120313094610_success_medium.gif', 2, 2, '03-2013'),
(67, '120313094703_important16.png', 3, 2, '03-2013'),
(71, '150313110904_IMG_20130311_115815.jpg', 1, 24, '03-2013'),
(72, '150313110904_IMG_20130311_115822.jpg', 1, 24, '03-2013'),
(73, '150313110904_IMG_20130311_115824.jpg', 1, 24, '03-2013');

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
  `quequan` mediumtext NOT NULL,
  `gioitinh` tinyint(4) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`, `quequan`, `gioitinh`, `datestart`, `dateend`, `birth`) VALUES
(1, 'Tran Ngoc', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1, '0', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'Ngá»c Tháº¯ng', 'tranngoc8x', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 2, 'Ninh bÃ¬nh', 0, '2013-01-01', '2033-01-01', '0000-00-00'),
(3, 'Thu Trang', 'nttrang', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 3, 3, '0', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 'NhÃ¢n sá»± 1', 'nsu1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 5, '0', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(9, 'Quáº£n lÃ½', 'qly1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 4, 4, '0', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(10, 'Tháº¯ng Tráº§n', 'thangtn', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 2, 'Ninh bÃ¬nh', 0, '2033-01-01', '2033-01-01', '0000-00-00'),
(11, 'Káº¿ toÃ¡n', 'ketoan', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 6, '0', 0, '0000-00-00', '0000-00-00', '0000-00-00');

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
  `done` int(2) NOT NULL DEFAULT '1',
  `wrong` int(2) NOT NULL,
  `users_chuyen` int(11) NOT NULL,
  `noidung` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `users_id`, `tasks_id`, `status`, `done`, `wrong`, `users_chuyen`, `noidung`) VALUES
(33, 4, 1, 2, 2, 0, 9, ''),
(35, 9, 1, 3, 2, 0, 4, ''),
(36, 2, 1, 4, 2, 0, 9, ''),
(37, 3, 1, 5, 2, 0, 2, ''),
(38, 11, 1, 6, 2, 0, 3, ''),
(39, 1, 1, 7, 2, 0, 11, ''),
(40, 11, 1, 8, 2, 0, 1, ''),
(41, 9, 1, 9, 2, 0, 11, ''),
(43, 4, 1, 10, 2, 0, 9, ''),
(49, 9, 1, 11, 2, 0, 4, ''),
(50, 4, 2, 2, 2, 0, 9, ''),
(51, 9, 2, 3, 2, 0, 4, 'Lam dung yeu cau'),
(52, 4, 3, 2, 2, 0, 9, ''),
(53, 9, 3, 3, 0, 0, 4, ''),
(56, 4, 3, 0, 1, 0, 9, ''),
(57, 9, 3, 3, 1, 0, 4, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
