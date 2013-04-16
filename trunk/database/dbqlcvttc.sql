-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 02:12 PM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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

--
-- Dumping data for table `acls`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 210),
(2, 1, NULL, NULL, 'Customers', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Elecs', 14, 31),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'listview', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'delete', 21, 22),
(13, 8, NULL, NULL, 'getJsElec', 23, 24),
(14, 1, NULL, NULL, 'Groups', 32, 45),
(15, 14, NULL, NULL, 'index', 33, 34),
(16, 14, NULL, NULL, 'view', 35, 36),
(17, 14, NULL, NULL, 'add', 37, 38),
(18, 14, NULL, NULL, 'edit', 39, 40),
(19, 14, NULL, NULL, 'delete', 41, 42),
(20, 14, NULL, NULL, 'mdelete', 43, 44),
(21, 1, NULL, NULL, 'Linhvucs', 46, 57),
(22, 21, NULL, NULL, 'index', 47, 48),
(23, 21, NULL, NULL, 'view', 49, 50),
(24, 21, NULL, NULL, 'add', 51, 52),
(25, 21, NULL, NULL, 'edit', 53, 54),
(26, 21, NULL, NULL, 'delete', 55, 56),
(27, 1, NULL, NULL, 'Positions', 58, 71),
(28, 27, NULL, NULL, 'index', 59, 60),
(29, 27, NULL, NULL, 'view', 61, 62),
(30, 27, NULL, NULL, 'add', 63, 64),
(31, 27, NULL, NULL, 'edit', 65, 66),
(32, 27, NULL, NULL, 'delete', 67, 68),
(33, 27, NULL, NULL, 'mutildelete', 69, 70),
(34, 1, NULL, NULL, 'Rooms', 72, 83),
(35, 34, NULL, NULL, 'index', 73, 74),
(36, 34, NULL, NULL, 'view', 75, 76),
(37, 34, NULL, NULL, 'add', 77, 78),
(38, 34, NULL, NULL, 'edit', 79, 80),
(39, 34, NULL, NULL, 'delete', 81, 82),
(40, 1, NULL, NULL, 'Tasks', 84, 125),
(41, 40, NULL, NULL, 'index', 85, 86),
(42, 40, NULL, NULL, 'doing', 87, 88),
(43, 40, NULL, NULL, 'done', 89, 90),
(44, 40, NULL, NULL, 'finish', 91, 92),
(45, 40, NULL, NULL, 'fail', 93, 94),
(46, 40, NULL, NULL, 'view', 95, 96),
(47, 40, NULL, NULL, 'add', 97, 98),
(48, 40, NULL, NULL, 'edit', 99, 100),
(49, 40, NULL, NULL, 'delete', 101, 102),
(50, 40, NULL, NULL, 'listns', 103, 104),
(51, 40, NULL, NULL, 'listPB', 105, 106),
(52, 40, NULL, NULL, 'listPBgv', 107, 108),
(53, 40, NULL, NULL, 'fntask', 109, 110),
(54, 40, NULL, NULL, 'getfnNV', 111, 112),
(55, 40, NULL, NULL, 'change', 113, 114),
(56, 40, NULL, NULL, 'failtask', 115, 116),
(57, 40, NULL, NULL, 'getNV', 117, 118),
(58, 40, NULL, NULL, 'getNVFail', 119, 120),
(59, 40, NULL, NULL, 'download', 121, 122),
(60, 40, NULL, NULL, 'addfile', 123, 124),
(61, 1, NULL, NULL, 'Types', 126, 137),
(62, 61, NULL, NULL, 'index', 127, 128),
(63, 61, NULL, NULL, 'view', 129, 130),
(64, 61, NULL, NULL, 'add', 131, 132),
(65, 61, NULL, NULL, 'edit', 133, 134),
(66, 61, NULL, NULL, 'delete', 135, 136),
(67, 1, NULL, NULL, 'Users', 138, 151),
(68, 67, NULL, NULL, 'index', 139, 140),
(69, 67, NULL, NULL, 'view', 141, 142),
(70, 67, NULL, NULL, 'add', 143, 144),
(71, 67, NULL, NULL, 'edit', 145, 146),
(72, 67, NULL, NULL, 'login', 147, 148),
(73, 67, NULL, NULL, 'logout', 149, 150),
(74, 1, NULL, NULL, 'Acl', 152, 197),
(75, 74, NULL, NULL, 'Acos', 153, 160),
(76, 75, NULL, NULL, 'admin_index', 154, 155),
(77, 75, NULL, NULL, 'admin_empty_acos', 156, 157),
(78, 75, NULL, NULL, 'admin_build_acl', 158, 159),
(79, 74, NULL, NULL, 'Aros', 161, 196),
(80, 79, NULL, NULL, 'admin_index', 162, 163),
(81, 79, NULL, NULL, 'admin_check', 164, 165),
(82, 79, NULL, NULL, 'admin_users', 166, 167),
(83, 79, NULL, NULL, 'admin_update_user_role', 168, 169),
(84, 79, NULL, NULL, 'admin_ajax_role_permissions', 170, 171),
(85, 79, NULL, NULL, 'admin_role_permissions', 172, 173),
(86, 79, NULL, NULL, 'admin_user_permissions', 174, 175),
(87, 79, NULL, NULL, 'admin_empty_permissions', 176, 177),
(88, 79, NULL, NULL, 'admin_clear_user_specific_permissions', 178, 179),
(89, 79, NULL, NULL, 'admin_grant_all_controllers', 180, 181),
(90, 79, NULL, NULL, 'admin_deny_all_controllers', 182, 183),
(91, 79, NULL, NULL, 'admin_get_role_controller_permission', 184, 185),
(92, 79, NULL, NULL, 'admin_grant_role_permission', 186, 187),
(93, 79, NULL, NULL, 'admin_deny_role_permission', 188, 189),
(94, 79, NULL, NULL, 'admin_get_user_controller_permission', 190, 191),
(95, 79, NULL, NULL, 'admin_grant_user_permission', 192, 193),
(96, 79, NULL, NULL, 'admin_deny_user_permission', 194, 195),
(97, 8, NULL, NULL, 'xuatra', 25, 26),
(98, 8, NULL, NULL, 'getElec', 27, 28),
(99, 8, NULL, NULL, 'file_export', 29, 30),
(100, 1, NULL, NULL, 'Nuocs', 198, 209),
(101, 100, NULL, NULL, 'index', 199, 200),
(102, 100, NULL, NULL, 'listview', 201, 202),
(103, 100, NULL, NULL, 'add', 203, 204),
(104, 100, NULL, NULL, 'delete', 205, 206),
(105, 100, NULL, NULL, 'getJsNuoc', 207, 208);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, 'Ban GiÃ¡m Ä‘á»‘c', 1, 6),
(2, NULL, 'Group', 4, 'Ban quáº£n lÃ½ TÃ²a nhÃ ', 7, 20),
(3, NULL, 'Group', 2, 'BQL cÃ¡c dá»± Ã¡n xÃ¢y dá»±ng', 21, 26),
(4, NULL, 'Group', 6, 'PhÃ²ng Káº¿ toÃ¡n', 27, 30),
(5, NULL, 'Group', 3, 'PhÃ²ng Káº¿ toÃ¡n TÃ i chÃ­nh', 31, 42),
(6, NULL, 'Group', 7, 'PhÃ²ng Ká»¹ thuáº­t', 43, 52),
(7, NULL, 'Group', 5, 'PhÃ²ng nhÃ¢n sá»±', 53, 54),
(8, 1, 'User', 1, 'admin', 2, 3),
(9, 1, 'User', 2, 'chinguyentuan', 4, 5),
(10, 6, 'User', 16, 'cuongdinhviet', 44, 45),
(11, 2, 'User', 19, 'hachule', 8, 9),
(12, 6, 'User', 20, 'haitranminh', 46, 47),
(13, 5, 'User', 21, 'hoalaithu', 32, 33),
(14, 4, 'User', 11, 'hungnguyenlam', 28, 29),
(15, 2, 'User', 12, 'huongngothanh', 10, 11),
(16, 3, 'User', 18, 'kienduongtri', 22, 23),
(17, 6, 'User', 15, 'kiennguyentrung', 48, 49),
(18, 2, 'User', 13, 'phuongdothu', 12, 13),
(19, 5, 'User', 23, 'phuongtranhoai', 34, 35),
(20, 5, 'User', 22, 'thangnguyenhong', 36, 37),
(21, 5, 'User', 3, 'thangnguyenngoc', 38, 39),
(22, 3, 'User', 25, 'thienluongduc', 24, 25),
(23, 2, 'User', 14, 'thuongnguyenhong', 14, 15),
(24, 2, 'User', 9, 'trangluukieu', 16, 17),
(25, 5, 'User', 17, 'tuanphamquoc', 40, 41),
(26, 6, 'User', 4, 'vulehong', 50, 51),
(27, 2, 'User', 24, 'yennguyenhong', 18, 19);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 5, 47, '1', '1', '1', '1'),
(3, 6, 47, '1', '1', '1', '1'),
(4, 7, 47, '1', '1', '1', '1'),
(5, 7, 60, '1', '1', '1', '1'),
(6, 6, 60, '1', '1', '1', '1'),
(7, 5, 60, '1', '1', '1', '1'),
(8, 5, 55, '1', '1', '1', '1'),
(9, 5, 49, '1', '1', '1', '1'),
(10, 5, 42, '1', '1', '1', '1'),
(11, 2, 47, '1', '1', '1', '1'),
(12, 3, 47, '1', '1', '1', '1'),
(13, 5, 43, '1', '1', '1', '1'),
(14, 5, 59, '1', '1', '1', '1'),
(15, 5, 48, '1', '1', '1', '1'),
(16, 2, 60, '1', '1', '1', '1'),
(17, 5, 45, '1', '1', '1', '1'),
(18, 5, 56, '1', '1', '1', '1'),
(19, 3, 60, '1', '1', '1', '1'),
(20, 5, 44, '1', '1', '1', '1'),
(21, 2, 55, '1', '1', '1', '1'),
(22, 5, 53, '1', '1', '1', '1'),
(23, 3, 55, '1', '1', '1', '1'),
(24, 5, 57, '1', '1', '1', '1'),
(25, 5, 58, '1', '1', '1', '1'),
(26, 2, 49, '1', '1', '1', '1'),
(27, 5, 54, '1', '1', '1', '1'),
(28, 3, 49, '1', '1', '1', '1'),
(29, 2, 42, '1', '1', '1', '1'),
(30, 5, 41, '1', '1', '1', '1'),
(31, 5, 51, '1', '1', '1', '1'),
(32, 5, 52, '1', '1', '1', '1'),
(33, 3, 42, '1', '1', '1', '1'),
(34, 5, 50, '1', '1', '1', '1'),
(35, 3, 43, '1', '1', '1', '1'),
(36, 5, 46, '1', '1', '1', '1'),
(37, 5, 64, '-1', '-1', '-1', '-1'),
(38, 2, 43, '1', '1', '1', '1'),
(39, 2, 59, '1', '1', '1', '1'),
(40, 5, 66, '-1', '-1', '-1', '-1'),
(41, 5, 65, '-1', '-1', '-1', '-1'),
(42, 3, 59, '1', '1', '1', '1'),
(43, 5, 62, '-1', '-1', '-1', '-1'),
(44, 5, 63, '-1', '-1', '-1', '-1'),
(45, 3, 48, '1', '1', '1', '1'),
(46, 2, 48, '1', '1', '1', '1'),
(47, 2, 45, '1', '1', '1', '1'),
(48, 3, 45, '1', '1', '1', '1'),
(49, 3, 56, '1', '1', '1', '1'),
(50, 2, 56, '1', '1', '1', '1'),
(51, 2, 44, '1', '1', '1', '1'),
(52, 3, 44, '1', '1', '1', '1'),
(53, 6, 46, '1', '1', '1', '1'),
(54, 6, 50, '1', '1', '1', '1'),
(55, 6, 52, '1', '1', '1', '1'),
(56, 2, 53, '1', '1', '1', '1'),
(57, 6, 51, '1', '1', '1', '1'),
(58, 6, 41, '1', '1', '1', '1'),
(59, 6, 54, '1', '1', '1', '1'),
(60, 7, 54, '1', '1', '1', '1'),
(61, 3, 53, '1', '1', '1', '1'),
(62, 7, 41, '1', '1', '1', '1'),
(63, 7, 51, '1', '1', '1', '1'),
(64, 2, 57, '1', '1', '1', '1'),
(65, 7, 50, '1', '1', '1', '1'),
(66, 7, 46, '1', '1', '1', '1'),
(67, 3, 57, '1', '1', '1', '1'),
(68, 7, 52, '1', '1', '1', '1'),
(69, 2, 58, '1', '1', '1', '1'),
(70, 7, 58, '1', '1', '1', '1'),
(71, 3, 58, '1', '1', '1', '1'),
(72, 7, 57, '1', '1', '1', '1'),
(73, 3, 54, '1', '1', '1', '1'),
(74, 7, 53, '1', '1', '1', '1'),
(75, 2, 54, '1', '1', '1', '1'),
(76, 7, 44, '1', '1', '1', '1'),
(77, 3, 41, '1', '1', '1', '1'),
(78, 2, 41, '1', '1', '1', '1'),
(79, 2, 51, '1', '1', '1', '1'),
(80, 6, 44, '1', '1', '1', '1'),
(81, 6, 53, '1', '1', '1', '1'),
(82, 3, 51, '1', '1', '1', '1'),
(83, 6, 57, '1', '1', '1', '1'),
(84, 4, 52, '1', '1', '1', '1'),
(85, 6, 58, '1', '1', '1', '1'),
(86, 4, 51, '1', '1', '1', '1'),
(87, 4, 41, '1', '1', '1', '1'),
(88, 6, 55, '1', '1', '1', '1'),
(89, 4, 54, '1', '1', '1', '1'),
(90, 6, 49, '1', '1', '1', '1'),
(91, 4, 58, '1', '1', '1', '1'),
(92, 4, 57, '1', '1', '1', '1'),
(93, 6, 42, '1', '1', '1', '1'),
(94, 4, 53, '1', '1', '1', '1'),
(95, 6, 43, '1', '1', '1', '1'),
(96, 4, 44, '1', '1', '1', '1'),
(97, 6, 59, '1', '1', '1', '1'),
(98, 6, 48, '1', '1', '1', '1'),
(99, 4, 56, '1', '1', '1', '1'),
(100, 6, 45, '1', '1', '1', '1'),
(101, 4, 45, '1', '1', '1', '1'),
(102, 6, 56, '1', '1', '1', '1'),
(103, 4, 48, '1', '1', '1', '1'),
(104, 7, 56, '1', '1', '1', '1'),
(105, 4, 59, '1', '1', '1', '1'),
(106, 7, 45, '1', '1', '1', '1'),
(107, 7, 48, '1', '1', '1', '1'),
(108, 4, 43, '1', '1', '1', '1'),
(109, 7, 59, '1', '1', '1', '1'),
(110, 7, 43, '1', '1', '1', '1'),
(111, 4, 42, '1', '1', '1', '1'),
(112, 7, 42, '1', '1', '1', '1'),
(113, 7, 49, '1', '1', '1', '1'),
(114, 7, 55, '1', '1', '1', '1'),
(115, 4, 49, '1', '1', '1', '1'),
(116, 4, 55, '1', '1', '1', '1'),
(117, 4, 47, '1', '1', '1', '1'),
(118, 4, 60, '1', '1', '1', '1'),
(119, 2, 52, '1', '1', '1', '1'),
(120, 3, 52, '1', '1', '1', '1'),
(121, 3, 50, '1', '1', '1', '1'),
(122, 2, 46, '1', '1', '1', '1'),
(123, 3, 46, '1', '1', '1', '1'),
(124, 2, 50, '1', '1', '1', '1'),
(125, 4, 46, '1', '1', '1', '1'),
(126, 4, 50, '1', '1', '1', '1'),
(127, 2, 72, '1', '1', '1', '1'),
(128, 2, 73, '1', '1', '1', '1'),
(129, 2, 69, '1', '1', '1', '1'),
(130, 3, 69, '1', '1', '1', '1'),
(131, 3, 73, '1', '1', '1', '1'),
(132, 3, 72, '1', '1', '1', '1'),
(133, 4, 72, '1', '1', '1', '1'),
(134, 4, 73, '1', '1', '1', '1'),
(135, 4, 69, '1', '1', '1', '1'),
(136, 2, 71, '1', '1', '1', '1'),
(137, 3, 71, '1', '1', '1', '1'),
(138, 4, 71, '1', '1', '1', '1'),
(139, 5, 71, '1', '1', '1', '1'),
(140, 6, 71, '1', '1', '1', '1'),
(141, 7, 71, '1', '1', '1', '1'),
(142, 7, 72, '1', '1', '1', '1'),
(143, 7, 73, '1', '1', '1', '1'),
(144, 7, 69, '1', '1', '1', '1'),
(145, 6, 69, '1', '1', '1', '1'),
(146, 5, 69, '1', '1', '1', '1'),
(147, 5, 73, '1', '1', '1', '1'),
(148, 5, 72, '1', '1', '1', '1'),
(149, 6, 72, '1', '1', '1', '1'),
(150, 6, 73, '1', '1', '1', '1'),
(151, 4, 24, '-1', '-1', '-1', '-1'),
(152, 5, 24, '-1', '-1', '-1', '-1'),
(153, 6, 24, '-1', '-1', '-1', '-1'),
(154, 7, 24, '-1', '-1', '-1', '-1'),
(155, 3, 24, '-1', '-1', '-1', '-1'),
(156, 2, 24, '-1', '-1', '-1', '-1'),
(157, 2, 22, '1', '1', '1', '1'),
(158, 3, 22, '1', '1', '1', '1'),
(159, 4, 22, '1', '1', '1', '1'),
(160, 5, 22, '1', '1', '1', '1'),
(161, 6, 22, '1', '1', '1', '1'),
(162, 7, 22, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
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
  `code` varchar(50) NOT NULL,
  `nguoilienhe` varchar(50) NOT NULL,
  `dtnguoilh` int(15) NOT NULL,
  `soluongnv` int(4) NOT NULL,
  `soluongxemay` int(4) NOT NULL,
  `soluongoto` int(4) NOT NULL,
  `ngaythue` date NOT NULL,
  `ngaychamdut` date NOT NULL,
  `thoihanhd` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `tax`, `email`, `phone`, `add`, `fax`, `agent`, `chucvu`, `ngaytl`, `code`, `nguoilienhe`, `dtnguoilh`, `soluongnv`, `soluongxemay`, `soluongoto`, `ngaythue`, `ngaychamdut`, `thoihanhd`) VALUES
