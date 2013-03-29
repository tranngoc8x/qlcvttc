-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2013 at 09:58 AM
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
-- Table structure for table `acls`
--

DROP TABLE IF EXISTS `acls`;
CREATE TABLE IF NOT EXISTS `acls` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(165, NULL, NULL, NULL, 'controllers', 1, 172),
(166, 165, NULL, NULL, 'Groups', 2, 13),
(167, 166, NULL, NULL, 'index', 3, 4),
(168, 166, NULL, NULL, 'view', 5, 6),
(169, 166, NULL, NULL, 'add', 7, 8),
(170, 166, NULL, NULL, 'edit', 9, 10),
(171, 166, NULL, NULL, 'delete', 11, 12),
(172, 165, NULL, NULL, 'Linhvucs', 14, 25),
(173, 172, NULL, NULL, 'index', 15, 16),
(174, 172, NULL, NULL, 'view', 17, 18),
(175, 172, NULL, NULL, 'add', 19, 20),
(176, 172, NULL, NULL, 'edit', 21, 22),
(177, 172, NULL, NULL, 'delete', 23, 24),
(178, 165, NULL, NULL, 'Members', 26, 41),
(179, 178, NULL, NULL, 'index', 27, 28),
(180, 178, NULL, NULL, 'view', 29, 30),
(181, 178, NULL, NULL, 'add', 31, 32),
(182, 178, NULL, NULL, 'edit', 33, 34),
(183, 178, NULL, NULL, 'changepassword', 35, 36),
(184, 178, NULL, NULL, 'login', 37, 38),
(185, 178, NULL, NULL, 'logout', 39, 40),
(186, 165, NULL, NULL, 'Positions', 42, 55),
(187, 186, NULL, NULL, 'index', 43, 44),
(188, 186, NULL, NULL, 'view', 45, 46),
(189, 186, NULL, NULL, 'add', 47, 48),
(190, 186, NULL, NULL, 'edit', 49, 50),
(191, 186, NULL, NULL, 'delete', 51, 52),
(192, 186, NULL, NULL, 'mutildelete', 53, 54),
(193, 165, NULL, NULL, 'Tasks', 56, 97),
(194, 193, NULL, NULL, 'index', 57, 58),
(195, 193, NULL, NULL, 'doing', 59, 60),
(196, 193, NULL, NULL, 'done', 61, 62),
(197, 193, NULL, NULL, 'finish', 63, 64),
(198, 193, NULL, NULL, 'fail', 65, 66),
(199, 193, NULL, NULL, 'view', 67, 68),
(200, 193, NULL, NULL, 'add', 69, 70),
(201, 193, NULL, NULL, 'edit', 71, 72),
(202, 193, NULL, NULL, 'delete', 73, 74),
(203, 193, NULL, NULL, 'listns', 75, 76),
(204, 193, NULL, NULL, 'listPB', 77, 78),
(205, 193, NULL, NULL, 'listPBgv', 79, 80),
(206, 193, NULL, NULL, 'fntask', 81, 82),
(207, 193, NULL, NULL, 'getfnNV', 83, 84),
(208, 193, NULL, NULL, 'change', 85, 86),
(209, 193, NULL, NULL, 'failtask', 87, 88),
(210, 193, NULL, NULL, 'getNV', 89, 90),
(211, 193, NULL, NULL, 'getNVFail', 91, 92),
(212, 193, NULL, NULL, 'download', 93, 94),
(213, 193, NULL, NULL, 'addfile', 95, 96),
(214, 165, NULL, NULL, 'Types', 98, 109),
(215, 214, NULL, NULL, 'index', 99, 100),
(216, 214, NULL, NULL, 'view', 101, 102),
(217, 214, NULL, NULL, 'add', 103, 104),
(218, 214, NULL, NULL, 'edit', 105, 106),
(219, 214, NULL, NULL, 'delete', 107, 108),
(220, 165, NULL, NULL, 'Users', 110, 125),
(221, 220, NULL, NULL, 'index', 111, 112),
(222, 220, NULL, NULL, 'view', 113, 114),
(223, 220, NULL, NULL, 'add', 115, 116),
(224, 220, NULL, NULL, 'edit', 117, 118),
(225, 220, NULL, NULL, 'changepassword', 119, 120),
(226, 220, NULL, NULL, 'login', 121, 122),
(227, 220, NULL, NULL, 'logout', 123, 124),
(228, 165, NULL, NULL, 'Acl', 126, 171),
(229, 228, NULL, NULL, 'Acos', 127, 134),
(230, 229, NULL, NULL, 'index', 128, 129),
(231, 229, NULL, NULL, 'empty_acos', 130, 131),
(232, 229, NULL, NULL, 'build_acl', 132, 133),
(233, 228, NULL, NULL, 'Aros', 135, 170),
(234, 233, NULL, NULL, 'index', 136, 137),
(235, 233, NULL, NULL, 'check', 138, 139),
(236, 233, NULL, NULL, 'users', 140, 141),
(237, 233, NULL, NULL, 'update_user_role', 142, 143),
(238, 233, NULL, NULL, 'ajax_role_permissions', 144, 145),
(239, 233, NULL, NULL, 'role_permissions', 146, 147),
(240, 233, NULL, NULL, 'user_permissions', 148, 149),
(241, 233, NULL, NULL, 'empty_permissions', 150, 151),
(242, 233, NULL, NULL, 'clear_user_specific_permissions', 152, 153),
(243, 233, NULL, NULL, 'grant_all_controllers', 154, 155),
(244, 233, NULL, NULL, 'deny_all_controllers', 156, 157),
(245, 233, NULL, NULL, 'get_role_controller_permission', 158, 159),
(246, 233, NULL, NULL, 'grant_role_permission', 160, 161),
(247, 233, NULL, NULL, 'deny_role_permission', 162, 163),
(248, 233, NULL, NULL, 'get_user_controller_permission', 164, 165),
(249, 233, NULL, NULL, 'grant_user_permission', 166, 167),
(250, 233, NULL, NULL, 'deny_user_permission', 168, 169);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 4, 'Ban quáº£n lÃ½', 1, 4),
(2, NULL, 'Group', 1, 'GiÃ¡m Ä‘á»‘c', 5, 8),
(3, NULL, 'Group', 6, 'Káº¿ toÃ¡n', 9, 12),
(4, NULL, 'Group', 2, 'PhÃ²ng káº¿ hoáº¡ch', 13, 16),
(5, NULL, 'Group', 5, 'PhÃ²ng nhÃ¢n sá»±', 17, 20),
(6, NULL, 'Group', 3, 'PhÃ²ng tÃ i chÃ­nh', 21, 24),
(7, 2, 'User', 1, 'admin', 6, 7),
(8, 3, 'User', 11, 'ketoan', 10, 11),
(9, 5, 'User', 4, 'nsu1', 18, 19),
(10, 4, 'User', 2, 'pgdkh', 14, 15),
(11, 6, 'User', 3, 'phdtc', 22, 23),
(12, 1, 'User', 9, 'qly1', 2, 3);

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
(1, 'DV VS', 'DV VS'),
(2, 'DV Bao Ve', 'DV Bao Ve');

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
(1, 1, '::1', '2013-03-29 09:26:16'),
(3, 8, '::1', '2013-03-27 04:10:51'),
(4, 9, '::1', '2013-03-27 03:58:41'),
(5, 10, '::1', '2013-03-08 04:46:30'),
(6, 11, '::1', '2013-03-13 05:15:47'),
(7, 12, '::1', '2013-03-13 05:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `positions_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `gioitinh` tinyint(4) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `birth` date NOT NULL,
  `address` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `nghiviec` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`, `gioitinh`, `datestart`, `dateend`, `birth`, `address`, `email`, `nghiviec`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1, 0, '1998-01-01', '0000-00-00', '1970-05-10', 'Cáº§u Giáº¥y,HÃ  Ná»™i', 'giamdoc@mail.com', 0),
(2, 'PGD Káº¿ Hoáº¡ch', 'pgdkh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 2, 0, '2013-01-01', '2033-01-01', '0000-00-00', '', '', 0),
(3, 'PGD TÃ i ChÃ­nh', 'phdtc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 3, 3, 0, '2033-01-01', '2033-01-01', '0000-00-00', '', '', 0),
(4, 'NhÃ¢n sá»± 1', 'nsu1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 5, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0),
(9, 'Quáº£n lÃ½', 'qly1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0),
(11, 'Káº¿ toÃ¡n', 'ketoan', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 6, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `start`, `end`, `users_id`, `status`, `taskid`, `types_id`, `linhvucs_id`, `done`) VALUES
(1, 'BÃ¡o cÃ¡o tuáº§n', 'BÃ¡o cÃ¡o tuáº§n', '2013-07-03 12:00:00', '2013-08-03 12:00:00', 9, 11, 'QLCV/TTC-1', 1, 1, 2),
(2, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-08 12:00:00', 9, 5, 'QLCV/TTC-2', 2, 2, 1),
(3, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o cÃ´ng viá»‡c nÄƒm trÆ°á»›c vÃ  triá»ƒn khai káº¿ hoáº¡c nÄƒm má»›i', '2013-03-08 12:00:00', '2013-03-11 12:00:00', 9, 3, 'QLCV-TTC-3', 2, 2, 1),
(4, 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', 'BÃ¡o cÃ¡o Ä‘áº§u nÄƒm', '2013-03-26 12:00:00', '0000-00-00 00:00:00', 9, 2, 'QLCV/TTC-4', 1, 1, 1),
(5, 'BÃ¡o cÃ¡o thÃ¡ng 3', 'BÃ¡o cÃ¡o thÃ¡ng 3', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 9, 7, 'QLCV/TTC-5', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

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
(73, '150313110904_IMG_20130311_115824.jpg', 1, 24, '03-2013'),
(74, '260313084824_Hopdong_web.doc', 1, 4, '03-2013'),
(75, '270313035726_Northwind_A4_size_for_Print.png', 1, 5, '03-2013'),
(76, '270313035956_Northwind_A4_size_for_Print.png', 2, 5, '03-2013');

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
(1, 'Thong bao', 'Thong bao'),
(2, 'Cong van', 'Cong van');

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
  `gioitinh` tinyint(4) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `birth` date NOT NULL,
  `address` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `nghiviec` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`, `gioitinh`, `datestart`, `dateend`, `birth`, `address`, `email`, `nghiviec`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1, 0, '1998-01-01', '0000-00-00', '1970-05-10', 'Cáº§u Giáº¥y,HÃ  Ná»™i', 'giamdoc@mail.com', 0),