(7, 'NgÃ¢n hÃ ng ACB', '123456789', 'acb@gmail.com', '123456789', 'TÃ²a nhÃ  TTC', '', 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', '2007-07-07', '', '', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0),
(8, 'CÃ´ng ty BKAV', '888888888', 'bkav@gmail.com', '987654321', 'TÃ²a nhÃ  TTC', '12345678', 'Nguyá»…n Tá»­ Quáº£ng', 'GiÃ¡m Ä‘á»‘c', '2000-04-10', '', '', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0),
(9, 'TPB', '0100231018', 'Tpb@tpb.com.vn', '84437956668', '', '84437956669', 'Nguyá»…n HÆ°ng', 'Tá»•ng giÃ¡m Ä‘á»‘c', '2013-04-16', '', '', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elecs`
--

DROP TABLE IF EXISTS `elecs`;
CREATE TABLE IF NOT EXISTS `elecs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `elec` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `elecs`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `failtasks`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `note`, `order`, `magroup`) VALUES
(1, 'Ban GiÃ¡m Ä‘á»‘c', 'Ban GiÃ¡m Ä‘á»‘c', 1, 'BGD'),
(2, 'BQL cÃ¡c dá»± Ã¡n xÃ¢y dá»±ng', 'Ban quáº£n lÃ½ cÃ¡c dá»± Ã¡n xÃ¢y dá»±ng', 3, 'BQL'),
(3, 'PhÃ²ng Káº¿ toÃ¡n TÃ i chÃ­nh', 'PhÃ²ng tÃ i chÃ­nh', 2, 'PGD'),
(4, 'Ban quáº£n lÃ½ TÃ²a nhÃ ', 'Ban quáº£n lÃ½', 3, 'BQL'),
(5, 'PhÃ²ng nhÃ¢n sá»±', 'PhÃ²ng nhÃ¢n sá»±', 2, 'NS'),
(6, 'PhÃ²ng Káº¿ toÃ¡n', 'Káº¿ toÃ¡n', 3, 'KT'),
(7, 'PhÃ²ng Ká»¹ thuáº­t', 'PhÃ²ng Ká»¹ thuáº­t', 4, 'NS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `linhvucs`
--

INSERT INTO `linhvucs` (`id`, `name`, `note`) VALUES
(1, 'DV Báº£o vá»‡', 'Dá»‹ch vá»¥ báº£o vá»‡'),
(4, 'DV Vá»‡ sinh', ''),
(5, 'DV Diá»‡t cÃ´n trÃ¹ng', ''),
(6, 'Quáº£n lÃ½ nhÃ  tháº§u', ''),
(7, 'Báº£o trÃ¬ Báº£o dÆ°á»¡ng', ''),
(8, 'Sá»­a chá»¯a Thay tháº¿', ''),
(9, 'DV khÃ¡ch hÃ ng', 'Dá»‹ch vá»¥ khÃ¡ch hÃ ng'),
(10, 'Báº£o trÃ¬  Báº£o dÆ°á»¡ng', 'Báº£o trÃ¬  Báº£o dÆ°á»¡ng'),
(11, 'Kiá»ƒm tra Ä‘á»‹nh ká»³', 'Kiá»ƒm tra Ä‘á»‹nh ká»³');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `users_id`, `ipadr`, `time`) VALUES
(1, 1, '113.190.210.242', '2013-04-16 11:48:58'),
(3, 8, '117.6.86.190', '2013-04-16 09:30:38'),
(4, 9, '116.98.112.99', '2013-04-16 11:39:01'),
(5, 10, '::1', '2013-03-08 04:46:30'),
(6, 11, '::1', '2013-03-13 05:15:47'),
(7, 12, '::1', '2013-03-13 05:15:55'),
(8, 12, '123.16.248.115', '2013-04-02 09:31:12'),
(9, 13, '113.190.210.242', '2013-04-16 01:54:55'),
(10, 14, '123.16.248.115', '2013-04-02 09:33:32'),
(11, 15, '117.6.86.190', '2013-04-03 10:39:48'),
(12, 16, '117.6.86.190', '2013-04-16 09:18:37'),
(13, 17, '123.16.248.115', '2013-04-02 09:41:02'),
(14, 18, '116.98.112.133', '2013-04-02 03:59:11'),
(15, 19, '117.6.86.190', '2013-04-03 10:43:04'),
(16, 20, '117.6.86.190', '2013-04-03 10:45:06'),
(17, 21, '117.6.86.190', '2013-04-03 10:54:30'),
(18, 22, '117.6.86.190', '2013-04-03 10:50:00'),
(19, 23, '113.190.210.242', '2013-04-16 11:54:42'),
(20, 24, '117.6.86.190', '2013-04-05 03:22:57'),
(21, 25, '116.98.112.99', '2013-04-10 04:16:06');

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

--
-- Dumping data for table `offices`
--


-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `note` mediumtext CHARACTER SET utf8,
  `order` int(2) DEFAULT NULL,
  `groups_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `note`, `order`, `groups_id`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', 1, 0),
(2, 'PhÃ³ giÃ¡m Ä‘á»‘c', 'PhÃ³ giÃ¡m Ä‘á»‘c', 2, 0),
(3, 'PhÃ³ giÃ¡m Ä‘á»‘c KTTC', 'PhÃ³ giÃ¡m Ä‘á»‘c Káº¿ toÃ¡n TÃ i chÃ­nh', 2, 0),
(4, 'GÄ BQL', 'GiÃ¡m Ä‘á»‘c BQL TÃ²a nhÃ ', 3, 0),
(5, 'NhÃ¢n viÃªn ká»¹ thuáº­t', 'NhÃ¢n viÃªn ká»¹ thuáº­t', 6, 0),
(6, 'Káº¿ toÃ¡n tá»•ng há»£p', 'Káº¿ toÃ¡n tá»•ng há»£p', 5, 0),
(7, 'PhÃ³ KTT', 'PhÃ³ Káº¿ toÃ¡n trÆ°á»Ÿng', NULL, 0),
(8, 'KTT', 'KÃª toÃ¡n trÆ°á»Ÿng', 4, 0),
(9, 'Káº¿ toÃ¡n thanh toÃ¡n', 'Káº¿ toÃ¡n thanh toÃ¡n', 6, 0),
(10, 'KST', 'Ká»¹ sÆ° trÆ°á»Ÿng', NULL, 0),
(11, 'Quáº£n lÃ½ khÃ¡ch hÃ ng', 'Quáº£n lÃ½ DV khÃ¡ch hÃ ng', NULL, 0),
(12, 'Quáº£n lÃ½ dá»‹ch vá»¥', 'NhÃ¢n viÃªn quáº£n lÃ½ dá»‹ch vá»¥', NULL, 0),
(13, 'Lá»… tÃ¢n', 'nhÃ¢n viÃªn lá»… tÃ¢n', NULL, 0),
(14, 'káº¿ toÃ¡n', 'nhÃ¢n viÃªn káº¿ toÃ¡n', NULL, 0),
(15, 'nhÃ¢n viÃªn dá»± Ã¡n', 'nhÃ¢n viÃªn dá»± Ã¡n', NULL, 0),
(16, 'nhÃ¢n viÃªn kinh doanh', 'nhÃ¢n viÃªn kinh doanh', NULL, 0),
(17, 'Káº¿ toÃ¡n ngÃ¢n hÃ ng', 'Káº¿ toÃ¡n ngÃ¢n hÃ ng', NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `positions_groups`
--

INSERT INTO `positions_groups` (`id`, `positions_id`, `groups_id`) VALUES
(14, 4, 4),
(15, 9, 6),
(16, 5, 7),
(21, 10, 7),
(22, 11, 4),
(23, 12, 4),
(25, 13, 4),
(27, 15, 2),
(28, 16, 4),
(31, 14, 5),
(34, 17, 3),
(35, 17, 6),
(36, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `room` varchar(50) NOT NULL,
  `first` int(15) NOT NULL,
  `ghichu` mediumtext NOT NULL,
  `macto` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `customers_id`, `room`, `first`, `ghichu`, `macto`) VALUES
(1, 7, '1101', 0, '', ''),
(2, 7, '1102', 0, '', ''),
(3, 8, '1103', 0, '', ''),
(4, 7, '1104', 0, '', ''),
(5, 8, '1001', 0, '', ''),
(6, 9, '301', 0, '', ''),
(7, 9, '401', 0, '', ''),
(8, 9, '502', 0, '', '');

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
  `folder` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `start`, `end`, `users_id`, `status`, `taskid`, `types_id`, `linhvucs_id`, `done`, `folder`, `parent`) VALUES
(1, 'Báº£n demo so 1', 'Báº£n demo so 1', '2013-04-16 12:00:00', '2013-04-17 12:00:00', 1, 2, 'QLCV/TTC-1', 1, 1, 1, 'Hopdongthang4', 0),
(2, 'Gia háº¡n há»£p Ä‘á»“ng', '- Gá»­i CV THÃ”NG BÃO GIA Háº N\r\n- PhÃª duyá»‡t GÄ', '2013-04-16 12:00:00', '2013-04-25 12:00:00', 9, 2, 'Bao ve', 5, 1, 1, '', 0),
(3, 'Thay tháº¿ bÃ³ng Ä‘Ã¨n', 'Thay tháº¿ bÃ³ng Ä‘Ã¨n Alliance', '2013-04-16 12:00:00', '2013-04-17 12:00:00', 9, 11, 'Sá»­a chá»¯a nhá»', 5, 9, 2, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tfiles`
--

INSERT INTO `tfiles` (`id`, `name`, `type`, `tasks_id`, `folder`) VALUES
(1, '160413113156_chap06vn_7867.pdf', 1, 1, '04-2013'),
(2, '160413114735_TTC_QT_Hoat dong Bao ve. 2011 Chuan Ms Chinh .docx', 1, 2, '04-2013'),
(3, '160413115233_', 1, 3, '04-2013');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `note`) VALUES
(1, 'Thong bao', 'Thong bao'),
(2, 'Cong van', 'Cong van'),
(5, 'Dich vu', 'Dá»‹ch vá»¥'),
(6, 'Ky thuat', ''),
(7, 'Kiem tra dinh ky', 'Kiá»ƒm tra Ä‘á»‹nh ká»³'),
(8, 'HCNS', 'HÃ nh chÃ­nh NhÃ¢n sá»±'),
(9, 'Quan ly xay dung', '');

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
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `positions_id`, `groups_id`, `gioitinh`, `datestart`, `dateend`, `birth`, `address`, `email`, `nghiviec`, `desc`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 'admin', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 1, 1, 0, '1993-03-15', '0000-00-00', '1968-01-02', 'Cáº§u Giáº¥y,HÃ  Ná»™i', 'tuan.leanh@ttctower.com.vn', 0, ''),
(2, 'Nguyá»…n Tuáº¥n Chi', 'chinguyentuan', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 2, 1, 0, '2000-07-01', '0000-00-00', '1966-04-29', '', 'chinguyentuan@gmail.com', 0, ''),
(3, 'PGD TÃ i ChÃ­nh', 'thangnguyenngoc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 3, 3, 0, '2012-10-01', '0000-00-00', '1963-01-01', '', '', 0, ''),
(4, 'LÃª Há»“ng VÅ©', 'vulehong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '2010-01-01', '0000-00-00', '1969-01-01', '', 'vu.lehong@ttctower.com.vn', 0, ''),
(9, 'LÆ°u Kiá»u Trang', 'trangluukieu', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 4, 4, 1, '2011-06-01', '0000-00-00', '1987-01-01', '', 'lkieutrang@savills.com.vn', 0, ''),
(11, 'Nguyá»…n LÃ¢m HÆ°ng', 'hungnguyenlam', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 8, 6, 0, '1998-01-01', '0000-00-00', '1998-01-01', '', 'hung.nguyenlam@ttctower.com.vn', 0, ''),
(12, 'NgÃ´ Thanh HÆ°Æ¡ng', 'huongngothanh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 11, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'huong.ngothanh@ttctower.com.vn', 0, ''),
(13, 'Äá»— Thu PhÆ°Æ¡ng', 'phuongdothu', '', 12, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'phuong.dothu@ttctower.com.vn', 0, ''),
(14, 'Nguyá»…n Há»“ng ThÆ°Æ¡ng', 'thuongnguyenhong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 13, 4, 1, '1998-04-02', '0000-00-00', '1998-04-02', '', 'thuong.nguyenhong@ttctower.com.vn', 0, ''),
(15, 'Nguyá»…n Trung KiÃªn', 'kiennguyentrung', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(16, 'Äinh Viá»‡t CÆ°Æ¡ng', 'cuongdinhviet', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 5, 7, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(17, 'Pháº¡m Quá»‘c Tuáº¥n', 'tuanphamquoc', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 7, 3, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', 'tuan.phamquoc@ttctower.com.vn', 0, ''),
(18, 'DÆ°Æ¡ng TrÃ­ KiÃªn', 'kienduongtri', '0742eee136946c030ea6490c1534b3f8564297f4', 15, 2, 0, '1998-04-02', '0000-00-00', '1998-04-02', '', '', 0, ''),
(19, 'Chu Lá»‡ HÃ ', 'hachule', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 12, 4, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'ha.chule@ttctower.com.vn', 0, ''),
(20, 'Tráº§n Minh Háº£i', 'haitranminh', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 10, 7, 0, '1998-04-03', '0000-00-00', '1998-04-03', '', 'hai.tranminh@ttctower.com.vn', 0, ''),
(21, 'Láº¡i Thu Hoa', 'hoalaithu', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 14, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'hoa.laithu@ttctower.com.vn', 0, ''),
(22, 'Nguyá»…n Há»“ng Tháº¯ng', 'thangnguyenhong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 9, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'thang.nguyenhong@ttctower.com.vn', 0, ''),
(23, 'Tráº§n HoÃ i PhÆ°Æ¡ng', 'phuongtranhoai', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 6, 3, 1, '1998-04-03', '0000-00-00', '1998-04-03', '', 'phuong.tranhoai@ttctower.com.vn', 0, ''),
(24, 'Nguyá»…n Thá»‹ HoÃ ng Yáº¿n', 'yennguyenhong', '6bf41c4a3399425edd18693b8b33f16bcce2f0fc', 13, 4, 1, '2013-04-05', '0000-00-00', '1998-04-05', '', 'yen.nguyenhoang@ttctower.com.vn', 0, ''),
(25, 'LÆ°Æ¡ng Äá»©c Thiá»‡n', 'thienluongduc', '8adc4abfbe657edd81cc243adffecf8d03c47677', 15, 2, 0, '2013-04-05', '0000-00-00', '1998-04-05', '', '', 0, '');

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
  `datexem` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `usertasks`
--

INSERT INTO `usertasks` (`id`, `users_id`, `tasks_id`, `status`, `done`, `ngay`, `users_chuyen`, `noidung`, `datexem`) VALUES
(1, 1, 1, 1, 2, '0000-00-00 00:00:00', -1, 'Khá»Ÿi táº¡o,Báº£n demo so 1', '2013-04-16 11:32:20'),
(2, 4, 1, 2, 2, '2013-04-16 11:34:38', 1, 'chuyá»ƒn viá»‡c láº§n 1', '2013-04-16 11:39:04'),
(3, 1, 1, 2, 1, '2013-04-16 11:39:23', 4, 'chuyá»ƒn láº§n 2', '0000-00-00 00:00:00'),
(4, 9, 2, 1, 2, '0000-00-00 00:00:00', -1, '- PhÆ°Æ¡ng lÃ m thÃ´ng bÃ¡o, trinh duyá»‡t', '2013-04-16 11:47:44'),
(5, 13, 2, 2, 1, '2013-04-16 11:48:13', 9, '- LÃ m CV', '0000-00-00 00:00:00'),
(6, 9, 3, 1, 2, '0000-00-00 00:00:00', -1, '', '2013-04-16 11:52:43'),
(7, 19, 3, 2, 2, '2013-04-16 11:54:29', 9, 'Xuáº¥t khoCá»­ KTV thay tháº¿KÃ½ xÃ¡c nháº­n hoÃ n thÃ nh CÃ´ng viÃªc chuyá»ƒn BQL', '2013-04-16 11:54:46'),
(8, -2, 3, 11, 2, '2013-04-16 11:55:12', 19, 'HoÃ n thÃ nh', '0000-00-00 00:00:00');