(2, 'PGD Káº¿ Hoáº¡ch', 'pgdkh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 2, 0, '2013-01-01', '2033-01-01', '0000-00-00', '', '', 0),
(3, 'PGD TÃ i ChÃ­nh', 'phdtc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 3, 3, 0, '2033-01-01', '2033-01-01', '0000-00-00', '', '', 0),
(4, 'NhÃ¢n sá»± 1', 'nsu1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 5, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0),
(9, 'Quáº£n lÃ½', 'qly1', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0),
(11, 'Káº¿ toÃ¡n', 'ketoan', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 6, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '', 0);

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
  `ngay` datetime NOT NULL,
  `users_chuyen` int(11) NOT NULL,
  `noidung` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `users_id`, `tasks_id`, `status`, `done`, `ngay`, `users_chuyen`, `noidung`) VALUES
(33, 4, 1, 2, 2, '0000-00-00 00:00:00', 9, ''),
(35, 9, 1, 3, 2, '0000-00-00 00:00:00', 4, ''),
(36, 2, 1, 4, 2, '0000-00-00 00:00:00', 9, ''),
(37, 3, 1, 5, 2, '0000-00-00 00:00:00', 2, ''),
(38, 11, 1, 6, 2, '0000-00-00 00:00:00', 3, ''),
(39, 1, 1, 7, 2, '0000-00-00 00:00:00', 11, ''),
(40, 11, 1, 8, 2, '0000-00-00 00:00:00', 1, ''),
(41, 9, 1, 9, 2, '0000-00-00 00:00:00', 11, ''),
(43, 4, 1, 10, 2, '0000-00-00 00:00:00', 9, ''),
(49, 9, 1, 11, 2, '0000-00-00 00:00:00', 4, ''),
(50, 4, 2, 2, 2, '0000-00-00 00:00:00', 9, ''),
(51, 9, 2, 3, 2, '0000-00-00 00:00:00', 4, 'Lam dung yeu cau'),
(52, 4, 3, 2, 2, '0000-00-00 00:00:00', 9, ''),
(53, 9, 3, 3, 0, '0000-00-00 00:00:00', 4, ''),
(56, 4, 3, 0, 1, '0000-00-00 00:00:00', 9, ''),
(57, 9, 3, 3, 1, '0000-00-00 00:00:00', 4, ''),
(58, 4, 4, 2, 1, '0000-00-00 00:00:00', 9, 'chuyeenr'),
(59, 4, 5, 2, 2, '0000-00-00 00:00:00', 9, 'Ná»™i dung chuyá»ƒn nhÃ¢n sá»±'),
(60, 9, 5, 3, 2, '0000-00-00 00:00:00', 4, 'c1'),
(61, 2, 5, 4, 2, '0000-00-00 00:00:00', 9, 'ccc'),
(62, 3, 5, 4, 2, '0000-00-00 00:00:00', 9, 'ccc'),
(63, 3, 5, 5, 1, '0000-00-00 00:00:00', 2, '12'),
(64, 11, 5, 6, 2, '0000-00-00 00:00:00', 3, 'xxx'),
(65, 1, 5, 7, 1, '0000-00-00 00:00:00', 11, 'dsfc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
